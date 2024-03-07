@extends('layouts.site')
@section('title', trans('site.services'))
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
            #section-content{
                padding: 35px 25px 70px;
            }


        .service-item{
            margin-top: 35px;
        }
        h3, p{
            height: auto !important;
        }

    }
    </style>
@endsection
@section('content')

    <!-- Services Section -->

    <!-- subheader -->
    <section id="subheader" data-speed="8" data-type="background"
        style="background: url({{ asset($info->service_image) }}) top; background-position: unset !important;
        background-repeat: no-repeat !important; background-size: cover !important; ">
        <div class="container-fluid">
            <div class="row" style="border-radius: 0 0 15px 0px;">
                <div class="col-md-12">
                    <h1>@lang('site.services')</h1>
                    <ul class="crumb">
                        <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                        <li class="sep">/</li>
                        <li>@lang('site.services')</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <div id="content" class="nopadding">
        <section id="section-content">
            <div class="container-fluid">
                <div class="row">

                    @foreach ($services as $index => $service)
                        <div class="col-md-6 wow fadeIn service-item" data-wow-delay=".9s">
                            <h3 style="height: 65px;"><span class="id-color stitle">{{ $service->title }}</span> </h3>
                            <p style="height: 37px;">{{ Str::limit($service->brief, 140) }}</p>
                            <div class="spacer-single"></div>
                            <img src="{{ asset($service->image) }}" class="img-responsive" alt=""
                            style="margin-top: 15px; border-radius: 15px 15px 15px 15px;">
                            <div class="spacer-single"></div>
                            <a href="{{ route('service', $service->slug) }}"
                                class="btn-line btn-fullwidth btn-ho">@lang('site.read_more')</a>


                        </div>
                        @if ($index % 2 != 0)
                            <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                            <div class="spacer-single"></div>
                        @endif
                    @endforeach

                </div>
            </div>
        </section>


    </div>


@endsection
