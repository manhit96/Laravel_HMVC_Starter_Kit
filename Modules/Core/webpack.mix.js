const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.js(__dirname + '/Resources/assets/js/app.js', 'public/js/core/core.js')
    .sass( __dirname + '/Resources/assets/sass/app.scss', 'public/css/core/core.css')
    .extract()
    .mergeManifest();

if (mix.inProduction()) {
    mix.version();
}
