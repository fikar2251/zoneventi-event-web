<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\MobUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::with('getDetailMobUser');
        $search = $request->input('search');
        $role = $request->input('role');

        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->orWhere('id', 'like', "%{$search}%");
        }

        if ($role && $role !== 'all') {
            $query->where('role', $role);
        }

        $users = $query->paginate(5);

        return view('admin.module.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.module.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
             'name' => 'required',
             'email' => 'required|email',
             'password' => 'required|string|min:6',
             'role' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        return redirect('admins-list')->with('success', 'Successfully added new admin');
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
    public function destroy($id)
    {
        $delete = MobUsers::with('user')->findOrFail($id);
        $delete->delete() == true
            ? $return = ['code' => 'success', 'msg' => 'Data deleted successfully']
            : $return = ['code' => 'error', 'msg' => 'Something went wrong!'];
        return response()->json($return);
    }

    private function getStaticUsers()
    {
        $users = [];
        for ($i = 1; $i <= 15; $i++) {
            $users[] = [
                'id' => sprintf('%03d', $i),
                'name' => 'Adam Shafiq',
                'role' => 'Admin',
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
