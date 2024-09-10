const billing_form = document.forms['update-account-information']
const password_form = document.forms['update-password']
const pin_form = document.forms['update-pin']

document.onreadystatechange = async () => {
	if (document.readyState == 'complete') {
		const profile = await get(appUrl('accounts/profile'));
		user_profile(profile)

		const fetch_address = await get(appUrl('accounts/fetch-address'));
	
		if (!fetch_address.status) {
			document.querySelector('[data-id="error-screen"]').classList.remove('hide')
			return
		}

		if (fetch_address.data != null) {
			document.querySelector('[data-id="user_email"]').innerText = fetch_address.data['email']
			document.querySelector('[data-id="customer_name"]').innerText = fetch_address.data['customer_name']
			document.querySelector('[data-id="phone_number"]').innerText = fetch_address.data['phone_number']
			document.querySelector('[data-id="address"]').innerText = `${fetch_address.data['street']}, ${fetch_address.data['city']} ${fetch_address.data['state']} (${fetch_address.data['postal_code']})`

			for (const key in fetch_address.data) {
				if (billing_form[key] != undefined) {
					billing_form[key].value = fetch_address.data[key]
				}
			}
			M.updateTextFields()
			M.FormSelect.init(billing_form['state'])
			M.FormSelect.init(billing_form['country'])
		} else {
			document.querySelector('[data-id="user_email"]').innerText = '-'
			document.querySelector('[data-id="customer_name"]').innerText = '-'
			document.querySelector('[data-id="phone_number"]').innerText = '-'
			document.querySelector('[data-id="address"]').innerText = '-'
		}
		document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')

		// document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
	}
}

document.addEventListener('DOMContentLoaded', async () => {
	document.querySelectorAll('.nav-btn').forEach(element => {
		element.classList.remove('active')
	})
	document.querySelector('[data-id="account"]').classList.add('active')
})

billing_form.addEventListener('submit', async (e) => {
	e.preventDefault()
	
	billing_form['submit-btn'].classList.add('disabled')
	let check = true
	const inputs = ['customer_name', 'email', 'phone_number', 'country', 'street', 'city', 'state', 'postal_code']

	for (const input of inputs) {
		if (input == 'country' || input == 'state') {
			const instance = M.FormSelect.getInstance(billing_form[input])
			if (!billing_form[input].value) {
				instance.input.classList.add('invalid')
				check = false
			} else {
				instance.input.classList.remove('invalid')
			}
		} else {
			if (!billing_form[input].value) {
				billing_form[input].classList.add('invalid')
				check = false
			} else {
				billing_form[input].classList.remove('invalid')
			}
		}
	}

	if (!check) {
		M.toast({
			html: '<p>Please fill all the required fields.</p>'
		})
		billing_form['submit-btn'].classList.remove('disabled')
		return
	}

	const response = await post(billing_form)
	billing_form['submit-btn'].classList.remove('disabled')
	
	if (!response.status) {
		M.toast({
			html: '<p>Address couldn\'t be updated. Contact the support team.</p>'
		})
		return
	}

	M.toast({
		html: '<p>Address updated successfully.</p>'
	})
	const instance = M.Modal.getInstance(document.querySelector('#edit-account-information'))
	instance.close()
})

password_form.addEventListener('submit', async (e) => {
	e.preventDefault()
	password_form['submit-btn'].classList.add('invalid')
	let check = true
	const inputs = ['password', 'password_confirmation']
	for (const input of inputs) {
		if (!password_form[input].value) {
			password_form[input].classList.add('invalid')
			check = false
		} else {
			password_form[input].classList.remove('invalid')
		}
	}

	if (!check) {
		M.toast({
			html: '<p>Please fill al the required fields.</p>'
		})
		password_form['submit-btn'].classList.remove('invalid')
		return
	}

	const response = await post(password_form)
	console.log(response)
	password_form['submit-btn'].classList.remove('invalid')
	
})

pin_form.addEventListener('submit', async (e) => {
	e.preventDefault()
	let check = true

	if (!pin_form['support_pin'].value) {
		pin_form['support_pin'].classList.add('invalid')
		check = false
	} else {
		pin_form['support_pin'].classList.remove('invalid')
	}

	if (!check) {
		M.toast({
			html: '<p>Please fill all the required fields.</p>'
		})
		return
	}

	const response = await post(pin_form)

	if (!response.status) {
		for (const key in response.data) {
			pin_form[key].classList.add('invalid')
			M.toast({
				html: `<p>${response.data[key][0]}</p>`
			})
		}
		// pin_form['submit'].classList.add('disabled')
		return
	}
	
	M.toast({
		html: `<p>${response.message}</p>`
	})
})