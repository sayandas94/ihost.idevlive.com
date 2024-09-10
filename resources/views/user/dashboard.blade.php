@extends('includes.user')

@section('title', 'iHost - Dashboard')

@section('content')
<div class="row">
	<div class="col s12">
		<p class="semi-bold">Active Products</p>
	</div>

	<div class="col s12 m4">
		<a href="{{ url('user/domains') }}">
			<div class="card-panel dashboard-card">
				<h5 class="medium">Domains</h5>
				<h1 class="semi-bold" style="margin: 0" data-id="domain-count">-</h1>
				<p data-id="domain-cta"></p>
			</div>
		</a>
	</div>

	<div class="col s12 m4">
		<a href="{{ url('user/hosting') }}">
			<div class="card-panel dashboard-card">
				<h5 class="medium">Hosting</h5>
				<h1 class="semi-bold" style="margin: 0" data-id="hosting-count">-</h1>
				<p data-id="hosting-cta">Manage</p>
			</div>
		</a>
	</div>

	<div class="col s12 m4">
		<a href="{{ url('user/emails') }}">
			<div class="card-panel dashboard-card">
				<h5 class="medium">Emails</h5>
				<h1 class="semi-bold" style="margin: 0" data-id="email-count">-</h1>
				<p data-id="email-cta">Buy professional email</p>
			</div>
		</a>
	</div>

	{{-- <div class="col s12 m8">
		<div class="card-panel z-depth-0" style="display: flex; flex-direction: column; justify-content: flex-start; border: 1px solid #e0e0e0; border-radius: 8px; min-height: 300px">
			<h5 class="medium">Find a new domain</h5>
			<p>Search for your desired domain name and instantly find out it's availability. Get it registered in few clicks before it is taken by someone else.<br><br></p>
			<form action="{{ url('api/domain/search') }}" class="card-panel domain-container" name="domain-search-form" method="POST" autocomplete="off">
				@csrf
				<input type="text" class="domain-search-input" name="domain-search-input" placeholder="Search for that perfect domain name" autocomplete="off">
				<button class="btn z-depth-0 transparent black-text" name="submit-btn" value="submit-btn" style="padding: 0 16px"><i class="material-icons">search</i></button>
			</form>
		</div>
	</div> --}}
</div>

<div class="row">
	<div class="col s12">
		<p class="semi-bold">Quick Actions</p>
	</div>

	<div class="col s12 m8">
		<a href="#!">
			<div class="card-panel dashboard-card">
				<h5 class="medium">Performance Check</h5>
				<h1 class="semi-bold" style="margin: 0">-</h1>
				<p>Get Quick Performance Check</p>
			</div>
		</a>
	</div>

	<div class="col s12 m4">
		<a href="#!">
			<div class="card-panel dashboard-card danger">
				<h5 class="medium">Expiring Products</h5>
				<h1 class="semi-bold" style="margin: 0">-</h1>
				<p>View Subscriptions</p>
			</div>
		</a>
	</div>
</div>

<div class="row">
	<div class="col s12">
		{{-- <p class="semi-bold">Let's Build Your Business</p> --}}
		<p class="semi-bold">Get Started</p>
	</div>

	<div class="col s12 m4">
		<div class="card-panel dashboard-card center-align" style="align-items: center; justify-content: center">
			<h3 class="semi-bold">1.</h3>
			<p>You've already purchased a domain.</p>
			<i class="material-symbols-rounded green-text">check_circle</i>
		</div>
	</div>

	<div class="col s12 m4">
		<div class="card-panel dashboard-card center-align" style="align-items: center; justify-content: center">
			<h3 class="semi-bold">2.</h3>
			<p>You've already purchased a domain.</p>
			<i class="material-symbols-rounded green-text">check_circle</i>
		</div>
	</div>

	<div class="col s12 m4">
		<div class="card-panel dashboard-card center-align" style="align-items: center; justify-content: center">
			<h3 class="semi-bold">3.</h3>
			<p>You've already purchased a domain.</p>
			<i class="material-symbols-rounded green-text">check_circle</i>
		</div>
	</div>
</div>

<div class="modal small-modal" id="verification-modal" style="padding: 64px 24px">
	<div class="modal-content center-align">
		<h5 class="medium">Please check your email</h5>
		<p>We've sent you a code to <span data-id="verification_email"></span></p>
		<br>
		<form action="#!" method="POST" name="verification-form">
			{{-- <div class="verification-input-wrapper">
				<div class="input-field">
					<input type="text" class="verification-input">
				</div>
				<div class="input-field">
					<input type="text" class="verification-input">
				</div>
				<div class="input-field">
					<input type="text" class="verification-input">
				</div>
				<div class="input-field">
					<input type="text" class="verification-input">
				</div>
				<div class="input-field">
					<input type="text" class="verification-input">
				</div>
				<div class="input-field">
					<input type="text" class="verification-input">
				</div>
			</div> --}}
			<div class="input-field">
				<input type="text" name="verification-code" style="border: 2px solid var(--primary-100); outline: none !important; box-shadow: none !important; width: calc(100% - 4px)">
			</div>
			<button class="btn-large primary solid full-width" name="submit-btn" value="submit">Verify</button>
		</form>
		<br>
		<p>Didn't receive an email? <a href="#!" class="semi-bold">Resend</a></p>
		{{-- <br>
		<a href="#!" class="btn medium round" style="background-color: var(--primary-200); color: var(--primary)">Remind me later</a> --}}
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/user/dashboard.js') }}"></script>
@endsection