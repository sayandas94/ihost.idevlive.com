<div class="form-part row" data-id="part-two">
	<div class="col s12">
		<nav class="breadcrumb-container">
			<div class="nav-wrapper">
				<div class="col s12">
					<a href="#!" class="breadcrumb">Billing Details</a>
					<a href="#!" class="breadcrumb">Payment Method</a>
				</div>
			</div>
		</nav>
	</div>

	<div class="row">
		<div class="col s12 m10 l10">
			<div class="input-field col s12">
				{{-- <h6 class="semi-bold">Customer Email</h6> --}}
				<input type="email" value="sayan.das94@gmail.com" name="card_email" id="card_email" readonly style=>
				<label for="card_email">Customer Email</label>
			</div>
			<div class="input-field">
				<div class="col s12">
					<span style="font-size: 12px; color: #9e9e9e;">Card Information</span>
					<div id="card-numbers" style="border-bottom: 1px solid #9e9e9e; height: 36px; margin-top: 24px"></div>
				</div>
			</div>
			<div class="input-field col s12" style="margin-top: 48px">
				{{-- <h6 class="semi-bold">Name on card</h6> --}}
				{{-- <input type="text" name="name-on-card" value="" style="border: 1px solid #e0e0e0 !important; outline: none !important; box-shadow: none !important; height: 51px; border-radius: 4px; padding: 0 15px; width: calc(100% - 30px);"> --}}
				<input type="text" name="card_name" id="card_name" style="text-transform: capitalize">
				<label for="card_name">Name on Card</label>
			</div>
			<div class="col s12">
				<p style="margin-top: 0">
					<label>
						<input type="checkbox" class="filled-in" name="default-payment-method" checked />
						<span>Make this card the default payment method</span>
					</label>
				</p>
			</div>

			<div id="card-errors" role="alert"></div>

			<div class="input-field col s12">
				<button id="submit" name="submit-btn" class="btn-large primary solid full-width" value="submit">
					Pay Now
					<div class="preloader-wrapper tiny active">
						<div class="spinner-layer spinner-primary-only">
							<div class="circle-clipper left">
								<div class="circle"></div>
							</div>
						  	<div class="gap-patch">
								<div class="circle"></div>
						  	</div>
						  	<div class="circle-clipper right">
								<div class="circle"></div>
						  	</div>
						</div>
					</div>
				</button>
				<p class="small-text grey-text center-align">By clicking on Submit Payment, you allow iDevlive (parent company) to charge your card on behalf of iHost for this payment and future payments with accordance to their <a href="{{ url('terms-of-service') }}" style="text-decoration: underline">Terms of Service</a> and <a href="{{ url('privacy-policy') }}" style="text-decoration: underline">Privacy policy</a>.</p>
			</div>
		</div>
	</div>
</div>