'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
var nano = require('gulp-cssnano');
var rename = require('gulp-rename');
gulp.task('sass', function () {
  return gulp.src('./wx-assets/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./css'))
    .pipe(nano(), { safe: true })
  .pipe(rename({
    suffix: ".min",
  }))
  
    .pipe(gulp.dest('./css'));
});
 
gulp.task('sass:watch', function () {
  gulp.watch('./wx-assets/**/*.scss', ['sass']);
});

