const mode = process.env.NODE_ENV
const dev = mode === 'development'

const tailwindcss = require("tailwindcss");

module.exports = {
	plugins: [
		tailwindcss("./tailwind.config.js"),
		require("autoprefixer"),
		require('postcss-preset-env')({
			features: {
				'nesting-rules': true,
			},
		}),

		// Minify if prod
		!dev &&
		require('cssnano')({
			preset: ['default', { discardComments: { removeAll: true } }],
		}),
	],
};
