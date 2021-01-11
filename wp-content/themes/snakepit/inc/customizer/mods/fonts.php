<?php
/**
 * Snakepit customizer font mods
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Font mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_font_mods( $mods ) {

	/**
	 * Get Google Fonts from Font loader
	 */
	$_fonts = apply_filters( 'snakepit_mods_fonts', snakepit_get_google_fonts_options() );

	$font_choices = array( 'default' => esc_html__( 'Default', 'snakepit' ) );

	foreach ( $_fonts as $key => $value ) {
		$font_choices[ $key ] = $key;
	}

	$mods['fonts'] = array(
		'id'      => 'fonts',
		'title'   => esc_html__( 'Fonts', 'snakepit' ),
		'icon'    => 'editor-textcolor',
		'options' => array(),
	);

	$mods['fonts']['options']['body_font_name'] = array(
		'label'     => esc_html__( 'Body Font Name', 'snakepit' ),
		'id'        => 'body_font_name',
		'type'      => 'select',
		'choices'   => $font_choices,
		'transport' => 'postMessage',
	);

	$mods['fonts']['options']['body_font_size'] = array(
		'label'       => esc_html__( 'Body Font Size', 'snakepit' ),
		'id'          => 'body_font_size',
		'type'        => 'text',
		'transport'   => 'postMessage',
		'description' => esc_html__( 'Don\'t ommit px. Leave empty to use the default font size.', 'snakepit' ),
	);

	/*************************Menu*/

	$mods['fonts']['options']['menu_font_name'] = array(
		'id'        => 'menu_font_name',
		'label'     => esc_html__( 'Menu Font', 'snakepit' ),
		'type'      => 'select',
		'choices'   => $font_choices,
		'transport' => 'postMessage',
	);

	$mods['fonts']['options']['menu_font_weight'] = array(
		'label'     => esc_html__( 'Menu Font Weight', 'snakepit' ),
		'id'        => 'menu_font_weight',
		'type'      => 'text',
		'transport' => 'postMessage',
	);

	$mods['fonts']['options']['menu_font_transform'] = array(
		'id'        => 'menu_font_transform',
		'label'     => esc_html__( 'Menu Font Transform', 'snakepit' ),
		'type'      => 'select',
		'choices'   => array(
			'none'      => esc_html__( 'None', 'snakepit' ),
			'uppercase' => esc_html__( 'Uppercase', 'snakepit' ),
			'lowercase' => esc_html__( 'Lowercase', 'snakepit' ),
		),
		'transport' => 'postMessage',
	);

	$mods['fonts']['options']['menu_font_letter_spacing'] = array(
		'label'     => esc_html__( 'Menu Letter Spacing (omit px)', 'snakepit' ),
		'id'        => 'menu_font_letter_spacing',
		'type'      => 'int',
		'transport' => 'postMessage',
	);

	$mods['fonts']['options']['menu_font_style'] = array(
		'id'        => 'menu_font_style',
		'label'     => esc_html__( 'Menu Font Style', 'snakepit' ),
		'type'      => 'select',
		'choices'   => array(
			'normal'  => esc_html__( 'Normal', 'snakepit' ),
			'italic'  => esc_html__( 'Italic', 'snakepit' ),
			'oblique' => esc_html__( 'Oblique', 'snakepit' ),
		),
		'transport' => 'postMessage',
	);

	$mods['fonts']['options']['submenu_font_name'] = array(
		'id'        => 'submenu_font_name',
		'label'     => esc_html__( 'Submenu Font', 'snakepit' ),
		'type'      => 'select',
		'choices'   => $font_choices,
		'transport' => 'postMessage',
	);

	$mods['fonts']['options']['submenu_font_weight'] = array(
		'label'     => esc_html__( 'Submenu Font Weight', 'snakepit' ),
		'id'        => 'submenu_font_weight',
		'type'      => 'text',
		'transport' => 'postMessage',
	);

	$mods['fonts']['options']['submenu_font_transform'] = array(
		'id'        => 'submenu_font_transform',
		'label'     => esc_html__( 'Submenu Font Transform', 'snakepit' ),
		'type'      => 'select',
		'choices'   => array(
			'none'      => esc_html__( 'None', 'snakepit' ),
			'uppercase' => esc_html__( 'Uppercase', 'snakepit' ),
			'lowercase' => esc_html__( 'Lowercase', 'snakepit' ),
		),
		'transport' => 'postMessage',
	);

	$mods['fonts']['options']['submenu_font_style'] = array(
		'id'        => 'submenu_font_style',
		'label'     => esc_html__( 'Submenu Font Style', 'snakepit' ),
		'type'      => 'select',
		'choices'   => array(
			'normal'  => esc_html__( 'Normal', 'snakepit' ),
			'italic'  => esc_html__( 'Italic', 'snakepit' ),
			'oblique' => esc_html__( 'Oblique', 'snakepit' ),
		),
		'transport' => 'postMessage',
	);

	$mods['fonts']['options']['submenu_font_letter_spacing'] = array(
		'label'     => esc_html__( 'Submenu Letter Spacing (omit px)', 'snakepit' ),
		'id'        => 'submenu_font_letter_spacing',
		'type'      => 'int',
		'transport' => 'postMessage',
	);

	/*************************Heading*/

	$mods['fonts']['options']['heading_font_name'] = array(
		'id'        => 'heading_font_name',
		'label'     => esc_html__( 'Heading Font', 'snakepit' ),
		'type'      => 'select',
		'choices'   => $font_choices,
		'transport' => 'postMessage',
	);

	$mods['fonts']['options']['heading_font_weight'] = array(
		'label'       => esc_html__( 'Heading Font weight', 'snakepit' ),
		'id'          => 'heading_font_weight',
		'type'        => 'text',
		'description' => esc_html__( 'For example: "400" is normal, "700" is bold.The available font weights depend on the font.', 'snakepit' ),
		'transport'   => 'postMessage',
	);

	$mods['fonts']['options']['heading_font_transform'] = array(
		'id'        => 'heading_font_transform',
		'label'     => esc_html__( 'Heading Font Transform', 'snakepit' ),
		'type'      => 'select',
		'choices'   => array(
			'none'      => esc_html__( 'None', 'snakepit' ),
			'uppercase' => esc_html__( 'Uppercase', 'snakepit' ),
			'lowercase' => esc_html__( 'Lowercase', 'snakepit' ),
		),
		'transport' => 'postMessage',
	);

	$mods['fonts']['options']['heading_font_style'] = array(
		'id'        => 'heading_font_style',
		'label'     => esc_html__( 'Heading Font Style', 'snakepit' ),
		'type'      => 'select',
		'choices'   => array(
			'normal'  => esc_html__( 'Normal', 'snakepit' ),
			'italic'  => esc_html__( 'Italic', 'snakepit' ),
			'oblique' => esc_html__( 'Oblique', 'snakepit' ),
		),
		'transport' => 'postMessage',
	);

	$mods['fonts']['options']['heading_font_letter_spacing'] = array(
		'label'     => esc_html__( 'Heading Letter Spacing (omit px)', 'snakepit' ),
		'id'        => 'heading_font_letter_spacing',
		'type'      => 'int',
		'transport' => 'postMessage',
	);

	return $mods;

}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_font_mods', 10 );
