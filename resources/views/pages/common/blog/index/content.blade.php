@extends('pages.common.blog.main-frame')
@section('article-info')
<template id="item-ajax-template">
    @include( "templates.$template", $template_params )
</template>
<div class="inset-xl-right-70 h-100">
	<div class="row row-50 row-md-60 row-lg-80 row-xl-100 h-100" id="items-list-page">
        @foreach( $paginator as $item )
            @include( "templates.$template", $item )
        @endforeach
	</div>
    {{ $paginator->links( 'layouts.common.pagination' ) }}
</div>
@endsection
@section( 'js' )
	<script src="{{ asset('js/common/blog.js') }}"></script>
@endsection
