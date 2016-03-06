@extends('ahk.layouts.master')
@section('title', 'Workgroup')
@section('header_links')
    @include('ahk._partials.header_industries_links')
@endsection
@section('content')
    <div class="search-block-v2">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <h2>Content on {{ $workGroup->name }}</h2>
            </div>
        </div>
    </div>
@endsection
