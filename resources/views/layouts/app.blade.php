<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    @include('partials.styles')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar')

            @yield('content')
        </div>
    </div>

    @include('partials.scripts')
</body>

</html>