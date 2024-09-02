<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Panel Admina - Artykuły SEO')</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom Admin CSS -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Navigation -->
    @if (!Request::is('login') && !Request::is('password/reset*'))
        @include('admin.partials.navbar')
    @endif

    <div class="container-fluid mx-0 px-0">
        @yield('content')
    </div>

    <!-- Footer -->
    @if (!Request::is('login') && !Request::is('password/reset*'))
        <footer class="footer bg-dark text-white text-center py-3">
            <div class="container">
                &copy; {{ date('Y') }} Panel Admina - Artykuły SEO. All rights reserved.
            </div>
        </footer>
    @endif

    <!-- Bootstrap JS and dependencies -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
