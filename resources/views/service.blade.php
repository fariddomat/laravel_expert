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

@section('content')
    <!-- subheader -->
    <section id="subheader" data-speed="8" data-type="background"
        style="background: url({{ asset($info->service_image) }}) top !important;background-position: unset !important;
        background-repeat: no-repeat !important; background-size: cover !important; ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="service-main-title">{{ $service->main_title }}</h1>

                    <ul class="crumb" style="margin-top: 60px">
                        <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                        <li class="sep">/</li>
                        <li>@lang('site.services')</li>
                        <li class="sep">/</li>
                        <li>{{ $service->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->


    <div id="content" class="nopadding">
        <section id="section-content">
            <div class="container-fluid">
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
        <section id="view-all-projects" class="call-to-action bg-color  text-center" data-speed="5" data-type="background"
            aria-label="view-all-projects">
            <a href="{{ route('service.order', $service->slug) }}" class="btn-line btn-big btn-h"
                style="color: #fff">@lang('site.order_now')</a>
        </section>
        <!-- logo carousel section close -->



    </div>
@endsection
