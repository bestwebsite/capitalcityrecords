<?php
/**
 * Snakepit Single post styles
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Get background CSS
 *
 * @param string $selector
 * @param string $meta_name
 * @return string
 */
function snakepit_post_meta_get_background_css( $selector, $meta_name ) {

	$css = '';
	if ( function_exists( 'is_product_category' ) && is_product_category() && get_term_meta( get_queried_object()->term_id, 'thumbnail_id', true ) ) {

		$thumbnail_id = get_term_meta( get_queried_object()->term_id, 'thumbnail_id', true );
		$url = wp_get_attachment_image_src( $thumbnail_id, 'snakepit-XL' );
		$css = "$selector {background:url($url) no-repeat center center;}
			$selector {
				-webkit-background-size: 100%;
				-o-background-size: 100%;
				-moz-background-size: 100%;
				background-size: 100%;
				-webkit-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
		";
		$css .= ".header-overlay{background-color:#000; opacity:.4}";

	} elseif ( 'image' === get_post_meta( snakepit_get_inherit_post_id(), '_post_bg_type', true ) ) {

		$custom_css = get_post_meta( snakepit_get_inherit_post_id(), '_post_css', true );

		if ( $custom_css ) {
			$css .= $custom_css;
		}
	}

	if ( ! SCRIPT_DEBUG ) {
		$css = snakepit_compact_css( $css );
	}

	return $css;
}

/**
 * Output the post CSS
 */
function snakepit_output_post_header_css() {

	if ( is_404() ) {
		return;
	}

	$css =  '/* Single post styles */';

	if ( 'none' != snakepit_get_header_type() ) {
		$css .= "\n";
	    	$css .= snakepit_post_meta_get_background_css( '#hero', '_post_bg' );
	}
	wp_add_inline_style( 'snakepit-single-post-style', $css );
}
add_action( 'wp_enqueue_scripts', 'snakepit_output_post_header_css', 14 );
