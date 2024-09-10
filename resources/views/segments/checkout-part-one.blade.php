<style>
	.form-part {
		position: relative;
	}

	.form-part > .disabled {
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
<div class="form-part row active" data-id="part-one">
	<div class="disabled" data-id="disabled">
		<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
	</div>
	<div class="col s12">
		<nav class="breadcrumb-container">
			<div class="nav-wrapper">
				<a href="#!" class="breadcrumb black-text">Billing Details</a>
			</div>
		</nav>
	</div>

	<div class="input-field col s12">
		<select name="country" id="country">
			<option value="" disabled selected>Billing Country</option>
			@foreach ($countries as $country)
				<option value="{{ $country }}">{{ $country }}</option>
			@endforeach
		</select>
		<label for="country">Billing Country</label>
	</div>

	<div class="input-field col s6">
		<input type="text" name="customer_name" id="customer-name" value="">
		<label for="customer-name">Name</label>
	</div>
	<div class="input-field col s6">
		<input type="text" name="phone_number" id="phone-number" value="">
		<label for="phone-number">Phone Number</label>
	</div>
	<div class="input-field col s12">
		<input type="email" name="email" id="email" value="">
		<label for="email">Email Address</label>
	</div>
	<div class="input-field col s12">
		<input type="text" name="street" id="street-address" />
		<label for="street-address">Street Address</label>
	</div>
	<div class="input-field col s4">
		<input type="text" name="city" id="city" />
		<label for="city">City</label>
	</div>
	<div class="input-field col s5">
		<select name="state" id="state">
			<option value="" disabled selected>State</option>
			{{-- @foreach ($states as $state)
			<option value="{{ $state }}">{{ $state }}</option>
			@endforeach --}}
		</select>
		<label for="state">State</label>
	</div>
	<div class="input-field col s3">
		<input type="text" name="postal_code" id="postal_code" />
		<label for="postal_code">Postal Code</label>
	</div>
	<div class="input-field col s6">
		<a href="{{ url('cart') }}" class="btn-large grey lighten-2 black-text full-width">Edit Order</a>
	</div>
	<div class="input-field col s6">
		<button class="btn-large primary solid custom-btn full-width" name="make-payment-btn" value="submit">Make Payment</button>
	</div>
</div>