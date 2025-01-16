const mix = require('laravel-mix');

// Compile Sass file to CSS
mix.sass('resources/sass/app.scss', 'public/css')
   .js('resources/js/app.js', 'public/js')
   .version(); // optional: adds versioning to your files
