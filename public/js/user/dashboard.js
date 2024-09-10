document.addEventListener('DOMContentLoaded', async (e) => {
	document.querySelectorAll('.nav-btn').forEach(element => {
		element.classList.remove('active')
	})
	document.querySelector('[data-id="dashboard"]').classList.add('active')
})

document.onreadystatechange = async () => {
	if (document.readyState == 'complete') {
		const profile = await get(appUrl('accounts/profile'));
		user_profile(profile)

		if (profile.email_verified_at == null) {
			document.querySelector('[data-id="verification_email"]').innerText = profile.email_address
			// const instance = M.Modal.getInstance(document.querySelector('#verification-modal'))
			// instance.open()
		}

		// const userDomain = await get(appUrl('accounts/active-subscriptions?product=domain'))
		// document.querySelector('[data-id="domain-count"]').innerText = userDomain.data.length

		// if (userDomain.data.length == 0) {
		// 	document.querySelector('[data-id="domain-cta"]').innerText = 'Checkout Domain Offers'
		// } else {
		// 	document.querySelector('[data-id="domain-cta"]').innerText = 'Manage Domains'
		// }

		// const userHosting = await get(appUrl('accounts/active-subscriptions?product=hosting'))
		// document.querySelector('[data-id="hosting-count"]').innerText = userHosting.data.length

		// if (userHosting.data.length == 0) {
		// 	document.querySelector('[data-id="hosting-cta"]').innerText = 'Buy New Hosting'
		// } else {
		// 	document.querySelector('[data-id="hosting-cta"]').innerText = 'Manage Hosting'
		// }

		// const userEmail = await get(appUrl('accounts/active-subscriptions?product=email'))
		// document.querySelector('[data-id="email-count"]').innerText = userEmail.data.length

		// if (userEmail.data.length == 0) {
		// 	document.querySelector('[data-id="email-cta"]').innerText = 'Buy New Email'
		// } else {
		// 	document.querySelector('[data-id="email-cta"]').innerText = 'Manage Emails'
		// }

		// const [userDomain, userHosting, userEmail] = await Promise.all([
		// 	get(appUrl('accounts/active-subscriptions?product=domain')),
		// 	get(appUrl('accounts/active-subscriptions?product=hosting')),
		// 	get(appUrl('accounts/active-subscriptions?product=email'))
		// ])

		// if (!userDomain.status && !userHosting.status && !userEmail.status) {
		// 	document.querySelector('[data-id="error-screen"]').classList.remove('hide')
		// 	return
		// }

		const userDomain = await get(appUrl('accounts/active-subscriptions?product=domain'))
		const userHosting = await get(appUrl('accounts/active-subscriptions?product=hosting'))
		const userEmail = await get(appUrl('accounts/active-subscriptions?product=email'))

		if (!userDomain.status) {
			document.querySelector('[data-id="error-screen"]').classList.remove('hide')
			return
		}

		if (!userHosting.status) {
			document.querySelector('[data-id="error-screen"]').classList.remove('hide')
			return
		}

		if (!userEmail.status) {
			document.querySelector('[data-id="error-screen"]').classList.remove('hide')
			return
		}

		product_render(['[data-id="domain-count"]', '[data-id="domain-cta"]', 'Domain'], userDomain)
		product_render(['[data-id="hosting-count"]', '[data-id="hosting-cta"]', 'Hosting'], userHosting)
		product_render(['[data-id="email-count"]', '[data-id="email-cta"]', 'Email'], userEmail)

		if (document.querySelector('[data-id="loading-wrapper"]').classList.contains('active')) document.querySelector('[data-id="loading-wrapper"]').classList.remove('active');

		// if (!profile.status) {
		// 	return
		// }

		// document.querySelectorAll('[data-id="username"]').forEach(item => {
		// 	item.innerText = profile.data.name
		// })

		// document.querySelectorAll('[data-id="userid"]').forEach(item => {
		// 	item.innerText = profile.data.name
		// })
	}
}

const product_render = (elements, product) => {
	document.querySelector(elements[0]).innerText = product.data.length
	if (product.data.length == 0) {
		document.querySelector(elements[1]).innerText = `Buy ${elements[2]}s`
	} else {
		document.querySelector(elements[1]).innerText = `Manage all ${ elements[2] }s`
	}
}