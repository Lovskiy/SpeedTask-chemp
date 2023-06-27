const bgImg = new Image()
bgImg.src = './1920x1200.jpeg'
const patternWidth = 150
const patternHeight = 200

const canvas = document.createElement('canvas')
const ctx = canvas.getContext('2d')
canvas.width = window.innerWidth
canvas.height = window.innerHeight
document.body.appendChild(canvas)

bgImg.onload = () => {
	const pattern = ctx.createPattern(bgImg, 'repeat')
	ctx.fillStyle = pattern
	ctx.fillRect(0, 0, canvas.width, canvas.height)
	document.body.style.background = `url(${canvas.toDataURL()})`
}
