@extends('layouts.site')
@section('title')
    {{ $service->title }}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <style>
        .accordion1 {
            font-family: inherit;
            color: #2f529f;
        }

        .simple-slider-wrapper {
            width: 100%;
            margin: 0 auto 30px auto;
            position: relative;
        }

        .control_prev,
        .control_next {
            display: none;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 99999;
            width: 48px;
            height: 48px;
            color: #fff;
            text-decoration: none;
            font-weight: 700;
            font-size: 38px;
            overflow: hidden;
            cursor: pointer;
        }

        .control_prev {
            left: 0;
        }

        .control_next {
            right: 0;
        }

        .control_prev span:before,
        .control_next span:before {
            content: "";
            width: 48px;
            height: 48px;
            position: absolute;
        }

        .control_prev span:before {
            background: url('https://www.flaticon.com/svg/static/icons/svg/271/271218.svg') no-repeat;
            top: 0;
            right: 0;
        }

        .control_next span:before {
            background: url('https://www.flaticon.com/svg/static/icons/svg/271/271226.svg') no-repeat;
            top: 0;
            left: 0;
        }

        .simple-slider-overflow-hidden {
            overflow: hidden;
            width: 100%;
            height: 100%;
            padding: 0 50px;
        }

        .simple-slider {
            display: flex;
            overflow: hidden;
            position: relative;
            margin: 0;
            padding: 0;
            list-style: none;
            width: 100%;
            height: 100%;
        }

        .simple-slider-element {
            width: 100%;
            flex-shrink: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .slide-image {
            object-fit: cover;
            height: 150%;
            width: auto
        }

        #subheader {
            background-size: cover !important;
        }

        #subheader h1 {
            color: #2f529f !important;
            font-weight: bold;
        }

        @media screen and (max-width: 460px) {
            #section-content {
                padding: 35px 25px 70px;
            }

            .de-navbar-left #subheader h1 {
                margin: 60px 15px;
            }

            #view-all-projects,
            #call-to-action,
            #view-all-services {
                padding: 60px 0 25px 0;
            }

            #section-testimonial-architecture {
                padding: 30px 15px 25px;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        var acc = document.getElementsByClassName("accordion1");
        var i;
        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active1");
                var panel = this.nextElementSibling;
                var arrow = this.querySelector("i");
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                    panel.style.borderBottom = null;
                    arrow.className = "fa fa-caret-{{ $arrow }} pr-3";
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                    panel.style.borderBottom = "1px solid #d4d4d4";
                    arrow.className = "fa fa-caret-up pr-3";
                }
            });
        }
    </script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script>
        AOS.init();
    </script>

    <script>
        jQuery(document).ready(function($) {

            $('.simple-slider-wrapper').each(function() {
                const this_slider = $(this);

                const slides = this_slider.find('ul li');
                const control_prev = this_slider.find('.control_prev');
                const control_next = this_slider.find('.control_next');

                function slider_init() {
                    if (slides.length > 1) {
                        control_prev.css('display', 'block');
                        control_next.css("display", "block");
                    }
                }
                slider_init();

                function moveRight() {
                    // move last child to beginning of list and set list position to -100%
                    this_slider.find('ul li:last-child').prependTo(this_slider.find('ul'));
                    slides.css('left', '-100%');
                    // move all list elements to right
                    slides.stop().animate({
                        left: 0
                    }, 500);
                };

                function moveLeft() {
                    // move all list elements to left
                    const arr = [slides.stop().animate({
                        left: '-100%'
                    }, 500).promise()]
                    // after animation end move first child to end of list and set list position to 0
                    $.when.apply($, arr).then(function() {
                        this_slider.find('ul li:first-child').appendTo(this_slider.find('ul'));
                        slides.css('left', 0);
                    });
                };

                control_prev.on("click", function() {
                    if (slides.length > 1) {
                        moveRight();
                    }
                });

                control_next.on("click", function() {
                    if (slides.length > 1) {
                        moveLeft();
                    }
                });

                // autoplay
                function setAutoplay() {
                    let is_slider_on = true;
                    let autoplay = setInterval(function() {
                        if (slides.length > 1) {
                            moveLeft();
                        }
                    }, 3000);

                    this_slider.on('mouseenter', function() {
                        clearInterval(autoplay);
                        is_slider_on = false;
                    });

                    this_slider.on('mouseleave', function() {
                        if (!is_slider_on) {
                            autoplay = setInterval(function() {
                                moveLeft();
                            }, 3000);
                            is_slider_on = true;
                        }
                    });
                }
                setAutoplay();
            });

        });
    </script>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <style>
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
@endsection
@section('content')

    <!-- Page title -->
    <section class="page-title-wrap position-relative bg-light" data-bg-img="{{ asset($info->service_image) }}">
        <div id="particles_js"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title position-relative pt-5 pb-5">
                        <ul class="custom-breadcrumb roboto list-unstyled mb-0 clearfix" data-animate="fadeInUp"
                            data-delay="1.2">
                            <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="{{ route('services') }}">@lang('site.services')</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="">@lang('site.service_detail')</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">{{ $service->title }}</h1>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End of Banner -->


        <section id="section-content">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 wow fadeInUp" data-wow-delay=".3s" style="margin-top:50px">

                        <div>{{ $service->brief }}</div>
                        <div class="row" style="margin-top:35px">
                            @foreach ($service->indexItems as $item)
                                <div class="col-12 col-md-12">
                                    <div class="accordion1">
                                        <i class="fa fa-caret-{{ $arrow }} pr-3"></i>

                                        <i aria-hidden="true" class="{{ $item->icon_class }}"></i> {{ $item->name }}
                                    </div>
                                    <div class="panel1">
                                        {!! $item->description !!}
                                        @if ($item->sub_service_id != null)
                                            <div class="row" style="margin-bottom: 15px">
                                                <div class="">
                                                    <a href="{{ route('service', $item->sub_service_id) }}"
                                                        class="btn btn-primary" style="color: #fff">@lang('site.read_more')</a>

                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="col-md-6 pic-services wow fadeInUp" data-wow-delay=".6s" style="margin-top:55px">
                        <img src="{{ asset($service->index_image) }}" class="img-responsive" alt="">
                        <img src="{{ asset($service->index_image_2) }}" class="img-responsive" alt="">
                    </div>
                    <div class="col-md-12 wow fadeInUp" data-wow-delay=".3s" style="margin-top:50px">
                        @foreach ($service->sections as $section)
                            <div class="row mt-5">
                                <div class="col-12">
                                    <h3 class="service-section-title">{{ $section->title }}</h3>
                                    <div>
                                        {!! $section->content !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($section->images as $sectionImage)
                                    <div class="col-12 col-md">
                                        <div class="pt-3 text-center">
                                            <img class="service-section-image img-fluid"
                                                src="{{ asset($sectionImage->image) }}" alt=""
                                                style="width: fit-content;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>


                <section style="padding: 0">
                    @if ($service->getSlider(1)->count() > 0)
                        <h3>{{ $service->slider1 }}</h3>
                        <!-- slider 1 -->
                        <div class="simple-slider-wrapper">
                            <div class="control_prev"><span></span></div>
                            <div class="control_next"><span></span></div>
                            <div class="simple-slider-overflow-hidden">
                                <ul class="simple-slider">
                                    @foreach ($service->getSlider(1) as $index => $image)
                                        <li class="simple-slider-element {{ $index + 1 }}">
                                            <img class="slide-image" src="{{ asset($image->image) }}" />
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!--  slider 2 -->

                    @if ($service->getSlider(2)->count() > 0)
                        <h3>{{ $service->slider2 }}</h3>
                        <div class="simple-slider-wrapper">
                            <div class="control_prev"><span></span></div>
                            <div class="control_next"><span></span></div>
                            <div class="simple-slider-overflow-hidden">
                                <ul class="simple-slider">
                                    @foreach ($service->getSlider(2) as $index => $image)
                                        <li class="simple-slider-element {{ $index + 1 }}">
                                            <img class="slide-image" src="{{ asset($image->image) }}" />
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- slider 3 -->
                    @if ($service->getSlider(3)->count() > 0)
                        <h3>{{ $service->slider3 }}</h3>
                        <div class="simple-slider-wrapper">
                            <div class="control_prev"><span></span></div>
                            <div class="control_next"><span></span></div>
                            <div class="simple-slider-overflow-hidden">
                                <ul class="simple-slider">
                                    @foreach ($service->getSlider(3) as $index => $image)
                                        <li class="simple-slider-element {{ $index + 1 }}">
                                            <img class="slide-image" src="{{ asset($image->image) }}" />
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                </section>

            </div>
        </section>

        <!-- section begin -->
        <section id="" class="call-to-action bg-color  text-center  pt-7 pb-7">
            <a href="{{ route('service.order', $service->slug) }}" class="btn btn-secondary"
                style="color: #fff; padding: 15px 50px">@lang('site.order_now')</a>
        </section>
        <!-- logo carousel section close -->

        <section class="testimonials blog" dir="ltr">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12">
                        <div id="customers-testimonials" class="owl-carousel " data-animate="fadeInUp" data-delay="1.5">
                                <h2 class="text-center">الخدمات الفرعية</h2>
                            @foreach ($service->subServices as $index => $service)
                                <!--TESTIMONIAL 1 -->
                                <div class="item">
                                    <div class="shadow-effect">
                                        <div class="single-post" data-animate="">
                                            <div class="image-hover-wrap">
                                                <img class="img-fluid" src="{{ asset($service->image) }}" alt="">
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
                                            <h4>{{ Str::limit($service->brief, 140) }}</h4>

                                        </div>

                                    </div>
                                    <div class="testimonial-name" style="background-color: #DF1F26">
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


@endsection
