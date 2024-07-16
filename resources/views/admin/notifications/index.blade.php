@extends('layouts.app')

@section('title', 'Notifications')

@section('content')
    <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
        <div class="row">
            <div class="header d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex align-items-center">
                    <div class="back-button">
                        <a href="{{ route('clubs-index') }}">
                            <img src="{{ asset('assets/template/icon/Back.svg') }}" alt="Back" class="nav-icon"
                                style="width: 50px; height: 50px">
                        </a>
                    </div>
                    <h2 class="title text-white">Notification</h2>
                </div>
            </div>
        </div>

        <div class="notification-form">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="notification-title" class="form-label">Notification title*</label>
                            <input type="text" class="form-control" id="notification-title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="notification-message" class="form-label">Notification message*</label>
                            <textarea class="form-control" id="notification-message" rows="3" placeholder="Type message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="send-to" class="form-label">Send Notification to*</label>
                            <select class="form-control" id="send-to">
                                <option>All user</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="select-club" class="form-label">Select specific club*</label>
                            <select class="form-control" id="select-club">
                                <option>Select option</option>
                            </select>
                        </div>
                        <p class="text-muted">Total number of users will receive notification: 1440</p>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5">Send Now</button>
                </div>
            </form>
        </div>
    </div>
@endsection
