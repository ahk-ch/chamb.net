<div class="header-v6 header-classic-dark header-sticky">
    <!-- Navbar -->
    <div class="navbar mega-menu" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="menu-container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">{!! trans('ahk.toggle_navigation') !!}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Navbar Brand -->
                <div class="navbar-brand">
                    <a href="{!! route('home_path') !!}">
                        <img class="default-logo" src="{!! url('img/logo.png') !!}" alt="Logo">
                    </a>
                </div>
                <!-- ENd Navbar Brand -->

                <!-- Header Inner Right -->
                <div class="header-inner-right">
                    <ul class="menu-icons-list">
                        <li class="menu-icons">
                            <i class="menu-icons-style search search-close search-btn fa fa-search"></i>
                            <div class="search-open">
                                <input type="text" class="animated fadeIn form-control" placeholder="Start searching ...">
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- End Header Inner Right -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <div class="menu-container">
                    <ul class="nav navbar-nav">
                        <!-- Home -->
                        <li class="{!! activate(['home_path']) !!}">
                            <a href="{!! route('home_path') !!}"> {!! trans('ahk.home') !!} </a>
                        </li>
                        <!-- Pages -->
                        <li class="dropdown {!! activate(['health.info', 'health_news']) !!}">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"> {!! trans('ahk.health') !!} </a>
                            <ul class="dropdown-menu">
                                <li class="{!! activate(['health.info']) !!}">
                                    <a href="{!! route('health.info') !!}">{!! trans('ahk.info') !!}</a>
                                </li>
                                <li class="{!! activate(['health.news']) !!}">
                                    <a href="{!! route('health.news') !!}">News Full Width</a>
                                </li>
                                <li class="{!! activate(['health.news']) !!}">
                                    <a href="{!! route('health.news_v1') !!}">News Concise 1</a>
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
                    </ul>
                </div>
            </div><!--/navbar-collapse-->
        </div>
    </div>
    <!-- End Navbar -->
<!--/navbar-collapse-->
</div>
<!--=== End Header ===-->

