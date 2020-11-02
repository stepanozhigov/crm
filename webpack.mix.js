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
   .js('resources/js/bill/rbk.js', 'public/js/bill')
   .js('resources/js/bill/stripe.js', 'public/js/bill')
   .js('resources/js/lk/main.js', 'public/js/lk')
   .js('resources/js/libs/gijgo.min.js', 'public/js/libs')
   .sass('resources/sass/app.scss', 'public/css');
mix.copy('resources/css/main.css', 'public/css/main.css')
   .copy('resources/css/bill/main.css', 'public/css/bill/main.css')
   .copy('resources/css/lk/oldPanel.css', 'public/css/lk/oldPanel.css')
   .copy('resources/css/libs/gijgo.min.css', 'public/css/libs/gijgo.min.css')
   .copy('resources/fonts/gijgo-material.ttf', 'public/css/fonts/gijgo-material.ttf');
mix.version();
mix.browserSync({
   proxy: 'https://crm.loc.laravel:8080/',
   port:8080,
   open:false
});
