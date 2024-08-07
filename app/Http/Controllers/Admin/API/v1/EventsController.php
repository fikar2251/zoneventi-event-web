<?php

namespace App\Http\Controllers\Admin\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\Events;
use Illuminate\Database\Eloquent\Builder as Builder;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Events::with('getDetailClubs')->get();
            $response = $data->map(function ($datas){
                unset($datas->getDetailClubs->created_at);
                unset($datas->getDetailClubs->updated_at);
                $datas->tags = str_replace(' ', '',explode(',', $datas->tags));

                return $datas;
            });
            return new ResponseResource('true', 'List Events', $response);
        } catch (\Throwable $th) {
            return (new ResponseResource('false', $th->getMessage(), null))->response()->setStatusCode(500);
        }
    }

    public function eventsByLocation(Request $request) {
        $term = $request->keyword;

        try {
            $data = Events::select('location')->where('location', 'like', '%'.$term.'%')->groupBy('location')->get();
            $response = $data->map(function ($datas){
                $events = Events::where('location', $datas->location)->count();
                $datas->events = $events;
            });
            return new ResponseResource('true', 'List Events', $data);
        } catch (\Throwable $th) {
            return (new ResponseResource('false', $th->getMessage(), null))->response()->setStatusCode(500);
        }
    }

    public function searchByEventsAndLocation(Request $request) {
        $keyword = $request->keyword;
        try {
            
            $data = Events::join('clubs', 'clubs.id', '=', 'events.club_id')->select('events.*', 'clubs.name as club_name')
            ->where('events.name', 'like', "%{$keyword}%")
            ->orWhere('events.event_date', 'like', "%{$keyword}%")
            ->orWhere('events.location', 'like', "%{$keyword}%")
            ->orWhere('clubs.name', 'like', "%{$keyword}%")
            ->get();

            return new ResponseResource('true', 'List Events', $data);
        } catch (\Throwable $th) {
            return (new ResponseResource('false', $th->getMessage(), null))->response()->setStatusCode(500);
        }
    }

    

    // $currentLatitude = $request->input('latitude');
    //     $currentLongitude = $request->input('longitude');
    //     $radius = $request->input('radius', 10); // default radius 10 km

    //     $places = Events::select('*')
    //             ->selectRaw("ROUND((6371 * acos(cos(radians(?)) 
    //             * cos(radians(latitude)) 
    //             * cos(radians(longitude) - radians(?)) 
    //             + sin(radians(?)) 
    //             * sin(radians(latitude)))), 2) AS distance_km", 
    //             [$currentLatitude, $currentLongitude, $currentLatitude])
    //         ->having('distance_km', '<', $radius)
    //         ->orderBy('distance_km')
    //         ->get();

    //     return response()->json($places);

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
