@extends('dashboard.layouts.app')
@section('title', 'Update Work')
@section('worksActive', 'active')

@section('scripts')
<script type="text/javascript">
    var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
    var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
</script>
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('dashboard/js/work.js')}}"></script>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">تعديل العمل</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.works.update', $work->id) }}" method="post" enctype="multipart/form-data">
                @csrf()
                {{ method_field('put') }}

                <div class="form-group mb-3">
                    <label for="ar[title]" class="form-label">العنوان</label>
                    <input type="text" name="ar[title]" class="form-control" value="{{ $work->translate('ar')->title }}"
                        dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[title]" class="form-label">Title in English</label>
                    <input type="text" name="en[title]" class="form-control"
                        value="{{ $work->translate('en')->title }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="slug" class="form-label">الرابط - Link</label>
                    <input type="text" name="slug" class="form-control" value="{{ $work->slug }}">
                </div>

                <div class="form-group mb-3">
                    <label for="ar[description]" class="form-label">الوصف</label>
                    <textarea class="form-control" id="ar[description]" name="ar[description]" rows="5"
                        dir="rtl">{{ $work->translate('ar')->description }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[description]" class="form-label">Description in English</label>
                    <textarea class="form-control" id="en[description]" name="en[description]"
                        rows="5">{{ $work->translate('en')->description }}</textarea>
                </div> --}}

                <div class="form-group mb-3">
                    <label for="category" class="form-label">اختر تصنيف</label>
                    <select class="form-select" name="category" id="category">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ $work->work_category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="showed" name="showed" {{ $work->showed  == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="showed">
                      عرض
                    </label>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="show_at_home" name="show_at_home" {{ $work->show_at_home  == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="show_at_home">
                      عرض في الصفحة الرئيسية
                    </label>
                </div>

                <div class="form-group mb-3">
                    <label>الصورة</label>
                    <input type="file" name="image" class="form-control image">
                </div>

                <div class="form-group mb-3">
                    <img src="{{ asset($work->image) }}" style="width: 300px;" class="img-thumbnail image-preview"
                        alt="">
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> تعديل </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
