@extends('layouts.site')
@section('title', trans('site.home'))
@section('styles')
    <style>
        
        .services-title {
            
            background-image: url({{ asset('home/img/WorldMap.svg') }});
            height: auto;
            background-attachment: fixed !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        dfn {
            font-style: italic
        }

        mark {
            background-color: #ff0;
            color: #000
        }

        small {
            font-size: 80%
        }

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative
        }

        sub {
            bottom: -.25em
        }

        sup {
            top: -.5em
        }

        audio:not([controls]) {
            display: none;
            height: 0
        }

        img {
            border-style: none
        }



        [type=button]::-moz-focus-inner,
        [type=reset]::-moz-focus-inner,
        [type=submit]::-moz-focus-inner,
        button::-moz-focus-inner {
            border-style: none;
            padding: 0
        }

        [type=button]:-moz-focusring,
        [type=reset]:-moz-focusring,
        [type=submit]:-moz-focusring,
        button:-moz-focusring {
            outline: ButtonText dotted 1px
        }

        legend {
            box-sizing: border-box;
            color: inherit;
            display: table;
            max-width: 100%;
            padding: 0;
            white-space: normal
        }


        [type=checkbox],
        [type=radio] {
            box-sizing: border-box;
            padding: 0
        }

        [type=number]::-webkit-inner-spin-button,
        [type=number]::-webkit-outer-spin-button {
            height: auto
        }

        [type=search] {
            -webkit-appearance: textfield;
            outline-offset: -2px
        }

        [type=search]::-webkit-search-cancel-button,
        [type=search]::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit
        }

        summary {
            display: list-item
        }

        [hidden],
        template {
            display: none
        }

        /*# sourceMappingURL=normalize.min.css.map */
        .section-wrapper {
            width: 100%;
            height: 734px;
            overflow: hidden;
            position: relative;
            background-color: #f3f4fd;
        }

        .section-wrapper .container {
            position: relative;
            /* height: 100%; */
        }

        .section-wrapper .shielding-layer {
            content: "";
            width: 67%;
            height: 169%;
            position: absolute;
            top: -37%;
            right: -6%;
            z-index: 3;
            pointer-events: none;
            transform: rotate(16deg);
        }

        /* .section-wrapper .shielding-layer:after {
                                                                    content: "";
                                                                    width: 71%;
                                                                    height: 100%;
                                                                    position: absolute;
                                                                    top: 0;
                                                                    right: 0;
                                                                    z-index: 3;
                                                                    background: linear-gradient(90deg, rgba(249, 249, 254, 0) rgba(249, 249, 254, 0.97) 0,);
                                                                }

                                                                .section-wrapper .shielding-layer:before {
                                                                    pointer-events: none;
                                                                    content: "";
                                                                    width: calc(29% + 1px);
                                                                    height: 100%;
                                                                    position: absolute;
                                                                    top: 0;
                                                                    left: 0;
                                                                    z-index: 3;
                                                                    background: linear-gradient(90deg, rgba(249, 249, 254, 0.97) 0, rgba(249, 249, 254, 0));
                                                                } */

        .section-wrapper:before {
            content: "";
            width: 100%;
            height: 119px;
            pointer-events: none;
            background: linear-gradient(180deg, rgba(254, 254, 255, 0), #fff);
            bottom: 0;
            left: 0;
            position: absolute;
            z-index: 2;
        }

        .section-wrapper .box {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            height: 100%;
            z-index: 100;
        }

        .section-wrapper .content {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            width: 100%;
            /* max-width: 600px; */
            position: absolute;
            top: 0;
            right: 0;
            z-index: 4;
        }

        .section-wrapper .content .title {
            font-size: 32px;
            color: rgba(0, 0, 0, 0.8);
            line-height: 48px;
            text-align: left;
        }

        .section-wrapper .content .feature-list {
            margin: 18px 0 24px;
            font-size: 14px;
            color: rgba(0, 0, 0, 0.7);
            line-height: 20px;
        }



        .section-wrapper .template-wall {
            width: 100%;
            display: flex;
            align-items: flex-start;
            transform: rotate(16deg);
            text-align: right;
        }

        .section-wrapper .template-wall .column {
            display: flex;
            flex-direction: column;
            margin: 0 10px;
            transform-style: preserve-3d;
        }

        .section-wrapper .template-wall .column:nth-child(2n) {
            -webkit-animation: myimg-data-v-4d0e073a 15s linear infinite;
            animation: myimg-data-v-4d0e073a 15s linear infinite;
        }

        .section-wrapper .template-wall .column:nth-child(odd) {
            -webkit-animation: myimg-data-v-4d0e073a 30s linear infinite;
            animation: myimg-data-v-4d0e073a 30s linear infinite;
        }

        .section-wrapper .template-wall .column:hover {
            z-index: 100;
            -webkit-animation-play-state: paused;
            animation-play-state: paused;
        }

        .section-wrapper .wall-box {
            display: inline-block;
            position: relative;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .section-wrapper .wall-box .icon {
            width: 214px;
            margin: 25px 10px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .section-wrapper .wall-box .hoverable:hover {
            transform: scale(1.2);
        }


        @-webkit-keyframes myimg-data-v-4d0e073a {
            0% {
                transform: translateY(0);
            }

            to {
                transform: translateY(-50%);
            }
        }

        @keyframes myimg-data-v-4d0e073a {
            0% {
                transform: translateY(0);
            }

            to {
                transform: translateY(-50%);
            }
        }

        @media screen and (max-width: 992px) {
            .template-wall .column:hover {
                -webkit-animation-play-state: running !important;
                animation-play-state: running !important;
            }

            .shelter {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            .home-template-wrapper {
                height: 744px;
                padding-bottom: 0;
            }

            .home-template-wrapper .shielding-layer {
                display: none;
            }

            .home-template-wrapper:after {
                position: absolute;
                width: 100%;
                height: 508px;
                top: 0;
                left: 0;
                content: "";
                background: linear-gradient(177deg, #f5f6ff, rgba(255, 255, 255, 0.95) 60%, rgba(252, 252, 252, 0));
                opacity: 0.95;
            }

            .home-template-wrapper:before {
                display: none;
            }

            .home-template-wrapper .box {
                height: auto;
            }

            .home-template-wrapper .content {
                width: 88%;
                height: auto;
                justify-content: flex-start;
                align-items: center;
                left: 50%;
                transform: translateX(-50%);
                margin-left: 0;
                max-width: -webkit-max-content;
                max-width: -moz-max-content;
                max-width: max-content;
            }

            .home-template-wrapper .content .title {
                margin-top: 44px;
                font-size: 24px;
                line-height: 34px;
                text-align: center;
            }

            .home-template-wrapper .content .feature-list {
                margin: 12px 0 20px;
                font-size: 14px;
                line-height: 22px;
                text-align: center;
            }

            .home-template-wrapper .content .btn {
                padding: 0 28px;
                box-sizing: border-box;
                font-size: 14px;
                margin-bottom: 181px;
                height: 48px;
                line-height: 48px;
            }

            .home-template-wrapper .template-wall {
                transform: rotate(16deg) translateX(-200px);
            }
        }

        @media screen and (min-width: 1366px) {
            .content {
                margin-left: calc(50% - 600px);
            }
        }
    </style>
    <style>
        .services-title {
            background-size: contain;
        }

        @media (max-width: 768px) {
            .single-post h3 {
                font-size: 1.45rem !important;
            }
        }

        .headsection {
            background: url("http://127.0.0.1:8000/home/img/travel.jpg");
            background-attachment: fixed;
            position: relative;
            background-repeat: no-repeat;
            opacity: 1;
            transition: opacity 0.5s, transform 0.5s;
            z-index: 1;
            background-size: cover;
        }

        .section1 {
            /* background-image: url('http://127.0.0.1:8000/photos/home/icon.png'); */


            position: absolute;
            top: 20px;
            /* Adjust as needed */
            left: 20px;
            /* Adjust as needed */
            width: 200px;
            /* Adjust as needed */
            z-index: 1000;
            /* background-attachment: fixed; */


            /* Ensure the background stays behind the content */
            transition: opacity 0.5s;
        }

        .section2 {
            background: linear-gradient(rgba(255, 255, 255, .9), rgba(255, 255, 255, .5)), url("http://127.0.0.1:8000/home/img/icons/ticket.png");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 1;
            transition: opacity 0.5s, transform 0.5s;
            z-index: 1;
            transition: opacity 0.5s;
            background-size: auto;
        }

        .section3 {
            background: linear-gradient(rgba(255, 255, 255, .5), rgba(255, 255, 255, .5)), url("http://127.0.0.1:8000/home/img/icons/airplane.png");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 1;
            transition: opacity 0.5s, transform 0.5s;
            z-index: 1;
            transition: opacity 0.5s;
            background-size: auto;
        }
    </style>

    <style>
        .counter_section {
            padding: 0 0 50px;
            background: #0D1216;
            color: #E2E2E2
        }


        .counter_section_item svg {
            width: 45px !important;
            height: 45px !important;
        }

        .item i {

            font-size: 3em;
        }

        .item p.number {
            font-size: 1.5em;
        }

        .item p.label {
            font-size: 1.1em;
            text-transform: uppercase;
        }

        .item:hover i,
        .item:hover p {
            color: rgb(226, 226, 226);
        }

        @media (max-width: 786px) {
            .counter .item {
                flex: 0 0 50%;
            }
        }


        .headsection {
            background: url("{{ $homeSlider->first()->image }}");
            background-attachment: fixed;
            position: relative;
            background-repeat: no-repeat;
            opacity: 1;
            transition: opacity 0.5s, transform 0.5s;
            z-index: 1;
            background-size: cover;
        }
    </style>
    <style>
        .owl-carousel .owl-item img {
            max-width: unset;
        }

        #customers-testimonials.owl-carousel .owl-dots .owl-dot span {
            background: #DF1F26 !important;
            margin-bottom: 25px !important;
        }

        .shadow-effect {
            background: #fff;
            padding: 20px;
            border-radius: 4px;
            text-align: center;
            border: 1px solid #ECECEC;
            box-shadow: 0 19px 38px rgba(0, 0, 0, 0.10), 0 15px 12px rgba(0, 0, 0, 0.02);
        }

        #customers-testimonials .shadow-effect p {
            font-family: inherit;
            font-size: 17px;
            line-height: 1.5;
            margin: 0 0 17px 0;
            font-weight: 300;
            direction: rtl;
        }

        .testimonial-name {
            margin: -17px auto 0;
            display: table;
            width: auto;
            background: #3190E7;
            padding: 9px 35px;
            border-radius: 12px;
            text-align: center;
            color: #fff;
            box-shadow: 0 9px 18px rgba(0, 0, 0, 0.12), 0 5px 7px rgba(0, 0, 0, 0.05);
        }

        #customers-testimonials .item {
            text-align: center;
            padding: 50px;
            margin-bottom: 80px;
            opacity: .2;
            transform: scale3d(0.8, 0.8, 1);
            transition: all 0.3s ease-in-out;
        }

        #customers-testimonials .owl-item.active.center .item {
            opacity: 1;
            transform: scale3d(1.0, 1.0, 1);
        }

        .owl-carousel .owl-item img {
            transform-style: preserve-3d;
            max-width: 90px;
            margin: 0 auto 17px;
        }

        #customers-testimonials.owl-carousel .owl-dots .owl-dot.active span,
        #customers-testimonials.owl-carousel .owl-dots .owl-dot:hover span {
            background: #3190E7;
            transform: translate3d(0px, -50%, 0px) scale(0.7);
        }

        #customers-testimonials.owl-carousel .owl-dots {
            display: inline-block;
            width: 100%;
            text-align: center;
        }

        #customers-testimonials.owl-carousel .owl-dots .owl-dot {
            display: inline-block;
        }

        #customers-testimonials.owl-carousel .owl-dots .owl-dot span {
            background: #3190E7;
            display: inline-block;
            height: 20px;
            margin: 0 2px 5px;
            transform: translate3d(0px, -50%, 0px) scale(0.3);
            transform-origin: 50% 50% 0;
            transition: all 250ms ease-out 0s;
            width: 20px;
        }
    </style>
