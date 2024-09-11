@extends('includes.in')

@section('title', 'iHost - Secure, Fast & Reliable Web Hosting Solution')

@section('content')
<section class="center-on-small-only">
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<h4 class="header-text">Managed WordPress Hosting Built for Speed</h4>
				<p class="semi-bold">Up to <span class="primary-text">75% off</span> Wordpress Hosting</p>
				{{-- <br> --}}
				{{-- <div class="hide-on-small-only flexbox" style="justify-content: space-between">
					<p><i class="material-symbols-rounded left primary-text">language</i>Free domain for 1 year</p>
					<p><i class="material-symbols-rounded left primary-text">repeat</i>Free website migration</p>
				</div> --}}
				<h3 class="medium">From ₹ 100.00<span class="small-text"> /Mo</span>
					{{-- <br>
					<span style="font-size: 14.5px; text-decoration: line-through; font-weight: 400; color: #9e9e9e">$ 8.00/Mo</span> --}}
				</h3>
				{{-- <br> --}}
				<a href="#plans" class="btn-large primary solid medium" style="border-radius: 4px"><i class="material-symbols-outlined right">arrow_forward</i>See Plans & Pricing</a>
				<br><br>
				<p>Enjoy an exclusive <a href="https://ihost.idevlive.com/refund-policy" class="primary-text semi-bold">30 days money back</a> gurantee on all hosting purchases.</p>
			</div>
			<div class="col s12 m6 l7">
				<img src="{{asset('images/website/wordpress-banner.jpg')}}" class="responsive-img hide-on-small-only" alt="how to buy domain name in india" loading="lazy" />
				{{-- <img src="{{asset('images/website/banner.avif')}}" alt="" class="responsive-img"> --}}
			</div>
		</div>
	</div>
</section>

{{-- <section class="center-align">
	<div class="container">
		<!-- <div class="divider"></div> -->
		<div class="card-panel z-depth-0" style="background-color: rgba(241, 242, 255, 0.7)">
			<div class="row">
				<div class="col s12 m4">
					<p class="medium">Google</p>
				</div>

				<div class="col s12 m4">
					<p class="medium">Trust Pilot</p>
				</div>

				<div class="col s12 m4">
					<p class="medium">Host Advice</p>
				</div>
			</div>
		</div>
	</div>
</section> --}}

<section class="white" style="position: sticky; top: 64px; z-index: 97; padding: 12px 0">
	<div class="container">
		{{-- <div class="card-panel">

		</div> --}}
		<nav class="scrollspy-nav">
			<div class="nav-wrapper">
				<ul class="left">
					<li><a href="#!"><i class="material-icons">keyboard_arrow_up</i></a></li>
					<li class="active"><a href="#plans">Plans</a></li>
					<li><a href="#key-features">Key Features</a></li>
					<li><a href="#benefits">Benefits</a></li>
					{{-- <li><a href="#!">Commerce</a></li> --}}
					<li><a href="#faq">FAQs</a></li>
				</ul>
			</div>
		</nav>
	</div>
</section>

