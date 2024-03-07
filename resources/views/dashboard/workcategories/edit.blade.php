@extends('dashboard.layouts.app')
@section('title', 'Update Work Category')
@section('workcategoriesActive', 'active')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">تعديل تصنيف عمل</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.workcategories.update',$workcategory->id) }}" method="post">
                @csrf()
                {{ method_field('put') }}

                <div class="form-group mb-3">
                    <label for="ar[name]" class="form-label">الاسم</label>
                    <input type="text" name="ar[name]" class="form-control" value="{{ $workcategory->translate('ar')->name }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[name]" class="form-label">Name in English</label>
                    <input type="text" name="en[name]" class="form-control" value="{{ $workcategory->translate('en')->name }}">
                </div> --}}
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="showed" name="showed" {{ $workcategory->showed  == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="showed">
                      عرض
                    </label>
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> تعديل </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
