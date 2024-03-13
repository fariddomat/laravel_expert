@extends('layouts.site')

@section('title', trans('site.about'))
@section('styles')
    <style>
        .headsection {
            background: url("http://127.0.0.1:8000/home/img/travel.jpg");
            background-attachment: fixed;
            position: relative;
            background-repeat: no-repeat;
            opacity: 1;
            transition: opacity 0.5s, transform 0.5s;
            z-index: 1;
            background-size: cover;
        }

        .section1 {
            /* background-image: url('http://127.0.0.1:8000/photos/home/icon.png'); */


            position: absolute;
            top: 20px;
            /* Adjust as needed */
            left: 20px;
            /* Adjust as needed */
            width: 200px;
            /* Adjust as needed */
            z-index: 1000;
            /* background-attachment: fixed; */


            /* Ensure the background stays behind the content */
            transition: opacity 0.5s;
        }

        .section2 {
            background: linear-gradient(rgba(255, 255, 255, .9), rgba(255, 255, 255, .5)), url("http://127.0.0.1:8000/home/img/icons/ticket.png");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 1;
            transition: opacity 0.5s, transform 0.5s;
            z-index: 1;
            transition: opacity 0.5s;
            background-size: auto;
        }

        .section3 {
            background: linear-gradient(rgba(255, 255, 255, .5), rgba(255, 255, 255, .5)), url("http://127.0.0.1:8000/home/img/icons/airplane.png");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 1;
            transition: opacity 0.5s, transform 0.5s;
            z-index: 1;
            transition: opacity 0.5s;
            background-size: auto;
        }
    </style>
