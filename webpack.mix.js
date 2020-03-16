const mix = require('laravel-mix');

mix.sass('Resources/sass/app.scss', 'dist')
   .js('Resources/js/app.js', 'dist');