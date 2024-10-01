import {
	HostingRender as HostingRender,
	PaymentMethodRender as PaymentMethodRender,
	HostingPlans as HostingPlans,
	PriceIdRender as PriceIdRender,
	LoadingBtn as LoadingBtn,
	PriceUpdate as PriceUpdate,
	BillingAddressRender as BillingAddressRender,
	AmountRender as AmountRender
} from './functions/hosting.function.js';

document.addEventListener('DOMContentLoaded', async () => {
	document.querySelectorAll('.nav-btn').forEach(element => {
		element.classList.remove('active')
	})
	document.querySelector('[data-id="hosting"]').classList.add('active')
})

document.onreadystatechange = async () => {
	if (document.readyState == 'complete') {
		const profile = await get(appUrl('accounts/profile'));
		user_profile(profile)

		const userHosting = await get(appUrl('accounts/active-subscriptions?product=hosting'))

		if (userHosting.data.length != 0) HostingRender(userHosting.data)
		// if (userHosting.data.length != 0) hosting_render(userHosting.data)
		document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
	}
}

document.addEventListener('click', async (e) => {
	const OpenSetupPanel = e.target.closest('[href*="#setup-hosting-popup"]')
	if (OpenSetupPanel) {
		e.preventDefault()

		const input = document.createElement('input')
		input.type = 'hidden'
		input.name = 'hosting_id'
		input.value = OpenSetupPanel.dataset.hostingid

		document.forms['setup-hosting-form'].appendChild(input)

		const id = OpenSetupPanel.getAttribute('href')
		document.querySelector(id).classList.add('active')
	}

	const close_setup_panel = e.target.closest('[href*="#close-hosting-popup"]')
	if (close_setup_panel) {
		e.preventDefault()
		document.querySelector('#setup-hosting-popup').classList.remove('active')
	}

	const domain_select = e.target.closest('.domain-select')
	if (domain_select) {
		if (domain_select.value == 'ihost') {
			document.querySelector('#ihost-domain').style.visibility = 'visible'
			document.querySelector('#outside-domain').style.visibility = 'hidden'
		} else {
			document.querySelector('#ihost-domain').style.visibility = 'hidden'
			document.querySelector('#outside-domain').style.visibility = 'visible'
		}
	}

	const breadcrumb = e.target.closest('.breadcrumb')
	if (breadcrumb) {
		e.preventDefault()
		const id = breadcrumb.getAttribute('href')

		document.querySelectorAll('.form-part').forEach(element => {
			element.classList.remove('active')
		})
		document.querySelector(id).classList.add('active')
	}

	const HostingDropdown = e.target.closest('[data-id="hosting-dropdown"]')
	if (HostingDropdown) {

		LoadingBtn(HostingDropdown, true)

		const HostingDetails = await get(appUrl(`hosting/details?id=${ HostingDropdown.dataset.hosting }`))
		console.log(HostingDetails)

		if (!HostingDetails.status) {
			M.toast({
				html: HostingDetails.message
			})
			LoadingBtn(HostingDropdown, false)
			return
		}

		const items = [
			{
				name: 'Renew',
				url: '#renew-hosting'
			},
			{
				name: 'Upgrade Plan',
				url: '#!'
			},
			{
				name: 'Resource Usage',
				url: '#!'
			},
			{
				name: 'Plan Details',
				url: '#!'
			}
		]

		document.querySelector('#hosting-dropdown').innerHTML = ''

		if (!HostingDetails.data.status) {
			document.querySelector('#hosting-dropdown').innerHTML += `<li><a href="#setup-hosting-popup" data-price="${ HostingDetails.data.price_id }">Setup</a></li>`
			// console.log('setup required')
		}

		items.forEach(item => {
			// console.log(item.name)

			document.querySelector('#hosting-dropdown').innerHTML += `<li><a href="${ item.url }" data-price="${ HostingDetails.data.price_id }">${ item.name }</a></li>`
		})

		const instance = M.Dropdown.init(HostingDropdown)
		instance.options = {
			constrainWidth: false,
			alignment: 'right',
			coverTrigger: true,
			closeOnClick: true,
			onCloseStart: function () {
				instance.destroy()
			}
		}
		instance.open()
		LoadingBtn(HostingDropdown, false)
	}

	const RenewHosting = e.target.closest('[href*="#renew-hosting"]')
	if (RenewHosting) {
		e.preventDefault()

		// set the hosting id in the form
		document.querySelector('#RenewHostingForm')['hosting_id'].value = RenewHosting.dataset.hosting

		// Get the price details
		const PriceInfo = await get(apiUrl(`ihost/hosting/get-price-info?price_id=${ RenewHosting.dataset.price }`))
		if (!PriceInfo.status) {
			M.toast({
				html: `Can't fetch the price details for renewal. Contact the support team`
			})
			return
		}

		const ProductInfo = await get(apiUrl(`ihost/hosting/choose-plan?product_id=${ PriceInfo.data.product_id }&region=${ PriceInfo.data.region }`))

		if (!ProductInfo.status) {
			M.toast({
				html: `Can't fetch the price details for renewal. Contact the support team`
			})
		}

		const PriceData = {
			prices: ProductInfo.data.price_info,
			current: RenewHosting.dataset.price
		}

		PriceIdRender(PriceData)
		PriceUpdate(PriceInfo.data)

		const id = RenewHosting.getAttribute('href')
		const instance = M.Modal.getInstance(document.querySelector(id))
		instance.open()
	}

	const ChangeHostingDuration = e.target.closest('[data-id="hosting-term"] .with-gap')
	if (ChangeHostingDuration) {
		document.querySelector('[data-id="PricePanel"] .loader-container').classList.remove('hide')
		const PriceInfo = await get(apiUrl(`ihost/hosting/get-price-info?price_id=${ ChangeHostingDuration.value }`))

		PriceUpdate(PriceInfo.data)
		document.querySelector('[data-id="PricePanel"] .loader-container').classList.add('hide')
	}

	const SelectPaymentMethod = e.target.closest('[href*="#SelectPaymentMethod"]')
	if (SelectPaymentMethod) {
		e.preventDefault()
		const PaymentId = SelectPaymentMethod.dataset.value
		const CardNumber = SelectPaymentMethod.dataset.last4
		document.forms['RenewHostingForm']['payment_method'].value = PaymentId
		document.querySelector('[data-id="last4"]').innerText = CardNumber

		// document.querySelector('[data-id="last4"]').innerHTML = PaymentMethod.card.last4
	}
})

