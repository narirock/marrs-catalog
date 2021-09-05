<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#fbb900">
    @yield('meta')
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ env('APP_URL') }}/site/img/favicon.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- MASTER STYLE CSS file -->
    <link rel="stylesheet" href="/site/css/main.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    @stack("styles")

</head>

<body>
    <x-marrs-catalog-main-nav />
    {{-- <x-marrs-catalog-cart-slidecart /> --}}
    <div class="overlay-menu"></div>
    @yield('content')
    <x-marrs-catalog-main-footer />

    @stack('modals')
    <!-- Scripts Files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/site/vendor/bootstrap5/js/popper.min.js"></script>
    <script src="/site/vendor/bootstrap5/js/bootstrap.min.js"></script>

    <script src="/site/js/webslidemenu.js"></script>
    <script src="/site/js/swiper-bundle.min.js"></script>
    <script src="/site/vendor/owl/owl.carousel.min.js"></script>

    @stack('scripts')
    <script src="/site/js/main.js"></script>


</body>

</html>
