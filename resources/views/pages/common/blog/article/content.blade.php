@extends('pages.common.blog.main-frame')
@section('title')

@endsection
@section('breadcrumbs')
	@include( 'layouts.common.breadcrumbs', [ 'breadcrumbs' => [ [ 'common.blog' ] ] ])
@endsection
@section( 'article-header' )
	<div class="article-header">
		<span>{{ $datetime }}</span>
		<span>{{ __("blog.categories.$category") }}</span>
	</div>
@endsection
@section('article-info')
	<div class="article-body">
        <h4 class="font-weight-medium">{{ $title }}</h4>
        {!! $tinymce_data !!}
    </div>
	<div class="article-slider">
		<div class="slick-slider-1">
			<div class="slick-slider carousel-parent slick-nav-1 slick-nav-2" id="carousel-parent" data-items="1" data-autoplay="false" data-slide-effect="true" data-arrows="true">
				@for( $idx = 1; $idx <= $img_count; $idx++ )
                    <div class="item"><img src="{{ asset( "images/articles/$id/blog/$idx.jpg" ) }}" alt="" width="830" height="449"/></div>
                @endfor
			</div>
		</div>
	</div>
@endsection
