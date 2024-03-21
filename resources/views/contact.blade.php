@extends('layouts.site')
@section('title', trans('site.contact_us'))
@section('styles')
    <style>
        .form-control {
            margin-top: 25px;
        }

        .form-check-label {
            margin-bottom: 0;
            padding: 0 25px;
        }
    </style>
@endsection
@section('scripts')
    <script>
        $('#contactFrom').submit(function() {
            $('#btn-submit').prop("disabled", true);
            $('#btn-spinner').show();
            return true;
        });
    </script>
@endsection

@section('content')


    <!-- Page title -->
    <section class="page-title-wrap position-relative bg-light" data-bg-img="{{ asset($info->contact_header_image) }}"
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
                            <li><a href="#">@lang('site.contact')</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">@lang('site.contact')</h1>
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

    <!-- Contact page content -->
    <section class="pt-7 pb-7">
        <div class="container">
            <div class="row align-items-lg-start">
                <div class="col-lg-9 col-md-6" data-animate="fadeInUp" data-delay="1.6">
                    <div class="contact-form-wrap">
                        <div class="text-center">
                            <h2 data-animate="fadeInUp" data-delay="1.7">@lang('contact.get_in_touch')</h2>
                        </div>
                        @include('partials._errors')
                        <form id="contactFrom" method="post" action="{{ route('contact.post') }}" class="row"  data-animate="fadeInUp" data-delay="1.6">
                            @csrf()

                            {{-- HonyBot hidden input Start --}}
                            <input type="hidden" name="username" value="">
                            {{-- HonyBot hidden input End --}}

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".1">
                                <div class="form-group">
                                    <label for="">الاسم الكامل</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        placeholder="@lang('contact.name')" required>
                                </div>
                            </div>


                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".2">
                                <div class="form-group">
                                    <label for="dob">تاريخ الميلاد</label>
                                    <input type="date" name="dob" value="{{ old('dob') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".3">
                                <div class="form-group">
                                    <label for="">رقم الهاتف الجوال</label>
                                    <input type="tel" name="mobile" value="{{ old('mobile') }}" class="form-control"
                                        placeholder="+963 934 770 008" required>
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".4">
                                <div class="form-group">
                                    <label for="">رقم الهاتف الأرضي</label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control"
                                        placeholder="@lang('contact.phone')">
                                </div>
                            </div>


                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".5">
                                <div class="form-group">
                                    <label for="">البريد الالكتروني</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                        placeholder="@lang('contact.email')">
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".6">
                                <div class="form-group">
                                    <label for="contact_method">@lang('contact.preferred_method')</label>
                                    <select name="contact_method" class="form-control">
                                        <option value="">وسيلة الاتصال المفضلة</option>
                                        <option value="email" @if (old('contact_method') == 'email') selected @endif>
                                            @lang('contact.email')
                                        </option>
                                        <option value="phone" @if (old('contact_method') == 'phone') selected @endif>
                                            @lang('contact.phone')
                                        </option>
                                        {{-- Add more options as needed based on your schema --}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".7">
                                <div class="form-group">
                                    <label for="city">المدينة</label>
                                    <input type="text" name="city" value="{{ old('city') }}"
                                        class="form-control" placeholder="@lang('contact.city')">
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".8">
                                <div class="form-group">
                                    <label for="cert_degree">آخر شهادة حصلة عليها</label>
                                    <input type="text" name="cert_degree" value="{{ old('cert_degree') }}"
                                        class="form-control" placeholder="@lang('contact.cert_degree')">
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top: 25px" data-animate="fadeInUp" data-delay=".9">
                                <div class="form-group">
                                    <label for="">@lang('contact.service')</label>

                                    @foreach ($services as $service)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="services[]"
                                                value="{{ $service->id }}">
                                            <label class="form-check-label" for="service">{{ $service->title }}</label>
                                        </div>
                                    @endforeach
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="services[]"
                                            value="0">
                                        <label class="form-check-label" for="service"> @lang('site.other_services')</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12" data-animate="fadeInUp" data-delay="1">
                                <div class="form-group">
                                    <textarea name="message" id="message" cols="30" rows="4" class="form-control"
                                        placeholder="@lang('contact.message')"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin: 15px 0" data-animate="fadeInUp" data-delay=".8">
                                <div class="form-group">
                                    <button id="btn-submit" type="submit" class="btn btn-primary btn-square btn-block">
                                        @lang('contact.send_message')
                                        <span id="btn-spinner" style="display: none;"
                                            class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-12" data-animate="fadeInUp" data-delay="1.1">
                                <p><small><i>* @lang('contact.we_all_know')</i></small></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="section-title">
                        <h3 data-animate="fadeInUp" data-delay="1.5">

                            @lang('contact.always_happy')
                            <br />@lang('contact.your_inquiries')
                            <br />@lang('contact.weekdays')
                        </h3>
                        <p data-animate="fadeInUp" data-delay="1.5">
                        <p data-animate="fadeInUp" data-delay="1.5"><b>@lang('contact.whatsapp'):</b> <a
                                href="https://api.whatsapp.com/send?phone={{ $contactInfo->whatsapp }}"
                                target="_blank">{{ $contactInfo->whatsapp }}</a></p>
                        <p data-animate="fadeInUp" data-delay="1.5"><b>@lang('contact.email_me'):</b> <a
                                href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a></p>
                        <p data-animate="fadeInUp" data-delay="1.5"><i class="fa fa-map-marker-alt"></i>
                            <b>@lang('contact.my_location'):</b> <a href="{{ $contactInfo->location_link }}"
                                target="_blank">{{ $contactInfo->location }}</a>
                        </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Contact page content -->

@endsection
