@extends('includes.in')

@section('title', 'Web Hosting India - Secure & Scalable Solutions | iHost')

@section('keywords', 'web hosting India, secure hosting solutions, scalable hosting, iHost India hosting, best web hosting plans')
@section('description', 'Get secure and scalable web hosting solutions with iHost India. Choose the best plan for your website and enjoy excellent performance.')

@section('content')
<h1 class="hide">Secure and Scalable Web Hosting Solutions in India</h1>
<h2 class="hide">Choose a Web Hosting Plan</h2>
<h2 class="hide">Why iHost for Web Hosting?</h2>
<h2 class="hide">Benefits of Scalable Hosting</h2>

<section class="center-on-small-only scrollspy" id="top">
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<h4 class="header-text">Trust your site with the most affordable web host.</h4>
				<p class="semi-bold">Up to <span class="primary-text">75% off</span> Web Hosting</p>
				<h3 class="medium" style="margin-bottom: 0">From ₹ 25.00<span class="small-text"> /Mo</span></h3>
				<br>
				<a href="#plans" class="btn-large primary solid medium" style="border-radius: 4px"><i class="material-symbols-outlined right">arrow_forward</i>See Plans & Pricing</a>
			</div>
			<div class="col s12 m6 l7">
				<img src="{{asset('images/website/web-hosting-banner.jpg')}}" alt="" class="responsive-img">
			</div>
		</div>
	</div>
</section>

<section class="white hide-on-small-only" style="position: sticky; top: 64px; z-index: 97; padding: 12px 0">
	<div class="container">
		<nav class="scrollspy-nav">
			<div class="nav-wrapper">
				<ul class="left">
					{{-- <li><a href="#top"><i class="material-icons">keyboard_arrow_up</i></a></li> --}}
					<li><a href="#plans">Plans</a></li>
					<li><a href="#key-features">Key Features</a></li>
					<li><a href="#testimonials">Testimonials</a></li>
					<li><a href="#benefits">Benefits</a></li>
					<li><a href="#faq">FAQs</a></li>
				</ul>
			</div>
		</nav>
	</div>
</section>

<style>
	.tabs.custom > .tab:first-child {
		border: 1px solid #bdbdbd;
		border-radius: 200px 0 0 200px;
		background-color: transparent;
		border-right: none
	}

	.tabs.custom > .tab:first-child > a {
		border-radius: 200px 0 0 200px;
	}

	.tabs.custom > .tab:nth-child(2) {
		border: 1px solid #bdbdbd;
		border-radius: 0 200px 200px 0;
		background-color: transparent;
		border-left: none
	}

	.tabs.custom > .tab:nth-child(2) > a {
		border-radius: 0 200px 200px 0;
	}

	.tabs.custom > .tab > a {
		color: #212121;
	}

	.tabs.custom > .tab > a.active {
		background-color: #212121 !important;
		color: #ffffff;
	}

	.tabs.custom > li.indicator {
		display: none;
	}
</style>

