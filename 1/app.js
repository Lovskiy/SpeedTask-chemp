// Параметры
const MAX_WIDTH = 1000
const MAX_HEIGHT = 700

function resizeImage(img) {
	let width = img.width
	let height = img.height

	// Если исходная картинка меньше заданных размеров, то возвращаем без изменений

	if (width <= MAX_WIDTH && height <= MAX_HEIGHT) {
		return
	}

	let aspectRatio = width / height

	if (width > MAX_WIDTH) {
		width = MAX_WIDTH
		height = width / aspectRatio
	}

	if (height > MAX_HEIGHT) {
		height = MAX_HEIGHT
		width = height * aspectRatio
	}

	img.width = width
	img.height = height
}

// Получаем все изображения внутри контейнера
let images = document.querySelectorAll('.image-container > img')

images.forEach(img => {
	img.addEventListener('load', () => {
		resizeImage(img)
	})
})
