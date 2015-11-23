@extends('layouts.master')
@section('title', 'Welcome')
@section('css-implementing-plugins')
    <link href='{!! url("assets/css/pages/page_log_reg_v1.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('css-page-style')
@endsection
@section('content')
    {!! Breadcrumbs::render() !!}
    <div class="container content"><!--=== Content Part ===-->
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <form class="reg-page">
                    <div class="reg-header">
                        <h2>Login to your account</h2>
                    </div>

                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" placeholder="Username" class="form-control">
                    </div>
                    <div class="input-group margin-bottom-20">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" placeholder="Password" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6 checkbox">
                            <label><input type="checkbox"> Stay signed in</label>
                        </div>
                        <div class="col-md-6">
                            <button class="btn-u pull-right" type="submit">Login</button>
                        </div>
                    </div>

                    <hr>

                    <h4>Forget your Password ?</h4>
                    <p>no worries, <a class="color-green" href="#">click here</a> to reset your password.</p>
                </form>
            </div>
        </div><!--/row-->
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection
@section('js-implementing-plugins')
@endsection
@section('js-inline')
@endsection
@section('js-page-level')
@endsection
