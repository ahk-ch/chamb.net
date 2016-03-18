@extends('cms.layouts.master')
@section('title', trans('cms.companies'))
@section('styles')
@endsection
@section('inline-styles')
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{!! trans('cms.table') !!}</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th>{!! trans('cms.name') !!}</th>
                    <th>{!! trans('cms.logo') !!}</th>
                    <th>{!! trans('cms.name_of_contact_partner') !!}</th>
                </tr>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td><img src="{{ $company->logo }}" height="30" alt="Company Logo"/></td>
                        <td>{{ $company->name_of_contact_partner }}</td>
                    </tr>
                @endforeach

            </table>
        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            <div class="pagination pagination-sm no-margin pull-right">
                {!! $companies->render() !!}
            </div>
        </div>
    </div><!-- /.box -->
@endsection
@section('scripts')
@endsection
@section('inline-scripts')
@endsection
