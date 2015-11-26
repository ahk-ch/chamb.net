<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! url('vendor/AdminLTE/dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{!! $user->name or $user->username !!}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#"> <i class="fa fa-dashboard"></i> <span>{!! trans('admin.dashboard') !!}</span>
                    <i class="fa fa-angle-left pull-right"></i> </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Demo</a></li>
                </ul>
            </li>
            <li class="treeview {!! activate(['admin.users.subscribers', 'admin.users.administrators']) !!}">
                <a href="#"> <i class="fa fa-users"></i> <span>{!! trans('admin.users') !!}</span>
                    <i class="fa fa-angle-left pull-right"></i> </a>
                <ul class="treeview-menu">
                    <li class="{!! activate(['admin.users.subscribers']) !!}">
                        <a href="{!! route('admin.users.subscribers') !!}"><i class="fa fa-users"></i> {!! trans('admin.subscribers') !!}
                        </a>
                    </li>
                    <li class="{!! activate(['admin.users.administrators']) !!}">
                        <a href="{!! route('admin.users.administrators') !!}"><i class="fa fa-users"></i> {!! trans('admin.administrators') !!}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {!! activate(['admin.articles.published', 'admin.articles.unpublished', 'admin.articles.create']) !!}">
                <a href="#"> <i class="fa fa-newspaper-o"></i> <span>{!! trans('admin.articles') !!}</span>
                    <i class="fa fa-angle-left pull-right"></i> </a>
                <ul class="treeview-menu">
                    <li class="{!! activate(['admin.articles.published']) !!}">
                        <a href="{!! route('admin.articles.published') !!}"><i class="fa fa-list"></i> {!! trans('admin.published') !!}
                        </a>
                    </li>
                    <li class="{!! activate(['admin.articles.unpublished']) !!}">
                        <a href="{!! route('admin.articles.unpublished') !!}"><i class="fa fa-archive"></i> {!! trans('admin.unpublished') !!}
                        </a>
                    </li>
                    <li class="{!! activate(['admin.articles.create']) !!}">
                        <a href="{!! route('admin.articles.create') !!}"><i class="fa fa-plus"></i> {!! trans('admin.create') !!}
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

