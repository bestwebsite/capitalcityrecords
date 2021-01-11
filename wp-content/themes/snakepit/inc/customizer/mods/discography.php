<?php
/**
 * Snakepit discography
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Discography mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_release_mods( $mods ) {

	if ( class_exists( 'Wolf_Discography' ) ) {
		$mods['wolf_discography'] = array(
			'priority' => 45,
			'id'       => 'wolf_discography',
			'title'    => esc_html__( 'Discography', 'snakepit' ),
			'icon'     => 'album',
			'options'  => array(
				'release_layout'       => array(
					'id'          => 'release_layout',
					'label'       => esc_html__( 'Layout', 'snakepit' ),
					'type'        => 'select',
					'choices'     => array(
						'standard'      => esc_html__( 'Standard', 'snakepit' ),
						'fullwidth'     => esc_html__( 'Full width', 'snakepit' ),
						'sidebar-right' => esc_html__( 'Sidebar at right', 'snakepit' ),
						'sidebar-left'  => esc_html__( 'Sidebar at left', 'snakepit' ),
					),
					'transport'   => 'postMessage',
					'description' => esc_html__( 'For "Sidebar" layouts, the sidebar will be visible if it contains widgets.', 'snakepit' ),
				),

				'release_display'      => array(
					'id'      => 'release_display',
					'label'   => esc_html__( 'Display', 'snakepit' ),
					'type'    => 'select',
					'choices' => apply_filters(
						'snakepit_release_display_options',
						array(
							'grid' => esc_html__( 'Grid', 'snakepit' ),
						)
					),
				),

				'release_grid_padding' => array(
					'id'        => 'release_grid_padding',
					'label'     => esc_html__( 'Padding (for grid display)', 'snakepit' ),
					'type'      => 'select',
					'choices'   => array(
						'yes' => esc_html__( 'Yes', 'snakepit' ),
						'no'  => esc_html__( 'No', 'snakepit' ),
					),
					'transport' => 'postMessage',
				),

				'release_pagination'   => array(
					'id'          => 'release_pagination',
					'label'       => esc_html__( 'Discography Archive Pagination', 'snakepit' ),
					'type'        => 'select',
					'choices'     => array(
						'none'                => esc_html__( 'None', 'snakepit' ),
						'standard_pagination' => esc_html__( 'Numeric Pagination', 'snakepit' ),
						'load_more'           => esc_html__( 'Load More Button', 'snakepit' ),
					),
					'description' => esc_html__( 'You must set a number of posts per page below. The category filter will not be disabled.', 'snakepit' ),
				),

				'releases_per_page'    => array(
					'label'       => esc_html__( 'Releases per Page', 'snakepit' ),
					'id'          => 'releases_per_page',
					'type'        => 'text',
					'placeholder' => 6,
				),
			),
		);
	}

	return $mods;

}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_release_mods' );
