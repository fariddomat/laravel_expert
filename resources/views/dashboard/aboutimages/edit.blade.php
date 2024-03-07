@extends('dashboard.layouts.app')
@section('title', 'Update About Image')
@section('aboutimagesActive', 'active')

@section('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">تعديل صورة</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.aboutimages.update', $aboutimage->id) }}" method="post" enctype="multipart/form-data">
                @csrf()
                {{ method_field('put') }}
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="showed" name="showed" {{ $aboutimage->showed  == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="showed">
                      عرض
                    </label>
                </div>
                <div class="form-group mb-3">
                    <label>الصورة</label>
                    <input type="file" name="image" class="form-control image">
                </div>
                <div class="form-group mb-3">
                    <img src="{{ asset($aboutimage->image) }}" style="width: 300px;" class="img-thumbnail image-preview" alt="">
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> تعديل </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
