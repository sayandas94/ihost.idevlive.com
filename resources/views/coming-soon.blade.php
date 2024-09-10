@extends('includes.us')

@section('title', 'iHost - Coming Soon')

@section('content')

<style>
	.email-wrapper {
		box-shadow: none;
		border: 2px solid var(--primary-100);
		border-radius: 200px;
		padding: 4px 0;
	}

	.email-wrapper > form {
		position: relative;
	}

	.email-wrapper > form > input {
		padding-left: 24px !important;
		width: calc(100% - 140px) !important;
		margin-bottom: 0 !important;
		border: none !important;
		outline: none !important;
		box-shadow: none !important;
	}

	.email-wrapper > form > button {
		position: absolute;
		top: 50%;
		right: 3px;
		transform: translateY(-50%);
		height: 48px;
		border: none;
		border-radius: 200px;
		padding: 0 24px;
		background-color: var(--primary);
		color: white;
	}
</style>

<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l7">
				<br><br>
				<p class="semi-bold primary-text">Coming Soon</p>
				<h1 style="font-weight: 600">Get Notified<br>When We Launch</h1>
				<br>
				<div class="card-panel email-wrapper">
					<form action="#!">
						<input type="text">
						<button>Notify Me</button>
					</form>
				</div>
				<br>
				<p class="small-text medium">Don't worry! We wont spam you</p>
			</div>

			<div class="col s12 m6 l4 offset-l1">
				<br><br><br>
				<div class="card-panel grey z-depth-0">
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
	{{-- <script type="text/javascript" src="{{asset('js/web/login.js')}}"></script> --}}
@endsection