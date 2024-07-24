@extends('layouts.app')

@section('title', 'Admin Clubs')

@section('content')
    <main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-md-4">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mt-60">
                    <div class="col-md-12">

                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="input-group search-group">
                                <input type="text" class="form-control search-input" placeholder="Search events">
                                <div class="input-group-append">
                                    <button class="btn search-btn" type="button">
                                        <img src="{{ asset('assets/template/icon/Search.svg') }}" alt="Search">
                                    </button>
                                </div>
                            </div>
                            <a href="{{ url('club-create-event') }}" class="btn add-club-btn" type="button">Add new
                                Event</a>
                        </div>
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
                                        <p class="event-date-time text-spacing"><span class="event-date text-spacing">VEN 16
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
                                        <p class="event-date-time text-spacing"><span class="event-date text-spacing">VEN 16
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
    </main>
    </div>
@endsection
