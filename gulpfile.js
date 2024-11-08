// Load Gulp and plugins
const gulp = require("gulp");
const sass = require("gulp-dart-sass");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const sourcemaps = require("gulp-sourcemaps");
const cleanCSS = require("gulp-clean-css");
const uglify = require("gulp-uglify");
const rename = require("gulp-rename"); // For renaming minified files

// File paths
const paths = {
	scss: "sass/main.scss", // Only compile main.scss
	css: "css/", // Root folder for compiled CSS
	js: "js/**/*.js",
	distJs: "./", // Root folder for minified JS
};

// Sass Task: Compile regular and minified CSS
function style() {
	// Compile regular CSS
	gulp
		.src(paths.scss)
		.pipe(sourcemaps.init())
		.pipe(sass().on("error", sass.logError))
		.pipe(postcss([autoprefixer()]))
		.pipe(sourcemaps.write("."))
		.pipe(gulp.dest(paths.css)); // Output: main.css in root

	// Compile minified CSS with a different name
	return gulp
		.src(paths.scss)
		.pipe(sass().on("error", sass.logError))
		.pipe(postcss([autoprefixer()]))
		.pipe(cleanCSS({ level: 2 }))
		.pipe(rename({ basename: "main", suffix: ".min" })) // Output: main.min.css
		.pipe(gulp.dest(paths.css)); // Save to root directory
}

// JavaScript Task: Minify JavaScript files
function scripts() {
	return gulp
		.src(paths.js)
		.pipe(uglify())
		.pipe(rename({ suffix: ".min" })) // Rename to *.min.js
		.pipe(gulp.dest(paths.distJs));
}

// Watch Task: Watch for changes in Sass and JS files
function watch() {
	gulp.watch("sass/**/*.scss", style); // Watch all .scss files for changes
	gulp.watch(paths.js, scripts); // Watch all .js files for changes
}

// Default Gulp task
exports.default = gulp.series(gulp.parallel(style, scripts), watch);
