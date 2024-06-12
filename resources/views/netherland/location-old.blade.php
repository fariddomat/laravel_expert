@extends('layouts.site')
@php
    $metaDescription = $location->title;
@endphp
@section('title')
    {{ $location->title }}
@endsection



@section('styles')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5G0MFKDFBJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-5G0MFKDFBJ');
    </script>
    <!-- Event snippet for Request quote conversion page
    In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
    <script>
        function gtag_report_conversion(url) {
            var callback = function() {
                if (typeof(url) != 'undefined') {
                    window.location = url;
                }
            };
            gtag('event', 'conversion', {
                'send_to': 'AW-16495252403/FZ75CLXwxK0ZELOnxrk9',
                'value': 1.0,
                'currency': 'EUR',
                'event_callback': callback
            });
            return false;
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <style>
        .modal {
            position: absolute;
            text-align: right;
        }

        .modal-backdrop {
            z-index: -10;
        }

        .modal-header {
            direction: rtl;
        }

        .modal-content {
            direction: rtl;
        }

        .social-share li a.whatsapp {
            border-color: #25D366;
            color: #25D366;
        }

        .social-share li a.whatsapp:hover {
            background-color: #25D366;
            color: #fff;
        }

        .social-share li a.instagram {
            border-color: #fccc63;
            color: #fccc63;
        }

        .social-share li a.instagram:hover {
            background-color: #fccc63;
            color: #fff;
        }


        .social-share li a.tiktok {
            border-color: #FE2C55;
            color: #FE2C55;
        }

        .social-share li a.tiktok:hover {
            background-color: #FE2C55;
            color: #fff;
        }



        .social-share li a.telegram {
            border-color: #0088cc;
            color: #0088cc;
        }

        .social-share li a.telegram:hover {
            background-color: #0088cc;
            color: #fff;
        }



        .social-share li a.youtube {
            border-color: #CD201F;
            color: #CD201F;
        }

        .social-share li a.youtube:hover {
            background-color: #CD201F;
            color: #fff;
        }



        .social-share li a.threads {
            border-color: #431f2b;
            color: #431f2b;
        }

        .social-share li a.threads:hover {
            background-color: #431f2b;
            color: #fff;
        }

        .table-responsive {
            display: revert !important;
            width: 100%;
        }



        .table-bordered td,
        .table-bordered th {
            padding-top: 20px;
        }

        .bg-image-index {
            padding-right: 25px;
            padding-top: 50px;

        }

        @media (max-width: 480px) {
            .bg-image-index {
                padding-right: 25px;
                padding-top: 50px;
            }

            .serviceRow {
                padding: 0 5px !important;
            }

            .serviceSection {
                margin-top: 1rem !important;
                padding: 15px 0 !important;
            }

            table {
                max-width: 100%;
            }

            span {
                font-size: 14px;
            }

            .ml-5,
            .mx-5 {
                margin-right: 0.2rem !important;
            }

            .mr-5,
            .mx-5 {
                margin-left: 0.2rem !important;
            }

            p {
                text-align: justify;
            }

            .page-title h1 {
                display: none
            }

        }

        .page-title h1 {
            font-size: 2rem;
            padding-bottom: 20px;
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
            /* max-width: 90px; */
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

        #customers-testimonials .item {
            padding: 15px;
        }
    </style>
    <style>
        .tm-accordion .card:first-child {
            /* border-radius: 15px 15px 0 0; */
        }

        .tm-accordion .card {

            margin-bottom: 15px;
        }

        .tm-accordion .card .card-header {
            background-color: #fff;
            border-top: none;
        }

        .tm-accordion .card .card-header .title {
            padding: 1rem 2rem;
            margin: 0;
            position: relative;
        }

        .tm-accordion .card .card-header .title .accordion-controls-icon {
            opacity: 0.4;
            position: absolute;
            left: 20px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            transition: all 0.4s ease-in-out;
        }

        .serviceSec {
            overflow: hidden;
            border: 1px solid #e0e1e0;
            background: #fff;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
            margin-left: -5px;
            margin-right: -5px;
        }

        .serviceSec>div,
        .serviceSection>div {
            overflow-x: auto;
            overflow-y: hidden;
        }
    </style>

    <style>
        .single-post h3 {
            font-weight: bold;
            text-shadow: 2px 2px #E2E2E2;
        }

        @media (max-width: 480px) {
            .single-post h3 {
                font-size: 1.6rem !important;

            }
        }
    </style>
@endsection
@section('scripts')
    <script>
        jQuery(document).ready(function($) {
            "use strict";
            //  TESTIMONIALS CAROUSEL HOOK
            var owl = $('#customers-testimonials').owlCarousel({
                loop: true,
                center: true,
                items: 3,
                margin: 0,
                autoplay: true,
                dots: true,
                autoplayTimeout: 2500,
                responsiveRefreshRate: 10,
                autoplayHoverPause: true, // Stops autoplay
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
            owl.on('mouseleave', function() {
                owl.trigger('stop.owl.autoplay'); //this is main line to fix it
                owl.trigger('play.owl.autoplay', [1000]);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("table").addClass("table table-striped table-hover table-bordered table-responsive");
            $('#accordion100').on('shown.bs.collapse', function(e) {
                $(e.target).prev().find('.open-icon').hide();
                $(e.target).prev().find('.close-icon').show();
            }).on('hidden.bs.collapse', function(e) {
                $(e.target).prev().find('.open-icon').show();
                $(e.target).prev().find('.close-icon').hide();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#accordion100').on('shown.bs.collapse', function(e) {
                var target = $(e.target); // Get the target section
                var offset = target.prev().height(); // Calculate offset based on previous section's height
                $('html, body').animate({
                    scrollTop: target.offset().top - offset - 90
                }, 500); // Animate scrolling with duration (adjust as needed)
            });
        });
    </script>
@endsection
@section('content')

    <!-- Page title -->
    <section class="page-title-wrap position-relative bg-light" data-bg-img="{{ asset($info->service_header_image) }}"
        data-animate="fadeInUp" data-delay="1.1">
        {{-- <div id="particles_js"></div> --}}
        <div class="container container-top">
            <div class="row">
                <div class="col-11">
                    <div class="page-title position-relative pt-5 pb-5">
                        <ul class="custom-breadcrumb roboto list-unstyled mb-0 clearfix" data-animate="fadeInUp"
                            data-delay="1.2">
                            <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a>
                                    @if ($location->slug == 'netherland')
                                        المحترف هولندا
                                    @endif
                                </a></li>
                            {{-- <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="">@lang('site.service_detail')</a></li> --}}
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">{{ $location->title }}</h1>
                    </div>
                </div>
                <div class="col-1">
                    <div class="world-map position-relative">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->


    <section id="section-content " class="bg-gradient pt-7" style="overflow: hidden">
        <div class="container" style="max-width: 65rem">
            <div class="row">
                <div class="col-md-12">
                    <div class="row serviceSec pb-7" style="" data-animate="fadeInDown" data-delay="1.4">

                        <div data-animate="slideInRight" data-delay=".5" class="col-md-12 wow bg-image-index"
                            style="">
                            <h2 class="col-md-12 pt-2 pb-2" data-animate="fadeInDown" data-delay="1.4"
                                style="font-size: 2rem;text-align: center;
                                color: #DF1F26;">
                                {{ $location->title }}</h2>


                            <div class="" style="">{!! $location->content !!}</div>

                        </div>

                        <div class="col-md-12 wow fadeInUp serviceRow" data-wow-delay=".5s" style="margin-top:50px">
                            <div class="row mt-5 ml-5 mr-5 serviceSection" data-animate="fadeInUp" data-delay=".2"
                                style=" border: 1px solid #e0e1e0;
                            background: #fff;
                            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
                            padding: 20px; margin-bottom: 15px;
                            border-radius: 10px; /* Adjust spacing */">
                                <div class="col-md-12">
                                    <h3 class="service-section-title"
                                        style="text-align: center; font-size: 24px; /* Adjust font size */
                                    font-weight: bold; color:#DF1F26;
                                    margin-bottom: 15px; /* Adjust spacing */">
                                        مواقع التواصل الاجتماعي</h3>
                                    <div
                                        style="  line-height: 1.6; /* Adjust line spacing */
                                    margin-bottom: 20px;margin-top: 30px">
                                        <ul class="list-inline mb-0 social-share list-inline mb-0 text-lg-center"
                                            style="text-align: center;">
                                            @foreach ($location->location_social_media as $index => $socialMedia)
                                                <li style="margin-bottom: 10px">
                                                    <a class="{{ $socialMedia->name }}" href="{{ $socialMedia->link }}"
                                                        target="_blank" style="color:#E2E2E2 "><i
                                                            class="fa-brands {{ $socialMedia->icon }}"></i></a>

                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>



                    @if ($location->location_trips->count() > 0)
                        <section id="serviceSerivces" class="testimonials blog" dir="ltr" data-animate="fadeInUp"
                            data-delay="1" style="padding-top: 75px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h2 class="text-center">
                                        </h2>
                                        @if ($location->location_trips->count() <= 2)
                                            <div class="row" style="  justify-content: center; margin-bottom:100px">
                                                @foreach ($location->location_trips as $index => $trip)
                                                    <!--TESTIMONIAL 1 -->
                                                    <div class="item col-md-4 offset-md-1"
                                                        style="background-image: url({{ asset($trip->img) }});      background-repeat: no-repeat;
                                                        background-size: 100% 100%;height: auto; width:auto;border-radius: 15px; margin-top:25px;  background-color: rgba(255, 255, 255, 0.7) !important; background-blend-mode: lighten !important;">

                                                        <div class="single-post" data-animate=""
                                                            style="padding: 0; border: unset !important; margin-bottom: 5px">
                                                            <div class="image-hover-wrap">

                                                                <div
                                                                    class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                                                    <ul class="list-inline">
                                                                        <li><a href=""><i
                                                                                    class="fas fa-link"></i></a>
                                                                        </li>
                                                                        {{-- <li><a href="#"><i class="fas fa-share-alt"></i></a></li> --}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div style="padding: 15px; padding-bottom: 0">
                                                                <h3
                                                                    style="padding-top: 50% !important;padding-bottom: 50% !important; text-align: center">
                                                                    {{ $trip->title }} <br>
                                                                    <a data-toggle="modal"
                                                                        data-target="#tripModal{{ $index }}">

                                                                        <i class="fas fa-link"
                                                                            style="  font-size: 2rem; padding-top: 15px"></i>تفاصيل
                                                                        الرحلة
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                        </div>

                                                        <div class="testimonial-name"
                                                            style="background-color: #DF1F26;padding-top: 0;margin-bottom: -25px;">
                                                            <a class="btn btn-secondary"><i
                                                                    class="fa-brands fa-whatsapp"></i> احجز الآن</a>
                                                        </div>
                                                    </div>

                                                    <!--END OF TESTIMONIAL 1 -->
                                                @endforeach
                                                <!-- Modals -->
                                                @foreach ($location->location_trips as $index => $trip)
                                                    <div class="modal fade" id="tripModal{{ $index }}"
                                                        tabindex="-1" aria-labelledby="tripModalLabel{{ $index }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="tripModalLabel{{ $index }}">
                                                                        {{ $trip->title }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {!! $trip->description !!}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ $location->location_social_media->where('name', 'whatsapp')->first()->link }}"
                                                                        class="btn btn-primary">احجز الآن</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div id="customers-testimonials" class="owl-carousel "
                                                data-animate="fadeInUp" data-delay="1.5">
                                                @foreach ($location->location_trips as $index => $trip)
                                                    <!--TESTIMONIAL 1 -->

                                                    <div class="item"
                                                        style="background-image: url({{ asset($trip->img) }});      background-repeat: no-repeat;
                                                       background-size: 100% 100%;height: auto; width:auto;border-radius: 15px;   background-color: rgba(255, 255, 255, 0.7) !important; background-blend-mode: lighten !important;">

                                                        <div class="single-post" data-animate=""
                                                            style="padding: 0; border: unset !important; margin-bottom: 5px">
                                                            <div class="image-hover-wrap">

                                                                <div
                                                                    class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                                                    <ul class="list-inline">
                                                                        <li>
                                                                        </li>
                                                                        {{-- <li><a href="#"><i class="fas fa-share-alt"></i></a></li> --}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div style="padding: 15px; padding-bottom: 0">
                                                                <h3
                                                                    style="padding-top: 40% !important;padding-bottom: 45% !important; font-weight: bolder;
                                                                text-shadow: 2px 2px #E2E2E2;
                                                                color: #DF1F26;">
                                                                    {{ $trip->title }} <br>

                                                                    <a data-toggle="modal"
                                                                        data-target="#tripModal{{ $index }}">

                                                                        <i class="fas fa-link"
                                                                            style="  font-size: 2rem; padding-top: 15px"></i>تفاصيل
                                                                        الرحلة
                                                                    </a>
                                                                </h3>


                                                            </div>
                                                        </div>

                                                        <div class="testimonial-name"
                                                            style="background-color: #DF1F26;padding-top: 0;margin-bottom: -40px">
                                                            <a href="{{ $location->location_social_media->where('name', 'whatsapp')->first()->link }}"
                                                                class="btn btn-secondary"> <i
                                                                    class="fa-brands fa-whatsapp"></i> احجز الآن</a>
                                                        </div>

                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Modals -->
                                            @foreach ($location->location_trips as $index => $trip)
                                                <div class="modal fade" id="tripModal{{ $index }}" tabindex="-1"
                                                    aria-labelledby="tripModalLabel{{ $index }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="tripModalLabel{{ $index }}">
                                                                    {{ $trip->title }}</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {!! $trip->description !!}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{ $location->location_social_media->where('name', 'whatsapp')->first()->link }}"
                                                                    class="btn btn-primary">احجز الآن</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif



                </div>
                <!-- Sidebar -->

            </div>

        </div>
    </section>


@endsection