@endsection
@section('scripts')


    <script>
        var lastScrollTop = 0;

        window.addEventListener("scroll", function() {
            var currentScroll = window.pageYOffset || document.documentElement.scrollTop;
            var img = document.getElementById('section3');
            if (currentScroll > lastScrollTop) {
                // Scrolling down
                img.style.backgroundImage =
                "url('http://127.0.0.1:8000/home/img/icons/airplane.png')"; // Replace with your image path
            } else {
                // Scrolling up
                img.style.backgroundImage =
                "url('http://127.0.0.1:8000/home/img/icons/airplane2.png')"; // Replace with your image path
            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
        }, false);
    </script>
@endsection
@section('content')

    <!-- Page title  -->
    <section class="page-title-wrap position-relative bg-light"  data-bg-img="{{ asset($info->about_header_image) }}">
        <div id="particles_js"></div>
        <div class="container">
            <div class="row">
                <div class="col-11">
                    <div class="page-title position-relative pt-5 pb-5">
                        <ul class="custom-breadcrumb roboto list-unstyled mb-0 clearfix" data-animate="fadeInUp" data-delay="1.2">
                            <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="#">>@lang('site.about')</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">@lang('site.about')</h1>
                    </div>
                </div>
                <div class="col-1">
                    <div class="world-map position-relative">
                        <img src="img/map.svg" alt="" alt="" data-no-retina class="svg">>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->

    <!-- About us -->
    <section class="pt-7 pb-7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="about-us-title text-center">
                        <h2 data-animate="fadeInUp" data-delay="1.5">@lang('about.who')</h2>
                        <p data-animate="fadeInUp" data-delay="1.7"> {!! $about->who_are_we !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="single-about-us-info" data-animate="fadeInUp" data-delay=".1">
                        <h3>@lang('about.history')</h3>
                        <p> {!! $about->history !!}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-about-us-info" data-animate="fadeInUp" data-delay=".2">
                        <h3>@lang('about.massage')</h3>
                        <p> {!! $about->massage !!}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-about-us-info" data-animate="fadeInUp" data-delay=".3">
                        <h3>@lang('about.vision')</h3>
                        <p> {!! $about->vision !!}</p>
                    </div>
                </div>
            </div>

            <div class="write-about-us text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 data-animate="fadeInUp" data-delay=".1">@lang('contact.connect')</h2>
                        {{-- <p data-animate="fadeInUp" data-delay=".2">@lang('contact.get_in_touch')</p> --}}
                        <a href="{{ route('contact') }}" class="btn btn-primary" data-animate="fadeInUp" data-delay=".3">@lang('site.contact_us')</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of About us -->

    <!-- Our team -->
    <section class="pt-7 pb-5-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title text-center">
                        <h2 data-animate="fadeInUp" data-delay=".1">@lang('site.our_team')</h2>
                        {{-- <p data-animate="fadeInUp" data-delay=".2">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p> --}}
                    </div>
                </div>
            </div>

            <!-- Members -->
            <div class="row justify-content-center">


                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-member" data-animate="fadeInUp" data-delay=".1">
                        <div class="image-hover-wrap">
                            <img src="{{ asset('home/img/members/member2.jpg') }}" alt="">
                            <div class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                <ul class="list-inline">
                                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-member-info">
                            <h4>Marie S. Higginbotham</h4>
                            <span>Senior Marketing Officer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-member" data-animate="fadeInUp" data-delay=".1">
                        <div class="image-hover-wrap">
                            <img src="{{ asset('home/img/members/member2.jpg') }}" alt="">
                            <div class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                <ul class="list-inline">
                                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-member-info">
                            <h4>Marie S. Higginbotham</h4>
                            <span>Senior Marketing Officer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-member" data-animate="fadeInUp" data-delay=".1">
                        <div class="image-hover-wrap">
                            <img src="{{ asset('home/img/members/member2.jpg') }}" alt="">
                            <div class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                <ul class="list-inline">
                                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-member-info">
                            <h4>Marie S. Higginbotham</h4>
                            <span>Senior Marketing Officer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-member" data-animate="fadeInUp" data-delay=".1">
                        <div class="image-hover-wrap">
                            <img src="{{ asset('home/img/members/member2.jpg') }}" alt="">
                            <div class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                <ul class="list-inline">
                                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-member-info">
                            <h4>Marie S. Higginbotham</h4>
                            <span>Senior Marketing Officer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-member" data-animate="fadeInUp" data-delay=".1">
                        <div class="image-hover-wrap">
                            <img src="{{ asset('home/img/members/member2.jpg') }}" alt="">
                            <div class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                <ul class="list-inline">
                                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-member-info">
                            <h4>Marie S. Higginbotham</h4>
                            <span>Senior Marketing Officer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-member" data-animate="fadeInUp" data-delay=".1">
                        <div class="image-hover-wrap">
                            <img src="{{ asset('home/img/members/member2.jpg') }}" alt="">
                            <div class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                <ul class="list-inline">
                                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-member-info">
                            <h4>Marie S. Higginbotham</h4>
                            <span>Senior Marketing Officer</span>
                        </div>
                    </div>
                </div>

        </div>
    </section>
    <!-- End of Our team -->



    <!-- Servers -->
    <section id="section3" class="servers pt-7 bg-light section3">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-5">
                    <div class="section-title">
                        <h2 data-animate="fadeInUp" data-delay=".1">سافر لكل مكان</h2>
                        <p data-animate="fadeInUp" data-delay=".2">يمكن أن نقوم بمساعدتك باختيار الوجهة المناسبة لك</p>
                    </div>
                    <ul class="data-centers list-unstyled list-item clearfix">
                        <li data-animate="fadeInUp" data-delay=".1"><i class="fas fa-caret-right"></i>ألمانيا (201)
                        </li>
                        <li data-animate="fadeInUp" data-delay=".2"><i class="fas fa-caret-right"></i>الإمارات (169)
                        </li>
                        <li data-animate="fadeInUp" data-delay=".3"><i class="fas fa-caret-right"></i>رومانيا (151)</li>
                        <li data-animate="fadeInUp" data-delay=".4"><i class="fas fa-caret-right"></i>هنغاريا
                            (142)</li>
                        <li data-animate="fadeInUp" data-delay=".5"><i class="fas fa-caret-right"></i>آسيا (70)</li>
                        <li data-animate="fadeInUp" data-delay=".6"><i class="fas fa-caret-right"></i>افريقيا (40)</li>
                    </ul>
                </div>
                <div class="col-xl-5 col-lg-7 d-none d-lg-block">
                    <div class="server-map">
                        <img src="{{ asset('home/img/servers.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Servers -->

    <!-- Our clients -->
    <section class="clients-wrap pt-4 pb-4">
        <div class="container">
            <ul class="our-clients list-unstyled d-md-flex align-items-md-center justify-content-md-between m-0">

                <li data-animate="fadeInUp" data-delay=".1">
                    <a href="#" target="_blank"><img src="{{ asset('home/img/brands/brand1.png') }}"
                            alt=""></a>
                </li>

        </div>
    </section>
    <!-- End of Our clients -->
@endsection
