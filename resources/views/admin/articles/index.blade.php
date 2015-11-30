@extends('admin.layouts.master')
@section('title', 'Articles')
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
                    <th>title</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th>Author</th>
                    <th>Created at / Updated at</th>
                </tr>
                @foreach($articles as $article)
                    <tr>
                        <td>
                            <a href="{!! route('admin.articles.edit', $article) !!}" class="btn bg-purple btn-flat btn-sm btn-block">
                                {!! trans('admin.edit') !!}
                            </a>
                        </td>
                        <td>{!! $article->title !!}</td>
                        <td>{!! $article->category->name !!}</td>
                        <td>
                            @foreach($article->tags as $tag)
                                {!! $tag->name !!}
                            @endforeach
                        </td>
                        <td>{!! $article->author->name or $article->author->username !!}</td>
                        <td>{!! $article->created_at !!} / {!! $article->updated_at !!}</td>
                    </tr>
                @endforeach
            </table>

        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            <div class="pagination pagination-sm pull-left">
                <a href="{!! route('admin.articles.create') !!}" class="btn btn-block btn-primary btn-flat">
                    {!! trans('admin.create') !!}</a>
            </div>
            <ul class="pagination pagination-sm no-margin pull-right">
                {!! $articles->render() !!}
            </ul>
        </div>
    </div><!-- /.box -->

@endsection
@section('scripts')
@endsection
@section('inline-scripts')
@endsection
