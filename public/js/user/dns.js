// document.addEventListener('DOMContentLoaded', async () => {
// 	document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
// 	const website_id = document.querySelector('[data-website_id]').dataset.website_id
	
// 	const dns = await get(appUrl(`domain/fetch-dns?website_id=${website_id}`))
// 	console.log(dns)

// 	if (!dns.status) {
// 		console.error('Cant fetch DNS records. Try again later')
// 		return
// 	}

// 	document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
// 	dns_render(dns.data)
// 	ns_render(dns.data)
// })

// document.addEventListener('click', async (e) => {
// 	const delete_dns = e.target.closest('[href*="delete-dns"]')
// 	if (delete_dns) {
// 		e.preventDefault()
// 		document.querySelector('[data-id="loading-wrapper"]').classList.add('active')
// 		const response = await get(appUrl(`domain/delete-dns?dns_zone_id=${delete_dns.dataset.dns_zone_id}&dns_zone_record_id=${delete_dns.dataset.dns_zone_record_id}`))
		
// 		if (!response.status) {
// 			document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
// 			M.toast({
// 				html: response.message
// 			})
// 			return
// 		}

// 		const website_id = document.querySelector('[data-website_id]').dataset.website_id
// 		const dns = await get(appUrl(`domain/fetch-dns?website_id=${website_id}`))
// 		dns_render(dns.data)
// 		document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
// 	}

// 	const add_dns = e.target.closest('[href*="add-dns"]')
// 	if (add_dns) {
// 		e.preventDefault()

// 		document.forms['add-dns-form']['dns_zone_id'].value = add_dns.dataset.dns_zone_id

// 		const instance = M.Modal.getInstance(document.querySelector('#add-dns-modal'))
// 		instance.open()
// 	}

// 	const edit_dns = e.target.closest('[href*="edit-dns"]')
// 	if (edit_dns) {
// 		e.preventDefault()

// 		// Get the data from the siblings and prefill the edit dns form
// 		const form = document.forms['edit-dns-form']
// 		form['dns_zone_id'].value = edit_dns.dataset.dns_zone_id
// 		form['dns_zone_record_id'].value = edit_dns.dataset.dns_zone_record_id
// 		form['record_type'].value = edit_dns.dataset.type
// 		form['record_name'].value = edit_dns.dataset.name
// 		form['record_value'].value = edit_dns.dataset.value
// 		form['record_ttl'].value = edit_dns.dataset.ttl

// 		M.updateTextFields()
// 		M.FormSelect.init(form['record_type'])
		
// 		const instance = M.Modal.getInstance(document.querySelector('#edit-dns-modal'))
// 		instance.open()

// 		// const response = await get(appUrl(`domain/edit-dns?dns_zone_id=${edit_dns.dataset.dns_zone_id}&dns_zone_record_id=${edit_dns.dataset.dns_zone_record_id}`))
// 		// console.log(response)
// 	}
// })

// document.forms['edit-dns-form'].addEventListener('submit', async (e) => {
// 	e.preventDefault()
// 	console.log('form submitted. waiting for response.')
// 	const instance = M.Modal.getInstance(document.querySelector('#edit-dns-modal'))
// 	instance.close()
// 	document.querySelector('[data-id="loading-wrapper"]').classList.add('active')

// 	const response = await post(document.forms['edit-dns-form'])
// 	console.log(response)

// 	document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
// })

// document.forms['add-dns-form'].addEventListener('submit', async (e) => {
// 	e.preventDefault()
// 	const instance = M.Modal.getInstance(document.querySelector('#add-dns-modal'))
// 	instance.close()
// 	document.querySelector('[data-id="loading-wrapper"]').classList.add('active')

// 	const response = await post(document.forms['add-dns-form'])
// 	console.log(response)
// 	const website_id = document.querySelector('[data-website_id]').dataset.website_id
// 	const dns = await get(appUrl(`domain/fetch-dns?website_id=${website_id}`))
// 	dns_render(dns.data)
// 	document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
// })

// const dns_render = (records) => {
// 	document.querySelector('[data-id="dns-records-table"] tbody').innerHTML = ''

