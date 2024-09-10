let start, end
let features_scroll_start_pos, features_scroll_end_pos
document.addEventListener('DOMContentLoaded', () => {
	M.ScrollSpy.init(document.querySelectorAll('.scrollspy'), {
		scrollOffset: 128
	})
})

document.addEventListener('touchstart', (e) => {
	const scroll_start = e.target.closest('.price-card:not(.btn-large)')
	if (scroll_start) {
		start = e.touches[0].clientX
	}

	const features_scroll_start = e.target.closest('.features-card')
	if (features_scroll_start) {
		features_scroll_start_pos = e.touches[0].clientX
	}
})

document.addEventListener('touchend', (e) => {
	const scroll_end = e.target.closest('.price-card:not(.btn-large)')
	if (scroll_end) {
		end = e.changedTouches[0].clientX
		if (start - end > 0) {
			scroll_position = document.querySelector('.slider-wrapper').children[0].offsetWidth + 24
			document.querySelector('.slider-wrapper').scrollLeft += scroll_position
		} else {
			scroll_position = document.querySelector('.slider-wrapper').children[0].offsetWidth + 24
			document.querySelector('.slider-wrapper').scrollLeft -= scroll_position
		}
	}

	const features_scroll_end = e.target.closest('.features-card')
	if (features_scroll_end) {
		features_scroll_end_pos
		features_scroll_end_pos = e.changedTouches[0].clientX

		if (features_scroll_start_pos - features_scroll_end_pos > 0) {
			scroll_position = document.querySelector('.features-wrapper').children[0].offsetWidth + 24
			document.querySelector('.features-wrapper').scrollLeft += scroll_position
		} else {
			scroll_position = document.querySelector('.features-wrapper').children[0].offsetWidth + 24
			document.querySelector('.features-wrapper').scrollLeft -= scroll_position
		}
	}
})

document.addEventListener('click', async (e) => {
	const add_to_cart = e.target.closest('[data-class="add-to-cart"]')
	if (add_to_cart) {
		e.preventDefault()
		add_to_cart.classList.add('disabled')
		const locale = add_to_cart.dataset.locale
		const name = add_to_cart.dataset.name

		const prices = await get(apiUrl(`ihost/hosting/show?name=${name}&locale=${locale}`))
		console.log(prices)
		
		prices.forEach((item, index) => {
			document.forms['configure-web-hosting']['product_id'][index].value = item.stripe
			document.forms['configure-web-hosting']['product_id'][index].dataset.locale = item.locale
			document.querySelectorAll('[data-price="hosting-price"]')[index].innerText = item.per_month

			if (document.forms['configure-web-hosting']['product_id'][index].checked) document.querySelector('[data-subtotal]').innerText = item.after_discount
		})

		add_to_cart.classList.remove('disabled')
		const modalInstance = M.Modal.init(document.querySelector(add_to_cart.getAttribute('href')))
		modalInstance.open()
	}

	const hosting_term = e.target.closest('[data-class="hosting-term"]')
	if (hosting_term) {
		const price = await get(apiUrl(`ihost/hosting/show?id=${hosting_term.value}&locale=${hosting_term.dataset.locale}`))
		document.querySelector('[data-subtotal]').innerText = price.after_discount
	}

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

	const close_popup = e.target.closest('[href*="#configure-hosting"]')
	if (close_popup) {
		e.preventDefault()
		const id = close_popup.getAttribute('href')
		document.querySelector(id).classList.remove('active')
	}

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

	const get_price_info = e.target.closest('[data-id="select-price"]')
	if (get_price_info) {
		disable_btn(document.forms['select-plan']['submit-btn'], true)
		const price_info = await get(apiUrl(`ihost/hosting/get-price-info?price_id=${get_price_info.value}`))

		if (!price_info.status) {
			M.toast({
				html: `<p>Can\'t get the pricing info</p>`
			})
			return
		}
		
		final_price_render(price_info.data)
		disable_btn(document.forms['select-plan']['submit-btn'], false)
	}
})

if (document.forms['configure-web-hosting'] != undefined) {
	const form = document.forms['configure-web-hosting']
	form.addEventListener('submit', async (e) => {
		e.preventDefault()

		const response = await post(form)
		if (!response.status) {
			return
		}

		M.toast({
			html: `<span>${response.message}</span><a href="${response.data.url}" class="btn-flat toast-action">View Cart</a>`
		});
		const modalInstance = M.Modal.init(document.querySelector('#configure-web-hosting'))
		modalInstance.close()
	})
}

if (document.forms['select-plan'] != undefined) {
	const form = document.forms['select-plan']
	form.addEventListener('submit', async (e) => {
		e.preventDefault()
		disable_btn(form['submit-btn'], true)
		
		const response = await post(form)

		if (!response.status) {
			M.toast({
				html: `<p>${ response.message }</p>`
			})
			disable_btn(form['submit-btn'], false)
			return
		}

		document.querySelector('#configure-hosting').classList.remove('active')
		M.toast({
			html: `<span>${ response.message }</span><a href="${ appUrl(response.data.url) }" class="btn-flat toast-action">View Cart</a>`
		})
		disable_btn(form['submit-btn'], false)
	})
}

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

// const disable_btn = (button) => {
// 	button.classList.add('disabled')
// 	button.innerHTML += `<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>`
// }

// const active_btn = (button) => {
// 	button.classList.remove('disabled')
// 	button.removeChild(button.lastElementChild)
// }