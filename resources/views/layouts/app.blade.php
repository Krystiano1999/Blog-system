<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Artykuły SEO')</title>

    <!-- Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'Default description for your blog.')">
    <meta name="keywords" content="@yield('meta_keywords', 'default, keywords, for, your, blog')">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        
    <!-- Custom CSS (optional) -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Navigation Menu -->
    @include('partials.menu')

    @yield('content')
    
    <!-- Footer (optional) -->
    <footer class="footer bg-dark text-white text-center py-3 mt-4">
        <div class="container">
            &copy; {{ date('Y') }} Artykuły SEO. All rights reserved. Designed <a href="">KJ</a>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    <!-- Custom JS  -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
