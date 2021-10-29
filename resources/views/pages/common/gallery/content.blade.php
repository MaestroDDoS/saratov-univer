@extends('pages.common.main-frame')
@section('content')
	<section class="breadcrumbs-custom">
		@include( 'layouts.common.breadcrumbs')
	</section>
    <template id="item-ajax-template">
       @include( "templates.$template", $template_params )
    </template>
    <section class="section section-xl bg-default">
        <div class="container isotope-wrap">
            <div class="row row-30 isotope" data-lightgallery="group" id="items-list-page">
                @foreach( $paginator as $item )
                    @include( "templates.$template", $item )
                @endforeach
            </div>
        </div>
        <form action="{{ url()->current() }}" class="d-none" hidden><button class="" type="filter"><span></span></button></form>
        {{ $paginator->links( 'layouts.common.pagination' ) }}
    </section>
@endsection
@section( 'js' )
	<script src="{{ asset('js/common/gallery.js') }}"></script>
@endsection

