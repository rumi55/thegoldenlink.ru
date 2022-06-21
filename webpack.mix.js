const mix = require('laravel-mix');

mix.options({
    processCssUrls: false,
});

mix.js('resources/js/app.js', 'public/js').version();

mix.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('postcss-nested'),
    //require('postcss-custom-properties'),
    require('postcss-custom-media'),
    require('postcss-media-minmax'),
]).version();

mix.copyDirectory('resources/images', 'public/images');
