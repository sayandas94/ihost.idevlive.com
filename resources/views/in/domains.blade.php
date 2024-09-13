@extends('includes.in')

@section('title', 'iHost - Search For Available Domain Names')

@section('content')

<style>
	
</style>

<section class="center-align">
	<div class="container">
		<div class="row">
			<div class="col s12 m10 l8 offset-m1 offset-l2">
				<h2 class="header-text">Domain Name Search</h2>
				<h5 class="grey-text text-darken-1">Search for your desired domain name and instantly find out it's availability. Get it registered in few clicks before it is taken by someone else.</h5>
				<br>

				<div class="card-panel domain-wrapper">
					<form action="{{ url('domain/search') }}" method="post" name="domain-search-form" autocomplete="off" id="DomainSearchForm">
						@csrf
						<input type="hidden" name="locale" value="in">
						<input type="text" name="domain_name" placeholder="Search for that perfect domain name">
						<button name="submit-btn" value="submit">
							<img src="{{ asset('images/icons/search.svg') }}" alt="">
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<style>
	.slider-wrapper {
		overflow: hidden;
		column-gap: 24px;
		scroll-behavior: smooth;
	}

	.slider-wrapper > .card-panel {
		box-shadow: none;
		border-radius: 8px;
		display: flex;
		flex-direction: column;
		height: 400px;
		border: 2px solid var(--primary-100);
		min-width: 30% !important;
		text-align: center;
	}

	.slider-wrapper [data-id="price-wrapper"].flexbox {
		height: 100%;
		flex-direction: column;
		align-items: center;
	}

	@media only screen and (max-width: 600px) {
		.slider-wrapper > .card-panel {
			min-width: 90% !important;
		}
	}
</style>

@php
	$domains = [
		[
			'tld' => '.info',
			'content' => 'Great for information and resources.'
		],
		[
			'tld' => '.agency',
			'content' => 'Ideal for digital marketing agencies.'
		],
		[
			'tld' => '.online',
			'content' => 'Suitable for a strong online presence.'
		],
		[
			'tld' => '.cloud',
			'content' => 'Ideal for cloud services and solutions.'
		],
		[
			'tld' => '.shop',
			'content' => 'Perfect for e-commerce websites.'
		],
		[
			'tld' => '.io',
			'content' => 'Popular with tech startups & developers.'
		],
		[
			'tld' => '.icu',
			'content' => 'Short for “I See You,” versatile use.'
		],
		[
			'tld' => '.ai',
			'content' => 'Websites related to Artificial Intelegence.'
		]
	];
@endphp

<section class="center-align">
	<div class="container">
		<h3 class="header-text">Choose from the most popular domain extensions</h3>
		<p>The perfect domain lets people know at a glance why you're online (and why you're awesome). Use the domain search bar and find the right domain now to grab more attention and visitors.</p>
		<br><br>
		<div class="slider-wrapper flexbox">
			@foreach ($domains as $domain)
			<div class="card-panel">
				<h1 class="semi-bold">{{ $domain['tld'] }}</h1>
				<p>{{ $domain['content'] }}</p>
				<br>
				<div class="flexbox" data-id="price-wrapper">
					<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="flexbox space-between">
			<div></div>
			<div>
				<a href="#!" class="btn-flat primary" style="margin-top: 24px" id="back-tld"><i class="material-symbols-outlined">keyboard_arrow_left</i></a>
				<a href="#!" class="btn-flat primary" style="margin-top: 24px" id="next-tld"><i class="material-symbols-outlined">keyboard_arrow_right</i></a>
			</div>
		</div>
	</div>
</section>

