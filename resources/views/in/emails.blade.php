@extends('includes.in')

@section('title', 'iHost - Secure, Fast & Reliable Web Hosting Solution')

@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<span class="small-text medium">Business Email</span>
				<h4 class="header-text">Build your brand with a Custom Email.</h4>
				<p class="semi-bold">Up to <span class="primary-text">75% off</span> on Business Emails</p>
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
				{{-- <img src="{{ asset('images/website/vps.avif') }}" class="responsive-img hide-on-small-only" alt="how to buy domain name in india" loading="lazy" /> --}}
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
					<li><a href="#business-email">Business Email</a></li>
					<li><a href="#google-workspace">Google Workspace</a></li>
				</ul>
			</div>
		</nav>
	</div>
</section>

<section class="scrollspy" id="business-email">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h4 class="header-text">Business Email</h4>
				<p class="grey-text">Cost-effective email service with features like Contacts & Calendar.</p>
				<br>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box center-align" style="border-radius: 8px;">
					<h5 class="semi-bold">Solopreneur</h5>
					<p class="small-text grey-text" style="margin-bottom: 36px">Build a brand like professionals with a custom domain based email.</p>

					<span class="small-text">Starting at</span>
					<h3 class="medium" style="margin-top: 10px">$ 1.00 <span class="small-text">/ Mo</span></h3>
					<span>per user</span>

					<a href="{{ url('business-email') }}" class="btn-flat btn-large primary full-width" style="font-weight: 500">Explore Plans & Pricing</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box center-align" style="border-radius: 8px;">
					<h5 class="semi-bold">Team</h5>
					<p class="small-text grey-text" style="margin-bottom: 36px">Collaborate with everyone on your team with shared contacts & calendar.</p>

					<span class="small-text">Starting at</span>
					<h3 class="medium" style="margin-top: 10px">$ 2.00 <span class="small-text">/ Mo</span></h3>
					<span>per user</span>

					<a href="{{ url('business-email') }}" class="btn-flat btn-large primary full-width" style="font-weight: 500">Explore Plans & Pricing</a>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="container">
	<div class="divider" style="margin: 2% 0"></div>
</div>

<section class="scrollspy" id="google-workspace">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h4 class="header-text">Google Workspace</h4>
				<p class="grey-text">Cost-effective email service with features like Contacts & Calendar.</p>
				<br>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box center-align" style="border-radius: 8px;">
					<h5 class="semi-bold">Business Starter</h5>
					<p class="small-text grey-text" style="margin-bottom: 36px">The first step in building & running a professional business.</p>

					<span class="small-text">Starting at</span>
					<h3 class="medium" style="margin-top: 10px">$ 2.00 <span class="small-text">/ Mo</span></h3>
					<span>per user</span>

					<a href="https://workspace.google.com/pricing.html" target="_blank" class="btn-flat btn-large primary full-width" style="font-weight: 500">Google Workspace</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box center-align" style="border-radius: 8px;">
					<h5 class="semi-bold">Business Standard</h5>
					<p class="small-text grey-text" style="margin-bottom: 36px">For growing businesses that collaborate and connect often.</p>

					<span class="small-text">Starting at</span>
					<h3 class="medium" style="margin-top: 10px">$ 2.00 <span class="small-text">/ Mo</span></h3>
					<span>per user</span>

					<a href="https://workspace.google.com/pricing.html" target="_blank" class="btn-flat btn-large primary full-width" style="font-weight: 500">Google Workspace</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box center-align" style="border-radius: 8px;">
					<h5 class="semi-bold">Business Plus</h5>
					<p class="small-text grey-text" style="margin-bottom: 36px">When extra security and compliance is your business's top priority.</p>

					<span class="small-text">Starting at</span>
					<h3 class="medium" style="margin-top: 10px">$ 2.00 <span class="small-text">/ Mo</span></h3>
					<span>per user</span>

					<a href="https://workspace.google.com/pricing.html" target="_blank" class="btn-flat btn-large primary full-width" style="font-weight: 500">Google Workspace</a>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('script')
	<script src="{{ asset('js/web/hosting.js') }}"></script>
@endsection