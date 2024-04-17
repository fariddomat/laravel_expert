@extends('dashboard.layouts.app')
@section('title', 'Dashboard Home')
@section('homeActive', 'active')
@section('styles')
    <style>
        .a{
            color:#fff
        }
    </style>
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card-header"> <a href="{{ route('dashboard.team.create') }}">Home</a></div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-inverse" style="background-color: #04364A;">
                            <div class="card-block p-b-0">
                                <div class="btn-group pull-left">
                                    <i class="icon-user"></i>
                                </div>
                                <h4 class="m-b-0">
                                   <a class="a"  href="{{ route('dashboard.blogs.index') }}"> {{ $blogs }}</a>
                                    </h4>
                                <p><a class="a"  href="{{ route('dashboard.blogs.index') }}">المدونات</a> </p>
                            </div>

                        </div>
                    </div>
                    <!--/col-->

                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-inverse" style="background-color: #176B87;">
                            <div class="card-block p-b-0">
                                <button type="button" class="btn btn-transparent active p-a-0 pull-left">
                                    <i class="icon-puzzle"></i>
                                </button>
                                <h4 class="m-b-0"><a class="a"  href="{{ route('dashboard.blogcategories.index') }}">{{ $blogCategories }}</a> </h4>
                                <p><a class="a"  href="{{ route('dashboard.blogcategories.index') }}">تصنيفات المدونات</a> </p>
                            </div>

                        </div>
                    </div>
                    <!--/col-->

                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-inverse" style="background-color: #64CCC5;">
                            <div class="card-block p-b-0">
                                <div class="btn-group pull-left">
                                    <i class="icon-puzzle"></i>
                                </div>
                                <h4 class="m-b-0"><a class="a"  href="{{ route('dashboard.services.index') }}">{{ $services }}</a> </h4>
                                <p><a class="a"  href="{{ route('dashboard.services.index') }}">الخدمات</a> </p>
                            </div>

                        </div>
                    </div>
                    <!--/col-->

                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-inverse" style="background-color: #2E97A7;">
                            <div class="card-block p-b-0">
                                <div class="btn-group pull-left">
                                    <i class="icon-credit-card "></i>
                                </div>
                                <h4 class="m-b-0"><a class="a"  href="{{ route('dashboard.contact-us.index') }}">{{ $contact_us }}</a> </h4>
                                <p><a class="a"  href="{{ route('dashboard.contact-us.index') }}">طلبات التواصل</a> </p>
                            </div>

                        </div>
                    </div>
                    <!--/col-->
                    {{--  --}}
                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-inverse" style="background-color: #610C9F;">
                            <div class="card-block p-b-0">
                                <div class="btn-group pull-left">
                                    <i class="icon-grid "></i>
                                </div>
                                <h4 class="m-b-0">
                                    <a class="a"  href="{{ route('dashboard.workWithUs.index') }}">{{ $workWithUs }}</a>
                                    </h4>
                                <p><a class="a"  href="{{ route('dashboard.workWithUs.index') }}">طلبات العمل</a> </p>
                            </div>

                        </div>
                    </div>
                    <!--/col-->

                    <div class="col-sm-6 col-lg-4">
                        <div class="card card-inverse" style="background-color: #940B92;">
                            <div class="card-block p-b-0">
                                <button type="button" class="btn btn-transparent active p-a-0 pull-left">
                                    <i class="icon-bag "></i>
                                </button>
                                <h4 class="m-b-0"><a class="a"  href="{{ route('dashboard.visitors.index') }}">{{ $visitors }} / {{ $visitors_u }}</a> </h4>
                                <p><a class="a"  href="{{ route('dashboard.visitors.index') }}">زوار الموقع</a> </p>
                            </div>

                        </div>
                    </div>
                    <!--/col-->




            </div>

        </div>
    </div>
@endsection
