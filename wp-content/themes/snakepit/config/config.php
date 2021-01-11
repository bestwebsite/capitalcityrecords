<?php
/**
 * Theme configuration file
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

/**
 * Default Google fonts option
 */
function snakepit_set_default_google_font() {
	return 'Ubuntu+Condensed|Open+Sans:400,700|Staatliches|Libre+Baskerville:400,700';
}
add_filter( 'snakepit_default_google_fonts', 'snakepit_set_default_google_font' );

/**
 * Set color scheme
 *
 * Add csutom color scheme
 *
 * @param array $color_scheme
 * @param array $color_scheme
 */
function snakepit_set_color_schemes( $color_scheme ) {

	//unset( $color_scheme['default'] );

	$color_scheme['light'] = array(
		'label'  => esc_html__( 'Light', 'snakepit' ),
		'colors' => array(
			'#fff', // body_bg
			'#fff', // page_bg
			'#fff', // submenu_background_color
			'#000', // submenu_font_color
			'#000', // '#c3ac6d', // accent
			'#444444', // main_text_color
			'#4c4c4c', // secondary_text_color
			'#0d0d0d', // strong_text_color
			'#AAA8A6', // secondary accent
		)
	);

	$color_scheme['dark'] = array(
		'label'  => esc_html__( 'Dark', 'snakepit' ),
		'colors' => array(
			'#000000', // body_bg
			'#000000', // page_bg
			'#000000', // submenu_background_color
			'#ffffff', // submenu_font_color
			'#7ea8a4', // accent
			'#f4f4f4', // main_text_color
			'#ffffff', // secondary_text_color
			'#ffffff', // strong_text_color
			'#999289', // secondary accent
		)
	);

	return $color_scheme;
}
add_filter( 'snakepit_color_schemes', 'snakepit_set_color_schemes' );

/**
 * Add additional theme support
 */
function snakepit_additional_theme_support() {

	/**
	 * Enable WooCommerce support
	 */
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'snakepit_additional_theme_support' );

/**
 * Set default WordPress option
 */
function snakepit_set_default_wp_options() {

	update_option( 'medium_size_w', 500 );
	update_option( 'medium_size_h', 286 );

	update_option( 'thread_comments_depth', 2 );
}
add_action( 'snakepit_default_wp_options_init', 'snakepit_set_default_wp_options' );

/**
 * Set mod files to include
 */
function snakepit_customizer_set_mod_files( $mod_files ) {
	$mod_files = array(
		'loading',
		'logo',
		'layout',
		'colors',
		'navigation',
		'socials',
		'fonts',
		'header',
		'header-image',
		'blog',
		'albums',
		'photos',
		'portfolio',
		'videos',
		'shop',
		'background-image',
		'footer',
		'footer-bg',
		'wvc',
		'extra',
	);

	return $mod_files;
}
add_filter( 'snakepit_customizer_mod_files', 'snakepit_customizer_set_mod_files' );