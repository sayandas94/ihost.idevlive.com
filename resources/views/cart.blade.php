@extends('includes.us')

@section('title', 'iHost - Cart')

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