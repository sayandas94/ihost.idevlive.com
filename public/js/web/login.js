const form = document.forms['login-form']

const LoadingButton = (button, state) => {
	if (state === true) {
		button.classList.add('disabled')
		button.innerHTML += '<div class="preloader-wrapper tiny active" style="position: absolute; top: calc(50% - 8px); left: calc(50% - 8px)"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
	} else {
		button.classList.remove('disabled')
		button.removeChild(document.querySelector('.preloader-wrapper'))
	}
}

form.addEventListener('submit', async (e) => {
	e.preventDefault()
	// form['submit'].classList.add('disabled')
	LoadingButton(form['submit'], true)
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
		LoadingButton(form['submit'], false)
		return
	}

	const response = await post(form)

	if (!response.status) {
		console.log(response)
		for (const key in response.data) {
			form[key].classList.add('invalid')
			// M.toast({
			// 	html: `<p>${response.data[key][0]}</p>`
			// })
			document.querySelector('[data-id="error-box"]').classList.remove('hide')
			document.querySelector('[data-id="error-box"] span').innerHTML = response.data[key][0]
		}
		// document.querySelector('[data-id="error-box"]').classList.remove('hide')
		// document.querySelector('[data-id="error-box"] span').innerHTML = response.message
		LoadingButton(form['submit'], false)
		return
	}

	window.location = response.data.url
})