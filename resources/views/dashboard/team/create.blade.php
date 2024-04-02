@extends('dashboard.layouts.app')
@section('title', 'Add new team member')
@section('teamActive', 'active')

@section('scripts')
    <script src="{{ asset('dashboard/js/image_preview.js') }}"></script>
    <script type="text/javascript">
        var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
        var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
    </script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>

        var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
        var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
            $(function() {
                CKEDITOR.replace("description", {
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
        <div class="card-header">إضافة عضو في الفريق </div>
    </div>
    <div>
        @include('partials._errors')
    </div>
    <div class="container">

        <div class="row justify-content-center">
            <div class="card-block">
                <form action="{{ route('dashboard.team.store') }}" method="post" enctype="multipart/form-data">
                    @csrf()


                    <div class="form-group mb-3">
                        <label>الاسم</label>
                        <input type="text" name="name" class="form-control " value="{{ old('name') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>التصنيف</label>
                        <select name="team_role_id" class="form-control" required>
                            @foreach ($teamRoles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>الوصف</label>
                        <input type="text" name="title" class="form-control " value="{{ old('title') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>التفاصيل</label>
                        <textarea name="description" class="form-control description">
                        {{ old('description') }}
                    </textarea>
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
