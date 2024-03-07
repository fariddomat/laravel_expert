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
                                <h1 style="color: #25bbcc;">خدمة تصميم الهوية التجارية والشعارات</h1>
                                <h4 style="color: #177788;">مجال العمل:</h4>
                                <ul class="">
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fas fa-tv"></i> </span>
                                        <span class="list-text">تصميم الشعارات</span>
                                    </li>
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fas fa-store"></i> </span>
                                        <span class="list-text">تصميم الهوية التجارية</span>
                                    </li>
                                    <li class="">
                                        <span class="list-icon">
                                            <i aria-hidden="true" class="fab fa-google"></i> </span>
                                        <span class="list-text">تصميم بنرات وسائل التواصل الإجتماعي</span>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-12 col-md-6 text-center">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200.01" height="200.01" viewBox="0 0 483 483"><image id="brand" width="483" height="483" xlink:href="data:img/png;base64,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"></image></svg>
                                </div>

                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: #177788;">تصميم الشعارات:</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    تصميم الشعار مسؤول عن جزء كبير من الإنطباع الأول عن علامتك التجارية لدى العملاء؛ لذلك من المهم أن يكون تصميم هذا الشعار احترافيًا وواضحًا وسهل الفهم بالقدر الذي يسمح له بالارتباط بشكل إيجابي بعلامتك التجارية في ذهن عملائك. في ديزلاين نقوم بتصميم وتطوير الشعارات وفقًا لمعايير علمية حسب مجال عملك ونقوم بتزويدك باستخدامات الشعار والخطوط والألوان لتوحيد مظهر الهوية البصرية لخدماتك ومنتجاتك والظهور باحترافية أمام عملائك.
                                </div>
                                <div class="p-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/visualIdentity/1.jpg')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">خدمة تصميم الهوية التجارية والشعارات - تصميم شعار</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 class="" style="color: #177788;">تصميم الهوية التجارية:</h3>
                                <div style="color:#202223; font-size: 20px;">تمثل الهوية التجارية حجر أساس لبناء الثقة، وتعكس مبادئ وقيم الفرد أو الشركة، بعض الشعارات تعطي إيحاء بالفخامة والأهمية، والبعض الآخر قد يوحي بالبساطة والسهولة في التعامل، لذلك من المهم تصميم الهوية التجارية بشكل احترافي يعكس مبادئ عملك. نقوم بديزلاين بتقديم خدمة تصميم الهوية البصرية / التجارية بشكل متكامل لتعطي انطباع يعلق في ذهن العملاء وبشكل احترافي ومتسق في جميع المطبوعات الورقية والمنشورات الرقمية.</div>
                                <div class="p-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/visualIdentity/2.jpeg')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">خدمة تصميم الهوية التجارية والشعارات</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h3 class="" style="color: #177788;">تصميم بنرات وسائل التواصل الإجتماعي:</h3>
                                <div style="color:#202223; font-size: 20px;">
                                    حن متأكدون من أن وسائل التواصل الإجتماعي هي الواجهة الأهم لكافة الشركات حول العالم في الوقت الحالي وباتت تمثل جزءً من الهوية البصرية الرقمية للشركات. ولهذا نقوم في ديزلاين بتقديم خدمة تصميم بنرات جميع شبكات التواصل الإجتماعي وفق خبراتنا التي تتفق مع معايير الشبكات المختلفة والتي نستطيع من خلالها توحيد هوية نشاطك.</div>
                                <div class="p-5 text-center">
                                    <img style="border-radius: 20px; box-shadow: 5px 5px 50px 0px rgb(23 119 136 / 15%);
                                    vertical-align: middle; display: inline-block;" src="{{asset('images/visualIdentity/3.png')}}" alt="">
                                    <figcaption class="text-center" style="color: #c7d9dd;">خدمة تصميم الهوية التجارية والشعارات</figcaption>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <h3 style="color: #177788;">طريقة عملنا في<br><span style="color: #25bbcc;">تصميم الهوية التجارية والشعارات</span></h3>
                            </div>

                            <div class="col-12 col-md-6 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3> 1- مناقشة الفكرة	</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">
                                            مناقشة الفكرة التصميمية ومتطلبات العميل، ودراسة تصاميم الشعارات في مجال العمل.	</div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-12 col-md-6 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>2- تحديد الأهداف	</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">			
                                            الشعار يعبر عن هوية عملك ونشاطك، لذلك من المهم تحديد الهدف من الشعار للمتلقي لتصميمه بأفضل شكل.						
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-12 col-md-6 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>3- مرحلة التصميم</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">			
                                            تصميم الشعار والهوية التجارية وعرض نماذج لتطبيق التصميم رقميا وعلى المطبوعات الورقية.						
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-12 col-md-6 mt-3">
                                <div class="flip-box">
                                    <div class="flip-box-inner">
                                      <div class="flip-box-front">
                                        <h3>4- تسليم العمل</h3>
                                      </div>
                                      <div class="flip-box-back">
                                        <div class="">			
                                            مراجعة واعتماد التصميم وتسليم ملفات العمل بجودة عالية.						
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
                                <h3 style="color: #177788;">الأسئلة الشائعة عن<br><span style="color: #25bbcc;">تصميم الهوية التجارية والشعارات</span></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                
                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>أحتاج تصميم شعار وهوية تجارية، من أين أبدأ؟</div>
                                <div class="panel1">
                                    نحن هنا لمساعدتك! بإمكانك <a href="{{route('contact')}}"><span style="color: #25bbcc;">التواصل معنا</span></a> لمناقشة مشروعك أو بإمكانك <span style="color: #25bbcc;"><a style="color: #25bbcc;" href="{{route('service.order', $service->slug )}}">طلب الخدمة من هنا</a></span>
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>كم المدة اللازمة لتصميم الهوية التجارية؟</div>
                                <div class="panel1">
                                    تختلف المدة باختلاف المتطلبات، المدة المتوسطة لإنجاز هوية تجارية متكاملة تترواح من 10-15 يوم.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>كم يكلف تصميم الهوية التجارية؟</div>
                                <div class="panel1">
                                    تعتمد تكلفة التصميم دائمًا على المتطلبات والوقت اللازم لإنجاز العمل، ولكن بالمجمل فإن تكلفة تصميم الهوية البصرية تبدأ من 1,500 وحتى 2,500 ريال سعودي أو مايعادلها بالدولار الأمريكي.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>ماهي متطلباتكم للبدأ بالتصميم؟</div>
                                <div class="panel1">
                                    تعبئة <a href="{{route('service.order', $service->slug )}}"><span style="color: #25bbcc;">نموذج طلب الخدمة</span></a>، تحديد النشاط والألوان المفضلة إن وجد، أيضا بالإمكان إرفاق أمثلة لشعارات حازت على إعجابك لإستيحاء فكرة التصميم المبدأية 
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>على ماذا تشمل خدمة تصميم الهوية التجارية؟</div>
                                <div class="panel1">
                                    تشمل على تصميم الشعار مع استخداماته، تصميم جميع المطبوعات اللازمة، تصميم بنرات وسائل التواصل الإجتماعي، تسليم ملفات التصميم شاملة للألوان والخطوط المستخدمة.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>ماهي صيغ ملفات التسليم؟</div>
                                <div class="panel1">
                                    بعد مراجعة وإعتماد التصميم، يتم تسليم جميع ملفات العمل بصيغة Ai – PSD  – JPG – PNG – PDF
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>كم عدد المراجعات لتصميم الشعار والهوية التجارية؟</div>
                                <div class="panel1">
                                    3 مراجعات لتصميم الشعار، ومراجعتان لتصميم الهوية.
                                </div>

                                <div class="accordion1"><i class="fas fa-caret-left pr-3"></i>هل تقدمون خدمة تصميم المحتوى لوسائل التواصل الإجتماعي؟</div>
                                <div class="panel1">
                                <p>نعم، نقدم خدمة تصميم وكتابة المحتوى سواءا للموقع الإلكتروني أو لمنصات وسائل التواصل الإجتماعي، وبإمكانك التعرف على <a href="{{route('service',$serviceMarketing->slug)}}"><span style="color: #25bbcc;">تفاصيل الخدمة من هنا</span></a>.</p>
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