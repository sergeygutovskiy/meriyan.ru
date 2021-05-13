const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/scss/app.scss', 'public/css')
    .sass('resources/scss/normal/pages/home.scss' , 'public/css/pages')
    .sass('resources/scss/normal/pages/tours.scss', 'public/css/pages')
    .sass('resources/scss/normal/pages/about.scss', 'public/css/pages')
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/pages/home.js', 'public/js/pages')
    .js('resources/js/pages/about.js', 'public/js/pages')
    ;