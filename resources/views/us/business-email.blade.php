@extends('includes.us')

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
				<img src="{{ asset('images/website/business-email.jpg') }}" class="responsive-img hide-on-small-only" alt="how to buy domain name in india" loading="lazy" />
			</div>
		</div>
	</div>
</section>

<section class="white hide-on-small-only" style="position: sticky; top: 64px; z-index: 97; padding: 12px 0">
	<div class="container">
		<nav class="scrollspy-nav">
			<div class="nav-wrapper">
				<ul class="left">
					<li><a href="#plans">Plans</a></li>
					<li><a href="#features">Key Features</a></li>
					{{-- <li><a href="#testimonials">Testimonials</a></li> --}}
					<li><a href="#benefits">Benefits</a></li>
					<li><a href="#faq">FAQs</a></li>
				</ul>
			</div>
		</nav>
	</div>
</section>

{{-- 
1. Plans & Pricing
2. Why Get a Business Email
3. Features
4. FAQ
 --}}

<section class="center-align scrollspy" id="plans">
	<div class="container">
		<div class="row">
			<div class="col s12 m10 l8 offset-m1 offset-l2">
				<h4 class="header-text">Choose a plan which suits you the best</h4>
				<p>Buy custom email addresses based on your domain name to increase the credibility and reliability of your business to your customers.</p>
			</div>
		</div>

		<div class="slider-wrapper flexbox" style="justify-content: center">
			<div class="card-panel price-card">
				<div class="header">
					<h5 class="medium">Solo</h5>
					<p class="small-text grey-text">Ideal for getting your business up and running.</p>
					<h3 class="medium">$ <span data-starting-price="Economy Hosting">1.00</span> <span class="small-text">/ Mo</span></h3>
					<h6 class="small-text medium grey-text">Renews at $ 4.00/Mo</h6>
					<br>
					<a href="#configure-web-hosting" class="btn-large primary hover full-width" data-name="Economy Hosting" data-locale="us" data-plan="price_1MlL5JL5iC8E88xqsNmPydfP" data-class="add-to-cart">Add to cart</a>
				</div>
				<div>
					<br><br>
					<table>
						<thead>
							<tr><th>Top Feature Comparision</th></tr>
						</thead>
						<tbody>
							<tr class="small-text"><td>Custom Business Email</td></tr>
							<tr class="small-text"><td>30 GB Storage per user</td></tr>
							<tr class="small-text"><td>Security & Management Controls</td></tr>
							<tr class="small-text"><td>Email Support</td></tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="card-panel price-card">
				<div class="header">
					<h5 class="medium">Team</h5>
					<p class="small-text grey-text">Great option for collaborating with your team.</p>
					<h3 class="medium">$ <span data-starting-price="Economy Hosting">2.00</span> <span class="small-text">/ Mo</span></h3>
					<h6 class="small-text medium grey-text">Renews at $ 8.00/Mo</h6>
					<br>
					<a href="#configure-web-hosting" class="btn-large primary hover full-width" data-name="Premium Hosting" data-locale="us" data-plan="price_1MZCwBL5iC8E88xqveOiD6mu" data-class="add-to-cart">Add to cart</a>
				</div>
				<div>
					<br><br>
					<table>
						<thead>
							<tr><th>Top Feature Comparision</th></tr>
						</thead>
						<tbody>
							<tr class="small-text"><td>Everything in Solo</td></tr>
							<tr class="small-text"><td>80 GB Storage per user</td></tr>
							<tr class="small-text"><td>Shared Contacts & Calendar</td></tr>
							<tr class="small-text"><td>Chat & Call Support</td></tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="center-align scrollspy" id="features">
	<div class="container">
		<div class="row">
			<div class="col s12 m10 l8 offset-m1 offset-l2">
				<h4 class="header-text">All Email Plans Will Include</h4>
			</div>
		</div>

		<div class="features-wrapper">
			<div class="card-panel features-card" style="align-items: center">
				<i class="material-symbols-rounded primary-text small">verified</i>
				<h5 class="semi-bold">Ad free Email</h5>
				<a href="#feature-free-ssl" class="btn-flat primary features-btn">Read more</a>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/lock-outline-primary.svg') }}" alt="free ssl for website" width="30" height="30">
				<h5 class="semi-bold">Email Privacy</h5>
				<a href="#feature-free-ssl" class="btn-flat primary features-btn">Read more</a>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<i class="material-symbols-rounded primary-text small">touch_app</i>
				<h5 class="semi-bold">1 Click Unsubscribe</h5>
				<a href="#feature-free-ssl" class="btn-flat primary features-btn">Read more</a>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/devices.svg') }}" alt="free ssl for website" width="30" height="30">
				<h5 class="semi-bold">Multi Device Support</h5>
				<a href="#feature-free-ssl" class="btn-flat primary features-btn">Read more</a>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<i class="material-symbols-rounded primary-text small">password</i>
				<h5 class="semi-bold">Password Protection</h5>
				<a href="#feature-free-ssl" class="btn-flat primary features-btn">Read more</a>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<i class="material-symbols-rounded primary-text small">fingerprint</i>
				<h5 class="semi-bold">Strong Encryption</h5>
				<a href="#feature-free-ssl" class="btn-flat primary features-btn">Read more</a>
			</div>
		</div>
	</div>
