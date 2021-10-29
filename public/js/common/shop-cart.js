"use strict";
(function() { $(function() {

	let shopcart_cookies = shopCartController.getItems();
	let collapsed = false;

	let $shopcart_aside_form  = $( "#shopcart-aside-form"  );
	let $shopcart_empty_title = $( ".shopcart-empty-title" );
	let $shopcart_list 		  = $( ".list-shopcart-info"   );

	let $form   = $( "#order-form" );
	let $inputs = $form.find('input[type="text"]').val("");

	let $address_inputs_div = $( "#address-inputs" );
	let $address_radios 	= $shopcart_aside_form.find( 'input[type="radio"]' );

	let $region		= $( '#aside-shopcart-input-region'   );
    let $city		= $( '#aside-shopcart-input-city' 	  );
    let $street		= $( '#aside-shopcart-input-street'   );
    let $building	= $( '#aside-shopcart-input-building' );

	let form_checker = $.createOrderController( {

		cards_items: $( ".shopcart-product-card" ),

		data: function() {

			let address;

			if( !collapsed ) {

				let obj = $building.fias( 'current' );

				address = { 

					"name": obj.name, 
					"id"  : obj.id,

				};
			}

			return	{ "address": address, items: shopcart_cookies }

		},

		onchange: function( $item_card, e ) {

			let totalcount = e.totalcount, newvalue = e.newvalue;
			let product_id = $item_card.attr( "product-id" );

			$shopcart_empty_title.toggle( totalcount <= 0 );
			$shopcart_aside_form.toggle(  totalcount > 0  );
			$shopcart_list.toggle( 		  totalcount > 0  );			

			if( newvalue > 0 )
				shopcart_cookies[ product_id ] = newvalue;
			else
				delete shopcart_cookies[ product_id ];

			shopCartController.setItems( shopcart_cookies );			

		}
	} );

	$address_radios.on( 'change' , function( e ) {

		collapsed = !this.value;

			$address_inputs_div.collapse( this.getAttribute( "collapse" ) );

		$inputs.each( function( index ) {

			form_checker.check( collapsed || this.getAttribute( "data-kladr-id" ) , index );

		} );

	} ).click();

	$.fias.setDefault( {

		parentInput: $form ,
        verify: true ,
        change: function( obj ) {

			console.log( obj );

			form_checker.check( !!obj, $(this).index() );

			if( obj && obj.parents )
				$.fias.setValues( obj.parents, $form );

			$( '#address-title' ).text( $.fias.getAddress( $form ) );

		},

		checkBefore: function() {

			if( !$.trim( this.value ) ) {

				$( '#address-title' ).text( $.fias.getAddress( $form ) );
				return	false;

			}
		}
	} );

    $region.fias(	'type', $.fias.type.region	);
    $city.fias(		'type', $.fias.type.city	);
    $street.fias(	'type', $.fias.type.street	);
    $building.fias( 'type', $.fias.type.building);

    $city.fias(	  'withParents', true );
    $street.fias( 'withParents', true );

	$building.fias( 'verify', false );

})}());