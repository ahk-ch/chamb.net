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

            <div class="row margin-bottom-20">
                <!--Profile Post-->
                <div class="col-sm-6">
                    <div class="panel panel-profile no-bg">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i>Decisions</h2>
                        </div>
                        <div id="scrollbar" class="panel-body no-padding mCustomScrollbar"
                             data-mcs-theme="minimal-dark">
                            @for($index = 0; $index < $decisions->count(); $index++)
                                <div class="profile-post color-{!! ['one', 'two', 'three', 'four', 'five', 'six', 'seven'][rand(0, 6)] !!}">
                                    <span class="profile-post-numb">{!! sprintf('%02d', $index) !!}</span>
                                    <div class="profile-post-in">
                                        <h3 class="heading-xs"><a href="#">{{ $decisions->get($index)->name }}</a></h3>
                                        <p>{{ $decisions->get($index)->description }}</p>
                                    </div>
                                </div>
                            @endfor
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

    </div><!--/container-->

    <div class="container content-sm profile" id="protocols">
        <div class="text-center margin-bottom-50">
            <h2 class="title-v2 title-center">Members</h2>
        </div>
        <div class="row">

            <div class="table-search-v2">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>User Image</th>
                            <th class="hidden-sm">About</th>
                            <th>Status</th>
                            <th>Contacts</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr>
                                <td>
                                    <img class="rounded-x" src="{!! route('files.render', ['path' => $member->avatar->path]) !!}" alt="Member Avatar">
                                </td>
                                <td class="td-width">
                                    <h3><a href="#">Sed nec elit arcu</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus.
                                        Fusce
                                        non malesuada ante. Donec vel arcu.</p>
                                    <small class="hex">Joined February 28, 2014</small>
                                </td>
                                <td>
                                    <span class="label label-success">Success</span>
                                </td>
                                <td>
                                    <ul class="list-inline s-icons">
                                        <li>
                                            <a data-placement="top" data-toggle="tooltip" class="tooltips"
                                               data-original-title="Facebook" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-placement="top" data-toggle="tooltip" class="tooltips"
                                               data-original-title="Twitter" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-placement="top" data-toggle="tooltip" class="tooltips"
                                               data-original-title="Dropbox" href="#">
                                                <i class="fa fa-dropbox"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-placement="top" data-toggle="tooltip" class="tooltips"
                                               data-original-title="Linkedin" href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <span><a href="#">info@example.com</a></span>
                                    <span><a href="#">www.htmlstream.com</a></span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div><!--/end row-->

        <hr>

    </div>

    <div class="margin-bottom-40"></div>
    </div>
@endsection
@section('js-files')
    <script type="text/javascript" src="{!! elixir('js/industries/work-groups/show.min.js') !!}"></script>
@endsection
