// --------------------------------------------------
// IMPORT MODULES
// --------------------------------------------------
const browserify = require('browserify');
const buffer = require('vinyl-buffer');
const concat = require('gulp-concat');
const gulp = require('gulp');
const PathMap = require('sfco-path-map');
const rename = require('gulp-rename');
const sass = require('gulp-sass');
const source = require('vinyl-source-stream');
const uglify = require('gulp-uglify');

// --------------------------------------------------
// DECLARE VARS
// --------------------------------------------------
const PATHS = new PathMap( {
    src: 'src',
    dest: 'dist',
    // Templates
    templatesSrc: '{{src}}/templates',
    templatesDest: '{{dest}}',
    // Styles
    stylesSrc: '{{src}}/sass',
    stylesDest: '{{dest}}/css',
    // Scripts
    scriptsSrc: '{{src}}/js',
    scriptsDest: '{{dest}}/js',
    themeScriptsSrc: '{{scriptsSrc}}/theme',
    vendorScriptsSrc: '{{scriptsSrc}}/vendor',
} );

// --------------------------------------------------
// DECLARE FUNCTIONS
// --------------------------------------------------
/**
 * Consume, concatenate, rename, and migrate theme/vendor scripts.
 *
 * @param {string] src - File path or glob for input.
 * @param {string} dest - File path for output.
 * @param {string} name - Name of concatenated output.
 */
const doScripts = ( src, dest, name ) => {
    return gulp.src( src )
        .pipe( concat( name ) )
        .pipe( uglify() )
        .pipe( rename( function( path ) {
            path.basename += '.min';
            path.extname = '.js';
        } ) )
        .pipe( gulp.dest( dest ) );
}

// --------------------------------------------------
// DECLARE TASKS
// --------------------------------------------------
/**
 * 'Default' Gulp task, executed when `gulp` is run from the command line with *no* arguments.
 */
gulp.task( 'default', [ 'meta', 'templates', 'sass', 'scripts', 'watch' ] );

/**
 * Task migrates `style.css` file (required by theme).
 */
gulp.task( 'meta', function() {
    gulp.src( `${PATHS.src}/style.css` )
        .pipe( gulp.dest( PATHS.dest ) );
} );

/**
 * Task migrates all template/PHP files.
 */
gulp.task( 'templates', function() {
    gulp.src( `${PATHS.templatesSrc}/**/*.php` )
        .pipe( gulp.dest( PATHS.templatesDest ) );
} );

/**
 * Task converts contents of `styles.scss` file to vanilla CSS.
 */
gulp.task( 'sass', function() {
    return gulp.src( `${PATHS.stylesSrc}/styles.scss` )
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
        .pipe( gulp.dest( PATHS.stylesDest ) );
} );

/**
 * Task concatenates, minifies, and renames all theme scripts.
 */
gulp.task( 'scripts:theme', function() {
    return doScripts( `${PATHS.themeScriptsSrc}/**/*.js`, PATHS.scriptsDest, 'theme.js' );
} );

/**
 * Task concatenates, minifies, and renames all vendor scripts.
 */
gulp.task( 'scripts:vendor', function() {
    return browserify( { entries: `${PATHS.vendorScriptsSrc}/index.js` } )
      .bundle()
      .pipe( source( 'vendor.js' ) )
      .pipe( buffer() )
      .pipe( gulp.dest( PATHS.scriptsDest ) )
      .pipe( uglify() )
      .pipe( rename( {
        suffix: '.min',
      } ) )
      .pipe( gulp.dest( PATHS.scriptsDest ) );
} );

/**
 * Wrapper around script-related tasks.
 */
gulp.task( 'scripts', [ 'scripts:vendor', 'scripts:theme' ] );

/**
 * Task watches for changes to files in `src/` directory, executes appropriate task.
 */
gulp.task( 'watch', function() {
    gulp.watch( `${PATHS.templatesSrc}/**/*.php`, [ 'templates' ] );
    gulp.watch( `${PATHS.stylesSrc}/**/*.scss`, [ 'sass' ] );
    gulp.watch( `${PATHS.scriptsSrc}/**/*.js`, [ 'scripts' ] );
} );
