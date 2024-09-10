<div class="card-panel price-card">
	<div class="header">
		<h5 class="medium">{{ $name }}</h5>
		<p class="small-text grey-text">{{ $description }}</p>
		<h3 class="medium">{{ $currency }} <span data-starting-price="Economy Hosting">{{ $starts_from }}</span> <span class="small-text">/ Mo</span></h3>
		<h6 class="small-text medium grey-text">Renews at {{ $currency }} {{ $renewal }}/Mo</h6>
		<br>
		<a
			href="#configure-web-hosting"
			class="btn-large primary hover full-width"
			data-name="{{ $name }}"
			data-region="{{ $region }}"
			data-product="{{ $product_id }}"
			data-class="choose-plan">
			Choose Plan
		</a>
	</div>
	<div>
		<br><br>
		<table>
			<thead>
				<tr><th>Top Feature Comparision</th></tr>
			</thead>
			<tbody>
				<tr class="small-text"><td>{{ $website }}</td></tr>
				<tr class="small-text"><td>{{ $storage }}</td></tr>
				<tr class="small-text"><td>{{ $bandwidth }}</td></tr>
				<tr class="small-text"><td>{{ $database }}</td></tr>
				<tr class="small-text"><td>{{ $mailbox }}</td></tr>
			</tbody>
		</table>
		<table class="hide-on-small-only" style="margin-top: 21px">
			<thead>
				<tr><th>Security</th></tr>
			</thead>
			<tbody>
				<tr class="small-text"><td>Unlimited SSL</td></tr>
				<tr class="small-text"><td>Cloudflare Protected Nameservers</td></tr>
				<tr class="small-text"><td>Weekly Backups</td></tr>
			</tbody>
		</table>
		<table class="hide-on-small-only" style="margin-top: 21px">
			<thead>
				<tr><th>Service & Support</th></tr>
			</thead>
			<tbody>
				<tr class="small-text"><td>30 Days Money Back Guarantee</td></tr>
				<tr class="small-text"><td>24/7 Support</td></tr>
				<tr class="small-text"><td>99.90% Uptime Guarantee</td></tr>
			</tbody>
		</table>
	</div>
</div>