<section class="scrollspy" id="plans">
	<div class="container">
		<h3 class="header-text center-align">Choose the Best Web Hosting Plan</h3>

		<div class="row">
			<div class="col s12">
				<ul class="tabs custom">
					<li class="tab col s12 m3 offset-m3"><a href="#solo">Solo</a></li>
					<li class="tab col s12 m3"><a href="#team" class="active">Team</a></li>
				</ul>
			</div>

			<div class="col s12" id="solo">
				<br><br>
				<p class="center-align">Afforable Web Hosting Plans for small scale projects which do not require intense hardware resources. </p>
				<br>
				<div class="slider-wrapper flexbox" style="justify-content: center">
					@component('components.price-card')
						@slot('name')Simple Web Hosting @endslot
						@slot('description')A hosting plan for a single website, the best plan to get started and build your online presence on the web. @endslot
						@slot('starts_from')25.00 @endslot
						@slot('currency')₹ @endslot
						@slot('renewal')25.00 @endslot

						@slot('region')in @endslot
						@slot('product_id')prod_QmqZENMDT8jkZd @endslot

						@slot('website')1 Website @endslot
						@slot('storage')200 MB SSD @endslot
						@slot('bandwidth')100 GB Bandwidth @endslot
						@slot('database')1 Database @endslot
						@slot('mailbox')1 Mailbox @endslot
					@endcomponent

					@component('components.price-card')
						@slot('name')Bundle Web Hosting @endslot
						@slot('description')Want to host more than one website, but keep the prices low? Bundle Web Hosting Plan is the best solution for you.  @endslot
						@slot('starts_from')100.00 @endslot
						@slot('currency')₹ @endslot
						@slot('renewal')100.00 @endslot

						@slot('region')in @endslot
						@slot('product_id')prod_Qmrh8RA3O1m3FL @endslot

						@slot('website')5 Websites @endslot
						@slot('storage')1 GB SSD @endslot
						@slot('bandwidth')100 GB Bandwidth @endslot
						@slot('database')1 Database @endslot
						@slot('mailbox')5 Mailboxes @endslot
					@endcomponent
				</div>
			</div>
			<div class="col s12" id="team">
				<br><br>
				<p class="center-align">Hosting built for WordPress with seamless support of all other platforms. Get top-notch performance for your website, no matter the framework.</p>
				<br>
				<div class="slider-wrapper flexbox" style="justify-content: center">
					@component('components.price-card')
						@slot('name')Premium Web Hosting @endslot
						@slot('description')An economical, 100 GB plan with free matching domain, free email and free SSL, everything to get you started. @endslot
						@slot('starts_from')100.00 @endslot
						@slot('currency')₹ @endslot
						@slot('renewal')400.00 @endslot

						@slot('region')in @endslot
						@slot('product_id')prod_QmV6cSqe56FaoQ @endslot

						@slot('website')100 Websites @endslot
						@slot('storage')100 GB SSD @endslot
						@slot('bandwidth')100 GB Bandwidth @endslot
						@slot('database')5 Databases @endslot
						@slot('mailbox')10 Mailboxes @endslot
					@endcomponent

					@component('components.price-card')
						@slot('name')Deluxe Web Hosting @endslot
						@slot('description')Need more storage? Try out the Deluxe plan which comes with more faster processor and more storage. @endslot
						@slot('starts_from')150.00 @endslot
						@slot('currency')₹ @endslot
						@slot('renewal')600.00 @endslot

						@slot('region')in @endslot
						@slot('product_id')prod_QmFbB0W5oIx5hu @endslot

						@slot('website')200 Websites @endslot
						@slot('storage')200 GB SSD @endslot
						@slot('bandwidth')100 GB Bandwidth @endslot
						@slot('database')10 Databases @endslot
						@slot('mailbox')10 Mailboxes @endslot
					@endcomponent

					@component('components.price-card')
						@slot('name')Ultimate Web Hosting @endslot
						@slot('description')The best iHost has to offer. Host more websites, create more emails and databases without slowing down. @endslot
						@slot('starts_from')200.00 @endslot
						@slot('currency')₹ @endslot
						@slot('renewal')800.00 @endslot

						@slot('region')in @endslot
						@slot('product_id')prod_QmVBi0AdO2pREA @endslot

						@slot('website')300 Websites @endslot
						@slot('storage')200 GB SSD @endslot
						@slot('bandwidth')200 GB Bandwidth @endslot
						@slot('database')10 Databases @endslot
						@slot('mailbox')20 Mailboxes @endslot
					@endcomponent
				</div>
			</div>
		</div>
	</div>
</section>

