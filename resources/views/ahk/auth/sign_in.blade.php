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

                {!! Form::open(['route' => 'auth.sign_in', 'class' => 'reg-page']) !!}

                <div class="reg-header">
                    <h2>{!! trans('ahk.sign_in') !!}</h2>
                </div>

                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    {!! Form::email('email', null, ['class' => 'form-control',
                        'placeholder' => 'Email', 'required' => 'required']) !!}
                </div>
                {!! $errors->first('email', '<div class="alert alert-danger fade in">:message</div>') !!}

                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    {!! Form::password('password', ['class' => 'form-control',
                        'placeholder' => trans('ahk.password'), 'required' => 'required']) !!}
                </div>
                {!! $errors->first('password', '<div class="alert alert-danger fade in">:message</div>') !!}

                <div class="row">
                    <div class="col-md-6 checkbox">
                        <label>
                            {!! Form::checkbox('remember_me') !!} {!! trans('ahk.remember_me') !!}
                        </label>
                        {!! $errors->first('remember_me', '<div class="alert alert-danger fade in">:message</div>') !!}
                    </div>

                    <div class="col-md-6">
                        {!! Form::submit(trans('ahk.sign_in'), ['class' => 'btn-u pull-right', 'id' => 'sign-in',
                             'name' => 'sign-in']) !!}
                    </div>
                </div>

                <hr>

                <h4>{!! trans('ahk.forgot_your_password') !!}</h4>

                {!! Form::close() !!}

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
