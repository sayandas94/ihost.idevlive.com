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

	DomainSuggestionRender(domain_suggestion.data, currency_symbol, true)

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

	const ReadMore = e.target.closest('.features-btn')
	if (ReadMore) {
		e.preventDefault()
		const id = ReadMore.getAttribute('href')
		document.querySelectorAll('.content').forEach(element => {
			element.classList.remove('active')
		})
		document.querySelector(id).classList.add('active')
	}
})

document.addEventListener('DOMContentLoaded', async () => {
	const region = document.querySelector('#DomainSearchForm')['locale'].value
	const popular_domain_prices = await get(apiUrl(`ihost/domain/popular-domain-prices?region=${ region }`))

	PopularDomainRender(popular_domain_prices)
})