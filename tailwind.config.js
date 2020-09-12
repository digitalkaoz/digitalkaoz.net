module.exports = {
	future: {
		removeDeprecatedGapUtilities: true,
		purgeLayersByDefault: true,
	},
	purge: [
		'./src/template.html',
		'./src/routes/*.svelte',
		'./src/components/*.svelte'
	],
	theme: {
		extend: {},
	},
	variants: {},
	plugins: [],
}
