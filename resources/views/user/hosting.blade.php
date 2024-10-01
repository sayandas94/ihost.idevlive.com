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

	[data-id="hosting-table"] > thead > tr > th:first-child {
		padding-left: 21px;
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

	/* table.user-hosting tbody tr {
		border-bottom: 1px solid #
	} */

	table.user-hosting tbody tr td .card-panel {
		padding: 8px 16px;
		border-radius: 8px;
	}

	table.user-hosting tbody tr:hover td .card-panel {
		background-color: #f5f5f5;
	}

	table.user-hosting tbody tr td .card-panel:hover {
		cursor: pointer;
		background-color: var(--primary-300);
	}

</style>

<section style="margin-top: 10%">
	<table class="responsive-table centered user-hosting" data-id="hosting-table">
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
			<tr>
				<td>
					<div class="card-panel z-depth-0">
						<span class="regular-text">Economy Hosting</span>
						<br>
						<span class="small-text grey-text truncate-1">idevlive.com</span>
					</div>
				</td>
				<td>
					<span class="badges red">Expired</span>
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
					{{-- <a
						href="#setup-hosting-popup"
						class="btn primary hover popup-trigger truncate">
						Setup Hosting
					</a> --}}
					<button class="btn-flat"><i class="material-symbols-rounded">more_vert</i></button>
				</td>
			</tr>

			<tr>
				<td>
					<div class="card-panel z-depth-0">
						<span class="regular-text">Premium Hosting</span>
						<br>
						<span class="small-text grey-text truncate-1">Click here to setup</span>
					</div>
				</td>
				<td>
					<span class="badges blue">Setup</span>
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
					<button class="btn-flat"><i class="material-symbols-rounded">more_vert</i></button>
				</td>
			</tr>
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

@component('components.SetupHosting') @endcomponent

<ul id="hosting-dropdown" class="dropdown-content" style="border-radius: 8px"></ul>

<style>
	.renew-table tr {
		border-bottom: none !important;
	}

	.renew-table > tbody > tr > td {
		padding: 24px 5px !important;
	}
</style>

<div id="renew-hosting" class="modal small-modal round-modal modal-fixed-footer">
	<div class="modal-content" style="height: 100% !important">
		<form action="{{ url('hosting/renew') }}" method="POST" id="RenewHostingForm" style="height: 100%">
			@csrf
			<input type="hidden" name="hosting_id">
			<input type="hidden" name="payment_method">
			<input type="hidden" name="tax_id">
			<div class="form-part flexbox active" id="PartOne" style="flex-direction: column; justify-content: space-between; height: 100%">
				<div>
					<p>
						<span class="small-text grey-text">Web Hosting</span>
						<br>
						<span class="medium">Premium Web Hosting</span>
					</p>
					<div data-id="hosting-term"></div>
				</div>
				<div>
					<div data-id="PricePanel" style="position: relative">
						<h6 class="small-text grey-text" data-id="RenewalDate"></h6>
						<p class="flexbox space-between">
							<span class="small-text medium">Sub Total</span>
							<span class="small-text" id="sub_total">Rs 25.00</span>
						</p>
						<div class="loader-container white hide" style="position: absolute; height: 100%; width: 100%; top: 0; left: 0">
							<div class="preloader-wrapper tiny active" style="position: absolute; top: calc(50% - 8px); left: calc(50% - 8px)"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
						</div>
					</div>
					<br>
					<div class="card-panel grey lighten-4 z-depth-0 left-align" style="border-radius: 8px">
						<span class="small-text">Subtotal does not includes taxes and fees. Taxes and fees will be calculated during checkout, based on your location.</span>
					</div>
					<button class="btn-flat btn-large primary full-width" name="checkout-btn" value="checkout" style="font-weight: 500">Checkout</button>
				</div>
			</div>

			<div class="form-part flexbox" id="PartTwo" style="flex-direction: column; justify-content: space-between; height: 100%">
				<div>
					<p class="small-text medium">
						<span>Billing Address</span>
						<a href="#!" class="right">Edit</a>
					</p>

					<p data-id="BillingAddress"></p>
				</div>

				<div>
					<div class="divider"></div>
					<p class="small-text medium">Payment Methods</p>
					{{-- <div class="input-field">
						<input type="text" class="payment-input" value="&bull;&bull;&bull;&bull; 4242" />
					</div> --}}
					<a href="#!" class="btn select-duration-btn" data-target="payment-methods">
						<i class="material-icons right">keyboard_arrow_down</i>
						&bull;&bull;&bull;&bull;
						<span data-id="last4"></span>
					</a>
					<ul id="payment-methods" class="dropdown-content" style="border-radius: 8px"></ul>
					{{-- <select name="payment_method" id="payment-methods"> --}}
						{{-- <option value="hello">&bull;&bull;&bull;&bull; 4242</option> --}}
					{{-- </select> --}}
				</div>

				<div>
					<div data-id="price-wrapper">
						<div class="divider"></div>
						<p class="flexbox space-between">
							<span class="small-text medium">Sub Total</span>
							<span class="small-text" id="sub_total">Rs 25.00</span>
						</p>

						<p class="flexbox space-between">
							<span class="small-text medium">Taxes & Fees</span>
							<span class="small-text" id="sub_total">Rs 25.00</span>
						</p>

						<p class="flexbox space-between">
							<span class="small-text medium">Amount to Pay</span>
							<span class="small-text" id="sub_total">Rs 25.00</span>
						</p>
					</div>

					<button class="btn-flat btn-large primary full-width" name="submit-btn" value="pay now" style="font-weight: 500">Pay Now</button>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection

@section('script')
<script type="module" src="{{ asset('js/user/hosting.js') }}"></script>
@endsection