<!-- FEATURES SECTION (START) -->
<section class="center-align scrollspy" id="key-features">
	<div class="container">
		<h3 class="header-text">Features At A Glace</h3>
		<p>With iHost website hosting you can get your website up and running in minutes. With few simple clicks you can setup a new hosting space and upload your website. With iHost's hosting plan you get a bundle of features.</p>
		
		<br>

		<div class="features-wrapper">
			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/ssl-icon.svg') }}" alt="free ssl for website" width="30" height="30">
				<h5 class="semi-bold">Free SSL</h5>
				<a href="#feature-free-ssl" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="feature-free-ssl">
					<p>Security is paramount in today's digital world. We provide free SSL certificates for all our plans. This essential security feature encrypts data transmitted between your website and visitors' browsers, safeguarding sensitive information like login credentials and credit card details. An SSL certificate also adds a trust factor to your website, signified by the padlock symbol in the address bar. This reassures visitors that their information is protected, encouraging them to interact more confidently with your website.</p>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<i class="material-symbols-rounded primary-text small">team_dashboard</i>
				<h5 class="semi-bold">Easy to use</h5>
				<a href="#feature-easy-to-use" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="feature-easy-to-use">
					<p>Navigate within the iHost Control Panel to manage your website and other stuff.</p>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/daily-backup.svg') }}" alt="easy web hosting" width="30" height="30">
				<h5 class="semi-bold">Daily Backups</h5>
				<a href="#feature-daily-backup" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="feature-daily-backup">
					<p>Disasters happen, but your website doesn't have to suffer. iHost's secure cloud backup system acts as your digital safety net. Automatic backups ensure your website's files and data are always protected, even in the event of hardware failure, unexpected outages, or accidental deletions. With iHost's cloud backups, you can rest easy knowing your website can be restored quickly and effortlessly, minimizing downtime and keeping your business running smoothly.</p>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/global-datacenter.svg') }}" alt="support for web hosting" width="30" height="30">
				<h5 class="semi-bold">Global Data Center</h5>
				<a href="#feature-global-data-center" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="feature-global-data-center">
					<p>The world is your audience, and iHost helps you reach them faster. With strategically located data centers around the globe, iHost ensures your website content is delivered swiftly to visitors regardless of their location. This translates into lightning-fast loading times, no matter where your visitors are connecting from. Reduced latency keeps users engaged and happy, leading to a more positive overall experience on your website.</p>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center">
				<img src="{{ asset('images/icons/247-support.svg') }}" alt="support for web hosting" width="30" height="30">
				<h5 class="semi-bold">24/7 Support</h5>
				<a href="#feature-support" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="feature-support">
					<p>Expert help is always just a click away. We boast a team of knowledgeable support representatives available around the clock to answer your questions and resolve any technical issues you might encounter. Whether you're a seasoned web developer or a complete beginner, iHost's support team offers a helping hand whenever you need it. They can guide you through troubleshooting steps, answer configuration questions, and help you get the most out of your website hosting experience.</p>
				</div>
			</div>

			<div class="card-panel features-card">
				<i class="material-symbols-rounded primary-text small">hard_drive_2</i>
				<h5 class="semi-bold">SSD Storage</h5>
				<a href="#feature-ssd" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="feature-ssd">
					<p>Say goodbye to slow loading times. iHost utilizes cutting-edge SSD storage technology, delivering significantly faster read and write speeds compared to traditional HDD storage. This translates into lightning-fast website loading times, keeping visitors engaged and happy. Every click and every page transition happens instantaneously, creating a seamless and enjoyable user experience. Faster loading times also improve your website's search engine ranking, making it more discoverable by potential customers.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- FEATURES SECTION (END) -->

<section class="center-on-small-only" style="padding-top: 5%">
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<h3 class="header-text">Now manage your website with style!</h3>
				<br>
				<table class="features-table">
					<tbody>
						<tr>
							<td>
								<img src="{{ asset('images/icons/dashboard.svg') }}" alt="" width="24" height="24">
							</td>
							<td>
								<p>
									<span class="semi-bold">Easy to use dashboard</span>
									<br>
									<span>Optimise your workflow with our user-friendly dashboard.</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<img src="{{ asset('images/icons/devices.svg') }}" alt="" width="24" height="24">
							</td>
							<td>
								<p>
									<span class="semi-bold">Work on the go</span>
									<br>
									<span>Our multi device support makes it easy to access your dashboard on the go.</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<img src="{{ asset('images/icons/database-outline.svg') }}" alt="" width="24" height="24">
							</td>
							<td>
								<p>
									<span class="semi-bold">Manage databases with just 1 click</span>
									<br>
									<span>With iPanel you can manage your databases with the click of a single button.</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<img src="{{ asset('images/icons/browser-outline.svg') }}" alt="" width="24" height="24">
							</td>
							<td>
								<p>
									<span class="semi-bold">Migrate for free and with ease</span>
									<br>
									<span>It's easy to migrate your existing website from other platforms to iPanel.</span>
								</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col s12 m6 l7 sticky-top top-128">
				{{-- <img src="{{ asset('images/website/host-your-website.avif') }}" class="responsive-img"
					srcset="{{ asset('images/website/host-your-website-320w.avif') }} 320w,
					{{ asset('images/website/host-your-website-640w.avif') }} 640w,
					{{ asset('images/website/host-your-website-1024w.avif') }} 1024w,
					{{ asset('images/website/host-your-website-1920w.avif') }} 1920w"
					sizes="(max-width: 320px) 280px,
					(max-width: 640px) 600px,
					(max-width: 1024px) 960px,
					1920px"
					alt="website hosting" class="responsive-img" loading="lazy" /> --}}
					<img src="{{ asset('images/website/now-manage-your-website-with-style!.jpg') }}" alt="" class="responsive-img">
			</div>
		</div>
	</div>
</section>

<div class="container">
	<div class="divider" style="margin: 2% 0"></div>
</div>

