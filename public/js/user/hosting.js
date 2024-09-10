document.addEventListener('DOMContentLoaded', async () => {
	document.querySelectorAll('.nav-btn').forEach(element => {
		element.classList.remove('active')
	})
	document.querySelector('[data-id="hosting"]').classList.add('active')
})

document.onreadystatechange = async () => {
	if (document.readyState == 'complete') {
		const profile = await get(appUrl('accounts/profile'));
		user_profile(profile)

		const userHosting = await get(appUrl('accounts/active-subscriptions?product=hosting'))

		if (userHosting.data.length != 0) hosting_render(userHosting.data)
		document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
	}
}

const hosting_render = (data) => {
	document.querySelector('[data-id="hosting-table"] tbody').innerHTML = ''
	for (const hosting of data) {

		if (hosting.status == 'Setup') {
			badge = `<p class="regular">Status<br><span class="badges blue">Setup</span></p>`
		} else if (hosting.status == 'Active') {
			badge = `<p class="regular">Status<br><span class="badges green">Active</span></p>`
		}

		switch (hosting.status) {
			case 'Active':
				badge = `<span class="badges green">Active</span>`
				button = `<a
					href="${ appUrl('user/ipanel?hostingId=' + hosting.id) }"
					data-serverip=""
					data-id="open-ipanel"
					class="btn primary hover truncate"
					style="width: 90%; max-width: 100%">
					Open iPanel
				</a>`
				break

			case 'Setup':
				badge = `<span class="badges blue">Setup</span>`
				button = `<a
					href="#setup-hosting-popup"
					class="btn primary hover truncate popup-trigger"
					data-hosting-setup
					data-productname="${ hosting.product_name }"
					data-hostingID="${ hosting.id }"
					data-invoiceID="${ hosting.invoice_id }">Setup Hosting
				</a>`
				break
		
			default:
				badge = `<span class="badges grey">Unknown</span>`
				break
		}

		document.querySelector('[data-id="hosting-table"] tbody').innerHTML += `<tr>
			<td>
				<span class="regular-text">${ hosting.product_name }</span>
				<br>
				<span class="small-text grey-text truncate-1">${ (hosting.status == 'Setup') ? 'Setup Required' : hosting.primary_domain }</span>
			</td>
			<td>
				${ badge }
			</td>
			<td>
				<span>${hosting.expiring_at}</span>
			</td>
			<td>
				<div class="switch">
					<label>
						${ (hosting.auto_renew) ? '<input type="checkbox" class="auto-renew-checkbox" data-id="" data-product="hosting" checked><span class="lever"></span>' : '<input type="checkbox" class="auto-renew-checkbox" data-id="" data-product="hosting"><span class="lever"></span>' }
					</label>
				</div>
			</td>
			<td>
				${ button }
			</td>
		</tr>`
	}
}

document.addEventListener('click', (e) => {
	const open_setup_panel = e.target.closest('[href*="#setup-hosting-popup"]')
	if (open_setup_panel) {
		e.preventDefault()

		const input = document.createElement('input')
		input.type = 'hidden'
		input.name = 'hosting_id'
		input.value = open_setup_panel.dataset.hostingid

		document.forms['setup-hosting-form'].appendChild(input)

		console.log(input.value)

		const id = open_setup_panel.getAttribute('href')
		document.querySelector(id).classList.add('active')
	}

	const close_setup_panel = e.target.closest('[href*="#close-hosting-popup"]')
	if (close_setup_panel) {
		e.preventDefault()
		document.querySelector('#setup-hosting-popup').classList.remove('active')
	}

	const domain_select = e.target.closest('.domain-select')
	if (domain_select) {
		if (domain_select.value == 'ihost') {
			document.querySelector('#ihost-domain').style.visibility = 'visible'
			document.querySelector('#outside-domain').style.visibility = 'hidden'
		} else {
			document.querySelector('#ihost-domain').style.visibility = 'hidden'
			document.querySelector('#outside-domain').style.visibility = 'visible'
		}
	}

	const breadcrumb = e.target.closest('.breadcrumb')
	if (breadcrumb) {
		e.preventDefault()
		const id = breadcrumb.getAttribute('href')

		document.querySelectorAll('.form-part').forEach(element => {
			element.classList.remove('active')
		})
		document.querySelector(id).classList.add('active')
	}
})

