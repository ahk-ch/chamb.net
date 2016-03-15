@extends('ahk.layouts.master')
@section('title', trans('ahk.register'))
@section('header_links')
    @include('ahk._partials.header_default_links')
@endsection
@section('inline-css')
    <style type="text/css">
        {!! File::get(public_path(elixir("css/auth/sign-in/above-the-fold-content.min.css"))) !!}
    </style>
@endsection
@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

                {!! Form::open(['route' => 'auth.register', 'class' => 'reg-page']) !!}

                <div class="reg-header">
                    <h2>{!! trans('ahk.register') !!}</h2>
                </div>

                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email',
                     'required' => 'required']) !!}
                </div>
                {!! $errors->first('email', '<div class="alert alert-danger fade in">:message</div>') !!}

                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    {!! Form::password('password', ['class' => 'form-control',
                        'placeholder' => trans('ahk.password'), 'required' => 'required']) !!}
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    {!! Form::password('password_confirmation', ['class' => 'form-control',
                        'placeholder' => trans('ahk.password_confirmation'), 'required' => 'required']) !!}
                </div>
                {!! $errors->first('password', '<div class="alert alert-danger fade in">:message</div>') !!}
                {!! $errors->first('password_confirmation', '<div class="alert alert-danger fade in">:message</div>') !!}

                <hr>

                <div class="row">
                    <div class="col-lg-6 checkbox">
                        <label>
                            {!! Form::checkbox('agree_to_terms') !!} {!! trans('ahk.i_agree_to_the') !!}
                            <a href="{!! route('terms_of_use_path') !!}">{!! trans('ahk.terms_of_use') !!}</a></label>
                        {!! $errors->first('agree_to_terms', '<div class="alert alert-danger fade in">:message</div>') !!}
                    </div>
                    <div class="col-lg-6 text-right">
                        <button class="btn-u" type="submit">{!! trans('ahk.register') !!}</button>
                        <a href="{!! route('auth.sign_in') !!}" class="color-green">{!! trans('ahk.sign_in') !!}</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->
@endsection
