@extends('ahk.layouts.master')
@section('title', 'Welcome')
@section('css-implementing-plugins')
    <link href='{!! url("assets/plugins/revolution-slider/rs-plugin/css/settings.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('css-page-style')
@endsection
@section('content')

    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <!-- SLIDE -->
                <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 1">
                    <!-- MAIN IMAGE -->
                    <img src="{!! url('assets/img/sliders/7.jpg') !!}" alt="darkblurbg" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                    <!-- LAYER -->
                    <div class="tp-caption re-title-v1 sft start"
                            data-x="center"
                            data-hoffset="0"
                            data-y="100"
                            data-speed="1500"
                            data-start="500"
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
                            data-y="200"
                            data-speed="1400"
                            data-start="2000"
                            data-easing="Power4.easeOut"
                            data-endspeed="300"
                            data-endeasing="Power1.easeIn"
                            data-captionhidden="off"
                            style="z-index: 6">
                        {!! trans('ahk.we_promote_and_support_bilateral_business_between_greece_and_germany') !!}
                    </div>
                    <!-- END LAYER -->

                    <!-- LAYER -->
                    <div class="tp-caption sft"
                            data-x="center"
                            data-hoffset="0"
                            data-y="320"
                            data-speed="1600"
                            data-start="2800"
                            data-easing="Power4.easeOut"
                            data-endspeed="300"
                            data-endeasing="Power1.easeIn"
                            data-captionhidden="off"
                            style="z-index: 6">
                        <a href="{!! route('health.news') !!}" class="btn-u btn-u-lg re-btn-brd margin-right-5">{!! trans('ahk.news') !!}</a>
                        <a href="{!! route('companies_path') !!}" class="btn-u btn-u-lg">{!! trans('ahk.community') !!}</a>
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
    <script type="text/javascript" src="{!! url('assets/plugins/counter/waypoints.min.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/plugins/counter/jquery.counterup.min.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js') !!}"></script>
@endsection
@section('js-inline')
@endsection
@section('js-page-level')
    <script type="text/javascript" src="{!! url('assets/js/plugins/revolution-slider.js') !!}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            App.initCounter();
            App.initParallaxBg();
            RevolutionSlider.initRSfullScreenOffset();
        });
    </script>
@endsection