<section class="scrollspy" id="plans">
	<div class="container">
		<h3 class="header-text center-align">Choose the Best Managed WordPress Hosting Plan</h3>
		<p class="center-align">Hosting built for WordPress with seamless support of all other platforms. Get top-notch performance for your website, no matter the framework.</p>
		<br><br>
		{{-- <div class="row">
			<div class="col s12 m4">
				<div class="card-panel product-compare-card">
					<div class="white" style="padding-top: 24px; position: sticky; top: 132px">
						<h5 class="medium">Economy</h5>
						<p class="small-text grey-text text-darken-2 truncate-4">An economical, 50 GB plan with free matching domain, free email and 1 free SSL, everything to get you started.<br>(with terms of 12/mo. or longer).</p>
						<h3 class="medium">$ <span data-starting-price="Economy Hosting">2.00</span> <span class="small-text">/ Mo</span></h3>
						<h6 class="small-text medium grey-text">Renews at $ 8.00/Mo</h6>
						<br>
						<a href="#configure-web-hosting" class="btn-large primary hover round full-width" data-name="Economy Hosting" data-locale="us" data-plan="price_1MlL5JL5iC8E88xqsNmPydfP" data-class="add-to-cart">Add to cart</a>
					</div>
					<br><br>
					<table>
						<thead>
							<tr><th class="medium">Top Feature Comparision</th></tr>
						</thead>
						<tbody>
							<tr class="small-text"><td>1 Website</td></tr>
							<tr class="small-text"><td>50 GB SSD</td></tr>
							<tr class="small-text"><td>100 GB Bandwidth</td></tr>
							<tr class="small-text"><td>1 Database</td></tr>
							<tr class="small-text"><td>1 Email</td></tr>
						</tbody>
					</table>
					<br>
					<p class="medium left-align">Security</p>
					<table>
						<tbody>
							<tr class="small-text"><td>Unlimited SSL</td></tr>
							<tr class="small-text"><td>Cloudflare Protected Nameservers</td></tr>
							<tr class="small-text"><td>No Backups</td></tr>
						</tbody>
					</table>
					<br>
					<p class="medium left-align">Service & Support</p>
					<table>
						<tbody>
							<tr class="small-text"><td>30 Days Money Back Guarantee</td></tr>
							<tr class="small-text"><td>24/7 Support</td></tr>
							<tr class="small-text"><td>99.90% Uptime Guarantee</td></tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col s12 m4">
				<div class="card-panel product-compare-card">
					<div class="white" style="padding-top: 24px; position: sticky; top: 132px">
						<h5 class="medium">Premium</h5>
						<p class="small-text grey-text text-darken-2 truncate-4">Multiple site hosting with SSL for all sites. Additional services include free matching domain and free email for 1 Year.<br>(with terms of 12/mo. or longer).</p>
						<h3 class="medium">$ <span data-starting-price="Premium Hosting">4.00</span> <span class="small-text">/ Mo</span></h3>
						<h6 class="small-text medium grey-text">Renews at $ 12.00/Mo</h6>
						<br>
						<a href="#configure-web-hosting" class="btn-large primary hover round full-width" data-name="Premium Hosting" data-locale="us" data-plan="price_1MZCwBL5iC8E88xqveOiD6mu" data-class="add-to-cart">Add to cart</a>
					</div>
					<br><br>
					<p class="medium left-align">Top Feature Comparision</p>
					<table>
						<tbody>
							<tr class="small-text"><td>10 Website</td></tr>
							<tr class="small-text"><td>100 GB SSD</td></tr>
							<tr class="small-text"><td>Unlimited Bandwidth</td></tr>
							<tr class="small-text"><td>Unlimited Database</td></tr>
							<tr class="small-text"><td>10 Emails</td></tr>
						</tbody>
					</table>
					<br>
					<p class="medium left-align">Security</p>
					<table>
						<tbody>
							<tr class="small-text"><td>Unlimited SSL</td></tr>
							<tr class="small-text"><td>Cloudflare Protected Nameservers</td></tr>
							<tr class="small-text"><td>Weekly Backups</td></tr>
						</tbody>
					</table>
					<br>
					<p class="medium left-align">Service & Support</p>
					<table>
						<tbody>
							<tr class="small-text"><td>30 Days Money Back Guarantee</td></tr>
							<tr class="small-text"><td>24/7 Support</td></tr>
							<tr class="small-text"><td>99.90% Uptime Guarantee</td></tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col s12 m4">
				<div class="card-panel product-compare-card">
					<div class="white" style="padding-top: 24px; position: sticky; top: 132px">
						<h5 class="medium">Enterprise</h5>
						<p class="small-text grey-text text-darken-2 truncate-4">Premium + Maximized processing power and speed, SSL for all sites. Plus, free matching domain and free email.<br>(with terms of 12/mo. or longer).</p>
						<h3 class="medium">$ <span data-starting-price="Enterprise Hosting">12.00</span> <span class="small-text">/ Mo</span></h3>
						<h6 class="small-text medium grey-text">Renews at $ 36.00/Mo</h6>
						<br>
						<a href="#configure-web-hosting" class="btn-large primary hover round full-width" data-name="Enterprise Hosting" data-locale="us" data-plan="price_1MZCwAL5iC8E88xqKnDVXTaR" data-class="add-to-cart">Add to cart</a>
					</div>
					<br><br>
					<p class="medium left-align">Top Feature Comparision</p>
					<table>
						<tbody>
							<tr class="small-text"><td>100 Website</td></tr>
							<tr class="small-text"><td>200 GB SSD</td></tr>
							<tr class="small-text"><td>Unlimited Bandwidth</td></tr>
							<tr class="small-text"><td>Unlimited Database</td></tr>
							<tr class="small-text"><td>Unlimited Emails</td></tr>
						</tbody>
					</table>
					<br>
					<p class="medium left-align">Security</p>
					<table>
						<tbody>
							<tr class="small-text"><td>Unlimited SSL</td></tr>
							<tr class="small-text"><td>Cloudflare Protected Nameservers</td></tr>
							<tr class="small-text"><td>Daily Backups</td></tr>
						</tbody>
					</table>
					<br>
					<p class="medium left-align">Service & Support</p>
					<table>
						<tbody>
							<tr class="small-text"><td>30 Days Money Back Guarantee</td></tr>
							<tr class="small-text"><td>24/7 Support</td></tr>
							<tr class="small-text"><td>99.90% Uptime Guarantee</td></tr>
						</tbody>
					</table>
				</div>
			</div>
		</div> --}}

		<div class="slider-wrapper flexbox space-between">
			@component('components.price-card')
				@slot('name')Premium Wordpress @endslot
				@slot('description')An economical, 100 GB plan with free matching domain, free email and free SSL, everything to get you started. @endslot
				@slot('starts_from')100.00 @endslot
				@slot('currency')₹ @endslot
				@slot('renewal')400.00 @endslot

				@slot('region')us @endslot
				@slot('product_id')prod_QmV6cSqe56FaoQ @endslot

				@slot('website')100 Websites @endslot
				@slot('storage')100 GB SSD @endslot
				@slot('bandwidth')100 GB Bandwidth @endslot
				@slot('database')5 Databases @endslot
				@slot('mailbox')10 Mailboxes @endslot
			@endcomponent

			@component('components.price-card')
				@slot('name')Deluxe Wordpress @endslot
				@slot('description')Need more storage? Try out the Deluxe plan which comes with more faster processor and more storage. @endslot
				@slot('starts_from')150.00 @endslot
				@slot('currency')₹ @endslot
				@slot('renewal')600.00 @endslot

				@slot('region')us @endslot
				@slot('product_id')prod_QmFbB0W5oIx5hu @endslot

				@slot('website')200 Websites @endslot
				@slot('storage')200 GB SSD @endslot
				@slot('bandwidth')100 GB Bandwidth @endslot
				@slot('database')10 Databases @endslot
				@slot('mailbox')10 Mailboxes @endslot
			@endcomponent

			@component('components.price-card')
				@slot('name')Ultimate Wordpress @endslot
				@slot('description')The best iHost has to offer. Host more websites, create more emails and databases without slowing down. @endslot
				@slot('starts_from')200.00 @endslot
				@slot('currency')₹ @endslot
				@slot('renewal')800.00 @endslot

				@slot('region')us @endslot
				@slot('product_id')prod_QmVBi0AdO2pREA @endslot

				@slot('website')300 Websites @endslot
				@slot('storage')200 GB SSD @endslot
				@slot('bandwidth')200 GB Bandwidth @endslot
				@slot('database')20 Databases @endslot
				@slot('mailbox')20 Mailboxes @endslot
			@endcomponent
		</div>
	</div>
