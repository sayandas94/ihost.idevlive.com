@extends('includes.us')

@section('title', 'iHost - Domain Transfer Made Easy')

@section('content')
<style>
	
</style>
<!-- Header (Start) -->
<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<span class="small-text medium">Domain Transfer</span>
				<h4 class="header-text">Transfer your domain in a bliss</h4>
				<p class="medium">Up to <span class="primary-text">30% off</span> on multiple domain transfer</p>
				<br>
				<p><i class="material-symbols-rounded left primary-text">automation</i>Automatic. No tech skills required.</p>
				<p>
					<img src="{{ asset('images/icons/247-support.svg') }}" alt="" width="24" height="24" style="float: left; margin-right: 15px">
					24/7 Support
				</p>
				<p><i class="material-symbols-rounded left primary-text">manage_accounts</i>Easy Setup</p>
				<br>
				<div class="card-panel domain-wrapper">
					<form action="{{ url('api/domain/search') }}" method="post" name="domain-search-form" autocomplete="off">
						@csrf
						<input type="text" name="domain_name" placeholder="Search for that perfect domain name">
						<button>
							<img src="{{ asset('images/icons/search.svg') }}" alt="">
						</button>
					</form>
				</div>
			</div>
			<div class="col s12 m6 l7">
				<img src="{{ asset('images/website/domain-transfer.avif') }}" alt="" class="responsive-img">
			</div>
		</div>
	</div>
</section>
<!-- Header (End) -->

<!-- Domain Transfer Procedure (Start) -->
<section class="center-align">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h4 class="header-text">Domain Transfer Made Easy (In 4 Steps)</h4>
				<br>
			</div>
			<div class="col l3">
				<div class="card-panel flexbox space-between" style="flex-direction: column; height: 300px">
					<h1 class="semi-bold primary-text">01</h1>
					<p>Unlock the domain at your current registrar.</p>
				</div>
			</div>

			<div class="col l3">
				<div class="card-panel flexbox space-between" style="flex-direction: column; height: 300px">
					<h1 class="semi-bold primary-text">02</h1>
					<p>Search for your domain using our transfer tool.</p>
				</div>
			</div>

			<div class="col l3">
				<div class="card-panel flexbox space-between" style="flex-direction: column; height: 300px">
					<h1 class="semi-bold primary-text">03</h1>
					<p>Enter your authorization code to confirm the transfer.</p>
				</div>
			</div>

			<div class="col l3">
				<div class="card-panel flexbox space-between" style="flex-direction: column; height: 300px">
					<h1 class="semi-bold primary-text">04</h1>
					<p>Wait for 5-7 days for the transfer process.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Domain Transfer Procedure (End) -->

