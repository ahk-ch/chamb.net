@extends('cms.layouts.master')
@section('title', 'Create Article')
@section('styles')
    <link href='{!! url("vendor/AdminLTE/plugins/select2/select2.min.css") !!}' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="{!! url('vendor/AdminLTE/plugins/iCheck/square/blue.css') !!}">
@endsection
@section('inline-styles')
@endsection
@section('content')

    {!! Form::model($article, ['route' => ['cms.articles.store'], 'role' => 'form']) !!}

    @include('cms.articles._partials.form')

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
