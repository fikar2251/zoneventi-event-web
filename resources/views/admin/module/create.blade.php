@extends('layouts.app')

@section('title', 'Admin Create')

@section('content')
    <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="header d-flex align-items-center justify-content-between flex-wrap">
                    <div class="d-flex align-items-center w-100">
                        <div class="back-button">
                            <a href="{{ route('admins-list') }}">
                                <img src="{{ asset('assets/template/icon/Back.svg') }}" alt="Back" class="nav-icon"
                                    style="width: 50px; height: 50px">
                            </a>
                        </div>
                        <h2 class="title mx-auto">Add New Admin</h2>
                    </div>
                </div>

                <div class="form-container">
                    <form action="{{ route('admins-store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label text-12">Name</label>
                                    <input type="text" class="form-control text-12" name="name" id="name"
                                        placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-label text-12">Password</label>
                                    <input type="password" class="form-control text-12" name="password" id="password"
                                        placeholder="Set a password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label text-12">Email</label>
                                    <input type="email" class="form-control text-12" name="email" id="email"
                                        placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="role" class="form-label text-12">Role</label>
                                    <select class="form-control text-12" id="role" name="role">
                                        <option value="">Select option</option>
                                        <option value="admin">Admin</option>
                                        <option value="owner">Owner</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5 text-12">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        @endsection
