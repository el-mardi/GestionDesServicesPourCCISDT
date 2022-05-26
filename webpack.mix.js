const mix = require('laravel-mix');
mix.disableNotifications();

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

mix.js(['resources/js/app.js',
        'resources/js/addNewService.js',
        'resources/js/addNewPack.js',
        'resources/js/addDomaineAndActivite.js',
        'resources/js/searchAjax.js',
        'resources/js/bootstrap.js',
    ],
        
        'public/js')
    .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
    ])
    .sass('resources/css/scss/style.scss',  'public/css/style.css')
;