<!-- TESTIMONIAL SECTION (START) -->
<section class="scrollspy" id="testimonials">
	<div class="container">
		<h3 class="center-align header-text">Success Stories Of Our Clients</h3>
		<p class="center-align" style="font-size: 1.3rem"><a href="{{ url('reviews') }}">Read all the reviews from our happy clients.</a></p>
		<br>
		<div class="carousel carousel-slider center" data-indicators="true" style="height: 500px">
			<div class="carousel-fixed-item center"></div>
			<div class="carousel-item white active" href="#one!" style="padding-left: 10px; padding-right: 10px; z-index: 0; opacity: 1; visibility: visible; transform: translateX(0px) translateY(0px) translateX(0px) translateX(0px) translateZ(0px);">
				<div class="row">
					<div class="col s12 m6 l4">
						<div class="card-panel testimonial-card">
							<div>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star_half</i>
							</div>
							<p class="truncate-4">I was a bit skeptical at first, but iHost's affordable web hosting service has exceeded my expectations. They offer a great set of features for the price and the performance has been consistently good. Plus, their customer support is top-notch and has helped me through any issues I've had.</p>
						</div>
						<div class="card-panel testimonial-by">
							<h5 class="primary-text medium">Madhav M.</h5>
							<p style="margin-top: 0">Mittal Associates</p>
						</div>
					</div>
					<div class="col s12 m6 l4 hide-on-small-only">
						<div class="card-panel testimonial-card">
							<div>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
							</div>
							<p class="truncate-4">I was using another hosting provider first and it was getting expensive with time. After switching to iHost, I make sure my website's performace is always high while keeping the costs down.</p>
						</div>
						<div class="card-panel testimonial-by">
							<h5 class="primary-text semi-bold">Yugchhaya B.</h5>
							<p style="margin-top: 0">The Couch Aloo</p>
						</div>
					</div>
					<div class="col s12 m6 l4 hide-on-med-and-down">
						<div class="card-panel testimonial-card">
							<div>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
							</div>
							<p class="truncate-4">With iPanel, it's very easy to manage my website. It is user friendly and easy to use and I didn't need to hire someone to manage my website. And there support is also excellent.</p>
						</div>
						<div class="card-panel testimonial-by">
							<h5 class="primary-text semi-bold">Sonu C.</h5>
							<p style="margin-top: 0">Web Solution Delta</p>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item white" href="#two!" style="padding-left: 10px; padding-right: 10px; transform: translateX(0px) translateY(0px) translateX(1008px) translateZ(-200px); z-index: -1; opacity: 0.333333; visibility: visible;">
				<div class="row">
					<div class="col s12 m6 l4">
						<div class="card-panel testimonial-card">
							<div>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
							</div>
							<p class="truncate-4">Support matters to me the most. iHost specialists were always there to help whenever I needed regardless of the time and they made sure that my issues were resolved on time.</p>
						</div>
						<div class="card-panel testimonial-by">
							<h5 class="primary-text semi-bold">Vipin D.</h5>
							<p style="margin-top: 0">Vance Cloud Computing</p>
						</div>
					</div>
					<div class="col s12 m6 l4 hide-on-small-only">
						<div class="card-panel testimonial-card">
							<div>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
							</div>
							<p class="truncate-4">I have been using iHost for over a year now and I couldn't be happier with their service. The website uptime is excellent and the loading speed is lightning fast. Their customer support is also top-notch - they are always available to help with any issues I encounter. I highly recommend this hosting service to anyone looking for a reliable and efficient web hosting provider.</p>
						</div>
						<div class="card-panel testimonial-by">
							<h5 class="primary-text semi-bold">Prakash C.</h5>
							<p style="margin-top: 0">MAC IT Solutions</p>
						</div>
					</div>
					<div class="col s12 m6 l4 hide-on-med-and-down">
						<div class="card-panel testimonial-card">
							<div>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star_half</i>
							</div>
							<p class="truncate-4">I have tried several web hosting services over the years, but iHost is by far the best. Their user interface is incredibly intuitive and easy to use, even for a beginner like me. Their prices are also very competitive, and they offer a wide range of hosting plans to fit every need. I also appreciate the fact that they offer automatic backups and security measures to protect my website. I have recommended this hosting service to all my friends and colleagues.</p>
						</div>
						<div class="card-panel testimonial-by">
							<h5 class="primary-text semi-bold">Pritam S.</h5>
							<p style="margin-top: 0">PSIT Solutions</p>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item white" href="#three!" style="padding-left: 10px; padding-right: 10px; transform: translateX(0px) translateY(0px) translateX(-1008px) translateZ(-200px); z-index: -1; opacity: 0.333333; visibility: visible;">
				<div class="row">
					<div class="col s12 m6 l4">
						<div class="card-panel testimonial-card">
							<div>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star_half</i>
							</div>
							<p class="truncate-4">I've been using iHost for several months now and I am extremely satisfied with their service. Their website is very user-friendly and easy to navigate, and they offer a wide range of features that make managing my website a breeze. I also appreciate their fast and reliable customer support - they always respond promptly and go above and beyond to solve any issues. Overall, I would highly recommend this hosting service to anyone looking for a top-notch web hosting provider.</p>
						</div>
						<div class="card-panel testimonial-by">
							<h5 class="primary-text semi-bold">Sahil S.</h5>
							<p style="margin-top: 0">Devantrix Solutions</p>
						</div>
					</div>
					<div class="col s12 m6 l4 hide-on-small-only">
						<div class="card-panel testimonial-card">
							<div>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star_half</i>
							</div>
							<p class="truncate-4">I've been using iHost for my business for over two years now, and I have been consistently impressed with their level of service. Their uptime is nearly perfect, and their website speed is lightning-fast. I also appreciate their excellent customer support, which is available 24/7 to help with any issues I encounter. Their prices are also very reasonable, making them an excellent value for the money. I would highly recommend this hosting service to any business looking for a reliable and efficient web hosting provider.</p>
						</div>
						<div class="card-panel testimonial-by">
							<h5 class="primary-text semi-bold">Vaibhav S.</h5>
							<p style="margin-top: 0">Kehav Computers</p>
						</div>
					</div>
					<div class="col s12 m6 l4 hide-on-med-and-down">
						<div class="card-panel testimonial-card">
							<div>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
								<i class="material-icons primary-text">star</i>
							</div>
							<p class="truncate-4">As a small business owner, affordability is key for me. I was relieved to find iHost's web hosting service that offered great features and performance at a fraction of the cost of other providers. Their customer support has been excellent and they've gone above and beyond to help me get my website up and running smoothly.</p>
						</div>
						<div class="card-panel testimonial-by">
							<h5 class="primary-text semi-bold">Ketika K.</h5>
							<p style="margin-top: 0">Flightz Hub</p>
						</div>
					</div>
				</div>
			</div>
		<ul class="indicators"><li class="indicator-item active"></li><li class="indicator-item"></li><li class="indicator-item"></li></ul></div>
	</div>
