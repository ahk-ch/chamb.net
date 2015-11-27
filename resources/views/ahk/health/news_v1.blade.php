@extends('ahk.layouts.master')
@section('title', 'News')
@section('css-implementing-plugins')
    <link href='{!! url("assets/plugins/fancybox/source/jquery.fancybox.css") !!}' rel='stylesheet' type='text/css'/>

@endsection
@section('css-page-style')
    <link href='{!! url("assets/css/pages/page_job.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('content')
    {!! Breadcrumbs::render('health.news') !!}

    @foreach($articles->chunk(3) as $chunkOfArticles)
        @include('ahk.health._partials.news_v1_light', ['articles' => $chunkOfArticles])
    @endforeach

@endsection
@section('js-implementing-plugins')
    <script type="text/javascript" src="{!! url('assets/plugins/fancybox/source/jquery.fancybox.pack.js') !!}"></script>
@endsection
@section('js-page-level')
    <script type="text/javascript" src="{!! url('assets/js/plugins/fancy-box.js') !!}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            FancyBox.initFancybox();
        });
    </script>
@endsection

