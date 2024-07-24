@php
    $role = 'owner';
@endphp

<nav class="col-md-2 d-none d-md-block sidebar fixed-sidebar" id="sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item text-center">
                <img src="{{ asset('assets/template/icon/Profile.svg') }}" alt="user-img" title="Mat Helme"
                    class="rounded-circle profile-img">
                <div>
                    <h2 class="user-name">Adom Shafi</h2>
                </div>
                @if ($role == 'superadmin')
                    <p class="text-muted left-user-info">Superadmin</p>
                @else
                    <p class="text-muted left-user-info">Club Id: <span style="color: #fff">1930XL6</span></p>
                @endif
            </li>
            @if ($role == 'superadmin')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <img src="{{ asset('assets/template/icon/Home.svg') }}" alt="Home" class="nav-icon">
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('clubs-index', 'club-create', 'club-detail', 'event-create') ? 'active' : '' }}"
                        href="{{ route('clubs-index') }}">
                        <img src="{{ asset('assets/template/icon/Club.svg') }}" alt="All Clubs" class="nav-icon">
                        <span>All Clubs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('users-list') ? 'active' : '' }}"
                        href="{{ route('users-list') }}">
                        <img src="{{ asset('assets/template/icon/Users.svg') }}" alt="Users List" class="nav-icon">
                        <span>Users List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admins-list', 'admins-create') ? 'active' : '' }}"
                        href="{{ route('admins-list') }}">
                        <img src="{{ asset('assets/template/icon/UsersList.svg') }}" alt="All Admins" class="nav-icon">
                        <span>All Admins</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('notifications') ? 'active' : '' }}"
                        href="{{ route('notifications') }}">
                        <img src="{{ asset('assets/template/icon/Notification.svg') }}" alt="Notifications"
                            class="nav-icon">
                        <span>Notifications</span>
                    </a>
                </li>
                <li class="nav-item settings">
                    <a class="nav-link {{ request()->routeIs('settings') ? 'active' : '' }}"
                        href="{{ route('settings') }}">
                        <img src="{{ asset('assets/template/icon/Setting.svg') }}" alt="Settings" class="nav-icon">
                        <span>Settings</span>
                    </a>
                </li>
            @endif
            @if ($role == 'owner')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('club-event-owner') ? 'active' : '' }}"
                        href="{{ route('club-event-owner') }}">
                        <img src="{{ asset('assets/template/icon/Club.svg') }}" alt="Club Events" class="nav-icon">
                        <span>Club Events</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('club-setting-owner') ? 'active' : '' }}"
                        href="{{ route('club-setting-owner') }}">
                        <img src="{{ asset('assets/template/icon/Setting.svg') }}" alt="Club Settings"
                            class="nav-icon">
                        <span>Club Settings</span>
                    </a>
                </li>
                <li class="nav-item settings">
                    <a class="nav-link {{ request()->routeIs('admin-list-owner') ? 'active' : '' }}"
                        href="{{ route('admin-list-owner') }}">
                        <img src="{{ asset('assets/template/icon/UsersList.svg') }}" alt="All Admins" class="nav-icon">
                        <span>All Admins</span>
                    </a>
                </li>
            @endif
            <li class="nav-item logout">
                <a class="nav-link" href="#">
                    <img src="{{ asset('assets/template/icon/Login.svg') }}" alt="Log Out" class="nav-icon">
                    <span style="color: #FF0000">Log Out</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
