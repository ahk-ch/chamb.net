@extends('ahk.layouts.master')
@section('title', trans('ahk.create'))
@section('header_links')
    @include('ahk._partials.header_default_links')
@endsection
@section('inline-css')
    <style type="text/css">
        {!! File::get(public_path(elixir("css/my/companies/create-and-edit.min.css"))) !!}
    </style>
@endsection
@section('content')
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

                        {!! Form::model($company, ['route' => ['my.companies.store', $company->slug],
                         'role' => 'form', 'class' => 'margin-bottom-40', 'files' => 'true']) !!}

                        @include('ahk.my.companies._form')

                        <div class="form-group">
                            {!! Form::button(trans('ahk.create'), ['class' => 'btn-u btn-u-default', 'type' => 'submit']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- End Basic Form -->
            </div>
        </div>
    </div>
@endsection
{{--@section('optimize-css-delivery')--}}
    {{--{!! Form::input('hidden', 'styleSheetUrls[]', elixir("css/my/companies/create-and-edit.min.css")) !!}--}}
{{--@endsection--}}
@section('js-files')
    <script src="{!! elixir('js/my/companies/create-and-edit.min.js') !!}"></script>
@endsection
