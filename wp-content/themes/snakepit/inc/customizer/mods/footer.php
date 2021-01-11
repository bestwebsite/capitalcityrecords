<?php
/**
 * Snakepit footer
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Footer mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_footer_mods( $mods ) {

	$mods['footer'] = array(

		'id'      => 'footer',
		'title'   => esc_html__( 'Footer', 'snakepit' ),
		'icon'    => 'welcome-widgets-menus',
		'options' => array(

			'footer_type'    => array(
				'label'     => esc_html__( 'Footer Type', 'snakepit' ),
				'id'        => 'footer_type',
				'type'      => 'select',
				'choices'   => array(
					'standard' => esc_html__( 'Standard', 'snakepit' ),
					'uncover'  => esc_html__( 'Uncover', 'snakepit' ),
					'hidden'   => esc_html__( 'No Footer', 'snakepit' ),
				),
				'transport' => 'postMessage',
			),

			array(
				'label'     => esc_html__( 'Footer Width', 'snakepit' ),
				'id'        => 'footer_layout',
				'type'      => 'select',
				'choices'   => array(
					'boxed' => esc_html__( 'Boxed', 'snakepit' ),
					'wide'  => esc_html__( 'Wide', 'snakepit' ),
				),
				'transport' => 'postMessage',
			),

			array(
				'label'     => esc_html__( 'Foot Widgets Layout', 'snakepit' ),
				'id'        => 'footer_widgets_layout',
				'type'      => 'select',
				'choices'   => array(
					'3-cols'               => esc_html__( '3 Columns', 'snakepit' ),
					'4-cols'               => esc_html__( '4 Columns', 'snakepit' ),
					'one-half-two-quarter' => esc_html__( '1 Half/2 Quarters', 'snakepit' ),
					'two-quarter-one-half' => esc_html__( '2 Quarters/1 Half', 'snakepit' ),
				),
				'transport' => 'postMessage',
			),

			array(
				'label'     => esc_html__( 'Bottom Bar Layout', 'snakepit' ),
				'id'        => 'bottom_bar_layout',
				'type'      => 'select',
				'choices'   => array(
					'centered' => esc_html__( 'Centered', 'snakepit' ),
					'inline'   => esc_html__( 'Inline', 'snakepit' ),
				),
				'transport' => 'postMessage',
			),

			'footer_socials' => array(
				'id'          => 'footer_socials',
				'label'       => esc_html__( 'Socials', 'snakepit' ),
				'type'        => 'text',
				'description' => esc_html__( 'The list of social services to display in the bottom bar. (eg: facebook,twitter,instagram)', 'snakepit' ),
			),

			'copyright'      => array(
				'id'    => 'copyright',
				'label' => esc_html__( 'Copyright Text', 'snakepit' ),
				'type'  => 'text',
			),
		),
	);

	if ( class_exists( 'Wolf_Vc_Content_Block' ) ) {
		$mods['footer']['options']['footer_type']['description'] = sprintf(
			snakepit_kses(
				__( 'This is the default footer settings. You can leave the fields below empty and use a <a href="%s" target="_blank">content block</a> instead for more flexibility. See the customizer "Layout" tab or the page options below your text editor.', 'snakepit' )
			),
			'http://wlfthm.es/content-blocks'
		);
	}

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_footer_mods' );