</section>

<section class="center-align scrollspy" id="key-features">
	<div class="container">
		<div class="row">
			<div class="col s12 m10 l8 offset-m1 offset-l2">
				<h3 class="header-text" style="margin-top: 0">Why Choose iHost For You Next Wordpress Website</h3>
				<p class="grey-text text-darken-1">Faster load times mean better user experience, better search engine optimization, and higher conversion rates.</p>
				<br>
			</div>
		</div>
		
		<div class="features-wrapper">
			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/rocket-launch.svg') }}" alt="free ssl for website" width="30" height="30">
				<h5 class="semi-bold">Performance & Speed</h5>
				<a href="#feature-free-ssl" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="feature-free-ssl">
					<img src="{{ asset('images/icons/rocket-launch.svg') }}" alt="free ssl for website" width="30" height="30">
					<p>With high performance SSDs which is faster than traditional HDDs, CPU & RAM, your website will always have quicker load times.</p>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/ssl-icon.svg') }}" alt="free ssl for website" width="30" height="30">
				<h5 class="semi-bold">Enhanced Security</h5>
				<a href="#feature-easy-to-use" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="feature-easy-to-use">
					<img src="{{ asset('images/icons/ssl-icon.svg') }}" alt="free ssl for website" width="30" height="30">
					<p>An SSL certificate is crucial for securing data and improving SEO. iHost offers free SSL for all your websites. Automatic daily backups ensure you can quickly restore your site if something goes wrong.</p>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<i class="material-symbols-rounded primary-text small">team_dashboard</i>
				<h5 class="semi-bold">Ease of Use</h5>
				<a href="#feature-daily-backup" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="feature-daily-backup">
					<i class="material-symbols-rounded primary-text small">team_dashboard</i>
					<p>iHosts offer a one-click installer for WordPress, making setup quick and easy. Inbuilt iPanel simplifies your website management.</p>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/247-support.svg') }}" alt="support for web hosting" width="30" height="30">
				<h5 class="semi-bold">24/7 Support</h5>
				<a href="#feature-global-data-center" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="feature-global-data-center">
					<img src="{{ asset('images/icons/247-support.svg') }}" alt="support for web hosting" width="30" height="30">
					<p>Reliable and responsive customer support available round the clock makes your experience even better.</p>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/scalability.svg') }}" alt="support for web hosting" width="30" height="30">
				<h5 class="semi-bold">Scalable Solutions</h5>
				<a href="#feature-support" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="feature-support">
					<img src="{{ asset('images/icons/scalability.svg') }}" alt="support for web hosting" width="30" height="30">
					<p>As your website grows, you might need more resources. iHost offers easy upgrades & free migration support to VPS or dedicated servers.</p>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/uptime-gurantee.svg') }}" alt="support for web hosting" width="30" height="30">
				<h5 class="semi-bold">Uptime Guarantee</h5>
				<a href="#feature-ssd" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="feature-ssd">
					<i class="material-symbols-rounded primary-text small">hard_drive_2</i>
					<p>Uptime is critical for keeping your website accessible to visitors. iHost offers 99.9% uptime gurantee.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="scrollspy" id="benefits">
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l7 sticky-top top-128 hide-on-small-only">
				<img src="{{asset('images/website/host-your-website.avif')}}" class="responsive-img"
					srcset="{{asset('images/website/host-your-website-320w.avif')}} 320w,
					{{asset('images/website/host-your-website-640w.avif')}} 640w,
					{{asset('images/website/host-your-website-1024w.avif')}} 1024w,
					{{asset('images/website/host-your-website-1920w.avif')}} 1920w"
					srcset="{{asset('images/website/host-your-website-320w.avif')}} 320w,
					{{asset('images/website/host-your-website-640w.avif')}} 640w,
					{{asset('images/website/host-your-website-1024w.avif')}} 1024w,
					{{asset('images/website/host-your-website-1920w.avif')}} 1920w"
					sizes="(max-width: 320px) 280px,
					(max-width: 640px) 600px,
					(max-width: 1024px) 960px,
					1920px"
					alt="best web hosting for beginners" class="responsive-img" loading="lazy" />
			</div>

			<div class="col s12 m6 l5">
				<h3 class="header-text" style="margin-top: 0">Super-Fast Performance</h3>
				<p class="grey-text">Faster load times mean better user experience, better search engine optimization, and higher conversion rates.</p>

				<table class="features-table">
					<tbody>
						<tr>
							<td style="width: 40px"><i class="material-symbols-rounded green-text">check</i></td>
							<td>Boost your site performance with LiteSpeed web servers and the LSCWP Cache plugin.</td>
						</tr>

						<tr>
							<td style="width: 40px"><i class="material-symbols-rounded green-text">check</i></td>
							<td>Code minification, data center rerouting, and automatic image optimization - increase your website's speed score by up to 40% with iHost CDN.</td>
						</tr>

						<tr>
							<td style="width: 40px"><i class="material-symbols-rounded green-text">check</i></td>
							<td>Object Cache decreases your website response time even further - by up to 3x.</td>
						</tr>

						<tr>
							<td style="width: 40px"><i class="material-symbols-rounded green-text">check</i></td>
							<td>IPv6 and HTTP/3 provide low latency and fast data transfer.</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<section></section>

