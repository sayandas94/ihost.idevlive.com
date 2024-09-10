@extends('includes.user')

@section('title', 'iHost - Billing Information')

@section('content')

<style>
	/* [data-id="invoices-table"] th {
		width: 20%;
		font-weight: 500;
		color: #616161;
		font-size: 0.85rem;
	}

	[data-id="invoices-table"] th:first-child {
		text-align: left;
	} */

	[data-id="invoices-table"] td {
		width: 20%;
		font-size: 0.85rem;
	}

	[data-id="subscription-table"] th {
		width: 20%;
		font-weight: 500;
		color: #616161;
		font-size: 0.85rem;
	}

	[data-id="subscription-table"] th:first-child {
		text-align: left;
	}

	.preloader-wrapper.tiny {
		height: 16px;
		width: 16px;
		/* position: absolute; */
		/* top: 10px; */
		/* left: calc(50% - 8px); */
	}
</style>

<section style="margin-top: 10%">
	<div class="row">
		<div class="col s12">
			<ul class="tabs">
				<li class="tab col s4"><a href="#payment-methods" class="active">Payment Methods</a></li>
				<li class="tab col s4"><a href="#payment-history" class="active">Payment History</a></li>
				<li class="tab col s4"><a href="#active-subscriptions" class="active">Active Subscriptions</a></li>
			</ul>
		</div>

		<div class="col s12" id="payment-methods">
			<br><br>
			<a href="#new-card" class="btn primary hover">Add a new card</a>
			<br><br>
	
			<h2 style="font-weight: 400">Due to compliances, we are not saving your payment details.</h2>
		</div>
	
		<div class="col s12" id="payment-history">
			<br><br>
			<table class="center centered" data-id="invoices-table">
				{{-- <thead>
					<tr>
						<th>Invoice number</th>
						<th>Status</th>
						<th>Billing date</th>
						<th>Amount</th>
						<th></th>
					</tr>
				</thead> --}}
				<tbody>
					<tr>
						<td colspan="5" style="text-align: center">
							<div class="flexbox" style="justify-content: center; align-items: center; gap: 24px">
								<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
								<span>Loading...</span>
							</div>
						</td>
					</tr>
					{{-- <tr>
						<td>
							<span class="grey-text medium">Invoice Number</span>
							<br>
							<span>5561D091-0067</span>
						</td>
						<td>
							<span class="grey-text medium">Status</span>
							<br>
							<span>Paid</span>
						</td>
						<td>
							<span class="grey-text medium">Billing Date</span>
							<br>
							<span>Aug 19, 2024</span>
						</td>
						<td>
							<span class="grey-text medium">Amount</span>
							<br>
							<span>$ 30.29</span>
						</td>
						<td>
							<a href="#!" class="btn-flat primary hover" style="font-weight: 400"><i class="material-symbols-rounded left" target="_blank">download</i>Download</a>
						</td>
					</tr> --}}
				</tbody>
			</table>
		</div>
	
		<div class="col s12" id="active-subscriptions">
			<br><br>
			<table class="center centered" data-id="subscription-table">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Purchased On</th>
						<th>Expiring On</th>
						<th>Renewal Amount</th>
						<th>Auto Renew</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="5" style="text-align: center">
							<div class="flexbox" style="justify-content: center; align-items: center; gap: 24px">
								<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
								<span>Loading...</span>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/user/billing.js') }}"></script>
@endsection