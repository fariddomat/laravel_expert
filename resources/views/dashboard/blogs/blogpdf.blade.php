@extends('dashboard.layouts.app')
@section('title', 'Change Blog PDF')
@section('blogPDFActive', 'active')

@section('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">تعديل الصورة</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.blogPDF.store') }}" method="post" enctype="multipart/form-data">
                @csrf()
                <div class="form-group mb-3">
                    <label>صورة ال Header</label>
                    <input type="file" name="image" class="form-control image">
                </div>
                <div class="form-group mb-3">
                    <img src="{{ isset($blogPdf) ? asset($blogPdf->header_image) : '#' }}" style="width: 300px;"
                        class="img-thumbnail image-preview" alt="">
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Change </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
