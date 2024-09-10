@extends('includes.user')

@section('title', 'iHost - DNS Management')

@section('content')

<style>
	.group-btn {
		display: inline-flex;
		margin-bottom: 16px;
	}

	.group-btn > a.btn:first-child {
		background-color: #eeeeee;
		color: #212121;
		border-radius: 8px 0 0 8px;
	}

	.group-btn > a.btn:first-child:hover {
		background-color: #e0e0e0;
	}

	.group-btn > a.btn:last-child {
		background-color: #eeeeee;
		color: #212121;
		border-radius: 0 8px 8px 0;
		padding: 0 12px;
	}

	.group-btn > a.btn:last-child > i {
		font-size: 18px
	}

	.group-btn > a.btn:last-child:hover {
		background-color: #e0e0e0;
	}

	.tab > a {
		padding-left: 0 !important;
		text-transform: none;
		color: var(--primary) !important;
		font-weight: 500;
	}

	.tab > a.active {
		color: #212121 !important;
		background-color: #ffffff !important; 
	}

	.tabs > .indicator {
		background-color: var(--primary) !important;
	}

	table[data-id="dns-records-table"] > tbody > tr > td {
		width: 15%;
	}

	table[data-id="dns-records-table"] > tbody > tr > td:nth-child(1) {
		width: 10%;
	}

	table[data-id="dns-records-table"] > tbody > tr > td:nth-child(3) {
		width: 30%;
	}

	table[data-id="ns-records-table"] > tbody > tr > td {
		width: 33.33%;
	}

	.modal-footer {
		padding: 0 !important;
		border-top: none !important;
		background-color: var(--primary) !important;
	}

	.modal-footer.disabled {
		background-color: #dfdfdf !important;
	}

	.modal-footer > button {
		color: #ffffff !important;
	}

	.modal-footer.disabled > button {
		color: #9f9f9f !important;
		pointer-events: none;
		cursor: default;
	}

	.btn.primary.solid.disabled {
		color: #dfdfdf !important;
		position: relative;
	}

	.btn.primary.solid.disabled > .preloader-wrapper.tiny {
		height: 16px;
		width: 16px;
		position: absolute;
		top: 10px;
		left: calc(50% - 8px);
	}

	.spinner-primary-only {
		border-color: var(--primary);
	}
</style>

<section style="margin-top: 10%">
	<a
		href="#!"
		style="text-decoration: underline; font-weight: 500"
		class="btn-flat primary"
		id="domain-dropdown-btn"
		data-website_id />
		<i class="material-symbols-rounded right">keyboard_arrow_down</i>
		<span data-id="domain-name">{{ $domain }}</span>
	</a>

	<div class="divider" style="margin: 2% 0"></div>

	<div class="row">
		<div class="col s12">
			<ul class="tabs">
				<li class="tab col s2"><a href="#dns" class="active">DNS Records</a></li>
				<li class="tab col s2"><a href="#forwarding">Forwarding</a></li>
				<li class="tab col s2"><a href="#nameserver" data-domain="{{ $domain }}">Nameservers</a></li>
				<li class="tab col s2"><a href="#DNSSEC">DNSSEC</a></li>
				{{-- <li class="tab col s2"><a href="#contact-info">Contact Info</a></li> --}}
			</ul>
		</div>

		<div class="col s12" id="dns">
			<br>
			<p class="grey-text">DNS records define how your domain behaves, like showing your website content and delivering your email.</p>
			<br>
			<a href="#add-dns" class="btn primary solid" style="border-radius: 4px" data-value="{{ $domain }}">Add new record</a>
			<br><br>
			<p class="hide" data-id="no-dns-message">You have not added any DNS records yet. Add a new record!</p>
			<table class="regular-border small-text" data-id="dns-records-table">
				<tbody></tbody>
			</table>
		</div>

		<div class="col s12" id="forwarding">
			<br>
			<p class="grey-text">Forward your current Domain Name to another Domain Name.</p>
			<br>

			<form action="#!" method="post" name="domain-forwarding-form">
				<div class="row">
					<div class="input-field col s12 m6 l4">
						<input type="text" id="forwarding_source" name="source">
						<label for="forwarding_source">Source</label>
					</div>
				</div>
	
				<div class="row">
					<div class="input-field col s12 m6 l4">
						<input type="text" id="forwarding_destination" name="destination" placeholder="e.g https://example.com">
						<label for="forwarding_destination">Destination</label>
					</div>
				</div>
	
				<div class="row">
					<div class="col s12">
						<p>
							Enable Masking
							<div class="switch">
								<label>
									<input type="checkbox">
									<span class="lever"></span>
								</label>
							</div>
						</p>
					</div>
	
					<div class="input-field col s12">
						<button class="btn primary solid" name="submit-btn" value="submit" style="border-radius: 4px">Save Record</button>
					</div>
				</div>
			</form>
		</div>

		<div class="col s12" id="nameserver">
			<br>
			<p class="grey-text">Name Servers are used to point your Domain Name to your website or email service.</p>
			<br>
			<a href="#modify-nameserver" class="btn primary solid" style="border-radius: 4px" data-value="{{ $domain }}">Modify Name Server</a>
			<br><br>
			<table class="regular-border small-text" data-id="ns-records-table">
				<tbody></tbody>
			</table>
		</div>

		<div class="col s12" id="DNSSEC">
			<br>
			<p class="grey-text">Add an extra layer of security with DNSSEC by using digital signatures to authenticate & protect DNS data.</p>
			<br>
		</div>

		{{-- <div class="col s12" id="contact-info">
			<br>
			<p class="grey-text"></p>
			<br>
		</div> --}}
	</div>
