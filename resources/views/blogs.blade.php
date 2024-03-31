@extends('layouts.site')
@section('title', trans('site.blog'))
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <style>
        .owl-carousel .owl-item img {
            max-width: unset !important;
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
            padding: 5px;
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
        .section_our_solution .row {
            align-items: center;
        }

        .our_solution_category {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .our_solution_category .solution_cards_box {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .solution_cards_box .solution_card {
            flex: 0 50%;
            background: #fff;
            box-shadow: 0 2px 4px 0 rgba(223, 31, 38, 0.2),
                0 5px 15px 0 rgba(223, 31, 38, 0.15);
            border-radius: 15px;
            margin: 8px;
            padding: 10px 15px;
            position: relative;
            z-index: 1;
            overflow: hidden;
            min-height: 165px;
            transition: 0.7s;
        }

        .solution_cards_box .solution_card:hover {
            background: #DF1F26;
            color: #fff;
            transform: scale(1.1);
            z-index: 9;
        }

        .solution_cards_box .solution_card:hover::before {
            background: rgb(85 108 214 / 10%);
        }

        .solution_cards_box .solution_card:hover .solu_title h3,
        .solution_cards_box .solution_card:hover .solu_description p {
            color: #fff;
        }

        .solution_cards_box .solution_card:before {
            content: "";
            position: absolute;
            background: rgb(85 108 214 / 5%);
            width: 170px;
            height: 400px;
            z-index: -1;
            transform: rotate(42deg);
            right: -56px;
            top: -23px;
            border-radius: 35px;
        }

        .solution_cards_box .solution_card:hover .solu_description button {
            background: #fff !important;
            color: #fff;
        }

        .solution_card .so_top_icon {}

        .solution_card .solu_title h3 {
            color: #212121;
            font-size: 1.3rem;
            margin-top: 13px;
            margin-bottom: 13px;
        }

        .solution_card .solu_description p {
            font-size: 15px;
            margin-bottom: 15px;
        }

        .solution_card .solu_description button {
            border: 0;
            border-radius: 15px;
            background: linear-gradient(140deg,
                    #DF1F26 0%,
                    #DF1F26 50%,
                    #DF1F26 75%) !important;
            color: #fff;
            font-weight: 500;
            font-size: 1rem;
            padding: 5px 16px;
        }

        .our_solution_content h1 {
            text-transform: capitalize;
            margin-bottom: 1rem;
            font-size: 2.5rem;
        }

        .our_solution_content p {}

        .hover_color_bubble {
            position: absolute;
            background: rgb(54 81 207 / 15%);
            width: 100rem;
            height: 100rem;
            left: 0;
            right: 0;
            z-index: -1;
            top: 16rem;
            border-radius: 50%;
            transform: rotate(-36deg);
            left: -18rem;
            transition: 0.7s;
        }

        .solution_cards_box .solution_card:hover .hover_color_bubble {
            top: 0rem;
        }

        .solution_cards_box .solution_card .so_top_icon {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: #fff;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .solution_cards_box .solution_card .so_top_icon img {
            width: 150px;
            height: 150px;
            object-fit: contain;
        }

        /*start media query*/
        @media screen and (min-width: 320px) {
            .sol_card_top_3 {
                position: relative;
                top: 0;
            }

            .our_solution_category {
                width: 100%;
                margin: 0 auto;
            }

            .our_solution_category .solution_cards_box {
                flex: auto;
            }
        }

        @media only screen and (min-width: 768px) {
            .our_solution_category .solution_cards_box {
                flex: 1;
            }
        }

        @media only screen and (min-width: 1024px) {
            .sol_card_top_3 {
                position: relative;
                top: -3rem;
            }

            .our_solution_category {
                width: 100%;
                margin: 0 auto;
            }
        }

        .solution_cards_box {
            display: flex;
            flex-wrap: wrap;
            text-align: right;
        }

        .solution_card {
            flex: 0 20%;
            min-width: 20%;
        }

        @media screen and (max-width: 768px) {
            .solution_card {
                flex: 0 50%;
                /* 2 cards per row on smaller screens */
            }
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
    <section class="page-title-wrap position-relative bg-light" data-bg-img="{{ asset($info->blog_header_image) }}"
        data-animate="fadeInUp" data-delay="1.1">
        <div id="particles_js"></div>
        <div class="container container-top">
            <div class="row">
                <div class="col-12">
                    <div class="page-title position-relative pt-5 pb-5">
                        <ul class="custom-breadcrumb roboto list-unstyled mb-0 clearfix" data-animate="fadeInUp"
                            data-delay="1.2">
                            <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="#">@lang('site.blog')</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">@lang('site.blog')</h1>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End of Banner -->


    <section class="blog">
        <div class="container">
            <div class="section_our_solution pt-5 pb-7">
                <div class="row" style="  margin: 0 auto;">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="our_solution_category">
                            @foreach ($categories as $index => $category)

                                @if ($index % 2 == 0)
                                    <div class="solution_cards_box" data-animate="fadeInUp"
                                        data-delay="{{ 1.5 + $index / 8 }}">
                                        <div class="solution_card">
                                            <div class="hover_color_bubble"></div>
                                            <div class="so_top_icon">
                                                <img src="{{ asset($category->image) }}" alt="">
                                            </div>
                                            <div class="solu_title">
                                                <a href="{{ route('blogs', ['category' => $category->id]) }}">
                                                    <h3> {{ $category->name }} </h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                @else
                                    <div class="solution_cards_box sol_card_top_3" data-animate="fadeInUp"
                                        data-delay="{{ 1.5 + $index / 8 }}">
                                        <div class="solution_card">
                                            <div class="hover_color_bubble"></div>
                                            <div class="so_top_icon">
                                                <img src="{{ asset($category->image) }}" alt="">
                                            </div>
                                            <div class="solu_title">
                                                <a href="{{ route('blogs', ['category' => $category->id]) }}">
                                                    <h3>{{ $category->name }} </h3>
                                                </a>

                                            </div>
                                        </div>

                                    </div>
                                @endif
                            @endforeach

                            <!--  -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blogs -->
    <section class="blog  pt-7 pb-7">
        <div class="container">
            <div class="row">
                <h3 class="col-md-12"
                    style="text-align: center;font-size: 2rem;
                margin-bottom: 35px;
                font-weight: bold;"
                    data-animate="fadeInUp" data-delay="1.5">المقالات</h3>
                <div class="col-md-12" dir="ltr">
                    @if ($blogs->count() == 0)
                        <h3 style="text-align: center;
                    padding-top: 50px;
                    font-weight: bold;
                    font-size: 3rem;"
                            data-animate="fadeInUp" data-delay="1.5">
                            لا يوجد نتائج</h3>
                    @endif
                    <div id="customers-testimonials" class="owl-carousel " data-animate="fadeInUp" data-delay="1.5">

                        @forelse ($blogs as $index => $blog)
                            <!--TESTIMONIAL 1 -->
                            <div class="item">
                                <div class="shadow-effect">
                                    <div class="single-post" data-animate="" style="padding: 0">
                                        <div class="image-hover-wrap">
                                            <img class="img-fluid" src="{{ asset($blog->image) }}" alt=""
                                                style=" aspect-ratio: 3 / 2;">
                                            <div
                                                class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                                <ul class="list-inline">
                                                    <li><a href="{{ route('blog', $blog->slug) }}"><i
                                                                class="fas fa-link"></i></a></li>
                                                    {{-- <li><a href="#"><i class="fas fa-share-alt"></i></a></li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                        <span> {{ $blog->updated_at->format('d F Y') }}</span>
                                        <h3>{{ $blog->title }}</h3>
                                        @php
                                            $desc = Str::limit(strip_tags($blog->description), 180, ' ...');
                                        @endphp
                                        <h4>{{ $desc }}</h4>

                                    </div>

                                </div>
                                <div class="testimonial-name" style="background-color: #DF1F26">
                                    <a href="{{ route('blog', $blog->slug) }}"
                                        class="btn btn-secondary">@lang('site.read_more')<i class="fas fa-caret-right"></i></a>
                                </div>
                            </div>
                            <!--END OF TESTIMONIAL 1 -->
                        @endforeach
                    </div>
                </div>
                <!-- Sidebar -->
                {{-- <div class="col-md-3" data-animate="fadeInUp" data-delay="1.5">
                    <aside>
                        <div class="single-widget" data-animate="fadeInUp" data-delay=".1">
                            <form>
                                <div class="form-group position-relative mb-0">
                                    <input class="form-control" name="search" type="text" placeholder="البحث"
                                        data-parsley-required-message="Please type at least one word."
                                         value="{{ $search }}">
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
                                        <a href="{{ route('blogs', ['tag'=>$tag->id]) }}">#{{ $tag->name }}</a>
                                    </li>

                                @endforeach
                            </ul>
                        </div>

                    </aside>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- End of Service -->

@endsection
