@extends('dashboard.layouts.app')
@section('title', 'Add New Blog Category')
@section('blogcategoriesActive', 'active')
@section('scripts')
    <script src="{{ asset('dashboard/js/image_preview.js') }}"></script>
@endsection
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card-header">إضافة تصنيف جديد للمدونة</div>
    </div>
    <div>
        @include('partials._errors')
    </div>
    <div class="container">

        <div class="row justify-content-center">
            <div class="card-block">
                <form action="{{ route('dashboard.blogcategories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf()

                    <div class="form-group mb-3">
                        <label for="ar[name]" class="form-label">الاسم</label>
                        <input type="text" name="ar[name]" class="form-control" value="{{ old('ar.name') }}"
                            dir="rtl">
                    </div>
                    {{-- <div class="form-group mb-3">
                    <label for="en[name]" class="form-label">Name in English</label>
                    <input type="text" name="en[name]" class="form-control" value="{{ old('en.name') }}">
                </div> --}}
                    <div class="form-group mb-3">
                        <input class="" type="checkbox" value="1" id="showed" name="showed"
                            {{ old('showed') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="showed">
                            عرض
                        </label>
                    </div>

                    <div class="form-group mb-3">
                        <label>الصورة</label>
                        <input type="file" name="image" class="form-control image">
                    </div>

                    <div class="form-group mb-3">
                        <img src="" style="width: 300px; display: none;" class="img-thumbnail image-preview"
                            alt="">
                    </div>

                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> إضافة </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
