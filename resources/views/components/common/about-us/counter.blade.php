<section class="parallax-container" data-parallax-img="/images/parallax/parallax-2.jpg">
    <div class="parallax-content section-xxl context-dark">
        <div class="container">
            <div class="row row-30 justify-content-center">
                @foreach( $counter as $count )
                    <div class="col-8 col-sm-4">
                        <div class="counter-modern">
                            <h2 class="counter-modern-number"><span class="counter">{{ $count[1] }}</span></h2>
                            <div class="counter-modern-decor"></div>
                            <h5 class="counter-modern-title">{{ __( "common.counter." . $count[0] ) }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
