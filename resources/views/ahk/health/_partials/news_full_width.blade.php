<div class="{!! $index % 2 ? 'bg-color-light' : '' !!} container content-md">
    <div class="row">
        <div class="col-sm-5 sm-margin-bottom-20">
            <img class="img-responsive" src="{!! $articles->get($index)->img_url !!}" alt="">
        </div>
        <div class="col-sm-7 news-v3">
            <div class="news-v3-in-sm no-padding">
                <ul class="list-inline posted-info">
                    <li>By {!! $articles->get($index)->author->name or  $articles->get($index)->username!!}</li>
                    <li>In <a href="#">{!! $articles->get($index)->category->name !!}</a></li>
                    <li>{!! $articles->get($index)->created_at->format('M d, Y') !!}</li>
                </ul>
                <h2><a href="#">{!! $articles->get($index)->title !!}</a></h2>
                <p>{!! $articles->get($index)->description !!}</p>
                <ul class="post-shares">
                    <li>
                        <a href="#"> <i class="rounded-x icon-speech"></i> <span>5</span> </a>
                    </li>
                    <li>
                        <a href="#"> <i class="rounded-x icon-share"></i> <span>9</span> </a>
                    </li>
                    <li>
                        <a href="#"> <i class="rounded-x icon-heart"></i> <span>0</span> </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

