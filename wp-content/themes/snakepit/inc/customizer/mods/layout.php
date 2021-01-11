<?php
/**
 * Snakepit layout
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Site layout mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_layout_mods( $mods ) {

	$mods['layout'] = array(

		'id'      => 'layout',
		'title'   => esc_html__( 'Layout', 'snakepit' ),
		'icon'    => 'layout',
		'options' => array(

			'site_layout'  => array(
				'id'        => 'site_layout',
				'label'     => esc_html__( 'General', 'snakepit' ),
				'type'      => 'radio_images',
				'default'   => 'wide',
				'choices'   => array(
					array(
						'key'   => 'wide',
						'image' => get_parent_theme_file_uri( 'assets/img/customizer/site-layout/wide.png' ),
						'text'  => esc_html__( 'Wide', 'snakepit' ),
					),

					array(
						'key'   => 'boxed',
						'image' => get_parent_theme_file_uri( 'assets/img/customizer/site-layout/boxed.png' ),
						'text'  => esc_html__( 'Boxed', 'snakepit' ),
					),

					array(
						'key'   => 'frame',
						'image' => get_parent_theme_file_uri( 'assets/img/customizer/site-layout/frame.png' ),
						'text'  => esc_html__( 'Frame', 'snakepit' ),
					),
				),
				'transport' => 'postMessage',
			),

			'button_style' => array(
				'id'        => 'button_style',
				'label'     => esc_html__( 'Button Shape', 'snakepit' ),
				'type'      => 'select',
				'choices'   => array(
					'standard' => esc_html__( 'Standard', 'snakepit' ),
					'square'   => esc_html__( 'Square', 'snakepit' ),
					'round'    => esc_html__( 'Round', 'snakepit' ),
				),
				'transport' => 'postMessage',
			),
		),
	);

	if ( class_exists( 'Wolf_Vc_Content_Block' ) ) {

		$content_block_posts = get_posts( 'post_type="wvc_content_block"&numberposts=-1' );

		$content_blocks = array( '' => esc_html__( 'None', 'snakepit' ) );
		if ( $content_block_posts ) {
			foreach ( $content_block_posts as $content_block_options ) {
				$content_blocks[ $content_block_options->ID ] = $content_block_options->post_title;
			}
		} else {
			$content_blocks[0] = esc_html__( 'No Content Block Yet', 'snakepit' );
		}

		/*
		$mods['layout']['options']['top_bar_block_id'] = [
			'label'	=> esc_html__( 'Top Bar Block', 'snakepit' ),
			'id'	=> 'top_bar_block_id',
			'type'	=> 'select',
			'choices' => $content_blocks,
			'description' => esc_html__( 'A block to display above the navigation.', 'snakepit' ),
		);
		*/

		$mods['layout']['options']['after_header_block'] = array(
			'label'       => esc_html__( 'Post-header Block', 'snakepit' ),
			'id'          => 'after_header_block',
			'type'        => 'select',
			'choices'     => $content_blocks,
			'description' => esc_html__( 'A block to display below to header or in replacement of the header.', 'snakepit' ),
		);

		$mods['layout']['options']['before_footer_block'] = array(
			'label'       => esc_html__( 'Pre-footer Block', 'snakepit' ),
			'id'          => 'before_footer_block',
			'type'        => 'select',
			'choices'     => $content_blocks,
			'description' => esc_html__( 'A block to display above to footer or in replacement of the footer.', 'snakepit' ),
		);
	}

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_layout_mods' );
