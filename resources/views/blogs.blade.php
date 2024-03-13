@extends('layouts.site')
@section('title', trans('site.blogs'))
@section('styles')
    <style>
        .de-navbar-left.de_light #subheader {
            background-size: cover !important;
        }

        #subheader {
            background-size: cover !important;
        }

        .stitle {
            font-weight: bold;
            font-size: 20px !important;
        }

        @media screen and (max-width: 460px) {
            #section-content {
                padding: 35px 25px 70px;
            }


            .blog-item {
                margin-top: 35px;
            }

            h3,
            p {
                height: auto !important;
            }

        }
    </style>
@endsection
@section('content')

    <!-- Page title -->
    <section class="page-title-wrap position-relative bg-light"  data-bg-img="{{ asset($info->blog_header_image) }}">
        <div id="particles_js"></div>
        <div class="container">
            <div class="row">
                <div class="col-11">
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

    <!-- blog -->
    <section class="blog pt-7 pb-7">
        <div class="container">
            <!-- Posts -->
            <div class="row">
                @foreach ($blogs as $index => $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-post" data-animate="fadeInUp" data-delay="{{ 1.5 + $index / 10 }}">
                            <div class="image-hover-wrap">
                                <img src="{{ asset($blog->image) }}" alt="">
                                <div
                                    class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                    <ul class="list-inline">
                                        <li><a href="{{ route('blog', $blog->slug) }}"><i class="fas fa-link"></i></a></li>
                                        {{-- <li><a href="#"><i class="fas fa-share-alt"></i></a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <span> {{ $blog->updated_at->format('d F Y') }}</span>
                            <h3>{{ $blog->title }}</h3>
                            @php
                                $desc = Str::limit(strip_tags($blog->description), 300, ' ...');
                            @endphp
                            <h4>{{ $desc }}</h4>
                            <a href="{{ route('blog', $blog->slug) }}">@lang('site.read_more')<i
                                    class="fas fa-caret-right"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Pagination -->

        </div>
    </section>
    <!-- End of Service -->

@endsection
