<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>


    <meta charset="utf-8">
    <link rel="icon" href="{{ asset($info->logo) }}" type="image/png" sizes="16x16">
    <title> @yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $info->description }}">
    <meta name="keywords" content="Buisness Secrets">
    <meta name="author" content="">

    <link href="{{ asset($info->logo) }}" rel="shortcut icon" type="image/png">
    <link href="{{ asset($info->logo) }}" rel="apple-touch-icon">
    <link href="{{ asset($info->logo) }}" rel="apple-touch-icon" sizes="72x72">
    <link href="{{ asset($info->logo) }}" rel="apple-touch-icon" sizes="114x114">
    <link href="{{ asset($info->logo) }}" rel="apple-touch-icon" sizes="144x144">

    <link href="{{ asset('fonts/fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.css') }}"
        rel="stylesheet">
    <!-- CSS Files
    ================================================== -->
    <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap" />
    <link href="{{ asset('home/css/bootstrap-grid.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-grid" />
    <link href="{{ asset('home/css/bootstrap-reboot.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-reboot" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    @if (app()->getLocale() == 'ar')
        <link rel="preload" href="{{ asset('css/bootstrapRTL.min.css') }}" as="style"
            onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link rel="stylesheet" href="{{ asset('css/bootstrapRTL.min.css') }}">
        </noscript>
    @endif
    <link href="{{ asset('home/css/plugins.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('home/css/color.css') }}" rel="stylesheet" type="text/css">

    <!-- custom background -->
    <link rel="stylesheet" href="{{ asset('home/css/bg.css') }}" type="text/css">

    {{-- <link href="{{ asset('css/fonts.css') }}" rel="stylesheet"> --}}
    <!-- color scheme -->

    <style>
        :root {
            --primary-color-1: {{ $color->menu }};
            --menu: {{ $color->menu }};
            --footer: {{ $color->footer }};
            --logo_border: {{ $color->logo_border }};
            --home_buttons: {{ $color->home_buttons }};
            --contact_button: {{ $color->contact_button }};
            --menu_social_media: {{ $color->menu_social_media }};
        }

        li {
            font-size: 18px;
        }
    </style>

    <!-- revolution slider -->
    <link rel="stylesheet" href="{{ asset('home/rs-plugin/css/settings.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/rev-settings.css') }}" type="text/css">



    <link rel="stylesheet" href="{{ asset('noty/noty.css') }}">
    <script src="{{ asset('noty/noty.min.js') }}" defer></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
    <![endif]-->

    @if (app()->getLocale() == 'ar')
        <link
            href="{{ asset('fonts/Cairo/Cairo-VariableFont_slnt,wght.ttf') }},wght@0,400;0,700;1,400;1,700&display=swap"
            rel="stylesheet">
        <style>
            #back-to-top {
                left: 40px;
                right: unset;
            }

            #gallery .item {
                padding: 0;
            }

            .post-text {
                padding-left: 0 !important;
                padding-right: 100px !important;
            }

            .blog-list .btn-more {
                float: left
            }

            .btn-line::after,
            a.btn-line::after {

                margin-left: 10px;
                margin-right: 10px;
                -webkit-transform: scaleX(-1);
                transform: scaleX(-1);
            }

            .owl-carousel {
                direction: ltr !important;
            }

            .de_light a.btn-big {
                padding-right: 30px !important;
                padding-left: 50px !important;
            }

            a {
                font-family: 'Cairo' !important;
            }

            body {

                font-family: 'Cairo' !important;
            }

            h4,
            h5,
            h6,
            .h4,
            .h5,
            .h6 .h1,
            .h2,
            .h3,
            h1,
            h2,
            h3 {
                font-family: 'Cairo' !important;
            }

            p {
                font-family: 'Cairo' !important;
                font-size: 15px !important;


            }

            span {
                font-family: 'Cairo' !important;
                font-size: 15px !important;

            }
        </style>
        <style>
            .de-navbar-left header #mainmenu>li {
                letter-spacing: 2px;
            }

            * {
                letter-spacing: 0px;
            }

            #filters a,
            a,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            span,
            p {

                letter-spacing: 0px !important;
            }
        </style>
    @else
        {{-- <link href="{{ asset('fonts/morn/Morn-Thin.otf') }},wght@0,400;0,700;1,400;1,700&display=swap"
            rel="stylesheet"> --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;700&display=swap" rel="stylesheet">
        <style>
            a {
                font-family: 'Noto Sans', sans-serif !important;


            }


            body {}

            h3 {
                letter-spacing: 1px;
            }

            h4,
            h5,
            h6,
            .h4,
            .h5,
            .h6 .h1,
            .h2,
            .h3,
            h1,
            h2,
            h3 {
                font-family: 'Noto Sans', sans-serif !important;


            }

            p {
                font-family: 'Noto Sans', sans-serif !important;
                font-size: 15px !important;

            }

            span {
                font-family: 'Noto Sans', sans-serif !important;
                font-size: 15px !important;

            }
        </style>
    @endif
    <style>
        #back-to-top::before {
            color: #e4d9d9;
        }

        #back-to-top {
            bottom: 70px;

        }

        * {
            text-align: justify;
        }

        p,
        {
        color: #606060 !important;
        text-align: justify;
        }

        address span strong {
            width: 100px;
        }


        .blog-list .date-box .day,
        .blog-read .date-box .day {
            padding-top: 20px;
        }

        .de_light.de-navbar-left header #mainmenu>li {
            padding: 7px
        }

        .de-post-poster .d-overlay {
            background: rgba(0, 0, 0, 0.2);

        }

        .de-post-poster .d-content h3,
        .de-post-poster .d-date {
            color: #fff
        }

        #filters a.selected {
            color: #fff;
        }

        .de_tab.tab_steps .de_nav li span {
            color: #fff;
        }

        a.btn-ho:hover {
            color: #fff
        }

        a.btn-h:hover {
            border-color: #fff
        }

        @media screen and (max-width:992px) {

            .de_light .btn-line,
            .de_light a.btn-line {
                margin-bottom: 35px !important;
            }

            .img-responsive {
                margin-top: 30px !important;
            }

            .related-blogs {
                padding-top: 75px !important;
            }

            .de-navbar-left #subheader h1 {
                margin-right: 80px;
            }

            .animated {
                padding-left: 25px;
                padding-right: 40px;
            }


        }

        @media screen and (max-width: 400px) {
            .fh-content{
                display: flex !important;
            }
            .img-responsive {
                margin-top: 50px !important;
            }


            .post-text {
                padding-right: 0px !important;
            }

            .post-text h2 {
                padding-right: 100px !important;
            }

            .post-content p {
                margin-top: 50px;
            }
        }
    </style>
    <style>
        /* toggle */
        .switchToggle {
            text-align: center !important;
            text-align: -webkit-center !important;
            text-align: -moz-center !important;
        }

        .switchToggle input[type=checkbox] {
            height: 0;
            width: 0;
            visibility: hidden;
            position: absolute;
        }

        .switchToggle label {
            cursor: pointer;
            text-indent: -9999px;
            width: 70px;
            max-width: 70px;
            height: 30px;
            background: #d1d1d1;
            display: block;
            border-radius: 100px;
            position: relative;
        }

        .switchToggle label:after {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 26px;
            height: 26px;
            background: #fff;
            border-radius: 90px;
            transition: 0.3s;
        }

        .switchToggle input:checked+label,
        .switchToggle input:checked+input+label {
            background: #2f529f;
        }

        .switchToggle label,
        .switchToggle input+label {
            background: #2f529f;
        }

        .switchToggle input+label:before,
        .switchToggle input+input+label:before {
            content: 'EN';
            position: absolute;
            top: 5px;
            left: 35px;
            width: 26px;
            height: 26px;
            border-radius: 90px;
            transition: 0.3s;
            text-indent: 0;
            color: #fff;
        }

        .switchToggle input:checked+label:before,
        .switchToggle input:checked+input+label:before {
            content: 'AR';
            position: absolute;
            top: 5px;
            left: 10px;
            width: 26px;
            height: 26px;
            border-radius: 90px;
            transition: 0.3s;
            text-indent: 0;
            color: #fff;
        }

        .switchToggle input:checked+label:after,
        .switchToggle input:checked+input+label:after {
            left: calc(100% - 2px);
            transform: translateX(-100%);
        }

        .switchToggle label:active:after {
            width: 60px;
        }

        .toggle-switchArea {
            margin: 10px 0 10px 0;
        }
    </style>
    <style>
        @media screen and (max-width: 767px) {
            .de-navbar-left .inner-padding {
                padding: 0px;
                padding-bottom: 25px;
                padding-top: 45px;
            }
        }

        @media screen and (max-width: 992px) {
            .switchToggle label {
                margin-left: 35px;
            }

            header.side-header .social-icons-2 {}

            header.side-header,
            .de_light header.side-header {
                position: absolute !important;
                display: block;
                height: 60px !important;
                top: 0;
            }
        }

        @media screen and (max-width: 460px) {

            .de-navbar-left footer {
                padding: 70px 25px 0;
            }
        }
    </style>
    @yield('styles')
