<div class="header header-sticky">
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
                    <li>
                        <a href="{!! route('auth.login') !!}">{!!  trans('ahk.login')  !!} </a>
                    </li>
                    <li class="topbar-devider"></li>
                    <li>
                        <a href="#">{!! trans('ahk.register') !!} </a>
                    </li>
                @else
                    <li class="hoverSelector">
                        <i class="fa fa-user"></i> <a>{!! $user->username !!}</a>
                        <ul class="languages hoverSelectorBlock">
                            <li>
                                {!! Form::open(['route' => 'auth.destroy', 'role' => 'form', 'method' => 'DELETE']) !!}
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

                @yield('header_links')

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

