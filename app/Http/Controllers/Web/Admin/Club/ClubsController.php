<?php

namespace App\Http\Controllers\Web\Admin\Club;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ClubsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Clubs::query();
        $search = $request->input('search');

        if ($search) {
            $query->where('name', 'like', "%{$search}%");   
        }

        $clubs = $query->paginate(5);

        // $clubs = $this->getStaticClubs();
        return view('admin.clubs.index', [
            'clubs' => $clubs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'owner_id' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $logoPath = null;

        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoName = $logoFile->hashName();
            $logoPath = $logoFile->storeAs('public/clubs', $logoName);

            // $logoPath = 'storage/clubs/' . $logoName;
            $logoPath = url(Storage::url($logoPath));
        }

            Clubs::create([
                'name' => $request->name,
                'location' => $request->location,
                'owner_id' => $request->owner_id,
                'phone'=> $request->phone,
                'logo' => $logoPath,
                'status' => 0
            ]);

            return redirect('clubs')->with('success', 'Sucessfully add clubs');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $club = Clubs::find($id);
        $events = range(1, 4);
        $eventCount = count($events);

        return view('admin.clubs.show', [
            'club' => $club,
            'events' => $events,
            'eventCount' => $eventCount
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $club = Clubs::find($id);
        $detail = UserDetail::where('user_id', $club->owner_id)->first();
        return view('admin.clubs.detail', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $club = Clubs::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'owner_id' => 'required',
            // 'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $logoPath = null;
        
        $clubs = Clubs::find($id);

        if ($request->hasFile('logo')) {

            $path = str_replace(url('/storage'), '', $clubs->logo);
            $path = ltrim($path, '/'); // Menghapus '/' di awal path

            // Mengecek apakah file ada
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }

            $logoFile = $request->file('logo');
            $logoName = $logoFile->hashName();
            $logoPath = $logoFile->storeAs('public/clubs', $logoName);

            // $logoPath = 'storage/clubs/' . $logoName;
            $logoPath = url(Storage::url($logoPath));
            $clubs->logo = $logoPath;
        }
        $clubs->name = $request->name;
        $clubs->location = $request->location;
        $clubs->owner_id = $request->owner_id;
        $clubs->phone = $request->phone;
        $clubs->save();

        return redirect('clubs')->with('success', 'Sucessfully update clubs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clubs = Clubs::find($id);
        $path = str_replace(url('/storage'), '', $clubs->logo);
        $path = ltrim($path, '/'); // Menghapus '/' di awal path

        // Mengecek apakah file ada
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $clubs->delete();

    }


    public function pending()
    {
        $pending = Clubs::where('status', 0)->get();
        $declined = Clubs::where('status', 2)->get();
        return view('admin.clubs.pending', compact('pending', 'declined'));
    }


    public function createEvent($id)
    {
        $club = Clubs::find($id);
        $events = range(1, 4);
        $eventCount = count($events);

        return view('admin.clubs.create-event', [
            'club' => $club,
            'events' => $events,
            'eventCount' => $eventCount
        ]);
    }

    public function accept($id) {

        try {
            $update = Clubs::where('id', $id)->update(['status' => 1]);
            return view('admin.clubs.index')->with('success', 'Succesfully accept club');
        } catch (\Throwable $th) {
            return view('admin.clubs.index')->with('errors', $th->getMessage());
        }
    }

    public function declined($id) {
        try {
            $update = Clubs::where('id', $id)->update(['status' => 2]);
            return view('admin.clubs.index')->with('success', 'Succesfully denied club');
        } catch (\Throwable $th) {
            return view('admin.clubs.index')->with('errors', $th->getMessage());
        }
    }

    private function getStaticClubs()
    {
        $clubs = [];
        for ($i = 1; $i <= 15; $i++) {
            $clubs[] = [
                'id' => $i,
                'name' => 'Heaven',
                'location' => 'Teramo (TE)',
                'posted_events' => 5,
                'online_events' => 2
            ];
        }

        $page = request()->get('page', 1);
        $perPage = 5;
        $total = count($clubs);
        $clubs = array_slice($clubs, ($page - 1) * $perPage, $perPage);
        
        return new \Illuminate\Pagination\LengthAwarePaginator(
            $clubs,
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }
}
