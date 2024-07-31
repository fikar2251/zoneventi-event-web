<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>

    @include('partials.styles')
</head>

<body>
    <div class="container-fluid">
        <button class="hamburger" id="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
        <div class="row">
            <div class="sidebar-overlay" id="sidebar-overlay"></div>
            @include('partials.sidebar')

            @yield('content')
        </div>
    </div>
    {{-- @include('partials.footer') --}}

    @include('partials.scripts')
</body>

</html>
