@extends('layouts.site')
@section('title')
    {{ $service->title }}
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
    <section class="page-title-wrap position-relative bg-light" data-bg-img="{{ asset($info->service_image) }}"
        data-animate="fadeInUp" data-delay="1.1">
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


    <section id="section-content" class=" pt-7 pb-7">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">


                        <div class="col-md-12 pic-services wow " data-animate="fadeInUp" data-delay="1.5"
                            style=" text-align: center;">
                            <img src="{{ asset($service->index_image) }}" class="img-responsive" alt="">

                        </div>
                        <div class="col-md-12 wow " style="margin-top:50px" data-animate="fadeInUp" data-delay="1.3">

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
                        @if ($service->index_image_2)
                            <div class="col-md-12 pic-services wow " data-animate="fadeInUp" data-delay="1.5"
                                style="margin-top:55px; text-align: center;">
                                <img src="{{ asset($service->index_image_2) }}" class="img-responsive" alt="">
                            </div>
                        @endif
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
                </div>
                <!-- Sidebar -->
                <div class="col-md-3" data-animate="fadeInUp" data-delay="1.5">
                    <aside>
                        <div class="single-widget" data-animate="fadeInUp" data-delay=".1">
                            <form>
                                <div class="form-group position-relative mb-0">
                                    <input class="form-control" name="search" type="text" placeholder="البحث"
                                        data-parsley-required-message="Please type at least one word." {{-- data-parsley-minlength="3"
                                data-parsley-minlength-message="Please type at least one word." --}}
                                        {{-- required --}} value="{{ $search }}">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>

                        <div class="single-widget" data-animate="fadeInUp" data-delay=".1">
                            <h3 data-animate="fadeInUp" data-delay=".2">تصنيفات المدونة</h3>
                            <ul class="widget-categories list-unstyled mb-0">
                                @foreach ($categories as $category)
                                    <li data-animate="fadeInUp" data-delay=".25"><a
                                            href="{{ route('blogs', ['category' => $category->id]) }}"><span>{{ $category->name }}</span><span
                                                class="count">{{ $category->blogs->count() }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="single-widget" data-animate="fadeInUp" data-delay=".1">
                            <h3 data-animate="fadeInUp" data-delay=".2">@lang('site.related_blogs')</h3>
                            <ul class="recent-posts list-unstyled mb-0">
                                @foreach ($latestBlogs as $blog)
                                    <li data-animate="fadeInUp" data-delay=".25"><a
                                            href="{{ route('blog', $blog->slug) }}">{{ $blog->title }}</a>
                                        <br>
                                        <span>{{ $blog->updated_at->format('d F Y') }}</span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <div class="single-widget" data-animate="fadeInUp" data-delay=".1">
                            <h3 data-animate="fadeInUp" data-delay=".2">تابعنا على مواقع التواصل الاجتماعي</h3>
                            <ul class="row half-gutters follow-us list-unstyled">
                                <li class="col-4" data-animate="fadeInUp" data-delay=".25">
                                    <a class="facebook" href="#">
                                        <i class="fab fa-facebook-f"></i>
                                        <span>Like</span>
                                    </a>
                                </li>
                                <li class="col-4" data-animate="fadeInUp" data-delay=".3">
                                    <a class="twitter" href="#">
                                        <i class="fab fa-twitter"></i>
                                        <span>Follow</span>
                                    </a>
                                </li>
                                <li class="col-4" data-animate="fadeInUp" data-delay=".35">
                                    <a class="google" href="#">
                                        <i class="fab fa-google-plus-g"></i>
                                        <span>Like</span>
                                    </a>
                                </li>
                                <li class="col-4" data-animate="fadeInUp" data-delay=".4">
                                    <a class="pinterest" href="#">
                                        <i class="fab fa-pinterest-p"></i>
                                        <span>Follow</span>
                                    </a>
                                </li>
                                <li class="col-4" data-animate="fadeInUp" data-delay=".45">
                                    <a class="rss" href="#">
                                        <i class="fas fa-rss"></i>
                                        <span>follow</span>
                                    </a>
                                </li>
                                <li class="col-4" data-animate="fadeInUp" data-delay=".5">
                                    <a class="linkedin" href="#">
                                        <i class="fab fa-linkedin-in"></i>
                                        <span>follow</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="single-widget" data-animate="fadeInUp" data-delay=".1">
                            <h3 data-animate="fadeInUp" data-delay=".2">Tags</h3>
                            <ul class="tags roboto list-inline mb-0">
                                @foreach ($tags as $index => $tag)
                                    <li data-animate="fadeInUp" data-delay="{{ 0.25 + $index / 8 }}">
                                        <a href="{{ route('blogs', ['tag' => $tag->id]) }}">#{{ $tag->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
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

    <!-- FAQ -->
    <section class="" data-animate="fadeInUp" data-delay="1.4">
        <div class="container">
                <h2 class="text-center pb-2" style="">@lang('site.FAQ_about') : {{ $service->title }}</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div id="accordion100" class="tm-accordion">
                        @foreach ($service->questions as $index => $faq)
                            <div class="card" {{-- data-animate="fadeInUp" data-delay="{{ 0.1 + $index / 8 }}" --}}>
                                <div class="card-header p-0" id="heading10{{ $index + 1 }}">
                                    <h5 class="title" data-toggle="collapse"
                                        data-target="#collapse10{{ $index + 1 }}"
                                        aria-expanded="@if ($index == 0) true
                                        @else
                                        false @endif"
                                        aria-controls="collapse10{{ $index + 1 }}">
                                         # {{ $index + 1 }} {{ $faq->question }}
                                        <i class="fas fa-chevron-down accordion-controls-icon open-icon"
                                            @if ($index == 0) style="display: none" @endif></i>
                                        <i class="fas fa-chevron-up accordion-controls-icon close-icon"
                                            @if ($index != 0) style="display: none" @endif
                                            aria-hidden="true"></i>

                                    </h5>
                                </div>
                                <div id="collapse10{{ $index + 1 }}"
                                    class="collapse @if ($index == 0) show @endif"
                                    aria-labelledby="heading10{{ $index + 1 }}" data-parent="#accordion100">
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
    <!-- End of FAQ -->

    <!-- section begin -->
    <section id="" class="call-to-action bg-color  text-center  pt-7 pb-7" data-animate="fadeInUp"
        data-delay=".5">
        <a href="{{ route('contact') }}" class="btn btn-secondary" style="color: #fff; padding: 15px 50px">أحجز الآن</a>
    </section>
    <!-- logo carousel section close -->

    @if ($service->subServices->count() > 0)
        <section class="testimonials blog" dir="ltr" data-animate="fadeInUp" data-delay="1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="text-center">الخدمات الفرعية</h2>
                        <div id="customers-testimonials" class="owl-carousel " data-animate="fadeInUp" data-delay="1.5">
                            @foreach ($service->subServices as $index => $service)
                                <!--TESTIMONIAL 1 -->
                                <div class="item">
                                    <div class="shadow-effect">
                                        <div class="single-post" data-animate="">
                                            <div class="image-hover-wrap">
                                                <img class="img-fluid" src="{{ asset($service->image) }}"
                                                    alt="">
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
                                            <h4>{!! Str::limit(Helper::removeSpecialCharacter($service->brief), 140) !!}</h4>

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

@endsection
