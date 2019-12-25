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

mix.js('src/Services/Frontend/resources/assets/js/app.js',        'public/assets/frontend/js/app.js');
mix.styles('src/Services/Frontend/resources/assets/css/app.scss', 'public/assets/frontend/css/app.css');
mix.copyDirectory('src/Services/Frontend/resources/assets/img',   'public/assets/frontend/img');

if (mix.inProduction()) {
    mix.version();

    mix.webpackConfig({
        module: {
            rules: [{
                test: /\.js?$/,
                exclude: /(bower_components)/,
                use: [{
                    loader: 'babel-loader',
                    options: mix.config.babel()
                }]
            }]
        }
    });
}
