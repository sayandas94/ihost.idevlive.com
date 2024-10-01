// export const RenewRender = () => {
// 	document.querySelector('[data-id="renew-table"] tbody').innerHTML = `<tr>
// 		<td>
// 			<span class="small-text medium">Term Length</span>
// 		</td>
// 		<td>
// 			<a
// 			href="#!"
// 			class="btn select-duration-btn dropdown-trigger"
// 			data-target="domain-duration">
// 			<i class="material-icons right">keyboard_arrow_down</i>
// 			12 Months
// 			</a>

// 			<ul id="domain-duration" class="dropdown-content" style="border-radius: 8px">
// 				<li><a href="#!">1 Month</a></li>
// 				<li><a href="#!">12 Months</a></li>
// 				<li><a href="#!">24 Months</a></li>
// 				<li><a href="#!">36 Months</a></li>
// 			</ul>
// 		</td>
// 	</tr>

// 	<tr>
// 		<td>
// 			<span class="small-text medium">Payment Method</span>
// 		</td>
// 		<td>
// 			<a
// 			href="#!"
// 			class="btn select-duration-btn dropdown-trigger"
// 			data-target="payment-methods">
// 			<i class="material-icons right">keyboard_arrow_down</i>
// 			&bull;&bull;&bull;&bull; 4242
// 			</a>

// 			<ul id="payment-methods" class="dropdown-content" style="border-radius: 8px">
// 				<li><a href="#!">1 Month</a></li>
// 				<li><a href="#!">12 Months</a></li>
// 				<li><a href="#!">24 Months</a></li>
// 				<li><a href="#!">36 Months</a></li>
// 			</ul>
// 		</td>
// 	</tr>

// 	<tr class="amount">
// 		<td><span class="small-text medium">Sub Total</span></td>
// 		<td><span class="small-text">$ 8.00</span></td>
// 	</tr>

// 	<tr class="amount">
// 		<td><span class="small-text medium">Discounts</span></td>
// 		<td><span class="small-text">$ 2.00</span></td>
// 	</tr>

// 	<tr class="amount">
// 		<td style="padding-bottom: 24px !important"><span class="small-text medium">Amount to be Paid</span></td>
// 		<td style="padding-bottom: 24px !important"><span class="small-text">$ 6.00</span></td>
// 	</tr>

// 	<tr>
// 		<td colspan="2" style="padding-bottom: 0 !important">
// 			<button class="btn-flat btn-large primary full-width" style="font-weight: 500">Pay Now</button>
// 		</td>
// 	</tr>`
// }

export const HostingRender = (data) => {
	document.querySelector('[data-id="hosting-table"] tbody').innerHTML = ''
	for (const hosting of data) {
		let HostingStatus, Description, url
		if (hosting.str_expiring < hosting.str_today) { // Hosting is expired
			HostingStatus = `<span class="badges red">Expired</span>`
			Description = `Renew Now`
			url = '#renew-hosting'
		} else { // Hosting is still active
			HostingStatus = `<span class="badges green">Active</span>`

			if (hosting.setup) {
				Description = hosting.primary_domain
				url = '#!'
			} else {
				Description = `Setup Required`
				url = '#setup-hosting-popup'
			}
		}

		document.querySelector('[data-id="hosting-table"] tbody').innerHTML += `<tr>
			<td>
				<a href="${ url }" data-hosting="${ hosting.id }" data-price="${ hosting.price_id }">
					<div class="card-panel z-depth-0">
						<span class="regular-text medium">${ hosting.product_name }</span>
						<br>
						<span class="small-text grey-text truncate-1">${ Description }</span>
					</div>
				</a>
			</td>
			<td>
				${ HostingStatus }
			</td>
			<td>
				<span>${ hosting.expiring_at }</span>
			</td>
			<td>
				<div class="switch">
					<label>
						${ (hosting.auto_renew) ? '<input type="checkbox" class="auto-renew-checkbox" data-id="" data-product="hosting" checked><span class="lever"></span>' : '<input type="checkbox" class="auto-renew-checkbox" data-id="" data-product="hosting"><span class="lever"></span>' }
					</label>
				</div>
			</td>
			<td>
				<button class="btn-flat" data-id="hosting-dropdown" data-target="hosting-dropdown" data-hosting="${ hosting.id }" data-price="${ hosting.price_id }"><i class="material-symbols-rounded">more_vert</i></button>
			</td>
		</tr>`
	}
}