@endsection
@section('scripts')
    <script>
        jQuery(document).ready(function($) {
            "use strict";
            //  TESTIMONIALS CAROUSEL HOOK
            $('#customers-testimonials').owlCarousel({
                loop: true,
                center: true,
                items: 3,
                margin: 0,
                autoplay: true,
                dots: true,
                autoplayTimeout: 2500,
                smartSpeed: 450,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1170: {
                        items: 3
                    }
                }
            });
        });
    </script>


    <script>
        var lastScrollTop = 0;

        window.addEventListener("scroll", function() {
            var currentScroll = window.pageYOffset || document.documentElement.scrollTop;
            var img = document.getElementById('section3');
            if (currentScroll > lastScrollTop) {
                // Scrolling down
                img.style.backgroundImage =
                    "url('http://127.0.0.1:8000/home/img/icons/airplane.png')"; // Replace with your image path
            } else {
                // Scrolling up
                img.style.backgroundImage =
                    "url('http://127.0.0.1:8000/home/img/icons/airplane2.png')"; // Replace with your image path
            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
        }, false);
    </script>

    <script>
        $('.counter').countUp();
    </script>
@endsection
@section('content')

    <div class="section-wrapper headsection" id="headsection">
        <div class="shielding-layer"></div>
        <div class="">
            <div class="content">
                <div id="particles_js"></div>
                <div class="container">
                    <div class=" row align-items-center" style="">
                        <div class="col-lg-7">
                            <!-- Banner content -->
                            <div class="banner-content">
                                <div id="typed-strings">
                                    <p>{{ $info->title }}</p>
                                </div>

                                <h1 data-animate="fadeInUp" data-delay="1.2" class="typed"></h1>

                                <div id="typed-strings2">
                                    <p>{{ $info->description }}</p>
                                </div>
                                <h2 data-animate="fadeInUp" data-delay="1.3" class=""><span
                                        class="typed-second"></span>
                                </h2>

                                <ul class="list-inline" data-animate="fadeInUp" data-delay="1.4">
                                    <li><a href="{{ route('about') }}" class="btn btn-secondary"
                                            style="padding: 10px 25px">@lang('site.about_me')</a>
                                    </li>

                                </ul>

                            </div>
                        </div>
                        {{-- <div class="col-lg-2 offset-lg-3 homeAirplains" style="" data-animate="fadeInUp"
                            data-delay="1.4">>
                            <div class="template-wall">
                                <div class="column index-0">
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/1.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/2.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/3.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/4.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/5.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/11.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/7.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/8.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/9.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                </div>
 


                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Banner -->

    <!-- Features -->
    <section class="pt-7 pb-5-5 section2">
        <div class="container">

            <div class="container-fluid">
                <div class="row">
                    <h2 class="" data-animate="fadeIn Up" data-delay=".1" style="margin: 0 auto 75px;">إمتيازات تجعل
                        شركة المحترف الأفضل على الإطلاق </h2>
                </div>
                <div class="row">

                    @foreach ($aboutFields as $aboutField)
                        <div class="col-md-4">
                            <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".1">
                                <i class="fa {{ $aboutField->icon }}" style="font-size: 3rem; color:#DF1F26;"></i>
                                <h3>{{ $aboutField->title }}</h3>
                                <p style="text-align: justify;">{{ $aboutField->value }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12 text-left" data-animate="fadeInUp" data-delay=".1">
                        <h2 class="heading-title">@lang('site.about_me')</h2>
                        <hr class="line line-hr-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center" data-animate="fadeInUp" data-delay=".2">
                        <div class="about-p">{!! $about->about_me !!}</div>

                    </div>
                    <div class="col-md-5 offset-md-1" data-animate="fadeInUp" data-delay=".4">
                        <div class="about-img animate-box" data-animate-effect="fadeInUp">
                            <div class="img" style="  text-align: center;"> <img
                                    src="{{ asset($info->about_me_image) }}" alt="" style="max-width: 250px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Features -->

    {{-- Start Counter --}}
    <section class="counter_section">
        <div style="background: #fff">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="  margin-bottom: -15px;">
                <path fill="#0D1216" fill-opacity="1" d="M0,192L34.3,208C68.6,224,137,256,206,250.7C274.3,245,343,203,411,192C480,181,549,203,617,192C685.7,181,754,139,823,138.7C891.4,139,960,181,1029,170.7C1097.1,160,1166,96,1234,74.7C1302.9,53,1371,75,1406,85.3L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                </path>
            </svg>

        </div>
        <div class="counter_main">
            <div class="container">

                <div class="row justify-content-center">
                    @foreach ($counters as $counter)
                        <div class="col-md-4 text-center item counter_section_item mt-5">
                            <i class="fa {{ $counter->icon }}"></i>
                            <p id="number1" class="number counter">{{ $counter->value }}</p>
                            <p class="label">{{ $counter->title }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Our services -->
    <section class="">
        <div class="services-title position-relative pt-7" 
            style=""  dir="ltr">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <!-- Section title -->
                        <div class="section-title text-center">
                            <h2 class="text-white" data-animate="fadeInUp" data-delay=".1">خدمات المحترف </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="customers-testimonials" class="owl-carousel " data-animate="fadeInUp" data-delay="1.5">

                            @foreach ($services as $index => $service)
                                <!--TESTIMONIAL 1 -->
                                <div class="item">
                                    <div class="shadow-effect">
                                        <div class="single-post" data-animate="">
                                            <div class="image-hover-wrap">
                                                <img class="img-fluid" src="{{ asset($service->image) }}" alt=""
                                                    style="aspect-ratio: 3 / 3;">
                                                <div
                                                    class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                                    <ul class="list-inline">
                                                        <li><a href="{{ route('service', $service->slug) }}"><i
                                                                    class="fas fa-link"></i></a>
                                                        </li>
                                                        {{-- <li><a href="#"><i class="fas fa-share-alt"></i></a></li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                            <h3>{{ $service->title }}</h3>
                                            <h4>
                                                {!! $service->intro !!}
                                            </h4>

                                        </div>

                                    </div>
                                    <div class="testimonial-name" style="background-color: #DF1F26">
                                        <a href="{{ route('service', $service->slug) }}"
                                            class="btn btn-secondary">@lang('site.read_more')<i
                                                class="fas fa-caret-right"></i></a>
                                    </div>
                                </div>
                                <!--END OF TESTIMONIAL 1 -->
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- <!-- Service contact info -->
                <div class="roboto text-center font-weight-medium" data-animate="fadeInUp" data-delay=".65">
                    <p>If you have any questions in your mind, Just <a href="contact.html">click here</a> to write or you
                        can <br>Call to <a href="tel:1234567890">(+1) 234-567-890</a></p>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- End of Our services -->

    <!-- Servers -->
    <section id="section3" class="servers pt-7 bg-light section3 ">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-5">
                    <div class="section-title">
                        <h2 data-animate="fadeInUp" data-delay=".1">المزيد من الخدمات</h2>
                        <p data-animate="fadeInUp" data-delay=".2">حتى نبقى معكم خلال الرحلة ولكي نؤمن أعلى درجات الدقة
                            والسرعة التي نسعى اليها دائماً ,<br>شملت خدماتنا الحجوزات الفندقية والتأمين الصحي لمختلف دول
                            العالم </p>
                    </div>
                    <ul class="data-centers list-unstyled list-item clearfix">
                        <li></li>
                        <li data-animate="fadeInUp" data-delay=".1" style="text-align: justify"><i
                                class="fas fa-caret-right"></i>وحتى نبقى مستشاركم الأول منذ اللحظة الأولى
                            نقدم لكم خدمة الاستشارات المجانية التي تحصلون من خلالها على إجابات كاملة لأسئلتكم واستفساراتكم
                            عن كل ما يتعلق بالسفر والدراسة بالخارج

                        </li>
                        <li></li>
                        <li data-animate="fadeInUp" data-delay=".2"><a class="btn btn-secondary"
                                href="{{ route('contact') }}">أحجز موعدك الآن</a></li>
                        </li>
                        {{-- <li data-animate="fadeInUp" data-delay=".2"><i class="fas fa-caret-right"></i>الإمارات (169)
                        </li>
                        <li data-animate="fadeInUp" data-delay=".3"><i class="fas fa-caret-right"></i>رومانيا (151)</li>
                        <li data-animate="fadeInUp" data-delay=".4"><i class="fas fa-caret-right"></i>هنغاريا
                            (142)</li>
                        <li data-animate="fadeInUp" data-delay=".5"><i class="fas fa-caret-right"></i>آسيا (70)</li>
                        <li data-animate="fadeInUp" data-delay=".6"><i class="fas fa-caret-right"></i>افريقيا (40)</li> --}}
                    </ul>
                </div>
                <div class="col-xl-5 col-lg-7 d-none d-lg-block">
                    <div class="server-map">
                        <img src="{{ asset('home/img/servers.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="  margin-bottom: -15px;">
                <path fill="#fff" fill-opacity="1" d="M0,192L34.3,208C68.6,224,137,256,206,250.7C274.3,245,343,203,411,192C480,181,549,203,617,192C685.7,181,754,139,823,138.7C891.4,139,960,181,1029,170.7C1097.1,160,1166,96,1234,74.7C1302.9,53,1371,75,1406,85.3L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                </path>
            </svg>

        </div>
    </section>
    <!-- End Servers -->



    <!-- Reviews -->
    <section class="pt-2 pb-7 bg-white">
        <div class="container">
            <div class="section-title text-center">
                <h2 data-animate="fadeInUp" data-delay=".1">أراء العملاء</h2>
            </div>
            <div class="swiper-container review-slider">
                <div class="swiper-wrapper">
                    @foreach ($reviews as $review)
                        <div class="swiper-slide single-review-slide">
                            <!-- Author info -->
                            <div class="d-flex align-items-center author-info-wrap">
                                <img class="img-thumbnail mr-3" src="{{ asset( $review->image) }}"
                                    alt="" data-animate="fadeInUp" data-delay=".1"
                                    style="max-width: 100px;aspect-ratio: 3/3;">
                                <div class="author-info">
                                    {{ $review->name }}
                                </div>
                            </div>
                            <p>{!! $review->description !!}</p>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="swiper-pagination review-pagination position-static"></div>
        </div>
    </section>
    <!-- End of Reviews -->
@endsection
