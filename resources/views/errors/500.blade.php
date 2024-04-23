@extends('layouts.site')

@section('title', "هذه الصفحة غير متوفرة")
@section('content')
  <!-- 404 content -->
  <section class="pt-5 pb-5 bg-light">
    <div class="container">
        <div class="not-found text-center">
            <img src="{{ asset('home/img/404.png') }}" alt="" data-animate="shake" data-delay="1.3">
            <span class="roboto" data-animate="fadeInUp" data-delay=".1">Oops!</span>
            <p data-animate="fadeInUp" data-delay=".2">الصفحة التي تبحث عنها فير موجودة أو تم نقلها.</p>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <a href="{{ route('home') }}" data-animate="fadeInUp" data-delay=".2"><i class="fas fa-home"></i> العودة للصفحة الرئيسية</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of 404 content -->

@endsection
