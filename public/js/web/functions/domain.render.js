export const CurrencySymbol = (currency) => {
	switch (currency) {
		case 'inr':
			return '₹'

		case 'usd':
			return '$'

		default:
			break;
	}
}

export const ValidateInputs = (form) => {
	let check = true
	for (const input of form) {
		if (!input.value) check = false;
	}
	return check
}

export const DomainFormLoader = (button, state) => {
	if (state === true) {
		button.classList.add('disabled')
		button.innerHTML = '<div class="preloader-wrapper tiny active" style="position: absolute; top: 10px; left: 10px"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
	} else {
		button.classList.remove('disabled')
		button.innerHTML = `<img src="${ appUrl('images/icons/search.svg') }" alt="">`
	}
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


/**
 * RENDER FUNCTIONS
 * 1. domain suggestion render
 * 2. gyaan render
 * 3. multi year price render
 * 4. term length render
 * 5. update prices render
 * 6. popular domains render
 */

export const DomainSuggestionRender = (data, currency, loader) => {
	const tables = document.querySelectorAll('[data-id="domain-suggestion-table"] tbody')
	if (loader === true) { // show results
		tables.forEach(table => {
			table.innerHTML = ''
			data.forEach(domain => {
				table.innerHTML += `<tr>
					<td>
						<span class="medium">${ domain.domainName }</span>
						<br>
						<span class="medium small-text grey-text">${ currency } ${ domain.price.toFixed(2) } for the first year</span>
					</td>
					<td>
						<a href="#!" class="btn-flat primary" data-id="domain.suggestion.add" data-domain="${ domain.domainName }" style="font-weight: 500">Add to cart</a>
					</td>
				</tr>`
			})
		})
	} else { // show loading screen
		tables.forEach(table => {
			table.innerHTML = `<tr>
				<td style="text-align: left">
					<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>
				</td>
			</tr>`
		})
	}
}

export const UnavailableDomainRender = (data) => {
	document.querySelector('[data-id="UnavailableDomainSearchForm"]')['domain_name'].value = data.name
	document.querySelector('[data-id="unavailable.domain.name"]').innerText = data.name
}

export const AvailableDomainRender = (data, loading) => {
	if (loading === true) {
		document.querySelector('[data-id="main-price-wrapper"] .LoadingWrapper').classList.remove('hide')
	} else {
		document.querySelector('[data-id="main-price-wrapper"] .LoadingWrapper').classList.add('hide')
		let currency
		switch (data.currency) {
			case 'inr':
				currency = '₹'
				break;

			case 'usd':
				currency = '$'
				break;
		
			default:
				currency = '$'
				break;
		}

		document.querySelector('[data-id="available.domain.name"]').innerText = (data.name) ? data.name : document.querySelector('#AddToCart')['domain_name'].value
		document.querySelectorAll('[data-id="currency"]').forEach(element => {
			element.innerText = currency
		})

		if (data.discount_info != null) {
			if (data.discount_info.percent_off != null) { // discount is in form of percent

			} else { // discount is in form of amount
				document.querySelector('[data-id="discount-info-wrapper"]').innerHTML = `<span class="grey-text" style="text-decoration: line-through">${ currency } ${ (data.unit_amount / 100).toFixed(2) }</span>`
				document.querySelector('[data-id="domain-price"]').innerText = ((data.unit_amount - data.discount_info.amount_off) / 100).toFixed(2)
			}
		} else { // there is no discount. show the normal unit amount
			document.querySelector('[data-id="discount-info-wrapper"]').innerHTML = ''
			document.querySelector('[data-id="domain-price"]').innerText = (data.unit_amount / 100).toFixed(2)
		}

		let DurationElaborate
		switch (data.duration) {
			case 12:
				DurationElaborate = 'for first year'
				break;
			case 24:
				DurationElaborate = 'for two years'
				break;
			case 36:
				DurationElaborate = 'for three years'
				break;
			case 60:
				DurationElaborate = 'for five years'
				break;
			default:
				DurationElaborate = 'for first year'
				break;
		}

		document.querySelector('[data-id="duration.elaborate"]').innerText = DurationElaborate
		document.querySelector('[data-id="renewal.date"]').innerText = data.renewal
		document.querySelector('[data-id="renewal-price"]').innerText = (data.unit_amount / 100).toFixed(2)
	}
}

export const DomainPriceWrapper = (data, loading) => {
	if (loading === true) {
		document.querySelector('[data-id="domain-price-wrapper"]').innerHTML = '<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
	} else {
		let currency
		switch (data.currency) {
			case 'inr':
				currency = '₹'
				break;

			case 'usd':
				currency = '$'
				break;
		
			default:
				currency = '$'
				break;
		}

		if (data.discount_info != null) {
			document.querySelector('[data-id="domain-price-wrapper"]').innerHTML = `<span class="medium medium" style="text-decoration: line-through">${ currency } ${ (data.unit_amount / 100).toFixed(2) }</span><br><span class="medium black-text regular-text">${ currency } ${ ((data.unit_amount - data.discount_info.amount_off) / 100).toFixed(2) }</span>`			
		} else {
			document.querySelector('[data-id="domain-price-wrapper"]').innerHTML = `<span class="medium black-text regular-text">${ currency } ${ (data.unit_amount / 100).toFixed(2) }</span>`			
		}
	}
}

export const UpdatePrices = (data) => {
	document.querySelector('[data-id="domain-price"]').innerText = data.unit_amount
	document.querySelector('[data-id="renewal.date"]').innerText = data.renewal_date
}

export const PopularDomainRender = (data) => {
	document.querySelectorAll('[data-id="price-wrapper"]').forEach((element, index) => {
		element.innerHTML = ''

		element.innerHTML = `<h6 class="grey-text small-text semi-bold" style="text-decoration: line-through;">${ data[index].currency } ${ data[index].renewal_fee.toFixed(2) }</h6>
		<span class="off badge" style="margin-left: 0; font-weight: 600 !important;">${ data[index].currency } ${ (data[index].renewal_fee - data[index].registration_fee).toFixed(2) } off</span>
		<h4 class="semi-bold">
			${ data[index].currency } ${ data[index].registration_fee.toFixed(2) }
			<br>
			<span class="medium" style="font-size: 1rem">for first year</span>
		</h4>`
	})
}

export const DropdownRender = (elem, data) => {
	elem.innerHTML = ''

	for (const key in data.response) {
		if (Object.prototype.hasOwnProperty.call(data.response, key)) {
			const PriceInfo = data.response[key];
			if (PriceInfo == null) {
				elem.innerHTML += `<li><a href="#!" class="select_domain_duration" data-id="term-length" data-product="${ data.parent.product_id }" data-region="${ data.parent.region }" data-duration="${ key }" data-domain="${ data.parent.domain }" data-price>${ key }</a></li>`
			} else {
				elem.innerHTML += `<li><a href="#!" class="select_domain_duration" data-id="term-length" data-price="${ PriceInfo.price_id }">${ key }</a></li>`
			}
		}
	}
}