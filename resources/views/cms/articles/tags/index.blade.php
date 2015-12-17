@extends('cms.layouts.master')
@section('title', 'Tags')
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
                @foreach($tags as $tag)
                    <tr>
                        <td>
                            <a href="{!! route('cms.articles.tags.edit', $tag) !!}" class="btn bg-purple btn-flat btn-sm btn-block">
                                {!! trans('cms.edit') !!}
                            </a>
                        </td>
                        <td>{!! $tag->name !!}</td>
                        <td>{!! $tag->author->name or $tag->author->username !!}</td>
                        <td>{!! $tag->created_at !!}</td>
                        <td>{!! $tag->updated_at !!}</td>
                    </tr>
                @endforeach
            </table>

        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            <div class="pagination pagination-sm pull-left">
                <a href="{!! route('cms.articles.tags.create') !!}" class="btn btn-block btn-primary btn-flat">
                    {!! trans('cms.create') !!}</a>
            </div>
            <ul class="pagination pagination-sm no-margin pull-right">
                {!! $tags->render() !!}
            </ul>
        </div>
    </div><!-- /.box -->

@endsection
@section('scripts')
@endsection
@section('inline-scripts')
@endsection
