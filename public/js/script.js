"use strict";
(function () {

	let initialDate = new Date();

	let $document = $(document);
	let $window = $(window);
	let $html = $("html");
	let $body = $("body");

	let isDesktop = device.type != "mobile";

	function isScrolledIntoView( elem ) {

		return elem.offset().top + elem.outerHeight() >= $window.scrollTop() && elem.offset().top <= $window.scrollTop() + $window.height();

	}

	$window.on( 'load', function () {

		let $preloader = $( '.preloader' );

		pageTransition( {

			target: document.querySelector( '.page' ),
			delay: 250,
			duration: 250,
			classIn: 'fadeIn',
			classOut: 'fadeOut',
			classActive: 'animated',

			conditions: function( event, link ) {

				//return !/(\#|callto:|tel:|mailto:|:\/\/)/.test( link ) && !event.currentTarget.hasAttribute( 'data-lightgallery' );
				return false;

			},

			onTransitionStart: function( options ) {

				setTimeout( function() {

					$preloader.removeClass( 'loaded' );

				}, options.duration * .75 );
			},

			onReady: function() {

				setTimeout( () => window.dispatchEvent( new Event('resize') ), 500);
				$preloader.addClass( 'loaded' );
				$.validate_images();

			}
		} );

		$( '.counter' ).each( function( idx ) {

			let $counter = $(this);

			let initCount = function() {

				if ( !$counter.hasClass( "animated-first" ) && isScrolledIntoView( $counter ) ) {

					$counter.countTo( {

						refreshInterval: 40,
						speed: $counter.attr( "data-speed" ) || 1000,
						from: 0,
						to: parseInt( $counter.text(), 10 ),

					} );

					$counter.addClass( 'animated-first' );

				}
			};
			
			$.proxy( initCount, $counter )();
			$window.on( "scroll", $.proxy( initCount, $counter ) );

		} );

		$( '.parallax-container' ).each( function( idx ) {

			if (isDesktop )
				return	$(this).parallax();

			$(this).addClass( 'parallax-disabled' ).css( { "background-image": 'url('+ this.getAttribute( 'data-parallax-img' ) +')' } )

		} );
	} );
	
	$(function () {

		let swipers = document.querySelectorAll( '.swiper-container' );
		let $navbar = $( '.rd-navbar' );

		$( '.copyright-year' ).text( initialDate.getFullYear() );

		[ 'radio', 'checkbox' ].forEach( function( type ) {

			$( 'input[type="'+type+'"]' ).addClass( type+"-custom") .after( "<span class='"+type+"-custom-dummy'></span>" );

		} );

		if( isDesktop )
			$().UItoTop( { easingType: 'easeOutQuad', containerClass: 'ui-to-top mdi mdi-arrow-up' } );

		if( $html.hasClass("wow-animation") && isDesktop )
			new WOW().init();
		
		if( $('[data-multitoggle]').length ) 
			multitoggles();
		
		
		$( '.slick-slider' ).each( function( idx ) {

			let $slickItem = $(this);

			$slickItem.slick({

				slidesToScroll: parseInt($slickItem.attr('data-slide-to-scroll'), 10) || 1,
				asNavFor: 		$slickItem.attr('data-for') || false,
				dots: 			$slickItem.attr("data-dots") === "true",
				infinite: 		$slickItem.attr("data-loop") === "true",
				focusOnSelect: 	$slickItem.attr('data-focus-select') || true,
				arrows: 		$slickItem.attr("data-arrows") === "true",
				swipe: 			$slickItem.attr("data-swipe") === "true",
				autoplay: 		$slickItem.attr("data-autoplay") === "true",
				centerMode: 	$slickItem.attr("data-center-mode") === "true",
				fade: 			$slickItem.attr("data-slide-effect") === "true",
				centerPadding:  $slickItem.attr("data-center-padding") ? $slickItem.attr("data-center-padding") : '0.50',
				mobileFirst: 	true,
				appendArrows: 	$slickItem.attr("data-arrows-class") || $slickItem,

				nextArrow: '<button type="button" class="slick-next"></button>',
				prevArrow: '<button type="button" class="slick-prev"></button>',

				responsive: [
					{
						breakpoint: 0,
						settings: {
							slidesToShow: parseInt($slickItem.attr('data-items'), 10) || 1,
							vertical: $slickItem.attr('data-vertical') === 'true' || false,
						}
					},
					{
						breakpoint: 575,
						settings: {
							slidesToShow: parseInt($slickItem.attr('data-sm-items'), 10) || 1,
							vertical: $slickItem.attr('data-sm-vertical') === 'true' || false,
						}
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: parseInt($slickItem.attr('data-md-items'), 10) || 1,
							vertical: $slickItem.attr('data-md-vertical') === 'true' || false,
						}
					},
					{
						breakpoint: 991,
						settings: {
							slidesToShow: parseInt($slickItem.attr('data-lg-items'), 10) || 1,
							vertical: $slickItem.attr('data-lg-vertical') === 'true' || false,
						}
					},
					{
						breakpoint: 1199,
						settings: {
							slidesToShow: parseInt($slickItem.attr('data-xl-items'), 10) || 1,
							vertical: $slickItem.attr('data-xl-vertical') === 'true' || false,
						}
					},
					{
						breakpoint: 1599,
						settings: {
							slidesToShow: parseInt($slickItem.attr('data-xxl-items'), 10) || 1,
							vertical: $slickItem.attr('data-xxl-vertical') === 'true' || false,
						}
					}
				]

			} ) .on('afterChange', function( event, slick, currentSlide, nextSlide ) {

				let $this = $(this),
					childCarousel = $this.attr('data-child');

				if( childCarousel ) {

					$(childCarousel + ' .slick-slide').removeClass('slick-current');
					$(childCarousel + ' .slick-slide').eq(currentSlide).addClass('slick-current');

				}
			} );
		} );

		$( '.select2' ).each( function( idx ) {

			let $select = $(this);

			$select.select2( {

				dropdownParent:          $select.parent(),
				placeholder:             $select.attr( 'data-placeholder' ) 				|| null,
				minimumResultsForSearch: $select.attr( 'data-minimum-results-search' ) 	|| Infinity,
				containerCssClass:       $select.attr( 'data-container-class' ) 			|| null,
				dropdownCssClass:        $select.attr( 'data-dropdown-class' ) 			|| null

			} );
		} );
		
		$( '[data-custom-toggle]' ).each( function( idx ) {

			let $this = $(this);

			$this.on( 'click', $.proxy( function( event ) {

				$( this.getAttribute('data-custom-toggle') ).add( this ).toggleClass( 'active' );
				event.preventDefault();

			} , $this ) );

			if( $this.attr("data-custom-toggle-hide-on-blur") === "true" ) {
				
				$body.on("click", $this, function( e ) {

					if( e.target !== e.data[0]
						&& $(e.data.attr('data-custom-toggle')).find($(e.target)).length
						&& !e.data.find($(e.target)).length
					) {
						$(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
					}
				})
			}

			if( $this.attr("data-custom-toggle-disable-on-blur") === "true" ) {

				$body.on("click", $this, function( e ) {

					if( e.target !== e.data[0] 
						&& !$(e.data.attr('data-custom-toggle')).find($(e.target)).length
						&& !e.data.find($(e.target)).length
					) {
						$(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
					}
				})
			}
		} );

		if( swipers ){

			for( let i = 0; i < swipers.length; i++ ) {

				let sliderMarkup = swipers[ i ];
				
				let autoplayAttr = sliderMarkup.getAttribute('data-autoplay') || 5000,
					slides 		 = sliderMarkup.querySelectorAll('.swiper-slide'),
					options 	 = {

						loop: 			sliderMarkup.getAttribute('data-loop') === 'true' || false,
						effect: 		sliderMarkup.getAttribute('data-effect') || 'slide',
						direction: 		sliderMarkup.getAttribute('data-direction') || 'horizontal',
						speed: 			sliderMarkup.getAttribute('data-speed') ? Number( sliderMarkup.getAttribute( 'data-speed' ) ) : 600,
						simulateTouch: 	sliderMarkup.getAttribute('data-simulate-touch') === 'true' || false,
						slidesPerView: 	sliderMarkup.getAttribute('data-slides') || 1,
						spaceBetween: 	Number(sliderMarkup.getAttribute('data-margin')) || 0,

					};
				
				if( Number( autoplayAttr ) )
					options.autoplay = { delay: Number( autoplayAttr ), stopOnLastSlide: false, disableOnInteraction: true, reverseDirection: false };
				
				if( sliderMarkup.querySelector( '.swiper-button-next, .swiper-button-prev' ) )
					options.navigation = { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' };
				
				if( sliderMarkup.querySelector( '.swiper-pagination' ) )
					options.pagination = { el: '.swiper-pagination', type: 'bullets', clickable: true };
			
				for (var s = 0; s < slides.length; s++) {

					let slide = slides[s], url = slide.getAttribute( 'data-slide-bg' );
					if( url ) 
						slide.style.backgroundImage = 'url(' + url + ')';

				}

				swipers[ i ].swiper = new Swiper( sliderMarkup, options );

			}
		}
		
		$( '.tabs-custom' ).each( function( idx ) {
			
			let $this = $(this);

			if( $this.find('.slick-slider').length ) {

				$this.find( '.tabs-custom-list > li > a' ).on( 'click', $.proxy( function() {

					setTimeout( () => $this.find('.tab-content .tab-pane.active .slick-slider').slick('setPosition'), 300 );

				}, $this ) );
			}
		} );
		
		$( '.owl-carousel' ).each( function( idx ) {

			let c = $(this);

			let aliaces = ["-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"],
				values = [0, 576, 768, 992, 1200, 1600],
				responsive = {};

			for( let j = 0; j < values.length; j++ ) {

				let newrespon = {};

				responsive[ values[ j ] ] = newrespon;

				for( let k = j; k >= -1; k-- ) {

					let aliace = aliaces[ k ];

					if( !newrespon.items && c.attr( "data" + aliace + "items" ) )
						newrespon.items = k < 0 ? 1 : parseInt( c.attr( "data" + aliace + "items" ), 10 );

					if(!newrespon.stagePadding && newrespon.stagePadding !== 0 && c.attr( "data" + aliace + "stage-padding" ) )
						newrespon.stagePadding = k < 0 ? 0 : parseInt( c.attr( "data" + aliace + "stage-padding" ), 10 );

					if( !newrespon.margin && newrespon.margin !== 0 && c.attr( "data" + aliace + "margin" ) )
						newrespon.margin = k < 0 ? 30 : parseInt( c.attr("data" + aliace + "margin" ), 10 );

				}
			}

			c.owlCarousel( {

				autoplay: 		c.attr("data-autoplay") === "true",
				loop: 			c.attr("data-loop") !== "false",
				items: 			1,
				center: 		c.attr("data-center") === "true",
				dotsContainer: 	c.attr("data-pagination-class") || false,
				navContainer: 	c.attr("data-navigation-class") || false,
				mouseDrag:		c.attr("data-mouse-drag") !== "false",
				nav: 			c.attr("data-nav") === "true",
				dots: 			c.attr("data-dots") === "true",
				dotsEach: 		c.attr("data-dots-each") ? parseInt(c.attr("data-dots-each"), 10) : false,
				animateIn: 		c.attr('data-animation-in') ? c.attr('data-animation-in') : false,
				animateOut: 	c.attr('data-animation-out') ? c.attr('data-animation-out') : false,
				responsive: 	responsive,
				smartSpeed: 	c.attr('data-smart-speed') ? c.attr('data-smart-speed') : 250,
				navText: 		c.attr("data-nav-text") ? $.parseJSON( c.attr( "data-nav-text" ) ) : [],
				navClass: 		c.attr("data-nav-class") ? $.parseJSON( c.attr( "data-nav-class" ) ) : ['owl-prev', 'owl-next']

			} );
		} );

		if( $navbar.length ) {
			
			let aliaces, i, j, len, value, values, responsive;
			
			aliaces = ["-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"];
			values = [0, 576, 768, 992, 1200, 1600];
			responsive = {};
			
			for( i = j = 0, len = values.length; j < len; i = ++j ) {

				let newrespon = {}, aliace = aliaces[ i ];

				value = values[ i ]; responsive[ value ] = newrespon;
				
				if( $navbar.attr( 'data' + aliace + 'layout' ) )
					newrespon.layout = $navbar.attr( 'data' + aliace + 'layout');
				
				if( $navbar.attr( 'data' + aliace + 'device-layout' ) )
					newrespon.deviceLayout = $navbar.attr( 'data' + aliace + 'device-layout' );
				
				if( $navbar.attr( 'data' + aliace + 'hover-on' ) )
					newrespon.focusOnHover = $navbar.attr( 'data' + aliace + 'hover-on' ) === 'true';
				
				if( $navbar.attr( 'data' + aliace + 'auto-height' ) )
					newrespon.autoHeight = $navbar.attr( 'data' + aliace + 'auto-height' ) === 'true';

				if( $navbar.attr( 'data' + aliace + 'stick-up' ) )
					newrespon.stickUp = $navbar.attr( 'data' + aliace + 'stick-up') === 'true';
				
				if( $navbar.attr( 'data' + aliace + 'stick-up-offset' ) )
					newrespon.stickUpOffset = $navbar.attr( 'data' + aliace + 'stick-up-offset' );

			}

			$navbar.RDNavbar( {

				anchorNav: 		true,
				stickUpClone: 	$navbar.attr("data-stick-up-clone") === 'true',
				responsive: 	responsive,
				callbacks: {
					
					onStuck: 		function() { this.$element.find( '.rd-search input' ).val('').trigger( 'propertychange' ) },
					onDropdownOver: function() { return true },

					onUnstuck: function() {
						
						if( !this.$clone )
							return;

						this.$clone.find( '.rd-search input' ).val('').trigger( 'propertychange' ).trigger( 'blur' );

					}
				}

			} );
		}

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

			$(this).lightGallery( { selector: "this", counter: false } );

		} );
	} );
}());
