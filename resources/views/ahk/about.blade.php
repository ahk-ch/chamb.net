@extends('ahk.layouts.master')
@section('title', trans('ahk.about'))
@section('header_links')
    @include('ahk._partials.header_default_links')
@endsection
@section('content')
    <div class="container content"><!--=== Content Part ===-->
        <div class="title-box-v2">
            <h2>{!! trans('ahk_about.about_the_hellenic_german_chambers_of') !!}
                <br/><span class="color-green">{!! trans('ahk_about.industry_and_commerce') !!}</span></h2>
            <p class="text-left">{!! trans('ahk_about.about_introduction') !!} </p>
        </div>

        <!-- About Sldier -->
        <div class="shadow-wrapper margin-bottom-50">
            <div class="carousel slide carousel-v1 box-shadow shadow-effect-2" id="myCarousel">

                <img class="img-responsive" src="{!! route('files.render', ['path' => 'img/about/photo_pool_3.jpg']) !!}" alt="Company Photo 3">

            </div>
        </div>
        <!-- End About Sldier -->

        <div class="row margin-bottom-10">
            <div class="col-sm-4">
                <div class="service-block service-block-default">
                    <i class="icon-custom rounded icon-color-dark icon-line icon-badge"></i>
                    <h2 class="heading-md">{!! trans('ahk_about.consulting_services') !!}</h2>
                    <p>{!! trans('ahk_about.consulting_services_content') !!}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-block service-block-default">
                    <i class="icon-custom rounded icon-color-dark icon-line icon-fire"></i>
                    <h2 class="heading-md">{!! trans('ahk_about.networking') !!}</h2>
                    <p>{!! trans('ahk_about.networking_content') !!}</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-block service-block-default">
                    <i class="icon-custom rounded icon-color-dark icon-line icon-directions"></i>
                    <h2 class="heading-md">{!! trans('ahk_about.membership') !!}</h2>
                    <p>{!! trans('ahk_about.membership_content') !!}</p>
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
                    <img class="img-responsive" src="{!! route('files.render', ['path' => 'img/about/about_our_company.jpg']) !!}" alt="Company Photo 4">
                </div>
            </div>
        </div><!--/container-->
    </div>
    <!--=== End Parallax About Block ===-->
@endsection
@section('optimize-css-delivery')
    {!! Form::input('hidden', 'styleSheetUrls[]', elixir("css/about.min.css")) !!}
@endsection
