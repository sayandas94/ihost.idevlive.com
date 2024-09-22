@extends('includes.us')

@section('title', 'iHost Cart - Secure Online Checkout for Web Hosting & Domains')

@section('keywords', 'web hosting cart, domain registration cart, secure checkout, online payment')
@section('description', 'Proceed to the secure online checkout at iHost to purchase web hosting, domain names, or email solutions. Our cart offers a seamless and safe payment experience.')

@section('content')
	@if (session('cart'))
		{{-- @php
			echo json_encode(session()->get('cart.contents'))
		@endphp --}}
		@include('segments.cart')

		@section('script')
		<script type="text/javascript" src="{{ asset('js/web/cart.js') }}"></script>
		@endsection
	@else
		@include('segments.empty-cart')
	@endif
@endsection