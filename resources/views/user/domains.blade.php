@extends('includes.user')

@section('title', 'iHost - Domains')

@section('content')
<style>
	.flexbox > .input-field {
		margin: 0 6px;
	}

	.flexbox > .input-field > label {
		font-size: 13px;
	}

	.flexbox > .input-field:first-child {
		padding-left: 0;
	}

	.flexbox > .input-field:last-child {
		padding-right: 0;
	}

	.flexbox > .input-field > button {
		min-width: 135px;
	}

	.features-wrapper > .features-card {
		width: 300px;
	}

	[data-id="domains-table"] > thead > tr > th:first-child, [data-id="domains-table"] > tbody > tr > td:first-child {
		text-align: left !important;
	}

	[data-id="domains-table"] > thead > tr > th:last-child, [data-id="domains-table"] > tbody > tr > td:last-child {
		text-align: right !important;
	}

	.btn-group.flat {
		display: flex;
		justify-content: flex-end;
		align-items: center;
		align-content: center;
		column-gap: 12px;
	}

	.btn-group.flat > .btn {
		font-weight: 500
	}

	.btn-group.flat > .btn:first-child {
		border: 1px solid #ffffff;
		background-color: #ffffff;
		color: var(--primary);
	}

	.btn-group.flat > .btn:first-child:hover {
		background-color: var(--primary-200);
		outline-color: var(--primary-200);
	}
	
	.btn-group.flat > .btn:last-child {
		border: 1px solid var(--primary);
		background-color: #ffffff;
		color: var(--primary);
	}

	.btn-group.flat > .btn:last-child:hover {
		background-color: var(--primary);
		color: #ffffff;
	}

	@media only screen and (max-width : 992px) {
		.features-wrapper > .features-card {
			width: calc(100% - 24px);
		}
	}

	[data-id="domains-table"] th {
		width: 25%;
		font-weight: 500;
		color: #616161;
		font-size: 0.85rem;
	}

	[data-id="domains-table"] td:last-child {
		width: fit-content !important;
	}
</style>

<section class="hide" data-id="domain-wrapper" style="margin-top: 10%">
	<table class="responsive-table regular-border centered" data-id="domains-table">
		<thead>
			<tr>
				<th>Domain</th>
				<th>Status</th>
				<th>Expires On</th>
				<th>Auto Renew</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			{{-- <tr>
				<td>
					<span style="font-size: 16px" class="medium"><a href="#!" style="color: #212121; text-decoration: underline">idevlives.com</a></span>
					<br>
					<span class="small-text grey-text">Privacy: Disabled</span>
				</td>
				<td class="small-text"><span class="badges green">Active</span></td>
				<td class="small-text">Aug 18, 2025</td>
				<td class="small-text">
					<div class="switch">
						<label>
							<input type="checkbox" class="auto-renew-checkbox" data-id="" data-product="hosting" checked>
							<span class="lever"></span>
						</label>
					</div>
				</td>
			</tr> --}}
		</tbody>
	</table>
</section>

<section class="hide" data-id="get-a-domain" style="margin-top: 10%">
	<p class="medium">You don't have any domains. Buy a new one or transfer an existing domain.</p>
	<br>
	<div class="features-wrapper" style="justify-content: flex-start">
		<div class="card-panel features-card center-align">
			<p>
				<img src="{{ asset('images/icons/search-primary.svg') }}" alt="" height="24" width="24">
			</p>
			<p class="medium">Buy a new domain</p>
			<p class="grey-text">Search for a domain name and get it registered instantly.</p>
			<a href="#buy-domain-modal" class="btn-flat primary modal-trigger" style="margin-top: 24px">Search</a>
		</div>

		<div class="card-panel features-card center-align">
			<p>
				<img src="{{ asset('images/icons/domain-transfer.svg') }}" alt="" height="24" width="24">
			</p>
			<p class="medium">Transfer a domain</p>
			<p class="grey-text">Transfer a domain previously purchased at another provider.</p>
			<a href="#transfer-domain-modal" class="btn-flat primary modal-trigger" style="margin-top: 24px">Transfer</a>
		</div>
	</div>
</section>

