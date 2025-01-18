/* SASS */
const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

/* JS */
const terser = require('gulp-terser');

/* Imagenes */
const imagemin = require('gulp-imagemin');
const avif = require('gulp-avif');
const webp = require('gulp-webp');

/* Otras dependencias */
const rename = require('gulp-rename');
const concat = require('gulp-concat');
const sourcemaps = require('gulp-sourcemaps');

function css(done) {

    src('./node_modules/font-awesome/fonts/**/*')
    .pipe(dest('./public/build/fonts'));

    src('src/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./public/build/css'))
    done();
}

function imagenes(done) {
    src('src/img/**/*')
        .pipe(imagemin({ optimizationLevel: 3 }))
        .pipe(dest('./public/build/img'))
    done();
}

function convertirAvif(done) {
    const opciones = {
        quality: 70
    };

    src('./public/build/img/*.{jpg, jpeg, png}')
        .pipe(avif(opciones))
        .pipe(dest('./public/build/img/'))
    done();
}

function convertirWebp(done) {
    const opciones = {
        quality: 70
    };

    src('./public/build/img/*.{jpg, jpeg, png}')
        .pipe(webp(opciones))
        .pipe(dest('./public/build/img/'))
    done();
}

function js(done) {
    src('src/js/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js'))
        .pipe(terser())
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./public/build/js'));
    done();
}

function dev() {
    watch('src/scss/**/*.scss', css);
    watch('src/js/**/*.js', js);
}

exports.css = css;
exports.imagenes = imagenes;
exports.convertirAvif = convertirAvif;
exports.convertirWebp = convertirWebp;
exports.js = js;

exports.default = series(imagenes, convertirAvif, convertirWebp, dev);