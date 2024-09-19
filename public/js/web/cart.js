document.addEventListener('DOMContentLoaded', () => {
	// M.Dropdown.init(document.querySelectorAll('[data-target="hosting-duration"]'), {
	// 	onOpenStart: async function () {
	// 		LoadingBtn(this.el, true)
	// 		const response = await get(apiUrl(`ihost/hosting/multi-year-pricing?product_id=${ this.el.dataset.product }&region=${ this.el.dataset.region }`))
	// 		console.log(response)
	// 		LoadingBtn(this.el, false)
	// 	}
	// })
})

document.addEventListener('click', async (e) => {
	const deleteItem = e.target.closest('.cart-delete-btn')
	if (deleteItem) {
		e.preventDefault()

		const url = deleteItem.href + '/' + deleteItem.dataset.id

		const response = await get(url)

		if (!response.status) {
			M.toast({
				html: response.message
			})
			return
		}

		window.location = response.data.cart_url
	}

	const ProductDurationDropdown = e.target.closest('.select-duration-btn')
	// const ProductDurationDropdown = e.target.closest('[data-target="hosting-duration"]')
	if (ProductDurationDropdown) {
		e.preventDefault()

		LoadingBtn(ProductDurationDropdown, true)

		const response = await get(apiUrl(`ihost/hosting/multi-year-pricing?product_id=${ ProductDurationDropdown.dataset.product }&region=${ ProductDurationDropdown.dataset.region }`))
		console.log(response)

		if (ProductDurationDropdown.dataset.target == 'domain-duration') {

			DropdownRender(document.querySelector('#domain-duration'), {
				index: ProductDurationDropdown.dataset.index,
				prices: response.data,
				domain: ProductDurationDropdown.dataset.domain
			}) // Renders the hosting dropdown

		} else if (ProductDurationDropdown.dataset.target == 'hosting-duration') {

			DropdownRender(document.querySelector('#hosting-duration'), {
				index: ProductDurationDropdown.dataset.index,
				prices: response.data
			}) // Renders the hosting dropdown

		}

		LoadingBtn(ProductDurationDropdown, false)

		const instance = M.Dropdown.init(ProductDurationDropdown)
		instance.open()
	}

	const set_hosting_duration = e.target.closest('.select_hosting_duration')
	if (set_hosting_duration) {
		e.preventDefault()

		document.querySelector(`#info${ set_hosting_duration.dataset.index }`).innerHTML = '<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'

		document.querySelector(`[data-index="${ set_hosting_duration.dataset.index }"]`).innerHTML = `<i class="material-icons right">keyboard_arrow_down</i>${ set_hosting_duration.innerText }`
		
		const form = document.querySelector('#update-cart')
		form['index'].value = set_hosting_duration.dataset.index
		form['price_id'].value = set_hosting_duration.dataset.price

		if (set_hosting_duration.dataset.domain != 'undefined') {
			const input = document.createElement('input')
			input.setAttribute('name', 'domain_name')
			input.setAttribute('value', set_hosting_duration.dataset.domain)

			form.appendChild(input)
		}

		const response = await post(form)
		console.log(response)

		if (response) {
			location.reload()
			return
		}

		M.toast({
			html: '<p>Can\'t update the item right now.</p>'
		})
	}
})

const LoadingBtn = (button, status) => {
	if (status === true) {
		button.classList.add('disabled')
		button.innerHTML += '<div class="preloader-wrapper tiny active" style="position: absolute; top: calc(50% - 8px); left: calc(50% - 8px)"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
	} else {
		button.classList.remove('disabled')
		button.removeChild(document.querySelector('.preloader-wrapper'))
	}
}

const DropdownRender = (elem, data) => {
	elem.innerHTML = ''
	
	if (elem.getAttribute('id') == 'domain-duration') {
		data.prices.forEach(item => {
			elem.innerHTML += `<li><a href="#!" class="select_hosting_duration" data-price="${ item.price_id }" data-index="${ data.index }" data-domain="${ data.domain }">${ item.duration_text }</a></li>`
		})
	}

	if (elem.getAttribute('id') == 'hosting-duration') {
		data.prices.forEach(item => {
			elem.innerHTML += `<li><a href="#!" class="select_hosting_duration" data-price="${ item.price_id }" data-index="${ data.index }">${ item.duration_text }</a></li>`
		})
	}
}

const DeleteItem = (id) => {

}