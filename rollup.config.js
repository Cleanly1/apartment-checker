import postcss from 'rollup-plugin-postcss'
import autoprefixer from 'autoprefixer'

export default {
	input: 'src/scripts/index.js',
	output: {
	  file: 'dist/bundle.js',
	  format: 'iife'
	},
	plugins: [
		postcss({
		  extract: 'main.css',
		  plugins: [autoprefixer]
		}),
	  ]
  };

