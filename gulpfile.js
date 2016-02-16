var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;
process.env.DISABLE_NOTIFIER = true;

elixir(function (mix) {

	var ahkDevDir = 'ahk/';
	var ahkProductionScriptsDir = 'public/js/ahk/';
	var ahkProductionStylesDir = 'public/css/ahk/';

	var cmsScriptsDir = 'public/js/ahk';

	// CSS
	mix.sass(ahkDevDir + 'app.scss', ahkProductionStylesDir + 'app.min.css');

	// Scripts
	mix.scripts(ahkDevDir + 'master.js', ahkProductionScriptsDir + 'master.min.js');
	mix.scripts(ahkDevDir + 'home.js', ahkProductionScriptsDir + 'home.min.js');
	mix.scripts(ahkDevDir + 'health/info.js', ahkProductionScriptsDir + 'health/info.min.js');
	mix.scripts(ahkDevDir + 'health/news.js', ahkProductionScriptsDir + 'health/news.min.js');
	mix.scripts(ahkDevDir + 'companies/index.js', ahkProductionScriptsDir + 'companies/index.min.js');
	mix.scripts(ahkDevDir + 'companies/show.js', ahkProductionScriptsDir + 'companies/show.min.js');
	mix.scripts(ahkDevDir + 'about.js', ahkProductionScriptsDir + 'about.min.js');
	mix.scripts(ahkDevDir + 'flash.js', ahkProductionScriptsDir + 'flash.min.js');

	// Versioning
	mix.version([
		// Ahk
		// CSS
		ahkProductionStylesDir + 'app.min.css',
		// JS
		ahkProductionScriptsDir + 'master.min.js',
		ahkProductionScriptsDir + 'flash.min.js',
		ahkProductionScriptsDir + 'home.min.js',
		ahkProductionScriptsDir + 'about.min.js',
		ahkProductionScriptsDir + 'health/info.min.js',
		ahkProductionScriptsDir + 'health/news.min.js',
		ahkProductionScriptsDir + 'companies/index.min.js'
	]);

	mix.browserSync({
		proxy: 'chamb.io'
	});
});
