var gulp = require('gulp'),
    gutil = require('gulp-util'),
    browserify = require('gulp-browserify'),
    concat = require('gulp-concat'),
    sass = require('gulp-sass');

var jsSources = [
    'App/Resources/js/vendor/jquery.js',
    'App/Resources/js/vendor/modernizr.js',
    'App/Resources/js/validation.js',
    'App/Resources/js/foundation.js',
    'App/Resources/js/main.js',
    'App/Resources/js/tooltip.js'
];

gulp.task('js', function(){
   gulp.src(jsSources)
       .pipe(concat('all.js'))
       .pipe(gulp.dest('Public/JS'))
});

gulp.task('styles', function(){
    return gulp.src([
        './App/Resources/scss/app.scss'
    ])
    .pipe(sass())
    .pipe(concat('app.css'))
    .on('error', gutil.log)
    .pipe(gulp.dest('Public/CSS'))
});