// 	for (const data of records) {
// 		if (data.recordType != 'NS' && data.recordType != 'SOA') {
// 			document.querySelector('[data-id="dns-records-table"] tbody').innerHTML += `<tr>
// 				<td>${data.recordType}</td>
// 				<td>${data.recordName}</td>
// 				<td>${data.recordContent}</td>
// 				<td>${data.recordTTL}</td>
// 				<td>
// 					<a href="#delete-dns" class="btn danger hover medium" data-dns_zone_id="${data.dnszoneID}" data-dns_zone_record_id="${data.dnszoneRecordID}" style="border-radius: 8px">Delete</a>
// 					<a
// 						href="#edit-dns"
// 						class="btn-flat primary hover"
// 						data-dns_zone_id="${data.dnszoneID}"
// 						data-dns_zone_record_id="${data.dnszoneRecordID}"
// 						data-type=${data.recordType}
// 						data-name=${data.recordName}
// 						data-value=${data.recordContent}
// 						data-ttl=${data.recordTTL}
// 						style="font-weight: 500 !important" />
// 						Edit
// 					</a>
// 				</td>
// 			</tr>`
// 		}
// 	}
// }

// const ns_render = (records) => {
// 	document.querySelector('[data-id="ns-records-table"] tbody').innerHTML = ''
// 	let badge
// 	for (const data of records) {
// 		if (data.recordType == 'NS') {
// 			if (data.statusName == 'Active') {
// 				badge = `<span class="badges green">${data.statusName}</span>`
// 			} else {
// 				badge = `<span class="badges red">${data.statusName}</span>`
// 			}
// 			document.querySelector('[data-id="ns-records-table"] tbody').innerHTML += `<tr>
// 				<td>${data.recordContent}</td>
// 				<td>${badge}</td>
// 				<td class="right-align" style="width: 200px">
// 					<a href="#delete-dns" class="btn danger hover medium" data-dns_zone_id="${data.dnszoneID}" data-dns_zone_record_id="${data.dnszoneRecordID}" style="border-radius: 8px">Delete</a>
// 					<a
// 						href="#edit-dns"
// 						class="btn-flat primary hover"
// 						data-dns_zone_id="${data.dnszoneID}"
// 						data-dns_zone_record_id="${data.dnszoneRecordID}"
// 						data-type=${data.recordType}
// 						data-name=${data.recordName}
// 						data-value=${data.recordContent}
// 						data-ttl=${data.recordTTL}
// 						style="font-weight: 500 !important" />
// 						Edit
// 					</a>
// 				</td>
// 			</tr>`
// 		}
// 	}
// }
let nameservers_array = []
document.onreadystatechange = async () => {
	if (document.readyState == 'complete') {
		const profile = await get(appUrl('accounts/profile'));
		user_profile(profile)

		//  1. CHECK IF THE DOMAIN IS ACTIVATED. IF NOT THEN FUNCTION FOR ACTIVATING THE DOMAIN
		const activateDomain = await get(appUrl(`domain/status?domain_name=${document.querySelector('[data-id="domain-name"]').innerText}`))

		if (!activateDomain) {
			console.log('Request failed.')
			return
		}

		// 2. Set the website id of the domain into the domain button dropdown
		document.querySelector('#domain-dropdown-btn').dataset.website_id = activateDomain.website_id

		// 3. LOADING THE DNS FOR THE DOMAIN
		const dns = await get(appUrl(`domain/fetch-dns?website_id=${activateDomain.website_id}`))

		// // 4. If no data then add the message else render the DNS information on the table
		// if (dns.data.length == 0) {
		// 	document.querySelector('[data-id="dns-records-table"]').classList.add('hide')
		// 	document.querySelector('[data-id="no-dns-message"]').classList.remove('hide')
		// } else {
		// 	dns_render(dns.data)
		// }

		// 4. Render the DNS information on the table
		if (!dns.status) {
			document.querySelector('[data-id="error-screen"]').classList.remove('hide')
			return
		}
		dns_render(dns.data)
		// ns_render(dns.data)

		// 5. Remove the loading screen
		document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
	}
}

