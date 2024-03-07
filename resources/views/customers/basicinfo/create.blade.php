@extends('customers.layouts.app')
@section('title', 'Change Basic Info')
@section('basicinfoActive', 'active')

@section('scripts')
<script src="{{asset('dashboard/js/image_preview.js')}}"></script>
<script src="{{asset('ckeditor_basic/ckeditor.js')}}"></script>
<script>
    $(function() {
    CKEDITOR.replace("ar[services]");
    CKEDITOR.replace("en[services]");
    CKEDITOR.replace("ar[name]");
    CKEDITOR.replace("en[name]");
    CKEDITOR.replace("ar[about]");
    CKEDITOR.replace("en[about]");
});
</script>
@endsection

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Change Basic Info</h1>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">

        <form action="{{ route('customers.dashboard.basicinfo.store') }}" method="post">
            <div class="row">
                @csrf()
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="ar[name]" class="form-label">Name in Arabic</label>
                        <textarea class="form-control" style="resize: none;" id="ar[name]" name="ar[name]" rows="5">{{ old('ar.name') ?? $customer->translate('ar')->name ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="en[name]" class="form-label">Name in English</label>
                        <textarea class="form-control" style="resize: none;" id="en[name]" name="en[name]" rows="5">{{ old('en.name') ?? $customer->translate('en')->name ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="ar[about]" class="form-label">About in Arabic</label>
                        <textarea class="form-control" style="resize: none;" id="ar[about]" name="ar[about]" rows="5">{{ old('ar.about') ?? $customer->translate('ar')->about ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="en[about]" class="form-label">About in English</label>
                        <textarea class="form-control" style="resize: none;" id="en[about]" name="en[about]" rows="5">{{ old('en.about') ?? $customer->translate('en')->about ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="ar[location]" class="form-label">Location in Arabic</label>
                        <input type="text" name="ar[location]" class="form-control"
                            value="{{ old('ar.location') ?? $customer->translate('ar')->location ?? '' }}"
                            dir="rtl">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="en[location]" class="form-label">Location in English</label>
                        <input type="text" name="en[location]" class="form-control"
                            value="{{ old('en.location') ?? $customer->translate('en')->location ?? '' }}">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group mb-3">
                        <label for="location_link" class="form-label">Location Link</label>
                        <input type="text" name="location_link" class="form-control"
                            value="{{ old('location_link') ?? $customer->location_link ?? '' }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="mobile" class="form-label">Mobile Number</label>
                        <input type="text" name="mobile" class="form-control"
                            value="{{ old('mobile') ?? $customer->mobile ?? '' }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="whatsapp" class="form-label">Whatsapp Number</label>
                        <input type="text" name="whatsapp" class="form-control"
                            value="{{ old('whatsapp') ?? $customer->whatsapp ?? '' }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="land_number" class="form-label">Land Number Number</label>
                        <input type="text" name="land_number" class="form-control"
                            value="{{ old('land_number') ?? $customer->land_number ?? '' }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="sms_number" class="form-label">SMS Number Number</label>
                        <input type="text" name="sms_number" class="form-control"
                            value="{{ old('sms_number') ?? $customer->sms_number ?? '' }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="received_email" class="form-label">Email that receives messages for contact us</label>
                        <input type="email" name="received_email" class="form-control"
                            value="{{ old('received_email') ?? $customer->received_email ?? '' }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email') ?? $customer->email ?? '' }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="website_name" class="form-label">Website Name</label>
                        <input type="text" name="website_name" class="form-control"
                            value="{{ old('website_name') ?? $customer->website_name ?? '' }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" name="website" class="form-control"
                            value="{{ old('website') ?? $customer->website ?? '' }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="ar[services]" class="form-label">Services in Arabic</label>
                        <textarea class="form-control" style="resize: none;" id="ar[services]" name="ar[services]" rows="5" dir="rtl">{{ old('ar.services') ?? $customer->translate('ar')->services ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="en[services]" class="form-label">Services in English</label>
                        <textarea class="form-control" style="resize: none;" id="en[services]" name="en[services]" rows="5">{{ old('en.services') ?? $customer->translate('en')->services ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Change </button>
            </div>
        </form>

    </div>

</div>
@endsection