<section class="center-align">
	<div class="container">
		<h3 class="header-text">What to consider when buying domains</h3>
		<br><br>
		<div class="row">
			<div class="col s12 m6 l4">
				<div class="card-panel z-depth-0">
					<p class="semi-bold">Keep It Short</p>
					<p>Although there is no set length for domain names, the ideal ones are between two and three words long. Longer domains are more difficult to read and will not stand out.</p>
				</div>
			</div>
			<div class="col s12 m6 l4">
				<div class="card-panel z-depth-0">
					<p class="semi-bold">Less is More</p>
					<p>Avoid hyphens, digits, slang, and words with different spellings. Complex characters make your domain name considerably more difficult to spell and remember.</p>
				</div>
			</div>
			<div class="col s12 m6 l4">
				<div class="card-panel z-depth-0">
					<p class="semi-bold">Include Your Brand Name</p>
					<p>Your domain should include your brand name or keywords related to your project or business. A search result with a keyword in your domain name can improve brand awareness and drive visitors to your site.</p>
				</div>
			</div>
			<div class="col s12 m6 l4">
				<div class="card-panel z-depth-0">
					<p class="semi-bold">Perform a Domain Name Search</p>
					<p>Before you choose a domain name, check to see that it isn't already trademarked by another firm that holds the copyright.</p>
				</div>
			</div>
			<div class="col s12 m6 l4">
				<div class="card-panel z-depth-0">
					<p class="semi-bold">Think Locally</p>
					<p>While many prefer .com domains, you may be better off choosing a country-specific extension like .in or .de - especially if you're targeting a specific country.</p>
				</div>
			</div>
			<div class="col s12 m6 l4">
				<div class="card-panel z-depth-0">
					<p class="semi-bold">You see it, Buy it</p>
					<p>The best domain names are taken quickly, so don't wait around and let your dream domain slip away. Use the domain checker to find a domain that suits your needs, and register it now.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<h3 class="header-text" style="margin-top: 0">Managing your domain has been been more easy!</h3>
				<br>
				<table class="features-table">
					<tbody>
						<tr style="border-bottom: none">
							<td style="width: 80px">
								<i class="material-symbols-rounded primary-text">dashboard</i>
							</td>
							<td>
								<p>
									<span class="semi-bold">Easy to use dashboard</span>
									<br>
									<span>Optimise your workflow with our user-friendly dashboard.</span>
								</p>
							</td>
						</tr>
						<tr style="border-bottom: none">
							<td>
								<i class="material-symbols-rounded primary-text">devices</i>
							</td>
							<td>
								<p>
									<span class="semi-bold">Work on the go</span>
									<br>
									<span>Our multi device support makes it easy to access your iHost account on the go.</span>
								</p>
							</td>
						</tr>
						<tr style="border-bottom: none">
							<td>
								<i class="material-symbols-rounded primary-text">dns</i>
							</td>
							<td>
								<p>
									<span class="semi-bold">Manage DNS with one click</span>
									<br>
									<span>iHost's Domain Management section is very easy to use and maintain.</span>
								</p>
							</td>
						</tr>
						<tr style="border-bottom: none">
							<td>
								<i class="material-symbols-rounded primary-text">swap_horiz</i>
							</td>
							<td>
								<p>
									<span class="semi-bold">Trasnfer domains easily</span>
									<br>
									<span>It's easy to trasnfer your existing domain from other platforms to iHost.</span>
								</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col s12 m6 l7 sticky-top top-128">
				{{-- <img src="{{asset('images/website/let-there-be-speed.avif')}}"
					srcset="{{asset('images/website/let-there-be-speed-320w.avif')}} 320w,
						{{asset('images/website/let-there-be-speed-640w.avif')}} 640w,
						{{asset('images/website/let-there-be-speed-1024w.avif')}} 1024w,
						{{asset('images/website/let-there-be-speed-1920w.avif')}} 1920w"
					sizes="(max-width: 320px) 280px,
						(max-width: 640px) 600px,
						(max-width: 1024px) 960px,
						1920px"
					loading="lazy"
					alt="domain name discount"
					class="responsive-img"
				/> --}}
				<img src="{{ asset('images/website/manage-your-domain.jpg') }}" alt="" class="responsive-img">
			</div>
		</div>
	</div>
</section>

