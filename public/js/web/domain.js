import {
	DomainSuggestionRender as DomainSuggestionRender,
	ValidateInputs as ValidateInputs,
	DomainFormLoader as DomainFormLoader,
	LoadingBtn as LoadingBtn,
	UnavailableDomainRender as UnavailableDomainRender,
	AvailableDomainRender as AvailableDomainRender,
	TermLengthRender as TermLengthRender,
	CurrencySymbol as CurrencySymbol,
	UpdatePrices as UpdatePrices,
	PopularDomainRender as PopularDomainRender
} from './functions/domain.render.js'

let scroll_position

document.querySelector('#DomainSearchForm').addEventListener('submit', async (e) => {
	e.preventDefault()
	const form = document.querySelector('#DomainSearchForm')
	
	DomainFormLoader(form['submit-btn'], true)

	if (!ValidateInputs(form)) {
		M.toast({
			html: '<p>Please enter a domain name first.</p>'
		})
		DomainFormLoader(form['submit-btn'], false)
		return
	}

	const domain_result = await post(form)
	if (!domain_result.status) {
		console.log(domain_result)
		for (const key in domain_result.data.error) {
			M.toast({
				html: `<p>${ domain_result.data.error[key][0] }</p>`
			})
		}
		DomainFormLoader(form['submit-btn'], false)
		return
	}

	const currency_symbol = CurrencySymbol(domain_result.data.currency)

	if (domain_result.data.status_code == 200) { // it means the domain is available for registration
		document.querySelector('#AddToCart')['submit-btn'].classList.add('disabled') // disable the button so that the user doesn't click before the prices load up
		document.querySelector('[data-id="popup.true"]').classList.add('active')
		document.querySelector('#AddToCart')['domain_name'].value = domain_result.data.name // add the domain name to add to cart form

		AvailableDomainRender(domain_result.data, currency_symbol)

		
		TermLengthRender(null, false)
		
		const term_length = await get(apiUrl(`ihost/domain/multi-year-pricing?website_name=${ domain_result.data.name }&region=${ form['locale'].value }`))
		
		TermLengthRender(term_length.data, true)
		document.querySelector('#AddToCart')['submit-btn'].classList.remove('disabled') // enable the button so that the user can add the domain to the cart
	} else { // it means the domain is already registered
		document.querySelector('[data-id="popup.false"]').classList.add('active')

		UnavailableDomainRender(domain_result.data)
	}

	const suggestions_count = 5
	const domain_suggestion = await get(apiUrl(`ihost/domain/similar-domains?domain=${ form['domain_name'].value }&currency=${ domain_result.data.currency }&suggestions_count=${ suggestions_count }`))

	DomainSuggestionRender(domain_suggestion.data, currency_symbol)

	DomainFormLoader(form['submit-btn'], false)
})

document.querySelector('#AddToCart').addEventListener('submit', async (e) => {
	e.preventDefault()
	const form = document.querySelector('#AddToCart')

	LoadingBtn(form['submit-btn'], true)

	const add_to_cart = await post(form)

	if (!add_to_cart.status) {
		for (const key in add_to_cart.data) {
			M.toast({
				html: `<p>${ add_to_cart.data[key][0] }</p><a href="${ appUrl('cart') }" class="btn-flat toast-action">View Cart</a>`
			})
		}
		LoadingBtn(form['submit-btn'], false)
		return
	}

	M.toast({
		html: `<p>${ add_to_cart.message }</p><a href="${ appUrl('cart') }" class="btn-flat toast-action">View Cart</a>`
	})

	document.querySelector('#configure-domain-name').classList.remove('active')
	LoadingBtn(form['submit-btn'], false)
})

