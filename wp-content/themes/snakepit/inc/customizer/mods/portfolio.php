<?php
/**
 * Snakepit customizer work mods
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Portoflio mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_work_mods( $mods ) {

	if ( class_exists( 'Wolf_Portfolio' ) ) {

		$mods['portfolio'] = [
			'id' => 'portfolio',
			'icon' => 'portfolio',
			'title' => esc_html__( 'Portfolio', 'snakepit' ),
			'options' => [

				'work_layout' => [
					'id' =>'work_layout',
					'label' => esc_html__( 'Portfolio Layout', 'snakepit' ),
					'type' => 'select',
					'choices' => [
						'standard' => esc_html__( 'Standard', 'snakepit' ),
						'fullwidth' => esc_html__( 'Full width', 'snakepit' ),
					],
				],

				'work_display' => [
					'id' =>'work_display',
					'label' => esc_html__( 'Portfolio Display', 'snakepit' ),
					'type' => 'select',
					'choices' => apply_filters( 'snakepit_work_display_options', [
						'grid' => esc_html__( 'Grid', 'snakepit' ),
					] ),
				],

				'work_grid_padding' => [
					'id' => 'work_grid_padding',
					'label' => esc_html__( 'Padding (for grid style display only)', 'snakepit' ),
					'type' => 'select',
					'choices' => [
						'yes' => esc_html__( 'Yes', 'snakepit' ),
						'no' => esc_html__( 'No', 'snakepit' ),
					],
					'transport' => 'postMessage',
				],

				'work_item_animation' => [
					'label' => esc_html__( 'Portfolio Post Animation', 'snakepit' ),
					'id' => 'work_item_animation',
					'type' => 'select',
					'choices' => snakepit_get_animations(),
				],

				'work_pagination' => [
					'id' => 'work_pagination',
					'label' => esc_html__( 'Portfolio Archive Pagination', 'snakepit' ),
					'type' => 'select',
					'choices' => [
						'none' => esc_html__( 'None', 'snakepit' ),
						'standard_pagination' => esc_html__( 'Numeric Pagination', 'snakepit' ),
						'load_more' => esc_html__( 'Load More Button', 'snakepit' ),
					],
					'description' => esc_html__( 'You must set a number of posts per page below. The category filter will not be disabled.', 'snakepit' ),
				],

				'works_per_page' => [
					'label' => esc_html__( 'Works per Page', 'snakepit' ),
					'id' => 'works_per_page',
					'type' => 'text',
					'placeholder' => 6,
				],
			],
		];
	}

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_work_mods' );
