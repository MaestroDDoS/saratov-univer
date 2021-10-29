
function getCanvasBlob( canvas ) {

	return new Promise( function( resolve, reject ) {

		canvas.toBlob( ( blob ) => {

			resolve( blob );

		} );
	} );
}

"use strict";
(function() { $(function() {

	const acceptedImageTypes = ['image/jpeg', 'image/png'];

	let image = document.querySelector( '#img-cropper' );

		let img_width = parseInt( image.getAttribute( 'width' ) );
		let img_height = parseInt( image.getAttribute( 'height' ) );

	let canvas, uploaded = false;

	let canvas_options = { width: img_width, height: img_height, minWidth: img_width, minHeight: img_height, maxWidth: img_width, maxHeight: img_height };

	let options = {

		viewMode: 3,
		dragMode: 'move',
		autoCropArea: 1,
		restore: false,
		guides: false,
		center: true,
		highlight: false,
		cropBoxMovable: false,
		cropBoxResizable: false,
		toggleDragModeOnDblclick: false,

	};

	let cropper = new Cropper( image, options );

	$( 'input[type="file"]' ).on( 'change', function( e ) {

		let input = this, files = this.files;

		if( !files || !files.length )
			return;

		let file = files[ 0 ];

		if( !acceptedImageTypes.includes( file[ 'type' ] ) )
			return;

		let fr = new FileReader();

			fr.onload = function() {

				image.src = fr.result;

				if( cropper )
					cropper.destroy();

				cropper = new Cropper(image, options);
				input.value = null;

				uploaded = true;

			}

		fr.readAsDataURL( file );

	} );

	let $form = $( "form.product-table" ).first();

	let $inputs = $( "[validate]" );
	let $submit_btn = $form.find( 'button[type="submit"]' );

	let form_checker = $.createFormBitMask( $submit_btn, $inputs.length );

		$inputs.initializeValidate( form_checker ).blur();

	$( 'input[type="number"]' ).initializeNumberInput();

	$submit_btn.ajaxButton( {

		contentType: false,
		processData:false,
		cache: false,

		//dataType: "text",

	}, async function( e ) {

		let formdata = new FormData(), result = $form.getFormData();

		for( const key in result )
			formdata.set( key, result[ key ] );

		if( uploaded ) {

			let canvas = cropper.getCroppedCanvas( canvas_options );
			let blob = await getCanvasBlob( canvas );

			formdata.set( "image", blob, "item-img.png" );

		}

		return	{ data: formdata };

	} );

})}());
