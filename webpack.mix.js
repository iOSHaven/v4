let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss')
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
mix.postCss('resources/assets/postCss/redesign.css', 'public/css/redesign.min.css', [
      require('tailwindcss'),
      require('cssnano'),
   ])
   .options({
      postCss: [
         tailwindcss('./tailwind.config.js')
      ]
   })
   .sass("resources/assets/sass/markdown.scss", "public/css")
   .sass("resources/assets/sass/f7.scss", "public/css")
   .js('resources/assets/js/main.js', 'public/js')
   .js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/dashboard.js', 'public/js')
   .minify([
      "public/css/markdown.css",
      "public/css/f7.css",
      "public/js/vendor.js",
      "public/js/manifest.js",
      "public/js/main.js",
      "public/js/app.js",
      "public/js/dashboard.js",
   ])
   .version()



// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/main.scss', 'public/css', {implementation: require("node-sass") })
//    // .sass('resources/assets/sass/f7app.scss', 'public/css', {implementation: require("node-sass") })

//    .js('resources/assets/js/waves.js', 'public/js')
//    // .js('resources/assets/js/f7app.js', 'public/js')
//    .extract(['jquery', 'vue', 'axios'])
//    // .sass('resources/assets/sass/app.scss', 'public/css', {implementation: require("node-sass") })
//    // .sass('resources/assets/sass/uid.scss', 'public/css', {implementation: require("node-sass") })
//    .options({
//       extractVueStyles: 'public/css/scoped.css',
//       processCssUrls: false,
//       postCss: [ tailwindcss('./path/to/your/tailwind.config.js') ],
//    })

//    .minify("public/css/main.css")
//    .minify("public/css/normalize.css")
//    // .minify("public/css/f7app.css")
//    .minify("public/css/scoped.css")
//    .minify('public/js/app.js')
//    .minify('public/js/main.js')
//    .minify('public/js/waves.js')
//    .minify("public/js/manifest.js")
//    .minify("public/js/vendor.js")
//    .version()
   // .minify('public/js/f7app.js')
   // .minify('public/js/app.js')
   // .minify('public/css/uid.css')
