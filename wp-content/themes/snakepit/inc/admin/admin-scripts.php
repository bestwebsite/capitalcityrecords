<?php
/**
 * Snakepit admin scripts
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Admin scripts
 */
function snakepit_admin_scripts() {

	$suffix  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	$version = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? time() : snakepit_get_theme_version();

	/* Admin styles */
	wp_enqueue_style( 'chosen', get_template_directory_uri() . '/assets/js/admin/chosen/chosen.min.css', array(), '1.1.0' );
	wp_enqueue_style( 'snakepit-admin', get_template_directory_uri() . '/assets/css/admin/admin' . $suffix . '.css', array(), $version );

	/* Admins scripts */
	wp_enqueue_media();
	wp_enqueue_script( 'chosen', get_template_directory_uri() . '/assets/js/admin/chosen/chosen.jquery.min.js', array( 'jquery' ), '1.1.0', true );
	wp_enqueue_script( 'js-cookie', get_template_directory_uri() . '/assets/js/lib/js.cookie.min.js', array( 'jquery' ), '1.4.1', true );

	if ( isset( $_GET['page'] ) && ( esc_attr( wp_unslash( $_GET['page'] ) ) === snakepit_get_theme_slug() . '-about' ) ) {
		wp_enqueue_script( 'snakepit-tabs', get_template_directory_uri() . '/assets/js/admin/tabs.js', array( 'jquery' ), $version, true );
	}

	wp_enqueue_script( 'snakepit-admin', get_template_directory_uri() . '/assets/js/admin/admin.js', array( 'jquery', 'jquery-ui-sortable', 'wp-color-picker' ), $version, true );

	/*
	* Check the uer capabilities to avoid enabling the customizer reset button in guest mod with Customizer Preview for Theme Demo plugin
	*/
	if ( current_user_can( 'manage_options' ) ) {
		wp_enqueue_script( 'snakepit-reset-customizer-button', get_template_directory_uri() . '/assets/js/admin/reset-customizer-button' . $suffix . '.js', array( 'jquery' ), $version, true );
	}

	wp_localize_script(
		'snakepit-admin',
		'SnakepitAdminParams',
		array(
			'ajaxUrl'               => esc_url( admin_url( 'admin-ajax.php' ) ),
			'noResult'              => esc_html__( 'No result', 'snakepit' ),
			'resetModsText'         => esc_html__( 'Reset', 'snakepit' ),
			'subHeadingPlaceholder' => esc_html__( 'Subheading', 'snakepit' ),
			'confirm'               => esc_html__( 'Are you sure to want to reset all mods to default? There is no way back.', 'snakepit' ),
			'nonce'                 => array(
				'reset' => wp_create_nonce( 'snakepit-customizer-reset' ),
			),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'snakepit_admin_scripts' );

/**
 * Additional custom CSS
 *
 * @see snakepit_get_theme_uri
 */
function snakepit_admin_custom_css() {

	$css = '';

	$accent = get_theme_mod( 'accent_color' );

	if ( $accent ) {
		$css .= "
			.accent{
				color:$accent;
			}

			.wvc_colored-dropdown .accent{
				background-color:$accent;
				color:#fff;
			}
		";
	}

	if ( is_file( get_template_directory() . '/config/badge.png' ) ) {

		$badge_url = get_template_directory_uri() . '/config/badge.png';

		$css .= "
			.snakepit-about-page-logo{
				background-image: url($badge_url)!important;
			}
		";
	}

	if ( ! SCRIPT_DEBUG ) {
		$css = snakepit_compact_css( apply_filters( 'snakepit_admin_custom_css', $css ) );
	}

	wp_add_inline_style( 'snakepit-admin', $css );
}
add_action( 'admin_enqueue_scripts', 'snakepit_admin_custom_css' );
