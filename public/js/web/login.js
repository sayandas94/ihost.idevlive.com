const form = document.forms['login-form']

form.addEventListener('submit', async (e) => {
	e.preventDefault()
	form['submit'].classList.add('disabled')
	let check = true
	const inputs = ['email', 'password']

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
		form['submit'].classList.add('disabled')
		return
	}

	const response = await post(form)

	if (!response.status) {
		for (const key in response.data) {
			form[key].classList.add('invalid')
			M.toast({
				html: `<p>${response.data[key][0]}</p>`
			})
		}
		form['submit'].classList.add('disabled')
		return
	}

	window.location = response.data.url
})