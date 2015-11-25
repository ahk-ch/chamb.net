@extends('layouts.master')
@section('title', 'About')
@section('css-implementing-plugins')
    <link href='{!! url("assets/plugins/parallax-slider/css/parallax-slider.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/owl-carousel/owl-carousel/owl.carousel.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('css-implementing-plugins')
    <link href='{!! url("assets/css/pages/page_about.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('content')

    {!! Breadcrumbs::render() !!}

    <div class="container content"><!--=== Content Part ===-->
        <div class="title-box-v2">
            <h2>About <span class="color-green">AHK</span></h2>
            <p>The Hellenic German Chamber of Commerce and Industry is a non-profit organization with 850 member companies in Greece and Germany and the official representation of the German industry and commerce in Greece. It is a member of the German Chamber Network, which operates 125 offices in 85 countries. The Athens Central Office of DGIHK was founded in 1924 whereas the Northern Greece branch was established in 1981.</p>
        </div>

        <!-- About Sldier -->
        <div class="shadow-wrapper margin-bottom-50">
            <div class="carousel slide carousel-v1 box-shadow shadow-effect-2" id="myCarousel">
                <ol class="carousel-indicators">
                    <li class="rounded-x active" data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li class="rounded-x" data-target="#myCarousel" data-slide-to="1"></li>
                    <li class="rounded-x" data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img class="img-responsive" src="{!! url('img/about_us/AHK-Griechenland-RGB.jpg') !!}" alt="Full AHK Logo">
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="{!! url('img/about_us/photo_pool_1.jpg') !!}" alt="Photo Pool 1">
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="{!! url('img/about_us/photo_pool_2.jpg') !!}" alt="Photo Pool 2">
                    </div>
                </div>

                <div class="carousel-arrow">
                    <a data-slide="prev" href="#myCarousel" class="left carousel-control">
                        <i class="fa fa-angle-left"></i> </a>
                    <a data-slide="next" href="#myCarousel" class="right carousel-control">
                        <i class="fa fa-angle-right"></i> </a>
                </div>
            </div>
        </div>
        <!-- End About Sldier -->

        <div class="row margin-bottom-10">
            <div class="col-sm-4">
                <div class="service-block service-block-default">
                    <i class="icon-custom rounded icon-color-dark icon-line icon-badge"></i>
                    <h2 class="heading-md">Platform</h2>
                    <p>Establish a neutral, non-politically influenced Platform</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-block service-block-default">
                    <i class="icon-custom rounded icon-color-dark icon-line icon-fire"></i>
                    <h2 class="heading-md">Relations & Communication Channels</h2>
                    <p>Facilitate German-Greek and International Relationship Networks & Communication Channels.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-block service-block-default">
                    <i class="icon-custom rounded icon-color-dark icon-line icon-directions"></i>
                    <h2 class="heading-md">News</h2>
                    <p>RSS Feed/EMail/Articles subscription for industry news, connection possibilities, to keep all member companies aware of current market news, events, and workshops.</p>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Content Part ===-->

    <!--=== Parallax About Block ===-->
    <div class="parallax-bg parallaxBg1">
        <div class="container content parallax-about">
            <div class="title-box-v2">
                <h2>About our <span class="color-green">company</span></h2>
                <p>The Greek-Commerce and Industrial Chamber, for 90 years, promotes development and expansion of market and business relations between Greece and Germany through a wide range of services and activities</p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="banner-info dark margin-bottom-10">
                        <i class="rounded-x icon-bell"></i>
                        <div class="overflow-h">
                            <h3>Our mission</h3>
                            <p>Is to promote and support bilateral business relations between Greece and Germany. Therefore the Chamber is the primary contact for German and Greek companies, organizations and individuals interested in market entry into the respective other country.</p>
                        </div>
                    </div>
                    <div class="banner-info dark margin-bottom-10">
                        <i class="rounded-x fa fa-magic"></i>
                        <div class="overflow-h">
                            <h3>Our vision</h3>
                            <p>Phasellus vitae rhoncus ipsum. Aliquam ultricies, velit sit amet scelerisque tincidunt, dolor neque consequat est, a dictum felis metus eget nulla.</p>
                        </div>
                    </div>
                    <div class="banner-info dark margin-bottom-10">
                        <i class="rounded-x fa fa-thumbs-o-up"></i>
                        <div class="overflow-h">
                            <h3>We are good at ...</h3>
                            <p>Nunc ac ligula ut diam rutrum porttitor. Integer et neque at lacus placerat pretium eu ac dui. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
                        </div>
                    </div>
                    <div class="margin-bottom-20"></div>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive" src="{!! url('img/about_us/about_our_company.jpg') !!}" alt="">
                </div>
            </div>
        </div><!--/container-->
    </div>
    <!--=== End Parallax About Block ===-->

    <!--=== Container Part ===-->
    <div class="container content">
        <div class="title-box-v2">
            <h2>Our Company <span class="color-green">life</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

        <div class="row margin-bottom-40">
            <!-- Begin Easy Block v2 -->
            <div class="col-md-3 col-sm-6 md-margin-bottom-20">
                <div class="simple-block">
                    <img class="img-responsive img-bordered margin-bottom-10" src="assets/img/main/img3.jpg" alt="">
                    <p>Pellentesque et erat ac massa cursus porttitor eget sed magna.</p>
                </div>
            </div>
            <!-- End Simple Block -->

            <!-- Begin Easy Block v2 -->
            <div class="col-md-3 col-sm-6 md-margin-bottom-20">
                <div class="simple-block">
                    <img class="img-responsive img-bordered margin-bottom-10" src="assets/img/main/img4.jpg" alt="">
                    <p>Pellentesque et erat ac massa cursus porttitor eget sed magna.</p>
                </div>
            </div>
            <!-- End Simple Block -->

            <!-- Begin Easy Block v2 -->
            <div class="col-md-3 col-sm-6 md-margin-bottom-20">
                <div class="simple-block">
                    <img class="img-responsive img-bordered margin-bottom-10" src="assets/img/main/img16.jpg" alt="">
                    <p>Pellentesque et erat ac massa cursus porttitor eget sed magna.</p>
                </div>
            </div>
            <!-- End Simple Block -->

            <!-- Begin Easy Block v2 -->
            <div class="col-md-3 col-sm-6 md-margin-bottom-20">
                <div class="simple-block">
                    <img class="img-responsive img-bordered margin-bottom-10" src="assets/img/main/img7.jpg" alt="">
                    <p>Pellentesque et erat ac massa cursus porttitor eget sed magna.</p>
                </div>
            </div>
            <!-- End Simple Block -->
        </div>

        <div class="row">
            <!-- Begin Easy Block v2 -->
            <div class="col-md-6 col-sm-6 md-margin-bottom-20">
                <div class="simple-block">
                    <div class="embed-responsive embed-responsive-16by9 margin-bottom-10">
                        <iframe frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="//player.vimeo.com/video/67167840?title=0&amp;byline=0&amp;portrait=0"></iframe>
                    </div>
                </div>
            </div>
            <!-- End Simple Block -->

            <!-- Begin Easy Block v2 -->
            <div class="col-md-6 col-sm-6 md-margin-bottom-20">
                <div class="simple-block">
                    <div class="embed-responsive embed-responsive-16by9 margin-bottom-10">
                        <iframe frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="//player.vimeo.com/video/70528799"></iframe>
                    </div>
                </div>
            </div>
            <!-- End Simple Block -->
        </div>
    </div><!--/container-->
    <!--=== Container Part ===-->

    <!--=== Meet Our Team ===-->
    <div class="parallax-team parallaxBg">
        <div class="container content">
            <div class="title-box-v2">
                <h2>Meet Our <span class="color-green">Team</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <div class="row">
                <!-- Team v2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-v2">
                        <img class="img-responsive" src="assets/img/team/img1-md.jpg" alt=""/>
                        <div class="inner-team">
                            <h3>Jack Anderson</h3>
                            <small class="color-green">CEO, Chief Officer</small>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                            <hr>
                            <ul class="list-inline team-social">
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="fb tooltips" data-original-title="Facebook" href="#">
                                        <i class="fa fa-facebook"></i> </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="tw tooltips" data-original-title="Twitter" href="#">
                                        <i class="fa fa-twitter"></i> </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="gp tooltips" data-original-title="Google plus" href="#">
                                        <i class="fa fa-google-plus"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Team v2 -->

                <!-- Team v2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-v2">
                        <img class="img-responsive" src="assets/img/team/img2-md.jpg" alt=""/>
                        <div class="inner-team">
                            <h3>Kate Metus</h3>
                            <small class="color-green">Project Manager</small>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                            <hr>
                            <ul class="list-inline team-social">
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="fb tooltips" data-original-title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="tw tooltips" data-original-title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="gp tooltips" data-original-title="Google plus" href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Team v2 -->

                <!-- Team v2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-v2">
                        <img class="img-responsive" src="assets/img/team/img3-md.jpg" alt=""/>
                        <div class="inner-team">
                            <h3>Porta Gravida</h3>
                            <small class="color-green">VP of Operations</small>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                            <hr>
                            <ul class="list-inline team-social">
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="fb tooltips" data-original-title="Facebook" href="#">
                                        <i class="fa fa-facebook"></i> </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="tw tooltips" data-original-title="Twitter" href="#">
                                        <i class="fa fa-twitter"></i> </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="gp tooltips" data-original-title="Google plus" href="#">
                                        <i class="fa fa-google-plus"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Team v2 -->

                <!-- Team v2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-v2">
                        <img class="img-responsive" src="assets/img/team/img5-md.jpg" alt=""/>
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
                                        <i class="fa fa-twitter"></i> </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="gp tooltips" data-original-title="Google plus" href="#">
                                        <i class="fa fa-google-plus"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Team v2 -->
            </div>
        </div>
    </div>
    <!--=== End Meet Our Team ===-->

    <!--=== Contacts ===-->
    <div class="contacts content">
        <div class="container">
            <div class="title-box-v2">
                <h2>Our <span class="color-green">Contacts</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <!-- Google Map -->
                    <div id="map" class="map">
                    </div>
                    <!-- End Google Map -->
                </div>
                <div class="col-md-6 col-sm-6">
                    <!-- Business Hours -->
                    <h3>Get In Touch</h3>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, sed do eiusmod tempor incididu ntjusto sit amet risus etiam porta sem.</p>
                    <ul class="list-inline margin-bottom-20">
                        <li><strong>Monday-Friday:</strong> 10am to 8pm</li>
                        <li><strong>Saturday:</strong> 11am to 3pm</li>
                        <li><strong>Sunday:</strong> Closed</li>
                    </ul>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group margin-bottom-10">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="name" placeholder="Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group margin-bottom-20">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" placeholder="Email" class="form-control">
                            </div>
                        </div>
                    </div>

                    <textarea rows="5" class="form-control margin-bottom-20" placeholder="Type your question here..."></textarea>
                    <button class="btn-u btn-u-sm pull-right" type="button">Send question</button>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Contacts ===-->
@endsection
@section('js-implementing-plugins')
    <script type="text/javascript" src="{!! url('assets/plugins/owl-carousel/owl-carousel/owl.carousel.js') !!}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="{!! url('assets/plugins/gmap/gmap.js') !!}"></script>
@endsection
@section('js-inline')
@endsection
@section('js-page-level')
    <script type="text/javascript" src="{!! url('assets/js/google_map.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/js/plugins/owl-carousel.js') !!}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            App.initParallaxBg();
            ContactPage.initMap();
            OwlCarousel.initOwlCarousel();
        });
    </script>
@endsection
