<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    {{-- Required meta tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="fr">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('seo')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/vendor/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/sweetalert.css') }}">

    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet'>


    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/template/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/template/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/template/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/template/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/template/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/template/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('vendor/template/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v2.2.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->




    @stack('css')
</head>
<body>
    @include(front_view_path('partials._header'))

    @yield('hero')

    <main id="app">
        @yield('content')
    </main>
    @include(front_view_path('partials._footer'))


    <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/template/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/template/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('vendor/template/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('vendor/template/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('vendor/template/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/template/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('vendor/template/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('vendor/template/assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('vendor/template/assets/js/main.js') }}"></script>

<script src="{{ asset('js/vendor/sweetalert.min.js') }}"></script>

<script src="{{ asset('js/vendor/helpers.js') }}"></script>

{{-- <script src="{{ asset('js/vendor/fontawesome.js') }}"></script> --}}
<script src="{{ asset('js/vendor/larails-alert.js') }}"></script>
@stack('js')
@flashy()

@include('cookie-consent::index')

{{-- add livenews extension here --}}

</body>
</html>
