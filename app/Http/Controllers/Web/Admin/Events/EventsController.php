<?php

namespace App\Http\Controllers\Web\Admin\Events;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    public function index()  {
        $data = Events::with('getDetailClubs')->get();
    }

    public function store(Request $request)  {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location' => 'required',
            'event_time_start' => 'required',
            'event_time_end' => 'required',
            'event_date' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'banner' => 'required',
            'tags' => 'required',
            'club_id' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $picUrl = null;
            if ($request->hasFile('banner')) {
                $file = $request->file('banner');
                $path = $file->storeAs('public/banner_events',$file->getClientOriginalName());
                $picUrl  = url(Storage::url($path));
            }
            
            Events::create([
                'name' => $request->name,
                'club_id' => $request->club_id,
                'description' => $request->description,
                'contact_number' => $request->contact_number,
                'whatsapp_number' => $request->whatsapp_number,
                'event_time_start' => $request->event_time_start,
                'event_time_end' => $request->event_time_end,
                'event_date' => $request->event_date,
                'location' => $request->location, 
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'banner' => $picUrl,
                'tags' => $request->tags
            ]);
            return redirect()->route('club-detail', ['id' => $request->club_id])->with('success', 'Successfully added event');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', $th->getMessage());
        }
        
    }

    public function show($id) {
        $events = Events::with('getDetailClubs')->find($id);
    }

    public function update(Request $request, $clubId, $eventId) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location' => 'required',
            'event_time_start' => 'required',
            'event_time_end' => 'required',
            'event_date' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'banner' => 'required',
            'tags' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 400);
        }
        
        $picUrl = null;
        $events = Events::find($eventId);
        if (!$events) {
            return response()->json(['success' => false, 'message' => 'Event not found'], 404);
        }

        if ($request->hasFile('banner')) {
            $path = str_replace(url('/storage'), '', $events->banner);
            $path = ltrim($path, '/'); 

            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }

            $file = $request->file('banner');
            $path = $file->storeAs('public/banner_events',$file->getClientOriginalName());
            $picUrl  = url(Storage::url($path));
            $events->banner = $picUrl;
        } 

        $events->name = $request->name;
        $events->description = $request->description;
        $events->contact_number = $request->contact_number;
        $events->whatsapp_number = $request->whatsapp_number;
        $events->event_time_start = $request->event_time_start;
        $events->event_time_end = $request->event_time_end;
        $events->event_date = $request->event_date;
        $events->location = $request->location;
        $events->longitude = $request->longitude;
        $events->latitude = $request->latitude;
        $events->tags = $request->tags;
        $events->save();

        return response()->json([
            'success' => true,
            'message' => 'Event updated successfully',
            'events' => $events
        ]);
        
    }

    public function destroy(string $id)
    {
        $events = Events::find($id);
        $path = str_replace(url('/storage'), '', $events->logo);
        $path = ltrim($path, '/'); 
        
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $events->delete();

    }
}
