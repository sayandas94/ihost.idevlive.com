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
		M.toast({
			html: '<p>Please fill all the required fields.</p>'
		})
		form['submit'].classList.remove('disabled')
		return
	}

	const response = await post(form)

	form['submit'].classList.remove('disabled')
	if (!response.status) {
		for (const key in response.data) {
			form[key].classList.add('invalid')
			M.toast({
				html: `<p>${response.data[key][0]}</p>`
			})
		}
		disable_btn(form['submit'], false)
		return;
	}

	// M.toast({
	// 	html: `<span>${response.message}</span><a href="${response.data.url}" class="btn-flat toast-action">Sign In</a>`
	// })
	window.location = appUrl('user/dashboard');
})