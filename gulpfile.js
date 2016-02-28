var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;
process.env.DISABLE_NOTIFIER = true;

elixir(function (mix) {

	// Chamb.Net Styles
	mix.sass('ahk/app.scss', 'public/css/ahk/app.min.css');
	// Chamb.Net Scripts
	mix.scripts('ahk/master.js', 'public/js/ahk/master.min.js');
	mix.scripts('ahk/home.js', 'public/js/ahk/home.min.js');
	mix.scripts('ahk/health/info.js', 'public/js/ahk/health/info.min.js');
	mix.scripts('ahk/health/news.js', 'public/js/ahk/health/news.min.js');
	mix.scripts('ahk/companies/index.js', 'public/js/ahk/companies/index.min.js');
	mix.scripts('ahk/companies/show.js', 'public/js/ahk/companies/show.min.js');
	mix.scripts('ahk/about.js', 'public/js/ahk/about.min.js');
	mix.scripts('ahk/flash.js', 'public/js/ahk/flash.min.js');
	mix.scripts('ahk/my/companies/index.js', 'public/js/ahk/my/companies/index.min.js');


	// Unify Img
	mix.copy('bower_components/Unify/img', 'vendor/Unify/img');

	// Unify CSS
	mix.copy('bower_components/Unify/css', 'resources/assets/css/vendor/Unify');
	mix.copy('bower_components/Unify/css', 'public/vendor/Unify/css');
	mix.copy('bower_components/Unify/js', 'public/vendor/Unify/js');
	mix.copy('bower_components/Unify/img', 'public/vendor/Unify/img');

	mix.styles('vendor/Unify/style.css', 'public/vendor/Unify/css/style.min.css');
	// mix.styles('vendor/Unify/blocks.css', 'public/vendor/Unify/css/blocks.css');
	mix.styles('vendor/Unify/app.css', 'public/vendor/Unify/css/app.css');
	mix.styles('vendor/Unify/headers/header-default.css', 'public/vendor/Unify/css/headers/header-default.min.css');
	mix.styles('vendor/Unify/footers/footer-v2.css', 'public/vendor/Unify/css/footers/footer-v2.min.css');

	// Unify Scripts
	mix.copy('bower_components/Unify/js/app.js', 'resources/assets/js/vendor/Unify/js/app.js');
	mix.scripts('vendor/Unify/js/app.js', 'public/vendor/Unify/js/app.js');

	// Unify Plugins
	// Counter Waypoints
	mix.copy('bower_components/Unify/plugins/counter/waypoints.min.js', 'public/vendor/Unify/plugins/counter/waypoints.min.js');
	// Back To Top
	mix.copy('bower_components/Unify/plugins/back-to-top.js', 'resources/assets/js/vendor/Unify/plugins/back-to-top.js');
	mix.scripts('vendor/Unify/plugins/back-to-top.js', 'public/vendor/Unify/plugins/back-to-top.min.js');
	// Smooth Scroll
	mix.copy('bower_components/Unify/plugins/smoothScroll.js', 'resources/assets/js/vendor/Unify/plugins/smoothScroll.js');
	mix.scripts('vendor/Unify/plugins/smoothScroll.js', 'public/vendor/Unify/plugins/smoothScroll.min.js');
	// JQuery Parallax
	mix.copy('bower_components/Unify/plugins/jquery.parallax.js', 'resources/assets/js/vendor/Unify/plugins/jquery.parallax.js');
	mix.scripts('vendor/Unify/plugins/jquery.parallax.js', 'public/vendor/Unify/plugins/jquery.parallax.min.js');
	// Parallax
	mix.copy('bower_components/Unify/plugins/parallax-slider', 'public/vendor/Unify/plugins/parallax-slider');
	// Pnotify
	mix.copy('bower_components/pnotify/src/pnotify.core.min.css', 'public/vendor/pnotify/pnotify.core.min.css');
	mix.copy('bower_components/pnotify/src/pnotify.core.min.js', 'public/vendor/pnotify/pnotify.core.min.js');
	mix.copy('bower_components/pnotify/src/pnotify.confirm.min.js', 'public/vendor/pnotify/pnotify.confirm.min.js');
	// Bootstrap
	mix.copy('bower_components/Unify/plugins/bootstrap', 'public/vendor/Unify/plugins/bootstrap');
	// Fontawesome
	mix.copy('bower_components/Unify/plugins/font-awesome', 'public/vendor/Unify/plugins/font-awesome');
	// JQuery
	mix.copy('bower_components/Unify/plugins/jquery/jquery.min.js', 'public/vendor/Unify/plugins/jquery/jquery.min.js');
	mix.copy('bower_components/Unify/plugins/jquery/jquery-migrate.min.js', 'public/vendor/Unify/plugins/jquery/jquery-migrate.min.js');
	// Revolution Slider
	mix.copy('bower_components/Unify/plugins/revolution-slider/rs-plugin', 'public/vendor/Unify/plugins/revolution-slider/rs-plugin');
	// Animate
	mix.copy('bower_components/Unify/plugins/animate.css', 'resources/assets/css/vendor/Unify/plugins/animate.css');
	mix.styles('vendor/Unify/plugins/animate.css', 'public/vendor/Unify/plugins/animate.min.css');
	// Line Icons
	mix.copy('bower_components/Unify/plugins/line-icons/line-icons.css', 'resources/assets/css/vendor/Unify/plugins/line-icons/line-icons.css');
	mix.styles('vendor/Unify/plugins/line-icons/line-icons.css', 'public/vendor/Unify/plugins/line-icons/line-icons.min.css');

	// Chamb.Net CSS Master styles
	mix.copy('bower_components/Unify/plugins/bootstrap', 'public/vendor/Unify/plugins/bootstrap');
	mix.styles(['vendor/Unify/style.css'], 'public/css/ahk/master.min.css');

	// Plugins
	mix.copy('bower_components/respond/dest/respond.min.js', 'public/vendor/respond.min.js');
	mix.copy('bower_components/html5shiv/dist/html5shiv.min.js', 'public/vendor/html5shiv.min.js');

	mix.version([
		'public/css/ahk/app.min.css',
		'public/vendor/Unify/plugins/bootstrap/css/bootstrap.min.css',
		'public/vendor/Unify/plugins/bootstrap/js/bootstrap.min.js',
		'public/vendor/Unify/headers/header-default.min.css',
		'public/vendor/Unify/footers/footer-v2.min.css',
		'public/vendor/Unify/plugins/animate.min.css',
		'public/vendor/Unify/plugins/line-icons/line-icons.min.css',
	
		'public/vendor/pnotify/pnotify.core.min.css',
		'public/vendor/pnotify/pnotify.core.min.js',
		'public/vendor/pnotify/pnotify.confirm.min.js',

		'public/vendor/Unify/plugins/parallax-slider/js/modernizr.js',

		'public/vendor/Unify/plugins/font-awesome/css/font-awesome.min.css',
		'public/js/ahk/master.min.js',
		'public/js/ahk/flash.min.js',
		'public/js/ahk/home.min.js',
		'public/js/ahk/about.min.js',
		'public/js/ahk/health/info.min.js',
		'public/js/ahk/health/news.min.js',
		'public/js/ahk/companies/index.min.js',
		'public/js/ahk/my/companies/index.min.js',
		'public/vendor/Unify/plugins/jquery/jquery.min.js',
		'public/vendor/Unify/plugins/jquery/jquery-migrate.min.js',
		'public/vendor/Unify/plugins/back-to-top.min.js',
		'public/vendor/Unify/plugins/smoothScroll.min.js',
		'public/vendor/Unify/plugins/jquery.parallax.min.js'
	]);

	mix.browserSync({
		proxy: 'chamb.io'
	});
});
