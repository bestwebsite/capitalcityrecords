<?php
/**
 * Snakepit Customizer function
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Deregister background and header settings to add it later where we want them
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function snakepit_customize_deregister( $wp_customize ) {
	$wp_customize->remove_control( 'background_color' );
	$wp_customize->remove_control( 'header_textcolor' );
}
add_action( 'customize_register', 'snakepit_customize_deregister', 11 );


if ( ! function_exists( 'snakepit_get_color_scheme' ) ) {
	/**
	 * Retrieves the current Snakepit color scheme.
	 *
	 * Create your own snakepit_get_color_scheme() function to override in a child theme.
	 *
	 * @return array An associative array of either the current or default color scheme HEX values.
	 */
	function snakepit_get_color_scheme() {
		$color_scheme_option = snakepit_get_color_scheme_option();
		$color_schemes = snakepit_get_color_schemes();

		if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
			return $color_schemes[ $color_scheme_option ]['colors'];
		} else {
			return $color_schemes['default']['colors'];
		}
	}
}

if ( ! function_exists( 'snakepit_get_color_scheme_choices' ) ) {
	/**
	 * Retrieves an array of color scheme choices registered for Snakepit.
	 *
	 * Create your own snakepit_get_color_scheme_choices() function to override
	 * in a child theme.
	 *
	 * @return array Array of color schemes.
	 */
	function snakepit_get_color_scheme_choices() {
		$color_schemes = snakepit_get_color_schemes();
		$color_scheme_control_options = [];

		foreach ( $color_schemes as $color_scheme => $value ) {
			$color_scheme_control_options[ $color_scheme ] = $value['label'];
		}

		return $color_scheme_control_options;
	}
}

if ( ! function_exists( 'snakepit_sanitize_color_scheme' ) ) {
	/**
	 * Handles sanitization for Snakepit color schemes.
	 *
	 * Create your own snakepit_sanitize_color_scheme() function to override
	 * in a child theme.
	 *
	 * @param string $value Color scheme name value.
	 * @return string Color scheme name.
	 */
	function snakepit_sanitize_color_scheme( $value ) {
		$color_schemes = snakepit_get_color_scheme_choices();

		if ( ! array_key_exists( $value, $color_schemes ) ) {
			return 'default';
		}

		return $value;
	}
}

/**
 * Binds the JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 */
function snakepit_customize_control_js() {

	wp_enqueue_style( 'snakepit-customizer-style', get_template_directory_uri() . '/assets/css/customizer.css' );

	$version = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? time() : snakepit_get_theme_version();
	wp_enqueue_script( 'snakepit-customize-color-scheme-control', get_template_directory_uri() . '/inc/customizer/js/color-scheme-control.js', [ 'customize-controls', 'iris', 'underscore', 'wp-util' ], $version, true );
	wp_localize_script( 'snakepit-customize-color-scheme-control', 'colorScheme', snakepit_get_color_schemes() );
}
add_action( 'customize_controls_enqueue_scripts', 'snakepit_customize_control_js' );

/**
 * Enqueue customizer preview script
 */
function snakepit_customize_preview_js() {

	$version = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? time() : snakepit_get_theme_version();
	wp_enqueue_script( 'snakepit-customize-preview', get_template_directory_uri() . '/inc/customizer/js/customize-preview.js', [ 'jquery', 'customize-preview' ], $version, true );
}
add_action( 'customize_preview_init', 'snakepit_customize_preview_js' );

/**
 * Convert hex color to rgb
 *
 * @param string $hex
 * @return string
 */
function snakepit_hex_to_rgb( $hex ) {
	$hex = str_replace( '#', '', $hex );

	if ( strlen( $hex ) == 3 ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex,0,1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex,1,1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex,2,1 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}
	$rgb = [ $r, $g, $b ];
	return implode( ',', $rgb ); // returns the rgb values separated by commas
}

/**
 * Set customizer tab icons
 */
function snakepit_set_customizer_tabs_icons() {

	$mods = snakepit_customizer_get_mods();

	$css = '';

	foreach ( $mods as $key => $value) {

		if ( isset( $value['icon'] ) && isset( $value['id'] ) ) {

			$section_id = $value['id'];
			$icon_slug = $value['icon'];

			$css .= '
				#accordion-section-' . $section_id . ' .accordion-section-title:before{
					position:relative;
					font-family:Dashicons;
					content : "' . snakepit_get_dashicon_css_unicode( $icon_slug ) . '";
					position: relative;
					top: 2px;
					margin-left: 5px;
					left: -6px;
					line-height: inherit;
					font-weight: normal;
				}
			';
		}
	}

	if ( ! SCRIPT_DEBUG ) {
		$css = snakepit_compact_css( $css );
	}

	wp_add_inline_style( 'snakepit-customizer-style', $css );
}
add_action( 'customize_controls_enqueue_scripts', 'snakepit_set_customizer_tabs_icons' );

/**
 * Get dashicon CSS unicod from slug
 */
function snakepit_get_dashicon_css_unicode( $icon_slug ) {

	$dashicons_array = [
		'admin-customizer' => '\f540',
		'welcome-write-blog' => '\f119',
		'welcome-view-site' => '\f115',
		'welcome-widgets-menus' => '\f116',
		'menu' => '\f333',
		'layout' => '\f538',
		'editor-video' => '\f219',
		'update' => '\f463',
		'portfolio' => '\f322',
		'images-alt' => '\f232',
		'images-alt2' => '\f233',
		'cart' => '\f174',
		'calendar' => '\f145',
		'calendar-alt' => '\f508',
		'editor-textcolor' => '\f215',
		'arrow-down-alt' => '\f346',
		'format-image' => '\f128',
		'camera' => '\f306',
		'media-spreadsheet' => '\f495',
		'format-audio' => '\f127',
		'album' => '\f514',
		'minus' => '\f460',
		'editor-table' => '\f535',
		'visibility' => '\f177',
		'share' => '\f237',
		'admin-users' => '\f110',
		'plus-alt' => '\f502',
		'arrow-left-alt2' => '\f341',
	];

	if ( isset( $dashicons_array[ $icon_slug ] ) ) {
		return $dashicons_array[ $icon_slug ];
	}
}
