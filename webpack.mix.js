// webpack.mix.js

let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'js/app.js').sass('resources/sass/app.scss', 'css');
mix.js('resources/admin/js/layout.js', 'admin/js/layout.js');
// mix.js('resources/js/app.js', 'js/app.js').sass('resources/sass/app.scss', 'css');
