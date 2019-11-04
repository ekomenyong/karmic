/**
 * Gulpfile.
 *
 * Gulp with WordPress.
 *
 * Implements:
 *      1. Live reloads browser with BrowserSync.
 *      2. CSS: Sass to CSS conversion, error catching, Autoprefixing, Sourcemaps,
 *         CSS minification, and Merge Media Queries.
 *      3. JS: Concatenates & uglifies Vendor and Custom JS files.
 *      4. Images: Minifies PNG, JPEG, GIF and SVG images.
 *      5. Watches files for changes in CSS or JS.
 *      6. Watches files for changes in PHP.
 *      7. Corrects the line endings.
 *      8. InjectCSS instead of browser page reload.
 *      9. Generates .pot file for i18n and l10n.
 *
 * @author Karmic <https://karmic.dev>
 */

/**
 * Load Options & Gulp
 *
 * TODO: Customize your project options in the package.json file
 */
const pkg = require( './package.json' );
const gulp = require( 'gulp' );

// Load all plugins in "devDependencies" into the variable '$'
const $ = require( 'gulp-load-plugins' )({
  pattern: ["*"],
  scope: ["devDependencies"]
});

// Error Handler
const errorHandler = r => {
	$.notify.onError( '\n\n❌  ===> ERROR: <%= error.message %>\n' )( r );
	$.beep();
	// this.emit('end');
};

// Set up header for our files
const banner = [
  '/**',
  ' * <%= pkg.name %> - <%= pkg.description %>',
  ' * @version v<%= pkg.version %>',
  ' * @link <%= pkg.homepage %>',
  ' * @author <%= pkg.author %>',
  ' * @copyright Copyright (c)' + $.moment().format("YYYY") + ', <%= pkg.copyright %>',
  ' */',
  ''
].join('\n');

/**
 * Task: `browser-sync`.
 *
 * Live Reloads, CSS injections, Localhost tunneling.
 * @link http://www.browsersync.io/docs/options/
 *
 * @param {Mixed} done Done.
 */
const browsersync = done => {
	$.browserSync.init({
		proxy: pkg.vars.projectURL,
		open: pkg.vars.browserAutoOpen,
		injectChanges: pkg.vars.injectChanges,
		watchEvents: [ 'change', 'add', 'unlink', 'addDir', 'unlinkDir' ]
	});
	done();
};

// Helper function to allow browser reload with Gulp 4.
const reload = done => {
	$.browserSync.reload();
	done();
};

/**
 * Task: `styles`.
 *
 * Compiles Sass, Autoprefixes it and Minifies CSS.
 *
 * This task does the following:
 *    1. Gets the source scss file
 *    2. Compiles Sass to CSS
 *    3. Writes Sourcemaps for it
 *    4. Autoprefixes it and generates style.css
 *    5. Renames the CSS file with suffix .min.css
 *    6. Minifies the CSS file and generates style.min.css
 *    7. Injects CSS or reloads the browser via browserSync
 */
gulp.task( 'styles', () => {
	return gulp.src( pkg.paths.src.scss, { allowEmpty: true })
		.pipe( $.plumber( errorHandler ) )
		.pipe( $.sourcemaps.init() )
		.pipe( $.sass({
				errLogToConsole: pkg.vars.errLogToConsole,
				outputStyle: pkg.vars.outputStyle,
				precision: pkg.vars.precision
		}))
		.on( 'error', $.sass.logError )
		.pipe( $.sourcemaps.write({ includeContent: false }) )
		.pipe( $.sourcemaps.init({ loadMaps: true }) )
		.pipe( $.autoprefixer( pkg.browserList ) )
		.pipe( $.sourcemaps.write( './' ) )
		.pipe( $.lineEndingCorrector() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( pkg.paths.dist.css ) )
		.pipe( $.filter( '**/*.css' ) ) // Filtering stream to only css files.
		.pipe( $.mergeMediaQueries({ log: true }) ) // Merge Media Queries only for .min.css version.
		.pipe( $.browserSync.stream() ) // Reloads style.css if that is enqueued.
		.pipe( $.rename({ suffix: '.min' }) )
		.pipe( $.uglifycss({ maxLineLen: 10 }) )
    .pipe( $.lineEndingCorrector() ) // Consistent Line Endings for non UNIX systems.
    .pipe( $.size({ gzip: true, showFiles: true }) )
		.pipe( gulp.dest( pkg.paths.dist.css ) )
		.pipe( $.filter( '**/*.css' ) ) // Filtering stream to only css files.
		.pipe( $.browserSync.stream() ) // Reloads style.min.css if that is enqueued.
		.pipe( $.notify({ message: '\n\n✅  ===> STYLES — completed!\n', onLast: true }) );
});