<section class="center-align">
	<div class="container">
		<h3 class="header-text">Some note-worthy features to make your life easy</h3>
		
		<br>
		<br>

		<div class="features-wrapper">
			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/domain-setup.svg') }}" alt="free ssl for website" width="30" height="30">
				{{-- <img src="{{ asset('images/icons/browser-outline.svg') }}" alt="free ssl for website" width="30" height="30"> --}}
				<p class="semi-bold">Easy Setup</p>
				<a href="#feature-domain-setup" class="btn-flat primary features-btn" data-selector="read.more">Read more</a>
				<div class="content" id="feature-domain-setup">
					<img src="{{ asset('images/icons/domain-setup.svg') }}" alt="free ssl for website" width="30" height="30">
					<p>Simple domain set up. You don't need any technical skills.</p>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/theft-protection.svg') }}" alt="free ssl for website" width="30" height="30">
				<p class="semi-bold">Domain Theft Protection</p>
				<a href="#feature-domain-theft" class="btn-flat primary features-btn" data-selector="read.more">Read more</a>
				<div class="content" id="feature-domain-theft">
					<img src="{{ asset('images/icons/theft-protection.svg') }}" alt="free ssl for website" width="30" height="30">
					<p>Protect your domain from unauthorize transfer with our inbuilt theft protection.</p>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/ssl-icon.svg') }}" alt="free ssl for website" width="30" height="30">
				<p class="semi-bold">Free Privacy Protection</p>
				<a href="#feature-privacy-protection" class="btn-flat primary features-btn" data-selector="read.more">Read more</a>
				<div class="content" id="feature-privacy-protection">
					<img src="{{ asset('images/icons/ssl-icon.svg') }}" alt="free ssl for website" width="30" height="30">
					<p>Get free WHOIS privacy protection with every domain for life.</p>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/activity-outline-primary.svg') }}" alt="free ssl for website" width="30" height="30">
				<p class="semi-bold">Domain Monitoring</p>
				<a href="#feature-domain-monitoring" class="btn-flat primary features-btn" data-selector="read.more">Read more</a>
				<div class="content" id="feature-domain-monitoring">
					<img src="{{ asset('images/icons/activity-outline-primary.svg') }}" alt="free ssl for website" width="30" height="30">
					<p>Real-time monitoring to make sure you're always up and running.</p>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/247-support.svg') }}" alt="free ssl for website" width="30" height="30">
				<p class="semi-bold">24/7 Support</p>
				<a href="#feature-customer-support" class="btn-flat primary features-btn" data-selector="read.more">Read more</a>
				<div class="content" id="feature-customer-support">
					<img src="{{ asset('images/icons/247-support.svg') }}" alt="free ssl for website" width="30" height="30">
					<p>Support executives are there round the clock so that your business doesn't stop.</p>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/domain-extensions.svg') }}" alt="free ssl for website" width="30" height="30">
				<p class="semi-bold">500+ Domain Extensions</p>
				<a href="#feature-domain-extension" class="btn-flat primary features-btn" data-selector="read.more">Read more</a>
				<div class="content" id="feature-domain-extension">
					<img src="{{ asset('images/icons/domain-extensions.svg') }}" alt="free ssl for website" width="30" height="30">
					<p>Shop from an exclusive list of 500+ domain TLDs to suit your needs.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="center-align">
	<div class="container">
		<h3 class="header-text">Why iHost is the best!</h3>
		<br><br>
		<div class="row">
			<div class="col s12 m6 l4">
				<div class="card-panel z-depth-0">
					<p class="semi-bold">Amazing offers</p>
					<p class="small-text">Take advantage of amazing offers on domain names. Start by searching for your preffered domain name and comparing their prices and promotions. Look for different offers on the domain extension you want, as well as features like easy domain management and protections.</p>
				</div>
			</div>
			<div class="col s12 m6 l4">
				<div class="card-panel z-depth-0">
					<p class="semi-bold">Instant setup</p>
					<p class="small-text">When you're ready to launch your website or start your online business, you want to get started as quickly and efficiently as possible. One of the key steps in the process is setting up your domain name. Fortunately, with instant domain setup, you can get up and running in no time at all.</p>
				</div>
			</div>
			<div class="col s12 m6 l4">
				<div class="card-panel z-depth-0">
					<p class="semi-bold">Free privacy protection</p>
					<p class="small-text">When you register a domain name, your personal information is required to be publicly available through the WHOIS database. Take advantage of free privacy protection, with iHost as it offers this service as part of their domain registration package. It's totally free for lifetime.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<h3 class="header-text center-align">Frequntly Asked Questions</h3>
		<br><br>
		<ul class="collapsible z-depth-0" data-collapsible="accordion" style="border: none">
			<li>
				<div class="collapsible-header">What is a domain name?</div>
				<div class="collapsible-body">A domain name enables your customers to access your website through the world wide web.</div>
			</li>
			<li>
				<div class="collapsible-header">Why do I need a domain name?</div>
				<div class="collapsible-body">A domain name serves as a distinct identity on the word wide web. If you would like to promote yourself, take your business online, etc. a domain name is a must. Learn how to register your domain name here.</div>
			</li>
			<li>
				<div class="collapsible-header">Is there a character limit for a domain name?</div>
				<div class="collapsible-body">Yes, the minimum character limit for a domain name is one and maximum 63 characters. But it is suggested that you keep the character length of your domain between 6-10 words.</div>
			</li>
			<li>
				<div class="collapsible-header">How do I protect the contact information associated with my domain name?</div>
				<div class="collapsible-body">Domain Privacy Protection hides the domain registrant's personal information from the public WHOIS database. For additional details, refer the blog article.</div>
			</li>
			<li>
				<div class="collapsible-header">Is Privacy Protection worth it?</div>
				<div class="collapsible-body">The contact information for all domain owners is available in the WHOIS directory. You can protect your personal information by opting for iHost Domain Privacy Protection. We hide your information from public view by replacing it with ours, protecting you from spam and identity theft.</div>
			</li>
			<li>
				<div class="collapsible-header">Besides a domain name, what else do I need to have a website?</div>
				<div class="collapsible-body">Apart from purchasing a domain name, you need to develop your website, blog. There are several options to host your website. For eg., Content Management System (a.k.a. CMS) such as WordPress, Magento, Drupal, Joomla or hire a developer to code your website. You can also have a look at the various hosting plans that we have to offer here.</div>
			</li>
			<li>
				<div class="collapsible-header">How do I restore a deleted domain from the redemption grace period?</div>
				<div class="collapsible-body">If a domain name is not renewed within the Renewal Grace Period, it would be queued for deletion at the end of the Renewal Grace Period and subsequently Deleted. For further details, refer the blog article.</div>
			</li>
			<li>
				<div class="collapsible-header">How do I use the domain forwarding service?</div>
				<div class="collapsible-body">For the Domain Forwarding Service to work, it is essential that all queries for your domain name should reach our Domain Forwarding Server, which would further redirect it to the destination you have specified. For a detailed understanding, refer the blog article.</div>
			</li>
		</ul>
	</div>
</section>

@include('components.OverlayDomainTrue')
@include('components.overlay-domain-false')

@endsection

@section('script')
<script type="module" src="{{ asset('js/web/domain.js') }}" ></script>
@endsection