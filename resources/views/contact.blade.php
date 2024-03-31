@extends('layouts.site')
@section('title', trans('site.contact_us'))
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- FullCalendar CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- jQuery and FullCalendar JS files -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <style>
        .form-control {
            margin-top: 0px;
            margin-bottom: 25px;
        }

        .form-check-label {
            margin-bottom: 0;
            padding: 0 25px;
        }
    </style>

    <style>
        .parsley-errors-list {
            left: auto;
            right: 16px;
            bottom: 0;
        }

        /* Success/error message (optional) */
        .alert {
            /* margin-top: 1rem; */
        }

        .form-control:focus {
            border-color: gold;
            box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
            color: gold;
            /* Change color on focus */
        }
    </style>
@endsection
@section('scripts')
    <script>
        // $('#contactFrom').submit(function() {
        //     $('#btn-submit').prop("disabled", true);
        //     $('#btn-spinner').show();
        //     return true;
        // });

        //         $(document).ready(function() {
        //   $('#contactFrom').parsley(); // Replace with your form's ID
        // });

        $(document).ready(function() {
            $('.form-control').on('focusout', function() {
                $(this).parsley().validate(); // Manually trigger validation on change
            });

            // Repeat for other fields where you want validation on change
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#appointment_date').on('change', function(e) {
                var appointment_date = e.target.value;
                $.ajax({
                    url: "{{ route('appointment.time') }}",
                    type: "POST",
                    data: {
                        appointment_date: appointment_date
                    },
                    success: function(data) {
                        $('#appointment_time').empty();
                        var i = 0;
                        $.each(data.time, function(index,
                            t) {
                            i++;
                            $('#appointment_time').append('<option value="' +
                                t
                                .id + '">' + t.time + '</option>');
                        })
                        if (i == 0) {
                            $('#appointment_time').append(
                                '<option>لا يوجد مواعيد متاحة</option>');
                        }
                    }
                })
            });
        });
    </script>
@endsection