document.forms['setup-hosting-form'].addEventListener('submit', async (e) => {
	e.preventDefault()
	const form = document.forms['setup-hosting-form']

	if (document.querySelector('#part-one').classList.contains('active')) {
		let check = true

		if (form['domain_select'].value == 'ihost') {
			if (!form['ihost_domain_name'].value) {
				check = false
				form['ihost_domain_name'].classList.add('invalid')
			} else {
				form['ihost_domain_name'].classList.remove('invalid')
			}
		} else {
			if (form['domain_select'].value == 'third-party') {
				if (!form['outside_domain_name'].value) {
					check = false
					form['outside_domain_name'].classList.add('invalid')
				} else {
					form['outside_domain_name'].classList.remove('invalid')
				}
			}
		}

		if (!check) {
			M.toast({
				html: '<p>Please fill the required field.</p>'
			})
			return
		}

		document.querySelectorAll('.form-part').forEach(element => {
			element.classList.remove('active')
		})
		document.querySelector('#part-two').classList.add('active')
		
		return
	}

	if (document.querySelector('#part-two').classList.contains('active')) {
		if (!form['datacenter'].value) {
			M.toast({
				html: '<p>Select a datacenter first.</p>'
			})
			return
		}

		document.querySelectorAll('.form-part').forEach(element => {
			element.classList.remove('active')
		})
		document.querySelector('#part-three').classList.add('active')

		return
	}

	if (document.querySelector('#part-three').classList.contains('active')) {
		if (!form['wordpress'].value) {
			M.toast({
				html: '<p>Select if you want to install Wordpress or not</p>'
			})
			return
		}

		// Submit the form here
		const response = await post(form)
		console.log(response)
	}
})



// document.addEventListener('click', (e) => {
// 	const popup_trigger = e.target.closest('.popup-trigger')
// 	if (popup_trigger) {
// 		e.preventDefault()
// 		const id = popup_trigger.getAttribute('href')
// 		document.querySelector(id).classList.add('active')
// 	}

// 	const close_popup = e.target.closest('[data-id="close-popup"]')
// 	if (close_popup) {
// 		e.preventDefault()
// 		const id = close_popup.getAttribute('href')
// 		document.querySelector(id).classList.remove('active')
// 	}

// 	const select_datacenter = e.target.closest('[href*="select-datacenter"]')
// 	if (select_datacenter) {
// 		e.preventDefault()
// 		const input = document.createElement('input')
// 		input.type = 'hidden'
// 		input.name = 'datacenter'
// 		input.value = select_datacenter.dataset.value
// 		document.forms['setup-hosting-form'].append(input)

// 		document.querySelector('.form-part#part-two').classList.remove('active')
// 		document.querySelector('.form-part#part-three').classList.add('active')
// 	}

// 	const check_settings = e.target.closest('[href*="check-settings"]')
// 	if (check_settings) {
// 		e.preventDefault()

// 		if (!document.forms['setup-hosting-form']['wordpress'].value) {
// 			M.toast({
// 				html: '<p>Please choose if you want wordpress or not.</p>'
// 			})
// 			return
// 		}

// 		document.querySelector('.form-part#part-three').classList.remove('active')
// 		document.querySelector('.form-part#part-four').classList.add('active')
// 	}

// 	const back = e.target.closest('.back')
// 	if (back) {
// 		e.preventDefault()
// 		document.querySelectorAll('.form-part').forEach(element => {
// 			element.classList.remove('active')
// 		})
// 		document.querySelector(back.getAttribute('href')).classList.add('active')
// 	}
// })

// document.forms['setup-hosting-form'].addEventListener('submit', async (e) => {
// 	e.preventDefault()
// 	const response = await post(document.forms['setup-hosting-form'])

// 	console.log(response)
// })