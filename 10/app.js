const imageContainer = document.getElementById('image-container')
const maskElement = document.getElementById('mask')

// получения размеров контейнера с изображением
const { width, height } = imageContainer.getBoundingClientRect()

// Позиционируем маску в центре изображения
maskElement.style.width = `${width}px`
maskElement.style.height = `${height}px`

// Получаем координаты центра изображения
const centerX = width / 2
const centerY = height / 2

// Устанавливаем радиус окружности для нашей маски
const radius = 100

// Устанавливаем координаты границы окружности
const topBoundary = centerY - radius
const leftBoundary = centerX - radius
const bottomBoundary = centerY + radius
const rightBoundary = centerX + radius

// Устанавливаем размеры и позиционирование маски
maskElement.style.clipPath = `circle(${radius}px at ${centerX}px ${centerY}px)`
maskElement.style.opacity = 1
