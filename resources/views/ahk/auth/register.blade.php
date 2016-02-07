@extends('ahk.layouts.master')
@section('title', trans('ahk.register'))
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
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <form class="reg-page">
                    <div class="reg-header">
                        <h2>{!! trans('ahk.register') !!}</h2>
                    </div>

                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" placeholder="Email" class="form-control">
                    </div>

                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" placeholder="{!! trans('ahk.password') !!}" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" placeholder="{!! trans('ahk.confirm_password') !!}" class="form-control">
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-6 checkbox">
                            <label> <input type="checkbox"> {!! trans('ahk.i_agree_to_the') !!}
                                <a href="{!! route('terms_of_use_path') !!}">Terms of Use</a></label>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button class="btn-u" type="submit">Register</button>
                            <a href="{!! route('auth.sign_in') !!}" class="color-green">{!! trans('ahk.sign_in') !!}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->
@endsection
@section('js-implementing-plugins')
@endsection
@section('js-inline')
@endsection
@section('js-page-level')
@endsection