document.addEventListener('click', async (e) => {
	const TermLength = e.target.closest('[data-selector="term-length"]')
	if (TermLength) {
		const renewal_data = {
			unit_amount: TermLength.dataset.price,
			renewal_date: TermLength.dataset.renewal
		}

		UpdatePrices(renewal_data)
	}

	const ClosePopup = e.target.closest('[data-id="close.popup"]')
	if (ClosePopup) {
		e.preventDefault()
		const id = ClosePopup.getAttribute('href')
		document.querySelector(id).classList.remove('active')
	}

	const NextTld = e.target.closest('#next-tld')
	if (NextTld) {
		e.preventDefault()
		scroll_position = document.querySelector('.slider-wrapper').children[0].offsetWidth + 24
		document.querySelector('.slider-wrapper').scrollLeft += scroll_position
	}

	const BackTld = e.target.closest('#back-tld')
	if (BackTld) {
		e.preventDefault()
		scroll_position = document.querySelector('.slider-wrapper').children[0].offsetWidth + 24
		document.querySelector('.slider-wrapper').scrollLeft -= scroll_position
	}
})

document.addEventListener('DOMContentLoaded', async () => {
	const region = document.querySelector('#DomainSearchForm')['locale'].value
	const popular_domain_prices = await get(apiUrl(`ihost/domain/popular-domain-prices?region=${ region }`))

	PopularDomainRender(popular_domain_prices)
})

// const gyaan = {
// 	'.com' : {
// 		'short' : 'Commercial',
// 		'description' : 'Though originally intended for commercial entities, .com has become the universal TLD for all types of websites. It\'s the most recognized and trusted extension globally, making it a strong choice for any website seeking broad reach.',
// 	},

// 	'.org' : {
// 		'short' : 'Organization',
// 		'description' : 'Traditionally associated with non-profit organizations, educational institutions, and charities, .org still holds that connotation. It conveys legitimacy and trustworthiness for websites with a non-commercial purpose.',
// 	},

// 	'.net' : {
// 		'short' : 'Network',
// 		'description' : 'Initially intended for network-related businesses like internet service providers or web hosting companies, .net is now used for a wider range of websites.',
// 	},

// 	'.info' : {
// 		'short' : 'Information',
// 		'description' : 'This generic TLD is suitable for websites that primarily provide informational content. It\'s a straightforward option for websites like news portals, educational resources, or directories.',
// 	},

// 	'.biz' : {
// 		'short' : 'Business',
// 		'description' : 'Designed specifically for businesses, .biz can be a good alternative to a crowded .com space. It clearly indicates the website\'s commercial nature.',
// 	},

// 	'.live' : {
// 		'short' : 'Short & punchy',
// 		'description' : 'This TLD is ideal for websites that focus on live experiences, such as streaming services, live broadcasting platforms, or event websites. It conveys action and immediacy.',
// 	},

// 	'.tech' : {
// 		'short' : 'Straightforward',
// 		'description' : 'This TLD is perfect for technology-related businesses, startups, bloggers, or anyone in the tech space. It\'s clear, concise, and instantly communicates your website\'s focus.',
// 	},

// 	'.ai' : {
// 		'short' : 'Cutting-edge',
// 		'description' : 'This TLD is well-suited for websites related to artificial intelligence, machine learning, or research in these fields. It signifies innovation and cutting-edge technology.',
// 	},

// 	'.io' : {
// 		'short' : 'Modern & tech-savvy',
// 		'description' : 'This TLD has become popular among tech startups and companies due to its association with Silicon Valley, where ".io" was commonly used by early tech ventures. It projects a modern and tech-savvy image.',
// 	},

// 	'.xyz' : {
// 		'short' : 'Flexible',
// 		'description' : 'This TLD is a more generic option. It can be used for a wider variety of websites and is a good choice if your desired domain name isn\'t available with a more specific TLD. It can also be used creatively to represent "outside the box" thinking.'
// 	}
// }
// document.addEventListener('click', async (e) => {
// 	const read_more_feature = e.target.closest('[data-id="read_more_feature"]')
// 	if (read_more_feature) {
// 		e.preventDefault()
// 		const id = read_more_feature.getAttribute('href')
// 		document.querySelector(id).classList.add('active')
// 	}

// 	const features_btn = e.target.closest('.features-btn')
// 	if (features_btn) {
// 		e.preventDefault()
// 		const id = features_btn.getAttribute('href')
// 		document.querySelectorAll('.content').forEach(element => {
// 			element.classList.remove('active')
// 		})
// 		document.querySelector(id).classList.add('active')
// 	}

