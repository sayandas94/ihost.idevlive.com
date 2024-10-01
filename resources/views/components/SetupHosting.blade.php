<div id="setup-hosting-popup" class="overlay-popup">
	<nav class="overlay-header">
		<div class="nav-wrapper container">
			<ul class="left">
				<li><a href="#!" class="medium" style="pointer-events: none; padding-left: 0">Setup Hosting</a></li>
			</ul>
			<ul class="right">
				<li><a href="#!" class="btn-flat"><i class="material-symbols-rounded" style="height: 36px; line-height: 36px">contact_support</i></a></li>
				<li><a href="#close-hosting-popup" class="btn-flat popup-close"><i class="material-symbols-rounded" style="height: 36px; line-height: 36px">close</i></a></li>
			</ul>
		</div>
	</nav>
	<div class="overlay-body">
		<form action="{{ url('hosting/setup') }}" method="post" style="padding: 2% 0" name="setup-hosting-form" autocomplete="off">
			@csrf
			<div class="container">
				<div class="form-part active" id="part-one">
					<nav class="white z-depth-0 breadcrumb-nav">
						<div class="nav-wrapper">
							<div class="col s12">
								<a href="#part-one" class="breadcrumb">Choose a domain</a>
							</div>
						</div>
					</nav>
					<br>
					<p>
						<label>
							<input class="with-gap domain-select" name="domain_select" value="ihost" type="radio" checked />
							<span class="grey-text text-darken-4">The domain is in my iHost Account</span>
						</label>
						<br>
						<span class="small-text grey-text">We will also configure your domain's DNS Records.</span>
					</p>
					<div class="setup-domain" id="ihost-domain">
						<div>
							<input type="text" name="ihost_domain_name" placeholder="Enter your domain name">
						</div>
					</div>

					<div class="divider" style="margin-top: 12px; margin-bottom: 48px"></div>

					<p>
						<label>
							<input class="with-gap domain-select" name="domain_select" value="third-party" type="radio" />
							<span class="grey-text text-darken-4">The domain is with some other provider</span>
						</label>
						<br>
						<span class="small-text grey-text">You will have to manually configure the DNS Records for the domain.</span>
					</p>
					<div class="setup-domain" id="outside-domain" style="visibility: hidden">
						<div>
							<input type="text" name="outside_domain_name" placeholder="Enter your domain name">
						</div>
					</div>

					<br><br>

					<button class="btn-large primary hover" style="border-radius: 200px"><i class="material-symbols-rounded right">arrow_forward</i>Next</button>
				</div>
				<div class="form-part" id="part-two">
					<nav class="white z-depth-0 breadcrumb-nav">
						<div class="nav-wrapper">
							<div class="col s12">
								<a href="#part-one" class="breadcrumb">Choose a domain</a>
								<a href="#part-two" class="breadcrumb">Select a datacenter</a>
							</div>
						</div>
					</nav>
					<br>

					<div class="flexbox" style="column-gap: 24px">
						<div class="radio-wrapper">
							<input type="radio" id="datacenter-usa" class="custom-radio" name="datacenter" value="us">
							<label for="datacenter-usa">
								<img src="{{ asset('images/country-flags/united-states.png') }}" class="country-icon" alt="" width="48">
								<span class="medium">United States</span>
								<br>
								<span class="grey-text">New York</span>
							</label>
						</div>

						<div class="radio-wrapper">
							<input type="radio" id="datacenter-canada" class="custom-radio" name="datacenter" value="ca">
							<label for="datacenter-canada">
								<img src="{{ asset('images/country-flags/canada.png') }}" class="country-icon" alt="" width="48">
								<span class="medium">Canada</span>
								<br>
								<span class="grey-text">Toronto</span>
							</label>
						</div>

						<div class="radio-wrapper">
							<input type="radio" id="datacenter-india" class="custom-radio" name="datacenter" value="in">
							<label for="datacenter-india">
								<img src="{{ asset('images/country-flags/india.png') }}" class="country-icon" alt="" width="48">
								<span class="medium">India</span>
								<br>
								<span class="grey-text">Bangalore</span>
							</label>
						</div>
					</div>

					{{-- <div class="flexbox" style="column-gap: 24px; align-content: strech">
						<div class="card-panel hosting-setup-card">
							<img src="{{ asset('images/country-flags/united-states.png') }}" class="country-icon" alt="" width="48">
							<p>
								<span class="medium">United States</span>
								<br>
								<span class="grey-text">New York</span>
							</p>
							<button data-value="usa" name="datacenter-btn" value="usa" class="btn-flat primary full-width">Select</button>
						</div>

						<div class="card-panel hosting-setup-card">
							<img src="{{ asset('images/country-flags/canada.png') }}" alt="" class="country-icon" width="48">
							<p>
								<span class="medium">Canada</span>
								<br>
								<span class="grey-text">Toronto</span>
							</p>
							<button data-value="canada" name="datacenter-btn" value="canada" class="btn-flat primary full-width">Select</button>
						</div>

						<div class="card-panel hosting-setup-card">
							<img src="{{ asset('images/country-flags/india.png') }}" alt="" class="country-icon" width="48">
							<p>
								<span class="medium">India</span>
								<br>
								<span class="grey-text">Bangalore</span>
							</p>
							<button data-value="india" name="datacenter-btn" value="india" class="btn-flat primary full-width">Select</button>
						</div>
					</div>
					<input type="hidden" name="datacenter"> --}}
					{{-- <div class="flexbox" style="column-gap: 48px"> --}}
						{{-- <p>
							<label>
								<input class="with-gap domain-select" name="domain_select" value="ihost" type="radio" checked />
								<span class="grey-text text-darken-4">United States</span>
								<br>
								<span class="small-text grey-text" style="padding-left: 35px">New York</span>
							</label>
						</p>
						
						<div class="divider" style="margin: 24px 0"></div>

						<p>
							<label>
								<input class="with-gap domain-select" name="domain_select" value="third-party" type="radio" />
								<span class="grey-text text-darken-4">Canada</span>
								<br>
								<span class="small-text grey-text" style="padding-left: 35px">Toronto</span>
							</label>
						</p>

						<div class="divider" style="margin: 24px 0"></div>

						<p>
							<label>
								<input class="with-gap domain-select" name="domain_select" value="third-party" type="radio" />
								<span class="grey-text text-darken-4">India</span>
								<br>
								<span class="small-text grey-text" style="padding-left: 35px">Bangalore</span>
							</label>
						</p> --}}
					{{-- </div> --}}
					

					<br><br>

					<button class="btn-large primary hover" style="border-radius: 200px"><i class="material-symbols-rounded right">arrow_forward</i>Next</button>
				</div>
				<div class="form-part" id="part-three">
					<nav class="white z-depth-0 breadcrumb-nav">
						<div class="nav-wrapper">
							<div class="col s12">
								<a href="#part-one" class="breadcrumb">Choose a domain</a>
								<a href="#part-two" class="breadcrumb">Select a datacenter</a>
								<a href="#part-three" class="breadcrumb">Install Wordpress</a>
							</div>
						</div>
					</nav>
					<br>
					<p>
						<label>
							<input class="with-gap" name="wordpress" value="yes" type="radio" />
							<span>Yes</span>
						</label>
					</p>

					<p>
						<label>
							<input class="with-gap" name="wordpress" value="no" type="radio" />
							<span>No</span>
						</label>
					</p>
					<br>
					<p>
						<button class="btn-large primary hover" style="border-radius: 200px"><i class="material-symbols-rounded right">arrow_forward</i>Start Setup</button>
					</p>
				</div>
				{{-- <div class="form-part" id="part-four">
					<h5 class="medium hosting-setup-header">
						<a href="#part-three" class="left back"><i class="material-symbols-outlined">arrow_back</i></a>
						<span>Check your settings</span>
					</h5>
					<br>
					<p>
						<span class="medium">Website name</span>
						<br>
						<span class="grey-text">quickprobooks.info</span>
						<br>
						<a href="#part-one" class="small-text medium back">Edit</a>
					</p>
					<br>
					<p>
						<span class="medium">Datacenter</span>
						<br>
						<span class="grey-text">India</span>
						<br>
						<a href="#part-two" class="small-text medium back">Edit</a>
					</p>
					<br>
					<p>
						<span class="medium">Wordpress</span>
						<br>
						<span class="grey-text">No</span>
						<br>
						<a href="#part-three" class="small-text medium back">Edit</a>
					</p>
					<br>
					<p>
						<button class="btn-large primary hover" style="border-radius: 200px"><i class="material-symbols-rounded right">arrow_forward</i>Start Setup</button>
					</p>
				</div> --}}
			</div>
		</form>
	</div>
</div>