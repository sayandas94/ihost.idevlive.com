const gyaan = {
	'.com' : {
		'short' : 'Commercial',
		'description' : 'Though originally intended for commercial entities, .com has become the universal TLD for all types of websites. It\'s the most recognized and trusted extension globally, making it a strong choice for any website seeking broad reach.',
	},

	'.org' : {
		'short' : 'Organization',
		'description' : 'Traditionally associated with non-profit organizations, educational institutions, and charities, .org still holds that connotation. It conveys legitimacy and trustworthiness for websites with a non-commercial purpose.',
	},

	'.net' : {
		'short' : 'Network',
		'description' : 'Initially intended for network-related businesses like internet service providers or web hosting companies, .net is now used for a wider range of websites.',
	},

	'.info' : {
		'short' : 'Information',
		'description' : 'This generic TLD is suitable for websites that primarily provide informational content. It\'s a straightforward option for websites like news portals, educational resources, or directories.',
	},

	'.biz' : {
		'short' : 'Business',
		'description' : 'Designed specifically for businesses, .biz can be a good alternative to a crowded .com space. It clearly indicates the website\'s commercial nature.',
	},

	'.live' : {
		'short' : 'Short & punchy',
		'description' : 'This TLD is ideal for websites that focus on live experiences, such as streaming services, live broadcasting platforms, or event websites. It conveys action and immediacy.',
	},

	'.tech' : {
		'short' : 'Straightforward',
		'description' : 'This TLD is perfect for technology-related businesses, startups, bloggers, or anyone in the tech space. It\'s clear, concise, and instantly communicates your website\'s focus.',
	},

	'.ai' : {
		'short' : 'Cutting-edge',
		'description' : 'This TLD is well-suited for websites related to artificial intelligence, machine learning, or research in these fields. It signifies innovation and cutting-edge technology.',
	},

	'.io' : {
		'short' : 'Modern & tech-savvy',
		'description' : 'This TLD has become popular among tech startups and companies due to its association with Silicon Valley, where ".io" was commonly used by early tech ventures. It projects a modern and tech-savvy image.',
	},

	'.xyz' : {
		'short' : 'Flexible',
		'description' : 'This TLD is a more generic option. It can be used for a wider variety of websites and is a good choice if your desired domain name isn\'t available with a more specific TLD. It can also be used creatively to represent "outside the box" thinking.'
	}
}
document.addEventListener('click', (e) => {
	const read_more_feature = e.target.closest('[data-id="read_more_feature"]')
	if (read_more_feature) {
		e.preventDefault()
		const id = read_more_feature.getAttribute('href')
		document.querySelector(id).classList.add('active')
	}

	const features_btn = e.target.closest('.features-btn')
	if (features_btn) {
		e.preventDefault()
		const id = features_btn.getAttribute('href')
		document.querySelectorAll('.content').forEach(element => {
			element.classList.remove('active')
		})
		document.querySelector(id).classList.add('active')
	}

	const close_feature = e.target.closest('[data-id="close_feature"]')
	if (close_feature) {
		e.preventDefault()
		const id = close_feature.getAttribute('href')
		document.querySelector(id).classList.remove('active')
	}

	const close_popup = e.target.closest('[data-id="close-popup"]')
	if (close_popup) {
		e.preventDefault()
		const id = close_popup.getAttribute('href')
		document.querySelector(id).classList.remove('active')
	}

	const next_tld = e.target.closest('#next-tld')
	if (next_tld) {
		e.preventDefault()
		scroll_position = document.querySelector('.slider-wrapper').children[0].offsetWidth + 24
		document.querySelector('.slider-wrapper').scrollLeft += scroll_position
	}

	const back_tld = e.target.closest('#back-tld')
	if (back_tld) {
		e.preventDefault()
		scroll_position = document.querySelector('.slider-wrapper').children[0].offsetWidth + 24
		document.querySelector('.slider-wrapper').scrollLeft -= scroll_position
	}
})