document.forms['setup-hosting-form'].addEventListener('submit', async (e) => {
	e.preventDefault()
	const form = document.forms['setup-hosting-form']

	if (document.querySelector('#part-one').classList.contains('active')) {
		let check = true

		if (form['domain_select'].value == 'ihost') {
			if (!form['ihost_domain_name'].value) {
				check = false
				form['ihost_domain_name'].classList.add('invalid')
			} else {
				form['ihost_domain_name'].classList.remove('invalid')
			}
		} else {
			if (form['domain_select'].value == 'third-party') {
				if (!form['outside_domain_name'].value) {
					check = false
					form['outside_domain_name'].classList.add('invalid')
				} else {
					form['outside_domain_name'].classList.remove('invalid')
				}
			}
		}

		if (!check) {
			M.toast({
				html: '<p>Please fill the required field.</p>'
			})
			return
		}

		document.querySelectorAll('.form-part').forEach(element => {
			element.classList.remove('active')
		})
		document.querySelector('#part-two').classList.add('active')
		
		return
	}

	if (document.querySelector('#part-two').classList.contains('active')) {
		if (!form['datacenter'].value) {
			M.toast({
				html: '<p>Select a datacenter first.</p>'
			})
			return
		}

		document.querySelectorAll('.form-part').forEach(element => {
			element.classList.remove('active')
		})
		document.querySelector('#part-three').classList.add('active')

		return
	}

	if (document.querySelector('#part-three').classList.contains('active')) {
		if (!form['wordpress'].value) {
			M.toast({
				html: '<p>Select if you want to install Wordpress or not</p>'
			})
			return
		}

		// Submit the form here
		const response = await post(form)
		console.log(response)
	}
})

