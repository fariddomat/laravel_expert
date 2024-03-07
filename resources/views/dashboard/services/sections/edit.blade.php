@extends('dashboard.layouts.app')
@section('title', 'Update Section')
@section('servicesActive', 'active')

@section('scripts')
<script type="text/javascript">
    var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
    var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
</script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
        $(function () {
            CKEDITOR.replace("ar[content]", {
                filebrowserBrowseUrl: imageGalleryBrowseUrl,
                filebrowserUploadUrl:
                    imageGalleryUploadUrl +
                    "?_token=" +
                    $("meta[name=csrf-token]").attr("content"),
                removeButtons: "About",
                contentsLangDirection: 'rtl'
            });
            CKEDITOR.replace("en[content]", {
                filebrowserBrowseUrl: imageGalleryBrowseUrl,
                filebrowserUploadUrl:
                    imageGalleryUploadUrl +
                    "?_token=" +
                    $("meta[name=csrf-token]").attr("content"),
                removeButtons: "About"
            });
        });
</script>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">تعديل الأقسام ل {{$section->service->title}}</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.services.sections.update', $section->id) }}" method="post">
                @csrf()
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="ar[title]" class="form-label">العنوان</label>
                    <input type="text" name="ar[title]" class="form-control" value="{{ $section->translate('ar')->title }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[title]" class="form-label">Title in English</label>
                    <input type="text" name="en[title]" class="form-control" value="{{ $section->translate('en')->title }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[content]" class="form-label">المحتوى</label>
                    <textarea class="form-control" id="ar[content]" name="ar[content]" rows="5" dir="rtl">{{ $section->translate('ar')->content }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[content]" class="form-label">Content in English</label>
                    <textarea class="form-control" id="en[content]" name="en[content]" rows="5">{{$section->translate('en')->content}}</textarea>
                </div> --}}

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> تعديل </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
