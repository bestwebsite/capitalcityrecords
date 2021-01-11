<?php
/**
 * Snakepit footer_bg
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Footer background mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_footer_bg_mods( $mods ) {

	$mods['footer_bg'] = array(
		'id'         => 'footer_bg',
		'label'      => esc_html__( 'Footer Background', 'snakepit' ),
		'background' => true,
		'font_color' => true,
		'icon'       => 'format-image',
	);

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_footer_bg_mods' );
