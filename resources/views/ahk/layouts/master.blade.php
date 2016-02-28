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
    <link href='{!! elixir("css/master.min.css") !!}' rel='stylesheet' type='text/css'/>
    @yield('css')
</head>
<body class="header-fixed">

<div class="wrapper">

    @include('ahk._partials.header')

    @yield('content')

    @include('ahk._partials.footer')

</div>

<script type="text/javascript" src="{!! elixir('js/master.min.js') !!}"></script>

@include('ahk._partials.flash')

@yield('js')

<!--[if lt IE 9]>
<script src="{!! elixir('js/lt-ie9.min.js') !!}"></script><![endif]-->
</body>
</html>