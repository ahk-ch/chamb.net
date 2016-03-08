@extends('ahk.layouts.master')
@section('title', "{$company->name} - {$industry->name}")
@section('inline-css')
@endsection
@section('header_links')
    @include('ahk._partials.header_default_links')
@endsection
@section('content')
    <div class="container content profile">
        <div class="row">
            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">
                <img class="img-responsive profile-img margin-bottom-20"
                     src="{!! route('files.render', ['path' => $company->logo->path]) !!}" alt="">

                <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                    <li class="list-group-item active">
                        <a href="#"><i class="fa fa-user"></i> {!! trans('ahk.profile') !!}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"><i class="fa fa-users"></i> {!! trans('ahk.work_groups.index') !!}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"><i class="fa fa-file-image-o"></i> {!! trans('ahk.pictures') !!}
                        </a>
                    </li>
                </ul>

                <div class="panel-heading-v2 overflow-h">
                    <h2 class="heading-xs pull-left">
                        <i class="fa fa-language"></i> {!! trans('ahk.language_skills') !!}</h2>
                    <a href="#"></a>
                </div>
                <h3 class="heading-xs">English <span class="pull-right">100%</span></h3>
                <div class="progress progress-u progress-xxs">
                    <div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar"
                         class="progress-bar progress-bar-u">
                    </div>
                </div>
                <h3 class="heading-xs">German <span class="pull-right">100%</span></h3>
                <div class="progress progress-u progress-xxs">
                    <div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="85" role="progressbar"
                         class="progress-bar progress-bar-blue">
                    </div>
                </div>
                <h3 class="heading-xs">Greek <span class="pull-right">100%</span></h3>
                <div class="progress progress-u progress-xxs margin-bottom-40">
                    <div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="64" role="progressbar"
                         class="progress-bar progress-bar-dark">
                    </div>
                </div>

                <hr>

                <!--Notification-->
                <div class="panel-heading-v2 overflow-h">
                    <h2 class="heading-xs pull-left"><i class="fa fa-bell-o"></i> {!! trans('ahk.notifications') !!}
                    </h2>
                </div>
                <ul class="list-unstyled mCustomScrollbar margin-bottom-20" data-mcs-theme="minimal-dark">
                    <li class="notification">
                        <i class="icon-custom icon-sm rounded-x icon-bg-red icon-line icon-envelope"></i>
                        <div class="overflow-h">
                            <span><strong>Albert Heller</strong> has sent you email.</span>
                            <small>Two minutes ago</small>
                        </div>
                    </li>
                    <li class="notification">
                        <i class="icon-custom icon-sm rounded-x icon-bg-yellow icon-line fa fa-bolt"></i>
                        <div class="overflow-h">
                            <span><strong>Natasha Kolnikova</strong> accepted your invitation.</span>
                            <small>Yesterday 1:07 pm</small>
                        </div>
                    </li>

                    <li class="notification">
                        <i class="icon-custom icon-sm rounded-x icon-bg-blue icon-line fa fa-comments"></i>
                        <div class="overflow-h">
                            <span><strong>Bruno Js.</strong> added you to group chating.</span>
                            <small>Yesterday 1:07 pm</small>
                        </div>
                    </li>
                    <li class="notification">
                        <i class="icon-custom icon-sm rounded-x icon-bg-yellow icon-line fa fa-bolt"></i>
                        <div class="overflow-h">
                            <span><strong>Natasha Kolnikova</strong> accepted your invitation.</span>
                            <small>Yesterday 1:07 pm</small>
                        </div>
                    </li>
                </ul>
                <button type="button"
                        class="btn-u btn-u-default btn-u-sm btn-block">{!! trans('ahk.load_more') !!}</button>
                <!--End Notification-->

                <div class="margin-bottom-50"></div>

                <!--Datepicker-->
                <form action="#" id="sky-form2" class="sky-form">
                    <div id="inline-start"></div>
                </form>
                <!--End Datepicker-->
            </div>
            <!--End Left Sidebar-->

            <!-- Profile Content -->
            <div class="col-md-9">
                <div class="profile-body">
                    <div class="profile-bio">
                        <div class="row">
                            <div class="col-md-5">
                                <img class="img-responsive md-margin-bottom-10"
                                     src="{!! route('files.render', ['path' => $company->logo->path]) !!}" alt="">
                            </div>
                            <div class="col-md-7">
                                <h2>{!! $company->name !!}</h2>
                                <span><strong>{!! trans('ahk.country') . ":"!!}
                                    </strong> {{ $company->country->name }}</span>
                                <span><strong>{!! trans('ahk.business_leader') . ":"!!}
                                    </strong> {{ $company->business_leader }}</span>
                                <hr>
                                <p>{{ $company->description }}</p>
                            </div>
                        </div>
                    </div><!--/end row-->

                    <hr>

                    <!-- Servics offered/required -->
                    <div class="row margin-bottom-20">
                        <div class="col-sm-6">
                            <div class="panel panel-profile no-bg">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left">
                                        <i class="fa fa-pencil"></i> {!! trans('ahk.what_are_we_looking_for') !!}</h2>
                                </div>
                                <div id="scrollbar" class="panel-body no-padding mCustomScrollbar"
                                     data-mcs-theme="minimal-dark">

                                    @foreach($company->requiresServices as $key => $service)
                                        <div class="profile-post {!! $service->color !!}">
                                            <span class="profile-post-numb">{!! sprintf("%02d", $key + 1) !!}</span>
                                            <div class="profile-post-in">
                                                <h3 class="heading-xs"><a href="#">{!! $service->name !!}</a></h3>
                                                <p>Optional description of this service</p>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="panel panel-profile no-bg">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left">
                                        <i class="fa fa-lightbulb-o"></i> {!! trans('ahk.what_we_can_offer') !!}</h2>
                                </div>
                                <div id="scrollbar" class="panel-body no-padding mCustomScrollbar"
                                     data-mcs-theme="minimal-dark">

                                    @foreach($company->offersServices as $key => $service)
                                        <div class="profile-post {!! $service->color !!}">
                                            <span class="profile-post-numb">{!! sprintf("%02d", $key + 1) !!}</span>
                                            <div class="profile-post-in">
                                                <h3 class="heading-xs"><a href="#">{!! $service->name !!}</a></h3>
                                                <p>Optional description of this service</p>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div><!--/end row-->

                    <hr>


                    <div class="row">
                        <!--Social Contacts v2-->
                        <div class="col-sm-4">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left">
                                        <i class="fa fa-lightbulb-o"></i> {!! trans('ahk.contact_information') !!}</h2>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled who margin-bottom-30">
                                        <li><a href="#"><i class="fa fa-home"></i>5B Streat, City 50987 New Town US</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-envelope"></i>info@example.com</a></li>
                                        <li><a href="#"><i class="fa fa-phone"></i>1(222) 5x86 x97x</a></li>
                                        <li><a href="#"><i class="fa fa-globe"></i>http://www.example.com</a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <!--End Social Contacts v2-->

                        <div class="col-sm-8">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left">
                                        <i class="fa fa-map-marker"></i> {!! trans('ahk.map') !!}</h2>
                                </div>
                                <div class="panel-body">
                                    <div id="map" class="map map-box"></div>
                                </div>
                            </div>
                        </div>
                    </div><!--/end row-->

                    <hr/>

                    <!--Timeline-->
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left">
                                <i class="fa fa-mortar-board"></i> Main Company Focus</h2>
                        </div>
                        <div class="panel-body">
                            <ul class="timeline-v2 timeline-me">
                                <li>
                                    <time datetime="" class="cbp_tmtime"><span>Bachelor of IT</span>
                                        <span>2003 - 2000</span></time>
                                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                    <div class="cbp_tmlabel">
                                        <h2>Harvard University</h2>
                                        <p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean
                                            cucumber watercress. Peasprouts wattle seed rutabaga okra yarrow cress
                                            avocado grape.</p>
                                    </div>
                                </li>
                                <li>
                                    <time datetime="" class="cbp_tmtime"><span>Web Design</span>
                                        <span>1997 - 2000</span>
                                    </time>
                                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                    <div class="cbp_tmlabel">
                                        <h2>Imperial College London</h2>
                                        <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper
                                            water spinach kombu courgette lettuce.</p>
                                    </div>
                                </li>
                                <li>
                                    <time datetime="" class="cbp_tmtime"><span>High School</span>
                                        <span>1988 - 1997</span>
                                    </time>
                                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                    <div class="cbp_tmlabel">
                                        <h2>Chicago High School</h2>
                                        <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper
                                            water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote
                                            radicchio shallot.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--End Timeline-->

                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div>
@endsection
@section('optimize-css-delivery')
    {!! Form::input('hidden', 'styleSheetUrls[]', elixir("css/industries/companies/show.min.css")) !!}
@endsection
@section('js-files')
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="{!! elixir('js/industries/companies/show.min.js') !!}"></script>
@endsection
