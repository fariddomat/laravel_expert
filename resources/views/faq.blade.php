@extends('layouts.site')

@section('title', trans('site.FAQ'))
@section('styles')
    <style>
        .tm-accordion .card:first-child {
            /* border-radius: 15px 15px 0 0; */
        }

        .tm-accordion .card {

            margin-bottom: 15px;
        }

        .tm-accordion .card .card-header {
            background-color: #fff;
            border-top: none;
        }

        .tm-accordion .card .card-header .title {
            padding: 1rem 2rem;
            margin: 0;
            position: relative;
        }

        .tm-accordion .card .card-header .title .accordion-controls-icon {
            opacity: 0.4;
            position: absolute;
            left: 20px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            transition: all 0.4s ease-in-out;
        }
    </style>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#accordion100').on('shown.bs.collapse', function(e) {
                $(e.target).prev().find('.open-icon').hide();
                $(e.target).prev().find('.close-icon').show();
            }).on('hidden.bs.collapse', function(e) {
                $(e.target).prev().find('.open-icon').show();
                $(e.target).prev().find('.close-icon').hide();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#accordion100').on('shown.bs.collapse', function(e) {
                var target = $(e.target); // Get the target section
                var offset = target.prev().height(); // Calculate offset based on previous section's height
                $('html, body').animate({
                    scrollTop: target.offset().top - offset - 90
                }, 500); // Animate scrolling with duration (adjust as needed)
            });
        });
    </script>
@endsection
@section('content')

    <!-- Page title  -->
    <section class="page-title-wrap position-relative bg-light" data-bg-img="{{ asset($info->about_header_image) }}"
        data-animate="fadeInUp" data-delay="1.1">
       {{-- <div id="particles_js"></div> --}}
        <div class="container container-top">
            <div class="row">
                <div class="col-11">
                    <div class="page-title position-relative pt-5 pb-5">
                        <ul class="custom-breadcrumb roboto list-unstyled mb-0 clearfix" data-animate="fadeInUp"
                            data-delay="1.2">
                            <li><a href="{{ route('home') }}">@lang('site.home')</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li><a href="#">@lang('site.FAQ')</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">@lang('site.FAQ')</h1>
                    </div>
                </div>
                <div class="col-1">
                    <div class="world-map position-relative">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->


    <!-- FAQ -->
    <section class="pt-7 pb-7 bg-gradient" data-animate="fadeInUp" data-delay="1.4">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div id="accordion100" class="tm-accordion">
                        @foreach ($faqs as $index => $faq)
                            <div class="card" {{-- data-animate="fadeInUp" data-delay="{{ 0.1 + $index / 8 }}" --}}>
                                <div class="card-header p-0" id="heading10{{ $index + 1 }}">
                                    <h5 class="title" data-toggle="collapse" data-target="#collapse10{{ $index + 1 }}"
                                        aria-expanded="@if ($index == 0) true
                                        @else
                                        false @endif"
                                        aria-controls="collapse10{{ $index + 1 }}">
                                        {{ $index + 1 }} # {{ $faq->question }}
                                        <i class="fas fa-chevron-down accordion-controls-icon open-icon"
                                            @if ($index == 0) style="display: none" @endif></i>
                                        <i class="fas fa-chevron-up accordion-controls-icon close-icon"
                                            @if ($index != 0) style="display: none" @endif
                                            aria-hidden="true"></i>

                                    </h5>
                                </div>
                                <div id="collapse10{{ $index + 1 }}"
                                    class="collapse @if ($index == 0) show @endif"
                                    aria-labelledby="heading10{{ $index + 1 }}" data-parent="#accordion100">
                                    <div class="card-body">
                                        {!! $faq->answer !!}</div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of FAQ -->

@endsection
