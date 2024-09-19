import {
	DomainSuggestionRender as DomainSuggestionRender,
	ValidateInputs as ValidateInputs,
	DomainFormLoader as DomainFormLoader,
	LoadingBtn as LoadingBtn,
	UnavailableDomainRender as UnavailableDomainRender,
	AvailableDomainRender as AvailableDomainRender,
	DomainPriceWrapper as DomainPriceWrapper,
	CurrencySymbol as CurrencySymbol,
	// UpdatePrices as UpdatePrices,
	PopularDomainRender as PopularDomainRender,
	DropdownRender as DropdownRender
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
		console.error(domain_result)
		for (const key in domain_result.data.error) {
			M.toast({
				html: `<p>${ domain_result.data.error[key][0] }</p>`
			})
		}
		DomainFormLoader(form['submit-btn'], false)
		return
	}

	const currency_symbol = CurrencySymbol(domain_result.data.currency)
	
	DomainSuggestionRender(null, null, false)

	if (domain_result.data.status_code == 200) { // it means the domain is available for registration
		document.querySelector('#AddToCart')['submit-btn'].classList.add('disabled') // disable the button so that the user doesn't click before the prices load up
		document.querySelector('[data-id="popup.true"]').classList.add('active')

		document.querySelector('#AddToCart')['domain_name'].value = domain_result.data.name // add the domain name to add to cart form
		document.querySelector('#AddToCart')['price_id'].value = domain_result.data.price_id // add the price id
		document.querySelector('.select-duration-btn').dataset.domain = domain_result.data.name // add the domain to the select duration dropdown trigger
		document.querySelector('.select-duration-btn').dataset.product = domain_result.data.product_id // add the price id to the select duration dropdown trigger

		AvailableDomainRender(domain_result.data, false)
		
		DomainPriceWrapper(domain_result.data, false)

		document.querySelector('#AddToCart')['submit-btn'].classList.remove('disabled') // enable the button so that the user can add the domain to the cart
	} else { // it means the domain is already registered
		document.querySelector('[data-id="popup.false"]').classList.add('active')

		UnavailableDomainRender(domain_result.data)
	}

	const suggestions_count = 5
	const domain_suggestion = await get(apiUrl(`ihost/domain/similar-domains?domain=${ form['domain_name'].value }&currency=${ domain_result.data.currency }&suggestions_count=${ suggestions_count }`))

	DomainSuggestionRender(domain_suggestion.data, currency_symbol, true)

	DomainFormLoader(form['submit-btn'], false)
	
})

