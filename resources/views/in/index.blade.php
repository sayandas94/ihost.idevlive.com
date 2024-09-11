@extends('includes.in')

@section('title', 'iHost - Domain Names & Web Hosting Platform')

@section('content')
<h1 class="hide">hosting platform</h1>
<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<h4 class="header-text">Your Business Is Live And So Should Be Your Website</h4>
				<p class="semi-bold">Up to <span class="primary-text">75% off</span> Hosting + Marketing Apps</p>
				<br>
				<div class="hide-on-small-only flexbox space-between">
					<p><i class="material-icons left primary-text">language</i>Free domain</p>
					<p>
						<img src="{{ asset('images/icons/247-support.svg') }}" alt="" width="24" height="24" style="float: left; margin-right: 15px">
						24/7 Support
					</p>
				</div>
				{{-- <h3 class="medium">From $2/Mo</h3> --}}
				<h3 class="medium" style="margin-bottom: 0">From ₹ 25.00<span class="small-text"> /Mo</span></h3>
				<br>
				<a href="{{url('web-hosting')}}" class="btn-large primary solid medium" style="border-radius: 4px">Browse all hosting plans</a>
				<br><br>
				<p>Enjoy an exclusive <a href="https://ihost.idevlive.com/refund-policy" class="primary-text semi-bold">30 days money back</a> gurantee on all hosting purchases.</p>
			</div>
			<div class="col s12 m6 l7">
				<img src="{{asset('images/website/hero.avif')}}" class="responsive-img hide-on-small-only"
					srcset="{{asset('images/website/hero-320w.avif')}} 320w,
					{{asset('images/website/hero-640w.avif')}} 640w,
					{{asset('images/website/hero-1024w.avif')}} 1024w,
					{{asset('images/website/hero-1920w.avif')}} 1920w"
					sizes="(max-width: 320px) 280px,
					(max-width: 640px) 600px,
					(max-width: 1024px) 960px,
					1920px"
					alt="how to buy domain name in india" loading="lazy" />
			</div>
		</div>
	</div>
</section>

<section class="center-align" style="padding-top: 0">
	<div class="container">
		<div class="card-panel z-depth-0 primary lighten-3">
			<div class="row">
				<div class="col s12 m4">
					<p>Trust Pilot</p>
				</div>

				<div class="col s12 m4">
					<p>Google</p>
				</div>

				<div class="col s12 m4">
					<p>Host Advice</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<div class="card-panel z-depth-0" style="border: 1px solid var(--primary-100); margin-bottom: 0; border-radius: 8px; width: 390px">
					<h5>Basic</h5>
					<p class="small-text grey-text text-darken-2">A hosting plan for a single website, the best plan to get started and build your online presence on the web.</p>
					<h4><b>₹ 25.00 / Mo</b></h4>
					<p class="small-text grey-text text-darken-1">Rs 25.00 / Mo when you renew</p>
					<table class="bordered centered">
						<tbody>
							<tr style="border-bottom: none;">
								<td class="small-text flexbox" style="align-items: center;">
									<img src="{{ asset('images/icons/browser-dual.svg') }}" alt="" width="20" style="margin-right: 15px">
									<span>1 Website</span>
								</td>
							</tr>
							<tr style="border-bottom: none;">
								<td class="small-text flexbox" style="align-items: center;">
									<img src="{{ asset('images/icons/247-support.svg') }}" alt="" width="20" style="margin-right: 15px">
									<span>24/7 Support</span>
								</td>
							</tr>
							<tr style="border-bottom: none;">
								<td class="small-text flexbox" style="align-items: center;">
									<img src="{{ asset('images/icons/browser.svg') }}" alt="" width="20" style="margin-right: 15px">
									<span>Unmetered Bandwidth</span>
								</td>
							</tr>
							<tr style="border-bottom: none;">
								<td class="small-text flexbox" style="align-items: center;">
									<img src="{{ asset('images/icons/hdd.svg') }}" alt="" width="20" style="margin-right: 15px">
									<span>200 MB Storage</span>
								</td>
							</tr>
							<tr style="border-bottom: none;">
								<td class="small-text flexbox" style="align-items: center;">
									<img src="http://ihost.idevlive.test/images/icons/lock-black.svg" alt="" width="20" style="margin-right: 15px">
									<span>Free SSL</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col s12 m6 l6 offset-m1 offset-l1 center-on-small-only sticky-top-0">
				<h2 class="header-text" style="margin-top: 0; font-size: 2.92rem">Most Affordable Hosting Plan Available In The Market</h2>
				<p>Get on-board with India's most relaible and affordable web hosting platform. Introducing iHost, where you can find most affordable web hosting solutions for your online business. Low price doesn't always mean low quality. Experience this with iHost today!</p>
				<br>
				<a href="{{url('web-hosting')}}" class="btn-large primary hover" style="border-radius: 200px"><i class="material-symbols-rounded right">arrow_forward</i>Get Started</a>
			</div>
		</div>
	</div>