/**
 * Task: `stylesRTL`.
 *
 * Compiles Sass, Autoprefixes it, Generates RTL stylesheet, and Minifies CSS.
 *
 * This task does the following:
 *    1. Gets the source scss file
 *    2. Compiles Sass to CSS
 *    4. Autoprefixes it and generates style.css
 *    5. Renames the CSS file with suffix -rtl and generates style-rtl.css
 *    6. Writes Sourcemaps for style-rtl.css
 *    7. Renames the CSS files with suffix .min.css
 *    8. Minifies the CSS file and generates style-rtl.min.css
 *    9. Injects CSS or reloads the browser via browserSync
 */
gulp.task( 'stylesRTL', () => {
	return gulp.src( pkg.paths.src.scss, { allowEmpty: true })
		.pipe( $.plumber( errorHandler ) )
		.pipe( $.sourcemaps.init() )
		.pipe( $.sass({
				errLogToConsole: pkg.vars.errLogToConsole,
				outputStyle: pkg.vars.outputStyle,
				precision: pkg.vars.precision
		}) )
		.on( 'error', $.sass.logError )
		.pipe( $.sourcemaps.write({ includeContent: false }) )
		.pipe( $.sourcemaps.init({ loadMaps: true }) )
		.pipe( $.autoprefixer( pkg.browserList ) )
		.pipe( $.lineEndingCorrector() ) // Consistent Line Endings for non UNIX systems.
		.pipe( $.rename({ suffix: '-rtl' }) ) // Append "-rtl" to the filename.
		.pipe( $.rtlcss() ) // Convert to RTL.
		.pipe( $.sourcemaps.write( './' ) ) // Output sourcemap for style-rtl.css.
		.pipe( gulp.dest( pkg.paths.dist.scss ) )
		.pipe( $.filter( '**/*.css' ) ) // Filtering stream to only css files.
		.pipe( $.browserSync.stream() ) // Reloads style.css or style-rtl.css, if that is enqueued.
		.pipe( $.mergeMediaQueries({ log: true }) ) // Merge Media Queries only for .min.css version.
		.pipe( $.rename({ suffix: '.min' }) )
		.pipe( $.uglifycss({ maxLineLen: 10 }) )
    .pipe( $.lineEndingCorrector() ) // Consistent Line Endings for non UNIX systems.
    .pipe( $.size({ gzip: true, showFiles: true }) )
		.pipe( gulp.dest( pkg.paths.dist.css ) )
		.pipe( $.filter( '**/*.css' ) ) // Filtering stream to only css files.
		.pipe( $.browserSync.stream() ) // Reloads style.css or style-rtl.css, if that is enqueued.
		.pipe( $.notify({ message: '\n\n✅  ===> STYLES RTL — completed!\n', onLast: true }) );
});

/**
 * Task: `vendorsJS`.
 *
 * Concatenate and uglify vendor JS scripts.
 *
 * This task does the following:
 *     1. Gets the source folder for JS vendor files
 *     2. Concatenates all the files and generates vendors.js
 *     3. Renames the JS file with suffix .min.js
 *     4. Uglifes/Minifies the JS file and generates vendors.min.js
 */
gulp.task( 'vendorsJS', () => {
	return gulp.src( pkg.paths.src.jsVendor, { since: gulp.lastRun( 'vendorsJS' ) }) // Only run on changed files.
		.pipe( $.plumber( errorHandler ) )
		.pipe( $.babel({
				presets: [ [
          '@babel/preset-env', // Preset to compile your modern JS to ES5.
          {
            targets: { browsers: pkg.browserList } // Target browser list to support.
          }
				]]
		}) )
		.pipe( $.remember( pkg.paths.src.jsVendor ) ) // Bring all files back to stream.
		.pipe( $.concat( pkg.vars.jsVendorName + '.js' ) )
		.pipe( $.lineEndingCorrector() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( pkg.paths.dist.js ) )
		.pipe( $.rename({
				basename: pkg.vars.jsVendorName,
				suffix: '.min'
		}) )
		.pipe( $.uglify() )
    .pipe( $.lineEndingCorrector() ) // Consistent Line Endings for non UNIX systems.
    .pipe( $.size({ gzip: true, showFiles: true }) )
		.pipe( gulp.dest( pkg.paths.dist.js ) )
		.pipe( $.notify({ message: '\n\n✅  ===> VENDOR JS — completed!\n', onLast: true }) );
});

/**
 * Task: `customJS`.
 *
 * Concatenate and uglify custom JS scripts.
 *
 * This task does the following:
 *     1. Gets the source folder for JS custom files
 *     2. Concatenates all the files and generates custom.js
 *     3. Renames the JS file with suffix .min.js
 *     4. Uglifes/Minifies the JS file and generates custom.min.js
 */
