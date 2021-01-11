<?php
/**
 * Snakepit events
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Set artists mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_artist_mods( $mods ) {

	if ( class_exists( 'Wolf_Artists' ) ) {
		$mods['wolf_artists'] = array(
			'priority' => 45,
			'id'       => 'wolf_artists',
			'title'    => esc_html__( 'Artists', 'snakepit' ),
			'icon'     => 'admin-users',
			'options'  => array(

				'artist_layout'       => array(
					'id'          => 'artist_layout',
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

				'artist_display'      => array(
					'id'      => 'artist_display',
					'label'   => esc_html__( 'Display', 'snakepit' ),
					'type'    => 'select',
					'choices' => apply_filters(
						'snakepit_artist_display_options',
						array(
							'list' => esc_html__( 'List', 'snakepit' ),
						)
					),
				),

				'artist_grid_padding' => array(
					'id'        => 'artist_grid_padding',
					'label'     => esc_html__( 'Padding', 'snakepit' ),
					'type'      => 'select',
					'choices'   => array(
						'yes' => esc_html__( 'Yes', 'snakepit' ),
						'no'  => esc_html__( 'No', 'snakepit' ),
					),
					'transport' => 'postMessage',
				),

				'artist_pagination'   => array(
					'id'          => 'artist_pagination',
					'label'       => esc_html__( 'Artists Archive Pagination', 'snakepit' ),
					'type'        => 'select',
					'choices'     => array(
						'none'                => esc_html__( 'None', 'snakepit' ),
						'standard_pagination' => esc_html__( 'Numeric Pagination', 'snakepit' ),
						'load_more'           => esc_html__( 'Load More Button', 'snakepit' ),
					),
					'description' => esc_html__( 'You must set a number of posts per page below. The category filter will not be disabled.', 'snakepit' ),
				),

				'artists_per_page'    => array(
					'label'       => esc_html__( 'Artists per Page', 'snakepit' ),
					'id'          => 'artists_per_page',
					'type'        => 'text',
					'placeholder' => 6,
				),
			),
		);
	}

	return $mods;

}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_artist_mods' );
