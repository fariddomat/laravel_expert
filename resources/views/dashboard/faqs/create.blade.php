@extends('dashboard.layouts.app')
@section('title', 'Add new question')
@section('faqActive', 'active')

@section('scripts')
<script type="text/javascript">
    var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
    var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
</script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>

    var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
    var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
        $(function() {
            CKEDITOR.replace("answer", {
                filebrowserBrowseUrl: imageGalleryBrowseUrl,
                filebrowserUploadUrl: imageGalleryUploadUrl +
                    "?_token=" +
                    $("meta[name=csrf-token]").attr("content"),
                removeButtons: "About",
                contentsLangDirection: 'rtl'
            });

        });
    </script>
@endsection

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card-header">إضافة سؤال </div>
    </div>
    <div>
        @include('partials._errors')
    </div>
    <div class="container">

        <div class="row justify-content-center">
            <div class="card-block">
                <form action="{{ route('dashboard.faqs.store') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="form-group mb-3">
                        <label>السؤال</label>
                        <textarea name="question" class="form-control">
                        {{ old('question') }}
                    </textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>الاجابة</label>
                        <textarea name="answer" class="form-control">
                        {{ old('answer') }}
                    </textarea>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> إضافة </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
