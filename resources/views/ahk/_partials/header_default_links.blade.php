<!-- Home -->
<li class="{!! $utilities->activate(['home_path']) !!}">
    <a href="{!! route('home_path') !!}"> {!! trans('ahk.home') !!} </a>
</li>
<!-- End Home -->

<!-- Pages -->
<li class="dropdown {!! $utilities->activate(['health.events', 'health.news']) !!}">
    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"> {!! trans('ahk.industries') !!} </a>
    <ul class="dropdown-menu">

        @foreach($industries as $industry)
            <li class="{!! $utilities->activate(['industries.info' => ['industry_slug' => $industry->slug]]) !!}">
                <a href="{!! route('industries.info', ['industry_slug' => $industry->slug]) !!}">{!! $industry->name !!}</a>
            </li>
        @endforeach

    </ul>
</li>
<!-- End Pages -->

<!-- About -->
<li class="{!! $utilities->activate(['about_path']) !!}">
    <a href="{!! route('about_path') !!}"> {!! trans('ahk.about') !!} </a>
</li>
<!-- End About -->

