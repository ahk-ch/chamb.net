@extends('layouts.master')
@section('title', 'Info')
@section('css-implementing-plugins')
    <link href='{!! url("assets/plugins/flexslider/flexslider.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('css-page-style')
    <link href='{!! url("assets/css/pages/page_search.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('content')
    @include('_partials.breadcrumbs')
    <div class="container content-sm"><!--=== News Block ===-->
        <div class="text-center margin-bottom-50">
            <h2 class="title-v2 title-center">RECENT NEWS</h2>
            <p class="space-lg-hor">If you are going to use a
                <span class="color-green">passage of Lorem Ipsum</span>, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making
                <span class="color-green">this the first</span> true generator on the Internet.</p>
        </div>

        <div class="row news-v2">
            <div class="col-md-4 sm-margin-bottom-30">
                <div class="news-v2-badge">
                    <img class="img-responsive" src="{!! url('assets/img/main/img12.jpg') !!}" alt="">
                    <p>
                        <span>26</span>
                        <small>Feb</small>
                    </p>
                </div>
                <div class="news-v2-desc bg-color-light">
                    <h3><a href="#">Corrupti Quos Dolores</a></h3>
                    <small>By Admin | <a class="color-inherit" href="#">16 Comments</a> | In <a href="#">Web Trends</a>
                    </small>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>
                </div>
            </div>
            <div class="col-md-4 sm-margin-bottom-30">
                <div class="news-v2-badge">
                    <img class="img-responsive" src="{!! url('assets/img/main/img3.jpg') !!}" alt="">
                    <p>
                        <span>24</span>
                        <small>Feb</small>
                    </p>
                </div>
                <div class="news-v2-desc bg-color-light">
                    <h3><a href="#">Blanditi Praesium Voluptum</a></h3>
                    <small>By Admin | <a class="color-inherit" href="#">51 Comments</a> | In
                        <a href="#">Art &amp; Design</a></small>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="news-v2-badge">
                    <img class="img-responsive" src="{!! url('assets/img/main/img16.jpg') !!}" alt="">
                    <p>
                        <span>21</span>
                        <small>Feb</small>
                    </p>
                </div>
                <div class="news-v2-desc bg-color-light">
                    <h3><a href="#">Key Digital Services</a></h3>
                    <small>By Admin | <a class="color-inherit" href="#">32 Comments</a> | In
                        <a href="#">Google &amp; Android</a></small>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>
                </div>
            </div>
        </div>
    </div>
    <!--=== End News Block ===-->

    <!--=== Parallax Quote ===-->
    <div class="parallax-quote parallaxBg" style="background-position: 50% 20px;">
        <div class="container">
            <div class="parallax-quote-in">
                <p>If you can design one thing <span class="color-green">you can design</span> everything.
                    <br> Just Believe It.</p>
                <small>- HtmlStream -</small>
            </div>
        </div>
    </div>
    <!--=== End Parallax Quote ===-->

    <!--=== Colorful Service Blocks ===-->
    <div class="container-fluid">
        <div class="row no-gutter equal-height-columns margin-bottom-10">
            <div class="col-sm-4">
                <div class="service-block service-block-purple no-margin-bottom content equal-height-column">
                    <i class="icon-custom icon-md rounded icon-color-light icon-line icon-badge"></i>
                    <h2 class="heading-md font-light">Best Solutions</h2>
                    <p class="no-margin-bottom font-light">Provide; shifting landscape reduce carbon emissions human potential sustainability Jane Addams solve. Global network; care Rockefeller, vaccines equal opportunity human being.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-block service-block-red no-margin-bottom content equal-height-column">
                    <i class="icon-custom icon-md rounded icon-color-light icon-line icon-fire"></i>
                    <h2 class="heading-md font-light">Excellent Features</h2>
                    <p class="no-margin-bottom font-light">Provide; shifting landscape reduce carbon emissions human potential sustainability Jane Addams solve. Global network; care Rockefeller, vaccines equal opportunity human being.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-block service-block-aqua no-margin-bottom content equal-height-column">
                    <i class="icon-custom icon-md rounded icon-color-light icon-line icon-directions"></i>
                    <h2 class="heading-md font-light">Creative Ideas</h2>
                    <p class="no-margin-bottom font-light">Provide; shifting landscape reduce carbon emissions human potential sustainability Jane Addams solve. Global network; care Rockefeller, vaccines equal opportunity human being.</p>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Colorful Service Blocks ===-->

    <!--=== Service Blcoks ===-->
    <div class="container content-sm">
        <div class="text-center margin-bottom-50">
            <h2 class="title-v2 title-center">OUR SERVICES</h2>
            <p class="space-lg-hor">If you are going to use a
                <span class="color-green">passage of Lorem Ipsum</span>, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making
                <span class="color-green">this the first</span> true generator on the Internet.</p>
        </div>

        <!-- Service Blcoks -->
        <div class="row service-box-v1 margin-bottom-40">
            <div class="col-md-4 col-sm-6 md-margin-bottom-40">
                <div class="service-block service-block-default no-margin-bottom">
                    <i class="icon-lg rounded-x icon icon-badge"></i>
                    <h2 class="heading-sm">Web Design &amp; Development</h2>
                    <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine. Fusce dapibus</p>
                    <ul class="list-unstyled">
                        <li>Responsive Web Desgin</li>
                        <li>E-commerce</li>
                        <li>App &amp; Icon Design</li>
                        <li>Logo &amp; Brand Design</li>
                        <li>Mobile Development</li>
                        <li>UI/UX Design</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 md-margin-bottom-40">
                <div class="service-block service-block-default no-margin-bottom">
                    <i class="icon-lg rounded-x icon-line icon-trophy"></i>
                    <h2 class="heading-sm">Marketing &amp; Cunsulting</h2>
                    <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine usce dapibus elit nondapibus</p>
                    <ul class="list-unstyled">
                        <li>Analysis &amp; Consulting</li>
                        <li>Email Marketing</li>
                        <li>App &amp; Icon Design</li>
                        <li>Responsive Web Desgin</li>
                        <li>Social Networking</li>
                        <li>Documentation</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="service-block service-block-default no-margin-bottom">
                    <i class="icon-lg rounded-x icon-line icon-layers"></i>
                    <h2 class="heading-sm">SEO &amp; Advertising</h2>
                    <p>Donec id elit non mi porta gravida at eget metus id elit mi egetine. Fusce dapibus</p>
                    <ul class="list-unstyled">
                        <li>Display Advertising</li>
                        <li>App &amp; Icon Design</li>
                        <li>Analysis &amp; Consulting</li>
                        <li>Google AdSense</li>
                        <li>Social Media</li>
                        <li>Google/Bing Analysis</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Service Blcoks -->
    </div>
    <!--=== End Service Blcoks ===-->

    <!--=== Parallax Counter ===-->
    <div class="parallax-counter-v2 parallaxBg1" style="background-position: 50% 90px;">
        <div class="container">
            <ul class="row list-row">
                <li class="col-md-3 col-sm-6 col-xs-12 md-margin-bottom-30">
                    <div class="counters rounded">
                        <span class="counter">18298</span>
                        <h4 class="text-transform-normal">Web Developers</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 col-xs-12 md-margin-bottom-30">
                    <div class="counters rounded">
                        <span class="counter">24583</span>
                        <h4 class="text-transform-normal">Designers</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 col-xs-12 sm-margin-bottom-30">
                    <div class="counters rounded">
                        <span class="counter">37904</span>
                        <h4 class="text-transform-normal">Open Contests</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 col-xs-12">
                    <div class="counters rounded">
                        <span class="counter">50892</span>
                        <h4 class="text-transform-normal">Happy Customors</h4>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--=== End Parallax Counter ===-->

    <!--=== Call To Action ===-->
    <div class="call-action-v1 bg-color-red">
        <div class="container">
            <div class="call-action-v1-box">
                <div class="call-action-v1-in">
                    <p class="color-light">Unify creative technology company providing key digital services and focused on helping our clients to build a successful business on web and mobile.</p>
                </div>
                <div class="call-action-v1-in inner-btn page-scroll">
                    <a href="#portfolio" class="btn-u btn-brd btn-brd-hover btn-u-light btn-u-block">View Our Portfolio</a>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Call To Action ===-->

@endsection
@section('js-implementing-plugins')
    <script type="text/javascript" src="{!! url('assets/plugins/jquery.parallax.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/plugins/counter/waypoints.min.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/plugins/counter/jquery.counterup.min.js') !!}"></script>
@endsection
@section('js-inline')
@endsection
@section('js-page-level')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            App.initCounter();
            App.initParallaxBg();
        });
    </script>
@endsection
