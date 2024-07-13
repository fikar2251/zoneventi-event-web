@extends('layouts.app')

@section('title', 'Pending Clubs')

@section('content')
    <div class="row">
        <div class="header">
            <div class="back-button">
                <img src="{{ asset('assets/template/icon/Back.svg') }}" alt="Back" class="nav-icon">
            </div>
            <h2 class="title-pending">Pending Club Request</h2>
            {{-- <div class="tab-button">
                <button id="pendingBtn" class="tab active" onclick="showTab('pending')">Pending</button>
                <button id="declineBtn" class="tab" onclick="showTab('decline')">Decline</button>
            </div>`
            <div id="pending" class="tab-content">
                <!-- Content for pending list -->
            </div>
            <div id="decline" class="tab-content" style="display: none;">
                <!-- Content for declined list -->
            </div> --}}
        </div>
    </div>
@endsection
