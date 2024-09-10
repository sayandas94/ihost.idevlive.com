const appUrl = (url) => {
	return 'http://ihost.idevlive.test/' + url
}

const apiUrl = (url) => {
	return 'http://api.idevlive.test/api/' + url
}

const get = async (url) => {
	try {
		const response = await fetch (url)
		
		if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`)
		
		const data = await response.json()
		return data
	} catch (error) {
		// window.location = appUrl('error')
		document.querySelector('body').innerHTML = ''
		document.querySelector('body').innerHTML = `<style>
			section {
				height: 100svh;
				width: 100vw;
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				text-align: center;
			}
		</style>
		<section>
			<img src="${appUrl('images/website/network-error.svg')}" alt="" style="width: 20%">
			<h5>Network Error</h5>
			<p><a href="${location.reload()}" class="black-text">Click here to reload the page</a></p>
		</section>`
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

// const btn_disable = (value, btn) => {
// 	if (value) {
// 		btn.classList.add('disabled')
// 	}
// }

const disable_btn = async (value, btn) => {
	if (value) {
		btn.classList.add('disabled-btn')
		btn.innerHTML += '<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
	} else {
		btn.classList.remove('disabled-btn')
		btn.removeChild(document.querySelector('.preloader-wrapper'))
	}
}

const user_profile = (profile) => {
	if (!profile.status) {
		document.querySelector('[data-id="error-screen"]').classList.remove('hide')
		return;
	}

	document.querySelectorAll('[data-id="username"]').forEach(item => {
		item.innerText = profile.data.name
	})

	document.querySelectorAll('[data-id="userid"]').forEach(item => {
		item.innerText = profile.data.name
	})

	document.querySelectorAll('[data-id="useremail"]').forEach(item => {
		item.innerText = profile.data.email
	})
}

document.addEventListener('DOMContentLoaded', async () => {
	M.AutoInit()
})

// document.onreadystatechange = async () => {
// 	if (document.readyState == 'complete') {
// 		const profile = await get(appUrl('accounts/profile'));

// 		if (!profile.status) {
// 			return
// 		}

// 		document.querySelectorAll('[data-id="username"]').forEach(item => {
// 			item.innerText = profile.data.name
// 		})

// 		document.querySelectorAll('[data-id="userid"]').forEach(item => {
// 			item.innerText = profile.data.name
// 		})
// 	}
// }