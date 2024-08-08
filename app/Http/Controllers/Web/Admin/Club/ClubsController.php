<?php

namespace App\Http\Controllers\Web\Admin\Club;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\Clubs;
use App\Models\User;
use App\Models\UserDetail;
use Carbon\Carbon;
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
        $query = Clubs::where('status', 1);
        $search = $request->input('search');

        if ($search) {
            $query->where('name', 'like', "%{$search}%");   
        }

        $clubPending = Clubs::where('status', 0)->count();
        $countClubs = $query->count();

        $clubs = $query->with('events')->paginate(5);

        $today = Carbon::today();
        foreach ($clubs as $club) {
            $ongoingEvents = $club->events->filter(function ($event) use ($today) {
                return Carbon::parse($event->event_date)->isSameDay($today);
            })->count();

            $upcomingEvents = $club->events->filter(function ($event) use ($today) {
                return Carbon::parse($event->event_date)->isAfter($today);
            })->count();

            $club->upcomingEvents = $upcomingEvents;
            $club->ongoingEvents = $ongoingEvents;
        }

        return view('admin.clubs.index', [
            'search' => $search,
            'clubs' => $clubs,
            'clubPending' => $clubPending,
            'countClubs' => $countClubs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owners = User::where('role', 'owner')->get();
        return view('admin.clubs.create', [
            'owners' => $owners
        ]);
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
        
        
        try {
            $logoPath = null;

            if ($request->hasFile('logo')) {
                $logoFile = $request->file('logo');
                $logoName = $logoFile->hashName();
                $logoPath = $logoFile->storeAs('public/clubs', $logoName);
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
    
                return redirect('clubs-pending')->with('success', 'Sucessfully add clubs');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', $th->getMessage());
        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clubs = Clubs::with('events')->find($id);
        $owners = User::where('role', 'owner')->get();

        $events = $clubs->events;
        $today = Carbon::today();

        $ongoingEvents = $events->filter(function ($event) use ($today) {
            return Carbon::parse($event->event_date)->isSameDay($today);
        });

        $upcomingEvents = $events->filter(function ($event) use ($today) {
            return Carbon::parse($event->event_date)->isAfter($today);
        });

        $formatEvents = function($events) {
            return $events->map(function ($event) {
                return [
                    'id' => $event->id,
                    'banner' => $event->banner,
                    'name' => $event->name,
                    'description' => $event->description,
                    'whatsapp_number' => $event->whatsapp_number,
                    'contact_number' => $event->contact_number,
                    'tags' => $event->tags,
                    'location' => $event->location,
                    'event_date' => $event->event_date,
                    'formatted_event_date' => Carbon::parse($event->event_date)->locale('it')->isoFormat('ddd D MMM'),
                    'event_time_start' => Carbon::parse($event->event_time_start)->format('H:i'),
                    'event_time_end' => Carbon::parse($event->event_time_end)->format('H:i'),
                    'longitude' => $event->longitude,
                    'latitude' => $event->latitude,
                    'club' => $event->club
                ];
            });
        };
        
        return view('admin.clubs.show', [
            'clubs' => $clubs,
            'owners' => $owners,
            'ongoingEvents' => $formatEvents($ongoingEvents),
            'upcomingEvents' => $formatEvents($upcomingEvents),
            'ongoingEventCount' => $ongoingEvents->count(),
            'upcomingEventCount' => $upcomingEvents->count(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $club = Clubs::find($id);
        if(empty($club)) {
            return redirect()->back()->with('error', 'Club not found');
        }

        $detail = UserDetail::where('user_id', $club->owner_id)->first();
        if (empty($detail)) {
            return redirect()->back()->with('error', 'User detail club not found');
        }

        return view('admin.clubs.detail', [
            'club' => $club,
            'detail' => $detail
        ]);
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
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'owner_id' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 400);
        }

        $logoPath = null;
        
        $club = Clubs::find($id);
    
        if ($request->hasFile('logo')) {

            $path = str_replace(url('/storage'), '', $club->logo);
            $path = ltrim($path, '/'); 

            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }

            $logoFile = $request->file('logo');
            $logoName = $logoFile->hashName();
            $logoPath = $logoFile->storeAs('public/clubs', $logoName);

            $logoPath = url(Storage::url($logoPath));
            $club->logo = $logoPath;
        }
        
        $club->name = $request->name;
        $club->location = $request->location;
        $club->owner_id = $request->owner_id;
        $club->phone = $request->phone;
        $club->save();
    
        return response()->json([
            'success' => true,
            'message' => 'Club updated successfully',
            'club' => $club
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clubs = Clubs::find($id);
        $path = str_replace(url('/storage'), '', $clubs->logo);
        $path = ltrim($path, '/');

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        foreach($clubs->events as $event) {
            $event->delete();
        }

        $clubs->delete();

        return response()->json(['code' => 'success', 'msg' => 'Club and its events have been deleted successfully']);

    }


    public function pending()
    {
        $pending = Clubs::where('status', 0)->get();
        $declined = Clubs::where('status', 2)->get();
        return view('admin.clubs.pending', [
            'pending' => $pending,
            'declined' => $declined
        ]);
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

    public function action($id) {
        $club = Clubs::find($id);
        if (empty($club)) {
            return redirect()->back()->with('error', 'Club not found');
        }

        $action = request('action');
        if ($action == 'accept') {
            $club->status = 1;
            $club->save();
            return redirect()->route('clubs-index')->with('success', 'Successfully accepted club');
        } elseif ($action == 'decline') {
            $club->status = 2;
            $club->save();
            return redirect()->route('club-pending')->with('success', 'Successfully declined club');
        } else {
            return redirect()->back()->with('error', 'Invalid action');
        }
    }
}
