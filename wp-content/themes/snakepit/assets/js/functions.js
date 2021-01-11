/*!
 * Main Theme Methods
 *
 * Snakepit 1.2.7
 */
/* jshint -W062 */
/* global SnakepitParams, WOW, AOS, WVC, Cookies, Event, objectFitImages, WVCBigText, WVCParams, SnakepitYTVideoBg, Vimeo */

var SnakepitUi = (function ($) {
	'use strict';

	return {
		isWVC: 'undefined' !== typeof WVC,
		lastScrollTop: 0,
		timer: null,
		clock: 0,
		initFlag: false,
		debugLoader: false,
		defaultHeroFont: 'light',
		isEdge: navigator.userAgent.match(/(Edge)/i) ? true : false,
		isMobile: navigator.userAgent.match(
			/(iPad)|(iPhone)|(iPod)|(Android)|(PlayBook)|(BB10)|(BlackBerry)|(Opera Mini)|(IEMobile)|(webOS)|(MeeGo)/i
		)
			? true
			: false,
		isApple:
			navigator.userAgent.match(/(Safari)|(iPad)|(iPhone)|(iPod)/i) &&
			navigator.userAgent.indexOf('Chrome') === -1 &&
			navigator.userAgent.indexOf('Android') === -1
				? true
				: false,
		isTouch:
			'ontouchstart' in window ||
			(window.DocumentTouch && document instanceof DocumentTouch),
		debounceTimer: null,
		debounceTime: 200,
		allowScrollEvent: true,

		mobileScreenBreakpoint: 499,
		tabletScreenBreakpoint: 768, // mobile max
		notebookScreenBreakpoint: 1024, // tablet max
		desktopScreenBreakpoint: 1224, // notebook max
		desktopBigScreenBreakpoint: 1690, // desktop > big

		/**
		 * Init all functions
		 */
		init: function () {
			this.isMobile = SnakepitParams.isMobile;
			this.mobileScreenBreakpoint =
				SnakepitParams.mobileScreenBreakpoint;
			this.tabletScreenBreakpoint =
				SnakepitParams.tabletScreenBreakpoint;
			this.notebookScreenBreakpoint =
				SnakepitParams.notebookScreenBreakpoint;
			this.desktopScreenBreakpoint =
				SnakepitParams.desktopScreenBreakpoint;
			this.desktopBigScreenBreakpoint =
				SnakepitParams.desktopBigScreenBreakpoint;

			if (this.initFlag) {
				return;
			}

			var _this = this;

			this.setScreenClasses();

			this.loadingAnimation();

			this.centeredLogo();
			this.svgLogo();
			this.centeredLogoOffset();

			this.setClasses();

			this.fluidVideos();
			this.resizeVideoBackground();

			this.muteVimeoBackgrounds();

			this.parallax();

			this.flexSlider();

			this.lightbox();

			this.animateAnchorLinks();
			this.heroScrollDownArrow();

			this.lazyLoad();

			this.addItemAnimationDelay();

			/* Portfolio */
			this.stickyElements();
			this.adjustSidebarPadding();

			/* Menu functions */
			this.megaMenuWrapper();
			this.megaMenuTagline();
			this.menuDropDown();
			this.subMenuDropDown();
			this.subMenuDirection();
			this.toggleMenu();

			this.toggleSearchForm();
			this.liveSearch();

			this.footerPageMarginBottom();

			this.isolateScroll();

			this.tooltipsy();

			this.setInternalLinkClass();
			this.transitionCosmetic();

			this.pausePlayersButton();

			this.adjustmentClasses();

			this.photoSizesOptionToggle();
			this.minimalPlayer();
			this.navPlayer();
			this.loopPostPlayer();

			this.setEventSizeClass();

			this.wvcfullPageEvents();

			this.artistTabs();

			this.topLink();

			this.wvcEventCallback();

			this.topbarClose();
			$(window)
				.resize(function () {
					_this.setScreenClasses();
					_this.subMenuDirection();
					_this.resizeVideoBackground();
					_this.mobileMenuBreakPoint();
					_this.footerPageMarginBottom();
					_this.setEventSizeClass();
				})
				.resize();
			$(window).scroll(function () {
				var scrollTop = $(window).scrollTop();
				_this.stickyMenu(scrollTop);

				if (_this.allowScrollEvent) {
					if (_this.debounceTimer) {
						window.clearTimeout(_this.debounceTimer);
					}
					_this.debounceTimer = window.setTimeout(function () {
						_this.setActiveOnePageMenuItem(scrollTop);
						_this.topLinkAnimation(scrollTop);
					}, _this.debounceTime);
				}
			});

			_this.initFlag = true;

			$(window).bind('pageshow', function (event) {
				if (event.originalEvent.persisted) {
					window.location.reload();
				}
			});
		},

		/**
		 * Set body classes depending on screen size
		 *
		 * Allow to filter values
		 */
		setScreenClasses: function () {
			var winWidth = $(window).width(),
				$body = $('body'),
				breakpoints = [
					[
						'desktop-screen desktop-big-screen',
						this.desktopBigScreenBreakpoint,
					],
					['desktop-screen', this.desktopScreenBreakpoint],
					['notebook-screen', this.notebookScreenBreakpoint],
					['tablet-screen', this.tabletScreenBreakpoint],
					['mobile-screen', this.mobileScreenBreakpoint],
				],
				allClasses =
					'desktop-screen desktop-big-screen notebook-screen tablet-screen mobile-screen';

			$body.removeClass(allClasses);

			if (winWidth < this.mobileScreenBreakpoint) {
				$body.addClass('mobile-screen');
			} else if (
				winWidth > this.mobileScreenBreakpoint &&
				winWidth <= this.tabletScreenBreakpoint
			) {
				$body.addClass('tablet-screen');
			} else if (
				winWidth > this.tabletScreenBreakpoint &&
				winWidth <= this.notebookScreenBreakpoint
			) {
				$body.addClass('notebook-screen');
			} else if (
				winWidth > this.notebookScreenBreakpoint &&
				winWidth <= this.desktopBigScreenBreakpoint
			) {
				$body.addClass('desktop-screen');
			} else if (winWidth > this.desktopBigScreenBreakpoint) {
				$body.addClass('desktop-screen desktop-big-screen');
			}
		},

		/**
		 * Screen classes
		 */
		setScreenClassesBak: function () {
			var $windowWidth = $(window).width(),
				$body = $('body');

			if ($windowWidth > this.desktopBigScreenBreakpoint) {
				$body.removeClass(
					'notebook-screen tablet-screen mobile-screen'
				);
				$body.addClass('desktop-screen desktop-big-screen');
			} else if (
				$windowWidth > this.desktopScreenBreakpoint &&
				$windowWidth < this.desktopBigScreenBreakpoint
			) {
				$body.removeClass(
					'desktop-big-screen desktop-screen notebook-screen tablet-screen mobile-screen'
				);
				$body.addClass('desktop-screen');
			} else if (
				$windowWidth > this.notebookScreenBreakpoint &&
				$windowWidth < this.desktopScreenBreakpoint
			) {
				$body.removeClass(
					'desktop-big-screen desktop-screen notebook-screen tablet-screen mobile-screen'
				);
				$body.addClass('notebook-screen');
			} else if (
				$windowWidth > this.tabletScreenBreakpoint &&
				$windowWidth < this.notebookScreenBreakpoint
			) {
				$body.removeClass(
					'desktop-big-screen desktop-screen notebook-screen tablet-screen mobile-screen'
				);
				$body.addClass('tablet-screen');
			} else if ($windowWidth < this.mobileScreenBreakpoint) {
				$body.removeClass(
					'desktop-big-screen desktop-screen notebook-screen tablet-screen mobile-screen'
				);
				$body.addClass('mobile-screen');
			}
		},

		/**
		 * Set body classes
		 */
		setClasses: function () {
			if (this.isTouch) {
				$('html').addClass('touch');
			} else {
				$('html').addClass('no-touch');
			}

			if (this.isMobile) {
				$('body').addClass('is-mobile');
			} else {
				$('body').addClass('not-mobile');
			}

			if (
				(this.isMobile || 800 > $(window).width()) &&
				!SnakepitParams.forceAnimationMobile
			) {
				$('body').addClass('no-animations');
			}

			if (this.isApple) {
				$('body').addClass('is-apple');
			}

			if ($('#secondary').length) {
				$('body').addClass('has-secondary');
			} else {
				$('body').addClass('no-secondary');
			}
		},

		/**
		 * Detect transition ending
		 */
		transitionEventEnd: function () {
			var t,
				el = document.createElement('transitionDetector'),
				transEndEventNames = {
					WebkitTransition: 'webkitTransitionEnd', // Saf 6, Android Browser
					MozTransition: 'transitionend', // only for FF < 15
					transition: 'transitionend', // IE10, Opera, Chrome, FF 15+, Saf 7+
				};

			for (t in transEndEventNames) {
				if (el.style[t] !== undefined) {
					return transEndEventNames[t];
				}
			}
		},

		/**
		 * Detect animation ending
		 */
		animationEventEnd: function () {
			var t,
				el = document.createElement('animationDetector'),
				animations = {
					animation: 'animationend',
					OAnimation: 'oAnimationEnd',
					MozAnimation: 'animationend',
					WebkitAnimation: 'webkitAnimationEnd',
				};

			for (t in animations) {
				if (el.style[t] !== undefined) {
					return animations[t];
				}
			}
		},

		/**
		 * Loading overlay animation
		 */
		loadingAnimation: function () {
			if (!SnakepitParams.defaultPageLoadingAnimation) {
				return false;
			}

			var _this = this;
			_this.timer = setInterval(function () {
				_this.clock++;

				/**
				 * If the loading time last more than n sec, we hide the overlay anyway
				 * An iframe such as a video or a google map probably takes too much time to load
				 * So let's show the page
				 */
				if (5 === _this.clock) {
					_this.hideLoader();
				}
			}, 1000);
		},

		/**
		 * Convert SVG logo image to inline SVG
		 */
		svgLogo: function () {
			$('img.svg').each(function () {
				var $img = $(this),
					imgID = $img.attr('id'),
					imgClass = $img.attr('class'),
					imgURL = $img.attr('src'),
					$svg;

				$.get(
					imgURL,
					function (data) {
						$svg = $(data).find('svg');

						if (typeof imgID !== 'undefined') {
							$svg = $svg.attr('id', imgID);
						}

						if (typeof imgClass !== 'undefined') {
							$svg = $svg.attr(
								'class',
								imgClass + ' replaced-svg'
							);
						}

						$svg = $svg.removeAttr('xmlns:a');
						$img.replaceWith($svg);
					},
					'xml'
				);
			});
		},

		/**
		 * Add resized event
		 */
		addResizedEvent: function () {
			var resize_timeout;

			$(window).on('resize orientationchange', function () {
				clearTimeout(resize_timeout);

				resize_timeout = setTimeout(function () {
					$(window).trigger('resized');
				}, 250);
			});
		},

		/**
		 * Sticky Portfolio Sidebar
		 */
		stickyElements: function () {
			if ($.isFunction($.fn.stick_in_parent)) {
				if (
					$('body').hasClass('single-work-layout-sidebar-left') ||
					$('body').hasClass('single-work-layout-sidebar-right')
				) {
					$('.work-info-container').stick_in_parent({
						offset_top: parseInt(
							SnakepitParams.portfolioSidebarOffsetTop,
							10
						),
					});
				}
			}
		},

		/**
		 * Adjust sidebar padding depending on WVC row padding
		 */
		adjustSidebarPadding: function () {
			if ($('body').hasClass('wolf-visual-composer')) {
				if (
					$('body').hasClass('single-work-layout-sidebar-left') ||
					$('body').hasClass('single-work-layout-sidebar-right')
				) {
					if ($('.wvc-row').length) {
						var paddingTop = $('.wvc-row')
								.first()
								.css('padding-top'),
							paddingBottom = $('.wvc-row')
								.last()
								.css('padding-top');

						if (50 <= parseInt(paddingTop, 10)) {
							$('.work-info-container').css({
								'padding-top': paddingTop,
							});
						}

						if (50 <= parseInt(paddingBottom, 10)) {
							$('.work-info-container').css({
								'padding-bottom': paddingBottom,
							});
						}
					}
				}
			}
		},

		/**
		 *  Add a mobileMenuBreakpoint class for mobile
		 */
		mobileMenuBreakPoint: function () {
			var $body = $('body'),
				winWidth = $(window).width(),
				breakpoint = SnakepitParams.breakPoint;

			if (breakpoint > winWidth) {
				$body.addClass('breakpoint');
				$body.removeClass('desktop');
				$body.removeClass('offcanvas-menu-toggle');
				$body.removeClass('overlay-menu-toggle');
				$body.removeClass('lateral-menu-toggle');
				$body.removeClass('side-panel-toggle');

				$(window).trigger('snakepit_breakpoint');
			} else {
				$body.removeClass('breakpoint');
				$body.removeClass('mobile-menu-toggle'); // close mobile menu if open
				$body.addClass('desktop');
			}

			if (800 > winWidth) {
				$body.addClass('mobile');
			} else {
				$body.removeClass('mobile');
			}
		},

		/**
		 * Change 2nd level sub menu direction if it's off screen
		 */
		subMenuDirection: function () {
			var $this,
				subMenuWidth = parseInt(SnakepitParams.subMenuWidth, 10),
				bleed = 8;

			$(
				'#site-navigation-primary-desktop > li.menu-parent-item:not(.mega-menu)'
			).each(function () {
				$this = $(this);

				if (
					$this.offset().left + bleed + subMenuWidth * 2 >
					$(window).width()
				) {
					$this.addClass('has-reversed-sub-menu');
					$this
						.find('ul.sub-menu')
						.first()
						.addClass('reversed-first-level-sub-menu');
					$this
						.find('> ul.sub-menu li > ul.sub-menu')
						.addClass('reversed-sub-menu');
				}
			});
		},

		/**
		 * Resize Video Background
		 */
		resizeVideoBackground: function () {
			var videoContainer = $('.video-bg-container');

			videoContainer.each(function () {
				var videoContainer = $(this),
					containerWidth = videoContainer.width(),
					containerHeight = videoContainer.height(),
					ratioWidth = 640,
					ratioHeight = 360,
					$video = $(this).find('.video-bg'),
					newHeight,
					newWidth,
					newMarginLeft,
					newMarginTop,
					newCss;

				if (videoContainer.hasClass('youtube-video-bg-container')) {
					$video = videoContainer.find('iframe');
					ratioWidth = 560;
					ratioHeight = 315;
				} else {
					if (this.isTouch && 800 > $(window).width()) {
						videoContainer
							.find('.video-bg-fallback')
							.css({ 'z-index': 1 });
						$video.remove();
						return;
					}
				}

				if (containerWidth / containerHeight >= 1.8) {
					newWidth = containerWidth;

					newHeight =
						Math.ceil((containerWidth / ratioWidth) * ratioHeight) +
						2;
					newMarginTop = -(
						Math.ceil(newHeight - containerHeight) / 2
					);
					newMarginLeft = -(Math.ceil(newWidth - containerWidth) / 2);

					newCss = {
						width: newWidth,
						height: newHeight,
						marginTop: newMarginTop,
						marginLeft: newMarginLeft,
					};

					$video.css(newCss);
				} else {
					newHeight = containerHeight;
					newWidth = Math.ceil(
						(containerHeight / ratioHeight) * ratioWidth
					);
					newMarginLeft = -(Math.ceil(newWidth - containerWidth) / 2);

					newCss = {
						width: newWidth,
						height: newHeight,
						marginLeft: newMarginLeft,
						marginTop: 0,
					};

					$video.css(newCss);
				}
			});
		},

		/**
		 * Centered logo
		 */
		centeredLogo: function () {
			if (
				!$('body').hasClass('menu-layout-centered-logo') &&
				!$('body').hasClass('menu-layout-top-logo')
			) {
				return;
			}

			var $socialMenuItems = $(
					'#site-navigation-primary-desktop > li.social-menu-item'
				),
				$firstLevelItems = $(
					'#site-navigation-primary-desktop > li:not(.social-menu-item)'
				),
				itemLenght = $firstLevelItems.length,
				middleItemCount;

			itemLenght = $firstLevelItems.length;

			if ($socialMenuItems.length) {
				itemLenght++;
			}

			middleItemCount = Math.round(parseFloat(itemLenght / 2, 10));

			$firstLevelItems.each(function (index) {
				if (middleItemCount > index) {
					$(this).addClass('before-logo');
				} else {
					$(this).addClass('after-logo');
				}
			});
			$(
				'<li class="logo-menu-item">' +
					SnakepitParams.logoMarkup +
					'</li>'
			).insertAfter(
				'#site-navigation-primary-desktop > li:nth-child(' +
					middleItemCount +
					')'
			);
		},

		/**
		 * Adjust logo offset
		 */
		centeredLogoOffset: function () {
			if (
				(!$('body').hasClass('menu-layout-centered-logo') &&
					!$('body').hasClass('menu-layout-top-logo')) ||
				!$('#site-navigation-primary-desktop').length
			) {
				return;
			}

			$('.nav-menu-desktop .logo').removeAttr('style');
			$('#site-navigation-primary-desktop').removeAttr('style');

			var $desktopMenu = $('#site-navigation-primary-desktop'),
				windowCenter = $(window).width() / 2,
				logoPositionLeft =
					windowCenter - $('.nav-menu-desktop .logo').offset().left,
				targetLeft =
					windowCenter -
					(windowCenter -
						$('.nav-menu-desktop .logo').outerWidth() / 2),
				offset = logoPositionLeft - targetLeft;

			if ($('body').hasClass('menu-width-boxed')) {
				$desktopMenu.css({ left: offset });
			} else if ($('body').hasClass('menu-width-wide')) {
				$('.nav-menu-desktop .logo').css({ left: offset });
			}
		},

		/**
		 * stickyMenu
		 */
		stickyMenu: function (scrollTop) {
			var scrollPoint,
				menuOffset = parseInt(SnakepitParams.menuOffset, 10);

			scrollTop = scrollTop || 0;

			scrollPoint =
				parseInt(SnakepitParams.stickyMenuScrollPoint, 10) ||
				$('body').offset().top;

			if (!menuOffset) {
				if (10 < scrollTop) {
					$('body').addClass('untop');
					$('body').removeClass('attop');
				} else {
					$('body').addClass('attop');
					$('body').removeClass('untop');
				}
			}

			if (menuOffset) {
				if ('100%' === SnakepitParams.menuOffset) {
					scrollPoint =
						$(window).height() -
						parseInt(SnakepitParams.desktopMenuHeight, 10);
				} else {
					scrollPoint =
						menuOffset -
						parseInt(SnakepitParams.desktopMenuHeight, 10);
				}
			}

			if ($('#top-bar-block').length) {
				scrollPoint =
					$('#top-bar-block').offset().top +
					$('#top-bar-block').outerHeight();
			}

			if ('soft' === SnakepitParams.stickyMenuType) {
				if (scrollTop < this.lastScrollTop && scrollPoint < scrollTop) {
					$('body').addClass('sticking');
					this.centeredLogoOffset();
				} else {
					$('body').removeClass('sticking');
				}

				if (scrollPoint < scrollTop) {
					$('body').addClass('show-single-nav');
				} else {
					$('body').removeClass('show-single-nav');
				}

				this.lastScrollTop = scrollTop;
			} else if ('hard' === SnakepitParams.stickyMenuType) {
				if (scrollPoint < scrollTop) {
					$('body').addClass('sticking show-single-nav');
					this.centeredLogoOffset();
				} else {
					$('body').removeClass('sticking show-single-nav');
				}
			}
		},

		/**
		 * Wrap mega menu
		 */
		megaMenuWrapper: function () {
			$('#site-navigation-primary-desktop .mega-menu')
				.find('> ul.sub-menu')
				.each(function () {
					$(this)
						.wrap('<div class="mega-menu-panel" />')
						.wrap('<div class="mega-menu-panel-inner" />');
				});
		},

		/**
		 * Reveal sub menu on hover
		 */
		menuDropDown: function () {
			var _this = this,
				$li;

			$('.nav-menu-desktop .menu-parent-item').on({
				mouseenter: function () {
					$li = $(this);

					if (
						$li
							.parents('.nav-menu-desktop')
							.hasClass('nav-disabled')
					) {
						return;
					}

					_this.subMenuDirection();

					if (!$(this).parents('.sub-menu').length) {
						$(this)
							.find('> ul.sub-menu')
							.show(0, function () {
								setTimeout(function () {
									$li.addClass('hover');
								}, 100);
							});

						$(this)
							.find('> .mega-menu-panel')
							.show(0, function () {
								setTimeout(function () {
									$li.addClass('hover');
								}, 100);
							});

						$(this)
							.find('> .mega-menu-tagline')
							.show(0, function () {
								setTimeout(function () {
									$li.addClass('hover');
								}, 100);
							});
					}
				},

				mouseleave: function () {
					$(this).removeClass('hover');
					$(this)
						.find(
							'> ul.sub-menu, > .mega-menu-panel, > .mega-menu-tagline'
						)
						.removeAttr('style');
				},
			});
		},

		/**
		 * Set mega menu tagline
		 */
		megaMenuTagline: function () {
			$('#site-navigation-primary-desktop .mega-menu').each(function () {
				var $this = $(this),
					$submenu = $this.find('.mega-menu-panel').first(),
					tagline = $this.find('a').data('mega-menu-tagline'),
					$tagline;

				if (tagline) {
					$tagline = $(
						'<div class="mega-menu-tagline"><span class="mega-menu-tagline-text">' +
							tagline +
							'</span></div>'
					);
					$tagline.insertBefore($submenu);
				}
			});
		},

		/**
		 * Scroll down on mousewheel down for full height header
		 */
		headerScrollDownMousewheel: function () {
			var _this = this;

			if ($('body').hasClass('hero-layout-fullheight')) {
				$('#hero').bind('mousewheel', function (e) {
					if (e.originalEvent.wheelDelta / 120 < 0) {
						_this.scrollToMainContent();
					}
				});
			}
		},

		/**
		 * Parallax header
		 */
		parallax: function () {
			var smallScreen =
				(800 > $(window).width() || this.isMobile) &&
				SnakepitParams.parallaxNoSmallScreen;

			if (!smallScreen) {
				$('.parallax').jarallax({
					noAndroid: SnakepitParams.parallaxNoAndroid,
					noIos: SnakepitParams.parallaxNoIos,
				});
			}
		},

		/**
		 * Toggle mobile menu
		 */
		toggleMenu: function () {
			$(document).on('click', '.toggle-mobile-menu', function (event) {
				event.preventDefault();
				$(window).trigger('snakepit_mobile_menu_toggle_button_click', [
					$(this),
				]);
				$('body').toggleClass('mobile-menu-toggle');
			});

			$(document).on('click', '.toggle-side-panel', function (event) {
				event.preventDefault();
				$(window).trigger('snakepit_side_panel_toggle_button_click', [
					$(this),
				]);
				$('body').toggleClass('side-panel-toggle');
			});

			$(document).on('click', '.toggle-offcanvas-menu', function (event) {
				event.preventDefault();
				$(
					window
				).trigger('snakepit_offcanvas_menu_toggle_button_click', [
					$(this),
				]);
				$('body').toggleClass('offcanvas-menu-toggle');
			});

			$(document).on('click', '.toggle-overlay-menu', function (event) {
				event.preventDefault();
				$('body').toggleClass('overlay-menu-toggle');
				$(window).trigger(
					'snakepit_overlay_menu_toggle_button_click',
					[$(this)]
				);
			});

			$(document).on('click', '.toggle-lateral-menu', function (event) {
				event.preventDefault();
				$(window).trigger(
					'snakepit_lateral_menu_toggle_button_click',
					[$(this)]
				);
				$('body').toggleClass('lateral-menu-toggle');
			});
		},

		/**
		 * Mobile sub menus toggles
		 */
		subMenuDropDown: function () {
			var dropDown =
				'.nav-menu-mobile .menu-parent-item > a, .nav-menu-vertical .menu-parent-item > a';

			$(document).on('click', dropDown, function (event) {
				var $link = $(this),
					$linkSubmenu = $(this).parent().find('ul:first');

				event.preventDefault();

				if ($linkSubmenu.length) {
					if ($linkSubmenu.hasClass('menu-item-open')) {
						$linkSubmenu.slideUp();
						$linkSubmenu.removeClass('menu-item-open');
					} else {
						$link
							.parent()
							.parent()
							.find('ul.sub-menu.menu-item-open')
							.slideUp()
							.removeClass('menu-item-open');

						$linkSubmenu.slideDown();
						$linkSubmenu.addClass('menu-item-open');
					}
				}

				return false;
			});
		},

		/**
		 * Toggle navigation search form
		 */
		toggleSearchForm: function () {
			$(document).on('click', '.toggle-search', function () {
				$(window).trigger('snakepit_searchform_toggle');
				$('body').toggleClass('search-form-toggle');
			});
		},

		/**
		 * Fluid iframe videos
		 */
		fluidVideos: function (container, force) {
			force = force || false;

			if ($('body').hasClass('wolf-visual-composer') && false === force) {
				return;
			}

			container = container || $('#page');

			var videoSelectors = [
				'iframe[src*="player.vimeo.com"]',
				'iframe[src*="youtube.com"]',
				'iframe[src*="youtube-nocookie.com"]',
				'iframe[src*="youtu.be"]',
				'iframe[src*="kickstarter.com"][src*="video.html"]',
				'iframe[src*="screenr.com"]',
				'iframe[src*="blip.tv"]',
				'iframe[src*="dailymotion.com"]',
				'iframe[src*="viddler.com"]',
				'iframe[src*="qik.com"]',
				'iframe[src*="revision3.com"]',
				'iframe[src*="hulu.com"]',
				'iframe[src*="funnyordie.com"]',
				'iframe[src*="flickr.com"]',
				'embed[src*="v.wordpress.com"]',
				'iframe[src*="videopress.com"]',
			];

			container
				.find($(videoSelectors.join(',')).not('.vimeo-bg, .youtube-bg'))
				.wrap('<span class="fluid-video" />');
			$('.rev_slider_wrapper').find(videoSelectors.join(',')).unwrap(); // disabled for revslider videos
			$('.fluid-video').parent().addClass('fluid-video-container');
		},

		/**
		 * Flexslider galleries
		 */
		flexSlider: function () {
			if ($.isFunction($.flexslider)) {
				/* header slideshow */
				$('.slideshow-background').flexslider({
					animation: 'fade',
					controlNav: false,
					directionNav: false,
					slideshow: true,
					pauseOnHover: false,
					pauseOnAction: false,
					slideshowSpeed: 4000,
					animationSpeed: 800,
				});

				/* Slideshow custom direction nav */
				$(document).on(
					'click',
					'.slideshow-gallery-direction-nav-prev',
					function (event) {
						event.preventDefault();
						$(this)
							.parents('article.post')
							.find('.slideshow-background')
							.flexslider('prev');
					}
				);

				$(document).on(
					'click',
					'.slideshow-gallery-direction-nav-next',
					function (event) {
						event.preventDefault();
						$(this)
							.parents('article.post')
							.find('.slideshow-background')
							.flexslider('next');
					}
				);

				/* Entry gallery slider */
				$('.entry-slider').flexslider({
					animation: SnakepitParams.entrySliderAnimation,
					slideshow: true,
					slideshowSpeed: 4000,
				});
			}
		},

		/**
		 * Lightbox images
		 */
		lightbox: function () {
			var _this = this,
				rand,
				quickviewData,
				params,
				selectors =
					'.wvc-lightbox, .lightbox, .gallery-item a[href$=".jpg"], .gallery-item a[href$=".png"], .gallery-item a[href$=".gif"], .gallery-item a[href$=".svg"]';
			$('.wvc-gallery .wvc-lightbox').each(function () {
				$(this).attr('data-fancybox', $(this).data('rel'));
			});

			rand = Math.floor(Math.random() * 9999 + 1);
			$('.gallery').each(function () {
				rand = Math.floor(Math.random() * 9999 + 1);

				$(this)
					.find('.gallery-item a:not(.select-action)')
					.each(function () {
						$(this).attr('data-fancybox', 'gallery-' + rand);
					});
			});

			if ('fancybox' === SnakepitParams.lightbox) {
				$(selectors).fancybox(SnakepitParams.fancyboxSettings);

				/* Gallery quickview */
				$('.gallery-quickview, .wvc-gallery-quickview')
					.unbind()
					.on('click', function () {
						event.preventDefault();
						event.stopPropagation();

						quickviewData = $(this).data('gallery-params');

						params = SnakepitParams.fancyboxSettings;

						$.fancybox.open(quickviewData, params);
						return false;
					});

				/* WC product images quickview */
				$('.woocommerce-product-gallery__trigger')
					.unbind()
					.on('click', function () {
						event.preventDefault();
						event.stopPropagation();

						quickviewData = _this.getProductGalleryItems(
							$(this)
								.parent()
								.find('.woocommerce-product-gallery__image')
						);

						$.fancybox.open(
							quickviewData,
							SnakepitParams.fancyboxSettings
						);
						return false;
					});

				/* Disable lighbox when zoom is off and slider is on */
				$('.woocommerce-product-gallery__image a')
					.unbind()
					.on('click', function () {
						event.preventDefault();
						event.stopPropagation();

						return false;
					});

				/* iFrame */
				$('.wvc-lightbox-iframe').fancybox({
					iframe: {
						css: {
							width: '600px',
							height: '450px',
						},
					},

					beforeLoad: function () {
						parent.jQuery.fancybox.getInstance().update();
					},
				});

				/* Video lightbox */
				$('.lightbox-video').fancybox({
					beforeLoad: function () {
						SnakepitUi.pausePlayers();
					},

					afterLoad: function () {
						SnakepitUi.lightboxVideoAfterLoad();
					},

					afterClose: function () {
						SnakepitUi.restartVideoBackgrounds();
					},
				});
			}
		},

		/**
		 * Lightbox video after load callback
		 *
		 * Fire mediaelement for self hosted video
		 */
		lightboxVideoAfterLoad: function () {
			var $iframe = $('.fancybox-iframe').contents(),
				$head = $iframe.find('head'),
				$video = $iframe.find('video'),
				accentColor = SnakepitParams.accentColor;

			if ($video.length) {
				$('.fancybox-content').hide();

				$head.append(
					$('<link/>', {
						rel: 'stylesheet',
						href: SnakepitParams.mediaelementLegacyCssUri,
						type: 'text/css',
					})
				);
				$head.append(
					$('<link/>', {
						rel: 'stylesheet',
						href: SnakepitParams.mediaelementCssUri,
						type: 'text/css',
					})
				);

				$head.append(
					$('<link/>', {
						rel: 'stylesheet',
						href: SnakepitParams.fancyboxMediaelementCssUri,
						type: 'text/css',
					})
				);

				$video.mediaelementplayer();

				$iframe.find('.mejs-container').find('.mejs-time-current').css({
					'background-color': accentColor,
				});

				$iframe
					.find('.mejs-container')
					.wrap('<div class="fancybox-mediaelement-container" />')
					.wrap('<div class="fancybox-mediaelement-inner" />');

				$iframe.find('.mejs-container').find('.mejs-time-current').css({
					'background-color': accentColor,
				});

				$iframe
					.find('.mejs-container')
					.find('.mejs-play')
					.trigger('click');

				/* Resizing */
				setTimeout(function () {
					$(window).trigger('resize');
					$('.fancybox-content').removeAttr('style').fadeIn('slow');
				}, 200);
			}
		},

		/**
		 * Get product slides params
		 */
		getProductGalleryItems: function ($slides) {
			var items = [];

			if ($slides.length > 0) {
				$slides.each(function (i, el) {
					var img = $(el).find('img'),
						large_image_src = img.attr('data-large_image'),
						item = {
							src: large_image_src,
							opts: {
								caption: img.attr('data-caption')
									? img.attr('data-caption')
									: '',
							},
						};
					items.push(item);
				});
			}

			return items;
		},

		/**
		 * Overwrite WVC video opener
		 */
		videoOpener: function () {
			if ('fancybox' === SnakepitParams.lightbox) {
				$('.wvc-video-opener').fancybox({
					beforeLoad: function () {
						SnakepitUi.pausePlayers();
					},

					afterLoad: function () {
						SnakepitUi.lightboxVideoAfterLoad();
					},

					afterClose: function () {
						SnakepitUi.restartVideoBackgrounds();
					},
				});
			}
		},

		/**
		 * Lazyload images
		 */
		lazyLoad: function () {
			$('.lazy-hidden').lazyLoadXT();
		},

		/**
		 * Smooth scroll
		 */
		animateAnchorLinks: function () {
			var _this = this;

			$(document).on('click', '.scroll, .nav-scroll a', function (event) {
				event.preventDefault();
				event.stopPropagation();

				_this.smoothScroll($(this).attr('href'));
			});

			$(document).on('click', '.scroll-left', function (event) {
				event.preventDefault();
				event.stopPropagation();

				_this.smoothScrollHorizontal($(this).attr('href'));
			});

			$(document).on('click', '.woocommerce-review-link', function (
				event
			) {
				event.preventDefault();
				event.stopPropagation();

				_this.smoothScroll('#wc-tabs-container');
			});
		},

		/**
		 * Smooth scroll to comment form when clicking on comment reply link
		 */
		commentReplyLinkSmoothScroll: function () {
			var _this = this;

			$(document).on('click', '.comment-reply-link', function (event) {
				event.preventDefault();
				event.stopPropagation();

				setTimeout(function () {
					_this.smoothScroll('#respond');
				}, 500);
				return false;
			});
		},

		/**
		 * Scroll to first main content from hero
		 */
		heroScrollDownArrow: function () {
			var _this = this;

			$(document).on('click', '#hero-scroll-down-arrow', function (
				event
			) {
				event.preventDefault();
				event.stopPropagation();

				_this.scrollToMainContent();
			});
		},

		/**
		 * Scroll to main content
		 */
		scrollToMainContent: function () {
			var $target = $('#hero').next('.section'),
				scrollOffset = this.getToolBarOffset() - 5,
				hash = '';

			if ($target.attr('id')) {
				hash = $target.attr('id');
			}

			$('body').addClass('scrolling');

			$('html, body')
				.stop()
				.animate(
					{
						scrollTop: $target.offset().top - scrollOffset,
					},
					parseInt(SnakepitParams.smoothScrollSpeed, 10),
					SnakepitParams.smoothScrollEase,
					function () {
						if ('' !== hash) {
							history.pushState(null, null, '#' + hash);
						}

						setTimeout(function () {
							$('body').removeClass('scrolling');
							$(window).trigger('wolf_has_scrolled');
						}, 500);
					}
				);
		},

		/**
		 * Smooth scroll to an anchor
		 */
		smoothScroll: function (href) {
			var scrollOffset = this.getToolBarOffset() - 5,
				hash;

			if (-1 !== href.indexOf('#')) {
				hash = href.substring(href.indexOf('#') + 1);

				if ($('#' + hash).length) {
					if (
						'hard' === SnakepitParams.stickyMenuType &&
						!$('body').hasClass('sticky-menu-transparent') &&
						!$('#' + hash).hasClass('wvc-row-full-height')
					) {
						scrollOffset += parseFloat(
							SnakepitParams.stickyMenuHeight,
							10
						);
					}

					$('body').addClass('scrolling');

					$('html, body')
						.stop()
						.animate(
							{
								scrollTop:
									$('#' + hash).offset().top - scrollOffset,
							},
							parseInt(SnakepitParams.smoothScrollSpeed, 10),
							SnakepitParams.smoothScrollEase,
							function () {
								if ('' !== hash) {
									history.pushState(null, null, '#' + hash);
								}

								$('body').removeClass('mobile-menu-toggle'); // close mobile menu if open

								setTimeout(function () {
									$('body').removeClass('scrolling');
									$(window).trigger('wolf_has_scrolled');
									window.dispatchEvent(new Event('scroll'));
								}, 500);
							}
						);
				} else {
					window.location.replace(href); // redirect to link if anchor doesn't exist on the page
				}
			} else {
				window.location.replace(href); // redirect to link if anchor doesn't exist on the page
			}
		},

		/**
		 * Smooth scroll to an anchor
		 */
		smoothScrollHorizontal: function (href) {
			var scrollOffset = 0,
				hash;

			if (-1 !== href.indexOf('#')) {
				hash = href.substring(href.indexOf('#') + 1);

				if ($('#' + hash).length) {
					$('body').addClass('scrolling');

					$('html, body')
						.stop()
						.animate(
							{
								scrollLeft:
									$('#' + hash).offset().left - scrollOffset,
							},
							parseInt(SnakepitParams.smoothScrollSpeed, 10),
							SnakepitParams.smoothScrollEase,
							function () {
								if ('' !== hash) {
									history.pushState(null, null, '#' + hash);
								}

								$('body').removeClass('mobile-menu-toggle'); // close mobile menu if open

								setTimeout(function () {
									$('body').removeClass('scrolling');
									$(window).trigger('wolf_has_scrolled');
								}, 500);
							}
						);
				} else {
					window.location.replace(href); // redirect to link if anchor doesn't exist on the page
				}
			} else {
				window.location.replace(href); // redirect to link if anchor doesn't exist on the page
			}
		},

		/**
		 * Get the height of the top admin bar and/or menu
		 */
		getToolBarOffset: function () {
			var offset = 0;

			if ($('body').is('.admin-bar')) {
				if (782 < $(window).width()) {
					offset = 32;
				} else {
					offset = 46;
				}
			}

			if (
				$('#wolf-message-bar').length &&
				$('#wolf-message-bar').is(':visible')
			) {
				offset =
					offset + $('#wolf-message-bar-container').outerHeight();
			}

			return parseInt(offset, 10);
		},

		/**
		 * Back to the top link
		 */
		topLink: function () {
			$(document).on('click', 'a#back-to-top', function (event) {
				event.preventDefault();

				$('body').addClass('scrolling');

				$('html, body')
					.stop()
					.animate(
						{
							scrollTop: 0,
						},
						parseInt(SnakepitParams.smoothScrollSpeed, 10),
						SnakepitParams.smoothScrollEase,
						function () {
							setTimeout(function () {
								$('body').removeClass('scrolling');
								$(window).trigger('wolf_has_scrolled');
							}, 500);
						}
					);
			});
		},

		/**
		 * Back to the top link animation
		 */
		topLinkAnimation: function (scrollTop) {
			if (scrollTop >= 550) {
				$('a#back-to-top').addClass('back-to-top-visible');
			} else {
				$('a#back-to-top').removeClass('back-to-top-visible');
			}
		},

		/**
		 * Use Wow plugin to reveal animation on page scroll
		 */
		wowAnimate: function () {
			var wowAnimate,
				doWow =
					SnakepitParams.forceAnimationMobile ||
					(!this.isMobile && 800 < $(window).width());

			if (doWow && 'undefined' !== typeof WOW) {
				wowAnimate = new WOW({
					offset: SnakepitParams.WOWAnimationOffset,
				}); // init wow for CSS animation
				wowAnimate.init();
			}
		},

		/**
		 * Use AOS plugin to reveal animation on page scroll (new)
		 */
		AOS: function (selector) {
			var forceAnimationMobile = false,
				doWow,
				disable;

			if ('undefined' !== typeof WVCParams) {
				forceAnimationMobile = WVCParams.forceAnimationMobile;
			}

			doWow =
				forceAnimationMobile ||
				(!this.isMobile && 800 < $(window).width());
			disable = !doWow;

			selector = selector || '#content';

			if ('undefined' !== typeof AOS) {
				AOS.init({
					disable: disable,
				});
			}
		},

		/**
		 * Item animation delay (now uses AOS)
		 */
		addItemAnimationDelay: function () {
			var animDelay = 0;

			$('.entry[data-aos]').each(function () {
				animDelay = animDelay + 150;

				$(this).attr('data-aos-delay', animDelay);
			});
		},

		/**
		 * Live Search
		 */
		liveSearch: function () {
			if (!SnakepitParams.doLiveSearch) {
				return;
			}

			$('.live-search-form').each(function () {
				var $formContainer = $(this),
					$form = $formContainer.find('form'),
					searchInput = $(this).find('input[type="search"]'),
					$loader = $(this).find('.search-form-loader'),
					timer = null,
					$resultContainer,
					action = 'snakepit_ajax_live_search',
					result;

				if ($form.hasClass('woocommerce-product-search')) {
					action = 'snakepit_ajax_woocommerce_live_search';
				}

				if (!$formContainer.find('.live-search-results').length) {
					$(
						'<div class="live-search-results"><ul></u></div>'
					).insertAfter(searchInput);
				}

				($resultContainer = $formContainer.find(
					'.live-search-results'
				)),
					(result = $resultContainer.find('ul'));

				searchInput.on('keyup', function (event) {
					clearTimeout(timer);

					var $this = $(this),
						term = $this.val();

					if (8 === event.keyCode || 46 === event.keyCode) {
						$resultContainer.fadeOut();
						$loader.fadeOut();
					} else if ('' !== term) {
						timer = setTimeout(function () {
							$loader.fadeIn();

							var data = {
								action: action,
								s: term,
							};

							$.post(SnakepitParams.ajaxUrl, data, function (
								response
							) {
								if ('' !== response) {
									result.empty().html(response);
									$resultContainer.fadeIn();
									$loader.fadeOut();
								} else {
									$resultContainer.fadeOut();
									$loader.fadeOut();
								}
							});
						}, 200); // timer
					} else {
						$resultContainer.fadeOut();
						$loader.fadeOut();
					}
				});
			});
		},

		/**
		 * Live Search
		 */
		WooCommerceLiveSearch: function () {
			if (!SnakepitParams.doLiveSearch) {
				return;
			}

			var $form = $('.wc-live-search-form'),
				searchInput = $form.find('input[type="search"]'),
				$loader = $form.find('.search-form-loader'),
				timer = null,
				$resultContainer,
				result;

			$('<div class="wc-live-search-results"><ul></u></div>').insertAfter(
				searchInput
			);

			($resultContainer = $('.wc-live-search-results')),
				(result = $resultContainer.find('ul'));

			searchInput.on('keyup', function (event) {
				clearTimeout(timer);

				var $this = $(this),
					term = $this.val();

				if (8 === event.keyCode || 46 === event.keyCode) {
					$resultContainer.fadeOut();
					$loader.fadeOut();
				} else if ('' !== term) {
					timer = setTimeout(function () {
						$loader.fadeIn();

						var data = {
							action: 'snakepit_ajax_woocommerce_live_search',
							s: term,
						};

						$.post(SnakepitParams.ajaxUrl, data, function (
							response
						) {
							if ('' !== response) {
								result.empty().html(response);
								$resultContainer.fadeIn();
								$loader.fadeOut();
							} else {
								$resultContainer.fadeOut();
								$loader.fadeOut();
							}
						});
					}, 600); // timer
				} else {
					$resultContainer.fadeOut();
					$loader.fadeOut();
				}
			});
		},

		/**
		 * Hide loading overlay
		 */
		hideLoader: function () {
			if (this.debugLoader) {
				return false;
			}

			var $body = $('body');

			clearInterval(this.timer);
			$body.removeClass('loading');
			$body.addClass('loaded');
			$(window).trigger('hide_loader');
		},

		/**
		 * Add page bottom padding for "uncover" footer type
		 */
		footerPageMarginBottom: function () {
			if (
				$('body').hasClass('footer-type-uncover') &&
				!$('body').hasClass('error404')
			) {
				var footerHeight = $('.site-footer').height() - 2;
				$('#page-content').css({ 'margin-bottom': footerHeight });
			} else {
				$('#page-content').css({ 'margin-bottom': 0 });
			}
		},

		/**
		 * Provide compatibility for browser unsupported features
		 */
		objectFitfallback: function () {
			if (this.isEdge && 'undefined' !== typeof objectFitImages) {
				objectFitImages();
			}
		},

		/**
		 * Isolate side panel scroll
		 */
		isolateScroll: function () {
			$(
				'.side-panel-inner, #vertical-bar-panel-inner, #vertical-bar-overlay-inner'
			).on('mousewheel DOMMouseScroll', function (e) {
				var d = e.originalEvent.wheelDelta || -e.originalEvent.detail,
					dir = d > 0 ? 'up' : 'down',
					stop =
						(dir === 'up' && this.scrollTop === 0) ||
						(dir === 'down' &&
							this.scrollTop ===
								this.scrollHeight - this.offsetHeight);
				stop && e.preventDefault();
			});
		},

		/**
		 * Tooltip
		 */
		tooltipsy: function () {
			if (!this.isMobile) {
				var $tipspan,
					selectors =
						'.hastip, .wvc-ati-link:not(.wvc-ati-add-to-cart-button), .wvc-ati-add-to-cart-button-title, .wpm-track-icon:not(.wpm-add-to-cart-button), .wpm-add-to-cart-button-title, .wolf-release-button a:not(.wolf-release-add-to-cart), .wolf-release-add-to-cart-button-title, .wolf-share-link, .loop-release-button-link, .wolf-share-button-count, .single-add-to-wishlist .wolf_add_to_wishlist';

				$(selectors).tooltipsy();

				$(document).on('added_to_cart', function (
					event,
					fragments,
					cart_hash,
					$button
				) {
					if (
						$button.hasClass('wvc-ati-add-to-cart-button') ||
						$button.hasClass('wpm-add-to-cart-button') ||
						$button.hasClass('wolf-release-add-to-cart') ||
						$button.hasClass('product-add-to-cart')
					) {
						$tipspan = $button.find('span');

						$tipspan.data('tooltipsy').hide();
						$tipspan.data('tooltipsy').destroy();

						$tipspan.attr(
							'title',
							SnakepitParams.l10n.addedToCart
						);

						$tipspan.tooltipsy();
						$tipspan.data('tooltipsy').show();

						setTimeout(function () {
							$tipspan.data('tooltipsy').hide();
							$tipspan.data('tooltipsy').destroy();
							$tipspan.attr(
								'title',
								SnakepitParams.l10n.addToCart
							);
							$tipspan.tooltipsy();

							$button.removeClass('added');
						}, 4000);
					}
				});
			}
		},

		/**
		 * Add class to link that will be ajaxify
		 *
		 * Then remove it for the ones we don't want
		 */
		setInternalLinkClass: function () {
			var siteURL = SnakepitParams.siteUrl,
				$internalLinks,
				regEx = '';

			$.each(SnakepitParams.allowedMimeTypes, function (
				index,
				value
			) {
				regEx += '|' + value;
			});

			regEx = $.trim(regEx).substring(1);

			siteURL = SnakepitParams.siteUrl;

			$internalLinks = $(
				'a[href^="' +
					siteURL +
					'"], a[href^="/"], a[href^="./"], a[href^="../"]'
			);
			$internalLinks = $internalLinks.not(function () {
				return $(this)
					.attr('href')
					.match('.(' + regEx + ')$');
			});

			$internalLinks.addClass('internal-link');

			if (SnakepitParams.isWooCommerce) {
				/*
				When WC pages aren't set the WC pages variables will return the siteURL
				Be sure it is not the same !!
				 */
				if (
					this.untrailingSlashit(siteURL) !==
					this.untrailingSlashit(
						SnakepitParams.WooCommerceCartUrl
					)
				) {
					$(
						'a[href^="' +
							SnakepitParams.WooCommerceCartUrl +
							'"]'
					).removeClass('internal-link');
				}

				if (
					this.untrailingSlashit(siteURL) !==
					this.untrailingSlashit(
						SnakepitParams.WooCommerceAccountUrl
					)
				) {
					$(
						'a[href^="' +
							SnakepitParams.WooCommerceAccountUrl +
							'"]'
					).removeClass('internal-link');
				}

				if (
					this.untrailingSlashit(siteURL) !==
					this.untrailingSlashit(
						SnakepitParams.WooCommerceCheckoutUrl
					)
				) {
					$(
						'a[href^="' +
							SnakepitParams.WooCommerceCheckoutUrl +
							'"]'
					).removeClass('internal-link');
				}

				$(
					'.woocommerce-MyAccount-downloads-file, .woocommerce-MyAccount-navigation a, .add_to_cart_button, .woocommerce-main-image, .product .images a, .product-remove a, .wc-proceed-to-checkout a, .wc-forward'
				).removeClass('internal-link');
			}

			$('.wpml-ls-item, .wpml-ls-item a').removeClass('internal-link');
			$('[class*="wp-image-"]').parent().removeClass('internal-link');
			$('.no-ajax, .loadmore-button, .nav-scroll a').removeClass(
				'internal-link'
			);
			$('#wpadminbar a').removeClass('internal-link');
			$('.release-thumbnail a').removeClass('internal-link');
			$(
				'.lightbox, .wvc-lightbox, .video-item .entry-link, .last-photos-thumbnails, .scroll, .wvc-nav-scroll'
			).removeClass('internal-link');
			$(
				'.widget_meta a, a.comment-reply-link, a#cancel-comment-reply-link, a.post-edit-link, a.comment-edit-link, a.share-link, .single .comments-link a'
			).removeClass('internal-link');
			$(
				'#blog-filter a, #albums-filter a, #work-filter a, #videos-filter a, #plugin-filter a, .logged-in-as a, #trigger a'
			).removeClass('internal-link');
			$(
				'.category-filter a, .infinitescroll-trigger-container .nav-links a, .envato-item-presentation a'
			).removeClass('internal-link');
			$(
				'.dropdown li.menu-item-has-children > a, .dropdown li.page_item_has_children > a'
			).removeClass('internal-link');
			$(
				'a[target="_blank"], a[target="_parent"], a[target="_top"]'
			).removeClass('internal-link');
			$('.nav-menu-mobile li.menu-parent-item > a').removeClass(
				'internal-link'
			);
			$('.wc-item-downloads a').removeClass('internal-link');
			$('.timely a').removeClass('internal-link');
			$('.logo-link').removeClass('internal-link');
			$('.wwcq-product-quickview-button').removeClass('internal-link');
			$('a[target="_blank"]').removeClass('internal-link');
		},

		/**
		 * Remove slash in string
		 *
		 * Used to clean URLs
		 */
		untrailingSlashit: function (str) {
			str = str || '';

			if ('/' === str.charAt(str.length - 1)) {
				str = str.substr(0, str.length - 1);
			}

			return str;
		},

		/**
		 * Overlay transition
		 */
		transitionCosmetic: function () {
			if (!SnakepitParams.defaultPageTransitionAnimation) {
				return false;
			}

			var _this = this;

			if (SnakepitParams.isAjaxNav) {
				return;
			}

			$(document).on('click', '.internal-link:not(.disabled)', function (
				event
			) {
				if (!event.ctrlKey) {
					event.preventDefault();

					var $link = $(this);

					$('.spinner').attr('id', 'spinner');

					$('body').removeClass(
						'mobile-menu-toggle overlay-menu-toggle offcanvas-menu-toggle vertical-bar-panel-toggle vertical-bar-overlay-toggle'
					);
					$('body').addClass('loading transitioning');

					Cookies.set(
						SnakepitParams.themeSlug + '_session_loaded',
						true,
						{
							expires: null,
						}
					);

					if (SnakepitParams.hasLoadingOverlay) {
						$('.loading-overlay').one(
							_this.transitionEventEnd(),
							function () {
								Cookies.remove(
									SnakepitParams.themeSlug +
										'_session_loaded'
								);
								window.location = $link.attr('href');
							}
						);
					} else {
						window.location = $link.attr('href');
					}
				}
			});
		},

		/**
		 * Set active menu item
		 */
		setActiveOnePageMenuItem: function (scrollTop) {
			var menuItems = $(
					'.menu-one-page-menu-container #site-navigation-primary-desktop li.menu-item a'
				),
				menuItem,
				sectionOffset,
				threshold = 150,
				i;

			if (!menuItems.length) {
				return;
			}

			if ($('body').hasClass('wvc-fullpage')) {
				$(window).on('wvc_fullpage_change', function (
					event,
					targetRow
				) {
					var sectionSlug = targetRow.attr('id');

					if (sectionSlug) {
						menuItems.parent().removeClass('menu-link-active');
						$('a.wvc-fp-nav[href="#' + sectionSlug + '"]')
							.parent()
							.addClass('menu-link-active');
					}
				});
			} else {
				for (i = 0; i < menuItems.length; i++) {
					menuItem = $(menuItems[i]);

					if ($(menuItem.attr('href')).length) {
						sectionOffset = $(menuItem.attr('href')).offset().top;

						if (
							scrollTop > sectionOffset - threshold &&
							scrollTop < sectionOffset + threshold
						) {
							menuItems.parent().removeClass('menu-link-active');
							menuItem.parent().addClass('menu-link-active');
						}
					}
				}
			}
		},

		/**
		 * Play pause button
		 */
		minimalPlayer: function () {
			$(document).on('click', '.minimal-player-play-button', function (
				event
			) {
				event.preventDefault();

				var $btn = $(this),
					$audio = $btn.next('.minimal-player-audio'),
					audioId = $audio.attr('id'),
					audio = document.getElementById(audioId);

				if (!$btn.hasClass('minimal-player-track-playing')) {
					$('video, audio').trigger('pause');
					$('.minimal-player-play-button').removeClass(
						'minimal-player-track-playing'
					);
					$btn.addClass('minimal-player-track-playing');
					audio.play();
				} else {
					$btn.removeClass('minimal-player-track-playing');
					audio.pause();
				}
			});

			$('.minimal-player-audio').bind('ended', function () {
				$(this)
					.prev('.minimal-player-play-button')
					.removeClass('minimal-player-track-playing');
			});
		},

		/**
		 * Pause other players when clicking on particular links
		 */
		pausePlayers: function () {
			if (this.isWVC) {
				WVC.pausePlayers();

				$('.minimal-player-track-playing').removeClass(
					'minimal-player-track-playing'
				);
				$('.loop-post-player-playing').removeClass(
					'loop-post-player-playing'
				);
			} else {
				$('audio:not(.nav-player)').trigger('pause'); // pause audio players when opening a video
				$('video:not(.wvc-video-bg):not(.video-bg)').trigger('pause');
			}
		},

		/**
		 * Play video in thumbnail on hover
		 */
		videoThumbnailPlayOnHover: function () {
			if (this.isMobile) {
				return;
			}

			var itemsContainer = '.items.videos';

			if (!$(itemsContainer).length) {
				return;
			}

			/* Stop YT */
			$('iframe.youtube-bg', itemsContainer).each(function () {
				if (
					'undefined' !== typeof SnakepitYTVideoBg &&
					SnakepitYTVideoBg.players[
						$(this).data('youtube-video-id')
					]
				) {
					SnakepitYTVideoBg.players[
						$(this).data('youtube-video-id')
					].pauseVideo();
				}
			});

			/* Stop Vimeo */
			$('iframe.vimeo-bg', itemsContainer).each(function () {
				var player = new Vimeo.Player($(this));
				player.pause();
			});

			/* Stop HTML5 video */
			$('video.video-bg', itemsContainer).each(function () {
				$(this).trigger('pause');
			});

			$('.entry-video', itemsContainer).each(function () {
				var $iframe = $(this).find('iframe'),
					$video = $(this).find('video'),
					YTPlayerId = $(this).data('youtube-video-id'),
					vimeoPlayer;

				if ($iframe.length) {
					if ($iframe.hasClass('youtube-bg')) {
						$(this).on('mouseenter', function () {
							if (
								'undefined' !== typeof SnakepitYTVideoBg &&
								SnakepitYTVideoBg.players[YTPlayerId]
							) {
								SnakepitYTVideoBg.players[
									YTPlayerId
								].playVideo();
							}
						});

						$(this).on('mouseleave', function () {
							setTimeout(function () {
								if (
									'undefined' !==
										typeof SnakepitYTVideoBg &&
									SnakepitYTVideoBg.players[YTPlayerId]
								) {
									SnakepitYTVideoBg.players[
										YTPlayerId
									].pauseVideo();
								}
							}, 500);
						});
					} else if ($iframe.hasClass('vimeo-bg')) {
						vimeoPlayer = new Vimeo.Player($iframe[0]);

						$(this).mouseenter(function () {
							vimeoPlayer.play();
						});

						$(this).mouseleave(function () {
							setTimeout(function () {
								vimeoPlayer.pause();
							}, 200);
						});
					}
				} else if ($video.length) {
					$(this).mouseenter(function () {
						$video.trigger('play');
					});

					$(this).mouseleave(function () {
						setTimeout(function () {
							$video.trigger('pause');
						}, 200);
					});
				}
			});
		},

		/**
		 * Restart video BG
		 */
		restartVideoBackgrounds: function () {
			if (this.isWVC) {
				WVC.restartVideoBackgrounds();
			}
		},

		/**
		 * Pause other players when clicking on particular links
		 */
		pausePlayersButton: function () {
			var _this = this,
				selectors =
					'.wvc-embed-video-play-button, .pause-players, .audio-play-button';

			$(document).on('click', selectors, function () {
				_this.pausePlayers();
			});
		},

		/**
		 * Toggle sizes options for attahcment download page
		 * (only for Wolf Photos supported theme)
		 */
		photoSizesOptionToggle: function () {
			$(document).on('click', '.button-size-options-toggle', function () {
				$('.size-options-panel').toggle();
			});

			var src, filename;

			$(document).on('change', '.size-option-radio', function () {
				src = this.value;
				filename = $(this).data('filename');

				$('.button-size-options-download').attr('href', src);
				$('.button-size-options-download').attr('download', filename);
			});

			$(document).on(
				'click',
				'.size-options-panel table tr',
				function () {
					$(this)
						.find('.size-option-radio')
						.prop('checked', true)
						.trigger('change');
				}
			);
		},

		/**
		 * Set event list size class
		 */
		setEventSizeClass: function () {
			$('.event-display-list').each(function () {
				var width = $(this).width();

				if (800 > width) {
					$(this).removeClass('event-list-large');
				} else {
					$(this).addClass('event-list-large');
				}
			});
		},

		/**
		 * Add custom classes for styling adjustment
		 */
		adjustmentClasses: function () {
			$('.wvc-row-is-fullwidth').each(function () {
				if ($(this).find('.wvc-col-12 .grid-padding-no').length) {
					$(this).addClass('has-no-padding-grid');
				}
			});

			$('img, code').parent('a').addClass('no-link-style');

			$('.more-link').parent('p').addClass('no-margin');
		},

		/**
		 * Mute Vimeo Bg
		 */
		muteVimeoBackgrounds: function () {
			$('.vimeo-bg').each(function () {
				var player = new Vimeo.Player(this);

				player.on('play', function () {
					player.setVolume(0);
				});
			});
		},

		wvcfullPageEvents: function () {
			var _this = this,
				rowClass,
				newSkin,
				fpAnimTime = 900;

			if ('undefined' !== typeof WVCParams) {
				fpAnimTime = WVCParams.fpAnimTime;
			}

			$(window).on('wvc_fullpage_loaded', function () {
				_this.defaultHeroFont = $('body').data('hero-font-tone');
				$('body')
					.removeClass('page-nav-bullet-light page-nav-bullet-dark')
					.addClass('page-nav-bullet-' + _this.defaultHeroFont);
			});

			$(window).on('wvc_fullpage_change', function (event, targetRow) {
				if ($('body').hasClass('mobile-menu-toggle')) {
					$('body').removeClass('mobile-menu-toggle');
				}

				if (targetRow.attr('class').match(/wvc-font-(light|dark)/)) {
					rowClass = targetRow.attr('class');
					newSkin = rowClass.match(/wvc-font-(light|dark)/)[1];

					setTimeout(function () {
						$('body')
							.removeClass('hero-font-light hero-font-dark')
							.addClass('hero-font-' + newSkin);
						$('body')
							.removeClass(
								'page-nav-bullet-light page-nav-bullet-dark'
							)
							.addClass('page-nav-bullet-' + newSkin);
					}, fpAnimTime);
				} else {
					setTimeout(function () {
						$('body')
							.removeClass('hero-font-light hero-font-dark')
							.addClass('hero-font-' + _this.defaultHeroFont);
						$('body')
							.removeClass(
								'page-nav-bullet-light page-nav-bullet-dark'
							)
							.addClass(
								'page-nav-bullet-' + _this.defaultHeroFont
							);
					}, fpAnimTime);
				}
			});
		},

		/**
		 * Artist tabs
		 */
		artistTabs: function () {
			if ($('body').hasClass('single-artist')) {
				$('#artist-tabs').tabs({
					select: function (event, ui) {
						$(ui.panel).animate({ opacity: 0.1 });
					},

					show: function (event, ui) {
						$(ui.panel).animate({ opacity: 1.0 }, 1000);
					},

					activate: function (event) {
						/* LazyLoad callback */
						if ('undefined' !== typeof WVC.lazyLoad) {
							$('[class*="lazy-hidden"]').lazyLoadXT();
						}

						/* Tour dates */
						if ('undefined' !== typeof WVCBigText) {
							WVCBigText.init();
						}

						window.dispatchEvent(new Event('resize'));
						$(window).trigger('wvc_tab_show');
					},
				});
			}
		},

		/**
		 * Mini nav player
		 */
		navPlayer: function () {
			$(document).on('click', '.nav-play-button', function () {
				event.preventDefault();

				var $btn = $(this),
					$container = $btn.parent(),
					$audio = $btn.next('.nav-player'),
					audioId = $audio.attr('id'),
					audio = document.getElementById(audioId),
					playText = SnakepitParams.l10n.playText,
					pauseText = SnakepitParams.l10n.pauseText;

				if (!$container.hasClass('nav-player-playing')) {
					$('video, audio').trigger('pause');
					$btn.attr('title', pauseText);
					$container.removeClass('nav-player-playing');
					$container.addClass('nav-player-playing');
					audio.play();
				} else {
					$container.removeClass('nav-player-playing');
					audio.pause();
					$btn.attr('title', playText);
				}
			});
		},

		/**
		 * Mini nav player
		 */
		loopPostPlayer: function () {
			$(document).on('click', '.loop-post-play-button', function () {
				event.preventDefault();

				var $btn = $(this),
					$container = $btn.parent(),
					$audio = $btn.next('audio'),
					audioId = $audio.attr('id'),
					audio = document.getElementById(audioId),
					playText = SnakepitParams.l10n.playText,
					pauseText = SnakepitParams.l10n.pauseText;

				if (!$container.hasClass('loop-post-player-playing')) {
					$('video, audio').trigger('pause');
					$btn.attr('title', pauseText);
					$container.removeClass('loop-post-player-playing');
					$container.addClass('loop-post-player-playing');
					audio.play();
				} else {
					$container.removeClass('loop-post-player-playing');
					audio.pause();
					$btn.attr('title', playText);
				}
			});
		},

		topbarClose: function () {
			if ($('#top-bar-block').length) {
				var $container = $('#top-bar-block'),
					cookieName = 'top_bar_closed';

				if (!Cookies.get(cookieName)) {
					$container.show();
				}

				$container.addClass(
					'wvc-font-' +
						$container.find('.wvc-row').first().data('font-color')
				);

				$(document).on('click', '#top-bar-close', function (event) {
					event.preventDefault();

					$(this)
						.parent()
						.slideUp(300, function () {
							$('body').removeClass('has-top-bar');
							Cookies.set(cookieName, true, { path: '/' });
						});
				});
			}
		},

		/**
		 *
		 */
		wvcEventCallback: function () {
			if (!this.isWVC) {
				return;
			}

			/**
			 * On fullPage anim end
			 */
			$(window).on('fp-animation-end', function () {
				$('.lazyload-bg').removeClass('lazy-hidden');
			});
		},

		/**
		 * Page Load
		 */
		pageLoad: function () {
			if (!SnakepitParams.defaultPageLoadingAnimation) {
				return false;
			}

			var _this = this,
				delay;

			if (this.debugLoader) {
				$('body').addClass('loading');
				return false;
			}

			delay = SnakepitParams.pageTransitionDelayAfter;

			setTimeout(function () {
				_this.hideLoader();
				_this.wowAnimate();
				_this.AOS();
				$('body').addClass('loaded');
			}, delay);

			if (SnakepitParams.hasLoadingOverlay) {
				$('.loading-overlay').one(
					_this.transitionEventEnd(),
					function () {
						$(window).trigger('page_loaded');
					}
				);
			} else {
				$(window).trigger('page_loaded');
			}

			setTimeout(function () {
				window.dispatchEvent(new Event('resize'));
				window.dispatchEvent(new Event('scroll')); // Force WOW effect
				$(window).trigger('just_loaded');
			}, delay + 500);

			/* Add another class 1+ sec after the page is loaded to hide loading overlay and such */
			setTimeout(function () {
				$('body').addClass('one-sec-loaded');
				$(window).trigger('one_sec_loaded');
				Cookies.set(
					SnakepitParams.themeSlug + '_session_loaded',
					true,
					{
						expires: null,
					}
				);

				_this.videoThumbnailPlayOnHover();
			}, parseInt(SnakepitParams.pageLoadedDelay, 10));
		},
	};
})(jQuery);

(function ($) {
	'use strict';

	if ('undefined' !== typeof WVC) {
		/**
		 * Overwrite WVC lightbox function with the theme function
		 */
		WVC.lightbox = SnakepitUi.lightbox;

		/**
		 * Overwrite WVC video opener
		 */
		WVC.videoOpener = SnakepitUi.videoOpener;

		/**
		 * Overwrite toolbar offset calculation
		 */
		WVC.getToolBarOffset = SnakepitUi.getToolBarOffset;
	}

	$(document).ready(function () {
		SnakepitUi.init();
	});

	$(window).load(function () {
		SnakepitUi.pageLoad();
	});
})(jQuery);
