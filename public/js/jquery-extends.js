"use strict";
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        factory(require('jquery'));
    } else {
        factory(jQuery);
    }
}(function ($) {

	let $last_captcha_btn;

	$.ajaxSetup( {

		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }

	} );

	window[ 'captcha-submit' ] = function( token ) {

		$.ajaxSetup( { headers: { 'X-CAPTCHA-TOKEN': token } } );
		
		if( $last_captcha_btn )
		{
			$last_captcha_btn.trigger( 'ajax-submit' );
			$last_captcha_btn = null;
		}

		//$.ajaxSetup( { headers: { 'X-CAPTCHA-TOKEN': '' } } );

	}

	window[ 'captcha-close' ] = function( token ) {

		if( $last_captcha_btn )
		{
			$last_captcha_btn.ajaxToggleButton( false );
			$last_captcha_btn = null;
		}
	}

	const validate_inputs = {

		"request": {

			tooltip: "обязательное поле" ,

			validate: function( value ) {

				return	!!value ;

			}
		} ,

		"select": {

			tooltip: "" ,

			validate: function( value ) {

				return	!!value ;

			}
		} ,

		"text": {

			tooltip: function( $input ) {

				return	"текст длиной от " + $input.attr( "text-min-len" ) + " до " + $input.attr( "text-max-len" ) + " символов."

			},

			validate: function( value, $input ) {

				return	!!value && parseInt( $input.attr( "text-min-len" ) ) <= value.length && value.length <= parseInt( $input.attr( "text-max-len" ) ) ;

			}
		} ,		

		"name": {

			tooltip: "2-32 символа" ,

			validate: function( value ) {

				return	value && value.match( /^[\S+]{2,32}$/ ) ;

			}
		} ,

		"email": {

			tooltip: "данный e-mail не прошел проверку" ,

			validate: function( value ) {

				return	value && value.match( /^[\S+]+\@[^s]+\.[^s]+$/ ) ;

			}
		} ,

		"phone": {

			tooltip: "+7(xxx)xxx-xx-xx" ,

			validate: function( value ) {

				return	value && value.match( /^\+7[0-9]{10}$/ ) ;

			}
		} ,

		"user-inn": {

			tooltip: "xxx-xxx-xxx-xxx" ,

			validate: function( value ) {

				return	!value || value && value.match( /^[0-9]{12}$/ ) ;

			}
		} ,

		"password": {

			tooltip: "5-32 символов" ,

			validate: function( value, $input ) {

				$( '#'+$input.attr( 'password-confirm' ) ).blur();
				return	value && value.match( /^[a-zA-Z0-9!@#$%^&*]{5,32}$/ ) ;

			}
		} ,

		"confirm-password": {

			tooltip: "не совпадает с первым паролем" ,

			validate: function( value, $input ) {

				return	value && $( '#'+$input.attr( 'password-input' ) ).val() == value ;

			}
		} 
	} ;

	validate_inputs[ "surname" ] = validate_inputs[ "name" ];

	$.createNotifyPanel = function( type, header, info ) {

		if( !$( ".notify-panel" ).length ) {

			$( "body" ).append( 
				$( '<div class="notify-panel"><h6><i class="fl-bigmug-line-paper122 mr-2"></i><span></span></h6><p></p></div>' ).append( 
					$( '<button type="button" class="btn-close"></button>' ).preventClick( function( e ) { 

						clearTimeout( $(this).parent().addClass( "d-none" ).data( "timer" ) );

					} )
				) 
			);
		}

		let $panel = $( ".notify-panel" ).removeClass().addClass( "notify-panel " + type );

		$panel.find( "h6 span" ).text( header );
		$panel.find( "p" ).text( info );

		clearTimeout( $panel.data( "timer" ) );
		$panel.data( "timer", setTimeout( () => $panel.find( "button" ).click() , 10 * 1000 ) );

	}

	$.createAjaxFilter = function( config = {} ) {

		let items_compile	  = $.generateTemplates( "#item-ajax-template" );
		let $items_list_page  = $( "#items-list-page" );
		let $items_list_title = $( "#item-list-title" ).children();

		let $pagination = $( "#filter-pagination" );

			let $li_prev = $pagination.find( '[page="prev"]' );
			let $li_next = $pagination.find( '[page="next"]' );

			let $li_first = $pagination.find( '[page="first"]' );
			let $li_last = $pagination.find( '[page="last"]' );

		let $li_pages = $pagination.children().not( "[page]" );

		let $submit_btn = $( 'button[type="filter"]' );
		let $filter_inputs = $( "[filter]" );

		let filter_obj = {}, last_filter = {}, max_step_prev = Math.ceil( ( $li_pages.length - 1 ) / 2 );
		let url_params = location.pathname + "?" + "page=";	

		$items_list_page.prepend( '<div class="loading"><div class="lds-facebook"><div></div><div></div><div></div></div></div>' ).toggleClass( 'active', true );

		$pagination.find( "a" ).preventClick( function( e ) {

			filter_obj.page = { 0: /page=([^&]+)/.exec( this.getAttribute( 'href' ) )[ 1 ] }; $submit_btn.click();

		} );

		$( "[filter-update]" ).preventClick( function( e ) {
			
			filter_obj = { ...last_filter }; $submit_btn.click();

		} );

		function change_page( $li, idx, totalpage ) {

			return	$li.toggleClass( 'disabled', idx < 1 || idx > totalpage ).find( ":first-child" ).attr( 'href', url_params + idx ).attr( "page-idx", idx );

		}

		$filter_inputs.each( function( index ) {

			let $input = $(this), group_name = $input.attr( 'filter' );

			if( !filter_obj[ group_name ] )
				filter_obj[ group_name ] = {};

			let groups = filter_obj[ group_name ];
			let idx = parseInt( $input.attr( 'filter-idx' ) ) || 0 ;

			$input.on( 'change post-change', function( e, disabled ) {

				delete filter_obj.page;
				
				let value = this.value || this.getAttribute( 'value' );

				if( !!value && ( this.type != 'checkbox' || this.checked ) && !( this.getAttribute( 'disabled' ) || disabled ) )
					groups[ idx ] = value;
				else
					delete groups[ idx ];

			} ).trigger( 'post-change' );

		} ).filter( '[ajax-reload]' ).on( 'change', function() {

			$submit_btn.click();

		} );

		last_filter = { ...filter_obj };

		$submit_btn.ajaxButton( {

			success : function( response ) {

				let count = response.total;
				let half_count = Math.ceil( ( $li_pages.length - 1 ) / 2 );
				
				let current_page = response.current_page;
				let last_page = response.last_page;

				//let start_page = Math.max( current_page - half_count, 1 ) - ( half_count - Math.min( half_count, last_page - current_page ) );
				let start_page = Math.max( current_page - half_count - ( half_count - Math.min( half_count, last_page - current_page ) ) , 1 );
				let idx_start = ( current_page - 1 ) * response.per_page + 1;

				$li_pages.each( function( i ) {

					let	idx = start_page + i; change_page( $(this), idx, last_page ).text( idx ).toggleClass( 'active', current_page - start_page == i );

				} );

				$items_list_page.children().not( ":first-child" ).remove();
				$items_list_page.append( items_compile( response.data ) ).toggleClass( 'active', true );

				change_page( $li_prev, current_page - 1, last_page );
				change_page( $li_next, current_page + 1, last_page );
				
				change_page( $li_first, Math.min( start_page, 1 ), last_page );
				change_page( $li_last, Math.max( last_page, 1 ), last_page );


				$items_list_title.eq(0).text( idx_start );
				$items_list_title.eq(1).text( Math.max( idx_start + response.data.length - 1, 0 ) );
				$items_list_title.eq(2).text( count );

				if( config.callback )
					config.callback( response );

			},
			
			error: function() {
				
				$items_list_page.toggleClass( 'active', true );
				
			}

		} , function( e ) {

			$items_list_page.toggleClass( 'active', false );

			history.pushState( {} , '' , $.createUrlParams( filter_obj ) )
			last_filter = { ...filter_obj }; delete filter_obj.page;

			//return { data: JSON.stringify( { data: last_filter } ) } ;
			return { 

				data: $.createPostParams( last_filter ) 

			} ;
		}, {

			"notify-success": false,

		} );

		if( config[ "initial-reload" ] )
			$submit_btn.click();

		return	$submit_btn;

	}

	$.createOrderController = function( config = {} ) {
		
		let shop_min_weight = parseInt( $( 'meta[name="shop-min-weight"]' ).attr( "content" ) );
		let totalprice = 0, totalweight = 0, totalcount = 0;

		let $span_totalprice  = $( "#shopcart-totalprice"  );
		let $span_totalweight = $( "#shopcart-totalweight" );
		let $span_totalcount  = $( "#shopcart-totalcount"  );

		let $form 		= $( "#order-form" );
		let $submit_btn = $form.find( 'button[type="submit"]' );
		let $inputs 	= $form.find('input[type="text"]').val("");
	
		let form_checker = $.createFormBitMask( $submit_btn, $inputs.length + 1 );
			form_checker.current = 0;

		$submit_btn.ajaxButton( { success: config.success }, function( e ) { return { data:config.data() } }, { /* "captcha": true */ } );

		config.cards_items.each( function( index ) {

			let count = 0, price = 0, weight = 0;

			let $this = $(this);
			let $input = $this.find( 'input[type="number"]' );

			let $span_total_count  = $this.find( "span[group]"  );
			let $span_total_weight = $this.find( "span[weight]" );
			let $span_total_price  = $this.find( "span[price]"  );

			let group_count = parseInt(   $span_total_count.attr(  "group"  ) );
			let weight_item = parseFloat( $span_total_weight.attr( "weight" ) );
			let price_item  = parseInt(   $span_total_price.attr(  "price"  ) );

			$input.prev("button").preventClick( function( e ) { $input.inputNumberStepByMul( -1 ) } );
			$input.next("button").preventClick( function( e ) { $input.inputNumberStepByMul(  1 ) } );

			$input.on( "change", function( e ) {

				let newvalue = ( parseInt( this.value ) || 0 ) ;

				let new_count  = newvalue * group_count;
				let new_price  = new_count * price_item ;
				let new_weight = new_count * weight_item ;

				totalweight += ( new_weight - weight ) ;
				totalcount  += ( new_count - count ) ;
				totalprice  += ( new_price - price ) ;

				weight = new_weight, count = new_count, price = new_price ;

				$span_total_weight.textNiceNumber( new_weight ) ;
				$span_total_price.textNiceNumber( new_price ) ;
				$span_total_count.textNiceNumber( new_count ) ;

				$span_totalweight.textNiceNumber( totalweight ) ;
				$span_totalcount.textNiceNumber( totalcount ) ;
				$span_totalprice.textNiceNumber( totalprice ) ;

				form_checker.check( totalweight >= shop_min_weight , $inputs.length );

				if( config.onchange )
					config.onchange( $this, { "newvalue": newvalue, "totalcount": totalcount } );

			} );

			$input.initializeNumberInput();

			$this.find( ".shopcart-btn-remove" ).preventClick( function( e ) {

				$input.changeVal( 0 ) ; $this.remove() ;

			});
		});
		
		return	form_checker;
		
	}

	$.createFormBitMask = function( $btn, count ) {

		return { 

			total: Math.pow( 2, count || 1 ) - 1, 
			current: 0,
			check: function( validated, bit_index, callback ) {

				bit_index = bit_index || 0;

				//if( ( this.current ^ ( ( validated ? 1 : 0 ) << bit_index ) ) >> bit_index ) {

					this.current = validated ? this.current |= ( 1 << bit_index ) : this.current & ~( 1 << bit_index );

					if( !$btn.data( "ajax-loading" ) )
						$btn.toggleClass( "disabled" , this.current != this.total );

					if( callback )
						callback.call();

					//console.log( this.current.toString(2), this.total.toString(2) );

				//}
			}
		};
	}

	$.createUrlParams = function( filter ) {

		//let params = {};
		let params = [];

		for( const [key, obj] of Object.entries( filter ) ) {

			let values = [];

			for( const [idx, value] of Object.entries( obj ) ) {

				if( !!value )
					values.push( value );

			}

			if( values.length )
				//params[ key ] = values.join( "+" );
				params.push( key + "=" + values.join( "+" ) );

		}

		return	location.pathname + "?" + params.join( "&" );
		//return	params.join( "&" );
		//return	params;

	}

	$.createPostParams = function( filter ) {
		
		let params = {};
		
		for( const [key, obj] of Object.entries( filter ) ) {

			let values = [];

			for( const [idx, value] of Object.entries( obj ) ) {

				if( !!value )
					values.push( value );

			}

			if( values.length )
				//params[ key ] = values.join( "+" );
				params[ key ] = values.length > 1 ? values : values[0];

		}

		return	params;

	}

	function render(props) {
		return function(tok, i) {
			return ( (i % 2) ? props[tok] : tok ) || "";
		};
	}

	$.generateTemplates = function( template_id ) {

		let template = $( template_id ).html().split( /\$\{(.+?)\}/g );

		return	function( items ) {

			return	items.map( function( item ) {

				return	$( template.map( render( item ) ).join('') );

			} ) ;
		}
	}

	$.fn.extend( {

		textNiceNumber: function( num ) {
			return this.each( function() { this.textContent = num.toLocaleString() } );
		} ,

		changeVal: function( val ) {
			return this.val( val ).trigger( 'change' ); 
		} ,

		attrs: function( attr ) {
			let results = [];
				this.each( function( i, item ) { results.push( item.getAttribute( attr ) ) } );
			return results;
		},

		values: function() {
			let results = [];
				this.each( function( i, item ) { results.push( item.value) } );
			return results;
		},

		preventClick: function( callback ) {

			return	this.off( 'click' ).on( "click" , function( e ) { e.stopPropagation(); e.preventDefault(); callback.call( this, e ) } );

		} ,

		getFormData: function() {
			
			let result = {};

			this.find( ":input" ).each( function() {

				let val = $.trim( this.value );

				if( !!val && !this.getAttribute( 'disabled' ) ) {

					if( this.type == 'checkbox' )
						result[ this.name ] = !!this.checked ? 1 : 0;

					else
						result[ this.name ] = val;

				}
			} );

			//console.log( result );

			return	result;

		},

		radioAccordion: function() {
			
			let $accordion_panels = $('');

			this.each( function() {

				$.merge( $accordion_panels, $( this.getAttribute( "accordion-href" ) ).addClass( 'collapse' ) );

				$(this).on( 'change', function( e ) {

					$accordion_panels.collapse( 'hide' );
					$( this.getAttribute( "accordion-href" ) ).collapse( 'show' );

				} );

			} )

			return this.filter( ":checked" ).trigger( 'change' );

		},

		initializeValidate: function( callback ) {

			return	this.each( function( bit_index ) {
				
				let $input = $(this);
				let	$parent = $input.parent();

				let validate_obj = validate_inputs[ $input.attr( 'validate' ) ];

				let tooltip = validate_obj.tooltip;
				
				if( typeof tooltip == 'function' )
					tooltip = tooltip( $input );

				$input.attr( "placeholder", " " ) ;
				$input.before( "<span class='form-validation'>"+tooltip+"</span>" ) ;

				$input.on('input change propertychange blur', function( e, bool ) {

					let val = $input.val().trim();
					let validated = bool || !!validate_obj.validate( val, $input );

					if( callback )
						if( typeof callback !== 'function' ) //form checker
							callback.check( validated, bit_index ); 
						else
							callback.call( $input, val, validated, bit_index );

					$parent.toggleClass( "has-error" , !validated );

				} );

				if( !!$input.val() || $input.attr( "value-important" ) )
					$input.blur();

			} );
		},

		initializeNumberInput: function() {

			this.on( "blur input focusout", function( e ) { 

				$(this).inputNumberStepByMul( 0 );

			} ) ;

			this.on( "keypress", function( e ) {

				let key = e.which || e.keyCode ;

				if( !key || key < 48 || key > 57 )
					return	false ;

			} );

			return	this.focusout();

		} ,

		inputNumberStepByMul: function( mul ) {

			let minval = parseInt( this.attr( "min" ) ) ;
			let maxval = parseInt( this.attr( "max" ) ) ;
			let step = parseInt( this.attr( "step" ) ) ;	

			this.changeVal( Math.max( Math.min( parseInt( ( this.val() ) || 0 ) + step * ( mul != null ? mul : 1 ) , maxval ) , minval ) );
			
			return	this;

		} ,

		ajaxToggleButton( bool ) {

			this.data( "ajax-loading" , bool ).trigger( 'ajax-change', bool );

				this.toggleClass( "disabled", bool );
				$( this.data( 'ajax-circle' ) ).toggle( bool ).next("i").toggle( !bool );

			return	this;

		},

		ajaxButton: function( static_header , callback, event_header ) {

			let $this = $(this);

			let url = $this.parents( "form" ).attr( "action" );

			let static_config = Object.assign( {

				url: !!url ? url: location.pathname,
				type: "POST",
				dataType: "json",
				//contentType: "application/json;charset=UTF-8",

			}, static_header );

			let event_cfg = Object.assign( {

				"loading-circle": true,
				"notify-success": true,
				"captcha": false,

			}, event_header );

			let success = static_config.success;
			let error = static_config.error;

			static_config.success = function( response ) {

				$this.ajaxToggleButton( false );

				console.log( response, response.status );

				if( !response.status )
					return	static_config.error( false, response.message );

				if( success )
					success.call( $this, response.data );

				if( event_cfg[ "notify-success" ] )
					$.createNotifyPanel( "success", "Уведомление", response.message || "Новые данные успешно отправлены и сохранены!" );

				$.validate_images();

				if( response.refresh )
					return	location.reload();

				if( response.href )
					window.location.href = response.href;

			}

			static_config.error = function( xhr, response ) {

				$this.ajaxToggleButton( false );

				if( error )
					if( error.call( $this, response ) == false )
						return ;

				if( xhr && xhr.responseJSON )
					response = xhr.responseJSON.message || response;

				if( typeof response === 'object' )
					response = JSON.stringify(response, null, 4);

				$.createNotifyPanel( "error", "Ошибка", "Непредвиденная ошибка сервера: " + response );

			}

			$this.on( 'ajax-submit', async function( e ) {
				
				let config = Object.assign( static_config , await callback.call( $this, e ) || {} ) ;

				if( event_cfg[ "loading-circle" ] && !$this.data( 'ajax-circle' ) ) {

					let $circle = $( '<i class="fa fa-circle-o-notch fa-spin ajax-circle"></i>' );
					$this.data( 'ajax-circle', $circle ).prepend( $circle ) ;

				}

				console.log( config );

				$this.ajaxToggleButton( true );
					$.ajax( config ) ;
				
			} );

			$this.preventClick( async function( e ) {

				if( $this.data( "ajax-loading" ) )
					return ;

				if( !event_cfg[ 'captcha' ] ) {

					$this.trigger( 'ajax-submit' );

				} else {

					if( $last_captcha_btn )
						return;

					$this.ajaxToggleButton( true );
					$last_captcha_btn = $this; hcaptcha.execute();

				}
			} );
		}
	});	

}));
