<div class="header">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="{!! route('home_path') !!}">
            {{--<img src="{!! url('assets/img/logo1-default.png') !!}" alt="Logo"> </a>--}}
        <img src="{!! url('img/logo.png') !!}" alt="Logo"> </a>
        <!-- End Logo -->

        <!-- Topbar -->
        <div class="topbar">
            <ul class="loginbar pull-right">
                <li class="hoverSelector">
                    <i class="fa fa-globe"></i> <a>Languages</a>
                    <ul class="languages hoverSelectorBlock">
                        <li class="{!! $locale !== 'en' ?: 'active' !!}">
                            <a href="{!! route('set_language', ['lang' => 'en']) !!}"> English {!! $locale !== 'en' ? '': '<i class="fa fa-check"></i>'!!}</a>
                        </li>
                        <li class="{!! $locale !== 'gr' ?: 'active' !!}">
                            <a href="{!! route('set_language', ['lang' => 'gr']) !!}"> Greek {!! $locale !== 'gr' ? '' : '<i class="fa fa-check"></i>'!!}</a>
                        </li>
                        <li class="{!! $locale !== 'de' ?: 'active' !!}">
                            <a href="{!! route('set_language', ['lang' => 'de']) !!}"> German {!! $locale !== 'de' ? '': '<i class="fa fa-check"></i>'!!}</a>
                        </li>
                    </ul>
                </li>
                <li class="topbar-devider"></li>
                @if( ! Auth::check())
                    <li class="cd-log_reg">
                        <a class="cd-signin" href="javascript:void(0);">{!! trans('ahk.login') !!}</a>
                    </li>
                @else
                    <li class="hoverSelector">
                        <i class="fa fa-user"></i> <a>{!! $user->username !!}</a>
                        <ul class="languages hoverSelectorBlock">
                            <li>
                                {!! Form::open(['route' => 'sessions.destroy', 'role' => 'form', 'method' => 'DELETE']) !!}
                                <button type="submit" class="btn btn-link">{!! trans('ahk.logout') !!}</button>
                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!-- End Topbar -->

        <!-- Toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">{!! trans('ahk.toggle_navigation') !!}</span> <span class="fa fa-bars"></span>
        </button>
        <!-- End Toggle -->
    </div><!--/end container-->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
        <div class="container">
            <ul class="nav navbar-nav">
                <!-- Home -->
                <li class="{!! activate(['home_path']) !!}">
                    <a href="{!! route('home_path') !!}"> {!! trans('ahk.home') !!} </a>
                </li>
                <!-- End Home -->

                <!-- Pages -->
                <li class="dropdown {!! activate(['health.info', 'health_news']) !!}">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"> {!! trans('ahk.health') !!} </a>
                    <ul class="dropdown-menu">
                        <li class="{!! activate(['health.info']) !!}">
                            <a href="{!! route('health.info') !!}">{!! trans('ahk.info') !!}</a>
                        </li>
                        <li class="{!! activate(['health.news']) !!}">
                            <a href="{!! route('health.news') !!}">{!! trans('ahk.news') !!}</a>
                        </li>
                    </ul>

                </li>
                <!-- End Pages -->

                <!-- Companies -->
                <li class="{!! activate(['companies_path']) !!}">
                    <a href="{!! route('companies_path') !!}"> {!! trans('ahk.companies') !!} </a>
                </li>
                <!-- End Companies -->

                <!-- About -->
                <li class="{!! activate(['about_path']) !!}">
                    <a href="{!! route('about_path') !!}"> {!! trans('ahk.about') !!} </a>
                </li>
                <!-- End About -->

                <!-- Search Block -->
                <li>
                    <i class="search fa fa-search search-btn"></i>
                    <div class="search-open">
                        <div class="input-group animated fadeInDown">
                            <input type="text" class="form-control" placeholder="{!! trans('ahk.search') !!}">
                                <span class="input-group-btn">
                                    <button class="btn-u" type="button">{!! trans('ahk.go') !!}</button>
                                </span>
                        </div>
                    </div>
                </li>
                <!-- End Search Block -->
            </ul>
        </div><!--/end container-->
    </div><!--/navbar-collapse-->
</div>
<!--=== End Header ===-->
