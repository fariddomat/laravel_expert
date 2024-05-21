@extends('layouts.site')
@section('title', trans('site.contact_us'))
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- FullCalendar CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- jQuery and FullCalendar JS files -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <style>
        .iti>.parsley-errors-list {
            top: 45px;

        }

        .form-control {
            margin-top: 0px;
            margin-bottom: 25px;
        }


        .form-check-label {
            margin-bottom: 0;
            padding: 0 25px;
        }

        .section-title p a,
        .section-title p b,
        .section-title p svg {
            color: #fff
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
    <style>
        .sspan {
            position: absolute;
            border-radius: 100vmax;
        }

        .widget-categories span {
            position: relative;
        }

        .top {
            top: 0;
            left: 0;
            width: 0;
            height: 5px;
            background: linear-gradient(90deg,
                    transparent 50%,
                    rgba(255, 49, 49, 0.5),
                    rgb(255, 49, 49));
        }

        .bottom {
            right: 0;
            bottom: 0;
            height: 5px;
            background: linear-gradient(90deg,
                    rgba(255, 49, 49, 0.5),
                    rgb(255, 49, 49), transparent 50%);
        }

        .right {
            top: 0;
            right: 0;
            width: 5px;
            height: 0;
            background: linear-gradient(180deg,
                    transparent 30%,
                    rgba(255, 49, 49, 0.5),
                    rgb(255, 49, 49));
        }

        .left {
            left: 0;
            bottom: 0;
            width: 5px;
            height: 0;
            background: linear-gradient(180deg,
                    rgba(255, 49, 49, 0.5),
                    rgb(255, 49, 49),
                    transparent 70%);
        }

        .top {
            animation: animateTop 3s ease-in-out infinite;
        }

        .bottom {
            animation: animateBottom 3s ease-in-out infinite;
        }

        .right {
            animation: animateRight 3s ease-in-out infinite;
        }

        .left {
            animation: animateLeft 3s ease-in-out infinite;
        }

        @keyframes animateTop {
            25% {
                width: 100%;
                opacity: 1;
            }

            30%,
            100% {
                opacity: 0;
            }
        }

        @keyframes animateBottom {

            0%,
            50% {
                opacity: 0;
                width: 0;
            }

            75% {
                opacity: 1;
                width: 100%;
            }

            76%,
            100% {
                opacity: 0;
            }
        }

        @keyframes animateRight {

            0%,
            25% {
                opacity: 0;
                height: 0;
            }

            50% {
                opacity: 1;
                height: 100%;
            }

            55%,
            100% {
                height: 100%;
                opacity: 0;
            }
        }

        @keyframes animateLeft {

            0%,
            75% {
                opacity: 0;
                bottom: 0;
                height: 0;
            }

            100% {
                opacity: 1;
                height: 100%;
            }
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@21.2.7/build/css/intlTelInput.css">
    <style>
        .intl-tel-input,
        .iti {
            width: 100%;
        }

        .iti__flag-container {
            direction: ltr;
        }

        /* .animated {
                              -webkit-animation-fill-mode: unset !important;
                              animation-fill-mode: unset !important;
                            } */

        .phone-input-group {
            display: flex;
            /* Use flexbox for alignment */
        }

        .city-code-container {
            /* Style the container as needed */
        }

        #city_code {
            /* Style the select element to match the input field */
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
        }
    </style>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@21.2.7/build/js/intlTelInput.min.js"></script>

    <script>
        const input = document.querySelector("#mobile_code");
        const fullPhoneInput = document.querySelector("#full_phone");

        const iti = window.intlTelInput(input, {
            initialCountry: "sy",
            separateDialCode: true,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@21.2.7/build/js/utils.js",
        });



        const countryData = iti.getSelectedCountryData();
        input.value = countryData.dialCode;

        const dialCodeLength = iti.getSelectedCountryData().dialCode.length;
        const maxLength = 15;
        const remainingLength = maxLength - dialCodeLength;
        input.setAttribute('maxlength', remainingLength);

        function updateFullPhoneNumber() {
            const countryData = iti.getSelectedCountryData();
            const countryDialCode = countryData.dialCode;
            const nationalNumber = input.value.trim().replace(/\D/g, '');

            if (nationalNumber) {
                const fullPhoneNumber = `+${nationalNumber}`;
                const cleanedPhoneNumber = fullPhoneNumber.replace(/\s+/g, '');
                fullPhoneInput.value = cleanedPhoneNumber;
            } else {
                fullPhoneInput.value = "";
                input.value = "";
            }

            if (countryDialCode != '963') {
                $('#city_code').hide();
                $('#local_phone_group').hide();
                $('#local_phone').hide();

                const phone = document.querySelector("#phone");
                phone.value = "";
            } else {
                $('#city_code').show();
                $('#local_phone_group').show();
                $('#local_phone').show();
            }
        }

        input.addEventListener("input", updateFullPhoneNumber);
        input.addEventListener("countrychange", function(e) {

            const countryData = iti.getSelectedCountryData();
            input.value = countryData.dialCode;
            updateFullPhoneNumber();
            const dialCodeLength = iti.getSelectedCountryData().dialCode.length;
            const maxLength = 15;
            const remainingLength = maxLength - dialCodeLength;
            input.setAttribute('maxlength', remainingLength);
        });


        input.addEventListener("keydown", function(e) {
            const cursorPosition = input.selectionStart;
            const dialCodeLength = iti.getSelectedCountryData().dialCode.length + 1;
            if (cursorPosition < dialCodeLength && (e.key === "Backspace" || e.key === "Delete")) {
                e.preventDefault();
            }
        });

        $('#appointment_form').parsley();
    </script>

    <script>
        $(document).ready(function() {

            var cityCodes = [{
                    code: "",
                    city: "اختر"
                }, {
                    code: "011",
                    city: "دمشق"
                },
                {
                    code: "021",
                    city: "حلب"
                },
                {
                    code: "031",
                    city: "حمص"
                },
                {
                    code: "033",
                    city: "حماه"
                },
                {
                    code: "041",
                    city: "اللاذقية"
                },
                {
                    code: "043",
                    city: "طرطوس"
                },
                {
                    code: "016",
                    city: "السويداء"
                },
                {
                    code: "015",
                    city: "درعا"
                },
                {
                    code: "014",
                    city: "القنيطرة"
                },
                {
                    code: "051",
                    city: "دير الزور"
                },
                {
                    code: "022",
                    city: "الرقة"
                },
                {
                    code: "052",
                    city: "الحسكة"
                },
                {
                    code: "023",
                    city: "إدلب"
                },
            ];
            var optionsHTML = "";
            for (var i = 0; i < cityCodes.length; i++) {
                var city = cityCodes[i];
                optionsHTML += '<option value="' + city.code + '">' + city.city + '</option>';
            }

            $("#city_code").html(optionsHTML);

            $.each(cityCodes, function(index, city) {
                $("#city_code").append($("")
                    .attr("value", city.code)
                    .text(city.city + " (" + city.code + ")"));
            });


            $("#city_code").change(function() {
                var selectedCode = $(this).val();
                $("#phone").val(selectedCode);
            });

            const input = document.querySelector("#phone");

            input.addEventListener("keydown", function(e) {
                const cursorPosition = input.selectionStart;
                if (cursorPosition < 4 && (e.key === "Backspace" || e.key === "Delete")) {
                    e.preventDefault();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            function updateRequiredFields() {
                var selectedMethod = $("#contact_method").val();

                $("#email").removeAttr("data-parsley-required");
                $("#mobile_code").removeAttr("data-parsley-required");
                $("#mobile_code").removeAttr("data-parsley-minlength");
                $("#phone").removeAttr("data-parsley-required");


                $('#email').parsley().validate();
                $('#mobile_code').parsley().validate();
                $('#phone').parsley().validate();

                switch (selectedMethod) {
                    case "email":
                        $("#email").attr("data-parsley-required", true);
                        break;
                    case "mobile":
                    case "telegram":
                    case "whatsapp":
                        $("#mobile_code").attr("data-parsley-required", true);
                        $("#mobile_code").attr("data-parsley-minlength", "10");
                        break;
                    case "phone":
                        $("#phone").attr("data-parsley-required", true);

                        break;

                }
            }
            $('.form-control').on('focusout', function() {
                updateRequiredFields();
                $(this).parsley().validate();


            });
            $('.iti__selected-country').on('click', function() {
                $(this).parsley().validate();
                $('.animated').attr("style", "-webkit-animation-fill-mode: initial;");
                $('.animated').attr("style", "animation-fill-mode: initial;");

            });

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

            });
        });
    </script>

    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script>
        $(function() {
            $.datepicker.setDefaults($.datepicker.regional["ar"]);
            $("#appointment_date").datepicker({
                dateFormat: "dd/mm/yy",
                minDate: +1,
                maxDate: new Date(new Date().getFullYear(), 11, 31),
                onSelect: function(dateText) {
                    var dateParts = dateText.split('/');
                    var formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;
                    $("#appointment_date").removeAttr("data-parsley-required");
                    $('#appointment_date').parsley().validate();

                    $("#mobile_code").attr("data-parsley-required", true);
                    var appointment_date = formattedDate;
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
                            });

                            if (i == 0) {
                                $('#appointment_time').append(
                                    '<option>لا يوجد مواعيد متاحة</option>');
                            }
                        }
                    });
                }
            });

            window.Parsley.addValidator('dateiso', {
                requirementType: 'string',
                validateString: function(value) {
                    const regex = /^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/\d{4}$/;
                    if (!regex.test(value)) {
                        return false;
                    }
                    const parts = value.split('/');
                    const year = parseInt(parts[2], 10);
                    const currentYear = new Date().getFullYear();
                    return year === currentYear;
                },
                messages: {
                    en: 'This value should be a valid date (YYYY-MM-DD).',
                    ar: 'يرجى إدخال تاريخ صحيح بالصيغة YYYY-MM-DD'
                }
            });
        });
    </script>

