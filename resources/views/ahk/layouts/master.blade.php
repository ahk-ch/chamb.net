<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <title>AHK &middot; @yield('title')</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{!! url('favicon.ico') !!}">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory -->
    <link href='{!! url("assets/plugins/bootstrap/css/bootstrap.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/css/style.css") !!}' rel='stylesheet' type='text/css'/>

    <!-- CSS Header and Footer -->
    <link href='{!! url("assets/css/headers/header-default.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/css/footers/footer-v6.css") !!}' rel='stylesheet' type='text/css'/>

    <!-- CSS Implementing Plugins -->
    <link href='{!! url("assets/plugins/animate.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/line-icons/line-icons.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/font-awesome/css/font-awesome.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/login-signup-modal-window/css/style.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/pnotify/src/pnotify.core.css") !!}' rel='stylesheet' type='text/css'/>
    @yield('css-implementing-plugins')

            <!-- CSS Customization -->
    <link href='{!! url("assets/css/custom.css") !!}' rel='stylesheet' type='text/css'/>
    <!-- CSS Page Style -->
    @yield('css-page-style')
    @yield('inline-styles')
</head>

<body class="header-fixed">

<div class="wrapper">

    @include('ahk._partials.header')

    @yield('content')

    @include('ahk._partials.footer')

    @include('ahk._partials.auth')

</div><!--/wrapper-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="{!! url('assets/plugins/jquery/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/jquery/jquery-migrate.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/bootstrap/js/bootstrap.min.js') !!}"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{!! url('assets/plugins/back-to-top.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/smoothScroll.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/jquery.parallax.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/parallax-slider/js/modernizr.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/parallax-slider/js/modernizr.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/js/login-signup.js') !!}"></script>
<script type="text/javascript" src='{!! url("vendor/pnotify/src/pnotify.core.min.js") !!}'></script>
<script type="text/javascript" src='{!! url("vendor/pnotify/src/pnotify.confirm.min.js") !!}'></script>
@yield('js-implementing-plugins')
<script type="text/javascript" src="{!! url('assets/js/custom.js') !!}"></script>
@include('ahk._partials.flash')
<script type="text/javascript" src="{!! url('assets/js/app.js') !!}"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        App.init();
    });
</script>
@yield('js-page-level')
<!--[if lt IE 9]>
<script src="{!! url('assets/plugins/respond.js') !!}"></script>
<script src="{!! url('assets/plugins/html5shiv.js') !!}"></script>
<script src="{!! url('assets/plugins/placeholder-IE-fixes.js') !!}"></script><![endif]-->

</body>
</html>