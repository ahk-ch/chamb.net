@extends('ahk.layouts.master')
@section('title', trans('ahk.community'))
@section('css-implementing-plugins')
    <link href='{!! url("assets/plugins/image-hover/css/img-hover.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('css-page-style')
    <link href='{!! url("assets/css/pages/page_job.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('inline-styles')
    <style>
        .job-img {
            background: url("{!! url('img/community/background.jpg') !!}") 100% 50% no-repeat;
        }
    </style>
@endsection
@section('content')
    <div class="job-img margin-bottom-30">
        <div class="job-banner">
            <h2>{!! trans('ahk.discover_the_community') !!}</h2>
        </div>
        <div class="job-img-inputs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 md-margin-bottom-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="text" placeholder="what companies you are looking for" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4 md-margin-bottom-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <input type="text" placeholder="the location of the companies" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn-u btn-block btn-u-dark"> Search Company</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Job Img ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        <!-- Job Content -->
        <div class="headline"><h2>Industries</h2></div>
        <div class="row job-content">
            @foreach($industries as $industry)
                <div class="col-md-3 col-sm-3 md-margin-bottom-40">
                    <h3 class="heading-md"><strong><a href="#">{{ $industry->name }}</a></strong></h3>
                </div>
            @endforeach
        </div>
        <!-- End Job Content -->

    </div>
    <!--=== End Content Part ===-->

    <!--=== Job Team ===-->
    <div class="parallax-team parallaxBg">
        <div class="container content">
            <div class="title-box-v2">
                <h2>Popular <span class="color-green">Companies</span></h2>
                <p>The most viewed companies.</p>
            </div>

            <div class="row high-rated margin-bottom-20">

                @foreach($companies as $company)
                        <!-- Easy Block -->
                <div class="col-md-3 col-sm-6 md-margin-bottom-40">
                    <div class="easy-block-v1">
                        <div class="easy-block-v1-badge rgba-default">Marketing</div>
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li class="rounded-x active" data-target="#carousel-example-generic" data-slide-to="0"></li>
                                <li class="rounded-x" data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li class="rounded-x" data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img alt="" src="assets/img/main/img3.jpg">
                                </div>
                                <div class="item">
                                    <img alt="" src="assets/img/main/img1.jpg">
                                </div>
                                <div class="item">
                                    <img alt="" src="assets/img/main/img7.jpg">
                                </div>
                            </div>
                        </div>
                        <div class="overflow-h">
                            <h3>{{ $company->name }}</h3>
                        </div>
                        <ul class="list-unstyled">
                            <li>{{ \Illuminate\Support\Str::limit($company->description, 120) }}</li>
                        </ul>
                        <a class="btn-u btn-u-sm" href="#">View More</a>
                    </div>
                </div>
                <!-- End Easy Block -->
                @endforeach


                {{--<!-- Easy Block -->--}}
                {{--<div class="col-md-3 col-sm-6">--}}
                {{--<div class="easy-block-v1">--}}
                {{--<div class="easy-block-v1-badge rgba-purple">IT Management</div>--}}
                {{--<div id="carousel-example-generic-4" class="carousel slide" data-ride="carousel">--}}
                {{--<ol class="carousel-indicators">--}}
                {{--<li class="rounded-x active" data-target="#carousel-example-generic-4" data-slide-to="0"></li>--}}
                {{--<li class="rounded-x" data-target="#carousel-example-generic-4" data-slide-to="1"></li>--}}
                {{--<li class="rounded-x" data-target="#carousel-example-generic-4" data-slide-to="2"></li>--}}
                {{--</ol>--}}
                {{--<div class="carousel-inner">--}}
                {{--<div class="item active">--}}
                {{--<img alt="" src="assets/img/main/img20.jpg">--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                {{--<img alt="" src="assets/img/main/img23.jpg">--}}
                {{--</div>--}}
                {{--<div class="item">--}}
                {{--<img alt="" src="assets/img/main/img25.jpg">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="overflow-h">--}}
                {{--<h3>IT Project Management</h3>--}}
                {{--<ul class="list-inline star-vote">--}}
                {{--<li><i class="color-green fa fa-star"></i></li>--}}
                {{--<li><i class="color-green fa fa-star"></i></li>--}}
                {{--<li><i class="color-green fa fa-star"></i></li>--}}
                {{--<li><i class="color-green fa fa-star"></i></li>--}}
                {{--<li><i class="color-green fa fa-star-o"></i></li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--<ul class="list-unstyled">--}}
                {{--<li><span class="color-green">Position:</span> Project / Program Management</li>--}}
                {{--<li><span class="color-green">Required:</span> 2 - years of experience</li>--}}
                {{--</ul>--}}
                {{--<a class="btn-u btn-u-sm" href="#">View More</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<!-- End Easy Block -->--}}
            </div>

        </div>
    </div>
    <!--=== End Job Team ===-->


@endsection
@section('js-implementing-plugins')
@endsection
@section('js-inline')
    <script type="text/javascript" src="{!! url('assets/plugins/image-hover/js/touch.js') !!}"></script>
@endsection
@section('js-page-level')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            App.initParallaxBg();
        });
    </script>
@endsection

