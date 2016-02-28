<!DOCTYPE html>
<!--[if IE 8]>
<html lang="{!! $locale !!}" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="{!! $locale !!}" class="ie9"> <![endif]-->
<!-- [if !IE] -->
<html lang="{!! $locale !!}">
<!-- [endif] -->
<head>
    <title> @yield('title') &middot; Chamb.Net</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{!! route('files.render', ['path' => 'img/home/favicon.ico']) !!}">
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
    <link href='{!! url("vendor/Unify/plugins/bootstrap/css/bootstrap.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/Unify/css/style.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/Unify/css/headers/header-default.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/Unify/css/footers/footer-v2.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/Unify/plugins/animate.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/Unify/plugins/line-icons/line-icons.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/Unify/plugins/font-awesome/css/font-awesome.min.css") !!}' rel='stylesheet' type='text/css'/>
{{--    <link href='{!! elixir("vendor/Unify/plugins/login-signup-modal-window/css/style.css") !!}' rel='stylesheet' type='text/css'/>--}}
    <link href='{!! elixir("vendor/pnotify/pnotify.core.min.css") !!}' rel='stylesheet' type='text/css'/>

    <link href='{!! url("css/ahk/app.min.css") !!}' rel='stylesheet' type='text/css'/>

    @yield('css-implementing-plugins')
    @yield('css-page-style')

</head>
<body class="header-fixed">

<div class="wrapper">

    @include('ahk._partials.header')

    @yield('content')

    @include('ahk._partials.footer')

</div><!--/wrapper-->

<script type="text/javascript" src="{!! elixir('vendor/Unify/plugins/jquery/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! elixir('vendor/Unify/plugins/jquery/jquery-migrate.min.js') !!}"></script>
<script type="text/javascript" src="{!! elixir('vendor/Unify/plugins/bootstrap/js/bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! elixir('vendor/Unify/plugins/back-to-top.min.js') !!}"></script>
<script type="text/javascript" src="{!! elixir('vendor/Unify/plugins/smoothScroll.min.js') !!}"></script>
<script type="text/javascript" src="{!! elixir('vendor/Unify/plugins/jquery.parallax.min.js') !!}"></script>
<script type="text/javascript" src="{!! elixir('vendor/Unify/plugins/parallax-slider/js/modernizr.js') !!}"></script>
<script type="text/javascript" src='{!! elixir("vendor/pnotify/pnotify.core.min.js") !!}'></script>
<script type="text/javascript" src='{!! elixir("vendor/pnotify/pnotify.confirm.min.js") !!}'></script>
@yield('js-implementing-plugins')
@include('ahk._partials.flash')
<script type="text/javascript" src="{!! url('vendor/Unify/js/app.js') !!}"></script>
<script type="text/javascript" src="{!! elixir('js/ahk/master.min.js') !!}"></script>
@yield('js-page-level')
<!--[if lt IE 9]>
<script src="{!! url('vendor/respond.min.js') !!}"></script>
<script src="{!! url('vendor/html5shiv.min.js') !!}"></script>
<script src="{!! url('assets/plugins/placeholder-IE-fixes.js') !!}"></script><![endif]-->
</body>
</html>