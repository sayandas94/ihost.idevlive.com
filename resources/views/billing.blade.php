@php
	$countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Antigua and Barbuda","Argentina","Armenia","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Brazil","Brunei","Bulgaria","Burkina","Burundi","Cabo Verde","Cambodia","Cameroon","Canada","Central African Republic","Chad","Chile","China","Colombia","Comoros","Congo","Costa Rica","Cote d'Ivoire","Croatia","Cuba","Cyprus","Czech Republic","Democratic Republic of the Congo","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Eswatini","Ethiopia","Fiji","Finland","France","Gabon","Gambia","Georgia","Germany","Ghana","Greece","Grenada","Guatemala","Guinea","Guinea-Bissau","Guyana","Haiti","Holy See","Honduras","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepal","Netherlands","New Zealand","Nicaragua","Niger","Nigeria","North Korea","North Macedonia","Norway","Oman","Pakistan","Palau","Palestine State","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Qatar","Romania","Russia","Rwanda","Saint Kitts and Nevis","Saint Lucia","Saint Vincent and the Grenadines","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","Sudan","Suriname","Sweden","Switzerland","Syria","Tajikistan","Tanzania","Thailand","Timor-Leste","Togo","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","Uruguay","Uzbekistan","Vanuatu","Venezuela","Vietnam","Yemen","Zambia","Zimbabwe"];

	switch (session()->get('region')) {
		case 'IN':
			$states = ['Andaman and Nicobar Islands', 'Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar', 'Chandigarh', 'Chhattisgarh', 'Daman & Diu', 'Delhi NCT', 'Goa', 'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jammu & Kashmir', 'Jharkhand', 'Karnataka', 'Kerala', 'Ladakh', 'Lakshadweep', 'Madhya Pradesh', 'Maharashtra', 'Manipur', 'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha', 'Puducherry', 'Punjab', 'Rajasthan', 'Sikkim', 'Tamil Nadu', 'Telangana', 'Tripura', 'Uttarakhand', 'Uttar Pradesh', 'West Bengal'];
			break;

		default:
			$states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];
			break;
	}
@endphp
@extends('includes.us')

@section('title', 'iHost - Checkout')

@section('content')
<style>
	.col.l6 {
		position: relative;
	}

	.col.l6 > .disabled {
		position: absolute;
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		background-color: rgba(255, 255, 255, 0.7);
		z-index: 19;
		display: flex;
		justify-content: center;
	}
