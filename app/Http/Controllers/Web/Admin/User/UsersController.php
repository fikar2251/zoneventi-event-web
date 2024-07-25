<?php

namespace App\Http\Controllers\Web\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->getStaticUsers();
        return view('admin.users.index', compact('users'));
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

    private function getStaticUsers()
    {
        $users = [];
        for ($i = 1; $i <= 15; $i++) {
            $users[] = [
                'id' => sprintf('%03d', $i),
                'name' => 'Andreina Tuccella',
                'dob' => '01/11/2000',
                'gender' => 'Female',
                'email' => 'email@gmail.com'
            ];
        }

        $page = request()->get('page', 1);
        $perPage = 5;
        $total = count($users);
        $users = array_slice($users, ($page - 1) * $perPage, $perPage);
        
        return new \Illuminate\Pagination\LengthAwarePaginator(
            $users,
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }
}
