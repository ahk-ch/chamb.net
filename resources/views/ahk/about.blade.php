@extends('ahk.layouts.master')
@section('title', trans('ahk.about'))
@section('css-implementing-plugins')
    <link href='{!! url("assets/plugins/parallax-slider/css/parallax-slider.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/owl-carousel/owl-carousel/owl.carousel.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('css-implementing-plugins')
    <link href='{!! url("assets/css/pages/page_about.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('content')

    <div class="container content"><!--=== Content Part ===-->
        <div class="title-box-v2">
            <h2>About the Hellenic German Chamber of <br/><span class="color-green">Industry and Commerce</span></h2>
            <p class="text-left">The Hellenic-German Chamber of Industry and Commerce, is a non-profit organization connecting 850 member companies in Greece and Germany, supporting ongoing relationships amongst industry, companies, and improve trade between the two countries. Our Organization is member of the German Chamber Network, which operates 125 offices in 85 countries. </p>
        </div>

        <!-- About Sldier -->
        <div class="shadow-wrapper margin-bottom-50">
            <div class="carousel slide carousel-v1 box-shadow shadow-effect-2" id="myCarousel">

                <img class="img-responsive" src="{!! url('img/about_us/photo_pool_3.jpg') !!}" alt="Company Photo 3">

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
                    <p>The Hellenic German Chamber of Commerce has an extensive membership network of many distinguished companies, firms, and executives. With more than 850 members in Greece and Germany, we enable our members to forge new business relationships. Membership benefits include lectures, seminars and networking receptions hosted by leaders of industry and government. As a member, you could benefit from discounts on selected services.</p>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Content Part ===-->

    <!--=== Parallax About Block ===-->
    <div class="parallax-bg parallaxBg1">
        <div class="container content parallax-about">
            <div class="title-box-v2">
                <h2>About <span class="color-green">CHAMB.NET</span></h2>
                <p class="text-left">For more than 90 years the Hellenic German Chamber of Commerce and Industry promotes development and expansion of market and business relations between Greece and Germany through a wide range of services and activities.</p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="banner-info dark margin-bottom-10">
                        <i class="rounded-x icon-bell"></i>
                        <div class="overflow-h">
                            <h3>Working Groups</h3>
                            <p>The Working Groups focus on specific issues and bring together members who are experts on that issue to develop and execute an action plan to resolve the problem and then disband. Furthermore the Working Groups structure enables the Chamber to engage interested members, over an extended period of time, in industry and sector specific policy related issues and projects. </p>
                        </div>
                    </div>
                    <div class="banner-info dark margin-bottom-10">
                        <i class="rounded-x icon-bell"></i>
                        <div class="overflow-h">
                            <h3>Mission</h3>
                            <p>CHAMB.NET supports this mission and provides a sector related online platform for the exchange of information, the member’s communication and for the initiation of business cooperation within a neutral German-Greek business context. </p>
                        </div>
                    </div>
                    <div class="banner-info dark margin-bottom-10">
                        <i class="rounded-x icon-bell"></i>
                        <div class="overflow-h">
                            <h3>Offers</h3>
                            <p>In particular CHAMB.NET offers its users:
                            <ul>
                                <li> sector related information (news, events, links, publications)</li>
                                <li> overview about the topics and results of the sector related working groups</li>
                                <li>detailed company and expert profiles of its members - trade leads</li>
                            </ul>
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
