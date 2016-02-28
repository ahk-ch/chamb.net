<!DOCTYPE html>
<!--[if IE 8]>
<html lang="{!! $locale !!}" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="{!! $locale !!}" class="ie9"> <![endif]-->
<!-- [if !IE] -->
<html lang="{!! $locale !!}"><!-- [endif] -->
<head>
    <title> @yield('title') &middot; Chamb.Net</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{!! route('files.render', ['path' => 'img/home/favicon.ico']) !!}">
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
    {{--<link href='{!! elixir("css/master.min.css") !!}' rel='stylesheet' type='text/css'/>--}}
    <link href='{!! url("plugins/bootstrap/css/bootstrap.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("css/style.css") !!}' rel='stylesheet' type='text/css'/>

    <link href='{!! url("css/headers/header-default.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("css/footers/footer-v2.css") !!}' rel='stylesheet' type='text/css'/>

    <link href='{!! url("plugins/animate.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("plugins/line-icons/line-icons.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("plugins/font-awesome/css/font-awesome.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("plugins/login-signup-modal-window/css/style.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("plugins/parallax-slider/css/parallax-slider.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("plugins/fancybox/source/jquery.fancybox.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("plugins/owl-carousel/owl-carousel/owl.carousel.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("css/theme-colors/dark-blue.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("css/theme-skins/dark.css") !!}' rel='stylesheet' type='text/css'/>
    @yield('css')
</head>
<body class="header-fixed">

<div class="wrapper">

    @include('ahk._partials.header')

    @yield('content')

    @include('ahk._partials.footer')

</div>
<!-- JS Global Compulsory -->
<script type="text/javascript" src="plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="plugins/back-to-top.js"></script>
<script type="text/javascript" src="plugins/smoothScroll.js"></script>
<script type="text/javascript" src="{!! url('plugins/jquery.parallax.js') !!}"></script>
<script type="text/javascript" src="plugins/modernizr.js"></script>
<script src="plugins/login-signup-modal-window/js/main.js"></script> <!-- Gem jQuery -->
<script src="plugins/jquery.parallax.js"></script>
<script src="plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script src="plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<!-- JS Customization -->
<script type="text/javascript" src="js/custom.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="js/app.js"></script>
<script src="js/plugins/fancy-box.js"></script>
<script src="js/plugins/owl-carousel.js"></script>
<script type="text/javascript" src="js/plugins/style-switcher.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
//        StyleSwitcher.initStyleSwitcher();
//        App.initParallaxBg();
//        FancyBox.initFancybox();
//        OwlCarousel.initOwlCarousel();
    });
</script>

{{--<script type="text/javascript" src="{!! elixir('js/global-compulsory.min.js') !!}"></script>--}}
{{--<script type="text/javascript" src="{!! elixir('js/implementing-plugins.min.js') !!}"></script>--}}
{{--<script type="text/javascript" src="{!! elixir('js/page-level.min.js') !!}"></script>--}}

{{--@include('ahk._partials.flash')--}}

{{--@yield('js')--}}

{{--<!--[if lt IE 9]>--}}
{{--<script src="{!! elixir('js/lt-ie9.min.js') !!}"></script><![endif]-->--}}
</body>
</html>