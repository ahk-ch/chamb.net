var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

elixir(function (mix) {

	var ahkDevScriptsDir = 'ahk/';
	var ahkProductionScriptsDir = 'public/js/ahk/';

	var cmsScriptsDir = 'public/js/ahk';

	// CSS
	mix.sass('app.scss');

	// Scripts
	mix.scripts(ahkDevScriptsDir + 'master.js', ahkProductionScriptsDir + 'master.min.js');
	mix.scripts(ahkDevScriptsDir + 'home.js', ahkProductionScriptsDir + 'home.min.js');
	mix.scripts(ahkDevScriptsDir + 'health/info.js', ahkProductionScriptsDir + 'health/info.min.js');
	mix.scripts(ahkDevScriptsDir + 'health/news.js', ahkProductionScriptsDir + 'health/news.min.js');
	mix.scripts(ahkDevScriptsDir + 'companies/index.js', ahkProductionScriptsDir + 'companies/index.min.js');
	mix.scripts(ahkDevScriptsDir + 'about.js', ahkProductionScriptsDir + 'about.min.js');
	mix.scripts(ahkDevScriptsDir + 'flash.js', ahkProductionScriptsDir + 'flash.min.js');

	// Versioning
	mix.version([
		// AHK
		// CSS
		// JS
		//ahkProductionScriptsDir + 'master.min.js',
		ahkProductionScriptsDir + 'flash.min.js'
	]);

	mix.browserSync({
		proxy: 'chamb.io'
	});
});