</style>
<section style="padding-top: 5%">
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l6">
				<div class="disabled" data-id="disabled">
					<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
				</div>
				<form action="{{ url('accounts/update-address') }}" method="post" name="checkout-form" autocomplete="off">
					@csrf
					<div class="row">
						<div class="col s12">
							<nav class="breadcrumb-container">
								<div class="nav-wrapper">
									<a href="{{ url('cart') }}" class="breadcrumb">Cart</a>
									<a href="#!" class="breadcrumb">Billing Details</a>
								</div>
							</nav>
						</div>

						<div class="input-field col s12">
							<input type="email" name="email" id="email">
							<label for="email">Email Address</label>
						</div>
						<div class="input-field col s6">
							<input type="text" name="customer_name" id="customer-name">
							<label for="customer-name">Name</label>
						</div>
						<div class="input-field col s6">
							{{-- <span class="prefix" style="font-size: 14.5px; text-align: center; margin-top: 5px;"><i class="material-symbols-rounded">flag</i></span> --}}
							<span class="prefix" data-id="country-code" style="font-size: 14.5px; text-align: center; margin-top: 5px;">+1</span>
							{{-- <span class="country-code" style="position: absolute; top: 10.5px; font-size: 16px">+1</span> --}}
							<input type="text" name="phone_number" id="phone-number" maxlength="10" style="">
							<label for="phone-number">Phone Number</label>
						</div>
						<div class="input-field col s12">
							<select name="country" id="country">
								<option disabled selected>Billing Country</option>
								@foreach ($countries as $country)
									<option value="{{ $country }}">{{ $country }}</option>
								@endforeach
							</select>
							<label for="country">Billing Country</label>
						</div>
						<div class="input-field col s12">
							<input type="text" name="street" id="street-address" />
							<label for="street-address">Street Address</label>
						</div>
						<div class="input-field col s6">
							<input type="text" name="city" id="city" />
							<label for="city">City</label>
						</div>
						<div class="input-field col s6">
							<select name="state" id="state">
								<option disabled selected>State</option>
							</select>
							<label for="state">State</label>
						</div>
						<div class="input-field col s6">
							<input type="text" name="postal_code" id="postal_code" />
							<label for="postal_code">Postal Code</label>
						</div>
						{{-- <div class="input-field col s6">
							<a href="{{ url('cart') }}" class="btn-large grey lighten-2 black-text full-width">Edit Order</a>
						</div> --}}
						{{-- <div class="input-field col s12 center-align">
							<button class="btn-large btn-flat primary solid custom-btn full-width" name="make-payment-btn" value="submit">Update Address</button>
						</div> --}}
					</div>
				</form>
			</div>
			<div class="col s12 m6 l5 offset-l1">
				<div class="card-panel z-depth-0" style="margin-top: 25px; border: 1px solid #dfdfdf">
					<h5 class="semi-bold">Order Summary</h5>
					<p class="regular">{{ count(session('cart.contents')) }} {{ (count(session('cart.contents')) > 1) ? 'items' : 'item' }}</p>
					<p><div class="divider"></div></p>
					<p style="font-size: 18px">Subtotal ({{ strtoupper(session('cart.contents')[0]->currency) }}) <span class="right primary-text medium">{{ session()->get('cart.currency') }} {{ number_format(array_sum(session('cart.sub_total')) / 100, 2, '.', '') }}</span></p>
					{{-- <p style="font-size: 18px">Subtotal (INR) <span class="right primary-text medium">{{ session()->get('cart.currency') }} {{ number_format(array_sum(session('cart.sub_total')) / 100, 2, '.', '') }}</span></p> --}}
					<p class="small-text grey-text text-darken-1 center-align">Subtotal does not includes taxes and fees. Taxes and fees will be calculated during checkout, based on your location.</p>

					<br>
					
					{{-- <p><a href="#!" class="btn-large btn-flat full-width">Apply a promo code</a></p> --}}
					<p><a href="#!" class="btn-large primary hover full-width">Update Address</a></p>
					{{-- <br>
					@if (array_sum(session('cart.discount')) == 0)
					<p class="small-text center-align">Switch to Yearly Plans to <span class="medium primary-text">save more</span> on this order.</p>
					@else
					<p class="small-text center-align">Wow! You are saving <span class="medium primary-text">{{ session()->get('cart.currency') }} {{ number_format(array_sum(session('cart.discount')) / 100, 2, '.', '') }}</span> on this order.</p>
					@endif --}}
					<a href="{{ url('checkout/payment') }}" class="primary solid btn-large full-width disabled" style="position: relative" data-id="pay-now-btn">Pay Now</a>
					<br><br>
					<div class="center-align">
						<h6 class="small-text">Secured Payments</h6>
						<img src="{{ asset('images/icons/all-cards.png') }}" alt="discounts on domains and hosting" width="80%" />
					</div>
				</div>
				{{-- <div class="card-panel z-depth-0" style="margin-top: 25px; border: 1px solid #dfdfdf">
					<h5 class="semi-bold">Order Summary</h5>
					<br>
					<table class="regular-border">
						<tbody>
							<tr>
								<td>{{ count(session('cart.contents')) }} items</td>
								<td></td>
							</tr>
							<tr style="border-bottom: none">
								<td><p class="small-text" style="text-decoration: underline; cursor: pointer">View offer disclaimer</p></td>
								<td></td>
							</tr>
							<tr style="border-bottom: none">
								<td>Subtotal</td>
								<td class="right-align">{{ session()->get('cart.currency') }} <span data-id="subtotal">{{ number_format(array_sum(session('cart.sub_total')) / 100, 2, '.', '') }}</span></td>
							</tr>
							<tr>
								<td>Taxes & Fees</td>
								<td class="right-align"><span data-id="currency">{{ session()->get('cart.currency') }}</span> <span data-id="tax-amount">0</span></td>
							</tr>
							<tr style="border-bottom: none">
								<td>
									<p class="medium">Total</p>
								</td>
								<td class="right-align">
									<p class="medium">{{ session()->get('cart.currency') }} {{ number_format(array_sum(session('cart.sub_total')) / 100, 2, '.', '') }}</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div> --}}
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/web/billing.js') }}"></script>
@endsection