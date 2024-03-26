@extends('dashboard.layouts.app')
@section('title', 'Add New Counters')
@section('conterActive', 'active')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">إضافة عداد جديد</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.counters.store') }}" method="post">
                @csrf()

                <div class="form-group mb-3">
                    <label for="title" class="form-label">الاسم</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" dir="rtl">
                </div>

                <div class="form-group mb-3">
                    <label for="value" class="form-label">القيمة</label>
                    <input type="number" name="value" class="form-control" value="{{ old('value') }}" dir="rtl">
                </div>

                <div class="form-group mb-3">
                    <label for="icon" class="form-label">icon class</label>
                    <input type="text" name="icon" class="form-control" value="{{ old('icon') }}" dir="rtl">
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> إضافة </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
