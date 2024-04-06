@extends('dashboard.layouts.app')
@section('title', 'Change Home Info')
@section('homeinfoActive', 'active')

@section('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">تعديل معلومات الصفحة الرئيسية</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.homeinfo.store') }}" method="post" enctype="multipart/form-data">
                @csrf()
                <div class="form-group mb-3">
                    <label for="ar[title]" class="form-label">العنوان</label>
                    <input type="text" name="ar[title]" class="form-control" value="{{ old('ar.title') ?? isset($info) ? $info->translate('ar')->title : ''  }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[title]" class="form-label">Title in English</label>
                    <input type="text" name="en[title]" class="form-control" value="{{ old('en.title') ?? isset($info) ? $info->translate('en')->title : '' }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[description]" class="form-label">الوصف</label>
                    <input type="text" name="ar[description]" class="form-control" value="{{ old('ar.description') ?? isset($info) ? $info->translate('ar')->description : '' }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[description]" class="form-label">Description in English</label>
                    <input type="text" name="en[description]" class="form-control" value="{{ old('en.description') ?? isset($info) ? $info->translate('en')->description : '' }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[footer]" class="form-label">الوصف</label>
                    <input type="text" name="ar[footer]" class="form-control" value="{{ old('ar.footer') ?? isset($info) ? $info->translate('ar')->footer : '' }}" dir="rtl">
                </div>

                <div class="form-group mb-3">
                    <label for="ar[work]" class="form-label">العمل</label>
                    <input type="text" name="ar[work]" class="form-control" value="{{ old('ar.work') ?? isset($info) ? $info->translate('ar')->work : '' }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[work]" class="form-label">Work in English</label>
                    <input type="text" name="en[work]" class="form-control" value="{{ old('en.work') ?? isset($info) ? $info->translate('en')->work : '' }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[work_description]" class="form-label">وصف العمل</label>
                    <input type="text" name="ar[work_description]" class="form-control" value="{{ old('ar.work_description') ?? isset($info) ? $info->translate('ar')->work_description : '' }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[work_description]" class="form-label">Work Description in English</label>
                    <input type="text" name="en[work_description]" class="form-control" value="{{ old('en.work_description') ?? isset($info) ? $info->translate('en')->work_description : '' }}">
                </div> --}}


                <div class="form-group mb-3">
                    <label>الصورة الرئيسية</label>
                    <a href="{{ route('dashboard.homeinfoSliderImages.index') }}"  class="btn btn-primary">Image</a>
                </div>

                <div class="form-group mb-3">
                    <label>صورة ال Logo  (200 x 200)</label>
                    <input type="file" name="logo_icon" class="form-control logo-icon">
                </div>

                <div class="form-group mb-3">
                    <img src="{{ isset($info) ? asset($info->logo_icon) : '#' }}" style="width: 300px;" class="img-thumbnail logo-icon-preview" alt="">
                </div>

                <div class="form-group mb-3">
                    <label>صورة ال Logo </label>
                    <input type="file" name="logo" class="form-control logo">
                </div>

                <div class="form-group mb-3">
                    <img src="{{ isset($info) ? asset($info->logo) : '#' }}" style="width: 300px;" class="img-thumbnail logo-preview" alt="">
                </div>

                <div class="form-group mb-3">
                    <label>صورة About Me Image </label>
                    <input type="file" name="about_me_image" class="form-control about-me-image">
                </div>

                <div class="form-group mb-3">

                    <img src="{{ isset($info) ? asset($info->about_me_image) : '#' }}" style="width: 300px;" class="img-thumbnail about-me-image-preview" alt="">
                </div>

                {{-- <div class="form-group mb-3">
                    <label>About Me Image EN</label>
                    <input type="file" name="about_me_image_en" class="form-control about-me-image-en">
                </div> --}}

                {{-- <div class="form-group mb-3">
                    <img src="{{ isset($info) ? asset($info->about_me_image_en) : '#' }}" style="width: 300px;" class="img-thumbnail about-me-image-en-preview" alt="">
                </div> --}}


                <div class="form-group mb-3">
                    <label>صورة قسم الخدمات</label>
                    <input type="file" name="service_image" class="form-control service-image">
                </div>

                <div class="form-group mb-3">
                    <img src="{{ isset($info) ? asset($info->service_image) : '#' }}" style="width: 300px;" class="img-thumbnail service-image-preview" alt="">
                </div>


                <div class="form-group mb-3">
                    <label>صورة عن الموقع</label>
                    <input type="file" name="about_header_image" class="form-control about-header-image">
                </div>

                <div class="form-group mb-3">
                    <img src="{{ isset($info) ? asset($info->about_header_image) : '#' }}" style="width: 300px;" class="img-thumbnail about-header-image-preview" alt="">
                </div>



                <div class="form-group mb-3">
                    <label>صورة غلاف المدونة</label>
                    <input type="file" name="blog_header_image" class="form-control blog-header-image">
                </div>

                <div class="form-group mb-3">
                    <img src="{{ isset($info) ? asset($info->blog_header_image) : '#' }}" style="width: 300px;" class="img-thumbnail blog-header-image-preview" alt="">
                </div>


                <div class="form-group mb-3">
                    <label>صورة قسم اتصل بنا</label>
                    <input type="file" name="contact_header_image" class="form-control contact-header-image">
                </div>

                <div class="form-group mb-3">
                    <img src="{{ isset($info) ? asset($info->contact_header_image) : '#' }}" style="width: 300px;" class="img-thumbnail contact-header-image-preview" alt="">
                </div>



                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> حفظ </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
