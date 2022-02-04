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
    .scripts([
        'node_modules/admin-lte/plugins/jquery/jquery.min.js',
        'node_modules/admin-lte/plugins/jquery-ui/jquery-ui.min.js',
        'node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'node_modules/admin-lte/dist/js/adminlte.js',
        ],'public/backend/js/adminlte.js')
    .scripts([
        'node_modules/admin-lte/plugins/chart.js/Chart.min.js',
        'node_modules/admin-lte/plugins/sparklines/sparkline.js',
        'node_modules/admin-lte/plugins/jqvmap/jquery.vmap.min.js',
        'node_modules/admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js',
        'node_modules/admin-lte/plugins/jquery-knob/jquery.knob.min.js',
        'node_modules/admin-lte/plugins/moment/moment.min.js',
        'node_modules/admin-lte/plugins/daterangepicker/daterangepicker.js',
        'node_modules/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
        'node_modules/admin-lte/plugins/summernote/summernote-bs4.min.js',
        'node_modules/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
        'node_modules/admin-lte/dist/js/pages/dashboard.js',
    ],'public/backend/js/adminltepackages.js')
    .vue()
    .sass('resources/sass/adminlte.scss', 'backend/css/adminlte.css');
