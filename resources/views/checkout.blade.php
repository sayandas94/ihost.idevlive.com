@php
	$countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Antigua and Barbuda","Argentina","Armenia","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Brazil","Brunei","Bulgaria","Burkina","Burundi","Cabo Verde","Cambodia","Cameroon","Canada","Central African Republic","Chad","Chile","China","Colombia","Comoros","Congo","Costa Rica","Cote d'Ivoire","Croatia","Cuba","Cyprus","Czech Republic","Democratic Republic of the Congo","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Eswatini","Ethiopia","Fiji","Finland","France","Gabon","Gambia","Georgia","Germany","Ghana","Greece","Grenada","Guatemala","Guinea","Guinea-Bissau","Guyana","Haiti","Holy See","Honduras","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepal","Netherlands","New Zealand","Nicaragua","Niger","Nigeria","North Korea","North Macedonia","Norway","Oman","Pakistan","Palau","Palestine State","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Qatar","Romania","Russia","Rwanda","Saint Kitts and Nevis","Saint Lucia","Saint Vincent and the Grenadines","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","Sudan","Suriname","Sweden","Switzerland","Syria","Tajikistan","Tanzania","Thailand","Timor-Leste","Togo","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Venezuela","Vietnam","Yemen","Zambia","Zimbabwe"];

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
<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m6">
				<form action="#!" method="post" name="checkout-form" autocomplete="off">
					@csrf

					@include('segments.checkout-part-one')

					@include('segments.checkout-part-two')
				</form>
			</div>
			
			<div class="col s12 m5 offset-m1">
				<div class="card-panel z-depth-0" style="margin-top: 25px; border: 1px solid #e0e0e0">
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
								{{-- <td class="right-align">{{ session()->get('cart.currency') }} 0</td> --}}
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
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="{{ asset('js/web/checkout.js') }}"></script>
@endsection