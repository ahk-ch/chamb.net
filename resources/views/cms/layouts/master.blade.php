<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | CmsChamb</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <style type="text/css">
        {!! File::get(public_path(elixir("css/cms/above-the-fold-content.min.css"))) !!}
    </style>
    @yield('inline-css')
    <!--[if lt IE 9]>
    <script src="{!! url('build/js/lt-ie9.min.js') !!}"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-black @yield('body_class')">

<div class="wrapper">

    @include('cms._partials.header')
    @include('cms._partials.left_sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                @yield('title')
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('cms._partials.footer')
    @include('cms._partials.right_sidebar')
</div><!-- ./wrapper -->

{!! Form::input('hidden', 'notifications', json_encode(Session::get('flash_notifications'))) !!}
{!! Form::input('hidden', 'styleSheetUrls[]', elixir("css/cms/master.min.css")) !!}
<script type="text/javascript" src='{!! elixir("js/cms/master.min.js") !!}'></script>

@yield('js-files')

</body>
</html>
