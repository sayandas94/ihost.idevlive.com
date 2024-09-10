document.addEventListener('DOMContentLoaded', async () => {
	document.querySelectorAll('.nav-btn').forEach(element => {
		element.classList.remove('active')
	})
	document.querySelector('[data-id="domains"]').classList.add('active')

	const domain_add_form = document.forms['domain-add-form']
	domain_add_form.addEventListener('submit', async (e) => {
		e.preventDefault()

		if (!domain_add_form['domain_name'].value) {
			M.toast({html : '<p>The Domain name is required.</p>'})
			return
		}

		const response = await post(domain_add_form)
		console.log(response)
		if (!response.status) {
			return
		}

		M.toast({
			html: `<span>${response.message}</span><a href="${appUrl('cart')}" class="btn-flat toast-action">View Cart</a>`
		});
		const modalInstance = M.Modal.init(document.querySelector('#buy-domain-modal'))
		modalInstance.close()
	})
})

document.onreadystatechange = async () => {
	if (document.readyState == 'complete') {
		const profile = await get(appUrl('accounts/profile'));
		user_profile(profile)

		const userDomain = await get(appUrl('accounts/active-subscriptions?product=domain'))

		if (userDomain.data.length == 0) {
			document.querySelector('[data-id="get-a-domain"]').classList.remove('hide')
		} else {
			document.querySelector('[data-id="domain-wrapper"]').classList.remove('hide')
		}

		document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')

		document.querySelector('[data-id="domains-table"] tbody').innerHTML = ''

		for (const domain of userDomain.data) {
			switch (domain.status) {
				case 'Setup':
					badge = `<span class="badges blue">${domain.status}</span>`
					break;

				case 'Expired':
					badge = `<span class="badges red">${domain.status}</span>`
					break;

				case 'Active':
					badge = `<span class="badges green">${domain.status}</span>`
					break;

				default:
					badge = `<span class="badges grey">${domain.status}</span>`
					break;
			}

			document.querySelector('[data-id="domains-table"] tbody').innerHTML += `<tr>
				<td>
					<span style="font-size: 16px" class="medium"><a href="${appUrl('user/manage-domain/' + domain.domain_name)}" style="color: #212121; text-decoration: underline">${domain.domain_name}</a></span>
					<br>
					<span class="small-text grey-text">Privacy: ${ (domain.privacy_protection) ? 'Enabled' : 'Disabled' }</span>
				</td>
				<td class="small-text">${badge}</td>
				<td class="small-text">${domain.expiring_at}</td>
				<td class="small-text">
					<div class="switch">
						<label>
							${ (domain.auto_renew) ? '<input type="checkbox" class="auto-renew-checkbox" data-id="auto-renew-checkbox" checked />' : '<input type="checkbox" class="auto-renew-checkbox" data-id="auto-renew-checkbox" />' }
							<span class="lever"></span>
						</label>
					</div>
				</td>
				<td>
					<a href="#manage-domain" class="btn-flat default" data-id="manage-domain" data-domain="${domain.domain_name}" data-value="${domain.website_id}" style="border-radius: 4px"><i class="material-symbols-rounded">more_vert</i></a>
				</td>
			</tr>`

			document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
		}
	}
}

const domainRender = (data) => {
	document.querySelector('[data-id="domains-table"] tbody').innerHTML = ''

	for (const item of data) {
		if (item.status === 'Setup') {
			button = `<button
						class="btn primary hover truncate"
						style="width: 90%; max-width: 100%"
						data-hosting-setup
						data-productname="${ item.product_name }"
						data-hostingID="${ item.id }"
						data-invoiceID="${ item.invoice_id }">Setup Hosting
					</button>`

			badge = `<p class="regular">Status<br><span class="badges blue">Setup</span></p>`
		} else {
			button = `<a
						href="${appUrl('user/ipanel?hostingId=' + item.id)}"
						data-serverip=""
						data-id="open-ipanel"
						class="btn primary hover truncate"
						style="width: 90%; max-width: 100%">
						Open iPanel
					</a>`

			badge = `<p class="regular">Status<br><span class="badges green">Active</span></p>`
		}

		if (item.privacy_protection === 1) {
			privacy_protection = 'On'
		} else {
			privacy_protection = 'Off'
		}

		document.querySelector('[data-id="domains-table"] tbody').innerHTML += `<tr>
					<td style="max-width: 40%">
						<span class="regular">${item.domain_name}</span>
						<br>
						<span class="small-text grey-text">Created On: ${item.created_at}</span>
						<br>
						<span class="small-text grey-text">Privacy Protection: ${privacy_protection}</span>
					</td>
					<td class="center-align">
						<p class="regular">Status<br><span class="badges green">Active</span></p>
					</td>
					<td class="center-align">
						<span class="regular">Expires On</span>
						<br>
						<span class="small-text grey-text">${item.expiring_at}</span>
					</td>
					<td class="center-align">
						<span class="regular">Auto Renew</span>
						<div class="switch"><label>Off<input type="checkbox" class="auto-renew-checkbox" data-id="" data-product="hosting" checked><span class="lever"></span>On</label></div>
					</td>
					<td class="right-align" style="width: 10%">
						<a
							href="manage-dns/${item.dns_zone_id}"
							data-serverip=""
							class="btn primary hover semi-bold truncate">
							DNS
						</a>
					</td>
					<td class="right-align" style="width: 10%">
						<a
							href="#!"
							data-serverip=""
							class="btn primary solid semi-bold truncate"
							style="outline: 2px solid var(--primary)">
							Manage
						</a>
					</td>
				</tr>`
	}
}

