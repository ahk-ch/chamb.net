@if ($breadcrumbs)
    <ul class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$breadcrumb->last)
                <li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
            @else
                <li class="active">{{{ $breadcrumb->title }}}</li>
            @endif
        @endforeach
    </ul>

    <div class="breadcrumbs"><!--=== Breadcrumbs ===-->

        <div class="container">

            @foreach ($breadcrumbs as $breadcrumb)
                @if (!$breadcrumb->last)
                    <h1 class="pull-left">{{{ $breadcrumb->title }}}</h1>
                @endif

                <ul class="pull-right breadcrumb">
                    @if (!$breadcrumb->last)
                        <li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
                    @else
                        <li class="active">{{{ $breadcrumb->title }}}</li>
                    @endif
                </ul>
            @endforeach
        </div><!--/container-->

    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->
@endif
