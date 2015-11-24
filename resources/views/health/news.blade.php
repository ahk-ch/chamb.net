@extends('layouts.master')
@section('title', 'News')
@section('css-implementing-plugins')
    <link href='{!! url("assets/plugins/image-hover/css/img-hover.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('css-page-style')
    <link href='{!! url("assets/css/pages/page_job.css") !!}' rel='stylesheet' type='text/css'/>
    @endsection
    @section('content')
    {!! Breadcrumbs::render() !!}

            <!--=== Job Img ===-->
    <div class="job-img margin-bottom-30">
        <div class="job-banner">
            <h2>Discover the News You would love to Learn about ...</h2>
        </div>
        <div class="job-img-inputs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 md-margin-bottom-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="text" placeholder="what news you are looking for" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn-u btn-block btn-u-dark"> Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Job Img ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        <!-- Job Content -->
        <div class="headline"><h2>News Categories</h2></div>
        <div class="row job-content margin-bottom-40">
            <div class="col-md-3 col-sm-3 md-margin-bottom-40">
                <h3 class="heading-md"><strong>Accounting &amp; Finance</strong></h3>
                <ul class="list-unstyled categories">
                    <li><a href="#">Accounting</a>
                        <small class="hex">(342 jobs)</small>
                    </li>
                    <li><a href="#">Admin &amp; Clerical</a>
                        <small class="hex">(143 jobs)</small>
                    </li>
                    <li><a href="#">Banking &amp; Finance</a>
                        <small class="hex">(66 jobs)</small>
                    </li>
                    <li><a href="#">Contract &amp; Freelance</a>
                        <small class="hex">(12 jobs)</small>
                    </li>
                    <li><a href="#">Business Development</a>
                        <small class="hex">(212 jobs)</small>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 md-margin-bottom-40">
                <h3 class="heading-md"><strong>Medicla &amp; Health</strong></h3>
                <ul class="list-unstyled categories">
                    <li><a href="#">Nurse</a>
                        <small class="hex">(546 jobs)</small>
                    </li>
                    <li><a href="#">Health Care</a>
                        <small class="hex">(82 jobs)</small>
                    </li>
                    <li><a href="#">General Labor</a>
                        <small class="hex">(11 jobs)</small>
                    </li>
                    <li><a href="#">Pharmaceutical</a>
                        <small class="hex">(109 jobs)</small>
                    </li>
                    <li><a href="#">Human Resources</a>
                        <small class="hex">(401 jobs)</small>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 md-margin-bottom-40">
                <h3 class="heading-md"><strong>Web Development</strong></h3>
                <ul class="list-unstyled categories">
                    <li><a href="#">Ecommerce</a>
                        <small class="hex">(958 jobs)</small>
                    </li>
                    <li><a href="#">Web Design</a>
                        <small class="hex">(576 jobs)</small>
                    </li>
                    <li><a href="#">Web Programming</a>
                        <small class="hex">(543 jobs)</small>
                    </li>
                    <li><a href="#">Other - Web Development</a>
                        <small class="hex">(67 jobs)</small>
                    </li>
                    <li><a href="#">Website Project Management</a>
                        <small class="hex">(45 jobs)</small>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3">
                <h3 class="heading-md"><strong>Sales &amp; Marketing</strong></h3>
                <ul class="list-unstyled categories">
                    <li><a href="#">Advertising</a>
                        <small class="hex">(123 jobs)</small>
                    </li>
                    <li><a href="#">Email Marketing</a>
                        <small class="hex">(544 jobs)</small>
                    </li>
                    <li><a href="#">Telemarketing &amp; Telesales</a>
                        <small class="hex">(564 jobs)</small>
                    </li>
                    <li><a href="#">Market Research &amp; Surveys</a>
                        <small class="hex">(345 jobs)</small>
                    </li>
                    <li><a href="#">SEM - Search Engine Marketing</a>
                        <small class="hex">(32 jobs)</small>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Job Content -->

        <div class="headline margin-bottom-35"><h2>Latest News</h2></div>

        <!-- Easy Blocks v1 -->
        <div class="row high-rated margin-bottom-20">
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
                                <img alt="" src="{!! url('assets/img/main/img3.jpg') !!}">
                            </div>
                            <div class="item">
                                <img alt="" src="{!! url('assets/img/main/img1.jpg') !!}">
                            </div>
                            <div class="item">
                                <img alt="" src="{!! url('assets/img/main/img7.jpg') !!}">
                            </div>
                        </div>
                    </div>
                    <div class="overflow-h">
                        <h3>Savoy Hotel London</h3>
                        <div class="star-vote pull-right">
                            <ul class="list-inline">
                                <li><i class="color-green fa fa-star"></i></li>
                                <li><i class="color-green fa fa-star"></i></li>
                                <li><i class="color-green fa fa-star"></i></li>
                                <li><i class="color-green fa fa-star-half-o"></i></li>
                                <li><i class="color-green fa fa-star-o"></i></li>
                            </ul>
                        </div>
                    </div>
                    <ul class="list-unstyled">
                        <li><span class="color-green">Position:</span> Manager / Executive</li>
                        <li><span class="color-green">Required:</span> 5 - years of experience</li>
                    </ul>
                    <a class="btn-u btn-u-sm" href="#">View More</a>
                </div>
            </div>
            <!-- End Easy Block -->

            <!-- Easy Block -->
            <div class="col-md-3 col-sm-6 md-margin-bottom-40">
                <div class="easy-block-v1">
                    <div class="easy-block-v1-badge rgba-red">Marketing</div>
                    <div id="carousel-example-generic-2" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="rounded-x active" data-target="#carousel-example-generic-2" data-slide-to="0"></li>
                            <li class="rounded-x" data-target="#carousel-example-generic-2" data-slide-to="1"></li>
                            <li class="rounded-x" data-target="#carousel-example-generic-2" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img alt="" src="{!! url('assets/img/main/img12.jpg') !!}">
                            </div>
                            <div class="item">
                                <img alt="" src="{!! url('assets/img/main/img10.jpg') !!}">
                            </div>
                            <div class="item">
                                <img alt="" src="{!! url('assets/img/main/img21.jpg') !!}">
                            </div>
                        </div>
                    </div>
                    <div class="overflow-h">
                        <h3>Thomas Cook Holidays</h3>
                        <ul class="list-inline star-vote">
                            <li><i class="color-green fa fa-star"></i></li>
                            <li><i class="color-green fa fa-star"></i></li>
                            <li><i class="color-green fa fa-star"></i></li>
                            <li><i class="color-green fa fa-star"></i></li>
                            <li><i class="color-green fa fa-star-half-o"></i></li>
                        </ul>
                    </div>
                    <ul class="list-unstyled">
                        <li><span class="color-green">Position:</span> Marketing / Advertising</li>
                        <li><span class="color-green">Required:</span> 7 - years of experience</li>
                    </ul>
                    <a class="btn-u btn-u-sm" href="#">View More</a>
                </div>
            </div>
            <!-- End Easy Block -->

            <!-- Easy Block -->
            <div class="col-md-3 col-sm-6 md-margin-bottom-40">
                <div class="easy-block-v1">
                    <div class="easy-block-v1-badge rgba-blue">Education</div>
                    <div id="carousel-example-generic-3" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="rounded-x active" data-target="#carousel-example-generic-3" data-slide-to="0"></li>
                            <li class="rounded-x" data-target="#carousel-example-generic-3" data-slide-to="1"></li>
                            <li class="rounded-x" data-target="#carousel-example-generic-3" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img alt="" src="{!! url('assets/img/main/img4.jpg') !!}">
                            </div>
                            <div class="item">
                                <img alt="" src="{!! url('assets/img/main/img14.jpg') !!}">
                            </div>
                            <div class="item">
                                <img alt="" src="{!! url('assets/img/main/img8.jpg') !!}">
                            </div>
                        </div>
                    </div>
                    <div class="overflow-h">
                        <h3>University of Aberdeen</h3>
                        <ul class="list-inline star-vote">
                            <li><i class="color-green fa fa-star"></i></li>
                            <li><i class="color-green fa fa-star"></i></li>
                            <li><i class="color-green fa fa-star"></i></li>
                            <li><i class="color-green fa fa-star-o"></i></li>
                            <li><i class="color-green fa fa-star-o"></i></li>
                        </ul>
                    </div>
                    <ul class="list-unstyled">
                        <li><span class="color-green">Position:</span> Education / Training</li>
                        <li><span class="color-green">Required:</span> 10 - years of experience</li>
                    </ul>
                    <a class="btn-u btn-u-sm" href="#">View More</a>
                </div>
            </div>
            <!-- End Easy Block -->

            <!-- Easy Block -->
            <div class="col-md-3 col-sm-6">
                <div class="easy-block-v1">
                    <div class="easy-block-v1-badge rgba-purple">IT Management</div>
                    <div id="carousel-example-generic-4" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="rounded-x active" data-target="#carousel-example-generic-4" data-slide-to="0"></li>
                            <li class="rounded-x" data-target="#carousel-example-generic-4" data-slide-to="1"></li>
                            <li class="rounded-x" data-target="#carousel-example-generic-4" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img alt="" src="{!! url('assets/img/main/img20.jpg') !!}">
                            </div>
                            <div class="item">
                                <img alt="" src="{!! url('assets/img/main/img23.jpg') !!}">
                            </div>
                            <div class="item">
                                <img alt="" src="{!! url('assets/img/main/img25.jpg') !!}">
                            </div>
                        </div>
                    </div>
                    <div class="overflow-h">
                        <h3>IT Project Management</h3>
                        <ul class="list-inline star-vote">
                            <li><i class="color-green fa fa-star"></i></li>
                            <li><i class="color-green fa fa-star"></i></li>
                            <li><i class="color-green fa fa-star"></i></li>
                            <li><i class="color-green fa fa-star"></i></li>
                            <li><i class="color-green fa fa-star-o"></i></li>
                        </ul>
                    </div>
                    <ul class="list-unstyled">
                        <li><span class="color-green">Position:</span> Project / Program Management</li>
                        <li><span class="color-green">Required:</span> 2 - years of experience</li>
                    </ul>
                    <a class="btn-u btn-u-sm" href="#">View More</a>
                </div>
            </div>
            <!-- End Easy Block -->
        </div>
        <!-- End Easy Blocks v1 -->

        <div class="clearfix margin-bottom-20">
            <hr>
        </div>

        <!-- Easy Blocks v2 -->
        <div class="row">
            <!-- Begin Easy Block -->
            <div class="col-md-3 col-sm-6 md-margin-bottom-40">
                <div class="easy-block-v2">
                    <div class="easy-bg-v2 rgba-default">New</div>
                    <img alt="" src="{!! url('assets/img/main/img9.jpg') !!}">
                    <h3>UBS Headquarter Zürich</h3>
                    <ul class="list-unstyled">
                        <li><span class="color-green">Position:</span> Manager / Executive</li>
                        <li><span class="color-green">Required:</span> 5 - years of experience</li>
                        <li><span class="color-green">Gender:</span> Male</li>
                    </ul>
                    <a class="btn-u btn-u-sm" href="#">View More</a>
                </div>
            </div>
            <!-- End Begin Easy Block -->

            <!-- Begin Easy Block -->
            <div class="col-md-3 col-sm-6 md-margin-bottom-40">
                <div class="easy-block-v2">
                    <div class="easy-bg-v2 rgba-red">New</div>
                    <img alt="" src="{!! url('assets/img/main/img18.jpg') !!}">
                    <h3>Royal Dutch Shell</h3>
                    <ul class="list-unstyled">
                        <li><span class="color-green">Position:</span> Marketing / Advertising</li>
                        <li><span class="color-green">Required:</span> 7 - years of experience</li>
                        <li><span class="color-green">Gender:</span> Any</li>
                    </ul>
                    <a class="btn-u btn-u-sm" href="#">View More</a>
                </div>
            </div>
            <!-- End Begin Easy Block -->

            <!-- Begin Easy Block -->
            <div class="col-md-3 col-sm-6 md-margin-bottom-40">
                <div class="easy-block-v2">
                    <div class="easy-bg-v2 rgba-blue">New</div>
                    <img alt="" src="{!! url('assets/img/main/img26.jpg') !!}">
                    <h3>University of Warwick</h3>
                    <ul class="list-unstyled">
                        <li><span class="color-green">Position:</span> Education / Training</li>
                        <li><span class="color-green">Required:</span> 10 - years of experience</li>
                        <li><span class="color-green">Gender:</span> Male</li>
                    </ul>
                    <a class="btn-u btn-u-sm" href="#">View More</a>
                </div>
            </div>
            <!-- End Begin Easy Block -->

            <!-- Begin Easy Block -->
            <div class="col-md-3 col-sm-6">
                <div class="easy-block-v2">
                    <div class="easy-bg-v2 rgba-purple">New</div>
                    <img alt="" src="{!! url('assets/img/main/img19.jpg') !!}">
                    <h3>IT Project Management</h3>
                    <ul class="list-unstyled">
                        <li><span class="color-green">Position:</span> Project / Program Management</li>
                        <li><span class="color-green">Required:</span> 2 - years of experience</li>
                        <li><span class="color-green">Gender:</span> Female</li>
                    </ul>
                    <a class="btn-u btn-u-sm" href="#">View More</a>
                </div>
            </div>
            <!-- End Begin Easy Block -->
        </div>
        <!-- End Easy Blocks v2 -->
    </div>
    <!--=== End Content Part ===-->

@endsection
@section('js-implementing-plugins')
@endsection
@section('js-inline')
    <script type="text/javascript" src="{!! url('assets/plugins/jquery.parallax.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/plugins/image-hover/js/touch.js') !!}"></script>
@endsection
@section('js-page-level')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            App.initParallaxBg();
        });
    </script>
@endsection

