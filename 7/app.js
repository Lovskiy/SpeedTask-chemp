function findLongestPalindrome(str) {
	let longestPalindrome = ''

	for (let i = 0; i < str.length; i++) {
		for (let j = i + 1; j <= str.length; j++) {
			const substring = str.slice(i, j)

			if (
				isPalindrome(substring) &&
				substring.length > longestPalindrome.length
			) {
				longestPalindrome = substring
			}
		}
	}

	return longestPalindrome
}

function isPalindrome(str) {
	return str === str.split('').reverse().join('')
}

const str = 'abcbaaabbaccccccbcbacbacbacbabcabcabc'

const longestPalindrome = findLongestPalindrome(str)

console.log(longestPalindrome)
