<?php
/**
 * Snakepit Socials
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Social services mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_socials_mods( $mods ) {

	if ( function_exists( 'wvc_get_socials' ) ) {

		$socials = wvc_get_socials();

		$mods['socials'] = array(
			'id'      => 'socials',
			'title'   => esc_html__( 'Social Networks', 'snakepit' ),
			'icon'    => 'share',
			'options' => array(),
		);

		foreach ( $socials as $social ) {
			$mods['socials']['options'][ $social ] = array(
				'id'    => $social,
				'label' => ucfirst( $social ),
				'type'  => 'text',
			);
		}
	}

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_socials_mods' );