<!-- Benefits (Start) -->
<section class="center-align hide-on-small-only">
	<div class="container">
		<h4 class="header-text">Why Should Your Choose iHost</h4>
		<p class="grey-text text-darken-1">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident doloremque harum quas delectus excepturi nesciunt!</p>
		<br>
		<div class="row">
			<div class="col s12 m4">
				<div class="card-panel features-box">
					<i class="material-symbols-rounded medium primary-text">swap_horiz</i>
					<p class="medium">Seamless Transfer Process</p>
					<div class="content-wrapper" id="seamless-transfer-process">
						<p>Our platform offers a streamlined and user-friendly transfer process, ensuring that your domain is moved quickly and without any hassle.</p>
						<a href="#seamless-transfer-process" class="btn danger hover medium" data-id="close_feature" style="border-radius: 8px" data-id="read_more_feature">Close</a>
					</div>
					<a href="#seamless-transfer-process" class="btn-flat primary hover" data-id="read_more_feature">Read more</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box">
					<i class="material-symbols-rounded medium primary-text">encrypted_add_circle</i>
					<p class="medium">Enhanced Security</p>
					<div class="content-wrapper" id="enhanced-security">
						<div class="content">
							<p>We prioritize the security of your domain with advanced protection measures, including two-factor authentication and robust monitoring systems to safeguard against unauthorized access.</p>
							<a href="#enhanced-security" class="btn danger hover medium" data-id="close_feature" style="border-radius: 8px" data-id="read_more_feature">Close</a>
						</div>
					</div>
					<a href="#enhanced-security" class="btn-flat primary hover" data-id="read_more_feature">Read more</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box">
					<i class="material-symbols-rounded medium primary-text">percent</i>
					<p class="medium">Competitive Pricing</p>
					<div class="content-wrapper" id="competitive-pricing">
						<div class="content">
							<p>Enjoy cost-effective domain transfer rates with no hidden fees. We offer competitive pricing to help you save money while getting the best service.</p>
							<a href="#competitive-pricing" class="btn danger hover medium" data-id="close_feature" style="border-radius: 8px" data-id="read_more_feature">Close</a>
						</div>
					</div>
					<a href="#competitive-pricing" class="btn-flat primary hover" data-id="read_more_feature">Read more</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box">
					<i class="material-symbols-rounded medium primary-text">headset_mic</i>
					<p class="medium">24/7 Customer Support</p>
					<div class="content-wrapper" id="customer-support">
						<div class="content">
							<p>Our dedicated support team is available around the clock to assist you with any questions or issues that may arise during the transfer process. You can count on us for reliable and prompt support.</p>
							<a href="#customer-support" class="btn danger hover medium" data-id="close_feature" style="border-radius: 8px" data-id="read_more_feature">Close</a>
						</div>
					</div>
					<a href="#customer-support" class="btn-flat primary hover" data-id="read_more_feature">Read more</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box">
					<i class="material-symbols-rounded medium primary-text">settings_brightness</i>
					<p class="medium">Manage DNS</p>
					<div class="content-wrapper" id="dns-management">
						<div class="content">
							<p>With our service, you get free DNS management tools to easily control your domain's DNS settings, ensuring optimal performance and customization for your website.</p>
							<a href="#dns-management" class="btn danger hover medium" data-id="close_feature" style="border-radius: 8px" data-id="read_more_feature">Close</a>
						</div>
					</div>
					<a href="#dns-management" class="btn-flat primary hover" data-id="read_more_feature">Read more</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box">
					<i class="material-symbols-rounded medium primary-text">autorenew</i>
					<p class="medium">Automatic Renewal Options</p>
					<div class="content-wrapper" id="auto-renewal-option">
						<div class="content">
							<p>Avoid the risk of losing your domain due to expiration with our automatic renewal feature. We'll ensure your domain remains active and secure, giving you peace of mind.</p>
							<a href="#auto-renewal-option" class="btn danger hover medium" data-id="close_feature" style="border-radius: 8px" data-id="read_more_feature">Close</a>
						</div>
					</div>
					<a href="#auto-renewal-option" class="btn-flat primary hover" data-id="read_more_feature">Read more</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="center-align hide-on-med-and-up">
	<div class="container">
		<div class="carousel">
			<a href="#!" class="carousel-item">
				<div class="card-panel features-box">
					<i class="material-symbols-rounded medium primary-text">domain_verification</i>
					<p class="medium">Seamless Transfer Process</p>
					<div class="content-wrapper">
						<div class="content">
							<p class="truncate-2">Our platform offers a streamlined and user-friendly transfer process, ensuring that your domain is moved quickly and without any hassle.</p>
						</div>
						<div class="overlay"></div>
					</div>
				</div>
			</a>
			<a href="#!" class="carousel-item">
				<div class="card-panel features-box">
					<i class="material-symbols-rounded medium primary-text">domain_verification</i>
					<p class="medium">Seamless Transfer Process</p>
					<div class="content-wrapper">
						<div class="content">
							<p class="truncate-2">Our platform offers a streamlined and user-friendly transfer process, ensuring that your domain is moved quickly and without any hassle.</p>
						</div>
						<div class="overlay"></div>
					</div>
				</div>
			</a>
			<a href="#!" class="carousel-item">
				<div class="card-panel features-box">
					<i class="material-symbols-rounded medium primary-text">domain_verification</i>
					<p class="medium">Seamless Transfer Process</p>
					<div class="content-wrapper">
						<div class="content">
							<p class="truncate-2">Our platform offers a streamlined and user-friendly transfer process, ensuring that your domain is moved quickly and without any hassle.</p>
						</div>
						<div class="overlay"></div>
					</div>
				</div>
			</a>
			<a href="#!" class="carousel-item">
				<div class="card-panel features-box">
					<i class="material-symbols-rounded medium primary-text">domain_verification</i>
					<p class="medium">Seamless Transfer Process</p>
					<div class="content-wrapper">
						<div class="content">
							<p class="truncate-2">Our platform offers a streamlined and user-friendly transfer process, ensuring that your domain is moved quickly and without any hassle.</p>
						</div>
						<div class="overlay"></div>
					</div>
				</div>
			</a>
		</div>
	</div>