</section>

<section class="scrollspy" id="benefits">
	<div class="container">
		<h3 class="header-text center-align">Take control of your Inbox!</h3>
		
		<br><br>

		<div class="flex-row align-center gap-48">
			<div class="col l6 left-align">
				<h5 class="medium">No More Trackers</h5>
				<p>iHost blocks the email trackers that tell senders and advertisers what you read and click on, and can follow you around the web.</p>
			</div>
			<div class="col l6">
				<div class="card-panel z-depth-0 grey" style="aspect-ratio: 1.2">

				</div>
			</div>
		</div>

		<div class="divider" style="margin: 5% 0"></div>

		<div class="flex-row align-center gap-48">
			<div class="col l6">
				<div class="card-panel z-depth-0 grey" style="aspect-ratio: 1.2">

				</div>
			</div>

			<div class="col l6 left-align">
				<h5 class="medium">Better Security</h5>
				<p>PhishGuard blocks known phishing attempts and lets you know if an email is suspicious or safe to open.</p>
			</div>
		</div>

		<div class="divider" style="margin: 5% 0"></div>

		<div class="flex-row align-center gap-48">
			<div class="col l6 left-align">
				<h5 class="medium">Hide-my-email aliases</h5>
				<p>Hide your real email address by creating aliases when you sign up for new websites so that your email is concealed.</p>
			</div>
			<div class="col l6">
				<div class="card-panel z-depth-0 grey" style="aspect-ratio: 1.2">

				</div>
			</div>
		</div>
	</div>
</section>

