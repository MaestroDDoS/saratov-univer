"use strict";
(function() { $(function() {

	//let $form = $( "form" );
	let $form = $( "form" ).first();
	let $inputs = $form.find( "input[validate]" );
	let $submit_btn = $form.find( 'button[type="submit"]' );

	let form_checker = $.createFormBitMask( $submit_btn, $inputs.length );
	$inputs.initializeValidate( form_checker ).blur();

	let $password_change_panel = $( "#submenu-password-change" );
	let $change_password_inputs = $password_change_panel.find( "input" ).trigger( 'blur', true );

	$password_change_panel.on('show.bs.collapse', function( e ) { $change_password_inputs.trigger( 'blur' )		  } );
	$password_change_panel.on('hide.bs.collapse', function( e ) { $change_password_inputs.trigger( 'blur', true ) } );

	$( '[name="profile-check"]' ).radioAccordion();

	$submit_btn.ajaxButton( {} , function( e ) {

		return { data: $form.getFormData() } ;

	} );
})}());