</section>

<section class="center-on-small-only" style="padding: 5% 0">
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<h3 class="header-text">Let there be speed with you</h3>
				<div class="hide-on-med-and-up" style="margin-bottom: 42px">
					<img src="http://ihost.test/images/website/let-there-be-speed-320w.avif" alt="how to buy a domain name permanently" class="responsive-img" loading="lazy">
				</div>
				<table class="features-table">
					<tbody>
						{{-- <tr>
							<td>
								<i class="material-symbols-sharp primary-text">wifi</i>
							</td>
							<td>
								<p>
									<span class="semi-bold">Apache Server</span>
									<br>
									<span>Maximize performance with optimised virtual hosting on Apache Web Server technology.</span>
								</p>
							</td>
						</tr> --}}

						<tr>
							<td>
								<img src="{{ asset('images/icons/cpu.svg') }}" alt="" height="24" width="24">
							</td>
							<td>
								<span class="semi-bold">High-Performance Hardware</span>
								<br>
								<span>iHost uses top of the line hardware which provides unmatched speed and performace.</span>
							</td>
						</tr>

						<tr>
							<td>
								<img src="{{ asset('images/icons/cached-primary.svg') }}" alt="" height="24" width="24">
							</td>
							<td>
								<p>
									<span class="semi-bold">Advance Cache</span>
									<br>
									<span>Enjoy fast and optimized performance of your website with advanced cache solutions.</span>
								</p>
							</td>
						</tr>

						<tr>
							<td>
								<img src="{{ asset('images/icons/global-datacenter.svg') }}" alt="" height="24" width="24">
							</td>
							<td>
								<p>
									<span class="semi-bold">Global Datacenters</span>
									<br>
									<span>Host your website from a list of datacenters around the world provided by iHost.</span>
								</p>
							</td>
						</tr>

						<tr>
							<td>
								<i class="material-symbols-rounded primary-text">recommend</i>
							</td>
							<td>
								<p>
									<span class="semi-bold">99.9% Uptime</span>
									<br>
									<span>iHost boasts of their server which have a 99.9% uptime record.</span>
								</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="col s12 m6 l7 sticky-top top-128 hide-on-small-only">
				{{-- <img
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
					alt="best hosting for website" /> --}}
					<img src="{{ asset('images/website/let-there-be-speed.jpg') }}" alt="" class="responsive-img">
			</div>
		</div>
	</div>
</section>

