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
                                <h1 style="color: #25bbcc;">خدمة إنشاء و إدارة الحملات الإعلانية</h1>
                                <h4 style="color: #177788;">مجال العمل:</h4>
                                <ul class="">
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fab fa-google"></i> </span>
                                        <span class="list-text">إنشاء وإدارة إعلانات جوجل - Google</span>
                                    </li>
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fab fa-instagram"></i> </span>
                                        <span class="list-text">إنشاء وإدارة إعلانات انستجرام - Instagram</span>
                                    </li>
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fab fa-snapchat-ghost"></i> </span>
                                        <span class="list-text">إنشاء وإدارة إعلانات سناب شات - Snapchat</span>
                                    </li>
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fab fa-twitter"></i> </span>
                                        <span class="list-text">إنشاء وإدارة إعلانات تويتر - Twitter</span>
                                    </li>
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fab fa-facebook-f"></i> </span>
                                        <span class="list-text">إنشاء وإدارة إعلانات فيسبوك - Facebook</span>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="199.994" height="257.353"
                                        viewBox="0 0 394 507">
                                        <image id="mobile" width="394" height="507"
                                            xlink:href="data:img/png;base64,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">
                                        </image>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">إنشاء وإدارة إعلانات جوجل - Google</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">تملك محركات البحث القوى العظمى على شبكة الإنترنت وهي أهم عوامل تطور الأعمال حول العالم، حيث تتم حوالي 5.8 مليار عملية بحث يوميًا على محركات البحث المختلفة، ومن خلال خدمة إنشاء وإدارة الحملات الإعلانية نعمل على إستهداف المهتمين بمجال عملك محليا ومن جميع أنحاء العالم وذلك من خلال خبرتنا في استخدام الكلمات المفتاحية المناسبة لكل نشاط تجاري.</p>
                                    <p style="color: #202223; font-weight: 500;">نعمل على إستهداف عملائك من خلال الموقع الجغرافي، الاهتمامات، الفئة العمرية، الجنس، نوع الجهاز المستخدم في البحث (جوال أو تابلت أو كمبيوتر) بالإضافة إلى العديد من الفلاتر التي تسهل للمعلن الوصول بدقة إلى شريحة العملاء المستهدفة، مع إمكانية تخصيص ميزانية يومية أو شهرية للإعلان وإمكانية عمل أكثر من إعلان في نفس الوقت لإختبار كفاءة الإعلان واختيار الأفضل.</p>
                                </div>
                                <div class="p-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/managingAdCampaigns/google.png')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">خدمة إنشاء و إدارة الحملات الإعلانية - جوجل</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">إنشاء وإدارة إعلانات انستجرام - Instagram</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">لا تختلف قوة منصات التواصل الإجتماعي كثيرًا عن محركات البحث، فمنصة إنستجرام تملك أكثر من مليار مستخدم نشط حول العالم مما يجعلها منصة إعلانية جذابة، ومن خلال خبراتنا نقدم خدمة إدارة الحملات الإعلانية على إنستجرام بكافة أشكالها مع استهداف دقيق لعملائك.</p>
                                </div>
                                <div class="p-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/managingAdCampaigns/instagram.png')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">خدمة إنشاء و إدارة الحملات الإعلانية - انستجرام</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">إنشاء وإدارة إعلانات سناب شات - Snapchat</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">يعد سناب شات ثاني أشهر وسيلة للمراسلة والتواصل بعد واتساب في المملكة العربية السعودية حسب إحصائيات 2019، ومع أكثر من 14 مليون مستخدم في المملكة فإن فرصة الإعلان جذابة بالخصوص لمن يستهدف فئة عمرية أصغر من باقي فئات مستخدمي وسائل التواصل الإجتماعي.</p>
                                    <p style="color: #202223; font-weight: 500;">من أبرز مزايا سناب شات قوته في الإعلان المحلي بحيث تظهر على الخريطة وسط المجتمع السنابي، بالإضافة الى إمكانية تطبيق العديد من الفلاتر للوصول للفئة المستهدفة بالتحديد.</p>
                                </div>
                                <div class="p-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/managingAdCampaigns/snapchat.png')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">خدمة إنشاء و إدارة الحملات الإعلانية - سناب شات</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">إنشاء وإدارة إعلانات تويتر - Twitter</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">من أبرز مزايا تويتر إمكانية إعادة التغريد، والتي تساهم في نشر التغريدات إلى أعداد مهولة في حال كان المحتوى جذاب أو مهم للمجتمع، وعلى الرغم من قلة الإعلانات على تويتر إلى أن الإعلان الناجح قد يكون له صدى كبير جدا مقارنة بباقي إعلانات وسائل التواصل الإجتماعي الأخرى ونحن نسعى إلى أن يكون إعلانك كذلك.</p>
                                </div>
                                <div class="p-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/managingAdCampaigns/twitter.png')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">خدمة إنشاء و إدارة الحملات الإعلانية - تويتر</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">إنشاء وإدارة إعلانات فيسبوك - Facebook</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">مازال فيسبوك يتربع على عرش وسائل التواصل الإجتماعي حول العالم من ناحية عدد المستخدمين، ويتميز بقلة تكلفة الإعلان مع إمكانية الوصول إلى جميع طبقات المجتمع، إضافة إلى توفيره إلى العديد من أساليب الإعلان المختلفة وإمكانية فلترة مفصلة للوصول إلى الشريحة المستهدفة تحديداً من الإعلان.</p>
                                </div>
                                <div class="p-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/managingAdCampaigns/facebook.png')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">خدمة إنشاء و إدارة الحملات الإعلانية - فيسبوك</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">إعداد التقارير الشهرية:</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    <p style="color: #202223; font-weight: 500;">لأننا نؤمن بمقولة “لا يمكنك إتقان ما لا يمكنك قياسه” فإنن نعمل بشكل جاد على تجهيز إحصائيات حول كم التفاعل مع إعلاناتك ومتابعة التغيرات اليومية والأسبوعية والشهرية عبر تقرير يوضح كل تلك النقاط حول الشريحة المهتمة بنشاطك وإعلاناتك.</p>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <h3 style="color: #177788;">طريقة عملنا في<br><span style="color: #25bbcc;">إنشاء و إدارة الحملات الإعلانية</span></h3>
                            </div>

                            <div class="col-12 col-md-6 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>1- مناقشة المشروع</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            مناقشة المشروع والمتطلبات، ودراسة سوق العمل وإعلانات المنافسين على محركات البحث ووسائل التواصل.                                            
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
                                            وضع خطة لتحقيق الأهداف من الحملات الإعلانية، وتحديد ميزانية الإعلانات والمنصات لبدأ العمل.
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-12 col-md-6 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>3-إنشاء وإدارة الحملات الإعلانية</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            إنشاء وإدارة الإعلانات على محرك البحث وباقي وسائل التواصل الإجتماعي واستهداف الفئة المطلوبة بالإعلان.
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
                                            تسليم تقارير شهرية توضح التفاعل والزيارات والتكاليف لكل إعلان مع جميع الإحصائيات المهمة.
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
                                <h3 style="color: #177788;">الأسئلة الشائعة عن<br><span style="color: #25bbcc;">إنشاء و إدارة الحملات الإعلانية</span></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>أحتاج خدمة إنشاء و إدارة الحملات الإعلانية، من أين أبدأ؟</div>
                                <div class="panel1">
                                    نحن هنا لمساعدتك! بإمكانك <a href="{{route('contact')}}"><span style="color: #25bbcc;">التواصل معنا</span></a> لمناقشة مشروعك أو بإمكانك <span style="color: #25bbcc;"><a style="color: #25bbcc;" href="{{route('service.order', $service->slug )}}">طلب خدمة إنشاء وإدارة الإعلانات من هنا</a></span>
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>كم مدة عقد إنشاء و إدارة الحملات الإعلانية لديكم؟</div>
                                <div class="panel1">
                                    إدارة الحملات الإعلانية تتم بشكل شهري أو على حسب الاتفاق على بنود الإعلان في العقد.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>كم تكلفة إنشاء و إدارة الحملات الإعلانية؟</div>
                                <div class="panel1">
                                    تكلفة إدارة الإعلانات تتراوح من 500 – 2000 ريال سعودي شهريا أو مايعادلها بالدولار الأمريكي، ويعتمد السعر على عدد الإعلانات وعدد المنصات اللتي سيتم الإعلان عليها.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>ماهي المنصات اللتي يمكنكم الإعلان عليها؟</div>
                                <div class="panel1">
                                    جوجل – سناب شات – انستجرام – تويتر – فيسبوك – بينتريست – لينكد ان
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>هل بإمكاني استخدام الحساب أثناء إعلانكم له؟</div>
                                <div class="panel1">
                                    نعم بالتأكيد، بإمكانك استخدام الحساب ونشر المحتوى او الرد على الرسائل بشكل طبيعي.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>على ماذا تشمل خدمة إنشاء و إدارة الحملات الإعلانية؟</div>
                                <div class="panel1">
                                    تشمل إنشاء الحملات الإعلانية على المنصات المطلوبة، متابعة الإعلانات وإدارتها لتحصيل أكبر عائد، إعداد التقارير عن التفاعل والزيارات والتكلفة وفعالية كل إعلان.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>هل بالإمكان تصميم وكتابة محتوى الإعلان؟</div>
                                <div class="panel1">
                                    نعم نقوم بتقديم خدمة صناعة المحتوى التسويقي بشكل منفصل،وبالإمكان إضافتها لخدمة إنشاء وإدارة الحملات الإعلانية لتصميم منشورات وقصة أو فيديو للإعلان. <a href="{{route('service',$marketingContentService->slug)}}"><span style="color: #25bbcc;">لمعرفة تفاصيل الخدمة، اضغط هنا</span></a>
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>هل بالإمكان إدارة حسابات وسائل التواصل الإجتماعي بالكامل؟</div>
                                <div class="panel1">
                                    نعم بالتأكيد، نقدم خدمة إدارة حسابات التواصل الإجتماعي بشكل منفصل عن خدمة الإعلانات، <a href="{{route('service',$socialMediaService->slug)}}"><span style="color: #25bbcc;">ولمعرفة المزيد عن الخدمة، اضغط هنا</span></a>
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