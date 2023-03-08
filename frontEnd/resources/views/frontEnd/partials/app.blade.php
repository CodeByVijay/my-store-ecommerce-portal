<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My Store || @yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontEnd/assets/images/favicon.png')}}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontEnd/assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/assets/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/assets/css/vendor/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/assets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/assets/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/assets/css/vendor/jquery-uassets/css/vendor/sal.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/assets/css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/assets/css/vendor/base.css')}}">
    <link rel="stylesheet" href="{{asset('frontEnd/assets/css/style.min.css')}}">
    @stack('style')
</head>


<body>
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    @include('frontEnd.partials.header')
    <!-- Start Header End -->

    @yield('main-content')


    {{-- Service Area --}}
    @include('frontEnd.partials.service-area')
    {{-- Service Area End --}}

    <!-- Start Footer Area  -->
    @include('frontEnd.partials.footer')
    <!-- End Footer Area  -->

    <!-- Product Quick View Modal Start -->
    @include('frontEnd.partials.product-quick-view')
    <!-- Product Quick View Modal End -->

    <!-- Header Search Modal End -->
    @include('frontEnd.partials.header-search')
    <!-- Header Search Modal End -->


    {{-- cart dropdown area --}}
    @include('frontEnd.partials.cart-dropdown')
    {{-- cart dropdown area End --}}


    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{asset('frontEnd/assets/js/vendor/modernizr.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('frontEnd/assets/js/vendor/jquery.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('frontEnd/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('frontEnd/assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontEnd/assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{asset('frontEnd/assets/js/vendor/js.cookie.js')}}"></script>
    <!-- <script src="{{asset('frontEnd/assets/js/vendor/jquery.style.switcher.js')}}"></script> -->
    <script src="{{asset('frontEnd/assets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontEnd/assets/js/vendor/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('frontEnd/assets/js/vendor/sal.js')}}"></script>
    <script src="{{asset('frontEnd/assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontEnd/assets/js/vendor/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('frontEnd/assets/js/vendor/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontEnd/assets/js/vendor/counterup.js')}}"></script>
    <script src="{{asset('frontEnd/assets/js/vendor/waypoints.min.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('frontEnd/assets/js/main.js')}}"></script>
    @stack('script')

</body>

</html>