document.querySelector('#AddToCart').addEventListener('submit', async (e) => {
	e.preventDefault()
	const form = document.querySelector('#AddToCart')

	LoadingBtn(form['submit-btn'], true)

	const add_to_cart = await post(form)
	console.log(add_to_cart)

	if (!add_to_cart.status) {
		M.toast({
			html: `<p>${ add_to_cart.message }</p>`
		})
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
	const TermLength = e.target.closest('[data-id="term-length"]')
	if (TermLength) {
		document.querySelector('.select-duration-btn').innerHTML = `<i class="material-icons right">keyboard_arrow_down</i>${ TermLength.innerText }`
		DomainPriceWrapper(null, true)
		AvailableDomainRender(null, true)

		let price_id = TermLength.dataset.price

		if (!TermLength.dataset.price) {
			const response = await get(apiUrl(`ihost/domain/create-multi-year-pricing?product_id=${ TermLength.dataset.product }&region=${ TermLength.dataset.region }&duration_text=${ TermLength.dataset.duration }&domain=${ TermLength.dataset.domain }`))

			if (!response.status) {
				M.toast({
					html: 'Cannot find the pricing of this domain.'
				})
				return
			}

			price_id = response.data.price_id
		}

		const PriceInfo = await get(apiUrl(`ihost/domain/mutli-year-price-info?price_id=${ price_id }`))
		
		if (!PriceInfo.status) {
			M.toast({
				html: PriceInfo.message
			})
			return
		}

		document.querySelector('#AddToCart')['price_id'].value = PriceInfo.data.price_id // add the price id

		AvailableDomainRender(PriceInfo.data, false)
		DomainPriceWrapper(PriceInfo.data, false)
		
	}

	const SelectDurationBtn = e.target.closest('.select-duration-btn')
	if (SelectDurationBtn) {
		e.preventDefault()
		LoadingBtn(SelectDurationBtn, true)

		const response = await get(apiUrl(`ihost/domain/multi-year-pricing?product_id=${ SelectDurationBtn.dataset.product }&region=${ SelectDurationBtn.dataset.region }`))

		const data = {
			parent: {
				product_id: SelectDurationBtn.dataset.product,
				region: SelectDurationBtn.dataset.region,
				domain: SelectDurationBtn.dataset.domain
			},
			response: response
		}

		DropdownRender(document.querySelector('#domain-duration'), data)

		const instance = M.Dropdown.init(SelectDurationBtn)
		instance.destroy()
		instance.open()

		LoadingBtn(SelectDurationBtn, false)
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

	const ReadMore = e.target.closest('.features-btn')
	if (ReadMore) {
		e.preventDefault()
		const id = ReadMore.getAttribute('href')
		document.querySelectorAll('.content').forEach(element => {
			element.classList.remove('active')
		})
		document.querySelector(id).classList.add('active')
	}

	const SuggestionAdd = e.target.closest('[data-id="domain.suggestion.add"]')
	if (SuggestionAdd) {
		e.preventDefault()
		const domain = SuggestionAdd.dataset.domain.toLowerCase()
		const form = document.querySelector('#DomainSearchForm')
		form['domain_name'].value = domain

		document.querySelectorAll('[data-id="domain.suggestion.add"]').forEach(item => {
			item.classList.add('disabled')
		})

		SuggestionAdd.classList.remove('disabled')
		LoadingBtn(SuggestionAdd, true)

		const domain_result = await post(form)
		if (!domain_result.status) {
			console.error(domain_result)
			for (const key in domain_result.data.error) {
				M.toast({
					html: `<p>${ domain_result.data.error[key][0] }</p>`
				})
			}
			DomainFormLoader(form['submit-btn'], false)
			return
		}

		const currency_symbol = CurrencySymbol(domain_result.data.currency)
		
		DomainSuggestionRender(null, null, false)

		if (domain_result.data.status_code == 200) { // it means the domain is available for registration
			document.querySelector('#AddToCart')['submit-btn'].classList.add('disabled') // disable the button so that the user doesn't click before the prices load up
			document.querySelector('[data-id="popup.true"]').classList.remove('active')
			document.querySelector('[data-id="popup.false"]').classList.remove('active')
			document.querySelector('[data-id="popup.true"]').classList.add('active')

			document.querySelector('#AddToCart')['domain_name'].value = domain_result.data.name // add the domain name to add to cart form
			document.querySelector('#AddToCart')['price_id'].value = domain_result.data.price_id // add the price id
			document.querySelector('.select-duration-btn').dataset.domain = domain_result.data.name // add the domain to the select duration dropdown trigger
			document.querySelector('.select-duration-btn').dataset.product = domain_result.data.product_id // add the price id to the select duration dropdown trigger

			AvailableDomainRender(domain_result.data, false)
			
			DomainPriceWrapper(domain_result.data, false)

			document.querySelector('#AddToCart')['submit-btn'].classList.remove('disabled') // enable the button so that the user can add the domain to the cart
		} else { // it means the domain is already registered
			document.querySelector('[data-id="popup.true"]').classList.remove('active')
			document.querySelector('[data-id="popup.false"]').classList.remove('active')
			document.querySelector('[data-id="popup.false"]').classList.add('active')

			UnavailableDomainRender(domain_result.data)
		}

		const suggestions_count = 5
		const domain_suggestion = await get(apiUrl(`ihost/domain/similar-domains?domain=${ form['domain_name'].value }&currency=${ domain_result.data.currency }&suggestions_count=${ suggestions_count }`))

		DomainSuggestionRender(domain_suggestion.data, currency_symbol, true)

		DomainFormLoader(form['submit-btn'], false)
	}
})

document.addEventListener('DOMContentLoaded', async () => {
	const region = document.querySelector('#DomainSearchForm')['locale'].value
	const popular_domain_prices = await get(apiUrl(`ihost/domain/popular-domain-prices?region=${ region }`))

	PopularDomainRender(popular_domain_prices)
})