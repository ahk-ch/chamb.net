<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | CmsChamb</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{!! url('vendor/AdminLTE/bootstrap/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href='{!! url("vendor/pnotify/src/pnotify.core.css") !!}' rel='stylesheet' type='text/css'/>
    @yield('styles')
    <link rel="stylesheet" href="{!! url('vendor/AdminLTE/dist/css/AdminLTE.min.css') !!}">
    <link rel="stylesheet" href="{!! url('vendor/AdminLTE/dist/css/skins/skin-black.min.css') !!}">

    @yield('inline-styles')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
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

<script src="{!! url('vendor/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js') !!}"></script>
<script src="{!! url('vendor/AdminLTE/bootstrap/js/bootstrap.min.js') !!}"></script>
<script src="{!! url('vendor/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
<script src="{!! url('vendor/AdminLTE/plugins/fastclick/fastclick.min.js') !!}"></script>
<script src="{!! url('vendor/AdminLTE/dist/js/app.min.js') !!}"></script>
<script type="text/javascript" src='{!! url("vendor/pnotify/src/pnotify.core.min.js") !!}'></script>
<script type="text/javascript" src='{!! url("vendor/pnotify/src/pnotify.confirm.min.js") !!}'></script>
@include('cms._partials.flash')
@yield('scripts')
@yield('inline-scripts')
</body>
</html>


