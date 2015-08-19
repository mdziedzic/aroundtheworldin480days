/*global require */

var gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    uglifycss = require('gulp-uglifycss'),
    minifycss = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    imagemin = require('gulp-imagemin'),
    htmlreplace = require('gulp-html-replace'),
    rename    = require('gulp-rename'),
    del = require('del'),
    preservetime = require('gulp-preservetime');

// delete the build directory
gulp.task('clean', function() {
    return del('build/');
});

gulp.task('js', ['root'], function () {
    gulp.src(['wp-content/themes/480days/js/480days.js', 'wp-content/themes/480days/js/map.js',
                'wp-content/themes/480days/js/jquery.cookie.js'])
        .pipe(uglify())
        .pipe(concat('app.js'))
        .pipe(gulp.dest('build/wp-content/themes/480days/js/'));
    gulp.src(['wp-content/themes/480days/js/jquery-2.1.4.min.js', 'wp-content/themes/480days/js/email.js', 
                'wp-content/themes/480days/js/next-day.js', 'wp-content/themes/480days/js/prev-day.js'])
        .pipe(uglify())    
        .pipe(gulp.dest('build/wp-content/themes/480days/js/'));
});

gulp.task('css', ['root'], function () {
    gulp.src('wp-content/themes/480days/*.css')
        .pipe(minifycss())
        .pipe(gulp.dest('build/wp-content/themes/480days/'));
});


gulp.task('root', ['clean'], function () {
    gulp.src('wp-admin/**/*', { "base" : 'wp-admin'})
        .pipe(gulp.dest('build/wp-admin/'))
        .pipe(preservetime());
    gulp.src('wp-admin/.htaccess', { "base" : 'wp-admin'})
        .pipe(gulp.dest('build/wp-admin/'))
        .pipe(preservetime());
    gulp.src('wp-includes/**/*', { "base" : 'wp-includes'})
        .pipe(gulp.dest('build/wp-includes/'))
        .pipe(preservetime());
    gulp.src(['wp-content/**/*', '!wp-content/themes/480days/*.css', '!wp-content/themes/480days/js/*',
             '!wp-content/themes/480days/footer.php'], { "base" : 'wp-content'})
        .pipe(gulp.dest('build/wp-content/'))
        .pipe(preservetime());
    return gulp.src(['*.html', '*.php', '*.txt', '!.htaccess', '!wp-config.php'])
        .pipe(gulp.dest('build/'))
        .pipe(preservetime());
});

gulp.task('htmladjust', ['root'], function () {
    gulp.src('wp-content/themes/480days/footer.php')
        .pipe(htmlreplace({
            'jsfooter': {
                src: '<?php bloginfo("stylesheet_directory"); ?>/js/app.js',
                tpl: '<script type="text/javascript" src="%s"></script>'
            }
        }))
        .pipe(gulp.dest('build/wp-content/themes/480days'));
});

//gulp.task('default', ['clean', 'root', 'js', 'css', 'image', 'htmladjust']);
gulp.task('default', ['root', 'css', 'js', 'htmladjust']);
    