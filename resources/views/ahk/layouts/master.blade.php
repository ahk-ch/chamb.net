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
    <style type="text/css">
        {!! file_get_contents(url(elixir("css/above-the-fold-content.min.css"))) !!}}
    </style>
    @yield('inline-css')
</head>
<body class="header-fixed header-fixed-space-default">

<div class="wrapper">

    @include('ahk._partials.header')

    @yield('content')

    @include('ahk._partials.footer')

</div>

<!-- Optimize css delivery -->
{!! Form::input('hidden', 'styleSheetUrls[]', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin') !!}
{!! Form::input('hidden', 'styleSheetUrls[]', elixir("css/master.min.css")) !!}
<!-- Flash Data -->
{!! Form::input('hidden', 'notifications', json_encode(Session::get('flash_notifications'))) !!}
<!-- Page Data -->
@yield('hidden-inputs')

@yield('optimize-css-delivery')
<script type="text/javascript" src="{!! url('js/loadStyleSheets.min.js') !!}"></script>
<script type="text/javascript" src="{!! elixir('js/master.min.js') !!}"></script>
@yield('js-files')
<!--[if lt IE 9]>
<script src="{!! elixir('js/lt-ie9.min.js') !!}"></script><![endif]-->
</body>
</html>