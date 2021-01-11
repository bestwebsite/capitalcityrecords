<?php
/**
 * Snakepit background_image
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Backgorund image mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_background_image_mods( $mods ) {

	/* Move background image setting here and rename the seciton title */
	$mods['background_image'] = array(
		'icon'    => 'format-image',
		'id'      => 'background_image',
		'title'   => esc_html__( 'Background Image', 'snakepit' ),
		'options' => array(),
	);

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_background_image_mods' );