gulp.task( 'customJS', () => {
	return gulp
		.src( pkg.paths.src.jsCustom, { since: gulp.lastRun( 'customJS' ) }) // Only run on changed files.
		.pipe( $.plumber( errorHandler ) )
		.pipe( $.babel({
				presets: [[
          '@babel/preset-env', // Preset to compile your modern JS to ES5.
          {
            targets: { browsers: pkg.browserList } // Target browser list to support.
          }
        ]] 
    }) )
		.pipe( $.remember( pkg.paths.src.jsCustom ) ) // Bring all files back to stream.
		.pipe( $.concat( pkg.vars.jsCustomName + '.js' ) )
		.pipe( $.lineEndingCorrector() ) // Consistent Line Endings for non UNIX systems.
		.pipe( gulp.dest( pkg.paths.dist.js ) )
		.pipe( $.rename({
				basename: pkg.vars.jsCustomName,
				suffix: '.min'
		}) )
		.pipe( $.uglify() )
    .pipe( $.lineEndingCorrector() ) // Consistent Line Endings for non UNIX systems.
    .pipe( $.size({ gzip: true, showFiles: true }) )
		.pipe( gulp.dest( pkg.paths.dist.js ) )
		.pipe( $.notify({ message: '\n\n✅  ===> CUSTOM JS — completed!\n', onLast: true }) );
});

/**
 * Task: `images`.
 *
 * Minifies PNG, JPEG, GIF and SVG images.
 *
 * This task does the following:
 *     1. Gets the source of images raw folder
 *     2. Minifies PNG, JPEG, GIF and SVG images
 *     3. Generates and saves the optimized images
 *
 * This task will run only once, if you want to run it
 * again, do it with the command `gulp images`.
 *
 * Read the following to change these options.
 * @link https://github.com/sindresorhus/gulp-imagemin
 */
gulp.task( 'images', () => {
	return gulp
		.src( pkg.paths.src.img )
		.pipe( $.cache (
      $.imagemin([
        $.imagemin.gifsicle({ interlaced: true }),
        $.imagemin.jpegtran({ progressive: true }),
        $.imagemin.optipng({ optimizationLevel: 3 }), // 0-7 low-high.
        $.imagemin.svgo({
          plugins: [ { removeViewBox: true }, { cleanupIDs: false } ]
        })
      ])
    ))
    .pipe( $.size({ gzip: true, showFiles: true }) )
		.pipe( gulp.dest( pkg.paths.dist.img ) )
		.pipe( $.notify({ message: '\n\n✅  ===> IMAGES — completed!\n', onLast: true }) );
});

/**
 * Task: `clear-images-cache`.
 *
 * Deletes the images cache. By running the next "images" task,
 * each image will be regenerated.
 */
gulp.task( 'clearCache', function( done ) {
	return $.cache.clearAll( done );
});

/**
 * WP POT Translation File Generator.
 *
 * This task does the following:
 * 1. Gets the source of all the PHP files
 * 2. Sort files in stream by path or any custom sort comparator
 * 3. Applies wpPot with the variable set at the top of this file
 * 4. Generate a .pot file of i18n that can be used for l10n to build .mo file
 */
gulp.task( 'translate', () => {
	return gulp.src( pkg.watch.php )
		.pipe( $.sort() )
		.pipe( $.wpPot({
				domain: pkg.vars.textDomain,
				package: pkg.vars.packageName,
				bugReport: pkg.bugs.email,
				lastTranslator: pkg.vars.lastTranslator,
				team: pkg.vars.team
		}) )
		.pipe( gulp.dest( config.translationDestination + '/' + config.translationFile ) )
		.pipe( $.notify({ message: '\n\n✅  ===> TRANSLATE — completed!\n', onLast: true }) );
});

/**
 * Watch Tasks.
 *
 * Watches for file changes and runs specific tasks.
 */
gulp.task(
	'default',
	gulp.parallel( 'styles', 'vendorsJS', 'customJS', 'images', browsersync, () => {
		gulp.watch( pkg.watch.php, reload ); // Reload on PHP file changes.
		gulp.watch( pkg.watch.styles, gulp.parallel( 'styles' ) ); // Reload on SCSS file changes.
		gulp.watch( pkg.watch.jsVendor, gulp.series( 'vendorsJS', reload ) ); // Reload on vendorsJS file changes.
		gulp.watch( pkg.watch.jsCustom, gulp.series( 'customJS', reload ) ); // Reload on customJS file changes.
		gulp.watch( pkg.paths.src.img, gulp.series( 'images', reload ) ); // Reload on customJS file changes.
	})
);
