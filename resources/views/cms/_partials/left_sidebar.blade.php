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
                <a href="#"> <i class="fa fa-dashboard"></i> <span>{!! trans('cms.dashboard') !!}</span>
                    <i class="fa fa-angle-left pull-right"></i> </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Demo</a></li>
                </ul>
            </li>
            <li class="treeview {!! activate(['cms.users.subscribers', 'cms.users.administrators']) !!}">
                <a href="#"> <i class="fa fa-users"></i> <span>{!! trans('cms.users') !!}</span>
                    <i class="fa fa-angle-left pull-right"></i> </a>
                <ul class="treeview-menu">
                    <li class="{!! activate(['cms.users.subscribers']) !!}">
                        <a href="{!! route('cms.users.subscribers') !!}"><i class="fa fa-users"></i> {!! trans('cms.subscribers') !!}
                        </a>
                    </li>
                    <li class="{!! activate(['cms.users.administrators']) !!}">
                        <a href="{!! route('cms.users.administrators') !!}"><i class="fa fa-users"></i> {!! trans('cms.administrators') !!}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {!! activate([
                'cms.articles.published', 'cms.articles.unpublished','cms.articles.create', 'cms.articles.edit',
                'cms.articles.categories.index', 'cms.articles.categories.create', 'cms.articles.categories.edit',
                 'cms.articles.tags.index', 'cms.articles.tags.create', 'cms.articles.tags.edit']) !!}">
                <a href="#"> <i class="fa fa-newspaper-o"></i> <span>{!! trans('cms.articles') !!}</span>
                    <i class="fa fa-angle-left pull-right"></i> </a>
                <ul class="treeview-menu">
                    <li class="{!! activate(['cms.articles.published']) !!}">
                        <a href="{!! route('cms.articles.published') !!}"><i class="fa fa-list"></i> {!! trans('cms.published') !!}
                        </a>
                    </li>
                    <li class="{!! activate(['cms.articles.unpublished']) !!}">
                        <a href="{!! route('cms.articles.unpublished') !!}"><i class="fa fa-archive"></i> {!! trans('cms.unpublished') !!}
                        </a>
                    </li>
                    <li class="{!! activate(['cms.articles.create']) !!}">
                        <a href="{!! route('cms.articles.create') !!}"><i class="fa fa-plus"></i> {!! trans('cms.create') !!}
                        </a>
                    </li>
                    <li class="{!! activate(['cms.articles.categories.index', 'cms.articles.categories.create',
                    'cms.articles.categories.edit']) !!}">
                        <a href="{!! route('cms.articles.categories.index') !!}"><i class="fa fa-puzzle-piece"></i> {!! trans('cms.categories') !!}
                        </a>
                    </li>
                    <li class="{!! activate(['cms.articles.tags.index', 'cms.articles.tags.create',
                    'cms.articles.tags.edit']) !!}">
                        <a href="{!! route('cms.articles.tags.index') !!}"><i class="fa fa-tags"></i> {!! trans('cms.tags') !!}
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

