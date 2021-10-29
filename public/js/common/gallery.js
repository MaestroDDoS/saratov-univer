"use strict";
(function() { $(function() {
	
	$.createAjaxFilter( {
		
		callback: function() {

			$( '[data-lightgallery="group"]' ).data('lightGallery').destroy(true);

			$( '[data-lightgallery="group"]' ).each( function( idx ) {
			
				let $this = $(this);
				
				$this.lightGallery( {

					thumbnail:	$this.attr("data-lg-thumbnail") !== "false",
					selector:	"[data-lightgallery='item']",
					autoplay:	$this.attr("data-lg-autoplay") === "true",
					pause: 		parseInt( $this.attr("data-lg-autoplay-delay") ) || 5000,
					mode:		$this.attr("data-lg-animation") || "lg-slide",
					loop:		$this.attr("data-lg-loop") !== "false"

				} );
			} );

			$( '[data-lightgallery="item"]' ).each( function( idx ) {

				$(this).lightGallery( { selector: "this", counter: true } );

			} );
		}
	} );
})}());