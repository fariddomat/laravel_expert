@extends('layouts.site')
@php
    $metaDescription = Str::limit(strip_tags($service->brief ?? ''), 160);
@endphp
@section('title')
    {{ $service->title }}
@endsection



@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <style>
        .table-responsive {
            display: revert !important;
            width: 100%;
        }

        .table-bordered td,
        .table-bordered th {
            padding-top: 20px;
        }

        @media (max-width: 480px) {
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
                            <li><a href="{{ route('services') }}">@lang('site.services')</a></li>
                            {{-- <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="">@lang('site.service_detail')</a></li> --}}
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">{{ $service->title }}</h1>
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
                        @if ($service->parent_id == '1')
                            <div data-animate="slideInRight" data-delay=".5">
                                <div class="col-md-12 wow "
                                    style="padding-right: 25px; padding-top:50px;
                                            background-image: url({{ asset($service->index_image) }});
                                            background-size: cover !important;
                                            min-height: 600px !imporant;
                                            background-color: rgba(255,255,255,0.7) !important;
                                            background-blend-mode: lighten !important; ;box-shadow: inset 0 -8px 8px #fff !important;">
                                    <h2 class="col-md-12 pt-2 pb-2" data-animate="fadeInDown" data-delay="1.4"
                                        style="font-size: 3rem;text-align: center">{{ $service->title }}</h2>

                                    @if ($service->subServices->count() > 0)
                                        <div class="col-md-12 text-center">
                                            <a href="#serviceSerivces" class="btn btn-secondary"
                                                style="padding: 10px 25px !important; margin-bottom: 25px !important;">خدماتنا</a>

                                        </div>
                                    @endif
                                    <div class="" style="">{!! $service->brief !!}</div>
                                    <div class="row" style="margin-top:35px">
                                        @foreach ($service->indexItems as $item)
                                            <div class="col-12 col-md-12">
                                                <div class="accordion1">
                                                    <i class="fa fa-caret-{{ $arrow }} pr-3"></i>

                                                    {{ $item->name }}
                                                </div>
                                                <div class="panel1">
                                                    {!! $item->description !!}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @elseif ($service->index_image)
                            <h2 class="col-md-12 pt-2 pb-2" data-animate="fadeInDown" data-delay="1.4"
                                style="font-size: 3rem;text-align: center">{{ $service->title }}</h2>

                            @if ($service->subServices->count() > 0)
                                <div class="col-md-12 text-center">
                                    <a href="#serviceSerivces" class="btn btn-secondary"
                                        style="padding: 10px 25px !important; margin-bottom: 25px !important;">خدماتنا</a>

                                </div>
                            @endif
                            <div class="col-md-6 wow " style="margin-top:50px ;" data-animate="slideInRight"
                                data-delay=".5">
                                <div>{!! $service->brief !!}</div>
                                <div class="row" style="margin-top:35px">
                                    @foreach ($service->indexItems as $item)
                                        <div class="col-12 col-md-12">
                                            <div class="accordion1">
                                                <i class="fa fa-caret-{{ $arrow }} pr-3"></i>

                                                {{ $item->name }}
                                            </div>
                                            <div class="panel1">
                                                {!! $item->description !!}
                                                {{-- @if ($item->sub_service_id != null)
                                            <div class="row" style="margin-bottom: 15px">
                                                <div class="">
                                                    <a href="{{ route('service', $item->sub_service_id) }}"
                                                        class="btn btn-primary" style="color: #fff">@lang('site.read_more')</a>

                                                </div>
                                            </div>
                                        @endif --}}
                                            </div>

                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="col-md-6 pic-services wow " data-animate="slideInLeft" data-delay="0.5"
                                style=" text-align: center; margin: auto 0;">
                                <img src="{{ asset($service->index_image) }}" class="img-responsive" alt="">
                            </div>
                        @else
                            <h2 class="col-md-12 pt-2 pb-2" data-animate="fadeInDown" data-delay="1.4"
                                style="font-size: 3rem;text-align: center">{{ $service->title }}</h2>

                            @if ($service->subServices->count() > 0)
                                <div class="col-md-12 text-center">
                                    <a href="#serviceSerivces" class="btn btn-secondary"
                                        style="padding: 10px 25px !important; margin-bottom: 25px !important;">خدماتنا</a>

                                </div>
                            @endif
                            <div class="col-md-12 wow " style="padding:0 2rem; margin-top:50px" data-animate="slideInRight"
                                data-delay=".5">
                                <div>{!! $service->brief !!}</div>
                                <div class="row" style="margin-top:35px">
                                    @foreach ($service->indexItems as $item)
                                        <div class="col-12 col-md-12">
                                            <div class="accordion1">
                                                <i class="fa fa-caret-{{ $arrow }} pr-3"></i>

                                                {{ $item->name }}
                                            </div>
                                            <div class="panel1">
                                                {!! $item->description !!}
                                            </div>

                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        @endif

                        @if ($service->index_image_2)
                            <div class="col-md-12 pic-services wow " data-animate="fadeInUp" data-delay=".4"
                                style="margin-top:55px; ;text-align: center;">
                                <img src="{{ asset($service->index_image_2) }}" class="img-responsive" alt="">
                            </div>
                        @endif
                        <div class="col-md-12 wow fadeInUp serviceRow" data-wow-delay=".5s"
                            @if ($service->parent_id != 1) style="margin-top:50px" @endif>
                            @foreach ($service->sections as $section)
                                <div class="row mt-5 ml-5 mr-5 serviceSection" data-animate="fadeInUp" data-delay=".2"
                                    style=" border: 1px solid #e0e1e0;
                                background: #fff;
                                box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
                                padding: 20px;
                                border-radius: 10px; /* Adjust spacing */">
                                    <div class="col-md-12">
                                        <h3 class="service-section-title"
                                            style=" font-size: 24px; /* Adjust font size */
                                        font-weight: bold; color:#DF1F26;
                                        margin-bottom: 15px; /* Adjust spacing */">
                                            {{ $section->title }}</h3>
                                        <div
                                            style="  line-height: 1.6; /* Adjust line spacing */
                                        margin-bottom: 20px; /* Adjust spacing */">
                                            {!! $section->content !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($section->images as $sectionImage)
                                        <div class="col-12 col-md" data-animate="fadeInUp" data-delay=".3">
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


                    <!-- FAQ -->
                    @if ($service->questions->count() > 0)
                        <section class="pt-5" data-animate="fadeInUp" data-delay="1.4">
                            <div class="container">
                                <h2 class="text-center pb-2" style="">@lang('site.FAQ_about') : {{ $service->title }}
                                </h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="accordion100" class="tm-accordion">
                                            @foreach ($service->questions as $index => $faq)
                                                <div class="card" data-animate="fadeInUp"
                                                    data-delay="{{ 0.1 + $index / 8 }}" data-animate="fadeInUp"
                                                    data-delay=".4">
                                                    <div class="card-header p-0" id="heading10{{ $index + 1 }}">
                                                        <h5 class="title" data-toggle="collapse"
                                                            data-target="#collapse10{{ $index + 1 }}"
                                                            aria-expanded="@if ($index == 0) true
                                        @else
                                        false @endif"
                                                            aria-controls="collapse10{{ $index + 1 }}">
                                                            #{{ $index + 1 }} {{ $faq->question }}
                                                            <i class="fas fa-chevron-down accordion-controls-icon open-icon"
                                                                @if ($index == 0) style="display: none" @endif></i>
                                                            <i class="fas fa-chevron-up accordion-controls-icon close-icon"
                                                                @if ($index != 0) style="display: none" @endif
                                                                aria-hidden="true"></i>

                                                        </h5>
                                                    </div>
                                                    <div id="collapse10{{ $index + 1 }}"
                                                        class="collapse @if ($index == 0) show @endif"
                                                        aria-labelledby="heading10{{ $index + 1 }}"
                                                        data-parent="#accordion100">
                                                        <div class="card-body">
                                                            {!! $faq->answer !!}</div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif
                    <!-- End of FAQ -->

                    <!-- section begin -->
                    {{-- <section id="" class="call-to-action bg-color  text-center  pt-2 pb-5"
                        data-animate="fadeInUp" data-delay=".5">
                        <a href="{{ route('contact') }}" class="btn btn-secondary"
                            style="color: #fff; padding: 15px 50px">أحجز الآن</a>
                    </section> --}}
                    <!-- logo carousel section close -->

                    @if ($service->subServices->count() > 0)
                        <section id="serviceSerivces" class="testimonials blog" dir="ltr" data-animate="fadeInUp"
                            data-delay="1" style="padding-top: 75px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h2 class="text-center">
                                            {{-- الخدمات الفرعية --}}
                                        </h2>
                                        <div id="customers-testimonials" class="owl-carousel " data-animate="fadeInUp"
                                            data-delay="1.5">
                                            @foreach ($service->subServices as $index => $service)
                                                <!--TESTIMONIAL 1 -->
                                                <div class="item">
                                                    <div class="shadow-effect">
                                                        <div class="single-post" data-animate="">
                                                            <div class="image-hover-wrap">

                                                                <img class="img-fluid" src="{{ asset($service->image) }}"
                                                                    alt="" loading="lazy">


                                                                <div
                                                                    class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                                                    <ul class="list-inline">
                                                                        <li><a
                                                                                href="{{ route('service', $service->slug) }}"><i
                                                                                    class="fas fa-link"></i></a>
                                                                        </li>
                                                                        {{-- <li><a href="#"><i class="fas fa-share-alt"></i></a></li> --}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <h3>{{ $service->title }}</h3>
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
                            </div>
                        </section>
                    @endif

                    <div class="disquss-comment mt-50" data-animate="fadeInUp" data-delay=".5"
                        style="background: white;
                    border-radius: 25px;
                    padding: 2rem;margin-top: 50px !important;">
                        <div id="disqus_thread"></div>
                        <script defer>
                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                            /*
                            var disqus_config = function () {
                            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            */
                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document,
                                    s = d.createElement('script');
                                s.src = 'https://almohtarif-2.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                                powered by Disqus.</a></noscript>
                    </div>


                </div>
                <!-- Sidebar -->

            </div>
            <section style="padding: 0" data-animate="fadeInUp" data-delay="1">
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


@endsection
