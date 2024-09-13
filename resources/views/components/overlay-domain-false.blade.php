<div class="overlay-popup" data-id="popup.false" id="domain-search-result" style="overflow: auto;">
	<nav class="overlay-header">
		<div class="nav-wrapper container">
			<a href="#!" class="brand-logo medium black-text">Domain Search Result</a>
			<ul class="right">
				<li><a href="#domain-search-result" class="btn-flat" data-id="close.popup"><i class="material-symbols-rounded">close</i></a></li>
			</ul>
		</div>
	</nav>
	<div class="overlay-body" style="padding: 5% 0">
		<div class="container">
			<div class="row">
				<div class="col s12">
					<div class="card-panel domain-wrapper">
						<form action="{{ url('domain/search') }}" method="post" name="domain-search-form" autocomplete="off" data-id="UnavailableDomainSearchForm">
							@csrf
							<input type="hidden" name="locale" value="{{ session()->get('region') }}">
							<input type="text" name="domain_name" placeholder="Search for that perfect domain name">
							<button name="submit-btn" value="submit">
								<img src="{{ asset('images/icons/search.svg') }}" alt="">
							</button>
						</form>
					</div>
				</div>

				<div class="col s12">
					<div class="card-panel z-depth-0 flexbox" style="border: 2px solid var(--primary-100); margin-top: 24px">
						<div style="width: 50%; padding: 0 24px; border-right: 2px solid var(--primary-100)">
							<p class="semi-bold grey-text text-darken-4">
								<i class="material-symbols-rounded left red-text">block</i>
								<span data-id="unavailable.domain.name">idevlive.com</span>
							</p>
							<p class="medium grey-text">Oops! This domain is already taken! Seach for another domain or check out some other amazing options.</p>
						</div>
						<div style="width: 50%; padding: 0 24px; padding-left: 48px">
							<p class="medium">
								<i class="material-symbols-rounded left">vr180_create2d</i>
								Brainstorm with AI for a great name.
							</p>
							<p>
								iHost is getting integrated with AI features to make your life easier.
							</p>
							<a href="#!" class="btn-large primary hover" style="border-radius: 200px">
								<i class="material-symbols-rounded right">arrow_forward</i>
								Learn More
							</a>
						</div>
					</div>
				</div>

				<div class="col s12">
					<p class="medium">Similar Domain Suggestions</p>
					<table class="domain-suggestion-table" data-id="domain-suggestion-table">
						<tbody>
							<tr>
								<td style="text-align: left">
									<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
								</td>
							</tr>
						</tbody>
						{{-- <tbody>
							<tr>
								<td>
									<span class="medium">idevlive.com</span>
									<br>
									<span class="medium small-text grey-text">Rs 150.00</span>
								</td>
								<td>
									<a href="#!" class="btn-flat primary" style="font-weight: 500">Add to cart</a>
								</td>
							</tr>
							<tr>
								<td>
									<span class="medium">idevlive.com</span>
									<br>
									<span class="medium small-text grey-text">Rs 150.00</span>
								</td>
								<td>
									<a href="#!" class="btn-flat primary" style="font-weight: 500">Add to cart</a>
								</td>
							</tr>
							<tr>
								<td>
									<span class="medium">idevlive.com</span>
									<br>
									<span class="medium small-text grey-text">Rs 150.00</span>
								</td>
								<td>
									<a href="#!" class="btn-flat primary" style="font-weight: 500">Add to cart</a>
								</td>
							</tr>
							<tr>
								<td>
									<span class="medium">idevlive.com</span>
									<br>
									<span class="medium small-text grey-text">Rs 150.00</span>
								</td>
								<td>
									<a href="#!" class="btn-flat primary" style="font-weight: 500">Add to cart</a>
								</td>
							</tr>
							<tr>
								<td>
									<span class="medium">idevlive.com</span>
									<br>
									<span class="medium small-text grey-text">Rs 150.00</span>
								</td>
								<td>
									<a href="#!" class="btn-flat primary" style="font-weight: 500">Add to cart</a>
								</td>
							</tr>
						</tbody> --}}
					</table>
				</div>
			</div>
		</div>
	</div>
</div>