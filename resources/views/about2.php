
    <!-- subheader -->
    <section id="subheader" data-speed="8" data-type="background"
        style="background: url({{ asset($info->about_header_image) }})top fixed">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>@lang('site.about')</h1>
                    <ul class="crumb">
                        <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                        <li class="sep">/</li>
                        <li>@lang('site.about')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <div id="content" class="nopadding">

        <section id="section-about-us-4" class="side-bg no-padding">
            <div class="image-container col-lg-5 col-md-12 pull-left" data-delay="0"
                style="@if (app()->getLocale() == 'ar') left: 0;
                @else
                right: 0; @endif ">
                <img src="{{ asset($aboutImages->where('id', 2)->first()->image) }}" style="width: 100%;margin-top: 50px;"
                    class="img-responsive" alt="">

            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="inner-padding">
                        <div class="col-lg-5 offset-lg-1 col-md-12 wow fadeInLeft" data-wow-delay=".2s">
                            <h2>@lang('about.who')</h2>

                            <p class="intro">
                                {!! $about->who_are_we !!}
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <section id="section-about-us-4" class="side-bg no-padding">
            <div class="image-container col-lg-5 col-md-12 pull-left" data-delay="0">
                <img src="{{ asset($aboutImages->where('id', 3)->first()->image) }}" style="width: 100%;margin-top: 50px;"
                    class="img-responsive" alt="">

            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="inner-padding">
                        <div class="col-lg-5 offset-lg-6 col-md-12 wow fadeInRight" data-wow-delay=".2s">
                            <h2>@lang('about.history')</h2>

                            <p class="intro">
                                {!! $about->history !!}
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <section id="section-about-us-4" class="side-bg no-padding">
            <div class="image-container col-lg-5 col-md-12 pull-left" data-delay="0"
                style="@if (app()->getLocale() == 'ar') left: 0;
                @else
                right: 0; @endif ">
                <img src="{{ asset($aboutImages->where('id', 4)->first()->image) }}" style="width: 100%;margin-top: 50px;"
                    class="img-responsive" alt="">

            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="inner-padding">
                        <div class="col-lg-5 offset-lg-1 col-md-12 wow fadeInLeft" data-wow-delay=".2s">
                            <h2>@lang('about.massage')</h2>

                            <p class="intro">
                                {!! $about->massage !!}
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <section id="section-about-us-4" class="side-bg no-padding">
            <div class="image-container col-lg-5 col-md-12 pull-left" data-delay="0">
                <img src="{{ asset($aboutImages->where('id', 5)->first()->image) }}" style="width: 100%; margin-top: 50px"
                    class="img-responsive" alt="">
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="inner-padding">
                        <div class="col-lg-5 offset-lg-6 col-md-12 wow fadeInRight" data-wow-delay=".2s">
                            <h2>@lang('about.goals')</h2>

                            <p class="intro">
                                {!! $about->goals !!}
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <section id="section-about-us-4" class="side-bg no-padding">
            <div class="image-container col-lg-5 col-md-12 pull-left" data-delay="0"
                style="@if (app()->getLocale() == 'ar') left: 0;
                @else
                right: 0; @endif">
                <img src="{{ asset($aboutImages->where('id', 6)->first()->image) }}" style="width: 100%; margin-top: 50px"
                    class="img-responsive" alt="">
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="inner-padding">
                        <div class="col-lg-5 offset-lg-1 col-md-12 wow fadeInLeft" data-wow-delay=".2s">
                            <h2>@lang('about.vision')</h2>

                            <p class="intro">
                                {!! $about->vision !!}
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>


        <!-- section begin -->
        <section id="section-testimonial-architecture" class="jarallax"
            style=";
        padding-bottom: 25px;padding-top: 30px;">
            <img src="{{ asset('home/bg18.webp') }}" class="jarallax-img" alt=""
                style="border-radius: 15px 15px 15px 15px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                        <h2 class="title" style="color: #fff; margin-bottom: 0">@lang('site.team_experience')</h2>

                    </div>
                    <div class="col-md-12 ">

                        <div id="testimonial-carousel-single" class="owl-carousel owl-theme wow fadeInUp"
                            style="padding: 0">
                            @foreach ($experinceSlider as $image)
                                <blockquote class="testimonial-big">
                                    <img src="{{ asset($image->image) }}" alt=""
                                        style="border-radius: 15px 15px 15px 15px;">
                                </blockquote>
                            @endforeach
                        </div>

                    </div>

                </div>

            </div>
        </section>
        <!-- section close -->
        <section id="partner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                        <h2 class="title" style="color: #000;">@lang('site.our_partner')</h2>

                    </div>
                    <div class="col-md-12">
                        <div id="owl-logo" class="owl-carousel owl-theme de_carousel">
                            @foreach ($partnerSlider as $image)
                                <img src="{{ asset($image->image) }}" class="img-responsive" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!-- section begin -->
        <section id="view-all-projects" class="call-to-action bg-color text-center" data-speed="5"
            data-type="background" aria-label="view-all-projects" style="border-radius: 0px 0px 15px 0px;">
            <a href="{{ route('contact') }}" class="btn-line btn-big btn-h" style="color:white">@lang('contact.get_in_touch')</a>
        </section>
    </div>