document.querySelector('#RenewHostingForm').addEventListener('submit', async (e) => {
	e.preventDefault()
	let check = true
	const form = document.querySelector('#RenewHostingForm')

	if (document.querySelector('.form-part#PartOne').classList.contains('active')) {
		LoadingBtn(form['checkout-btn'], true)
		
		if (!form['hosting_id'].value || !form['term_length'].value) {
			check = false
		}

		if (!check) {
			M.toast({
				html: '<p>Parameters Missing.</p>'
			})
		}

		const [BillingAddress, PaymentMethods] = await Promise.all([
			get(appUrl('accounts/fetch-address')),
			get(appUrl('accounts/payment-methods'))
		])


		if (!BillingAddress.status) {
			M.toast({
				html: BillingAddress.message
			})
		}

		const TaxRate = await get(apiUrl(`accounts/get-taxes?country=${ BillingAddress.data.country }&postal_code=${ BillingAddress.data.postal_code }`))

		BillingAddressRender(BillingAddress.data)

		PaymentMethodRender(PaymentMethods.data)

		const PriceInfo = await get(apiUrl(`ihost/hosting/get-price-info?price_id=${ form['term_length'].value }`))
		const PriceData = {
			UnitAmount: PriceInfo.data.unit_amount,
			Currency: TaxRate.data.currency,
			TaxId: TaxRate.data.tax_id,
			TaxRate: TaxRate.data.rate
		}

		if (TaxRate.data.tax_id != undefined) {
			document.forms['RenewHostingForm']['tax_id'].value = TaxRate.data.tax_id
		}

		AmountRender(PriceData)

		LoadingBtn(form['checkout-btn'], false)

		document.querySelector('.form-part#PartOne').classList.remove('active')
		document.querySelector('.form-part#PartTwo').classList.add('active')
		return
	}

	if (document.querySelector('.form-part#PartTwo').classList.contains('active')) {
		LoadingBtn(form['submit-btn'], true)
		const response = await post(form)
		LoadingBtn(form['submit-btn'], false)

		if (!response.status) {
			M.toast({
				html: `<p>Can\'t renew the Hosting Subscription. Please contact the support team</p>`
			})
		}

		const instance = M.Modal.getInstance(document.querySelector('#renew-hosting'))
		instance.close()
	}

})

const currency_selector = (currency) => {
	switch (currency) {
		case 'usd': return '$'
		case 'inr': return '₹'
		default: return '$'
	}
}

const per_month = (price) => {
	// if (price.discount_type == 'percent') return (((price.unit_amount * ((100 - price.discount_info.percent_off) / 100)) / 100) / price.duration).toFixed(2);

	// if (price.discount_type == 'amount') return null;

	if (price.discount_type == null) return ((price.unit_amount / price.duration) / 100).toFixed(2)
}

// document.addEventListener('click', (e) => {
// 	const popup_trigger = e.target.closest('.popup-trigger')
// 	if (popup_trigger) {
// 		e.preventDefault()
// 		const id = popup_trigger.getAttribute('href')
// 		document.querySelector(id).classList.add('active')
// 	}

// 	const close_popup = e.target.closest('[data-id="close-popup"]')
// 	if (close_popup) {
// 		e.preventDefault()
// 		const id = close_popup.getAttribute('href')
// 		document.querySelector(id).classList.remove('active')
// 	}

// 	const select_datacenter = e.target.closest('[href*="select-datacenter"]')
// 	if (select_datacenter) {
// 		e.preventDefault()
// 		const input = document.createElement('input')
// 		input.type = 'hidden'
// 		input.name = 'datacenter'
// 		input.value = select_datacenter.dataset.value
// 		document.forms['setup-hosting-form'].append(input)

// 		document.querySelector('.form-part#part-two').classList.remove('active')
// 		document.querySelector('.form-part#part-three').classList.add('active')
// 	}

// 	const check_settings = e.target.closest('[href*="check-settings"]')
// 	if (check_settings) {
// 		e.preventDefault()

// 		if (!document.forms['setup-hosting-form']['wordpress'].value) {
// 			M.toast({
// 				html: '<p>Please choose if you want wordpress or not.</p>'
// 			})
// 			return
// 		}

// 		document.querySelector('.form-part#part-three').classList.remove('active')
// 		document.querySelector('.form-part#part-four').classList.add('active')
// 	}

// 	const back = e.target.closest('.back')
// 	if (back) {
// 		e.preventDefault()
// 		document.querySelectorAll('.form-part').forEach(element => {
// 			element.classList.remove('active')
// 		})
// 		document.querySelector(back.getAttribute('href')).classList.add('active')
// 	}
// })

// document.forms['setup-hosting-form'].addEventListener('submit', async (e) => {
// 	e.preventDefault()
// 	const response = await post(document.forms['setup-hosting-form'])

// 	console.log(response)
// })