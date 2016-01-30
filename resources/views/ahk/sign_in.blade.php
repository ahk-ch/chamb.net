@extends('ahk.layouts.master')
@section('title', trans('ahk.sign_in'))
@section('css-implementing-plugins')
@endsection
@section('css-page-style')
    <link href='{!! url("assets/css/pages/page_log_reg_v1.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('header_links')
    @include('ahk._partials.header_default_links')
@endsection
@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <form class="reg-page">
                    <div class="reg-header">
                        <h2>{!! trans('ahk.sign_in') !!}</h2>
                    </div>

                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" placeholder="{!! trans('ahk.username') !!}" class="form-control">
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" placeholder="{!! trans('ahk.password') !!}" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6 checkbox">
                            <label><input type="checkbox"> {!! trans('ahk.remember_me') !!}</label>
                        </div>
                        <div class="col-md-6">
                            <button class="btn-u pull-right" type="submit">{!! trans('ahk.sign_in') !!}</button>
                        </div>
                    </div>

                    <hr>

                    <h4>{!! trans('ahk.forgot_your_password') !!}</h4>
                </form>
            </div>
        </div><!--/row-->

    </div>
@endsection
@section('js-implementing-plugins')
@endsection
@section('js-inline')
@endsection
@section('js-page-level')
@endsection
