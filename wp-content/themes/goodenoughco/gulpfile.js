var paths = {
  sass: [
    './src/sass/global.scss',
  ],
  watchSass: [
    './src/sass/*.scss',
    './src/sass/**/*.scss'
  ],
  watchJs: [
    './src/scripts/**/*.js'
  ],
  jpn_sass : [
      './src/sass/lang/**/*.scss'
  ],
  fonts: [
    './src/fonts/**/*',
  ],
  images: './src/images/**/*'
};

//
// JS Files
//
var jsDIR = "./src/scripts/";
// File locations
var jsGLOBAL = "global.js";
// Add files to array
var jsFILES = [jsGLOBAL];
// Destination folder
var jsDIST = './dist/scripts/';

var del = require('del');
var gulp = require('gulp');
var sass = require('gulp-sass');
var jpn_sass = require('gulp-sass');
var shell = require('gulp-shell');
const babelify = require('babelify');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var cssnano = require('gulp-cssnano');
var imagemin = require('gulp-imagemin');
var sourcemaps = require('gulp-sourcemaps');
var pngquant = require('imagemin-pngquant');
var autoprefixer = require('gulp-autoprefixer');
var runSequence = require('run-sequence').use(gulp);
var sassGlob = require('gulp-sass-glob');
var glob = require('glob');
var svgo = require("gulp-svgo");
var svgSymbols = require("gulp-svg-symbols");
var svgMin = require("gulp-svgmin");
var wait = require("gulp-wait");
var browserify = require("browserify");
var source = require("vinyl-source-stream");
var buffer = require("vinyl-buffer");

// SASS
function css(done) {
  gulp.src(paths.sass)
    .pipe(wait(1500))
    .pipe(sourcemaps.init())
    .pipe(sassGlob())
    .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(concat('global.css'))
    .pipe(cssnano())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./dist/css'));
  done();
};

// JP FONTS
function jp_css(done) {
  gulp.src(paths.jpn_sass)
    .pipe(wait(1500))
    .pipe(sourcemaps.init())
    .pipe(sassGlob())
    .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(concat('jp.css'))
    .pipe(cssnano())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./dist/css'));
  done();
};

// JAVASCRIPT
function js(done) {
  jsFILES.map(function( entry ){
    return browserify({
      entries: [jsDIR + entry]
    })
    .transform( babelify, { presets: ['@babel/preset-env']} )
    .bundle()
    .pipe( source(entry) )
    .pipe( rename({ extname: '.js' }) )
    .pipe( buffer() )
    .pipe( sourcemaps.init({ loadMaps: true }) )
    .pipe( uglify() )
    .pipe( sourcemaps.write('./') )
    .pipe( gulp.dest( jsDIST ))
  })

  done();
};

// MOVE FONTS
function fonts(done) {
  gulp.src(paths.fonts)
    .pipe(gulp.dest('./dist/fonts'));
  done();
}

// MOVE IMAGES
function images(done) {
  gulp.src(paths.images)
    .pipe(gulp.dest('./dist/images'));
  done();
}

// Remove existing files in Dist
function clean(done) {
  return del(['./dist/scripts/global.js', './dist/scripts/global.js.map', './dist/css/global.css.map', './dist/css/global.css']);
}

// WATCH
function watch_files() {
  gulp.watch(paths.watchSass, css)
  gulp.watch(paths.watchJs, js);
};

// Register Task Classes
gulp.task('css', css);
gulp.task('jp_css', jp_css);
gulp.task('js', js);
gulp.task('clean', clean);
gulp.task('watch', watch_files);
gulp.task('fonts', fonts);
gulp.task('images', images);

// Set default gulp task
gulp.task("default", gulp.series(css, jp_css, js));

// Distribution task. Run this to move files to production/staging
gulp.task("dist", gulp.series(clean, css, jp_css, js, fonts, images));
