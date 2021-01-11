<?php // phpcs:ignore
/**
 * WPBakery Page Builder post modules
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

if ( ! defined( 'ABSPATH' ) || ! class_exists( 'Wolf_Visual_Composer' ) || ! defined( 'WPB_VC_VERSION' ) ) {
	return;
}

$order_by_values = array(
	'',
	esc_html__( 'Date', 'snakepit' )          => 'date',
	esc_html__( 'ID', 'snakepit' )            => 'ID',
	esc_html__( 'Author', 'snakepit' )        => 'author',
	esc_html__( 'Title', 'snakepit' )         => 'title',
	esc_html__( 'Modified', 'snakepit' )      => 'modified',
	esc_html__( 'Random', 'snakepit' )        => 'rand',
	esc_html__( 'Comment count', 'snakepit' ) => 'comment_count',
	esc_html__( 'Menu order', 'snakepit' )    => 'menu_order',
);

$order_way_values = array(
	'',
	esc_html__( 'Descending', 'snakepit' ) => 'DESC',
	esc_html__( 'Ascending', 'snakepit' )  => 'ASC',
);

$shared_gradient_colors = ( function_exists( 'wvc_get_shared_gradient_colors' ) ) ? wvc_get_shared_gradient_colors() : array();
$shared_colors          = ( function_exists( 'wvc_get_shared_colors' ) ) ? wvc_get_shared_colors() : array();

if ( ! class_exists( 'WPBakeryShortCode_Wvc_Post_Index' ) ) {
	/**
	 * Post Loop Module
	 */
	vc_map(
		array(
			'name'        => esc_html__( 'Posts', 'snakepit' ),
			'description' => esc_html__( 'Display your posts using the theme layouts', 'snakepit' ),
			'base'        => 'wvc_post_index',
			'category'    => esc_html__( 'Content', 'snakepit' ),
			'icon'        => 'fa fa-th',
			'weight'      => 999,
			'params'      => array(

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Index ID', 'snakepit' ),
					'value'       => 'index-' . rand( 0, 99999 ),
					'param_name'  => 'el_id',
					'description' => esc_html__( 'A unique identifier for the post module (required).', 'snakepit' ),
				),

				array(
					'param_name'  => 'post_display',
					'heading'     => esc_html__( 'Post Display', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array_flip(
						apply_filters(
							'snakepit_post_display_options',
							array(
								'standard' => esc_html__( 'Standard', 'snakepit' ),
							)
						)
					),
					'std'         => 'grid',
					'admin_label' => true,
				),

				array(
					'param_name'  => 'post_metro_pattern',
					'heading'     => esc_html__( 'Metro Pattern', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => snakepit_get_metro_patterns(),
					'std'         => 'auto',
					'dependency'  => array(
						'element' => 'post_display',
						'value'   => array( 'metro_modern_alt', 'metro' ),
					),
					'admin_label' => true,
				),

				array(
					'param_name' => 'post_alternate_thumbnail_position',
					'heading'    => esc_html__( 'Alternate thumbnail position', 'snakepit' ),
					'type'       => 'checkbox',
					'dependency' => array(
						'element' => 'post_display',
						'value'   => array( 'lateral' ),
					),
				),

				array(
					'param_name'  => 'post_module',
					'heading'     => esc_html__( 'Module', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Grid', 'snakepit' ) => 'grid',
						esc_html__( 'Carousel', 'snakepit' ) => 'carousel',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element' => 'post_display',
						'value'   => array( 'grid', 'grid_classic', 'grid_modern' ),
					),
				),

				array(
					'param_name' => 'post_excerpt_length',
					'heading'    => esc_html__( 'Post Excerpt Lenght', 'snakepit' ),
					'type'       => 'dropdown',
					'value'      => array(
						esc_html__( 'Shorten', 'snakepit' ) => 'shorten',
						esc_html__( 'Full', 'snakepit' ) => 'full',
					),
					'dependency' => array(
						'element' => 'post_display',
						'value'   => array( 'masonry' ),
					),
				),

				array(
					'param_name'  => 'post_display_elements',
					'heading'     => esc_html__( 'Elements', 'snakepit' ),
					'type'        => 'checkbox',
					'value'       => array(
						esc_html__( 'Thumbnail', 'snakepit' ) => 'show_thumbnail',
						esc_html__( 'Date', 'snakepit' ) => 'show_date',
						esc_html__( 'Text', 'snakepit' ) => 'show_text',
						esc_html__( 'Category', 'snakepit' ) => 'show_category',
						esc_html__( 'Author', 'snakepit' ) => 'show_author',
						esc_html__( 'Tags', 'snakepit' ) => 'show_tags',
						esc_html__( 'Extra Meta', 'snakepit' ) => 'show_extra_meta',
					),
					'std'         => 'show_thumbnail,show_date,show_text,show_author,show_category',

					'description' => esc_html__( 'Note that some options may be ignored depending on the post display.', 'snakepit' ),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'post_excerpt_type',
					'heading'     => esc_html__( 'Post Excerpt Type', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Auto', 'snakepit' ) => 'auto',
						esc_html__( 'Manual', 'snakepit' ) => 'manual',
					),
					'description' => sprintf(
						wp_kses_post( __( 'When using the manual excerpt, you must split your post using a "<a href="%s">More Tag</a>".', 'snakepit' ) ),
						esc_url( 'https://en.support.wordpress.com/more-tag/' )
					),
					'dependency'  => array(
						'element' => 'post_display',
						'value'   => array( 'standard', 'standard_modern' ),
					),
				),

				array(
					'param_name'  => 'grid_padding',
					'heading'     => esc_html__( 'Padding', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Yes', 'snakepit' ) => 'yes',
						esc_html__( 'No', 'snakepit' ) => 'no',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element'            => 'post_display',
						'value_not_equal_to' => array( 'standard', 'standard_modern', 'masonry_modern', 'offgrid' ),
					),
				),

				array(
					'param_name'  => 'pagination',
					'heading'     => esc_html__( 'Pagination', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'None', 'snakepit' ) => 'none',
						esc_html__( 'Load More', 'snakepit' ) => 'load_more',
						esc_html__( 'Numeric Pagination', 'snakepit' ) => 'standard_pagination',
						esc_html__( 'Link to Blog Archives', 'snakepit' ) => 'link_to_blog',
					),
					'admin_label' => true,
				),

				array(
					'heading'     => esc_html__( 'Animation', 'snakepit' ),
					'param_name'  => 'item_animation',
					'type'        => 'dropdown',
					'value'       => array_flip( snakepit_get_animations() ),
					'admin_label' => true,
				),

				array(
					'heading'     => esc_html__( 'Posts Per Page', 'snakepit' ),
					'param_name'  => 'posts_per_page',
					'type'        => 'wvc_textfield',
					'value'       => get_option( 'posts_per_page' ),
					'admin_label' => true,
				),

				array(
					'heading'    => esc_html__( 'Additional CSS inline style', 'snakepit' ),
					'param_name' => 'inline_style',
					'type'       => 'wvc_textfield',
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Offset', 'snakepit' ),
					'param_name'  => 'offset',
					'description' => esc_html__( 'The amount of posts that should be skipped in the beginning of the query. If an offset is set, sticky posts will be ignored.', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
					'admin_label' => true,
				),

				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Ignore Sticky Posts', 'snakepit' ),
					'param_name'  => 'ignore_sticky_posts',
					'description' => esc_html__( 'It will still include the sticky posts but it will not prioritize them in the query.', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Exclude Sticky Posts', 'snakepit' ),
					'description' => esc_html__( 'It will still exclude the sticky posts.', 'snakepit' ),
					'param_name'  => 'exclude_sticky_posts',
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Category', 'snakepit' ),
					'param_name'  => 'category',
					'description' => esc_html__( 'Include only one or several categories. Paste category slug(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Exclude Category by ID', 'snakepit' ),
					'param_name'  => 'category_exclude',
					'description' => esc_html__( 'Exclude only one or several categories. Paste category ID(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( '456, 756', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Tags', 'snakepit' ),
					'param_name'  => 'tag',
					'description' => esc_html__( 'Include only one or several tags. Paste tag slug(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( 'my-tag, other-tag', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Exclude Tags by ID', 'snakepit' ),
					'param_name'  => 'tag_exclude',
					'description' => esc_html__( 'Exclude only one or several tags. Paste tag ID(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( '456, 756', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Order by', 'snakepit' ),
					'param_name'  => 'orderby',
					'value'       => $order_by_values,
					'save_always' => true,
					'description' => sprintf( wp_kses_post( __( 'Select how to sort retrieved posts. More at %s.', 'snakepit' ) ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Sort order', 'snakepit' ),
					'param_name'  => 'order',
					'value'       => $order_way_values,
					'save_always' => true,
					'description' => sprintf( wp_kses_post( __( 'Designates the ascending or descending order. More at %s.', 'snakepit' ) ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Post IDs', 'snakepit' ),
					'description' => esc_html__( 'By default, your last posts will be displayed. You can choose the posts you want to display by entering a list of IDs separated by a comma.', 'snakepit' ),
					'param_name'  => 'include_ids',
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Exclude Post IDs', 'snakepit' ),
					'description' => esc_html__( 'You can choose the posts you don\'t want to display by entering a list of IDs separated by a comma.', 'snakepit' ),
					'param_name'  => 'exclude_ids',
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'param_name'  => 'columns',
					'heading'     => esc_html__( 'Columns', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Auto', 'snakepit' ) => 'default',
						esc_html__( 'Two', 'snakepit' ) => 2,
						esc_html__( 'Three', 'snakepit' ) => 3,
						esc_html__( 'Four', 'snakepit' ) => 4,
						esc_html__( 'Five', 'snakepit' ) => 5,
						esc_html__( 'Six', 'snakepit' ) => 6,
						esc_html__( 'One', 'snakepit' ) => 1,
					),
					'std'         => 'default',
					'admin_label' => true,
					'description' => esc_html__( 'By default, columns are set automatically depending on the container\'s width. Set a column count here to overwrite the default behavior.', 'snakepit' ),
					'dependency'  => array(
						'element'            => 'post_display',
						'value_not_equal_to' => array( 'standard', 'standard_modern', 'lateral', 'list' ),
					),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Extra class name', 'snakepit' ),
					'param_name'  => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'snakepit' ),
					'group'       => esc_html__( 'Extra', 'snakepit' ),
				),
			),
		)
	);
	class WPBakeryShortCode_Wvc_Post_Index extends WPBakeryShortCode {} // phpcs:ignore
}

if ( class_exists( 'Wolf_Discography' ) && ! class_exists( 'WPBakeryShortCode_Wvc_Release_Index' ) ) {
	/**
	 * Discography Loop Module
	 */
	vc_map(
		array(
			'name'        => esc_html__( 'Releases', 'snakepit' ),
			'description' => esc_html__( 'Display your releases using the theme layouts', 'snakepit' ),
			'base'        => 'wvc_release_index',
			'category'    => esc_html__( 'Content', 'snakepit' ),
			'icon'        => 'fa fa-th',
			'weight'      => 999,
			'params'      =>
				array(
					array(
						'type'        => 'wvc_textfield',
						'heading'     => esc_html__( 'Index ID', 'snakepit' ),
						'value'       => 'index-' . rand( 0, 99999 ),
						'param_name'  => 'el_id',
						'description' => esc_html__( 'A unique identifier for the post module (required).', 'snakepit' ),
					),

					array(
						'param_name'  => 'release_display',
						'heading'     => esc_html__( 'Release Display', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => array_flip(
							apply_filters(
								'snakepit_release_display_options',
								array(
									'grid' => esc_html__( 'Grid', 'snakepit' ),
								)
							)
						),
						'admin_label' => true,
					),

					array(
						'param_name' => 'release_alternate_thumbnail_position',
						'heading'    => esc_html__( 'Alternate thumbnail position', 'snakepit' ),
						'type'       => 'checkbox',
						'dependency' => array(
							'element' => 'release_display',
							'value'   => array( 'lateral' ),
						),
					),

					array(
						'param_name'  => 'release_layout',
						'heading'     => esc_html__( 'Layout', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Classic', 'snakepit' ) => 'standard',
							esc_html__( 'Overlay', 'snakepit' ) => 'overlay',
						),
						'admin_label' => true,
						'dependency'  => array(
							'element' => 'release_display',
							'value'   => array( 'grid', 'metro', 'masonry' ),
						),
					),

					array(
						'param_name'  => 'release_module',
						'heading'     => esc_html__( 'Module', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Grid', 'snakepit' ) => 'grid',
							esc_html__( 'Carousel', 'snakepit' ) => 'carousel',
						),
						'admin_label' => true,
						'dependency'  => array(
							'element' => 'release_display',
							'value'   => array( 'grid' ),
						),
					),

					array(
						'param_name'  => 'release_custom_thumbnail_size',
						'heading'     => esc_html__( 'Custom Thumbnail Size', 'snakepit' ),
						'type'        => 'wvc_textfield',
						'admin_label' => true,
						'placeholder' => '450x450',
					),

					array(
						'param_name'  => 'grid_padding',
						'heading'     => esc_html__( 'Padding', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Yes', 'snakepit' ) => 'yes',
							esc_html__( 'No', 'snakepit' ) => 'no',
						),
						'admin_label' => true,
						'dependency'  => array(
							'element' => 'release_layout',
							'value'   => array( 'overlay', 'flip-box' ),
						),
					),

					array(
						'type'               => 'dropdown',
						'heading'            => esc_html__( 'Overlay Color', 'snakepit' ),
						'param_name'         => 'overlay_color',
						'value'              => array_merge(
							array( esc_html__( 'Auto', 'snakepit' ) => 'auto' ),
							$shared_gradient_colors,
							$shared_colors,
							array( esc_html__( 'Custom color', 'snakepit' ) => 'custom' )
						),
						'std'                => apply_filters( 'wvc_default_item_overlay_color', 'black' ),
						'description'        => esc_html__( 'Select an overlay color.', 'snakepit' ),
						'param_holder_class' => 'wvc_colored-dropdown',
						'dependency'         => array(
							'element' => 'release_layout',
							'value'   => array( 'overlay', 'flip-box' ),
						),
					),
					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__( 'Overlay Custom Color', 'snakepit' ),
						'param_name' => 'overlay_custom_color',
						'dependency' => array(
							'element' => 'overlay_color',
							'value'   => array( 'custom' ),
						),
					),
					array(
						'type'        => 'wvc_textfield',
						'heading'     => esc_html__( 'Overlay Opacity in Percent', 'snakepit' ),
						'param_name'  => 'overlay_opacity',
						'description' => '',
						'value'       => 40,
						'std'         => apply_filters( 'wvc_default_item_overlay_opacity', 40 ),
						'dependency'  => array(
							'element' => 'release_layout',
							'value'   => array( 'overlay', 'flip-box' ),
						),
					),
					array(
						'type'               => 'dropdown',
						'heading'            => esc_html__( 'Overlay Text Color', 'snakepit' ),
						'param_name'         => 'overlay_text_color',
						'value'              => array_merge(
							$shared_colors,
							$shared_gradient_colors,
							array( esc_html__( 'Custom color', 'snakepit' ) => 'custom' )
						),
						'std'                => apply_filters( 'wvc_default_item_overlay_text_color', 'white' ),
						'description'        => esc_html__( 'Select an overlay color.', 'snakepit' ),
						'param_holder_class' => 'wvc_colored-dropdown',
						'dependency'         => array(
							'element' => 'release_layout',
							'value'   => array( 'overlay', 'flip-box' ),
						),
					),

					array(
						'type'       => 'colorpicker',
						'heading'    => esc_html__( 'Overlay Custom Text Color', 'snakepit' ),
						'param_name' => 'overlay_text_custom_color',
						'dependency' => array(
							'element' => 'overlay_text_color',
							'value'   => array( 'custom' ),
						),
					),

					array(
						'param_name'  => 'pagination',
						'heading'     => esc_html__( 'Pagination', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'None', 'snakepit' ) => 'none',
							esc_html__( 'Load More', 'snakepit' ) => 'load_more',
							esc_html__( 'Numeric Pagination', 'snakepit' ) => 'standard_pagination',
							esc_html__( 'Link to Discography', 'snakepit' ) => 'link_to_discography',
						),
						'admin_label' => true,
					),

					array(
						'heading'     => esc_html__( 'Category Filter', 'snakepit' ),
						'param_name'  => 'release_category_filter',
						'type'        => 'checkbox',
						'description' => esc_html__( 'The pagination will be disabled.', 'snakepit' ),
						'admin_label' => true,
						'dependency'  => array(
							'element'            => 'release_display',
							'value_not_equal_to' => array( 'list_minimal' ),
						),
					),

					array(
						'heading'    => esc_html__( 'Filter Text Alignement', 'snakepit' ),
						'param_name' => 'release_category_filter_text_alignment',
						'type'       => 'dropdown',
						'value'      => array(
							esc_html__( 'Center', 'snakepit' ) => 'center',
							esc_html__( 'Left', 'snakepit' ) => 'left',
							esc_html__( 'Right', 'snakepit' ) => 'right',
						),
						'dependency' => array(
							'element' => 'release_category_filter',
							'value'   => array( 'true' ),
						),
					),

					array(
						'heading'     => esc_html__( 'Animation', 'snakepit' ),
						'param_name'  => 'item_animation',
						'type'        => 'dropdown',
						'value'       => array_flip( snakepit_get_animations() ),
						'admin_label' => true,
					),

					array(
						'heading'     => esc_html__( 'Number of Posts', 'snakepit' ),
						'param_name'  => 'posts_per_page',
						'type'        => 'wvc_textfield',
						'description' => esc_html__( 'Leave empty to display all post at once.', 'snakepit' ),
						'admin_label' => true,
					),

					array(
						'heading'    => esc_html__( 'Additional CSS inline style', 'snakepit' ),
						'param_name' => 'inline_style',
						'type'       => 'wvc_textfield',
					),

					array(
						'type'        => 'wvc_textfield',
						'heading'     => esc_html__( 'Include Band', 'snakepit' ),
						'param_name'  => 'band_include',
						'description' => esc_html__( 'Enter one or several bands. Paste category slug(s) separated by a comma', 'snakepit' ),
						'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
						'group'       => esc_html__( 'Query', 'snakepit' ),
					),

					array(
						'type'        => 'wvc_textfield',
						'heading'     => esc_html__( 'Exclude Band', 'snakepit' ),
						'param_name'  => 'band_exclude',
						'description' => esc_html__( 'Enter one or several bands. Paste category slug(s) separated by a comma', 'snakepit' ),
						'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
						'group'       => esc_html__( 'Query', 'snakepit' ),
					),

					array(
						'type'        => 'wvc_textfield',
						'heading'     => esc_html__( 'Include Type', 'snakepit' ),
						'param_name'  => 'label_include',
						'description' => esc_html__( 'Enter one or several release types (from release tags). Paste category slug(s) separated by a comma', 'snakepit' ),
						'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
						'group'       => esc_html__( 'Query', 'snakepit' ),
					),

					array(
						'type'        => 'wvc_textfield',
						'heading'     => esc_html__( 'Exclude Type', 'snakepit' ),
						'param_name'  => 'label_exclude',
						'description' => esc_html__( 'Enter one or several release types (from release tags). Paste category slug(s) separated by a comma', 'snakepit' ),
						'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
						'group'       => esc_html__( 'Query', 'snakepit' ),
					),

					array(
						'type'        => 'wvc_textfield',
						'heading'     => esc_html__( 'Offset', 'snakepit' ),
						'description' => esc_html__( '.', 'snakepit' ),
						'param_name'  => 'offset',
						'description' => esc_html__( 'The amount of posts that should be skipped in the beginning of the query.', 'snakepit' ),
						'group'       => esc_html__( 'Query', 'snakepit' ),
					),

					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Order by', 'snakepit' ),
						'param_name'  => 'orderby',
						'value'       => $order_by_values,
						'save_always' => true,
						'description' => sprintf( wp_kses_post( __( 'Select how to sort retrieved posts. More at %s.', 'snakepit' ) ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ), // WCS XSS ok.
						'group'       => esc_html__( 'Query', 'snakepit' ),
					),

					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Sort order', 'snakepit' ),
						'param_name'  => 'order',
						'value'       => $order_way_values,
						'save_always' => true,
						'description' => sprintf( wp_kses_post( __( 'Designates the ascending or descending order. More at %s.', 'snakepit' ) ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						'group'       => esc_html__( 'Query', 'snakepit' ),
					),

					array(
						'type'        => 'wvc_textfield',
						'heading'     => esc_html__( 'Post IDs', 'snakepit' ),
						'description' => esc_html__( 'By default, your last posts will be displayed. You can choose the posts you want to display by entering a list of IDs separated by a comma.', 'snakepit' ),
						'param_name'  => 'include_ids',
						'group'       => esc_html__( 'Query', 'snakepit' ),
					),

					array(
						'type'        => 'wvc_textfield',
						'heading'     => esc_html__( 'Exclude Post IDs', 'snakepit' ),
						'description' => esc_html__( 'You can choose the posts you don\'t want to display by entering a list of IDs separated by a comma.', 'snakepit' ),
						'param_name'  => 'exclude_ids',
						'group'       => esc_html__( 'Query', 'snakepit' ),
					),

					array(
						'param_name'  => 'columns',
						'heading'     => esc_html__( 'Columns', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Auto', 'snakepit' ) => 'default',
							esc_html__( 'Two', 'snakepit' ) => 2,
							esc_html__( 'Three', 'snakepit' ) => 3,
							esc_html__( 'Four', 'snakepit' ) => 4,
							esc_html__( 'Five', 'snakepit' ) => 5,
							esc_html__( 'Six', 'snakepit' ) => 6,
							esc_html__( 'One', 'snakepit' ) => 1,
						),
						'std'         => 'default',
						'admin_label' => true,
						'description' => esc_html__( 'By default, columns are set automatically depending on the container\'s width. Set a column count here to overwrite the default behavior.', 'snakepit' ),
						'dependency'  => array(
							'element'            => 'post_display',
							'value_not_equal_to' => array( 'standard', 'standard_modern', 'lateral' ),
						),
					),
				),
		)
	);

	class WPBakeryShortCode_Wvc_Release_Index extends WPBakeryShortCode {} // phpcs:ignore
} // end Discography plugin check

if ( class_exists( 'WooCommerce' ) && ! class_exists( 'WPBakeryShortCode_Wvc_Product_Index' ) ) {

	/**
	 * Product Loop Module
	 */
	vc_map(
		array(
			'name'        => esc_html__( 'Products', 'snakepit' ),
			'description' => esc_html__( 'Display your pages using the theme layouts', 'snakepit' ),
			'base'        => 'wvc_product_index',
			'category'    => esc_html__( 'Content', 'snakepit' ),
			'icon'        => 'fa fa-th',
			'weight'      => 999,
			'params'      =>
				array(

					array(
						'type'       => 'wvc_textfield',
						'heading'    => esc_html__( 'ID', 'snakepit' ),
						'value'      => 'items-' . rand( 0, 99999 ),
						'param_name' => 'el_id',
					),

					array(
						'param_name'  => 'product_display',
						'heading'     => esc_html__( 'Product Display', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => array_flip(
							apply_filters(
								'snakepit_product_display_options',
								array(
									'grid_classic' => esc_html__( 'Classic', 'snakepit' ),
								)
							)
						),
						'std'         => 'grid_classic',
						'admin_label' => true,
					),

					array(
						'param_name'  => 'product_metro_pattern',
						'heading'     => esc_html__( 'Metro Pattern', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => snakepit_get_metro_patterns(),
						'std'         => 'pattern-1',
						'dependency'  => array(
							'element' => 'product_display',
							'value'   => array( 'metro', 'metro_overlay_quickview' ),
						),
						'admin_label' => true,
					),

					array(
						'param_name'  => 'product_text_align',
						'heading'     => esc_html__( 'Product Text Alignement', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => array(
							'' => '',
							esc_html__( 'Center', 'snakepit' ) => 'center',
							esc_html__( 'Left', 'snakepit' ) => 'left',
							esc_html__( 'Right', 'snakepit' ) => 'right',
						),
						'admin_label' => true,
						'dependency'  => array(
							'element' => 'product_display',
							'value'   => array( 'grid_classic' ),
						),
					),

					array(
						'param_name'  => 'product_meta',
						'heading'     => esc_html__( 'Type', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'All', 'snakepit' ) => 'all',
							esc_html__( 'Featured', 'snakepit' ) => 'featured',
							esc_html__( 'On Sale', 'snakepit' ) => 'onsale',
							esc_html__( 'Best Selling', 'snakepit' ) => 'best_selling',
							esc_html__( 'Top Rated', 'snakepit' ) => 'top_rated',
						),
						'admin_label' => true,
					),

					array(
						'type'        => 'wvc_textfield',
						'heading'     => esc_html__( 'Category', 'snakepit' ),
						'param_name'  => 'product_cat',
						'description' => esc_html__( 'Include only one or several categories. Paste category slug(s) separated by a comma', 'snakepit' ),
						'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
						'admin_label' => true,
					),

					array(
						'param_name'  => 'product_module',
						'heading'     => esc_html__( 'Module', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Grid', 'snakepit' ) => 'grid',
							esc_html__( 'Carousel', 'snakepit' ) => 'carousel',
						),
						'admin_label' => true,
					),

					array(
						'param_name'  => 'grid_padding',
						'heading'     => esc_html__( 'Padding', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Yes', 'snakepit' ) => 'yes',
							esc_html__( 'No', 'snakepit' ) => 'no',
						),
						'admin_label' => true,
					),

					array(
						'heading'     => esc_html__( 'Animation', 'snakepit' ),
						'param_name'  => 'item_animation',
						'type'        => 'dropdown',
						'value'       => array_flip( snakepit_get_animations() ),
						'admin_label' => true,
					),

					array(
						'heading'     => esc_html__( 'Posts Per Page', 'snakepit' ),
						'param_name'  => 'posts_per_page',
						'type'        => 'wvc_textfield',
						'placeholder' => get_option( 'posts_per_page' ),
						'description' => esc_html__( 'Leave empty to display all post at once.', 'snakepit' ),
						'std'         => get_option( 'posts_per_page' ),
						'admin_label' => true,
					),

					array(
						'param_name'  => 'pagination',
						'heading'     => esc_html__( 'Pagination', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'None', 'snakepit' ) => 'none',
							esc_html__( 'Load More', 'snakepit' ) => 'load_more',
							esc_html__( 'Numeric Pagination', 'snakepit' ) => 'standard_pagination',
							esc_html__( 'Link to Category', 'snakepit' ) => 'link_to_shop_category',
							esc_html__( 'Link to Shop Archive', 'snakepit' ) => 'link_to_shop',
						),
						'admin_label' => true,
						'dependency'  => array(
							'element' => 'product_module',
							'value'   => array( 'grid', 'metro' ),
						),
					),

					array(
						'param_name'  => 'product_category_link_id',
						'heading'     => esc_html__( 'Category', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => snakepit_get_product_cat_dropdown_options(),
						'dependency'  => array(
							'element' => 'pagination',
							'value'   => array( 'link_to_shop_category' ),
						),
						'admin_label' => true,
					),

					array(
						'heading'    => esc_html__( 'Additional CSS inline style', 'snakepit' ),
						'param_name' => 'inline_style',
						'type'       => 'wvc_textfield',
					),

					array(
						'type'        => 'wvc_textfield',
						'heading'     => esc_html__( 'Offset', 'snakepit' ),
						'param_name'  => 'offset',
						'description' => esc_html__( 'The amount of posts that should be skipped in the beginning of the query. If an offset is set, sticky posts will be ignored.', 'snakepit' ),
						'group'       => esc_html__( 'Query', 'snakepit' ),
						'admin_label' => true,
					),

					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Order by', 'snakepit' ),
						'param_name'  => 'orderby',
						'value'       => $order_by_values,
						'save_always' => true,
						'description' => sprintf( wp_kses_post( __( 'Select how to sort retrieved products. More at %s.', 'snakepit' ) ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						'group'       => esc_html__( 'Query', 'snakepit' ),
					),

					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Sort order', 'snakepit' ),
						'param_name'  => 'order',
						'value'       => $order_way_values,
						'save_always' => true,
						'description' => sprintf( wp_kses_post( __( 'Designates the ascending or descending order. More at %s.', 'snakepit' ) ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
						'group'       => esc_html__( 'Query', 'snakepit' ),
					),

					array(
						'type'        => 'wvc_textfield',
						'heading'     => esc_html__( 'Post IDs', 'snakepit' ),
						'description' => esc_html__( 'By default, your last posts will be displayed. You can choose the posts you want to display by entering a list of IDs separated by a comma.', 'snakepit' ),
						'param_name'  => 'include_ids',
						'group'       => esc_html__( 'Query', 'snakepit' ),
					),

					array(
						'type'        => 'wvc_textfield',
						'heading'     => esc_html__( 'Exclude Post IDs', 'snakepit' ),
						'description' => esc_html__( 'You can choose the posts you don\'t want to display by entering a list of IDs separated by a comma.', 'snakepit' ),
						'param_name'  => 'exclude_ids',
						'group'       => esc_html__( 'Query', 'snakepit' ),
					),

					array(
						'param_name'  => 'columns',
						'heading'     => esc_html__( 'Columns', 'snakepit' ),
						'type'        => 'dropdown',
						'value'       => array(
							esc_html__( 'Auto', 'snakepit' ) => 'default',
							esc_html__( 'Two', 'snakepit' ) => 2,
							esc_html__( 'Three', 'snakepit' ) => 3,
							esc_html__( 'Four', 'snakepit' ) => 4,
							esc_html__( 'Five', 'snakepit' ) => 5,
							esc_html__( 'Six', 'snakepit' ) => 6,
							esc_html__( 'One', 'snakepit' ) => 1,
						),
						'std'         => 'default',
						'admin_label' => true,
						'description' => esc_html__( 'By default, columns are set automatically depending on the container\'s width. Set a column count here to overwrite the default behavior.', 'snakepit' ),
						'dependency'  => array(
							'element'            => 'product_display',
							'value_not_equal_to' => array( 'metro_overlay_quickview' ),
						),
					),

					array(
						'type'        => 'wvc_textfield',
						'heading'     => esc_html__( 'Extra class name', 'snakepit' ),
						'param_name'  => 'el_class',
						'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'snakepit' ),
						'group'       => esc_html__( 'Extra', 'snakepit' ),
					),
				),

		)
	);

	class WPBakeryShortCode_Wvc_Product_Index extends WPBakeryShortCode {} // phpcs:ignore

} // end WC check

if ( class_exists( 'Wolf_Artists' ) && ! class_exists( 'WPBakeryShortCode_Wvc_Artist_Index' ) ) {

	/**
	 * Work Loop Module
	 */
	vc_map(
		array(
			'name'        => esc_html__( 'Artists', 'snakepit' ),
			'description' => esc_html__( 'Display your artists using the theme layouts', 'snakepit' ),
			'base'        => 'wvc_artist_index',
			'category'    => esc_html__( 'Content', 'snakepit' ),
			'icon'        => 'fa fa-th',
			'weight'      => 999,
			'params'      => array(

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Index ID', 'snakepit' ),
					'value'       => 'index-' . rand( 0, 99999 ),
					'param_name'  => 'el_id',
					'description' => esc_html__( 'A unique identifier for the post module (required).', 'snakepit' ),
				),

				array(
					'param_name'  => 'artist_display',
					'heading'     => esc_html__( 'Artist Display', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array_flip(
						apply_filters(
							'snakepit_artist_display_options',
							array(
								'list' => esc_html__( 'List', 'snakepit' ),
							)
						)
					),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'artist_metro_pattern',
					'heading'     => esc_html__( 'Metro Pattern', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => snakepit_get_metro_patterns(),
					'std'         => 'auto',
					'dependency'  => array(
						'element' => 'artist_display',
						'value'   => array( 'metro' ),
					),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'artist_module',
					'heading'     => esc_html__( 'Module', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Grid', 'snakepit' ) => 'grid',
						esc_html__( 'Carousel', 'snakepit' ) => 'carousel',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element' => 'artist_display',
						'value'   => array( 'grid' ),
					),
				),

				array(
					'param_name'  => 'artist_thumbnail_size',
					'heading'     => esc_html__( 'Thumbnail Size', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Default Thumbnail', 'snakepit' ) => 'standard',
						esc_html__( 'Landscape', 'snakepit' ) => 'landscape',
						esc_html__( 'Square', 'snakepit' ) => 'square',
						esc_html__( 'Portrait', 'snakepit' ) => 'portrait',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element' => 'artist_display',
						'value'   => array( 'grid', 'offgrid' ),
					),
				),

				/*
				array(
					'param_name' => 'artist_custom_thumbnail_size',
					'heading' => esc_html__( 'Custom Thumbnail Size', 'snakepit' ),
					'type' => 'wvc_textfield',
					'admin_label' => true,
					'placeholder' => '415x230',
				),*/

				array(
					'param_name'  => 'artist_layout',
					'heading'     => esc_html__( 'Layout', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Classic', 'snakepit' ) => 'standard',
						esc_html__( 'Overlay', 'snakepit' ) => 'overlay',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element'            => 'artist_display',
						'value_not_equal_to' => array( 'list', 'metro' ),
					),
				),

				array(
					'param_name'  => 'grid_padding',
					'heading'     => esc_html__( 'Padding', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Yes', 'snakepit' ) => 'yes',
						esc_html__( 'No', 'snakepit' ) => 'no',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element' => 'artist_layout',
						'value'   => array( 'overlay', 'flip-box' ),
					),
				),

				array(
					'heading'    => esc_html__( 'Caption Text Alignement', 'snakepit' ),
					'param_name' => 'caption_text_alignment',
					'type'       => 'dropdown',
					'value'      => array(
						esc_html__( 'Center', 'snakepit' ) => 'center',
						esc_html__( 'Left', 'snakepit' ) => 'left',
						esc_html__( 'Right', 'snakepit' ) => 'right',
					),
					'dependency' => array(
						'element'            => 'artist_display',
						'value_not_equal_to' => array( 'list_minimal' ),
					),
				),

				array(
					'heading'    => esc_html__( 'Caption Vertical Alignement', 'snakepit' ),
					'param_name' => 'caption_v_align',
					'type'       => 'dropdown',
					'value'      => array(
						esc_html__( 'Middle', 'snakepit' ) => 'middle',
						esc_html__( 'Bottom', 'snakepit' ) => 'bottom',
						esc_html__( 'Top', 'snakepit' ) => 'top',
					),
					'dependency' => array(
						'element'            => 'artist_display',
						'value_not_equal_to' => array( 'list_minimal' ),
					),
				),

				array(
					'type'               => 'dropdown',
					'heading'            => esc_html__( 'Overlay Color', 'snakepit' ),
					'param_name'         => 'overlay_color',
					'value'              => array_merge(
						array( esc_html__( 'Auto', 'snakepit' ) => 'auto' ),
						$shared_gradient_colors,
						$shared_colors,
						array( esc_html__( 'Custom color', 'snakepit' ) => 'custom' )
					),
					'std'                => apply_filters( 'wvc_default_item_overlay_color', 'black' ),
					'description'        => esc_html__( 'Select an overlay color.', 'snakepit' ),
					'param_holder_class' => 'wvc_colored-dropdown',
					'dependency'         => array(
						'element' => 'artist_layout',
						'value'   => array( 'overlay', 'flip-box' ),
					),
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Overlay Custom Color', 'snakepit' ),
					'param_name' => 'overlay_custom_color',
					'dependency' => array(
						'element' => 'overlay_color',
						'value'   => array( 'custom' ),
					),
				),
				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Overlay Opacity in Percent', 'snakepit' ),
					'param_name'  => 'overlay_opacity',
					'description' => '',
					'value'       => 40,
					'std'         => apply_filters( 'wvc_default_item_overlay_opacity', 40 ),
					'dependency'  => array(
						'element' => 'artist_layout',
						'value'   => array( 'overlay', 'flip-box' ),
					),
				),

				array(
					'type'               => 'dropdown',
					'heading'            => esc_html__( 'Overlay Text Color', 'snakepit' ),
					'param_name'         => 'overlay_text_color',
					'value'              => array_merge(
						$shared_colors,
						$shared_gradient_colors,
						array( esc_html__( 'Custom color', 'snakepit' ) => 'custom' )
					),
					'std'                => apply_filters( 'wvc_default_item_overlay_text_color', 'white' ),
					'description'        => esc_html__( 'Select an overlay color.', 'snakepit' ),
					'param_holder_class' => 'wvc_colored-dropdown',
					'dependency'         => array(
						'element' => 'artist_layout',
						'value'   => array( 'overlay', 'flip-box' ),
					),
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Overlay Custom Text Color', 'snakepit' ),
					'param_name' => 'overlay_text_custom_color',
					'dependency' => array(
						'element' => 'overlay_text_color',
						'value'   => array( 'custom' ),
					),
				),

				array(
					'heading'     => esc_html__( 'Category Filter', 'snakepit' ),
					'param_name'  => 'artist_category_filter',
					'type'        => 'checkbox',
					'description' => esc_html__( 'The pagination will be disabled.', 'snakepit' ),
					'admin_label' => true,
					'dependency'  => array(
						'element'            => 'artist_display',
						'value_not_equal_to' => array( 'list_minimal' ),
					),
				),

				array(
					'heading'    => esc_html__( 'Filter Text Alignement', 'snakepit' ),
					'param_name' => 'artist_category_filter_text_alignment',
					'type'       => 'dropdown',
					'value'      => array(
						esc_html__( 'Center', 'snakepit' ) => 'center',
						esc_html__( 'Left', 'snakepit' ) => 'left',
						esc_html__( 'Right', 'snakepit' ) => 'right',
					),
					'dependency' => array(
						'element' => 'artist_category_filter',
						'value'   => array( 'true' ),
					),
				),

				array(
					'heading'     => esc_html__( 'Animation', 'snakepit' ),
					'param_name'  => 'item_animation',
					'type'        => 'dropdown',
					'value'       => array_flip( snakepit_get_animations() ),
					'admin_label' => true,
				),

				array(
					'heading'     => esc_html__( 'Number of Posts', 'snakepit' ),
					'param_name'  => 'posts_per_page',
					'type'        => 'wvc_textfield',
					'description' => esc_html__( 'Leave empty to display all post at once.', 'snakepit' ),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'pagination',
					'heading'     => esc_html__( 'Pagination', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'None', 'snakepit' ) => 'none',
						esc_html__( 'Load More', 'snakepit' ) => 'load_more',
						esc_html__( 'Numeric Pagination', 'snakepit' ) => 'standard_pagination',
						esc_html__( 'Link to Archives', 'snakepit' ) => 'link_to_artists',
					),
					'admin_label' => true,
				),

				array(
					'heading'    => esc_html__( 'Additional CSS inline style', 'snakepit' ),
					'param_name' => 'inline_style',
					'type'       => 'wvc_textfield',
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Include Category', 'snakepit' ),
					'param_name'  => 'artist_genre_include',
					'description' => esc_html__( 'Enter one or several categories. Paste category slug(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Exclude Category', 'snakepit' ),
					'param_name'  => 'artist_genre_exclude',
					'description' => esc_html__( 'Enter one or several categories. Paste category slug(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Offset', 'snakepit' ),
					'description' => esc_html__( '.', 'snakepit' ),
					'param_name'  => 'offset',
					'description' => esc_html__( 'The amount of posts that should be skipped in the beginning of the query.', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Order by', 'snakepit' ),
					'param_name'  => 'orderby',
					'value'       => $order_by_values,
					'save_always' => true,
					'description' => sprintf( wp_kses_post( __( 'Select how to sort retrieved posts. More at %s.', 'snakepit' ) ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Sort order', 'snakepit' ),
					'param_name'  => 'order',
					'value'       => $order_way_values,
					'save_always' => true,
					'description' => sprintf( wp_kses_post( __( 'Designates the ascending or descending order. More at %s.', 'snakepit' ) ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Post IDs', 'snakepit' ),
					'description' => esc_html__( 'By default, your last posts will be displayed. You can choose the posts you want to display by entering a list of IDs separated by a comma.', 'snakepit' ),
					'param_name'  => 'include_ids',
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Exclude Post IDs', 'snakepit' ),
					'description' => esc_html__( 'You can choose the posts you don\'t want to display by entering a list of IDs separated by a comma.', 'snakepit' ),
					'param_name'  => 'exclude_ids',
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'param_name'  => 'columns',
					'heading'     => esc_html__( 'Columns', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Auto', 'snakepit' ) => 'default',
						esc_html__( 'Two', 'snakepit' ) => 2,
						esc_html__( 'Three', 'snakepit' ) => 3,
						esc_html__( 'Four', 'snakepit' ) => 4,
						esc_html__( 'Five', 'snakepit' ) => 5,
						esc_html__( 'Six', 'snakepit' ) => 6,
						esc_html__( 'One', 'snakepit' ) => 1,
					),
					'std'         => 'default',
					'admin_label' => true,
					'description' => esc_html__( 'By default, columns are set automatically depending on the container\'s width. Set a column count here to overwrite the default behavior.', 'snakepit' ),
					'dependency'  => array(
						'element'            => 'post_display',
						'value_not_equal_to' => array( 'standard', 'standard_modern' ),
					),
				),
			),
		)
	);

	class WPBakeryShortCode_Wvc_Artist_Index extends WPBakeryShortCode {} // phpcs:ignore
} // end Artist plugin check

if ( class_exists( 'Wolf_Albums' ) && ! class_exists( 'WPBakeryShortCode_Wvc_Gallery_Index' ) ) {

	/**
	 * Albums Loop Module
	 */
	vc_map(
		array(
			'name'        => esc_html__( 'Albums', 'snakepit' ),
			'description' => esc_html__( 'Display your albums using the theme layouts', 'snakepit' ),
			'base'        => 'wvc_gallery_index',
			'category'    => esc_html__( 'Content', 'snakepit' ),
			'icon'        => 'fa fa-th',
			'weight'      => 999,
			'params'      => array(

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Index ID', 'snakepit' ),
					'value'       => 'index-' . rand( 0, 99999 ),
					'param_name'  => 'el_id',
					'description' => esc_html__( 'A unique identifier for the post module (required).', 'snakepit' ),
				),

				array(
					'param_name'  => 'gallery_display',
					'heading'     => esc_html__( 'Album Display', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array_flip(
						apply_filters(
							'snakepit_gallery_display_options',
							array(
								'grid' => esc_html__( 'Grid', 'snakepit' ),
							)
						)
					),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'gallery_module',
					'heading'     => esc_html__( 'Module', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Grid', 'snakepit' ) => 'grid',
						esc_html__( 'Carousel', 'snakepit' ) => 'carousel',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element' => 'gallery_display',
						'value'   => array( 'grid' ),
					),
				),

				array(
					'param_name'  => 'grid_padding',
					'heading'     => esc_html__( 'Padding', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Yes', 'snakepit' ) => 'yes',
						esc_html__( 'No', 'snakepit' ) => 'no',
					),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'gallery_thumbnail_size',
					'heading'     => esc_html__( 'Thumbnail Size', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Default Thumbnail', 'snakepit' ) => 'standard',
						esc_html__( 'Landscape', 'snakepit' ) => 'landscape',
						esc_html__( 'Square', 'snakepit' ) => 'square',
						esc_html__( 'Portrait', 'snakepit' ) => 'portrait',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element' => 'gallery_display',
						'value'   => array( 'grid' ),
					),
				),

				array(
					'param_name'  => 'gallery_layout',
					'heading'     => esc_html__( 'Layout', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Classic', 'snakepit' ) => 'standard',
						esc_html__( 'Overlay', 'snakepit' ) => 'overlay',
					),
					'admin_label' => true,
				),

				array(
					'heading'    => esc_html__( 'Text Alignement', 'snakepit' ),
					'param_name' => 'caption_text_alignment',
					'type'       => 'dropdown',
					'value'      => array(
						esc_html__( 'Center', 'snakepit' ) => 'center',
						esc_html__( 'Left', 'snakepit' ) => 'left',
						esc_html__( 'Right', 'snakepit' ) => 'right',
					),
				),

				array(
					'type'               => 'dropdown',
					'heading'            => esc_html__( 'Overlay Color', 'snakepit' ),
					'param_name'         => 'overlay_color',
					'value'              => array_merge(
						array( esc_html__( 'Auto', 'snakepit' ) => 'auto' ),
						$shared_gradient_colors,
						$shared_colors,
						array( esc_html__( 'Custom color', 'snakepit' ) => 'custom' )
					),
					'std'                => apply_filters( 'wvc_default_item_overlay_color', 'black' ),
					'description'        => esc_html__( 'Select an overlay color.', 'snakepit' ),
					'param_holder_class' => 'wvc_colored-dropdown',
					'dependency'         => array(
						'element' => 'gallery_layout',
						'value'   => array( 'overlay' ),
					),
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Overlay Custom Color', 'snakepit' ),
					'param_name' => 'overlay_custom_color',
					'dependency' => array(
						'element' => 'overlay_color',
						'value'   => array( 'custom' ),
					),
				),
				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Overlay Opacity in Percent', 'snakepit' ),
					'param_name'  => 'overlay_opacity',
					'description' => '',
					'value'       => 40,
					'std'         => apply_filters( 'wvc_default_item_overlay_opacity', 40 ),
					'dependency'  => array(
						'element' => 'gallery_layout',
						'value'   => array( 'overlay' ),
					),
				),

				array(
					'type'               => 'dropdown',
					'heading'            => esc_html__( 'Overlay Text Color', 'snakepit' ),
					'param_name'         => 'overlay_text_color',
					'value'              => array_merge(
						$shared_colors,
						$shared_gradient_colors,
						array( esc_html__( 'Custom color', 'snakepit' ) => 'custom' )
					),
					'std'                => apply_filters( 'wvc_default_item_overlay_text_color', 'white' ),
					'description'        => esc_html__( 'Select an overlay color.', 'snakepit' ),
					'param_holder_class' => 'wvc_colored-dropdown',
					'dependency'         => array(
						'element' => 'gallery_layout',
						'value'   => array( 'overlay' ),
					),
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Overlay Custom Text Color', 'snakepit' ),
					'param_name' => 'overlay_text_custom_color',
					'dependency' => array(
						'element' => 'overlay_text_color',
						'value'   => array( 'custom' ),
					),
				),

				array(
					'heading'     => esc_html__( 'Animation', 'snakepit' ),
					'param_name'  => 'item_animation',
					'type'        => 'dropdown',
					'value'       => array_flip( snakepit_get_animations() ),
					'admin_label' => true,
				),

				array(
					'heading'     => esc_html__( 'Category Filter', 'snakepit' ),
					'param_name'  => 'gallery_category_filter',
					'type'        => 'checkbox',
					'description' => esc_html__( 'The pagination will be disabled.', 'snakepit' ),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'pagination',
					'heading'     => esc_html__( 'Pagination', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'None', 'snakepit' ) => 'none',
						esc_html__( 'Load More', 'snakepit' ) => 'load_more',
						esc_html__( 'Numeric Pagination', 'snakepit' ) => 'standard_pagination',
						esc_html__( 'Link to Album Archives', 'snakepit' ) => 'link_to_albums',
					),
					'admin_label' => true,
				),

				array(
					'heading'    => esc_html__( 'Filter Text Alignement', 'snakepit' ),
					'param_name' => 'gallery_category_filter_text_alignment',
					'type'       => 'dropdown',
					'value'      => array(
						esc_html__( 'Center', 'snakepit' ) => 'center',
						esc_html__( 'Left', 'snakepit' ) => 'left',
						esc_html__( 'Right', 'snakepit' ) => 'right',
					),
					'dependency' => array(
						'element' => 'gallery_category_filter',
						'value'   => array( 'true' ),
					),
				),

				array(
					'heading'     => esc_html__( 'Number of Posts', 'snakepit' ),
					'param_name'  => 'posts_per_page',
					'type'        => 'wvc_textfield',
					'description' => esc_html__( 'Leave empty to display all post at once.', 'snakepit' ),
					'admin_label' => true,
				),

				array(
					'heading'    => esc_html__( 'Additional CSS inline style', 'snakepit' ),
					'param_name' => 'inline_style',
					'type'       => 'wvc_textfield',
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Include Category', 'snakepit' ),
					'param_name'  => 'gallery_type_include',
					'description' => esc_html__( 'Enter one or several categories. Paste category slug(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
					'group'       => esc_html( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Exclude Category', 'snakepit' ),
					'param_name'  => 'gallery_type_exclude',
					'description' => esc_html__( 'Enter one or several categories. Paste category slug(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
					'group'       => esc_html( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Offset', 'snakepit' ),
					'description' => esc_html__( '.', 'snakepit' ),
					'param_name'  => 'offset',
					'description' => esc_html__( 'The amount of posts that should be skipped in the beginning of the query.', 'snakepit' ),
					'group'       => esc_html( 'Query', 'snakepit' ),
				),

				array(
					'param_name'  => 'columns',
					'heading'     => esc_html__( 'Columns', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Auto', 'snakepit' ) => 'default',
						esc_html__( 'Two', 'snakepit' ) => 2,
						esc_html__( 'Three', 'snakepit' ) => 3,
						esc_html__( 'Four', 'snakepit' ) => 4,
						esc_html__( 'Six', 'snakepit' ) => 6,
						esc_html__( 'One', 'snakepit' ) => 1,
					),
					'std'         => 'default',
					'admin_label' => true,
					'description' => esc_html__( 'By default, columns are set automatically depending on the container\'s width. Set a column count here to overwrite the default behavior.', 'snakepit' ),
					'dependency'  => array(
						'element'            => 'post_display',
						'value_not_equal_to' => array( 'standard', 'standard_modern' ),
					),
					'group'       => esc_html__( 'Extra', 'snakepit' ),
				),
			),

		)
	);

	class WPBakeryShortCode_Wvc_Gallery_Index extends WPBakeryShortCode {} // phpcs:ignore
} // end Gallery plugin check.

if ( class_exists( 'Wolf_Videos' ) && ! class_exists( 'WPBakeryShortCode_Wvc_Video_Index' ) ) {
	/**
	 * Videos Loop Module
	 */
	vc_map(
		array(
			'name'        => esc_html__( 'Videos', 'snakepit' ),
			'description' => esc_html__( 'Display your videos using the theme layouts', 'snakepit' ),
			'base'        => 'wvc_video_index',
			'category'    => esc_html__( 'Content', 'snakepit' ),
			'icon'        => 'fa fa-th',
			'weight'      => 999,
			'params'      => array(

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Index ID', 'snakepit' ),
					'value'       => 'index-' . rand( 0, 99999 ),
					'param_name'  => 'el_id',
					'description' => esc_html__( 'A unique identifier for the post module (required).', 'snakepit' ),
				),

				array(
					'heading'     => esc_html__( 'Show video on hover', 'snakepit' ),
					'param_name'  => 'video_preview',
					'type'        => 'checkbox',
					'admin_label' => true,
					'value'       => 'yes',
					'dependency'  => array(
						'element' => 'video_module',
						'value'   => array( 'grid' ),
					),
				),

				array(
					'param_name'  => 'video_module',
					'heading'     => esc_html__( 'Module', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Grid', 'snakepit' ) => 'grid',
						esc_html__( 'Carousel', 'snakepit' ) => 'carousel',
					),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'video_custom_thumbnail_size',
					'heading'     => esc_html__( 'Custom Thumbnail Size', 'snakepit' ),
					'type'        => 'wvc_textfield',
					'admin_label' => true,
					'placeholder' => '415x230',
				),

				array(
					'param_name'  => 'grid_padding',
					'heading'     => esc_html__( 'Padding', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Yes', 'snakepit' ) => 'yes',
						esc_html__( 'No', 'snakepit' ) => 'no',
					),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'video_onclick',
					'heading'     => esc_html__( 'On Click', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Open Video in Lightbox', 'snakepit' ) => 'lightbox',
						esc_html__( 'Go to the Video Page', 'snakepit' ) => 'default',
					),
					'admin_label' => true,
				),

				array(
					'heading'     => esc_html__( 'Category Filter', 'snakepit' ),
					'param_name'  => 'video_category_filter',
					'type'        => 'checkbox',
					'admin_label' => true,
					'description' => esc_html__( 'The pagination will be disabled.', 'snakepit' ),
					'dependency'  => array(
						'element' => 'video_module',
						'value'   => array( 'grid' ),
					),
				),

				array(
					'heading'    => esc_html__( 'Filter Text Alignement', 'snakepit' ),
					'param_name' => 'video_category_filter_text_alignment',
					'type'       => 'dropdown',
					'value'      => array(
						esc_html__( 'Center', 'snakepit' ) => 'center',
						esc_html__( 'Left', 'snakepit' ) => 'left',
						esc_html__( 'Right', 'snakepit' ) => 'right',
					),
					'dependency' => array(
						'element' => 'video_category_filter',
						'value'   => array( 'true' ),
					),
				),

				array(
					'heading'     => esc_html__( 'Animation', 'snakepit' ),
					'param_name'  => 'item_animation',
					'type'        => 'dropdown',
					'value'       => array_flip( snakepit_get_animations() ),
					'admin_label' => true,
				),

				array(
					'heading'     => esc_html__( 'Number of Posts', 'snakepit' ),
					'param_name'  => 'posts_per_page',
					'type'        => 'wvc_textfield',
					'description' => esc_html__( 'Leave empty to display all post at once.', 'snakepit' ),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'pagination',
					'heading'     => esc_html__( 'Pagination', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'None', 'snakepit' ) => 'none',
						esc_html__( 'Load More', 'snakepit' ) => 'load_more',
						esc_html__( 'Numeric Pagination', 'snakepit' ) => 'standard_pagination',
						esc_html__( 'Link to Video Archives', 'snakepit' ) => 'link_to_videos',
					),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'product_category_link_id',
					'heading'     => esc_html__( 'Category', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => snakepit_get_video_cat_dropdown_options(),
					'dependency'  => array(
						'element' => 'pagination',
						'value'   => array( 'link_to_video_category' ),
					),
					'admin_label' => true,
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Include Category', 'snakepit' ),
					'param_name'  => 'video_type_include',
					'description' => esc_html__( 'Enter one or several categories. Paste category slug(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Exclude Category', 'snakepit' ),
					'param_name'  => 'video_type_exclude',
					'description' => esc_html__( 'Enter one or several categories. Paste category slug(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Include Tag', 'snakepit' ),
					'param_name'  => 'video_tag_include',
					'description' => esc_html__( 'Enter one or several tags. Paste category slug(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( 'my-tag, other-tag', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Exclude Tag', 'snakepit' ),
					'param_name'  => 'video_tag_exclude',
					'description' => esc_html__( 'Enter one or several tags. Paste category slug(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( 'my-tag, other-tag', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Offset', 'snakepit' ),
					'description' => esc_html__( '.', 'snakepit' ),
					'param_name'  => 'offset',
					'description' => esc_html__( 'The amount of posts that should be skipped in the beginning of the query.', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Order by', 'snakepit' ),
					'param_name'  => 'orderby',
					'value'       => $order_by_values,
					'save_always' => true,
					'description' => sprintf( wp_kses_post( __( 'Select how to sort retrieved posts. More at %s.', 'snakepit' ) ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Sort order', 'snakepit' ),
					'param_name'  => 'order',
					'value'       => $order_way_values,
					'save_always' => true,
					'description' => sprintf( wp_kses_post( __( 'Designates the ascending or descending order. More at %s.', 'snakepit' ) ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Post IDs', 'snakepit' ),
					'description' => esc_html__( 'By default, your last posts will be displayed. You can choose the posts you want to display by entering a list of IDs separated by a comma.', 'snakepit' ),
					'param_name'  => 'include_ids',
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Exclude Post IDs', 'snakepit' ),
					'description' => esc_html__( 'You can choose the posts you don\'t want to display by entering a list of IDs separated by a comma.', 'snakepit' ),
					'param_name'  => 'exclude_ids',
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'param_name'  => 'columns',
					'heading'     => esc_html__( 'Columns', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Auto', 'snakepit' ) => 'default',
						esc_html__( 'Two', 'snakepit' ) => 2,
						esc_html__( 'Three', 'snakepit' ) => 3,
						esc_html__( 'Four', 'snakepit' ) => 4,
						esc_html__( 'Five', 'snakepit' ) => 5,
						esc_html__( 'Six', 'snakepit' ) => 6,
						esc_html__( 'One', 'snakepit' ) => 1,
					),
					'std'         => 'default',
					'admin_label' => true,
					'description' => esc_html__( 'By default, columns are set automatically depending on the container\'s width. Set a column count here to overwrite the default behavior.', 'snakepit' ),
					'dependency'  => array(
						'element'            => 'post_display',
						'value_not_equal_to' => array( 'standard', 'standard_modern' ),
					),
				),
			),
		)
	);

	class WPBakeryShortCode_Wvc_Video_Index extends WPBakeryShortCode {} // phpcs:ignore
} // end Videos plugin check.

if ( class_exists( 'Wolf_Events' ) && ! class_exists( 'WPBakeryShortCode_Wvc_Event_Index' ) ) {
	/**
	 * Events Loop Module
	 */
	vc_map(
		array(
			'name'        => esc_html__( 'Events', 'snakepit' ),
			'description' => esc_html__( 'Display your events using the theme layouts', 'snakepit' ),
			'base'        => 'wvc_event_index',
			'category'    => esc_html__( 'Content', 'snakepit' ),
			'icon'        => 'fa fa-th',
			'weight'      => 999,
			'params'      => array(

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Index ID', 'snakepit' ),
					'value'       => 'index-' . rand( 0, 99999 ),
					'param_name'  => 'el_id',
					'description' => esc_html__( 'A unique identifier for the post module (required).', 'snakepit' ),
				),

				array(
					'param_name'  => 'event_display',
					'heading'     => esc_html__( 'Event Display', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array_flip(
						apply_filters(
							'snakepit_event_display_options',
							array(
								'list' => esc_html__( 'List', 'snakepit' ),
							)
						)
					),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'event_module',
					'heading'     => esc_html__( 'Module', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Grid', 'snakepit' ) => 'grid',
						esc_html__( 'Carousel', 'snakepit' ) => 'carousel',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element' => 'event_display',
						'value'   => array( 'grid' ),
					),
				),

				array(
					'param_name'  => 'event_location',
					'heading'     => esc_html__( 'Location', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Location', 'snakepit' ) => 'location',
						esc_html__( 'Venue', 'snakepit' ) => 'venue',
					),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'grid_padding',
					'heading'     => esc_html__( 'Padding', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Yes', 'snakepit' ) => 'yes',
						esc_html__( 'No', 'snakepit' ) => 'no',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element' => 'event_display',
						'value'   => array( 'grid' ),
					),
				),

				array(
					'param_name'  => 'event_thumbnail_size',
					'heading'     => esc_html__( 'Thumbnail Size', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Default Thumbnail', 'snakepit' ) => 'standard',
						esc_html__( 'Landscape', 'snakepit' ) => 'landscape',
						esc_html__( 'Square', 'snakepit' ) => 'square',
						esc_html__( 'Portrait', 'snakepit' ) => 'portrait',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element' => 'event_display',
						'value'   => array( 'grid' ),
					),
				),

				array(
					'param_name'  => 'event_custom_thumbnail_size',
					'heading'     => esc_html__( 'Custom Thumbnail Size', 'snakepit' ),
					'type'        => 'wvc_textfield',
					'admin_label' => true,
					'placeholder' => '450x450',
				),

				array(
					'type'               => 'dropdown',
					'heading'            => esc_html__( 'Overlay Color', 'snakepit' ),
					'param_name'         => 'overlay_color',
					'value'              => array_merge(
						array( esc_html__( 'Auto', 'snakepit' ) => 'auto' ),
						$shared_gradient_colors,
						$shared_colors,
						array( esc_html__( 'Custom color', 'snakepit' ) => 'custom' )
					),
					'std'                => apply_filters( 'wvc_default_item_overlay_color', 'black' ),
					'description'        => esc_html__( 'Select an overlay color.', 'snakepit' ),
					'param_holder_class' => 'wvc_colored-dropdown',
					'dependency'         => array(
						'element' => 'event_display',
						'value'   => array( 'grid' ),
					),
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Overlay Custom Color', 'snakepit' ),
					'param_name' => 'overlay_custom_color',
					'dependency' => array(
						'element' => 'overlay_color',
						'value'   => array( 'custom' ),
					),
				),
				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Overlay Opacity in Percent', 'snakepit' ),
					'param_name'  => 'overlay_opacity',
					'description' => '',
					'value'       => 40,
					'std'         => apply_filters( 'wvc_default_item_overlay_opacity', 40 ),
					'dependency'  => array(
						'element' => 'event_display',
						'value'   => array( 'grid' ),
					),
				),
				array(
					'type'               => 'dropdown',
					'heading'            => esc_html__( 'Overlay Text Color', 'snakepit' ),
					'param_name'         => 'overlay_text_color',
					'value'              => array_merge(
						$shared_colors,
						$shared_gradient_colors,
						array( esc_html__( 'Custom color', 'snakepit' ) => 'custom' )
					),
					'std'                => apply_filters( 'wvc_default_item_overlay_text_color', 'white' ),
					'description'        => esc_html__( 'Select an overlay color.', 'snakepit' ),
					'param_holder_class' => 'wvc_colored-dropdown',
					'dependency'         => array(
						'element' => 'event_display',
						'value'   => array( 'grid' ),
					),
				),

				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__( 'Overlay Custom Text Color', 'snakepit' ),
					'param_name' => 'overlay_text_custom_color',
					'dependency' => array(
						'element' => 'overlay_text_color',
						'value'   => array( 'custom' ),
					),
				),

				array(
					'param_name'  => 'pagination',
					'heading'     => esc_html__( 'Pagination', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'None', 'snakepit' ) => 'none',
						esc_html__( 'Link to Event Archives', 'snakepit' ) => 'link_to_events',
					),
					'admin_label' => true,
				),

				array(
					'heading'     => esc_html__( 'Animation', 'snakepit' ),
					'param_name'  => 'item_animation',
					'type'        => 'dropdown',
					'value'       => array_flip( snakepit_get_animations() ),
					'admin_label' => true,
				),

				array(
					'heading'     => esc_html__( 'Number of Posts', 'snakepit' ),
					'param_name'  => 'posts_per_page',
					'type'        => 'wvc_textfield',
					'description' => esc_html__( 'Leave empty to display all post at once.', 'snakepit' ),
					'admin_label' => true,
				),

				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Timeline', 'snakepit' ),
					'param_name' => 'timeline',
					'value'      => array(
						esc_html__( 'Future', 'snakepit' ) => 'future',
						esc_html__( 'Past', 'snakepit' ) => 'past',
					),
					'group'      => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Include Artist', 'snakepit' ),
					'param_name'  => 'artist_include',
					'description' => esc_html__( 'Enter one or several bands. Paste category slug(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Exclude Artist', 'snakepit' ),
					'param_name'  => 'artist_exclude',
					'description' => esc_html__( 'Enter one or several bands. Paste category slug(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Offset', 'snakepit' ),
					'description' => esc_html__( '.', 'snakepit' ),
					'param_name'  => 'offset',
					'description' => esc_html__( 'The amount of posts that should be skipped in the beginning of the query.', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'param_name'  => 'columns',
					'heading'     => esc_html__( 'Columns', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Auto', 'snakepit' ) => 'default',
						esc_html__( 'Two', 'snakepit' ) => 2,
						esc_html__( 'Three', 'snakepit' ) => 3,
						esc_html__( 'Four', 'snakepit' ) => 4,
						esc_html__( 'Five', 'snakepit' ) => 5,
						esc_html__( 'Six', 'snakepit' ) => 6,
						esc_html__( 'One', 'snakepit' ) => 1,
					),
					'std'         => 'default',
					'admin_label' => true,
					'description' => esc_html__( 'By default, columns are set automatically depending on the container\'s width. Set a column count here to overwrite the default behavior.', 'snakepit' ),
					'dependency'  => array(
						'element'            => 'post_display',
						'value_not_equal_to' => array( 'standard', 'standard_modern' ),
					),
				),
			),
		)
	);

	class WPBakeryShortCode_Wvc_Event_Index extends WPBakeryShortCode {} // phpcs:ignore
} // end Events plugin check.


if ( class_exists( 'Wolf_Portfolio' ) && ! class_exists( 'WPBakeryShortCode_Wvc_Work_Index' ) ) {

	/**
	 * Work Loop Module
	 */
	vc_map(
		array(
			'name'        => esc_html__( 'Works', 'snakepit' ),
			'description' => esc_html__( 'Display your works using the theme layouts', 'snakepit' ),
			'base'        => 'wvc_work_index',
			'category'    => esc_html__( 'Content', 'snakepit' ),
			'icon'        => 'fa fa-th',
			'weight'      => 999,
			'params'      => array(

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Index ID', 'snakepit' ),
					'value'       => 'index-' . rand( 0, 99999 ),
					'param_name'  => 'el_id',
					'description' => esc_html__( 'A unique identifier for the post module (required).', 'snakepit' ),
				),

				array(
					'param_name'  => 'work_display',
					'heading'     => esc_html__( 'Work Display', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array_flip(
						apply_filters(
							'snakepit_work_display_options',
							array(
								'grid' => esc_html__( 'Grid', 'snakepit' ),
							)
						)
					),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'work_metro_pattern',
					'heading'     => esc_html__( 'Metro Pattern', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => snakepit_get_metro_patterns(),
					'std'         => 'auto',
					'dependency'  => array(
						'element' => 'work_display',
						'value'   => array( 'metro' ),
					),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'work_module',
					'heading'     => esc_html__( 'Module', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Grid', 'snakepit' ) => 'grid',
						esc_html__( 'Carousel', 'snakepit' ) => 'carousel',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element' => 'work_display',
						'value'   => array( 'grid' ),
					),
				),

				array(
					'param_name'  => 'work_thumbnail_size',
					'heading'     => esc_html__( 'Thumbnail Size', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Default Thumbnail', 'snakepit' ) => 'standard',
						esc_html__( 'Landscape', 'snakepit' ) => 'landscape',
						esc_html__( 'Square', 'snakepit' ) => 'square',
						esc_html__( 'Portrait', 'snakepit' ) => 'portrait',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element' => 'work_display',
						'value'   => array( 'grid' ),
					),
				),

				array(
					'param_name'  => 'work_layout',
					'heading'     => esc_html__( 'Layout', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Classic', 'snakepit' ) => 'standard',
						esc_html__( 'Overlay', 'snakepit' ) => 'overlay',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element'            => 'work_display',
						'value_not_equal_to' => array( 'list_minimal', 'text-background', 'parallax' ),
					),
				),

				array(
					'param_name'  => 'grid_padding',
					'heading'     => esc_html__( 'Padding', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Yes', 'snakepit' ) => 'yes',
						esc_html__( 'No', 'snakepit' ) => 'no',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element' => 'work_layout',
						'value'   => array( 'overlay', 'flip-box' ),
					),
				),

				array(
					'heading'     => esc_html__( 'Category Filter', 'snakepit' ),
					'param_name'  => 'work_category_filter',
					'type'        => 'checkbox',
					'description' => esc_html__( 'The pagination will be disabled.', 'snakepit' ),
					'admin_label' => true,
					'dependency'  => array(
						'element'            => 'work_display',
						'value_not_equal_to' => array( 'list_minimal', 'text-background', 'parallax' ),
					),
				),

				array(
					'heading'    => esc_html__( 'Filter Text Alignement', 'snakepit' ),
					'param_name' => 'work_category_filter_text_alignment',
					'type'       => 'dropdown',
					'value'      => array(
						esc_html__( 'Center', 'snakepit' ) => 'center',
						esc_html__( 'Left', 'snakepit' ) => 'left',
						esc_html__( 'Right', 'snakepit' ) => 'right',
					),
					'dependency' => array(
						'element' => 'work_category_filter',
						'value'   => array( 'true' ),
					),
				),

				array(
					'heading'     => esc_html__( 'Animation', 'snakepit' ),
					'param_name'  => 'item_animation',
					'type'        => 'dropdown',
					'value'       => array_flip( snakepit_get_animations() ),
					'admin_label' => true,
				),

				array(
					'heading'     => esc_html__( 'Number of Posts', 'snakepit' ),
					'param_name'  => 'posts_per_page',
					'type'        => 'wvc_textfield',
					'description' => esc_html__( 'Leave empty to display all post at once.', 'snakepit' ),
					'admin_label' => true,
				),

				array(
					'param_name'  => 'pagination',
					'heading'     => esc_html__( 'Pagination', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'None', 'snakepit' ) => 'none',
						esc_html__( 'Load More', 'snakepit' ) => 'load_more',
						esc_html__( 'Link to Portfolio', 'snakepit' ) => 'link_to_portfolio',
					),
					'admin_label' => true,
					'dependency'  => array(
						'element' => 'work_display',
						'value'   => array( 'grid', 'masonry' ),
					),
				),

				array(
					'heading'    => esc_html__( 'Additional CSS inline style', 'snakepit' ),
					'param_name' => 'inline_style',
					'type'       => 'wvc_textfield',
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Include Category', 'snakepit' ),
					'param_name'  => 'work_type_include',
					'description' => esc_html__( 'Enter one or several categories. Paste category slug(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Exclude Category', 'snakepit' ),
					'param_name'  => 'work_type_exclude',
					'description' => esc_html__( 'Enter one or several categories. Paste category slug(s) separated by a comma', 'snakepit' ),
					'placeholder' => esc_html__( 'my-category, other-category', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Offset', 'snakepit' ),
					'description' => esc_html__( '.', 'snakepit' ),
					'param_name'  => 'offset',
					'description' => esc_html__( 'The amount of posts that should be skipped in the beginning of the query.', 'snakepit' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Order by', 'snakepit' ),
					'param_name'  => 'orderby',
					'value'       => $order_by_values,
					'save_always' => true,
					'description' => sprintf( wp_kses_post( __( 'Select how to sort retrieved posts. More at %s.', 'snakepit' ) ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Sort order', 'snakepit' ),
					'param_name'  => 'order',
					'value'       => $order_way_values,
					'save_always' => true,
					'description' => sprintf( wp_kses_post( __( 'Designates the ascending or descending order. More at %s.', 'snakepit' ) ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Post IDs', 'snakepit' ),
					'description' => esc_html__( 'By default, your last posts will be displayed. You can choose the posts you want to display by entering a list of IDs separated by a comma.', 'snakepit' ),
					'param_name'  => 'include_ids',
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Exclude Post IDs', 'snakepit' ),
					'description' => esc_html__( 'You can choose the posts you don\'t want to display by entering a list of IDs separated by a comma.', 'snakepit' ),
					'param_name'  => 'exclude_ids',
					'group'       => esc_html__( 'Query', 'snakepit' ),
				),

				array(
					'param_name'  => 'columns',
					'heading'     => esc_html__( 'Columns', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Auto', 'snakepit' ) => 'default',
						esc_html__( 'Two', 'snakepit' ) => 2,
						esc_html__( 'Three', 'snakepit' ) => 3,
						esc_html__( 'Four', 'snakepit' ) => 4,
						esc_html__( 'Five', 'snakepit' ) => 5,
						esc_html__( 'Six', 'snakepit' ) => 6,
						esc_html__( 'One', 'snakepit' ) => 1,
					),
					'std'         => 'default',
					'admin_label' => true,
					'description' => esc_html__( 'By default, columns are set automatically depending on the container\'s width. Set a column count here to overwrite the default behavior.', 'snakepit' ),
					'dependency'  => array(
						'element'            => 'post_display',
						'value_not_equal_to' => array( 'standard', 'standard_modern' ),
					),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Extra class name', 'snakepit' ),
					'param_name'  => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'snakepit' ),
					'group'       => esc_html__( 'Extra', 'snakepit' ),
				),
			),
		)
	);

	class WPBakeryShortCode_Wvc_Work_Index extends WPBakeryShortCode {} // phpcs:ignore
} // end Portfolio plugin check.

if ( ! class_exists( 'WPBakeryShortCode_Wvc_Page_Index' ) ) {

	$parent_pages = array( esc_html__( 'No', 'snakepit' ) => '' );
	$all_pages    = get_pages();

	foreach ( $all_pages as $p ) {

		if ( 0 < count(
			get_posts(
				array(
					'post_parent' => $p->ID,
					'post_type'   => 'page',
				)
			)
		) ) {
			$parent_pages[ $p->post_title ] = $p->ID;
		}
	}

	/**
	 * Page Loop Module
	 */
	vc_map(
		array(
			'name'        => esc_html__( 'Pages', 'snakepit' ),
			'description' => esc_html__( 'Display your pages using the theme layouts', 'snakepit' ),
			'base'        => 'wvc_page_index',
			'category'    => esc_html__( 'Content', 'snakepit' ),
			'icon'        => 'fa fa-th',
			'weight'      => 0,
			'params'      => array(

				array(
					'type'       => 'hidden',
					'heading'    => esc_html__( 'ID', 'snakepit' ),
					'value'      => 'items-' . rand( 0, 99999 ),
					'param_name' => 'el_id',
				),

				array(
					'param_name'  => 'page_display',
					'heading'     => esc_html__( 'Page Display', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array_flip(
						apply_filters(
							'snakepit_page_display_options',
							array(
								'grid' => esc_html__( 'Image Grid', 'snakepit' ),
							)
						)
					),
					'admin_label' => true,
				),


				array(
					'heading'     => esc_html__( 'Animation', 'snakepit' ),
					'param_name'  => 'item_animation',
					'type'        => 'dropdown',
					'value'       => array_flip( snakepit_get_animations() ),
					'admin_label' => true,
				),

				array(
					'heading'     => esc_html__( 'Number of Page to display', 'snakepit' ),
					'param_name'  => 'posts_per_page',
					'type'        => 'wvc_textfield',
					'placeholder' => get_option( 'posts_per_page' ),
					'description' => esc_html__( 'Leave empty to display all post at once.', 'snakepit' ),
					'std'         => get_option( 'posts_per_page' ),
					'admin_label' => true,
				),

				array(
					'heading'    => esc_html__( 'Additional CSS inline style', 'snakepit' ),
					'param_name' => 'inline_style',
					'type'       => 'wvc_textfield',
				),

				array(
					'param_name' => 'page_by_parent',
					'heading'    => esc_html__( 'Pages By Parent', 'snakepit' ),
					'type'       => 'dropdown',
					'value'      => $parent_pages,
					'group'      => esc_html( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Post IDs', 'snakepit' ),
					'description' => esc_html__( 'By default, your last posts will be displayed. You can choose the posts you want to display by entering a list of IDs separated by a comma.', 'snakepit' ),
					'param_name'  => 'include_ids',
					'group'       => esc_html( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'wvc_textfield',
					'heading'     => esc_html__( 'Exclude Post IDs', 'snakepit' ),
					'description' => esc_html__( 'You can choose the posts you don\'t want to display by entering a list of IDs separated by a comma.', 'snakepit' ),
					'param_name'  => 'exclude_ids',
					'group'       => esc_html( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Order by', 'snakepit' ),
					'param_name'  => 'orderby',
					'value'       => $order_by_values,
					'save_always' => true,
					'description' => sprintf( wp_kses_post( __( 'Select how to sort retrieved pages. More at %s.', 'snakepit' ) ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
					'group'       => esc_html( 'Query', 'snakepit' ),
				),

				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Sort order', 'snakepit' ),
					'param_name'  => 'order',
					'value'       => $order_way_values,
					'save_always' => true,
					'description' => sprintf( wp_kses_post( __( 'Designates the ascending or descending order. More at %s.', 'snakepit' ) ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),
					'group'       => esc_html( 'Query', 'snakepit' ),
				),

				array(
					'param_name'  => 'columns',
					'heading'     => esc_html__( 'Columns', 'snakepit' ),
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Auto', 'snakepit' ) => 'default',
						esc_html__( 'Two', 'snakepit' ) => 2,
						esc_html__( 'Three', 'snakepit' ) => 3,
						esc_html__( 'Four', 'snakepit' ) => 4,
						esc_html__( 'Six', 'snakepit' ) => 6,
						esc_html__( 'One', 'snakepit' ) => 1,
					),
					'std'         => 'default',
					'admin_label' => true,
					'description' => esc_html__( 'By default, columns are set automatically depending on the container\'s width. Set a column count here to overwrite the default behavior.', 'snakepit' ),
					'dependency'  => array(
						'element'            => 'post_display',
						'value_not_equal_to' => array( 'standard', 'standard_modern' ),
					),
					'group'       => esc_html__( 'Extra', 'snakepit' ),
				),
			),
		)
	);

	class WPBakeryShortCode_Wvc_Page_Index extends WPBakeryShortCode {} // phpcs:ignore
}
