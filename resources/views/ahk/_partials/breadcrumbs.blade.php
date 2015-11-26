@if ($breadcrumbs)
    <div class="breadcrumbs"><!--=== Breadcrumbs ===-->
        <div class="container">
            <h1 class="pull-left">{{{ end($breadcrumbs)->title }}}</h1>
            <ul class="pull-right breadcrumb">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!$breadcrumb->last)
                        <li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
                    @else
                        <li class="active">{{{ $breadcrumb->title }}}</li>
                    @endif
                @endforeach
            </ul>
        </div><!--/container-->

    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->
@endif
