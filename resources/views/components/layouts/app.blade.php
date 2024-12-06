<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Productos Naturales Sosa - Inicio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo-sosa.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo-sosa.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/odometer.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/default.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
</head>

<body class="bg-slate-200 dark:bg-slate-700">
        <!-- Pre-loader-start -->
        <div id="preloader">
            <div class="tg-cube-grid">
                <div class="tg-cube tg-cube1"></div>
                <div class="tg-cube tg-cube2"></div>
                <div class="tg-cube tg-cube3"></div>
                <div class="tg-cube tg-cube4"></div>
                <div class="tg-cube tg-cube5"></div>
                <div class="tg-cube tg-cube6"></div>
                <div class="tg-cube tg-cube7"></div>
                <div class="tg-cube tg-cube8"></div>
                <div class="tg-cube tg-cube9"></div>
            </div>
        </div>
        <!-- Pre-loader-end -->
    
        <!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->
    @livewire('partials.navbar')
    <main>
        {{ $slot }}

    </main>
    @livewire('partials.footer')
   
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.odometer.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.appear.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.paroller.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.easypiechart.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.inview.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.easing.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/svg-inject.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jarallax.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/slick.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/validator.js') }}" defer></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}" defer></script>
    <script src="{{ asset('assets/js/wow.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/main.js') }}" defer></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            SVGInject(document.querySelectorAll("img.injectable"));
        });
    </script>
</body>

</html>
