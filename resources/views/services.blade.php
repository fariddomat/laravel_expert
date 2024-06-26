@extends('layouts.site')
@section('title', trans('site.services'))
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .single-post span {
            font-size: 1rem;
            color: #000;
            font-weight: normal;
        }

        .owl-carousel .owl-item img {
            max-width: unset;
        }

        #customers-testimonials.owl-carousel .owl-dots .owl-dot span {
            background: #DF1F26 !important;
            margin-top: 50px !important;
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
            /* max-width: 90px; */
            /* max-height: 155px; */
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
            max-width: 320px;
            height: 500px !important;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .single-post h3 {
                font-size: 1.45rem !important;
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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script></script>
@endsection
@section('content')

    <!-- Page title -->
    <section class="page-title-wrap position-relative bg-light" data-bg-img="{{ asset($info->service_header_image) }}"
        data-animate="fadeInUp" data-delay="1.1">
        {{-- <div id="particles_js"></div> --}}
        <div class="container container-top">
            <div class="row">
                <div class="col-12">
                    <div class="page-title position-relative pt-5 pb-5">
                        <ul class="custom-breadcrumb roboto list-unstyled mb-0 clearfix" data-animate="fadeInUp"
                            data-delay="1.2">
                            <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="#">@lang('site.services')</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">@lang('site.services')</h1>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End of Banner -->

    <!-- Service -->
    <section class="testimonials blog bg-gradient pb-7" dir="ltr">
        <div class="container" style="max-width: 65rem">

            <div class="row mt-5">
                <div class="col-sm-12">
                    <div id="customers-testimonials" class="owl-carousel " data-animate="fadeInUp" data-delay="1.5">

                        @foreach ($services as $index => $service)
                            <!--TESTIMONIAL 1 -->
                            <div class="item"
                                style="background-image: url({{ asset($service->image) }});      background-repeat: no-repeat;
                           background-size: 100% 100%;height: 400px;border-radius: 15px;">

                                <div class="single-post" data-animate=""
                                    style="padding: 0; border: unset !important; margin-bottom: 5px">
                                    <div class="image-hover-wrap">

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
                                    <div style="padding: 15px; padding-bottom: 0">
                                        <h3
                                            style="padding-top: 70% !important; padding-bottom: 0; padding-bottom: 8px;
                                        margin-bottom: 0; font-weight: bold">
                                            {{ $service->title }}</h3>
                                        <h4 style="margin-bottom: 25px; direction: rtl;">
                                            {!! $service->intro !!}
                                        </h4>
                                    </div>
                                </div>

                                <div class="testimonial-name" style="background-color: #DF1F26;padding-top: 0">
                                    <a href="{{ route('service', $service->slug) }}"
                                        class="btn btn-secondary">@lang('site.read_more')<i class="fas fa-caret-right"></i></a>
                                </div>
                            </div>
                            <!--END OF TESTIMONIAL 1 -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Service -->

@endsection
