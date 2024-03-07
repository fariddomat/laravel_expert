@extends('layouts.site' )
@section('title')
{{$service->title}}
@endsection

@section('styles')

<style>
    p,
    h2, h3 {
        color: black !important;
    }

    @media (min-width: 64rem){
        .features-section .cluster {
            align-items: flex-start;
            margin-right: 2.5rem;
            margin-top: 0;
            text-align: left;
        }
    }

    @media (min-width: 30rem){
        .features-section .cluster {
            margin-top: 2.5rem;
        }
    }

    .features-section .cluster {
        margin-top: 9.375vw;
        max-width: 33.75rem;
    }
    .cluster {
        align-items: center;
        display: flex;
        flex-direction: column;
        text-align: center;
    }

    .cluster h1, .cluster h2, .cluster h3, .cluster h4, .cluster h5, .cluster h6 {
        margin-bottom: 0;
    }

    .cluster h2, .cluster h3 {
        margin: 0 0 0.5em;
    }
    h3 {
        font-size: 2rem !important;
        font-weight: 600;
    }
    .cluster p {
        font-size: 25px;
        margin-top: 0.5em;
    }
    .cluster p {
        text-align: right;
    }
    .features-section .content {
        max-width: 68.75rem;
        padding-bottom: 2.5rem;
        padding-top: 2.5rem;
    }
    @media (min-width: 40rem){
        .content {
            padding-left: 2.5rem;
            padding-right: 2.5rem;
        }
    }
    .content {
        padding-left: 6.25vw;
        padding-right: 6.25vw;
    }
    .center {
        margin-left: auto;
        margin-right: auto;
    }

    @media (min-width: 64rem){
        .features-section .flex-container {
            flex-direction: row-reverse;
        }
    }
    .features-section .flex-container {
        justify-content: space-between;
    }

    @media (min-width: 64rem){
        .flex-container {
            flex-direction: row;
        }
    }

    .flex-container {
        display: flex;
        flex-direction: column;
    }

    .align-center {
        align-items: center;
        display: flex;
        flex-direction: column;
    }

    @media (min-width: 33.75rem){
        .features-section figure {
            height: 31.25rem;
            min-width: 31.25rem;
            padding-top: 0;
            width: 31.25rem;
        }
    }

    .features-section figure {
        padding-top: 100%;
        position: relative;
        width: 100%;
    }
    .features-section .blob {
        width: 100%;
    }

    .features-section .blob {
        max-height: 100%;
    }

    .features-section figure img, .features-section figure video {
        left: 50%;
        position: absolute;
        top: 50%;
        transform: translate(-50%,-50%);
    }

    @media (min-width: 35.25rem){
        #theme-showcase {
            font-size: 12.6875rem;
        }
    }

    #theme-showcase {
        height: 2.1653em;
        font-size: 36vw;
        left: 50%;
        perspective: 1000px;
        position: absolute;
        top: 50%;
        transform: translate(-50%,-50%);
        width: 1em;
        z-index: 1;
    }

    #theme-showcase img {
        border-radius: 0.12em;
        box-shadow: -0.05em 0.05em 0.15em rgb(0 0 0 / 40%), -0.1em 0.1em 0.3em rgb(50 50 93 / 50%);
        font-size: inherit;
        opacity: 0;
        left: 0;
        top: 0;
        pointer-events: none;
        transform: translateX(-0.5625em) scale(.7) rotateY(12deg);
        transition: .6s;
        transition-delay: .25s;
        width: 100%;
        z-index: 1;
    }
    .swiper{
        width: 200px;
        max-height: 350px;
    }
    .swiper img {
        width: 100%;
        height: auto;
        border-radius: 15px;
        object-fit: contain;
    }
    .mt-10, .my-10 {
        margin-top: 5rem !important;
    }
</style>
<link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}">
@endsection

