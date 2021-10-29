"use strict";
(function() { $(function() {

	$.createAjaxFilter();

	$( '.rd-range' ).RDRange();

	$( '.list-shop-filter' ).each( function() {

		let $this = $(this);
		let $inputs = $this.find( 'input' );
	
		let $input_all = $inputs.filter( '[value=""]' );
		let $input_filter = $inputs.not( $input_all );

		$input_filter.data( "need2uncheck", $input_all );
		$input_all.data( "need2uncheck", $input_filter );

		$inputs.on( 'change', function( e ) {

			if( this.checked )
				$(this).data( "need2uncheck" ).prop( 'checked', false ).trigger( 'change' );

		} );
	} );

	$( ".shop-products-list" ).on( "click", function( e ) {

		if( e.target && e.target.type == "button" )
			shopCartController.setItem( e.target.getAttribute( 'product-id' ), 1 );

	} );

})}());