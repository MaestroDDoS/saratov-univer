"use strict";
(function() { $(function() {

	let $a_filter = $( "a[filter]" );
	let $submit_btn = $.createAjaxFilter();

	$a_filter.trigger( 'post-change', true ).each( function() {

		this.setAttribute( 'href', location.pathname + "?" + this.getAttribute( 'filter' ) + "=" + this.getAttribute( 'value' ) );

	} ).preventClick( function( e ) {

		$a_filter.not( this ).trigger( 'post-change', true ).removeClass( 'active' );
		$(this).attr( 'disabled', false ).trigger( 'post-change' ).addClass( 'active' ); 		

		$submit_btn.click();

	} ).filter( '.active' ).trigger( 'post-change' );

	$submit_btn.on( 'ajax-change', function( e, bool ) {

		$a_filter.toggleClass( 'disabled', bool );

	} );

})}());