<section class="center-on-small-only" style="padding: 5% 0">
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l7 sticky-top top-128 hide-on-small-only">
				{{-- <img
					src="{{ url('images/website/host-your-website.avif') }}"
					class="responsive-img"
					loading="lazy"
					srcset="{{ url('images/website/host-your-website-320w.avif') }} 320w,
					{{ url('images/website/host-your-website-640w.avif') }} 640w,
					{{ url('images/website/host-your-website-1024w.avif') }} 1024w,
					{{ url('images/website/host-your-website-1920w.avif') }} 1920w" sizes="(max-width: 320px) 280px,
					(max-width: 640px) 600px,
					(max-width: 1024px) 960px,
					1920px"
					alt="best web hosting for beginners" /> --}}
					<img src="{{ asset('images/website/host-your-website.jpg') }}" alt="" class="responsive-img">
			</div>
			<div class="hide-on-med-and-up">
				<img src="{{ asset('images/website/host-your-website-320w.png') }}" alt="buy hosting for small business" class="responsive-img" loading="lazy">
				<br><br>
			</div>
			<div class="col s12 m6 l5">
				{{-- <h3 class="header-text" style="margin-top: 0">Host your website quickly and easily</h3> --}}
				<h3 class="header-text" style="margin-top: 0">Get your website up and running</h3>
				<table class="features-table">
					<tbody>
						<tr>
							<td>
								<img src="{{ asset('images/icons/dashboard.svg') }}" alt="" height="24" width="24">
							</td>
							<td>
								<p>
									<span class="semi-bold" style="font-size: 1.1rem">Easy to use dashboard</span>
									<br>
									<span class="grey-text">Optimise your workflow with iHost's easy &amp; user-friendly dashboard.</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<img src="{{ asset('images/icons/devices.svg') }}" alt="" height="24" width="24">
							</td>
							<td>
								<p>
									<span class="semi-bold" style="font-size: 1.1rem">Work on the go</span>
									<br>
									<span class="grey-text">Our multi device support makes it easy to access your dashboard on the go.</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<img src="{{ asset('images/icons/database-outline.svg') }}" alt="" height="24" width="24">
							</td>
							<td>
								<p>
									<span class="semi-bold" style="font-size: 1.1rem">Manage Databases</span>
									<br>
									<span class="grey-text">Create and manage databases with ease in iPanel's built-in Database Manager.</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<img src="{{ asset('images/icons/domain-transfer.svg') }}" alt="" height="24" width="24">
							</td>
							<td>
								<p>
									<span class="semi-bold" style="font-size: 1.1rem">Migrate with ease</span>
									<br>
									<span class="grey-text">It's easy to migrate your existing website from other platforms to iPanel.</span>
								</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<section class="center-on-small-only" style="padding-top: 5%">
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<h3 class="header-text" style="margin-top: 0">Something extra to make your life easy</h3>
				<br>
				<table class="features-table">
					<tbody>
						<tr>
							<td>
								<img src="{{ asset('images/icons/247-support.svg') }}" alt="" height="24" width="24">
							</td>
							<td>
								<p>
									<span class="semi-bold">24/7 support</span>
									<br>
									<span>Get help directly from the editor, thanks to our 24/7 live chat support.</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<img src="{{ asset('images/icons/how-to-videos.svg') }}" alt="" height="24" width="24">
							</td>
							<td>
								<p>
									<span class="semi-bold">How-to Videos</span>
									<br>
									<span>Troubleshoot by yourself with our video walkthroughs and guides.</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<img src="{{ asset('images/icons/tutorials.svg') }}" alt="" height="24" width="24">
							</td>
							<td>
								<p>
									<span class="semi-bold">Detailed Tutorials</span>
									<br>
									<span>Become a pro webmaster with our in-depth blogs and tech tutorials.</span>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<i class="material-symbols-outlined primary-text">breaking_news_alt_1</i>
							</td>
							<td>
								<p>
									<span class="semi-bold">Weekly Newsletters</span>
									<br>
									<span>Enjoy weekly updates on web technologies with our weekly newsletter.</span>
								</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col s12 m6 l7 sticky-top top-128">
				{{-- <img
					src={{ asset('images/website/something-extra.avif') }}"
					class="responsive-img"
					loading="lazy"
					srcset="{{ asset('images/website/something-extra-320w.avif') }} 320w,
					{{ asset('images/website/something-extra-640w.avif') }} 640w,
					{{ asset('images/website/something-extra-1024w.avif') }} 1024w"
					sizes="(max-width: 320px) 280px,
					(max-width: 640px) 600px,
					(max-width: 1024px) 960px"
					alt="best hosting for ecommerce website india" /> --}}
					<img src="{{ asset('images/website/something-extra.jpg') }}" alt="" class="responsive-img">
			</div>
		</div>
	</div>
</section>

<!-- TESTIMONIAL SECTION (START) -->
<section>
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

<section>
	<div class="container">
		<div class="divider"></div>
	</div>
</section>

