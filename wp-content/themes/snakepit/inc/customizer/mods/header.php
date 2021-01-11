<?php
/**
 * Snakepit header_settings
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

function snakepit_set_header_settings_mods( $mods ) {

	$mods['header_settings'] = array(

		'id'      => 'header_settings',
		'title'   => esc_html__( 'Header Layout', 'snakepit' ),
		'icon'    => 'editor-table',
		'options' => array(

			'hero_layout'            => array(
				'label'     => esc_html__( 'Page Header Layout', 'snakepit' ),
				'id'        => 'hero_layout',
				'type'      => 'select',
				'choices'   => array(
					'standard'   => esc_html__( 'Standard', 'snakepit' ),
					'big'        => esc_html__( 'Big', 'snakepit' ),
					'small'      => esc_html__( 'Small', 'snakepit' ),
					'fullheight' => esc_html__( 'Full Height', 'snakepit' ),
					'none'       => esc_html__( 'No header', 'snakepit' ),
				),
				'transport' => 'postMessage',
			),

			'hero_background_effect' => array(
				'id'      => 'hero_background_effect',
				'label'   => esc_html__( 'Header Image Effect', 'snakepit' ),
				'type'    => 'select',
				'choices' => array(
					'parallax' => esc_html__( 'Parallax', 'snakepit' ),
					'zoomin'   => esc_html__( 'Zoom', 'snakepit' ),
					'none'     => esc_html__( 'None', 'snakepit' ),
				),
			),

			'hero_scrolldown_arrow'  => array(
				'id'      => 'hero_scrolldown_arrow',
				'label'   => esc_html__( 'Scroll Down arrow', 'snakepit' ),
				'type'    => 'select',
				'choices' => array(
					'yes' => esc_html__( 'Yes', 'snakepit' ),
					''    => esc_html__( 'No', 'snakepit' ),
				),
			),

			array(
				'label'   => esc_html__( 'Header Overlay', 'snakepit' ),
				'id'      => 'hero_overlay',
				'type'    => 'select',
				'choices' => array(
					''       => esc_html__( 'Default', 'snakepit' ),
					'custom' => esc_html__( 'Custom', 'snakepit' ),
					'none'   => esc_html__( 'None', 'snakepit' ),
				),
			),

			array(
				'label' => esc_html__( 'Overlay Color', 'snakepit' ),
				'id'    => 'hero_overlay_color',
				'type'  => 'color',
				'value' => '#000000',
			),

			array(
				'label' => esc_html__( 'Overlay Opacity (in percent)', 'snakepit' ),
				'id'    => 'hero_overlay_opacity',
				'desc'  => esc_html__( 'Adapt the header overlay opacity if needed', 'snakepit' ),
				'type'  => 'text',
				'value' => 40,
			),
		),
	);

	if ( class_exists( 'Wolf_Vc_Content_Block' ) ) {
		$mods['header_settings']['options']['hero_layout']['description'] = sprintf(
			snakepit_kses(
				__( 'The header can be overwritten by a <a href="%s" target="_blank">content block</a> on all pages or on specific pages. See the customizer "Layout" tab or the page options below your text editor.', 'snakepit' )
			),
			'http://wlfthm.es/content-blocks'
		);
	}

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_header_settings_mods' );
