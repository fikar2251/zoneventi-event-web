@extends('layouts.app')

@section('title', 'User List')

@section('content')
    <main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-md-4">
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="input-group search-group">
                            <input type="text" class="form-control search-input" placeholder="Search by name, id or email">
                            <div class="input-group-append">
                                <button class="btn search-btn" type="button">
                                    <img src="{{ asset('assets/template/icon/Search.svg') }}" alt="Search">
                                </button>
                            </div>
                        </div>
                        <button class="btn blocked-club-btn" type="button">Blocked Users</button>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h2 class="mb-3 header-all-users">All Users</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">User Info</th>
                                    <th class="text-center">Email/Phone</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (range(1, 4) as $item)
                                    <tr>
                                        <td class="text-center">{{ sprintf('%03d', $item) }}</td>
                                        <td class="text-center">
                                            <p>Name: Andreina Tuccella</p>
                                            <p>DOB: 01/11/2000</p>
                                            <p>Gender: Female</p>
                                        </td>
                                        <td class="text-center">email@gmail.com</td>
                                        <td>
                                            <div>
                                                <button class="btn btn-block"
                                                    style="background-color: #7A5BFF">Edit</button>
                                                <button class="btn btn-block"
                                                    style="background-color: #FF5B5B">Block</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <button class="btn filter-btn" type="button">
                    <img src="{{ asset('assets/template/icon/Filter.svg') }}" alt="Filter">
                </button>
            </div>
        </div>
    </main>
@endsection
