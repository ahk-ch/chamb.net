<div class="{!! $index % 2 ? 'bg-color-light' : '' !!} content-md">
    <div class="row">
        <div class="col-sm-5 sm-margin-bottom-20">
            <img class="img-responsive" src="{!! route('files.render', ['path' => $article->thumbnail->path]) !!}"
                 alt="Article Thumbnail">
        </div>
        <div class="col-sm-7 news-v3">
            <div class="news-v3-in-sm no-padding">
                <ul class="list-inline posted-info">
                    <li>By {!! $article->author->name or  $article->username!!}</li>
                    <li>In <a href="#">{!! $article->industry->name !!}</a></li>
                    <li>{!! $article->created_at->format('M d, Y') !!}</li>
                </ul>
                <h2>
                    <a id="url-{!! $article->slug !!}" href="{!! route('industries.articles.show',
                            ['industry_slug' => $article->industry->slug,'article_slug' => $article->slug]) !!}">
                        {!! $article->title !!}</a></h2>
                <p>{!! $article->description !!}</p>
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

