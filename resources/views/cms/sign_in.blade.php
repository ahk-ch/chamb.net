<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chamb Cms | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <style type="text/css">
        {!! File::get(public_path(elixir("css/cms/above-the-fold-content.min.css"))) !!}
    </style>

    <!--[if lt IE 9]>
    <script src="{!! url('build/js/lt-ie9.min.js') !!}"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>Ahk</a>
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        {!! Form::open(['route' => 'cms.sessions.store', 'method' => 'POST']) !!}

        <div class='form-group @if($errors->first('username')) has-error @endif has-feedback'>
            {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Enter username', 'required' => 'required']) !!}
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            {!! $errors->first('username', '<div class="help-block col-sm-reset inline">:message</div>') !!}
        </div>

        <br/>

        <div class='form-group @if($errors->first('password')) has-error @endif has-feedback'>
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter password', 'required' => 'required']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            {!! $errors->first('password', '<div class="help-block col-sm-reset inline">:message</div>') !!}
        </div>

        <div class="row">
            <div class="col-xs-7">
                <div class="checkbox">
                    <label> {!! Form::checkbox('remember') !!} Remember me </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-5">
                {!! Form::submit('Sign In', ['class' => 'btn btn-primary btn-block btn-flat', 'id' => 'sign-in', 'name' => 'sign-in']) !!}
            </div>
            <!-- /.col -->
        </div>
        {!! Form::close() !!}
    </div>

</div>

<script type="text/javascript" src='{!! elixir("js/cms/master.min.js") !!}'></script>
@include('cms._partials.flash')
</body>
</html>
