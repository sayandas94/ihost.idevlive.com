<div id="configure-hosting" class="overlay-popup" style="overflow: auto">
	<nav class="overlay-header">
		<div class="nav-wrapper container">
			{{-- <a href="#!" class="brand-logo medium black-text">Configure Domain</a> --}}
			<ul class="left">
				<li><a href="#!">Configure Hosting</a></li>
			</ul>
			<ul class="right">
				<li><a href="#configure-hosting" class="btn-flat" data-id="close-popup"><i class="material-symbols-rounded">close</i></a></li>
			</ul>
		</div>
	</nav>
	<div class="overlay-body" style="padding-top: 5%">
		<div class="container">
			<div class="row">
				<div class="col m6 l7 hide-on-small-only">
					<div class="card-panel z-depth-0" style="border: 2px solid var(--primary-100); margin-top: 0">
						<p class="medium" style="margin-top: 0" data-id="product-name">Web Hosting</p>
						<h5 class="semi-bold" data-id="subtotal">₹ 5400</h5>

						<div class="divider" style="margin: 36px 0"></div>

						<p class="medium">What you get</p>
						<div data-id="features-wrapper"></div>

						<div class="divider" style="margin: 36px 0"></div>

						<p class="medium">Free with this plan</p>
						<p class="small-text">
							<span class="medium">.com domain registration for 1 year.</span>
							<br>
							<span class="grey-text">You will be eligible for the free domain if you buy a plan for 12 Months or more. You will get the free domain when you setup your hosting for the first time.</span>
						</p>

						<div class="divider" style="margin: 36px 0"></div>

						<p class="medium">Recommended for you</p>
						<p class="small-text">
							<span class="medium">Business Email</span>
							<br>
							<span class="grey-text">Get your self a Business Email from iHost and enjoy the collaboration features with your team.</span>
						</p>
						<a href="#!" class="medium small-text" style="text-decoration: underline">Add Business Email</a>
					</div>
				</div>
				<div class="col s12 m6 l4 offset-l1">
					<form action="{{ url('cart/add-item') }}" method="POST" name="select-plan">
						@csrf
						<button class="btn-large primary hover full-width add-to-cart-btn-style" name="submit-btn" value="submit">Add to cart</button>
						<br><br>
						<p class="medium regular">Select Term Length</p>

						<table class="hosting" data-id="hosting-table">
							<tbody>
								<tr>
									<td>
										<label data-label="radio-btn-label">
											<input class="with-gap hosting-term" data-class="hosting-term" name="product_id" type="radio" data-duration="12 Months" data-locale="us" value="price_1PPApyL5iC8E88xq7v2TKqvw">
											<span>1 Months</span>
										</label>
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<label data-label="radio-btn-label">
											<input class="with-gap hosting-term" data-class="hosting-term" name="product_id" type="radio" data-duration="12 Months" checked="" data-locale="us" value="price_1PPApyL5iC8E88xq7v2TKqvw">
											<span>12 Months</span>
											<span class="off badge">25% off</span>
										</label>
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<label data-label="radio-btn-label">
											<input class="with-gap hosting-term" data-class="hosting-term" name="product_id" type="radio" data-duration="12 Months" data-locale="us" value="price_1PPApyL5iC8E88xq7v2TKqvw">
											<span>24 Months</span>
											<span class="off badge">50% off</span>
										</label>
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<label data-label="radio-btn-label">
											<input class="with-gap hosting-term" data-class="hosting-term" name="product_id" type="radio" data-duration="12 Months" data-locale="us" value="price_1PPApyL5iC8E88xq7v2TKqvw">
											<span>36 Months</span>
											<span class="off badge">75% off</span>
										</label>
									</td>
									<td></td>
								</tr>
							</tbody>
						</table>

						<div class="card-panel z-depth-0 grey lighten-4" style="padding: 8px 16px; margin-top: 24px" data-id="pricing-terms">
							<h6 class="medium primary-text" data-id="discount-info"></h6>
							<h6 class="small-text grey-text text-darken-2" data-id="renewal-info" style="margin: 11.5px 0"></h6>
						</div>

						<div class="divider" style="margin: 24px 0"></div>

						<p class="medium regular">Auto renew</p>
								
						<div class="switch">
							<label>
								Off
								<input type="checkbox" name="auto_renew" checked />
								<span class="lever"></span>
								On
							</label>
						</div>

						<p class="small-text grey-text text-darken-1">In case your hosting expires, iHost will keep your data intact for 1 week. If hosting is not renewed within that period, all data will be deleted from the servers.</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>