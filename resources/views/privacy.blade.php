@extends('layouts.site')
@section('title', trans('site.privacy'))

@section('scripts')
<script>
    $('#contactFrom').submit(function() {
        $('#btn-submit').prop("disabled", true);
        $('#btn-spinner').show();
        return true;
    });
</script>
@endsection

@section('content')

<!-- Contact Section -->
<div id="contact" class="section-padding" style="background: #fff; padding-top: 100px; padding-left:15px; padding-right: 15px;>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading-title">@lang('site.privacy')</h2>
                <hr class="line line-hr-primary">
            </div>
        </div>
        <div class="row">
            <!-- Contact Info -->
            <div class="col-md-12 mb-4" style="padding-left: 50px; padding-right: 50px">
                @if (app()->getLocale() == 'ar')
               {!! $privacy->ar !!}
               @else
               {!! $privacy->en !!}

               @endif

            </div>

        </div>
    </div>
</div>

@endsection
