"use strict";
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        factory(require('jquery'));
    } else {
        factory(jQuery);
    }
}(function ($) {

	let $shop_cookie_meta = $( 'meta[name="shop-cookie"]' );
		
		let cookie_name = $shop_cookie_meta.attr( "cookie-name" );
		let max_age = parseInt( $shop_cookie_meta.attr( "max-age" ) );

	let $basket_wrap = $( ".rd-navbar-basket-wrap" );
	
		let $basket_btn_span = $basket_wrap.find( "button span" );
		let $basket_h5_span = $basket_wrap.find( "h5 span" );

	let $basket_goto = $( "#basket-goto" );
	let $basket_empty = $( "#basket-empty" );

	window.shopCartController = {

		getCount: function() {

			return	Object.keys( this.getItems() ).length;

		},
		
		updateBasketTitle: function() {
			
			let count = this.getCount();

			$basket_btn_span.text( count );
			$basket_h5_span.text( count );			

			$basket_goto.toggleClass( 'd-none', count == 0 );
			$basket_empty.toggleClass( 'd-none', count != 0 );

		},

		setItem: function( itemid, count ) {

			let items = this.getItems();

				items[ itemid ] = parseInt( count );

			this.setItems( items );

		},

		deleteItem: function( itemid ) {

			let items = this.getItems();

				delete items[ itemid ];

			this.setItems( items );

		},

		getItems: function() {

			return	getCookie( cookie_name, true ) || {};

		},

		setItems: function( items ) {

			setCookie( cookie_name , items, { "samesite": "Lax", "max-age": max_age, "path": "/" } );
			this.updateBasketTitle();

		}
	}

	window.shopCartController.updateBasketTitle();

}));