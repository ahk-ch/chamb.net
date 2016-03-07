@extends('ahk.layouts.master')
@section('title', 'Work-groups - Health')
@section('css-implementing-plugins')
@endsection
@section('inline-css')
    <style>
        {!! File::get(public_path(elixir("css/industries/work-groups.min.css"))) !!}}
    </style>
@endsection
@section('header_links')
    @include('ahk._partials.header_industries_links')
@endsection
@section('content')
    <div class="search-block-v2">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <h2>All Work-groups</h2>
            </div>
        </div>
    </div><!--/container-->

    <!--=== Search Results ===-->
    <div class="container s-results margin-bottom-50">

        <span class="results-number">{!! $workGroups->total() !!} result(s)</span>

        @foreach($workGroups as $workGroup)
            <a href="{!! route('industries.work_groups.show',
					['industry_slug'   => $industry->slug,
					 'work_group_slug' => $workGroup->slug]) !!}">
                <div class="inner-results">
                    <h3>
                        {{ $workGroup->name }}
                    </h3>
                    <p>{{ $workGroup->description }}</p>
                </div>
            </a>
            <hr>
        @endforeach


        <div class="margin-bottom-30"></div>

        <div class="text-left">

            {!! $workGroups->links() !!}

        </div>
    </div><!--/container-->

@endsection
