@extends('ahk.layouts.master')
@section('title', trans('ahk.community'))
@section('css-implementing-plugins')
    <link href='{!! url("assets/plugins/image-hover/css/img-hover.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('css-page-style')
    <link href='{!! url("assets/css/pages/page_job.css") !!}' rel='stylesheet' type='text/css'/>
@endsection
@section('inline-styles')
    <style>
        .job-img {
            background: url("{!! url('img/community/background.jpg') !!}") 100% 50% no-repeat;
        }
    </style>
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

    <!--=== Content Part ===-->
    <div class="container content">
        <!-- Job Content -->
        <div class="headline"><h2>Company Categories</h2></div>
        <div class="row job-content">
            <div class="col-md-3 col-sm-3 md-margin-bottom-40">
                <h3 class="heading-md"><strong>Accounting &amp; Finance</strong></h3>
                <ul class="list-unstyled categories">
                    <li><a href="#">Accounting</a>
                        <small class="hex">(342 jobs)</small>
                    </li>
                    <li><a href="#">Admin &amp; Clerical</a>
                        <small class="hex">(143 jobs)</small>
                    </li>
                    <li><a href="#">Banking &amp; Finance</a>
                        <small class="hex">(66 jobs)</small>
                    </li>
                    <li><a href="#">Contract &amp; Freelance</a>
                        <small class="hex">(12 jobs)</small>
                    </li>
                    <li><a href="#">Business Development</a>
                        <small class="hex">(212 jobs)</small>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 md-margin-bottom-40">
                <h3 class="heading-md"><strong>Medicla &amp; Health</strong></h3>
                <ul class="list-unstyled categories">
                    <li><a href="#">Nurse</a>
                        <small class="hex">(546 jobs)</small>
                    </li>
                    <li><a href="#">Health Care</a>
                        <small class="hex">(82 jobs)</small>
                    </li>
                    <li><a href="#">General Labor</a>
                        <small class="hex">(11 jobs)</small>
                    </li>
                    <li><a href="#">Pharmaceutical</a>
                        <small class="hex">(109 jobs)</small>
                    </li>
                    <li><a href="#">Human Resources</a>
                        <small class="hex">(401 jobs)</small>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 md-margin-bottom-40">
                <h3 class="heading-md"><strong>Web Development</strong></h3>
                <ul class="list-unstyled categories">
                    <li><a href="#">Ecommerce</a>
                        <small class="hex">(958 jobs)</small>
                    </li>
                    <li><a href="#">Web Design</a>
                        <small class="hex">(576 jobs)</small>
                    </li>
                    <li><a href="#">Web Programming</a>
                        <small class="hex">(543 jobs)</small>
                    </li>
                    <li><a href="#">Other - Web Development</a>
                        <small class="hex">(67 jobs)</small>
                    </li>
                    <li><a href="#">Website Project Management</a>
                        <small class="hex">(45 jobs)</small>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3">
                <h3 class="heading-md"><strong>Sales &amp; Marketing</strong></h3>
                <ul class="list-unstyled categories">
                    <li><a href="#">Advertising</a>
                        <small class="hex">(123 jobs)</small>
                    </li>
                    <li><a href="#">Email Marketing</a>
                        <small class="hex">(544 jobs)</small>
                    </li>
                    <li><a href="#">Telemarketing &amp; Telesales</a>
                        <small class="hex">(564 jobs)</small>
                    </li>
                    <li><a href="#">Market Research &amp; Surveys</a>
                        <small class="hex">(345 jobs)</small>
                    </li>
                    <li><a href="#">SEM - Search Engine Marketing</a>
                        <small class="hex">(32 jobs)</small>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Job Content -->

    </div>
    <!--=== End Content Part ===-->

    <!--=== Job Team ===-->
    <div class="parallax-team parallaxBg">
        <div class="container content">
            <div class="title-box-v2">
                <h2>Popular <span class="color-green">Companies</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <div class="row">
                <!-- Team v2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-v2">
                        <img class="img-responsive" src="assets/img/team/img1-md.jpg" alt=""/>
                        <div class="inner-team">
                            <h3>Jack Anderson</h3>
                            <small class="color-green">CEO, Chief Officer</small>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                            <hr>
                            <ul class="list-inline team-social">
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="fb tooltips" data-original-title="Facebook" href="#">
                                        <i class="fa fa-facebook"></i> </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="tw tooltips" data-original-title="Twitter" href="#">
                                        <i class="fa fa-twitter"></i> </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="gp tooltips" data-original-title="Google plus" href="#">
                                        <i class="fa fa-google-plus"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Team v2 -->

                <!-- Team v2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-v2">
                        <img class="img-responsive" src="assets/img/team/img2-md.jpg" alt=""/>
                        <div class="inner-team">
                            <h3>Kate Metus</h3>
                            <small class="color-green">Project Manager</small>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                            <hr>
                            <ul class="list-inline team-social">
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="fb tooltips" data-original-title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="tw tooltips" data-original-title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="gp tooltips" data-original-title="Google plus" href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Team v2 -->

                <!-- Team v2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-v2">
                        <img class="img-responsive" src="assets/img/team/img3-md.jpg" alt=""/>
                        <div class="inner-team">
                            <h3>Porta Gravida</h3>
                            <small class="color-green">VP of Operations</small>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                            <hr>
                            <ul class="list-inline team-social">
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="fb tooltips" data-original-title="Facebook" href="#">
                                        <i class="fa fa-facebook"></i> </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="tw tooltips" data-original-title="Twitter" href="#">
                                        <i class="fa fa-twitter"></i> </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="gp tooltips" data-original-title="Google plus" href="#">
                                        <i class="fa fa-google-plus"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Team v2 -->

                <!-- Team v2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-v2">
                        <img class="img-responsive" src="assets/img/team/img5-md.jpg" alt=""/>
                        <div class="inner-team">
                            <h3>Donec Elisson</h3>
                            <small class="color-green">Director, R &amp; D Talent</small>
                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
                            <hr>
                            <ul class="list-inline team-social">
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="fb tooltips" data-original-title="Facebook" href="#">
                                        <i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="tw tooltips" data-original-title="Twitter" href="#">
                                        <i class="fa fa-twitter"></i> </a>
                                </li>
                                <li>
                                    <a data-placement="top" data-toggle="tooltip" class="gp tooltips" data-original-title="Google plus" href="#">
                                        <i class="fa fa-google-plus"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Team v2 -->
            </div>
        </div>
    </div>
    <!--=== End Job Team ===-->


@endsection
@section('js-implementing-plugins')
@endsection
@section('js-inline')
    <script type="text/javascript" src="{!! url('assets/plugins/image-hover/js/touch.js') !!}"></script>
@endsection
@section('js-page-level')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            App.initParallaxBg();
        });
    </script>
@endsection

