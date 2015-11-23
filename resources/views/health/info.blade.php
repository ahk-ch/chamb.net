@extends('layouts.master')
@section('title', 'Info')
@section('css-implementing-plugins')
    <link href='{!! url("assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('css-page-style')
    <link href='{!! url("assets/css/pages/page_search.css") !!}' rel='stylesheet' type='text/css'/>
    @endsection
    @section('content')

    {!! Breadcrumbs::render() !!}

            <!--=== Content Part ===-->
    <div class="container content">
        <div class="row">
            <div class="col-md-6">
                <h2 class="title-v2">OUR SERVICES</h2>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures.</p>
                <br> <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark">Read More</a>
                <a href="#" class="btn-u">Purchase Now</a>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="{!! url('assets/img/mockup/mockup1.png') !!}" alt="">
            </div>
        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

    <!--=== News Block ===-->
    <div class="bg-grey">
        <div class="container content-sm">
            <div class="text-center margin-bottom-50">
                <h2 class="title-v2 title-center">RECENT NEWS</h2>
                <p class="space-lg-hor">If you are going to use a
                    <span class="color-green">passage of Lorem Ipsum</span>, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making
                    <span class="color-green">this the first</span> true generator on the Internet.</p>
            </div>

            <div class="row news-v1">
                <div class="col-md-4 md-margin-bottom-40">
                    <div class="news-v1-in bg-color-white">
                        <img class="img-responsive" src="{!! url('assets/img/main/img12.jpg') !!}" alt="">
                        <h3 class="font-normal"><a href="#">Focused on helping</a></h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores [..]</p>
                        <ul class="list-inline news-v1-info no-margin-bottom">
                            <li><span>By</span> <a href="#">Kathy Reyes</a></li>
                            <li>|</li>
                            <li><i class="fa fa-clock-o"></i> July 02, 2014</li>
                            <li class="pull-right"><a href="#"><i class="fa fa-comments-o"></i> 14</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 md-margin-bottom-40">
                    <div class="news-v1-in bg-color-white">
                        <img class="img-responsive" src="{!! url('assets/img/main/img3.jpg') !!}" alt="">
                        <h3 class="font-normal"><a href="#">We build your website</a></h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores [..]</p>
                        <ul class="list-inline news-v1-info no-margin-bottom">
                            <li><span>By</span> <a href="#">John Clarck</a></li>
                            <li>|</li>
                            <li><i class="fa fa-clock-o"></i> July 02, 2014</li>
                            <li class="pull-right"><a href="#"><i class="fa fa-comments-o"></i> 07</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="news-v1-in bg-color-white">
                        <img class="img-responsive" src="{!! url('assets/img/main/img16.jpg') !!}" alt="">
                        <h3 class="font-normal"><a href="#">Build a successful business</a></h3>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores [..]</p>
                        <ul class="list-inline news-v1-info no-margin-bottom">
                            <li><span>By</span> <a href="#">Tina Kruiger</a></li>
                            <li>|</li>
                            <li><i class="fa fa-clock-o"></i> July 02, 2014</li>
                            <li class="pull-right"><a href="#"><i class="fa fa-comments-o"></i> 22</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=== End News Block ===-->

    <!--=== Service Blocks ===-->
    <div class="container content-sm">
        <div class="text-center margin-bottom-50">
            <h2 class="title-v2 title-center">OUR SERVICES</h2>
            <p class="space-lg-hor">If you are going to use a
                <span class="color-green">passage of Lorem Ipsum</span>, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making
                <span class="color-green">this the first</span> true generator on the Internet.</p>
        </div>

        <div class="row content-boxes-v4 content-boxes-v4-sm margin-bottom-30">
            <div class="col-md-4 md-margin-bottom-40">
                <i class="pull-left icon-directions"></i>
                <div class="content-boxes-in-v4">
                    <h2>Creative Ideas</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <a href="#">Learn More</a>
                </div>
            </div>
            <div class="col-md-4 md-margin-bottom-40">
                <i class="pull-left icon-handbag"></i>
                <div class="content-boxes-in-v4">
                    <h2>E-Commerce Pages</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <a href="#">Learn More</a>
                </div>
            </div>
            <div class="col-md-4">
                <i class="pull-left icon-chemistry"></i>
                <div class="content-boxes-in-v4">
                    <h2>Clean Code</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <a href="#">Learn More</a>
                </div>
            </div>
        </div>

        <hr>

        <div class="row content-boxes-v4 content-boxes-v4-sm margin-bottom-30">
            <div class="col-md-4 md-margin-bottom-40">
                <i class="pull-left icon-info margin-right-10"></i>
                <div class="content-boxes-in-v4">
                    <h2>Extensive Documentation</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <a href="#">Learn More</a>
                </div>
            </div>
            <div class="col-md-4 md-margin-bottom-40">
                <i class="pull-left icon-social-youtube margin-right-10"></i>
                <div class="content-boxes-in-v4">
                    <h2>Vimeo / Youtube</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <a href="#">Learn More</a>
                </div>
            </div>
            <div class="col-md-4">
                <i class="pull-left icon-fire margin-right-10"></i>
                <div class="content-boxes-in-v4">
                    <h2>Excellent Features</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <a href="#">Learn More</a>
                </div>
            </div>
        </div>

        <hr>

        <div class="row content-boxes-v4 content-boxes-v4-sm">
            <div class="col-md-4 md-margin-bottom-40">
                <i class="pull-left icon-layers"></i>
                <div class="content-boxes-in-v4">
                    <h2>Multiple Layouts</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <a href="#">Learn More</a>
                </div>
            </div>
            <div class="col-md-4 md-margin-bottom-40">
                <i class="pull-left icon-rocket"></i>
                <div class="content-boxes-in-v4">
                    <h2>Ready To Use</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <a href="#">Learn More</a>
                </div>
            </div>
            <div class="col-md-4">
                <i class="pull-left icon-support"></i>
                <div class="content-boxes-in-v4">
                    <h2>Stunning Support</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <a href="#">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Service Blocks ===-->

    <!--=== Parallax Counter ===-->
    <div class="parallax-counter-v2 parallaxBg1" style="background-position: 50% -17px;">
        <div class="container">
            <ul class="row list-row">
                <li class="col-md-3 col-sm-6 col-xs-12 md-margin-bottom-30">
                    <div class="counters rounded">
                        <span class="counter">18298</span>
                        <h4 class="font-normal">Web Developers</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 col-xs-12 md-margin-bottom-30">
                    <div class="counters rounded">
                        <span class="counter">24583</span>
                        <h4 class="font-normal">Designers</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 col-xs-12 sm-margin-bottom-30">
                    <div class="counters rounded">
                        <span class="counter">37904</span>
                        <h4 class="font-normal">Open Contests</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 col-xs-12">
                    <div class="counters rounded">
                        <span class="counter">50892</span>
                        <h4 class="font-normal">Happy Customors</h4>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--=== End Parallax Counter ===-->

    <!--=== Cube Portfolio ===-->
    <div class="container content-sm">
        <div class="text-center margin-bottom-30">
            <h2 class="title-v2 title-center">LATEST PROJECTS</h2>
            <p class="space-lg-hor">If you are going to use a
                <span class="color-green">passage of Lorem Ipsum</span>, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making
                <span class="color-green">this the first</span> true generator on the Internet.</p>
        </div>

        <div class="cube-portfolio container margin-bottom-20">
            <div class="margin-bottom-30">
                <div id="filters-container" class="cbp-l-filters-text">
                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All</div>
                    |
                    <div data-filter=".illustration" class="cbp-filter-item"> Illustration</div>
                    |
                    <div data-filter=".web-design" class="cbp-filter-item"> Web Design</div>
                    |
                    <div data-filter=".graphic" class="cbp-filter-item"> Graphic</div>
                    |
                    <div data-filter=".logo" class="cbp-filter-item"> Logo</div>
                </div><!--/end Filters Container-->
            </div>

            <div id="grid-container" class="cbp-l-grid-gallery">
                <div class="cbp-item illustration web-design">
                    <a href="assets/ajax/cube-portfolio/project1.html" class="cbp-caption cbp-singlePageInline"
                            data-title="World Clock Widget<br>by Paul Flavius Nechita">
                        <div class="cbp-caption-defaultWrap">
                            <img src="{!! url('assets/img/portfolio/20.jpg') !!}" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">Paul Flavius</div>
                                    <div class="cbp-l-caption-desc">Development</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item web-design logo">
                    <a href="assets/ajax/cube-portfolio/project2.html" class="cbp-caption cbp-singlePageInline"
                            data-title="Bolt UI<br>by Tiberiu Neamu">
                        <div class="cbp-caption-defaultWrap">
                            <img src="{!! url('assets/img/portfolio/19.jpg') !!}" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">Tiberiu Neamu</div>
                                    <div class="cbp-l-caption-desc">Web-Design</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item illustration web-design">
                    <a href="assets/ajax/cube-portfolio/project3.html" class="cbp-caption cbp-singlePageInline"
                            data-title="WhereTO App<br>by Tiberiu Neamu">
                        <div class="cbp-caption-defaultWrap">
                            <img src="{!! url('assets/img/portfolio/21.jpg') !!}" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">Tiberiu Neamu</div>
                                    <div class="cbp-l-caption-desc">Illustration</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item web-design illustration">
                    <a href="assets/ajax/cube-portfolio/project4.html" class="cbp-caption cbp-singlePageInline"
                            data-title="iDevices<br>by Tiberiu Neamu">
                        <div class="cbp-caption-defaultWrap">
                            <img src="{!! url('assets/img/portfolio/22.jpg') !!}" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">Tiberiu Neamu</div>
                                    <div class="cbp-l-caption-desc">Illustration</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item web-design graphic">
                    <a href="assets/ajax/cube-portfolio/project5.html" class="cbp-caption cbp-singlePageInline"
                            data-title="Seemple* Music for iPad<br>by Tiberiu Neamu">
                        <div class="cbp-caption-defaultWrap">
                            <img src="{!! url('assets/img/portfolio/24.jpg') !!}" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">Tiberiu Neamu</div>
                                    <div class="cbp-l-caption-desc">Illustration</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item illustration web-design graphic">
                    <a href="assets/ajax/cube-portfolio/project6.html" class="cbp-caption cbp-singlePageInline"
                            data-title="Remind~Me Widget<br>by Tiberiu Neamu">
                        <div class="cbp-caption-defaultWrap">
                            <img src="{!! url('assets/img/portfolio/23.jpg') !!}" alt="">
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">Tiberiu Neamu</div>
                                    <div class="cbp-l-caption-desc">Web-Design</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div><!--/end Grid Container-->
        </div>
    </div>
    <!--=== End Cube Portfolio ===-->

    <!--=== Call To Action ===-->
    <div class="call-action-v1 bg-grey">
        <div class="container">
            <div class="call-action-v1-box">
                <div class="call-action-v1-in">
                    <p>Unify creative technology company providing key digital services and focused on helping our clients to build a successful business on web and mobile.</p>
                </div>
                <div class="call-action-v1-in inner-btn page-scroll">
                    <a href="portfolio_4_columns_grid_no_space.html" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-block">View Our Portfolio</a>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Call To Action ===-->

@endsection
@section('js-implementing-plugins')
@endsection
@section('js-inline')
    <script type="text/javascript" src="{!! url('assets/plugins/jquery.parallax.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/plugins/counter/waypoints.min.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/plugins/counter/jquery.counterup.min.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js') !!}"></script>
@endsection
@section('js-page-level')
    <script type="text/javascript" src="{!! url('assets/js/plugins/cube-portfolio/cube-portfolio-lightbox.js') !!}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            App.initCounter();
            App.initParallaxBg();
        });
    </script>
@endsection
