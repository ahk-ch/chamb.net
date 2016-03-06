@extends('ahk.layouts.master')
@section('title', trans('ahk.info'))
@section('inline-css')
    {{--<link href='{!! url("assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css") !!}' rel='stylesheet' type='text/css'/>--}}
    {{--<link href='{!! url("assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css") !!}' rel='stylesheet' type='text/css'/>--}}
    {{--<link href='{!! url("assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css") !!}' rel='stylesheet' type='text/css'/>--}}
    {{--<link href='{!! url("assets/css/pages/page_search.css") !!}' rel='stylesheet' type='text/css'/>--}}
@endsection
@section('header_links')
    @include('ahk._partials.header_industries_links')
@endsection
@section('content')
    <div class="container content-sm">
        <div class="text-center margin-bottom-50">
            <h2 class="title-v2 title-center">{!! trans('ahk_health_info.chambers_services_title') !!}</h2>
            <p class="space-lg-hor">{!! trans('ahk_health_info.chambers_services_content') !!}</p>
        </div>

        <div class="row content-boxes-v4 content-boxes-v4-sm margin-bottom-30">
            <div class="col-md-4 md-margin-bottom-40">
                <i class="pull-left icon-directions"></i>
                <div class="content-boxes-in-v4">
                    <h2>{!! trans('ahk_health_info.market_studies_profiles_title') !!}</h2>
                    <p>{!! trans('ahk_health_info.market_studies_profiles_content') !!}</p>
                </div>
            </div>
            <div class="col-md-4 md-margin-bottom-40">
                <i class="pull-left icon-handbag"></i>
                <div class="content-boxes-in-v4">
                    <h2>{!! trans('ahk_health_info.market_entry_support_address_research_title') !!}</h2>
                    <p>{!! trans('ahk_health_info.market_entry_support_address_research_content') !!}</p>
                </div>
            </div>
            <div class="col-md-4">
                <i class="pull-left icon-chemistry"></i>
                <div class="content-boxes-in-v4">
                    <h2>{!! trans('ahk_health_info.interpreting_and_translating_title') !!}</h2>
                    <p>{!! trans('ahk_health_info.interpreting_and_translating_content') !!}</p>
                </div>
            </div>
        </div>
        <hr>

        <div class="row content-boxes-v4 content-boxes-v4-sm margin-bottom-30">
            <div class="col-md-4 md-margin-bottom-40">
                <i class="pull-left icon-info margin-right-10"></i>
                <div class="content-boxes-in-v4">
                    <h2>{!! trans('ahk_health_info.legal_counseling_title') !!}</h2>
                    <p>{!! trans('ahk_health_info.legal_counseling_content') !!}</p>
                </div>
            </div>
            <div class="col-md-4 md-margin-bottom-40">
                <i class="pull-left icon-social-youtube margin-right-10"></i>
                <div class="content-boxes-in-v4">
                    <h2>{!! trans('ahk_health_info.mediation_arbitration_debt_collection_title') !!}</h2>
                    <p>{!! trans('ahk_health_info.mediation_arbitration_debt_collection_content') !!}</p>
                </div>
            </div>
            <div class="col-md-4">
                <i class="pull-left icon-fire margin-right-10"></i>
                <div class="content-boxes-in-v4">
                    <h2>{!! trans('ahk_health_info.website_creation_title') !!}</h2>
                    <p>{!! trans('ahk_health_info.website_creation_content') !!}</p>
                </div>
            </div>
        </div>

        <hr>

        <div class="row content-boxes-v4 content-boxes-v4-sm margin-bottom-30">
            <div class="col-md-4">
                <i class="pull-left icon-fire margin-right-10"></i>
                <div class="content-boxes-in-v4">
                    <h2>{!! trans('ahk_health_info.recruitment_title') !!}</h2>
                    <p>{!! trans('ahk_health_info.recruitment_content') !!}</p>
                </div>
            </div>
        </div>

    </div>
    <!--=== End Service Blocks ===-->

    <!--=== Parallax Counter ===-->
    <div class="parallax-counter-v2 parallaxBg1" style="background-position: 50% -17px;">
        <div class="container">
            <ul class="row list-row">
                <li class="col-md-4 col-sm-6 col-xs-12 md-margin-bottom-30">
                    <div class="counters rounded">
                        <span class="counter">18298</span>
                        <h4 class="font-normal">Chamber Members</h4>
                    </div>
                </li>
                <li class="col-md-4 col-sm-6 col-xs-12 md-margin-bottom-30">
                    <div class="counters rounded">
                        <span class="counter">24583</span>
                        <h4 class="font-normal">Site Users</h4>
                    </div>
                </li>
                <li class="col-md-4 col-sm-6 col-xs-12 sm-margin-bottom-30">
                    <div class="counters rounded">
                        <span class="counter">37904</span>
                        <h4 class="font-normal">Team behind the Site</h4>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--=== End Parallax Counter ===-->

    <!--=== Cube Portfolio ===-->
    <div class="container content-sm">
        <div class="text-center margin-bottom-30">
            <h2 class="title-v2 title-center">Team</h2>
        </div>

        <div class="cube-portfolio container margin-bottom-20">

            <div id="grid-container" class="cbp-l-grid-gallery">
                <div class="cbp-item illustration web-design">
                    <a href="#" class="cbp-caption cbp-singlePageInline"
                            data-title="WhereTO App<br>by Tiberiu Neamu">
                        <div class="cbp-caption-defaultWrap">
                            {{--<img src="{!! url('img/portfolio/21.jpg') !!}" alt="">--}}
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">Zoi Baltzi</div>
                                    <div class="cbp-l-caption-desc">Role</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item web-design illustration">
                    <a href="#" class="cbp-caption cbp-singlePageInline"
                            data-title="iDevices<br>by Tiberiu Neamu">
                        <div class="cbp-caption-defaultWrap">
                            {{--<img src="{!! url('img/portfolio/22.jpg') !!}" alt="">--}}
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">Matthias Hoffmann</div>
                                    <div class="cbp-l-caption-desc">Role</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item web-design graphic">
                    <a href="#" class="cbp-caption cbp-singlePageInline"
                            data-title="Seemple* Music for iPad<br>by Tiberiu Neamu">
                        <div class="cbp-caption-defaultWrap">
                            {{--<img src="{!! url('img/portfolio/24.jpg') !!}" alt="">--}}
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">Maria Papanastasiou</div>
                                    <div class="cbp-l-caption-desc">Role</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="cbp-item illustration web-design graphic">
                    <a href="#" class="cbp-caption cbp-singlePageInline"
                            data-title="Remind~Me Widget<br>by Tiberiu Neamu">
                        <div class="cbp-caption-defaultWrap">
                            {{--<img src="{!! url('img/portfolio/23.jpg') !!}" alt="">--}}
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title">Georgios Theodorakis</div>
                                    <div class="cbp-l-caption-desc">Role</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div><!--/end Grid Container-->
        </div>
    </div>
    <!--=== End Cube Portfolio ===-->
@endsection
@section('js-files')
    {{--<script type="text/javascript" src="{!! url('assets/plugins/counter/waypoints.min.js') !!}"></script>--}}
    {{--<script type="text/javascript" src="{!! url('assets/plugins/counter/jquery.counterup.min.js') !!}"></script>--}}
    {{--<script type="text/javascript" src="{!! url('assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js') !!}"></script>--}}
    {{--<script type="text/javascript" src="{!! elixir('js/ahk/health/info.min.js') !!}"></script>--}}
@endsection
