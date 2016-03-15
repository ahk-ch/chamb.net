var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

process.env.DISABLE_NOTIFIER = true;

elixir(function (mix) {

    mix.copy('bower_components/UnifyV1.9.1/plugins/bootstrap/fonts', 'public/build/fonts');
    mix.copy('bower_components/UnifyV1.9.1/plugins/font-awesome/fonts', 'public/build/fonts');
    mix.copy('bower_components/UnifyV1.9.1/plugins/line-icons/fonts', 'public/build/css/fonts');
    mix.copy('bower_components/UnifyV1.9.1/img', 'public/build/img');

    mix
        .styles([
            'bower_components/UnifyV1.9.1/plugins/bootstrap/css/bootstrap.min.css',
            'bower_components/UnifyV1.9.1/css/app.css',
            'bower_components/UnifyV1.9.1/css/blocks.css',
            'bower_components/UnifyV1.9.1/css/style.css',
            'bower_components/UnifyV1.9.1/css/headers/header-default.css',
            'bower_components/UnifyV1.9.1/css/footers/footer-v2.css',
            'bower_components/UnifyV1.9.1/css/theme-colors/dark-blue.css',
            'bower_components/UnifyV1.9.1/css/theme-skins/dark.css',
        ], 'build/css/above-the-fold-content.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/plugins/animate.css',
            'bower_components/UnifyV1.9.1/plugins/line-icons/line-icons.css',
            'bower_components/UnifyV1.9.1/plugins/font-awesome/css/font-awesome.min.css',
            'bower_components/pnotify/src/pnotify.core.min.css',
        ], 'build/css/master.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/css/pages/page_search.css',
        ], 'build/css/industries/info/above-the-fold-content.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css',
            'bower_components/UnifyV1.9.1/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css',
        ], 'build/css/industries/info/vendor.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/css/pages/page_job.css',
        ], 'build/css/industries/news/above-the-fold-content.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/plugins/fancybox/source/jquery.fancybox.css',
        ], 'build/css/industries/news/vendor.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/css/pages/page_about.css'
        ], 'build/css/about.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/plugins/image-hover/css/img-hover.css',
            'bower_components/UnifyV1.9.1/css/pages/page_job.css',
        ], 'build/css/industries/companies/index/above-the-fold-content.min.css', '.')
        .styles([], 'build/css/industries/companies/index/vendor.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/plugins/scrollbar/css/jquery.mCustomScrollbar.css',
            'bower_components/UnifyV1.9.1/plugins/sky-forms-pro/skyforms/css/sky-forms.css',
            'bower_components/UnifyV1.9.1/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css',
            'bower_components/UnifyV1.9.1/css/pages/profile.css',
            'bower_components/UnifyV1.9.1/css/pages/shortcode_timeline2.css',
        ], 'build/css/industries/companies/show/above-the-fold-content.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/css/pages/page_log_reg_v1.css',
        ], 'build/css/auth/sign-in/above-the-fold-content.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/css/pages/page_search_inner.css',
        ], 'build/css/industries/work-groups/index/above-the-fold-content.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/css/pages/profile.css',
        ], 'build/css/industries/work-groups/show/above-the-fold-content.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/plugins/scrollbar/css/jquery.mCustomScrollbar.css',
            'bower_components/UnifyV1.9.1/plugins/sky-forms-pro/skyforms/css/sky-forms.css',
            'bower_components/UnifyV1.9.1/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css',
        ], 'build/css/industries/work-groups/show/vendor.min.css', '.')
    .styles([
        'bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css',
        'bower_components/select2/dist/css/select2.min.css'
    ], './build/css/my/companies/create-and-edit.min.css', '.');


    mix.scripts([
            'bower_components/UnifyV1.9.1/plugins/jquery/jquery.min.js',
            'bower_components/UnifyV1.9.1/plugins/jquery/jquery-migrate.min.js',
            'bower_components//UnifyV1.9.1/plugins/bootstrap/js/bootstrap.min.js',
            'bower_components//UnifyV1.9.1/plugins/smoothScroll.js',
            'bower_components/UnifyV1.9.1/plugins/jquery.parallax.js',
            'bower_components/pnotify/src/pnotify.core.min.js',
            'bower_components/pnotify/src/pnotify.confirm.min.js',
            'bower_components/UnifyV1.9.1/js/app.js',
            'bower_components/UnifyV1.9.1/plugins/back-to-top.js',
            'bower_components/UnifyV1.9.1/js/plugins/style-switcher.js',
            'bower_components/UnifyV1.9.1/plugins/modernizr.js',
            'resources/assets/js/ahk/master.js',
            'resources/assets/js/ahk/flash.js',
            'resources/assets/js/ahk/loadStyleSheets.js'
        ], 'build/js/master.min.js', '.')
        .scripts([
            'bower_components/UnifyV1.9.1/plugins/respond.js',
            'bower_components/UnifyV1.9.1/plugins/html5shiv.js',
            'bower_components/UnifyV1.9.1/plugins/placeholder-IE-fixes.js'
        ], 'build/js/lt-ie9.min.js', '.')
        .scripts([
            'resources/assets/js/ahk/home.js'
        ], 'build/js/home.min.js', '.')
        .scripts([
            'bower_components/holderjs/holder.min.js'
        ], 'build/js/industries/info/vendor.min.js', '.')
        .scripts([
            'bower_components/UnifyV1.9.1/plugins/image-hover/js/touch.js',
            'bower_components/Readmore.js/readmore.min.js',
            'resources/assets/js/ahk/industries/companies/index.js',
        ], 'build/js/industries/companies/index.min.js', '.')
        .scripts([
            'bower_components/UnifyV1.9.1/plugins/circles-master/circles.js',
            'bower_components/UnifyV1.9.1/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js',
            'bower_components/UnifyV1.9.1/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js',
            'bower_components/UnifyV1.9.1/plugins/gmap/gmap.js',
            'bower_components/UnifyV1.9.1/js/plugins/datepicker.js',
            'bower_components/UnifyV1.9.1/js/plugins/circles-master.js',
            'bower_components/UnifyV1.9.1/js/forms/login.js',
            'bower_components/UnifyV1.9.1/js/forms/login.js',
            'bower_components/UnifyV1.9.1/js/forms/contact.js',
            'bower_components/UnifyV1.9.1/js/pages/page_contacts.js',
            'resources/assets/js/ahk/industries/companies/show.js',
        ], 'build/js/industries/companies/show.min.js', '.')
        .scripts([
            'bower_components/Readmore.js/readmore.min.js',
            'resources/assets/js/ahk/my/companies/index.js'
        ], 'build/js/my/companies/index.min.js', '.')
        .scripts([
            'bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js',
            'bower_components/select2/dist/js/select2.min.js',
            'resources/assets/js/ahk/my/companies/create.js'
        ], 'build/js/my/companies/create-and-edit.min.js', '.');


    mix.version([
        './build/css/above-the-fold-content.min.css',
        './build/css/master.min.css',

        './build/js/home.min.js',
        './build/css/about.min.css',
        './build/css/auth/sign-in/above-the-fold-content.min.css',

        './build/css/industries/info/above-the-fold-content.min.css',
        './build/css/industries/info/vendor.min.css',
        './build/js/industries/info/vendor.min.js',

        './build/css/industries/news/vendor.min.css',
        './build/css/industries/news/above-the-fold-content.min.css',

        './build/css/industries/work-groups/index/above-the-fold-content.min.css',

        './build/css/industries/work-groups/show/above-the-fold-content.min.css',
        './build/css/industries/work-groups/show/vendor.min.css',

        './build/js/master.min.js',
        './build/js/lt-ie9.min.js',
        './build/js/industries/companies/index.min.js',

        './build/css/industries/companies/index/above-the-fold-content.min.css',
        './build/css/industries/companies/show/above-the-fold-content.min.css',
        './build/js/industries/companies/show.min.js',

        './build/css/my/companies/create-and-edit.min.css',
        './build/js/my/companies/index.min.js',
        './build/js/my/companies/create-and-edit.min.js'
    ]);

    mix.browserSync({
        proxy: 'chamb.app'
    });
});
