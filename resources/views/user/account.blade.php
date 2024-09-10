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
@extends('includes.user')

@section('title', 'iHost - Account Information')

@section('content')
<div class="row">
	<div class="col s12">
		<div class="card-panel user-account-card">
			<div class="flexbox space-between align-center">
				<p class="semi-bold">Billing Information</p>
				<a href="#edit-account-information" class="btn-flat primary hover modal-trigger">Edit</a>
			</div>
			<table class="bordered small-text user-profile-table">
				<tbody>
					<tr>
						<td>Name</td>
						<td data-id="customer_name">Loading...</td>
					</tr>
					<tr>
						<td>Phone Number</td>
						<td data-id="phone_number">Loading...</td>
					</tr>
					<tr>
						<td>Address</td>
						<td data-id="address">Loading...</td>
					</tr>
					<tr>
						<td>Company</td>
						<td>-</td>
					</tr>
					<tr>
						<td>Additional Details</td>
						<td>-</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="col s12">
		<div class="card-panel user-account-card">
			<div class="flexbox space-between align-center">
				<p class="semi-bold">Account Settings</p>
				<a href="#edit-login-information" class="btn-flat primary hover modal-trigger">Edit</a>
			</div>
			<table class="bordered small-text user-profile-table">
				<tbody>
					<tr>
						<td>Email</td>
						<td data-id="user_email">Loading...</td>
					</tr>
					<tr>
						<td>Password</td>
						<td>&bull;&bull;&bull;&bull;&bull;&bull;&bull;</td>
					</tr>
					<tr>
						<td>Support Pin</td>
						<td>&bull;&bull;&bull;&bull;</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="col s12">
		<div class="card-panel user-account-card">
			<p class="semi-bold">Email authentication method</p>
			<table class="bordered small-text user-profile-table">
				<tbody>
					<tr>
						<td>With each login, you will receive a confirmation code to your email address. Your <span data-email></span> email will be used for this authentication.</td>
						<td style="width: 200px" class="right-align"><a href="#!" class="btn-flat primary hover">Enable</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="col s12">
		<div class="card-panel user-account-card">
			<p class="semi-bold">Communication Permissions</p>
			<table class="bordered small-text">
				<tbody>
					<tbody>
						<tr style="border-bottom: none">
							<td style="padding-left: 0">Promotions, special offers<br><span class="grey-text">Important emails about our special offers</span></td>
							<td style="width: 200px" class="right-align"><a href="#!" class="btn-flat primary hover"><i class="material-icons">keyboard_arrow_right</i></a></td>
						</tr>
					</tbody>
				</tbody>
			</table>
		</div>
	</div>

	<div class="col s12">
		<div class="card-panel user-account-card">
			<p class="semi-bold">Delete Account</p>
			<table class="small-text">
				<tbody>
					<tr style="border-bottom: none">
						<td style="padding-left: 0">Delete account<br><span class="grey-text">Keep in mind that upon deleting your account all of your account information will be deleted without the posibility of restoration.</span></td>
						<td style="width: 200px" class="right-align"><a href="#!" class="btn danger hover">Delete account</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal modal-fixed-footer white small-modal" id="edit-account-information">
	<form action="{{ url('accounts/update-address') }}" method="post" name="update-account-information">
		@csrf
		<div class="modal-content">
			<div class="row" style="margin-bottom: 0">
				<div class="col s12">
					<p class="medium">Billing Information</p>
				</div>

				<div class="input-field col s12">
					<input type="text" name="customer_name" id="billing_name">
					<label for="billing_name">Customer Name</label>
				</div>

				<div class="input-field col s12 m6">
					<input type="text" name="email" id="billing_email">
					<label for="billing_email">Email address</label>
				</div>

				<div class="input-field col s12 m6">
					<input type="text" name="phone_number" id="phone_number">
					<label for="phone_number">Phone Number</label>
				</div>
				
				<div class="input-field col s12">
					<select name="country" id="billing_country">
						<option value="" selected disabled>Country</option>
						@foreach ($countries as $country)
						<option value="{{ $country }}">{{ $country }}</option>
						@endforeach
					</select>
					<label for="country"></label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="street" id="street">
					<label for="street">Street Address</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="city" id="city">
					<label for="city">City</label>
				</div>

				<div class="input-field col s12 m6">
					<select name="state" id="state">
						<option value="" selected disabled>Select a State</option>
						@foreach ($states as $state)
						<option value="{{ $state }}">{{ $state }}</option>
						@endforeach
					</select>
					<label for="state">State</label>
				</div>

				<div class="input-field col s12  m6">
					<input type="text" name="postal_code" id="postal_code">
					<label for="postal_code">Postal Code</label>
				</div>
			</div>
		</div>
		<div class="modal-footer" style="background-color: var(--primary)">
			<button class="btn-flat full-width white-text" name="submit-btn" value="submit">Update Information</button>
		</div>
	</form>
</div>

<div class="modal white small-modal" id="edit-login-information">
	<div class="modal-content">
		<div class="row" style="margin-bottom: 0">
			<div class="col s12">
				<p class="medium">Login Information</p>
			</div>
			<form action="{{ url('accounts/update-email') }}" method="post" name="update-email" autocomplete="off">
				@csrf
				<div class="input-field col s12">
					<input type="email" name="email" id="email" value="{{ $profile->email }}">
					<label for="email">Email Address</label>
				</div>
				<div class="input-field col s12" style="margin-top: 0">
					<button class="btn primary solid" name="submit-btn" value="submit">Update</button>
					<br><br>
				</div>
			</form>

			<form action="{{ url('accounts/update-password') }}" method="post" name="update-password" autocomplete="off">
				@csrf
				<div class="input-field col s12">
					<input type="password" name="password" id="password">
					<label for="password">New Password</label>
				</div>

				<div class="input-field col s12" style="margin-top: 0">
					<input type="password" name="password_confirmation" id="password_confirmation">
					<label for="password_confirmation">Confirm Password</label>
				</div>
				
				<div class="input-field col s12" style="margin-top: 0">
					<button class="btn primary solid" name="submit-btn" value="submit">Update</button>
					<br><br>
				</div>
			</form>

			<form action="{{ url('accounts/update-pin') }}" method="post" name="update-pin" autocomplete="off">
				@csrf
				<div class="input-field col s12">
					<input type="text" name="support_pin" id="support_pin">
					<label for="support_pin">Support Pin</label>
				</div>
				<div class="input-field col s12" style="margin-top: 0">
					<button class="btn primary solid" name="submit-btn" value="submit">Update</button>
				</div>
			</form>
		</div>
	</div>
	{{-- <div class="modal-footer" style="background-color: var(--primary)">
		<button class="btn-flat full-width white-text">Update Information</button>
	</div> --}}
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/user/account.js') }}"></script>
@endsection