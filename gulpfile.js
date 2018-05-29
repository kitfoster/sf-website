'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var postcss = require('gulp-postcss');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('autoprefixer');
var del = require('del');

var sassFiles = './wp-content/themes/sinisgallifoster/sass/**/*.scss'
var cssDest = './wp-content/themes/sinisgallifoster/';
var cssFiles = cssDest + 'style.css';

gulp.task("clean", function () {
  return del(cssFiles);
});

gulp.task('sass', function () {
  return gulp.src(sassFiles)
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest(cssDest));
});

gulp.task('watch', function () {
  gulp.watch(sassFiles, ['sass']);
});

gulp.task('autoprefixer', function () {
    return gulp.src(cssFiles)
        .pipe(sourcemaps.init())
        .pipe(postcss([ autoprefixer() ]))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(cssDest));
});


gulp.task('build', ['clean'], function () {
  gulp.start( ['sass', 'autoprefixer'] );
});
gulp.task('default', ['clean', 'sass', 'autoprefixer']);