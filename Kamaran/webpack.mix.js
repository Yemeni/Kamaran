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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .less('resources/assets/less/app.less', 'public/css');

mix.copy('node_modules/datatables/media/css/jquery.dataTables.min.css', 'public/css/datatables.css');
mix.copy('node_modules/datatables/media/images', 'public/images', false );


mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css/app-scss.css')
    .less('resources/assets/less/app.less', 'public/css/app-less.css')
    .styles([
        'public/css/app-scss.css',
        'public/css/app-less.css',
        'public/css/datatables.css',
        'resources/assets/css/digital-clock.css',
        'resources/assets/css/custom.css',
    ], 'public/css/app.css');