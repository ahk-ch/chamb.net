@extends('ahk.layouts.master')
@section('title', 'Work-groups - Health')
@section('css-implementing-plugins')
@endsection
@section('inline-css')
@endsection
@section('header_links')
    @include('ahk._partials.header_industries_links')
@endsection
@section('content')
<div class="search-block-v2">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h2>Search Work-groups</h2>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search ...">
						<span class="input-group-btn">
							<button class="btn-u" type="button"><i class="fa fa-search"></i></button>
						</span>
            </div>
        </div>
    </div>
</div><!--/container-->

<!--=== Search Results ===-->
<div class="container s-results margin-bottom-50">
    <span class="results-number">{!! $workGroups->count() !!} result(s)</span>
    <!-- Begin Inner Results -->
    <div class="inner-results">
        <h3><a href="#">Web design</a></h3>
        <ul class="list-inline up-ul">
            <li>en.wikipedia.org/wiki/Web_design‎</li>
            <li class="btn-group">
                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
                    More<i class="fa fa-caret-down margin-left-5"></i>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="#">Share</a></li>
                    <li><a href="#">Similar</a></li>
                    <li><a href="#">Advanced search</a></li>
                </ul>
            </li>
            <li><a href="#">Wrapbootstrap</a></li>
            <li><a href="#">Dribbble</a></li>
        </ul>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut orci urna. Morbi blandit enim eget risus posuere dapibus. Vestibulum velit nisi, tempus in placerat non, auctor eu purus. Morbi suscipit porta libero, ac tempus tellus consectetur non. Praesent eget consectetur nunc. Aliquam erat volutpat. Suspendisse ultrices eros eros, consectetur facilisis urna posuere id.</p>
        <ul class="list-inline down-ul">
            <li>
                <ul class="list-inline star-vote">
                    <li><i class="color-green fa fa-star"></i></li>
                    <li><i class="color-green fa fa-star"></i></li>
                    <li><i class="color-green fa fa-star"></i></li>
                    <li><i class="color-green fa fa-star"></i></li>
                    <li><i class="color-green fa fa-star-half-o"></i></li>
                </ul>
            </li>
            <li>3 years ago - By Anthon Brandley</li>
            <li>234,034 views</li>
            <li><a href="#">Web designer</a></li>
        </ul>
    </div>
    <!-- Begin Inner Results -->

    <hr>

    <div class="margin-bottom-30"></div>

    <div class="text-left">
        <ul class="pagination">
            <li><a href="#">«</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">157</a></li>
            <li><a href="#">158</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>
</div><!--/container-->

    {!! Form::input('hidden', 'styleSheetUrls[]', elixir("css/industries/work-groups.min.css")) !!}
@endsection
