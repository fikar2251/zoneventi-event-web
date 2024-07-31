<?php

namespace App\Http\Controllers\Web\Admin\Club;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use Illuminate\Http\Request;
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
            // 'owner_id' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

            $logoPath = 'storage/clubs/' . $logoName;
        }

            Clubs::create([
                'name' => $request->name,
                'location' => $request->location,
                // 'owner_id' => $request->owner_id,
                'phone'=> $request->phone,
                'logo' => $logoPath
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
    public function detail()
    {
        return view('admin.clubs.detail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function pending()
    {
        return view('admin.clubs.pending');
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
