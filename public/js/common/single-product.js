"use strict";
(function() { $(function() {

	let product_id = $( ".single-product" ).attr( "product-id" );

	let $input_childerns = $( ".stepper" ).children();
	let $input = $input_childerns.eq( 0 );

	$input_childerns.eq( 2 ).preventClick( function( e ) { $input.inputNumberStepByMul( -1 ) } );
	$input_childerns.eq( 1 ).preventClick( function( e ) { $input.inputNumberStepByMul(  1 ) } );

	$input.initializeNumberInput();

	$( "#btn-add2card" ).preventClick( function( e ) {

		shopCartController.setItem( product_id, $input.val() );

	} );
})}());