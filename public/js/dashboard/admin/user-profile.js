"use strict";
(function() { $(function() {

	let $form = $( "form.personal-info-form" ).first();
	let $inputs = $form.find( "input[validate]" );
	let $submit_btn = $form.find( 'button[type="submit"]' );

	let form_checker = $.createFormBitMask( $submit_btn, $inputs.length );
	$inputs.initializeValidate( form_checker ).blur();

	let $password_change_panel = $( "#submenu-password-change" );
	let $change_password_inputs = $password_change_panel.find( "input" ).trigger( 'blur', true );

	$password_change_panel.on('show.bs.collapse', function( e ) { $change_password_inputs.trigger( 'blur' )		  } );
	$password_change_panel.on('hide.bs.collapse', function( e ) { $change_password_inputs.trigger( 'blur', true ) } );

	//$( '[name="is_admin"]' ).radioAccordion();

	$( '[name="is_admin"]' ).on( 'change', function( e ) {
	
		$('#panel-admin-settings').toggleClass('d-none', !this.checked);

	} ).trigger( 'change' );

	$submit_btn.ajaxButton( {} , function( e ) {

		return { data: $form.getFormData() } ;

	} );
})}());