@extends('dashboard.layouts.app')
@section('title', 'Update team member')
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
        <div class="card-header">تعديل عضو في الفريق </div>
    </div>
    <div>
        @include('partials._errors')
    </div>
    <div class="container">

        <div class="row justify-content-center">
            <div class="card-block">
                <form action="{{ route('dashboard.team.update', $team) }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    @method('PUT')


                    <div class="form-group mb-3">
                        <label>الاسم</label>
                        <input type="text" name="name" class="form-control " value="{{ old('name', $team->name) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>التصنيف</label>
                        <select name="team_role_id" class="form-control">
                            @foreach ($teamRoles as $role)
                                <option value="{{ $role->id }}" @if ($team->team_role_id == $role->id) selected @endif>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>الوصف</label>
                        <input type="text" name="title" class="form-control " value="{{ old('title', $team->title) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label>التفاصيل</label>
                        <textarea name="description" class="form-control description">
                        {{ old('description', $team->description) }}
                    </textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>الصورة</label>
                        <input type="file" name="image" class="form-control image">
                    </div>


                    <div class="form-group mb-3">
                        <img src="{{ asset($team->image) }}" style="width: 300px;" class="img-thumbnail image-preview"
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
