@extends('dashboard.layouts.app')
@section('title', 'Add New Image')
@section('servicesActive', 'active')

@section('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Add New Header Image For {{$service->title}}</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.services.sliderHeaderImages.store', $service->id) }}" method="post" enctype="multipart/form-data">
                @csrf()

                <div class="form-group mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control image">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="showed" name="showed" checked>
                    <label class="form-check-label" for="showed">
                      Showed
                    </label>
                </div>

                <div class="form-group mb-3">
                    <img src="" style="width: 300px; display: none;" class="img-thumbnail image-preview" alt="">
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