<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<h3 class="header-text" style="margin-top: 0">24/7 Support for Your Success</h3>
				<p class="grey-text">Faster load times mean better user experience, better search engine optimization, and higher conversion rates.</p>

				<table class="features-table">
					<tbody>
						<tr>
							<td style="width: 40px"><i class="material-symbols-rounded green-text">check</i></td>
							<td>Need help with your website? Get expert assistance via <span class="medium">live chat or email</span>.</td>
						</tr>

						<tr>
							<td style="width: 40px"><i class="material-symbols-rounded green-text">check</i></td>
							<td>Say goodbye to long waits - we will resolve any issues in under <span class="medium">3 minutes</span>.</td>
						</tr>

						<tr style="border-bottom: none">
							<td style="width: 40px"><i class="material-symbols-rounded green-text">check</i></td>
							<td>Eliminate communication barriers - our agents are fluent in <span class="medium">10+ languages</span>.</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col s12 m6 l6 offset-l1 sticky-top-128 hide-on-small-only">
				{{-- <img src="https://imagedelivery.net/LqiWLm-3MGbYHtFuUbcBtA/14ff5e6e-1708-43e0-56af-22891e3cdf00/public" class="responsive-img" alt="best web hosting for beginners" class="responsive-img" loading="lazy" /> --}}
				<img src="{{ asset('images/website/wordpress hosting page- 24x7 support.jpg') }}" class="responsive-img" alt="best web hosting for beginners" class="responsive-img" loading="lazy" />
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="divider"></div>
	</div>
</section>

<section class="scrollspy" id="faq">
	<div class="container">
		<h3 class="header-text center-align">Frequntly Asked Questions</h3>
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

@include('components.overlay-hosting')

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/web/wordpress-hosting.js') }}"></script>
@endsection