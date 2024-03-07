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
                        <h3>{{$service->title}}</h3>
                        <div>{!!$service->description!!}</div>
                    </div>
                    <div>
                        <div class="service-wrapper">
                            <div itemscope="" itemtype="http://schema.org/Service"
                                class="container slide-onload selected animate active">
                                <div class="service-title">
                                    <div class="service-icon">
                                        <img itemprop="image"
                                            src="{{asset('images/emailMarketing/1.svg')}}"
                                            alt="التسويق الرقمي" class="ae-1 fromCenter">
                                    </div>
                                    <div class="service-text">
                                        <h1 class="ae-2 fromBottom">
                                            <span itemprop="name" class="bold">التسويق الرقمي</span><br> مع السحابة
                                            الرقمية
                                        </h1>
                                        <div class="paragraph">
                                            <span class="pattern-block ae-3 fromCenter">
                                                <span class="bg d-none d-md-block"></span>
                                                <span class="shadow-effect"></span>
                                            </span>
                                            <div class="abc ae-4 fromBottom">
                                                <p><em>إنه بكل بساطة التسويق عبر المنصات الرقمية!</em></p>
                                                <p><em>يمتاز التسويق الرقمي بأنه يمتلك القنوات والطرق والأدوات التي تتيح
                                                        لأي منشأة تسويق منتجاتها أو علامتها التجارية بقدرة كاملة على
                                                        تحليل حملات التسويق وفهم ما يصلح للجمهور قبل وأثناء وبعد إطلاق
                                                        الحملة. &nbsp;فالمسوقون الرقميون في السحابة الرقمية ينتجون
                                                        المحتوى ويراقبون ما يشاهده الجمهور وعدد المشاهدات ومدتها، إلى
                                                        جانب تحول السلوك الاستهلاكي ونوعية المحتوى الملائم. &nbsp;وفي
                                                        الوقت الذي يعتبر فيه الإنترنت عمود خيمة التسويق الرقمي، هناك
                                                        وسائل أخرى تشمل الرسائل النصية المباشرة واللوحات الإعلانية
                                                        الإلكترونية والتطبيقات.</em></p>
                                                <p><em>لماذا يهمك التسويق الرقمي؟</em></p>
                                                <p><em>وصل انتشار وسائل التواصل الاجتماعي إلى حد أصبح للمستهلك حرية
                                                        الوصول إلى المعلومات من مصادر متعددة في أي وقت وأي
                                                        مكان&nbsp;فصار بإمكان إي شخص متابعة ماتقدمه علامة تجارية ما في
                                                        السعودية، بينما هو في فرنسا أو الولايات المتحدة، ومقارنة الأداء
                                                        والعروض وخدمات العملاء بلمسة واحدة على شاشة الهاتف
                                                        الذكي.&nbsp;إن نمو وسائل التواصل الاجتماعي جعل منها مصدر الترفيه
                                                        والأخبار والتسوق والتفاعل مع الأشخاص وصناعة الرأي العام. ولم يعد
                                                        المستهلكون يتعرضون فقط لما تطرحه من محتوى عن شركتك أو منتجك،
                                                        فهناك الأصدقاء والمغردون والجهات الحكومية واختصاصيو التقييمات
                                                        وأصحاب التأثير من قادة الرأي وغيرهم.&nbsp;وهنا تبرز قيمة المحتوى
                                                        والمادة المرئية التي تقدمها، ومدى مصداقيتها وقدرتها على إحداث
                                                        التغيير المطلوب، و تحسين الصورة الذهنية والحفاظ على القاعدة
                                                        الاستهلاكية ونموها.&nbsp;وصار المستهلكون يفضلون العلامات
                                                        التجارية التي يثقون بها، وتقدم لهم أسلوباً مميزاً في التعريف
                                                        بالعلامة التجارية والتواصل والرد على تساؤلاتهم، إلى جانب العروض
                                                        القادرة على لفت الانتباه.</em></p>
                                                <p><em>ماذا تقدم السحابة الرقمية في التسويق الرقمية؟</em></p>
                                                <p><em>تقدم السحابة الرقمية سلسلة من الخدمات المتفوقة في الشكل والمضمون
                                                        والأداء.</em></p>
                                                <ul>
                                                    <li><em>إدارة وسائل التواصل الاجتماعي على مدار الساعة</em></li>
                                                    <li><em>إنشاء المحتوى</em></li>
                                                    <li><em>الاستماع الاجتماعي</em></li>
                                                    <li><em>الحملات</em></li>
                                                    <li><em>إصدار التقارير</em></li>
                                                </ul>
                                                <p><em>جميع تلك الخدمات ينفذها فريق احترافي من الاختصاصيين، تجتمع
                                                        خبراتهم في مجالات إنشاء وتحليل المحتوى والتصميم والتسويق.</em>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-service">
                                    <div class="subservice-top">
                                        <h2 class="ae-2 fromBottom">الحملات التسويقية</h2>
                                        <p>نقدم لك حملة تسويقية تستند إلى التخطيط السليم والمعرفة بمعطيات السوق ! كلما
                                            كانت أهداف الحملة محددة، فإنها ستمنحك التأثير المطلوب والفعالية أثناء
                                            التنفيذ. نحن في السحابة الرقمية، لدينا فريق متكامل من خبراء التسويق والشبكات
                                            الاجتماعية، لنصمم لك حملات التسويق الرقمي التي تواكب استراتيجيتك العامة
                                            للتسويق.
                                        </p>
                                    </div>
                                    <div class="service-blocks">
                                        <ul class="clearfix pl-0">
                                            <li class="">
                                                <div class="service-inner-block">
                                                    <div class="circle">
                                                        <div class="circle-inner">
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/2.svg')}}"
                                                                alt="تحديد الموضوع ورسم الأهداف">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="315">
                                                        <h6>تحديد الموضوع ورسم الأهداف</h6>
                                                        <p>كلما كان التركيز أكبر على تحديد موضوع الحملة، صار رسم الأهداف
                                                            المتوقعة أكثر وضوحاً، وبالتالي فإن قياس النتائج يصبح أكثر
                                                            سهولة. نقدم لك خارطة طريق متكاملة لتحديد الأهداف بكفاءة. ومن
                                                            أجل ذلك، نوظف مفهوم smart ، الذي يعني أن أهدافك محددة وقابلة
                                                            للقياس ويمكن تحقيقها ومرتبطة باستراتيجيتك ضمن توقيت محدد.
                                                            وهكذا، نوجه كل جهودنا نحو وسائل التواصل الاجتماعي لتحقيق
                                                            أهداف العلامة التجارية من حيث زيادة زاور الموقع الموقع
                                                            الإلكتروني والتفاعل عبر إعادة التغريد والمشاركة والتعليقات.
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
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/3.svg')}}"
                                                                alt="تقييم الوضع الحالي على وسائل التواصل">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="275">
                                                        <h6>تقييم الوضع الحالي على وسائل التواصل</h6>
                                                        <p>مع كل حملة جديدة تنوي إطلاقها، هناك حاجة إلى تقييم وسائل
                                                            التواصل الاجتماعي وكيفية توظيفها لصالح العلامة التجارية.
                                                            ويتطلب ذلك معرفة الجمهور وتحديده، ومقارنة حضورك على وسائل
                                                            التواصل بالمنافسين. وقد طور فريق السحابة الرقمية نماذج تقييم
                                                            لتلائم مجموعة واسعة من العلامات التجارية.
                                                            وبعد إجراء التقييم، سيكون لديك فكرة واضحة عن كل حساب يمثلك
                                                            في منصات التواصل الاجتماعي.</p>
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
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/4.svg')}}"
                                                                alt="إنشاء خطة المحتوى والتقويم">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="475">
                                                        <h6>إنشاء خطة المحتوى والتقويم</h6>
                                                        <p>المحتوى الرائع أمر أساسي لتحقيق النجاح والتفوق على وسائل
                                                            التواصل الاجتماعي. وهناك مجموعة من العناصر التي تقود خطتك
                                                            إلى الهدف المطلوب:طبيعة المحتوى الذي تريد أن تقدمه , استخدام
                                                            الإعلان لتعزيز الحملة ومدى تكرارها, مدى تكرار وعدد مرات نشر
                                                            المحتوى, تحديد الجمهور المستهدف بكل .محتوىإن تحضير التقويم
                                                            الملائم للمحتوى، وتحضير الرسائل ومراجعتها بشكل مسبق هو أمر
                                                            نرتبه معك في كل حملة قبل إطلاقها، وذلك لضمان التواصل السلس
                                                            والبناء والمدروس. وبالطبع، فإن كل منصة تواصل اجتماعي لها
                                                            معايير محددة وشروط يجب الالتزام بها؛ حتى لو أردت إيصال
                                                            الرسالة نفسها. ولذا، نحن نكيّف المحتوى الموجود في التقويم
                                                            بما يلائم كل وسيلة تواصل. وسواء كنت على موقع لينكد إنالذي
                                                            يستدعي وجود مقدمة للمحتوى أو الرسائل ذات الـ140 حرفاً على
                                                            تويتر أو سياسة 80%-20% على فيسبوك، ستصل رسائلك على النحو
                                                            المطلوب.</p>
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
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/5.svg')}}"
                                                                alt="الاختبار والقياس">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="250">
                                                        <h6>الاختبار والقياس</h6>
                                                        <p>في كل حملة نطلقها وننفذها، نضع بين يديك إمكانات الاختبار
                                                            والقياس في كل خطوة تقوم بها على وسائل التواصل الاجتماعي.
                                                            بإمكانك تتبع الروابط التي تضعها عبر استخدام "اختصارات
                                                            المواقع، إلى جانب مجموعة من أدوات التحليل لقياس النجاح
                                                            ومقدار الوصول للحملة، وبالتأكيد جوانب الأداء غير الناجح.
                                                            وبالتالي، يمكنك تعزيز الأداء الكلي لعلامتك التجارية على
                                                            الشبكات الاجتماعية.</p>
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
                                <div class="sub-service">
                                    <div class="subservice-top">
                                        <h2 class="ae-2 fromBottom">الاستماع الاجتماعي</h2>
                                        <p>تعبر وسائل التواصل الاجتماعي عن حالة من التفاعل المستمر بين المستهلك والعلامة
                                            التجارية. ولذلك، فإن فريق إدارة وسائل التواصل يستمع إلى المستخدمين ويتابع
                                            مقاييس التواصل الاجتماعي على أساس منتظم من خلال: الحديث المباشر مع
                                            المستخدمين عبر منصات التواصل الاجتماعي, طلب أراء المستخدمين مباشرة أو عبر
                                            الاستبيانات, قياس أداء العلامة التجارية عبر أدوات تحليل منصات التواصل
                                            الاجتماعي, مراقبة الحضور الإلكتروني للعلامة التجارية في فضاء التواصل
                                            الاجتماعي, تحديد المصطلحات أو الكلمات الرئيسية التي تساهم في رفع مستويات
                                            المشاركة, التعرف إلى مايحب أن يراه الجمهور, جس نبض الجمهور قبل إطلاق
                                            المنتجات الجديدة, مراقبة مايفعله المنافسون فيما يخص الاتجاهات الحديثة
                                            المتبعة ونوعية المحتوى وطبيعة الحملات التي يطلقونها.
                                        </p>
                                    </div>
                                </div>
                                <div class="sub-service">
                                    <div class="subservice-top">
                                        <h2 class="ae-2 fromBottom">إنشاء المحتوى</h2>
                                        <p>يتميز المحتوى الذي ينتجه خبراء "السحابة الرقمية" بأنه قريب من الناس ويتكلم
                                            بلغتهم اليومية؛ بعيداً عن اللغة الصعبة الخارجة عن التداول. وفي الوقت نفسه،
                                            يضمن ذلك المحتوى إيصال رسائلك على النحو المطلوب. وقد اخترنا مجموعة مميزة من
                                            خبراء المحتوى السعوديين ذي المعرفة الهائلة بخصوصية المجتمع المحلي، سواء على
                                            مستوى الأفكار أو التعابير المستخدمة. نحن لا نستخدم لغة نشرات الأخبار أو
                                            البرامج الوثائقية، بل نركز أكثر على مايسمى باللهجة "البيضاء"، التي يفهمها كل
                                            السعوديين في مختلف مناطق المملكة، وكذلك بقية العرب، بأسلوب جذاب ومعبر، قادر
                                            على لفت اهتمام الجمهور، وتعزيز حضورك على الشبكات الاجتماعية.</p>
                                    </div>
                                    <div class="service-blocks">
                                        <ul class="clearfix pl-0">
                                            <li class="">
                                                <div class="service-inner-block">
                                                    <div class="circle">
                                                        <div class="circle-inner">
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/6.svg')}}"
                                                                alt="طبيعة العلامة التجارية ومنتجاتها">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="360">
                                                        <h6>طبيعة العلامة التجارية ومنتجاتها</h6>
                                                        <p>المحتوى المستخدم في الترويج للسيارات يختلف عن محتوى التواصل
                                                            مع الجمهور في صناعة المجوهرات او ألعاب الأطفال.
                                                            نراعي دائماً خصوصية كل علامة تجارية، فعندما تتطلب توظيف
                                                            محتوى تقني، فإننا ندرك ضرورة الإحاطة بكل الجوانب المرتبطة
                                                            بذلك من حيث نغمة المحتوى ودرجة التخاطب. وفي حال كان الموضوع
                                                            يدور حول منتج سياجي، فإننا نستخدم لغة حالمة، تركز على
                                                            الاستمتاع والراحة والذكريات والمغامرات والتجارب الجديدة.
                                                            أما إذا كان المنتج جديداً، فإننا نركز على المحتوى الذي يخلق
                                                            الحاجة وتعزيز الطلب على ذلك المنتج. فقد يكون المحتوى
                                                            كوميدياً أو يأخذ أسلوب المحادثة مع الجمهور عبر طرح أسئلة
                                                            تثير لديهم التساؤل والفضول.</p>
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
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/7.svg')}}"
                                                                alt="غاية المحتوى">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="340">
                                                        <h6>غاية المحتوى</h6>
                                                        <p>قد تكون علامتك التجارية معروفة، ولها تواجد قديم في الأسواق،
                                                            وتريد فقط الحفاظ على القاعدة الاستهلاكية والحفاظ على ولاء
                                                            العملاء الحاليين واكتساب عملاء جدد قدر الإمكان. وفي هذه
                                                            الحالة يكون المحتوى موجهاً نحو التعريف بالقيمة المضافة التي
                                                            توفرها منتجات تلك العلامة، إلى جانب العروض الجديدة.
                                                            وقد تطلق حملة توعوية اجتماعية لا علاقة لها بترويج أي منتج،
                                                            وإنما فقط لتعزيز الصورة الذهنية حول علامتك التجارية بأنها
                                                            تؤدي دوراً اجتماعياً بارزاً. وهنا يكون تركيز المحتوى على
                                                            التثقيف والتوعية، وإيجاد روابط بين علامتك التجارية والموضوع
                                                            المقدم للجمهور.</p>
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
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/8.svg')}}"
                                                                alt="اختيار الكلمات المفتاحية">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="230">
                                                        <h6>اختيار الكلمات المفتاحية</h6>
                                                        <p>نسعى دائماً لإدارج مجموعة من الكلمات المفتاحية التي تسهل
                                                            البحث عن المحتوى من جانب المستهلكين أو المهتمين أو أهل
                                                            الصناعة فيما يخص علامتك التجارية ومنتجاتها. ويضمن ذلك ما
                                                            يطلق عليه لفظ "التعرض". فكلما كان المحتوى متاحاً للجمهور،
                                                            وحتى من غير المتابعين، زادت كمية "التعرض"، وهي التي تساهم في
                                                            شهرة العلامة التجارية أكثر وأكثر.</p>
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
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/9.svg')}}"
                                                                alt="المحتوى المرن">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="230">
                                                        <h6>المحتوى المرن</h6>
                                                        <p>لن نتحدث إلى الجمهور حول المواضيع نفسها طوال الوقت. نحدد لكل
                                                            فترة زمنية مجموعة من المحاور، التي تتغير وتتنوع بحسب الخطة
                                                            المرسومة مسبقاً. وإذا كان هناك تفاعل أكبر مع محور محدد، فلا
                                                            مانع من الحفاظ عليه. الحيوية العالية ضمن بيئة الشبكات
                                                            الاجتماعية تتيح لنا حرية الحركة في ابتكار المحتوى وتغييره،
                                                            وفقاً لما نراه ملائماً لكل مرحلة.</p>
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
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/10.svg')}}"
                                                                alt="ابتكار الوسم (الهاشتاق)">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="230">
                                                        <h6>ابتكار الوسم (الهاشتاق)</h6>
                                                        <p>أصبح الوسم علامة فارقة في بيئة التواصل الاجتماعي، وقد يصل
                                                            الأمر إلى نمو مذهل في عدد المتابعين والمشاركين. إن اختيار
                                                            الألفاظ المناسبة والموضوع في إنشاء الوسم هو أمر حساس ودقيق
                                                            ويتطلب خبرة وذوقاً فنياً وإحساساً عالياً باللغة. صحيح أن
                                                            الوسم سلاح ذو حدين، إلا أن الإعداد الجيد والاستماع إلى
                                                            الجمهور يؤديان بالتأكيد إلى تحقيق نتائج إيجابية.</p>
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
                                <div class="sub-service">
                                    <div class="subservice-top">
                                        <h2 class="ae-2 fromBottom">إدارة وسائل التواصل الاجتماعي 24/7</h2>
                                        <p>في أي وقت من السنة، في الليل أو النهار، يقوم فريق السحابة الرقمية بإدارة
                                            حسابات العلامات التجارية للعملاء على وسائل التواصل الاجتماعي مثل فيسبوك
                                            وتويتر وإنستاغرام وغيرها. وهناك 3 أركان نعمل ضمنها لتكون إدارة وسائل التواصل
                                            أكثر كفاءة ووصولاً إلى الجمهور
                                        </p>
                                    </div>
                                    <div class="service-blocks">
                                        <ul class="clearfix pl-0">
                                            <li class="">
                                                <div class="service-inner-block">
                                                    <div class="circle">
                                                        <div class="circle-inner">
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/11.svg')}}"
                                                                alt="تحقيق النمو">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="296">
                                                        <h6>تحقيق النمو</h6>
                                                        <p>يؤدي مدير التواصل الاجتماعي دوراً حيوياً، ليس فقط في الحفاظ
                                                            على قاعدة المتابعين، بل في تعزيزها ,وتدعيمها من خلال:استخدام
                                                            وسائل التواصل لإجراء محادثات فعالة وهادفة لكسب المزيد من
                                                            المتابعين البحث عن أشخاص مؤثرين لدعم أهداف العلامة التجارية,
                                                            تحديد مناطق الضعف والقوة في كيفية تفاعل المتابعين مع المحتوى
                                                            القائم, زيادة عدد المتابعين على حسابات التواصل الاجتماعي
                                                            الخاصة بالعلامة التجارية عبر التوظيف, الصحيح للمحتوى في جذب
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
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/1.svg')}}"
                                                                alt="المشاركة الفعالة">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="274">
                                                        <h6>المشاركة الفعالة</h6>
                                                        <p>يفضل المشاركون والمتابعون العلامات التجارية التي تتحدث إليهم
                                                            بأسلوب شخصي وبلغة أقرب إلى الحياة اليومية، إلى جانب تثقيفهم
                                                            بالقيمة المضافة التي توفرها تلك العلامة من خلال: مشاركة ونشر
                                                            المحتوى الخاص بالعلامة التجارية أو الذي يخدم أغراضها, مراقبة
                                                            المنصات الاجتماعية والرد على تساؤلات المشاركين بشكل مباشر
                                                            ومرضي, مراكمة المعرفة بالعلامة التجارية, تعزيز العلاقة مع
                                                            المستخدمين ومساعدتهم على فهم العلامة التجارية أو المنتج.</p>
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
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/12.svg')}}"
                                                                alt="التطوير">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="252">
                                                        <h6>التطوير</h6>
                                                        <p>كل يوم هو فرصة جديدة، تتطور فيها التقنية وتقدم لنا مزايا
                                                            متقدمة، وتزيد فيها المنافسة. فريق إدارة وسائل التواصل ينقل
                                                            كل جديد إلى أسلوب العمل بعد اختبار فعاليته من خلال: اختبار
                                                            منصات التواصل الاجتماعي الجديدة ومدى ملائمتها للمجتمع
                                                            المحلي, تحسين تجربة المستهلك من خلال القيام بدور الوسيط بينه
                                                            وبين العلامة التجارية, إطلاق خطط جديدة تواكب كل متغيرات
                                                            التواصل الاجتماعي.</p>
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
                                <div class="sub-service">
                                    <div class="subservice-top">
                                        <h2 class="ae-2 fromBottom">إصدار التقارير</h2>
                                        <p>نعتبر في "السحابة الرقمية" أن إصدار التقارير باستخدام الأساليب الإحصائية
                                            الحديثة هو ميزان الأداء الذي يشكل نظرتك إلى المستقبل. نقدم لك التقرير الذي
                                            يخدم أهدافك بالعناصر التالية:
                                        </p>
                                    </div>
                                    <div class="service-blocks">
                                        <ul class="clearfix pl-0">
                                            <li class="">
                                                <div class="service-inner-block">
                                                    <div class="circle">
                                                        <div class="circle-inner">
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/13.svg')}}"
                                                                alt="نقدم لك التقرير الذي يخدم أهدافك بالعناصر التالية">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="364">
                                                        <h6>نقدم لك التقرير الذي يخدم أهدافك بالعناصر التالية</h6>
                                                        <p>المتابعون: عدد المتابعين لعلامتك التجارية على صفحات التواصل
                                                            الاجتماعي الخاصة بك, عدد النقرات: مصدر هام لمعرفة عدد
                                                            المشاهدات وكذلك مدى التفاعل مع المحتوى, التعليقات: التعبير
                                                            المكتوب هو الدرجة الأقوى من تفاعل المتابعين مع المحتوى
                                                            المنشور، وهو مايفتح أبواب النقاش والرد على التساؤلات, إعادة
                                                            التغريد و المشاركة: دلالة هامة على مقدار "التعرض" ومدى
                                                            اهتمام المتابعين أو غيرهم بالمحتوى المعروض, التفضيل
                                                            والإعجاب: مؤشر ضروري للقياس. ويقف وراءه عدة أسباب منها
                                                            التقدير أو استخدام المحتوى كمرجع أو حتى الولاء للعلامة
                                                            التجارية.</p>
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
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/14.svg')}}"
                                                                alt="توقيت التقارير">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="98">
                                                        <h6>توقيت التقارير</h6>
                                                        <p>.أسبوعية, شهرية, فصلية, نصف سنوية, خاص بالحملة منذ بدايتها
                                                            وحتى نهايتها</p>
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
                                                            <img class="web"
                                                                src="{{asset('images/emailMarketing/15.svg')}}"
                                                                alt="محتوى التقارير">
                                                        </div>
                                                    </div>
                                                    <div class="service-block-text" data-height="450">
                                                        <h6>محتوى التقارير</h6>
                                                        <p>نمو المتابعين: يقدم لك خلاصات حول شعبية العلامة التجارية
                                                            ومقدار الوعي بها ومدى وصولها. وكلما زاد عدد المتابعين،
                                                            وبالتالي إمكانية تفاعلهم، فإن ذلك يعني حضوراً وتأثيراً أكبر
                                                            في فضاء الشبكات الاجتماعية, أصحاب التأثير: أن يكون لديك
                                                            متابعون من أصحاب التأثير، كالمشاهير أو المسؤولين الحكوميين
                                                            أو رجال الأعمال الكبار، فإن ذلك إضافة نوعية لعلامتك
                                                            التجارية, حجم المواد المنشورة ومقدار التفاعل: يعبر ذلك عن
                                                            رصد عدد المشاركات والنقرات والتعليقات وإعادة التغريد
                                                            والتفضيل، أي باختصار أي شكل من أشكال التفاعل مع المحتوى,
                                                            التفاعل لكل مستخدم: تستخدم هذه الإحصاءات في تعزيز الولاء
                                                            الفردي للعلامة التجارية. فكلما زاد عدد الأفراد المتفاعلين
                                                            بشكل دائم، شكل ذلك نجاحاً أكبر, كثافة المرور: عدد زوار
                                                            الموقع الإلكتروني المرتبط بمحتوى صفحات التواصل الاجتماعي،
                                                            مؤشر رئيسي على الحضور البارز وقيمة المحتوى المقدم .</p>
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
                    </div>
                    <div class="mt-5 text-center">
                        <a href="{{route('service.order', $service->slug )}}"
                            class="order-service"><span>@lang('site.order_now')</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection