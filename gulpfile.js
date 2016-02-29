var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;
process.env.DISABLE_NOTIFIER = true;

elixir(function (mix) {
	// Plugins
	mix.copy('bower_components/pnotify/src', 'resources/assets/css/vendor/pnotify');
	mix.copy('bower_components/pnotify/src', 'resources/assets/js/vendor/pnotify');
	mix.copy('bower_components/Readmore.js/', 'resources/assets/js/vendor/Readmore.js/');
	mix.copy('bower_components/jasny-bootstrap/dist/css', 'resources/assets/css/vendor/jasny-bootstrap/');
	mix.copy('bower_components/jasny-bootstrap/dist/js', 'resources/assets/js/vendor/jasny-bootstrap/');
	mix.copy('bower_components/select2/dist/css', 'resources/assets/css/vendor/select2/');
	mix.copy('bower_components/select2/dist/js', 'resources/assets/js/vendor/select2/');

	// mix.copy('bower_components/UnifyV1.9.1/', 'public');

	// Unify
	mix.copy('bower_components/UnifyV1.9.1/', 'resources/assets/css/vendor/UnifyV1.9.1/');

	// Font Imports
	mix.copy('bower_components/UnifyV1.9.1/plugins/bootstrap/fonts', 'public/build/css/fonts');
	mix.copy('bower_components/UnifyV1.9.1/plugins/line-icons/fonts', 'public/build/css/fonts');
	mix.copy('bower_components/UnifyV1.9.1/plugins/font-awesome/fonts', 'public/build/fonts');
	// Stylesheets Imports
	mix.styles('vendor/UnifyV1.9.1/css/app.css', 'public/build/css/app.css');
	mix.styles('vendor/UnifyV1.9.1/css/blocks.css', 'public/build/css/blocks.css');
	// Assets Import
	// mix.copy('resources/assets/css/vendor/UnifyV1.9.1/plugins/revolution-slider/rs-plugin/assets/', 'public/build/assets/');
	// Images Import
	mix.copy('bower_components/UnifyV1.9.1/img', 'public/build/img/');
	mix.copy('bower_components/UnifyV1.9.1/img', 'public/img/');

	mix
		.styles([
			'vendor/UnifyV1.9.1/plugins/bootstrap/css/bootstrap.min.css',
			'vendor/UnifyV1.9.1/css/style.css',
			'vendor/UnifyV1.9.1/css/headers/header-default.css',
			'vendor/UnifyV1.9.1/css/footers/footer-v2.css',
			'vendor/UnifyV1.9.1/plugins/animate.css',
			'vendor/UnifyV1.9.1/plugins/line-icons/line-icons.css',
			'vendor/UnifyV1.9.1/plugins/font-awesome/css/font-awesome.min.css',
			'vendor/UnifyV1.9.1/css/theme-colors/dark-blue.css',
			'vendor/UnifyV1.9.1/css/theme-skins/dark.css',
			'vendor/pnotify/pnotify.core.min.css'
		], 'public/css/master.min.css')
		.styles([
			'vendor/UnifyV1.9.1/css/pages/page_about.css'
		], 'public/css/about.min.css')
		.styles([
			'vendor/UnifyV1.9.1/plugins/image-hover/css/img-hover.css',
			'vendor/UnifyV1.9.1/css/pages/page_job.css',
		], 'public/css/companies.min.css')
		.styles([
			'vendor/UnifyV1.9.1/css/pages/page_log_reg_v1.css',
		], 'public/css/sign_in.min.css')
		.styles([
			'vendor/jasny-bootstrap/jasny-bootstrap.min.css',
			'resources/assets/css/vendor/select2/select2.min.css'
		], 'public/css/my/companies/create-and-edit.min.css')
		.styles([
			'vendor/UnifyV1.9.1/css/pages/page_job.css',
		], 'public/css/health/news.min.css')
		.sass('home.scss');

	mix.scripts([
			'vendor/UnifyV1.9.1/plugins/jquery/jquery.min.js',
			'vendor/UnifyV1.9.1/plugins/jquery/jquery-migrate.min.js',
			'vendor/UnifyV1.9.1/plugins/bootstrap/js/bootstrap.min.js',
			'vendor/UnifyV1.9.1/plugins/smoothScroll.js',
			'vendor/UnifyV1.9.1/plugins/jquery.parallax.js',
			'vendor/pnotify/pnotify.core.min.js',
			'vendor/pnotify/pnotify.confirm.min.js',
			'vendor/UnifyV1.9.1/js/app.js',
			'vendor/UnifyV1.9.1/plugins/back-to-top.js',
			'vendor/UnifyV1.9.1/js/plugins/style-switcher.js',
			'vendor/UnifyV1.9.1/plugins/modernizr.js',
			'ahk/master.js',
		], 'public/js/master.min.js')
		.scripts([
			'vendor/UnifyV1.9.1/plugins/respond.js',
			'vendor/UnifyV1.9.1/plugins/html5shiv.js',
			'vendor/UnifyV1.9.1/plugins/placeholder-IE-fixes.js'
		], 'public/js/lt-ie9.min.js')
		.scripts([
			'ahk/home.js'
		], 'public/js/home.min.js')
		.scripts([
			'ahk/flash.js'
		], 'public/js/flash.min.js')
		// .scripts([
		// 	'UnifyV1.9.1/css/pages/page_job.css',
		// ], 'public/js/health/news.min.js')
		.scripts([
			'ahk/companies/index.js',
			'vendor/UnifyV1.9.1/plugins/image-hover/js/touch.js',
			'vendor/Readmore.js/readmore.min.js',
		], 'public/js/companies/index.min.js')
		.scripts([
			'vendor/Readmore.js/readmore.min.js',
			'ahk/my/companies/index.js'
		], 'public/js/my/companies/index.min.js')
		.scripts([
			'vendor/jasny-bootstrap/jasny-bootstrap.min.js',
			'vendor/select2/select2.min.js',
			'ahk/my/companies/create.js'
		], 'public/js/my/companies/create-and-edit.min.js');

	mix.version([
		'public/css/master.min.css',
		'public/css/home.css',
		'css/about.min.css',
		'public/css/companies.min.css',
		'public/css/sign_in.min.css',
		'public/css/my/companies/create-and-edit.min.css',
		'public/css/health/news.min.css',
	
		'public/js/master.min.js',
		'public/js/lt-ie9.min.js',
		'public/js/home.min.js',
		'public/js/companies/index.min.js',
		'public/js/flash.min.js',
		'public/js/my/companies/index.min.js',
		'public/js/my/companies/create-and-edit.min.js',
	]);

	mix.browserSync({
		proxy: 'chamb.io'
	});
});
