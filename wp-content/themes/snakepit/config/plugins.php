<?php
/**
 * Snakepit recommended plugins
 *
 * @package WordPress
 * @subpackage Snakepit
 * @since Snakepit 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//delete_user_meta( get_current_user_id(), 'tgmpa_dismissed_notice_tgmpa' );

/* Require TGM Plugin Activation class */
include_once( get_template_directory() . '/inc/admin/lib/class-tgm-plugin-activation.php' );

function wolf_theme_register_required_plugins() {

	$plugins = array(

		array(
			'name'    => esc_html__( 'WPBakery Page Builder', 'snakepit' ),
			'slug'   => 'js_composer',
			'source' => 'js_composer.zip',
			'required' => true,
		),

		array(
			'name'    => esc_html__( 'Slider Revolution', 'snakepit' ),
			'slug'   => 'revslider',
			'source'   => 'revslider.zip',
			'version' => '6.2',
		),

		array(
			'name'    => esc_html__( 'WPBakery Page Builder Extension', 'snakepit' ),
			'slug'   => 'wolf-visual-composer',
			'source'   => 'https://github.com/wolfthemes/wolf-visual-composer/archive/master.zip',
			'external_url' => 'https://github.com/wolfthemes/wolf-visual-composer/archive/master.zip',
			'required' => true,
		),

		array(
			'name'    => esc_html__( 'WPBakery Page Builder Content Blocks', 'snakepit' ),
			'slug'   => 'wolf-vc-content-block',
			'source'   => 'https://github.com/wolfthemes/wolf-vc-content-block/archive/master.zip',
			'external_url' => 'https://github.com/wolfthemes/wolf-vc-content-block/archive/master.zip',
		),

		array(
			'name'    =>esc_html__( 'Playlist Manager', 'snakepit' ),
			'slug'   => 'wolf-playlist-manager',
			'source'   => 'https://github.com/wolfthemes/wolf-playlist-manager/archive/master.zip',
			'external_url' => 'https://github.com/wolfthemes/wolf-playlist-manager/archive/master.zip',
		),

		array(
			'name'    => esc_html__( 'Discography', 'snakepit' ),
			'slug'   => 'wolf-discography',
			'source'   => 'https://github.com/wolfthemes/wolf-discography/archive/master.zip',
			'external_url' => 'https://github.com/wolfthemes/wolf-discography/archive/master.zip',
		),

		array(
			'name'    => esc_html__( 'Events', 'snakepit' ),
			'slug'   => 'wolf-events',
			'source'   => 'https://github.com/wolfthemes/wolf-events/archive/master.zip',
			'external_url' => 'https://github.com/wolfthemes/wolf-events/archive/master.zip',
		),

		array(
			'name'    => esc_html__( 'Videos', 'snakepit' ),
			'slug'   => 'wolf-videos',
			'source'   => 'https://github.com/wolfthemes/wolf-videos/archive/master.zip',
			'external_url' => 'https://github.com/wolfthemes/wolf-videos/archive/master.zip',
		),

		array(
			'name'    =>esc_html__( 'Portfolio', 'snakepit' ),
			'slug'   => 'wolf-portfolio',
			'source'   => 'https://github.com/wolfthemes/wolf-portfolio/archive/master.zip',
			'external_url' => 'https://github.com/wolfthemes/wolf-portfolio/archive/master.zip',
		),

		array(
			'name'    => esc_html__( 'Share Icons', 'snakepit' ),
			'slug'   => 'wolf-share',
			'source'   => 'https://github.com/wolfthemes/wolf-share/archive/master.zip',
			'external_url' => 'https://github.com/wolfthemes/wolf-share/archive/master.zip',
		),

		array(
			'name'    => esc_html__( 'Metaboxes', 'snakepit' ),
			'slug'   => 'wolf-metaboxes',
			'source'   => 'https://github.com/wolfthemes/wolf-metaboxes/archive/master.zip',
			'external_url' => 'https://github.com/wolfthemes/wolf-metaboxes/archive/master.zip',
		),

		array(
			'name'    => esc_html__( 'Twitter Feed', 'snakepit' ),
			'slug'   => 'wolf-twitter',
			'source'   => 'https://github.com/wolfthemes/wolf-twitter/archive/master.zip',
			'external_url' => 'https://github.com/wolfthemes/wolf-twitter/archive/master.zip',
		),

		array(
			'name' 	=> esc_html__( 'Instagram Feed (Smash Balloon)', 'snakepit' ),
			'slug' => 'instagram-feed',
		),

		array(
			'name'    => esc_html__( 'Video Thumbnail Generator', 'snakepit' ),
			'slug'   => 'wolf-video-thumbnail-generator',
			'source'   => 'https://github.com/wolfthemes/wolf-video-thumbnail-generator/archive/master.zip',
			'external_url' => 'https://github.com/wolfthemes/wolf-video-thumbnail-generator/archive/master.zip',
		),

		array(
			'name' 		=> esc_html__( 'WooCommerce', 'snakepit' ),
			'slug' 		=> 'woocommerce',
		),

		array(
			'name' 	=> esc_html__( 'WooCommerce Variation Swatches', 'snakepit' ),
			'slug' => 'variation-swatches-for-woocommerce',
		),

		array(
			'name'    => esc_html__( 'WooCommerce Wishlist', 'snakepit' ),
			'slug'   => 'wolf-woocommerce-wishlist',
			'source'   => 'https://github.com/wolfthemes/wolf-woocommerce-wishlist/archive/master.zip',
			'external_url' => 'https://github.com/wolfthemes/wolf-woocommerce-wishlist/archive/master.zip',
		),

		array(
			'name'    => esc_html__( 'WooCommerce Quickview', 'snakepit' ),
			'slug'   => 'wolf-woocommerce-quickview',
			'source'   => 'https://github.com/wolfthemes/wolf-woocommerce-quickview/archive/master.zip',
			'external_url' => 'https://github.com/wolfthemes/wolf-woocommerce-quickview/archive/master.zip',
		),

		array(
			'name' 		=> esc_html__( 'Contact Form 7', 'snakepit' ),
			'slug' 		=> 'contact-form-7',
		),

		// array(
		// 	'name' 		=> esc_html__( 'Widgets in Menu for WordPress', 'snakepit' ),
		// 	'slug' 		=> 'widgets-in-menu',
		// ),

		array(
			'name' => esc_html__( 'Envato Market Items Updater', 'snakepit' ),
			'slug' => 'envato-market',
			'source' => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'external_url' => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
		),

		array(
			'name' => esc_html__( 'One Click Demo Import', 'snakepit' ),
			'slug' => 'one-click-demo-import',
		),
	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'snakepit';

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id' => 'tgmpa',
		'default_path' => get_template_directory() . '/config/plugins/',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'wolf_theme_register_required_plugins' );
