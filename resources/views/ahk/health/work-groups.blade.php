@extends('ahk.layouts.master')
@section('title', trans('ahk.work_groups'))
@section('css-implementing-plugins')
@endsection
@section('css-page-style')
    <style>
        .breadcrumbs-v3.img-v1 {
            background: url('{!! url('img/work_group/bg.jpg') !!}') no-repeat center center;
            background-size: cover;
        }
    </style>
@endsection
@section('header_links')
    @include('ahk._partials.header_industries_links')
@endsection
@section('content')
    <div class="breadcrumbs-v3 img-v1 margin-bottom-60">
        <div class="container text-center">
            <h1>{!! trans('ahk.work_groups') !!}</h1>
        </div><!--/end container-->
    </div>
@endsection
@section('js-implementing-plugins')
@endsection
@section('js-page-level')
@endsection
@section('js-inline')
@endsection
