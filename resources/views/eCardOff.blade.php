@extends('layouts.site')
@section('title', trans('site.e_card_off'))

@section('content')

<div class="section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading-title">الكرت الالكتروني</h2>
                <hr class="line line-hr-primary">
            </div>
            <div class="col-md-12">
                <p>
                    هذا الكرت الالكتروني غير متاح حاليا لمزيد من المعلومات نرجو التواصل مع ادارة الموقع
                </p>
                <p>
                    <i class="fa fa-globe"></i>
                    <a href="{{route('home')}}" target="_blank">https://www.digitsmark.com</a>
                    <br>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:info@digitsmark.com">info@digitsmark.com</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection