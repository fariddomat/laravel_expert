@extends('dashboard.layouts.app')
@section('title', 'Add New Service')
@section('servicesActive', 'active')

@section('scripts')
    <script src="{{ asset('dashboard/js/image_preview.js') }}"></script>
@endsection

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card-header">إضافة خدمة جديدة</div>
    </div>
    <div>
        @include('partials._errors')
    </div>
    <div class="container">

        <div class="row justify-content-center">
            <div class="card-block">
                <form action="{{ route('dashboard.services.store') }}" method="post" enctype="multipart/form-data">
                    @csrf()

                    <div class="form-group mb-3">
                        <label for="ar[title]" class="form-label">عنوان الخدمة</label>
                        <input type="text" name="ar[title]" class="form-control" value="{{ old('ar.title') }}"
                            dir="rtl">
                    </div>
                    {{-- <div class="form-group mb-3">
                        <label for="en[title]" class="form-label">Title in English</label>
                        <input type="text" name="en[title]" class="form-control" value="{{ old('en.title') }}">
                    </div> --}}

                    <div class="form-group mb-3">
                        <label for="slug" class="form-label">الرابط - Link</label>
                        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="ar[main_title]" class="form-label">العنوان الرئيسي</label>
                        <input type="text" name="ar[main_title]" class="form-control" value="{{ old('ar.main_title') }}"
                            dir="rtl">
                    </div>
                    {{-- <div class="form-group mb-3">
                        <label for="en[main_title]" class="form-label">Main Title in English</label>
                        <input type="text" name="en[main_title]" class="form-control" value="{{ old('en.main_title') }}">
                    </div> --}}


                    <div class="form-group mb-3">
                        <img src="" style="width: 300px; display: none;" class="img-thumbnail logo-preview"
                            alt="">
                    </div>

                    <div class="form-group mb-3">
                        <label for="ar[brief]" class="form-label">التعريف - Brief</label>
                        <textarea class="form-control" id="ar[brief]" name="ar[brief]" rows="5" dir="rtl">{{ old('ar.brief') }}</textarea>
                    </div>

                    {{-- <div class="form-group mb-3">
                        <label for="en[brief]" class="form-label">Brief in English</label>
                        <textarea class="form-control" id="en[brief]" name="en[brief]" rows="5">{{ old('en.brief') }}</textarea>
                    </div> --}}


                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" id="showed" name="showed"
                            {{ old('showed') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="showed">
                            عرض
                        </label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" id="show_at_home"
                            name="show_at_home" {{ old('show_at_home') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="show_at_home">
                            عرض في الصفحة الرئيسية
                        </label>
                    </div>


                    <div class="form-group mb-3">
                        <label>الصورة المصغرة</label>
                        <input type="file" name="image" class="form-control image">
                    </div>

                    <div class="form-group mb-3">
                        <img src="" style="width: 300px; display: none;" class="img-thumbnail image-preview"
                            alt="">
                    </div>

                    <div class="form-group mb-3">
                        <label>الصورة الرئيسية</label>
                        <input type="file" name="index_image" class="form-control logo">
                    </div>

                    <div class="form-group mb-3">
                        <img src="" style="width: 300px; display: none;" class="img-thumbnail logo-preview"
                            alt="">
                    </div>


                    <div class="form-group mb-3">
                        <label>الصورة الرئيسية 2</label>
                        <input type="file" name="index_image_2" class="form-control logo2">
                    </div>

                    <div class="form-group mb-3">
                        <img src="" style="width: 300px; display: none;" class="img-thumbnail logo-preview-2"
                            alt="">
                    </div>

                    <div class="form-group mb-3">
                        <label>الخدمة التابع لها</label>
                        <select name="parent_id" id="" class="form-control">
                            <option value="">اختر خدمة لتصبح هذه الخدمة فرعية ضمنها</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> إضافة </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
