@extends('ahk.layouts.master')
@section('title', 'News')
@section('inline-css')
    <style type="text/css">
        {!! File::get(public_path(elixir("css/industries/news/above-the-fold-content.min.css"))) !!}
    </style>
@endsection
@section('header_links')
    @include('ahk._partials.header_industries_links')
@endsection
@section('content')
    <div class="container content blog-page blog-item">
        <!--Blog Post-->
        <div class="blog margin-bottom-40">
            <div class="blog-img">
                {{--<img class="img-responsive" src="assets/img/sliders/4.jpg" alt="">--}}
            </div>
            <h2><a href="blog_item_option1.html">{{ $article->title }}</a></h2>
            <div class="blog-post-tags">
                <ul class="list-unstyled list-inline blog-info">
                    <li><i class="fa fa-calendar"></i> {!! $article->created_at->format('M d, Y') !!}</li>
                    <li><i class="fa fa-pencil"></i> {{ $article->author->name }}</li>
                    {{--<li><i class="fa fa-tags"></i> Technology, Education, Internet, Media</li>--}}
                    <li><i class="fa fa-link"></i> <a href="{{ $article->source }}">Source</a></li>
                    <li><i class="fa fa-eye"></i> {{ $article->view_count }}</li>
                </ul>
            </div>
            <div class="tag-box tag-box-v2">
                <p>{{ $article->description }}</p>
            </div>
            <p>{!! $article->content !!}</p>
        </div>
        <!--End Blog Post-->

        <hr>

    </div><!--/container-->
    <!--=== End Content Part ===-->
@endsection

@section('extra-data')
    {!! Form::input('hidden', 'styleSheetUrls[]', elixir("css/industries/news/vendor.min.css")) !!}
@endsection
@section('js-files')
    {{--<script type="text/javascript" src="{!! url('assets/plugins/fancybox/source/jquery.fancybox.pack.js') !!}"></script>--}}
    {{--<script type="text/javascript" src="{!! url('assets/js/plugins/fancy-box.js') !!}"></script>--}}
    {{--    <script type="text/javascript" src="{!! elixir('js/ahk/health/news.min.js') !!}"></script>--}}
@endsection