<!-- FEATURES SECTION (START) -->
<section class="center-align">
	<div class="container">
		{{-- <div class="row">
			<div class="col s12">
				<h3 class="header-text">Features At A Glace</h3>
				<p>With iHost website hosting you can get your website up and running in minutes. With few simple clicks you can setup a new hosting space and upload your website. With iHost's hosting plan you get a bundle of features.</p>
				<br>
			</div>
			<div class="col s12 m6 l4">
				<div class="card-panel feature-card">
					<div class="feature-highlight">
						<img src="{{ asset('images/icons/cpu.svg') }}" alt="cheap website hosting" width="50" loading="lazy">
						<p class="semi-bold truncate-1">High Performance CPU</p>
					</div>
					<div class="feature-description">
						<p>Don't let sluggish performance hold your website back. iHost equips your site with a powerful CPU, ensuring it can handle demanding applications and traffic spikes with ease. You'll enjoy a significant boost in website responsiveness, keeping your visitors engaged and coming back for more.</p>
					</div>
				</div>
			</div>

			<div class="col s12 m6 l4">
				<div class="card-panel feature-card">
					<div class="feature-highlight">
						<img src="{{ asset('images/icons/global-datacenter.svg') }}" alt="cheap website hosting" width="50" loading="lazy">
						<p class="semi-bold truncate-1">Global Data Center</p>
					</div>
					<div class="feature-description">
						<p>The world is your audience, and iHost helps you reach them faster. With strategically located data centers around the globe, iHost ensures your website content is delivered swiftly to visitors regardless of their location. This translates into lightning-fast loading times, no matter where your visitors are connecting from. Reduced latency keeps users engaged and happy, leading to a more positive overall experience on your website.</p>
					</div>
				</div>
			</div>

			<div class="col s12 m6 l4">
				<div class="card-panel feature-card">
					<div class="feature-highlight">
						<img src="{{ asset('images/icons/cloud-backup.svg') }}" alt="cheap website hosting" width="50" loading="lazy">
						<p class="semi-bold truncate-1">Backup on Cloud</p>
					</div>
					<div class="feature-description">
						<p>Disasters happen, but your website doesn't have to suffer. iHost's secure cloud backup system acts as your digital safety net. Automatic backups ensure your website's files and data are always protected, even in the event of hardware failure, unexpected outages, or accidental deletions. With iHost's cloud backups, you can rest easy knowing your website can be restored quickly and effortlessly, minimizing downtime and keeping your business running smoothly.</p>
					</div>
				</div>
			</div>

			<div class="col s12 m6 l4">
				<div class="card-panel feature-card">
					<div class="feature-highlight">
						<img src="{{ asset('images/icons/reliable-servers.svg') }}" alt="cheap website hosting" width="50" loading="lazy">
						<p class="semi-bold truncate-1">Highly Reliable Server</p>
					</div>
					<div class="feature-description">
						<p>A website that goes down is a website unseen. iHost understands the importance of exceptional uptime. That's why we leverage robust and reliable servers, meticulously maintained to deliver industry-leading uptime percentages of 99%. This translates into a website that's consistently accessible to your visitors, fostering trust and confidence in your brand. You can focus on creating engaging content and growing your online presence, knowing iHost takes care of the technical backbone.</p>
					</div>
				</div>
			</div>

			<div class="col s12 m6 l4">
				<div class="card-panel feature-card">
					<div class="feature-highlight">
						<img src="{{ asset('images/icons/ssd-storage.svg') }}" alt="cheap website hosting" width="50" loading="lazy">
						<p class="semi-bold truncate-1">SSD Storage</p>
					</div>
					<div class="feature-description">
						<p>Say goodbye to slow loading times. iHost utilizes cutting-edge SSD storage technology, delivering significantly faster read and write speeds compared to traditional HDD storage. This translates into lightning-fast website loading times, keeping visitors engaged and happy. Every click and every page transition happens instantaneously, creating a seamless and enjoyable user experience. Faster loading times also improve your website's search engine ranking, making it more discoverable by potential customers.</p>
					</div>
				</div>
			</div>

			<div class="col s12 m6 l4">
				<div class="card-panel feature-card">
					<div class="feature-highlight">
						<img src="{{ asset('images/icons/247-support.svg') }}" alt="cheap website hosting" width="50" loading="lazy">
						<p class="semi-bold truncate-1">24/7 Support</p>
					</div>
					<div class="feature-description">
						<p>Expert help is always just a click away. We boast a team of knowledgeable support representatives available around the clock to answer your questions and resolve any technical issues you might encounter. Whether you're a seasoned web developer or a complete beginner, iHost's support team offers a helping hand whenever you need it. They can guide you through troubleshooting steps, answer configuration questions, and help you get the most out of your website hosting experience.</p>
					</div>
				</div>
			</div>
		</div> --}}
		<div class="row">
			<div class="col s12 m10 l8 offset-m1 offset-l2">
				<h3 class="header-text">Features At A Glace</h3>
				<p>With iHost website hosting you can get your website up and running in minutes. With few simple clicks you can setup a new hosting space and upload your website. With iHost's hosting plan you get a bundle of features.</p>
				<br>
			</div>
		</div>
		<div class="features-wrapper">
			<div class="card-panel features-card" style="align-items: center;">
				<img src="{{ asset('images/icons/cpu.svg') }}" alt="cheap website hosting" width="30" loading="lazy">
				<p class="semi-bold">High Performance Hardware</p>
				<a href="#high-performance-cpu" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="high-performance-cpu">
					<p>Don't let sluggish performance hold your website back. iHost equips your site with a powerful CPU, ensuring it can handle demanding applications and traffic spikes with ease. You'll enjoy a significant boost in website responsiveness, keeping your visitors engaged and coming back for more.</p>
					<a href="#high-performance-cpu" class="btn danger hover" data-id="feature-close-btn" style="border-radius: 8px">Close</a>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center;">
				<img src="{{ asset('images/icons/global-datacenter.svg') }}" alt="cheap website hosting" width="30" loading="lazy">
				<p class="semi-bold">Global Datacenter</p>
				<a href="#global-datacenter" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="global-datacenter">
					<p>The world is your audience, and iHost helps you reach them faster. With strategically located data centers around the globe, iHost ensures your website content is delivered swiftly to visitors regardless of their location. This translates into lightning-fast loading times, no matter where your visitors are connecting from.</p>
					<a href="#global-datacenter" class="btn danger hover" data-id="feature-close-btn" style="border-radius: 8px">Close</a>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center;">
				<img src="{{ asset('images/icons/backup.svg') }}" alt="cheap website hosting" width="30" loading="lazy">
				<p class="semi-bold">Backup on Cloud</p>
				<a href="#backup-on-cloud" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="backup-on-cloud">
					<p>Disasters happen, but your website doesn't have to suffer. iHost's secure cloud backup system acts as your digital safety net. Automatic backups ensure your website's files and data are always protected, even in the event of hardware failure, unexpected outages, or accidental deletions.</p>
					<a href="#backup-on-cloud" class="btn danger hover" data-id="feature-close-btn" style="border-radius: 8px">Close</a>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center;">
				<img src="{{ asset('images/icons/reliable-servers.svg') }}" alt="cheap website hosting" width="50" loading="lazy">
				<p class="semi-bold">Highly Reliable Server</p>
				<a href="#reliable-server" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="reliable-server">
					<p>A website that goes down is a website unseen. iHost understands the importance of exceptional uptime. That's why we leverage robust and reliable servers, meticulously maintained to deliver industry-leading uptime percentages of 99%.</p>
					<a href="#reliable-server" class="btn danger hover" data-id="feature-close-btn" style="border-radius: 8px">Close</a>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center;">
				<img src="{{ asset('images/icons/ssd.svg') }}" alt="cheap website hosting" width="30" loading="lazy">
				<p class="semi-bold">SSD Storage</p>
				<a href="#ssd-storage" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="ssd-storage">
					<p>Say goodbye to slow loading times. iHost utilizes cutting-edge SSD storage technology, delivering significantly faster read and write speeds compared to traditional HDD storage.</p>
					<a href="#ssd-storage" class="btn danger hover" data-id="feature-close-btn" style="border-radius: 8px">Close</a>
				</div>
			</div>

			<div class="card-panel features-card" style="align-items: center;">
				<img src="{{ asset('images/icons/247-support.svg') }}" alt="cheap website hosting" width="30" loading="lazy">
				<p class="semi-bold">24/7 Support</p>
				<a href="#ondemand-support" class="btn-flat primary features-btn">Read more</a>
				<div class="content" id="ondemand-support">
					<p>Expert help is always just a click away. We boast a team of knowledgeable support representatives available around the clock to answer your questions and resolve any technical issues you might encounter.</p>
					<a href="#ondemand-support" class="btn danger hover" data-id="feature-close-btn" style="border-radius: 8px">Close</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- FEATURES SECTION (END) -->
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/web/home.js') }}"></script>
@endsection