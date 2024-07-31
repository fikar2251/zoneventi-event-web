<?php

namespace App\Http\Controllers\Web\Admin\Events;

use App\Http\Controllers\Controller;
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
            return redirect('/clubs-detail/event-create')->with('errors', $validator->errors());
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
            return redirect('')->with('success', 'Successfully add events');
        } catch (\Throwable $th) {
            return redirect('')->with('errors', $th->getMessage());
        }
        
    }
}
