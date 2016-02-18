@extends('ahk.layouts.master')
@section('title', trans('ahk.my_companies'))
@section('css-implementing-plugins')
@endsection
@section('css-page-style')
@endsection
@section('header_links')
    @include('ahk._partials.header_default_links')
@endsection
@section('content')
    {!! Form::model($company, ['method' => 'PUT', 'route' => ['my.companies.update', $company->slug],
     'role' => 'form']) !!}
    {!! Form::hidden('slug', $company->slug) !!}
    <div class="box-body">
        @include('ahk.my.companies._form')
    </div>
    <div class="box-footer">
        {!! Form::button(trans('ahk.update'), ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
    </div>
    {!! Form::close() !!}
    <div class="container content profile">
        <div class="row">
            <div class="col-md-3 md-margin-bottom-40">
                @include('ahk.my._partials.left_sidebar')
            </div>
            <!--End Left Sidebar-->
            <div class="col-md-9">
                <div class="panel panel-blue margin-bottom-40">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-tasks"></i> {!! trans('ahk.edit') !!}</h3>
                    </div>
                    <div class="panel-body">
                        <form class="margin-bottom-40" role="form">
                            <div class="form-group">
                                <label for="nameInputEmail"> <i class="fa fa-edit"></i> {!! trans('ahk.name') !!}
                                </label>
                                {!! Form::text('nameInputEmail', $company->name, ['class' => 'form-control',
                                'placeholder' => trans('ahk.enter_email'), 'required' => 'required', ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="imgLogo"> <i class="fa fa-image"></i> {!! trans('ahk.logo') !!}
                                </label> <img class="img-responsive" id="imgLogo" src="{!! $company->logo !!}">
                            </div>

                            <div class="form-group">
                                <label for="focusInputField"> <i class="fa fa-edit"></i> {!! trans('ahk.focus') !!}
                                </label>
                                {!! Form::textarea('focusInputField', $company->focus, ['class' => 'form-control',
                                'placeholder' => trans('ahk.enter_focus'), 'required' => 'required', ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="descriptionInputField">
                                    <i class="fa fa-edit"></i> {!! trans('ahk.focus') !!}
                                </label>
                                {!! Form::textarea('descriptionInputField', $company->description, ['class' => 'form-control',
                                'placeholder' => trans('ahk.enter_description'), 'required' => 'required', ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="businessLeaderInputField">
                                    <i class="fa fa-edit"></i> {!! trans('ahk.business_leader') !!}
                                </label>
                                {!! Form::input('text', 'businessLeaderInputField', $company->business_leader, ['class' => 'form-control',
                                'placeholder' => trans('ahk.enter_business_leader'), 'required' => 'required', ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="addressInputField">
                                    <i class="fa fa-location-arrow"></i> {!! trans('ahk.address') !!}
                                </label>
                                {!! Form::input('text', 'addressInputField', $company->address, ['class' => 'form-control',
                                'placeholder' => trans('ahk.address'), 'required' => 'required', ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="emailInputField"> <i class="fa fa-envelope"></i> Email </label>
                                {!! Form::email('emailInputField', $company->email, ['class' => 'form-control',
                                'placeholder' => trans('ahk.enter_email'), 'required' => 'required', ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="phoneNumberInputField"> <i class="fa fa-phone"></i> Email </label>
                                {!! Form::input('text', 'phoneNumberInputField', $company->phone_number,
                                ['class' => 'form-control', 'placeholder' => trans('ahk.enter_phone_number'),
                                 'required' => 'required', ]) !!}
                            </div>

                            <button type="submit" class="btn-u btn-u-blue">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- End Basic Form -->
            </div>
        </div>
    </div>
@endsection
@section('js-implementing-plugins')
@endsection
@section('js-page-level')
@endsection
