@extends('layouts.site')
@section('title')
    {{ $blog->title }}
@endsection

@section('styles')
    <style>
        .fs-25 {
            font-size: 25px;
        }

        img {
            width: 100% !important;
            /* height: auto !important; */
        }

        p {
            /* font-family: 'Al-Jazeera-Arabic-Regular'; */
        }

        .relatedBlogs {
            position: sticky;
            position: -webkit-sticky;
            top: 5px;
            max-height: 100vh;
            overflow-y: scroll;
            overflow-x: hidden;
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 5px;
        }

        .gorman-page {
            overflow: unset;
        }

        @media (max-width: 576px) {

            .pt-2,
            .py-2 {
                padding-top: 2.2rem !important;
            }

            .relatedBlogs {
                max-height: unset;
            }

            .gorman-page {
                overflow: hidden;
            }
        }

        .follow-a {
            display: flex;
            align-items: stretch;
            margin-left: 22px;
            background: #fff;
            border: 2px solid #fff;
            border-radius: 6px;
            box-shadow: 0 2px 10px 0 rgb(0 0 0 / 15%);
            transition: box-shadow;
            transition-duration: .25s;
            transition-timing-function: ease-out;
        }

        .follow-a:hover {
            color: #005cb1;
            box-shadow: 0 4px 20px 0 rgb(0 0 0 / 15%);
            border-color: rgba(0, 92, 177, .5);
        }

        .follow-a:hover .follow-span {
            border-color: rgba(0, 92, 177, .7);
        }

        .follow-a-div-icon {
            position: relative;
            flex: none;
            width: 50px;
            height: 50px;
            margin-left: -5px;
            margin-bottom: -3px;
            z-index: 1;
            padding: 0.625rem 0.8125rem 0.625rem 0.5rem;
            margin-top: auto;
            margin-bottom: auto;
        }

        .follow-a-div-content {
            padding: 0.625rem 0.8125rem 0.625rem 0.5rem;
            min-width: 0;
            overflow: hidden;
        }

        .follow-h3 {
            color: #007ef3;
            display: block;
            margin: 0;
            font-size: 1.125rem;
            line-height: 1.3;
            font-weight: 400;
            font-family: "proxima-nova", sans-serif;
        }

        .follow-span {
            border-bottom: 1px solid rgba(0, 126, 243, .4);
            line-height: 1.6;
        }

        .blog-content h1,
        .blog-content h2,
        .blog-content h3,
        .blog-content h4,
        .blog-content h5,
        .blog-content h6 {
            line-height: 1;
        }

        ul {
            list-style-type: initial;
        }

        .share-div {
            font-size: 20px;
            margin: auto;
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 20px;
            }

            .follow-span {
                font-size: 1rem;
            }

            .order-service {
                font-size: 13px;
            }

            .share-div {
                font-size: 16px;
            }

            .fs-25 {
                font-size: 20px;
            }
        }

        .author_image {
            width: 100px !important;
            height: 100px !important;
            object-fit: cover;
        }

        @media (max-width: 576px) {
            .author_image {
                width: 75px !important;
                height: 75px !important;
            }
        }

        .blog {
            background-color: transparent;
            background-image: linear-gradient(180deg, #FFF 30%, #0D1216 97%);

        }

        .post-details {
            background: #fff;
            /* box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5); */
            border-top: 2px solid rgba(255, 49, 49, 0.5);
            border-right: 2px solid rgba(255, 49, 49, 0.5);
            border-bottom: 2px solid rgba(255, 49, 49, 0.5);
            border-left: 2px solid rgba(255, 49, 49, 0.5);
        }

        .blog .container {
            max-width: 60rem;
        }

        .post-content h2 {
            font-size: 3rem;
            text-align: center;
        }

        .widget-categories li::before {
            width: 80%;
        }
    </style>

    <style>
        .sspan {
            position: absolute;
            border-radius: 100vmax;
        }

        .widget-categories span {
            position: relative;
        }

        .top {
            top: 0;
            left: 0;
            width: 0;
            height: 5px;
            background: linear-gradient(90deg,
                    transparent 50%,
                    rgba(255, 49, 49, 0.5),
                    rgb(255, 49, 49));
        }

        .bottom {
            right: 0;
            bottom: 0;
            height: 5px;
            background: linear-gradient(90deg,
                    rgba(255, 49, 49, 0.5),
                    rgb(255, 49, 49) ,transparent 50%);
        }

        .right {
            top: 0;
            right: 0;
            width: 5px;
            height: 0;
            background: linear-gradient(180deg,
                    transparent 30%,
                    rgba(255, 49, 49, 0.5),
                    rgb(255, 49, 49));
        }

        .left {
            left: 0;
            bottom: 0;
            width: 5px;
            height: 0;
            background: linear-gradient(180deg,
            rgba(255, 49, 49, 0.5),
                    rgb(255, 49, 49),
                    transparent 70%);
        }

        .top {
            animation: animateTop 3s ease-in-out infinite;
        }

        .bottom {
            animation: animateBottom 3s ease-in-out infinite;
        }

        .right {
            animation: animateRight 3s ease-in-out infinite;
        }

        .left {
            animation: animateLeft 3s ease-in-out infinite;
        }

        @keyframes animateTop {
            25% {
                width: 100%;
                opacity: 1;
            }

            30%,
            100% {
                opacity: 0;
            }
        }

        @keyframes animateBottom {

            0%,
            50% {
                opacity: 0;
                width: 0;
            }

            75% {
                opacity: 1;
                width: 100%;
            }

            76%,
            100% {
                opacity: 0;
            }
        }

        @keyframes animateRight {

            0%,
            25% {
                opacity: 0;
                height: 0;
            }

            50% {
                opacity: 1;
                height: 100%;
            }

            55%,
            100% {
                height: 100%;
                opacity: 0;
            }
        }

        @keyframes animateLeft {

            0%,
            75% {
                opacity: 0;
                bottom: 0;
                height: 0;
            }

            100% {
                opacity: 1;
                height: 100%;
            }
        }
    </style>
@endsection
@section('scripts')
    <script src="{{ asset('js/blog.js') }}"></script>
@endsection

@section('content')
    <!-- Page title -->
    <section class="page-title-wrap position-relative bg-light" data-bg-img="{{ asset($info->blog_header_image) }}"
        data-animate="fadeInUp" data-delay="1.1">
        <div id="particles_js"></div>
        <div class="container">
            <div class="row">
                <div class="col-11">
                    <div class="page-title position-relative pt-5 pb-5">
                        <ul class="custom-breadcrumb roboto list-unstyled mb-0 clearfix" data-animate="fadeInUp"
                            data-delay="1.2">
                            <li><a href="{{ route('home') }}">الرئيسية</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="#">تفاصيل المقال</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">{{ $blog->title }}</h1>
                    </div>
                </div>
                <div class="col-1">
                    <div class="world-map position-relative">
                        <img src="{{ asset('home/img/map.svg') }}" alt="" alt="" data-no-retina
                            class="svg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->

    <!-- Blog -->
    <section class=" blog pt-7 pb-7">
        <div class="bg-flow">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="post-details" data-animate="fadeInUp" data-delay=".1">
                            <div class="post-content">
                                <h2 data-animate="fadeInUp" data-delay="1.4">
                                    {{ $blog->title }}
                                </h2>
                                <span data-animate="fadeInUp" data-delay="1.5">تاريخ النشر: <a
                                        href="#">{{ $blog->updated_at->diffForHumans() }}</a> / بواسطة: <a
                                        href="#">{{ $blog->author_name }}</a>
                                    <br> التصنيف: <a
                                        href="{{ route('blogs', $blog->category->slug) }}">{{ $blog->category->name }}</a></span>
                                <img class="img-thumbnail" src="{{ asset($blog->image) }}" alt=""
                                    data-animate="fadeInUp" data-delay="0.2" style="aspect-ratio: 3/2;">

                                <div class="pt-2 pb-2" data-animate="fadeInUp" data-delay=".1">
                                    {!! $blog->introduction !!}
                                </div>

                                <blockquote data-animate="fadeInUp" data-delay=".1">
                                    <span><i class="fas fa-quote-right"></i></span>
                                    {!! $blog->content_table !!}
                                </blockquote>

                                <div data-animate="fadeInUp" data-delay=".3">{!! $blog->first_paragraph !!}</div>


                                <div class="pt-2" data-animate="fadeInUp" data-delay=".3">{!! $blog->description !!}</div>
                            </div>

                            <div class="row align-items-center half-gutters mb-5 tag-and-share">
                                <div class="col-xl-7 col-lg-6">
                                    <ul class="tags roboto list-inline mb-lg-0 mb-md-3">
                                        <li data-animate="fadeInUp" data-delay=".1"><i class="fas fa-tags"></i></li>
                                        @foreach ($blog->tags as $index => $tag)
                                            <li data-animate="fadeInUp" data-delay="{{ 0.15 + $index / 8 }}"><a
                                                    href="{{ route('blogs', ['tag' => $tag->id]) }}">{{ $tag->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                            <!-- Author info -->
                            <div class="d-flex align-items-center author-info-wrap">
                                <img class="img-thumbnail mr-3" src="{{ asset($blog->author_image) }}" alt=""
                                    data-animate="fadeInUp" data-delay=".1" style="max-width: 100px;aspect-ratio: 3/3;">
                                <div class="author-info">
                                    <h4 data-animate="fadeInUp" data-delay=".2">كتب المقال بواسطة: <a
                                            href="#">{{ $blog->author_name }}</a></h4>
                                    <p data-animate="fadeInUp" data-delay=".3">{{ $blog->author_title }}</p>
                                    <a class="roboto text-uppercase"
                                        href="{{ route('blogs', ['author' => $blog->author_name]) }}"
                                        data-animate="fadeInUp" data-delay=".4">مشاهدة كل مقالات الكاتب <i
                                            class="fas fa-caret-right"></i></a>
                                </div>
                            </div>

                            <!-- Next/Previous Post -->
                            <ul class="prev-next roboto d-flex justify-content-between list-unstyled mt-5 mb-5">
                                <li data-animate="fadeInUp" data-delay=".1">
                                    @if ($previousBlog)
                                        <a href="{{ route('blog', $previousBlog) }}"><i class="fas fa-caret-left"></i>
                                            المقال
                                            السابق</a>
                                        <span>{{ $previousBlog->title }}</span>
                                    @else
                                        <a><i class="fas fa-caret-left"></i> لايوجد مقال سابق</a>
                                        <span></span>
                                    @endif
                                </li>
                                <li class="text-right" data-animate="fadeInUp" data-delay=".2">
                                    @if ($nextBlog)
                                        <a href="{{ route('blog', $nextBlog) }}">المقال التالي <i
                                                class="fas fa-caret-right"></i></a>
                                        <span>{{ $nextBlog->title }}</span>
                                    @else
                                        <a>لا يوجد مقال تالي <i class="fas fa-caret-right"></i></a>
                                        <span></span>
                                    @endif
                                </li>
                            </ul>


                            {{-- aside --}}
                            <aside>
                                @if ($relatedBlogs->count() > 0)
                                    <div class="single-widget" data-animate="fadeInUp" data-delay=".1">
                                        <h3 data-animate="fadeInUp" data-delay=".2">@lang('site.related_blogs')</h3>
                                        <ul class="recent-posts list-unstyled mb-0">
                                            @foreach ($relatedBlogs as $blog)
                                                <li data-animate="fadeInUp" data-delay=".25"><a
                                                        href="{{ route('blog', $blog->slug) }}">{{ $blog->title }}</a>
                                                    <br>
                                                    <span>{{ $blog->updated_at->format('d F Y') }}</span>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                @endif
                                <div class="single-widget" data-animate="fadeInUp" data-delay=".1">
                                    <form action="{{ route('blogs') }}">
                                        <div class="form-group position-relative mb-0">
                                            <input class="form-control" name="search" type="text"
                                                placeholder="البحث"
                                                data-parsley-required-message="Please type at least one word."
                                                {{-- data-parsley-minlength="3"
                                            data-parsley-minlength-message="Please type at least one word." --}} {{-- required --}}>
                                            <button type="submit"><i class="fas fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>

                                <div class="single-widget" data-animate="fadeInUp" data-delay=".1">
                                    <h3 data-animate="fadeInUp" data-delay=".2">تصنيفات المدونة</h3>
                                    <ul class="widget-categories list-unstyled mb-0 row">
                                        @foreach ($categories as $category)
                                            <li class="col-md-4" data-animate="fadeInUp" data-delay=".25"><a
                                                    href="{{ route('blogs', ['category' => $category->id]) }}"><span>{{ $category->name }}</span><span
                                                        class="count">{{ $category->blogs->count() }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="single-widget" data-animate="fadeInUp" data-delay=".1">
                                    <h3 data-animate="fadeInUp" data-delay=".2">تابعنا على مواقع التواصل الاجتماعي</h3>
                                    <ul class="social-share list-inline mb-0 text-lg-right">
                                        <li data-animate="fadeInUp" data-delay=".4"><a class="pinterest"
                                                href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                        <li data-animate="fadeInUp" data-delay=".45"><a class="rss" href="#"><i
                                                    class="fas fa-rss"></i></a></li>
                                        <li data-animate="fadeInUp" data-delay=".5"><a class="linkedin"
                                                href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li data-animate="fadeInUp" data-delay=".55"><a class="google" href="#"><i
                                                    class="fab fa-google-plus-g"></i></a></li>
                                        <li data-animate="fadeInUp" data-delay=".6"><a class="twitter" href="#"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li data-animate="fadeInUp" data-delay=".65"><a class="facebook"
                                                href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>


                                {{-- <div class="single-widget text-center" data-animate="fadeInUp" data-delay=".1">
                                <h3 data-animate="fadeInUp" data-delay=".2">Advertisement</h3>
                                <img src="img/camera.jpg" alt="" data-animate="fadeInUp" data-delay=".25">
                            </div> --}}
                            </aside>

                            <span class="sspan top"></span>
                            <span class="sspan right"></span>
                            <span class="sspan bottom"></span>
                            <span class="sspan left"></span>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section>
    <!-- End of Blog -->

@endsection
