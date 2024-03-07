@extends('dashboard.layouts.app')
@section('title', 'Update Client')
@section('clientsActive', 'active')

@section('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">تعديل زبون</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.clients.update', $client->id) }}" method="post" enctype="multipart/form-data">
                @csrf()
                {{ method_field('put') }}

                <div class="form-group mb-3">
                    <label for="ar[name]" class="form-label">الاسم</label>
                    <input type="text" name="ar[name]" class="form-control" value="{{ $client->translate('ar')->name }}"
                        dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[name]" class="form-label">Name in English</label>
                    <input type="text" name="en[name]" class="form-control"
                        value="{{ $client->translate('en')->name }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[company]" class="form-label">الشركة</label>
                    <input type="text" name="ar[company]" class="form-control"
                        value="{{ $client->translate('ar')->company }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[company]" class="form-label">Company in English</label>
                    <input type="text" name="en[company]" class="form-control"
                        value="{{ $client->translate('en')->company }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[position]" class="form-label">الموقع</label>
                    <input type="text" name="ar[position]" class="form-control"
                        value="{{ $client->translate('ar')->position }}" dir="rtl">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="en[position]" class="form-label">Position in English</label>
                    <input type="text" name="en[position]" class="form-control"
                        value="{{ $client->translate('en')->position }}">
                </div> --}}

                <div class="form-group mb-3">
                    <label for="ar[talk]" class="form-label">الحديث - Talk</label>
                    <textarea class="form-control" name="ar[talk]" rows="5"
                        dir="rtl">{{ $client->translate('ar')->talk }}</textarea>
                </div>

                {{-- <div class="form-group mb-3">
                    <label for="en[talk]" class="form-label">Talk in English</label>
                    <textarea class="form-control" name="en[talk]"
                        rows="5">{{ $client->translate('en')->talk }}</textarea>
                </div> --}}

                <div class="form-group mb-3">
                    <label>الصورة ( 200 x 200 )</label>
                    <input type="file" name="image" class="form-control image">
                </div>

                <div class="form-group mb-3">
                    <img src="{{ asset($client->image) }}" style="width: 300px;" class="img-thumbnail image-preview"
                        alt="">
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> تعديل </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
