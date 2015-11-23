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
    <link rel="shortcut icon" href=href="{!! url('favicon.ico') !!}">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory -->
    <link href='{!! url("assets/plugins/bootstrap/css/bootstrap.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/css/style.css") !!}' rel='stylesheet' type='text/css'/>

    <!-- CSS Header and Footer -->
    <link href='{!! url("assets/css/header.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/css/footer.css") !!}' rel='stylesheet' type='text/css'/>

    <!-- CSS Implementing Plugins -->
    <link href='{!! url("assets/plugins/animate.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/line-icons/line-icons.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/font-awesome/css/font-awesome.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/parallax-slider/css/parallax-slider.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/owl-carousel/owl-carousel/owl.carousel.css") !!}' rel='stylesheet' type='text/css'/>

    <!-- CSS Customization -->
    @yield('inline-styles')
    <link href='{!! url("assets/css/custom.css") !!}' rel='stylesheet' type='text/css'/>
</head>

<body>
<div class="wrapper">

    @include('_partials.header')

    @yield('content')

    @include('_partials.footer')

</div><!--/wrapper-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="{!! url('assets/plugins/jquery/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/jquery/jquery-migrate.min.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/bootstrap/js/bootstrap.min.js') !!}"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{!! url('assets/plugins/back-to-top.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/smoothScroll.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/parallax-slider/js/modernizr.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/parallax-slider/js/jquery.cslider.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/plugins/owl-carousel/owl-carousel/owl.carousel.js') !!}"></script>
<!-- JS Customization -->
<script type="text/javascript" src="{!! url('assets/js/custom.js') !!}"></script>
@yield('scripts')
@yield('inline-scripts')
        <!-- JS Page Level -->
<script type="text/javascript" src="{!! url('assets/js/app.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/js/plugins/owl-carousel.js') !!}"></script>
<script type="text/javascript" src="{!! url('assets/js/plugins/parallax-slider.js') !!}"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        App.init();
        OwlCarousel.initOwlCarousel();
        ParallaxSlider.initParallaxSlider();
    });
</script>
<!--[if lt IE 9]>
<script src="{!! url('assets/plugins/respond.js') !!}"></script>
<script src="{!! url('assets/plugins/html5shiv.js') !!}"></script>
<script src="{!! url('assets/plugins/placeholder-IE-fixes.js') !!}"></script><![endif]-->

</body>
</html>