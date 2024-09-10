document.addEventListener('click', (e) => {
	const show_feature = e.target.closest('.features-btn')
	if (show_feature) {
		e.preventDefault()
		const id = show_feature.getAttribute('href')
		document.querySelectorAll('.features-card .content').forEach(element => {
			element.classList.remove('active')
		})
		console.log(id)
		document.querySelector(id).classList.add('active')
	}
})

document.addEventListener('click', async (e) => {
	const configure_web_hosting = e.target.closest('[href*="#configure-web-hosting"]')
	if (configure_web_hosting) {
		e.preventDefault()
		disable_btn(configure_web_hosting, true)
		const prices = await get(appUrl(`hosting/choose-plan?product_id=${ configure_web_hosting.dataset.product }&region=${ configure_web_hosting.dataset.region }`))

		if (!prices.status) {
			console.error(prices)
			return
		}

		document.querySelector('[data-id="product-name"]').innerText = configure_web_hosting.dataset.name
		features_render(JSON.parse(prices.data.features))
		render_hosting_details(prices.data.price_info)
		
		document.querySelector('#configure-hosting').classList.add('active')
		disable_btn(configure_web_hosting, false)
	}
})

const render_hosting_details = (data) => {
	document.querySelector('[data-id="hosting-table"] tbody').innerHTML = ''

	for (const price of data) {
		if (price.discount_type == 'percent') {
			span = `<span class="off badge">${ price.discount_info.percent_off }% off</span>`
		}

		if (price.duration == 12) {
			document.querySelector('[data-id="subtotal"]').innerText = `${ currency_selector(price.currency) } ${ subtotal(price) }`

			if (price.discount_type == 'percent') {
				document.querySelector('[data-id="discount-info"]').innerText = `On Sale ${ price.discount_info.percent_off }% off`
			}

			document.querySelector('[data-id="renewal-info"]').innerText = `Renews on ${ price.renewal_date } for ${ currency_selector(price.currency) } ${ (price.unit_amount / 100).toFixed(2) }`
		}

		document.querySelector('[data-id="hosting-table"] tbody').innerHTML += `<tr>
			<td>
				<label data-label="radio-btn-label">
					<input
						class="with-gap" data-class="term-length"
						name="price_id"
						type="radio"
						data-duration="12 Months"
						data-locale="in"
						data-id="select-price"
						value="${ price.price_id }"
						${ (price.duration == 12) ? 'checked' : '' } />
					
					<span>${ price.duration_text }</span>
					${ (price.discount_id) ? span : '' }
				</label>
			</td>
			<td>
				${ currency_selector(price.currency) } ${ per_month(price) }/Mo
			</td>
		</tr>`
	}
}

const features_render = (features) => {
	document.querySelector('[data-id="features-wrapper"]').innerHTML = ''
	features.forEach(feature => {
		document.querySelector('[data-id="features-wrapper"]').innerHTML += `<p class="medium small-text grey-text" style="margin-bottom: 16px">
			<img src="${ appUrl(`images/icons/${ feature.icon }`) }" alt="" width="20" class="left" style="margin-right: 24px">
			${ feature.feature }
		</p>`
	})
}

const final_price_render = (price_info) => {
	if (price_info.discount_type == 'percent') {
		document.querySelector('[data-id="discount-info"]').innerText = `On Sale ${ price_info.discount_info.percent_off }% off`
	} else if (price_info.discount_type == 'amount') {
		document.querySelector('[data-id="discount-info"]').innerText = `On Sale ${ price_info.discount_info.amount_off } off`
	} else {
		document.querySelector('[data-id="discount-info"]').innerText = ''
	}

	document.querySelector('[data-id="renewal-info"]').innerText = `Renews on ${ price_info.renewal_date } for ${ currency_selector(price_info.currency) } ${ (price_info.unit_amount / 100).toFixed(2) }`

	document.querySelector('[data-id="subtotal"]').innerText = `${ currency_selector(price_info.currency) } ${ subtotal(price_info) }`
}

const currency_selector = (currency) => {
	switch (currency) {
		case 'usd': return '$'
		case 'inr': return '₹'
		default: return '$'
	}
}

const per_month = (price) => {
	if (price.discount_type == 'percent') return (((price.unit_amount * ((100 - price.discount_info.percent_off) / 100)) / 100) / price.duration).toFixed(2);

	if (price.discount_type == 'amount') return null;

	if (price.discount_type == null) return ((price.unit_amount / price.duration) / 100).toFixed(2)
}

const subtotal = (price_info) => {
	if (price_info.discount_type == 'percent') {
		discount_amount = price_info.unit_amount * (price_info.discount_info.percent_off / 100)

		return ((price_info.unit_amount - discount_amount) / 100).toFixed(2)
	}

	if (price_info.discount_type == 'amount') {
		discount_amount = price_info.unit_amount - price_info.discount_info.amount_off

		return price_info.unit_amount - discount_amount
	}

	return (price_info.unit_amount / 100).toFixed(2)
}