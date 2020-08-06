let mix = require('laravel-mix');

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
  .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/welcome.scss', 'public/css')
   .sass('resources/sass/tinker.scss', 'public/css')
   .sass('resources/sass/signin.scss', 'public/css')
    .sass('resources/sass/privacy.scss', 'public/css')
    .sass('resources/sass/about.scss', 'public/css')
   .sass('resources/sass/infoCRUD/index.scss', 'public/css/infoCRUD')
   .sass('resources/sass/infoCRUD/edit.scss', 'public/css/infoCRUD')
   ;