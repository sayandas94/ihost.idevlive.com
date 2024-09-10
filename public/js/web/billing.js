const form = document.forms['checkout-form']

document.addEventListener('DOMContentLoaded', async () => {
	const fetch_address = await get(appUrl('accounts/fetch-address'));

	if (!fetch_address.status) {
		console.error(fetch_address)
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
	} else {
		const profile = await get(appUrl('accounts/profile'));
		form['email'].value = profile.data.email
		form['customer_name'].value = profile.data.name
		M.updateTextFields()
	}

	document.querySelector('[data-id="pay-now-btn"]').classList.remove('disabled')
	document.querySelector('[data-id="disabled"]').classList.add('hide')
})

// code for checking the address form and moving to the payment page
document.querySelector('[data-id="pay-now-btn"]').addEventListener('click', async (e) => {
	e.preventDefault()
	disable_primary_btn(document.querySelector('[data-id="pay-now-btn"]'), true)
	
	let check = true
	const inputs = ['customer_name', 'email', 'phone_number', 'country', 'street', 'city', 'state', 'postal_code']

	for (const input of inputs) {
		if (input == 'country' || input == 'state') {
			const instance = M.FormSelect.getInstance(form[input])
			if (!form[input].value) {
				instance.input.classList.add('invalid')
				check = false
			} else {
				instance.input.classList.remove('invalid')
			}
		} else {
			if (!form[input].value) {
				form[input].classList.add('invalid')
				check = false
			} else {
				form[input].classList.remove('invalid')
			}
		}
	}

	if (!check) {
		M.toast({
			html: '<p>Please fill the required fields</p>'
		})
		disable_primary_btn(document.querySelector('[data-id="pay-now-btn"]'), false)
		return
	}

	const response = await post(form)
	console.log(response)

	if (!response.status) {
		M.toast({
			html: '<p>Billing ddress couldn\'t be updated. Contact the support team.</p>'
		})
		disable_primary_btn(document.querySelector('[data-id="pay-now-btn"]'), false)
		return
	}
	// disable_primary_btn(document.querySelector('[data-id="pay-now-btn"]'), false)
	window.location = document.querySelector('[data-id="pay-now-btn"]').href
})

// CODE FOR CHANGING THE STATE ON THE BASIS OF THE COUNTRY
document.querySelector('#country').addEventListener('change', () => {
	const country = document.querySelector('#country').value
	const states = show_states(country)

	const instance = M.FormSelect.getInstance(document.querySelector('#state'))
	instance.destroy()
	document.querySelector('#state').innerHTML = ''
	states.forEach(state => {
		document.querySelector('#state').innerHTML += `<option value="${ state }">${ state }</option>`
	})
	M.FormSelect.init(document.querySelector('#state'))

	// update the country code in the phone number input field
	document.querySelector('[data-id="country-code"]').innerText = country_codes(country)
})

const show_states = (country) => {
	switch (country) {
		case 'United States':
			return ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming']
		
		case 'India':
			return ['Andaman and Nicobar Islands', 'Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar', 'Chandigarh', 'Chhattisgarh', 'Daman & Diu', 'Delhi NCT', 'Goa', 'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jammu & Kashmir', 'Jharkhand', 'Karnataka', 'Kerala', 'Ladakh', 'Lakshadweep', 'Madhya Pradesh', 'Maharashtra', 'Manipur', 'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha', 'Puducherry', 'Punjab', 'Rajasthan', 'Sikkim', 'Tamil Nadu', 'Telangana', 'Tripura', 'Uttarakhand', 'Uttar Pradesh', 'West Bengal']
		default:
			break;
	}
}

const country_codes = (country) => {
	switch (country) {
		case 'United States':
			return '+1'

		case 'India':
			return '+91'

		case 'Pakistan':
			return '+92'
		
		case 'United Kingdom':
			return '+44'
	
		default:
			break;
	}
}