<?php
/**
 * Snakepit metaboxes
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Register metaboxes
 *
 * Pass a metabox array to generate metabox with the  Wolf Metaboxes plugin
 */
function snakepit_register_metabox() {

	$body_metaboxes = array(
		'site_settings' => array(
			'title' => esc_html__( 'Layout', 'snakepit' ),
			'page' => apply_filters( 'snakepit_site_settings_post_types', array( 'post', 'page', 'plugin', 'video', 'product', 'gallery', 'theme', 'work', 'show', 'release', 'wpm_playlist', 'event', 'artist', 'mp-event' ) ),

			'metafields' => array(

				array(
					'label'	=> '',
					'id'	=> '_post_subheading',
					'type'	=> 'text',
				),

				array(
					'label'	=> esc_html__( 'Scroll to second row on mousewheel down.', 'snakepit' ),
					'id'	=> '_hero_mousewheel',
					'type'	=> 'checkbox',
				),

				array(
					'label'	=> esc_html__( 'Content Background Color', 'snakepit' ),
					'id'	=> '_post_content_inner_bg_color',
					'type'	=> 'colorpicker',
					'desc' => esc_html__( 'If you use the page builder and set your row background setting to "no background", you may want to change the overall content background color.', 'snakepit' ),
				),

				array(
					'label' => esc_html__( 'Loading Animation Type', 'snakepit' ),
					'id' => '_post_loading_animation_type',
					'type' => 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'overlay' => esc_html__( 'Overlay', 'snakepit' ),
		 				//'snakepit' => esc_html__( 'Overlay with animation', 'snakepit' ),
		 				'none' => esc_html__( 'None', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Body Background', 'snakepit' ),
					'id'	=> '_post_body_background_img',
					'type'	=> 'image',
				),

				array(
					'label'	=> esc_html__( 'Body Background Position', 'snakepit' ),
					'id'	=> '_post_body_background_img_position',
					'type' => 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'center top' => esc_html__( 'center top', 'snakepit' ),
						'center center' => esc_html__( 'center center', 'snakepit' ),
						'left top'  => esc_html__( 'left top', 'snakepit' ),
						'right top'  => esc_html__( 'right top', 'snakepit' ),
						'center bottom' => esc_html__( 'center bottom', 'snakepit' ),
						'left bottom'  => esc_html__( 'left bottom', 'snakepit' ),
						'right bottom'  => esc_html__( 'right bottom', 'snakepit' ),
						'left center'  => esc_html__( 'left center', 'snakepit' ),
						'right center' => esc_html__( 'right center', 'snakepit' ),
					),
				),
				array(
					'label'	=> esc_html__( 'Body Background Attachment', 'snakepit' ),
					'id'	=> '_post_body_background_img_attachment',
					'type' => 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'scroll' => esc_html__( 'Scroll', 'snakepit' ),
						'fixed' => esc_html__( 'Fixed', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Accent Color', 'snakepit' ),
					'id'	=> '_post_accent_color',
					'type'	=> 'colorpicker',
				),
			),
		),
	);

	$content_blocks = array(
			'' => '&mdash; ' . esc_html__( 'None', 'snakepit' ) . ' &mdash;',
	);

	if ( class_exists( 'Wolf_Visual_Composer' ) && class_exists( 'Wolf_Vc_Content_Block' ) && defined( 'WPB_VC_VERSION' ) ) {
		// Content block option
		$content_block_posts = get_posts( 'post_type="wvc_content_block"&numberposts=-1' );

		$content_blocks = array(
			'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
			'none' => esc_html__( 'None', 'snakepit' ),
		);
		if ( $content_block_posts ) {
			foreach ( $content_block_posts as $content_block_options ) {
				$content_blocks[ $content_block_options->ID ] = $content_block_options->post_title;
			}
		} else {
			$content_blocks[0] = esc_html__( 'No Content Block Yet', 'snakepit' );
		}

		$body_metaboxes['site_settings']['metafields'][] = array(
			'label'	=> esc_html__( 'Post-header Block', 'snakepit' ),
			'id'	=> '_post_after_header_block',
			'type'	=> 'select',
			'choices' => $content_blocks,
		);

		$body_metaboxes['site_settings']['metafields'][] = array(
			'label'	=> esc_html__( 'Pre-footer Block', 'snakepit' ),
			'id'	=> '_post_before_footer_block',
			'type'	=> 'select',
			'choices' => $content_blocks,
		);

	}

	$header_metaboxes = array(
		'header_settings' => array(
			'title' => esc_html__( 'Header', 'snakepit' ),
			'page' => apply_filters( 'snakepit_header_settings_post_types', array( 'post', 'page', 'plugin', 'video', 'gallery', 'theme', 'work', 'show', 'release', 'wpm_playlist', 'event', 'artist', 'mp-event' ) ),

			'metafields' => array(

				array(
					'label'	=> esc_html__( 'Header Layout', 'snakepit' ),
					'id'	=> '_post_hero_layout',
					'type'	=> 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'standard' => esc_html__( 'Standard', 'snakepit' ),
						'big' => esc_html__( 'Big', 'snakepit' ),
						'small' => esc_html__( 'Small', 'snakepit' ),
						'fullheight' => esc_html__( 'Full Height', 'snakepit' ),
						'none' => esc_html__( 'No Header', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Title Font Family', 'snakepit' ),
					'id'	=> '_post_hero_title_font_family',
					'type'	=> 'font_family',
				),

				array(
					'label'	=> esc_html__( 'Font Transform', 'snakepit' ),
					'id'	=> '_post_hero_title_font_transform',
					'type'	=> 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'uppercase' => esc_html__( 'Uppercase', 'snakepit' ),
						'none' => esc_html__( 'None', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Big Text', 'snakepit' ),
					'id'	=> '_post_hero_title_bigtext',
					'type'	=> 'checkbox',
					'desc' => esc_html__( 'Enable "Big Text" for the title?', 'snakepit' ),
				),

				array(
					'label'	=> esc_html__( 'Font Tone', 'snakepit' ),
					'id'	=> '_post_hero_font_tone',
					'type'	=> 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'light' => esc_html__( 'Light', 'snakepit' ),
						'dark' => esc_html__( 'Dark', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Background Type', 'snakepit' ),
					'id'	=> '_post_hero_background_type',
					'type'	=> 'select',
					'choices' => array(
						'featured-image' => esc_html__( 'Featured Image', 'snakepit' ),
						'image' => esc_html__( 'Image', 'snakepit' ),
						'video' => esc_html__( 'Video', 'snakepit' ),
						'slideshow' => esc_html__( 'Slideshow', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Slideshow Images', 'snakepit' ),
					'id'	=> '_post_hero_slideshow_ids',
					'type'	=> 'multiple_images',
					'dependency' => array( 'element' => '_post_hero_background_type', 'value' => array( 'slideshow' ) ),
				),

				array(
					'label'	=> esc_html__( 'Background', 'snakepit' ),
					'id'	=> '_post_hero_background',
					'type'	=> 'background',
					'dependency' => array( 'element' => '_post_hero_background_type', 'value' => array( 'image' ) ),
				),

				array(
					'label'	=> esc_html__( 'Background Effect', 'snakepit' ),
					'id'	=> '_post_hero_background_effect',
					'type'	=> 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'zoomin' => esc_html__( 'Zoom', 'snakepit' ),
						'parallax' => esc_html__( 'Parallax', 'snakepit' ),
						'none' => esc_html__( 'None', 'snakepit' ),
					),
					'dependency' => array( 'element' => '_post_hero_background_type', 'value' => array( 'image' ) ),
				),

				array(
					'label'	=> esc_html__( 'Video URL', 'snakepit' ),
					'id'	=> '_post_hero_background_video_url',
					'type'	=> 'video',
					'dependency' => array( 'element' => '_post_hero_background_type', 'value' => array( 'video' ) ),
					'desc' => esc_html__( 'A mp4 or YouTube URL. The featured image will be used as image fallback when the video cannot be displayed.', 'snakepit' ),
				),

				array(
					'label'	=> esc_html__( 'Overlay', 'snakepit' ),
					'id'	=> '_post_hero_overlay',
					'type'	=> 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'custom' => esc_html__( 'Custom', 'snakepit' ),
						'none' => esc_html__( 'None', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Overlay Color', 'snakepit' ),
					'id'	=> '_post_hero_overlay_color',
					'type'	=> 'colorpicker',
					//'value' 	=> '#000000',
					'dependency' => array( 'element' => '_post_hero_overlay', 'value' => array( 'custom' ) ),
				),

				array(
					'label'	=> esc_html__( 'Overlay Opacity (in percent)', 'snakepit' ),
					'id'	=> '_post_hero_overlay_opacity',
					'desc'	=> esc_html__( 'Adapt the header overlay opacity if needed', 'snakepit' ),
					'type'	=> 'int',
					'placeholder'	=> 40,
					'dependency' => array( 'element' => '_post_hero_overlay', 'value' => array( 'custom' ) ),
				),

			),
		),
	);

	$menu_metaboxes = array(
			'menu_settings' => array(
				'title' => esc_html__( 'Menu', 'snakepit' ),
				'page' => apply_filters( 'snakepit_menu_settings_post_types', array( 'post', 'page', 'plugin', 'video', 'product', 'gallery', 'theme', 'work', 'show', 'release', 'wpm_playlist', 'event', 'artist', 'mp-event' ) ),

			'metafields' => array(
				array(
					'label'	=> esc_html__( 'Menu Layout', 'snakepit' ),
					'id'	=> '_post_menu_layout',
					'type'	=> 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'top-right' => esc_html__( 'Top Right', 'snakepit' ),
						'top-justify' => esc_html__( 'Top Justify', 'snakepit' ),
						'top-justify-left' => esc_html__( 'Top Justify Left', 'snakepit' ),
						'centered-logo' => esc_html__( 'Centered', 'snakepit' ),
						'top-left' => esc_html__( 'Top Left', 'snakepit' ),
						//'offcanvas' => esc_html__( 'Off Canvas', 'snakepit' ),
						 'overlay' => esc_html__( 'Overlay', 'snakepit' ),
						//'lateral' => esc_html__( 'Lateral', 'snakepit' ),
						'none' => esc_html__( 'No Menu', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Menu Width', 'snakepit' ),
					'id'	=> '_post_menu_width',
					'type'	=> 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'wide' => esc_html__( 'Wide', 'snakepit' ),
						'boxed' => esc_html__( 'Boxed', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Megamenu Width', 'snakepit' ),
					'id'	=> '_post_mega_menu_width',
					'type'	=> 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'boxed' => esc_html__( 'Boxed', 'snakepit' ),
						'wide' => esc_html__( 'Wide', 'snakepit' ),
						'fullwidth' => esc_html__( 'Full Width', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Menu Style', 'snakepit' ),
					'id'	=> '_post_menu_style',
					'type'	=> 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'solid' => esc_html__( 'Solid', 'snakepit' ),
						'semi-transparent-white' => esc_html__( 'Semi-transparent White', 'snakepit' ),
						'semi-transparent-black' => esc_html__( 'Semi-transparent Black', 'snakepit' ),
						'transparent' => esc_html__( 'Transparent', 'snakepit' ),
						//'none' => esc_html__( 'No Menu', 'snakepit' ),
					),
				),

				/*array(
					'label'	=> esc_html__( 'Menu Skin', 'snakepit' ),
					'id'	=> '_post_menu_skin',
					'type'	=> 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'light' => esc_html__( 'Light', 'snakepit' ),
						'dark' => esc_html__( 'Dark', 'snakepit' ),
						//'none' => esc_html__( 'No Menu', 'snakepit' ),
					),
				),*/

				'menu_offset_type' => array(
					'id' => '_post_menu_offset_type',
					'label' => esc_html__( 'Menu Offset Type', 'snakepit' ),
					'type' => 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'auto' => esc_html__( 'Auto', 'snakepit' ),
						'bottom' => esc_html__( 'Bottom', 'snakepit' ),
						'none' => esc_html__( 'None (stay at top)', 'snakepit' ),
						'custom' => esc_html__( 'Custom', 'snakepit' ),
					),

					'desc' => sprintf( snakepit_kses( __( 'Use this option to set where the navigation bar is displayed. Mainly used for front page purpose. "Auto" will take the height of the first row/section in the content. Use "custom" to set a fixed height.', 'snakepit' ) ), '100%' ),
				),

				'menu_offset' => array(
					'id' => '_post_menu_offset',
					'label' => esc_html__( 'Custom Menu Offset Top', 'snakepit' ),
					'type' => 'text',
					'desc' => sprintf( snakepit_kses( __( 'Enter a value in %s or %s', 'snakepit' ) ), 'px', 'vh' ),
					'dependency' => array( 'element' => '_post_menu_offset_type', 'value' => array( 'custom' ) ),
				),

				'menu_sticky_type' => array(
					'id' =>'_post_menu_sticky_type',
					'label' => esc_html__( 'Sticky Menu', 'snakepit' ),
					'type' => 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'none' => esc_html__( 'Disabled', 'snakepit' ),
						//'soft' => esc_html__( 'Sticky on scroll up', 'snakepit' ),
						'hard' => esc_html__( 'Enabled', 'snakepit' ),
					),
				),

				// array(
				// 	'label'	=> esc_html__( 'Sticky Menu Skin', 'snakepit' ),
				// 	'id'	=> '_post_menu_skin',
				// 	'type'	=> 'select',
				// 	'choices' => array(
				// 		'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
				// 		'light' => esc_html__( 'Light', 'snakepit' ),
				// 		'dark' => esc_html__( 'Dark', 'snakepit' ),
				// 		//'none' => esc_html__( 'No Menu', 'snakepit' ),
				// 	),
				// ),

				array(
					'id' => '_post_menu_cta_content_type',
					'label' => esc_html__( 'Additional Content', 'snakepit' ),
					'type' => 'select',
					'default' => 'icons',
					'choices' => array_merge(
						array(
							'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						),
						apply_filters( 'snakepit_menu_cta_content_type_options', array(
							'search_icon' => esc_html__( 'Search Icon', 'snakepit' ),
							'secondary-menu' => esc_html__( 'Secondary Menu', 'snakepit' ),
						) ),
						array( 'none' => esc_html__( 'None', 'snakepit' ) )
					),
				),

				// array(
				// 	'id' => '_post_show_nav_player',
				// 	'label' => esc_html__( 'Show Navigation Player', 'snakepit' ),
				// 	'type' => 'select',
				// 	'choices' => array(
				// 		'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
				// 		'yes' => esc_html__( 'Yes', 'snakepit' ),
				// 		'no' => esc_html__( 'No', 'snakepit' ),
				// 	),
				// ),

				// array(
				// 	'id' => '_post_side_panel_position',
				// 	'label' => esc_html__( 'Side Panel', 'snakepit' ),
				// 	'type' => 'select',
				// 	'choices' => array(
				// 		'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
				// 		'none' => esc_html__( 'None', 'snakepit' ),
				// 		'right' => esc_html__( 'At Right', 'snakepit' ),
				// 		'left' => esc_html__( 'At Left', 'snakepit' ),
				// 	),
				// 	'desc' => esc_html__( 'Note that it will be disable with a vertical menu layout (overlay, offcanvas etc...).', 'snakepit' ),
				// ),

				array(
					'id' => '_post_logo_visibility',
					'label' => esc_html__( 'Logo Visibility', 'snakepit' ),
					'type' => 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'always' => esc_html__( 'Always', 'snakepit' ),
						'sticky_menu' => esc_html__( 'When menu is sticky only', 'snakepit' ),
						'hidden' => esc_html__( 'Hidden', 'snakepit' ),
					),
				),

				array(
					'id' => '_post_menu_items_visibility',
					'label' => esc_html__( 'Menu Items Visibility', 'snakepit' ),
					'type' => 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'show' => esc_html__( 'Visible', 'snakepit' ),
						'hidden' => esc_html__( 'Hidden', 'snakepit' ),
					),
					'desc' => esc_html__( 'If, for some reason, you need to hide the menu items but leave the logo, additional content and side panel.', 'snakepit' ),
				),

				'menu_breakpoint' => array(
					'id' =>'_post_menu_breakpoint',
					'label' => esc_html__( 'Mobile Menu Breakpoint', 'snakepit' ),
					'type' => 'text',
					'desc' => esc_html__( 'Use this field if you want to overwrite the mobile menu breakpoint.', 'snakepit' ),
				),
			),
		)
	);

	$footer_metaboxes = array(
		'footer_settings' => array(
				'title' => esc_html__( 'Footer', 'snakepit' ),
				'page' => apply_filters( 'snakepit_menu_settings_post_types', array( 'post', 'page', 'plugin', 'video', 'product', 'gallery', 'theme', 'work', 'show', 'release', 'wpm_playlist', 'event' ) ),

			'metafields' => array(
				array(
					'label'	=> esc_html__( 'Page Footer', 'snakepit' ),
					'id'	=> '_post_footer_type',
					'type'	=> 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'hidden' => esc_html__( 'No Footer', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Hide Bottom Bar', 'snakepit' ),
					'id'	=> '_post_bottom_bar_hidden',
					'type'	=> 'select',
					'choices' => array(
						'' => esc_html__( 'No', 'snakepit' ),
						'yes' => esc_html__( 'Yes', 'snakepit' ),
					),
				),
			),
		)
	);

	/************** Post options ******************/

	$product_options = array();
	$product_options[] = esc_html__( 'WooCommerce not installed', 'snakepit' );

	if ( class_exists( 'WooCommerce' ) ) {
		$product_posts = get_posts( 'post_type="product"&numberposts=-1' );

		$product_options = array();
		if ( $product_posts ) {

			$product_options[] = esc_html__( 'Not linked', 'snakepit' );

			foreach ( $product_posts as $product ) {
				$product_options[ $product->ID ] = $product->post_title;
			}
		} else {
			$product_options[ esc_html__( 'No product yet', 'snakepit' ) ] = 0;
		}
	}

	$post_metaboxes = array(
		'post_settings' => array(
			'title' => esc_html__( 'Post', 'snakepit' ),
			'page' => array( 'post' ),
			'metafields' => array(
				array(
					'label'	=> esc_html__( 'Post Layout', 'snakepit' ),
					'id'	=> '_post_layout',
					'type'	=> 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'sidebar-right' => esc_html__( 'Sidebar Right', 'snakepit' ),
						'sidebar-left' => esc_html__( 'Sidebar Left', 'snakepit' ),
						'no-sidebar' => esc_html__( 'No Sidebar', 'snakepit' ),
						'fullwidth' => esc_html__( 'Full width', 'snakepit' ),
					),
				),

				// array(
				// 	'label'	=> esc_html__( 'Feature a Product', 'snakepit' ),
				// 	'id'	=> '_post_wc_product_id',
				// 	'type'	=> 'select',
				// 	'choices' => $product_options,
				// 	'desc'	=> esc_html__( 'A "Shop Now" buton will be displayed in the metro layout.', 'snakepit' ),
				// ),

				array(
					'label'	=> esc_html__( 'Featured', 'snakepit' ),
					'id'	=> '_post_featured',
					'type'	=> 'checkbox',
					'desc'	=> esc_html__( 'Will be displayed bigger in the "metro" layout (auto pattern).', 'snakepit' ),
				),
			),
		),
	);

	/************** Product options ******************/
	$product_metaboxes = array(

		'product_options' => array(
			'title' => esc_html__( 'Product', 'snakepit' ),
			'page' => array( 'product' ),
			'metafields' => array(

				array(
					'label'	=> esc_html__( 'Label', 'snakepit' ),
					'id'	=> '_post_product_label',
					'type'	=> 'text',
					'placeholder' => esc_html__( '-30%', 'snakepit' ),
				),

				array(
					'label'	=> esc_html__( 'Layout', 'snakepit' ),
					'id'	=> '_post_product_single_layout',
					'type'	=> 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'standard' => esc_html__( 'Standard', 'snakepit' ),
						'sidebar-right' => esc_html__( 'Sidebar Right', 'snakepit' ),
						'sidebar-left' => esc_html__( 'Sidebar Left', 'snakepit' ),
						'fullwidth' => esc_html__( 'Full Width', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'MP3', 'snakepit' ),
					'id'	=> '_post_product_mp3',
					'type'	=> 'file',
					'desc' => esc_html__( 'If you want to display a player for a song you want to sell, paste the mp3 URL here.', 'snakepit' ),
				),

				array(
					'label'	=> esc_html__( 'MP3 Label', 'snakepit' ),
					'id'	=> '_post_product_mp3_label',
					'type'	=> 'text',
					'desc' => esc_html__( 'An optional label to describe the song.', 'snakepit' ),
				),

				array(
					'label'	=> esc_html__( 'Hide Player on Single Product Page', 'snakepit' ),
					'id'	=> '_post_wc_product_hide_mp3_player',
					'type'	=> 'checkbox',
				),

				array(
					'label'	=> esc_html__( 'Size Chart Image', 'snakepit' ),
					'id'	=> '_post_wc_product_size_chart_img',
					'type'	=> 'image',
					'desc' => esc_html__( 'You can set a size chart image in the product category options. You can overwrite the category size chart for this product by uploading another image here.', 'snakepit' ),
				),

				array(
					'label'	=> esc_html__( 'Hide Size Chart Image', 'snakepit' ),
					'id'	=> '_post_wc_product_hide_size_chart_img',
					'type'	=> 'checkbox',
				),

				array(
					'label'	=> esc_html__( 'Menu Font Tone', 'snakepit' ),
					'id'	=> '_post_hero_font_tone',
					'type'	=> 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'light' => esc_html__( 'Light', 'snakepit' ),
						'dark' => esc_html__( 'Dark', 'snakepit' ),
					),
					'desc' => esc_html__( 'By default the menu style is set to "solid" on single product page. If you change the menu style, you may need to adujst the menu color tone here.', 'snakepit' ),
				),

				'menu_sticky_type' => array(
					'id' =>'_post_product_sticky',
					'label' => esc_html__( 'Stacked Images', 'snakepit' ),
					'type' => 'select',
					'choices' => array(
						'' => '&mdash; ' . esc_html__( 'Default', 'snakepit' ) . ' &mdash;',
						'yes' => esc_html__( 'Yes', 'snakepit' ),
						'no' => esc_html__( 'No', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Disable Image Zoom', 'snakepit' ),
					'id'	=> '_post_product_disable_easyzoom',
					'type'	=> 'checkbox',
					'desc' => esc_html__( 'Disable image zoom on this product if it\'s enabled in the customizer.', 'snakepit' ),
				),
			),
		),
	);

	/************** Product options ******************/

	$product_options = array();
	$product_options[] = esc_html__( 'WooCommerce not installed', 'snakepit' );

	if ( class_exists( 'WooCommerce' ) ) {
		$product_posts = get_posts( 'post_type="product"&numberposts=-1' );

		$product_options = array();
		if ( $product_posts ) {

			$product_options[] = esc_html__( 'Not linked', 'snakepit' );

			foreach ( $product_posts as $product ) {
				$product_options[ $product->ID ] = $product->post_title;
			}
		} else {
			$product_options[ esc_html__( 'No product yet', 'snakepit' ) ] = 0;
		}
	}

	// if ( class_exists( 'Wolf_Playlist_Manager' ) ) {
	// 	// Player option
	// 	$playlist_posts = get_posts( 'post_type="wpm_playlist"&numberposts=-1' );

	// 	$playlist = array( '' => esc_html__( 'None', 'snakepit' ) );
	// 	if ( $playlist_posts ) {
	// 		foreach ( $playlist_posts as $playlist_options ) {
	// 			$playlist[ $playlist_options->ID ] = $playlist_options->post_title;
	// 		}
	// 	} else {
	// 		$playlist[0] = esc_html__( 'No Playlist Yet', 'snakepit' );
	// 	}

	// 	$product_metaboxes['product_options']['metafields'][] = array(
	// 		'label'	=> esc_html__( 'Playlist', 'snakepit' ),
	// 		'id'	=> '_post_product_playlist_id',
	// 		'type'	=> 'select',
	// 		'choices' => $playlist,
	// 		'desc' => esc_html__( 'It will overwrite the single player.', 'snakepit' ),
	// 	);

	// 	$product_metaboxes['product_options']['metafields'][] = array(
	// 		'label'	=> esc_html__( 'Playlist Skin', 'snakepit' ),
	// 		'id'	=> '_post_product_playlist_skin',
	// 		'type'	=> 'select',
	// 		'choices' => array(
	// 			'dark' => esc_html__( 'Dark', 'snakepit' ),
	// 			'light' => esc_html__( 'Light', 'snakepit' ),
	// 		),
	// 	);
	// }

	/************** Portfolio options ******************/
	$work_metaboxes = array(

		'work_options' => array(
			'title' => esc_html__( 'Work', 'snakepit' ),
			'page' => array( 'work' ),
			'metafields' => array(

				array(
					'label'	=> esc_html__( 'Client', 'snakepit' ),
					'id'	=> '_work_client',
					'type'	=> 'text',
				),

				array(
					'label'	=> esc_html__( 'Link', 'snakepit' ),
					'id'		=> '_work_link',
					'type'	=> 'text',
				),

				array(
					'label'	=> esc_html__( 'Width', 'snakepit' ),
					'id'	=> '_post_width',
					'type'	=> 'select',
					'choices' => array(
						'standard' => esc_html__( 'Standard', 'snakepit' ),
						'wide' => esc_html__( 'Wide', 'snakepit' ),
						'fullwidth' => esc_html__( 'Full Width', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Layout', 'snakepit' ),
					'id'	=> '_post_layout',
					'type'	=> 'select',
					'choices' => array(
						'centered' => esc_html__( 'Centered', 'snakepit' ),
						'sidebar-right' => esc_html__( 'Excerpt & Info at Right', 'snakepit' ),
						'sidebar-left' => esc_html__( 'Excerpt & Info at Left', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Excerpt & Info Position', 'snakepit' ),
					'id'	=> '_post_work_info_position',
					'type'	=> 'select',
					'choices' => array(
						'after' => esc_html__( 'After Content', 'snakepit' ),
						'before' => esc_html__( 'Before Content', 'snakepit' ),
						'none' => esc_html__( 'Hidden', 'snakepit' ),
					),
				),

				// array(
				// 	'label'	=> esc_html__( 'Featured', 'snakepit' ),
				// 	'id'	=> '_post_featured',
				// 	'type'	=> 'checkbox',
				// 	'desc'	=> esc_html__( 'The featured image will be display bigger in the "metro" layout.', 'snakepit' ),
				// ),
			),
		),
	);

	/************** One pager options ******************/
	$one_page_metaboxes = array(
		'one_page_settings' => array(
			'title' => esc_html__( 'One-Page', 'snakepit' ),
			'page' => array( 'post', 'page', 'work', 'product', 'release' ),
			'metafields' => array(
				array(
					'label'	=> esc_html__( 'One-Page Navigation', 'snakepit' ),
					'id'	=> '_post_one_page_menu',
					'type'	=> 'select',
					'choices' => array(
						'' => esc_html__( 'No', 'snakepit' ),
						'replace_main_nav' => esc_html__( 'Yes', 'snakepit' ),
					),
					'desc'	=> snakepit_kses( __( 'Activate to replace the main menu by a one-page scroll navigation. <strong>NB: Every row must have a unique name set in the row settings "Advanced" tab.</strong>', 'snakepit' ) ),
				),
				array(
					'label'	=> esc_html__( 'One-Page Bullet Navigation', 'snakepit' ),
					'id'	=> '_post_scroller',
					'type'	=> 'checkbox',
					'desc'	=> snakepit_kses( __( 'Activate to create a section scroller navigation. <strong>NB: Every row must have a unique name set in the row settings "Advanced" tab.</strong>', 'snakepit' ) ),
				),
				array(
					'label'	=> sprintf( esc_html__( 'Enable %s animations', 'snakepit' ), 'fullPage' ),
					'id'	=> '_post_fullpage',
					'type'	=> 'select',
					'choices' => array(
						'' => esc_html__( 'No', 'snakepit' ),
						'yes' => esc_html__( 'Yes', 'snakepit' ),
					),
					'desc' => esc_html__( 'Activate to enable advanced scroll animations between sections. Some of your row setting may be disabled to suit the global page design.', 'snakepit' ),
				),

				array(
					'label'	=> sprintf( esc_html__( '%s animation transition', 'snakepit' ), 'fullPage' ),
					'id'	=> '_post_fullpage_transition',
					'type'	=> 'select',
					'choices' => array(
						'mix' => esc_html__( 'Special', 'snakepit' ),
						'parallax' => esc_html__( 'Parallax', 'snakepit' ),
						'fade' => esc_html__( 'Fade', 'snakepit' ),
						'zoom' => esc_html__( 'Zoom', 'snakepit' ),
						'curtain' => esc_html__( 'Curtain', 'snakepit' ),
						'slide' => esc_html__( 'Slide', 'snakepit' ),
					),
					'dependency' => array( 'element' => '_post_fullpage', 'value' => array( 'yes' ) ),
				),

				array(
					'label'	=> sprintf( esc_html__( '%s animation duration', 'snakepit' ), 'fullPage' ),
					'id'	=> '_post_fullpage_animtime',
					'type'	=> 'text',
					'placeholder' => 1000,
					'dependency' => array( 'element' => '_post_fullpage', 'value' => array( 'yes' ) ),
				),
			),
		),
	);

	$release_metaboxes = array(
		'release_options' => array(
			'title' => esc_html__( 'Release', 'snakepit' ),
			'page' => array( 'release' ),
			'metafields' => array(

				// array(
				// 	'label'	=> esc_html__( 'Release title', 'snakepit' ),
				// 	'id'	=> '_wolf_release_title',
				// 	'type'	=> 'text',
				// ),

				array(
					'label'	=> esc_html__( 'Release Width', 'snakepit' ),
					'id'	=> '_post_width',
					'type'	=> 'select',
					'choices' => array(
						'standard' => esc_html__( 'Standard', 'snakepit' ),
						'wide' => esc_html__( 'Wide', 'snakepit' ),
						//'fullwidth' => esc_html__( 'Full Width', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'Release Layout', 'snakepit' ),
					'id'	=> '_post_layout',
					'type'	=> 'select',
					'choices' => array(
						'sidebar-left' => esc_html__( 'Content Right', 'snakepit' ),
						'sidebar-right' => esc_html__( 'Content Left', 'snakepit' ),
						//'centered' => esc_html__( 'Centered', 'snakepit' ),
					),
				),

				array(
					'label'	=> esc_html__( 'WooCommerce Product ID', 'snakepit' ),
					'id'	=> '_post_wc_product_id',
					'type'	=> 'select',
					'choices' => $product_options,
					'desc'	=> esc_html__( 'You can link this release to a WooCommerce product to add an "Add to cart" button.', 'snakepit' ),
				),

				array(
					'label'	=> esc_html__( 'Featured', 'snakepit' ),
					'id'	=> '_post_featured',
					'type'	=> 'checkbox',
					'desc'	=> esc_html__( 'May be used depending on layout option.', 'snakepit' ),
				),
			),
		),
	);

	/************** Video options ******************/
	$video_metaboxes = array(
		'video_settings' => array(
			'title' => esc_html__( 'Video', 'snakepit' ),
			'page' => array( 'video' ),
			'metafields' => array(
				array(
					'label'	=> esc_html__( 'Layout', 'snakepit' ),
					'id'	=> '_post_layout',
					'type'	=> 'select',
					'choices' => array(
						'' => esc_html__( 'Default', 'snakepit' ),
						'standard' => esc_html__( 'Standard', 'snakepit' ),
						'sidebar-right' => esc_html__( 'Sidebar Right', 'snakepit' ),
						'sidebar-left' => esc_html__( 'Sidebar Left', 'snakepit' ),
						'fullwidth' => esc_html__( 'Full Width', 'snakepit' ),
					),
				),
			),
		),
	);

	$all_metaboxes = array_merge(
		apply_filters( 'snakepit_body_metaboxes', $body_metaboxes ),
		apply_filters( 'snakepit_post_metaboxes', $post_metaboxes ),
		apply_filters( 'snakepit_product_metaboxes', $product_metaboxes ),
		apply_filters( 'snakepit_release_metaboxes', $release_metaboxes ),
		apply_filters( 'snakepit_work_metaboxes', $work_metaboxes ),
		apply_filters( 'snakepit_video_metaboxes',  $video_metaboxes ),
		apply_filters( 'snakepit_header_metaboxes', $header_metaboxes ),
		apply_filters( 'snakepit_menu_metaboxes', $menu_metaboxes ),
		apply_filters( 'snakepit_footer_metaboxes', $footer_metaboxes )
	);

	if ( class_exists( 'Wolf_Visual_Composer' ) && defined( 'WPB_VC_VERSION' ) ) {
		$all_metaboxes = $all_metaboxes + apply_filters( 'snakepit_one_page_metaboxes', $one_page_metaboxes );
	}

	if ( class_exists( 'Wolf_Metaboxes' ) ) {
		new Wolf_Metaboxes( apply_filters( 'snakepit_metaboxes', $all_metaboxes ) );
	}
}
snakepit_register_metabox();
