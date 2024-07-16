@extends('layouts.app')

@section('title', 'Detail Club')

@section('content')
    <div class="content-wrapper">
        <main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-md-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="header d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="back-button">
                                <a href="{{ route('clubs-index') }}">
                                    <img src="{{ asset('assets/template/icon/Back.svg') }}" alt="Back" class="nav-icon"
                                        style="width: 50px; height: 50px">
                                </a>
                            </div>
                            <h2 class="title">Club Details</h2>
                        </div>
                        <div class="admin-edit">
                            <div class="admin-top">
                                <span>Club admins</span> <a href="#">Edit</a>
                            </div>
                            <div class="admin-bottom">
                                <span>All Admins</span>
                            </div>
                        </div>
                    </div>

                    <!-- Club Info Section -->
                    <div class="club-info d-flex align-items-center justify-content-between mt-4">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/template/icon/ImgClub.svg') }}" alt="Club Logo" class="club-logo">
                            <div class="club-details ml-3">
                                <h3 class="club-name">Heaven</h3>
                                <div class="club-location">
                                    <p class="location-text"><img src="{{ asset('assets/template/icon/Location.svg') }}"
                                            alt="location" class="location-icon-club"> Teramo (TE)</p>
                                </div>
                                <p class="club-phone">+44 6281 228 2990</p>
                            </div>
                        </div>
                        <div class="buttons d-flex">
                            <button class="btn btn-edit">Edit Club Details</button>
                            <button class="btn btn-add">Add New Event</button>
                            <button class="btn btn-delete">Delete Club</button>
                        </div>
                    </div>

                    <!-- Ongoing Events Section -->
                    <div class="events mt-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="header-events" style="margin-left: 20px">Ongoing Events</h4>
                        </div>
                        <div class="event-cards d-flex flex-wrap">
                            @foreach (range(1, 3) as $item)
                                <div class="event-card">
                                    <div class="event-header">
                                        <img src="{{ asset('assets/template/img/Thumbnail.jpg') }}" alt="Event Thumbnail"
                                            class="event-thumbnail">
                                    </div>
                                    <div class="event-content">
                                        <div class="event-info">
                                            <p class="event-date-time text-spacing"><span
                                                    class="event-date text-spacing">VEN 16
                                                    GIU</span> <span class="event-time text-spacing"> | 23:59 - 05:00</span>
                                            </p>
                                            <h5 class="event-title text-spacing">La Terrazza - Hola Chica</h5>
                                            <p class="event-location text-spacing">
                                                La Terrazza
                                                <img src="{{ asset('assets/template/icon/Location.svg') }}" alt="location"
                                                    class="location-icon-club">
                                                <span class="location-text text-spacing">San Benedetto (AP)</span>
                                            </p>
                                            <div class="event-tags">
                                                <span class="tag">Hip hop</span>
                                                <span class="tag">Disco</span>
                                                <span class="tag">Reggaeton</span>
                                            </div>
                                        </div>
                                        <div class="edit-icon">
                                            <img src="{{ asset('assets/template/icon/edit.svg') }}" alt="Edit"
                                                class="edit-icon-button" style="width: 40px; height: 40px">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Upcoming Events Section -->
                    <div class="events mt-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="header-events" style="margin-left: 20px">Ongoing Events</h4>
                        </div>
                        <div class="event-cards d-flex flex-wrap">
                            @foreach (range(1, 3) as $item)
                                <div class="event-card">
                                    <div class="event-header">
                                        <img src="{{ asset('assets/template/img/Event.jpg') }}" alt="Event Thumbnail"
                                            class="event-thumbnail">
                                    </div>
                                    <div class="event-content">
                                        <div class="event-info ">
                                            <p class="event-date-time text-spacing"><span
                                                    class="event-date text-spacing">VEN 16
                                                    GIU</span> <span class="event-time text-spacing"> | 23:59 - 05:00</span>
                                            </p>
                                            <h5 class="event-title text-spacing">La Terrazza - Hola Chica</h5>
                                            <p class="event-location text-spacing">
                                                La Terrazza
                                                <img src="{{ asset('assets/template/icon/Location.svg') }}" alt="location"
                                                    class="location-icon-club">
                                                <span class="location-text">San Benedetto (AP)</span>
                                            </p>
                                            <div class="event-tags">
                                                <span class="tag">Hip hop</span>
                                                <span class="tag">Disco</span>
                                                <span class="tag">Reggaeton</span>
                                            </div>
                                        </div>
                                        <div class="edit-icon">
                                            <img src="{{ asset('assets/template/icon/edit.svg') }}" alt="Edit"
                                                style="width: 40px; height: 40px">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
