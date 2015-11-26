@extends('admin.layouts.master')
@section('title', 'Create Article')
@section('styles')
    <link href='{!! url("vendor/AdminLTE/plugins/select2/select2.min.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('inline-styles')
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
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
                                        <div class="col-lg-6">
                                            <div class='form-group @if($errors->first('Title')) has-error @endif'>
                                                <i class="fa fa-th-large"></i>
                                                {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter title']) !!}
                                                {!! $errors->first('title', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class='form-group @if($errors->first('category')) has-error @endif'>
                                                <i class="fa fa-mobile fa-lg"></i>
                                                {!! Form::label('category', 'Category') !!}
                                                {!! Form::select('category', $categories, null,
                                                ['class' => 'select2 form-control', 'data-placeholder' => 'Select Category', 'style' => 'width: 100%']) !!}
                                                {!! $errors->first('category', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class='form-group @if($errors->first('short_description')) has-error @endif'>
                                        <i class="fa fa-edit"></i>
                                        {!! Form::label('short_description', 'Short Description', ['class' => 'control-label']) !!}
                                        {!! Form::textarea('name', null, ['class' => 'form-control', 'placeholder' => 'Enter short desription', 'rows' => '3']) !!}
                                        {!! $errors->first('short_description', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                                    </div>

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class='form-group @if($errors->first('tags')) has-error @endif'>
                                                <i class="fa fa-mobile fa-lg"></i>
                                                {!! Form::label('tags[]', 'Tags') !!}
                                                {!! Form::select('tags[]', $tags, null,
                                                ['class' => 'select2 form-control', 'data-placeholder' => 'Select Tag(s)', 'multiple' => 'multiple', ]) !!}
                                                {!! $errors->first('tags', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class='form-group @if($errors->first('published')) has-error @endif'>
                                                <i class="fa fa-mobile fa-lg"></i>
                                                {!! Form::label('publish', 'Publish On Creation') !!}
                                                {!! Form::checkbox('publish', 1,  null, ['class' => 'checkbox']) !!}
                                                {!! $errors->first('tags', '<div class="help-block col-sm-reset inline">:message</div>') !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div><!-- /.box -->
                        </div><!-- /.col-->
                    </div><!-- ./row -->

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
                    <textarea id="news_editor" name="news_editor" rows="13">
                    </textarea>
                                </div>
                            </div><!-- /.box -->
                        </div><!-- /.col-->
                    </div><!-- ./row -->

                    <div class="box-footer">
                        {!! Form::button('Create', ['class' => 'btn btn-primary btn-flat', 'type' => 'submit']) !!}
                    </div>

                </div>
            </div><!-- /.box -->
        </div><!-- /.col-->
    </div><!-- ./row -->
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <script src='{!! url("vendor/AdminLTE/plugins/select2/select2.min.js") !!}'></script>
@endsection
@section('inline-scripts')
    <script>
        $(function () {
            CKEDITOR.replace('news_editor');

            $('.select2').select2();
        });
    </script>
@endsection
