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
   // .sass('resources/assets/sass/f7app.scss', 'public/css', {implementation: require("node-sass") })
   .js('resources/assets/js/main.js', 'public/js')
   .js('resources/assets/js/waves.js', 'public/js')
   // .js('resources/assets/js/f7app.js', 'public/js')
   .extract(['jquery', 'vue', 'axios'])
   // .sass('resources/assets/sass/app.scss', 'public/css', {implementation: require("node-sass") })
   // .sass('resources/assets/sass/uid.scss', 'public/css', {implementation: require("node-sass") })
   .options({
      extractVueStyles: 'public/css/scoped.css'
   })

   .minify("public/css/main.css")
   .minify("public/css/normalize.css")
   // .minify("public/css/f7app.css")
   .minify("public/css/scoped.css")
   .minify('public/js/app.js')
   .minify('public/js/main.js')
   .minify('public/js/waves.js')
   .minify("public/js/manifest.js")
   .minify("public/js/vendor.js")
   .version()
   // .minify('public/js/f7app.js')
   // .minify('public/js/app.js')
   // .minify('public/css/uid.css')
