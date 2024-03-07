@extends('dashboard.layouts.app')
@section('title', 'SMS Order Service')
@section('smsServiceActive', 'active')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">SMS Order Service</div>
</div>
<div>
    @include('partials._errors')
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="card-block">
            <form action="{{ route('dashboard.sms.service.store') }}" method="post">
                @csrf()
                <div class="form-group mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" style="resize: none;" id="body" name="body" rows="5" dir="rtl">{{ $sms->body }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="admin_number" class="form-label">Admin number</label>
                    <input type="text" name="admin_number" class="form-control" value="{{ $sms->admin_number }}">
                </div>
                <div class="form-group mb-3">
                    <label for="admin_message" class="form-label">Admin message</label>
                    <textarea class="form-control" style="resize: none;" id="admin_message" name="admin_message" rows="5">{{ $sms->admin_message }}</textarea>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="status" name="status" {{ $sms->status  == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="status">
                        Enable
                    </label>
                </div>
                <hr>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="globalStatus" name="globalStatus" {{ $globalSms->status  == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="globalStatus">
                        Global SMS Enable
                    </label>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Save </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