<div id="manage-domain-modal" class="modal small-modal white">
	<div class="modal-content" style="padding-top: 0">
		<div class="white" style="position: sticky; top: 0; z-index: 99; padding-top: 24px">
			<p class="medium">
				<i class="material-symbols-rounded left">arrow_back</i>
				<span>Manage Domain</span>
			</p>
		</div>
		<br>
		<p class="medium">Privacy Protection</p>
		<p class="grey-text small-text">Enabling Privacy Protection will hide your real contact information in the WhoIs Database</p>
		<div class="switch">
			<label>
				<input type="checkbox" class="privacy-checkbox" data-id="change-privacy" />
				<span class="lever"></span>
			</label>
		</div>

		<div class="divider" style="margin: 16px 0"></div>

		<p class="medium">Domain Lock</p>
		<p class="grey-text small-text">A lock prohibits DNS changes to the Domain Name.</p>

		<div class="switch">
			<label>
				<input type="checkbox" class="domain-lock-checkbox" data-id="change-domain-lock" />
				<span class="lever"></span>
			</label>
		</div>

		<div class="divider" style="margin: 16px 0"></div>

		<p class="medium">Theft Protection</p>
		<p class="grey-text small-text">Theft Protection secures your Domain from unauthorized transfers.</p>

		<div class="switch">
			<label>
				<input type="checkbox" class="theft-protection-checkbox" data-id="change-theft-protection" />
				<span class="lever"></span>
			</label>
		</div>
	</div>

	<div class="modal-footer"></div>
</div>

<div id="buy-domain-modal" class="modal modal-fixed-footer small-modal white">
	<div class="modal-content domain-info-wrapper" style="padding-top: 0">
		<div class="center-align" data-id="domain-header" style="margin-top: 24px">
			<br>
			<p class="medium">Domain Name Search</p>
			<p>Search for your desired domain name and instantly find out it's availability. Get it registered before it is taken by someone else.</p>
			<br>
		</div>
		<div class="sticky-top white" style="top: 0; padding-top: 24px; z-index: 99">
			<div class="card-panel domain-wrapper">
				<form action="{{ url('domain/search') }}" method="post" name="domain-search-form" autocomplete="off">
					@csrf
					{{-- <input type="hidden" name="locale" value="{{ session()->get('region') }}"> --}}
					<input type="hidden" name="locale" value="{{ $profile->region }}">
					<input type="text" name="domain_name" placeholder="Search for that perfect domain name">
					<button name="submit-btn">
						<img src="{{ asset('images/icons/search.svg') }}" alt="">
					</button>
				</form>
			</div>
		</div>
		<div class="hide center-align" data-id="error-container">
			<br><br>
			<img src="{{ asset('images/website/network-error.svg') }}" alt="" style="width: 30%">
			<p class="red-text"></p>
		</div>

		<div class="hide" data-id="domain-unavailable">
			<p>This domain name is not available for registration.</p>
			<table>
				<tbody>
					
				</tbody>
			</table>
		</div>

		<div class="hide" data-id="domain-configuration">
			<br>
			<p class="medium">This domain name is available for purchase</p>
			<br>
			<p class="medium regular">Select Term Length</p>
			<div class="flexbox space-between" style="align-items: center">
				<a class="dropdown-trigger btn-flat grey lighten-3" href="#!" data-target="term-length"><i class="material-icons right">keyboard_arrow_down</i>1 Year</a>
				<span class="right" data-id="domain-price">for $ 10.99</span>
			</div>

			<br><div class="divider"></div>

			<div class="flexbox space-between" style="align-items: center">
				<p class="medium regular">Add Privacy Protection</p>
				
				<div class="switch">
					<label>
						Off
						<input type="checkbox" name="privacy-protection" checked="">
						<span class="lever"></span>
						On
					</label>
				</div>
			</div>

			<h6 class="small-text">Protects your contact information from fraud and prevents email spam. iHost privacy protection is free of cost.</h6>

			<br><div class="divider"></div>

			<div class="flexbox space-between" style="align-items: center">
				<p class="medium regular">Add Domain Lock</p>
				
				<div class="switch">
					<label>
						Off
						<input type="checkbox" name="privacy-protection" checked="">
						<span class="lever"></span>
						On
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer hide" style="background-color: var(--primary); border-top: none; padding: 0">
		<form action="{{ url('cart/add') }}" method="post" name="domain-add-form">
			@csrf
			<input type="hidden" name="locale" value="{{ session()->get('region') }}">
			<input type="hidden" name="product_id">
			<input type="hidden" name="privacy" value="on">
			<input type="hidden" name="domain_lock" value="on">
			<input type="hidden" name="domain_name">
			<input type="hidden" name="locale" value="{{ $profile->region }}">
			<button class="btn-flat full-width white-text" style="height: 56px; margin: 0; background-color: var(--primary)">Add to cart</button>
		</form>
	</div>
</div>

<ul class="dropdown-content" id="term-length">
	<li><a href="#!">1 Year</a></li>
	<li><a href="#!">2 Years</a></li>
	<li><a href="#!">3 Years</a></li>
	<li><a href="#!">5 Years</a></li>
</ul>

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/user/domains.js') }}"></script>
@endsection