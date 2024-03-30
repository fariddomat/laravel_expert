@extends('layouts.site')

@section('title', 'استمارة التقدم لوظيفة')

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

        {{-- select2 --}}

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
     
    <style>
        .select2 {
            padding: 2px 0;
        }
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
            color: gold; /* Change color on focus */
        }
    </style>
@endsection

@section('scripts')
    <script>
        // $('#contactFrom').submit(function() {
        //     $('#btn-submit').prop("disabled", true);
        //     $('#btn-spinner').show();
        //     return true;
        // });//
        // $(document).ready(function() {//
        // $('#contactFrom').parsley(); // Replace with your form's ID//
        // });
        $(document).ready(function() {
            $('.form-control').on('focusout', function() {
                $(this).parsley().validate(); // Manually trigger validation on change
            });
            // Repeat for other fields where you want validation on change
        });


    </script>

<script>
    $(document).ready(function() {
        $('.multi').select2({
            tags: true, // Enable tag creation

        });
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
                            <li><a href="#">استمارة التقدم لوظيفة</a></li>
                        </ul>
                        <h1 data-animate="fadeInUp" data-delay="1.3">استمارة التقدم لوظيفة</h1>
                    </div>
                </div>
                <div class="col-1">
                    <div class="world-map position-relative">
                        <img src="{{ asset('home/img/map.svg') }}" alt="" alt="" data-no-retina class="svg">
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
                <div class="col-lg-12 col-md-12" data-animate="fadeInUp" data-delay="1.6">
                    <div class="contact-form-wrap" style="max-width: 65rem; margin: 0 auto;">
                        <div class="text-center">
                            <h2 data-animate="fadeInUp" data-delay="1.7">الاستمارة</h2>
                        </div>

                        @include('partials._errors')

                        <form id="workWithUsForm" method="post" action="{{ route('workWithUs.post') }}" class="row"
                              data-animate="fadeInUp" data-delay="1.6" data-parsley-trigger="change">
                            @csrf()

                            {{-- Basic Information --}}
                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".1">
                                <div class="form-group">
                                    <label for="full_name">الاسم الثلاثي*</label>
                                    <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control"
                                           placeholder="الاسم الثلاثي" required>
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".2">
                                <div class="form-group">
                                    <label for="gender">الجنس*</label>
                                    <select name="gender" class="form-control" required>
                                        <option value="male" @if (old('gender') == 'male') selected @endif>ذكر</option>
                                        <option value="female" @if (old('gender') == 'female') selected @endif>أنثى</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".3">
                                <div class="form-group">
                                    <label for="date_of_birth">تاريخ الميلاد*</label>
                                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".4">
                                <div class="form-group">
                                    <label for="email">البريد الإلكتروني*</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                           placeholder="البريد الإلكتروني" required>
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".5">
                                <div class="form-group">
                                    <label for="mobile_number">رقم الموبايل*</label>
                                    <input type="tel" name="mobile_number" value="{{ old('mobile_number') }}" class="form-control"
                                           placeholder="الرجاء إدخال رقم صالح للمكالمات والواتساب" required style="  text-align: right;">
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".6">
                                <div class="form-group">
                                    <label for="address">العنوان*</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control"
                                           placeholder="الدولة، المدينة، الحي" required>
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".7">
                                <div class="form-group">
                                    <label for="marital_status">الحالة العائلية*</label>
                                    <select name="marital_status" class="form-control" required>
                                        <option value="single" @if (old('marital_status') == 'single') selected @endif>عازب</option>
                                        <option value="married" @if (old('marital_status') == 'married') selected @endif>متزوج</option>
                                        <option value="other" @if (old('marital_status') == 'other') selected @endif>أخرى:</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Education and Experience --}}
                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".8">
                                <div class="form-group">
                                    <label for="study_major">الدراسة / التخصص*</label>
                                    <input type="text" name="study_major" value="{{ old('study_major') }}" class="form-control"
                                           placeholder="يرجى تحديد السنة الدراسية في حال ما زلتم في المرحلة الجامعية" required>
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay=".9">
                                <div class="form-group">
                                    <label for="current_job">عملك الحالي</label>
                                    <input type="text" name="current_job" value="{{ old('current_job') }}" class="form-control"
                                           placeholder="الشركة، المسمى الوظيفي، لمحة عن مسؤولياتك">
                                </div>
                            </div>

                            <div class="col-md-12" data-animate="fadeInUp" data-delay="1">
                                <div class="form-group">
                                    <label for="other_work_experiences">خبرات عمل أخرى (إن وجدت)</label>
                                    <textarea name="other_work_experiences" id="other_work_experiences" cols="30" rows="4" class="form-control"
                                              placeholder="المزيد من خبرات العمل؟"></textarea>
                                </div>
                            </div>

                            {{-- Skills and Language --}}
                            <div class="col-md-6" data-animate="fadeInUp" data-delay="1.1">
                                <div class="form-group">
                                    <label for="english_level">مستوى اللغة الإنكليزية*</label>
                                    <select name="english_level" class="form-control" required>
                                        <option value="beginner" @if (old('english_level') == 'beginner') selected @endif>مبتدئ</option>
                                        <option value="intermediate" @if (old('english_level') == 'intermediate') selected @endif>متوسط</option>
                                        <option value="good" @if (old('english_level') == 'good') selected @endif>جيد</option>
                                        <option value="very_good" @if (old('english_level') == 'very_good') selected @endif>جيد جداً</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6" data-animate="fadeInUp" data-delay="1.2">
                                <div class="form-group">
                                    <label for="skills">هل تمتلك مهارات وخبرات مختلفة؟ *</label>
                                    <select name="skills[]" class="form-control multi" multiple required>
                                        <option value="Microsoft Office">Microsoft Office</option>
                                        <option value="Photoshop">Photoshop</option>
                                        <option value="E-mailing">E-mailing</option>
                                        <option value="حجز تذاكر">حجز تذاكر</option>
                                        <option value="كتابة محتوى">كتابة محتوى</option>
                                        <option value="التعامل مع الزبائن">التعامل مع الزبائن</option>
                                        <option value="مونتاج">مونتاج</option>
                                        <option value="التقديم لمنح دراسية">التقديم لمنح دراسية</option>
                                        <option value="إعداد سير ذاتية">إعداد سير ذاتية</option>
                                        <option value="other">أخرى:</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Additional Information --}}
                            <div class="col-md-12" data-animate="fadeInUp" data-delay="1.3">
                                <div class="form-group">
                                    <label for="additional_information">هل ترغب في إضافة معلومات أخرى عنك؟</label>
                                    <textarea name="additional_information" id="additional_information" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12" data-animate="fadeInUp" data-delay="1.4">
                                <div class="form-group">
                                    <label for="job_benefit_goals">كيف ستساعدك هذه الوظيفة؟ *</label>
                                    <textarea name="job_benefit_goals" id="job_benefit_goals" cols="30" rows="4" class="form-control"
                                              placeholder="بشكل صريح ومختصر أخبرنا ما الذي تسعى إليه من خلال التقدم إلى هذه الوظيفة" required></textarea>
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="col-md-12" style="margin: 15px 0" data-animate="fadeInUp" data-delay=".8">
                                <div class="form-group">
                                    <button id="btn-submit" type="submit" class="btn btn-primary btn-square btn-block">
                                        إرسال
                                        <span id="btn-spinner" style="display: none;"
                                              class="spinner-border spinner-border-sm" role="status"
                                              aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Contact page content -->
@endsection