"use strict";

const gulp = require('gulp');
const rename = require('gulp-rename');
const plumber = require('gulp-plumber');
const sass = require("gulp-sass");
const postcss = require("gulp-postcss");
const cssnano = require("cssnano");
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require("browser-sync").create();
const autoprefixer = require('autoprefixer');


// Configuration file to keep your code DRY
var cfg = require('./gulpconfig.json');
var paths = cfg.paths;

// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task('sass', function () {
  var stream = gulp
    .src(paths.sass + '/*.scss')
    .pipe(
      plumber({
        errorHandler: function (err) {
          console.log(err);
          this.emit('end');
        }
      })
    )
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(sass({ errLogToConsole: true }))
    .pipe(postcss([autoprefixer()]))
    .pipe(sourcemaps.write(undefined, { sourceRoot: null }))
    .pipe(gulp.dest(paths.css));
  return stream;
});

// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
gulp.task('watch', function () {
  gulp.watch(`${paths.sass}/**/*.scss`, gulp.series('styles'));
});

// Run:
// gulp imagemin
// Running image optimizing task
// gulp.task('imagemin', function () {
//   gulp
//     .src(`${paths.imgsrc}/**`)
//     .pipe(imagemin())
//     .pipe(gulp.dest(paths.img));
// });

/**
 * Ensures the 'imagemin' task is complete before reloading browsers
 * @verbose
 */
// gulp.task(
//   'imagemin-watch',
//   gulp.series('imagemin', function () {
//     browserSync.reload();
//   })
// );

// Run:
// gulp cssnano
// Minifies CSS files
gulp.task('cssnano', function () {
  return gulp
    .src(paths.css + '/theme.css')
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(
      plumber({
        errorHandler: function (err) {
          console.log(err);
          this.emit('end');

        }
      })
    )
    .pipe(rename({ suffix: '.min' }))
    .pipe(cssnano({ discardComments: { removeAll: true } }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.css));
});

gulp.task('minifycss', function () {
  return gulp
    .src(`${paths.css}/theme.css`)
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(cleanCSS({ compatibility: '*' }))
    .pipe(
      plumber({
        errorHandler: function (err) {
          console.log(err);
          this.emit('end');
        }
      })
    )
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.css));
});

gulp.task('cleancss', function () {
  return gulp
    .src(`${paths.css}/*.min.css`, { read: false }) // Much faster
    .pipe(ignore('theme.css'))
    .pipe(rimraf());
});

gulp.task('styles', function (callback) {
  gulp.series('sass', 'minifycss')(callback);
});

// Run:
// gulp browser-sync
// Starts browser-sync task for starting the server.
gulp.task('browser-sync', function () {
  browserSync.init(cfg.browserSyncWatchFiles, cfg.browserSyncOptions);
});


// Deleting any file inside the /src folder
gulp.task('clean-source', function () {
  return del(['src/**/*']);
});

// Run:
// gulp watch-bs
// Starts watcher with browser-sync. Browser-sync reloads page automatically on your browser
gulp.task('watch-bs', gulp.parallel('browser-sync', 'watch'));

// Run:
// gulp
// Starts watcher (default task)
gulp.task('default', gulp.series('watch'));
