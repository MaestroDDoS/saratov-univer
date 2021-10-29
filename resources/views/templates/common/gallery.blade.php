<div class="col-sm-6 col-lg-4 isotope-item">
    <article class="thumbnail-classic block-1">
        <div class="thumbnail-classic-figure">
            <img data-src="{{ asset( "images/articles/{$id}/gallery/{$idx}.jpg" ) }}" alt="" width="370" height="315"/>
        </div>
        <div class="thumbnail-classic-caption">
            <div>
                <h5 class="thumbnail-classic-title"><a href="{{ route_url( "common.blog.article", $id ) }}">{{ $title }}</a></h5>
                <div class="thumbnail-classic-subtitle">{{ $category }}</div>
                <div class="thumbnail-classic-button-wrap">
                    <div class="thumbnail-classic-button">
                        <a class="button button-gray-6 button-zakaria fl-bigmug-line-search74" href="{{ asset( "images/articles/$id/src/$idx.jpg" ) }}" data-lightgallery="item">
                            <img data-src="{{ asset( "images/articles/{$id}/gallery/{$idx}.jpg" ) }}" alt="" width="370" height="315"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
