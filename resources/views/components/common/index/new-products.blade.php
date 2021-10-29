<section class="section section-xxl bg-image-1">
    <div class="container">
        <h2 class="wow fadeScale section-title-font">{{ __('common.new_products') }}</h2>
        <div class="owl-carousel owl-style-9" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-margin="30" data-dots="true" data-autoplay="true">
            @foreach($products as $product)
                @include( "templates.$template", $product )
            @endforeach
        </div>
    </div>
</section>
