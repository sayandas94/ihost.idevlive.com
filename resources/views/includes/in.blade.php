<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>

	<!-- Icon -->
	<link rel="icon" href="https://ihost.idevlive.com/assets/favicon.ico" type="image/x-icon">

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Material Symbols Outlined -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<!-- Material Symbols Rounded -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<!-- Material Symbols Sharp -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
	<script>0</script>
	@include('segments.loader')
	<nav class="main-nav z-depth-0">
		<div class="nav-wrapper container">
			<a href="{{ url('') }}" class="brand-logo left" style="left: 0.5rem"><i class="material-symbols-outlined left">storage</i>iHost</a>
			<ul class="left hide-on-med-and-down">
				<li class="location-selector">
					<a href="#location-modal" class="modal-trigger">
						<img src="{{ asset('images/country-flags/united-states.png') }}" alt="" width="32" height="32">
					</a>
				</li>
				<li class="group-nav-item">
					<a href="{{url('domains')}}" class="btn">Domains</a><a href="#domain-options" class="btn" data-id="menu-dropdown"><i class="material-symbols-outlined">keyboard_arrow_down</i></a>
				</li>
				<li class="group-nav-item">
					<a href="{{url('hosting')}}" class="btn">Hosting</a><a href="#hosting-options" class="btn" data-id="menu-dropdown"><i class="material-symbols-outlined">keyboard_arrow_down</i></a>
				</li>
				<li class="group-nav-item">
					<a href="{{url('emails')}}" class="btn">Emails</a><a href="#email-options" class="btn" data-id="menu-dropdown"><i class="material-symbols-outlined">keyboard_arrow_down</i></a>
				</li>
				{{-- <li class="group-nav-item">
					<a href="{{url('help-center')}}" class="btn">Help Center</a><a href="#help-options" class="btn" data-id="menu-dropdown"><i class="material-symbols-outlined">keyboard_arrow_down</i></a>
				</li> --}}
			</ul>

			<ul class="right">
				<li><a href="{{url('cart')}}" class="btn" style="padding: 0 16px; border-radius: 2px"><i class="material-symbols-outlined">shopping_basket</i></a></li>
				@if (session()->has('token'))
				<li><a href="{{url('user/dashboard')}}" class="btn primary hover">Dashboard</a></li>
				@else
				<li><a href="{{url('sign-in')}}" class="btn primary hover">Sign In</a></li>
				@endif
				
			</ul>
		</div>
	</nav>

	@include('segments.dropdown')
	
	@yield('content')

	@include('segments.location')

	<footer class="page-footer">
		<div class="" style="padding: 0 2%">
			<div class="row center-on-small-only">
				<div class="col s6 m6 l2">
					<p class="medium">Shop at iHost</p>
					<p class="small-text"><a href="{{ url('domains') }}" class="grey-text text-darken-2">Domains</a></p>
					<p class="small-text"><a href="{{ url('web-hosting') }}" class="grey-text text-darken-2">Web Hosting</a></p>
					<p class="small-text"><a href="{{ url('wordpress-hosting') }}" class="grey-text text-darken-2">Wordpress Hosting</a></p>
				</div>
				<div class="col s6 m6 l2">
					<p class="medium">Social Media</p>
					<p class="small-text"><a href="https://www.instagram.com/idevlive.official/" class="grey-text text-darken-2 modal-trigger">Instagram</a></p>
					<p class="small-text"><a href="https://www.facebook.com/idevlivellc/" class="grey-text text-darken-2 modal-trigger">Facebook</a></p>
					<p class="small-text"><a href="https://www.linkedin.com/company/idevlive/" class="grey-text text-darken-2 modal-trigger">Linked In</a></p>
				</div>
				<div class="col s6 m6 l2">
					<p class="medium">Help Center</p>
					<p class="small-text"><a href="{{ url('customer-support') }}">Customer Support</a></p>
					<p class="small-text"><a href="{{ url('report-abuse') }}">Report Abuse</a></p>
					<p class="small-text"><a href="{{ url('tutorials') }}">Tutorials</a></p>
					<p class="small-text"><a href="{{ url('help-center') }}">All Options</a></p>
				</div>
				<div class="col s6 m6 l2">
					<p class="medium">About Us</p>
					<p class="small-text"><a href="{{ url('about-ihost') }}">About iHost</a></p>
					<p class="small-text"><a href="https://idevlive.com">About iDevlive</a></p>
					<p class="small-text"><a href="{{ url('contact-us') }}">Contact Information</a></p>
					<!-- <p class="small-text"><a href="https://ihost.idevlive.com/careers">Careers</a></p> -->
				</div>
				<div class="col s6 m6 l2">
					<p class="medium">Information</p>
					<p class="small-text"><a href="https://blogs.idevlive.com" target="_blank">Blog</a></p>
					<p class="small-text"><a href="{{ url('sitemap.xml') }}">Sitemap</a></p>
					<!-- <p class="small-text"><a href="#!">Cookies</a></p> -->
					<p class="small-text"><a href="{{ url('payment-methods') }}">Payment Methods</a></p>
					<p class="small-text"><a href="{{ url('reviews') }}">Reviews</a></p>
				</div>
				<div class="col s6 m6 l2">
					<p class="medium">Legal</p>
					<p class="small-text"><a href="{{ url('terms-of-service') }}">Terms of Service</a></p>
					<p class="small-text"><a href="{{ url('privacy-policy') }}">Privacy Policy</a></p>
					<p class="small-text"><a href="{{ url('refund-policy') }}">Refund Policy</a></p>
				</div>
				<div class="col s12">
					<br>
					<a href="#location-modal" class="btn primary solid modal-trigger">
						<i class="material-symbols-rounded left">public</i>
						<span>India</span>
					</a>
					{{-- <div class="divider" style="margin: 24px 0"></div> --}}
					{{-- <p class="small-text black-text">Copyright © 2017 - {{ date('Y') }} iDevlive Pvt. Ltd. All Rights Reserved. The iDevlive word mark is a registered trademark of iDevlive Pvt. Ltd. in the India and other countries.</p> --}}
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="full-width grey-text text-darken-2 center-on-small-only" style="padding: 0 2%">
				&copy; 2017 - {{ date('Y') }} All Rights Reserved By <a class="primary-text" href="https://idevlive.com">iDevlive</a>
				<span class="right small-text hide-on-small-only" style="line-height: 30px">Prices are listed without GST or taxes</span>
			</div>
		</div>
	</footer>

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script type="text/javascript" src="{{ asset('js/common.js') }}"></script>
	@yield('script')

</body>
</html>