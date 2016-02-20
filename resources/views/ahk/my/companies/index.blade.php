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
                @include('ahk.my._partials.left_sidebar')
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
                                <th>{!! trans('ahk.action') !!}</th>
                                <th>{!! trans('ahk.name') !!}</th>
                                <th>{!! trans('ahk.description') !!}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <a id="create-company-btn" href="{!! route('my.companies.create') !!}"
                                            class="btn btn-default btn-sm btn-block">
                                        <i class="fa fa-plus"></i> {!! trans('ahk.create') !!}
                                    </a>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach($companies as $company)
                                <tr>
                                    <td class="col-md-2">
                                        <a id="edit-company-btn-{!! $company->slug !!}"
                                                href="{!! route('my.companies.edit', ['slug' => $company->slug]) !!}"
                                                class="btn btn-default btn-sm btn-block">
                                            <i class="fa fa-edit"></i> {!! trans('ahk.edit') !!}
                                        </a>
                                    </td>
                                    <td class="col-md-3">{!! $company->name !!}</td>
                                    <td class="col-md-7 read-more-js">
                                    {!! $company->description !!}
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
    @include('ahk.my._partials.read_more')
@endsection
