@extends('admin.layouts.master')
@section('title', 'Create Article')
@section('styles')
    <link href='{!! url("vendor/AdminLTE/plugins/select2/select2.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="{!! url('vendor/AdminLTE/plugins/iCheck/square/blue.css') !!}">
@endsection
@section('inline-styles')
@endsection
@section('content')

    {!! Form::model($article, ['route' => ['admin.articles.store'], 'role' => 'form']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">
                        Info
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-primary btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button class="btn btn-primary btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class='form-group @if($errors->first('title')) has-error @endif'>
                                <i class="fa fa-th-large"></i>
                                {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter title']) !!}
                                {!! $errors->first('title', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class='form-group @if($errors->first('category_id')) has-error @endif'>
                                <i class="fa fa-mobile fa-lg"></i>
                                {!! Form::label('category_id', 'Category') !!}
                                {!! Form::select('category_id', $categories, null,
                                ['class' => 'select2 form-control', 'data-placeholder' => 'Select Category', 'style' => 'width: 100%']) !!}
                                {!! $errors->first('category_id', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class='form-group @if($errors->first('tagIds')) has-error @endif'>
                                <i class="fa fa-mobile fa-lg"></i>
                                {!! Form::label('tagIds[]', 'Tags') !!}
                                {!! Form::select('tagIds[]', $tags, null,
                                ['class' => 'select2 form-control', 'data-placeholder' => 'Select Tag(s)', 'multiple' => 'multiple', ]) !!}
                                {!! $errors->first('tagIds', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                            </div>
                        </div>
                    </div>

                    <div class='form-group @if($errors->first('description')) has-error @endif'>
                        <i class="fa fa-edit"></i>
                        {!! Form::label('description', 'Short Description', ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter short description', 'rows' => '3']) !!}
                        {!! $errors->first('description', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                    </div>
                    <div class="col-lg-6">
                        <div class='form-group @if($errors->first('published')) has-error @endif'>
                            <div class="checkbox icheck">
                                <i class="fa fa-mobile fa-lg"></i>
                                {!! Form::label('publish', 'Publish On Creation') !!}
                                {!! Form::checkbox('publish', 1,  null, ['class' => 'checkbox']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col-->

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">
                        Content
                        <small>Advanced and full of features</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-primary btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button class="btn btn-primary btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                    <textarea id="content" name="content" rows="13">
                    </textarea>
                    <div class='form-group @if($errors->first('content')) has-error @endif'>
                        {!! $errors->first('content', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                    </div>
                </div>
            </div><!-- /.box -->
        </div><!-- /.col-->
    </div><!-- ./row -->

    <div class="box-footer">
        {!! Form::button('Create', ['class' => 'btn btn-primary btn-flat', 'type' => 'submit']) !!}
    </div>
    {!! Form::close() !!}
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <script src='{!! url("vendor/AdminLTE/plugins/select2/select2.min.js") !!}'></script>
    <script src="{!! url('vendor/AdminLTE/plugins/iCheck/icheck.min.js') !!}"></script>
@endsection
@section('inline-scripts')
    <script>
        $(function () {
            CKEDITOR.replace('content');

            $('.select2').select2();

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
@endsection
