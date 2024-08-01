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

    public function show($id) {
        $events = Events::with('getDetailClubs')->find($id);
    }

    public function update(Request $request, string $id) {
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
            // return redirect('/clubs-detail/event-create')->with('errors', $validator->errors());

            return (new ResponseResource(false, 'Errors', $validator->errors()))->response()->setStatusCode(400);
        }
        try {
            $picUrl = null;
            $events = Events::find($id);
            if ($request->hasFile('banner')) {

                $path = str_replace(url('/storage'), '', $events->banner);
                $path = ltrim($path, '/'); // Menghapus '/' di awal path
    
                // Mengecek apakah file ada
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
           
            return new ResponseResource(true, 'Successfully update data', $events);
        } catch (\Throwable $th) {
            return (new ResponseResource(false, $th->getMessage(), null))->response()->setStatusCode(500);
        }
    }

    public function destroy(string $id)
    {
        $events = Events::find($id);
        $path = str_replace(url('/storage'), '', $events->logo);
        $path = ltrim($path, '/'); // Menghapus '/' di awal path

        // Mengecek apakah file ada
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $events->delete();

    }
}
