document.addEventListener('DOMContentLoaded', async () => {
	document.querySelectorAll('.nav-btn').forEach(element => {
		element.classList.remove('active')
	})
	document.querySelector('[data-id="billing"]').classList.add('active')
	document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')

	const PaymentMethods = await get(appUrl(`accounts/payment-methods`))

	document.querySelector('[data-id="payment-methods"] tbody').innerHTML = ''
	if (PaymentMethods.data.length == 0) {
		document.querySelector('[data-id="pm-count"]').innerText = 'You don\'t have any saved payment methods.'
		return
	}

	document.querySelector('[data-id="pm-count"]').innerText = `You have ${ PaymentMethods.data.length } active payment ${ (PaymentMethods.data.length == 1) ? 'method' : 'methods' }`

	for (const PaymentMethod of PaymentMethods.data) {
		document.querySelector('[data-id="payment-methods"] tbody').innerHTML += `<tr>
			<td>
				<span class="medium">&bull;&bull;&bull;&bull; ${ PaymentMethod.card.last4 }</span>
				<br>
				<span class="small-text grey-text">${ PaymentMethod.card.exp_month }/${ PaymentMethod.card.exp_year }</span>
				<br>
				<span class="small-text grey-text" style="text-transform: capitalize">${ PaymentMethod.card.brand }</span>
			</td>
		</tr>`
	}
})

let profile

document.onreadystatechange = async () => {
	if (document.readyState == 'complete') {
		profile = await get(appUrl('accounts/profile'));
		user_profile(profile)
	}
}

document.querySelector('[href="#payment-history"]').addEventListener('click', async (e) => {
	e.preventDefault()

	const invoices = await get(appUrl('accounts/invoices'))

	document.querySelector('[data-id="invoices-table"] tbody').innerHTML = ''

	for (const invoice of invoices.data) {
		switch (invoice.currency) {
			case 'usd':
				currency = '$'
				break;

			case 'inr':
				currency = '₹'
				break;
		
			default:
				currency = '$'
				break;
		}

		document.querySelector('[data-id="invoices-table"] tbody').innerHTML += `<tr>
			<td>
				<span class="grey-text medium">Invoice Number</span>
				<br>
				<span>${ invoice.number }</span>
			</td>
			<td>
				<span class="grey-text medium">Status</span>
				<br>
				<span style="text-transform: capitalize">${ invoice.status }</span>
			</td>
			<td>
				<span class="grey-text medium">Billing Date</span>
				<br>
				<span>${ invoice.created }</span>
			</td>
			<td>
				<span class="grey-text medium">Amount</span>
				<br>
				<span>${ currency } ${ (invoice.amount_paid / 100).toFixed(2) }</span>
			</td>
			<td>
				<a href="${ invoice.invoice_pdf }" class="btn-flat primary hover" style="font-weight: 400"><i class="material-symbols-rounded left" target="_blank">download</i>Download</a>
			</td>
		</tr>`
	}
})

document.querySelector('[href="#active-subscriptions"]').addEventListener('click', async (e) => {
	e.preventDefault()

	const active_subscriptions = await get(appUrl('accounts/active-subscriptions'))
	
	if (!active_subscriptions.status) {
		document.querySelector('[data-id="error-screen"]').classList.remove('hide')
		return
	}

	switch (profile.region) {
		case 'us':
			currency = '$'
			break;

		case 'in':
			currency = '₹'
			break;
	
		default:
			currency = '$'
			break;
	}

	document.querySelector('[data-id="subscription-table"] tbody').innerHTML = ''

	for (const active_subscription of active_subscriptions.data) {
		document.querySelector('[data-id="subscription-table"] tbody').innerHTML += `<tr>
			<td class="small-text">
				<span style="font-size: 1rem; font-weight: 500">${ (Object.hasOwn(active_subscription, 'domain_name')) ? active_subscription.domain_name : active_subscription.product_name }</span>
				<br>
				<span style="text-transform: capitalize">${ active_subscription.category }</span>
			</td>
			<td class="small-text">${ active_subscription.created_at }</td>
			<td class="small-text">${ active_subscription.expiring_at }</td>
			<td class="small-text">${ currency } ${ active_subscription.price }</td>
			<td class="small-text">
				<div class="switch">
					<label>
						${ (active_subscription.auto_renew) ? `<input type="checkbox" class="auto-renew-checkbox" data-id="subscription-auto-renew" data-category="${ active_subscription.category }" value="${ active_subscription.id }" checked /><span class="lever"></span>` : `<input type="checkbox" class="auto-renew-checkbox" data-id="subscription-auto-renew" data-category="${ active_subscription.category }" value="${ active_subscription.id }" /><span class="lever"></span>` }
					</label>
				</div>
			</td>
		</tr>`
	}
})

document.addEventListener('click', async (e) => {
	const auto_renew = e.target.closest('[data-id="subscription-auto-renew"]')
	if (auto_renew) {
		auto_renew.setAttribute('disabled', true)

		let update_autorenew
		if (auto_renew.checked) {
			update_autorenew = await get(appUrl(`accounts/update-autorenew?category=${ auto_renew.dataset.category }&id=${ auto_renew.value }&value=true`))
		} else {
			update_autorenew = await get(appUrl(`accounts/update-autorenew?category=${ auto_renew.dataset.category }&id=${ auto_renew.value }&value=false`))
		}

		auto_renew.removeAttribute('disabled')

		// if (!update_autorenew.status) {
			
		// }

		M.toast({
			html: `<p>${ update_autorenew.message }</p>`
		})
	}
})