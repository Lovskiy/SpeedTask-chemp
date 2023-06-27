const distanceSpan = document.getElementById('distance')

function calculateDistance(x1, y1, x2, y2) {
	const xDiff = x2 - x1
	const yDiff = y2 - y1

	const distance = Math.sqrt(xDiff * xDiff + yDiff * yDiff)

	return distance
}

distanceSpan.textContent = calculateDistance(0, 0, 3, 4)