</section>
<!-- Benefits (End) -->

<!-- FAQs (Start) -->
<section class="scrollspy" id="faq">
	<div class="container">
		<h3 class="header-text center-align">Frequntly Asked Questions</h3>
		<br><br>
		<ul class="collapsible z-depth-0" data-collapsible="accordion" style="border: none">
			<li>
				<div class="collapsible-header semi-bold">How long does the domain transfer process take?</div>
				<div class="collapsible-body">
					<p>The domain transfer process typically takes between 5 to 7 days, depending on the current registrar and the responsiveness to transfer approval requests. We strive to make the process as smooth and quick as possible.</p>
				</div>
			</li>
			<li>
				<div class="collapsible-header semi-bold">Will my website experience downtime during the transfer?</div>
				<div class="collapsible-body">
					<p>No, your website will not experience any downtime during the domain transfer process. Your domain's DNS settings will remain active and unchanged until the transfer is complete, ensuring continuous website availability.</p>
				</div>
			</li>
			<li>
				<div class="collapsible-header semi-bold">What information do I need to provide to initiate a domain transfer?</div>
				<div class="collapsible-body">
					<p>To initiate a domain transfer, you will need to provide your domain name, an authorization code (also known as EPP code) from your current registrar, and ensure your domain is unlocked. Additionally, make sure your domain is not within 60 days of registration or a previous transfer.</p>
				</div>
			</li>
			<li>
				<div class="collapsible-header semi-bold">Are there any costs associated with transferring my domain?</div>
				<div class="collapsible-body">
					<p>Yes, there is typically a transfer fee, which includes the cost of extending your domain registration for an additional year. Our pricing is competitive, and there are no hidden fees. You'll see the cost upfront before confirming </p>
				</div>
			</li>
			<li>
				<div class="collapsible-header semi-bold">What happens to my domain's DNS settings after the transfer?</div>
				<div class="collapsible-body">
					<p>After the transfer, your domain's DNS settings will remain unchanged. You can update your DNS settings at any time through our free DNS management tools, ensuring that your website continues to function without interruption.</p>
				</div>
			</li>
		</ul>
	</div>
</section>
<!-- FAQs (End) -->
@endsection

@section('script')
{{-- <script type="text/javascript" src="{{ asset('js/modules/domain.js') }}"></script> --}}
<script>
document.addEventListener('click', (e) => {
	const read_more_feature = e.target.closest('[data-id="read_more_feature"]')
	if (read_more_feature) {
		e.preventDefault()
		const id = read_more_feature.getAttribute('href')
		document.querySelector(id).classList.add('active')
	}

	const close_feature = e.target.closest('[data-id="close_feature"]')
	if (close_feature) {
		e.preventDefault()
		const id = close_feature.getAttribute('href')
		document.querySelector(id).classList.remove('active')
	}

})
</script>
@endsection