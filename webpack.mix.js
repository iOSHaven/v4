let mix = require('laravel-mix');

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


mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/main.scss', 'public/css', {implementation: require("node-sass") })
   .js('resources/assets/js/main.js', 'public/js')
   .js('resources/assets/js/waves.js', 'public/js')
   // .sass('resources/assets/sass/app.scss', 'public/css', {implementation: require("node-sass") })
   // .sass('resources/assets/sass/uid.scss', 'public/css', {implementation: require("node-sass") })
   .setPublicPath('public/')
   .setResourceRoot('src/')
   .options({
      extractVueStyles: 'public/css/scoped.css'
   })
   .disableNotifications()
   // .minify('public/css/app.css')
   // .minify('public/js/app.js')
   // .minify('public/css/uid.css')
