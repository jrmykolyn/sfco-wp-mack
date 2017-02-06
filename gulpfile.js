/* IMPORT MODULES */
var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var concat = require('gulp-concat');


/* DECLARE VARS */
var PATHS = {
    styles: {
        src: 'src/sass/',
        dest: './css/',
    },
    js: {
        src: 'src/js/**/*.js',
        dest: './js/'
    }
};


/* DECLARE TASKS */
/**
 * 'Default' Gulp task, executed when `gulp` is run from the
 * command line with *no* arguments.
 *
 * The following tasks are executed *before* the contents of
 * the `default` task.
 * - `sass`
 * - `scripts`
 * - `watch`
 */
gulp.task( 'default', [ 'sass', 'scripts', 'watch' ], function() {
    console.log( 'INSIDE TASK: `default`' );
} );


/**
 * Task converts contents of `styles.scss` file (plus any
 * `*.scss` linked via `@import)` to vanilla CSS.
 *
 * Resulting CSS file is saved to specified 'dest' directory
 */
gulp.task( 'sass', function() {
    console.log( 'INSIDE TASK: `sass`' );

    return gulp.src( PATHS.styles.src + 'styles.scss' )
        .pipe( sass(
            {
                outputStyle: 'compressed',
                includePaths: [
                    'node_modules/normalize.css',
                    'node_modules/bourbon/app/assets/stylesheets',
                    'node_modules/susy/sass',
                    'node_modules/sfco-sass-utils'
                ]
            }).on( 'error', sass.logError )
        )
        .pipe( gulp.dest( PATHS.styles.dest ) )
} );


/**
 * Task concanenates, minifies and renames all `*.js` files in
 * `src/`directory. Resulting files are saved to specified 'dest'.
 */
gulp.task( 'scripts', function() {
    return gulp.src( PATHS.js.src )
        .pipe( concat( 'main.js' ) )
        .pipe( uglify() )
        .pipe( rename( function( path ) {
            path.basename += '.min';
            path.extname = '.js';
        } ) )
        .pipe( gulp.dest( PATHS.js.dest ) );
} );


/**
 * Task watches for changes to files in `src/` directory,
 * executes appropriate task.
 */
gulp.task( 'watch', function() {
    console.log( 'INSIDE TASK: `watch`' );

    gulp.watch( PATHS.styles.src + '**/*.scss', [ 'sass' ] );
    gulp.watch( PATHS.js.src + '**/*.scss', [ 'scripts' ] );
} );
