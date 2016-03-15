@extends('ahk.layouts.master')
@section('title', trans('ahk.reset_password'))
@section('inline-css')
    <style type="text/css">
        {!! File::get(public_path(elixir("css/auth/sign-in/above-the-fold-content.min.css"))) !!}
    </style>
@endsection
@section('header_links')
    @include('ahk._partials.header_default_links')
@endsection
@section('content')
    <div class="container content">

        <div class="row">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

                {!! Form::open(['route' => 'auth.recover.post', 'class' => 'form-horizontal reg-page', 'role' => 'form']) !!}

                <div class="reg-header">
                    <h2>{!! trans('ahk.reset_password') !!}</h2>
                </div>

                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    {!! Form::email('email', null, ['class' => 'form-control',
                        'placeholder' => 'Email', 'required' => 'required']) !!}
                </div>
                {!! $errors->first('email', '<div class="alert alert-danger fade in">:message</div>') !!}

                <div class="form-group margin-bottom-50">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn-u btn btn-primary btn-block">
                            <i class="fa fa-btn fa-envelope"></i> {!! trans('ahk.send_password_reset_link') !!}
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
