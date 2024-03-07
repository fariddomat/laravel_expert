@extends('layouts.site')
@section('title', trans('site.blogs'))
@section('styles')
    <style>
        .de-navbar-left section {
            padding: 70px !important;
        }

        .blog-list .btn-more {
            color: #fff;
        }

        .de_light .blog-list .date-box .day,
        .de_light .blog-read .date-box .month {
            color: #fff;
        }

        .blog-list .date-box .day,
        .blog-list .date-box .month {
            width: 85px;
            line-height: 32px;
        }

        .blog-list .post-text,
        .blog-read .post-text {
            padding-left: 100px;
        }


        .day {
                font-size: 20px !important;
            }

        @media screen and (max-width: 460px) {
            #filters li {
  display: flex;
            }
            h2{
                text-align: initial;
font-size: 1.5rem;
            }
            #section-portfolio {
                padding: 70px 45px !important;
            }

            #filters a {
            background: none;
            letter-spacing: 0;
            }
            #gallery .item {
                padding: 0;
                left: 0 !important;
            }

            .day {
                font-size: 12px !important;
            }

            @if (app()->getLocale() == 'ar')
            .post-text>h2 {
                padding-right: 100px !important;
            }
            @else
            .post-text>h2 {
                padding-left: 100px !important;
            }
            @endif

            .post-text {
                padding-left: 0 !important;
                padding-right: 0px !important;
            }
        }

    </style>
@endsection
@section('content')

    <!-- Blog -->
    <!-- subheader -->
    <section id="subheader" data-speed="8" data-type="background"
        style="background: url({{ asset($info->blog_header_image) }})top fixed">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>@lang('site.blog')</h1>
                    <ul class="crumb">
                        <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                        <li class="sep">/</li>
                        <li>@lang('site.blog')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->
    <section id="section-portfolio" class="no-padding">
        <div class="container-fluid">

            <div class="spacer-single"></div>

            <!-- portfolio filter begin -->
            <div class="row">


                <div class="col-md-12 text-center">
                    <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                        <li><a href="#" data-filter="*" class="selected">@lang('site.blog')</a>
                        </li>
                        @foreach ($blogCategories as $category)
                            <li><a href="#" data-filter=".{{ $category->id }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <!-- portfolio filter close -->

        </div>

        <div id="gallery" class="row g-0 wow fadeInUp" data-wow-delay=".3s">
            <div id="content" class="nopadding">
                <section id="section-content">
                    <ul class="blog-list">
                        @foreach ($blogs as $blog)
                            <!-- gallery item -->
                            <div class="col-md-12 col-12 item {{ $blog->category->id }}">
                                <li>
                                    <div class="post-content">
                                        <div class="post-image">
                                            <img src="{{ asset($blog->image) }}" alt=""
                                                style="border-radius: 15px 15px 0px 0px;" />
                                        </div>


                                        <div class="date-box">
                                            <div class="day" style="border-radius: 0px 0px 15px 15px;">
                                                {{ $blog->updated_at->format('d F
                                                                                                                                                                                            Y') }}
                                            </div>
                                        </div>

                                        <div class="post-text">
                                            <h2><a href="{{ route('blog', $blog->slug) }}">{{ $blog->title }}</a></h2>

                                            @php
                                            /* $desc= preg_replace("/<img[^>]+\>/i", "", $blog->description); */
                                            $desc= Str::limit(strip_tags($blog->description), 300 , ' ...');
                                            @endphp
                                            <p>{{ $desc }}</p>
                                        </div>

                                        <a href="{{ route('blog', $blog->slug) }}" class="btn-more">@lang('site.read_more')</a>
                                    </div>
                                </li>
                                {{--
                        <div class="de-post-poster" style="background-size: cover;">
                            <a class="d-overlay" href="{{ route('blog', $blog->slug) }}">
                                <div class="d-content" style="background-size: cover;">

                                    <h3>{{ $blog->title }}</h3>
                                    <span class="d-date">{{$blog->updated_at->format('d F
                                        Y')}}</span>
                                </div>
                            </a>
                            <div class="d-image" data-bgimage="url({{asset($blog->image)}})" style="background: url({{asset($blog->image)}}&quot;) 0% 0% / cover;"></div>
                        </div> --}}


                            </div>
                            <!-- close gallery item -->
                        @endforeach
                    </ul>
                </section>
            </div>

        </div>

        <div id="loader-area">
            <div class="project-load"></div>
        </div>
    </section>
@endsection
