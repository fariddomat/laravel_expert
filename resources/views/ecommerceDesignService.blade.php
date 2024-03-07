@extends('layouts.site' )
@section('title')
{{$service->title}}
@endsection

@section('styles')
<style>
    .custom-card {
        box-sizing: border-box;
        height: 685px;
        border: 1.5px solid rgba(153, 178, 195, 0.23);
        border-radius: 24px;
        background-color: #FFFFFF;
        text-align: center;
        position: relative;
        -webkit-transition: all 0.6s;
        transition: all 0.6s;
        cursor: pointer;
    }

    .custom-card:hover {
        box-shadow: 0 20px 20px #0000001c;
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

    .custom-card:before {
        content: '';
        position: absolute;
        width: 88px;
        height: 88px;
        top: -63px;
        right: 0;
        left: 0;
        margin: auto;
    }

    .custom-card.basic-package:before {
        background: url({{asset('images/main-package.svg')}});
    }

    .custom-card:hover .custom-card-header {
        background-color: #F5FCFF;
        color: #29A9DF;
        margin: 0;
        border-bottom-width: 1 px;
    }

    .custom-card-header {
        box-sizing: border-box;
        border-bottom: 1.5px solid rgba(153,178,195,0.23);
        padding: 40px 18px 6px;
        margin: 0 18px;
        color: #333333;
        font-size: 30px;
        font-weight: 500;
        letter-spacing: 0;
        -webkit-transition: all 0.6s;
        transition: all 0.6s;
        border-radius: 24px 24px 0 0;
    }

    .custom-card-body {
        padding: 40px 0 30px;
    }

    .list-unstyled {
        padding-right: 0;
        list-style: none;
    }

    .custom-card-body .custom-feature-list li {
        padding: 0 18px;
        min-height: 40px;
        display: -webkit-box;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        font-size: 17px;
        font-weight: 500;
        position: relative;
    }

    .custom-card-footer {
        padding-bottom: 50px;
    }

    .custom-card-link {
        color: #99B2C3 !important;
        font-size: 28px;
        font-weight: 500;
        letter-spacing: 0;
        text-align: center;
        border: 1.5px solid rgba(153,178,195,0.23);
        border-radius: 7px;
        background-color: #FFFFFF;
        display: inline-block;
        padding: 5px 15px;
        min-width: 200px;
        -webkit-transition: all 0.6s;
        transition: all 0.6s;
    }

    .custom-card:hover .custom-card-link {
        background-color: #29A9DF;
        color: #ffffff !important;
    }

</style>
@endsection

@section('content')
<div class="blog-home section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="item animate-box" data-animate-effect="fadeInUp">
                    <div class="mt-5 mb-5">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-md-4 custom-package-block">
                                    <div class="custom-card basic-package">
                                        <div class="custom-card-header">
                                            <div class="child-wrapper">باقة متجري بيسك</div>
                                        </div>
                                        <div class="custom-card-body">
                                            <ul class="custom-feature-list list-unstyled">
                                                <li class="products--services">
                                                    <span class="custom-label"></span>
                                                    <div class="service-label">
                                                        <span class="custom-value">اختيار الاسم التجاري</span>
                                                        <span class="custom-icon info-icon"></span>
                                                    </div>
                                                </li>
                                                <li class="requests-limit">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">انشاء الشعار التجاري LOGO ( 3 نماذج )</span>
                                                </li>
                                                <li class="rate-limit">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">انشاء متجر الكتروني  واتمام عمليات التسجيل في منصة سلة او زد</span>
                                                </li>
                                                <li class="payment">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">تصميم  عدد 3 بانرات عرض</span>
                                                </li>
                                                <li class="documentation">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">رفع  عدد 50 منتج  في الموقع مع الوصف المناسب</span>
                                                </li>
                    
                                                <li class="account-manager">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-icon no-icon">2,000<sub>SAR</sub></span>
                                                </li>
                                                <li class="support--sla">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-icon no-icon"></span>
                                                </li>                                                
                                            </ul>
                                        </div>
                                        <div class="custom-card-footer" style="padding-top: 126px;">
                                            <a href="https://api.whatsapp.com/message/G63NFOEPKFFDG1" target="_blank" class="custom-card-link">
                                                ابدأ الآن
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4  mt-5 mt-md-0 custom-package-block">
                                    <div class="custom-card basic-package">
                                        <div class="custom-card-header">
                                            <div class="child-wrapper">باقة متجري بلس</div>
                                        </div>
                                        <div class="custom-card-body">
                                            <ul class="custom-feature-list list-unstyled">
                                                <li class="products--services">
                                                    <span class="custom-label"></span>
                                                    <div class="service-label">
                                                        <span class="custom-value">اختيار الاسم التجاري</span>
                                                        <span class="custom-icon info-icon"></span>
                                                    </div>
                                                </li>
                                                <li class="requests-limit">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">انشاء الشعار التجاري (3  نماذج )</span>
                                                </li>
                                                <li class="rate-limit">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">انشاء متجر الكتروني  واتمام عمليات التسجيل في منصة سلة او زد</span>
                                                </li>
                                                <li class="payment">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">تصميم  عدد 6  بانرات عرض</span>
                                                </li>
                                                <li class="documentation">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">رفع  عدد 500  منتج  في الموقع مع الوصف المناسب</span>
                                                </li>
                                                <li class="documentation">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">ربط الموقع  بخدمات web master tools ( فيس بوك بيكسل  - سناب بكسل  - تيك توك بيكسل  - جوجل انالتيكس  )</span>
                                                </li>
                                                <li class="documentation">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">دعم فني لمدة شهر</span>
                                                </li>
                                                <li class="documentation">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">3,800<sub>SAR</sub></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="custom-card-footer" style="padding-top: 42px;">
                                            <a href="https://api.whatsapp.com/message/G63NFOEPKFFDG1" target="_blank" class="custom-card-link">
                                                ابدأ الآن
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4  mt-5 mt-md-0 custom-package-block">
                                    <div class="custom-card basic-package">
                                        <div class="custom-card-header">
                                            <div class="child-wrapper">باقة متجري برو</div>
                                        </div>
                                        <div class="custom-card-body" style="padding-bottom: 0;">
                                            <ul class="custom-feature-list list-unstyled">
                                                <li class="products--services">
                                                    <span class="custom-label"></span>
                                                    <div class="service-label">
                                                        <span class="custom-value">اختيار الاسم التجاري  و انشاء الشعار logo (5  نماذج )</span>
                                                        <span class="custom-icon info-icon"></span>
                                                    </div>
                                                </li>
                                                <li class="requests-limit">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">انشاء المتجر الكتروني  واتمام عمليات التسجيل في منصة سلة او زد</span>
                                                </li>
                                                <li class="rate-limit">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">انشاء حساب في منصة مخازن وربطها بالمتجر الالكتروني</span>
                                                </li>
                                                <li class="payment">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">تصميم  عدد 10  بانرات عرض</span>
                                                </li>
                                                <li class="documentation">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">رفع  عدد 1000  منتج  في الموقع مع الوصف المناسب</span>
                                                </li>
                                                <li class="account-manager">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">ربط الموقع  بخدمات web master tools ( فيس بوك بيكسل  - سناب بكسل  - تيك توك بيكسل  - جوجل انالتيكس  )</span>
                                                </li>
                                                <li class="support--sla">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">باقة  التسويق للمتاجر لمدة شهر</span>
                                                </li>
                                                <li class="support--sla">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">دعم فني لمدة شهر</span>
                                                </li>
                                                <li class="support--sla">
                                                    <span class="custom-label"></span>
                                                    <span class="custom-value">5,999<sub>SAR</sub></span>
                                                </li>                                                
                                            </ul>
                                        </div>
                                        <div class="custom-card-footer">
                                            <a href="https://api.whatsapp.com/message/G63NFOEPKFFDG1" target="_blank" class="custom-card-link">
                                                ابدأ الآن
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <h3 class="title">اكتشف تفاصيل أكثر عن خدمة متجري</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cont">
                        <h3>{{$service->title}}</h3>
                        <div>{!!$service->description!!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

@endsection