</section>

<div class="modal modal-fixed-footer small-modal" id="add-dns-modal">
	<form action="{{ url('domain/add-dns') }}" method="post" name="add-dns-form">
		<div class="modal-content">
			<p class="medium">Add DNS Record</p>
				@csrf
				<input type="hidden" name="dns_zone_id">
				<div class="input-field" style="margin-top: 48px">
					<select name="record_type" id="add_record_type">
						<option value="A">A</option>
						<option value="CNAME">CNAME</option>
						<option value="SOA">SOA</option>
						<option value="MX">MX</option>
						<option value="TXT">TXT</option>
					</select>
				</div>

				<div class="input-field" style="margin-top: 48px">
					<input type="text" name="record_name" id="add_record_name">
					<label for="add_record_name">Name</label>
				</div>

				<div class="input-field" style="margin-top: 48px">
					<input type="text" name="record_value" id="add_record_value">
					<label for="add_record_value">Value</label>
				</div>

				<div class="input-field" style="margin-top: 48px">
					<input type="text" name="record_ttl" id="add_record_ttl">
					<label for="add_record_ttl">TTL</label>
				</div>
			
		</div>
		<div class="modal-footer">
			<button class="btn-flat full-width" style="height: 56px; margin: 0">Save Record</button>
		</div>
	</form>
</div>

<div class="modal modal-fixed-footer small-modal" id="edit-dns-modal">
	<form action="{{ url('domain/edit-dns') }}" method="post" name="edit-dns-form">
		<div class="modal-content">
			<p class="medium">Edit DNS Record</p>
			@csrf
			<input type="hidden" name="dns_zone_id">
			<input type="hidden" name="dns_zone_record_id">
			<div class="input-field" style="margin-top: 48px">
				<select name="record_type" id="edit_record_type">
					<option value="A">A</option>
					<option value="CNAME">CNAME</option>
					<option value="SOA">SOA</option>
					<option value="MX">MX</option>
					<option value="TXT">TXT</option>
				</select>
			</div>

			<div class="input-field" style="margin-top: 48px">
				<input type="text" name="record_name" id="edit_record_name">
				<label for="edit_record_name">Name</label>
			</div>

			<div class="input-field" style="margin-top: 48px">
				<input type="text" name="record_value" id="edit_record_value">
				<label for="edit_record_value">Value</label>
			</div>

			<div class="input-field" style="margin-top: 48px">
				<input type="text" name="record_ttl" id="edit_record_ttl">
				<label for="edit_record_ttl">TTL</label>
			</div>
		</div>
		<div class="modal-footer" style="padding: 0; border-top: none; background-color: var(--primary)">
			<button class="btn-flat full-width white-text" style="height: 56px; margin: 0">Save Record</button>
		</div>
	</form>
</div>

<div class="modal modal-fixed-footer small-modal" id="modify-ns-modal">
	<form action="{{ url('domain/modify-ns') }}" method="post" name="modify-ns-form">
		<div class="modal-content" style="padding-top: 0">
			<div class="white" style="position: sticky; top: 0; z-index: 99; padding-top: 24px">
				<p class="medium flexbox space-between" style="align-items: center;">
					<span>Manage Nameservers</span>
					<a href="#add-nameserver" class="btn-flat primary right" style="font-weight: 500">Add more</a>
				</p>
			</div>
			<br>
			@csrf
			<input type="hidden" name="domain_name_id">
			<input type="hidden" name="website_name">

			<div class="nameserver-container"></div>
		</div>
		<div class="modal-footer">
			<button class="btn-flat full-width" style="height: 56px; margin: 0">Save Record</button>
		</div>
	</form>
</div>

<div class="modal modal-fixed-footer small-modal" id="edit-ns-modal">
	<form action="{{ url('domain/edit-ns') }}" method="post" name="edit-ns-form">
		<div class="modal-content">
			<p class="medium">Edit Name Server</p>
			@csrf
			<input type="hidden" name="dns_zone_id">
			<input type="hidden" name="dns_zone_record_id">
			<div class="input-field" style="margin-top: 48px">
				<select name="record_type" id="edit_name_server">
					<option value="NS" selected disabled>Name Server</option>
				</select>
				<label for="edit_name_server">Record Type</label>
			</div>

			<div class="input-field" style="margin-top: 48px">
				<input type="text" name="record_value" id="edit_ns_value">
				<label for="edit_ns_value">Value</label>
			</div>
		</div>
		<div class="modal-footer" style="padding: 0; border-top: none; background-color: var(--primary)">
			<button class="btn-flat full-width white-text" style="height: 56px; margin: 0">Save Record</button>
		</div>
	</form>
</div>

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/user/dns.js') }}"></script>
@endsection