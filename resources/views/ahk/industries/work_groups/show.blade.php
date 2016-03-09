@extends('ahk.layouts.master')
@section('title', "{$workGroup->name} - {$industry->name}")
@section('inline-css')
    <style type="text/css">
        .service-block-v5 {
            background: url('/build/img/breadcrumbs/img3.jpg') no-repeat;
            background-size: cover;
            background-position: center center;
        }
        {!! File::get(public_path(elixir("css/industries/work-groups/show.min.css"))) !!}
    </style>
@endsection
@section('header_links')
    @include('ahk._partials.header_industries_links')
@endsection
@section('content')
    <div class="service-block-v5 img-v1">
        <div class="container">
            <div class="row equal-height-columns">
                <a href="#protocols">
                    <div class="col-md-3 service-inner equal-height-column">
                        <i class="icon-custom icon-md rounded-x icon-bg-u icon-diamond"></i>
                        <span>Protocols</span>
                    </div>
                </a>

                <a href="#ideas">
                    <div class="col-md-3 service-inner equal-height-column service-border">
                        <i class="icon-custom icon-md rounded-x icon-bg-u icon-rocket"></i>
                        <span>Ideas</span>
                    </div>
                </a>

                <a href="#decisions">
                    <div class="col-md-3 service-inner equal-height-column service-border">
                        <i class="icon-custom icon-md rounded-x icon-bg-u icon-rocket"></i>
                        <span>Decisions</span>
                    </div>
                </a>

                <a href="#events">
                    <div class="col-md-3 service-inner equal-height-column">
                        <i class="icon-custom icon-md rounded-x icon-bg-u icon-support"></i>
                        <span>Events</span>
                    </div>
                </a>
            </div><!--/end row-->
        </div><!--/end container-->
    </div>

    <div class="container content-sm">
        <div class="text-center margin-bottom-50">
            <h2 class="title-v2 title-center">POPULAR NEWS</h2>
            <p class="space-lg-hor">Stay up to date with the most popular internal news for your industry sector.</p>
        </div>

        <div class="row news-v2">
            @foreach($articles as $article)
                <div class="col-md-4 md-margin-bottom-30">
                    <a href="#">
                        <div class="news-v2-badge">
                            <img class="img-responsive"
                                 src="{!! route('files.render', ['path' => $article->thumbnail->path]) !!}"
                                 alt="{{ $article->title }} Logo">
                            <p>
                                <span>{!! $article->created_at->format('d') !!}</span>
                                <small>{!! $article->created_at->format('M') !!}</small>
                            </p>
                        </div>
                        <div class="news-v2-desc bg-color-light">
                            <h3>{{ $article->title }}</h3>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container content-sm" id="protocols">
        <div class="text-center margin-bottom-50">
            <h2 class="title-v2 title-center">PROTOCOLS</h2>
        </div>
        <!--Basic Table-->
        <div class="panel panel-green margin-bottom-40">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($industry->companyFiles as $file)
                    <tr>
                        <td>{{ $file->name }}</td>
                        <td>{{ $file->description }}</td>
                        <td><a href="{!! route('files.download', ['path' => $file->path]) !!}"
                               class="btn btn-info btn-xs">
                                <i class="fa fa-download"></i> Download</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!--End Basic Table-->
        <div class="margin-bottom-40"></div>
    </div>

    <div class="container content profile">
        <div class="row">
            <div class="profile-body">

                <div class="row margin-bottom-20">
                    <!--Profile Post-->
                    <div class="col-sm-6">
                        <div class="panel panel-profile no-bg">
                            <div class="panel-heading overflow-h">
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i>Notes</h2>
                                <a href="#"><i class="fa fa-cog pull-right"></i></a>
                            </div>
                            <div id="scrollbar" class="panel-body no-padding mCustomScrollbar"
                                 data-mcs-theme="minimal-dark">
                                <div class="profile-post color-one">
                                    <span class="profile-post-numb">01</span>
                                    <div class="profile-post-in">
                                        <h3 class="heading-xs"><a href="#">Creative Blog</a></h3>
                                        <p>How to market yourself as a freelance designer</p>
                                    </div>
                                </div>
                                <div class="profile-post color-two">
                                    <span class="profile-post-numb">02</span>
                                    <div class="profile-post-in">
                                        <h3 class="heading-xs"><a href="#">Codrops Collective #117</a></h3>
                                        <p>Web Design &amp; Development News</p>
                                    </div>
                                </div>
                                <div class="profile-post color-three">
                                    <span class="profile-post-numb">03</span>
                                    <div class="profile-post-in">
                                        <h3 class="heading-xs"><a href="#">Sketch Toolbox</a></h3>
                                        <p>Basic prototype of a package manager for Sketch</p>
                                    </div>
                                </div>
                                <div class="profile-post color-four">
                                    <span class="profile-post-numb">04</span>
                                    <div class="profile-post-in">
                                        <h3 class="heading-xs"><a href="#">Amazing Portfolio</a></h3>
                                        <p>Create a free online portfolio lookbook with Readz</p>
                                    </div>
                                </div>
                                <div class="profile-post color-five">
                                    <span class="profile-post-numb">05</span>
                                    <div class="profile-post-in">
                                        <h3 class="heading-xs"><a href="#">Discover New Features</a></h3>
                                        <p>More than 100+ amazing add-ons coming soon...</p>
                                    </div>
                                </div>
                                <div class="profile-post color-six">
                                    <span class="profile-post-numb">06</span>
                                    <div class="profile-post-in">
                                        <h3 class="heading-xs"><a href="#">Corporation Plans</a></h3>
                                        <p>Discussion of new corporation plans</p>
                                    </div>
                                </div>
                                <div class="profile-post color-seven">
                                    <span class="profile-post-numb">07</span>
                                    <div class="profile-post-in">
                                        <h3 class="heading-xs"><a href="#">Project Updates</a></h3>
                                        <p>New features of coming update</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Profile Post-->

                    <!--Profile Event-->
                    <div class="col-sm-6 md-margin-bottom-20">
                        <div class="panel panel-profile no-bg">
                            <div class="panel-heading overflow-h">
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i>
                                    Events</h2>
                            </div>
                            <div id="scrollbar2" class="panel-body no-padding mCustomScrollbar"
                                 data-mcs-theme="minimal-dark">
                                @foreach($events as $event)
                                    <div class="profile-event">
                                        <div class="date-formats">
                                            <span>{{ $event->start_date->format('d') }}</span>
                                            <small>{{ $event->start_date->format('m, Y') }}</small>
                                        </div>
                                        <div class="overflow-h">
                                            <h3 class="heading-xs"><a href="#">{{ $event->name }}</a></h3>
                                            <p>{{ $event->description }}</p>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--End Profile Event-->
                </div><!--/end row-->

                <hr>

            </div>
        </div>
    </div><!--/container-->
@endsection
@section('js-files')
    <script type="text/javascript" src="{!! elixir('js/industries/work-groups/show.min.js') !!}"></script>
@endsection
