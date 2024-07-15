<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/login/image/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/template/css/style.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item text-center">
                            <img src="{{ asset('assets/template/img/Profile.jpg') }}" alt="user-img" title="Mat Helme"
                                class="rounded-circle profile-img">
                            <div>
                                <h2 class="user-name">Adom Shafi</h2>
                            </div>
                            <p class="text-muted left-user-info">Super Admin</p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="{{ asset('assets/template/icon/Home.svg') }}" alt="Home" class="nav-icon">
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="{{ asset('assets/template/icon/Club.svg') }}" alt="All Clubs"
                                    class="nav-icon">
                                <span>All Clubs</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="{{ asset('assets/template/icon/Users.svg') }}" alt="Users List"
                                    class="nav-icon">
                                <span>Users List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="{{ asset('assets/template/icon/UsersList.svg') }}" alt="All Admins"
                                    class="nav-icon">
                                <span>All Admins</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="{{ asset('assets/template/icon/Notification.svg') }}" alt="Notifications"
                                    class="nav-icon">
                                <span>Notifications</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="{{ asset('assets/template/icon/Setting.svg') }}" alt="Settings"
                                    class="nav-icon">
                                <span>Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link logout" href="#">
                                <img src="{{ asset('assets/template/icon/Login.svg') }}" alt="Log Out"
                                    class="nav-icon">
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 col-lg-10 px-md-4">
                <div class="row" style="margin-top: 60px">
                    <div class="col-md-12">
                        <div class="card mb-4" style="background-color: #1D1F36; border-radius: 23px">
                            <div class="card-body text-white">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5>Pending Request</h5>
                                        <p class="total-pending">10 club request pending</p>
                                    </div>
                                    <div>
                                        <a href="">
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
                        <div class="card mb-4" style="background-color: #1D1F36; border-radius: 20px; height: 400px;">
                            <div class="card-body text-white d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="left-section">
                                        <h5 class="text-section">Active users</h5>
                                        <p class="total-active">6,345</p>
                                    </div>
                                    <div class="right-section">
                                        <h5 class="text-green">1.3% <img
                                                src="{{ asset('assets/template/icon/Growth-Indicator.svg') }}"
                                                alt="" style="width: 21px"></h5>
                                        <h3 class="vs-last-week">VS LAST WEEK</h3>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <canvas id="activeUsersChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4" style="background-color: #1D1F36; border-radius: 20px; height: 400px;">
                            <div class="card-body text-white d-flex flex-column">
                                <h5 class="text-section mb-2">Statistics</h5>
                                <p class="total-active mb-3">Popular city's</p>
                                <div class="flex-grow-1">
                                    <canvas id="popularCitiesChart"></canvas>
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
                                    <img src="{{ asset('assets/template/img/Profile.jpg') }}" alt="Club"
                                        class="club-image mr-3">
                                    <div class="club-info">
                                        <h6 class="mb-1" style="font-size: 20px;">Zoldic Club</h6>
                                        <p class="mb-0">
                                            <img src="{{ asset('assets/template/icon/Location.svg') }}"
                                                alt="location" class="location-icon">
                                            San Benedetto (AP) - Via G.Melozzi 2
                                        </p>
                                    </div>
                                    <span class="ml-auto count-event" style="color: #fff;">16 Events</span>
                                </div>
                                <hr class="club-separator">

                                <div class="club-item d-flex align-items-center">
                                    <img src="{{ asset('assets/template/img/Profile.jpg') }}" alt="Club"
                                        class="club-image mr-3">
                                    <div class="club-info">
                                        <h6 class="mb-1">Zoldic Club</h6>
                                        <p class="mb-0">
                                            <img src="{{ asset('assets/template/icon/Location.svg') }}"
                                                alt="location" class="location-icon">
                                            San Benedetto (AP) - Via G.Melozzi 2
                                        </p>
                                    </div>
                                    <span class="ml-auto count-event" style="color: #fff;">16 Events</span>
                                </div>
                                <hr class="club-separator">

                                <div class="club-item d-flex align-items-center">
                                    <img src="{{ asset('assets/template/img/Profile.jpg') }}" alt="Club"
                                        class="club-image mr-3">
                                    <div class="club-info">
                                        <h6 class="mb-1">Zoldic Club</h6>
                                        <p class="mb-0">
                                            <img src="{{ asset('assets/template/icon/Location.svg') }}"
                                                alt="location" class="location-icon">
                                            San Benedetto (AP) - Via G.Melozzi 2
                                        </p>
                                    </div>
                                    <span class="ml-auto count-event" style="color: #fff;">16 Events</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4" style="background-color: #1D1F36; border-radius: 20px;">
                            <div class="card-body text-white">
                                <h5 class="mb-3">Popular Events</h5>
                                <div class="club-item d-flex align-items-center">
                                    <img src="{{ asset('assets/template/img/Profile.jpg') }}" alt="Club"
                                        class="club-image mr-3">
                                    <div class="club-info">
                                        <h6 class="mb-1" style="font-size: 20px;">La Terrazza - Hola Chica</h6>
                                        <p class="mb-0">
                                            <img src="{{ asset('assets/template/icon/Location.svg') }}"
                                                alt="location" class="location-icon">
                                            San Benedetto (AP) - Via G.Melozzi 2
                                        </p>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="participant-number">1456</span>
                                        <span class="participant-text">Participant's</span>
                                    </div>
                                </div>
                                <hr class="club-separator">

                                <div class="club-item d-flex align-items-center">
                                    <img src="{{ asset('assets/template/img/Profile.jpg') }}" alt="Club"
                                        class="club-image mr-3">
                                    <div class="club-info">
                                        <h6 class="mb-1" style="font-size: 20px;">La Terrazza - Hola Chica</h6>
                                        <p class="mb-0">
                                            <img src="{{ asset('assets/template/icon/Location.svg') }}"
                                                alt="location" class="location-icon">
                                            San Benedetto (AP) - Via G.Melozzi 2
                                        </p>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="participant-number">1456</span>
                                        <span class="participant-text">Participant's</span>
                                    </div>
                                </div>
                                <hr class="club-separator">

                                <div class="club-item d-flex align-items-center">
                                    <img src="{{ asset('assets/template/img/Profile.jpg') }}" alt="Club"
                                        class="club-image mr-3">
                                    <div class="club-info">
                                        <h6 class="mb-1" style="font-size: 20px;">La Terrazza - Hola Chica</h6>
                                        <p class="mb-0">
                                            <img src="{{ asset('assets/template/icon/Location.svg') }}"
                                                alt="location" class="location-icon">
                                            San Benedetto (AP) - Via G.Melozzi 2
                                        </p>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="participant-number">1456</span>
                                        <span class="participant-text">Participant's</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
</body>

</html>
