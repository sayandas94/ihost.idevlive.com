@extends('includes.in')

@section('title', 'iHost - Secure, Fast & Reliable Web Hosting Solution')

@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<span class="small-text medium">Hosting Solutions from iHost</span>
				<h4 class="header-text">Select hosting which suits your needs.</h4>
				<p class="semi-bold">Up to <span class="primary-text">75% off</span> on selected hosting solutions</p>
				<br>
				<p>
					<img src="{{ asset('images/icons/uptime-gurantee.svg') }}" alt="" width="24" height="24" style="float: left; margin-right: 15px">
					Guranteed 99.9% Uptime
				</p>
				<p>
					<img src="{{ asset('images/icons/ssd.svg') }}" alt="" width="24" height="24" style="float: left; margin-right: 15px">
					Faster speed, courtesy of NVMe SSDs
				</p>
				<p>
					<img src="{{ asset('images/icons/247-support.svg') }}" alt="" width="24" height="24" style="float: left; margin-right: 15px">
					24/7 Support
				</p>
			</div>
			<div class="col s12 m6 l7">
				{{-- <img src="{{asset('images/website/vps.avif')}}" class="responsive-img hide-on-small-only" alt="how to buy domain name in india" loading="lazy" /> --}}
				<div class="card-panel grey lighten-1 z-depth-0" style="aspect-ratio: 1.6"></div>
			</div>
		</div>
	</div>
</section>

<section class="white hide-on-small-only" style="position: sticky; top: 64px; z-index: 97; padding: 12px 0">
	<div class="container">
		<nav class="scrollspy-nav">
			<div class="nav-wrapper">
				<ul class="left">
					{{-- <li><a href="#top"><img src="{{ asset('images/icons/up.svg') }}" alt=""></a></li> --}}
					<li><a href="#basic-hosting">Basic Hosting</a></li>
					<li><a href="#managed-hosting">Managed Hosting</a></li>
					<li><a href="#advanced-hosting">Advanced Hosting</a></li>
				</ul>
			</div>
		</nav>
	</div>
</section>

<section class="scrollspy" id="basic-hosting">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h4 class="header-text">Basic Hosting</h4>
				<p class="grey-text">Cost-effective hosting that delivers secure, reliable performance.</p>
				<br>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box center-align" style="border-radius: 8px;">
					<h5 class="semi-bold">Web Hosting</h5>
					<p>Our most economical hosting - works with basic websites. Select plans include free domain and email.</p>

					<span class="small-text">Starting at</span>
					<h3 class="medium" style="margin-top: 10px">₹ 25.00 <span class="small-text">/ Mo</span></h3>

					<a href="{{ url('web-hosting') }}" class="btn-flat btn-large primary full-width" style="font-weight: 500">Explore Web Hosting</a>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="container">
	<div class="divider" style="margin: 2% 0"></div>
</div>

<section class="scrollspy" id="managed-hosting">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h4 class="header-text">Managed Hosting</h4>
				<p class="grey-text">Ideal for WordPress sites and stores.</p>
				<br>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box center-align" style="border-radius: 8px;">
					<h5 class="semi-bold">Managed WordPress</h5>
					<p>A fully-managed WordPress site with built-in security, daily backups and automatically updated.</p>

					<span class="small-text">Starting at</span>
					<h3 class="medium" style="margin-top: 10px">₹ 49.00 <span class="small-text">/ Mo</span></h3>

					<a href="{{ url('wordpress-hosting') }}" class="btn-flat btn-large primary full-width" style="font-weight: 500">Explore Wordpress Hosting</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box center-align" style="border-radius: 8px;">
					<h5 class="semi-bold">WooCommerce</h5>
					<p>A fully-managed WordPress Ecommerce platform with WooCommerce extensions auto installed.</p>

					<span class="small-text">Starting at</span>
					<h3 class="medium" style="margin-top: 10px">₹ 99.00 <span class="small-text">/ Mo</span></h3>

					<a href="{{ url('ecommerce-hosting') }}" class="btn-flat btn-large primary full-width" style="font-weight: 500">Explore eCommerce Hosting</a>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="container">
	<div class="divider" style="margin: 2% 0"></div>
</div>

<section class="scrollspy" id="advanced-hosting">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h4 class="header-text">Advanced Hosting</h4>
				<p class="grey-text">Powerful and reliable VPS for advanced hosting needs.</p>
				<br>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box center-align" style="border-radius: 8px;">
					<h5 class="semi-bold">VPS Hosting</h5>
					<p>Dedicated Virtual Private Servers for your heavy duty applications which can be scaled on demand.</p>

					<span class="small-text">Starting at</span>
					<h3 class="medium" style="margin-top: 10px">₹ 1999.00 <span class="small-text">/ Mo</span></h3>

					<a href="{{ url('virtual-private-server') }}" class="btn-flat btn-large primary full-width" style="font-weight: 500">Explore VPS Hosting</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box center-align" style="border-radius: 8px;">
					<h5 class="semi-bold">Windows Server</h5>
					<p>Create flexible and managed virtual desktop enviornment for running Windows apps.</p>

					<span class="small-text">Starting at</span>
					<h3 class="medium" style="margin-top: 10px">₹ 3999.00 <span class="small-text">/ Mo</span></h3>

					<a href="{{ url('virtual-private-server') }}" class="btn-flat btn-large primary full-width" style="font-weight: 500">Windows Desktop Server</a>
				</div>
				{{-- <div class="card-panel z-depth-0 grey lighten-3">
					<h5 class="semi-bold">Windows Server</h5>
					<p>A fully-managed WordPress Ecommerce platform with WooCommerce extensions, including integrated payment processing.</p>

					<br>

					<span class="small-text">Starting at</span>
					<h3 class="medium" style="margin-top: 10px">$ 3.00 <span class="small-text">/ Mo</span></h3>

					<a href="{{ url('ecommerce-hosting') }}" class="btn-large grey darken-4 full-width">Explore eCommerce Hosting</a>
				</div> --}}
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
	<script src="{{ asset('js/web/web-hosting.js') }}"></script>
@endsection