document.addEventListener('click', async (e) => {
	const add_dns = e.target.closest('[href*="add-dns"]')
	if (add_dns) {
		e.preventDefault()
		add_dns.classList.add('disabled')
		add_dns.innerHTML += '<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
		
		const domain_name = add_dns.dataset.value

		const domain_detail = await get(appUrl(`domain/details?domain_name=${domain_name}`))

		if (!domain_detail.status) {
			for (const key in domain_detail.data) {
				M.toast({
					html: `<p>${domain_detail.data[key][0]}</p>`,
				});
			}
			add_dns.classList.remove('disabled')
			add_dns.innerHTML = 'Add new record'
			return;
		}

		document.forms['add-dns-form']['dns_zone_id'].value = domain_detail.data.responseData.dnszoneId

		const add_dns_modal = M.Modal.getInstance(document.querySelector('#add-dns-modal'))
		add_dns_modal.open()

		add_dns.classList.remove('disabled')
		add_dns.innerHTML = 'Add new record'
	}

	const edit_dns = e.target.closest('[href*="edit-dns"]')
	if (edit_dns) {
		e.preventDefault()
		edit_dns.classList.add('disabled')
		
		const form = document.forms['edit-dns-form']
		form['dns_zone_id'].value = edit_dns.dataset.dns_zone_id
		form['dns_zone_record_id'].value = edit_dns.dataset.dns_zone_record_id
		form['record_type'].value = edit_dns.dataset.type
		form['record_name'].value = edit_dns.dataset.name
		form['record_value'].value = edit_dns.dataset.value
		form['record_ttl'].value = edit_dns.dataset.ttl

		M.updateTextFields()
		M.FormSelect.init(form['record_type'])
		
		const edit_dns_modal = M.Modal.getInstance(document.querySelector('#edit-dns-modal'))
		edit_dns_modal.open()
		edit_dns.classList.remove('disabled')
	}

	const delete_dns = e.target.closest('[href*="delete-dns"]')
	if (delete_dns) {
		e.preventDefault()
		delete_dns.classList.add('disabled')

		const response = await get(appUrl(`domain/delete-dns?dns_zone_id=${delete_dns.dataset.dns_zone_id}&dns_zone_record_id=${delete_dns.dataset.dns_zone_record_id}`))
		
		if (!response.status) {
			delete_dns.classList.remove('disabled')
			M.toast({
				html: response.message
			})
			return
		}

		const website_id = document.querySelector('[data-website_id]').dataset.website_id
		const dns = await get(appUrl(`domain/fetch-dns?website_id=${website_id}`))
		dns_render(dns.data)

		delete_dns.classList.remove('disabled')
	}

	const view_ns = e.target.closest('[href*="#nameserver"]')
	if (view_ns) {
		document.querySelector('[data-id="loading-wrapper"]').classList.add('active')
		const nameservers = await get(appUrl(`domain/details?domain_name=${view_ns.dataset.domain}`))
		if (!nameservers.status) {
			document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
			return
		}

		ns_render(nameservers.data.responseData)
		document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
	}

	const modify_ns = e.target.closest('[href*="modify-nameserver"]')
	if (modify_ns) {
		e.preventDefault()
		modify_ns.classList.add('disabled')
		modify_ns.innerHTML += '<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
		
		const domain_name = modify_ns.dataset.value

		const domain_detail = await get(appUrl(`domain/details?domain_name=${domain_name}`))

		if (!domain_detail.status) {
			for (const key in domain_detail.data) {
				M.toast({
					html: `<p>${domain_detail.data[key][0]}</p>`,
				});
			}
			modify_ns.classList.remove('disabled')
			modify_ns.innerHTML = 'Add Name Server'
			return;
		}

		document.forms['modify-ns-form']['domain_name_id'].value = domain_detail.data.responseData.domainNameId
		document.forms['modify-ns-form']['website_name'].value = domain_detail.data.responseData.websiteName

		ns_input_render()

		const modify_ns_modal = M.Modal.getInstance(document.querySelector('#modify-ns-modal'))
		modify_ns_modal.open()

		modify_ns.classList.remove('disabled')
		modify_ns.innerHTML = 'Add Name Server'
	}

	const add_ns = e.target.closest('[href*="add-nameserver"]')
	if (add_ns) {
		e.preventDefault()

		if (nameservers_array.length < 8) {
			nameservers_array.push('')
			ns_input_render()
		} else {
			M.toast({
				html: '<p>Can\'t add more Nameservers'
			})
		}
	}

	const delete_ns = e.target.closest('[data-id="delete-nameserver"]')
	if (delete_ns) {
		e.preventDefault()

		const index = delete_ns.dataset.index
		nameservers_array.splice(index, 1)
		ns_input_render()
	}

	const edit_ns = e.target.closest('[data-id="edit-ns"]')
	if (edit_ns) {
		e.preventDefault()

		edit_ns.classList.add('disabled')
		// edit_ns.innerHTML += '<div class="preloader-wrapper tiny active"><div class="spinner-layer spinner-primary-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>'
		
		const form = document.forms['edit-ns-form']
		form['dns_zone_id'].value = edit_ns.dataset.dns_zone_id
		form['dns_zone_record_id'].value = edit_ns.dataset.dns_zone_record_id
		form['record_value'].value = edit_ns.dataset.value

		M.updateTextFields()
		M.FormSelect.init(form['record_type'])
		
		const edit_ns_modal = M.Modal.getInstance(document.querySelector('#edit-ns-modal'))
		edit_ns_modal.open()
		edit_ns.classList.remove('disabled')
		// edit_ns.innerHTML

	}
})

