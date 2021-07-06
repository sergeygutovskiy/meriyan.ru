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

mix
    .sass('resources/scss/reset.scss', 'public/css')
    .sass('resources/scss/main.scss', 'public/css')
    .sass('resources/scss/app.scss', 'public/css')
    .sass('resources/scss/fonts.scss', 'public/css')    

    .sass('resources/scss/pages/home.scss' , 'public/css/pages')
    .js('resources/js/pages/home.js', 'public/js/pages')

    .sass('resources/scss/pages/about.scss', 'public/css/pages')
    .js('resources/js/pages/about.js', 'public/js/pages')
    
    .js('resources/js/pages/tours.js', 'public/js/pages')

    .sass('resources/scss/pages/contacts.scss', 'public/css/pages')
    
    .js('resources/js/app.js', 'public/js')
    
    .sass('resources/scss/admin.scss', 'public/css')
    .js('resources/js/admin.js', 'public/js')
    .vue()
    ;