document.addEventListener('DOMContentLoaded', (e) => {
	const form = document.forms['domain-search-form']

	form.addEventListener('submit', async (e) => {
		e.preventDefault()

		const domain = form['domain_name'].value
		if (!domain) {
			M.toast({html : '<p>The Domain name is required.</p>'})
			return
		}
	
		form['submit-btn'].classList.add('disabled')
	
		form['submit-btn'].innerHTML = '<div class="preloader-wrapper tiny active" style="position: absolute; top: 10px; left: 10px"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
	
		const response = await post(form)
		
		form['submit-btn'].classList.remove('disabled')
		form['submit-btn'].innerHTML = `<img src="${ appUrl('images/icons/search.svg') }" alt="">`

		if (!response.status) {
			for (const key in response.data.error) {
				M.toast({
					html: `<p>${ response.data.error[key][0] }</p>`
				})
			}
			return
		}
	
		arrangeInformation(response.data)
		
		// get the loading spinner into the domain suggestion table
		document.querySelector('[data-id="domain-suggestion-table"] tbody').innerHTML = `<tr style="border-bottom: none"><td><div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div></td></tr>`

		document.forms['configure-domain-name']['price_id'].value = response.data.price_id
		document.forms['configure-domain-name']['domain_name'].value = response.data.name
	
		document.querySelector('#configure-domain-name').classList.add('active')

		if (gyaan_boolean) {
			suggestions_count = 3
		} else {
			suggestions_count = 5
		}

		const domain_suggestions = await get(apiUrl(`ihost/domain/similar-domains?domain=${ domain }&currency=${ response.data.currency }&suggestions_count=${ suggestions_count }`))

		if (!domain_suggestions.status) {
			return
		}

		document.querySelector('[data-id="domain-suggestion-table"] tbody').innerHTML = ''

		domain_suggestions.data.forEach(suggestion => {
			document.querySelector('[data-id="domain-suggestion-table"] tbody').innerHTML += `<tr>
				<td style="padding-left: 0">
					<span class="medium">${ suggestion.domainName.toLowerCase() }</span>
					<br>
					<span class="small-text grey-text medium">${ currency_symbol(domain.currency) } ${ suggestion.price } for first year</span>
				</td>
				<td class="right-align">
					<a href="#!" class="btn-flat primary" style="font-weight: 500">Add to cart</a>
				</td>
			</tr>`
		})
	})

	const arrangeInformation = (domain) => {
		// get the currency symbol and display it in the required places
		document.querySelectorAll('[data-id="currency"]').forEach(element => {
			element.innerText = currency_symbol(domain.currency)
		})

		document.querySelector('[data-id="domain-name"]').innerHTML = `${ domain.name }`

		if (!domain.discount_info) {
			domain_price = (domain.unit_amount / 100).toFixed(2)
		} else {
			domain_price = ((domain.unit_amount - domain.discount_info.amount_off) / 100).toFixed(2)
		}

		document.querySelectorAll('[data-id="domain-price"]').forEach(element => {
			element.innerText = domain_price
		})

		document.querySelector('[data-id="renewal-price"]').innerText = (domain.unit_amount / 100).toFixed(2)

		// calling the render_gyaan function which displays the tld gyaan based on the domain name
		render_gyaan(domain)
	}

	const add_to_cart = document.forms['configure-domain-name']
	add_to_cart.addEventListener('submit', async (e) => {
		e.preventDefault()
		disable_btn(add_to_cart['submit-btn'], true)
		let check = true
		for (const input of add_to_cart) {
			if (!input.value) {
				check = false
			}
		}

		if (!check) {
			M.toast({
				html: 'Query parameters missing'
			})
			disable_btn(add_to_cart['submit-btn'], false)
			return
		}

		const response = await post(add_to_cart)
		
		if (!response.status) {
			for (const key in response.data) {
				M.toast({
					html: `<p>${ response.data[key][0] }</p><a href="${ appUrl('cart') }" class="btn-flat toast-action">View Cart</a>`
				})
			}
			disable_btn(add_to_cart['submit-btn'], false)
			return
		}

		M.toast({
			html: `<span>${ response.message }</span><a href="${ appUrl('cart') }" class="btn-flat toast-action">View Cart</a>`
		});
		disable_btn(add_to_cart['submit-btn'], false)
		// const modalInstance = M.Modal.init(document.querySelector('#configure-domain-name'))
		// modalInstance.close()
		document.querySelector('#configure-domain-name').classList.remove('active')
	})
})

const render_gyaan = (domain) => {
	for (const key in gyaan) {
		if (Object.hasOwnProperty.call(gyaan, key)) {
			if (domain.extension == key) {
				document.querySelector('[data-id="gyaan-container"]').innerHTML = `<div class="divider" style="margin: 36px 0"></div>
				<p class="small-text">
					<span class="semi-bold primary-text">${ key } (${ gyaan[key]['short'] })</span>
					<br>
					<span>${ gyaan[key].description }</span>
				</p>`
				gyaan_boolean = true
				return
			} else {
				gyaan_boolean = false
				document.querySelector('[data-id="gyaan-container"]').innerHTML = ''
			}
		}
	}
}

const currency_symbol = (currency_iso_3) => {
	switch (currency_iso_3) {
		case 'usd': return '$'
		case 'inr': return '₹'
		default: return '$'
	}
}