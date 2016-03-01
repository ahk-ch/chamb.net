@extends('ahk.layouts.master')
@section('title', trans('ahk.home'))
@section('css')
    {{--<link href='{!! elixir("css/home.css") !!}' rel='stylesheet' type='text/css'/>--}}
@endsection
@section('header_links')
    @include('ahk._partials.header_default_links')
@endsection
@section('content')
    <div class="interactive-slider-v2 img-v4" id="home-first-section">
        <div class="container">
            <h1>Chamb.Net</h1>
            <p>{!! trans('ahk.we_promote_and_support_bilateral_business_between_greece_and_germany') !!}</p>
            <div class="row">
                <div class="col-md-1 content-boxes-v6 md"></div>
                <a href="{!! route('health.info') !!}">
                    <div class="col-md-2 col-sm-6 content-boxes-v6 md"><i class="rounded-x fa fa-heartbeat"></i>
                        <p class="title-v3-md margin-bottom-10"> Health</p>
                    </div>
                </a>

                <a href="#">
                    <div class="col-md-2 col-sm-6 content-boxes-v6 md-margin-bottom-50">
                        <i class="rounded-x fa fa-database"></i>
                        <p class="title-v3-md margin-bottom-10"> Logistics</p>
                    </div>
                </a>

                <a href="#">
                    <div class="col-md-2 col-sm-6 content-boxes-v6"><i class="rounded-x fa fa-sun-o"></i>
                        <p class="title-v3-md margin-bottom-10"> Energy</p>
                    </div>
                </a>

                <a href="#">
                    <div class="col-md-2 col-sm-6 content-boxes-v6"><i class="rounded-x fa fa-bar-chart"></i>
                        <p class="title-v3-md margin-bottom-10"> Trade</p>
                    </div>
                </a>

                <a href="#">
                    <div class="col-md-2 col-md-push-0 col-sm-push-3 col-sm-6 content-boxes-v6">
                        <i class="rounded-x fa fa-university"></i>
                        <p class="title-v3-md margin-bottom-10"> Law</p>
                    </div>
                </a>
                <div class="col-md-1 content-boxes-v6 md"></div>
            </div>
        </div>
    </div>
@endsection
@section('optimize-css-delivery')
        loadStyleSheet('{!! elixir("css/home.css") !!}');
@endsection
@section('js-assets')
    <script type="text/javascript" src="{!! elixir('js/home.min.js') !!}"></script>
@endsection
