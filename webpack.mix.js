const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css');

mix.browserSync('http://ass2.site/');


// Auth Files and Folders
// mix.copyDirectory('app/Http/controllers/Auth', 'tmp/app/Http/controllers/Auth');
// mix.copyDirectory('resources/views/auth', 'tmp/resources/views/auth');
// mix.copy('app/Role.php', 'tmp/app/Role.php');
// mix.copy('app/User.php', 'tmp/app/User.php');
