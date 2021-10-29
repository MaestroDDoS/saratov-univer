"use strict";
(function() { $(function() {

	$( 'button[type="submit"]' ).first().ajaxButton( {} , 
	
	function( e ) {

		

	}, {

		"captcha": true,

	} );
})}());