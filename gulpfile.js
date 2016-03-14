var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

process.env.DISABLE_NOTIFIER = true;

elixir(function (mix) {

    mix.copy('bower_components/UnifyV1.9.1/plugins/bootstrap/fonts', 'public/build/fonts');
    mix.copy('bower_components/UnifyV1.9.1/plugins/font-awesome/fonts', 'public/build/fonts');
    mix.copy('bower_components/UnifyV1.9.1/plugins/line-icons/fonts', 'public/build/fonts');

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
            'bower_components/UnifyV1.9.1/plugins/line-icons/style.css',
            'bower_components/UnifyV1.9.1/plugins/font-awesome/css/font-awesome.min.css',
            'bower_components/pnotify/src/pnotify.core.min.css',
        ], 'build/css/master.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/css/pages/page_search.css',
        ], 'build/css/industries/info/above-the-fold.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css',
            'bower_components/UnifyV1.9.1/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css',
        ], 'build/css/industries/info/vendor.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/css/pages/page_job.css',
        ], 'build/css/industries/news/above-the-fold.min.css', '.')
        .styles([
            'bower_components/UnifyV1.9.1/plugins/fancybox/source/jquery.fancybox.css',
        ], 'build/css/industries/news/vendor.min.css', '.');



    //.styles([
    //    'vendor/UnifyV1.9.1/css/pages/page_about.css'
    //], 'public/css/about.min.css', '.')
    //.styles([
    //    'vendor/UnifyV1.9.1/plugins/image-hover/css/img-hover.css',
    //    'vendor/UnifyV1.9.1/css/pages/page_job.css',
    //], 'public/css/companies.min.css', '.')
    //.styles([
    //    'vendor/UnifyV1.9.1/plugins/scrollbar/css/jquery.mCustomScrollbar.css',
    //    'vendor/UnifyV1.9.1/plugins/sky-forms-pro/skyforms/css/sky-forms.css',
    //    'vendor/UnifyV1.9.1/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css',
    //    'vendor/UnifyV1.9.1/css/pages/profile.css',
    //    'vendor/UnifyV1.9.1/css/pages/shortcode_timeline2.css',
    //], 'public/css/industries/companies/show.min.css', '.')
    //.styles([
    //    'vendor/UnifyV1.9.1/css/pages/page_log_reg_v1.css',
    //], 'public/css/sign_in.min.css', '.')
    //.styles([
    //    'vendor/jasny-bootstrap/jasny-bootstrap.min.css',
    //    'resources/assets/css/vendor/select2/select2.min.css'
    //], 'public/css/my/companies/create-and-edit.min.css', '.')
    //.styles([
    //    'vendor/UnifyV1.9.1/css/pages/page_job.css',
    //], 'public/css/industries/news.min.css', '.')
    //.styles([
    //    'vendor/UnifyV1.9.1/css/pages/page_search_inner.css',
    //], 'public/css/industries/work-groups.min.css', '.')
    //.styles([
    //    'vendor/UnifyV1.9.1/plugins/scrollbar/css/jquery.mCustomScrollbar.css',
    //    'vendor/UnifyV1.9.1/plugins/sky-forms-pro/skyforms/css/sky-forms.css',
    //    'vendor/UnifyV1.9.1/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css',
    //    'vendor/UnifyV1.9.1/css/pages/profile.css',
    //], 'public/css/industries/work-groups/show.min.css', '.');


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
    // .scripts([
    // 	'UnifyV1.9.1/css/pages/page_job.css',
    // ], 'public/js/industries/news.min.js')
    //    .scripts([
    //        'ahk/companies/index.js',
    //        'vendor/UnifyV1.9.1/plugins/image-hover/js/touch.js',
    //        'vendor/Readmore.js/readmore.min.js',
    //    ], 'public/js/companies/index.min.js')
    //    .scripts([
    //        'ahk/companies/show.js',
    //        'vendor/UnifyV1.9.1/plugins/circles-master/circles.js',
    //        'vendor/UnifyV1.9.1/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js',
    //        'vendor/UnifyV1.9.1/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js',
    //        'vendor/UnifyV1.9.1/plugins/gmap/gmap.js',
    //        'vendor/UnifyV1.9.1/js/plugins/datepicker.js',
    //        'vendor/UnifyV1.9.1/js/plugins/circles-master.js',
    //        'vendor/UnifyV1.9.1/js/forms/login.js',
    //        'vendor/UnifyV1.9.1/js/forms/contact.js',
    //        'vendor/UnifyV1.9.1/js/pages/page_contacts.js',
    //    ], 'public/js/industries/companies/show.min.js')
    //    .scripts([
    //        'vendor/Readmore.js/readmore.min.js',
    //        'ahk/my/companies/index.js'
    //    ], 'public/js/my/companies/index.min.js')
    //    .scripts([
    //        'vendor/jasny-bootstrap/jasny-bootstrap.min.js',
    //        'vendor/select2/select2.min.js',
    //        'ahk/my/companies/create.js'
    //    ], 'public/js/my/companies/create-and-edit.min.js')
    //    .scripts([
    //        'vendor/UnifyV1.9.1/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js',
    //        'vendor/UnifyV1.9.1/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js',
    //        'ahk/industries/work-groups/show.js'
    //    ], 'public/js/industries/work-groups/show.min.js');


    mix.version([
        './build/css/above-the-fold-content.min.css',
        './build/css/master.min.css',

        './build/css/industries/info/above-the-fold.min.css',
        './build/css/industries/info/vendor.min.css',

        './build/css/industries/news/vendor.min.css',
        './build/css/industries/news/above-the-fold.min.css',


        //'public/css/about.min.css',
        //'public/css/companies.min.css',
        //'public/css/sign_in.min.css',
        //'public/css/my/companies/create-and-edit.min.css',
        //'public/css/industries/news.min.css',
        //'public/css/industries/work-groups.min.css',
        //'public/css/industries/companies/show.min.css',
        //'public/css/industries/work-groups/show.min.css',

        './build/js/master.min.js',
        './build/js/lt-ie9.min.js',
        './build/js/home.min.js',
        './build/js/industries/info/vendor.min.js',
        //'public/js/companies/index.min.js',
        //'public/js/my/companies/index.min.js',
        //'public/js/my/companies/create-and-edit.min.js',
        //'public/js/industries/companies/show.min.js',
        //'public/js/industries/work-groups/show.min.js'
    ]);

    mix.browserSync({
        proxy: 'chamb.app'
    });
});
