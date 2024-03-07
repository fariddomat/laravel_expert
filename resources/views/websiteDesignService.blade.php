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
                                <h1 style="color: #25bbcc;">خدمة تصميم المواقع الإلكترونية والمتاجر</h1>
                                <h4 style="color: #177788;">مجال العمل:</h4>
                                <ul class="">
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fas fa-tv"></i> </span>
                                        <span class="list-text">تصميم المواقع الإلكترونية</span>
                                    </li>
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fas fa-store"></i> </span>
                                        <span class="list-text">تصميم المتاجر الإلكترونية</span>
                                    </li>
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fas fa-brush"></i> </span>
                                        <span class="list-text">تطوير المواقع</span>
                                    </li>
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fab fa-google"></i> </span>
                                        <span class="list-text">نشر المواقع في محركات البحث</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6 text-center">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="199.98" height="167.66"
                                        viewBox="0 0 495 415">
                                        <image id="layout" width="495" height="415"
                                            xlink:href="data:img/png;base64,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">
                                        </image>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">تصميم المواقع الإلكترونية:</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">نعمل على تصميم المواقع الإلكترونية للمؤسسات التجارية والأفراد لتقديم أعمالهم وخدماتهم بشكل مميز وتوسيع نطاق استهدافهم للجمهور محلياً وعالمياً، كما نحرص على أن يتوفر به كافة المميزات الهامة مثل تجاوبه مع الأجهزة المختلفة.</p>
                                    <p style="color: #202223; font-weight: 500;"><span style="font-size: 1rem;">بالإضافة إلى ذلك فإننا نقدم خدمة تهيئة الموقع لمحركات البحث SEO من ضمن خدمة تصميم المواقع، إضافة إلى إمكانية الإشتراك بشكل شهري لإنشاء محتوى تسويقي هادف مع استهداف بعض الكلمات المحددة في محركات البحث واللتي تعمل على جذب العملاء المهتمين في نشاط وخدمات عميلنا بشكل مستمرـ ومن دون الحاجة إلى عمل الإعلانات المدفوعة.</span></p>
                                </div>
                                <div class="p-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/websiteDesign/Desline-mockup-large-768x403.jpg')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">خدمة تصميم المواقع الإلكترونية</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <h3 style="color: #177788;">تصميم المتاجر الإلكترونية:</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">تصميم وإنشاء المتاجر الإلكترونية بشكل عصري ومتجاوب على جميع الأجهزة، بالإضافة إلى رفع صور المنتجات ووصفها، وربط وسائل الدفع الإلكتروني المحلية (مثل مدى) والعالمية مثل (باي بال – فيزا – ماستر كارد) ووسائل الشحن مع المتجر لتسهيل عملية الشراء للزائر ولتسهيل إجراءات البيع لصاحب المتجر.</p>
                                    <p style="color: #202223; font-weight: 500;"><span style="font-size: 1rem;">إضافة إلى تهيئة المتجر لمحركات البحث وتسريع التصفح وربط المتجر بأدوات التحليل لمتابعة إحصائيات المتجر.</span></p>
                                </div>                                
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="pt-3 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/websiteDesign/1.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="pt-3 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/websiteDesign/2.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="pt-3 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/websiteDesign/3.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="pt-3 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/websiteDesign/4.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">تطوير المواقع:</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">نعمل على تطوير المواقع من عدة نواحي مثل تطوير التصميم الحالي، إضافة صفحات أو مشاريع أو مقالات جديدة، تسريع الموقع، تهيئة الموقع لمحركات البحث، تأمين الموقع ضد هجمات القرصنة وعمل نسخ احتياطية بشكل دوري.</p>
                                </div>
                                <div class="p-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/websiteDesign/5.png')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">خدمة تصميم المواقع الإلكترونية</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">نشر المواقع في محركات البحث:</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">من أهم عوامل نجاح تصميم المواقع الإلكترونية هو سهولة الوصول إليه. لذلك نقدم خدمة نشر المواقع في محركات البحث (Google, Bing, Yahoo) بشكل مجاني لعملائنا الذين قمنا بتصميم مواقعهم، وأيضا من ضمن الخدمة نقوم بربط الموقع بأداة Google Analytics و Google Search Council لمتابعة إحصائيات الموقع والزوار والتعرف أكثر على شريحة الزوار المهتمة بموقع عميلنا.</p>
                                </div>
                                <div class="p-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/websiteDesign/6.jpg')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">خدمة تصميم المواقع الإلكترونية</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <h3 style="color: #177788;">طريقة عملنا في<br><span style="color: #25bbcc;">تصميم المواقع الإلكترونية والمتاجر</span></h3>
                            </div>

                            <div class="col-12 col-md-4 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>1- مناقشة المشروع</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            مناقشة المشروع ومتطلبات العميل، ودراسة سوق العمل والمنافسة.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-12 col-md-4 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>2- تحديد الأهداف</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            وضع خطة لتحقيق الأهداف من تصميم الموقع، وتحديد المتطلبات لبدأ العمل.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-12 col-md-4 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>3- تصميم الموقع</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            إنشاء التصميم والمحتوى الصوري والنصي للموقع وفقا للأهداف السابقة.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-12 col-md-4 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>4- إعتماد التصميم</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            بعد مراجعة واعتماد التصميم، نقوم بترجمة الموقع (حال الطلب) وتسريعه وتهيئته لمحركات البحث.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-12 col-md-4 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>5- إطلاق ونشر الموقع</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            إطلاق الموقع ونشره على محركات البحث (Google - Bing - Yahoo) وتأمينه وعمل نسخة احتياطية لكامل الموقع.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-12 col-md-4 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>6- التسويق والإعلان</h3>
                                      </div>
                                      <div class="flip-box-back" style="padding: 28px;">
                                        <div class="">
                                            إنشاء وإدارة الحملات الإعلانية على Google وعلى وسائل التواصل الإجتماعي لتسريع إشهار الموقع وجذب العملاء بوقت قياسي.
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
                                <h3 style="color: #177788;">الأسئلة الشائعة عن<br><span style="color: #25bbcc;">تصميم المواقع الإلكترونية والمتاجر</span></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                
                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>أحتاج موقع إلكتروني، من أين أبدأ؟</div>
                                <div class="panel1">
                                    نحن هنا لمساعدتك! بإمكانك <a href="{{route('contact')}}"><span style="color: #25bbcc;">التواصل معنا</span></a> لمناقشة مشروعك أو بإمكانك <span style="color: #25bbcc;"><a style="color: #25bbcc;" href="{{route('service.order', $service->slug )}}">طلب خدمة تصميم المواقع من هنا</a></span>
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>كم المدة اللازمة لتصميم موقع؟</div>
                                <div class="panel1">
                                    تختلف المدة باختلاف المتطلبات وحجم الموقع، المدة المتوسطة لإنجاز موقع متكامل تترواح من 15-25 يوم.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>كم يكلف تصميم الموقع؟</div>
                                <div class="panel1">
                                    تعتمد التكلفة على المتطلبات وحجم المشروع والوقت اللازم لعمله، ولكن بالمجمل فإن تكلفة تصميم مواقع الشركات والمؤسسات تبدأ من 4,000 وحتى 15,000 ريال سعودي أو مايعادلها بالدولار الأمريكي.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>ماهي متطلباتكم لتصميم المواقع الإلكترونية؟</div>
                                <div class="panel1">
                                    تعبئة <a href="{{route('service.order', $service->slug )}}"><span style="color: #25bbcc;">نموذج طلب الخدمة</span></a>، إرسال الشعار وملفات الهوية التجارية إن وجد، اختيار اسم النطاق في حال عدم وجوده مسبقا، إرسال المتطلبات الرئيسية للموقع والمعلومات العامة عن المؤسسة أو الشركة مثل (من نحن – أبرز الخدمات والمنتجات – أبرز الأعمال والعملاء – الموقع الجغرافي – ساعات العمل – أرقام التواصل – وصفحات التواصل الإجتماعي إن وجدت).
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>ماهو النطاق وما هي الاستضافة؟</div>
                                <div class="panel1">
                                    النطاق هو اسم موقعك، وهو الرابط الخاص بالموقع مثل www.digitsmark.com أما الإستضافة فهي مكان تواجد موقعك على شبكة الإنترنت – اون لاين.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>ما الفرق بين الموقع والمتجر الإلكتروني؟</div>
                                <div class="panel1">
                                    الموقع الإلكتروني عادة ما يكون موقع تعريفي لعرض الخدمات والأعمال ومجالات العمل للمؤسسات التجارية والأفراد، أما المتاجر الإلكترونية فهي مصممة لبيع المنتجات والدفع إلكترونيا أون لاين.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>هل تقومون بعمل تطبيقات للجوال؟</div>
                                <div class="panel1">
                                    نعم، نقدم خدمة عمل تطبيقات Webview للجوال والتابلت بشكل منفصل، بعد الإنتهاء من تصميم الموقع.
                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>كم المدة اللازمة لعمل تطبيق الجوال؟</div>
                                <div class="panel1">
                                    في حال كان التطبيق لموقع جاهز Webview فالمدة تتراوح من 15 – 25 يوم
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>هل تصممون موقع الكتروني للجوال؟</div>
                                <div class="panel1">
                                    نعم بالتأكيد، جميع المواقع اللتي نقوم بتصميمها هي مواقع متجاوبة وتعمل على جميع الأجهزة والشاشات.                                    
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>هل تقدمون خدمة ترجمة الموقع؟</div>
                                <div class="panel1">
                                    نعم نقدم خدمة الترجمة من العربي للإنجليزي ومن الإنجليزي للعربي، ويتم تحديد تكلفة الترجمة بناءا على كمية المحتوى وضمن عقد تصميم أو تطوير الموقع.                                    
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>بعد استلام الموقع، هل بإمكاني التعديل او الإضافة عليه؟</div>
                                <div class="panel1">
                                    بالطبع، وبإمكانك تحديد لغة لوحة التحكم وتغييرها للعربية لتسهيل التعديل أو الإضافة على الموقع.                                    
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>هل بإمكانكم إدارة وتحديث الموقع بعد الإنتهاء من تصميمه؟</div>
                                <div class="panel1">
                                    نعم نقدم خدمة إدارة وتحديث الموقع بشكل منفصل عن خدمة تصميم المواقع، وتشمل خدمة الإدارة عمل التحديثات بشكل مستمر وتأمين الموقع وعمل النسخ الاحتياطية، وأيضا تشمل على التقارير الشهرية لزوار الموقع. وبالإضافة إلى إمكانية عمل تحديثات مجانية للموقع.                                    
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>ما هو الـ SEO؟</div>
                                <div class="panel1">
                                    هو اختصار لـ Search Engines Optimization واللتي تعني تهيئة الموقع لمحركات البحث لكي يستطيع المتصفح الوصول إلى موقعك بسهولة عن طريق محركات البحث.                                    
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>هل تقدمون خدمة الـ SEO من ضمن خدمة تصميم الموقع؟</div>
                                <div class="panel1">
                                    <p>لدينا خدمتان في مجال الـ SEO، الخدمة الأولى هي الـ SEO الأساسي والذي يشمل على عمل SEO داخلي لجميع صفحات الموقع، تهيئة الموقع لمحركات البحث، تسريع الموقع وتخفيف حجمه وتأمينه – إدراج صفحات الموقع في محركات البحث. هذه الخدمات كلها مشمولة من ضمن خدمة تصميم المواقع.</p>
                                    <p>أيضا نقدم خدمة الـ SEO الإحترافي واللتي تشمل على جميع الخدمات السابقة بالإضافة إلى:</p>
                                    <p>البحث المفصل في الكلمات المفتاحية وتنسيق صفحات الموقع بما يناسب الكلمات المستهدفة.<br>إنشاء محتوى تسويقي هادف عن طريق كتابة مقالات بشكل شهري واستهداف كلمات مفتاحية محددة لجذب العملاء المهتمين والتغلب على المنافسين.<br>بناء الـ Backlinks لتحسين ترتيب الموقع في محركات البحث.</p>
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