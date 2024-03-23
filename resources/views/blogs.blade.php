@extends('layouts.site')
@section('title', trans('site.blogs'))
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
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title position-relative pt-5 pb-5">
                        <ul class="custom-breadcrumb roboto list-unstyled mb-0 clearfix" data-animate="fadeInUp"
                            data-delay="1.2">
                            <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="#">@lang('site.blogs')</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">@lang('site.blogs')</h1>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End of Banner -->


    <!-- Service -->
    <section class="blog  pt-7 pb-7">
        <div class="container">

            <div class="row">
                <div class="col-md-9" dir="ltr">
                    @if ($blogs->count() == 0)
                        <h3
                            style="text-align: center;
                    padding-top: 50px;
                    font-weight: bold;
                    font-size: 3rem;">
                            لا يوجد نتائج</h3>
                    @endif
                    <div id="customers-testimonials" class="owl-carousel " data-animate="fadeInUp" data-delay="1.5">

                        @forelse ($blogs as $index => $blog)
                            <!--TESTIMONIAL 1 -->
                            <div class="item">
                                <div class="shadow-effect">
                                    <div class="single-post" data-animate="" style="padding: 0">
                                        <div class="image-hover-wrap">
                                            <img class="img-fluid" src="{{ asset($blog->image) }}" alt="" style=" aspect-ratio: 3 / 2;">
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
                                    <a href="{{ route('blog', $blog->slug) }}" class="btn btn-secondary">@lang('site.read_more')<i
                                            class="fas fa-caret-right"></i></a>
                                </div>
                            </div>
                            <!--END OF TESTIMONIAL 1 -->
                        @endforeach
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
                                        <a href="{{ route('blogs', ['tag'=>$tag->id]) }}">#{{ $tag->name }}</a>
                                    </li>

                                @endforeach
                            </ul>
                        </div>

                        {{-- <div class="single-widget text-center" data-animate="fadeInUp" data-delay=".1">
                            <h3 data-animate="fadeInUp" data-delay=".2">Advertisement</h3>
                            <img src="img/camera.jpg" alt="" data-animate="fadeInUp" data-delay=".25">
                        </div> --}}
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Service -->

@endsection