@section('content')


    <!-- Page title -->
    <section class="page-title-wrap position-relative bg-light" data-bg-img="{{ asset($info->contact_header_image) }}"
        data-animate="fadeInUp" data-delay="1.1">
        <div id="particles_js"></div>
        <div class="container container-top">
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
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->

    <!-- Contact page content -->
    <section class="pt-7 pb-7 bg-gradient">
        <div class="container">
            <div class="row align-items-lg-start">
                <div class="col-lg-12 col-md-12" data-animate="fadeInUp" data-delay="1.6">
                    <div class="contact-form-wrap" style="max-width: 65rem; margin: 0 auto;background: #fff">
                        <div class="text-center">
                            <h2 data-animate="fadeInUp" data-delay="1.7">@lang('contact.get_in_touch')</h2>
                        </div>
                        @include('partials._errors')
                        <form id="contactFrom" method="post" action="{{ route('contact.post') }}" class="row"
                            data-animate="fadeInUp" data-delay="1.6" data-parsley-trigger="change">
                            @csrf()

                            {{-- HonyBot hidden input Start --}}
                            <input type="hidden" name="username" value="">
                            {{-- HonyBot hidden input End --}}

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".1">
                                <div class="form-group">
                                    <label for="">الاسم الكامل</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        placeholder="@lang('contact.name')" data-parsley-required="true"
                                        data-parsley-required-message="الاسم مطلوب." data-parsley-trigger="change">

                                </div>
                            </div>


                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".2">
                                <div class="form-group">
                                    <label for="dob">تاريخ الميلاد</label>
                                    <input type="date" name="dob" value="{{ old('dob') }}" class="form-control"
                                        data-parsley-required="true" data-parsley-required-message="تاريخ الميلاد مطلوب."
                                        data-parsley-trigger="change">
                                </div>
                            </div>
                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".3">
                                <div class="form-group">
                                    <label for="">رقم الهاتف الجوال</label>
                                    <input type="tel" name="mobile" value="{{ old('mobile') }}" class="form-control"
                                        placeholder="+963 934 770 008" data-parsley-required="true"
                                        data-parsley-required-message="رقم الهاتف مطلوب." data-parsley-trigger="change">
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".4">
                                <div class="form-group">
                                    <label for="">رقم الهاتف الأرضي</label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control"
                                        placeholder="031-2129925">
                                </div>
                            </div>


                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".5">
                                <div class="form-group">
                                    <label for="">البريد الالكتروني</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control" placeholder="@lang('contact.email')" data-parsley-type="email"
                                        data-parsley-type-message="يجب ان تكون صيغة بريدالكتروني صحيحة."
                                        data-parsley-trigger="change">
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".6">
                                <div class="form-group">
                                    <label for="contact_method">وسيلة الاتصال المفضلة</label>
                                    <select name="contact_method" class="form-control" data-parsley-required="true"
                                        data-parsley-required-message="وسيلة الاتصال مطلوبة."
                                        data-parsley-trigger="change">
                                        <option value="email" @if (old('contact_method') == 'email') selected @endif>
                                            @lang('contact.email')
                                        </option>
                                        <option value="mobile" @if (old('contact_method') == 'mobile') selected @endif>
                                            @lang('contact.mobile')
                                        </option>

                                        <option value="phone" @if (old('contact_method') == 'phone') selected @endif>
                                            الهاتف الأرضي
                                        </option>
                                        <option value="whatsapp" @if (old('contact_method') == 'whatsapp') selected @endif>
                                            @lang('contact.whatsapp')
                                        </option>

                                        <option value="telegram" @if (old('contact_method') == 'telegram') selected @endif>تلغرام
                                        </option>
                                        {{-- Add more options as needed based on your schema --}}
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".7">
                                <div class="form-group">
                                    <label for="city">المدينة</label>
                                    <input type="text" name="city" value="{{ old('city') }}"
                                        class="form-control" placeholder="" data-parsley-required="true"
                                        data-parsley-required-message="المدينة مطلوبة." data-parsley-trigger="change">
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".8">
                                <div class="form-group">
                                    <label for="cert_degree">آخر شهادة حصلة عليها</label>
                                    <select name="cert_degree" class="form-control" data-parsley-required="true"
                                        data-parsley-required-message="الشهادة مطلوبة." data-parsley-trigger="change">
                                        <option value="ابتدائية">ابتدائية</option>
                                        <option value="إعدادية">إعدادية</option>
                                        <option value="ثانوية عامة">ثانوية عامة</option>
                                        <option value="بكالوريوس">بكالوريوس</option>
                                        <option value="ماجستير">ماجستير</option>
                                        <option value="دكتوراه">دكتوراه</option>
                                        <option value="غير ذلك">غير ذلك</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top: 25px" data-animate="fadeInUp" data-delay=".9">
                                <div class="form-group">
                                    <label for="">@lang('contact.service')</label>

                                    @foreach ($services as $service)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="services[]"
                                                value="{{ $service->id }}" data-parsley-required="true"
                                                data-parsley-required-message="تحديد خدمة على الأقل مطلوب."
                                                data-parsley-trigger="change">
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
                            <div class="col-md-6 form-group mt-3" data-animate="fadeInUp" data-delay=".9">
                                <label for="">حجز موعد - التاريخ:</label>

                                <input type="date" id="appointment_date" name="appointment_date"
                                    class="form-control datepicker" id="date" placeholder="Appointment Date"
                                    min="{{ now()->toDateString('Y-m-d') }}" data-parsley-required="true"
                                    data-parsley-required-message="التاريخ مطلوب." data-parsley-trigger="change">
                                <div class="validate"></div>
                            </div>

                            <div class="col-md-6 form-group mt-3" data-animate="fadeInUp" data-delay=".9">
                                <label for="">الوقت:</label>
                                <select name="appointment_time" id="appointment_time" class="form-control"
                                    data-parsley-required="true" data-parsley-required-message="الوقت مطلوب."
                                    data-parsley-trigger="change">
                                    <option value="">اختر تاريخ من فضلك</option>
                                </select>
                                <div class="validate"></div>
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

            </div>
        </div>
    </section>
    <!-- End of Contact page content -->

    <section class="pt-2 pb-2">
        <div class="container" style="  max-width: 65rem;">
            <div class="row align-items-lg-start">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title pt-7 pl-7">
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
@endsection
