@extends('layouts.site' )
@section('title')
{{$service->title}}
@endsection

@section('styles')
<style>
    .list-text{
        color: #25bbcc;
        padding-right: 15px;
        font-size: 18px;
    }
    .list-icon i{
        color: #25bbcc;
    }

    .flip-box {
        border-radius: 20px;
        background-color: transparent;
        height: 140px;
        border: 1px solid #f1f1f1;
        perspective: 1000px; /* Remove this if you don't want the 3D effect */
        box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 10%);
    }

    .flip-box-inner {
        border-radius: 20px;
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;  
        transform-style: preserve-3d;
    }

    .flip-box:hover .flip-box-front {
        opacity: 0;
        transition: visibility 0.5s 0.5s, opacity 0.5s 0.5s linear;
    }
    .flip-box:hover .flip-box-back {
        opacity: 1;
        transition: visibility 0.5s 0.5s, opacity 0.5s 0.5s linear;
    }

    /* Position the front and back side */
    .flip-box-front, .flip-box-back {
        border-radius: 20px;
        padding: 40px;
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden; /* Safari */
        backface-visibility: hidden;
    }

    /* Style the front side */
    .flip-box-front {
        opacity: 1;
        border-radius: 20px;
        background-color: rgba(2,1,1,0);
        color: #177788;
    }

    /* Style the back side */
    .flip-box-back {
        border-radius: 20px;
        font-size: 18px;
        background-color: transparent;
        background-image: linear-gradient(90deg,#25bbcc 0%,#177788 100%);
        color: #fff;
        opacity: 0;
        transition: visibility 0.5s 0.5s, opacity 0.5s 0.5s linear;
    }

    .wrapper1 {
        height: 140px; 
        background-color: transparent;
        background-image: linear-gradient(220deg,#177788 0%,#25bbcc 100%);
        box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
        /* transition: background .3s,border .3s,border-radius .3s,box-shadow .3s; */
        margin-top: 0;
        margin-bottom: 0;
        padding: 20px 0;
        border-radius: 20px;
        width: 100%
    }
    .wrapper1-a {
        display: inline-block;
        fill: #177788;
        color: #177788;
        background-color: #fff;
        box-shadow: 0px 0px 10px 0px rgb(255 255 255 / 30%);
        border-radius: 50px;
        font-size: 16px;
        padding: 15px 30px;
        width: auto;
        font-weight: 800;
        -webkit-transition: transform  .3s;
        transition: transform  .3s;
        line-height: 1;
    }

    .wrapper1-a:hover{
        color: #177788;
        transform: scale(1.1);
        -webkit-transform:scale(1.1);
    }

    .accordion1 {
        background-color: transparent;
        font-weight: 500;
        font-family: Tajawal;
        color: #177788;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
        border-color: rgba(199,217,221,.51);
        font-weight: 700;
        line-height: 1;
        margin: 0;
        padding: 15px;
        border-bottom: 1px solid #d4d4d4;
        cursor: pointer;
        outline: none;
    }

    .active1, .accordion1:hover {
        color: #25bbcc;
    }
    .active1{
        border : none;
    }

    .panel1 {
        color: #202223;
        font-weight: 500;
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
        border-color: rgba(199,217,221,.51);
    }

</style>

@endsection

@section('scripts')
<script>
    var acc = document.getElementsByClassName("accordion1");
    var i;
    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active1");
        var panel = this.nextElementSibling;
        var arrow = this.querySelector('i')
        if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
        panel.style.borderBottom = null;
        arrow.className ="fas fa-caret-left pr-3";
        } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
        panel.style.borderBottom = "1px solid #d4d4d4";
        arrow.className ="fas fa-caret-up pr-3";
        } 
    });
    }
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
                    </div>

                    <div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h1 style="color: #25bbcc;">خدمة إدارة حسابات التواصل الإجتماعي</h1>
                                <h4 style="color: #177788;">مجال العمل:</h4>
                                <ul class="">
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fas fa-mobile-alt"></i> </span>
                                        <span class="list-text">تنسيق كتابة ومظهر الحسابات</span>
                                    </li>
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="far fa-images"></i> </span>
                                        <span class="list-text">نشر وجدولة المحتوى</span>
                                    </li>
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fas fa-envelope-open-text"></i> </span>
                                        <span class="list-text">الرد على الرسائل والإستفسارات</span>
                                    </li>
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="far fa-chart-bar"></i> </span>
                                        <span class="list-text">إعداد التقارير الشهرية</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6 text-center">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="168"
                                        viewBox="0 0 497 497">
                                        <image width="497" height="497"
                                            xlink:href="data:img/png;base64,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">
                                        </image>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">تنسيق كتابة ومظهر الحسابات:</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">أصبحت حسابات التواصل الإجتماعي واحدة من أهم قنوات التعريف بالنسبة للشركات والمؤسسات وهو ما يجعلها واحدة من محددات الإنطباع الأول لدى العملاء، لذلك أول خطوة نقوم بها في خدمة إدارة حسابات التواصل الإجتماعي هي تنسيق محتوى ومظهر صفحاتك من خلال الصورة الشخصية وصورة العرض، الوصف المختصر، وأرقام التواصل وربط الموقع الإلكتروني، بجانب توحيد نمط طريقة عرض المنشورات لعكس الهوية البصرية لنشاطك والظهور بشكل احترافي.</p>
                                </div>
                                <div class="p-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/socialMedia/1.jpg')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">إدارة حسابات التواصل الإجتماعي - تنسيق مظهر الحسابات</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">نشر وجدولة المحتوى:</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">نحن نعلم أن الأسواق باتت مليئة بالمنافسين ونعلم ضرورة أن يتواصل نشر المحتوى بصفة مستمرة على حسابات الشركة في مواقع التواصل الإجتماعي ليبقى دائمًا عامل من عوامل الجذب والتذكير لعملائك أنك متواجد لخدمتهم، وهو ما نقوم به من خلال نشر وجدولة المحتوى على شبكات التواصل الإجتماعي المختلفة ضمن هذه الخدمة.</p>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">الرد على الرسائل والإستفسارات:</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">نحن نؤمن بفعالية التواصل والتقرب من العملاء، وهذا ما دفعنا لتقديم خدمة الرد على الرسائل والإستفسارات بتعيين مدير خاص لحسابات مواقع التواصل الإجتماعي لمتابعة ردود ورسائل العملاء وتحويلهم للموظف المسؤول أو إلى صفحة الخدمة أو المنتج.</p>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">إعداد التقارير الشهرية:</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">“لا يمكنك إتقان ما لا يمكنك قياسه” لذلك من المهم جدا معرفة إحصائيات عدد وتفاعل زوار صفحاتك على وسائل التواصل الإجتماعي ومتابعة التغيير، ولهذا نقدم خدمة إعداد التقارير الشهرية للتعرف أكثر على شريحة الزوار المهتمة بنشاط عميلنا وبالتالي استهدافهم بالإعلانات والحملات التسويقية.</p>
                                </div>
                                <div class="p-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/socialMedia/2.png')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">إدارة حسابات التواصل الإجتماعي - إحصائيات التفاعل الشهري</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <h3 style="color: #177788;">طريقة عملنا في<br><span style="color: #25bbcc;">إدارة حسابات التواصل الإجتماعي</span></h3>
                            </div>

                            <div class="col-12 col-md-6 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>1- مناقشة المشروع</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            مناقشة المشروع ومتطلبات العميل، ودراسة سوق العمل والمنافسة في أبرز وسائل التواصل الإجتماعي.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-12 col-md-6 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>2- تحديد الأهداف</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            وضع خطة لتحقيق الأهداف من إدارة الحسابات، وتحديد المتطلبات لبدأ العمل.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-12 col-md-6 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>3- إدارة الحسابات</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            إدارة وتنسيق حسابات التواصل الإجتماعي ونشر المحتوى والرد على الرسائل والاستفسارات بانتظام.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-12 col-md-6 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>4- إعداد التقارير</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            تسليم تقارير شهرية توضح عدد زوار الحسابات والتفاعل مع المنشورات وباقي الإحصائيات المهمة للتسويق.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>                        
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="text-center wrapper1">
                                    <div>
                                        <h2 style="font-size: 30px; color: #fff;">خلنا نسوق مشروعك ونشارك قصة نجاحك!</h2>
                                    </div>
                                    <div>
                                        <a href="{{route('service.order', $service->slug )}}"
                                            class="wrapper1-a">
                                            قدّم طلبك
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">الأسئلة الشائعة عن<br><span style="color: #25bbcc;">إدارة حسابات التواصل الإجتماعي</span></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>أحتاج خدمة إدارة حسابات التواصل الإجتماعي، من أين أبدأ؟</div>
                                <div class="panel1">
                                    نحن هنا لمساعدتك! بإمكانك <a href="{{route('contact')}}"><span style="color: #25bbcc;">التواصل معنا</span></a> لمناقشة مشروعك أو بإمكانك <span style="color: #25bbcc;"><a style="color: #25bbcc;" href="{{route('service.order', $service->slug )}}">طلب خدمة إدارة الحسابات من هنا</a></span>
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>كم مدة عقد إدارة حسابات التواصل الإجتماعي لديكم؟</div>
                                <div class="panel1">
                                    إدارة الحسابات تتم بشكل شهري ويتم التجديد تلقائياً مالم يتم الإتفاق مسبقاً على غير ذلك.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>كم تكلفة إدارة حسابات التواصل الإجتماعي؟</div>
                                <div class="panel1">
                                    تكلفة إدارة الحسابات تتراوح من 800 – 3000 ريال شهريا، ويعتمد السعر على عدد الحسابات المطلوب إدارتها، وعدد المنشورات الشهرية، وحجم التفاعل.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>ماهي الحسابات اللتي يمكنكم إدارتها؟</div>
                                <div class="panel1">
                                    انستجرام – تويتر – فيسبوك – بينتريست – لينكد ان
                                </div>

                            </div>
                            <div class="col-12 col-md-6">
                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>هل بإمكاني استخدام الحساب أثناء إدارتكم له؟</div>
                                <div class="panel1">
                                    نعم بالتأكيد، بإمكانك متابعة الحساب ونشر المحتوى او الرد على الرسائل بشكل طبيعي.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>على ماذا تشمل خدمة إدارة حسابات التواصل الإجتماعي؟</div>
                                <div class="panel1">
                                    نتشمل الخدمة على تصميم وتنسيق مظهر الحسابات، نشر وجدولة المحتوى، الرد على الرسائل والاستفسارات، إعداد التقارير الشهرية للتفاعل والمتابعين.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>هل بالإمكان تصميم المحتوى لوسائل التواصل الإجتماعي؟</div>
                                <div class="panel1">
                                    نعم نقوم بتقديم خدمة صناعة المحتوى بشكل منفصل،وبالإمكان إضافتها لخدمة إدارة وسائل التواصل الإجتماعي لتصميم منشورات وقصة  تناسب جميع وسائل التواصل.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>هل بالإمكان عمل حملات إعلانية على وسائل التواصل الإجتماعي؟</div>
                                <div class="panel1">
                                    نعم بالتأكيد، نقدم خدمة إنشاء وإدارة الحملات الإعلانية بشكل منفصل عن إدارة الحسابات.
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