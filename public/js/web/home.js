let features_scroll_start_pos, features_scroll_end_pos

document.addEventListener('click', (e) => {
	const feature_open = e.target.closest('.features-btn')
	if (feature_open) {
		e.preventDefault()
		const id = feature_open.getAttribute('href')
		document.querySelector(id).classList.add('active')
	}

	const feature_close = e.target.closest('[data-id="feature-close-btn"]')
	if (feature_close) {
		e.preventDefault()
		const id = feature_close.getAttribute('href')
		document.querySelector(id).classList.remove('active')
	}
})

document.addEventListener('touchstart', (e) => {
	const features_scroll_start = e.target.closest('.features-card')
	if (features_scroll_start) {
		features_scroll_start_pos = e.touches[0].clientX
	}
})

document.addEventListener('touchend', (e) => {
	const features_scroll_end = e.target.closest('.features-card')
	if (features_scroll_end) {
		features_scroll_end_pos
		features_scroll_end_pos = e.changedTouches[0].clientX

		if (features_scroll_start_pos - features_scroll_end_pos > 0) {
			scroll_position = document.querySelector('.features-wrapper').children[0].offsetWidth + 24
			document.querySelector('.features-wrapper').scrollLeft += scroll_position
		} else {
			scroll_position = document.querySelector('.features-wrapper').children[0].offsetWidth + 24
			document.querySelector('.features-wrapper').scrollLeft -= scroll_position
		}
	}
})