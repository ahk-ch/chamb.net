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
        {!! File::get(public_path(elixir("css/above-the-fold-content.min.css"))) !!}
    </style>
    @yield('inline-css')
</head>
<body class="header-fixed header-fixed-space-default">

<div class="wrapper">

    @include('ahk._partials.header')

    @yield('content')

    @include('ahk._partials.footer')

</div>

{!! Form::input('hidden', 'notifications', json_encode(Session::get('flash_notifications'))) !!}
{!! Form::input('hidden', 'styleSheetUrls[]', elixir("css/master.min.css")) !!}

        <!-- Page Data to be passed to js. E.g. Async load css, mainly for libraries, using the styleSheetUrls array input field, see the previous command -->
@yield('extra-data')

<script type="text/javascript" src="{!! elixir('js/master.min.js') !!}"></script>

@yield('js-files')

<!--[if lt IE 9]>
<script src="{!! elixir('js/lt-ie9.min.js') !!}"></script><![endif]-->

</body>
</html>

