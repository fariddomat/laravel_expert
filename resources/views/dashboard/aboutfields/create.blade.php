@extends('dashboard.layouts.app')
@section('title', 'Add New About Field')
@section('aboutfieldsActive', 'active')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">إضافة حقل</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.aboutfields.store') }}" method="post">
                @csrf()

                <div class="form-group mb-3">
                    <label for="ar[title]" class="form-label">العنوان</label>
                    <input type="text" name="ar[title]" class="form-control" value="{{ old('ar.title') }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[title]" class="form-label">Title in English</label>
                    <input type="text" name="en[title]" class="form-control" value="{{ old('en.title') }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[value]" class="form-label">القيمة</label>
                    <input type="text" name="ar[value]" class="form-control" value="{{ old('ar.value') }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[value]" class="form-label">Value in English</label>
                    <input type="text" name="en[value]" class="form-control" value="{{ old('en.value') }}">
                </div> --}}

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> إضافة </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
