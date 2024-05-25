@extends('dashboard.layouts.app')
@section('title', 'Edit location')
@section('locationActive', 'active')

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
    <div class="card-header">تعديل رحلة  </div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.locations.trips.update', [$location, $trip]) }}" method="post" enctype="multipart/form-data">
                @csrf()
                @method('PUT')
                <input type="hidden" name="location_id" value="{{ $location->id }}">
                <div class="form-group mb-3">
                    <label>الاسم</label>
                    <input type="text" name="title" class="form-control " value="{{ old('title', $trip->title) }}">
                </div>
                <div class="form-group mb-3">
                    <label>الوصف</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10">
                        {{ old('description', $trip->description)}}
                    </textarea>
                </div>


                <div class="form-group mb-3">
                    <label>الصورة</label>
                    <br>
                    <img src="{{ asset($trip->img) }}" class="img-thumbnail " style="max-width: 300px" alt="">
                    <br>
                    <input type="file" name="img" class="form-control">
                </div>



                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> إضافة </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
