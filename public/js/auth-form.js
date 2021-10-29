"use strict";
(function() { $(function() {

	let $forms_titles = $( ".rd-navbar-project-title"  );
	let $auth_panels = $( ".rd-navbar-project-content" );

	$auth_panels.find( "a" ).filter( function() {

		return	this.getAttribute( "href" ).startsWith('#');

	} ).preventClick( function( e ) {

		let href_id = this.getAttribute( "href" );

		$forms_titles.addClass( "d-none" );
			$forms_titles.filter( "[title-for='"+href_id+"']" ).removeClass( "d-none" );

		$auth_panels.addClass( "slideOutRight" ) ;
		$auth_panels.removeClass( "slideInLeft" ) ;

		$auth_panels.filter('[id='+href_id.substring(1)+']').toggleClass( "slideOutRight slideInLeft" ) ;

	} ) ;

	$auth_panels.each( function( index ) {

		let $main_panel = $(this);

		let $form = $main_panel.find( "form" );
		let $submit_btn = $form.find( 'button[type="submit"]' ).addClass( "disabled" );

		let $inputs = $form.find('input[validate]');
		let form_checker = $.createFormBitMask( $submit_btn, $inputs.length );

		$inputs.initializeValidate( form_checker );

		$submit_btn.ajaxButton( {

			error: function() { $inputs.blur() },

		} , function( e ) {

			return { data: $form.getFormData() } ;

		}, {

			"notify-success": !!$main_panel.attr( 'data-notify-success' ),
			"captcha": true,

		} );
	} );
})}());