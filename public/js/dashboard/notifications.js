"use strict";
(function() { $(function() {

	let $notify_header = $( '<div class="notify-table-header"></div>' );

	let $meta_notify = $( "meta[notify-0]" );
	
		let title_unread = $meta_notify.attr( "notify-0" );
		let title_archive = $meta_notify.attr( "notify-1" );

	$.createAjaxFilter( {

		"items-per-page": 18,

		callback: function() {

			let $notifies = $( ".notify-table-line" );
				let $unread = $notifies.filter( '[archive="0"]' );
				let $archive = $notifies.not( '[archive="0"]' );

			if( $unread.length )
				$unread.before( $notify_header.text( title_unread ) );

			if( $archive.length )
				$archive.before( $notify_header.text( title_archive ) );

		}
	} );

})}());