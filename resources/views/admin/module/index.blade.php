@extends('layouts.app')

@section('title', 'Admin List')

@section('content')
    <main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-md-4">
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="input-group search-group">
                            <input type="text" class="form-control search-input" placeholder="Search by name, id, or email">
                            <div class="input-group-append">
                                <button class="btn search-btn" type="button">
                                    <img src="{{ asset('assets/template/icon/Search.svg') }}" alt="Search">
                                </button>
                            </div>
                        </div>
                        <a href="{{ route('admins-create') }}" class="btn add-club-btn" type="button">Add New
                            Admin</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="mb-3 header-all-users">All Users</div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Admin Name</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (range(1, 4) as $item)
                                    <tr>
                                        <td class="text-center">{{ sprintf('%03d', $item) }}</td>
                                        <td class="text-center">Adam Shafiq </td>
                                        <td class="text-center">Admin</td>
                                        <td class="text-center">email@gmail.com</td>
                                        <td>
                                            <button class="btn btn-block" style="background-color: #7A5BFF">Edit</button>
                                            <button class="btn btn-block" style="background-color: #FF5B5B">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
