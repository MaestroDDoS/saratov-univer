"use strict";
(function() { $(function() {

	let $modal = $( "#modal-accept" );

	let $form = $modal.find( "form" );
	let $submit_btn = $form.find( "button[type='submit']" );

	$submit_btn.ajaxButton( {
		
		success: function(){ $modal.modal('hide') },
		error:   function(){ $modal.modal('hide') },
		
	} , function( e ) {} );
	
})}());