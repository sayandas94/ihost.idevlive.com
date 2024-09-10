@extends('includes.us')

@section('title', 'iHost - Reset Password')

@section('content')
<section class="user-wrapper">
	<div class="card-panel">
		<form action="{{ url('reset-password') }}" method="POST" class="row" autocomplete="off" name="reset-password-form">
			@csrf
			<div class="col s12 left-align">
				<h4 class="header-text left-align">Reset Password</h4>
				<p class="small-text grey-text text-darken-2">By clicking on sending email, you will receive an email with a 6 digit OTP which will be valid for 10 minutes. Enter that OTP here to set your new password.</p>
				<br><br>
			</div>

			<div class="input-field col s12">
				<input type="text" name="email" id="email-address" value="sayan.das94@gmail.com">
				<label for="email-address">Email Address</label>
			</div>

			{{-- <div class="input-field col s12">
				<input type="password" name="password" id="password" value="Admin@123">
				<label for="email-address">Password</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="customer_name" id="customer_name" value="Sayan Das">
				<label for="customer_name">Customer name</label>
			</div> --}}

			<div class="input-field col s12"><br></div>
			
			<div class="input-field col s12">
				<button class="btn-large primary solid full-width" name="submit" value="submit">Send Verification Email</button>
			</div>

			<div class="input-field col s12">
				<a href="{{ url('sign-in') }}" class="btn-large btn-flat hover full-width"><span class="hide-on-small-only">Go back to </span>Sign in</a>
			</div>
		</form>
	</div>
	<p class="center-align regular">&copy; {{ date('Y') }} All Rights Reserved</p>
</section>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/web/register.js')}}"></script>
@endsection