 <article class="product">
    <div class="ribbon ribbon-top-right ribbon-{{ $status }}"><span>{{ $status_title }}</span></div>
    <div class="product-body">
        <h5 class="product-title"><a href="{{ route_url( 'common.shop.product', $id ) }}">{{ $name }}</a></h5>
        <div class="product-figure">
            <a href="{{ route_url( 'common.shop.product', $id ) }}">
                <img data-src="{{ asset( "images/products/{$id}/medium.png" ) }}" alt="" width="173" height="172"/>
            </a>
        </div>
        <div class="product-price-wrap">
            <div class="product-price product-price-old">{{ $cost }} <span price="{{ $cost }}" class="product-currency">₽</span></div>
            <div class="product-price">{{ $new_cost }} ₽</div>
        </div>
        <div class="product-info-wrap">
            <p>{{ __( 'product.partner' ) }} - <span class="link-primary">{{ $partner_name }}</span></p>
            <p>{{ __( 'product.group' ) }} - {{ $group }} {{ __( 'notation.count' ) }}.</p>
            <p>{{ __( 'product.weight' ) }} - {{ $weight }} {{ __( 'notation.g' ) }}.</p>
        </div>
    </div>
    <div class="product-button-wrap">
        <div class="product-button">
            <a class="button button-primary button-zakaria fl-bigmug-line-search74" href="{{ route_url( 'common.shop.product', $id ) }}"></a>
        </div>
        <div class="product-button">
            <button type="button" product-id="{{ $id }}" class="button button-primary button-zakaria fl-bigmug-line-shopping202"></button>
        </div>
    </div>
</article>


