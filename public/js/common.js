document.onreadystatechange = () => {
	if (document.readyState == 'complete') {
		document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
	}
}

document.addEventListener('DOMContentLoaded', () => {
	M.AutoInit()
})

document.addEventListener('click', (e) => {
	// DISABLE #! CLICK
	const blank = e.target.closest('a[href^="#!"]')
	if (blank) {
		e.preventDefault()
	}

	const menu_dropdown = e.target.closest('[data-id="menu-dropdown"]')
	if (menu_dropdown) {
		e.preventDefault()
		const id = menu_dropdown.getAttribute('href')

		if (menu_dropdown.parentElement.classList.contains('active')) {
			menu_dropdown.parentElement.classList.remove('active')
			document.querySelector(id).style.visibility = 'hidden'
		} else {
			document.querySelectorAll('.full-width-dropdown').forEach(element => {
				element.style.visibility = 'hidden'
			})
	
			document.querySelectorAll('[data-id="menu-dropdown"]').forEach(element => {
				element.parentElement.classList.remove('active')
			})

			menu_dropdown.parentElement.classList.add('active')
			document.querySelector(id).style.visibility = 'visible'
		}
	} else {
		document.querySelectorAll('.full-width-dropdown').forEach(element => {
			element.style.visibility = 'hidden'
		})

		document.querySelectorAll('[data-id="menu-dropdown"]').forEach(element => {
			element.parentElement.classList.remove('active')
		})
	}
})

const appUrl = (url) => {
	return 'http://ihost.idevlive.test/' + url
}

const apiUrl = (url) => {
	return 'http://api.idevlive.test/api/' + url
}

const currency = (url) => {
	if (url.search('/in') > 0) {
		return '₹'
	}

	if (url.search('/ca') > 0) {
		return 'C$'
	}

	return '$'
}

const get = async (url) => {
	try {
		const response = await fetch (url)
		
		if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`)
		
		const data = await response.json()
		return data
	} catch (error) {
		console.log(error)
	}
}

const post = async (form) => {
	try {
		const response = await fetch (form.action, {
			method: form.method,
			body: new FormData(form),
			headers: {
				'accept': 'application/json'
			}
		})
		if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`)
			
		const data = await response.json()
		return data
	} catch (error) {
		console.log(error)
	}
}

const disable_btn = (btn, value) => {
	if (value) {
		btn.classList.add('disabled')
		btn.innerHTML += '<div class="preloader-wrapper tiny active" style="position: absolute; top: calc(50% - 8px) !important; left: calc(50% - 8px) !important"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
	} else {
		btn.classList.remove('disabled')
		btn.removeChild(btn.firstElementChild)
	}
}

const disable_primary_btn = (btn, value) => {
	if (value) {
		btn.classList.add('disabled')
		btn.innerHTML += '<div class="preloader-wrapper tiny active" style="position: absolute; top: calc(50% - 8px) !important; left: calc(50% - 8px) !important"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
	} else {
		btn.classList.remove('disabled')
		btn.removeChild(btn.firstElementChild)
	}
}

// SHADOW ON NAVBAR
window.onscroll = () => {
	if (document.documentElement.scrollTop > 50) {
		document.querySelectorAll('.main-nav')[0].classList.remove('z-depth-0')
	} else {
		document.querySelectorAll('.main-nav')[0].classList.add('z-depth-0')
	}
}