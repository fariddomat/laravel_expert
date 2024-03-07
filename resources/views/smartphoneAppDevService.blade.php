@extends('layouts.site' )
@section('title')
{{$service->title}}
@endsection

@section('styles')
<style>
    .service-wrapper {
        width: 100%;
        background: url({{asset('images/emailMarketing/servicedetails-bg.png')}}) no-repeat;
        background-position: top left;
        background-size: 100% auto;
        background-position: 0 0;
    }

    .service-wrapper .service-title {
        width: 82.8947368421%;
        padding-top: 88px;
        display: table;
        margin-bottom: 100px;
    }

    .service-wrapper .service-title .service-icon {
        width: 17.4603174603%;
        display: table-cell;
        text-align: center;
        height: 100%;
        vertical-align: top;
    }

    .service-wrapper .service-title .service-icon img {
        max-width: 119px;
    }

    .service-wrapper .service-title .service-text {
        padding-left: 0;
        padding-right: 3.1746031746%;
        width: 79.3650793651%;
        display: table-cell;
    }

    .service-wrapper .service-title .service-text h1 {
        font-size: 48px;
        line-height: 54px;
        color: #4d5152;
        font-weight: 200;
    }

    .service-wrapper .service-title .service-text h1 span {
        font-weight: 700;
    }

    .service-wrapper .service-title .service-text .paragraph {
        width: 100%;
        display: block;
        margin-top: 30px;
        position: relative;
    }

    .service-wrapper .service-title .service-text .paragraph .pattern-block {
        left: -45px;
        right: auto;
        -moz-transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
        position: absolute;
        top: -70px;
        display: block;
        width: 115px;
        height: 117px;
    }

    .service-wrapper .service-title .service-text .paragraph .pattern-block .bg {
        -moz-border-radius: 50% 50% 50% 18px;
        -webkit-border-radius: 50% 50% 50% 18px;
        border-radius: 50% 50% 50% 18px;
        background: #f9b232;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .service-wrapper .service-title .service-text .paragraph .pattern-block .shadow-effect {
        -moz-border-radius: 50% 50% 50% 18px;
        -webkit-border-radius: 50% 50% 50% 18px;
        border-radius: 50% 50% 50% 18px;
        left: 0;
        width: 85.2173913043%;
        height: 85.4700854701%;
        position: absolute;
        bottom: 0;
        left: 0;
        display: block;
        background: linear-gradient(45deg,rgba(255,255,255,0) 0%,rgba(255,255,255,0.71) 100%);
    }

    .service-wrapper .service-title .service-text .paragraph p {
        font-size: 15px;
        line-height: 24px;
        color: #4d5152;
        position: relative;
        z-index: 6;
    }

    .service-wrapper .service-title:after {
        content: "";
        display: table;
        clear: both;
    }

    .service-wrapper .service-title .service-text .paragraph ul, .service-wrapper .service-title .service-text .paragraph ol {
        margin-right: 18px;
        list-style: initial;
        margin-left: 18px;
    }

    .service-wrapper .service-title .service-text .paragraph ul>li, .service-wrapper .service-title .service-text .paragraph ol>li {
        position: relative;
        z-index: 6;
        font-size: 15px;
        line-height: 24px;
        color: #4d5152;
        margin-top: 10px;
    }

    .subservice-top {
        color: #4d5152;
        padding-bottom: 70px;
        width: 65.7894736842%;
        margin-left: auto;
        margin-right: auto;
        z-index: 1;
        position: relative;
    }

    .service-wrapper .service-blocks {
        width: 65.7894736842%;
        margin: 0 auto;
        position: relative;
    }

    .subservice-top h2 {
        font-size: 32px;
        line-height: 54px;
        font-weight: 700;
    }

    .subservice-top p {
        font-size: 15px;
        line-height: 1.6;
        color: #737373;
    }

    .clearfix:before, .clearfix:after {
        content: "";
        display: table;
    }

    .service-wrapper .service-blocks>ul>li {
        float: right !important;
        -moz-border-radius: 9px;
        -webkit-border-radius: 9px;
        border-radius: 9px;
        background-color: #fff;
        width: 48%;
        margin-bottom: 90px;
        float: left;
        position: relative;
        height: 253px;
        z-index: 1;        
    }

    .service-wrapper .service-blocks>ul>li .service-inner-block {
        transition: opacity .25s linear;
        -moz-border-radius: 9px;
        -webkit-border-radius: 9px;
        border-radius: 9px;
        background: #fff;
        -webkit-box-shadow: 0 0 7px 0 rgb(0 0 0 / 8%);
        -moz-box-shadow: 0 0 7px 0 rgba(0,0,0,.08);
        box-shadow: 0 0 7px 0 rgb(0 0 0 / 8%);
        height: auto;
        display: block;
        width: 100%;
        position: relative;
        z-index: 2;
        padding: 104px 40px 60px;
    }
    .service-wrapper .service-blocks>ul>li:nth-child(1):before {
        left: auto;
        right: -61px;
        -moz-border-radius: 20px 12px 60px 10px;
        -webkit-border-radius: 20px 12px 60px 10px;
        border-radius: 20px 12px 60px 10px;
        content: '';
        width: 103px;
        height: 103px;
        background-color: #37aabd;
        position: absolute;
        top: -43px;       
        z-index: 1;
    }

    .service-wrapper .service-blocks>ul>li .circle {
        position: absolute;
        left: 50%;
        -moz-transform: translate(-50%,0%);
        -o-transform: translate(-50%,0%);
        -ms-transform: translate(-50%,0%);
        -webkit-transform: translate(-50%,0%);
        transform: translate(-50%,0%);
        top: -53px;
        display: table;
        width: 134px;
        height: 134px;
        background: #fff;
        text-align: center;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        -webkit-box-shadow: 0 3px 12px 0 rgb(0 0 0 / 7%);
        -moz-box-shadow: 0 3px 12px 0 rgba(0,0,0,.07);
        box-shadow: 0 3px 12px 0 rgb(0 0 0 / 7%);
        border: 1px solid #ececec;
    }

    .service-wrapper .service-blocks>ul>li .circle .circle-inner {
        display: table-cell;
        vertical-align: middle;
    }

    .service-wrapper .service-blocks>ul>li .circle .web {
        width: 60%;
        margin-left: auto;
        margin-right: auto;
    }

    .service-wrapper .service-blocks>ul>li .service-block-text {
        height: 94px;
        overflow: hidden;
        transition: all .35s ease;
    }

    .service-wrapper .service-blocks>ul>li .service-block-text h6 {
        text-align: center;
        font-size: 22px;
        line-height: 24px;
        color: #4d5152;
        font-weight: 700;
        text-transform: capitalize;
    }

    .service-wrapper .service-blocks>ul>li .service-block-text p {
        padding-top: 20px;
        font-size: 15px;
        color: #4d5152;
        line-height: 22px;
    }

    .servicedots-more {
        text-align: center;
        position: absolute;
        left: 0;
        right: 0;
        bottom: 25px;
        transition: all .35s ease;
        opacity: 1;
    }

    .servicedots-more>i {
        width: 6px;
        height: 6px;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        background-color: #b9b6b6;
    }

    .servicedots-more>span {
        margin-left: 0;
        margin-right: 6px;
        color: #b9b6b6;
        font-size: 12px;
        letter-spacing: 1px;
        display: inline-block;
        vertical-align: middle;
    }

    .servicedots-more>i, .servicedots-more span {
        display: inline-block;
        vertical-align: middle;
        margin-left: 0;
        margin-right: 0;
    }

    .service-wrapper .service-blocks>ul>li:nth-child(2n) {
        margin-left: 0;
        margin-right: 4%;
    }

    .service-wrapper .service-blocks>ul:after {
        content: "";
        display: table;
        clear: both;
    }

    @media screen and (max-width: 550px){
        .service-wrapper .service-blocks>ul>li {
            float: none;
            width: 100%;
            height: auto;
        }
        .service-wrapper .service-blocks>ul>li .service-inner-block {
            padding: 30px;
            padding-top: 90px;
        }
        .service-wrapper .service-blocks>ul>li .circle {
            width: 108px;
            height: 108px;
        }
        .service-wrapper .service-blocks>ul>li .service-block-text {
            height: auto;
        }
        .servicedots-more {
            display: none;
        }
        .service-wrapper .service-blocks>ul>li:nth-child(1):before {
            width: 0px;
            height: 0px;
        }
    }

    @media screen and (max-width: 650px){
        .service-wrapper .service-title .service-icon {
            display: block;
            width: 100%;
        }

        .service-wrapper .service-title {
            display: block;
        }

        .service-wrapper .service-title .service-text .paragraph .pattern-block {
            left: -25px;
        }

        .service-wrapper .service-title .service-text {
            padding-left: 0;
            padding-right: 3.1746031746%;
            width: 100%;
            display: block;
            padding-top: 30px;
        }

    }
    @media screen and (max-width: 790px){
        .service-wrapper .service-blocks>ul>li .service-block-text h6 {
            font-size: 20px;
        }
        .service-wrapper .service-blocks>ul>li .service-block-text p {
            font-size: 14px;
        }
        .servicedots-more {
            bottom: 15px;
        }
    }

    @media screen and (max-width: 1020px){
        .service-wrapper {
            background-image: none;
        }
    }

    @media screen and (max-width: 1140px){
        .service-wrapper .service-title {
            margin-left: auto;
            margin-right: auto;
        }
    }

    .service-wrapper .service-blocks>ul.serviceblocks-hover>li .service-inner-block{
        opacity: 0.5;
    }

    .service-wrapper .service-blocks>ul.serviceblocks-hover>li.servicedetails-active .service-inner-block{
        opacity:1
    }

    .service-wrapper .service-blocks>ul>li.servicedetails-active{
        z-index:2
    }

    .service-wrapper .service-blocks>ul>li.servicedetails-active .service-inner-block{
        -moz-box-shadow:0 0 15px 0 rgba(0,0,0,.1);
        -webkit-box-shadow:0 0 15px 0 rgba(0,0,0,.1);
        box-shadow:0 0 15px 0 rgba(0,0,0,.1)
    }

    .service-wrapper .service-blocks>ul>li.servicedetails-active .servicedots-more{
        opacity:0
    }

    .btn-request-service {
        width: 241px;
        display: block;
        height: 61px;
        position: relative;
        -webkit-transition: .25s;
        -moz-transition: .25s;
        transition: .25s;
    }

    .btn-request-service .bg {
        background: #42D3E8;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0px;
        left: 0px;
        z-index: 3;
        -moz-border-radius: 24px 24px 11px 24px;
        -webkit-border-radius: 24px 24px 11px 24px;
        border-radius: 24px 24px 11px 24px;
    }
    .btn-request-service .shadow {
        width: 80%;
        position: absolute;
        z-index: 2;
        bottom: -1px;
        display: block;
        background: #83EEFF;
        height: 37px;
        left: 50%;
        -webkit-filter: blur(10px);
        -ms-filter: blur(10px);
        filter: blur(10px);
        -moz-transform: translate(-50%, 0%);
        -o-transform: translate(-50%, 0%);
        -ms-transform: translate(-50%, 0%);
        -webkit-transform: translate(-50%, 0%);
        transform: translate(-50%, 0%);
        -webkit-transition: .25s;
        -moz-transition: .25s;
        transition: .25s;
    }
    .btn-request-service a {
        letter-spacing: 0;
        width: 100%;
        display: block;
        line-height: 61px;
        font-size: 17px;
        font-weight: 300;
        text-align: center;
        text-decoration: none;
        color: white;
        position: relative;
        z-index: 3;
        -moz-border-radius: 24px 24px 24px 11px;
        -webkit-border-radius: 24px 24px 24px 11px;
        border-radius: 24px 24px 24px 11px;
        -webkit-transition: .25s;
        -moz-transition: .25s;
        transition: .25s;
    }
    .btn-request-service:hover {
        -webkit-transition: .25s;
        -moz-transition: .25s;
        transition: .25s;
        -moz-transform: scale(1.03);
        -webkit-transform: scale(1.03);
        transform: scale(1.03);
    }

