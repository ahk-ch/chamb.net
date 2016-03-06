@extends('ahk.layouts.master')
@section('title', trans('ahk.home'))
@section('header_links')
    @include('ahk._partials.header_default_links')
@endsection
@section('inline-css')
    <style type="text/css">
        .interactive-slider-v2.img-v4 {
            background: url({!! route('files.render', ['path' => 'img/home/background.jpg']) !!}) no-repeat;
            background-size: cover;
            background-position: center center;
        }
    </style>
@endsection
@section('content')
    <div class="interactive-slider-v2 img-v4">
        <div class="container">
            <h1>Chamb.Net</h1>
            <p>{!! trans('ahk.we_promote_and_support_bilateral_business_between_greece_and_germany') !!}</p>
            <div class="row">
                <div class="col-md-1 content-boxes-v6 md"></div>

                @foreach($industries as $industry)

                    <a href="{!! route('industries.info', ['industry_slug' => $industry->slug]) !!}">
                        <div class="col-md-2 col-sm-6 content-boxes-v6 md">
                            <i class="rounded-x {!! $industry->fontawesome !!}"></i>
                            <p class="title-v3-md margin-bottom-10"> {!! $industry->name !!}</p>
                        </div>
                    </a>

                @endforeach

                <div class="col-md-1 content-boxes-v6 md"></div>
            </div>
        </div>
    </div>
@endsection
@section('js-files')
    <script type="text/javascript" src="{!! elixir('js/home.min.js') !!}"></script>
@endsection
