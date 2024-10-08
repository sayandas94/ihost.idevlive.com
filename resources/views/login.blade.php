@extends('includes.us')

@section('title', 'iHost - Login')

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
		<form action="{{ url('sign-in') }}" method="POST" class="row" autocomplete="off" name="login-form">
			@csrf
			<div class="col s12 left-align">
				<h4 class="header-text left-align">Sign In</h4>
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
				<input type="password" name="password" id="password" value="">
				<label for="password">Password</label>
			</div>

			<div class="input-field col s12 flexbox space-between" style="align-items: center">
				<p>
					<label>
						<input type="checkbox" name="remember_me" checked />
						<span>Remember Me</span>
					</label>
				</p>
				<a href="{{url('reset-password')}}" class="btn-flat">Reset Password</a>
			</div>
			
			<div class="input-field col s12">
				<button class="btn-large primary solid full-width" name="submit" value="submit">Sign In</button>
			</div>

			<div class="input-field col s12">
				<a href="{{ url('sign-up') }}" class="btn-large btn-flat hover full-width"><span class="hide-on-small-only">Not a part of iHost yet? </span>Create a new account</a>
			</div>
		</form>
	</div>
	<p class="center-align regular">&copy; {{ date('Y') }} All Rights Reserved</p>
</section>
@endsection

@section('script')
	<script type="text/javascript" src="{{asset('js/web/login.js')}}"></script>
@endsection