@extends('ahk.layouts.master')
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
            <h2>About <span class="color-green">us</span></h2>
            <p>The Hellenic German Chamber of Commerce and Industry is a non-profit organization with 850 member companies in Greece and Germany and the official representation of the German industry and commerce in Greece. It is a member of the German Chamber Network, which operates 125 offices in 85 countries. The Athens Central Office of the chamber was founded in 1924 whereas the Northern Greece branch was established in 1981.</p>
        </div>

        <!-- About Sldier -->
        <div class="shadow-wrapper margin-bottom-50">
            <div class="carousel slide carousel-v1 box-shadow shadow-effect-2" id="myCarousel">
                <ol class="carousel-indicators">
                    <li class="rounded-x active" data-target="#myCarousel" data-slide-to="0"></li>
                    <li class="rounded-x" data-target="#myCarousel" data-slide-to="1"></li>
                    <li class="rounded-x" data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img class="img-responsive" src="{!! url('img/about_us/AHK-Griechenland-RGB.jpg') !!}" alt="Full AHK Logo">
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="{!! url('img/about_us/photo_pool_4.jpg') !!}" alt="Company Photo 4">
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="{!! url('img/about_us/photo_pool_3.jpg') !!}" alt="Company Photo 3">
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
                    <h2 class="heading-md">Consulting Services</h2>
                    <p>The Hellenic German Chamber of Commerce and Industry provides services to companies both from Germany and Greece supporting them in their business activities. Our offices in Athens and Thessaloniki assist German and Greek companies - in most cases small- and medium-sized businesses (SMEs)- with their entry and expansion in the German and Greek market. Our consulting services range from market entry support, address researches, business partner searches, and career services, to detailed market studies. We also support you in establishing first business contacts with potential customers for your products or services and assist you with the preparations of your trade show participation.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-block service-block-default">
                    <i class="icon-custom rounded icon-color-dark icon-line icon-fire"></i>
                    <h2 class="heading-md">Networking</h2>
                    <p>The Hellenic German Chamber of Commerce and Industry supports you to connect with business professionals and decision makers of the Hellenic-German business community. Use our network and increase your corporate brand and business success by fostering new ties with professional network and industry sectors.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-block service-block-default">
                    <i class="icon-custom rounded icon-color-dark icon-line icon-directions"></i>
                    <h2 class="heading-md">Membership</h2>
                    <p>The Hellenic German Chamber of Commerce has an extensive membership network of many distinguished companies, firms, and executives. With more than 850 members in Greece and Germany, we enable our members to forge new business relationships. Membership benefits include lectures, seminars and networking receptions hosted by leaders of industry and government.
                        As a member, you could benefit from discounts on selected services.</p>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Content Part ===-->

    <!--=== Parallax About Block ===-->
    <div class="parallax-bg parallaxBg1">
        <div class="container content parallax-about">
            <div class="title-box-v2">
                <h2>About our <span class="color-green">chamber</span></h2>
                <p>For more than 90 years the Hellenic German Chamber of Commerce and Industry promotes development and expansion of market and business relations between Greece and Germany through a wide range of services and activities.</p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="banner-info dark margin-bottom-10">
                        <i class="rounded-x icon-bell"></i>
                        <div class="overflow-h">
                            <h3>Our mission</h3>
                            <p>Is to promote and support bilateral business relations between Greece and Germany. Therefore the Chamber is the primary contact for German and Greek companies, organizations and individuals interested in market entry into the respective other country.
                            </p>
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
