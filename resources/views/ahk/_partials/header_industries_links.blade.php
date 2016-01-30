<!-- Home -->
<li class="dropdown {!! activate(['home_path']) !!}">
    <a href="{!! route('home_path') !!}" class="dropdown-toggle disabled" data-toggle="dropdown"> {!! trans('ahk.home') !!} </a>
    <ul class="dropdown-menu">
        <li class="{!! activate(['']) !!}">
            <a href="#">{!! trans('ahk.health') !!}</a>
        </li>
        <li class="{!! activate(['']) !!}">
            <a href="#">{!! trans('ahk.logistics') !!}</a>
        </li>
        <li class="{!! activate(['']) !!}">
            <a href="#">{!! trans('ahk.energy') !!}</a>
        </li>
    </ul>
</li>
<!-- End Home -->

<!-- Pages -->
<li class="dropdown {!! activate(['health.events', 'health.news']) !!}">
    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"> {!! trans('ahk.health') !!} </a>
    <ul class="dropdown-menu">
        <li class="{!! activate(['health.news']) !!}">
            <a href="{!! route('health.news') !!}">{!! trans('ahk.news') !!}</a>
        </li>
        <li class="{!! activate(['health.info']) !!}">
            <a href="{!! route('health.info') !!}">{!! trans('ahk.info') !!}</a>
        </li>
        <li>
            <a href="#">{!! trans('ahk.events') !!}</a>
        </li>
        <li>
            <a href="#">{!! trans('ahk.links') !!}</a>
        </li>
        <li>
            <a href="#">{!! trans('ahk.downloads') !!}</a>
        </li>
    </ul>
</li>
<!-- End Pages -->

<!-- Companies -->
<li class="{!! activate(['working_groups']) !!}">
    <a href="{!! route('working_groups') !!}"> {!! trans('ahk.working_groups') !!} </a>
</li>
<!-- End Companies -->

<!-- Companies -->
<li class="{!! activate(['companies_path']) !!}">
    <a href="{!! route('companies_path') !!}"> {!! trans('ahk.community') !!} </a>
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
