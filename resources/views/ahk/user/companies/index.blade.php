@extends('ahk.layouts.master')
@section('title', trans('ahk.my_companies'))
@section('css-implementing-plugins')
@endsection
@section('css-page-style')
@endsection
@section('header_links')
    @include('ahk._partials.header_default_links')
@endsection
@section('content')
    <div class="container content profile">
        <div class="row">
            <div class="col-md-3 md-margin-bottom-40">
                @include('ahk.user._partials.left_sidebar')
            </div>
            <!--End Left Sidebar-->
            <div class="col-md-9">
                <!--Basic Table Option (Spacing)-->
                <div class="panel panel-default margin-bottom-40">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-building"></i> {!! trans('ahk.my_companies') !!}</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{!! trans('ahk.name') !!}</th>
                                <th>{!! trans('ahk.description') !!}</th>
                                <th>{!! trans('ahk.action') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-default btn-xs"><i class="fa fa-plus"></i> New Company
                                    </button>
                                </td>
                            </tr>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{!! $company->name !!}</td>
                                    <td class="read-more-js">
                                            {!! $company->description !!}
                                    <td>
                                        <a href="{!! route('my.companies.edit', ['id' => $company->id]) !!}"
                                                class="btn btn-default btn-xs">
                                            <i class="fa fa-edit"></i> {!! trans('ahk.edit') !!}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--End Basic Table-->
            </div>
        </div>
    </div>
@endsection
@section('js-implementing-plugins')
    <script src="{!! url('vendor/Readmore.js/readmore.min.js') !!}"></script>
@endsection
@section('js-page-level')
    <script>
        jQuery(document).ready(function () {
            $('.read-more-js').readmore({
                collapsedHeight: 25,
                moreLink: '<div  class="text-center"><a href="#">Read more</a></div>',
                lessLink: '<div  class="text-center"><a href="#">Close</a></div>'
            });
        });
    </script>
@endsection