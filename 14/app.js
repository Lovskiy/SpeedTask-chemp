let square = document.querySelector('.square')
let halfWidth = window.innerWidth / 2

document.addEventListener('mousemove', function (event) {
	if (event.clientX < halfWidth) {
		square.classList.remove('black')
		square.classList.add('white')
	} else {
		square.classList.remove('white')
		square.classList.add('black')
	}
})
