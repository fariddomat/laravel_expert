@extends('dashboard.layouts.app')
@section('title', 'Add New Work Way')
@section('servicesActive', 'active')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Add New Work Way For {{$service->title}}</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.services.workways.store', $service->id) }}" method="post">
                @csrf()

                <div class="form-group mb-3">
                    <label for="ar[title]" class="form-label">Title in Arabic</label>
                    <input type="text" name="ar[title]" class="form-control" value="{{ old('ar.title') }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[title]" class="form-label">Title in English</label>
                    <input type="text" name="en[title]" class="form-control" value="{{ old('en.title') }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[content]" class="form-label">Content in Arabic</label>
                    <textarea class="form-control" id="ar[content]" name="ar[content]" rows="3" dir="rtl">{{ old('ar.content') }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[content]" class="form-label">Content in English</label>
                    <textarea class="form-control" id="en[content]" name="en[content]" rows="3">{{old('en.content')}}</textarea>
                </div> --}}

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
