@extends('admin.layouts.master')
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
                    <th>Name</th>
                    <th>Created by</th>
                    <th>Created at</th>
                    <th>Update At</th>
                    <th>Actions</th>
                </tr>
                @foreach($tags as $tag)
                    <tr>
                        <td>{!! $tag->name !!}</td>
                        <td>{!! $tag->author->name or $tag->author->username !!}</td>
                        <td>{!! $tag->created_at !!}</td>
                        <td>{!! $tag->updated_at !!}</td>
                    </tr>
                @endforeach
            </table>

        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            <ul class="pagination pagination-sm pull-left">

                <a href="{!! route('admin.articles.tags.create') !!}" class="btn btn-block btn-primary btn-flat">
                    {!! trans('admin.create') !!}</a>
            </ul>
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
