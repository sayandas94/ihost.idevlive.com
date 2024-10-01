@extends('includes.us')

@section('title', 'iHost - Sign Up')

@section('content')
<style>
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
<section class="user-wrapper">
	<div class="card-panel">
		<form action="{{ url('sign-up') }}" method="POST" class="row" autocomplete="off" name="register-form">
			@csrf
			<div class="col s12 left-align">
				<h4 class="header-text left-align">Sign Up</h4><br>
			</div>

			<div class="input-field col s12">
				<div class="error-box hide" data-id="error-box">
					<i class="material-symbols-rounded">error</i>
					<span></span>
				</div>
			</div>

			<div class="input-field col s12">
				<input type="text" name="email" id="email-address">
				<label for="email-address">Email Address</label>
			</div>

			<div class="input-field col s12">
				<input type="password" name="password" id="password">
				<label for="email-address">Password</label>
			</div>

			<div class="input-field col s12"><br></div>

			<div class="input-field col s12">
				<input type="text" name="customer_name" id="customer_name">
				<label for="customer_name">Customer name</label>
			</div>
			
			<div class="input-field col s12">
				<button class="btn-large primary solid full-width" name="submit" value="submit">Sign Up</button>
			</div>

			<div class="input-field col s12">
				<a href="{{ url('sign-in') }}" class="btn-large btn-flat hover full-width"><span class="hide-on-small-only">Already have an account? </span>Sign in now</a>
			</div>
		</form>
	</div>
	<p class="center-align regular">&copy; {{ date('Y') }} All Rights Reserved</p>
</section>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/web/register.js')}}"></script>
@endsection