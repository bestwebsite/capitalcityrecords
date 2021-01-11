<?php
/**
 * Snakepit extra
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Extra mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_extra_mods( $mods ) {

	$mods['extra'] = array(

		'id'      => 'extra',
		'title'   => esc_html__( 'Extra', 'snakepit' ),
		'icon'    => 'plus-alt',
		'options' => array(
			array(
				'label' => esc_html__( 'Enable Scroll Animations on Mobile (not recommended)', 'snakepit' ),
				'id'    => 'enable_mobile_animations',
				'type'  => 'checkbox',
			),
			array(
				'label' => esc_html__( 'Enable Parallax on Mobile (not recommended)', 'snakepit' ),
				'id'    => 'enable_mobile_parallax',
				'type'  => 'checkbox',
			),
		),
	);
	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_extra_mods' );
