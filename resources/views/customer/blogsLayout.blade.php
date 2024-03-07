<!DOCTYPE HTML>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}" />
    <style>
        :root {
            --menu: #3d5396;
            --footer: #f5f5dc;
            --logo_border: #faf7f7;
            --home_buttons: #334780;
            --contact_button: #334780;
            --menu_social_media: #fff;
        }
    </style>
    <link rel="preload" href="{{asset('css/animate.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('css/et-lineicons.css')}}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('css/et-lineicons.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('css/themify-icons.css')}}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    </noscript>

    @if (app()->getLocale() == 'ar')
    <link rel="preload" href="{{asset('css/bootstrapRTL.min.css')}}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('css/bootstrapRTL.min.css')}}">
    </noscript>
    @else
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    @endif
    <link rel="preload" href="{{asset('css/magnific-popup.css')}}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    </noscript>

    <link rel="preload" href="{{asset('css/owl.carousel.min.css')}}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('css/owl.theme.default.min.css')}}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('css/flexslider.css')}}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('css/flexslider.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('css/font-awesome.min.css')}}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    </noscript>
    <link href="{{asset('css/fonts.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @if (app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{asset('css/styleRTL.css')}}">
    @endif
    <link rel="stylesheet" href="{{asset('noty/noty.css')}}">
    <script src="{{asset('noty/noty.min.js')}}" defer></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
    <![endif]-->
    <style>
        .gorman-main {
            width: 100%;
        }
    </style>
    @yield('styles')
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <!-- Start progress-wrapp scroll-button -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Mouse cursor -->
    <div class="mouse-cursor cursor-outer d-none d-md-block"></div>
    <div class="mouse-cursor cursor-inner d-none d-md-block"></div>
    <!-- Main -->
    <div class="gorman-page">
        <!-- Main -->
        <div class="gorman-main">
            @yield('content')
            <!-- Footer -->
            <div class="footer2 position-relative">
                <div class="container-fluid">
                    <div class="sub-footer">
                        <div class="row">
                            <div class="col-12 col-md-12 lr-left">
                                <p>2022 All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript -->
    <script>
        var owlRTL = false;
        @if (app() -> getLocale() == 'ar')
            owlRTL = true;
        @endif
    </script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.flexslider-min.js')}}"></script>
    <script src="{{asset('js/sticky-kit.min.js')}}"></script>
    <script src="{{asset('js/isotope.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/owlcarousel2-filter.min.js')}}"></script>
    @include('partials._session')
    <script src="{{asset('js/custom.js')}}"></script>
    @yield('scripts')
</body>

</html>