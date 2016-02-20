@extends('ahk.layouts.master')
@section('title', trans('ahk.edit'))
@section('css-implementing-plugins')
    <link href='{!! url("vendor/jasny-bootstrap/dist/css/jasny-bootstrap.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("vendor/select2/dist/css/select2.min.css") !!}' rel='stylesheet' type='text/css'/>
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
                <div class="panel panel-grey margin-bottom-40">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-tasks"></i> {!! trans('ahk.edit') !!}</h3>
                    </div>
                    <div class="panel-body">

                        {!! Form::model($company, ['method' => 'PUT', 'route' => ['my.companies.update', $company->slug],
                         'role' => 'form', 'class' => 'margin-bottom-40', 'files' => 'true']) !!}


                        {!! Form::hidden('id', $company->id) !!}

                        @include('ahk.my.companies._form')

                        <div class="form-group">
                            {!! Form::button(trans('ahk.update'), ['class' => 'btn-u btn-u-default', 'type' => 'submit']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- End Basic Form -->
            </div>
        </div>
    </div>
@endsection
@section('js-implementing-plugins')
    <script src="{!! url('vendor/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') !!}"></script>
    <script src="{!! url('vendor/holderjs/holder.min.js') !!}"></script>
    <script src="{!! url('vendor/select2/dist/js/select2.min.js') !!}"></script>
@endsection
@section('js-page-level')
    <script>
        jQuery(document).ready(function () {
            $(".select2").select2();
        });
    </script>
@endsection
