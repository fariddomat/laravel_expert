@extends('dashboard.layouts.app')
@section('title', 'Add package')
@section('blogcategoriesActive', 'active')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">إضافة باقة جديدة </div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.packages.store') }}" method="post">
                @csrf()
                <div class="form-group mb-3">
                    <label for="name" class="form-label">الخدمة</label>
                    <select name="service_id" id="" class="form-control">
                        <option value="">اختر خدمة</option>
                        @foreach ($services as $service)
                        <option value="{{ $service_id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="name" class="form-label">الاسم</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" dir="rtl">
                </div>
                <div class="form-group mb-3">
                    <label for="price" class="form-label">السعر</label>
                    <input type="text" name="price" class="form-control" value="{{ old('price') }}" dir="rtl">
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> إضافة </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
