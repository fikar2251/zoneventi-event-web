@extends('layouts.app')

@section('title', 'Admin Clubs')

@section('content')
    <div class="content-wrapper">
        <main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-md-4">
            <div class="container-fluid">
                <div class="row mt-60">
                    <div class="col-md-12">
                        <div class="card mb-4 card-bg custom-height-card">
                            <div class="card-body text-white d-flex align-items-center">
                                <div class="d-flex justify-content-between w-100">
                                    <div style="margin-top: 40px">
                                        <h5 class="text-section">Pending Request</h5>
                                        <p class="total-pending">10 club request pending</p>
                                    </div>
                                    <div>
                                        <a href="{{ route('clubs-pending') }}">
                                            <img src="{{ asset('assets/template/icon/Arrow.svg') }}" alt="Pending Club"
                                                class="nav-icon">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="input-group search-group">
                                <input type="text" class="form-control search-input" placeholder="Search by name">
                                <div class="input-group-append">
                                    <button class="btn search-btn" type="button">
                                        <img src="{{ asset('assets/template/icon/Search.svg') }}" alt="Search">
                                    </button>
                                </div>
                            </div>
                            <a href="{{ route('club-create') }}" class="btn add-club-btn" type="button">Add new Club</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h4 class="text-white mb-4">All Clubs <span class="text-muted">125 Total</span></h4>
                        <div class="row">
                            @for ($i = 0; $i < 8; $i++)
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="card club-card">
                                        <a href="{{ route('club-detail') }}" class="club-link">
                                            <div class="card-body text-center">
                                                <img src="{{ asset('assets/template/icon/ImgClub.svg') }}" alt="Club Image"
                                                    class="img-fluid rounded-circle mb-3 club-img">
                                                <h5 class="text-header-club">Heaven</h5>
                                                <div class="club-location">
                                                    <span class="location-text"><img
                                                            src="{{ asset('assets/template/icon/Location.svg') }}"
                                                            alt="location" class="location-icon-club"> Teramo (TE)</span>
                                                </div>
                                                <p class="text-post-event">5 Posted Events</p>
                                                <p class="text-success">2 Event Online</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <button class="btn filter-btn" type="button">
                    <img src="{{ asset('assets/template/icon/Filter.svg') }}" alt="Filter">
                </button>
            </div>
        </main>
    </div>
@endsection
