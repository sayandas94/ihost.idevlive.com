@extends('includes.in')

@section('title', 'Domain Name Extensions - Choose the Right One | iHost India')

@section('keywords', 'domain extensions, domain name extensions India, choose domain extension, top-level domains, register TLD India')
@section('description', 'Explore a variety of domain name extensions available with iHost India. Choose the right one to represent your brand online.')

@section('content')
<h1 class="hide">Choose the Right Domain Name Extension</h1>
<h2 class="hide">Popular Domain Name Extensions in India</h2>
<h2 class="hide">Which Domain Extension is Right for You?</h2>
<h2 class="hide">Register a Domain with Your Chosen Extension</h2>
<!-- Header (Start) -->
<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<span class="small-text medium">Domain Name Extensions</span>
				{{-- <h4 class="header-text">Explore the possibilities with new domain extensions.</h4> --}}
				<h4 class="header-text">500+ new domains extensions to choose from.</h4>
				<p class="medium">Up to <span class="primary-text">20% off</span> on new domain registrations</p>
				<br>
				<p><i class="material-symbols-rounded left primary-text">automation</i>Automatic. No tech skills required.</p>
				<p>
					<img src="{{ asset('images/icons/247-support.svg') }}" alt="" width="24" height="24" style="float: left; margin-right: 15px">
					24/7 Support
				</p>
				<p><i class="material-symbols-rounded left primary-text">manage_accounts</i>Management Made Easy</p>
				{{-- <br> --}}
				{{-- <div class="card-panel domain-wrapper">
					<form action="{{ url('api/domain/search') }}" method="post" name="domain-search-form" autocomplete="off">
						@csrf
						<input type="text" name="domain_name" placeholder="Search for that perfect domain name">
						<button>
							<img src="{{ asset('images/icons/search.svg') }}" alt="">
						</button>
					</form>
				</div> --}}
			</div>
			<div class="col s12 m6 l7">
				<img src="{{ asset('images/website/domain-extensions.jpg') }}" alt="" class="responsive-img">
			</div>
		</div>
	</div>
</section>
<!-- Header (End) -->

<!-- Popular TLDs (Start) -->
<section class="center-align">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h3 class="header-text">Popular Domain Extensions for {{ date('Y') }}</h3>
				<br><br>
			</div>

			<div class="col s12 m4 l3">
				<div class="card-panel domain-extension-card">
					<h2 class="semi-bold">.com</h2>
					<p>The most popular domain extension.</p>
					<a href="#!" class="btn-flat primary hover full-width">Learn more</a>
				</div>
			</div>

			<div class="col s12 m4 l3">
				<div class="card-panel domain-extension-card">
					<h2 class="semi-bold">.cloud</h2>
					<p>Ideal for cloud services and solutions.</p>
					<a href="#!" class="btn-flat primary hover full-width">Learn more</a>
				</div>
			</div>

			<div class="col s12 m4 l3">
				<div class="card-panel domain-extension-card">
					<h2 class="semi-bold">.shop</h2>
					<p>Perfect for e-commerce websites.</p>
					<a href="#!" class="btn-flat primary hover full-width">Learn more</a>
				</div>
			</div>

			<div class="col s12 m4 l3">
				<div class="card-panel domain-extension-card">
					<h2 class="semi-bold">.io</h2>
					<p>Popular with tech startups & developers.</p>
					<a href="#!" class="btn-flat primary hover full-width">Learn more</a>
				</div>
			</div>

			<div class="col s12 m4 l3">
				<div class="card-panel domain-extension-card">
					<h2 class="semi-bold">.icu</h2>
					<p>Short for “I See You,” versatile use.</p>
					<a href="#!" class="btn-flat primary hover full-width">Learn more</a>
				</div>
			</div>

			<div class="col s12 m4 l3">
				<div class="card-panel domain-extension-card">
					<h2 class="semi-bold">.info</h2>
					<p>Great for information and resources.</p>
					<a href="#!" class="btn-flat primary hover full-width">Learn more</a>
				</div>
			</div>

			<div class="col s12 m4 l3">
				<div class="card-panel domain-extension-card">
					<h2 class="semi-bold">.pro</h2>
					<p>Professional domain for experts.</p>
					<a href="#!" class="btn-flat primary hover full-width">Learn more</a>
				</div>
			</div>

			<div class="col s12 m4 l3">
				<div class="card-panel domain-extension-card">
					<h2 class="semi-bold">.online</h2>
					<p>Suitable for a strong online presence.</p>
					<a href="#!" class="btn-flat primary hover full-width">Learn more</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Popular TLDs (End) -->

<!-- All TLDs (Start) -->
<section class="center">
	<div class="container">
		<div class="row">
			<div class="col s12 m10 l8 offset-m1 offset-l2">
				<h3 class="header-text">Checkout what iHost offers</h3>
				<br><br>
			</div>
		</div>
		<table class="centered responsive-table" data-id="domain-extensions">
			<thead>
				<tr>
					<th>Extension</th>
					<th>Registration Price</th>
					<th>Renewal Price</th>
					<th></th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
		<br><br>
		<a href="#load-more-tld" class="btn-flat primary" style="font-weight: 500">Show all domain extensions</a>
	</div>
</section>
<!-- All TLDs (End) -->

<!-- Benefits (Start) -->
<section class="center-align">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h3 class="header-text">Why to buy from iHost?</h3>
				<br><br>
			</div>

			<div class="col s12 m4">
				<div class="card-panel z-depth-0">
					<i class="material-symbols-rounded medium primary-text">hdr_strong</i>
					<p class="medium">500+ Options</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus itaque dignissimos dolores amet? Quis a expedita possimus mollitia quod tempora.</p>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card-panel z-depth-0">
					<i class="material-symbols-rounded medium primary-text">key_visualizer</i>
					<p class="medium">Security & Privacy</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus itaque dignissimos dolores amet? Quis a expedita possimus mollitia quod tempora.</p>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card-panel z-depth-0">
					{{-- <i class="material-symbols-rounded medium primary-text">support_agent</i> --}}
					<img src="{{ asset('images/icons/247-support.svg') }}" alt="" width="60" height="60">
					<p class="medium">24/7 Support</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus itaque dignissimos dolores amet? Quis a expedita possimus mollitia quod tempora.</p>
				</div>
			</div>
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
<script>
	document.addEventListener('DOMContentLoaded', async (e) => {
		const domain_info = await get(appUrl('domain/get-tld-info'))
		document.querySelector('[data-id="domain-extensions"] tbody').innerHTML = ''
		for (let i = 0; i < 10; i++) {
			document.querySelector('[data-id="domain-extensions"] tbody').innerHTML += `<tr>
				<td>${domain_info[i].name}</td>
				<td>$ ${domain_info[i].after_discount}</td>
				<td>$ ${domain_info[i].before_discount}</td>
				<td><a href="${appUrl('domains')}" class="btn-flat primary hover ">Buy Now</a></td>
			</tr>`
		}
	})
</script>
{{-- <script type="text/javascript" src="{{ asset('js/modules/domain.js') }}"></script> --}}
@endsection