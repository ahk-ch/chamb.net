@extends('ahk.layouts.master')
@section('title', 'Companies')
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
            <h2>Discover the Companies You would love to Work for ...</h2>
        </div>
        <div class="job-img-inputs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 md-margin-bottom-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="text" placeholder="what job you are looking for" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4 md-margin-bottom-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <input type="text" placeholder="where would you like to work" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn-u btn-block btn-u-dark"> Search Job</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Job Img ===-->

    <!--=== Content Part ===-->
    <div class="container content">
        <!-- Begin Service Block -->
        <div class="row margin-bottom-40">
            <div class="col-md-4 col-sm-6">
                <div class="service-block service-block-sea service-or">
                    <div class="service-bg"></div>
                    <i class="icon-custom icon-color-light rounded-x fa fa-lightbulb-o"></i>
                    <h2 class="heading-md">Default Box</h2>
                    <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine. Fusce dapibus</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-block service-block-red service-or">
                    <div class="service-bg"></div>
                    <i class="icon-custom icon-color-light rounded-x icon-line icon-fire"></i>
                    <h2 class="heading-md">Red Box</h2>
                    <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine usce dapibus elit nondapibus</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="service-block service-block-blue service-or">
                    <div class="service-bg"></div>
                    <i class="icon-custom icon-color-light rounded-x icon-line icon-rocket"></i>
                    <h2 class="heading-md">Dark Box</h2>
                    <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine. Fusce dapibus</p>
                </div>
            </div>
        </div>
        <!-- End Begin Service Block -->

        <!-- Job Content -->
        <div class="headline"><h2>Job Categories</h2></div>
        <div class="row job-content margin-bottom-40">
            <div class="col-md-3 col-sm-3 md-margin-bottom-40">
                <h3 class="heading-md"><strong>Accounting &amp; Finance</strong></h3>
                <ul class="list-unstyled categories">
                    <li><a href="#">Accounting</a> <small class="hex">(342 jobs)</small></li>
                    <li><a href="#">Admin &amp; Clerical</a> <small class="hex">(143 jobs)</small></li>
                    <li><a href="#">Banking &amp; Finance</a> <small class="hex">(66 jobs)</small></li>
                    <li><a href="#">Contract &amp; Freelance</a> <small class="hex">(12 jobs)</small></li>
                    <li><a href="#">Business Development</a> <small class="hex">(212 jobs)</small></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 md-margin-bottom-40">
                <h3 class="heading-md"><strong>Medicla &amp; Health</strong></h3>
                <ul class="list-unstyled categories">
                    <li><a href="#">Nurse</a> <small class="hex">(546 jobs)</small></li>
                    <li><a href="#">Health Care</a> <small class="hex">(82 jobs)</small></li>
                    <li><a href="#">General Labor</a> <small class="hex">(11 jobs)</small></li>
                    <li><a href="#">Pharmaceutical</a> <small class="hex">(109 jobs)</small></li>
                    <li><a href="#">Human Resources</a> <small class="hex">(401 jobs)</small></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 md-margin-bottom-40">
                <h3 class="heading-md"><strong>Web Development</strong></h3>
                <ul class="list-unstyled categories">
                    <li><a href="#">Ecommerce</a> <small class="hex">(958 jobs)</small></li>
                    <li><a href="#">Web Design</a> <small class="hex">(576 jobs)</small></li>
                    <li><a href="#">Web Programming</a> <small class="hex">(543 jobs)</small></li>
                    <li><a href="#">Other - Web Development</a> <small class="hex">(67 jobs)</small></li>
                    <li><a href="#">Website Project Management</a> <small class="hex">(45 jobs)</small></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3">
                <h3 class="heading-md"><strong>Sales &amp; Marketing</strong></h3>
                <ul class="list-unstyled categories">
                    <li><a href="#">Advertising</a> <small class="hex">(123 jobs)</small></li>
                    <li><a href="#">Email Marketing</a> <small class="hex">(544 jobs)</small></li>
                    <li><a href="#">Telemarketing &amp; Telesales</a> <small class="hex">(564 jobs)</small></li>
                    <li><a href="#">Market Research &amp; Surveys</a> <small class="hex">(345 jobs)</small></li>
                    <li><a href="#">SEM - Search Engine Marketing</a> <small class="hex">(32 jobs)</small></li>
                </ul>
            </div>
        </div>
        <!-- End Job Content -->

        <div class="headline margin-bottom-35"><h2>Highest Rated Jobs</h2></div>

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
                                <img alt="" src="assets/img/main/img12.jpg">
                            </div>
                            <div class="item">
                                <img alt="" src="assets/img/main/img10.jpg">
                            </div>
                            <div class="item">
                                <img alt="" src="assets/img/main/img21.jpg">
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
                                <img alt="" src="assets/img/main/img4.jpg">
                            </div>
                            <div class="item">
                                <img alt="" src="assets/img/main/img14.jpg">
                            </div>
                            <div class="item">
                                <img alt="" src="assets/img/main/img8.jpg">
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
                                <img alt="" src="assets/img/main/img20.jpg">
                            </div>
                            <div class="item">
                                <img alt="" src="assets/img/main/img23.jpg">
                            </div>
                            <div class="item">
                                <img alt="" src="assets/img/main/img25.jpg">
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

        <div class="clearfix margin-bottom-20"><hr></div>

        <!-- Easy Blocks v2 -->
        <div class="row">
            <!-- Begin Easy Block -->
            <div class="col-md-3 col-sm-6 md-margin-bottom-40">
                <div class="easy-block-v2">
                    <div class="easy-bg-v2 rgba-default">New</div>
                    <img alt="" src="assets/img/main/img9.jpg">
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
                    <img alt="" src="assets/img/main/img18.jpg">
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
                    <img alt="" src="assets/img/main/img26.jpg">
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
                    <img alt="" src="assets/img/main/img19.jpg">
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

    <!--=== Job Team ===-->
    <div class="parallax-team parallaxBg">
        <div class="container content">
            <div class="title-box-v2">
                <h2>Build Your <span class="color-green">Own</span> Talents</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <div class="row">
                <!-- Team v2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-v2">
                        <img class="img-responsive" src="assets/img/team/img1-md.jpg" alt="" />
                        <div class="inner-team">
                            <h3>Jack Anderson</h3>
                            <small class="color-green">CEO, Chief Officer</small>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                            <hr>
                            <ul class="list-inline team-social">
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="fb tooltips" data-original-title="Facebook" href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="tw tooltips" data-original-title="Twitter" href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="gp tooltips" data-original-title="Google plus" href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Team v2 -->

                <!-- Team v2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-v2">
                        <img class="img-responsive" src="assets/img/team/img2-md.jpg" alt="" />
                        <div class="inner-team">
                            <h3>Kate Metus</h3>
                            <small class="color-green">Project Manager</small>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                            <hr>
                            <ul class="list-inline team-social">
                                <li><a data-placement="top" data-toggle="tooltip" class="fb tooltips" data-original-title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a data-placement="top" data-toggle="tooltip" class="tw tooltips" data-original-title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a data-placement="top" data-toggle="tooltip" class="gp tooltips" data-original-title="Google plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Team v2 -->

                <!-- Team v2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-v2">
                        <img class="img-responsive" src="assets/img/team/img3-md.jpg" alt="" />
                        <div class="inner-team">
                            <h3>Porta Gravida</h3>
                            <small class="color-green">VP of Operations</small>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                            <hr>
                            <ul class="list-inline team-social">
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="fb tooltips" data-original-title="Facebook" href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="tw tooltips" data-original-title="Twitter" href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="gp tooltips" data-original-title="Google plus" href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Team v2 -->

                <!-- Team v2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-v2">
                        <img class="img-responsive" src="assets/img/team/img5-md.jpg" alt="" />
                        <div class="inner-team">
                            <h3>Donec Elisson</h3>
                            <small class="color-green">Director, R &amp; D Talent</small>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                            <hr>
                            <ul class="list-inline team-social">
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="fb tooltips" data-original-title="Facebook" href="#">
                                        <i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="tw tooltips" data-original-title="Twitter" href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="gp tooltips" data-original-title="Google plus" href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Team v2 -->
            </div>
        </div>
    </div>
    <!--=== End Job Team ===-->

    <!--=== Job Partners ===-->
    <div class="container content job-partners">
        <div class="title-box-v2">
            <h2>Our <span class="color-green">Featured</span> Partners</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

        <ul class="list-inline our-clients" id="effect-2">
            <li>
                <figure>
                    <img src="assets/img/clients2/ea-canada.png" alt="">
                    <div class="img-hover">
                        <h4>Ea Canada</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/inspiring.png" alt="">
                    <div class="img-hover">
                        <h4>Inspiring</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/ucweb.png" alt="">
                    <div class="img-hover">
                        <h4>UcWeb</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/clarks.png" alt="">
                    <div class="img-hover">
                        <h4>Clarks</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/corepreserves.png" alt="">
                    <div class="img-hover">
                        <h4>Core Preserves</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/finals.png" alt="">
                    <div class="img-hover">
                        <h4>USL Champions</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/getaround.png" alt="">
                    <div class="img-hover">
                        <h4>GetAround</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/baderbrau.png" alt="">
                    <div class="img-hover">
                        <h4>Baderbrau</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/emirates.png" alt="">
                    <div class="img-hover">
                        <h4>Emirates</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/fddw.png" alt="">
                    <div class="img-hover">
                        <h4>Field Days</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/district-karaoke.png" alt="">
                    <div class="img-hover">
                        <h4>District Karaoke</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/marianos.png" alt="">
                    <div class="img-hover">
                        <h4>Mariano's</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/grifting-tree.png" alt="">
                    <div class="img-hover">
                        <h4>The Grifting Tree</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/jaguar.png" alt="">
                    <div class="img-hover">
                        <h4>Jaguar</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/hermes.png" alt="">
                    <div class="img-hover">
                        <h4>Hermes</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/starbucks.png" alt="">
                    <div class="img-hover">
                        <h4>Starbucks</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/national-geographic.png" alt="">
                    <div class="img-hover">
                        <h4>National Geographic</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/much-more.png" alt="">
                    <div class="img-hover">
                        <h4>Much More</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/hotiron.png" alt="">
                    <div class="img-hover">
                        <h4>Hotiron</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/fred-perry.png" alt="">
                    <div class="img-hover">
                        <h4>Fred Perry</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/bellfield.png" alt="">
                    <div class="img-hover">
                        <h4>Bellfield</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/getapp.png" alt="">
                    <div class="img-hover">
                        <h4>GetApp</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/austrian-airlines.png" alt="">
                    <div class="img-hover">
                        <h4>Austrian Airlines</h4>
                    </div>
                </figure>
            </li>
            <li>
                <figure>
                    <img src="assets/img/clients2/general-electric.png" alt="">
                    <div class="img-hover">
                        <h4>General Electronic</h4>
                    </div>
                </figure>
            </li>
        </ul>
    </div><!--/container-->
    <!--=== End Job Partners ===-->
@endsection
@section('js-implementing-plugins')
@endsection
@section('js-inline')
    <script type="text/javascript" src="{!! url('assets/plugins/image-hover/js/touch.js') !!}"></script>
@endsection
@section('js-page-level')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.initParallaxBg();
        });
    </script>
@endsection

