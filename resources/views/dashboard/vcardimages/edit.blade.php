@extends('dashboard.layouts.app')
@section('title', 'Update VCard Image')
@section('customersActive', 'active')

@section('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Update VCard Image For {{$vcardimage->customer->first_name}} {{$vcardimage->customer->last_name}}</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.vcardimages.update', $vcardimage->id) }}" method="post" enctype="multipart/form-data">
                @csrf()
                {{ method_field('put') }}
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="showed" name="showed" {{ $vcardimage->showed  == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="showed">
                      Showed
                    </label>
                </div>
                <div class="form-group mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control image">
                </div>
                <div class="form-group mb-3">
                    <img src="{{ Storage::disk('s3')->url($vcardimage->image) }}" style="width: 300px;" class="img-thumbnail image-preview" alt="">
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Update </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
