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
            <div class="col-md-8 col-md-offset-2">

                {!! Form::open(['route' => ['auth.recover.reset', $slug, $recovery_token ],
                 'class' => 'form-horizontal reg-page', 'role' => 'form']) !!}

                <div class="reg-header">
                    <h2>{!! trans('ahk.reset_password') !!}</h2>
                </div>

                <input type="hidden" name="slug" value="{{ $slug }}">
                <input type="hidden" name="verify_token" value="{{ $recovery_token }}">

                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    {!! Form::password('password', ['class' => 'form-control',
                        'placeholder' => trans('ahk.password'), 'required' => 'required']) !!}
                </div>
                {!! $errors->first('password', '<div class="alert alert-danger fade in">:message</div>') !!}


                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    {!! Form::password('password_confirmation', ['class' => 'form-control',
                        'placeholder' => trans('ahk.password_confirmation'), 'required' => 'required']) !!}
                </div>
                {!! $errors->first('password_confirmation', '<div class="alert alert-danger fade in">:message</div>') !!}

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn-u btn btn-primary btn-block">
                            <i class="fa fa-btn fa-refresh"></i> {!! trans('ahk.reset_password') !!}
                        </button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
