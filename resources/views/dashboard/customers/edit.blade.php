@extends('dashboard.layouts.app')
@section('title', 'Update Customer')
@section('customersActive', 'active')
@section('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Update Customer</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.customers.update',$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf()
                {{ method_field('put') }}
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="slug" class="form-label">Link</label>
                    <input type="text" name="slug" class="form-control" value="{{ $user->customer->slug }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control">
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="contactUs" name="contactUs" {{ $user->customer->contact_us_form  == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="contactUs">
                        Contact Us Form
                    </label>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="blogs" name="blogs" {{ $user->customer->blogs  == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="blogs">
                        Has Blogs
                    </label>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="active" name="active" {{ $user->active  == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">
                        Active
                    </label>
                </div>

                <div class="form-group mb-3">
                    <label>Main Image</label>
                    <input type="file" name="image" class="form-control image">
                </div>

                <div class="form-group mb-3">
                    <img src="{{ Storage::disk('s3')->url($user->customer->main_image) ?? '#' }}" style="width: 300px;"
                        class="img-thumbnail image-preview" alt="">
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Update </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