// 	const close_feature = e.target.closest('[data-id="close_feature"]')
// 	if (close_feature) {
// 		e.preventDefault()
// 		const id = close_feature.getAttribute('href')
// 		document.querySelector(id).classList.remove('active')
// 	}

// 	const close_popup = e.target.closest('[data-id="close-popup"]')
// 	if (close_popup) {
// 		e.preventDefault()
// 		const id = close_popup.getAttribute('href')
// 		document.querySelector(id).classList.remove('active')
// 	}

// 	const next_tld = e.target.closest('#next-tld')
// 	if (next_tld) {
// 		e.preventDefault()
// 		scroll_position = document.querySelector('.slider-wrapper').children[0].offsetWidth + 24
// 		document.querySelector('.slider-wrapper').scrollLeft += scroll_position
// 	}

// 	const back_tld = e.target.closest('#back-tld')
// 	if (back_tld) {
// 		e.preventDefault()
// 		scroll_position = document.querySelector('.slider-wrapper').children[0].offsetWidth + 24
// 		document.querySelector('.slider-wrapper').scrollLeft -= scroll_position
// 	}

// 	const RegistrationDuration = e.target.closest('[data-selector="registration-year"]')
// 	if (RegistrationDuration) {
// 		e.preventDefault
// 		document.querySelectorAll('[data-id="domain-price"]').forEach(element => {
// 			element.innerText = RegistrationDuration.dataset.price
// 		})
// 	}
// })

// document.addEventListener('DOMContentLoaded', () => {
// 	const form = document.forms['domain-search-form']
// 	form.addEventListener('submit', async (e) => {
// 		e.preventDefault()

// 		const domain = form['domain_name'].value
// 		if (!domain) {
// 			M.toast({html : '<p>The Domain name is required.</p>'})
// 			return
// 		}
	
// 		form['submit-btn'].classList.add('disabled')
	
// 		form['submit-btn'].innerHTML = '<div class="preloader-wrapper tiny active" style="position: absolute; top: 10px; left: 10px"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
	
// 		const response = await post(form)
		
// 		form['submit-btn'].classList.remove('disabled')
// 		form['submit-btn'].innerHTML = `<img src="${ appUrl('images/icons/search.svg') }" alt="">`

// 		if (!response.status) {
// 			if (response.data.status_code !== 400) {
// 				for (const key in response.data.error) {
// 					M.toast({
// 						html: `<p>${ response.data.error[key][0] }</p>`
// 					})
// 				}
// 				return
// 			}
// 		}

// 		arrangeInformation(response.data)
		
// 		// get the loading spinner into the domain suggestion table
// 		document.querySelector('[data-id="domain-suggestion-table"] tbody').innerHTML = `<tr style="border-bottom: none"><td><div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div></td></tr>`

// 		document.forms['configure-domain-name']['price_id'].value = response.data.price_id
// 		document.forms['configure-domain-name']['domain_name'].value = response.data.name
// 		document.forms['configure-domain-name']['duration'].value = 1
	
// 		document.querySelector('#configure-domain-name').classList.add('active')

// 		if (gyaan_boolean) {
// 			suggestions_count = 3
// 		} else {
// 			suggestions_count = 5
// 		}

// 		const domain_suggestions = await get(apiUrl(`ihost/domain/similar-domains?domain=${ domain }&currency=${ response.data.currency }&suggestions_count=${ suggestions_count }`))

// 		if (!domain_suggestions.status) {
// 			return
// 		}

// 		document.querySelector('[data-id="domain-suggestion-table"] tbody').innerHTML = ''

// 		domain_suggestions.data.forEach(suggestion => {
// 			document.querySelector('[data-id="domain-suggestion-table"] tbody').innerHTML += `<tr>
// 				<td style="padding-left: 0">
// 					<span class="medium">${ suggestion.domainName.toLowerCase() }</span>
// 					<br>
// 					<span class="small-text grey-text medium">${ currency_symbol(response.data.currency) } ${ suggestion.price } for first year</span>
// 				</td>
// 				<td class="right-align">
// 					<a href="#!" class="btn-flat primary" style="font-weight: 500">Add to cart</a>
// 				</td>
// 			</tr>`
// 		})