const domain_search_form = document.forms['domain-search-form']

domain_search_form.addEventListener('submit', async (e) => {
	e.preventDefault()
	// document.querySelector('[data-id="domain-header"]').classList.add('hide')
	// document.querySelector('[data-id="domain-configuration"]').classList.remove('hide')
	// return
	const domain = domain_search_form['domain_name'].value

	if (!domain) {
		M.toast({html : '<p>The Domain name is required.</p>'})
		return
	}

	domain_search_form['submit-btn'].classList.add('disabled')

	domain_search_form['submit-btn'].innerHTML = '<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'

	const response = await post(domain_search_form)

	domain_search_form['submit-btn'].classList.remove('disabled')
	domain_search_form['submit-btn'].innerHTML = `<img src="${appUrl('images/icons/search.svg')}" alt="">`

	if (!response.status) {
		// Unauthorised User
		if (response.data.statusCode == 401) {
			document.querySelector('[data-id="error-container"] p').innerText = 'Unable to get the domain details. Please contact the support team with error code DO-401'
			document.querySelector('[data-id="error-container"]').classList.remove('hide')
			document.querySelector('[data-id="domain-header"]').classList.add('hide')
			return
		}

		// Product Not Found
		if (response.data.statusCode == 404) {
			document.querySelector('[data-id="error-container"] p').innerText = 'Unable to get the domain details. Please contact the support team with error code DO-401'
			document.querySelector('[data-id="error-container"]').classList.remove('hide')
			document.querySelector('[data-id="domain-header"]').classList.add('hide')
			return
		}

		// Validation Failed
		if (response.data.statusCode == 412) {
			document.querySelector('[data-id="error-container"] p').innerText = 'Missing parameters. Please contact the support team with error code DO-412'
			document.querySelector('[data-id="error-container"]').classList.remove('hide')
			document.querySelector('[data-id="domain-header"]').classList.add('hide')
			return
		}
	}

	// If the Domain Name is unavailable then show the suggestions
	if (response.data.statusCode == 400) {
		document.querySelector('[data-id="domain-unavailable"] table tbody').innerHTML = ''
		response.data.suggestions.registryDomainSuggestionList.forEach(element => {
			document.querySelector('[data-id="domain-unavailable"] table tbody').innerHTML += `<tr>
				<td>
					<span>${element.domainName.toLowerCase()}</span>
					<br>
					<span class="small-text">$ ${element.price} / year</span>
				</td>
				<td class="right-align"><a href="#!" class="btn-flat primary">Add to cart</a></td>
			</tr>`
		})
		document.querySelector('[data-id="domain-header"]').classList.add('hide')
		document.querySelector('[data-id="domain-configuration"]').classList.add('hide')
		document.querySelector('#buy-domain-modal .modal-footer').classList.add('hide')
		document.querySelector('[data-id="domain-unavailable"]').classList.remove('hide')
		return
	}

	document.querySelector('[data-id="domain-price"]').innerText = 'for $ ' + response.data.registrationFee

	document.querySelector('[data-id="domain-unavailable"]').classList.add('hide')
	document.querySelector('[data-id="domain-header"]').classList.add('hide')
	document.querySelector('[data-id="domain-configuration"]').classList.remove('hide')
	document.querySelector('#buy-domain-modal .modal-footer').classList.remove('hide')

	document.forms['domain-add-form']['product_id'].value = response.data.product_id
	document.forms['domain-add-form']['domain_name'].value = response.data.domain

	// console.log(response.data.multi_year_pricing)

	// console.log(document.querySelector('#term-length').children[0].children[0].dataset.price)
	// document.querySelector('#term-length').children[0].children[0].dataset.price = response.data.multi_year_pricing.responseData.
})

