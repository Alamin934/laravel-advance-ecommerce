<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend')}}/styles/bootstrap4/bootstrap.min.css">
    <link href="{{ asset('assets/frontend') }}/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/frontend') }}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/frontend') }}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/plugins/slick-1.8.0/slick.css">
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/css/toastr.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/styles/responsive.css">
    @stack('style')

    <title>{{ config('app.name', 'Laravel E-Commerce') }}</title>

    <!-- Fonts -->
    {{--
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>
    <div class="super_container">
        <!-- Header -->
        <header class="header">
            <!-- TopBar & Header Main -->
            @include('frontend.partials.header-topbar')

            {{-- Main Navigation --}}
            @yield('main-nav')

            <!-- Mobile Menu -->
            @include('frontend.partials.mobile-menu')
        </header>

        <!-- Main Content -->
        <main>
            @yield('main-content')

            @if (request()->routeIs('dashboard.*'))
            {{-- User Dashboard --}}
            @include('frontend.dashboard.dashboard-layout')
            @endif
        </main>

        @if(!request()->routeIs('dashboard.*'))
        <!-- Newsletter -->
        @include('frontend.partials.newsletter')
        @endif

        <!-- Footer -->
        @include('frontend.partials.footer')

        <!-- Copyright -->
        @include('frontend.partials.copyright')

    </div>

    <script src="{{ asset('assets/frontend') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/styles/bootstrap4/popper.js"></script>
    <script src="{{ asset('assets/frontend') }}/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/plugins/greensock/TweenMax.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/plugins/greensock/TimelineMax.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/plugins/greensock/animation.gsap.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="{{ asset('assets/frontend') }}/plugins/slick-1.8.0/slick.js"></script>
    <script src="{{ asset('assets/frontend') }}/plugins/easing/easing.js"></script>
    <script src="{{ asset('assets/admin') }}/js/toastr.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/sweetalert.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/custom.js"></script>

    @stack('scripts')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script> --}}
    <script>
        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
    </script>
    <script>
        // Toaster
        @if (session()->has('message'))
            var type = "{{session()->get('alert-type', 'info')}}";
            switch (type) {
                case 'info':
                    toastr.info("{{session()->get('message')}}");
                    break;
                case 'success':
                    toastr.success("{{session()->get('message')}}");
                    break;
                case 'warning':
                    toastr.warning("{{session()->get('message')}}");
                    break;
                case 'error':
                    toastr.error("{{session()->get('message')}}");
                    break;
            }
        @endif       
    </script>

</body>


</html>