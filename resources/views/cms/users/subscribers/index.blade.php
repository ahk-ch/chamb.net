@extends('cms.layouts.master')
@section('title', 'Subscribers')
@section('styles')
@endsection
@section('inline-styles')
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Subscribers</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <td>Emma Smith</td>
                    <td>email@example.com</td>
                </tr>
            </table>
        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
    </div><!-- /.box -->

@endsection
@section('scripts')
@endsection
@section('inline-scripts')
@endsection
