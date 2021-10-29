"use strict";
(function() { $(function() {

	$( '.box-info-modern' ).each( function() {

		let href = $(this).find( '.box-info-modern-figure' ).attr( 'href' );
		$(this).find( '[href]' ).attr( 'href', href );

	} );

	$( '.box-info-creative' ).each( function() {

		let href = $(this).find( '.box-info-creative-title a' ).attr( 'href' );
		$(this).find( '[href]' ).attr( 'href', href );

	} );
})}());