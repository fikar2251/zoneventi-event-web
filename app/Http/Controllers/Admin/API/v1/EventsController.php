<?php

namespace App\Http\Controllers\Admin\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\Events;
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
