@extends('includes.us')

@section('title', 'WHOIS Lookup for Domains - Check Domain Information | iHost USA')

@section('keywords', 'WHOIS lookup USA, domain information, domain ownership, WHOIS tool, find domain owner, check domain details')
@section('description', 'Use the iHost WHOIS lookup tool to check domain ownership and registration details. Discover domain information quickly and easily in the USA.')

@section('content')

<h1 class="hide">WHOIS Lookup: Check Domain Information in the USA</h1>
<h2 class="hide">How WHOIS Lookup Works</h2>
<h2 class="hide">Why Use WHOIS Lookup?</h2>
<h2 class="hide">Check Domain Ownership and Registration Details</h2>

<!-- Header (Start) -->
<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<span class="small-text medium">Whois Domain Lookup</span>
				<h4 class="header-text">Find out the ownership of a domain name.</h4>
				<br>
				<p>
					<a class="btn-flat primary" style="font-weight: 500; display: flex; align-items: center; width: fit-content" href="{{ url('domains') }}">
						<img src="{{ asset('images/icons/search-primary.svg') }}" alt="" width="24" height="24" style="margin-right: 15px">
						Domain name search
					</a>
				</p>
				<p>
					<a class="btn-flat primary" style="font-weight: 500; display: flex; align-items: center; width: fit-content" href="{{ url('transfer-domain') }}">
						<img src="{{ asset('images/icons/domain-transfer.svg') }}" alt="" width="24" height="24" style="margin-right: 15px">
						Domain transfer
					</a>
				</p>
				<p>
					<a class="btn-flat primary" style="font-weight: 500; display: flex; align-items: center; width: fit-content" href="{{ url('domain-name-extensions') }}">
						<img src="{{ asset('images/icons/domain-extension-icon.svg') }}" alt="" width="24" height="24" style="margin-right: 15px">
						Domain name extensions
					</a>
				</p>
				<br>
				<div class="card-panel domain-wrapper">
					<form action="{{ url('api/domain/search') }}" method="post" name="domain-search-form" autocomplete="off">
						@csrf
						<input type="text" name="domain_name" placeholder="Look for a domain owner">
						<button>
							<img src="{{ asset('images/icons/search.svg') }}" alt="">
						</button>
					</form>
				</div>
			</div>
			<div class="col s12 m6 l7">
				<img src="{{ asset('images/website/whois-lookup.jpg') }}" alt="" class="responsive-img">
			</div>
		</div>
	</div>
</section>
<!-- Header (End) -->

<!-- Why Whois Lookup (Start) -->
<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m4">
				<div class="card-panel features-box" style="border-radius: 8px">
					<i class="material-symbols-rounded primary-text small">screen_search_desktop</i>
					<p class="semi-bold">Check domain name availability</p>
					<a href="#!" class="btn-flat primary" style="margin-top: 0; font-weight: 500">Read More</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box" style="border-radius: 8px">
					<i class="material-symbols-rounded primary-text small">person_search</i>
					<p class="semi-bold">Find the domain owner</p>
					<a href="#!" class="btn-flat primary" style="margin-top: 0; font-weight: 500">Read More</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card-panel features-box" style="border-radius: 8px">
					<i class="material-symbols-rounded primary-text small">schedule</i>
					<p class="semi-bold">See the domain expiration</p>
					<a href="#!" class="btn-flat primary" style="margin-top: 0; font-weight: 500">Read More</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Why Whois Lookup (End) -->

<section>
	<div class="container">
		<div class="divider"></div>
	</div>
</section>

<!-- What is Whois Lookup (Start) -->
<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<p class="semi-bold">What is the Whois Lookup Tool?</p>
				<p>iHost's Whois lookup tool shows the latest data registered on the official Whois domain database. It can be used for obtaining information about the domain's registrant as many times as you want for free.</p>

				<br>

				<p class="semi-bold">How does it work?</p>
				<p>Whenever someone registers a domain name, they have to submit their information to ICANN. Some of this information is made available on the public database and can be accessed using our lookup services.</p>
			</div>

			<div class="col m6 l6 offset-l1 hide-on-small-only">
				<img src="{{ asset('images/website/what-is-whois-lookup.jpg') }}" alt="" class="responsive-img">
			</div>
		</div>
	</div>
</section>
<!-- What is Whois Lookup (End) -->

<!-- FAQ for Whois Lookup (Start) -->
<section>
	<div class="container">
		<h3 class="header-text center-align">Frequntly Asked Questions</h3>
		<br><br>
		<ul class="collapsible z-depth-0" data-collapsible="accordion" style="border: none">
			<li>
				<div class="collapsible-header semi-bold">What is Whois Lookup?</div>
				<div class="collapsible-body">
					<p>The domain transfer process typically takes between 5 to 7 days, depending on the current registrar and the responsiveness to transfer approval requests. We strive to make the process as smooth and quick as possible.</p>
				</div>
			</li>
			<li>
				<div class="collapsible-header semi-bold">Why my information is in Whois database?</div>
				<div class="collapsible-body">
					<p>After the transfer, your domain's DNS settings will remain unchanged. You can update your DNS settings at any time through our free DNS management tools, ensuring that your website continues to function without interruption.</p>
				</div>
			</li>
			<li>
				<div class="collapsible-header semi-bold">What is Whois Privacy?</div>
				<div class="collapsible-body">
					<p>No, your website will not experience any downtime during the domain transfer process. Your domain's DNS settings will remain active and unchanged until the transfer is complete, ensuring continuous website availability.</p>
				</div>
			</li>
			<li>
				<div class="collapsible-header semi-bold">Why some domain information are hidden?</div>
				<div class="collapsible-body">
					<p>After the transfer, your domain's DNS settings will remain unchanged. You can update your DNS settings at any time through our free DNS management tools, ensuring that your website continues to function without interruption.</p>
				</div>
			</li>
			<li>
				<div class="collapsible-header semi-bold">What is the accuracy of Whois data?</div>
				<div class="collapsible-body">
					<p>To initiate a domain transfer, you will need to provide your domain name, an authorization code (also known as EPP code) from your current registrar, and ensure your domain is unlocked. Additionally, make sure your domain is not within 60 days of registration or a previous transfer.</p>
				</div>
			</li>
			<li>
				<div class="collapsible-header semi-bold">How to update the Whois information?</div>
				<div class="collapsible-body">
					<p>Yes, there is typically a transfer fee, which includes the cost of extending your domain registration for an additional year. Our pricing is competitive, and there are no hidden fees. You'll see the cost upfront before confirming </p>
				</div>
			</li>
			<li>
				<div class="collapsible-header semi-bold">Who owns the Whois database?</div>
				<div class="collapsible-body">
					<p>After the transfer, your domain's DNS settings will remain unchanged. You can update your DNS settings at any time through our free DNS management tools, ensuring that your website continues to function without interruption.</p>
				</div>
			</li>
		</ul>
	</div>
</section>
<!-- FAQ for Whois Lookup (End) -->

@endsection

@section('script')
{{-- <script type="text/javascript" src="{{ asset('js/modules/domain.js') }}"></script> --}}
@endsection