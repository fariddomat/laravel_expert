@extends('dashboard.layouts.app')

@section('title', 'Add New Review')
@section('reviewsActive', 'active')

@section('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function() {
            CKEDITOR.replace("description", {
                filebrowserBrowseUrl: "{{ route('dashboard.imageGallery.browser') }}",
                filebrowserUploadUrl: "{{ route('dashboard.imageGallery.uploader') }}?_token=" + $("meta[name=csrf-token]").attr("content"),
                removeButtons: "About",
                contentsLangDirection: 'rtl'
            });
        });
    </script>
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card-header">إضافة رأي</div>
    </div>

    <div>
        @include('partials._errors')
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="card-block">
                <form action="{{ route('dashboard.reviews.store') }}" method="post" enctype="multipart/form-data">
                    @csrf()

                    <div class="form-group mb-3">
                        <label for="name">الاسم</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">الصورة</label>
                        <input type="file" name="image" class="form-control" id="image" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">المحتوى</label>
                        <textarea name="description" class="form-control" id="description" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> إضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
