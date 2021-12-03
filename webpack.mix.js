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

mix.setPublicPath('public')
    .setResourceRoot('../') // Turns assets paths in css relative to css file
    .vue()
    .sass('resources/sass/frontend/app.scss', 'css/frontend.css')
    .sass('resources/sass/backend/app.scss', 'css/backend.css')
    .js('resources/js/frontend/app.js', 'js/frontend.js')
    .js('resources/js/backend/app.js', 'js/backend.js')
    .js('resources/js/frontend/plugins/easing.min.js', 'js/frontend.js')
    .js('resources/js/frontend/plugins/hoverIntent.js', 'js/frontend.js')
    .js('resources/js/frontend/plugins/jquery-ui.js', 'js/frontend.js')
    .js('resources/js/frontend/plugins/jquery.ajaxchimp.min.js', 'js/frontend.js')
    .js('resources/js/frontend/plugins/jquery.magnific-popup.min.js', 'js/frontend.js')
    .js('resources/js/frontend/plugins/jquery.tabs.min.js', 'js/frontend.js')
    .js('resources/js/frontend/plugins/mail-script.js', 'js/frontend.js')
    .js('resources/js/frontend/plugins/main.js', 'js/frontend.js')
    .js('resources/js/frontend/plugins/owl.carousel.min.js', 'js/frontend.js')
    .js('resources/js/frontend/plugins/superfish.min.js', 'js/frontend.js')
    .css('resources/css/sb-admin-2.min.css', 'css/frontend.css')
    .copy(
        'node_modules/@fortawesome/fontawesome-free/webfonts',
        'public/webfonts'
    )
    .extract([
        'alpinejs',
        'jquery',
        'bootstrap',
        'popper.js',
        'axios',
        'sweetalert2',
        'lodash'
    ])
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
} else {
    // Uses inline source-maps on development
    mix.webpackConfig({
        devtool: 'inline-source-map'
    });
}
