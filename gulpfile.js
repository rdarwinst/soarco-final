import path from 'path';
import fs from 'fs';
import { glob } from 'glob';

import { src, dest, watch, series } from 'gulp';
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
const sass = gulpSass(dartSass);

import concat from 'gulp-concat';
import rename from 'gulp-rename';
import terser from 'gulp-terser';

import sharp from 'sharp';

// Rutas

const paths = {
  sass: 'src/scss/**/*.scss',
  js: 'src/js/**/*.js',
  img: 'src/img/**/*.{jpg,png,svg}',
};

export function css(done) {
  src(paths.sass, { sourcemaps: true })
    .pipe(sass({
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe(dest('./public/build/css', { sourcemaps: '.' }))
  done();
};

export function webfonts(done) {
  src(paths.fonts)
    .pipe(dest('./public/build/webfonts'));
  done();
}

export async function imagenes(done) {
  try {
    const srcDir = './src/img';
    const buildDir = './public/build/img';
    const images = await glob('./src/img/**/*.{jpg,png,svg}'); // Nota el cambio aquí: `{jpg,png,svg}`

    for (const file of images) {
      const relativePath = path.relative(srcDir, path.dirname(file));
      const outputSubDir = path.join(buildDir, relativePath);

      if (path.extname(file) === '.svg') {
        await copySvg(file, outputSubDir);
      } else {
        await procesarImagenes(file, outputSubDir);
      }
    }
  } catch (error) {
    console.error('Error processing images:', error);
  } finally {
    done();
  }
}

async function copySvg(file, outputSubDir) {
  if (!fs.existsSync(outputSubDir)) {
    fs.mkdirSync(outputSubDir, { recursive: true });
  }
  const outputFile = path.join(outputSubDir, path.basename(file));
  fs.copyFileSync(file, outputFile);
}

async function procesarImagenes(file, outputSubDir) {
  if (!fs.existsSync(outputSubDir)) {
    fs.mkdirSync(outputSubDir, { recursive: true });
  }
  const baseName = path.basename(file, path.extname(file));
  const extName = path.extname(file);
  const outputFile = path.join(outputSubDir, `${baseName}${extName}`);
  const outputFileWebp = path.join(outputSubDir, `${baseName}.webp`);
  const outputFileAvif = path.join(outputSubDir, `${baseName}.avif`);

  // Configuración de calidad y fondo transparente
  const options = { quality: 80 };

  // Procesar imágenes manteniendo la transparencia
  const image = sharp(file);

  if (extName === '.png') {
    await Promise.all([
      image.toFile(outputFile), // Mantiene el PNG original
      image.webp({ ...options, alphaQuality: 100 }).toFile(outputFileWebp), // WebP con transparencia
      image.avif({ ...options, alphaQuality: 100 }).toFile(outputFileAvif) // AVIF con transparencia
    ]);
  } else {
    // Convertir a JPEG (que no soporta transparencia)
    await Promise.all([
      image.jpeg(options).toFile(outputFile),
      image.webp(options).toFile(outputFileWebp),
      image.avif(options).toFile(outputFileAvif)
    ]);
  }
}

export function js(done) {
  src(paths.js)
    .pipe(concat('bundle.js'))
    .pipe(terser())
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest('./public/build/js'))
  done();
};

export function dev() {
  watch(paths.sass, css);
  watch(paths.js, js);
  // watch(paths.img, imagenes);
};

export default series(imagenes, js, css, dev);