// 		const ResponseMultiYearPrices = await get(apiUrl(`ihost/domain/multi-year-pricing?website_name=${ document.forms['configure-domain-name']['domain_name'].value }&region=${ document.forms['configure-domain-name']['locale'].value }`))

		

// 		RenderMultiYearPrices(ResponseMultiYearPrices.data.currency, ResponseMultiYearPrices.data.prices)
// 	})

// 	const arrangeInformation = (domain) => {
// 		// get the currency symbol and display it in the required places
// 		document.querySelectorAll('[data-id="currency"]').forEach(element => {
// 			element.innerText = currency_symbol(domain.currency)
// 		})

// 		if (domain.hasOwnProperty('status_code') && domain.status_code === 400) { // this domain is not available for registration
// 			document.querySelector('[data-id="domain-name"]').innerHTML = `${ '<i class="material-symbols-rounded left grey-text" style="font-size: 19px">block</i>' + domain.name }`
// 			document.querySelector('[data-id="subtotal"]').classList.add('hide') // hides the subtotal div
// 			document.querySelector('[data-id="renewal_wrapper"]').classList.add('hide') // hides the renewal price div
// 			document.querySelector('[data-id="domain_availability"]').classList.remove('hide') // shows the domain unavailable div
// 			document.forms['configure-domain-name']['submit-btn'].classList.add('disabled') // disables the add to cart submit button
// 			document.forms['configure-domain-name'].classList.add('hide') // hides the add to cart form
// 			gyaan_boolean = false // sets the gyaan boolean to false, so that we can get 5 domain suggestions
// 			return
// 		}

// 		document.querySelector('[data-id="domain-name"]').innerHTML = `${ domain.name }` // shows the subtotal div
// 		document.querySelector('[data-id="renewal_wrapper"]').classList.remove('hide') // shows the renewal price div
// 		document.querySelector('[data-id="domain_availability"]').classList.add('hide') // hides the domain unavailable div
// 		document.forms['configure-domain-name']['submit-btn'].classList.remove('disabled') // enabbles the add to cart submit button
// 		document.forms['configure-domain-name'].classList.remove('hide') // shows the add to cart form
// 		let domain_price
// 		if (!domain.discount_info) {
// 			domain_price = (domain.unit_amount / 100).toFixed(2)
// 		} else {
// 			domain_price = ((domain.unit_amount - domain.discount_info.amount_off) / 100).toFixed(2)
// 		}

// 		document.querySelectorAll('[data-id="domain-price"]').forEach(element => {
// 			element.innerText = domain_price
// 		})

// 		document.querySelector('[data-id="renewal-price"]').innerText = (domain.unit_amount / 100).toFixed(2)

// 		// calling the render_gyaan function which displays the tld gyaan based on the domain name
// 		render_gyaan(domain)
// 	}

// 	const add_to_cart = document.forms['configure-domain-name']
// 	add_to_cart.addEventListener('submit', async (e) => {
// 		e.preventDefault()
// 		disable_btn(add_to_cart['submit-btn'], true)
// 		let check = true
// 		for (const input of add_to_cart) {
// 			if (!input.value) {
// 				check = false
// 			}
// 		}

// 		if (!check) {
// 			M.toast({
// 				html: 'Query parameters missing'
// 			})
// 			disable_btn(add_to_cart['submit-btn'], false)
// 			return
// 		}

// 		const response = await post(add_to_cart)
		
// 		if (!response.status) {
// 			for (const key in response.data) {
// 				M.toast({
// 					html: `<p>${ response.data[key][0] }</p><a href="${ appUrl('cart') }" class="btn-flat toast-action">View Cart</a>`
// 				})
// 			}
// 			disable_btn(add_to_cart['submit-btn'], false)
// 			return
// 		}

