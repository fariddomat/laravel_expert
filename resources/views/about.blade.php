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
    <style>
        .our-team {
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        .our-team img {
            width: 100%;
            height: auto;
        }

        .our-team .team-content {
            width: 100%;
            background: #3f2b4f;
            color: #fff;
            padding: 15px 0 10px 0;
            position: absolute;
            bottom: 0;
            left: 0;
            z-index: 1;
            transition: all 0.3s ease 0s;
        }

        .our-team:hover .team-content {
            padding-bottom: 40px;
        }

        .our-team .team-content:before,
        .our-team .team-content:after {
            content: "";
            width: 60%;
            height: 38px;
            background: #3f2b4f;
            position: absolute;
            top: -18px;
            transform: rotate(15deg);
            z-index: -1;
        }

        .our-team .team-content:before {
            left: -3%;
        }

        .our-team .team-content:after {
            right: -3%;
            transform: rotate(-15deg);
        }

        .our-team .title {
            font-size: 20px;
            font-weight: 600;
            text-transform: capitalize;
            margin: 0 0 7px 0;
            position: relative;
        }

        .our-team .title:before,
        .our-team .title:after {
            content: "";
            width: 7px;
            height: 93px;
            background: #ff5543;
            position: absolute;
            top: -78px;
            z-index: -2;
            transform: rotate(-74deg);
        }

        .our-team .title:before {
            left: 32%;
        }

        .our-team .title:after {
            right: 32%;
            transform: rotate(74deg);
        }

        .our-team .post {
            display: block;
            font-size: 13px;
            text-transform: capitalize;
            margin-bottom: 8px;
        }

        .our-team .social-links {
            list-style: none;
            padding: 0 0 15px 0;
            margin: 0;
            position: absolute;
            bottom: -40px;
            right: 0;
            left: 0;
            transition: all 0.5s ease 0s;
        }

        .our-team:hover .social-links {
            bottom: 0;
        }

        .our-team .social-links li {
            display: inline-block;
        }

        .our-team .social-links li a {
            display: block;
            font-size: 16px;
            color: #aad6e1;
            margin-right: 6px;
            transition: all 0.5s ease 0s;
        }

        .our-team .social-links li:last-child a {
            margin-right: 0;
        }

        .our-team .social-links li a:hover {
            color: #ff5543;
        }

        @media only screen and (max-width: 990px) {
            .our-team {
                margin-bottom: 30px;
            }

            .our-team .team-content:before,
            .our-team .team-content:after {
                height: 50px;
                top: -24px;
            }

            .our-team .title:before,
            .our-team .title:after {
                top: -85px;
                height: 102px;
            }

            .our-team .title:before {
                left: 35%;
            }

            .our-team .title:after {
                right: 35%;
            }
        }

        @media only screen and (max-width: 767px) {

            .our-team .team-content:before,
            .our-team .team-content:after {
                height: 75px;
            }

            .our-team .team-content:before {
                transform: rotate(8deg);
            }

            .our-team .team-content:after {
                transform: rotate(-8deg);
            }

            .our-team .title:before,
            .our-team .title:after {
                width: 10px;
                top: -78px;
                height: 102px;
            }

            .our-team .title:before {
                left: 42.5%;
                transform: rotate(-82deg);
            }

            .our-team .title:after {
                right: 42.5%;
                transform: rotate(82deg);
            }
        }

        @media only screen and (max-width: 480px) {

            .our-team .title:before,
            .our-team .title:after {
                top: -83px;
            }
        }
    </style>

    <style>
        .card {
            width: 100%;
            height: 350px;
            perspective: 1000px;
            cursor: pointer;
            border-radius: 10px;
            background-color: unset;
            border: unset;
            margin-bottom: 35px;

        }

        .card img {
            width: 250px;
            height: 250px;
            object-fit: contain;
            border-radius: 50%;
        }

        .card-container {
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.5s;
            box-shadow: 0 4px 8px 0 rba(0, 0, 0, 0.2);
            border-radius: 10px;

            border: 1px solid #ccc;
            border-radius: 10px;
            background: #fff;
        }

        .card:hover .card-container {
            transform: rotateY(180deg);
        }

        .card-face {
            width: 100%;
            height: 100%;
            position: absolute;
            backface-visibility: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border: 1px solid #ccc;
            border-radius: 10px;
            background: #fff;
            z-index: 5;
        }

        .container-about {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 10px;
            margin: 20px 0 0 0;
            padding: 20px;
        }

        .front-face {
            transform: rotateY(0deg);
        }

        .back-face {
            display: flex;
            transform: rotateY(180deg);
            padding-top: 50px
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
    <script>
        $(document).ready(function() {
            // Owl Carousel for team gallery
            $('.team-gallery').owlCarousel({
                loop: true,
                margin: 10,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 3,
                    }
                }
            });

            // Filter team members based on category
            $('.filter-category li a').click(function(e) {
                e.preventDefault();

                var filter = $(this).data('filter');

                $('.team-member').each(function() {
                    var category = $(this).data('category');

                    if (filter === 'all' || filter === category) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                // Update active class for navigation
                $(this).closest('li').addClass('active').siblings().removeClass('active');
            });

            // Initially show all team members
            $('.team-member').show();
        });
    </script>
@endsection
@section('content')

    <!-- Page title  -->
    <section class="page-title-wrap position-relative bg-light" data-bg-img="{{ asset($info->about_header_image) }}"
        data-animate="fadeInUp" data-delay="1.1">
        <div id="particles_js"></div>
        <div class="container">
            <div class="row">
                <div class="col-11">
                    <div class="page-title position-relative pt-5 pb-5">
                        <ul class="custom-breadcrumb roboto list-unstyled mb-0 clearfix" data-animate="fadeInUp"
                            data-delay="1.2">
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
    <section class="pt-2 pb-2">
        <div class="container" style="  max-width: 60rem;">
            <div class="pt-5 pl-5 pr-5 pb-5" style="overflow: hidden;
            border: 1px solid #e0e1e0;
            background: #fff;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);"  data-animate="fadeInUp" data-delay="1.5">

            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="about-us-title text-center">
                        <h2 data-animate="fadeInUp" data-delay="1.5">@lang('about.who')</h2>
                        <div class="mt-3" data-animate="fadeInUp" data-delay="1.7"> {!! $about->who_are_we !!}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="single-about-us-info" data-animate="fadeInUp" data-delay=".3">
                        <p> {!! $about->goals !!}</p>
                    </div>

                    <div class="single-about-us-info" data-animate="fadeInUp" data-delay=".3">
                        <p> {!! $about->vision !!}</p>
                    </div>
                    <div class="single-about-us-info" data-animate="fadeInUp" data-delay=".3">
                        <p> {!! $about->ambition !!}</p>
                    </div>
                </div>
            </div>
            {{--
            <div class="write-about-us text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 data-animate="fadeInUp" data-delay=".1">@lang('contact.connect')</h2>
                        <a href="{{ route('contact') }}" class="btn btn-primary" data-animate="fadeInUp"
                            data-delay=".3">@lang('site.contact_us')</a>
                    </div>
                </div>
            </div> --}}
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
                        <h2 data-animate="fadeInUp" data-delay=".1">وها هو @lang('site.our_team')</h2>

                    </div>
                </div>
            </div>

            <!-- Members -->
            <div class="row justify-content-center mb-4">
                <div class="col-md-auto" data-animate="fadeInUp" data-delay=".2">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link btn btn-dark ml-2" style="color: #fff">{{ $teams[0]->teamRole->name }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-md-3 col-sm-6 team-member" data-animate="fadeInUp" data-delay="0.3">
                    <div class="card">
                        <div class="card-container">
                            <div class="card-face front-face">
                                <img src="{{ asset($teams[0]->image) }}" alt style="padding: 20px">
                                {{ $teams[0]->name }}
                                <div style="padding: 25px">{{ $teams[0]->title }}</div>
                            </div>
                            <div class="card-Face back-face">
                                <div class="container about">

                                    <p>{{ $teams[0]->description }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-4" data-animate="fadeInUp" data-delay=".4">
                <div class="col-md-auto">
                    <ul class="nav nav-pills filter-category">
                        <li class="nav-item">
                            <a class="nav-link btn btn-secondary active" data-filter="all" href="#">All</a>
                        </li>
                        @foreach ($teamRoles as $index => $teamRole)
                            @php
                                if ($index === 0) {
                                    continue;
                                }
                            @endphp
                            <li class="nav-item">
                                <a class="nav-link btn btn-dark ml-2" data-filter="{{ $teamRole->name }}"
                                    href="#">{{ $teamRole->name }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>

            <!-- Members -->
            <div class="row justify-content-center">
                @foreach ($teams as $team)
                    @php
                        if ($team->team_role_id === 1) {
                            continue;
                        }
                    @endphp
                    <div class="col-md-3 col-sm-6 team-member" data-category="{{ $team->teamRole->name }}"
                        data-animate="fadeInUp" data-delay="0.1">
                        <div class="card">
                            <div class="card-container">
                                <div class="card-face front-face">
                                    <img src="{{ asset($team->image) }}" alt style="padding: 20px">
                                    {{ $team->name }}
                                    <div style="padding: 25px">{{ $team->title }}</div>
                                </div>
                                <div class="card-Face back-face">
                                    <div class="container about">

                                        <p>{{ $team->description }}</p>
                                        <div class="ca href target blant" classhi fo bi-facebook">
                                            <a href target blans class-hi ig bi-instagram">
                                                <a href" target="blank" class="bi git si-github">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

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

@endsection
