@extends('layouts.app')

@section('title', 'Admin Create')

@section('content')
    <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
        <div class="header d-flex">
            <div class="back-button" style="left: 0;">
                <a href="{{ route('admins-list') }}">
                    <img src="{{ asset('assets/template/icon/Back.svg') }}" alt="Back" class="nav-icon"
                        style="width: 50px; height: 50px">
                </a>
            </div>
        </div>
        <div class="form-container">
            <div class="text-center">
                <h2 class="title text-white">Add New Admin</h2>
            </div>
            <form class="mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label text-12">Name</label>
                            <input type="text" class="form-control text-12" id="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label text-12">Password</label>
                            <input type="password" class="form-control text-12" id="password" placeholder="Set a password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="form-label text-12">Email</label>
                            <input type="email" class="form-control text-12" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="role" class="form-label text-12">Role</label>
                            <select class="form-control text-12" id="role">
                                <option>Select option</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
