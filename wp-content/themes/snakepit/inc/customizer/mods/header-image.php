<?php
/**
 * Snakepit header_image
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Header image mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_header_image_mods( $mods ) {

	/* Move header image setting here and rename the section title */
	$mods['header_image'] = array(
		'id'      => 'header_image',
		'title'   => esc_html__( 'Header Image', 'snakepit' ),
		'icon'    => 'format-image',
		'options' => array(),
	);

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_header_image_mods' );
