@extends('dashboard.layouts.app')
@section('title', 'Update Package')
@section('blogcategoriesActive', 'active')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">تعديل خدمة</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.package_services.update',$service->id) }}" method="post">
                @csrf()
                {{ method_field('put') }}
                <div class="form-group mb-3">
                    <label for="name" class="form-label">التصنيف</label>
                    <select name="package_category_id" id="" class="form-control">
                        <option value="">اختر تصنيف</option>
                        @foreach ($package_categories as $item)
                        <option value="{{ $item->id }}"{{ $service->package_category_id == $service->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="name" class="form-label">الاسم</label>
                    <input type="text" name="name" class="form-control" value="{{ $service->name }}" dir="rtl">
                </div>
                <div class="form-group mb-3">
                    <label for="price" class="form-label">القيمة</label>
                    <input type="text" name="value" class="form-control" value="{{ $service->value }}" dir="rtl">
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> تعديل </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
