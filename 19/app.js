var canvas = document.getElementById('canvas')
var ctx = canvas.getContext('2d')

var isDrawing = false

// Функция, отслеживающая событие нажатия кнопки мыши на элементе canvas
canvas.addEventListener('mousedown', function (event) {
	// Указываем, что курсор мыши нажат
	isDrawing = true

	// event.clientX - координаты курсора мыши по оси X в контексте страницы
	// canvas.offsetLeft - отступ элемента canvas от левой границы страницы
	var startX = event.clientX - canvas.offsetLeft
	var startY = event.clientY - canvas.offsetTop

	// Начинаем рисовать линию
	ctx.beginPath()
	ctx.moveTo(startX, startY)
})

// Функция, отслеживающая событие перемещения курсора мыши по элементу canvas
canvas.addEventListener('mousemove', function (event) {
	if (isDrawing) {
		// event.clientX - координаты курсора мыши по оси X в контексте страницы
		// canvas.offsetLeft - отступ элемента canvas от левой границы страницы
		var currentX = event.clientX - canvas.offsetLeft
		var currentY = event.clientY - canvas.offsetTop
		ctx.lineTo(currentX, currentY)
		ctx.stroke()
	}
})

// Функция, отслеживающая событие отпускания кнопки мыши на элементе canvas
canvas.addEventListener('mouseup', function (event) {
	// Указываем, что курсор мыши отжат
	isDrawing = false
})
