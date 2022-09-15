const fs = require('fs');
const glob = require('glob');
const {execSync, spawnSync} = require('child_process')

const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({path: '.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

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

mix.before(() => {
    if (fs.existsSync('public/mix-manifest.json'))
        fs.rmSync('public/mix-manifest.json', {force: true});

    if (fs.existsSync('public/css'))
        fs.rmdirSync('public/css', {recursive: true});

    if (fs.existsSync('public/js'))
        fs.rmdirSync('public/js', {recursive: true});
});

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [])
    .extract()
    .mergeManifest();

if (mix.inProduction()) {
    mix.version();
}

mix.after(() => {
    // Run modules webpack.mix.js
    glob.sync('Modules/*/webpack.mix.js').forEach(item => {
        const cmd = mix.inProduction() ? `mix --production --mix-config=${item}` : `mix --mix-config=${item}`;
        console.log(cmd);
        console.log(execSync(cmd).toString());
    });
});