</section>
<!-- TESTIMONIAL SECTION (END) -->

<section class="center-align scrollspy" id="benefits">
	<div class="container">
		<h3 class="header-text">What makes iHost you best choice for web hosting</h3>
		<br><br>

		<div class="flex-row align-center gap-48">
			<div class="col l6">
				<h5 class="medium">Affordability</h5>
				<p>Affordable web hosting is a great way for individuals and small businesses to get their website online without breaking the bank. With so many web hosting providers available, it can be difficult to know where to start. iHost provides you with web hosting packages that are easy on your wallet without compromising with the reliability.</p>
			</div>
			<div class="col l6">
				<img src="{{ asset('images/website/web-affordability.jpg') }}" alt="" class="responsive-img">
			</div>
		</div>

		<div class="divider" style="margin: 5% 0"></div>

		<div class="flex-row align-center gap-48">
			<div class="col l6">
				<img src="{{ asset('images/website/web-security.jpg') }}" alt="" class="responsive-img">
			</div>

			<div class="col l6">
				<h5 class="medium">Security</h5>
				<p>Web hosting security is an essential aspect of website management that can protect your website from security breaches, data theft, and other cyber threats. When it comes to web hosting, security should be a top priority. With that in mind, iHost servers are configured with best security pratices to protect your website from attackers.</p>
			</div>
		</div>

		<div class="divider" style="margin: 5% 0"></div>

		<div class="flex-row align-center gap-48">
			<div class="col l6">
				<h5 class="medium">Reliability</h5>
				<p>Reliable web hosting is essential for any website owner who wants to ensure that their website is always available to their visitors. With iHost's advanced cache system, servers will provide a stable and fast platform for your website, with minimal downtime or interruptions so that your website is always live and visible to your users.</p>
			</div>
			<div class="col l6">
				<img src="{{ asset('images/website/web-reliability.jpg') }}" alt="" class="responsive-img">
			</div>
		</div>
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
	<script src="{{ asset('js/web/web-hosting.js') }}"></script>
@endsection