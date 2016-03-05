<!--Left Sidebar-->
<img class="img-responsive profile-img margin-bottom-20"
        src="{!! route('files.render', ['path' => $user->avatar->path]) !!}" alt="">

<ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
    <li class="list-group-item {!$utilities->activate(['my.profile']) !!}">
        <a href="{!! route('my.profile') !!}"><i class="fa fa-user"></i> {!! trans('ahk.profile') !!}</a>
    </li>
    <li class="list-group-item {!$utilities->activate(['my.companies.index', 'my.companies.edit', 'my.companies.create']) !!}">
        <a href="{!! route('my.companies.index') !!}"><i class="fa fa-building"></i> {!! trans('ahk.my_companies') !!}
        </a>
    </li>
</ul>

<hr>

<!--Notification-->
<div class="margin-bottom-50"></div>

<!--Datepicker-->
<form action="#" id="sky-form2" class="sky-form">
    <div id="inline-start"></div>
</form>
<!--End Datepicker-->
