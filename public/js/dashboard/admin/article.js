"use strict";
(function() { $(function() {

	const acceptedImageTypes = ['image/jpeg', 'image/png'];

	let $form = $( "form.article-editor" )
	let $silk = $('.slick-slider'), $submit_btn = $form.find('[type="submit"]');
	let $inputs = $( "[validate]" );

	let validator = $.createFormBitMask( $submit_btn, $inputs.length + 2 );
		validator.current = validator.total;

	$inputs.initializeValidate( validator ).trigger( 'change' );

	tinymce.init( {

		selector: 'textarea#article-mce',

		language_url : '/js/dashboard/admin/tinymce/langs/ru.js',
		language: 'ru',
	
		content_css: "/css/style.css",
		content_style: "@import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap'); body{ text-align: left !important; }",

		height: 496,

		plugins: [
			'advlist autolink link image lists charmap print preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars fullscreen insertdatetime nonbreaking',
			'table template paste help'
		],

		toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
				 'bullist numlist outdent indent | print preview fullpage | ' +
				 'forecolor backcolor | help',

		menubar: 'file edit view format table help',

		setup: function( editor ) {
       
			editor.on( 'input NodeChange', function() {
			   
			    validator.check( !!tinymce.activeEditor.getContent(), 1 );
			
			} );
		}
	} );

	$('.slick-slider-1').append( 

		$( '<button type="button" class="btn-close"></button>' ).preventClick( function( e ) {

			$silk.slick( 'slickRemove', $silk.slick( 'slickCurrentSlide' ) );

		} )
	);

	$( 'input[type="file"]' ).on( 'change', function( e ) {
		
		let input = this, files = this.files;

		if( !files || !files.length )
			return;

		let file = files[ 0 ];

		if( !acceptedImageTypes.includes( file[ 'type' ] ) )
			return;

		let fr = new FileReader(); validator.check( false );

			fr.onload = function() { 

				let new_div = $( '<div class="item"><img alt="" width="830" height="449"/></div>' );
					new_div.find( "img" ).attr( "src", fr.result );

				$silk.slick( 'slickAdd', new_div );

			}

			fr.onloadend = function() { validator.check( true ) };

		fr.readAsDataURL( file );

	} );

	$submit_btn.ajaxButton( {

		contentType: false,
		processData:false,
		cache: false,

		//dataType: "text",

	}, function( e ) { 

		let formdata = new FormData();

			formdata.set( 'title', $inputs.first().val() );
			formdata.set( 'article_category_id', $inputs.last().val() );
			formdata.set( 'tinymce_data', tinymce.activeEditor.getContent() );

			let imgs = { "old": [], "new": [] };
		
			$silk.find( "img" ).each( function( idx ) {

				let src_id = this.getAttribute( 'src_id' );

				if( src_id ) {
					
					imgs[ "old" ].push( src_id );
					
				} else {
					
					imgs[ "new" ].push( this.getAttribute( 'src' ) );
					
				}

				//formdata.set( "img:" + idx, this.getAttribute( 'src' ) );

			} );

			formdata.set( "images", JSON.stringify( imgs ) );

		return	{ data: formdata };

	} );

})}());


