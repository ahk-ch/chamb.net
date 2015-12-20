var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {

	var ahkDevScriptsDir = 'ahk/';
	var ahkProductionScriptsDir = 'public/js/ahk/';

	var cmsScriptsDir = 'public/js/ahk';

	mix.sass('app.scss');
	mix.scripts(ahkDevScriptsDir + 'master.js', ahkProductionScriptsDir + 'master.min.js');
	mix.scripts(ahkDevScriptsDir + 'home.js', ahkProductionScriptsDir + 'home.min.js');
	mix.scripts(ahkDevScriptsDir + 'health/info.js', ahkProductionScriptsDir + 'health/info.min.js');
	mix.scripts(ahkDevScriptsDir + 'health/news.js', ahkProductionScriptsDir + 'health/news.min.js');
	mix.scripts(ahkDevScriptsDir + 'companies/index.js', ahkProductionScriptsDir + 'companies/index.min.js');
	mix.scripts(ahkDevScriptsDir + 'about.js', ahkProductionScriptsDir + 'about.min.js');
});
