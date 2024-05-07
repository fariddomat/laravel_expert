<!DOCTYPE html>
<html lang="en" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Document Title -->
    <link rel="icon" href="{{ asset($info->logo_icon) }}" type="image/png" sizes="16x16">
    <title>المحترف - @yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $metaDescription ?? $info->description }}">
    <meta name="author" content="Almohtarif">

    <link href="{{ asset($info->logo) }}" rel="shortcut icon" type="image/png">
    <link href="{{ asset($info->logo) }}" rel="apple-touch-icon">
    <link href="{{ asset($info->logo) }}" rel="apple-touch-icon" sizes="72x72">
    <link href="{{ asset($info->logo) }}" rel="apple-touch-icon" sizes="114x114">
    <link href="{{ asset($info->logo) }}" rel="apple-touch-icon" sizes="144x144">

    <!-- Favicon -->
    <link rel="shortcut icon" type="{{ asset($info->logo) }}" href="favicon.png">

    <!-- CSS Files -->

    {{-- <link href="https://fonts.googleapis.com/css?family=Cabin:400,400i,500i,700%7CRoboto:400,500,700" rel="stylesheet" async> --}}
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap-rtl.min.css') }}" media="print"
        onload="this.media='all'">
    <link rel="stylesheet" href="{{ asset('home/plugins/swiper/swiper.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('home/plugins/magnific-popup/magnific-popup.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/style-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/colors/theme-color-12.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">


    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">

    {{--  non critical css --}}
    <link href="{{ asset('fonts/fontawesome-free-6.4.2-web/css/all.css') }}" rel="stylesheet" media="print"
        onload="this.media='all'">

    {{-- icons --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" async/> --}}
    {{-- noty --}}
    <link rel="stylesheet" href="{{ asset('noty/noty.css') }}">
    @yield('styles')

    {{-- aos --}}
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <style>
        html {
            scroll-behavior: smooth;
        }

        @media only screen and (max-width: 768px) {
            .no-mobile {
                display: none;
            }
        }

        @media (max-width: 480px) {
            #particles_js {
                display: none;
            }

            #headsection {
                background-color: rgba(255, 255, 255, 0.7) !important;
                background-blend-mode: lighten !important;
            }

            .page-title {
                padding-bottom: 0.8rem !important;
                padding-top: 7.2rem !important;
            }

            .page-title h1,
            .page-title h2 {
                display: none
            }

            .page-title ul {
                /* margin-right: 2rem; */
            }

            .page-title-wrap {
                background: url({{ asset('home/img/header.png') }}) !important;
                background-size: 100% 100% !important;
                background-repeat: no-repeat !important;
                box-shadow: inset 0 -8px 8px #fff !important;
            }
        }

        header,
        .main-header {
            background: #0d1216c4 !important;
        }

        .stuck {
            background: #0d1216 !important;
        }
        .social-links i{
            font-size: 20px;
        }

        .social-links i:hover{
            font-size: 22px;
            color: #DF1F26 ;
        }

    </style>

</head>

