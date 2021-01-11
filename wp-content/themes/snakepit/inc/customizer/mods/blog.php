<?php
/**
 * Snakepit customizer blog mods
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Blog mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_post_mods( $mods ) {

	$mods['blog'] = array(
		'id'      => 'blog',
		'icon'    => 'welcome-write-blog',
		'title'   => esc_html__( 'Blog', 'snakepit' ),
		'options' => array(

			'post_layout'           => array(
				'id'          => 'post_layout',
				'label'       => esc_html__( 'Blog Archive Layout', 'snakepit' ),
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

			'post_display'          => array(
				'id'      => 'post_display',
				'label'   => esc_html__( 'Blog Archive Display', 'snakepit' ),
				'type'    => 'select',
				'choices' => apply_filters(
					'snakepit_post_display_options',
					array(
						'standard' => esc_html__( 'Standard', 'snakepit' ),
					)
				),
			),

			'post_grid_padding'     => array(
				'id'        => 'post_grid_padding',
				'label'     => esc_html__( 'Padding (for grid style display only)', 'snakepit' ),
				'type'      => 'select',
				'choices'   => array(
					'yes' => esc_html__( 'Yes', 'snakepit' ),
					'no'  => esc_html__( 'No', 'snakepit' ),
				),
				'transport' => 'postMessage',
			),

			'date_format'           => array(
				'id'      => 'date_format',
				'label'   => esc_html__( 'Blog Date Format', 'snakepit' ),
				'type'    => 'select',
				'choices' => array(
					''           => esc_html__( 'Default', 'snakepit' ),
					'human_diff' => esc_html__( '"X Time ago"', 'snakepit' ),
				),
			),

			'post_pagination'       => array(
				'id'      => 'post_pagination',
				'label'   => esc_html__( 'Blog Archive Pagination', 'snakepit' ),
				'type'    => 'select',
				'choices' => array(
					'standard_pagination' => esc_html__( 'Numeric Pagination', 'snakepit' ),
					'load_more'           => esc_html__( 'Load More Button', 'snakepit' ),
				),
			),

			'post_excerpt_type'     => array(
				'id'          => 'post_excerpt_type',
				'label'       => esc_html__( 'Blog Archive Post Excerpt Type', 'snakepit' ),
				'type'        => 'select',
				'choices'     => array(
					'auto'   => esc_html__( 'Auto', 'snakepit' ),
					'manual' => esc_html__( 'Manual', 'snakepit' ),
				),
				'description' => sprintf( snakepit_kses( __( 'Only for the "Standard" display type. To split your post manually, you can use the <a href="%s" target="_blank">"read more"</a> tag.', 'snakepit' ) ), 'https://codex.wordpress.org/Customizing_the_Read_More' ),
			),

			'post_single_layout'    => array(
				'id'      => 'post_single_layout',
				'label'   => esc_html__( 'Single Post Layout', 'snakepit' ),
				'type'    => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Sidebar Right', 'snakepit' ),
					'sidebar-left'  => esc_html__( 'Sidebar Left', 'snakepit' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'snakepit' ),
					'fullwidth'     => esc_html__( 'Full width', 'snakepit' ),
				),
			),

			'post_author_box'       => array(
				'id'      => 'post_author_box',
				'label'   => esc_html__( 'Single Post Author Box', 'snakepit' ),
				'type'    => 'select',
				'choices' => array(
					'yes' => esc_html__( 'Yes', 'snakepit' ),
					'no'  => esc_html__( 'No', 'snakepit' ),
				),
			),

			'post_related_posts'    => array(
				'id'      => 'post_related_posts',
				'label'   => esc_html__( 'Single Post Related Posts', 'snakepit' ),
				'type'    => 'select',
				'choices' => array(
					'yes' => esc_html__( 'Yes', 'snakepit' ),
					'no'  => esc_html__( 'No', 'snakepit' ),
				),
			),

			'post_item_animation'   => array(
				'label'   => esc_html__( 'Blog Archive Item Animation', 'snakepit' ),
				'id'      => 'post_item_animation',
				'type'    => 'select',
				'choices' => snakepit_get_animations(),
			),

			'post_display_elements' => array(
				'id'          => 'post_display_elements',
				'label'       => esc_html__( 'Elements to show by default', 'snakepit' ),
				'type'        => 'group_checkbox',
				'choices'     => array(
					'show_thumbnail'  => esc_html__( 'Thumbnail', 'snakepit' ),
					'show_date'       => esc_html__( 'Date', 'snakepit' ),
					'show_text'       => esc_html__( 'Text', 'snakepit' ),
					'show_category'   => esc_html__( 'Category', 'snakepit' ),
					'show_author'     => esc_html__( 'Author', 'snakepit' ),
					'show_tags'       => esc_html__( 'Tags', 'snakepit' ),
					'show_extra_meta' => esc_html__( 'Extra Meta', 'snakepit' ),
				),
				'description' => esc_html__( 'Note that some options may be ignored depending on the post display.', 'snakepit' ),
			),
		),
	);

	if ( class_exists( 'Wolf_Custom_Post_Meta' ) ) {

		$mods['blog']['options'][] = array(
			'label'   => esc_html__( 'Enable Custom Post Meta', 'snakepit' ),
			'id'      => 'enable_custom_post_meta',
			'type'    => 'group_checkbox',
			'choices' => array(
				'post_enable_views'        => esc_html__( 'Views', 'snakepit' ),
				'post_enable_likes'        => esc_html__( 'Likes', 'snakepit' ),
				'post_enable_reading_time' => esc_html__( 'Reading Time', 'snakepit' ),
			),
		);
	}

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_post_mods' );
