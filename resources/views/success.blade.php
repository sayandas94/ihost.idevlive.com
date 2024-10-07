@extends('includes.us')

@section('title', 'Payment Success')

@section('keywords', '')
@section('description', '')

@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col s10 m8 l6 offset-s1 offset-m2 offset-l3">
				<img src="{{ asset('images/website/payment-success.avif') }}" alt="ihost payment successfull" class="responsive-img">
			</div>
			<div class="col s12 m10 l8 offset-m1 offset-l2 center-align">
				<h2>Payment successful!</h2>
				<p>You will receive the receipt shortly on your email!</p>
				<br>
				<a href="{{ url('user/dashboard') }}" class="btn-large primary" style="border-radius: 200px">Go To Dashboard</a>
			</div>
		</div>
	</div>
</section>
@endsection