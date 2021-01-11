<?php
/**
 * Snakepit loading
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Loading animation mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_loading_mods( $mods ) {

	$mods['loading'] = array(

		'id'      => 'loading',
		'title'   => esc_html__( 'Loading', 'snakepit' ),
		'icon'    => 'update',
		'options' => array(

			array(
				'label'   => esc_html__( 'Loading Animation Type', 'snakepit' ),
				'id'      => 'loading_animation_type',
				'type'    => 'select',
				'choices' => array(
					'spinner' => esc_html__( 'Spinner', 'snakepit' ),
					'none'    => esc_html__( 'None', 'snakepit' ),
				),
			),
		),
	);
	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_loading_mods' );
