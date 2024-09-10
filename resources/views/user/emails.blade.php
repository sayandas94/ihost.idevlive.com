@extends('includes.user')

@section('title', 'iHost - Emails')

@section('content')
<style>
	.features-wrapper > .features-card {
		width: 300px;
	}

	@media only screen and (max-width : 992px) {
		.features-wrapper > .features-card {
			width: calc(100% - 24px);
		}
	}
</style>

<section style="margin-top: 10%">
	<p class="medium">You don't have any business emails. Get a professional business email today!</p>
	<br>
	<div class="features-wrapper" style="justify-content: flex-start">
		<div class="card-panel features-card center-align">
			<p>
				<img src="{{ asset('images/icons/business-email.svg') }}" alt="" height="36" width="36">
			</p>
			<p class="medium">Business Email</p>
			<p class="grey-text">Cost-effective email service with features like Contacts & Calendar.</p>
			<a href="{{ url('business-email') }}" class="btn-flat primary" style="margin-top: 24px">Business Email</a>
		</div>

		<div class="card-panel features-card center-align">
			<p>
				<img src="{{ asset('images/icons/google.svg') }}" alt="" height="24" width="24">
			</p>
			<p class="medium">Google Workspace</p>
			<p class="grey-text">Get apps like Gmail, Calendar, Drive and more with AI-powered assistant.</p>
			<a href="{{ url('#!') }}" class="btn-flat primary modal-trigger" style="margin-top: 24px">Google Workspace</a>
		</div>
	</div>
</section>

{{-- <div class="row">
	<div class="col s12 m8 l4">
		<br><br>
		<img src="{{ asset('images/svg/no-product.svg') }}" alt="" class="responsive-img">
		<br><br>
		<p>You dont have any domains. Shop for one now!</p>
	</div>
</div> --}}
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/user/emails.js') }}"></script>
@endsection