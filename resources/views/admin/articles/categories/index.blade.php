@extends('admin.layouts.master')
@section('title', 'Article Categories')
@section('styles')
@endsection
@section('inline-styles')
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Created by</th>
                    <th>Created at</th>
                    <th>Update At</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>{!! $category->name !!}</td>
                        <td>{!! $category->created_by !!}</td>
                        <td>{!! $category->created_at !!}</td>
                        <td>{!! $category->author->name or $category->author->usernmae !!}</td>
                    </tr>
                @endforeach
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
