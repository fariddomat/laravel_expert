<!DOCTYPE HTML>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
	<meta charset="utf-8">
	<title>{{ $customer->slug }}</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	@if (app()->getLocale() == 'ar')
	<link rel="stylesheet" href="{{asset('css/bootstrapRTL.min.css')}}">
    @else
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    @endif
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('customerTemplate/css/templatemo-blue.css')}}">
	<link rel="stylesheet" href="{{asset('customerTemplate/css/template.css')}}">
	<link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}">
	<link rel="stylesheet" href="{{asset('noty/noty.css')}}">
	<link href="{{asset('css/fonts.css')}}" rel="stylesheet" >
    <script src="{{asset('noty/noty.min.js')}}" defer></script>
	<style>
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			/* display: none; <- Crashes Chrome on hover */
			-webkit-appearance: none;
			margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
		}
		input[type=number] {
			-moz-appearance:textfield; /* Firefox */
		}
		.arrow-gif{
			bottom: 20px;
			right: 15px;
		}
        .contact-icons li a {
            width: 90px;
            height: 90px;
            line-height: 90px;
            font-size: 42px;
        }
	</style>
</head>

<body data-spy="scroll" data-target=".navbar-collapse">

	<div class="arrow-gif position-fixed">
		<img src="{{asset('customerTemplate/images/arrow.gif_400')}}" style="width: 75px; height: auto;" alt="">
	</div>
	<!-- header section -->
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<img src="{{Storage::disk('s3')->url($customer->main_image)}}" class="img-responsive img-circle tm-border main-image rounded-circle"
						alt="image">
					<hr>
					{!!$customer->name!!}
					{!!$customer->about!!}
				</div>
				@if($customer->blogs)
				<div class="col-md-12 col-sm-12">
					<a href="{{route('customer.blogs',$customer->slug)}}" class="text-decoration-none" style="font-size: 18px;">@lang('customer.my_blog')</a>
				</div>
				@endif
                <div class="col-md-12 col-sm-12">
                    <ul class="social-icons contact-icons mt-3">
                        <li><a href="https://api.whatsapp.com/send?phone={{$customer->whatsapp}}" class="fab fa-whatsapp" target="_blank"></a></li>
                    </ul>
                </div>
			</div>
		</div>
	</header>
	<!-- contact and experience -->
	<section class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="experience custom-div">
					<h2>@lang('customer.services')</h2>
					<div class="experience-content">
						{!! $customer->services !!}
					</div>
				</div>
			</div>
			@if($customer->contact_us_form)
			<div class="col-md-12 col-sm-12">
				<div class="experience custom-div">
					<h2>@lang('customer.contact_us')</h2>
					<div class="experience-content">
						<form id="contactFrom" method="post" action="{{route('customer.contact',$customer->id)}}" class="row">
							@csrf()
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="name" value="" class="form-control"
										placeholder="@lang('customer.name')" required>
								</div>
							</div>
							<div class="col-md-6">
								<input type="number" min="0" name="mobile" value="" class="form-control"
									placeholder="@lang('customer.mobile')" required>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" name="email" value="" class="form-control"
										placeholder="@lang('customer.email')">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="message" id="message" cols="30" rows="4" class="form-control"
										placeholder="@lang('customer.message')"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<button id="btn-submit" type="submit" class="btn btn-primary">
										@lang('customer.send_message')
										<span id="btn-spinner" style="display: none;" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
									</button>
								</div>
							</div>
						
						</form>
					</div>
				</div>
			</div>
			@endif
			<div class="col-md-12 col-sm-12">
				<div class="experience gallery-div">
					<h2>@lang('customer.gallery')</h2>
					<div class="experience-content">
						<!-- Slider main container -->
						<div class="swiper">
							<!-- Additional required wrapper -->
							<div class="swiper-wrapper">
							<!-- Slides -->						
							@foreach($gallery as $galleryImage)
							<div class="swiper-slide">
								<img src="{{Storage::disk('s3')->url($galleryImage->image)}}" alt="{{ basename($galleryImage->image) }}" style="object-fit: cover; width: 100%;" />
							</div>
							@endforeach
							</div>
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
							<div class="swiper-pagination"></div>					
						</div>						
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- footer section -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<p>@lang('customer.copyright') &copy; {{ now()->year }} @lang('customer.created_by') <a href="{{route('home')}}" target="_blank"
							style="color: #fff; text-decoration: none;">Digitsmark</a> </p>
					<ul class="social-icons">
						<li><a href="{{ LaravelLocalization::getLocalizedURL($locale, null, [], true) }}" class="fas fa-language"></a></li>
						<li><a href="https://api.whatsapp.com/send?text={{route('customer',$customer->slug)}}" class="fab fa-whatsapp" target="_blank"></a></li>
						<li><a href="sms:?&body={{route('customer',$customer->slug)}}" class="fas fa-sms" target="_blank"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	<!-- javascript js -->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('customerTemplate/js/jquery.backstretch.min.js')}}"></script>
	<script>
		var backgroundImages = [];
		@foreach($vcardImages as $vcardImage)
		backgroundImages[{{$loop->index}}] = '{{Storage::disk('s3')->url($vcardImage->image)}}';
		@endforeach
	</script>
	<script src="{{asset('customerTemplate/js/custom.js')}}"></script>
	<script src="{{asset('js/swiper-bundle.min.js')}}"></script>
	<script>
	swiper = new Swiper('.swiper', {
		// Optional parameters
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
		// If we need pagination
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});
    $('#contactFrom').submit(function() {
        $('#btn-submit').prop("disabled", true);
        $('#btn-spinner').show();
        return true;
    }); 
	</script>
	@include('partials._session')
	<script>
		$(window).scroll(function() {
			if($(window).scrollTop() + $(window).height() > $(document).height() -100 ) {
				$('.arrow-gif').hide();
			}
			else {
				$('.arrow-gif').show();
			}
		});
	</script>
</body>

</html>