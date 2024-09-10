<section class="center-align">
	<div class="container">
		{{-- <img src="{{ asset('images/icons/basket-off-outline.svg') }}" alt="" style="width: 20%"> --}}
		<div class="row">
			<div class="col s8 m6 l4 offset-m3 offset-l4">
				<img src="{{asset('images/website/empty-cart.svg')}}" alt="" class="responsive-img">
			</div>
		</div>
		<h3 class="header-text">Your cart is empty</h3>
		<h5>That means it's full of possibilities. Check out what iHost has to offer you to grow your business online.</h5><br>
		<div class="row">
			<div class="col s12 m4">
				<div class="card-panel z-depth-0" style="border: 1px solid #d5dfff">
					<h6 class="semi-bold">Domains</h6>
					<p class="truncate-3 regular">Search for your desired domain name and instantly find out it's availability. Get it registered before it is taken by someone else.</p>
					<br>
					<a href="{{ url('domains') }}">Shop Now</a>
				</div>
			</div>
			<div class="col s12 m4">
				<div class="card-panel z-depth-0" style="border: 1px solid #d5dfff">
					<h6 class="semi-bold">Web Hosting</h6>
					<p class="truncate-3 regular">Search for your desired domain name and instantly find out it's availability. Get it registered in few clicks before it is taken by someone else.</p>
					<br>
					<a href="{{ url('hosting') }}">Shop Now</a>
				</div>
			</div>
			<div class="col s12 m4">
				<div class="card-panel z-depth-0" style="border: 1px solid #d5dfff">
					<h6 class="semi-bold">Emails</h6>
					<p class="truncate-3 regular">Get customised email address as per your domain name to boost your online reputation and increase your credibility as a business.</p>
					<br>
					<a href="{{ url('emails') }}">Shop Now</a>
				</div>
			</div>
		</div>
	</div>
</section>