</style>
@endsection

@section('scripts')
<script>
    $(function() {        
			if($(window).width()>550) {
				var servicehover_flag = false;
                jQuery('.service-blocks>ul>li .service-block-text').each(function() {
                    var elm = jQuery(this);
                    elm_height = elm.find('h6').innerHeight() + elm.find('p').innerHeight()+10;
                    if($(window).width()<=1140) {
                        elm_height = elm.find('h6').innerHeight() + elm.find('p').innerHeight()+20;
                    }
                    elm.attr('data-height',elm_height);
                });
                jQuery('.service-inner-block').hover(function () {
                    servicehover_flag = true;
                    jQuery('.service-inner-block').parents('li').removeClass('servicedetails-active');
                    var elm = jQuery(this);
                    var elm_height = elm.find('.service-block-text').attr('data-height');
                    elm.find('.service-block-text').height(elm_height);
                    elm.parents('li').addClass('servicedetails-active');
                    elm.parents('ul').addClass('serviceblocks-hover');
                }, function () {
                    servicehover_flag = false;
                    var elm = jQuery(this);
                    elm.find('.service-block-text').removeAttr('style');
                    //elm.parents('li').removeClass('servicedetails-active');
                    jQuery('.service-blocks ul').removeClass('serviceblocks-hover');
                });
                jQuery('.service-inner-block').on('transitionend webkitTransitionEnd oTransitionEnd', function () {
                    if(servicehover_flag == false) {
                        jQuery('.service-inner-block').parents('li').removeClass('servicedetails-active');
                    }
                });
			}
    });
