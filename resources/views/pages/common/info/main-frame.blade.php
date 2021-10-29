@extends('pages.common.main-frame')
@section('content')
<section class="breadcrumbs-custom">
	<div class="parallax-container" data-parallax-img="{{ asset( 'images/backgrounds/bg-info.jpg' ) }}">
		<div class="breadcrumbs-custom-body parallax-content context-dark">
			<div class="container">
				<h2 class="breadcrumbs-custom-title">{{ __( "navigation.$page" ) }}</h2>
			</div>
		</div>
	</div>
	@include('layouts.common.breadcrumbs')
</section>
<section class="section section-lg bg-default text-md-left">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-xl-9">
				<dl class="list-terms list-terms-1">
					@yield( 'article-info' )
				</dl>
			</div>
			<x-common.info.aside-navbar :page="$page"/>
		</div>
	</div>
</section>
@endsection