{{-- <section>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<h3 class="header-text">Take control of your Inbox!</h3>
				<div class="hide-on-med-and-up" style="margin-bottom: 42px">
					<img src="http://ihost.test/images/website/let-there-be-speed-320w.avif" alt="how to buy a domain name permanently" class="responsive-img" loading="lazy">
				</div>
				<table class="features-table">
					<tbody>
						<tr>
							<td>
								<i class="material-symbols-rounded primary-text">wrong_location</i>
							</td>
							<td>
								<span class="semi-bold">No More Trackers</span>
								<br>
								<span>iHost blocks trackers that track your every activity on a particular email.</span>
							</td>
						</tr>

						<tr>
							<td>
								<i class="material-symbols-rounded primary-text">vpn_key</i>
							</td>
							<td>
								<p>
									<span class="semi-bold">Better Security</span>
									<br>
									<span>PhishGuard blocks known phishing attempts and lets you know if an email is suspicious.</span>
								</p>
							</td>
						</tr>

						<tr>
							<td>
								<img src="{{ asset('images/icons/visibility-off-round-primary.svg') }}" alt="" height="24" width="24">
							</td>
							<td>
								<p>
									<span class="semi-bold">Hide-my-email aliases</span>
									<br>
									<span>Hide your real email address by creating aliases when you sign up for new websites.</span>
								</p>
							</td>
						</tr>

						<tr>
							<td>
								<i class="material-symbols-rounded primary-text">front_hand</i>
							</td>
							<td>
								<p>
									<span class="semi-bold">Unique Defence</span>
									<br>
									<span>iHost has added several layers of defense against social engineering attacks.</span>
								</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="col s12 m6 l7 sticky-top top-128 hide-on-small-only">
				<img
					src="{{ url('images/website/let-there-be-speed.avif') }}"
					class="responsive-img"
					loading="lazy"
					srcset="{{ url('images/website/let-there-be-speed-320w.avif') }} 320w,
					{{ url('images/website/let-there-be-speed-640w.avif') }} 640w,
					{{ url('images/website/let-there-be-speed-1024w.avif') }} 1024w,
					{{ url('images/website/let-there-be-speed-1920w.avif') }} 1920w" sizes="(max-width: 320px) 280px,
					(max-width: 640px) 600px,
					(max-width: 1024px) 960px,
					1920px"
					alt="best hosting for website" />
			</div>
		</div>
	</div>
</section> --}}

<section class="scrollspy" id="faq">
	<div class="container">
		<h4 class="header-text center-align">Frequently Asked Questions</h4>
		<br><br>
		<ul class="collapsible z-depth-0" data-collapsible="accordion" style="border: none">
			<li>
				<div class="collapsible-header">What is shared hosting?</div>
				<div class="collapsible-body">
					<p>Shared Server Hosting is the most common and affordable form of website hosting. Multiple users will share the resources of a secured server or group of secured servers in order to put their websites online for others to view. iHost offers several affordable shared hosting services so you can find the perfect shared hosting package for your website needs. </p>
				</div>
			</li>
			<li>
				<div class="collapsible-header">What are Shared Hosting Benefits?</div>
				<div class="collapsible-body">
					<p>Affordability is the #1 benefit of Shared web Hosting. However most Shared Hosting platforms are also managed, which means that users do not have to worry about things like server management and platform patches.</p>
				</div>
			</li>
			<li>
				<div class="collapsible-header">What is the difference between Shared vs Wordpress Hosting</div>
				<div class="collapsible-body">
					<p>Shared Website Hosting is the platform in which WordPress can be utilized. There are some platforms that can be optimized specifically for WordPress, however in most cases managed WordPress hosting is synonymous with Shared website Hosting since WordPress is the most common CMS.</p>
				</div>
			</li>
			<li>
				<div class="collapsible-header">What is the difference between Shared Hosting vs VPS?</div>
				<div class="collapsible-body">
					<p>In unmetered Shared Hosting you are sharing the resources of a server with multiple users, which means a specific allotment of resources (RAM, CPU, etc) are not guaranteed for your website. In Virtual Private Server VPS Hosting, you are guaranteed resources for your website, however you are often required to manage the server yourself.</p>
				</div>
			</li>
			<li>
				<div class="collapsible-header">How do I get started with Shared Hosting?</div>
				<div class="collapsible-body">
					<p>iHost is a website host provider that makes it easy for you to get started with one of the fastest Shared Hosting services on the market. Simply select the shared web hosting plan that best suits your needs and follow the sign up flow. We will automatically install WordPress (if you choose) for you so you can quickly start building your dream website.</p>
				</div>
			</li>
		</ul>
	</div>
</section>

@endsection

@section('script')
	<script src="{{ asset('js/web/hosting.js') }}"></script>
@endsection