@endsection

@section('content')


    <!-- Page title -->
    <section class="page-title-wrap position-relative bg-light" data-bg-img="{{ asset($info->contact_header_image) }}"
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

    <section class="bg-gradient">
        <!-- Contact page content -->
        <section class="pt-7 pb-7 ">
            <div class="container">
                <div class="row align-items-lg-start">
                    <div class="col-lg-12 col-md-12" data-animate="fadeInUp" data-delay="1.6">
                        <div class="contact-form-wrap"
                            style="max-width: 65rem; margin: 0 auto;background: #fff;  position: relative;">
                            <div class="text-center">
                                <h2 data-animate="fadeInUp" data-delay="1.7">@lang('contact.get_in_touch')</h2>
                            </div>
                            @include('partials._errors')

                            <div class="form-area">
                                <div class="form-inner">
                                    <form id="contactFrom" method="post" action="{{ route('contact.post') }}"
                                        class="row" data-animate="fadeInUp" data-delay="1.6"
                                        data-parsley-trigger="change">
                                        @csrf()

                                        {{-- HonyBot hidden input Start --}}
                                        <input type="hidden" name="username" value="">
                                        {{-- HonyBot hidden input End --}}

                                        <div class="col-md-6" data-animate="fadeInUp" data-delay=".1">
                                            <div class="form-group">
                                                <label for="">الاسم الكامل</label>
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    class="form-control" placeholder="@lang('contact.name')"
                                                    data-parsley-required="true"
                                                    data-parsley-required-message="الاسم مطلوب."
                                                    data-parsley-pattern="^[\u0621-\u064Aa-zA-Z\s]+$"
                                                    data-parsley-pattern-message="يجب أن يحتوي الاسم على حروف عربية أو إنجليزية فقط"
                                                    data-parsley-trigger="change">

                                            </div>
                                        </div>


                                        <div class="col-md-6" data-animate="fadeInUp" data-delay=".2">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="day">تاريخ الميلاد - اليوم:</label>
                                                            <select class="form-control" id="day" name="day">
                                                                @for ($i = 1; $i <= 31; $i++)
                                                                    <option value="{{ $i }}">{{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="month">الشهر:</label>
                                                            <select class="form-control" id="month" name="month"
                                                                onchange="updateDays()">
                                                                @foreach (range(1, 12) as $month)
                                                                    <option value="{{ $month }}">{{ $month }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="year">السنة:</label>
                                                            <select class="form-control" id="year" name="year">
                                                                @for ($year = date('Y'); $year >= 1900; $year--)
                                                                    <option value="{{ $year }}">
                                                                        {{ $year }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <script>
                                            function updateDays() {
                                                const month = document.getElementById('month').value;
                                                const year = document.getElementById('year').value;
                                                const daySelect = document.getElementById('day');
                                                const lastDay = new Date(year, month, 0).getDate(); // Get the last day of the month

                                                // Clear existing options
                                                while (daySelect.options.length > 0) {
                                                    daySelect.remove(0);
                                                }

                                                // Add days according to the selected month and year
                                                for (let i = 1; i <= lastDay; i++) {
                                                    const option = document.createElement('option');
                                                    option.value = i;
                                                    option.textContent = i;
                                                    daySelect.appendChild(option);
                                                }
                                            }
                                        </script>
                                        <div class="col-md-6" data-animate="fadeInUp" data-delay=".3">
                                            <div class="form-group">
                                                <label for="">رقم الهاتف الجوال</label>
                                                <input id="mobile_code" type="tel" name="mobil"
                                                    value="{{ old('mobil') }}" class="form-control"
                                                    placeholder="ادخل رقمك هنا" data-parsley-required="true"
                                                    data-parsley-required-message="رقم الهاتف مطلوب."
                                                    data-parsley-pattern="^[0-9]+$"
                                                    data-parsley-pattern-message="يجب أن يحتوي رقم الهاتف على أرقام فقط"
                                                    data-parsley-minlength="10"
                                                    data-parsley-minlength-message="يجب أن يحتوي رقم الهاتف على 10 أرقام على الأقل"
                                                    data-parsley-trigger="change">

                                                <input type="hidden" id="full_phone" name="mobile">
                                            </div>
                                        </div>

                                        <div class="col-md-6" data-animate="fadeInUp" data-delay=".4">
                                            <div class="form-group " id="local_phone_group">
                                                <label for="">رقم الهاتف الأرضي</label>
                                                <div class="phone-input-group">
                                                    <div class="city-code-container">
                                                        <select id="city_code" class="form-control"
                                                            style="min-width: 100px">
                                                            <option value="">Select City Code</option>
                                                        </select>
                                                    </div>
                                                    <input id="phone" type="tel" name="phone"
                                                        value="{{ old('phone') }}" class="form-control"
                                                        placeholder="أدخل الرقم الأرضي"
                                                        data-parsley-required-message="رقم الهاتف مطلوب."
                                                        data-parsley-pattern="^[0-9]+$"
                                                        data-parsley-pattern-message="يجب أن يحتوي رقم الهاتف على أرقام فقط"
                                                        data-parsley-trigger="change">
                                                </div>

                                            </div>
                                        </div>


                                        <div class="col-md-6" data-animate="fadeInUp" data-delay=".5"
                                            style="margin-top: 25px">
                                            <div class="form-group">
                                                <label for="">البريد الالكتروني</label>
                                                <input id="email" type="email" name="email"
                                                    value="{{ old('email') }}" class="form-control"
                                                    placeholder="@lang('contact.email')" data-parsley-type="email"
                                                    data-parsley-type-message="يجب ان تكون صيغة بريدالكتروني صحيحة."
                                                    data-parsley-required-message="البريد الالكتروني مطلوب."
                                                    data-parsley-trigger="change">
                                            </div>
                                        </div>

                                        <div class="col-md-6" data-animate="fadeInUp" data-delay=".6"
                                            style="margin-top: 25px">
                                            <div class="form-group">
                                                <label for="contact_method">وسيلة الاتصال المفضلة</label>
                                                <select id="contact_method" name="contact_method" class="form-control"
                                                    data-parsley-required="true"
                                                    data-parsley-required-message="وسيلة الاتصال مطلوبة."
                                                    data-parsley-trigger="change">
                                                    <option value="mobile"
                                                        @if (old('contact_method') == 'mobile') selected @endif>
                                                        @lang('contact.mobile')
                                                    </option>

                                                    <option value="email"
                                                        @if (old('contact_method') == 'email') selected @endif>
                                                        @lang('contact.email')
                                                    </option>
                                                    <option id="local_phone" value="phone"
                                                        @if (old('contact_method') == 'phone') selected @endif>
                                                        الهاتف الأرضي
                                                    </option>
                                                    <option value="whatsapp"
                                                        @if (old('contact_method') == 'whatsapp') selected @endif>
                                                        @lang('contact.whatsapp')
                                                    </option>

                                                    <option value="telegram"
                                                        @if (old('contact_method') == 'telegram') selected @endif>
                                                        تلغرام
                                                    </option>
                                                    {{-- Add more options as needed based on your schema --}}
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6" data-animate="fadeInUp" data-delay=".7">
                                            <div class="form-group">
                                                <label for="city">المدينة</label>
                                                <input type="text" name="city" value="{{ old('city') }}"
                                                    class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-6" data-animate="fadeInUp" data-delay=".8">
                                            <div class="form-group">
                                                <label for="cert_degree">آخر شهادة حصلة عليها</label>
                                                <select name="cert_degree" class="form-control"
                                                    data-parsley-required="true"
                                                    data-parsley-required-message="الشهادة مطلوبة."
                                                    data-parsley-trigger="change">
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

                                        <div class="col-md-12" style="margin-top: 25px" data-animate="fadeInUp"
                                            data-delay=".9">
                                            <div class="form-group">
                                                <label for="">@lang('contact.service')</label>

                                                @foreach ($services as $service)
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" name="services[]"
                                                            value="{{ $service->id }}" data-parsley-required="true"
                                                            data-parsley-required-message="تحديد خدمة على الأقل مطلوب."
                                                            data-parsley-trigger="change">
                                                        <label class="form-check-label"
                                                            for="service">{{ $service->title }}</label>
                                                    </div>
                                                @endforeach
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="services[]"
                                                        value="0">
                                                    <label class="form-check-label" for="service">
                                                        @lang('site.other_services')</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group mt-3" data-animate="fadeInUp" data-delay=".9">
                                            <label for="">حجز موعد - التاريخ:</label>

                                            <input type="text" id="appointment_date" name="appointment_date"
                                                class="form-control datepicker" id="date" placeholder="dd/mm/YYYY"
                                                data-parsley-required="true"
                                                data-parsley-required-message="التاريخ مطلوب."
                                                data-parsley-trigger="change" data-parsley-dateiso="true"
                                                data-parsley-dateiso-message="يرجى إدخال تاريخ صحيح بالصيغة dd/mm/YYYY">
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
                                        <div class="col-md-12" style="margin: 15px 0" data-animate="fadeInUp"
                                            data-delay=".8">
                                            <div class="form-group">
                                                <button id="btn-submit" type="submit"
                                                    class="btn btn-primary btn-square btn-block">
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
                            <span class="sspan top"></span>
                            <span class="sspan right"></span>
                            <span class="sspan bottom"></span>
                            <span class="sspan left"></span>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End of Contact page content -->

        <section class="pb-2">
            <div class="container" style="  max-width: 65rem;">
                <div class="row align-items-lg-start">
                    <div class="col-lg-12 col-md-12">
                        <div class="section-title pl-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <p data-animate="fadeInUp" data-delay="1.5">
                                    <p data-animate="fadeInUp" data-delay="1.5"><b>@lang('contact.mobile'): </b> <a
                                            href="tel:+{{ $contactInfo->mobile }}"
                                            target="_blank">{{ $contactInfo->mobile }}</a>
                                    </p>
                                    <p data-animate="fadeInUp" data-delay="1.5"><b>@lang('contact.mobile'): </b> <a
                                            href="tel:+{{ $contactInfo->mobile2 }}"
                                            target="_blank">{{ $contactInfo->mobile2 }}</a>
                                    </p>
                                    <p data-animate="fadeInUp" data-delay="1.5"><b>الهاتف الأرضي: </b> <a
                                            href="tel:+{{ $contactInfo->mobile }}" target="_blank"
                                            dir="ltr">{{ $contactInfo->phone }}</a>
                                    </p>
                                    <p data-animate="fadeInUp" data-delay="1.5"><b>@lang('contact.whatsapp'): </b> <a
                                            href="https://api.whatsapp.com/send?phone={{ $contactInfo->whatsapp }}"
                                            target="_blank">{{ $contactInfo->whatsapp }}</a></p>
                                    <p data-animate="fadeInUp" data-delay="1.5"><b>@lang('contact.email_me'): </b> <a
                                            href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a></p>

                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p data-animate="fadeInUp" data-delay="1.5"><i class="fa fa-map-marker-alt"></i>
                                        <b>الموقع:</b>
                                    <div data-animate="fadeInUp" data-delay="1.6"> {!! $contactInfo->location !!}</div>

                                    </p>
                                </div>
                            </div>
                            <h3 data-animate="fadeInUp" data-delay="1.5" style="color: #fff">

                                @lang('contact.always_happy')
                                <br />@lang('contact.your_inquiries')
                                <br />@lang('contact.weekdays')
                            </h3>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
