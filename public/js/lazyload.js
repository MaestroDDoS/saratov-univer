"use strict";
(function() { $(function() {

	$.validate_images = function() 
	{
		$('img').on( "error", function() {

			let $this = $(this);

			let w = this.getAttribute( 'width' ) || this.width;
			let h = this.getAttribute( 'height' ) || this.height;

			if( w && h ) 
			{
				$this.attr("src", 'data:image/svg+xml;base64,' + btoa( `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ${w} ${h}"><rect width="${w}" height="${h}" fill="#cccccc"></rect></svg>` ) );
			}

		} ).each( function(){

			let src = this.getAttribute( 'src' );
			
			if( !src ) 
			{
				let data_src = this.getAttribute( 'data-src' );

				if( data_src ) 
				{
					return	this.setAttribute( 'src', data_src );
				}
				
				return	$(this).trigger( 'error' );
			}
			
			if( !this.complete )
				return;
			
			let image = new Image();
				image.src = src;

			if( !image.width ) 
			{
				$(this).trigger( 'error' );
			}
		} );
	}
})}());