<div id="configure-domain-name" class="overlay-popup" data-id="popup.true" style="overflow: auto">
	<nav class="overlay-header">
		<div class="nav-wrapper container">
			<a href="#!" class="brand-logo medium black-text">Configure Domain</a>
			<ul class="right">
				<li><a href="#configure-domain-name" class="btn-flat" data-id="close.popup"><i class="material-symbols-rounded">close</i></a></li>
			</ul>
		</div>
	</nav>
	<div class="overlay-body">
		<div class="container">
			<div class="row">
				<div class="col s12">
					<ul class="tabs">
						<li class="tab col s3">
							<a href="#results" class="active">
								{{-- <img class="inactive" src="{{ asset('images/icons/search.svg') }}" alt="domain name search" /> --}}
								Results
							</a>
						</li>
						<li class="tab col s3">
							<a href="#history">
								{{-- <img class="inactive" src="{{ asset('images/icons/history.svg') }}" alt="domain name search" /> --}}
								History
							</a>
						</li>
					</ul>
				</div>
				
				<div class="col s12" id="results">
					<br><br>
					<div class="col s12 m6 7">
						<div class="card-panel" style="box-shadow: none; border: 2px solid var(--primary-100); margin-top: 0">
							<h6 class="medium" style="margin-top: 0" data-id="available.domain.name">
								idevlives
								<span class="primary-text">.com</span>
							</h6>
							
							<p data-id="discount-info-wrapper" class="medium"></p>
							
							<h5 class="semi-bold" data-id="subtotal">
								<span data-id="currency"></span> <span data-id="domain-price"></span>
								<span class="small-text">for first year</span>
							</h5>
							<p class="small-text grey-text" data-id="renewal_wrapper">Renews on <span data-id="renewal.date">{{ date('M j, Y', strtotime('+1 year')) }}</span> for <span data-id="currency"></span> <span data-id="renewal-price"></span></p>
							
							<div data-id="gyaan-container"></div>

							<div class="divider" style="margin: 36px 0"></div>

							<p class="header-text">Similar domain suggestions</p>
		
							<table class="domain-suggestion-table" data-id="domain-suggestion-table">
								<tbody>
									<tr>
										<td style="text-align: left">
											<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
		
					<div class="col m5 l4 offset-m1 offset-l1 hide-on-small-only sticky-top top-128">
						<form action="{{ url('cart/add-item') }}" method="post" name="configure-domain-name" id="AddToCart">
							@csrf
							<input type="hidden" name="locale" value="{{ session()->get('region') }}">
							{{-- <input type="hidden" name="price_id"> --}}
							{{-- <input type="hidden" name="product_id"> --}}
							<input type="hidden" name="domain_name">
							<input type="hidden" name="duration">
							<button class="btn-large primary hover full-width" name="submit-btn" value="submit">Add to cart</button>
							<br><br>
							<p class="medium regular">Select Term Length</p>
							<table class="hosting" data-id="domain-price-table">
								<tbody>
									<tr>
										<td style="text-align: left">
											<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
										</td>
									</tr>
								</tbody>
							</table>
			
							<br><div class="divider"></div>
			
							<div class="flexbox space-between" style="align-items: center">
								<p class="medium regular">Add Privacy Protection</p>
								
								<div class="switch">
									<label>
										Off
										<input type="checkbox" name="privacy_protection" checked />
										<span class="lever"></span>
										On
									</label>
								</div>
							</div>
			
							<h6 class="small-text">Protects your contact information from fraud and prevents email spam. iHost privacy protection is free of cost.</h6>
			
							<br><div class="divider"></div>
			
							<div class="flexbox space-between" style="align-items: center">
								<p class="medium regular">Add Domain Lock</p>
								
								<div class="switch">
									<label>
										Off
										<input type="checkbox" name="domain_lock" checked />
										<span class="lever"></span>
										On
									</label>
								</div>
							</div>
			
							<h6 class="small-text">If your business is built on your domain, you need protection. Add the domain lock feature for free so that your domain is not transfered without autorisation.</h6>
			
							<br><div class="divider"></div>
			
							<div class="flexbox space-between" style="align-items: center">
								<p class="medium">Auto-renew</p>
								
								<div class="switch">
									<label>
										Off
										<input type="checkbox" name="auto_renew" checked />
										<span class="lever"></span>
										On
									</label>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="col s12" id="history">
					<br><br>
				</div>
			</div>
		</div>
	</div>
</div>