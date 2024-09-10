document.addEventListener('DOMContentLoaded', async () => {
	document.querySelectorAll('.nav-btn').forEach(element => {
		element.classList.remove('active')
	})
	document.querySelector('[data-id="emails"]').classList.add('active')

	document.querySelector('[data-id="loading-wrapper"]').classList.remove('active')
})