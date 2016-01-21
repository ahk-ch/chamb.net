@extends('ahk.layouts.master')
@section('title', 'News')
@section('css-implementing-plugins')
    <link href='{!! url("assets/plugins/fancybox/source/jquery.fancybox.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('css-page-style')
    <link href='{!! url("assets/css/pages/page_job.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('content')
    @include('ahk._partials.header_industries')
    <div class="container ">
        <div class="col-sm-5">
        </div>
        <div class="col-sm-7">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#">Internal</a></li>
                <li role="presentation"><a href="#">External</a></li>
            </ul>
        </div>
        @for($i = 0; $i < $articles->count(); $i++)
            @include('ahk.health._partials.news_full_width', ['index' => $i, 'article' => $articles->get($i)])
        @endfor
    </div>

@endsection
@section('js-implementing-plugins')
    <script type="text/javascript" src="{!! url('assets/plugins/fancybox/source/jquery.fancybox.pack.js') !!}"></script>
@endsection
@section('js-page-level')
    <script type="text/javascript" src="{!! url('assets/js/plugins/fancy-box.js') !!}"></script>
    <script type="text/javascript" src="{!! elixir('js/ahk/health/news.min.js') !!}"></script>
@endsection

