<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminAHK | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{!! url('vendor/AdminLTE/bootstrap/css/bootstrap.min.css') !!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! url('vendor/AdminLTE/dist/css/AdminLTE.min.css') !!}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{!! url('vendor/AdminLTE/plugins/iCheck/square/blue.css') !!}">
    <link href='{!! url("vendor/pnotify/src/pnotify.core.css") !!}' rel='stylesheet' type='text/css'/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>AHK</a>
    </div>

    <!-- /.login-logo -->
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
                <div class="checkbox icheck">
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
    <!-- /.login-box-body -->

</div>
<!-- /.login-box -->

<script src="{!! url('vendor/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js') !!}"></script>
<script src="{!! url('vendor/AdminLTE/bootstrap/js/bootstrap.min.js') !!}"></script>
<script src="{!! url('vendor/AdminLTE/plugins/iCheck/icheck.min.js') !!}"></script>
<script type="text/javascript" src='{!! url("vendor/pnotify/src/pnotify.core.min.js") !!}'></script>
<script type="text/javascript" src='{!! url("vendor/pnotify/src/pnotify.confirm.min.js") !!}'></script>
@include('cms._partials.flash')
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
