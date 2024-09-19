@extends('includes.us')

@section('title', 'iHost - Customer Support')

@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l5">
				<h4 class="header-text">Get in touch with our support team who for your issues</h4>
				<p class="semi-bold">Available <span class="primary-text">Round the clock</span> for you.</p>
				<br>
				<div class="hide-on-small-only flexbox" style="justify-content: space-between">
					<p><i class="material-symbols-rounded left primary-text">schedule</i>24/7 Available</p>
					<p><i class="material-symbols-rounded left primary-text">repeat</i>Free website migration</p>
				</div>
				<p>Every guide is trained and excited to work with you, whether you need help with a password reset or you're looking for a team to build your complete web presence.</p>
			</div>
			<div class="col m6 l7 hide-on-small-only">
				<img src="{{ asset('images/website/customer-support.jpg') }}" alt="" class="responsive-img">
			</div>
		</div>
	</div>
</section>

<section class="center-align">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<div class="card-panel z-depth-0 support-card-wrapper">
					<div class="card-panel support-card">
						<h5 class="medium">Call</h5>
						<p>
							<span>Contact our award-winning support team</span>
							<br>
							<span>1888-899-9636</span>
						</p>
					</div>

					<div class="card-panel support-card" style="border-left: 1px solid #e0e0e0, border-right: 1px solid #e0e0e0">
						<h5 class="medium">Email</h5>
						<p>
							<span>Write to us</span>
							<br>
							<span>support.ihost@idevlive.com</span>
						</p>
					</div>

					<div class="card-panel support-card">
						<h5 class="medium">Chat</h5>
						<p>
							<span>Chat with one of our support rep</span>
							<br>
							<a href="#!">Chat now</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection