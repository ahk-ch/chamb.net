@extends('ahk.layouts.master')
@section('title', trans('ahk.community'))
@section('inline-css')
    <style>
        {!! File::get(public_path(elixir("css/companies.min.css"))) !!}





        }
    </style>
    <style>
        .job-img {
            overflow: hidden;
            min-height: 300px;
            background: url("{!! route('files.render', ['path' => 'img/community/background.jpg']) !!}") center center no-repeat;
            background-size: cover;
        }
    </style>
@endsection
@section('header_links')
    @include('ahk._partials.header_industries_links')
@endsection
@section('content')
    <div class="job-img margin-bottom-30">
        <div class="job-banner">
            <h2>{!! trans('ahk.discover_the_community') !!}</h2>
        </div>
        <div class="job-img-inputs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 md-margin-bottom-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="text" placeholder="what companies you are looking for" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4 md-margin-bottom-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <input type="text" placeholder="the location of the companies" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn-u btn-block btn-u-dark"> Search Company</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Job Img ===-->

    <div class="parallax-team parallaxBg">
        <div class="container content">

            @foreach($companies->chunk(4) as $chunkCompanies)

                <div class="row high-rated margin-bottom-20">

                    @foreach($chunkCompanies as $company)

                        <div class="col-md-3 col-sm-3 col-xs-12 md-margin-bottom-40">

                            <div class="easy-block-v1">

                                <a href="{!! route('industries.companies.show', ['industry_slug' => $industry->slug,
                            'company_slug' => $company->slug]) !!}">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img alt="Company Logo" src="{!! route('files.render',
                                         ['path' => $company->logo->path ]) !!}" style="max-height: 150px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overflow-h">
                                        <h3>{{ $company->name }}</h3>
                                    </div>
                                    <ul class="list-unstyled read-more-js">
                                        <li>{{  $company->description }}</li>
                                    </ul>
                                </a>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('hidden-inputs')
    {!! Form::input('hidden', 'readMoreText', trans('ahk.read_more')) !!}
    {!! Form::input('hidden', 'readLessText', trans('ahk.read_less')) !!}
@endsection
@section('optimize-css-delivery')
    {{--{!! Form::input('hidden', 'styleSheetUrls[]', elixir("css/companies.min.css")) !!}--}}
@endsection
@section('js-files')
    <script type="text/javascript" src="{!! elixir('js/companies/index.min.js') !!}"></script>
@endsection

