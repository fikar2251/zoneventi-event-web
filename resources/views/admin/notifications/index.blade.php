@extends('layouts.app')

@section('title', 'Notifications')

@section('content')
    <main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-md-4">
        <div class="container-fluid">
            <div class="row mt-60">
                <div class="form-container" style="max-width: 800px">
                    <div class="text-center mt-5">
                        <h2 class="title text-white">Notification</h2>
                    </div>
                    <form class="mt-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="notification-title" class="form-label text-12">Notification title*</label>
                                    <input type="text" class="form-control text-12" id="notification-title"
                                        placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <label for="notification-message" class="form-label text-12">Notification
                                        message*</label>
                                    <textarea class="form-control text-12" id="notification-message" rows="3" placeholder="Type message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="send-to" class="form-label text-12">Send Notification to*</label>
                                    <select class="form-control text-12" id="send-to">
                                        <option>All user</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="select-club" class="form-label text-12">Select specific club*</label>
                                    <select class="form-control text-12" id="select-club">
                                        <option>Select option</option>
                                    </select>
                                </div>
                                <p class="text-muted">Total number of users will receive notification: <span
                                        class="text-count">1440</span></p>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary text-12">Send Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
