<li>
    <a href="{!! route('home_path') !!}"> {!! trans('ahk.home') !!} </a>
</li>

<!-- Pages -->
<li class="dropdown {!! $utilities->activate(['industries.info', 'industries.events', 'industries.news']) !!}">
    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"> {!! trans('ahk.health') !!} </a>
    <ul class="dropdown-menu">
        <li class="{!! $utilities->activate(['industries.info']) !!}">
            <a href="{!! route('industries.info', ['industry_slug' => $industry->slug]) !!}">
                {!! trans('ahk.info') !!}</a>
        </li>
        <li class="{!! $utilities->activate(['industries.articles.index']) !!}">
            <a href="{!! route('industries.articles.index', ['industry_slug' => $industry->slug]) !!}">
                {!! trans('ahk.news') !!}</a>
        </li>
        <li class="{!! $utilities->activate(['industries.events']) !!}">
            <a href="{!! route('industries.events', ['industry_slug' => $industry->slug]) !!}">
                {!! trans('ahk.events') !!}</a>
        </li>
        <li class="{!! $utilities->activate(['industries.links']) !!}">
            <a href="{!! route('industries.links', ['industry_slug' => $industry->slug]) !!}">
                {!! trans('ahk.links') !!}</a>
        </li>
        <li class="{!! $utilities->activate(['industries.downloads']) !!}">
            <a href="{!! route('industries.downloads', ['industry_slug' => $industry->slug]) !!}">
                {!! trans('ahk.downloads') !!}</a>
        </li>
    </ul>
</li>


<li class="{!! $utilities->activate(['industries.work_groups.index']) !!}">
    <a href="{!! route('industries.work_groups.index', ['industry_slug' => $industry->slug]) !!}">
        {!! trans('ahk.work_groups') !!} </a>
</li>

<!-- Companies -->
<li class="{!! $utilities->activate(['industries.companies.index']) !!}">
    <a href="{!! route('industries.companies.index', ['industry_slug' => $industry->slug]) !!}"> {!! trans('ahk.community') !!} </a>
</li>
<!-- End Companies -->
