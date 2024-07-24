<?php

namespace App\Http\Controllers\Web\Admin\Club;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClubsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.clubs.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $events = range(1, 3);
        $eventCount = count($events);

        return view('admin.clubs.show', [
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

    public function createEvent()
    {
        return view('admin.clubs.create-event');
    }
}
