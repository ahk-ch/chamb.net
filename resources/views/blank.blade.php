@extends('layouts.master')
@section('title', 'Welcome')
@section('js-inline')
@endsection
@section('content')

@endsection
@section('js-implementing-plugins')
    <script type="text/javascript" src="{!! url('assets/plugins/parallax-slider/js/modernizr.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/plugins/parallax-slider/js/jquery.cslider.js') !!}"></script>
@endsection
@section('js-inline')
@endsection
@section('js-page-level')
    <script type="text/javascript" src="{!! url('assets/js/app.js') !!}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            App.init();
        });
    </script>
@endsection
