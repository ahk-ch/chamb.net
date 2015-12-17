@extends('cms.layouts.master')
@section('title', 'Edit Category')
@section('styles')
    <link href='{!! url("vendor/AdminLTE/plugins/select2/select2.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="{!! url('vendor/AdminLTE/plugins/iCheck/square/blue.css') !!}">
@endsection
@section('inline-styles')
@endsection
@section('content')

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
                {!! Form::model($category, ['method' => 'PUT', 'route' => ['cms.articles.categories.update', $category->id], 'role' => 'form']) !!}
                {!! Form::hidden('id', $category->id) !!}
                <div class="box-body">
                    @include('cms.articles.categories._partials.form')
                </div>
                <div class="box-footer">
                    {!! Form::button('Update', ['class' => 'btn btn-primary btn-flat', 'type' => 'submit']) !!}
                </div>
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div><!-- /.col-->
    </div><!-- ./row -->

@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <script src='{!! url("vendor/AdminLTE/plugins/select2/select2.min.js") !!}'></script>
    <script src="{!! url('vendor/AdminLTE/plugins/iCheck/icheck.min.js') !!}"></script>
@endsection
@section('inline-scripts')
    <script>
        $(function () {
            CKEDITOR.replace('news_editor');

            $('.select2').select2();

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
@endsection
