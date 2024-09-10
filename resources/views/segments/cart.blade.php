<section style="padding-top: 5%; min-height: 80vh">
	<div class="container">
		<div class="row">
			<div class="col s12 m6 l6">
				<nav class="breadcrumb-container">
					<div class="nav-wrapper">
						<a href="#!" class="breadcrumb black-text">Cart</a>
					</div>
				</nav>
				{{-- @foreach (session('cart.contents') as $id => $item)
				@php
					session()->get('currency_iso_3')
				@endphp
				@endforeach --}}
				{{-- @php
					print_r(session('cart.contents'));
				@endphp --}}
				<table>
					<tbody>
						@foreach (session('cart.contents') as $id => $item)
						<tr>
							<td>
								@if ($item->category == 'Domain')
								<p>
									<span class="small-text grey-text">{{ $item->product_name }} Domain Registration</span>
									<br>
									<span class="medium">{{ $item->domain_name }}</span>
								</p>
								@else
								<p>
									<span class="small-text grey-text">{{ $item->category }}</span>
									<br>
									<span class="medium">{{ $item->product_name }}</span>
								</p>
								@endif
								<a
									href="#!"
									class="btn dropdown-trigger select-duration-btn"
									data-target="duration"
									data-product="{{ $item->product_name }}"
									data-region="{{ session()->get('region') }}" />
									<i class="material-icons right">keyboard_arrow_down</i>
									{{ $item->duration_text }}
								</a>
								<br>
								<h6 class="small-text grey-text">Renews on {{ date('M j, Y', strtotime($item->duration_text)) }} for {{ session()->get('cart.currency') }} {{ number_format($item->unit_amount / 100, 2, '.', '') }}</h6>
							</td>
							<td class="right-align">
								<p>
									<span class="primary-text semi-bold">{{ session()->get('cart.currency') }} {{ number_format($item->sale_price / 100, 2, '.', '') }}</span>
									<br>

									@if (property_exists($item, 'discount_info'))
										@if ($item->discount_info->percent_off)
											<span class="small-text">{{ $item->discount_info->percent_off }}% discount on {{ session()->get('cart.currency') }} {{ number_format($item->unit_amount / 100, 2, '.', '') }}</span>
										@else
										<span class="small-text">{{ round((($item->discount_info->amount_off / 100) / ($item->unit_amount / 100)) * 100, 2) }}% discount on {{ session()->get('cart.currency') }} {{ number_format($item->unit_amount / 100, 2, '.', '') }}</span>
										@endif
									@endif
									<br><br>
									<a href="{{ url('cart/remove') }}" class="cart-delete-btn right" data-id="{{$id}}">
										<i class="material-symbols-rounded tiny">delete</i>
									</a>
								</p>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col s12 m5 offset-m1" style="position: sticky; top: 128px">
				<div class="card-panel z-depth-0" style="margin-top: 25px; border: 1px solid #dfdfdf">
					<h5 class="semi-bold">Order Summary</h5>
					<p class="regular">{{ count(session('cart.contents')) }} {{ (count(session('cart.contents')) > 1) ? 'items' : 'item' }}</p>
					<p><div class="divider"></div></p>
					<p style="font-size: 18px">Subtotal ({{ strtoupper(session('cart.contents')[0]->currency) }}) <span class="right primary-text medium">{{ session()->get('cart.currency') }} {{ number_format(array_sum(session('cart.sub_total')) / 100, 2, '.', '') }}</span></p>
					{{-- <p style="font-size: 18px">Subtotal (INR) <span class="right primary-text medium">{{ session()->get('cart.currency') }} {{ number_format(array_sum(session('cart.sub_total')) / 100, 2, '.', '') }}</span></p> --}}
					<p class="small-text grey-text text-darken-1 center-align">Subtotal does not includes taxes and fees. Taxes and fees will be calculated during checkout, based on your location.</p>

					<br>
					
					{{-- <p><a href="#!" class="btn-large btn-flat full-width">Apply a promo code</a></p> --}}
					<p><a href="#!" class="btn-large primary hover full-width">Apply a promo code</a></p>
					{{-- <br>
					@if (array_sum(session('cart.discount')) == 0)
					<p class="small-text center-align">Switch to Yearly Plans to <span class="medium primary-text">save more</span> on this order.</p>
					@else
					<p class="small-text center-align">Wow! You are saving <span class="medium primary-text">{{ session()->get('cart.currency') }} {{ number_format(array_sum(session('cart.discount')) / 100, 2, '.', '') }}</span> on this order.</p>
					@endif --}}
					<a href="{{ url('checkout/billing-address') }}" class="primary solid btn-large full-width">Move to Checkout</a>
					<br><br>
					<div class="center-align">
						<h6 class="small-text">Secured Payments</h6>
						<img src="{{ asset('images/icons/all-cards.png') }}" alt="discounts on domains and hosting" width="80%" />
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<ul id="duration" class="dropdown-content duration-dropdown">
	<li><a href="#!" class="select_hosting_duration" data-product="" data-duration="1 Month">1 Month</a></li>
	<li><a href="#!" class="select_hosting_duration" data-product="" data-duration="12 Months">12 Months</a></li>
	<li><a href="#!" class="select_hosting_duration" data-product="" data-duration="24 Months">24 Months</a></li>
	<li><a href="#!" class="select_hosting_duration" data-product="" data-duration="36 Months">36 Months</a></li>
</ul>