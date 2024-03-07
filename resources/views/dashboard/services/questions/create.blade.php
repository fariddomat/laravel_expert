@extends('dashboard.layouts.app')
@section('title', 'Add New Question')
@section('servicesActive', 'active')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">إضافة سؤال ل {{$service->title}}</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.services.questions.store', $service->id) }}" method="post">
                @csrf()

                <div class="form-group mb-3">
                    <label for="ar[question]" class="form-label">السؤال</label>
                    <input type="text" name="ar[question]" class="form-control" value="{{ old('ar.question') }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[question]" class="form-label">Questions in English</label>
                    <input type="text" name="en[question]" class="form-control" value="{{ old('en.question') }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[answer]" class="form-label">الإجابة</label>
                    <textarea class="form-control" id="ar[answer]" name="ar[answer]" rows="3" dir="rtl">{{ old('ar.answer') }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[answer]" class="form-label">Answer in English</label>
                    <textarea class="form-control" id="en[answer]" name="en[answer]" rows="3">{{old('en.answer')}}</textarea>
                </div> --}}

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> إضافة </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
