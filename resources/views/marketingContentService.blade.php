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
                                <h1 style="color: #25bbcc;">خدمة إنشاء المحتوى التسويقي</h1>
                                <h4 style="color: #177788;">مجال العمل:</h4>
                                <ul class="">
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fas fa-pen-nib"></i> </span>
                                        <span class="list-text">كتابة المقالات والمراجعات بما يتوافق مع الـ SEO</span>
                                    </li>
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fas fa-image"></i> </span>
                                        <span class="list-text">تصميم منشورات وسائل التواصل الإجتماعي</span>
                                    </li>
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fas fa-video"></i> </span>
                                        <span class="list-text">تصميم فيديو موشن جرافيك</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6 text-center">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="199.989"
                                        height="199.989" viewBox="0 0 486 486">
                                        <image id="article" width="486" height="486"
                                            xlink:href="data:img/png;base64,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">
                                        </image>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">كتابة المقالات والمراجعات:</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">نعمل على كتابة المقالات والمراجعات نظرًا لأهميتها كنوع أساسي من أنواع التسويق بالمحتوى الذي يتميز بتكلفته المنخفضة ونتائجه الجيدة مع مرور الوقت، حيث نقدم الخدمة للمواقع الإلكترونية والمدونات بما يتوافق مع أهداف المؤسسات والشركات المختلفة مع التركيز على بعض القواعد العلمية، وأهمها تهيئة الموقع لمحركات البحث SEO وهو ما يساعد في التوعية بالعلامة التجارية وبناء الثقة بتقديم المحتوى القيم بالإضافة إلى لجلب الزوار لموقعك وتحويلهم إلى عملاء لخدماتك ومنتجاتك.</p>
                                </div>
                                <div class="p-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/marketingContent/1.jpg')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">إنشاء المحتوى التسويقي - كتابة المقالات والمراجعات</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <h3 style="color: #177788;">تصميم منشورات وسائل التواصل الإجتماعي:</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">تصميم قصص ومنشورات وسائل التواصل الإجتماعي بشكل جذاب ومتوافق مع الهوية البصرية، مع تنسيق محتوى الأعمال بشكل جميل ليعطي مظهرا احترافياً في سوق العمل.</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="p-2 pt-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/marketingContent/2.png')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">إنشاء المحتوى التسويقي - تصميم وتنسيق محتوى وسائل التواصل الإجتماعي</figcaption>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="p-2 pt-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/marketingContent/3.png')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">إنشاء المحتوى التسويقي - تصميم وتنسيق محتوى وسائل التواصل الإجتماعي</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">تصميم فيديو موشن جرافيك:</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">يعد التسويق بالفيديو وسيلة فعاله جداً في الإعلان ولفت الإنتباه، ولذلك نقوم بديزلاين بتقديم خدمة تصميم فيديوهات الموشن جرافيك التوعوية والإعلانية. بالإمكان تصميم فيديو بشكل رأسي لمدة 10 ثواني للنشر على سناب شات وقصة الإنستجرام، أو تصميمه بشكل أفقي وبمدة أطول ليتناسب مع المواقع واليوتيوب وباقي وسائل التواصل الإجتماعي .</p>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <h3 style="color: #177788;">طريقة عملنا في<br><span style="color: #25bbcc;">إنشاء المحتوى التسويقي</span></h3>
                            </div>

                            <div class="col-12 col-md-6 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>1- مناقشة المشروع</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            مناقشة المشروع ومتطلبات العميل والغرض من إنشاء المحتوى، ودراسة سوق العمل والمنافسة.
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
                                            وضع خطة لتحقيق الأهداف من تصميم وإنشاء المحتوى، وتحديد المتطلبات لبدأ العمل.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-12 col-md-6 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>3- إنشاء المحتوى</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            إنشاء التصميم والمحتوى الصوري والنصي بناءا على المتطلبات ووفقا للأهداف السابقة.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-12 col-md-6 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>4- إعتماد ونشر المحتوى</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            مراجعة واعتماد المحتوى، وتسليمه ونشره حسب الإتفاق.
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
                                <h3 style="color: #177788;">الأسئلة الشائعة عن<br><span style="color: #25bbcc;">إنشاء المحتوى التسويقي</span></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>أحتاج خدمة إنشاء المحتوى التسويقي (كتابة مقالات أو تصميم منشورات أو فيديو موشن جرافيك)، من أين أبدأ؟</div>
                                <div class="panel1">
                                    نحن هنا لمساعدتك! بإمكانك <a href="{{route('contact')}}"><span style="color: #25bbcc;">التواصل معنا</span></a> لمناقشة مشروعك أو بإمكانك <span style="color: #25bbcc;"><a style="color: #25bbcc;" href="{{route('service.order', $service->slug )}}">طلب الخدمة من هنا</a></span>
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>كم المدة اللازمة لإنشاء المحتوى التسويقي؟</div>
                                <div class="panel1">
                                    تختلف المدة باختلاف الخدمة والمتطلبات، بالنسبة لكتابة المقالات وتصميم منشورات وسائل التواصل الإجتماعي فيكون التعامل بشكل شهري، أما في حال تصميم فيديو الموشن جرافيك فيتم تسليم العمل في غضون 15 يوم.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>كم تكلفة الخدمة؟</div>
                                <div class="panel1">
                                    تعتمد التكلفة على الخدمة والمتطلبات وعلى حجم المشروع (عدد المقالات أو المنشورات ومدة الفيديو) والوقت اللازم لعمله. لحساب التكلفة بشكل دقيق يرجى التواصل معنا.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>ماهي متطلباتكم لإنشاء المحتوى التسويقي؟</div>
                                <div class="panel1">
                                    تعبئة <a href="{{route('service.order', $service->slug )}}"><span style="color: #25bbcc;">نموذج طلب الخدمة</span></a>، معرفة نشاطك وخدماتك أو منتجاتك، ومعرفة الهدف من إنشاء المحتوى التسويقي للسعي في تحقيقه بأفضل شكل ممكن.
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>كيف تفيدني كتابة المقالات في التسويق؟</div>
                                <div class="panel1">
                                    كتابة المقالات والمراجعات تفيد نشاطك التجاري بعدة جوانب منها:
                                    <ul style="list-style-type: disc;">
                                        <li>بناء الثقة والمصداقية لدى زوار موقعك أو صفحاتك على وسائل التواصل الإجتماعي بإعتبارك خبير في مجالك وفي
                                            الخدمات اللتي تقدمها.</li>
                                        <li>جذب الزوار المهتمين في مجال عملك من محركات البحث إلى موقعك وصفحاتك على وسائل التواصل الإجتماعي بدون عمل أي
                                            إعلانات.</li>
                                        <li>زيادة متابعينك على وسائل التواصل الإجتماعي في حال استخدام مقتفطات من المقالات على هيئة منشورات.</li>
                                        <li>إمكانية التسويق لخدمات أو منتجات متعددة والربح بالعمولة من التسويق.</li>
                                        <li>تحسين ترتيب موقعك في محركات البحث عند كتابة المقالة مع مراعاة شروط الـ SEO، وبالتالي زيادة زوار موقعك
                                            المهتمين في خدماتك ومنتجاتك ومبيعاتك.</li>
                                    </ul>
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>ما هو الـ SEO؟</div>
                                <div class="panel1">
                                    هو اختصار لـ Search Engines Optimization واللتي تعني تهيئة المقال أو الموقع لمحركات البحث لكي يستطيع المتصفح الوصول إلى موقعك بسهولة عن طريق محركات البحث.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>إضافة إلى كتابة المقالات، هل بالإمكان إدارة وتحديث الموقع الإلكتروني بالكامل؟</div>
                                <div class="panel1">
                                    نعم نقدم خدمة إدارة وتحديث الموقع، وتشمل الخدمة على عمل التحديثات بشكل مستمر وتأمين الموقع وعمل النسخ الاحتياطية، وأيضا تشمل على التقارير الشهرية لزوار الموقع. وبالإضافة إلى إمكانية عمل تحديثات مجانية للموقع.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>إضافة إلى تصميم المنشورات، هل بالإمكان إدارة حسابات التواصل الإجتماعي؟</div>
                                <div class="panel1">
                                    نعم بالتأكيد، بإمكانك طلب خدمة إدارة حسابات التواصل الإجتماعي مع خدمة تصميم المنشورات.
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