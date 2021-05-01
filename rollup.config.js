import postcss from "rollup-plugin-postcss";
import autoprefixer from "autoprefixer";
import normalize from "postcss-normalize";

export default {
	input: "src/scripts/index.js",
	output: {
		file: "dist/bundle.js",
		format: "iife",
	},
	plugins: [
		postcss({
			extract: "main.css",
			plugins: [autoprefixer, normalize],
		}),
	],
};
