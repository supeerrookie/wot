const mix = require('laravel-mix');

mix.styles([
	'public/dist/additional_css/*.css',
], 
'public/css/addon.css').version();

mix.styles([
	'public/css/style.css',
	'public/css/responsive.css',

], 
'public/css/main.css').version();

mix.scripts([
	'public/dist/js/*.js',
], 
'public/js/mix.js').version();

mix.scripts([
	'public/dist/mainjs/*.js',
], 
'public/js/core.js').version();