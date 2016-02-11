@extends('ahk.layouts.master')
@section('title', 'Welcome')
@section('css-implementing-plugins')
    <link href='{!! url("assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('css-page-style')
    <link href='{!! url("assets/css/pages/profile.css") !!}' rel='stylesheet' type='text/css'/>
    <link href='{!! url("assets/css/pages/shortcode_timeline2.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('header_links')
    @include('ahk._partials.header_default_links')
@endsection
@section('content')
    <div class="container content profile">
        <div class="row">
            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">
                <img class="img-responsive profile-img margin-bottom-20" src="{{ $company->logo }}" alt="">

                <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                    <li class="list-group-item active">
                        <a href="page_profile_me.html"><i class="fa fa-user"></i> {!! trans('ahk.profile') !!}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_me.html"><i class="fa fa-users"></i> {!! trans('ahk.work_groups') !!}</a>
                    </li>
                    <li class="list-group-item">
                        <a href="page_profile_settings.html"><i class="fa fa-file-image-o"></i></i> {!! trans('ahk.pictures') !!}</a>
                    </li>
                </ul>

                <div class="panel-heading-v2 overflow-h">
                    <h2 class="heading-xs pull-left"><i class="fa fa-language"></i></i> {!! trans('ahk.language_skills') !!}</h2>
                    <a href="#"></a>
                </div>
                <h3 class="heading-xs">English <span class="pull-right">100%</span></h3>
                <div class="progress progress-u progress-xxs">
                    <div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">
                    </div>
                </div>
                <h3 class="heading-xs">German <span class="pull-right">100%</span></h3>
                <div class="progress progress-u progress-xxs">
                    <div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="85" role="progressbar" class="progress-bar progress-bar-blue">
                    </div>
                </div>
                <h3 class="heading-xs">Greek <span class="pull-right">100%</span></h3>
                <div class="progress progress-u progress-xxs margin-bottom-40">
                    <div style="width: 100%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="64" role="progressbar" class="progress-bar progress-bar-dark">
                    </div>
                </div>

                <hr>

                <!--Notification-->
                <div class="panel-heading-v2 overflow-h">
                    <h2 class="heading-xs pull-left"><i class="fa fa-bell-o"></i> {!! trans('ahk.notifications') !!}</h2>
                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
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
                <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">{!! trans('ahk.load_more') !!}</button>
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
                                <img class="img-responsive md-margin-bottom-10" src="{!! $company->logo !!}" alt="">
                            </div>
                            <div class="col-md-7">
                                <h2>{!! $company->name !!}</h2>
                                <span><strong>{!! trans('ahk.country') !!}:</strong> {{ $company->country->name }}</span>
                                <span><strong>{!! trans('ahk.business_leader') !!}:</strong> {{ $company->business_leader }}</span>
                                <hr>
                                <p>{{ $company->description }}</p>
                            </div>
                        </div>
                    </div><!--/end row-->

                    <hr>

                    <div class="row">
                        <!--Social Icons v3-->
                        <div class="col-sm-6 sm-margin-bottom-30">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> {!! trans('ahk.what_are_we_looking_for') !!}</h2>
                                    <a href="#"></a>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled social-contacts-v2">
                                        <li><i class="rounded-x tw fa fa-twitter"></i> <a href="#">edward.rooster</a></li>
                                        <li><i class="rounded-x fb fa fa-facebook"></i> <a href="#">Edward Rooster</a></li>
                                        <li><i class="rounded-x sk fa fa-skype"></i> <a href="#">edwardRooster77</a></li>
                                        <li><i class="rounded-x gp fa fa-google-plus"></i> <a href="#">rooster77edward</a></li>
                                        <li><i class="rounded-x gm fa fa-envelope"></i> <a href="#">edward77@gmail.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End Social Icons v3-->

                        <!--Skills-->
                        <div class="col-sm-6 sm-margin-bottom-30">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-lightbulb-o"></i> {!! trans('ahk.what_we_can_offer') !!}</h2>
                                    <a href="#"></a>
                                </div>
                                <div class="panel-body">
                                    <small>HTML/CSS</small>
                                    <small>92%</small>
                                    <div class="progress progress-u progress-xxs">
                                        <div style="width: 92%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="92" role="progressbar" class="progress-bar progress-bar-u">
                                        </div>
                                    </div>

                                    <small>Photoshop</small>
                                    <small>77%</small>
                                    <div class="progress progress-u progress-xxs">
                                        <div style="width: 77%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="77" role="progressbar" class="progress-bar progress-bar-u">
                                        </div>
                                    </div>

                                    <small>PHP</small>
                                    <small>85%</small>
                                    <div class="progress progress-u progress-xxs">
                                        <div style="width: 85%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="85" role="progressbar" class="progress-bar progress-bar-u">
                                        </div>
                                    </div>

                                    <small>Javascript</small>
                                    <small>81%</small>
                                    <div class="progress progress-u progress-xxs">
                                        <div style="width: 81%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="81" role="progressbar" class="progress-bar progress-bar-u">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Skills-->
                    </div><!--/end row-->

                    <hr>

                    <!--Timeline-->
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i> {!! trans('ahk.contact_information') !!}</h2>
                            <a href="#"></a>
                        </div>
                        <div class="panel-body margin-bottom-40">
                            <ul class="timeline-v2 timeline-me">
                                <li>
                                    <time datetime="" class="cbp_tmtime"><span>Mobile Design</span> <span>2012 - Current</span></time>
                                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                    <div class="cbp_tmlabel">
                                        <h2>BFC NYC Partners</h2>
                                        <p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Peasprouts wattle seed rutabaga okra yarrow cress avocado grape.</p>
                                    </div>
                                </li>
                                <li>
                                    <time datetime="" class="cbp_tmtime"><span>Web Designer</span> <span>2007 - 2012</span></time>
                                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                    <div class="cbp_tmlabel">
                                        <h2>Freelance</h2>
                                        <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce.</p>
                                    </div>
                                </li>
                                <li>
                                    <time datetime="" class="cbp_tmtime"><span>Photodesigner</span> <span>2003 - 2007</span></time>
                                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                    <div class="cbp_tmlabel">
                                        <h2>Toren Condo</h2>
                                        <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--End Timeline-->

                    <!--Timeline-->
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-mortar-board"></i> Education</h2>
                            <a href="#"><i class="fa fa-cog pull-right"></i></a>
                        </div>
                        <div class="panel-body">
                            <ul class="timeline-v2 timeline-me">
                                <li>
                                    <time datetime="" class="cbp_tmtime"><span>Bachelor of IT</span> <span>2003 - 2000</span></time>
                                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                    <div class="cbp_tmlabel">
                                        <h2>Harvard University</h2>
                                        <p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Peasprouts wattle seed rutabaga okra yarrow cress avocado grape.</p>
                                    </div>
                                </li>
                                <li>
                                    <time datetime="" class="cbp_tmtime"><span>Web Design</span> <span>1997 - 2000</span></time>
                                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                    <div class="cbp_tmlabel">
                                        <h2>Imperial College London</h2>
                                        <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce.</p>
                                    </div>
                                </li>
                                <li>
                                    <time datetime="" class="cbp_tmtime"><span>High School</span> <span>1988 - 1997</span></time>
                                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                    <div class="cbp_tmlabel">
                                        <h2>Chicago High School</h2>
                                        <p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--End Timeline-->

                    <hr>

                    <div class="row">
                        <!--Social Contacts v2-->
                        <div class="col-sm-6">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-lightbulb-o"></i> Social Contacts <small>(option 2)</small></h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled social-contacts-v3">
                                        <li><i class="rounded-x tw fa fa-twitter"></i> <a href="#">edward.rooster</a></li>
                                        <li><i class="rounded-x fb fa fa-facebook"></i> <a href="#">Edward Rooster</a></li>
                                        <li><i class="rounded-x sk fa fa-skype"></i> <a href="#">edwardRooster77</a></li>
                                        <li><i class="rounded-x gp fa fa-google-plus"></i> <a href="#">rooster77edward</a></li>
                                        <li><i class="rounded-x gm icon-envelope"></i> <a href="#">edward77@gmail.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End Social Contacts v2-->

                        <!--Design Skills-->
                        <div class="col-sm-6">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> Language Skills</h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="p-chart col-sm-6 col-xs-6 sm-margin-bottom-10">
                                            <div class="circle margin-bottom-20" id="circle-4"></div>
                                            <h3 class="heading-xs">Engagement Score</h3>
                                            <p>Celery coriander bitterleaf epazote radicchio shallot.</p>
                                        </div>
                                        <div class="p-chart col-sm-6 col-xs-6">
                                            <div class="circle margin-bottom-20" id="circle-5"></div>
                                            <h3 class="heading-xs">Progfile Completness</h3>
                                            <p>Celery coriander bitterleaf epazote radicchio shallot.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Design Skills-->
                    </div><!--/end row-->
                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div>
@endsection
@section('js-implementing-plugins')
    <script type="text/javascript" src='{!! url("assets/plugins/circles-master/circles.js") !!}'></script>
    <script type="text/javascript" src='{!! url("assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js") !!}'></script>
    <script type="text/javascript" src='{!! url("assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js") !!}'></script>
@endsection
@section('js-page-level')
    <script type="text/javascript" src='{!! url("assets/js/plugins/datepicker.js") !!}'></script>
    <script type="text/javascript" src='{!! url("assets/js/plugins/circles-master.js") !!}'></script>
@endsection
@section('js-inline')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.initScrollBar();
            Datepicker.initDatepicker();
            CirclesMaster.initCirclesMaster1();
        });
    </script>
@endsection
