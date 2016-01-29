<!-- Home -->
<li class="{!! activate(['home_path']) !!}">
    <a href="{!! route('home_path') !!}"> {!! trans('ahk.home') !!} </a>
</li>
<!-- End Home -->

<!-- Pages -->
<li class="dropdown {!! activate(['health.events', 'health.news']) !!}">
    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"> {!! trans('ahk.industries') !!} </a>
    <ul class="dropdown-menu">
        <li class="{!! activate(['health.info']) !!}">
            <a href="{!! route('health.info') !!}">{!! trans('ahk.health') !!}</a>
        </li>
        <li>
            <a href="#">{!! trans('ahk.logistics') !!}</a>
        </li>
        <li>
            <a href="#">{!! trans('ahk.energy') !!}</a>
        </li>
        <li>
            <a href="#">{!! trans('ahk.trade') !!}</a>
        </li>
        <li>
            <a href="#">{!! trans('ahk.law') !!}</a>
        </li>
    </ul>
</li>
<!-- End Pages -->

<!-- About -->
<li class="{!! activate(['about_path']) !!}">
    <a href="{!! route('about_path') !!}"> {!! trans('ahk.about') !!} </a>
</li>
<!-- End About -->

