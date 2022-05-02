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
    .copy('resources/js/jquery.min.js','public/js')
    .copy('resources/js/test.js','public/js')
    .copy('node_modules/pdfmake/build/pdfmake.min.js','public/storage/DataTables/pdfmake-unicode/')
    .copy('node_modules/pdfmake/build/pdfmake.min.js.map','public/storage/DataTables/pdfmake-unicode/')
    .copy('node_modules/jszip/dist/jszip.min.js','public/storage/DataTables/jszip/')
    //.copy('node_modules/jszio/dist/jzip.min.js','storage/DataTables/pdfmake-unicode/')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/FA.scss', 'public/css')
    .sass('resources/sass/error-productFound-StyleSheet.scss', 'public/css')
   // .copy('resources/js/viewAll/viewAll_script.js','public/js/viewAll')
   .sourceMaps();
