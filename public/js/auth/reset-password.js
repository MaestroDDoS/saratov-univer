"use strict";
(function() { $(function() {

	let $form = $( "form" ).first();
	let $submit_btn = $form.find( 'button[type="submit"]' ).addClass( "disabled" );

	let $inputs = $form.find('input[validate]');
	let form_checker = $.createFormBitMask( $submit_btn, $inputs.length );

	$inputs.initializeValidate( form_checker );

	$submit_btn.ajaxButton( {
		
		success : function( response ) { location.reload() },
		
	} , 
	
	function( e ) {
		
		return { data: $form.getFormData() } ;
		
	}, {

		"captcha": true,

	} );
})}());