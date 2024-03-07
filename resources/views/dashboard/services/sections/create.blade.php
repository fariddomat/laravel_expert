@extends('dashboard.layouts.app')
@section('title', 'Add New Section')
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
    <div class="card-header">إضافة قسم جديد ل {{$service->title}}</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.services.sections.store', $service->id) }}" method="post">
                @csrf()

                <div class="form-group mb-3">
                    <label for="ar[title]" class="form-label">العنوان</label>
                    <input type="text" name="ar[title]" class="form-control" value="{{ old('ar.title') }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[title]" class="form-label">Title in English</label>
                    <input type="text" name="en[title]" class="form-control" value="{{ old('en.title') }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[content]" class="form-label">المحتوى</label>
                    <textarea class="form-control" id="ar[content]" name="ar[content]" rows="5" dir="rtl">{{ old('ar.content') }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[content]" class="form-label">Content in English</label>
                    <textarea class="form-control" id="en[content]" name="en[content]" rows="5">{{old('en.content')}}</textarea>
                </div> --}}

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> إضافة </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