// Not using it anywhere
export const HostingPlans = () => {
	return 'hi'
}

export const PriceIdRender = (data) => {
	document.querySelector('[data-id="hosting-term"]').innerHTML = ''
	data.prices.forEach(item => {
		document.querySelector('[data-id="hosting-term"]').innerHTML += `<p style="margin-bottom: 24px">
			<label>
				<input class="with-gap" name="term_length" type="radio" value="${ item.price_id }" ${ (item.price_id == data.current) ? 'checked' : '' } />
				<span style="font-size: 13px !important">${ item.duration_text }</span>
			</label>
		</p>`
	})
}

export const PriceUpdate = (data) => {
	document.querySelector('[data-id="RenewalDate"]').innerText = `Renews on ${ data.renewal_date } for ${ currency(data.currency).symbol } ${ (data.unit_amount / 100).toFixed(2) }`
	document.querySelector('#sub_total').innerText = `${ currency(data.currency).symbol } ${ (data.unit_amount / 100).toFixed(2) }`
}

export const BillingAddressRender = (data) => {
	document.querySelector('[data-id="BillingAddress"]').innerHTML = `<span>${ data.street }</span><br><span>${ data.city }, ${ data.state }</span><br><span>${ data.postal_code }</span><br><span>${ data.country }</span>`
}

export const PaymentMethodRender = (data) => {
	document.querySelector('#payment-methods').innerHTML = ''

	data.forEach((PaymentMethod, index) => {
		if (index == 0) {
			document.querySelector('[data-id="last4"]').innerHTML = PaymentMethod.card.last4
			document.forms['RenewHostingForm']['payment_method'].value = PaymentMethod.id
		}

		document.querySelector('#payment-methods').innerHTML += `<li><a href="#SelectPaymentMethod" data-value="${ PaymentMethod.id }" data-last4="${ PaymentMethod.card.last4 }" style="text-transform: capitalize">&bull;&bull;&bull;&bull; ${ PaymentMethod.card.last4 } (${ PaymentMethod.card.brand }) </a></li>`
	});
	document.querySelector('#payment-methods').innerHTML += `<li><a href="#!">Add New Card</a></li>`

	M.Dropdown.init(document.querySelector('[data-target="payment-methods"]'), {
		alignment: 'left',
		constrainWidth: false
	})
	// data.forEach((PaymentMethod, index) => {
	// 	document.querySelector('#payment-methods').innerHTML += `<option value="#!">&bull;&bull;&bull;&bull; ${ PaymentMethod.card.last4 }</option>`
	// })

	// M.FormSelect.init(document.querySelector('[data-target="payment-methods"]'))
}

export const AmountRender = (data) => {
	const SubTotal = (data.UnitAmount / 100).toFixed(2)
	const Tax = SubTotal * data.TaxRate
	const Total = (parseFloat(SubTotal) + parseFloat(Tax)).toFixed(2)

	document.querySelector('[data-id="price-wrapper"]').innerHTML = `<div class="divider"></div>
	<p class="flexbox space-between">
		<span class="small-text medium">Sub Total</span>
		<span class="small-text" id="sub_total">${ data.Currency } ${ SubTotal }</span>
	</p>

	<p class="flexbox space-between">
		<span class="small-text medium">Taxes & Fees</span>
		<span class="small-text" id="sub_total">${ data.Currency } ${ Tax }</span>
	</p>

	<p class="flexbox space-between">
		<span class="small-text medium">Amount to Pay</span>
		<span class="small-text" id="sub_total">${ data.Currency } ${ Total }</span>
	</p>`
}

export const LoadingBtn = (button, state) => {
	if (state === true) {
		button.classList.add('disabled')
		button.innerHTML += '<div class="preloader-wrapper tiny active" style="position: absolute; top: calc(50% - 8px); left: calc(50% - 8px)"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
	} else {
		button.classList.remove('disabled')
		button.removeChild(button.lastElementChild)
	}
}

const currency = (iso) => {
	switch (iso) {
		case 'usd':
			return {
				iso: 'usd',
				symbol: '$'
			}

		case 'inr':
			return {
				iso: 'inr',
				symbol: '₹'
			}

		default:
			return {
				iso: 'usd',
				symbol: '$'
			}
	}
}