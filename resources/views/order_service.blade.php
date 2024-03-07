@extends('layouts.site')
@section('title')
@lang('site.order_now')
@endsection

@section('styles')
    <style>
        .form-control{
            margin-bottom: 15px !important;
        }
    </style>

@endsection

@section('scripts')
<script>
    $('#orderFrom').submit(function() {
        $('#btn-submit').prop("disabled", true);
        $('#btn-spinner').show();
        return true;
    });
</script>
@endsection

@section('content')

<div id="contact" class="section-padding" style="background: #fff; padding-top:100px; padding-left:15px; padding-right:15px">
    <div class="container-fluid">
        <div>
            @include('partials._errors')
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading-title">@lang('site.order_now') {{ $service->title }}</h2>
                <hr class="line line-hr-primary">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form id="orderFrom" method="post" action="{{ route('service.order.store',$service->slug) }}" class="row">
                    @csrf()

                    {{-- HonyBot hidden input Start --}}
                    <input type="hidden" name="username" value="">
                    {{-- HonyBot hidden input End --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="@lang('site.name')" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="@lang('site.email')" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="number" min="0" name="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="@lang('site.mobile')" required>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="message" id="message" cols="30" rows="4" class="form-control"
                                placeholder="@lang('site.message')">{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button id="btn-submit" type="submit"  style="background-color: var(--primary-color-1); color:#fff; padding:8px;">
                                @lang('site.order_now')
                                <span id="btn-spinner" style="display: none;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