document.addEventListener('focusout', (e) => {
	const ns_input = e.target.closest('[data-id="ns-input"]')
	if (ns_input) {
		const index = ns_input.dataset.index
		nameservers_array[index] = ns_input.value
	}
})

document.forms['add-dns-form'].addEventListener('submit', async (e) => {
	e.preventDefault()
	document.querySelector('#add-dns-modal .modal-footer').classList.add('disabled')

	const form = document.forms['add-dns-form']

	const response = await post(form)

	if (!response.status) {
		if (response.data.statusCode == 412) {
			for (const key in response.data.errors) {
				form[key].classList.add('invalid')
			}
			M.toast({
				html: `Please fill all the required fields.`
			})
			document.querySelector('#add-dns-modal .modal-footer').classList.remove('disabled')
			return
		}

		M.toast({
			html: '<p>Cannot add the DNS record. Please contact the support team</p>'
		})
		document.querySelector('#add-dns-modal .modal-footer').classList.remove('disabled')
		return
	}

	const website_id = document.querySelector('[data-website_id]').dataset.website_id
	const dns = await get(appUrl(`domain/fetch-dns?website_id=${website_id}`))
	dns_render(dns.data)

	const add_dns_modal = M.Modal.getInstance(document.querySelector('#add-dns-modal'))
	add_dns_modal.close()
	form.reset()
	document.querySelector('#add-dns-modal .modal-footer').classList.remove('disabled')
})

document.forms['modify-ns-form'].addEventListener('submit', async (e) => {
	e.preventDefault()
	document.querySelector('#modify-ns-modal .modal-footer').classList.add('disabled')

	const form = document.forms['modify-ns-form']
	const response = await post(form)

	console.log(response)

	document.querySelector('#modify-ns-modal .modal-footer').classList.remove('disabled')
})

const dns_render = (data) => {
	document.querySelector('[data-id="dns-records-table"] tbody').innerHTML = ''

	for (const dns of data) {
		if (dns.recordType != 'NS' && dns.recordType != 'SOA') {
			document.querySelector('[data-id="dns-records-table"] tbody').innerHTML += `<tr>
				<td>
					<span class="grey-text small-text medium">Type</span>
					<br>
					${dns.recordType}
				</td>
				<td>
					<span class="grey-text small-text medium">Name</span>
					<br>
					${dns.recordName}
				</td>
				<td>
					<span class="grey-text small-text medium">Data</span>
					<br>
					<span class="truncate-1 tooltipped" data-position="bottom" data-tooltip="${dns.recordContent}">${dns.recordContent}</span>
				</td>
				<td>
					<span class="grey-text small-text medium">TTL</span>
					<br>
					${dns.recordTTL}
				</td>
				<td>
					<div class="group-btn" style="align-items: center; margin: 0">
						<a
							href="#delete-dns"
							class="btn"
							data-dns_zone_id="${dns.dnszoneID}"
							data-dns_zone_record_id="${dns.dnszoneRecordID}">
							<i class="material-symbols-rounded">delete</i>
						</a>
						<a
							href="#edit-dns"
							class="btn"
							data-dns_zone_id="${dns.dnszoneID}"
							data-dns_zone_record_id="${dns.dnszoneRecordID}"
							data-type=${dns.recordType}
							data-name=${dns.recordName}
							data-value=${dns.recordContent}
							data-ttl=${dns.recordTTL}
							data-id="edit-dns">
							<i class="material-symbols-rounded">edit</i>
						</a>
					</div>
				</td>
			</tr>`
		}
	}
}

