@extends('layouts.app')

@section('title', 'Pending Clubs')

@section('content')
    <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
        <div class="row">
            <div class="container custom-container">
                <div class="header d-flex align-items-center justify-content-between flex-wrap">
                    <div class="d-flex align-items-center w-100">
                        <div class="back-button">
                            <a href="{{ route('clubs-index') }}">
                                <img src="{{ asset('assets/template/icon/Back.svg') }}" alt="Back" class="nav-icon-back">
                            </a>
                        </div>
                        <h2 class="title">Pending Club Request</h2>
                    </div>
                </div>

                <div class="tab-buttons">
                    <button class="tab-button active" id="pending-tab">Pending</button>
                    <button class="tab-button" id="declined-tab">Declined</button>
                </div>
            </div>

            <!-- List Data Pending -->
            <div class="list-data" id="pending-data">
                @if ($pending->isEmpty())
                    <div class="no-data-message-club">
                        <p>No pending club requests available</p>
                    </div>
                @else
                    @foreach ($pending as $item)
                        <div class="list-item">
                            <div class="list-item-left">
                                <div class="list-item-icon">
                                    @if ($item->logo)
                                        <img src="{{ $item->logo }}" alt="Club Logo" class="club-logo-icon">
                                    @endif
                                </div>
                                <div class="list-item-info">
                                    <h3 class="list-item-title">{{ $item->name }}</h3>
                                    <p class="list-item-location"><img
                                            src="{{ asset('assets/template/icon/Location.svg') }}" alt="location"
                                            class="location-icon-pending"> {{ $item->location }}
                                    </p>
                                </div>
                            </div>
                            <div class="list-item-right">
                                <a href="{{ route('club-pending-request', $item->id) }}">
                                    <img src="{{ asset('assets/template/icon/Stroke1.svg') }}" alt="Arrow"
                                        class="arrow-icon">
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- List Data Declined -->
            <div class="list-data hidden" id="declined-data">
                @if ($declined->isEmpty())
                    <div class="no-data-message">
                        <p>No declined club requests available</p>
                    </div>
                @else
                    @foreach ($declined as $item)
                        <div class="list-item">
                            <div class="list-item-left">
                                <div class="list-item-icon"></div>
                                <div class="list-item-info">
                                    <h3 class="list-item-title">{{ $item->name }}</h3>
                                    <p class="list-item-location"><img
                                            src="{{ asset('assets/template/icon/Location.svg') }}" alt="location"
                                            class="location-icon-pending"> {{ $item->location }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pendingTab = document.getElementById('pending-tab');
            const declinedTab = document.getElementById('declined-tab');
            const pendingData = document.getElementById('pending-data');
            const declinedData = document.getElementById('declined-data');

            pendingTab.addEventListener('click', function() {
                pendingTab.classList.add('active');
                declinedTab.classList.remove('active');
                pendingData.classList.remove('hidden');
                declinedData.classList.add('hidden');
            });

            declinedTab.addEventListener('click', function() {
                declinedTab.classList.add('active');
                pendingTab.classList.remove('active');
                declinedData.classList.remove('hidden');
                pendingData.classList.add('hidden');
            });
        });
    </script>

@endsection
