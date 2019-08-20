var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var cleanCSS = require('gulp-clean-css');

// Task 'watch' - Run with command 'gulp watch'
gulp.task('watch',['sass'], function() {
	gulp.watch('./assets/sass/**/*.scss', ['sass']);
});

gulp.task('sass', function(){
	return gulp.src('./assets/sass/app.scss')
	.pipe(sass().on('error', sass.logError))
	.pipe(concat('style.css'))
	.pipe(cleanCSS())
	.pipe(gulp.dest('./dist/css/'));
});