</script>
@endsection

@section('content')

<div class="blog-home section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="item animate-box" data-animate-effect="fadeInUp">
                    <div class="post-img mb-30">
                        <div class="img"><img src="{{asset( $service->image )}}" alt=""></div>
                    </div>
                    <div class="cont">                        
                    </div>
                    <div>
                        <div class="service-wrapper">
                            <div itemscope="" itemtype="http://schema.org/Service"
                                class="container slide-onload selected animate active">
                                <div class="service-title">
                                    <div class="service-icon">
                                        <img itemprop="image"
                                            src="{{asset('images/smartphoneAppDevService/1.svg')}}"
                                            alt="تطوير المواقع وتطبيقات الموبايل" class="ae-1 fromCenter">
                                    </div>
                                    <div class="service-text">
                                        <h1 class="ae-2 fromBottom">
                                            <span itemprop="name" class="bold">تطوير المواقع وتطبيقات
                                                الموبايل</span><br> داخل السحابة الرقمية
                                        </h1>
                                        <div class="paragraph">
                                            <span class="pattern-block ae-3 fromCenter">
                                                <span class="bg"></span>
                                                <span class="shadow-effect"></span>
                                            </span>
                                            <div class="abc ae-4 fromBottom">
                                                <p><em>لم يعد تطوير موقع إلكتروني أو تطبيق في قطاع الأعمال نوعاً من
                                                        الترف!</em></p>
                                                <p><em>كل شيء من حولنا في السعودية يسبح في بيئة رقمية، تنمو كل يوم بلا
                                                        توقف. فقطاعات الأعمال متنوعة&nbsp; النشاطات، ونظيرتها الحكومية،
                                                        وحتى الأفراد، يعملون في بيئة تكاد تخلو من الورق.&nbsp;مع السحابة
                                                        الرقمية، صار بالإمكان تطوير الموقع الإلكتروني أو التطبيق&nbsp;
                                                        بكل سهولة،&nbsp; مع الاستفادة أيضًا من قيمة مضافة، هي خبرتنا مع
                                                        شركات سعودية من مختلف الأحجام. &nbsp;قد يكون لديك فكرة مجنونة،
                                                        ولكنك إذا لم تنفذها بالشكل الصحيح، فإن الموقع الإلكتروني أو
                                                        التطبيق قد يقودك إلى نتائج صعبة، في أكثر الأحيان!&nbsp;لذلك،
                                                        نقدم لك خلاصة كفاءات فريق الإبداع التقني، يجلسون معك، تطرح معهم
                                                        ما تشاء، ويدخلون معك في أدق التفاصيل ، ويبدعون الأفكار التي تقرأ
                                                        إحساس الجمهور وتملأ عنده نقصًا في مجال ما أو تمنحه خيارًا
                                                        تنافسيًا يجعل حياته أسهل.&nbsp;</em><em><span dir="RTL">ومهما
                                                            كان نظام التشغيل أو لغة البرمجة، فإننا فريقنا حاضر بالمعرفة
                                                            العميقة والتنفيذ الاحترافي.</span></em></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-blocks">
                                    <ul class="">
                                        <li class="">
                                            <div class="service-inner-block">
                                                <div class="circle">
                                                    <div class="circle-inner">
                                                        <img class="web" src="{{asset('images/smartphoneAppDevService/2.svg')}}"
                                                            alt="اختبار قابلية الاختراق">
                                                    </div>
                                                </div>
                                                <div class="service-block-text" data-height="252">
                                                    <h6>اختبار قابلية الاختراق</h6>
                                                    <p>يقوم خبراء أمن المعلومات لدينا بتنفيذ اختبارات المحاكاة لفحص
                                                        قدرات الدفاع في حال حصول هجوم إلكتروني. ويمكننا تخصيص هذه الخدمة
                                                        بعدة خيارات اختبارات: قابلية الاختراق لنظام التشغيل ونقاط الضعف,
                                                        اختبارات قابلية الاختراق من جانب العميل من أجل تقييم مدى تعرض
                                                        المستخدم النهائي للمخاطر, اختبار .اختراق التطبيقات, اختبار
                                                        الاختراق اللاسلكي.</p>
                                                </div>
                                                <div class="servicedots-more">
                                                    <i></i>
                                                    <i></i>
                                                    <i></i>
                                                    <span>المزيد</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="service-inner-block">
                                                <div class="circle">
                                                    <div class="circle-inner">
                                                        <img class="web" src="{{asset('images/smartphoneAppDevService/3.svg')}}"
                                                            alt="الحماية المتقدمة من المخاطر">
                                                    </div>
                                                </div>
                                                <div class="service-block-text" data-height="208">
                                                    <h6>الحماية المتقدمة من المخاطر</h6>
                                                    <p>تركز هذه الخدمة على حماية المنشأة من المخاطر المتطورة واكتشاف
                                                        البرمجيات الضارة المعقدة.
                                                        ويمكننا تخصيص هذه الخدمة بعدة خيارات تشمل الحماية من المخاطر
                                                        المتطورة والمستمرة, الفيروسات وبرامج التجسس, البرامج الضارة
                                                        المعقدة, قرصنة حسابات وسائل التواصل الاجتماعي.</p>
                                                </div>
                                                <div class="servicedots-more">
                                                    <i></i>
                                                    <i></i>
                                                    <i></i>
                                                    <span>المزيد</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="service-inner-block">
                                                <div class="circle">
                                                    <div class="circle-inner">
                                                        <img class="web" src="{{asset('images/smartphoneAppDevService/4.svg')}}"
                                                            alt="الاستجابة الفورية للحوادث التقنية وبصمة الموقع">
                                                    </div>
                                                </div>
                                                <div class="service-block-text" data-height="232">
                                                    <h6>الاستجابة الفورية للحوادث التقنية وبصمة الموقع</h6>
                                                    <p>صحيح أنه لا يمكن منع جميع الحوادث التقنية قبل حدوثها، إلا أن
                                                        خبراء الحماية لدينا يستجيبون فوراً للحد من الأضرار وأوقات التعطل
                                                        عن عمل الموقع أو التطبيق عند وقوع هجوم إلكتروني. ولدينا مجموعة
                                                        من الخطوات الاستباقية الشاملة للمساعدة على الحماية والاستكشاف
                                                        والتصحيح والتكيف.</p>
                                                </div>
                                                <div class="servicedots-more">
                                                    <i></i>
                                                    <i></i>
                                                    <i></i>
                                                    <span>المزيد</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="service-inner-block">
                                                <div class="circle">
                                                    <div class="circle-inner">
                                                        <img class="web" src="{{asset('images/smartphoneAppDevService/5.svg')}}"
                                                            alt="ضمان الجودة بأعلى المعايير">
                                                    </div>
                                                </div>
                                                <div class="service-block-text" data-height="208">
                                                    <h6>ضمان الجودة بأعلى المعايير</h6>
                                                    <p>يخضع الموقع الإلكتروني أو التطبيق إلى سلسلة من الاختبارات لضمان
                                                        إطلاق المنتج التقني بنجاح بنسبة 100%. ويمكننا تخصيص هذه الخدمة
                                                        بعدة خيارات لتشمل: إصدار تقرير حول عمل التطبيق عبر مختلف أساليب
                                                        التصفح, فحص الوظائف المتقدمة, فحص استمرار الوظائف والتشغيل
                                                        الداخلي.</p>
                                                </div>
                                                <div class="servicedots-more">
                                                    <i></i>
                                                    <i></i>
                                                    <i></i>
                                                    <span>المزيد</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="service-inner-block">
                                                <div class="circle">
                                                    <div class="circle-inner">
                                                        <img class="web" src="{{asset('images/smartphoneAppDevService/6.svg')}}"
                                                            alt="تكامل خدمة &quot;البرمجيات بوصفها خدمات&quot; وقاعدة البيانات المحلية">
                                                    </div>
                                                </div>
                                                <div class="service-block-text" data-height="256">
                                                    <h6>تكامل خدمة "البرمجيات بوصفها خدمات" وقاعدة البيانات المحلية</h6>
                                                    <p>تهدف هذه الخدمة إلى مواكبة متطلبات نمو المستخدمين والأعمال.
                                                        ويمكننا تخصيص هذه الخدمة بعدة خيارات لتشمل: ربط جميع تطبيقات
                                                        البرامج, ربط مصادر المعلومات وربطها بالتطبيقات, تبادل البيانات
                                                        والمعلومات مع مزودي الخدمات والشركاء على أساس الوقت الحقيقي.</p>
                                                </div>
                                                <div class="servicedots-more">
                                                    <i></i>
                                                    <i></i>
                                                    <i></i>
                                                    <span>المزيد</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="service-inner-block">
                                                <div class="circle">
                                                    <div class="circle-inner">
                                                        <img class="web" src="{{asset('images/smartphoneAppDevService/7.svg')}}"
                                                            alt="نظام إدارة قواعد البيانات وتكامل البيانات العملاقة">
                                                    </div>
                                                </div>
                                                <div class="service-block-text" data-height="276">
                                                    <h6>نظام إدارة قواعد البيانات وتكامل البيانات العملاقة</h6>
                                                    <p>نضمن لك عبر هذه الخدمة أعلى مستويات الوصول إلى البيانات للمزيد من
                                                        الذكاء الصطناعي وتحليل البيانات العملاقة للتطبيقات. ويمكننا
                                                        تخصيص هذه الخدمة بعدة خيارات لتشمل: استخراج وتحويل وتنظيف وتحميل
                                                        وتكامل البيانات, هجرة البيانات ونسخها, هجرة البيانات بين النظام
                                                        غير المتجانس ونظام إدارة قواعد البيانات غير المتجانس.</p>
                                                </div>
                                                <div class="servicedots-more">
                                                    <i></i>
                                                    <i></i>
                                                    <i></i>
                                                    <span>المزيد</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="service-inner-block">
                                                <div class="circle">
                                                    <div class="circle-inner">
                                                        <img class="web" src="{{asset('images/smartphoneAppDevService/8.svg')}}"
                                                            alt="البحث">
                                                    </div>
                                                </div>
                                                <div class="service-block-text" data-height="296">
                                                    <h6>البحث</h6>
                                                    <p>يبدأ التصميم الذي يركز على المستخدم عبر تحديد الأهداف، عبر وصع
                                                        أسس الاستراتيجية والتصميم والمحتوى وهندسة ترتيب المعلومات. فخلال
                                                        مرحلة البحث، نساعدك على اكتشاف فجوات المعرفة بالمستخدم وربطها
                                                        بتوقعات المستخدم الحقيقية. وبذلك، تدعم استراتيجيتك حاجات
                                                        المستخدمين، وفي الوقت نفسه، أهداف العمل. إن الاتجاه التحليلي
                                                        المستند إلى البحث يقدم رؤية استراتيجية عميقة حول ردود أفعال
                                                        المستخدمين وطريقة تفاعلهم مع التطبيق أو الموقع الإلكتروني.</p>
                                                </div>
                                                <div class="servicedots-more">
                                                    <i></i>
                                                    <i></i>
                                                    <i></i>
                                                    <span>المزيد</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="service-inner-block">
                                                <div class="circle">
                                                    <div class="circle-inner">
                                                        <img class="web" src="{{asset('images/smartphoneAppDevService/9.svg')}}"
                                                            alt="اختبار تجربة المستخدم">
                                                    </div>
                                                </div>
                                                <div class="service-block-text" data-height="252">
                                                    <h6>اختبار تجربة المستخدم</h6>
                                                    <p>نساعدك على وضع مؤشرات الأداء الرئيسي (kpi) الصحيحة من خلال جلسات
                                                        اختبار تجربة المستخدم وتنفيذ تحليلات تفصيلية لتحويل البيانات إلى
                                                        تحسينات في التصميم.
                                                        نستخدم العديد من الطرق لجمع الآراء المتنوعة بين اختبار تجربة
                                                        المستخدم البعيد وجلسات الاختبار الفردية. ستحصل دائماً على تجربة
                                                        المستخدم المثلى للتطبيق أو الموقع الإلكتروني.</p>
                                                </div>
                                                <div class="servicedots-more">
                                                    <i></i>
                                                    <i></i>
                                                    <i></i>
                                                    <span>المزيد</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="service-inner-block">
                                                <div class="circle">
                                                    <div class="circle-inner">
                                                        <img class="web" src="{{asset('images/smartphoneAppDevService/10.png')}}"
                                                            alt="مظهر التصميم">
                                                    </div>
                                                </div>
                                                <div class="service-block-text" data-height="186">
                                                    <h6>مظهر التصميم</h6>
                                                    <p>مظهر المنتج التقني له تأثير هائل على المستخدمين. ورغم أهمية هندسة
                                                        ترتيب المعلومات، إلا أنها لا تكفي لتعزيز التفاعل. يعمل التصميم
                                                        المستند إلى المستخدم على إنتاج التأثير الشامل والمطلوب ضمن
                                                        الجمهور المستهدف.</p>
                                                </div>
                                                <div class="servicedots-more">
                                                    <i></i>
                                                    <i></i>
                                                    <i></i>
                                                    <span>المزيد</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="service-inner-block">
                                                <div class="circle">
                                                    <div class="circle-inner">
                                                        <img class="web" src="{{asset('images/smartphoneAppDevService/11.svg')}}"
                                                            alt="تطوير أكواد الواجهة النهائية">
                                                    </div>
                                                </div>
                                                <div class="service-block-text" data-height="230">
                                                    <h6>تطوير أكواد الواجهة النهائية</h6>
                                                    <p>الواجهة النهائية هي أول ما يتفاعل معه المستخدم. ولذا، فإننا نتأكد
                                                        دائماً أن التطبيق يماثل التصميم الأصلي بالضبط. ومن خلال أحدث
                                                        التقنيات، كن على ثقة بأن التصميم تجري ترجمته بالضبط إلى أكواد
                                                        التفعيل على مستوى كل "بيكسل". نحن نستخدم الأكواد بدقة تضمن
                                                        التطابق مع المعايير العالمية التي تدعم التكامل مع النظام النهائي
                                                    </p>
                                                </div>
                                                <div class="servicedots-more">
                                                    <i></i>
                                                    <i></i>
                                                    <i></i>
                                                    <span>المزيد</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="service-inner-block">
                                                <div class="circle">
                                                    <div class="circle-inner">
                                                        <img class="web" src="{{asset('images/smartphoneAppDevService/12.svg')}}"
                                                            alt="دعم التكامل">
                                                    </div>
                                                </div>
                                                <div class="service-block-text" data-height="164">
                                                    <h6>دعم التكامل</h6>
                                                    <p>نقدم لكم ضماناً لمدة 60 يوماً على التصاميم والأكواد المستخدمة،
                                                        وذلك من أجل اكتشاف أية عيوب، في حال وجودها. ونقدم الدعم التقني
                                                        أيضاً والمساعدة خلال فترة التكامل النهائي من أجل تجربة خالية من
                                                        القلق.</p>
                                                </div>
                                                <div class="servicedots-more">
                                                    <i></i>
                                                    <i></i>
                                                    <i></i>
                                                    <span>المزيد</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="" style="z-index: 5;">
                                            <div class="service-inner-block">
                                                <div class="circle">
                                                    <div class="circle-inner">
                                                        <img class="web" src="{{asset('images/smartphoneAppDevService/13.svg')}}"
                                                            alt="تطوير المواقع">
                                                    </div>
                                                </div>
                                                <div class="service-block-text" data-height="428">
                                                    <h6>تطوير المواقع</h6>
                                                    <p>ما من شك أن الموقع الإلكتروني هو جزء أساسي ضمن خطتك التسويقية.
                                                        إنه مركز إصدار رسائلك الموجهة، وينبغي أن يحتوي على المواد
                                                        التسويقية المطلوبة. ومع تطور تقنيات الويب، فهناك العديد من
                                                        الادوات التي يمكن استخدامها بالتوازي مع الجهود التسويقية
                                                        المبذولة مثل وسائل التواصل الاجتماعي والمدونات وتغذية rss
                                                        وغيرها.
                                                        إن الاستفادة من تلك الموارد والالتزام بممارسات الويب الفعالة،
                                                        يجعلان من السحابة الرقمية أفضل ,الخيارات المتاحة لتلبية حاجاتك.
                                                        باقة خدمات تطوير المواقع الإلكترونية: واجهة المستخدم وتصميم
                                                        الويب التطوير باستخدام html/css, تصميم المدونات وتكامل تغذية rss
                                                        ,تكامل وسائل التواصل الاجتماعي, تطوير المحتوى, صيانة المواقع
                                                        الإلكترونية, تطوير المواقع الإلكترونية الخاصة بالجوال والأجهزة
                                                        اللوحية.</p>
                                                </div>
                                                <div class="servicedots-more">
                                                    <i></i>
                                                    <i></i>
                                                    <i></i>
                                                    <span>المزيد</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <div class="btn-request-service m-auto">
                            <div class="bg"></div>
                            <div class="shadow"></div>
                            <a href="{{route('service.order', $service->slug )}}">@lang('site.order_now')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection