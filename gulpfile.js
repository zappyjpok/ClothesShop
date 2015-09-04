var gulp = require('gulp'),
    gutil = require('gulp-util'),
    browserify = require('gulp-browserify'),
    concat = require('gulp-concat');

var jsSources = [
    'App/Resources/js/validation.js',
    'App/Resources/js/main.js'
];

gulp.task('js', function(){
   gulp.src(jsSources)
       .pipe(concat('all.js'))
       .pipe(browserify())
       .pipe(gulp.dest('Public/JS'))
});