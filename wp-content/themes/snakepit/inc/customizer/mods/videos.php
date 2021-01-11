<?php
/**
 * Snakepit videos
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Video mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_video_mods( $mods ) {

	if ( class_exists( 'Wolf_Videos' ) ) {
		$mods['wolf_videos'] = array(
			'id'      => 'wolf_videos',
			'title'   => esc_html__( 'Videos', 'snakepit' ),
			'icon'    => 'editor-video',
			'options' => array(

				'video_layout'         => array(
					'id'          => 'video_layout',
					'label'       => esc_html__( 'Layout', 'snakepit' ),
					'type'        => 'select',
					'choices'     => array(
						'standard'      => esc_html__( 'Standard', 'snakepit' ),
						'fullwidth'     => esc_html__( 'Full width', 'snakepit' ),
						'sidebar-right' => esc_html__( 'Sidebar at right', 'snakepit' ),
						'sidebar-left'  => esc_html__( 'Sidebar at left', 'snakepit' ),
					),
					'description' => esc_html__( 'For "Sidebar" layouts, the sidebar will be visible if it contains widgets.', 'snakepit' ),
				),

				'video_grid_padding'   => array(
					'id'        => 'video_grid_padding',
					'label'     => esc_html__( 'Padding', 'snakepit' ),
					'type'      => 'select',
					'choices'   => array(
						'yes' => esc_html__( 'Yes', 'snakepit' ),
						'no'  => esc_html__( 'No', 'snakepit' ),
					),
					'transport' => 'postMessage',
				),

				'video_display'        => array(
					'id'      => 'video_display',
					'label'   => esc_html__( 'Display', 'snakepit' ),
					'type'    => 'select',
					'choices' => apply_filters(
						'snakepit_video_display_options',
						array(
							'grid' => esc_html__( 'Grid', 'snakepit' ),
						)
					),
				),

				'video_item_animation' => array(
					'label'   => esc_html__( 'Video Archive Item Animation', 'snakepit' ),
					'id'      => 'video_item_animation',
					'type'    => 'select',
					'choices' => snakepit_get_animations(),
				),

				'video_onclick'        => array(
					'label'   => esc_html__( 'On Click', 'snakepit' ),
					'id'      => 'video_onclick',
					'type'    => 'select',
					'choices' => apply_filters(
						'snakepit_video_onclick',
						array(
							'lightbox' => esc_html__( 'Open Video in Lightbox', 'snakepit' ),
							'default'  => esc_html__( 'Go to the Video Page', 'snakepit' ),
						)
					),
				),

				'video_pagination'     => array(
					'id'          => 'video_pagination',
					'label'       => esc_html__( 'Video Archive Pagination', 'snakepit' ),
					'type'        => 'select',
					'choices'     => array(
						'none'                => esc_html__( 'None', 'snakepit' ),
						'standard_pagination' => esc_html__( 'Numeric Pagination', 'snakepit' ),
						'load_more'           => esc_html__( 'Load More Button', 'snakepit' ),
					),
					'description' => esc_html__( 'You must set a number of posts per page below. The category filter will not be disabled.', 'snakepit' ),
				),

				'videos_per_page'      => array(
					'label'       => esc_html__( 'Videos per Page', 'snakepit' ),
					'id'          => 'videos_per_page',
					'type'        => 'text',
					'placeholder' => 6,
				),

				'video_single_layout'  => array(
					'id'      => 'video_single_layout',
					'label'   => esc_html__( 'Single Post Layout', 'snakepit' ),
					'type'    => 'select',
					'choices' => array(
						'sidebar-right' => esc_html__( 'Sidebar Right', 'snakepit' ),
						'sidebar-left'  => esc_html__( 'Sidebar Left', 'snakepit' ),
						'no-sidebar'    => esc_html__( 'No Sidebar', 'snakepit' ),
						'fullwidth'     => esc_html__( 'Full width', 'snakepit' ),
					),
				),

				/*
				'video_columns' => [
					'id' => 'video_columns',
					'label' => esc_html__( 'Columns', 'snakepit' ),
					'type' => 'select',
					'choices' => [
						3 => 3,
						2 => 2,
						4 => 4,
						5 => 5,
						6 => 6,
					),
					'transport' => 'postMessage',
				),*/
			),
		);
	}

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_video_mods' );
