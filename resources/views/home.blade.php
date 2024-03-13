@extends('layouts.site')
@section('title', trans('site.home'))
@section('styles')
    <style>
        .services-title{
            background-size: contain !important;
        }
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

    <section class="position-relative bg-light pt-4 pb-4 headsection" id="headsection" style="min-height: 100vh">

        <div id="particles_js"></div>
        <div class="container">
            <div class="row align-items-center" style="padding-top: 120px">
                <div class="col-lg-6">
                    <!-- Banner content -->
                    <div class="banner-content">
                        <h1 data-animate="fadeInUp" data-delay="1.2">{{ $info->title }}</h1>
                        <h2 data-animate="fadeInUp" data-delay="1.3"><span class="">{{ $info->description }}</span>
                        </h2>
                        <ul class="list-inline" data-animate="fadeInUp" data-delay="1.4">
                            <li><a href="#" class="btn btn-primary" style="padding: 10px 25px">@lang('site.about_me')</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block" style="">
                    <!-- Banner image -->
                    <div class="banner-image">
                        <img class="section1" id src="{{ asset($info->about_me_image) }}" alt=""
                            data-animate="fadeInUp" data-delay="1.5" data-depth="0.2" style="margin: 0 auto; ">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->

    <!-- Features -->
    <section class="pt-7 pb-5-5 section2">
        <div class="container">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".1">
                            <img src="{{ asset('home/img/icons/vpn.svg') }}" alt="" alt="" data-no-retina
                                class="svg">
                            <h3>عنون1</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".3">
                            <img src="{{ asset('home/img/icons/support.svg') }}" alt="" alt=""
                                data-no-retina class="svg">
                            <h3>عنوان2</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".5">
                            <img src="{{ asset('home/img/icons/guarantee.svg') }}" alt="" alt=""
                                data-no-retina class="svg">
                            <h3>3عنوان3</h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-left" data-animate="fadeInUp" data-delay=".1">
                        <h2 class="heading-title">@lang('site.about_me')</h2>
                        <hr class="line line-hr-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" data-animate="fadeInUp" data-delay=".2">
                        <div class="about-p">{!! $about->about_me !!}</div>
                        <div class="about-info">
                            <div class="row">
                                @foreach ($aboutFields as $aboutField)
                                    <div class="col-md-6">
                                        <p><b>{{ $aboutField->title }}:</b> {{ $aboutField->value }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-1" data-animate="fadeInUp" data-delay=".4">
                        <div class="about-img animate-box" data-animate-effect="fadeInUp">
                            <div class="img" style="  text-align: center;"> <img src="{{ asset($info->about_me_image) }}"
                                    alt=""> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Features -->

    <!-- Our services -->
    <section class="">
        <div class="services-title position-relative pt-7" data-bg-img="{{ asset($info->service_image) }}" style="">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <!-- Section title -->
                        <div class="section-title text-center">
                            <h2 class="text-white" data-animate="fadeInUp" data-delay=".1">لماذا تحتاج خدماتنا؟ </h2>
                            <p class="text-white" data-animate="fadeInUp" data-delay=".3">هناك حقيقة مثبتة منذ زمن طويل وهي
                                أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع
                                الفقرات في الصفحة التي يقرأها.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="services-wrap bg-white position-relative pt-5 pb-5">
            <div class="container">
                <!-- All services -->

                <div class="row">
                    @foreach ($services as $index => $service)
                        <div class="col-md-4" data-animate="fadeInUp" data-delay="{{ 0.1 + $index / 4 }}">
                            <div class="d-flex flex-column justify-content-between gorman-services animate-box"
                                data-animate-effect="fadeInUp" style="height: 175px;">
                                <div class="gorman-icon"><i class="{{ $service->icon_class }}"></i></div>
                                <div class="gorman-text">
                                    <h3>{{ $service->title }}</h3>
                                    <div>{{ Str::limit($service->brief, 100) }}</div>
                                </div>
                                <div class="d-flex flex-row justify-content-between pt-4">
                                    <div>
                                        <a href="{{ route('service', $service->slug) }}"
                                            class="more"><span>@lang('site.read_more')</span></a>
                                    </div>
                                    <div>
                                        <a href="{{ route('service.order', $service->slug) }}"
                                            class="more"><span>@lang('site.order_now')</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- <!-- Service contact info -->
                <div class="roboto text-center font-weight-medium" data-animate="fadeInUp" data-delay=".65">
                    <p>If you have any questions in your mind, Just <a href="contact.html">click here</a> to write or you
                        can <br>Call to <a href="tel:1234567890">(+1) 234-567-890</a></p>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- End of Our services -->




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
                <li data-animate="fadeInUp" data-delay=".2">
                    <a href="#" target="_blank"><img src="{{ asset('home/img/brands/brand2.png') }}"
                            alt=""></a>
                </li>
                <li data-animate="fadeInUp" data-delay=".3">
                    <a href="#" target="_blank"><img src="{{ asset('home/img/brands/brand3.png') }}"
                            alt=""></a>
                </li>
                <li data-animate="fadeInUp" data-delay=".4">
                    <a href="#" target="_blank"><img src="{{ asset('home/img/brands/brand4.png') }}"
                            alt=""></a>
                </li>
                <li data-animate="fadeInUp" data-delay=".5">
                    <a href="#" target="_blank"><img src="{{ asset('home/img/brands/brand5.png') }}"
                            alt=""></a>
                </li>
                <li data-animate="fadeInUp" data-delay=".6">
                    <a href="#" target="_blank"><img src="{{ asset('home/img/brands/brand6.png') }}"
                            alt=""></a>
                </li>
                <li data-animate="fadeInUp" data-delay=".7">
                    <a href="#" target="_blank"><img src="{{ asset('home/img/brands/brand7.png') }}"
                            alt=""></a>
                </li>
                <li data-animate="fadeInUp" data-delay=".8">
                    <a href="#" target="_blank"><img src="{{ asset('home/img/brands/brand8.png') }}"
                            alt=""></a>
                </li>
                <li data-animate="fadeInUp" data-delay=".9">
                    <a href="#" target="_blank"><img src="{{ asset('home/img/brands/brand9.png') }}"
                            alt=""></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- End of Our clients -->

@endsection