document.addEventListener('click', async (e) => {
	const manage_domain = e.target.closest('[data-id="manage-domain"]')
	if (manage_domain) {
		e.preventDefault()
		disable_btn(true, manage_domain)

		const domain_details = await get(appUrl(`domain/details?domain_name=${manage_domain.dataset.domain}`))

		if (!domain_details.status) {
			console.error('Can\'t fetch the domain details')
			return
		}

		if (domain_details.data.responseData.isPrivacyProtection) {
			document.querySelector('[data-id="change-privacy"]').setAttribute('checked', true)
		} else {
			document.querySelector('[data-id="change-privacy"]').removeAttribute('checked')
		}

		if (domain_details.data.responseData.isDomainLocked) {
			document.querySelector('[data-id="change-domain-lock"]').setAttribute('checked', true)
		} else {
			document.querySelector('[data-id="change-domain-lock"]').removeAttribute('checked')
		}

		if (domain_details.data.responseData.isThiefProtected) {
			document.querySelector('[data-id="change-theft-protection"]').setAttribute('checked', true)
		} else {
			document.querySelector('[data-id="change-theft-protection"]').removeAttribute('checked')
		}

		document.querySelector('[data-id="change-privacy"]').dataset.domain_name_id = domain_details.data.responseData.domainNameId
		
		document.querySelector('[data-id="change-domain-lock"]').dataset.domain_name_id = domain_details.data.responseData.domainNameId
		document.querySelector('[data-id="change-domain-lock"]').dataset.website_name = domain_details.data.responseData.websiteName
		
		document.querySelector('[data-id="change-theft-protection"]').dataset.domain_name_id = domain_details.data.responseData.domainNameId
		document.querySelector('[data-id="change-theft-protection"]').dataset.website_name = domain_details.data.responseData.websiteName

		const instance = M.Modal.getInstance(document.querySelector('#manage-domain-modal'))
		instance.open()

		disable_btn(false, manage_domain)
	}


	const privacy_protection = e.target.closest('[data-id="change-privacy"]')
	if (privacy_protection) {
		privacy_protection.setAttribute('disabled', true)

		let value
		if (privacy_protection.checked) {
			value = true
		} else {
			value = false
		}

		const change_privacy = await get(appUrl(`domain/change-privacy?domain_name_id=${privacy_protection.dataset.domain_name_id}&value=${value}`))

		if (!change_privacy.status) {
			M.toast({
				html: '<p>Couldn\'t change Privacy settiing. Talk to support</p>'
			})
			privacy_protection.removeAttribute('disabled')
			return
		}

		M.toast({
			html: `<p>Privacy Protection is ${change_privacy.data.privacy_status} successfully</p>`
		})
		privacy_protection.removeAttribute('disabled')
	}

	const domain_lock = e.target.closest('[data-id="change-domain-lock"]')
	if (domain_lock) {
		domain_lock.setAttribute('disabled', true)
		
		let value
		(domain_lock.checked) ? value = true : value = false

		const change_domain_lock = await get(appUrl(`domain/domain-lock?domain_name_id=${change_domain_lock.dataset.domain_name_id}&website_name=${change_domain_lock.dataset.website_name}&value=${value}`))

		M.toast({
			html: change_domain_lock.message
		})

		domain_lock.removeAttribute('disabled')
	}

	const theft_protection = e.target.closest('[data-id="change-theft-protection"]')
	if (theft_protection) {
		theft_protection.setAttribute('disabled', true)

		let value
		(theft_protection.checked) ? value = true : value = false

		const change_theft_protection = await get(appUrl(`domain/theft-protection?domain_name_id=${theft_protection.dataset.domain_name_id}&website_name=${theft_protection.dataset.website_name}&value=${value}`))

		M.toast({
			html: change_theft_protection.message
		})

		theft_protection.removeAttribute('disabled')
	}

	// const select_duration = e.target.closest('#term-length li a')
	// if (select_duration) {
	// 	e.preventDefault()



	// 	console.log(select_duration.innerText)
	// }
})