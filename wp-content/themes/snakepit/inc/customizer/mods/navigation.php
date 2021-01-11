<?php
/**
 * Snakepit navigation
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Navigation mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_navigation_mods( $mods ) {

	$mods['navigation'] = array(
		'id'      => 'navigation',
		'icon'    => 'menu',
		'title'   => esc_html__( 'Navigation', 'snakepit' ),
		'options' => array(

			'menu_layout'           => array(
				'id'      => 'menu_layout',
				'label'   => esc_html__( 'Main Menu Layout', 'snakepit' ),
				'type'    => 'select',
				'default' => 'top-justify',
				'choices' => array(
					'top-right'        => esc_html__( 'Top Right', 'snakepit' ),
					'top-justify'      => esc_html__( 'Top Justify', 'snakepit' ),
					'top-justify-left' => esc_html__( 'Top Justify Left', 'snakepit' ),
					'centered-logo'    => esc_html__( 'Centered', 'snakepit' ),
					'top-left'         => esc_html__( 'Top Left', 'snakepit' ),
					'offcanvas'        => esc_html__( 'Off Canvas', 'snakepit' ),
					'overlay'          => esc_html__( 'Overlay', 'snakepit' ),
					'lateral'          => esc_html__( 'Lateral', 'snakepit' ),
				),
			),

			'menu_width'            => array(
				'id'        => 'menu_width',
				'label'     => esc_html__( 'Main Menu Width', 'snakepit' ),
				'type'      => 'select',
				'choices'   => array(
					'wide'  => esc_html__( 'Wide', 'snakepit' ),
					'boxed' => esc_html__( 'Boxed', 'snakepit' ),
				),
				'transport' => 'postMessage',
			),

			'menu_style'            => array(
				'id'        => 'menu_style',
				'label'     => esc_html__( 'Main Menu Style', 'snakepit' ),
				'type'      => 'select',
				'choices'   => array(
					'semi-transparent-white' => esc_html__( 'Semi-transparent White', 'snakepit' ),
					'semi-transparent-black' => esc_html__( 'Semi-transparent Black', 'snakepit' ),
					'solid'                  => esc_html__( 'Solid', 'snakepit' ),
					'transparent'            => esc_html__( 'Transparent', 'snakepit' ),
				),
				'transport' => 'postMessage',
			),

			'menu_hover_style'      => array(
				'id'        => 'menu_hover_style',
				'label'     => esc_html__( 'Main Menu Hover Style', 'snakepit' ),
				'type'      => 'select',
				'choices'   => apply_filters(
					'snakepit_main_menu_hover_style_options',
					array(
						'none'               => esc_html__( 'None', 'snakepit' ),
						'opacity'            => esc_html__( 'Opacity', 'snakepit' ),
						'underline'          => esc_html__( 'Underline', 'snakepit' ),
						'underline-centered' => esc_html__( 'Underline Centered', 'snakepit' ),
						'border-top'         => esc_html__( 'Border Top', 'snakepit' ),
						'plain'              => esc_html__( 'Plain', 'snakepit' ),
					)
				),
				'transport' => 'postMessage',
			),

			'mega_menu_width'       => array(
				'id'        => 'mega_menu_width',
				'label'     => esc_html__( 'Mega Menu Width', 'snakepit' ),
				'type'      => 'select',
				'choices'   => array(
					'boxed'     => esc_html__( 'Boxed', 'snakepit' ),
					'wide'      => esc_html__( 'Wide', 'snakepit' ),
					'fullwidth' => esc_html__( 'Full Width', 'snakepit' ),
				),
				'transport' => 'postMessage',
			),

			'menu_breakpoint'       => array(
				'id'          => 'menu_breakpoint',
				'label'       => esc_html__( 'Main Menu Breakpoint', 'snakepit' ),
				'type'        => 'text',
				'description' => esc_html__( 'Below each width would you like to display the mobile menu? 0 will always show the desktop menu and 99999 will always show the mobile menu.', 'snakepit' ),
			),

			'menu_sticky_type'      => array(
				'id'        => 'menu_sticky_type',
				'label'     => esc_html__( 'Sticky Menu', 'snakepit' ),
				'type'      => 'select',
				'choices'   => array(
					'none' => esc_html__( 'Disabled', 'snakepit' ),
					'soft' => esc_html__( 'Sticky on scroll up', 'snakepit' ),
					'hard' => esc_html__( 'Always sticky', 'snakepit' ),
				),
				'transport' => 'postMessage',
			),

			'menu_skin'             => array(
				'id'          => 'menu_skin',
				'label'       => esc_html__( 'Menu Skin', 'snakepit' ),
				'type'        => 'select',
				'choices'     => array(
					'light' => esc_html__( 'Light', 'snakepit' ),
					'dark'  => esc_html__( 'Dark', 'snakepit' ),
				),
				'transport'   => 'postMessage',
				'description' => esc_html__( 'Can be overwite on single page.', 'snakepit' ),
			),

			'menu_cta_content_type' => array(
				'id'      => 'menu_cta_content_type',
				'label'   => esc_html__( 'Additional Content', 'snakepit' ),
				'type'    => 'select',
				'default' => 'icons',
				'choices' => apply_filters(
					'snakepit_menu_cta_content_type_options',
					array(
						'search_icon'    => esc_html__( 'Search Icon', 'snakepit' ),
						'secondary-menu' => esc_html__( 'Secondary Menu', 'snakepit' ),
						'none'           => esc_html__( 'None', 'snakepit' ),
					)
				),
			),
		),
	);

	$mods['navigation']['options']['menu_socials'] = array(
		'id'          => 'menu_socials',
		'label'       => esc_html__( 'Menu Socials', 'snakepit' ),
		'type'        => 'text',
		'description' => esc_html__( 'The list of social services to display in the menu. (eg: facebook,twitter,instagram)', 'snakepit' ),
	);

	$mods['navigation']['options']['side_panel_position'] = array(
		'id'          => 'side_panel_position',
		'label'       => esc_html__( 'Side Panel', 'snakepit' ),
		'type'        => 'select',
		'choices'     => array(
			'none'  => esc_html__( 'None', 'snakepit' ),
			'right' => esc_html__( 'At Right', 'snakepit' ),
			'left'  => esc_html__( 'At Left', 'snakepit' ),
		),
		'description' => esc_html__( 'Note that it will be disable with a vertical menu layout (offcanvas and lateral layout).', 'snakepit' ),
	);

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_navigation_mods' );
