@extends('includes.user')

@section('title', 'iHost - Hosting')

@section('content')

<style>
	[data-id="hosting-table"] > thead > tr > th {
		font-weight: 500;
		font-size: 0.85rem;
		color: #616161;
		width: 25%;
	}

	[data-id="hosting-table"] > thead > tr > th:first-child, [data-id="hosting-table"] > tbody > tr > td:first-child {
		text-align: left;
	}

	[data-id="hosting-table"] > thead > tr > th:last-child, [data-id="hosting-table"] > tbody > tr > td:last-child {
		text-align: right;
	}

	[data-id="hosting-table"] > thead > tr > th:nth-child(1) {
		width: 35%;
	}

	[data-id="hosting-table"] > thead > tr > th:nth-child(2) {
		width: 15%;
	}

	[data-id="hosting-table"] > tbody > tr > td {
		font-size: 0.85rem
	}

</style>

<section style="margin-top: 10%">
	<table class="responsive-table regular-border centered" data-id="hosting-table">
		<thead>
			<tr>
				<th>Hosting Plan</th>
				<th>Status</th>
				<th>Expires On</th>
				<th>Auto Renew</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			{{-- <tr>
				<td>
					<span class="regular-text">Economy Hosting</span>
					<br>
					<span class="small-text grey-text truncate-1">idevlive.com</span>
				</td>
				<td>
					<span class="badges green">Active</span>
				</td>
				<td>
					<span>Aug 19, 2024</span>
				</td>
				<td>
					<div class="switch">
						<label>
							<input type="checkbox" class="auto-renew-checkbox" data-id="" data-product="hosting" checked><span class="lever"></span>
						</label>
					</div>
				</td>
				<td>
					<a
						href="#setup-hosting-popup"
						class="btn primary hover popup-trigger truncate">
						Setup Hosting
					</a>
				</td>
			</tr> --}}
		</tbody>
	</table>
</section>

{{-- <div class="row">
	<div class="col s12">
		<table class="responsive-table regular-border" data-id="hosting-table">
			<tbody>
				<tr>
					<td style="max-width: 40%">
						<span class="regular">Economy Hosting</span>
						<br>
						<span class="small-text grey-text">Primary Domain : idevlive.com</span>
						<br>
						<span class="small-text grey-text">Server IP : 192.168.0.1</span>
					</td>
					<td class="center-align">
						<p class="regular">Status<br><span class="badges green">Active</span></p>
					</td>
					<td class="center-align">
						<span class="regular">Expires On</span>
						<br>
						<span class="small-text grey-text"><?php echo date('M j, Y', strtotime('+12 months')) ?></span>
					</td>
					<td class="center-align">
						<span class="regular">Auto Renew</span>
						<div class="switch"><label>Off<input type="checkbox" class="auto-renew-checkbox" data-id="" data-product="hosting" checked><span class="lever"></span>On</label></div>
					</td>
					<td class="right-align" style="width: 20%">
						<a
							href="#!"
							data-serverip=""
							class="btn primary hover semi-bold open-ipanel">
							Open iPanel
						</a>
					</td>
				</tr>
				<tr>
					<td style="max-width: 40%">
						<span class="regular">Economy Hosting</span>
						<br>
						<span class="small-text grey-text">Primary Domain : idevlive.com</span>
						<br>
						<span class="small-text grey-text">Server IP : 192.168.0.1</span>
					</td>
					<td class="center-align">
						<p class="regular">Status<br><span class="badges green">Active</span></p>
					</td>
					<td class="center-align">
						<span class="regular">Expires On</span>
						<br>
						<span class="small-text grey-text"><?php echo date('M j, Y', strtotime('+12 months')) ?></span>
					</td>
					<td class="center-align">
						<span class="regular">Auto Renew</span>
						<div class="switch"><label>Off<input type="checkbox" class="auto-renew-checkbox" data-id="" data-product="hosting" checked><span class="lever"></span>On</label></div>
					</td>
					<td class="right-align" style="width: 20%">
						<a
							href="#setup-hosting-popup"
							class="btn primary hover semi-bold popup-trigger">
							Setup
						</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div> --}}

<style>
	nav.breadcrumb-nav a {
		color: #9e9e9e;
		font-size: 1rem;
	}

	nav.breadcrumb-nav a:last-child {
		color: #212121;
	}

	.breadcrumb::before {
		color: #9e9e9e;
	}
