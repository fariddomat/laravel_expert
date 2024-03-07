@extends('dashboard.layouts.app')
@section('title', 'About')
@section('privacyActive', 'active')

@section('scripts')
<script type="text/javascript">
    var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
    var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
</script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('dashboard/js/about.js')}}"></script>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">سياسة الخصوصية - Privacy</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.privacy.store') }}" method="post" enctype="multipart/form-data">
                @csrf()

                <div class="form-group mb-3">
                    <label for="ar" class="form-label">سياسة الخصوصية</label>
                    <textarea class="form-control" id="ar" name="ar" rows="5" dir="rtl">{{ old('ar') ?? isset($privacy) ? $privacy->ar : '' }}</textarea>
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en" class="form-label">Privacy Me in English</label>
                    <textarea class="form-control" id="en" name="en" rows="5">{{ old('en') ?? isset($privacy) ? $privacy->en : '' }}</textarea>
                </div> --}}
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> حفظ </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
