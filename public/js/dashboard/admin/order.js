"use strict";
(function() { $(function() {

	let $form = $( "form.order-single-panel" );

	$( 'input[name="delivery-cost"]' ).initializeNumberInput();

	$.createOrderController( {

		cards_items: $( ".dashboard-product-card" ),

		data: function() { 

			return $form.getFormData();

		}
	} );

})}());