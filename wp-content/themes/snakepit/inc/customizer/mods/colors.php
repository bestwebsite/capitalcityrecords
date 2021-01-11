<?php
/**
 * Snakepit customizer color mods
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Color scheme mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_colors_mods( $mods ) {

	$color_scheme = snakepit_get_color_scheme();

	$mods['colors'] = array(
		'id'      => 'colors',
		'icon'    => 'admin-customizer',
		'title'   => esc_html__( 'Colors', 'snakepit' ),
		'options' => array(
			array(
				'label'     => esc_html__( 'Color scheme', 'snakepit' ),
				'id'        => 'color_scheme',
				'type'      => 'select',
				'choices'   => snakepit_get_color_scheme_choices(),
				'transport' => 'postMessage',
			),

			'body_background_color'    => array(
				'id'        => 'body_background_color',
				'label'     => esc_html__( 'Body Background Color', 'snakepit' ),
				'type'      => 'color',
				'transport' => 'postMessage',
				'default'   => $color_scheme[0],
			),

			'page_background_color'    => array(
				'id'        => 'page_background_color',
				'label'     => esc_html__( 'Page Background Color', 'snakepit' ),
				'type'      => 'color',
				'transport' => 'postMessage',
				'default'   => $color_scheme[1],
			),

			'submenu_background_color' => array(
				'id'        => 'submenu_background_color',
				'label'     => esc_html__( 'Submenu Background Color', 'snakepit' ),
				'type'      => 'color',
				'transport' => 'postMessage',
				'default'   => $color_scheme[2],
			),

			array(
				'id'        => 'submenu_font_color',
				'label'     => esc_html__( 'Submenu Font Color', 'snakepit' ),
				'type'      => 'color',
				'transport' => 'postMessage',
				'default'   => $color_scheme[3],
			),

			'accent_color'             => array(
				'id'        => 'accent_color',
				'label'     => esc_html__( 'Accent Color', 'snakepit' ),
				'type'      => 'color',
				'transport' => 'postMessage',
				'default'   => $color_scheme[4],
			),

			array(
				'id'        => 'main_text_color',
				'label'     => esc_html__( 'Main Text Color', 'snakepit' ),
				'type'      => 'color',
				'transport' => 'postMessage',
				'default'   => $color_scheme[5],
			),

			array(
				'id'          => 'strong_text_color',
				'label'       => esc_html__( 'Strong Text Color', 'snakepit' ),
				'type'        => 'color',
				'transport'   => 'postMessage',
				'default'     => $color_scheme[7],
				'description' => esc_html__( 'Heading, "strong" tags etc...', 'snakepit' ),
			),
		),
	);

	return $mods;

}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_colors_mods' );
