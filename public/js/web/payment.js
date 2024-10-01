const form = document.forms['payment-form']
const stripe = Stripe("pk_test_Sy5JKtwJ933T2spsSIR8oamQ006wFWia2A");

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

document.addEventListener('DOMContentLoaded', async () => {
	const fetch_address = await get(appUrl('accounts/fetch-address'));

	if (!fetch_address.status) {
		console.error(fetch_address)
		return
	}

	form['card_email'].value = fetch_address.data.email
	form['card_name'].value = fetch_address.data.customer_name
	M.updateTextFields()
})

form.addEventListener('submit', async (e) => {
	e.preventDefault()

	disableBtn(form['submit-btn'])
	
	// creating an incoice
	const invoice = await create_invoice_function()
	
	// confirming the payment
	const confirmPayment = await confirm_payment_function(invoice)

	if (confirmPayment.error) {
		document.querySelector('[data-id="error-wrapper"]').classList.remove('hide')
		return
	}

	// delivering the cart items
	const deliverProducts = await deliver_products_function(invoice)

	activeBtn(form['submit-btn'])

	if (!deliverProducts.status) {
		document.querySelector('[data-id="error-wrapper"]').classList.remove('hide')
	}

	// redirect to payment success screen
	
})

const activeBtn = (button) => {
	button.classList.remove('disabled')
	button.removeChild(button.firstElementChild)
}

const disableBtn = (button) => {
	button.classList.add('disabled')

	button.innerHTML += '<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
}

// function for creating an invoice
const create_invoice_function = async () => {
	const response = await get(appUrl("checkout/create-invoice"));
	
	if (!response.status) {
		for (const key in response.message) {
			M.toast({
				html: `<p>${response.message[key][0]}</p>`,
			});
		}
		return;
	}

	return response.data
}

// function for confirming the payment
const confirm_payment_function = async (invoice) => {
	const response = await stripe.confirmCardPayment(
		invoice.clientSecret,
		{
			payment_method: {
				card: paymentElement,
				billing_details: {
					name: invoice.customer.name,
					email: invoice.customer.email,
					phone: invoice.customer.phone,
					address: {
						line1: invoice.billingAddress.line1,
						city: invoice.billingAddress.city,
						state: invoice.billingAddress.state,
						postal_code: invoice.billingAddress.postal_code,
						country: invoice.billingAddress.country
					},
				},
			},
		}
	)

	return response
}

// function for delivering the cart items
const deliver_products_function = async (invoice) => {
	const response = await get(appUrl('checkout/deliver-products?invoiceId=' + invoice.invoiceId))
	
	return response
}