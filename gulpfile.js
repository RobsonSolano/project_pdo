
const { src, dest, watch } = require('gulp');
const compileSass = require('gulp-sass')(require('sass'));
const minifyCss = require('gulp-clean-css');
const sourceMaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');

compileSass.compiler = require('node-sass');

const build = () => {
    return src('assets_dev/scss/style.scss')
    .pipe(sourceMaps.init())
        .pipe(compileSass().on('error', compileSass.logError))
        .pipe(minifyCss())
        .pipe(sourceMaps.write())
        .pipe(concat('style.min.css'))
        .pipe(dest('assets/css/'));
}

const watching = () => {
    watch('assets_dev/scss/*.scss', build);
}

exports.build = build;
exports.watching = watching;