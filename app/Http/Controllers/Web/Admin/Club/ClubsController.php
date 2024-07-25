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
        $clubs = $this->getStaticClubs();
        return view('admin.clubs.index', compact('clubs'));
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
