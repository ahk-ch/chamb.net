@extends('admin.layouts.master')
@section('title', 'Categories')
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
                    <th>Actions</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <a href="{!! route('admin.articles.categories.edit', $category) !!}" class="btn bg-purple btn-flat btn-sm btn-block">
                                {!! trans('admin.edit') !!}
                            </a>
                        </td>
                        <td>{!! $category->name !!}</td>
                        <td>{!! $category->author->name or $category->author->username !!}</td>
                        <td>{!! $category->created_at !!}</td>
                        <td>{!! $category->updated_at !!}</td>
                    </tr>
                @endforeach
            </table>

        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            <div class="pagination pagination-sm pull-left">
                <a href="{!! route('admin.articles.categories.create') !!}" class="btn btn-block btn-primary btn-flat">
                    {!! trans('admin.create') !!}</a>
            </div>
            <ul class="pagination pagination-sm no-margin pull-right">
                {!! $categories->render() !!}
            </ul>
        </div>
    </div><!-- /.box -->

@endsection
@section('scripts')
@endsection
@section('inline-scripts')
@endsection