<body>
    <!-- Preloader -->
    <div class="preLoader" style="  background: #fff;">
    </div>

    <!-- Main header -->
    <header class="header">
        <div class="header-top bg-primary" data-animate="fadeInDown" data-delay=".5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <!-- Header info -->
                        <ul class="header-info list-inline text-white mb-md-0">
                            {{-- <li>Your Location : Dhaka, Bangladesh</li> --}}
                        </ul>
                    </div>
                    <div class="col-md-3 d-none d-md-block">
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-9">
                        <!-- Logo -->
                        <div class="logo" data-animate="fadeInUp" data-delay=".7">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset($info->logo) }}" style="max-height: 70px" alt="شركة المحترف">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-5 col-sm-3 col-3">
                        <nav data-animate="fadeInUp" data-delay=".9">
                            <!-- Header-menu -->
                            <div class="header-menu">
                                <ul>

                                    <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                                    <li><a href="{{ route('about') }}">@lang('site.about')</a></li>
                                    <li><a href="{{ route('services') }}">@lang('site.services')</a></li>
                                    <li><a href="{{ route('blogs') }}">@lang('site.blog')</a></li>
                                    {{-- <li><a href="{{ route('home') }}#portfolio">@lang('site.my_works')</a></li> --}}
                                    <li><a href="{{ route('contact') }}">@lang('site.contact')</a></li>
                                    <li><a href="{{ route('workWithUs') }}">انضم الآن</a></li>
                                    <li><a href="{{ route('faq') }}">@lang('site.FAQ')</a></li>

                                </ul>
                            </div>
                            <!-- End of Header-menu -->
                        </nav>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 d-none d-sm-block">
                        <!-- Client area -->
                        <ul class="client-area text-right list-inline m-0" data-animate="fadeInUp" data-delay="1.1">

                            <li><a class="btn btn-secondary" href="{{ route('contact') }}">أحجز استشارتك الآن</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Main header -->

    @yield('content')

    <!-- Footer -->
    <footer class="main-footer bg-primary pt-4">
        <div class="container">
            <div class="row pb-3">
                <!-- Footer info -->
                <div class="col-md-4">
                    <div class="footer-info">
                        <h3 class="text-white">{{ $info->title }}</h3>
                        <p>{{ $info->footer }}</p>
                        <ul class="footer-contacts list-unstyled">
                            <li>
                                <i class="fas fa-phone"></i>
                                <a href="tel:{{ $contactInfo->mobile }}">{{ $contactInfo->mobile }}</a>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a>
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $contactInfo->location_link }}</span>
                            </li>
                        </ul>
                        <ul class="social-links list-inline mb-0">
                            @foreach ($socialMedias as $index => $socialMedia)
                                <li >
                                    <a href="{{ $socialMedia->link }}" target="_blank" style="color:#E2E2E2 "><i
                                            class="fa-brands {{ $socialMedia->icon }}"></i></a>

                                </li>
                            @endforeach
                        </ul>
                        <p>هل ترغب بفرصة عمل في بيئة راقية ؟كن فرداً من فريق
                            عمل المحترف و انضم لعائلتنا </p>
                        <a class="btn btn-secondary"
                            href="{{ route('workWithUs') }}">أنضم الآن</a>
                    </div>
                </div>
                <!-- End of Footer info -->

                <!-- Footer services -->
                <div class="col-md-4">
                    <div class="footer-posts">
                        <h3 class="text-white">@lang('site.services') </h3>
                        @foreach ($servicesA as $index => $service)
                            <div class="single-footer-post clearfix">

                                <h4 class="cabin font-weight-normal"><a
                                        href="{{ route('service', $service->slug) }}">{{ $service->title }}</a></h4>
                                {{-- <p>{!! Str::limit(Helper::removeSpecialCharacter($service->intro), 100) !!}</p> --}}
                            </div>
                        @endforeach

                        <a href="{{ route('services') }}" class="roboto text-uppercase" >@lang('site.view_all_services') <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
                <!-- End of Footer services -->

                <!-- Footer blog -->
                <div class="col-md-4">
                    <div class="footer-posts">
                        <h3 class="text-white">@lang('site.blog') </h3>
                        @foreach ($blogs as $index => $blog)
                            <div class="single-footer-post clearfix">
                                <a href="{{ route('blog', $blog->slug) }}" class="float-left">
                                    <img class="img-fluid" src="{{ asset($blog->image) }}"
                                        style="width: 60px !important;
                                        height: 40px !important;"
                                        alt="" loading="lazy">
                                </a>
                                <span> <a
                                        href="{{ route('blog', $blog->slug) }}">{{ $blog->updated_at->format('d F Y') }}</a></span>
                                <h4 class="cabin font-weight-normal"><a
                                        href="{{ route('blog', $blog->slug) }}">{{ $blog->title }}</a></h4>
                                {{-- <p>{!! Str::limit(Helper::removeSpecialCharacter($blog->description), 100) !!}</p> --}}
                            </div>
                        @endforeach

                        <a href="{{ route('blogs') }}" class="roboto text-uppercase" >@lang('site.view_all_blog') <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
                <!-- End of Footer blog -->
            </div>

            <div class="bottom-footer">
                <div class="row">
                    <!-- Copyright -->
                    <div class="col-md-5 order-last order-md-first">
                        <p class="copyright">&copy; جميع الحقوق محفوظة |
                            شركة المحترف {{ now()->year }} </p><span>by : <a
                                href="mailto:fariddomat.000@gmail.com">@FaridDomat</a></span>
                    </div>

                    <!-- Footer menu -->
                    <div class="col-md-7 order-first order-md-last">
                        <ul class="footer-menu list-inline text-md-right mb-md-0" >
                            <li>
                                <a href="{{ route('privacy') }}">@lang('site.privacy')</a>
                            </li>
                            <li>|</li>
                            <li><a href="{{ route('about') }}">@lang('site.about')</a></li>

                            <li>|</li>
                            <li><a href="{{ route('contact') }}">@lang('site.contact_us')</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Back to top -->
    <div class="back-to-top">
        <a href="#"> <i class="fas fa-arrow-up"></i></a>
    </div>

    <!-- JS Files -->
    <script src="{{ asset('home/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('home/js/fontawesome-all.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/plugins/typed.js/typed.min.js') }}"></script>
    <script src="{{ asset('home/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('home/plugins/waypoints/sticky.min.js') }}"></script>
    <script src="{{ asset('home/plugins/swiper/swiper.min.js') }}"></script>


    <div class="no-mobile">
        <script src="{{ asset('home/plugins/particles.js/particles.min.js') }}" defer></script>
        <script src="{{ asset('home/plugins/particles.js/particles.settings.js') }}" defer></script>
    </div>


    {{-- <script src="{{ asset('home/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script> --}}
    <script src="{{ asset('home/plugins/parsley/parsley.min.js') }}" defer></script>
    <script src="{{ asset('home/plugins/parallax/parallax.min.js') }}"></script>
    {{-- <script src="{{ asset('home/plugins/retinajs/retina.min.js') }}"></script> --}}
    <script src="{{ asset('home/js/menu.min.js') }}" defer></script>
    <script src="{{ asset('home/js/scripts.js') }}"></script>
    <script src="{{ asset('home/js/custom.js') }}" defer></script>

    <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.countup.js') }}"></script>

    {{-- aos --}}
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('noty/noty.min.js') }}"></script>
    <script defer>
        jQuery(document).ready(function($) {

            const genericLinks = document.querySelectorAll("a");

            genericLinks.forEach(link => {
                const linkText = link.textContent.trim();
                const newAriaLabel = `Read more about ${linkText}`;
                link.setAttribute("aria-label", newAriaLabel);
            });
        });
    </script>
    @include('partials._session')
    @yield('scripts')

</body>

</html>
