@extends('dashboard.layouts.app')
@section('title', 'Contact Info')
@section('contactinfoActive', 'active')
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
                CKEDITOR.replace("ar[location]", {
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
    <div class="card-header">معلومات التواصل</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.contactinfo.store') }}" method="post" enctype="multipart/form-data">
                @csrf()
                <div class="form-group mb-3">
                    <label for="mobile" class="form-label">رقم الهاتف</label>
                    <input type="text" name="mobile" class="form-control" value="{{ $contactInfo->mobile }}">
                </div>
                <div class="form-group mb-3">
                    <label for="mobile" class="form-label">2رقم الهاتف</label>
                    <input type="text" name="mobile2" class="form-control" value="{{ $contactInfo->mobile2 }}">
                </div>
                <div class="form-group mb-3">
                    <label for="mobile" class="form-label">رقم الأرضي</label>
                    <input type="text" name="phone" class="form-control" value="{{ $contactInfo->phone }}">
                </div>
                <div class="form-group mb-3">
                    <label for="whatsapp" class="form-label">واتساب</label>
                    <input type="text" name="whatsapp" class="form-control" value="{{ $contactInfo->whatsapp }}">
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">البريد الالكتروني</label>
                    <input type="text" name="email" class="form-control" value="{{ $contactInfo->email }}">
                </div>
                <div class="form-group mb-3">
                    <label for="location_link" class="form-label">رابط الموقع - Location Link</label>
                    <input type="text" name="location_link" class="form-control" value="{{ $contactInfo->location_link }}">
                </div>
                <div class="form-group mb-3">
                    <label for="ar[location]" class="form-label">الموقع</label>
                    <textarea name="ar[location]" id="" cols="30" rows="10">{{ $contactInfo->translate('ar')->location }}</textarea>
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[location]" class="form-label">Location Name in English</label>
                    <input type="text" name="en[location]" class="form-control" value="{{ $contactInfo->translate('en')->location }}">
                </div> --}}
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> حفظ </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
