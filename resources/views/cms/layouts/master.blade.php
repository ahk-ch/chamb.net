<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | CmsChamb</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <style type="text/css">
{{--        {!! File::get(public_path(elixir("css/cms/above-the-fold-content.min.css"))) !!}--}}
{{--        {!! File::get(public_path(elixir("css/cms/above-the-fold-content2.min.css"))) !!}--}}
    </style>
    <link href="{!! elixir("css/cms/above-the-fold-content.min.css") !!}">
    @yield('inline-styles')

    {{--<!--[if lt IE 9]>--}}
    {{--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>--}}
    {{--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->--}}
</head>
<body class="hold-transition skin-black">
<!-- Site wrapper -->
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

<script src="{!! elixir('js/cms/master.min.js') !!}"></script>
@include('cms._partials.flash')
@yield('inline-scripts')
</body>
</html>