</head>

<body class="de_light de-navbar-left">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5MBFDSH7" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="wrapper" class="
    @if (app()->getLocale() == 'ar') rtl @endif
    ">
        <div class="container-fluid">
            <div class="row g-0">
                <div id="de-sidebar" class="col-lg-2 col-md-12">

                    <!-- header begin -->
                    <header class="side-header" style="height: 100vh">

                        <!-- small button begin -->
                        <span id="menu-btn"></span>
                        <!-- small button close -->


                        <!-- logo begin -->
                        <div id="logo" style="padding-top: 0px !important ;padding: 0 20px; ">
                            <a href="{{ route('home') }}" style="text-align: center">
                                <img class="logo" src="{{ asset($info->logo) }}" alt=""
                                    style="  width: 100% !important;">
                                <img class="logo-2" src="{{ asset('logo.png') }}"
                                    style="    width: unset !important; " alt="">
                            </a>
                        </div>
                        <!-- logo close -->



                        <!-- mainmenu begin -->
                        <nav>
                            <ul id="mainmenu" style="font-size:20px;">
                                <li style="font-size:18px;"><a href="{{ route('home') }}">@lang('site.home')</a></li>
                                <li style="font-size:18px;"><a href="{{ route('services') }}">@lang('site.services')</a>
                                </li>
                                {{-- <li><a href="{{ route('home') }}#portfolio">@lang('site.team_experience')</a></li> --}}

                                <li style="font-size:18px;"><a href="{{ route('about') }}">@lang('site.about')</a></li>
                                <li style="font-size:18px;"><a href="{{ route('blogs') }}">@lang('site.blog')</a></li>
                                <li style="font-size:18px;"><a href="{{ route('contact') }}">@lang('site.contact')</a>
                                </li>
                                {{-- <li><a href="{{ route('login') }}">@lang('site.login')</a></li> --}}
                                <li style="z-index: 9999;">
                                    <div class="switchToggle">
                                        <input type="checkbox" id="switch" class="switchToggle-a"
                                            @if (app()->getLocale() == 'ar') checked @endif>
                                        <label for="switch">Toggle</label>
                                    </div>
                                </li>
                            </ul>
                        </nav>


                        <div class="h-content"
                            style="position: absolute;
                        bottom: 15px;
                        right: 0;
                        left: 0;
                        text-align: center;
                        margin: 0 auto;
                        z-index: 500000;
                        width: 100%;">
                            <div class="social-icons-2" style=" margin-top: 20px !important;">
                                @foreach ($socialMedias->take(4) as $socialMedia)
                                    <a href="{{ $socialMedia->link }}" target="_blank"
                                        style="color: #2f419f;
                                        opacity: unset;"><i
                                            class="fa-brands {{ $socialMedia->icon }}"></i></a>
                                @endforeach
                            </div>
                            <div class="social-icons-2" style=" margin-top: 0px !important;">
                                @foreach ($socialMedias->take(-4) as $socialMedia)
                                    <a href="{{ $socialMedia->link }}" target="_blank"
                                        style="color: #2f419f;
                                        opacity: unset;"><i
                                            class="fa-brands {{ $socialMedia->icon }}"></i></a>
                                @endforeach
                            </div>


                        </div>


                    </header>
                    <!-- header close -->


                </div>

                <div id="main" class="col-lg-10 col-md-12 offset-lg-2 offset-md-0">
                    @yield('content')



                    <!-- footer begin -->
                    <footer class="light">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <img src="" class="logo-small" alt=""
                                            style="width: 80% !important;"><br>

                                    </div>
                                    <h6 style="font-size: 13px !important;">
                                      </h6>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">

                                    <h3>@lang('site.contact_us')</h3>
                                    <div style="margin-top: 27px;">
                                        <div class="widget widget-address">
                                            <address>
                                                <span><i class="fa-solid fa-phone fa-2l"></i> &nbsp; &nbsp;<a
                                                        href="tel:{{ $contactInfo->mobile }}">{{ $contactInfo->mobile }}</a></span>
                                                <span><i class="fa-brands fa-whatsapp fa-xl"></i> &nbsp; &nbsp; <a
                                                        href="https://api.whatsapp.com/send?phone={{ $contactInfo->whatsapp }}"
                                                        target="_blank">{{ $contactInfo->whatsapp }}</a></span>
                                                <span><i class="fa-regular fa-envelope fa-xl"></i> &nbsp; &nbsp;
                                                    <a
                                                        href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a>
                                                </span>
                                                <div class="h-content fh-content" style="
                                                text-align: center;
                                                margin: 0 auto;
                                                width: 100%;justify-content: center;
                                                display: none;
                                                font-size: 20px;">
                                                    <div class="social-icons-2" style=" margin-top: 20px !important;">
                                                        @foreach ($socialMedias as $socialMedia)
                                                            <a href="{{ $socialMedia->link }}" target="_blank"
                                                                style="color: #2f419f !important;
                                                                opacity: unset;"><i
                                                                    class="fa-brands {{ $socialMedia->icon }}"></i></a>
                                                       @endforeach
                                                    </div>
                                                </div>
                                            </address>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="subfooter">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        &copy; Copyright 2023 by <a href="https://joudtech.sa/">JoudTech</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <a href="#" id="back-to-top"></a>
                    </footer>
                    <!-- footer close -->

                </div>
            </div>
        </div>
    </div>


    <!-- Javascript Files
    ================================================== -->
    <script src="{{ asset('home/js/plugins.js') }}"></script>
    <script src="{{ asset('home/js/designesia.js') }}?v=1"></script>

    <!-- SLIDER REVOLUTION SCRIPTS  -->
    <script type="text/javascript" src="{{ asset('home/rs-plugin/js/jquery.themepunch.plugins.min.j') }}s"></script>
    <script type="text/javascript" src="{{ asset('home/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>


    @include('partials._session')
    <script>
        $(document).ready(function() {
            $('#switch').change(function() {
                var active_deactive_status = $(this).prop('checked') == true ? 1 : 0;

                @if (app()->getLocale() == 'ar')
                    window.location.href =
                        "{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}";
                @else
                    window.location.href =
                        "{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}";
                @endif
                console.log(active_deactive_status);
            })
        });
    </script>
    @yield('scripts')

</body>

</html>
