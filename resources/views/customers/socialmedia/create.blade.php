@extends('customers.layouts.app')
@section('title', 'Add Social Media')
@section('socialmediaActive', 'active')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Add Social Media</h1>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="col">
            <form action="{{ route('customers.dashboard.socialmedia.store') }}" method="post">
                @csrf()
                <div class="form-group mb-3">
                    <label for="socialMedias" class="form-label">Select Social Media</label>
                    <select class="form-select" name="socialMedias" id="socialMedias">
                        <option value="">Select Social Media</option>
                        @foreach($socialMedias as $socialMedia)
                        <option value="{{$socialMedia}}" {{ old('socialMedias')==$socialMedia ? 'selected' : '' }}>
                            {{$socialMedia}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" name="link" class="form-control" value="{{ old('link') }}">
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="showed" name="showed" {{
                        old('showed')=='1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="showed">
                        Showed
                    </label>
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add </button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
