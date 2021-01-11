/*!
 * Additional Theme Methods
 *
 * Snakepit 1.2.7
 */
/* jshint -W062 */

/* global SnakepitParams, SnakepitUi, WVC, Cookies, Event, WVCParams, CountUp */
var Snakepit = function( $ ) {

	'use strict';

	return {
		initFlag : false,
		isEdge : ( navigator.userAgent.match( /(Edge)/i ) ) ? true : false,
		isWVC : 'undefined' !== typeof WVC,
		isMobile : ( navigator.userAgent.match( /(iPad)|(iPhone)|(iPod)|(Android)|(PlayBook)|(BB10)|(BlackBerry)|(Opera Mini)|(IEMobile)|(webOS)|(MeeGo)/i ) ) ? true : false,
		loaded : false,
		hasScrolled : false,

		/**
		 * Init all functions
		 */
		init : function () {

			if ( this.initFlag ) {
				return;
			}

			var _this = this;

			$( '.site-content' ).find( '.wvc-parent-row:first-of-type' ).addClass( 'first-section' );

			this.addIntroClass( $( window ).scrollTop() );
			this.scrollDownWheel();
			this.menuOffset();
			//this.wcLiveSearch();
			this.quickView();
			this.loginPopup();
			this.stickyProductDetails();
			this.transitionCosmetic();
			//this.cursor();
			//this.offGridReleasesParallax();
			this.cursorFollowingTitle();
			this.WCQuantity();
			this.interactiveLinks();

			this.isMobile = SnakepitParams.isMobile;

			if ( this.isWVC ) {
				
			}

			// Resize event
			$( window ).resize( function() {
				_this.menuOffset( true );
			} ).resize();


			$( window ).scroll( function() {
				var scrollTop = $( window ).scrollTop();
				_this.addIntroClass( scrollTop );
				_this.backToTopSkin( scrollTop );
			} );

			this.initFlag = true;
		},

		scrollDownWheel : function() {

			var _this = this;

			if ( ! this.isMobile && $( 'body' ).hasClass( 'hero-mousewheel' ) && 1300 < $( window ).width() && 700 < $( window ).height() && 1 < $( '.wvc-parent-row' ).length ) {
				$( '.first-section' ).bind( 'mousewheel', function( e ) {
					e.preventDefault();
					_this.manageWheel( e );
					return _this.hasScrolled;
				} );
			}
		},

		manageWheel : function ( e ) {

			var _this = this;

			if ( ! this.isMobile && $( 'body' ).hasClass( 'hero-mousewheel' ) && 1300 < $( window ).width() && 700 < $( window ).height() && 1 < $( '.wvc-parent-row' ).length ) {
				
				if ( 0 > e.deltaY ) {

					WVC.scrollToNextSection( $( '.first-section' ), function() {
						
						_this.hasScrolled = true;
						_this.scrollDownWheel();
						
						//console.log( 'done' );
					} );
				}
			}
		},

		setCursorTitles : function() {
			
			if ( this.isMobile ) {
				return;
			}

			$( '.hover-effect-cursor .entry' ).each( function() {

				var $item = $( this ),
					$title = $item.find( '.entry-summary' );

				$title.addClass( 'entry-summary-cursor' ).detach().prependTo( 'body' );

				$title.find( 'a' ).contents().unwrap(); // strip tags
			} );
		},

		/**
		 * Title following cursor effect
		 */
		cursorFollowingTitle : function () {

			if ( this.isMobile ) {
				return;
			}

			$( '.hover-effect-cursor .entry' ).each( function() {

				var $item = $( this ),
					$title = $item.find( '.entry-summary' );

				$title.addClass( 'entry-summary-cursor' ).detach().prependTo( 'body' );

				$title.find( 'a' ).contents().unwrap(); // strip tags

				$item.on( 'mousemove', function( e ) {
					$title.css( {
						top: e.clientY,
						left: e.clientX
					} );
				} );

				$item.on( 'mouseenter', function() {
					$title.addClass( 'tip-is-active' );

				} ).on( 'mouseleave', function() {
					$title.removeClass( 'tip-is-active' );
				} );

				$( window ).scroll( function() {
					if ( $title.hasClass( 'tip-is-active' ) && ( $title.offset().top < $item.offset().top || $title.offset().top > $item.offset().top + $item.outerHeight() ) ) {
						$title.removeClass( 'tip-is-active' );
					}
				} );
			} );
		},
		
		/**
		 * Add a specific class when we're at the top of the page in full window header mode
		 */
		menuOffset : function ( resize ) {

			resize = resize || false;

			var delay = 0;

			if ( resize ) {
				delay = 1000;
			}

			if ( $( 'body' ).hasClass( 'menu-offset-auto' ) ) {
				var firstRowHeight = $( '#content' ).find( '.wvc-parent-row:first-of-type' ).outerHeight();

				setTimeout( function() {
					$( 'body.menu-offset-auto.desktop .nav-bar' ).css( {
						'top' :  + ( firstRowHeight - 88 ) + 'px'
					} );

					$( 'body.menu-offset-auto.breakpoint .nav-bar' ).css( {
						'top' :  + ( firstRowHeight - 66 ) + 'px'
					} );
				}, delay );
				
				SnakepitParams.menuOffset = firstRowHeight;
			}
		},

		/**
		 * Add a specific class when we're at the top of the page in full window header mode
		 */
		addIntroClass : function ( scrollTop ) {

			var _this = this;

			if ( 350 < parseInt( SnakepitParams.menuOffset, 10 ) || '100%' === SnakepitParams.menuOffset ) {

				if ( scrollTop <  200 ) {
					$( 'body' ).addClass( 'intro' );
				} else {
					$( 'body' ).removeClass( 'intro' );
				}
			}

			if ( scrollTop === 0 ) {
				_this.hasScrolled = false;
				_this.scrollDownWheel();
			} else {
				_this.hasScrolled = true;
			}
		},

		/**
		 * WC live search
		 */
		wcLiveSearch : function () {
			$( '.wvc-wc-search-form' ).addClass( 'live-search-form' ).append( '<span style="display:none" class="fa search-form-loader fa-circle-o-notch fa-spin hide"></span>' );

			SnakepitUi.liveSearch();
		},

		/**
		 * Product quickview
		 */
		quickView : function () {

			$( document ).on( 'added_to_cart', function( event, fragments, cart_hash, $button ) {
				if ( $button.hasClass( 'product-add-to-cart' ) ) {
					//console.log( 'good?' );
					$button.attr( 'href', SnakepitParams.WooCommerceCartUrl );
					$button.find( 'span' ).attr( 'title', SnakepitParams.l10n.viewCart );
					$button.removeClass( 'ajax_add_to_cart' );
				}
			} );
		},

		/**
		 * Sticky product layout
		 */
		stickyProductDetails : function() {
			if ( $.isFunction( $.fn.stick_in_parent ) ) {
				if ( $( 'body' ).hasClass( 'sticky-product-details' ) ) {
					$( '.entry-single-product .summary' ).stick_in_parent( {
						offset_top : parseInt( SnakepitParams.portfolioSidebarOffsetTop, 10 ) + 40
					} );
				}
			}
		},

		/**
		 * Check back to top color
		 */
		backToTopSkin : function( scrollTop ) {
			
			if ( scrollTop < 550 ) {
				return;
			}

			$( '.wvc-row' ).each( function() {

				if ( $( this ).hasClass( 'wvc-font-light' ) && ! $( this ).hasClass( 'wvc-row-bg-transparent' ) ) {

						var $button = $( '#back-to-top' ),
						buttonOffset = $button.position().top + $button.width() / 2 ,
						sectionTop = $( this ).offset().top - scrollTop,
						sectionBottom = sectionTop + $( this ).outerHeight();

					if ( sectionTop < buttonOffset && sectionBottom > buttonOffset ) {
						$button.addClass( 'back-to-top-light' );
					} else {
						$button.removeClass( 'back-to-top-light' );
					}
				}
			} );
		},

		loginPopup : function() {

			var $body = $( 'body' );

			$( document ).on( 'click', '.account-item-icon-user-not-logged-in, .close-loginform-button', function( event ) {
				event.preventDefault();

				if ( $body.hasClass( 'loginform-popup-toggle' ) ) {

					$body.removeClass( 'loginform-popup-toggle' );

				} else {
					
					$body.removeClass( 'overlay-menu-toggle' );

					if ( $( '.wvc-login-form' ).length ) {

						$body.addClass( 'loginform-popup-toggle' );

					} else {
						/* AJAX call */
						$.post( SnakepitParams.ajaxUrl, { action : 'snakepit_ajax_get_wc_login_form' }, function( response ) {
							
							console.log( response );

							if ( response ) {

								$( '#loginform-overlay-content' ).append( response );

								$body.addClass( 'loginform-popup-toggle' );
							}
						} );
					}
				}
			} );

			if ( ! this.isMobile ) {

				$( document ).mouseup( function( event ) {

					if ( 1 !== event.which ) {
						return;
					}

					var $container = $( '#loginform-overlay-content' );

					if ( ! $container.is( event.target ) && $container.has( event.target ).length === 0 ) {
						$body.removeClass( 'loginform-popup-toggle' );
					}
				} );
			}
		},

		/**
		 * https://stackoverflow.com/questions/48953897/create-a-custom-quantity-field-in-woocommerce
		 */
		WCQuantity : function () {
			
			$( document ).on( 'click', '.wt-quantity-minus', function( event ) {

				event.preventDefault();
				var $input = $( this ).parent().find( 'input.qty' ),
					val = parseInt( $input.val(), 10 ),
					step = $input.attr( 'step' );
				step = 'undefined' !== typeof( step ) ? parseInt( step ) : 1;
				
				if ( val > 1 ) {
					$input.val( val - step ).change();
				}
			} );
			
			$( document ).on( 'click', '.wt-quantity-plus', function( event ) {
				event.preventDefault();

				var $input = $( this ).parent().find( 'input.qty' ),
					val = parseInt( $input.val(), 10),
					step = $input.attr( 'step' );
				step = 'undefined' !== typeof( step ) ? parseInt( step ) : 1;
				$input.val( val + step ).change();
			} );
		},

		/**
		 * IL carousel
		 */
		interactiveLinks : function() {
			var $carousel = $( '.wvc-interactive-links-content' );

			$carousel.flickity( {
				freeScroll: true,
				prevNextButtons: false,
				pageDots: false,
				groupCells: true,
				//wrapAround: true,
				cellSelector: '.wvc-interactive-link-item'
			
			// Disable lightbox on drag
			} ).on( 'dragStart.flickity', function() {

				$carousel.find( 'a' ).addClass( 'wvc-disabled' );

			} ).on( 'dragEnd.flickity', function() {

				setTimeout( function() {
					$carousel.find( 'a' ).removeClass( 'wvc-disabled' );
				}, 1000 ); // wait before re-enabling link
			} );
		},

		/**
		 * Overlay transition
		 */
		transitionCosmetic : function() {

			var _this = this;

			$( document ).on( 'click', '.internal-link:not(.disabled)', function( event ) {

				if ( ! event.ctrlKey ) {

					event.preventDefault();

					var $link = $( this );

					$( 'body' ).removeClass( 'mobile-menu-toggle overlay-menu-toggle offcanvas-menu-toggle loginform-popup-toggle lateral-menu-toggle' );
					$( 'body' ).addClass( 'loading transitioning' );

					Cookies.set( SnakepitParams.themeSlug + '_session_loaded', true, { expires: null } );

					if ( $( '#snakepit-loader-overlay-panel' ).length ) {

						$( '#snakepit-loader-overlay-panel' ).one( SnakepitUi.transitionEventEnd(), function() {
							Cookies.remove( SnakepitParams.themeSlug + '_session_loaded' );
							window.location = $link.attr( 'href' );
						} );

					} else if ( $( '.snakepit-loading-overlay' ).length && ! $( '#snakepit-loader-overlay-panel' ).length ) {
						
						$( '.snakepit-loading-overlay' ).one( SnakepitUi.transitionEventEnd(), function() {
							Cookies.remove( SnakepitParams.themeSlug + '_session_loaded' );
							window.location = $link.attr( 'href' );
						} );
					
					} else {
						window.location = $link.attr( 'href' );
					}
				}
			} );
		},

                /**
                 * Page Load
                 */
                loadingAnimation : function () {

                	var _this = this,
                		delay = 50;

                	if ( $( '.snakepit-loading-line' ).length ) {
                		delay = 1000;
                	}

			setTimeout( function() {

				$( 'body' ).addClass( 'loaded' );

				$( '.snakepit-loading-line-aux' ).css( {
					'width' : $( window ).width() - $( '#snakepit-loading-line-1' ).width()
				} );

				if ( $( '.snakepit-loading-line-aux' ).length ) {

					$( '.snakepit-loading-line-aux' ).one( SnakepitUi.transitionEventEnd(), function() {

						$( 'body' ).addClass( 'progress-bar-full' );

						$( '.snakepit-loading-block' ).css( {
							'height' : '100%'
						} );

						$( '#snakepit-loading-before' ).one( SnakepitUi.transitionEventEnd(), function() {

							$( 'body' ).addClass( 'reveal' );

							$( '.snakepit-loader-overlay' ).one( SnakepitUi.transitionEventEnd(), function() {

								_this.fireContent();

								$( 'body' ).addClass( 'one-sec-loaded' );

								setTimeout( function() {

									$( '.snakepit-loading-line-aux' ).removeAttr( 'style' );
									$( '#snakepit-loading-before' ).removeAttr( 'style' );
									$( '#snakepit-loading-after' ).removeAttr( 'style' );

									SnakepitUi.videoThumbnailPlayOnHover();
								}, 100 );
							} );
						} );
					} );

				} else if ( $( '.snakepit-loader-overlay' ).length ) {

					$( 'body' ).addClass( 'reveal' );

					$( '.snakepit-loader-overlay' ).one( SnakepitUi.transitionEventEnd(), function() {

						_this.fireContent();

						setTimeout( function() {

							$( 'body' ).addClass( 'one-sec-loaded' );

							SnakepitUi.videoThumbnailPlayOnHover();
						}, 100 );
					} );
				} else {

					$( 'body' ).addClass( 'reveal' );

					_this.fireContent();

					setTimeout( function() {

						$( 'body' ).addClass( 'one-sec-loaded' );

						SnakepitUi.videoThumbnailPlayOnHover();
					}, 100 );
				}
			}, delay );
                },

                fireContent : function () {
			// Animate
			$( window ).trigger( 'page_loaded' );
			SnakepitUi.wowAnimate();
			window.dispatchEvent( new Event( 'resize' ) );
			window.dispatchEvent( new Event( 'scroll' ) ); // Force WOW effect
			$( window ).trigger( 'just_loaded' );
			$( 'body' ).addClass( 'one-sec-loaded' );
                }
	};

}( jQuery );

( function( $ ) {

	'use strict';

	$( document ).ready( function() {
		Snakepit.init();
	} );

	$( window ).load( function() {
		Snakepit.loadingAnimation();
	} );

	$( window ).on( 'wolf_ajax_loaded', function() {
		Snakepit.loadingAnimation();
	} );

} )( jQuery );