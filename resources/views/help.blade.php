@extends('includes.us')

@section('title', 'Help Center - Get Support for iHost Services')

@section('keywords', 'help center, iHost support, customer support India, hosting help, domain support iHost, technical support iHost')
@section('description', 'Visit the iHost Help Center for assistance with hosting, domain registration, transfers, and more. Our support team is here to help.')

@section('content')
<h1 class="hide">Help Center: Support for iHost Services</h1>
<h2 class="hide">Get Help with Hosting</h2>
<h2 class="hide">Domain Support and FAQs</h2>
<h2 class="hide">Contact Our Support Team</h2>

<section class="center-align">
	<div class="container">
		<div class="row">
			<div class="col s12 m8 offset-m2">
				<h3 class="header-text">Help Center</h3>
				<p>We're here with the help and advice you need to bring your idea to life. When you're ready to get online, we're prepped, trained, and ready to guide you from start to success.</p>
				<br><br>
			</div>

			<div class="col s12 m6 l4">
				<a href="{{ url('customer-support') }}">
					<div class="card-panel features-box">
						<img src="{{ asset('images/icons/247-support.svg') }}" alt="" height="30" width="30">
						<h6 class="medium grey-text text-darken-4">Customer Support</h6>
						<p class="grey-text" style="margin-top: 0">Get in touch with our support team.</p>
					</div>
				</a>
			</div>

			<div class="col s12 m6 l4">
				<a href="{{ url('tutorials') }}">
					<div class="card-panel features-box">
						<img src="{{ asset('images/icons/tutorials.svg') }}" alt="" height="30" width="30">
						<h6 class="medium grey-text text-darken-4">Tutorials</h6>
						<p class="grey-text" style="margin-top: 0">Follow along with one of our tutorials.</p>
					</div>
				</a>
			</div>

			<div class="col s12 m6 l4">
				<a href="knowledgebase">
					<div class="card-panel features-box">
						<img src="{{ asset('images/icons/tutorials.svg') }}" alt="" height="30" width="30">
						<h6 class="medium grey-text text-darken-4">Knowledge Base</h6>
						<p class="grey-text" style="margin-top: 0">Solutions from the Customer Success Team.</p>
					</div>
				</a>
			</div>

			<div class="col s12 m6 l4">
				<a href="{{ url('how-to-videos') }}">
					<div class="card-panel features-box">
						{{-- <img src="{{ asset('images/icons/how-to-videos.svg') }}" alt="" height="30" width="30"> --}}
						<i class="material-symbols-rounded primary-text">play_circle</i>
						<h6 class="medium grey-text text-darken-4">How To Videos</h6>
						<p class="grey-text" style="margin-top: 0">Watch experts explaining it live.</p>
					</div>
				</a>
			</div>

			<div class="col s12 m6 l4">
				<a href="{{ url('report-abuse') }}">
					<div class="card-panel features-box">
						<img src="{{ asset('images/icons/report-abuse.svg') }}" alt="" height="30" width="30">
						<h6 class="medium grey-text text-darken-4">Report Abuse</h6>
						<p class="grey-text" style="margin-top: 0">Report an abuse activity.</p>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
@endsection