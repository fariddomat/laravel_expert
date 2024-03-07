@extends('customers.layouts.app')
@section('title', 'Update Social Media')
@section('socialmediaActive', 'active')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Update Social Media</h1>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="col">
            <form action="{{ route('customers.dashboard.socialmedia.update',$socialMedia->id) }}" method="post">
                @csrf()
                {{ method_field('put') }}
                <div class="form-group mb-3">
                    <label for="socialMedias" class="form-label">Select Social Media</label>
                    <select class="form-select" name="socialMedias" id="socialMedias">
                        <option value="">Select Social Media</option>
                        @foreach($socialMedias as $social)
                        <option value="{{$social}}" {{ $socialMedia->name == $social ? 'selected' : '' }}>
                            {{$social}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" name="link" class="form-control" value="{{ $socialMedia->link }}">
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="showed" name="showed" {{
                        $socialMedia->showed == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="showed">
                        Showed
                    </label>
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Update </button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
