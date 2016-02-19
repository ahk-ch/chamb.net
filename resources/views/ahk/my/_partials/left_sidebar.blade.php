<!--Left Sidebar-->
    <img class="img-responsive profile-img margin-bottom-20" src="{{ $user->avatar_url }}" alt="">

    <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
        <li class="list-group-item {!! activate(['my.profile']) !!}">
            <a href="{!! route('my.profile') !!}"><i class="fa fa-user"></i> {!! trans('ahk.profile') !!}</a>
        </li>
        <li class="list-group-item {!! activate(['my.companies.index', 'my.companies.edit']) !!}">
            <a href="{!! route('my.companies.index') !!}"><i class="fa fa-building"></i> {!! trans('ahk.my_companies') !!}</a>
        </li>
    </ul>

    <hr>

    <!--Notification-->
    <div class="panel-heading-v2 overflow-h">
        <h2 class="heading-xs pull-left"><i class="fa fa-bell-o"></i> {!! trans('ahk.notifications') !!}
        </h2>
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