@section('scripts')
<script src="{{asset('js/swiper-bundle.min.js')}}"></script>
<script>
swiper = new Swiper('.swiper', {
		// Optional parameters
        effect: "cards",
        grabCursor: true,
		loop: true,
		spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
		keyboard: {
          enabled: true,
        },
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
                    </div>
                    <div>
                        <div class="container mt-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{asset('images/digitalCard/cardchk-info.webp')}}" class="img-fluid"
                                        style="max-height: 580px;">
                                </div>
                                <div class="col-md-6 d-flex align-items-center">
                                    <div>
                                        <h2 class="mt-3">كرت شخصي إلكتروني 100% بدون تلامس</h2>
                                        <p class="mt-3">لا تخاف من إنتقال العدوى أثناء تسليمك لكرتك الشخصي لأن كرتك
                                            الإلكتروني صار على رابط.</p>
                                        <div class="margin--top-c7"
                                            style="margin-top: 2rem; color: rgba(36, 28, 21, 0.65);">
                                            <a class="ctaPrimary ctaPrimary--small"
                                                style="margin-top: 8px!important; background: linear-gradient(270deg, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%) !important;    border-radius: 12px; #007c89; margin: 0px; padding: 0.5125rem; border: none; font-size: 1.275rem; vertical-align: baseline; color: #ffffff; text-decoration-line: none; display: inline-block; text-align: center; box-sizing: border-box; cursor: pointer; appearance: none; font-weight: 600; transition: all 0.15s linear 0s; min-width: 7.5rem; width: 140px;"
                                                href="https://digitsmark.com/ar/vcard/adulkader"
                                                data-onclickmeta="{">المثال التجريبي</a>
                                            <a class="ctaPrimary ctaPrimary--small"
                                                style="margin-top: 8px!important; background: linear-gradient(270deg, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%) !important;    border-radius: 12px; #007c89; margin: 0px; padding: 0.5125rem; border: none; font-size: 1.275rem; vertical-align: baseline; color: #ffffff; text-decoration-line: none; display: inline-block; text-align: center; box-sizing: border-box; cursor: pointer; appearance: none; font-weight: 600; transition: all 0.15s linear 0s; min-width: 7.5rem; width: 140px;"
                                                href="{{route('service.order', $service->slug )}}"
                                                data-onclickmeta="{">إطلب كرتك</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section id="highlighted-features1" class="features-section1 pt-5">
                            <section id="personalize-profile1">
                                <div class="row">
                                    <div class="col-12 col-md-6 cluster">
                                        <h3>تعرف على الكرت الإلكتروني!</h3>
                                        <p class="body-text"> الكرت الشخصي الإلكتروني عبارة عن صفحة على الويب برابط
                                            خاص يمكن مشاركتها مع أي شخص وفي أي مكان في العالم ومحتوى الكرت يسمح لك
                                            إضافة روابط حساباتك على السوشيال مديا وغيرها بحيث يتفاعل معها الزائر على
                                            عكس الكرت العادي ويمكن إضافة مقاطع فيديو وصور ويمكن تصميم صفحة الكرت
                                            بالطرية المناسبة والتعديل عليها في أي وقت. #سوق_ لنفسك_ بذكاء </p>
                                    </div>
                                    <div class="col-12 col-md-6" style="background-image: url('{{asset('images/digitalCard/blob-7.svg')}}'); background-size: contain; background-repeat: no-repeat;">
                                        <div class="swiper">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img class="friendly" src="{{asset('images/digitalCard/1.webp')}}">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img class="warm" src="{{asset('images/digitalCard/2.webp')}}">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img class="blue" src="{{asset('images/digitalCard/3.webp')}}">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img class="pastel" src="{{asset('images/digitalCard/4.webp')}}">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img class="purple" src="{{asset('images/digitalCard/5.webp')}}">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img class="luxury" src="{{asset('images/digitalCard/6.webp')}}">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img class="neon" src="{{asset('images/digitalCard/7.webp')}}">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img class="default" src="{{asset('images/digitalCard/8.webp')}}">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img class="stitched" src="{{asset('images/digitalCard/9.webp')}}">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img class="dark" src="{{asset('images/digitalCard/10.webp')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </section>
                        </section>

                        <div class="container mt-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{asset('images/digitalCard/presentation4.svg')}}" class="img-fluid" style="max-height: 580px;">
                                </div>
                                <div class="col-md-6 d-flex align-items-center">
                                    <div>
                                        <h2 class="mt-3" style="font-size: 27px;">انطلق الآن!</h2>
                                        <p class="mt-3" style="font-size: 24px;">صمم كرتك الشخصي اليوم بالباقة المجانية وشاركه مع العالم.</p>
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