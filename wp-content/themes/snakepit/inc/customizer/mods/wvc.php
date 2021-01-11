<?php
/**
 * Snakepit Page Builder
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * WPBAkery Page Builder Extension plugin mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_wvc_mods( $mods ) {

	if ( class_exists( 'Wolf_Visual_Composer' ) ) {
		$mods['blog']['options']['newsletter'] = array(
			'id'          => 'newsletter_form_single_blog_post',
			'label'       => esc_html__( 'Add newsletter form below single post', 'snakepit' ),
			'type'        => 'checkbox',
			'description' => esc_html__( 'Display a newsletter sign up form at the bottom of each blog post.', 'snakepit' ),
		);

	}

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_wvc_mods' );
