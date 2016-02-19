@extends('ahk.layouts.master')
@section('title', trans('ahk.my_companies'))
@section('css-implementing-plugins')
    <link href='{!! url("vendor/jasny-bootstrap/dist/css/jasny-bootstrap.min.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('css-page-style')
@endsection
@section('header_links')
    @include('ahk._partials.header_default_links')
@endsection
@section('content')
    @include('ahk.my.companies._form')
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
                         'role' => 'form', 'class' => 'margin-bottom-40']) !!}

                        {!! Form::hidden('id', $company->id) !!}

                        <div class="row">
                            <div class="form-group col-md-6 @if($errors->first('nameInputField')) alert alert-danger fade in @endif">
                                <label for="nameInputField"> <i class="fa fa-edit"></i> {!! trans('ahk.name') !!}
                                </label>
                                {!! Form::text('nameInputField', $company->name, ['class' => 'form-control',
                                'placeholder' => trans('ahk.enter_name'), 'required' => 'required', ]) !!}
                                {!! $errors->first('nameInputField', ':message') !!}
                            </div>

                            <div class="form-group col-md-6 @if($errors->first('businessLeaderInputField')) alert alert-danger fade in @endif">
                                <label for="businessLeaderInputField">
                                    <i class="fa fa-edit"></i> {!! trans('ahk.business_leader') !!}
                                </label>
                                {!! Form::input('text', 'businessLeaderInputField', $company->business_leader, ['class' => 'form-control',
                                'placeholder' => trans('ahk.enter_business_leader'), 'required' => 'required', ]) !!}
                                {!! $errors->first('businessLeaderInputField', ':message') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 @if($errors->first('addressInputField')) alert alert-danger fade in @endif">
                                <label for="addressInputField">
                                    <i class="fa fa-location-arrow"></i> {!! trans('ahk.address') !!}
                                </label>
                                {!! Form::input('text', 'addressInputField', $company->address, ['class' => 'form-control',
                                'placeholder' => trans('ahk.address'), 'required' => 'required', ]) !!}
                                {!! $errors->first('addressInputField', ':message') !!}
                            </div>

                            <div class="form-group col-md-6 @if($errors->first('emailInputField')) alert alert-danger fade in @endif">
                                <label for="emailInputField"> <i class="fa fa-envelope"></i> Email </label>
                                {!! Form::email('emailInputField', $company->email, ['class' => 'form-control',
                                'placeholder' => trans('ahk.enter_email'), 'required' => 'required', ]) !!}
                                {!! $errors->first('emailInputField', ':message') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 @if($errors->first('phoneNumberInputField')) alert alert-danger fade in @endif">
                                <label for="phoneNumberInputField">
                                    <i class="fa fa-phone"></i> {!! trans('ahk.phone_number') !!} </label>
                                {!! Form::input('text', 'phoneNumberInputField', $company->phone_number,
                                ['class' => 'form-control', 'placeholder' => trans('ahk.enter_phone_number'),
                                 'required' => 'required', ]) !!}
                                {!! $errors->first('phoneNumberInputField', ':message') !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 @if($errors->first('focusInputField')) alert alert-danger fade in @endif">
                                <label for="focusInputField"> <i class="fa fa-edit"></i> {!! trans('ahk.focus') !!}
                                </label>
                                {!! Form::textarea('focusInputField', $company->focus, ['class' => 'form-control',
                                'placeholder' => trans('ahk.enter_focus'), 'required' => 'required', ]) !!}
                                {!! $errors->first('focusInputField', ':message') !!}
                            </div>
                            <div class="form-group col-md-6 @if($errors->first('description')) alert alert-danger fade in @endif">
                                <label for="descriptionInputField">
                                    <i class="fa fa-edit"></i> {!! trans('ahk.description') !!}
                                </label>
                                {!! Form::textarea('descriptionInputField', $company->description, ['class' => 'form-control',
                                'placeholder' => trans('ahk.enter_description'), 'required' => 'required', ]) !!}
                                {!! $errors->first('descriptionInputField', ':message') !!}
                            </div>
                        </div>

                        <div class="row @if($errors->first('logoInputField')) alert alert-danger fade in @endif">
                            <div class="form-group col-md-6">
                                <label for="logoInputField">
                                    <i class="fa fa-image"></i> {!! trans('ahk.current_logo') !!}
                                </label>
                                <img alt="Logo" id="logoInputField" class="img-responsive" src="{!! $company->logo !!}">
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label> <i class="fa fa-picture-o"></i> {!! trans('ahk.new_logo') !!}
                                        </label>
                                    </div>
                                </div>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img data-src="holder.js/200x150" alt="Holder" src="">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                    <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select new image</span>
                                    <span class="fileinput-exists">Change</span><input type="file" name="logoInputField"></span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                                {!! $errors->first('logoInputField', ':message') !!}
                            </div>
                        </div>

                        <hr>

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
@endsection
@section('js-page-level')
@endsection
