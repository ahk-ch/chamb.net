@extends('cms.layouts.master')
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
                    <th>Actions</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Created at</th>
                    <th>Updated At</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <a href="{!! route('cms.articles.categories.edit', $category) !!}" class="btn bg-purple btn-flat btn-sm btn-block">
                                {!! trans('cms.edit') !!}
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
                <a href="{!! route('cms.articles.categories.create') !!}" class="btn btn-block btn-primary btn-flat">
                    {!! trans('cms.create') !!}</a>
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