</style>

<div id="setup-hosting-popup" class="overlay-popup">
	<nav class="overlay-header">
		<div class="nav-wrapper container">
			<ul class="left">
				<li><a href="#!" class="medium" style="pointer-events: none; padding-left: 0">Setup Hosting</a></li>
			</ul>
			<ul class="right">
				<li><a href="#!" class="btn-flat"><i class="material-symbols-rounded" style="height: 36px; line-height: 36px">contact_support</i></a></li>
				<li><a href="#close-hosting-popup" class="btn-flat popup-close"><i class="material-symbols-rounded" style="height: 36px; line-height: 36px">close</i></a></li>
			</ul>
		</div>
	</nav>
	<div class="overlay-body">
		<form action="{{ url('hosting/setup') }}" method="post" style="padding: 2% 0" name="setup-hosting-form" autocomplete="off">
			@csrf
			<div class="container">
				<div class="form-part active" id="part-one">
					<nav class="white z-depth-0 breadcrumb-nav">
						<div class="nav-wrapper">
							<div class="col s12">
								<a href="#part-one" class="breadcrumb">Choose a domain</a>
							</div>
						</div>
					</nav>
					<br>
					<p>
						<label>
							<input class="with-gap domain-select" name="domain_select" value="ihost" type="radio" checked />
							<span class="grey-text text-darken-4">The domain is in my iHost Account</span>
						</label>
						<br>
						<span class="small-text grey-text">We will also configure your domain's DNS Records.</span>
					</p>
					<div class="setup-domain" id="ihost-domain">
						<div>
							<input type="text" name="ihost_domain_name" placeholder="Enter your domain name" value="idevlive.buzz">
						</div>
					</div>

					<div class="divider" style="margin-top: 12px; margin-bottom: 48px"></div>

					<p>
						<label>
							<input class="with-gap domain-select" name="domain_select" value="third-party" type="radio" />
							<span class="grey-text text-darken-4">The domain is with some other provider</span>
						</label>
						<br>
						<span class="small-text grey-text">You will have to manually configure the DNS Records for the domain.</span>
					</p>
					<div class="setup-domain" id="outside-domain" style="visibility: hidden">
						<div>
							<input type="text" name="outside_domain_name" placeholder="Enter your domain name">
						</div>
					</div>

					<br><br>

					<button class="btn-large primary hover" style="border-radius: 200px"><i class="material-symbols-rounded right">arrow_forward</i>Next</button>
				</div>
				<div class="form-part" id="part-two">
					<nav class="white z-depth-0 breadcrumb-nav">
						<div class="nav-wrapper">
							<div class="col s12">
								<a href="#part-one" class="breadcrumb">Choose a domain</a>
								<a href="#part-two" class="breadcrumb">Select a datacenter</a>
							</div>
						</div>
					</nav>
					<br>

					<div class="flexbox" style="column-gap: 24px">
						<div class="radio-wrapper">
							<input type="radio" id="datacenter-usa" class="custom-radio" name="datacenter" value="us">
							<label for="datacenter-usa">
								<img src="{{ asset('images/country-flags/united-states.png') }}" class="country-icon" alt="" width="48">
								<span class="medium">United States</span>
								<br>
								<span class="grey-text">New York</span>
							</label>
						</div>

						<div class="radio-wrapper">
							<input type="radio" id="datacenter-canada" class="custom-radio" name="datacenter" value="ca">
							<label for="datacenter-canada">
								<img src="{{ asset('images/country-flags/canada.png') }}" class="country-icon" alt="" width="48">
								<span class="medium">Canada</span>
								<br>
								<span class="grey-text">Toronto</span>
							</label>
						</div>

						<div class="radio-wrapper">
							<input type="radio" id="datacenter-india" class="custom-radio" name="datacenter" value="in">
							<label for="datacenter-india">
								<img src="{{ asset('images/country-flags/india.png') }}" class="country-icon" alt="" width="48">
								<span class="medium">India</span>
								<br>
								<span class="grey-text">Bangalore</span>
							</label>
						</div>
					</div>

					{{-- <div class="flexbox" style="column-gap: 24px; align-content: strech">
						<div class="card-panel hosting-setup-card">
							<img src="{{ asset('images/country-flags/united-states.png') }}" class="country-icon" alt="" width="48">
							<p>
								<span class="medium">United States</span>
								<br>
								<span class="grey-text">New York</span>
							</p>
							<button data-value="usa" name="datacenter-btn" value="usa" class="btn-flat primary full-width">Select</button>
						</div>

						<div class="card-panel hosting-setup-card">
							<img src="{{ asset('images/country-flags/canada.png') }}" alt="" class="country-icon" width="48">
							<p>
								<span class="medium">Canada</span>
								<br>
								<span class="grey-text">Toronto</span>
							</p>
							<button data-value="canada" name="datacenter-btn" value="canada" class="btn-flat primary full-width">Select</button>
						</div>

						<div class="card-panel hosting-setup-card">
							<img src="{{ asset('images/country-flags/india.png') }}" alt="" class="country-icon" width="48">
							<p>
								<span class="medium">India</span>
								<br>
								<span class="grey-text">Bangalore</span>
							</p>
							<button data-value="india" name="datacenter-btn" value="india" class="btn-flat primary full-width">Select</button>
						</div>
					</div>
					<input type="hidden" name="datacenter"> --}}
					{{-- <div class="flexbox" style="column-gap: 48px"> --}}
						{{-- <p>
							<label>
								<input class="with-gap domain-select" name="domain_select" value="ihost" type="radio" checked />
								<span class="grey-text text-darken-4">United States</span>
								<br>
								<span class="small-text grey-text" style="padding-left: 35px">New York</span>
							</label>
						</p>
						
						<div class="divider" style="margin: 24px 0"></div>

						<p>
							<label>
								<input class="with-gap domain-select" name="domain_select" value="third-party" type="radio" />
								<span class="grey-text text-darken-4">Canada</span>
								<br>
								<span class="small-text grey-text" style="padding-left: 35px">Toronto</span>
							</label>
						</p>

						<div class="divider" style="margin: 24px 0"></div>

						<p>
							<label>
								<input class="with-gap domain-select" name="domain_select" value="third-party" type="radio" />
								<span class="grey-text text-darken-4">India</span>
								<br>
								<span class="small-text grey-text" style="padding-left: 35px">Bangalore</span>
							</label>
						</p> --}}
					{{-- </div> --}}
					

					<br><br>

					<button class="btn-large primary hover" style="border-radius: 200px"><i class="material-symbols-rounded right">arrow_forward</i>Next</button>
				</div>
				<div class="form-part" id="part-three">
					<nav class="white z-depth-0 breadcrumb-nav">
						<div class="nav-wrapper">
							<div class="col s12">
								<a href="#part-one" class="breadcrumb">Choose a domain</a>
								<a href="#part-two" class="breadcrumb">Select a datacenter</a>
								<a href="#part-three" class="breadcrumb">Install Wordpress</a>
							</div>
						</div>
					</nav>
					<br>
					<p>
						<label>
							<input class="with-gap" name="wordpress" value="yes" type="radio" />
							<span>Yes</span>
						</label>
					</p>

					<p>
						<label>
							<input class="with-gap" name="wordpress" value="no" type="radio" />
							<span>No</span>
						</label>
					</p>
					<br>
					<p>
						<button class="btn-large primary hover" style="border-radius: 200px"><i class="material-symbols-rounded right">arrow_forward</i>Start Setup</button>
					</p>
				</div>
				{{-- <div class="form-part" id="part-four">
					<h5 class="medium hosting-setup-header">
						<a href="#part-three" class="left back"><i class="material-symbols-outlined">arrow_back</i></a>
						<span>Check your settings</span>
					</h5>
					<br>
					<p>
						<span class="medium">Website name</span>
						<br>
						<span class="grey-text">quickprobooks.info</span>
						<br>
						<a href="#part-one" class="small-text medium back">Edit</a>
					</p>
					<br>
					<p>
						<span class="medium">Datacenter</span>
						<br>
						<span class="grey-text">India</span>
						<br>
						<a href="#part-two" class="small-text medium back">Edit</a>
					</p>
					<br>
					<p>
						<span class="medium">Wordpress</span>
						<br>
						<span class="grey-text">No</span>
						<br>
						<a href="#part-three" class="small-text medium back">Edit</a>
					</p>
					<br>
					<p>
						<button class="btn-large primary hover" style="border-radius: 200px"><i class="material-symbols-rounded right">arrow_forward</i>Start Setup</button>
					</p>
				</div> --}}
			</div>
		</form>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/user/hosting.js') }}"></script>
@endsection