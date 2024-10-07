@extends('includes.us')

@section('title', 'iHost - Checkout')

@section('content')

<style>
	button#submit {
		position: relative;
	}

	button#submit.disabled {
		color: #dfdfdf !important;
	}

	button#submit > div {
		position: absolute;
		top: calc(50% - 8px);
		left: calc(50% - 8px);
	}

	.error-box {
		background-color: #ffebee;
		color: #f44336;
		padding: 8px;
		display: flex;
		align-items: center;
		border-radius: 4px;
		font-size: 13px;
		column-gap: 8px;

	}

	.error-box > i {
		font-size: 18px;
	}
</style>

<section style="padding-top: 5%">
	<div class="container">
		<div class="row">
			<div class="col s12 hide" data-id="error-wrapper">
				<div class="error-box" data-id="error-box">
					<i class="material-symbols-rounded">error</i>
					<span>Payment failed. Please contact the support team.</span>
				</div>
			</div>
			<div class="col s12 m6 l6">
				<form action="#!" method="post" name="payment-form">
					<div class="row">
						<div class="col s12">
							<nav class="breadcrumb-container">
								<div class="nav-wrapper">
									<a href="{{ url('cart') }}" class="breadcrumb">Cart</a>
									<a href="{{ url('checkout/billing-address') }}" class="breadcrumb">Billing Details</a>
									<a href="#!" class="breadcrumb">Payment</a>
								</div>
							</nav>
						</div>
						<div class="col s12 m10 l10" style="padding-left: 0">
							<div class="input-field col s12">
								<input type="email" name="card_email" id="card_email">
								<label for="card_email">Customer Email</label>
							</div>
							<div class="input-field col s12">
								<input type="text" name="card_name" id="card_name" style="text-transform: capitalize">
								<label for="card_name">Name on Card</label>
							</div>
							<div class="input-field" style="margin-top: 48px;">
								<div class="col s12">
									<span style="font-size: 12px; color: #9e9e9e;">Card Information</span>
									<div id="card-numbers" style="border-bottom: 1px solid #9e9e9e; height: 36px; margin-top: 16px"></div>
								</div>
							</div>
							<div class="col s12">
								<p>
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
									{{-- <div class="preloader-wrapper tiny active">
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
									</div> --}}
								</button>

								<p class="small-text grey-text center-align">By clicking on Submit Payment, you allow iDevlive (parent company) to charge your card on behalf of iHost for this payment and future payments with accordance to their <a href="{{ url('terms-of-service') }}" style="text-decoration: underline">Terms of Service</a> and <a href="{{ url('privacy-policy') }}" style="text-decoration: underline">Privacy policy</a>.</p>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col s12 m6 l5 offset-l1">
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
								<td class="right-align">{{ strtoupper(session('cart.currency')['symbol']) }} <span data-id="subtotal">{{ number_format(session()->get('cart.sub_total') / 100, 2, '.', '') }}</span></td>
							</tr>
							<tr>
								<td>Taxes & Fees</td>
								<td class="right-align"><span data-id="currency">{{ session()->get('cart.currency')['symbol'] }}</span> <span data-id="tax-amount">{{ $tax }}</span></td>
							</tr>
							<tr style="border-bottom: none">
								<td>
									<p class="medium">Total</p>
								</td>
								<td class="right-align">
									<p class="medium">{{ session()->get('cart.currency')['symbol'] }} {{ number_format(session()->get('cart.sub_total') / 100 + $tax, 2, '.', '') }}</p>
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
<script type="text/javascript" src="{{ asset('js/web/payment.js') }}"></script>
@endsection