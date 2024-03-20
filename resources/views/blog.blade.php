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

        /* h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        body,
        strong {
            color: unset;
        } */

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
    </style>
@endsection
@section('scripts')
    <script src="{{ asset('js/blog.js') }}"></script>
@endsection

@section('content')
    <!-- Page title -->
    <section class="page-title-wrap position-relative bg-light" data-bg-img="{{ asset($info->blog_header_image) }}"  data-animate="fadeInUp" data-delay="1.1">
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
                        <img src="img/map.svg" alt="" alt="" data-no-retina class="svg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->

    <!-- Blog -->
    <section class=" blog pt-7 pb-7">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="post-details" data-animate="fadeInUp" data-delay=".1">
                        <div class="post-content">
                            <img src="{{ asset($blog->image) }}" alt="" data-animate="fadeInUp" data-delay="1.4">
                            <span data-animate="fadeInUp" data-delay=".1">تاريخ النشر: <a
                                    href="#">{{ $blog->updated_at->diffForHumans() }}</a> / بواسطة: <a
                                    href="#">{{ $blog->author_title }}</a>
                                <br> التصنيف: <a
                                    href="{{ route('blogs', $blog->category->slug) }}">{{ $blog->category->name }}</a></span>
                            <h2 data-animate="fadeInUp" data-delay=".1">
                                {{ $blog->title }}
                            </h2>
                            <div data-animate="fadeInUp" data-delay=".1">
                                {!! $blog->introduction !!}
                            </div>

                            <blockquote data-animate="fadeInUp" data-delay=".1">
                                <span><i class="fas fa-quote-right"></i></span>

                                {!! $blog->content_table !!}
                            </blockquote>

                            <div data-animate="fadeInUp" data-delay=".1">{!! $blog->first_paragraph !!}</div>


                            <div data-animate="fadeInUp" data-delay=".1">{!! $blog->description !!}</div>
                        </div>

                        <div class="row align-items-center half-gutters mb-5 tag-and-share">
                            <div class="col-xl-7 col-lg-6">
                                <ul class="tags roboto list-inline mb-lg-0 mb-md-3">
                                    <li data-animate="fadeInUp" data-delay=".1"><i class="fas fa-tags"></i></li>
                                    @foreach ($blog->tags as $index => $tag)
                                        <li data-animate="fadeInUp" data-delay="{{ 0.15 + $index / 8 }}"><a
                                                href="{{ route('blogs', ['tag'=>$tag->id]) }}">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-xl-5 col-lg-6">
                                <ul class="social-share list-inline mb-0 text-lg-right">
                                    <li data-animate="fadeInUp" data-delay=".4"><a class="pinterest" href="#"><i
                                                class="fab fa-pinterest-p"></i></a></li>
                                    <li data-animate="fadeInUp" data-delay=".45"><a class="rss" href="#"><i
                                                class="fas fa-rss"></i></a></li>
                                    <li data-animate="fadeInUp" data-delay=".5"><a class="linkedin" href="#"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                    <li data-animate="fadeInUp" data-delay=".55"><a class="google" href="#"><i
                                                class="fab fa-google-plus-g"></i></a></li>
                                    <li data-animate="fadeInUp" data-delay=".6"><a class="twitter" href="#"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li data-animate="fadeInUp" data-delay=".65"><a class="facebook" href="#"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Author info -->
                        <div class="d-flex align-items-center author-info-wrap">
                            <img class="mr-3" src="{{ asset($blog->author_image) }}" alt=""
                                data-animate="fadeInUp" data-delay=".1">
                            <div class="author-info">
                                <h4 data-animate="fadeInUp" data-delay=".2">كتب المقال بواسطة: <a
                                        href="#">{{ $blog->author_name }}</a></h4>
                                <p data-animate="fadeInUp" data-delay=".3">{{ $blog->author_title }}</p>
                                <a class="roboto text-uppercase" href="#" data-animate="fadeInUp"
                                    data-delay=".4">مشاهدة كل مقالات الكاتب <i class="fas fa-caret-right"></i></a>
                            </div>
                        </div>

                        <!-- Next/Previous Post -->
                        <ul class="prev-next roboto d-flex justify-content-between list-unstyled mt-5 mb-5">
                            <li data-animate="fadeInUp" data-delay=".1">
                                <a href="#"><i class="fas fa-caret-left"></i> Prev Post</a>
                                <span>How to Watch Smith VS Holzken Live Online From Anywhere</span>
                            </li>
                            <li class="text-right" data-animate="fadeInUp" data-delay=".2">
                                <a href="#">Next Post <i class="fas fa-caret-right"></i></a>
                                <span>In Major Hiring Push, Web Hosting Powerhouse Go Daddy to</span>
                            </li>
                        </ul>

                        <!-- Comments -->
                        {{-- <div class="comments">
                            <h3 data-animate="fadeInUp" data-delay=".1">03 Comments</h3>
                            <ul class="main-comment list-unstyled">
                                <li data-animate="fadeInUp" data-delay=".2">
                                    <div class="single-comment">
                                        <div class="comment-author float-left">
                                            <img src="img/authors/comment-author1.png" alt="">
                                        </div>
                                        <div class="comment-content">
                                            <h4>Alice R. Leopard</h4>
                                            <a href="#"><i class="fas fa-reply"></i> Reply</a>
                                            <span>Jan 05, 2018 at 04:30 pm</span>
                                            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                                        </div>
                                    </div>
                                </li>

                                <li data-animate="fadeInUp" data-delay=".3">
                                    <div class="single-comment">
                                        <div class="comment-author float-left">
                                            <img src="img/authors/comment-author2.png" alt="">
                                        </div>
                                        <div class="comment-content">
                                            <h4>Brian C. Cook</h4>
                                            <a href="#"><i class="fas fa-reply"></i> Reply</a>
                                            <span>Jan 05, 2018 at 04:30 pm</span>
                                            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                                        </div>
                                    </div>

                                    <ul class="sub-comment list-unstyled">
                                        <li data-animate="fadeInUp" data-delay=".4">
                                            <div class="single-comment">
                                                <div class="comment-author float-left">
                                                    <img src="img/authors/comment-author3.png" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <h4>Cheryl E. Smith</h4>
                                                    <a href="#"><i class="fas fa-reply"></i> Reply</a>
                                                    <span>Jan 05, 2018 at 04:30 pm</span>
                                                    <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div> --}}
                        <!-- End of Comments -->

                        <!-- Comment Form -->
                        {{-- <div class="comment-form mt-5">
                            <h3 class="mb-4 font-weight-bold" data-animate="fadeInUp" data-delay=".1">Leave a Comment</h3>
                            <form action="#">
                                <textarea name="text" class="form-control" placeholder="Write your text" data-animate="fadeInUp" data-delay=".2" required></textarea>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Name" data-animate="fadeInUp" data-delay=".3" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="email" class="form-control" placeholder="E-mail" data-animate="fadeInUp" data-delay=".4" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Website" data-animate="fadeInUp" data-delay=".5">
                                    </div>
                                </div>
                                <button class="btn btn-square btn-primary mt-3" data-animate="fadeInUp" data-delay=".6">Leave Comment</button>
                            </form>
                        </div> --}}
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-3" data-animate="fadeInUp" data-delay="1.5">
                    <aside>
                        <div class="single-widget" data-animate="fadeInUp" data-delay=".1">
                            <form action="{{ route('blogs') }}">
                                <div class="form-group position-relative mb-0">
                                    <input class="form-control" name="search" type="text" placeholder="البحث"
                                        data-parsley-required-message="Please type at least one word."
                                        {{-- data-parsley-minlength="3"
                                        data-parsley-minlength-message="Please type at least one word." --}} {{-- required --}}>
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
                                @foreach ($relatedBlogs as $blog)
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
                                <li data-animate="fadeInUp" data-delay=".25"><a href="#">#Technology</a></li>
                                <li data-animate="fadeInUp" data-delay=".3"><a href="#">#Envato</a></li>
                                <li data-animate="fadeInUp" data-delay=".35"><a href="#">#ThemeForest</a></li>
                                <li data-animate="fadeInUp" data-delay=".4"><a href="#">#Domain</a></li>
                                <li data-animate="fadeInUp" data-delay=".45"><a href="#">#VPNet</a></li>
                                <li data-animate="fadeInUp" data-delay=".6"><a href="#">#CloudHostion</a></li>
                                <li data-animate="fadeInUp" data-delay=".65"><a href="#">#WordPress</a></li>
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
    <!-- End of Blog -->
@endsection
