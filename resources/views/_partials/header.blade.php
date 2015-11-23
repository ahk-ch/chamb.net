<!--=== Header ===-->
<div class="header">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="index.html"> <img src="{!! url('assets/img/logo1-default.png') !!}" alt="Logo"> </a>
        <!-- End Logo -->

        <!-- Topbar -->
        <div class="topbar">
            <ul class="loginbar pull-right">
                <li class="hoverSelector">
                    <i class="fa fa-globe"></i> <a>Languages</a>
                    <ul class="languages hoverSelectorBlock">
                        <li class="active">
                            <a href="#">English <i class="fa fa-check"></i></a>
                        </li>
                        <li><a href="#">Spanish</a></li>
                        <li><a href="#">Russian</a></li>
                        <li><a href="#">German</a></li>
                    </ul>
                </li>
                <li class="topbar-devider"></li>
                <li><a href="page_faq.html">Help</a></li>
                <li class="topbar-devider"></li>
                <li><a href="page_login.html">Login</a></li>
            </ul>
        </div>
        <!-- End Topbar -->

        <!-- Toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle navigation</span> <span class="fa fa-bars"></span>
        </button>
        <!-- End Toggle -->
    </div><!--/end container-->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
        <div class="container">
            <ul class="nav navbar-nav">
                <!-- Home -->
                <li class="{!! activate(['home_path']) !!}">
                    <a href="{!! route('home_path') !!}"> Home </a>
                </li>
                <!-- End Home -->

                <!-- Pages -->
                <li class="dropdown {!! activate(['health_info', 'health_news']) !!}">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"> Health </a>
                    <ul class="dropdown-menu">
                        <li class="{!! activate(['health_info']) !!}"><a href="{!! route('health_info') !!}">Info</a></li>
                        <li class="{!! activate(['health_news']) !!}"><a href="{!! route('health_news') !!}">News</a></li>
                    </ul>

                </li>
                <!-- End Pages -->

                <!-- Companies -->
                <li class="">
                    <a href="javascript:void(0);"> Companies </a>
                </li>
                <!-- End Companies -->

                <!-- About -->
                <li class="{!! activate(['about_path']) !!}">
                    <a href="{!! route('about_path') !!}"> About </a>
                </li>
                <!-- End About -->

                <!-- Search Block -->
                <li>
                    <i class="search fa fa-search search-btn"></i>
                    <div class="search-open">
                        <div class="input-group animated fadeInDown">
                            <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-btn">
                                    <button class="btn-u" type="button">Go</button>
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
