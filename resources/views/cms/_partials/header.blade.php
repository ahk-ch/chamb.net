<header class="main-header">
    <!-- Logo -->
    <a href="{!! route('cms.dashboard') !!}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>C</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Cms</b>Chamber</span> </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{!! trans('cms.toggle_navigation') !!}</span> <span class="icon-bar"></span>
            <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{!! $user->avatar_url !!}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{!! $user->name or $user->username !!}</span> </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{!! url('vendor/AdminLTE/dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">
                            <p>
                                {!! $user->username !!}
                                <small>Member since {!! $user->created_at !!}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                {!! Form::open(['route' => 'cms.sessions.destroy', 'role' => 'form', 'method' => 'DELETE']) !!}
                                <button type="submit" class="btn btn-default btn-flat">{!! trans('ahk.logout') !!}</button>
                                {!! Form::close() !!}
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->

                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

