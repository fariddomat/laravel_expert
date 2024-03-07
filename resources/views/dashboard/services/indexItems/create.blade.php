@extends('dashboard.layouts.app')
@section('title', 'Add New Index Item')
@section('servicesActive', 'active')


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
    <div class="card-header">إضافة ل {{$service->title}}</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.services.indexitems.store', $service->id) }}" method="post">
                @csrf()

                <div class="form-group mb-3">
                    <label for="ar[name]" class="form-label">الاسم</label>
                    <input type="text" name="ar[name]" class="form-control" value="{{ old('ar.name') }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[name]" class="form-label">Name in English</label>
                    <input type="text" name="en[name]" class="form-control" value="{{ old('en.name') }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[description]" class="form-label">الوصف</label>
                    <textarea class="form-control" id="ar[description]" name="ar[description]" rows="3" dir="rtl">{{ old('ar.description') }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[description]" class="form-label">description in English</label>
                    <textarea class="form-control" id="en[description]" name="en[description]" rows="3">{{old('en.description')}}</textarea>
                </div> --}}

                {{-- <div class="form-group mb-3">
                    <label for="" class="form-label">Sub Service Link</label>
                    <select name="sub_service_id" class="form-control">
                        <option value="">( Optional )</option>
                        @foreach ($subServices as $service)
                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                        @endforeach
                    </select>
                </div>
 --}}

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> إضافة </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
