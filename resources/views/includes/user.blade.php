<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Title -->
		<title>@yield('title')</title>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<link type="text/css" rel="stylesheet" href="{{ asset('css/stylesheet.css') }}"  media="screen,projection"/>

		<!-- Icon -->
		<link rel="icon" href="https://ihost.idevlive.com/assets/favicon.ico" type="image/x-icon">

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<meta name="keywords" content="">
		<meta name="description" content="">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />

		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

		<!-- Apple Touch Icon -->
		<link rel="apple-touch-icon" href="https://ihost.idevlive.com/assets/apple-touch-icon.png"/>

		<!-- Canonical -->
		<link rel="canonical" href="https://ihost.idevlive.com/">

		<!-- Open Graph data -->
		<meta property="og:title" content="Domain Names & Website Hosting" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="https://ihost.idevlive.com/assets/icons/og-image.png">
		{{-- <meta property="og:url" content="{{ $page }}" /> --}}
		<meta property="og:description" content="Take your business online with iHost, a web hosting platform and domain registration. Buy domains, web hosting and enjoy award-winning support." />
		<meta property="og:site_name" content="iHost" />
	</head>

	<body>
		<script>0</script>
		@include('segments.loader')
		<section class="left-sidebar hide-on-med-and-down">
			<div class="card-panel">
				<nav>
					<div class="nav-wrapper">
						<a href="{{ url('') }}" class="brand-logo black-text semi-bold"><i class="material-icons" style="color: var(--primary)">storage</i>iHost</a>
					</div>
				</nav>

				<div>
					<p>
						<a href="{{ url('user/dashboard') }}" class="btn-large btn-flat nav-btn" data-id="dashboard">
							<i class="material-symbols-rounded left">dashboard</i>
							Dashboard
						</a>
					</p>
					<p>
						<a href="{{ url('user/domains') }}" class="btn-large btn-flat nav-btn" data-id="domains">
							<i class="material-symbols-rounded left">language</i>
							Domains
						</a>
					</p>
					<p>
						<a href="{{ url('user/hosting') }}" class="btn-large btn-flat nav-btn" data-id="hosting">
							<i class="material-symbols-rounded left">hard_drive</i>
							Hosting
						</a>
					</p>
					<p>
						<a href="{{ url('user/emails') }}" class="btn-large btn-flat nav-btn" data-id="emails">
							<i class="material-symbols-rounded left">outgoing_mail</i>
							Emails
						</a>
					</p>
					<div class="divider"></div>
					<p>
						<a href="{{ url('user/account') }}" class="btn-large btn-flat nav-btn" data-id="account">
							<i class="material-symbols-rounded left">person</i>
							Account
						</a>
					</p>
					<p>
						<a href="{{ url('user/billing') }}" class="btn-large btn-flat nav-btn" data-id="billing">
							<i class="material-symbols-rounded left">receipt</i>
							Billing
						</a>
					</p>
				</div>
				<div>
					<p>
						<a href="{{ url('help-center') }}" class="btn-large btn-flat nav-btn">
							<i class="material-symbols-rounded left">contact_support</i>
							Help Center
						</a>
					</p>
					<p>
						<a href="{{ url('user/logout') }}" class="btn-large btn-flat nav-btn">
							<i class="material-symbols-rounded left">logout</i>
							Logout
						</a>
					</p>
				</div>
			</div>
		</section>

		<main>
			<section style="padding: 24px 0">
				<div class="card-panel z-depth-0" style="padding: 0">
					{{-- <div class="row">
						<div class="col s12">
							<nav class="white z-depth-0">
								<div class="nav-wrapper">
									<a href="#!" class="brand-logo black-text medium" style="pointer-events: none">Welcome back! Sayan Das</a>
									<a href="#!" class="brand-logo black-text medium" style="pointer-events: none">Welcome back! {{ $profile->name }}</a>

									<ul class="right">
										<li><a href="{{ url('cart') }}" class="btn-flat"><i class="material-symbols-rounded black-text" style="line-height: 36px">shopping_basket</i></a></li>
									</ul>
								</div>
							</nav>
						</div>
					</div> --}}
					<nav class="white z-depth-0">
						<div class="nav-wrapper">
							<a href="#!" class="brand-logo black-text medium" style="pointer-events: none; margin-left: 0.75rem">Welcome back! <span data-id="username"></span></a>
							{{-- <a href="#!" class="brand-logo black-text medium" style="pointer-events: none">Welcome back! {{ $profile->name }}</a> --}}

							<ul class="right">
								<li><a href="{{ url('cart') }}" class="btn-flat"><i class="material-symbols-rounded black-text" style="line-height: 36px">shopping_basket</i></a></li>
							</ul>
						</div>
					</nav>
					@yield('content')
				</div>
			</section>
		</main>

		<section class="right-sidebar hide-on-med-and-down">
			<div class="flexbox red" style="height: 150px; width: 150px; border-radius: 200px; color: #fff; justify-content: center; align-items: center">
				<p style="font-size: 3rem" class="semi-bold">SD</p>
			</div>
			<span style="text-decoration: underline; margin-top: 16px">Change Photo</span>
			<p></p>
			<h5 data-id="username"></h5>
			<div class="divider" style="width: 70%; margin: 20px 0"></div>
			<p data-id="useremail"></p>
			{{-- <p>{{ $profile->email }}</p> --}}
			<p>
				Customer ID : 736173821
				<br>
				Support Pin : <a href="{{ url('user/account') }}" style="color: #ffffff; text-decoration: underline">Setup</a>
			</p>
		</section>

		<div id="error-screen" data-id="error-screen" class="hide">
			<img src="{{ asset('images/website/network-error.svg') }}" alt="" style="width: 20%">
			<h5>Network Error</h5>
			<p><a href="{{ url()->current() }}" class="btn-flat primary" style="pointer-events: auto">Click here to reload the page</a></p>
		</div>
		
		<!--JavaScript at end of body for optimized loading-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script type="text/javascript" src="{{ asset('js/user.js') }}"></script>
		{{-- <script type="text/javascript" src="{{ asset('js/user.js') }}"></script> --}}
		<!-- Custom JS -->
		@yield('script')
	</body>
</html>