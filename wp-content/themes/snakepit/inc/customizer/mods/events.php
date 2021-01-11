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
 * Events mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_event_mods( $mods ) {

	if ( class_exists( 'Wolf_Events' ) ) {
		$mods['wolf_events'] = array(
			'priority' => 45,
			'id'       => 'wolf_events',
			'title'    => esc_html__( 'Events', 'snakepit' ),
			'icon'     => 'calendar-alt',
			'options'  => array(

				'event_layout'       => array(
					'id'          => 'event_layout',
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

				'event_display'      => array(
					'id'      => 'event_display',
					'label'   => esc_html__( 'Display', 'snakepit' ),
					'type'    => 'select',
					'choices' => apply_filters(
						'snakepit_list_display_options',
						array(
							'list' => esc_html__( 'List', 'snakepit' ),
						)
					),
				),

				'event_grid_padding' => array(
					'id'        => 'event_grid_padding',
					'label'     => esc_html__( 'Padding', 'snakepit' ),
					'type'      => 'select',
					'choices'   => array(
						'yes' => esc_html__( 'Yes', 'snakepit' ),
						'no'  => esc_html__( 'No', 'snakepit' ),
					),
					'transport' => 'postMessage',
				),
			),
		);
	}

	return $mods;

}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_event_mods' );
