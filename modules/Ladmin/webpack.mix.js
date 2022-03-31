const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/ }));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/js/app.js', 'js/bs-ladmin.js')
    .sass(__dirname + '/Resources/sass/app.scss', 'css/bs-ladmin.css')
    .postCss(__dirname + '/Resources/css/app.css', 'css/tw-ladmin.css', [
        require('tailwindcss')(__dirname + '/tailwind.config.js'),
    ]);

if (mix.inProduction()) {
    mix.version();
}
