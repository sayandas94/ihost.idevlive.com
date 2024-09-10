<div class="modal" id="location-modal">
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<p class="semi-bold">North America</p>
			</div>
			<div class="col s12 m6">
				<a href="{{ url('change-region/us') }}">
					<div class="location-card">
						<div>
							<img src="{{ asset('images/country-flags/united-states.png') }}" alt="" width="40" height="40" style="padding: 2px; border: 2px solid var(--primary); border-radius: 50%; background-color: #ffffff">
						</div>
						<div>
							<p class="medium grey-text text-darken-4" style="margin: 0">United States</p>
						</div>
					</div>
				</a>
			</div>

			<div class="col s12">
				<p class="semi-bold">Asia Pacific</p>
			</div>
			<div class="col s12 m6">
				<a href="{{ url('change-region/in') }}">
					<div class="location-card">
						<div>
							<img src="{{ asset('images/country-flags/india.png') }}" alt="" width="40" height="40" style="padding: 2px; border: 2px solid var(--primary); border-radius: 50%; background-color: #ffffff">
						</div>
						<div>
							<p class="medium grey-text text-darken-4" style="margin: 0">India</p>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>