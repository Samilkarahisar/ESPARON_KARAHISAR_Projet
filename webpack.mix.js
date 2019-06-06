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
    .js('resources/js/admin.js', 'public/js')
    .js('resources/js/product.js', 'public/js')
    .js('resources/js/bag.js', 'public/js')
    .js('resources/js/fill_addresses.js', 'public/js')
    .sass('resources/sass/shopping_cart.scss', 'public/css')
    .sass('resources/sass/toggle_switch.scss', 'public/css')
    .sass('resources/sass/welcome.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
   .sass('resources/sass/app.scss', 'public/css');
