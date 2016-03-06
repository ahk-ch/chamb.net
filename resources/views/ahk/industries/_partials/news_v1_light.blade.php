<div class="bg-color-light">
    <div class="container content-md">
        <div class="row news-v1">
            @foreach($articles as $article)
                <div class="col-md-4 md-margin-bottom-40">
                    <div class="news-v1-in">
                        <img class="img-responsive" src="{!! $article->img_url !!}" alt="Article Image">
                        <h3><a href="#">{!! $article->title !!}</a></h3>
                        <p>{!! $article->description !!}</p>
                        <ul class="list-inline news-v1-info">
                            <li><span>By</span>
                                <a href="#">{!! $article->author->name or $article->author->username !!}</a>
                            </li>
                            <li>|</li>
                            <li><i class="fa fa-clock-o"></i> {!! $article->created_at->format('M d, Y') !!}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

