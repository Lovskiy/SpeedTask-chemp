const container = document.getElementById('container')

let circles = []

// Создание случайного числа в заданном диапазоне
function randomInRange(min, max) {
	return Math.floor(Math.random() * (max - min + 1) + min)
}

// Создание окружности
function createCircle() {
	const circle = document.createElement('div')
	circle.classList.add('circle')
	circle.style.width = randomInRange(50, 100) + 'px'
	circle.style.height = circle.style.width
	circle.style.backgroundColor =
		'rgb(' +
		randomInRange(0, 255) +
		',' +
		randomInRange(0, 255) +
		',' +
		randomInRange(0, 255) +
		')'
	circle.style.left =
		randomInRange(0, container.offsetWidth - parseInt(circle.style.width)) +
		'px'
	circle.style.top =
		randomInRange(0, container.offsetHeight - parseInt(circle.style.height)) +
		'px'
	circle.vx = randomInRange(-5, 5)
	circle.vy = randomInRange(-5, 5)
	container.appendChild(circle)
	circles.push(circle)
}

// Создание нескольких окружностей
function createCircles(count) {
	for (let i = 0; i < count; i++) {
		createCircle()
	}
}

// Обновление позиции окружности
function updateCirclePosition(circle) {
	const x = parseInt(circle.style.left) + circle.vx
	const y = parseInt(circle.style.top) + circle.vy
	if (x < 0 || x > container.offsetWidth - parseInt(circle.style.width)) {
		circle.vx *= -1
	}
	if (y < 0 || y > container.offsetHeight - parseInt(circle.style.height)) {
		circle.vy *= -1
	}
	circle.style.left = x + 'px'
	circle.style.top = y + 'px'
}

// Обновление позиции всех окружностей
function updateCirclesPosition() {
	circles.forEach(circle => {
		updateCirclePosition(circle)
	})
}

// Отталкивание окружностей от курсора мыши
function repelCircleFromCursor(circle, cursorX, cursorY) {
	if (
		cursorX > parseInt(circle.style.left) &&
		cursorX < parseInt(circle.style.left) + parseInt(circle.style.width) &&
		cursorY > parseInt(circle.style.top) &&
		cursorY < parseInt(circle.style.top) + parseInt(circle.style.height)
	) {
		const dx =
			cursorX - (parseInt(circle.style.left) + parseInt(circle.style.width) / 2)
		const dy =
			cursorY - (parseInt(circle.style.top) + parseInt(circle.style.height) / 2)
		const distance = Math.sqrt(dx * dx + dy * dy)
		if (distance < 100) {
			circle.vx += dx / 100
			circle.vy += dy / 100
		}
	}
}

// Обновление позиции окружностей и отталкивание их от курсора мыши
function update() {
	const cursorX = event.clientX
	const cursorY = event.clientY
	updateCirclesPosition()
	circles.forEach(circle => {
		repelCircleFromCursor(circle, cursorX, cursorY)
	})
}

createCircles(20)
container.addEventListener('mousemove', update)
setInterval(updateCirclesPosition, 20)