const ns_render = (data) => {
	document.querySelector('[data-id="ns-records-table"] tbody').innerHTML = ''

	if (data.nameserver1 != '') {
		nameservers_array.push(data.nameserver1)
		document.querySelector('[data-id="ns-records-table"] tbody').innerHTML += `<tr>
			<td>
				<span class="grey-text small-text medium">Name Server</span>
				<br>
				${data.nameserver1}
			</td>
		</tr>`
	}

	if (data.nameserver2 != '') {
		nameservers_array.push(data.nameserver2)
		document.querySelector('[data-id="ns-records-table"] tbody').innerHTML += `<tr>
			<td>
				<span class="grey-text small-text medium">Name Server</span>
				<br>
				${data.nameserver2}
			</td>
		</tr>`
	}

	if (data.nameserver3 != '') {
		nameservers_array.push(data.nameserver3)
		document.querySelector('[data-id="ns-records-table"] tbody').innerHTML += `<tr>
			<td>
				<span class="grey-text small-text medium">Name Server</span>
				<br>
				${data.nameserver3}
			</td>
		</tr>`
	}

	if (data.nameserver4 != '') {
		nameservers_array.push(data.nameserver4)
		document.querySelector('[data-id="ns-records-table"] tbody').innerHTML += `<tr>
			<td>
				<span class="grey-text small-text medium">Name Server</span>
				<br>
				${data.nameserver4}
			</td>
		</tr>`
	}

	if (data.nameserver5 != '') {
		nameservers_array.push(data.nameserver5)
		document.querySelector('[data-id="ns-records-table"] tbody').innerHTML += `<tr>
			<td>
				<span class="grey-text small-text medium">Name Server</span>
				<br>
				${data.nameserver5}
			</td>
		</tr>`
	}

	if (data.nameserver6 != '') {
		nameservers_array.push(data.nameserver6)
		document.querySelector('[data-id="ns-records-table"] tbody').innerHTML += `<tr>
			<td>
				<span class="grey-text small-text medium">Name Server</span>
				<br>
				${data.nameserver6}
			</td>
		</tr>`
	}

	if (data.nameserver7 != '') {
		nameservers_array.push(data.nameserver7)
		document.querySelector('[data-id="ns-records-table"] tbody').innerHTML += `<tr>
			<td>
				<span class="grey-text small-text medium">Name Server</span>
				<br>
				${data.nameserver7}
			</td>
		</tr>`
	}

	if (data.nameserver8 != '') {
		nameservers_array.push(data.nameserver8)
		document.querySelector('[data-id="ns-records-table"] tbody').innerHTML += `<tr>
			<td>
				<span class="grey-text small-text medium">Name Server</span>
				<br>
				${data.nameserver8}
			</td>
		</tr>`
	}
}

const ns_input_render = () => {
	document.querySelector('#modify-ns-modal .modal-content .nameserver-container').innerHTML = ''

	nameservers_array.forEach((item, index) => {
		const div = document.createElement('div')
		div.classList.add('input-field', 'nameserver-wrapper')
		// div.id = 'nameserver-' + index

		const input = document.createElement('input')
		input.name = 'nameserver[]'
		input.type = 'text'
		input.dataset.id = 'ns-input'
		input.dataset.index = index
		input.placeholder = `Nameserver ${index + 1}`
		input.value = item

		const button = document.createElement('button')
		button.classList.add('btn')
		button.dataset.id = 'delete-nameserver'
		// button.dataset.value = 'nameserver-' + index
		button.dataset.index = index
		button.innerHTML = '<i class="material-symbols-rounded">delete</i>'

		div.appendChild(input)
		div.appendChild(button)

		document.querySelector('#modify-ns-modal .modal-content .nameserver-container').appendChild(div)
	})
}