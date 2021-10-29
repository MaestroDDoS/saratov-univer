"use strict";
(function() { $(function() {

	let $sidebar_menu = $( ".sidebar-menu" );
	let $btn_aside = $( ".rd-navbar-toggle" );

	$btn_aside.preventClick( function( e ) {

		$btn_aside.toggleClass( "active" );
		$sidebar_menu.toggleClass( "active" );

	} );

	if( $( "#item-ajax-template" ).length )
		$.createAjaxFilter();

})}());