const form = document.forms["checkout-form"]
document.forms["checkout-form"].addEventListener('submit', async (e) => {
	e.preventDefault()

	if (document.querySelector('[data-id="part-one"]').classList.contains('active')) {
		let check = true;
		const inputArray = ['customer_name', 'phone_number', 'email', 'street', 'city', 'state', 'postal_code', 'country']
		for (const input of form) {
			if (inputArray.includes(input.name)) {
				if (!input.value) {
					input.classList.add('invalid')
					check = false
				} else {
					input.classList.remove('invalid')
				}
			}
		}

		if (!check) {
			M.toast({
				html: "<p>Please fill all the required fields.</p>",
			});
			return;
		}

		form.action = appUrl("accounts/update-address");
		const updateAddress = await post(form);

		// if (!updateAddress.status) {
		// 	for (const key in updateAddress.message) {
		// 		M.toast({
		// 			html: `<p>${updateAddress.message[key][0]}</p>`,
		// 		});
		// 	}
		// 	return
		// }
		console.log(form.action)
		console.log('done')
		document.querySelector('[data-id="part-one"]').classList.remove('active')
		document.querySelector('[data-id="part-two"]').classList.add('active')
		return;
	}

	if (document.querySelector('[data-id="part-two"]').classList.contains('active')) {
		console.log('sending information')

		const createInvoice = await get(appUrl("checkout/create-invoice"));
		console.log(createInvoice)
		if (!createInvoice.status) {
			for (const key in createInvoice.message) {
				M.toast({
					html: `<p>${createInvoice.message[key][0]}</p>`,
				});
			}
			return;
		}
		console.log('invoice created')

		const confirmPayment = await stripe.confirmCardPayment(
			createInvoice.data.clientSecret,
			{
				payment_method: {
					card: paymentElement,
					billing_details: {
						name: form["customer_name"].value,
						email: form["email"].value,
						phone: form["phone_number"].value,
						address: {
							line1: form["street"].value,
							city: form["city"].value,
							state: form["state"].value,
							postal_code: form["postal_code"].value,
							country: alphanumeric_country_code(form["country"].value),
						},
					},
				},
			}
		)

		if (confirmPayment.paymentIntent.status !== "succeeded") {
			console.log("Payment failed.")
			return
		}
		console.log('payment success')
		// SEND THE CART INFORMATION TO THE BACKEND TO REGISTER THE PRODUCTS IN THE DATABASE
		const delivery_status = await get(appUrl('checkout/deliver-products?invoiceId=' + createInvoice.data.invoiceId))
		console.log(delivery_status)
		return
		if (!delivery_status.status) {
			M.toast({
				'html' : '<p>Can\'t complete the process. Please contact the support team.</p>'
			})
			return
		}

		window.location = appUrl(delivery_status.data.redirect_url)

	}
})

document.addEventListener('DOMContentLoaded', async () => {
	const fetch_address = await get(appUrl('accounts/fetch-address'));
	if (!fetch_address.status) {
		return
	}

	if (fetch_address.data) {
		show_states(fetch_address.data.country).forEach(state => {
			document.querySelector('#state').innerHTML += `<option value="${ state }">${ state }</option>`
		})

		for (const key in fetch_address.data) {
			if (form[key] != undefined) {
				form[key].value = fetch_address.data[key]
			}
		}
		M.updateTextFields()
		M.FormSelect.init(form['country'])
		M.FormSelect.init(form['state'])
	}
	
	document.querySelector('[data-id="tax-amount"]').innerText = calculate_taxes(fetch_address.data)
	document.querySelector('[data-id="disabled"]').classList.add('hide')
})

const stripe = Stripe("pk_test_Sy5JKtwJ933T2spsSIR8oamQ006wFWia2A");
// const elements = stripe.elements();
// const options = {
// 	style: {
// 		base: {
// 			color: "#252525",
// 			iconColor: "#5059cd",
// 			fontSize: "16px",
// 			family: "Jost, sans-serif",
// 			src: 'url(https://fonts.googleapis.com/css2?family=Jost&display=swap)',
// 			padding: "24px",
// 		},
// 	},
// 	showIcon: true
// };

// let paymentElement = elements.create('card', options)

// var cardElement = elements.getElement("card");
// paymentElement.mount("#card-numbers")

const elements = stripe.elements({
	fonts: [
		{
			cssSrc: 'https://fonts.googleapis.com/css2?family=Jost&display=swap'
		}
	]
})

const paymentElement = elements.create('card', {
	style: {
		base: {
			fontSize: '14.5px',
			fontFamily: 'Jost, sans-serif',
		}
	},
	showIcon: true
})
paymentElement.mount('#card-numbers')

// document.addEventListener('change', (e) => {
// 	const fetch_states = e.target.closest('')
// })

document.querySelector('#country').addEventListener('change', () => {
	const country = document.querySelector('#country').value

	const states = show_states(country)

	const billing_address = {
		country: document.querySelector('#country').value
	}
	document.querySelector('[data-id="tax-amount"]').innerText = calculate_taxes(billing_address)
	
	const instance = M.FormSelect.getInstance(document.querySelector('#state'))
	instance.destroy()
	document.querySelector('#state').innerHTML = ''
	states.forEach(state => {
		document.querySelector('#state').innerHTML += `<option value="${ state }">${ state }</option>`
	})
	M.FormSelect.init(document.querySelector('#state'))
})

const show_states = (country) => {
	switch (country) {
		case 'United States of America':
			return ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming']
		
		case 'India':
			return ['Andaman and Nicobar Islands', 'Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar', 'Chandigarh', 'Chhattisgarh', 'Daman & Diu', 'Delhi NCT', 'Goa', 'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jammu & Kashmir', 'Jharkhand', 'Karnataka', 'Kerala', 'Ladakh', 'Lakshadweep', 'Madhya Pradesh', 'Maharashtra', 'Manipur', 'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha', 'Puducherry', 'Punjab', 'Rajasthan', 'Sikkim', 'Tamil Nadu', 'Telangana', 'Tripura', 'Uttarakhand', 'Uttar Pradesh', 'West Bengal']
		default:
			break;
	}
}

const calculate_taxes = (billing_address) => {
	let tax = null
	const subtotal = document.querySelector('[data-id="subtotal"]').innerText
	if (billing_address.country == 'India') {
		tax = subtotal * 0.18 
	}

	if (billing_address.country == 'United States of America') {
		tax = 0
	}

	return tax
}

const alphanumeric_country_code = (country) => {
	switch (country) {
		case 'United States of America':
			return 'US'

		case 'India':
			return 'IN'
	
		default:
			return null
	}
}