@extends('ahk.layouts.master')
@section('title', trans('ahk.welcome'))
@section('css-implementing-plugins')
    <link href='{!! url("assets/plugins/revolution-slider/rs-plugin/css/settings.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('css-page-style')@endsection
@section('header_links')
    @include('ahk._partials.header_default_links')
@endsection
@section('content')
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <!-- SLIDE -->
                <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Home Company Slide">
                    <!-- MAIN IMAGE -->
                    <img src="{!! url('img/home/background.jpg') !!}" alt="chamb.net Home Company Background Image" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                    <!-- LAYER -->
                    <div class="tp-caption re-title-v1 sft start"
                            data-x="center"
                            data-hoffset="0"
                            data-y="-50"
                            data-speed="500"
                            data-start="50"
                            data-easing="Back.easeInOut"
                            data-endeasing="Power1.easeIn"
                            data-endspeed="300">
                        Chamb.Net
                    </div>
                    <!-- END LAYER -->

                    <!-- LAYER -->
                    <div class="tp-caption re-text-v1 sft"
                            data-x="center"
                            data-hoffset="0"
                            data-y="50"
                            data-speed="500"
                            data-start="700"
                            data-easing="Power4.easeOut"
                            data-endspeed="300"
                            data-endeasing="Power1.easeIn"
                            data-captionhidden="off"
                            style="z-index: 6">
                        {!! trans('ahk.we_promote_and_support_bilateral_business_between_greece_and_germany') !!}

                        <div class="container content-sm">
                            <div class="row">
                                <div class="col-md-1 content-boxes-v6 md">
                                </div>
                                <div class="col-md-2 content-boxes-v6 md">
                                    <i class="rounded-x fa fa-heartbeat"></i>
                                    <h1 class="title-v3-md text-uppercase margin-bottom-10"></h1>
                                    Health
                                </div>
                                <div class="col-md-2 content-boxes-v6 md-margin-bottom-50">
                                    <i class="rounded-x fa fa-database"></i>
                                    <h1 class="title-v3-md text-uppercase margin-bottom-10"></h1>
                                    Logistics
                                </div>
                                <div class="col-md-2 content-boxes-v6">
                                    <i class="rounded-x fa fa-sun-o"></i>
                                    <h1 class="title-v3-md text-uppercase margin-bottom-10"></h1>
                                    Energy
                                </div>
                                <div class="col-md-2 content-boxes-v6">
                                    <i class="rounded-x fa fa-bar-chart"></i>
                                    <h1 class="title-v3-md text-uppercase margin-bottom-10"></h1>
                                    Trade
                                </div>
                                <div class="col-md-2 content-boxes-v6">
                                    <i class="rounded-x fa fa-university"></i>
                                    <h1 class="title-v3-md text-uppercase margin-bottom-10"></h1>
                                    Law
                                </div>
                            </div><!--/row-->
                        </div>

                    </div>
                    <!-- END LAYER -->

                    <!-- LAYER -->
                    <div class="tp-caption sft"
                            data-x="center"
                            data-hoffset="0"
                            data-y="320"
                            data-speed="1600"
                            data-start="1000"
                            data-easing="Power4.easeOut"
                            data-endspeed="300"
                            data-endeasing="Power1.easeIn"
                            data-captionhidden="off"
                            style="z-index: 6">

                    </div>
                    <!-- END LAYER -->
                </li>
                <!-- END SLIDE -->
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
        </div>
    </div>

@endsection
@section('js-implementing-plugins')
    <script type="text/javascript" src="{!! url('assets/plugins/counter/jquery.counterup.min.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js') !!}"></script>
@endsection
@section('js-inline')
@endsection
@section('js-page-level')
    <script type="text/javascript" src="{!! url('assets/js/plugins/revolution-slider.js') !!}"></script>
    <script type="text/javascript" src="{!! elixir('js/ahk/home.min.js') !!}"></script>
@endsection
