<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>PC1st - Backend</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

 
        <!-- Favicon -->
        <link href="{{env('APP_URL')}}/img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{env('APP_URL')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="{{env('APP_URL')}}/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{env('APP_URL')}}/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{env('APP_URL')}}/css/style.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container-fluid position-relative d-flex p-0">
            <!-- Spinner Start -->
            <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->

            <!-- Sidebar Start -->
            <div class="sidebar pe-4 pb-3">
                @include('layouts.sidebar')
            </div>
            <!-- Sidebar End -->

            <!-- Content Start -->
            <div class="content">
            <!-- Navbar Start -->
                @include('layouts.navbar')
            <!-- Navbar End -->

            <!-- Page Start -->
                @yield('content')
            <!-- Page End -->
            
            <!-- Widgets Start -->
                @include('layouts.widgets')
            <!-- Widgets End -->
            <footer>
                @include('layouts.footer')
            </footer>
            </div>
            <!-- Content End -->
            
            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
                    </div>
 
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{env('APP_URL')}}/lib/chart/chart.min.js"></script>
        <script src="{{env('APP_URL')}}/lib/easing/easing.min.js"></script>
        <script src="{{env('APP_URL')}}/lib/waypoints/waypoints.min.js"></script>
        <script src="{{env('APP_URL')}}/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="{{env('APP_URL')}}/lib/tempusdominus/js/moment.min.js"></script>
        <script src="{{env('APP_URL')}}/lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="{{env('APP_URL')}}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="{{env('APP_URL')}}/js/main.js"></script>
    </body>
</html>
