const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/charts.js', 'public/js')
   .version();