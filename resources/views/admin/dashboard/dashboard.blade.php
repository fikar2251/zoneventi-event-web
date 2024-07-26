@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-md-4">
        <div class="container-fluid">
            <div class="row mt-60">
                <div class="col-md-12 col-md-6">
                    <div class="card mb-4 card-bg custom-height-card">
                        <div class="card-body text-white d-flex align-items-center">
                            <div class="d-flex justify-content-between w-100">
                                <div style="margin-top: 40px">
                                    <h5 class="text-section">Pending Request</h5>
                                    <p class="total-pending">10 club request pending</p>
                                </div>
                                <div>
                                    <a href="{{ route('club-pending') }}">
                                        <img src="{{ asset('assets/template/icon/Arrow.svg') }}" alt="Log Out"
                                            class="nav-icon">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4" style="background-color: #1D1F36; border-radius: 20px;">
                        <div class="card-body text-white d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="left-section">
                                    <h5 class="text-section">Active users</h5>
                                    <p class="total-active">6,345</p>
                                </div>
                                <div class="right-section">
                                    <h5 class="text-green">1.3% <img
                                            src="{{ asset('assets/template/icon/Growth-Indicator.svg') }}" alt=""
                                            style="width: 21px"></h5>
                                    <h3 class="vs-last-week">VS LAST WEEK</h3>
                                </div>
                            </div>
                            <div class="flex-grow-3">
                                <canvas id="activeUsersChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4" style="background-color: #1D1F36; border-radius: 20px;">
                        <div class="card-body text-white d-flex flex-column">
                            <h5 class="text-section mb-2">Statistics</h5>
                            <p class="total-active mb-3">Popular city's</p>
                            <div class="flex-grow-1">
                                <div class="city-bar d-flex align-items-center mb-3">
                                    <span class="city-name">Madrid</span>
                                    <div class="bar-wrapper">
                                        <div class="bar" data-value="1025" style="background-color: #4B48D2;"></div>
                                    </div>
                                    <span class="data-value">1025</span>
                                </div>
                                <div class="city-bar d-flex align-items-center mb-3">
                                    <span class="city-name">Seville</span>
                                    <div class="bar-wrapper">
                                        <div class="bar" data-value="436" style="background-color: #DBB7EE;"></div>
                                    </div>
                                    <span class="data-value">436</span>
                                </div>
                                <div class="city-bar d-flex align-items-center mb-3">
                                    <span class="city-name">Barcelona</span>
                                    <div class="bar-container flex-grow-1 mx-3">
                                        <div class="bar" data-value="312" style="background-color: #9A4CED;"></div>
                                    </div>
                                    <span class="data-value">312</span>
                                </div>
                                <div class="city-bar d-flex align-items-center mb-3">
                                    <span class="city-name">Málaga</span>
                                    <div class="bar-container flex-grow-1 mx-3">
                                        <div class="bar" data-value="198" style="background-color: #A5C7F0;"></div>
                                    </div>
                                    <span class="data-value">198</span>
                                </div>
                                <div class="city-bar d-flex align-items-center mb-3">
                                    <span class="city-name">Bilbao</span>
                                    <div class="bar-container flex-grow-1 mx-3">
                                        <div class="bar" data-value="78" style="background-color: #EEB7D3;"></div>
                                    </div>
                                    <span class="data-value">78</span>
                                </div>
                                <div class="city-bar d-flex align-items-center mb-3">
                                    <span class="city-name">Zaragoza</span>
                                    <div class="bar-container flex-grow-1 mx-3">
                                        <div class="bar" data-value="12" style="background-color: #F2CCD7;"></div>
                                    </div>
                                    <span class="data-value">12</span>
                                </div>
                                <div class="city-bar d-flex align-items-center mb-3">
                                    <span class="city-name">Valencia</span>
                                    <div class="bar-container flex-grow-1 mx-3">
                                        <div class="bar" data-value="8" style="background-color: #F2E1B2;"></div>
                                    </div>
                                    <span class="data-value">8</span>
                                </div>
                                <div class="city-bar d-flex align-items-center mb-3">
                                    <span class="city-name">Granada</span>
                                    <div class="bar-container flex-grow-1 mx-3">
                                        <div class="bar" data-value="2" style="background-color: #A5C7F0;"></div>
                                    </div>
                                    <span class="data-value">2</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4" style="background-color: #1D1F36; border-radius: 20px;">
                        <div class="card-body text-white">
                            <h5 class="mb-3">Popular Clubs</h5>
                            <div class="club-item d-flex align-items-center">
                                <img src="{{ asset('assets/template/icon/Profile.svg') }}" alt="Club"
                                    class="club-image mr-3">
                                <div class="club-info">
                                    <h6 class="mb-1" style="font-size: 18px;">Zoldic Club</h6>
                                    <p class="mb-0">
                                        <img src="{{ asset('assets/template/icon/Location.svg') }}" alt="location"
                                            class="location-icon">
                                        San Benedetto (AP) - Via G.Melozzi 2
                                    </p>
                                </div>
                                <span class="ml-auto count-event" style="color: #fff; white-space: nowrap;">16
                                    Events</span>
                            </div>
                            <hr class="club-separator">

                            <div class="club-item d-flex align-items-center">
                                <img src="{{ asset('assets/template/icon/Profile.svg') }}" alt="Club"
                                    class="club-image mr-3">
                                <div class="club-info">
                                    <h6 class="mb-1" style="font-size: 18px;">Zoldic Club</h6>
                                    <p class="mb-0">
                                        <img src="{{ asset('assets/template/icon/Location.svg') }}" alt="location"
                                            class="location-icon">
                                        San Benedetto (AP) - Via G.Melozzi 2
                                    </p>
                                </div>
                                <span class="ml-auto count-event" style="color: #fff; white-space: nowrap;">16
                                    Events</span>
                            </div>
                            <hr class="club-separator">

                            <div class="club-item d-flex align-items-center">
                                <img src="{{ asset('assets/template/icon/Profile.svg') }}" alt="Club"
                                    class="club-image mr-3">
                                <div class="club-info">
                                    <h6 class="mb-1" style="font-size: 18px;">Zoldic Club</h6>
                                    <p class="mb-0">
                                        <img src="{{ asset('assets/template/icon/Location.svg') }}" alt="location"
                                            class="location-icon">
                                        San Benedetto (AP) - Via G.Melozzi 2
                                    </p>
                                </div>
                                <span class="ml-auto count-event" style="color: #fff; white-space: nowrap;">16
                                    Events</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4" style="background-color: #1D1F36; border-radius: 20px;">
                        <div class="card-body text-white">
                            <h5 class="mb-3">Popular Events</h5>
                            <div class="club-item d-flex align-items-center">
                                <img src="{{ asset('assets/template/icon/Profile.svg') }}" alt="Club"
                                    class="club-image mr-3">
                                <div class="club-info">
                                    <h6 class="mb-1" style="font-size: 18px;">La Terrazza - Hola Chica</h6>
                                    <p class="mb-0">
                                        <img src="{{ asset('assets/template/icon/Location.svg') }}" alt="location"
                                            class="location-icon">
                                        San Benedetto (AP) - Via G.Melozzi 2
                                    </p>
                                </div>
                                <div class="ml-auto text-right">
                                    <span class="participant-number" style="color: #fff">1456</span>
                                    <span class="participant-text">Participant's</span>
                                </div>
                            </div>
                            <hr class="club-separator">

                            <div class="club-item d-flex align-items-center">
                                <img src="{{ asset('assets/template/icon/Profile.svg') }}" alt="Club"
                                    class="club-image mr-3">
                                <div class="club-info">
                                    <h6 class="mb-1" style="font-size: 18px;">La Terrazza - Hola Chica</h6>
                                    <p class="mb-0">
                                        <img src="{{ asset('assets/template/icon/Location.svg') }}" alt="location"
                                            class="location-icon">
                                        San Benedetto (AP) - Via G.Melozzi 2
                                    </p>
                                </div>
                                <div class="ml-auto text-right">
                                    <span class="participant-number" style="color: #fff">1456</span>
                                    <span class="participant-text">Participant's</span>
                                </div>
                            </div>
                            <hr class="club-separator">

                            <div class="club-item d-flex align-items-center">
                                <img src="{{ asset('assets/template/icon/Profile.svg') }}" alt="Club"
                                    class="club-image mr-3">
                                <div class="club-info">
                                    <h6 class="mb-1" style="font-size: 18px;">La Terrazza - Hola Chica</h6>
                                    <p class="mb-0">
                                        <img src="{{ asset('assets/template/icon/Location.svg') }}" alt="location"
                                            class="location-icon">
                                        San Benedetto (AP) - Via G.Melozzi 2
                                    </p>
                                </div>
                                <div class="ml-auto text-right">
                                    <span class="participant-number" style="color: #fff">1456</span>
                                    <span class="participant-text">Participant's</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bars = document.querySelectorAll('.bar');
            let maxValue = 0;

            bars.forEach(bar => {
                const value = parseInt(bar.getAttribute('data-value'));
                if (value > maxValue) {
                    maxValue = value;
                }
            });

            bars.forEach(bar => {
                const value = parseInt(bar.getAttribute('data-value'));
                const widthPercentage = (value / maxValue) * 100;

                const finalWidth = Math.max(widthPercentage, 2);

                bar.style.width = `${finalWidth}%`;
                bar.style.borderRadius = '5px';
            });
        });
    </script>
    <script>
        var ctx = document.getElementById('activeUsersChart').getContext('2d');
        var chartLine = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Active Users',
                    backgroundColor: 'rgba(122, 91, 255, 0.2)',
                    borderColor: 'rgba(122, 91, 255, 1)',
                    data: [3000, 1500, 1150, 2800, 2500, 3000, 3200]
                }]
            },
            options: {}
        });

        var ctx = document.getElementById('popularCitiesChart').getContext('2d');
        var chartBar = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Madrid', 'Seville', 'Barcelona', 'Málaga', 'Bilbao', 'Zaragoza', 'Valencia', 'Granada'],
                datasets: [{
                    label: 'Number of Visitors',
                    data: [1025, 436, 312, 198, 78, 12, 8, 2],
                    backgroundColor: [
                        '#6251DD', '#C292F4', '#A46DF9', '#D1B4FB', '#FFD0F3', '#FFD7E8', '#FFE4D4',
                        '#FFECE6'
                    ],
                    borderColor: '#1D1F36',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // Set the axis to horizontal
                scales: {
                    x: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
@endsection
