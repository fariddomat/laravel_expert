@extends('layouts.site' )
@section('title')
{{$service->title}}
@endsection

@section('styles')
<style>
    .item-title {
        text-align: center;
    }

    strong {
        font-weight: bold !important;
        color: black !important;
    }

    .blog-home .item h5 {
        line-height: 1.4;
        margin-bottom: 15px;
    }

    .display-7 {
        font-family: 'Jost', sans-serif;
        font-size: 1.2rem;
        line-height: 1.5;
    }

    .item-wrapper .item-content {
        padding: 2px;
        padding-top: 32px;
    }

    .item-img {
        width: 100%;
    }

    .mbr-text {
        text-align: center;
    }
    .align-center {
        text-align: center;
    }
   
    .mbr-iconfont {
        display: block;
        font-size: 5rem;
        color: #6592e6;
        margin-bottom: 2rem;
    }
    [class^="mobi-"], [class*=" mobi-"] {
        font-family: 'Moririse2' !important;
        speak: none;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
        text-transform: none;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .card-box {
        z-index: 10;
        position: relative;
    }
    .card-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card {
        margin: auto;
        border: 0!important;
    }
    p {
        color :black !important;
    }

    @font-face {
    font-family: 'Moririse2';
    font-display: swap;
    src: url('{{asset("fonts/mobirise2.ttf")}}') format('truetype');
    font-weight: normal;
    font-style: normal;
    }

    [class^="mobi-"], [class*=" mobi-"] {
    /* use !important to prevent issues with browser extensions that change fonts */
    font-family: 'Moririse2' !important;
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;

    /* Better Font Rendering =========== */
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    }
 
    .mobi-mbri-image-gallery:before {
    content: "\e93c";
    }
	 .mobi-mbri-home:before {
    content: "\e939";
    }
	.mobi-mbri-contact-form:before {
    content: "\e91d";
    }
	.mobi-mbri-website-theme-2:before {
    content: "\e997";
    }
	.mobi-mbri-cust-feedback:before {
    content: "\e920";
    }
	 .mobi-mbri-shopping-cart:before {
        content: "\e977";
    }
    .card-title {
        text-align: center;
    }
    .order-larid{
        background-color: #32a2ef !important;
        border-color: #32a2ef !important;
        color: #ffffff !important;
        box-shadow: 0 2px 2px 0 rgb(0 0 0 / 20%);
        padding: 1.2rem 2.1rem;
        border-radius: 4px;
        font-size: 1.8rem;
        line-height: 1.5;
    }

    .order-larid:hover{
        background-color: #0f75bc !important;
        border-color: #0f75bc !important;
    }
</style>
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
                    </div>
                    <div>
                        <div style="padding-bottom: 32px; padding-top: 10px;" class="">
                            <div class="row justify-content-center">
                                <div class="title col-12 col-md-9">
                                    <h4 class="mbr-section-title mbr-fonts-style align-center mb-4 display-4"><strong>
                                        </strong>
                                        <div><strong style="color: black !important;">خيار مرن وفعال من حيث التكلفة
                                                والمزايا للمنشأت مع اختلاف احجامها
                                                الصغيرة والمتوسطة و الكبيرة</strong><br></div>
                                    </h4>
                                    <h4 class="mbr-section-subtitle align-center mbr-fonts-style mb-4 display"
                                        style="color: black;">
                                        أيا كان نشــاط منشاتك (خدمي، تجاري، صناعي، ربحي او غير ربحي) فإن منظومة ليــرد
                                        تقدم حلول شاملة لكل قسم من اقسام المنشاة بما في ذلك الموارد المالية والمخزون
                                        وادارة المستودعات و الموارد البشرية و المشاريع والتصنيع وخطوط الانتاج وغير ذلك
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <section style="padding-bottom: 32px;" class="gallery3">
                            <div class="container-fluid">
                                <div class="row mt-4" style="direction: ltr;">
                                    <div class="item features-image сol-12 col-md-6 col-lg-3">
                                        <div class="item-wrapper">
                                            <div class="item-img">
                                                <img src="{{asset('images/laridERP/1.jpg')}}" alt="">
                                            </div>
                                            <div class="item-content">
                                                <h5 class="item-title mbr-fonts-style display-7"><strong>الموارد
                                                        البشرية</strong></h5>
                                                <p class="mbr-text mbr-fonts-style mt-3 display-7">متابعة الحضور
                                                    والانصراف للموظفين مع قراءة بيانات الحضور من اجهزة البصمة. اجازات
                                                    الموظفين.المرتبات بكل ما تتطلبه من تعريف للمنح والبدلات والاقتطاعات
                                                    والرسوم والقروض وغيرها &nbsp;</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item features-image сol-12 col-md-6 col-lg-3">
                                        <div class="item-wrapper">
                                            <div class="item-img">
                                                <img src="{{asset('images/laridERP/2.jpg')}}" alt="">
                                            </div>
                                            <div class="item-content">
                                                <h5 class="item-title mbr-fonts-style display-7"><strong>المشاريع ومراكز
                                                        التكلفة</strong></h5>

                                                <p class="mbr-text mbr-fonts-style mt-3 display-7">
                                                    متابعة المصاريف والايرادات الفعلية للمشاريع الداخلية أو الخارجية.
                                                    إدارة الموازنة التقديرية ومخزون المشروع والفوترة المعقدة. يتيح ليرد
                                                    الحصول على تقارير لمصاريف وايرادات المشاريع و مقارنة مصاريف المشروع
                                                    الفعلية بالتقديرية</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="item features-image сol-12 col-md-6 col-lg-3">
                                        <div class="item-wrapper">
                                            <div class="item-img">
                                                <img src="{{asset('images/laridERP/3.jpg')}}" alt="">
                                            </div>
                                            <div class="item-content">
                                                <h5 class="item-title mbr-fonts-style display-7"><strong>المبيعات
                                                        والمشـتريات</strong></h5>

                                                <p class="mbr-text mbr-fonts-style mt-3 display-7">عروض الأسعار واوامر
                                                    البيع ، وادارة&nbsp; المخزون والمستودعات واجراءات المشتريات، متصل
                                                    بشكل مباشر مع الحسابات، والتصنيع ، ومحاسبة المشاريع وخدمة العملاء من
                                                    أجل تحقيق رؤية افضل على مستوى المنشاة بأكملها</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="item features-image сol-12 col-md-6 col-lg-3">
                                        <div class="item-wrapper">
                                            <div class="item-img">
                                                <img src="{{asset('images/laridERP/4.jpg')}}" alt="" title="">
                                            </div>
                                            <div class="item-content">
                                                <h5 class="item-title mbr-fonts-style display-7"><strong>الادارة
                                                        الماليــــة</strong></h5>

                                                <p class="mbr-text mbr-fonts-style mt-3 display-7">
                                                    بدءًا من الاعمال المحاسبية الصغيرة الخاصة بالأعمال التجارية الصغيرة
                                                    إلى التطبيقات المالية العالمية الغنية بالمزايا للشركات الأكبر حجماً
                                                    والمعقدة ، تم تصميم ليرد لدعم احتياجاتك اليوم وفي المستقبل</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="gallery3" style="padding-top: 15px;">
                            <div class="container-fluid">
                                <div class="row mt-4" style="direction: ltr;">
                                    <div class="item features-image сol-12 col-md-6 col-lg-3 active">
                                        <div class="item-wrapper">
                                            <div class="item-img">
                                                <img src="{{asset('images/laridERP/5.jpg')}}" alt="" data-slide-to="0">
                                            </div>
                                            <div class="item-content">
                                                <h5 class="item-title mbr-fonts-style display-7"><strong>الارشــفة
                                                        الالكتـــرونية</strong><strong><br></strong></h5>
                                                <p class="mbr-text mbr-fonts-style mt-3 display-7">ارشفة جميع انواع
                                                    الملفات بما في ذلك ملفات الوورد والاكسل وكذلك الفيديوهات وملفات
                                                    الصوت والصور بمختلف انواعها. مع امكانية استعراض هذه الملفات سواء
                                                    كانت ملفات صور او فيديوهات او ملفات الوورد والاكسل دون الحاجة لوجود
                                                    برنامج الاوفس على جهاز المستخدم او على السيرفر مع اعطاء صلاحيات
                                                    الوصول للمستخدمين حسب الحاجة</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item features-image сol-12 col-md-6 col-lg-3">
                                        <div class="item-wrapper">
                                            <div class="item-img">
                                                <img src="{{asset('images/laridERP/6.jpg')}}" alt="" data-slide-to="1">
                                            </div>
                                            <div class="item-content">
                                                <h5 class="item-title mbr-fonts-style display-7"><strong>نقــاط
                                                        البيــــع</strong></h5>
                                                <p class="mbr-text mbr-fonts-style mt-3 display-7">تطبيق نقاط البيع متصل
                                                    بشكل مباشر مع المخزون والحسابات يمتاز بواجهة سهلة الاستخدام وسرعة في
                                                    الاداء ومرونة استثنائية. متصل ايضا مع قارئ البار كود. مناسب للمولات
                                                    والمطاعم والمقاهي و محلات الحلويات والمكتبات وغيرها يمكن استخدام
                                                    نسخة الويب منه من اي جهاز بما فيها اجهزة التابلت<br></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item features-image сol-12 col-md-6 col-lg-3">
                                        <div class="item-wrapper">
                                            <div class="item-img">
                                                <img src="{{asset('images/laridERP/7.jpg')}}" alt="" data-slide-to="2">
                                            </div>
                                            <div class="item-content">
                                                <h5 class="item-title mbr-fonts-style display-7"><strong>أتمتـة اجراءات
                                                        العمــل</strong></h5>
                                                <p class="mbr-text mbr-fonts-style mt-3 display-7">
                                                    نظام أتمتة مرن وسهل الاستخدام والتنفيذ لتعزيز التحكم والرقابة على
                                                    جميع اجراءات العمل بما يساعد المنشأة في تحسين ادائها وزيادة
                                                    الانتاجية لديها وتقديم افضل الخدمات لعملائها بالاعتماد على افضل
                                                    التقنيات والذي يضمن تقليل الاخطاء وسرعة الانجاز وتقليل الاعتماد على
                                                    العنصر البشري</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item features-image сol-12 col-md-6 col-lg-3">
                                        <div class="item-wrapper">
                                            <div class="item-img">
                                                <img src="{{asset('images/laridERP/8.jpg')}}" alt="" title=""
                                                    data-slide-to="3">
                                            </div>
                                            <div class="item-content">
                                                <h5 class="item-title mbr-fonts-style display-7"><strong>التصنيع وخطوط
                                                        الانتاج</strong></h5>
                                                <p class="mbr-text mbr-fonts-style mt-3 display-7">شراء المواد الاولية
                                                    الداخلة في عملية الانتاج و تعريف تركيبة المواد المصنعة من المواد
                                                    الاولية وتعريف المصاريف الصناعية ومتابعة مخزون المواد الاولية من
                                                    خلال داش بورد المخزون. يدعم ليرد التصنيع النمطي وغير النمطي مع مرونة
                                                    عالية في تعريف المصاريف الصناعية واضافتها لخط الانتاج</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="features13" style="padding-top: 75px;">
                            <div class="container">
                                <div class="row" style="direction: ltr;">
                                    <div class="col-12">
                                        <h3 class="mbr-section-title align-center mb-4 mbr-fonts-style display-4">
                                            <div style="direction: rtl; color: black;">الاعمـال والنشـاطات التي تحتـاج منظــومة
                                                ليـــرد</div>
                                        </h3>
                                    </div>
                                    <div class="card col-12 col-md-4 col-lg-2 p-3">
                                        <div class="card-wrapper">
                                            <div class="card-box align-center">
                                                <span class="mbr-iconfont mobi-mbri-image-gallery mobi-mbri"></span>
                                                <h4 class="card-title align-center mbr-black mbr-fonts-style display-7">
                                                    <strong>الجمعيات الخيرية</strong></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-3 col-12 col-md-4 col-lg-2">
                                        <div class="card-wrapper">
                                            <div class="card-box align-center">
                                                <span class="mbr-iconfont mobi-mbri-home mobi-mbri"></span>
                                                <h4 class="card-title align-center mbr-black mbr-fonts-style display-7">
                                                    <strong>المقاولات والانشاءات</strong>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-3 col-12 col-md-4 col-lg-2">
                                        <div class="card-wrapper">
                                            <div class="card-box align-center">
                                                <span class="mbr-iconfont mobi-mbri-contact-form mobi-mbri"></span>
                                                <h4 class="card-title align-center mbr-black mbr-fonts-style display-7">
                                                    <strong>المطاعم والمولات</strong>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-3 col-12 col-md-4 col-lg-2">
                                        <div class="card-wrapper">
                                            <div class="card-box align-center">
                                                <span class="mbr-iconfont mobi-mbri-website-theme-2 mobi-mbri"></span>
                                                <h4 class="card-title align-center mbr-black mbr-fonts-style display-7">
                                                    <strong>المنشات الصناعية</strong>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-3 col-12 col-md-4 col-lg-2">
                                        <div class="card-wrapper">
                                            <div class="card-box align-center">
                                                <span class="mbr-iconfont mobi-mbri-cust-feedback mobi-mbri"></span>
                                                <h4 class="card-title align-center mbr-black mbr-fonts-style display-7">
                                                    <strong>المؤسسات الخدمية</strong>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-3 col-12 col-md-4 col-lg-2">
                                        <div class="card-wrapper">
                                            <div class="card-box align-center">
                                                <span class="mbr-iconfont mobi-mbri-shopping-cart mobi-mbri"></span>
                                                <h4 class="card-title align-center mbr-black mbr-fonts-style display-7">
                                                    <strong>الشركات التجارية</strong></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="features15" style="padding-top: 100px;">
                            <div class="container-fluid">
                                <div class="content-wrapper">
                                    <div class="row align-items-center" style="direction: ltr;">
                                        <div class="col-12 col-lg">
                                            <div class="text-wrapper">
                                                <h6 class="card-title mbr-fonts-style" style="font-size: 45px;">
                                                    <strong>سهولة تصميم الفواتير</strong></h6>
                                                <p class="mbr-text mbr-fonts-style mb-4" style="font-size: 20px;">
                                                    يعتمد نظام ليرد في مخرجاته على استخدام اداة التقارير&nbsp; <br>&nbsp;SAP Crystal Reports لشركة ساب&nbsp;&nbsp;<br>والتي تسمح باعادة تصميم ايا من هذه المخرجات وحسب حاجة العميل ومتطلبات العمل سواء كانت فواتير او غيرها حيث يمكن اعادة&nbsp; تصميمها بالكامل و يمكن ان يتم ذلك من خلال العميل نفسه دون الحاجة للرجوع الى الشركة المنفذة</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <div class="image-wrapper">
                                                <img src="{{asset('images/laridERP/9.jpg')}}" alt="Mobirise">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="features16" style="padding-top: 100px;">
                            <div class="container-fluid">
                                <div class="content-wrapper">
                                    <div class="row align-items-center" style="direction: ltr;">
                                        <div class="col-12 col-lg-8">
                                            <div class="image-wrapper">
                                                <img src="{{asset('images/laridERP/10.png')}}" alt="Mobirise">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg">
                                            <div class="text-wrapper">
                                                <h6 class="card-title mbr-fonts-style"><div style="direction: rtl; font-size: 30px;"><strong>أداة ذكاء الأعمال</strong></div>
                                                    </h6>
                                                <p class="mbr-text mbr-fonts-style mb-4" style="font-size: 20px;">اداة متكاملة لانشاء رسومات بيانية وتقارير تحليلية عن اداء المنشاة واضافة تقارير جديدة حسب الحاجة. الاداة مصممة بالكامل لتعمل من خلال الويب ومن اي جهاز دون الحاجة لاي متطلبات خاصة على جهاز المستخدم او السيرفر. استخدمها بالكامل من&nbsp; خلال المتصفح</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="features15" style="padding-top: 100px;">
                            <div class="container-fluid">
                                <div class="content-wrapper">
                                    <div class="row align-items-center" style="direction: ltr;">
                                        <div class="col-12 col-lg">
                                            <div class="text-wrapper">
                                                <h6 class="card-title mbr-fonts-style" style="font-size: 30px;"><strong>نظـام تنبيهـــات فعــال</strong></h6>
                                                <p class="mbr-text mbr-fonts-style mb-4" style="font-size: 25px;"><strong>من خلال رســائل الى جوالك مباشــرة</strong><br><strong><br></strong> ارسل رابط للفاتورة اوعرض الاسعار اوكشف الحساب الى عميلك على شكل رسالة واتس اب او تليجرام او رسالة نصية
                                               <br><strong><br></strong> استلم رسائل جميع التنبيهات الصادرة من الليــرد على جوالك مباشرة و من خلال تطبيق  تيليجـــرام و بدون اي تكلفة اضافية<strong><br></strong><br><br></p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-5">
                                            <div class="image-wrapper">
                                                <img src="{{asset('images/laridERP/telegram.jpg')}}" alt="Mobirise">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="mt-5 text-center">
                        <a href="{{route('service.order', $service->slug )}}"
                            class="order-larid"><span>@lang('site.order_now')</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection