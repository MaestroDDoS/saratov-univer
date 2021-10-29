@extends('pages.common.main-frame')
@section('content')
<section class="breadcrumbs-custom">
	<div class="parallax-container" data-parallax-img="{{ asset('images/backgrounds/bg-blog.jpg') }}">
		<div class="breadcrumbs-custom-body parallax-content context-dark">
			<div class="container">
				<h2 class="breadcrumbs-custom-title">{{ __( "navigation.$page" ) }}</h2>
			</div>
		</div>
	</div>
	@hasSection('breadcrumbs')
		@yield( 'breadcrumbs' )
	@else
		@include( 'layouts.common.breadcrumbs')
	@endif
</section>
<section class="section section-xl bg-default text-md-left">
	<div class="container">
		@yield( 'article-header' )
		<div class="row row-50 row-md-60">
			<div class="col-lg-8 col-xl-9">
				@yield( 'article-info' )
			</div>
			<div class="col-lg-4 col-xl-3">
				<form action="{{ url()->current() }}" class="d-none" hidden><button class="" type="filter"><span></span></button></form>
				<div class="aside row row-30 row-md-50 justify-content-md-between">
					<x-common.blog.aside-navbar/>
					<x-common.latest-news/>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
