@extends('cms.layouts.master')
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
                    <th>Title</th>
                    <th>Industry</th>
                    <th>Tags</th>
                    <th>Author</th>
                    <th>Created at / Updated at</th>
                </tr>
                @foreach($articles as $article)
                    <tr>
                        <td>
                            <a href="{!! route('cms.articles.edit', $article) !!}"
                               class="btn bg-purple btn-flat btn-sm btn-block">{!! trans('cms.edit') !!}
                            </a>
                        </td>
                        <td>{!! $article->title !!}</td>
                        <td>{!! $article->industry->name !!}</td>
                        <td>
                            @foreach($article->tags as $tag)
                                {!! $tag->name !!}
                            @endforeach
                        </td>
                        <td>{!! $article->author->name !!}</td>
                        <td>{!! $article->created_at !!} / {!! $article->updated_at !!}</td>
                    </tr>
                @endforeach
            </table>

        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            <div class="pagination pagination-sm pull-left">
                <a href="{!! route('cms.articles.create') !!}" class="btn btn-block btn-primary btn-flat">
                    {!! trans('cms.create') !!}</a>
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
