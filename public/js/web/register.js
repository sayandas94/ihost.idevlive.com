const form = document.forms['register-form']

form.addEventListener('submit', async (e) => {
	e.preventDefault()
	// form['submit'].classList.add('disabled')
	disable_btn(form['submit'], true)
	let check = true
	const inputs = ['email', 'password', 'customer_name']

	for (const input of inputs) {
		if (!form[input].value) {
			form[input].classList.add('invalid')
			check = false
		} else {
			form[input].classList.remove('invalid')
		}
	}

	if (!check) {
		document.querySelector('[data-id="error-box"]').classList.remove('hide')
		document.querySelector('[data-id="error-box"] span').innerHTML = 'Please fill all the required fields.'

		disable_btn(form['submit'], false)
		return
	}

	const response = await post(form)

	form['submit'].classList.remove('disabled')
	if (!response.status) {
		for (const key in response.data) {
			form[key].classList.add('invalid')

			document.querySelector('[data-id="error-box"]').classList.remove('hide')
			document.querySelector('[data-id="error-box"] span').innerHTML = response.data[key][0]
		}
		disable_btn(form['submit'], false)
		return;
	}

	// M.toast({
	// 	html: `<span>${response.message}</span><a href="${response.data.url}" class="btn-flat toast-action">Sign In</a>`
	// })
	window.location = appUrl('user/dashboard');
})