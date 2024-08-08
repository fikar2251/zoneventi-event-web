@extends('layouts.app')

@section('title', 'All Clubs')

@section('content')
    <main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-md-4">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mt-60">
                    <div class="col-md-12">
                        <div class="card mb-4 card-bg custom-height-card">
                            <div class="card-body text-white d-flex align-items-center">
                                <div class="d-flex justify-content-between w-100">
                                    <div style="margin-top: 40px">
                                        <h5 class="text-section">Pending Request</h5>
                                        <p class="total-pending">{{ $clubPending }} club request pending</p>
                                    </div>
                                    <div>
                                        <a href="{{ route('club-pending') }}">
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
                        <form action="{{ route('clubs-index') }}" method="GET">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="input-group search-group">
                                    <input type="text" name="search" class="form-control search-input"
                                        placeholder="Search by name" value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn search-btn" type="submit" id="searchButton">
                                            <img src="{{ asset('assets/template/icon/Search.svg') }}" alt="Search">
                                        </button>
                                    </div>
                                </div>
                                <a href="{{ route('club-create') }}" class="btn add-club-btn" type="button">Add new
                                    Club</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h4 class="text-white mb-4">All Clubs <span class="text-muted">{{ $countClubs }} Total</span></h4>
                        <div class="row">
                            @foreach ($clubs as $club)
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="card club-card">
                                        <a href="{{ route('club-detail', $club->id) }}" class="club-link">
                                            <div class="card-body text-center">
                                                <img src="{{ $club->logo }}" alt="Logo"
                                                    class="img-fluid rounded-circle mb-3 club-img">
                                                <h5 class="text-header-club">{{ $club->name }}</h5>
                                                <div class="club-location">
                                                    <img src="{{ asset('assets/template/icon/Location.svg') }}"
                                                        alt="location" class="location-icon-club">
                                                    <span class="location-text">{{ $club->location }}</span>
                                                </div>
                                                <p class="text-post-event">{{ $club->upcomingEvents }} Posted Events</p>
                                                <p class="text-success">{{ $club->ongoingEvents }} Event Online</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="pagination-container">
                            {{ $clubs->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn filter-btn" type="button">
                <img src="{{ asset('assets/template/icon/Filter.svg') }}" alt="Filter">
            </button>

            <div class="loading-overlay" id="loadingOverlay">
                <img src="{{ asset('assets/template/animation/loading.gif') }}" alt="Loading" width="50">
            </div>

            <!-- Filter Modal -->
            <div id="filterPopup" class="filter-popup">
                <div class="filter-popup-content">
                    <h2 class="filter-header-popup">Filter</h2>
                    <div class="filter-section">
                        <div class="section-header">
                            <h3>City</h3>
                        </div>
                        <div class="scrollable-options">
                            <span class="option-tag">Madrid</span>
                            <span class="option-tag selected">Barcelona</span>
                            <span class="option-tag">Sevilli</span>
                            <span class="option-tag">Sev</span>
                        </div>
                    </div>
                    <div class="filter-section">
                        <h3>Sort By</h3>
                        <div class="scrollable-options">
                            <span class="option-tag">Most Followers</span>
                            <span class="option-tag selected">Lowest Followers</span>
                        </div>
                    </div>
                    <div class="filter-section">
                        <h3>Sort By</h3>
                        <div class="scrollable-options">
                            <span class="option-tag selected">Most Published Events</span>
                            <span class="option-tag">Lowest Published</span>
                        </div>
                    </div>
                    <button id="applyFilter" class="btn btn-primary text-12">Apply Filter</button>
                </div>
            </div>
    </main>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchButton = document.getElementById('searchButton');
            var searchForm = document.querySelector('form');
            var loadingOverlay = document.getElementById('loadingOverlay');

            searchButton.addEventListener('click', function() {
                loadingOverlay.style.display = 'flex';
                searchForm.submit();
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var filterPopup = document.getElementById("filterPopup");
            var filterBtn = document.querySelector(".filter-btn");
            var applyFilterBtn = document.getElementById("applyFilter");
            var isFilterActive = false;

            filterBtn.onclick = function(event) {
                event.stopPropagation();
                isFilterActive = !isFilterActive;

                if (isFilterActive) {
                    filterBtn.classList.add('active');
                    showFilterPopup();
                } else {
                    filterBtn.classList.remove('active');
                    hideFilterPopup();
                }
            }

            function showFilterPopup() {
                var rect = filterBtn.getBoundingClientRect();
                filterPopup.style.bottom = (rect.height + 16) + 'px';
                filterPopup.style.right = '25px';
                setTimeout(() => {
                    filterPopup.style.display = "block";
                }, 10);
            }

            function hideFilterPopup() {
                filterPopup.style.display = "none";
            }

            applyFilterBtn.onclick = function() {
                console.log("Applying filters...");
                var selectedCity = document.querySelector('.filter-section:nth-child(2) .option-tag.selected')
                    ?.textContent;
                var selectedFollowers = document.querySelector(
                    '.filter-section:nth-child(3) .option-tag.selected')?.textContent;
                var selectedPublished = document.querySelector(
                    '.filter-section:nth-child(4) .option-tag.selected')?.textContent;

                console.log("Selected City:", selectedCity);
                console.log("Selected Followers Sort:", selectedFollowers);
                console.log("Selected Published Sort:", selectedPublished);

                hideFilterPopup();
                isFilterActive = true;
                filterBtn.classList.add('active');
            }

            window.onclick = function(event) {
                if (!filterPopup.contains(event.target) && event.target !== filterBtn) {
                    hideFilterPopup();
                    isFilterActive = false;
                    filterBtn.classList.remove('active');
                }
            }

            document.querySelectorAll('.option-tag').forEach(item => {
                item.addEventListener('click', function() {
                    this.parentNode.querySelectorAll('.option-tag').forEach(sibling => {
                        sibling.classList.remove('selected');
                    });
                    this.classList.add('selected');
                });
            });
        });
    </script>
@endsection
