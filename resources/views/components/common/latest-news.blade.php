<div class="aside-item col-sm-6 col-lg-12">
    <h6 class="aside-title">Последние новости</h6>
    <div class="row row-20 row-lg-30 gutters-10">
        @foreach( $news as $article )
            <div class="col-6 col-lg-12">
                <article class="post post-minimal">
                    <div class="unit unit-spacing-sm flex-column flex-lg-row align-items-lg-center">
                        <div class="unit-left">
                            <a class="post-minimal-figure" href="{{ route( 'common.blog.article', $article->id ) }}">
                                <img
                                   data-src="{{ asset( "images/articles/{$article->id}/minimal/1.jpg" ) }}"
                                    alt=""
                                    width="106"
                                    height="104"
                                />
                            </a>
                        </div>
                        <div class="unit-body">
                            <p class="post-minimal-title">
                                <a href="{{ route( 'common.blog.article', $article->id ) }}">
                                    {{ $article->title }}
                                </a>
                            </p>
                            <div class="post-minimal-time">
                                <time>{{ $article->created_at->formatLocalized('%B %d, %Y') }}</time>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
</div>
<div class="aside-item col-sm-6 col-lg-12">
    <h6 class="aside-title">{{ __( "common.archive" ) }}</h6>
    <ul class="list-marked list-archives d-inline-block d-md-block">
        @foreach( $latest_months as $month )
            <li>
                <a
                    filter="datetime"
                    value="{{ $month[0] }}"
                    href="{{ route( 'common.blog', [ 'datetime' => $month[0] ] ) }}"
                >
                    {{ $month[1] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
