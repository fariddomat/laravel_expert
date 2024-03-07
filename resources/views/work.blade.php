@extends('layouts.site' )
@section('title')
{{$work->title}}
@endsection

@section('styles')
<style>
    .blog-content img {
        width: 100% !important;
    }
</style>
@endsection

@section('content')

<div class="blog-home section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-left">
                <h2 class="heading-title">{{$work->title}}</h2>
                <hr class="line line-hr-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="item animate-box" data-animate-effect="fadeInUp">
                    <div class="post-img mb-30">
                        <div class="img"><img src="{{asset($work->image)}}" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cont animate-box" data-animate-effect="fadeInUp">
                    <h3>{{$work->title}}</h3>
                    <p>
                        <b>@lang('work.category'):</b> {{$work->category->name}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cont animate-box blog-content">{!! $work->description !!}</div>
            </div>
        </div>
    </div>
</div>

@endsection