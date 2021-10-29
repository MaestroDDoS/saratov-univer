<section class="section section-xl bg-image-1">
    <div class="container">
        <h2 class="section-title-font">Наш коллектив</h2>
        <div class="owl-carousel" data-items="1" data-sm-items="2" data-md-items="3" data-margin="30" data-dots="true" data-autoplay="true">
            @foreach( $images as $image )
                <article class="team-classic box-md"><a class="team-classic-figure"><img src="{{ asset($image) }}" alt="" height="350"/></a></article>
            @endforeach
        </div>
    </div>
</section>
