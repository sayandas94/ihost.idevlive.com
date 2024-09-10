document.addEventListener('DOMContentLoaded', () => {
	
})

document.addEventListener('click', async (e) => {
	const deleteItem = e.target.closest('.cart-delete-btn')
	if (deleteItem) {
		e.preventDefault()

		const url = deleteItem.href + '/' + deleteItem.dataset.id

		const response = await get(url)

		if (!response.status) {
			M.toast({
				html: response.message
			})
			return
		}

		window.location = response.data.cart_url
	}

	const hosting_duration_dropdown = e.target.closest('.select-duration-btn')
	if (hosting_duration_dropdown) {
		// const response = await get(apiUrl(''))
	}
})