// 		M.toast({
// 			html: `<span>${ response.message }</span><a href="${ appUrl('cart') }" class="btn-flat toast-action">View Cart</a>`
// 		});
// 		disable_btn(add_to_cart['submit-btn'], false)
// 		// const modalInstance = M.Modal.init(document.querySelector('#configure-domain-name'))
// 		// modalInstance.close()
// 		document.querySelector('#configure-domain-name').classList.remove('active')
// 	})
// })

// // document.querySelector('[data-target="term-length"]').addEventListener('click', async (e) => {
// // 	e.preventDefault()
// // 	const btn = document.querySelector('[data-target="term-length"]')

// // 	// const instance = M.Dropdown.getInstance(btn)
// // 	// instance.destroy()

// // 	LoadFlatBtn(btn, true)
// // 	// btn.classList.add('disabled')

// // 	if (multi_year_prices == undefined) { // there is no data in the multi year prices variable
// // 		const response = await get(apiUrl(`ihost/domain/multi-year-pricing?website_name=${ document.forms['configure-domain-name']['domain_name'].value }&region=${ document.forms['configure-domain-name']['locale'].value }`))

// // 		multi_year_prices = {
// // 			domain: response.data.domain_name,
// // 			prices: response.data.prices
// // 		}
// // 	}

// // 	if (document.forms['configure-domain-name']['domain_name'].value != multi_year_prices.domain) { // the domain name in multi year pricing doesn't match with the domain name used
// // 		const response = await get(apiUrl(`ihost/domain/multi-year-pricing?website_name=${ document.forms['configure-domain-name']['domain_name'].value }&region=${ document.forms['configure-domain-name']['locale'].value }`))

// // 		multi_year_prices = {
// // 			domain: response.data.domain_name,
// // 			prices: response.data.prices
// // 		}
// // 	}

	
// // 	LoadFlatBtn(btn, false)
// // 	// btn.classList.remove('disabled')

// // 	// instance.open()
// // })

// const render_gyaan = (domain) => {
// 	for (const key in gyaan) {
// 		if (Object.hasOwnProperty.call(gyaan, key)) {
// 			if (domain.extension == key) {
// 				document.querySelector('[data-id="gyaan-container"]').innerHTML = `<div class="divider" style="margin: 36px 0"></div>
// 				<p class="small-text">
// 					<span class="semi-bold primary-text">${ key } (${ gyaan[key]['short'] })</span>
// 					<br>
// 					<span>${ gyaan[key].description }</span>
// 				</p>`
// 				gyaan_boolean = true
// 				return
// 			} else {
// 				gyaan_boolean = false
// 				document.querySelector('[data-id="gyaan-container"]').innerHTML = ''
// 			}
// 		}
// 	}
// }

// const currency_symbol = (currency_iso_3) => {
// 	switch (currency_iso_3) {
// 		case 'usd': return '$'
// 		case 'inr': return '₹'
// 		default: return '$'
// 	}
// }

// const LoadFlatBtn = (btn, btnState) => {
// 	if (btnState === true) {
// 		btn.classList.add('disabled')
// 		btn.innerHTML += '<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
// 	} else {
// 		btn.classList.remove('disabled')
// 		btn.removeChild(btn.lastElementChild)
// 	}
// }

// const RenderMultiYearPrices = (currency, prices) => {
// 	document.querySelector('[data-id="domain-price-table"] tbody').innerHTML = ''

// 	prices.forEach((item, index) => {
// 		document.querySelector('[data-id="domain-price-table"] tbody').innerHTML += `<tr>
// 			<td>
// 				<label>
// 					<input
// 						type="radio"
// 						name="term-length"
// 						class="with-gap"
// 						data-price="${ item.unit_amount }"
// 						data-selector="registration-year"
// 						${ (index == 0) ? 'checked' : '' }
// 					/>
// 					<span>
// 						${ item.duration }
// 					</span>
// 				</label>
// 			</td>
// 			<td>
// 				${ currency } ${ item.unit_amount }/Yr
// 			</td>
// 		</tr>`
// 	})
// }