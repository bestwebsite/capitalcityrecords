<?php
/**
 * Snakepit frontend theme specific functions
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/*
--------------------------------------------------------------------

	FONTS

----------------------------------------------------------------------
*/

/**
 * Add custom font
 *
 * @param array $google_fonts The Google fonts options array
 * @return void
 */
function snakepit_add_google_font( $google_fonts ) {

	$default_fonts = array(
		'Ubuntu Condensed'  => 'Ubuntu+Condensed',
		'Staatliches'       => 'Staatliches',
		'Open Sans'         => 'Open+Sans:400,700',
		'Special Elite'     => 'Special+Elite',
		'Playfair Display'  => 'Playfair+Display:400,700',
		'Libre Baskerville' => 'Libre+Baskerville:400,700',
	);

	foreach ( $default_fonts as $key => $value ) {
		if ( ! isset( $google_fonts[ $key ] ) ) {
			$google_fonts[ $key ] = $value;
		}
	}

	return $google_fonts;
}
add_filter( 'snakepit_google_fonts', 'snakepit_add_google_font' );

/**
 * Added selector to menu_selectors
 *
 * @param  array $selectors navigation items CSS selectors.
 * @return array $selectors
 */
function snakepit_add_menu_selectors( $selectors ) {

	$selectors[] = '.category-filter ul li a';
	$selectors[] = '.cart-panel-buttons a';

	return $selectors;
}
add_filter( 'snakepit_menu_selectors', 'snakepit_add_menu_selectors' );
/**
 * Added selector to heading_family_selectors
 *
 * @param  array $selectors headings related CSS selectors.
 * @return array $selectors
 */
function snakepit_add_heading_family_selectors( $selectors ) {

	$selectors[] = '.wvc-tabs-menu li a';
	$selectors[] = '.woocommerce-tabs ul.tabs li a';
	$selectors[] = '.wvc-process-number';
	$selectors[] = '.wvc-button';
	$selectors[] = '.wvc-svc-item-title';
	$selectors[] = '.button';
	$selectors[] = '.onsale, .category-label';
	// $selectors[] = '.entry-post-grid_classic .sticky-post';
	$selectors[] = 'input[type=submit], .wvc-mailchimp-submit';
	$selectors[] = '.nav-next,.nav-previous';
	$selectors[] = '.wvc-embed-video-play-button';
	// $selectors[] = '.category-filter ul li';
	$selectors[] = '.wvc-ati-title';
	$selectors[] = '.wvc-team-member-role';
	$selectors[] = '.wvc-svc-item-tagline';
	$selectors[] = '.entry-metro insta-username';
	$selectors[] = '.wvc-testimonial-cite';
	$selectors[] = '.snakepit-button-';
	$selectors[] = '.snakepit-button-simple';
	$selectors[] = '.wvc-wc-cat-title';
	$selectors[] = '.wvc-pricing-table-button a';
	// $selectors[] = '.load-more-button-line';
	$selectors[] = '.view-post';
	$selectors[] = '.wolf-gram-follow-button';
	$selectors[] = '#snakepit-percent';
	$selectors[] = '.wvc-workout-program-title';
	$selectors[] = '.wvc-meal-title';
	$selectors[] = '.wvc-recipe-title';
	$selectors[] = '.wvc-pie-counter';
	$selectors[] = '.we-date-format-custom';
	$selectors[] = '.comment-reply-link';
	$selectors[] = '.logo-text, .date-block';

	return $selectors;
}
add_filter( 'snakepit_heading_family_selectors', 'snakepit_add_heading_family_selectors' );

/**
 * Added selector to heading_family_selectors
 *
 * @param  array $selectors headings related CSS selectors.
 * @return array $selectors
 */
function snakepit_add_snakepit_heading_selectors( $selectors ) {

	$selectors[] = '.wvc-tabs-menu li a';
	$selectors[] = '.woocommerce-tabs ul.tabs li a';
	$selectors[] = '.wvc-process-number';
	$selectors[] = '.wvc-svc-item-title';
	$selectors[] = '.wvc-wc-cat-title';
	$selectors[] = '.logo-text';

	return $selectors;
}
add_filter( 'snakepit_heading_selectors', 'snakepit_add_snakepit_heading_selectors' );

/*
--------------------------------------------------------------------

	POST TYPES DISPLAY

----------------------------------------------------------------------
*/

/**
 * Get available display options for posts
 *
 * @return array
 */
function snakepit_set_post_display_options() {

	return array(
		'grid'     => esc_html__( 'Grid', 'snakepit' ),
		'masonry'  => esc_html__( 'Masonry', 'snakepit' ),
		'list'     => esc_html__( 'List', 'snakepit' ),
		'standard' => esc_html__( 'Standard', 'snakepit' ),
	);
}
add_filter( 'snakepit_post_display_options', 'snakepit_set_post_display_options' );

/**
 * Get available display options for works
 *
 * @return array
 */
function snakepit_set_work_display_options() {

	return array(
		'grid'    => esc_html__( 'Grid', 'snakepit' ),
		'metro'   => esc_html__( 'Metro', 'snakepit' ),
		'masonry' => esc_html__( 'Masonry', 'snakepit' ),
	);
}
add_filter( 'snakepit_work_display_options', 'snakepit_set_work_display_options' );

/**
 * Get available display options for products
 *
 * @return array
 */
function snakepit_set_product_display_options() {

	return array(
		'grid'  => esc_html__( 'Grid', 'snakepit' ),
		'metro' => esc_html__( 'Metro', 'snakepit' ),
	);
}
add_filter( 'snakepit_product_display_options', 'snakepit_set_product_display_options' );

/**
 * Set shop display
 *
 * @param string $string The product displauy option.
 * @return string
 */
function snakepit_set_product_display( $string ) {

	return 'grid';
}
add_filter( 'snakepit_mod_product_display', 'snakepit_set_product_display', 40 );

/**
 * Get available display options for releases
 *
 * @return array
 */
function snakepit_set_release_display_options() {

	return array(
		'grid'    => esc_html__( 'Grid', 'snakepit' ),
		'metro'   => esc_html__( 'Metro', 'snakepit' ),
		'lateral' => esc_html__( 'Lateral', 'snakepit' ),
	);
}
add_filter( 'snakepit_release_display_options', 'snakepit_set_release_display_options' );

/**
 * Get available display options for events
 *
 * @return array
 */
function snakepit_set_event_display_options() {

	return array(
		'list' => esc_html__( 'List', 'snakepit' ),
	);
}
add_filter( 'snakepit_event_display_options', 'snakepit_set_event_display_options' );

/**
 * Overwrite more video text
 */
add_filter(
	'snakepit_view_more_videos_text',
	function() {
		return esc_html__( 'Watch more videos', 'snakepit' );
	}
);


/*
--------------------------------------------------------------------

	THEME HOOKS

----------------------------------------------------------------------
*/

/**
 * Login popup markup
 */
function snakepit_login_form_markup() {
	if ( function_exists( 'wvc_login_form' ) && class_exists( 'WooCommerce' ) ) {
		?>
		<div id="loginform-overlay">
			<div id="loginform-overlay-inner">
				<div id="loginform-overlay-content" class="wvc-font-light">
					<a href="#" id="close-vertical-bar-menu-icon" class="close-panel-button close-loginform-button">X</a>
					<?php
						// phpcs:ignore
						// echo wvc_login_form();
					?>
				</div>
			</div>
		</div>
		<?php
	}
}
add_action( 'snakepit_body_start', 'snakepit_login_form_markup', 5 );

/**
 * Output video single post meta
 */
function snakepit_ouput_video_meta() {
	$post_id  = get_the_ID();
	$category = get_the_terms( $post_id, 'video_type', '', esc_html__( ', ', 'snakepit' ), '' );
	$tags     = get_the_terms( $post_id, 'video_tag', '', esc_html__( ', ', 'snakepit' ), '' );

	$post_display_elements = snakepit_get_theme_mod( 'video_display_elements' );
	$post_display_elements = snakepit_list_to_array( $post_display_elements );
	$show_thumbnail        = ( in_array( 'show_thumbnail', $post_display_elements ) );
	$show_date             = ( in_array( 'show_date', $post_display_elements ) );
	$show_author           = ( in_array( 'show_author', $post_display_elements ) );
	$show_category         = ( in_array( 'show_category', $post_display_elements ) );
	$show_tags             = ( in_array( 'show_tags', $post_display_elements ) );
	?>
	<div class="video-entry-meta entry-meta">
		<?php if ( $show_date ) : ?>
			<span class="entry-date">
				<?php snakepit_entry_date( true, true ); ?>
			</span>
		<?php endif; ?>
		<?php if ( $show_author ) : ?>
			<?php snakepit_get_author_avatar(); ?>
		<?php endif; ?>
		<?php if ( $show_category && $category ) : ?>
			<span class="entry-category-list">
				<?php echo apply_filters( 'snakepit_entry_category_list_icon', '<span class="meta-icon category-icon"></span>' ); ?>
				<?php echo get_the_term_list( get_the_ID(), 'video_type', '', esc_html__( ', ', 'snakepit' ), '' ); ?>
			</span>
		<?php endif; ?>
		<?php if ( $show_tags && $tags ) : ?>
			<span class="entry-category-list">
				<?php echo apply_filters( 'snakepit_entry_tag_list_icon', '<span class="meta-icon tag-icon"></span>' ); ?>
				<?php echo get_the_term_list( get_the_ID(), 'video_tag', '', esc_html__( ', ', 'snakepit' ), '' ); ?>
			</span>
		<?php endif; ?>
		<?php snakepit_get_extra_meta(); ?>
	</div><!-- .video-meta -->
	<?php

}
add_action( 'snakepit_video_meta', 'snakepit_ouput_video_meta' );


if ( ! function_exists( 'snakepit_release_meta' ) ) {
	/**
	 * Display release meta
	 */
	function snakepit_release_meta() {

		if ( ! class_exists( 'Wolf_Discography' ) ) {
			return;
		}

		$meta            = wd_get_meta();
		$release_title   = $meta['title'];
		$release_date    = $meta['date'];
		$release_catalog = $meta['catalog'];
		$release_format  = $meta['format'];
		$artists         = get_the_terms( get_the_ID(), 'band' );
		$artist_tax      = get_taxonomy( 'band' );
		$genre           = get_the_terms( get_the_ID(), 'release_genre' );
		$genre_tax       = get_taxonomy( 'release_genre' );
		$rewrite         = '';
		$artist_tax_slug = '';
		$genre_tax_slug  = '';

		if ( taxonomy_exists( 'band' ) && isset( $artist_tax->rewrite['slug'] ) ) {

			$artist_tax_slug = $artist_tax->rewrite['slug'];
		}

		if ( taxonomy_exists( 'release_genre' ) && isset( $genre_tax->rewrite['slug'] ) ) {

			$genre_tax_slug = $genre_tax->rewrite['slug'];
		}

		// Date.
		if ( $release_date ) :
			?>
		<strong><?php esc_html_e( 'Release Date', 'snakepit' ); ?></strong> : <?php echo sanitize_text_field( $release_date ); ?><br>
		<?php endif; ?>

		<?php
		if ( $artists ) {
			$artist_label = ( 1 < count( $artists ) ) ? esc_html__( 'Artists', 'snakepit' ) : esc_html__( 'Artist', 'snakepit' );
			?>
				<strong><?php echo sanitize_text_field( $artist_label ); ?></strong> :
				<?php
				$artists_html = '';
				foreach ( $artists as $artist ) {
					$artist_slug   = $artist->slug;
					$artist_name   = $artist->name;
					$artists_html .= '<a href="' . esc_url( home_url( '/' . $artist_tax_slug . '/' . $artist_slug ) ) . '">' . sanitize_text_field( $artist_name ) . '</a>, ';
				}

				echo rtrim( $artists_html, ', ' );
				echo '<br>';
		}
		?>
		<?php

		if ( $genre ) {
			$genre_label = ( 1 < count( $genre ) ) ? esc_html__( 'Genres', 'snakepit' ) : esc_html__( 'Genre', 'snakepit' );
			?>
				<strong><?php echo sanitize_text_field( $genre_label ); ?></strong> :
				<?php
				$genre_html = '';
				foreach ( $genre as $g ) {
					// debug( $g );
					$genre_slug  = $g->slug;
					$genre_name  = $g->name;
					$genre_html .= '<a href="' . esc_url( home_url( '/' . $genre_tax_slug . '/' . $genre_slug ) ) . '">' . sanitize_text_field( $genre_name ) . '</a>, ';
				}

				echo rtrim( $genre_html, ', ' );
				echo '<br>';
		}
		?>
		<?php
		// Catalog number
		if ( $release_catalog ) :
			?>
		<strong><?php esc_html_e( 'Catalog ref.', 'snakepit' ); ?></strong> : <?php echo sanitize_text_field( $release_catalog ); ?><br>
		<?php endif; ?>

		<?php
		// Type
		if ( $release_format && wolf_get_release_option( 'display_format' ) ) :
			?>
		<strong><?php esc_html_e( 'Format', 'snakepit' ); ?></strong> : <?php echo sanitize_text_field( $release_format ); ?><br>
		<?php endif; ?>
		<?php
		edit_post_link( esc_html__( 'Edit', 'snakepit' ), '<span class="edit-link">', '</span>' );
	}
}

/*
--------------------------------------------------------------------

	NAVIGATION

----------------------------------------------------------------------
*/

/**
 * Set sticky menu scrollpoint
 *
 * @param int|string $int
 * @return int
 */
function snakepit_set_sticky_menu_scrollpoint( $int ) {

	$int = 200;

	// $menu_offset_type = get_post_meta( snakepit_get_the_id(), '_post_menu_offset_type', true );

	// if ( 'bottom' === $menu_offset_type ) {
	// $int = '100%';
	// }

	return $int;
}
add_filter( 'snakepit_sticky_menu_scrollpoint', 'snakepit_set_sticky_menu_scrollpoint' );

/**
 *  Set menu offset
 *
 * @param string $offset
 * @return string $offset
 */
function snakepit_set_menu_offset( $offset ) {

	$menu_offset_type = get_post_meta( snakepit_get_the_id(), '_post_menu_offset_type', true );

	if ( 'bottom' === $menu_offset_type ) {
		$offset = '100%';
	}

	return $offset;
}
add_filter( 'snakepit_mod_menu_offset', 'snakepit_set_menu_offset', 40 );

/**
 * Add vertical menu location
 */
function snakepit_add_lateral_menu( $menus ) {

	$menus['vertical'] = esc_html__( 'Vertical Menu (optional)', 'snakepit' );

	return $menus;

}
add_filter( 'snakepit_menus', 'snakepit_add_lateral_menu' );

/**
 * Set mobile menu template
 *
 * @param string $string Mobile menu template slug.
 * @return string
 */
function snakepit_set_mobile_menu_template( $string ) {

	return 'content-mobile-alt';
}
add_filter( 'snakepit_mobile_menu_template', 'snakepit_set_mobile_menu_template' );

/**
 * Add mobile closer overlay
 */
function snakepit_add_mobile_panel_closer_overlay() {
	?>
	<div id="mobile-panel-closer-overlay" class="panel-closer-overlay toggle-mobile-menu"></div>
	<?php
}
add_action( 'snakepit_main_content_start', 'snakepit_add_mobile_panel_closer_overlay' );

/**
 * Mobile menu
 */
function snakepit_mobile_alt_menu() {
	?>
	<div id="mobile-menu-panel">
		<a href="#" id="close-mobile-menu-icon" class="close-panel-button toggle-mobile-menu">X</a>
		<div id="mobile-menu-panel-inner">
		<?php
			/**
			 * Menu
			 */
			snakepit_primary_mobile_navigation();
		?>
		</div><!-- .mobile-menu-panel-inner -->
	</div><!-- #mobile-menu-panel -->
	<?php
}
add_action( 'snakepit_body_start', 'snakepit_mobile_alt_menu' );

/**
 * Secondary navigation hook
 *
 * Display cart icons, social icons or secondary menu depending on cuzstimizer option
 */
function snakepit_output_mobile_complementary_menu( $context = 'desktop' ) {
	if ( 'mobile' === $context ) {
		$cta_content = snakepit_get_inherit_mod( 'menu_cta_content_type', 'none' );

		/**
		 * Force shop icons on woocommerce pages
		 */
		$is_wc_page_child = is_page() && wp_get_post_parent_id( get_the_ID() ) == snakepit_get_woocommerce_shop_page_id() && snakepit_get_woocommerce_shop_page_id(); // phpcs:ignore
		$is_wc            = snakepit_is_woocommerce_page() || is_singular( 'product' ) || $is_wc_page_child;

		if ( apply_filters( 'snakepit_force_display_nav_shop_icons', $is_wc ) ) { // can be disable just in case.
			$cta_content = 'shop_icons';
		}

		if ( 'shop_icons' === $cta_content ) {
			if ( snakepit_display_account_menu_item() ) :
				?>
				<div class="account-container cta-item">
					<?php
						/**
						 * account icon
						 */
						snakepit_account_menu_item();
					?>
				</div><!-- .cart-container -->
				<?php
			endif;

			if ( snakepit_display_cart_menu_item() ) {
				?>
				<div class="cart-container cta-item">
					<?php
						/**
						 * Cart icon
						 */
						snakepit_cart_menu_item();
					?>
				</div><!-- .cart-container -->
				<?php
			}
		}
	}
}
add_action( 'snakepit_secondary_menu', 'snakepit_output_mobile_complementary_menu', 10, 1 );


/*
--------------------------------------------------------------------

	THEME FILTERS

----------------------------------------------------------------------
*/

/**
 * Add additional JS scripts and functions
 */
function snakepit_enqueue_additional_scripts() {

	$version = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? time() : snakepit_get_theme_version();

	if ( ! snakepit_is_wvc_activated() ) {

		wp_register_style( 'ionicons', get_template_directory_uri() . '/assets/css/lib/fonts/ionicons/ionicons.min.css', array(), snakepit_get_theme_version() );
		wp_register_style( 'dripicons', get_template_directory_uri() . '/assets/css/lib/fonts/dripicons-v2/dripicons.min.css', array(), snakepit_get_theme_version() );
	}

	if ( is_singular( 'event' ) && snakepit_is_wvc_activated() ) {
		wp_enqueue_style( 'wolficons' );
	}

	wp_enqueue_style( 'ionicons' );
	wp_enqueue_style( 'dripicons' );

	wp_enqueue_script( 'mousewheel' );

	wp_enqueue_script( 'jquery-effects-core' );
	wp_enqueue_script( 'parallax-scroll' );
	wp_enqueue_script( 'snakepit-custom', get_template_directory_uri() . '/assets/js/t/snakepit.js', array( 'jquery' ), $version, true );
}
add_action( 'wp_enqueue_scripts', 'snakepit_enqueue_additional_scripts', 40 );

/**
 * Add mobile alt body class
 *
 * @param array
 * @return array
 */
function snakepit_additional_body_classes( $classes ) {

	// $classes[] = 'mobile-menu-alt';

	$sticky_details_meta   = snakepit_get_inherit_mod( 'product_sticky' ) && 'no' !== snakepit_get_inherit_mod( 'product_sticky' );
	$single_product_layout = snakepit_get_inherit_mod( 'product_single_layout' );

	if ( is_singular( 'product' ) && $sticky_details_meta && 'sidebar-right' !== $single_product_layout && 'sidebar-left' !== $single_product_layout ) {
		$classes[] = 'sticky-product-details';
	}

	if ( snakepit_get_theme_mod( 'custom_cursor' ) ) {
		$classes[] = 'custom-cursor-enabled';
	}

	$menu_offset_type = get_post_meta( snakepit_get_the_id(), '_post_menu_offset_type', true );
	$menu_offset      = snakepit_get_inherit_mod( 'menu_offset' );

	if ( ( 'default' === $menu_offset_type || ! $menu_offset_type ) && $menu_offset ) {

		$classes[] = 'menu-offset';
		$classes[] = 'menu-offset-default';

	} elseif ( $menu_offset_type && 'none' !== $menu_offset_type ) {
		$classes[] = 'menu-offset';
		$classes[] = 'menu-offset-' . $menu_offset_type;
	} else {
		$classes[] = 'menu-offset-' . $menu_offset_type;
	}

	if ( get_post_meta( snakepit_get_the_id(), '_hero_mousewheel', true ) ) {
		$classes[] = 'hero-mousewheel';
	}

	return $classes;

}
add_filter( 'body_class', 'snakepit_additional_body_classes' );

/**
 * Disable single post pagination
 *
 * @param bool $bool
 * @return bool
 */
add_filter( 'snakepit_allow_side_panel', '__return_false' );

/**
 * Disable side panel sidebar
 *
 * @param bool $bool
 * @return bool
 */
add_filter( 'snakepit_disable_single_post_pagination', '__return_true' );

/**
 * Excerpt more
 *
 * Add span to allow more CSS tricks
 *
 * @return string
 */
function snakepit_custom_more_text( $string ) {

	$text = '<span>' . esc_html__( 'Continue reading', 'snakepit' ) . '</span>';

	return $text;
}
add_filter( 'snakepit_more_text', 'snakepit_custom_more_text', 40 );

/**
 * Set related posts text
 *
 * @param string $string
 * @return string
 */
function snakepit_set_related_posts_text( $text ) {

	return esc_html__( 'More Posts', 'snakepit' );
}
add_filter( 'snakepit_related_posts_text', 'snakepit_set_related_posts_text' );

/**
 *  Set cat list icon
 *
 * @param string $icon
 * @return string $icon
 */
function snakepit_set_entry_cat_list_icon( $icon ) {

	return '<span class="post-meta-prefix">' . esc_html__( 'In', 'snakepit' ) . '</span>';
}
add_filter( 'snakepit_entry_category_list_icon', 'snakepit_set_entry_cat_list_icon', 40 );

/**
 *  Set tag list icon
 *
 * @param string $icon
 * @return string $icon
 */
function snakepit_set_entry_tag_list_icon( $icon ) {

	return '<span class="post-meta-prefix">#</span>';
}
add_filter( 'snakepit_entry_tag_list_icon', 'snakepit_set_entry_tag_list_icon', 40 );

/**
 *  Set entry author prefix
 *
 * @param string $icon
 * @return string $icon
 */
function snakepit_set_author_name_meta( $author_name ) {

	return sprintf( esc_html__( 'By %s', 'snakepit' ), '<span class="author-name">' . $author_name . '</span>' );
}
add_filter( 'snakepit_author_name_meta', 'snakepit_set_author_name_meta', 40 );

/**
 * Filter heading attribute
 *
 * @param array $atts
 * @return array $atts
 */
function woltheme_filter_heading_atts( $atts ) {

	// heading
	if ( isset( $atts['style'] ) ) {
		$atts['el_class'] = $atts['el_class'] . ' ' . $atts['style'];
	}

	return $atts;
}
add_filter( 'wvc_heading_atts', 'woltheme_filter_heading_atts' );

/**
 * Overwrite standard post entry slider image size
 */
function snakepit_overwrite_img_sizes( $size ) {

	add_image_size( 'snakepit-slide', 847, 508, true );

}
add_action( 'after_setup_theme', 'snakepit_overwrite_img_sizes', 50 );

add_filter(
	'snakepit_release_img_size',
	function( $size ) {
		return '600x600';
	}
);

/**
 * Returns large
 */
function snakepit_set_large_metro_thumbnail_size() {
	return 'large';
}

/**
 * Filter metro thumnail size depending on row context
 */
function snakepit_optimize_metro_thumbnail_size( $atts ) {

	$column_type   = isset( $atts['column_type'] ) ? $atts['column_type'] : null;
	$content_width = isset( $atts['content_width'] ) ? $atts['content_width'] : null;

	if ( 'column' === $column_type ) {
		if ( 'full' === $content_width || 'large' === $content_width ) {
			add_filter( 'snakepit_metro_thumbnail_size_name', 'snakepit_set_large_metro_thumbnail_size' );
		}
	}
}
add_action( 'wvc_add_row_filters', 'snakepit_optimize_metro_thumbnail_size', 10, 1 );

/* Remove metro thumbnail size filter */
add_action(
	'wvc_remove_row_filters',
	function() {
		remove_filter( 'snakepit_metro_thumbnail_size_name', 'snakepit_set_large_metro_thumbnail_size' );
	}
);

/**
 * Albums masonry thumbnail size
 */
function snakepit_set_album_masonry_thumbnail_size( $size ) {

	return 'snakepit-masonry-small';

}
add_filter( 'snakepit_album_masonry_thumbnail_size', 'snakepit_set_album_masonry_thumbnail_size' );

/**
 * Disable WC live search
 */
add_filter(
	'snakepit_live_search',
	function() {
		return false;
	}
);

/**
 * Set desktop menu height
 *
 * @param int $int
 * @return int
 */
function snakepit_set_desktop_menu_height( $int ) {

	return 88;
}
add_filter( 'snakepit_desktop_menu_height', 'snakepit_set_desktop_menu_height' );

/**
 * Meun style
 */
// add_filter( 'snakepit_menu_style', function( $menu_style ) {
// return snakepit_get_inherit_mod( 'menu_style' );
// } );

/**
 * Filter post modules
 *
 * @param array $atts
 * @return array $atts
 */
function snakepit_filter_post_module_atts( $atts ) {

	$post_type           = $atts['post_type'];
	$affected_post_types = array( 'release', 'work' );

	if ( in_array( $post_type, $affected_post_types ) ) {
		if ( isset( $atts[ $post_type . '_display' ] ) && 'offgrid' === $atts[ $post_type . '_display' ] ) {
			$atts['item_animation']         = '';
			$atts[ $post_type . '_layout' ] = 'standard';
		}
	}

	if ( isset( $atts[ $post_type . '_hover_effect' ] ) ) {

		if ( 'simple' === $atts[ $post_type . '_hover_effect' ] ) {
			// $atts[ $post_type . '_layout' ] = 'overlay';
		}

		if ( 'zoom' === $atts[ $post_type . '_hover_effect' ] ) {
			$atts[ $post_type . '_layout' ] = 'overlay';
			// $atts[ 'overlay_color' ] = '';
			// $atts[ $post_type . '_display' ] = 'grid';
		}

		if ( 'slide' === $atts[ $post_type . '_hover_effect' ] ) {
			$atts[ $post_type . '_layout' ] = 'overlay';
		}

		if ( 'grunge' === $atts[ $post_type . '_hover_effect' ] ) {
			$atts[ $post_type . '_layout' ] = 'overlay';
		}

		if ( 'cursor' === $atts[ $post_type . '_hover_effect' ] ) {
			$atts['overlay_text_color'] = 'black';
		}
	}

	return $atts;
}
add_filter( 'snakepit_post_module_atts', 'snakepit_filter_post_module_atts' );

/**
 * No header post types
 *
 * @param  array $post_types Post types where the default hero block is disabled.
 * @return array
 */
function snakepit_filter_no_hero_post_types( $post_types ) {

	$post_types = array( 'product', 'attachment' );

	return array();
}
add_filter( 'snakepit_no_header_post_types', 'snakepit_filter_no_hero_post_types', 40 );

function snakepit_show_shop_header_content_block_single_product( $bool ) {

	if ( is_singular( 'product' ) ) {
		$bool = true;
	}

	return $bool;
}
add_filter( 'snakepit_force_display_shop_after_header_block', 'snakepit_show_shop_header_content_block_single_product' );

/**
 * Read more text
 */
function snakepit_view_post_text( $string ) {
	return esc_html__( 'Read more', 'snakepit' );
}
add_filter( 'snakepit_view_post_text', 'snakepit_view_post_text' );

/**
 * Filter empty p tags in excerpt
 */
function snakepit_filter_excerpt_empty_p_tags( $excerpt ) {

	return str_replace( '<p></p>', '', $excerpt );

}
add_filter( 'get_the_excerpt', 'snakepit_filter_excerpt_empty_p_tags', 100 );

/**
 *  Set entry slider animation
 *
 * @param string $animation
 * @return string $animation
 */
function snakepit_set_entry_slider_animation( $animation ) {
	return 'slide';
}
add_filter( 'snakepit_entry_slider_animation', 'snakepit_set_entry_slider_animation', 40 );

/**
 * Search form placeholder
 */
function snakepit_set_searchform_placeholder( $string ) {
	return esc_attr_x( 'Search&hellip;', 'placeholder', 'snakepit' );
}
add_filter( 'snakepit_searchform_placeholder', 'snakepit_set_searchform_placeholder', 40 );

/**
 * View more events text
 */
function snakepit_view_more_events_text( $string ) {
	return esc_html__( 'View more dates', 'snakepit' );
}
add_filter( 'snakepit_view_more_events_text', 'snakepit_view_more_events_text' );

/**
 * Search form placeholder text
 */
function snakepit_searchform_placeholder_text( $string ) {
	return esc_html__( 'Type your search and hit enter&hellip;', 'snakepit' );
}
add_filter( 'snakepit_searchform_placeholder', 'snakepit_searchform_placeholder_text' );

/**
 * Add form in no result page
 */
function snakepit_add_no_result_form() {
	get_search_form();
}
add_action( 'snakepit_no_result_end', 'snakepit_add_no_result_form' );

/**
 * Set release taxonomy before string
 *
 * @param  string $string String to append before release taxonomy.
 * @return string
 */
function snakepit_set_release_tax_before( $string ) {

	return esc_html__( 'by', 'snakepit' ) . ' ';

}
add_filter( 'snakepit_release_tax_before', 'snakepit_set_release_tax_before' );

/**
 *  Set smooth scroll speed
 *
 * @param string $speed
 * @return string $speed
 */
function snakepit_set_smooth_scroll_speed( $speed ) {
	return 1500;
}
add_filter( 'snakepit_smooth_scroll_speed', 'snakepit_set_smooth_scroll_speed' );
add_filter( 'wvc_smooth_scroll_speed', 'snakepit_set_smooth_scroll_speed' );

/**
 *  Set smooth scroll easing effect
 *
 * @param string $ease
 * @return string $ease
 */
function snakepit_set_smooth_scroll_ease( $ease ) {
	return 'easeInOutQuint';
}
add_filter( 'snakepit_smooth_scroll_ease', 'snakepit_set_smooth_scroll_ease' );
add_filter( 'wvc_smooth_scroll_ease', 'snakepit_set_smooth_scroll_ease' );
add_filter( 'wvc_fp_easing', 'snakepit_set_smooth_scroll_ease' );

/**
 *  Set smooth scroll speed
 *
 * @param string $speed
 * @return string $speed
 */
function snakepit_set_fp_anim_time( $speed ) {

	$speed = 1500;

	if ( is_page() || is_single() ) {
		if ( get_post_meta( snakepit_get_the_id(), '_post_fullpage_animtime', true ) ) {
			$speed = absint( get_post_meta( snakepit_get_the_id(), '_post_fullpage_animtime', true ) );
		}
	}

	return $speed;
}
add_filter( 'wvc_fp_animtime', 'snakepit_set_fp_anim_time', 40 );

/**
 * Add cusotm fields in work meta
 */
add_action(
	'snakepit_work_meta',
	function() {
		snakepit_the_work_meta();
	},
	15
);

add_filter(
	'snakepit_work_meta_separator',
	function() {
		return ' : ';
	}
);

/**
 * Filter lightbox settings
 */
function snakepit_filter_lightbox_settings( $settings ) {

	$settings['transitionEffect'] = 'fade';
	$settings['buttons']          = array(
		'zoom',
		// 'share',
		'close',
	);

	return $settings;
}
add_filter( 'snakepit_fancybox_settings', 'snakepit_filter_lightbox_settings' );

/**
 * ADD META FIELD TO SEARCH QUERY
 *
 * @param string $field
 */
function snakepit_add_meta_field_to_search_query( $field ) {

	if ( isset( $GLOBALS['added_meta_field_to_search_query'] ) ) {
		$GLOBALS['added_meta_field_to_search_query'][] = '\'' . $field . '\'';
		return;
	}

	$GLOBALS['added_meta_field_to_search_query']   = array();
	$GLOBALS['added_meta_field_to_search_query'][] = '\'' . $field . '\'';

	add_filter(
		'posts_join',
		function( $join ) {
			global $wpdb;

			if ( is_search() ) {
				$join .= " LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id ";
			}

			return $join;
		}
	);

	add_filter(
		'posts_groupby',
		function( $groupby ) {
			global $wpdb;

			if ( is_search() ) {
				$groupby = "$wpdb->posts.ID";
			}

			return $groupby;
		}
	);

	add_filter(
		'posts_search',
		function( $search_sql ) {
			global $wpdb;

			$search_terms = get_query_var( 'search_terms' );

			if ( ! empty( $search_terms ) ) {
				foreach ( $search_terms as $search_term ) {
					$old_or     = "OR ({$wpdb->posts}.post_content LIKE '{$wpdb->placeholder_escape()}{$search_term}{$wpdb->placeholder_escape()}')";
					$new_or     = $old_or . " OR ({$wpdb->postmeta}.meta_value LIKE '{$wpdb->placeholder_escape()}{$search_term}{$wpdb->placeholder_escape()}' AND {$wpdb->postmeta}.meta_key IN (" . implode( ', ', $GLOBALS['added_meta_field_to_search_query'] ) . '))';
					$search_sql = str_replace( $old_or, $new_or, $search_sql );
				}
			}

			$search_sql = str_replace( ' ORDER BY ', " GROUP BY $wpdb->posts.ID ORDER BY ", $search_sql );

			return $search_sql;
		}
	);
}
snakepit_add_meta_field_to_search_query( '_post_subheading' );

/**
 * Overwrite release button
 */
function snakepit_release_buttons( $html ) {

	$meta                = wd_get_meta();
	$release_itunes      = $meta['itunes'];
	$release_google_play = $meta['google_play'];
	$release_amazon      = $meta['amazon'];
	$release_spotify     = $meta['spotify'];
	$release_buy         = $meta['buy'];
	$release_free        = $meta['free'];

	$product_id = get_post_meta( get_the_ID(), '_post_wc_product_id', true );

	ob_start();
	?>
	<span class="wolf-release-buttons">
		<?php if ( $release_free ) : ?>
		<span class="wolf-release-button">
			<a class="wolf-release-free <?php echo apply_filters( 'snakepit_release_button_class', 'button' ); ?>" title="<?php esc_html_e( 'Download Now', 'snakepit' ); ?>" href="<?php echo esc_url( $release_free ); ?>"><?php esc_html_e( 'Free Download', 'snakepit' ); ?></a>
		</span>
		<?php endif; ?>
		<?php if ( $release_spotify ) : ?>
		<span class="wolf-release-button">
			<a target="_blank" title="<?php printf( esc_html__( 'Listen on %s', 'snakepit' ), 'Spotify' ); ?>" class="wolf-release-spotify <?php echo apply_filters( 'snakepit_release_button_class', 'button' ); ?>" href="<?php echo esc_url( $release_spotify ); ?>"><?php esc_html_e( 'Spotify', 'snakepit' ); ?></a>
		</span>
		<?php endif; ?>
		<?php if ( $release_itunes ) : ?>
		<span class="wolf-release-button">
			<a target="_blank" title="<?php printf( esc_html__( 'Buy on %s', 'snakepit' ), 'iTunes' ); ?>" class="wolf-release-itunes <?php echo apply_filters( 'snakepit_release_button_class', 'button' ); ?>" href="<?php echo esc_url( $release_itunes ); ?>"><?php esc_html_e( 'iTunes', 'snakepit' ); ?></a>
		</span>
		<?php endif; ?>
		<?php if ( $release_amazon ) : ?>
		<span class="wolf-release-button">
			<a target="_blank" title="<?php printf( esc_html__( 'Buy on %s', 'snakepit' ), 'amazon' ); ?>" class="wolf-release-amazon <?php echo apply_filters( 'snakepit_release_button_class', 'button' ); ?>" href="<?php echo esc_url( $release_amazon ); ?>"><?php esc_html_e( 'Amazon', 'snakepit' ); ?></a>
		</span>
		<?php endif; ?>
		<?php if ( $release_google_play ) : ?>
		<span class="wolf-release-button">
			<a target="_blank" title="<?php printf( esc_html__( 'Buy on %s', 'snakepit' ), 'YouTube Music' ); ?>" class="wolf-release-google_play <?php echo apply_filters( 'snakepit_release_button_class', 'button' ); ?>" href="<?php echo esc_url( $release_google_play ); ?>"><?php esc_html_e( 'YouTube Music', 'snakepit' ); ?></a>
		</span>
		<?php endif; ?>
		<?php if ( $release_buy ) : ?>
		<span class="wolf-release-button">
			<a target="_blank" title="<?php esc_html_e( 'Buy Now', 'snakepit' ); ?>" class="wolf-release-buy <?php echo apply_filters( 'snakepit_release_button_class', 'button' ); ?>" href="<?php echo esc_url( $release_buy ); ?>"><?php esc_html_e( 'Buy', 'snakepit' ); ?></a>
		</span>
		<?php endif; ?>
		<?php if ( $product_id && 0 != $product_id ) : ?>
			<span class="wolf-release-button">
				<?php echo snakepit_add_to_cart( $product_id, 'wolf-release-add-to-cart ' . apply_filters( 'snakepit_release_button_class', 'button' ), '<span class="wolf-release-add-to-cart-button-title" title="' . esc_html__( 'Add to cart', 'snakepit' ) . '"></span>' ); ?>
			</span>
		<?php endif; ?>
	</span><!-- .wolf-release-buttons -->
	<?php
	$html = ob_get_clean();

	return $html;
}
add_filter( 'wolf_discography_release_buttons', 'snakepit_release_buttons' );

/**
 * Returns CSS for the color schemes.
 *
 * @param array $colors Color scheme colors.
 * @return string Color scheme CSS.
 */
function snakepit_edit_color_scheme_css( $output, $colors ) {

	extract( $colors );

	$output = '';

	$border_color           = vsprintf( 'rgba( %s, 0.08)', snakepit_hex_to_rgb( $strong_text_color ) );
	$overlay_panel_bg_color = vsprintf( 'rgba( %s, 0.95)', snakepit_hex_to_rgb( $submenu_background_color ) );

	$link_selector       = '.link, p:not(.attachment) > a:not(.no-link-style):not(.button):not(.button-download):not(.added_to_cart):not(.button-secondary):not(.menu-link):not(.filter-link):not(.entry-link):not(.more-link):not(.wvc-image-inner):not(.wvc-button):not(.wvc-bigtext-link):not(.wvc-fittext-link):not(.ui-tabs-anchor):not(.wvc-icon-title-link):not(.wvc-icon-link):not(.wvc-social-icon-link):not(.wvc-team-member-social):not(.wolf-tweet-link):not(.author-link):not(.gallery-quickview)';
	$link_selector_after = '.link:after, p:not(.attachment) > a:not(.no-link-style):not(.button):not(.button-download):not(.added_to_cart):not(.button-secondary):not(.menu-link):not(.filter-link):not(.entry-link):not(.more-link):not(.wvc-image-inner):not(.wvc-button):not(.wvc-bigtext-link):not(.wvc-fittext-link):not(.ui-tabs-anchor):not(.wvc-icon-title-link):not(.wvc-icon-link):not(.wvc-social-icon-link):not(.wvc-team-member-social):not(.wolf-tweet-link):not(.author-link):not(.gallery-quickview):after';

	$output .= "/* Color Scheme */

	/* Body Background Color */
	body,
	.frame-border{
		background-color: $body_background_color;
	}

	/* Page Background Color */
	.site-header,
	.post-header-container,
	.content-inner,
	#logo-bar,
	.nav-bar,
	.loading-overlay,
	.no-hero #hero,
	.wvc-font-default,
	#topbar{
		background-color: $page_background_color;
	}

	.wvc-interactive-overlays-inner:before,
	.wvc-interactive-links-inner:before{
		//background:$page_background_color;
	}

	.spinner:before,
	.spinner:after{
		background-color: $page_background_color;
	}

	/* Submenu color */
	#site-navigation-primary-desktop .mega-menu-panel,
	#site-navigation-primary-desktop ul.sub-menu,
	#mobile-menu-panel,
	.offcanvas-menu-panel,
	.lateral-menu-panel,
	.cart-panel,
	.side-panel{
		background:$submenu_background_color;
	}

	.cart-panel{
		background:$submenu_background_color!important;
	}

	.menu-hover-style-border-top .nav-menu li:hover,
	.menu-hover-style-border-top .nav-menu li.current_page_item,
	.menu-hover-style-border-top .nav-menu li.current-menu-parent,
	.menu-hover-style-border-top .nav-menu li.current-menu-ancestor,
	.menu-hover-style-border-top .nav-menu li.current-menu-item,
	.menu-hover-style-border-top .nav-menu li.menu-link-active{
		box-shadow: inset 0px 5px 0px 0px $submenu_background_color;
	}

	.menu-hover-style-plain .nav-menu li:hover,
	.menu-hover-style-plain .nav-menu li.current_page_item,
	.menu-hover-style-plain .nav-menu li.current-menu-parent,
	.menu-hover-style-plain .nav-menu li.current-menu-ancestor,
	.menu-hover-style-plain .nav-menu li.current-menu-item,
	.menu-hover-style-plain .nav-menu li.menu-link-active{
		background:$submenu_background_color;
	}

	.panel-closer-overlay{
		background:$submenu_background_color;
	}

	.overlay-menu-panel{
		background:$overlay_panel_bg_color;
	}

	/* Sub menu Font Color */
	.nav-menu-desktop li ul li:not(.menu-button-primary):not(.menu-button-secondary) .menu-item-text-container,
	.nav-menu-desktop li ul.sub-menu li:not(.menu-button-primary):not(.menu-button-secondary).menu-item-has-children > a:before,
	.nav-menu-desktop li ul li.not-linked > a:first-child .menu-item-text-container,
	.mobile-menu-toggle .nav-bar .hamburger-icon .line{
		color: $submenu_font_color;
	}

	.nav-menu-vertical li a,
	.nav-menu-mobile li a,
	.nav-menu-vertical li.menu-item-has-children:before,
	.nav-menu-vertical li.page_item_has_children:before,
	.nav-menu-vertical li.active:before,
	.nav-menu-mobile li.menu-item-has-children:before,
	.nav-menu-mobile li.page_item_has_children:before,
	.nav-menu-mobile li.active:before{
		color: $submenu_font_color!important;
	}

	.nav-menu-desktop li ul.sub-menu li.menu-item-has-children > a:before{
		color: $submenu_font_color;
	}

	body.wolf.mobile-menu-toggle .hamburger-icon .line,
	body.wolf.overlay-menu-toggle.menu-style-transparent .hamburger-icon .line,
	body.wolf.overlay-menu-toggle.menu-style-semi-transparent-white .hamburger-icon .line,
	body.wolf.overlay-menu-toggle.menu-style-semi-transparent-black .hamburger-icon .line,
	body.wolf.offcanvas-menu-toggle.menu-style-transparent .hamburger-icon .line,
	body.wolf.offcanvas-menu-toggle.menu-style-semi-transparent-white .hamburger-icon .line,
	body.wolf.offcanvas-menu-toggle.menu-style-semi-transparent-black .hamburger-icon .line,
	body.wolf.side-panel-toggle.menu-style-transparent .hamburger-icon .line,
	body.wolf.side-panel-toggle.menu-style-semi-transparent-white .hamburger-icon .line,
	body.wolf.side-panel-toggle.menu-style-semi-transparent-black .hamburger-icon .line {
		background-color: $submenu_font_color !important;
	}

	.overlay-menu-toggle .nav-bar,
	.overlay-menu-toggle .nav-bar a,
	.overlay-menu-toggle .nav-bar strong {
		color: $submenu_font_color !important;
	}

	.overlay-menu-toggle.menu-style-transparent.hero-font-light a,
	.overlay-menu-toggle.menu-style-semi-transparent-black.hero-font-light a,
	.overlay-menu-toggle.menu-style-semi-transparent-white.hero-font-light a,
	.menu-layout-overlay.desktop .overlay-menu-panel a,
	.menu-layout-lateral.desktop .lateral-menu-panel a,
	.lateral-menu-panel-inner,
	.lateral-menu-panel-inner a{
		color: $submenu_font_color;
	}

	.mobile-menu-toggle.menu-style-transparent.hero-font-light .logo-svg *,
	.overlay-menu-toggle.menu-style-transparent.hero-font-light .logo-svg *,
	.overlay-menu-toggle.menu-style-semi-transparent-black.hero-font-light .logo-svg *,
	.overlay-menu-toggle.menu-style-semi-transparent-white.hero-font-light .logo-svg *,
	.menu-layout-overlay.desktop .overlay-menu-panel .logo-svg *,
	.menu-layout-lateral.desktop .lateral-menu-panel .logo-svg *,
	.lateral-menu-panel-inner .logo-svg *{
		fill:$submenu_font_color!important;
	}

	.cart-panel,
	.cart-panel a,
	.cart-panel strong,
	.cart-panel b{
		color: $submenu_font_color!important;
	}

	/* Accent Color */
	.accent{
		color:$accent_color;
	}

	#snakepit-loading-point{
		color:$accent_color;
	}

	.wvc-single-image-overlay-title span:after{
		color:$accent_color;
	}

	$link_selector{
		color:$accent_color;
	}

	.wolf-bigtweet-content a{
		color:$accent_color!important;
	}

	.nav-menu li.sale .menu-item-text-container:before,
	.nav-menu-mobile li.sale .menu-item-text-container:before{
		background:$accent_color!important;
	}

	/*.nav-menu-desktop li ul.sub-menu li:not(.menu-button-primary):not(.menu-button-secondary) a:hover .menu-item-inner .menu-item-text-container, .nav-menu-desktop li ul.sub-menu li:not(.menu-button-primary):not(.menu-button-secondary) a:focus .menu-item-inner .menu-item-text-container {
		color:$accent_color;
	}*/


	.entry-product .woocommerce-Price-amount{
		color:$accent_color;
	}

	.woocommerce-message .button{
		background-color:$accent_color;
		border-color:$accent_color;
	}

	.entry-post-list:hover .entry-title,
	.entry-post-standard:hover .entry-title a,
	.entry-post-grid_classic:hover .entry-title a,
	.entry-post-masonry:hover .entry-title a,
	.wolf-tweet-link:hover{
		color:$accent_color!important;
	}

	.work-meta-value a:hover{
		color:$accent_color;
	}

	//.entry-post-standard .entry-thumbnail,
	//.entry-post-standard_modern .entry-thumbnail,
	.proof-photo.selected .proof-photo__bg,
	.widget_price_filter .ui-slider .ui-slider-range,
	mark,
	p.demo_store,
	.woocommerce-store-notice{
		background-color:$accent_color;
	}

	.date-block{
		background:$accent_color;
	}

	.button-secondary{
		background-color:$accent_color;
		border-color:$accent_color;
	}

	.nav-menu li.menu-button-primary > a:first-child > .menu-item-inner{
		border-color:$accent_color;
		background-color:$accent_color;
	}

	.nav-menu li.menu-button-secondary > a:first-child > .menu-item-inner{
		border-color:$accent_color;
	}

	.nav-menu li.menu-button-secondary > a:first-child > .menu-item-inner:hover{
		background-color:$accent_color;
	}

	.fancybox-thumbs>ul>li:before{
		border-color:$accent_color;
	}

	input[type=text]:focus, input[type=search]:focus, input[type=tel]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, input[type=password]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, textarea:focus{
		//border-color:$accent_color;
	}

	.button,
	.button-download,
	.added_to_cart,
	input[type='submit'],
	.more-link{
		background-color:$accent_color;
		border-color:$accent_color;
	}

	span.onsale,
	.wvc-background-color-accent,
	.entry-post-grid_classic .category-label:hover,
	.entry-post-grid_modern .category-label:hover,
	.entry-post-masonry .category-label:hover,
	.entry-post-masonry_modern .category-label:hover,
	.entry-post-masonry .category-label:hover,
	.entry-post-metro .category-label:hover,
	.entry-post-metro_modern .category-label:hover,
	.entry-post-mosaic .category-label:hover,
	.entry-post-list .category-label:hover,
	.entry-post-lateral .category-label:hover
	{
		background-color:$accent_color;
	}

	span.onsale{
		background-color:$accent_color!important;
	}

	.page-numbers.current{
		background-color:$accent_color!important;
	}

	.wvc-highlight-accent{
		background-color:$accent_color;
		color:#fff;
	}

	.wvc-icon-background-color-accent{
		box-shadow:0 0 0 0 $accent_color;
		background-color:$accent_color;
		color:$accent_color;
		border-color:$accent_color;
	}

	.wvc-icon-background-color-accent .wvc-icon-background-fill{
		box-shadow:0 0 0 0 $accent_color;
		background-color:$accent_color;
	}

	.wvc-button-background-color-accent{
		background-color:$accent_color;
		color:$accent_color;
		border-color:$accent_color;
	}

	.wvc-button-background-color-accent .wvc-button-background-fill{
		box-shadow:0 0 0 0 $accent_color;
		background-color:$accent_color;
	}

	.wvc-svg-icon-color-accent svg * {
		stroke:$accent_color!important;
	}

	.wvc-one-page-nav-bullet-tip{
		background-color: $accent_color;
	}

	.wvc-one-page-nav-bullet-tip:before{
		border-color: transparent transparent transparent $accent_color;
	}

	.accent,
	.comment-reply-link,
	.bypostauthor .avatar,
	.wolf-bigtweet-content:before{
		color:$accent_color;
	}

	.wvc-button-color-button-accent,
	.more-link,
	.buton-accent{
		background-color: $accent_color;
		border-color: $accent_color;
	}

	.wvc-ils-active .wvc-ils-item-title:after,
	.wvc-interactive-link-item a:hover .wvc-ils-item-title:after {
	    color:$accent_color;
	}

	.wvc-io-active .wvc-io-item-title:after,
	.wvc-interactive-overlay-item a:hover .wvc-io-item-title:after {
	    color:$accent_color;
	}

	.wvc-mailchimp-email{
		border-color:$accent_color!important;
	}

	.wpcf7-submit,
	.wpcf7-button-primary,
	.wvc-mailchimp-submit,
	input[type=submit]{
		background:$accent_color!important;
		border-color:$accent_color!important;
	}


	.single_add_to_cart_button{
		background:$accent_color!important;
		border-color:$accent_color!important;
	}

	.single-product .quantity .qty{
		border-color:$accent_color;
	}

	.single_add_to_cart_button:hover{
		border-color:$accent_color!important;
	}

	input.wvc-mailchimp-submit:hover{
		border-color: $accent_color!important;
	}

	/*.wvc-ils-item-title:before,
	.wvc-io-item-title:before{
		background-color: $accent_color;
	}*/

	/* WVC icons */
	.wvc-icon-color-accent{
		color:$accent_color;
	}

	.wvc-icon-background-color-accent{
		box-shadow:0 0 0 0 $accent_color;
		background-color:$accent_color;
		color:$accent_color;
		border-color:$accent_color;
	}

	.wvc-icon-background-color-accent .wvc-icon-background-fill{
		box-shadow:0 0 0 0 $accent_color;
		background-color:$accent_color;
	}

	#ajax-progress-bar,
	.cart-icon-product-count{
		background:$accent_color;
	}

	.background-accent,
	.mejs-container .mejs-controls .mejs-time-rail .mejs-time-current,
	.mejs-container .mejs-controls .mejs-time-rail .mejs-time-current, .mejs-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current{
		background: $accent_color!important;
	}

	.trigger{
		background-color: $accent_color!important;
		border : solid 1px $accent_color;
	}

	.bypostauthor .avatar {
		border: 3px solid $accent_color;
	}

	::selection {
		background: $accent_color;
	}
	::-moz-selection {
		background: $accent_color;
	}

	.spinner{
		color:$accent_color;
	}

	/*********************
		WVC
	***********************/

	.wvc-icon-box.wvc-icon-type-circle .wvc-icon-no-custom-style.wvc-hover-fill-in:hover, .wvc-icon-box.wvc-icon-type-square .wvc-icon-no-custom-style.wvc-hover-fill-in:hover {
		-webkit-box-shadow: inset 0 0 0 1em $accent_color;
		box-shadow: inset 0 0 0 1em $accent_color;
		border-color: $accent_color;
	}

	.wvc-pricing-table-featured-text,
	.wvc-pricing-table-price-strike:before,
	.wvc-pricing-table-button a{
		background: $accent_color;
	}

	.wvc-pricing-table-price,
	.wvc-pricing-table-currency{
		color: $accent_color;
	}

	.wvc-team-member-social-container a:hover{
		color: $accent_color;
	}

	/* Main Text Color */
	body,
	.nav-label{
		color:$main_text_color;
	}

	.spinner-color, .sk-child:before, .sk-circle:before, .sk-cube:before{
		background-color: $main_text_color!important;
	}

	/* Secondary Text Color */
	// .categories-links a,
	// .comment-meta,
	// .comment-meta a,
	// .comment-awaiting-moderation,
	// .ping-meta,
	// .entry-meta,
	// .entry-meta a,
	// .edit-link{
	// 	color: $secondary_text_color!important;
	// }

	/* Strong Text Color */
	a,strong,
	.products li .price,
	.products li .star-rating,
	.wr-print-button,
	table.cart thead, #content table.cart thead{
		color: $strong_text_color;
	}

	.menu-hover-style-underline .nav-menu-desktop li a span.menu-item-text-container:after,
	.menu-hover-style-underline-centered .nav-menu-desktop li a span.menu-item-text-container:after{
		background: $strong_text_color;
	}

	.menu-hover-style-line .nav-menu li a span.menu-item-text-container:after{
		background-color: $strong_text_color;
	}

	.bit-widget-container,
	.entry-link{
		color: $strong_text_color;
	}

	.wr-stars>span.wr-star-voted:before, .wr-stars>span.wr-star-voted~span:before{
		color: $strong_text_color!important;
	}

	/* Border Color */
	.author-box,
	input[type=text],
	input[type=search],
	input[type=tel],
	input[type=time],
	input[type=url],
	input[type=week],
	input[type=password],
	input[type=checkbox],
	input[type=color],
	input[type=date],
	input[type=datetime],
	input[type=datetime-local],
	input[type=email],
	input[type=month],
	input[type=number],
	select,
	textarea{
		border-color:$border_color;
	}

	.widget-title,
	.woocommerce-tabs ul.tabs{
		border-bottom-color:$border_color;
	}

	.widget_layered_nav_filters ul li a{
		border-color:$border_color;
	}

	hr{
		background:$border_color;
	}
	";

	$link_selector_after  = '.link:after, .underline:after, p:not(.attachment) > a:not(.no-link-style):not(.button):not(.button-download):not(.added_to_cart):not(.button-secondary):not(.menu-link):not(.filter-link):not(.entry-link):not(.more-link):not(.wvc-image-inner):not(.wvc-button):not(.wvc-bigtext-link):not(.wvc-fittext-link):not(.ui-tabs-anchor):not(.wvc-icon-title-link):not(.wvc-icon-link):not(.wvc-social-icon-link):not(.wvc-team-member-social):not(.wolf-tweet-link):not(.author-link):after';
	$link_selector_before = '.link:before, .underline:before, p:not(.attachment) > a:not(.no-link-style):not(.button):not(.button-download):not(.added_to_cart):not(.button-secondary):not(.menu-link):not(.filter-link):not(.entry-link):not(.more-link):not(.wvc-image-inner):not(.wvc-button):not(.wvc-bigtext-link):not(.wvc-fittext-link):not(.ui-tabs-anchor):not(.wvc-icon-title-link):not(.wvc-icon-link):not(.wvc-social-icon-link):not(.wvc-team-member-social):not(.wolf-tweet-link):not(.author-link):before';

	$output .= "

		$link_selector_after,
		$link_selector_before{
			//background: $accent_color!important;
		}

		.category-filter ul li a:before{
			background-color:$accent_color!important;
		}

		.category-label,
		#back-to-top:hover{
			background:$accent_color!important;
		}

		.entry-video:hover .video-play-button,
		.video-opener:hover{
			border-left-color:$accent_color!important;
		}


		.widget.widget_pages ul li a:hover,
		.widget.widget_recent_entries ul li a:hover,
		.widget.widget_recent_comments ul li a:hover,
		.widget.widget_archive ul li a:hover,
		.widget.widget_categories ul li a:hover,
		.widget.widget_meta ul li a:hover,
		.widget.widget_product_categories ul li a:hover,
		.widget.widget_nav_menu ul li a:hover,

		.wvc-font-dark .widget.widget_pages ul li a:hover,
		.wvc-font-dark .widget.widget_recent_entries ul li a:hover,
		.wvc-font-dark .widget.widget_recent_comments ul li a:hover,
		.wvc-font-dark .widget.widget_archive ul li a:hover,
		.wvc-font-dark .widget.widget_categories ul li a:hover,
		.wvc-font-dark .widget.widget_meta ul li a:hover,
		.wvc-font-dark .widget.widget_product_categories ul li a:hover,
		.wvc-font-dark .widget.widget_nav_menu ul li a:hover,

		.wvc-font-light .widget.widget_pages ul li a:hover,
		.wvc-font-light .widget.widget_recent_entries ul li a:hover,
		.wvc-font-light .widget.widget_recent_comments ul li a:hover,
		.wvc-font-light .widget.widget_archive ul li a:hover,
		.wvc-font-light .widget.widget_categories ul li a:hover,
		.wvc-font-light .widget.widget_meta ul li a:hover,
		.wvc-font-light .widget.widget_product_categories ul li a:hover,
		.wvc-font-light .widget.widget_nav_menu ul li a:hover{
			color:$accent_color!important;
		}

		.widget.widget_tag_cloud .tagcloud a:hover,
		.wvc-font-dark .widget.widget_tag_cloud .tagcloud a:hover,
		.wvc-font-light .widget.widget_tag_cloud .tagcloud a:hover{
			color:$accent_color!important;
		}

		.wvc-breadcrumb a:hover{
			color:$accent_color!important;
		}

		.nav-menu-desktop > li:not(.menu-button-primary):not(.menu-button-secondary) > a:first-child .menu-item-text-container:before{
			color:$accent_color;
		}

		.accent-color-light .category-label{
			color:#333!important;
		}

		.accent-color-dark .category-label{
			color:#fff!important;
		}

		.accent-color-light #back-to-top:hover:after{
			color:#333!important;
		}

		.accent-color-dark #back-to-top:hover:after{
			color:#fff!important;
		}

		.snakepit-button-primary{
			background:$accent_color;
		}

		.snakepit-button-secondary:hover{
			background:$accent_color;
			border-color:$accent_color;
		}

		.wvc-mailchimp-email{
			border-color:$accent_color!important;
		}


		.wpcf7-submit,
		.wpcf7-button-primary,
		.wvc-mailchimp-submit,
		input[type=submit]{
			background:$accent_color!important;
			border-color:$accent_color!important;
		}

		.single_add_to_cart_button{
			background:$accent_color!important;
			border-color:$accent_color!important;
		}

		.single-product .quantity .qty{
			border-color:$accent_color;
		}

		.single_add_to_cart_button:hover{
			border-color:$accent_color!important;
		}

		.wolf button.wvc-mailchimp-submit:hover{
			border-color: $accent_color!important;
		}

		.wvc-ils-item-title:after{
		//	background: $accent_color;
		}

		ul.wc-tabs li:hover a,
		ul.wc-tabs li.ui-tabs-active a,
		ul.wc-tabs li.active a,
		ul.wvc-tabs-menu li:hover a,
		ul.wvc-tabs-menu li.ui-tabs-active a,
		ul.wvc-tabs-menu li.active a{
			box-shadow: inset 0 -4px 0 0 $accent_color!important;
		}

		ul.wvc-tabs-menu li:hover a, ul.wvc-tabs-menu li.ui-tabs-active a,
		ul.wvc-tabs-menu li.active a,
		ul.wc-tabs li:hover a,
		ul.wc-tabs li.ui-tabs-active a,
		ul.wc-tabs li.active a{
			color: $accent_color!important;
		}

		.wvc-accordion .wvc-accordion-tab.ui-state-active {
    			border-bottom-color: $accent_color;
    		}

		.wvc-pricing-table-featured .wvc-pricing-table-price,
		.wvc-pricing-table-featured .wvc-pricing-table-currency {
			color: $accent_color;
		}

		.wvc-pricing-table-featured .wvc-pricing-table-button a,
		.wvc-pricing-table-featured .wvc-pricing-table-price-strike:before {
			background-color: $accent_color;
		}

		/* WVC icons */
		.wvc-icon-color-secondary_accent{
			color:$secondary_accent_color;
		}

	";

	// If dark
	if ( preg_match( '/dark/', snakepit_get_theme_mod( 'color_scheme' ) ) ) {
		$output .= ".wvc-background-color-default.wvc-font-light{
			background-color:$page_background_color;
		}";
	}

	// if light
	if ( preg_match( '/light/', snakepit_get_theme_mod( 'color_scheme' ) ) ) {
		$output .= ".wvc-background-color-default.wvc-font-dark{
			background-color:$page_background_color;
		}";
	}

	return $output;
}
add_filter( 'snakepit_color_scheme_output', 'snakepit_edit_color_scheme_css', 10, 2 );

/**
 * Enqueues front-end CSS for 404 background
 *
 * By default the header image is used as 404 background, but here we want the main body background to be used instead.
 *
 * @see wp_add_inline_style()
 */
function snakepit_custom_post_css() {

	$css = '';

	// if ( get_background_image() ) {
	// $src = get_background_image();
	// $css .= "
	// body.error404,
	// body.single.password-protected{
	// background-image:url($src)!important;
	// }
	// ";
	// }

	$post_id                   = snakepit_get_inherit_post_id();
	$background_img            = get_post_meta( $post_id, '_post_body_background_img', true );
	$background_img_position   = get_post_meta( $post_id, '_post_body_background_img_position', true );
	$background_img_attachment = get_post_meta( $post_id, '_post_body_background_img_attachment', true );

	if ( $background_img && wp_attachment_is_image( $background_img ) ) {
		$src  = snakepit_get_url_from_attachment_id( $background_img, 'full' );
		$css .= "
			body .content-inner{
				background-image:url($src)!important;
			}
		";

		if ( $background_img_position ) {
			$css .= "
				body .content-inner{
					background-position:$background_img_position;
				}
			";
		}

		if ( $background_img_attachment ) {
			$css .= "
				body .content-inner{
					background-attachment:$background_img_attachment!important;
				}
			";
		}
	}

	$menu_offset_type = get_post_meta( snakepit_get_the_id(), '_post_menu_offset_type', true );
	$menu_offset      = snakepit_get_inherit_mod( 'menu_offset' );

	if ( ( ! $menu_offset_type || 'custom' === $menu_offset_type ) && $menu_offset ) {

		$menu_offset_top = 'calc(' . snakepit_sanitize_css_value( $menu_offset ) . ' - ' . apply_filters( 'snakepit_desktop_menu_height', 80 ) . 'px)';

		$css .= "
			body.menu-offset  .nav-bar{
				top:$menu_offset_top;
			}
		";

		$css .= 'body.menu-offset.breakpoint  .nav-bar{
				top:calc(' . snakepit_sanitize_css_value( $menu_offset ) . ' - 60px);
		}
		';

	} elseif ( 'bottom' === $menu_offset_type ) {

		$menu_offset_top = 'calc(100vh - ' . apply_filters( 'snakepit_desktop_menu_height', 80 ) . 'px)';

		$css .= "
			body.menu-offset  .nav-bar{
				top:$menu_offset_top;
			}
		";

		$css .= 'body.menu-offset.breakpoint  .nav-bar{
				top:calc(100vh - 60px);
			}
		';
	}

	if ( ! SCRIPT_DEBUG ) {
		$css = snakepit_compact_css( $css );
	}

	wp_add_inline_style( 'snakepit-style', $css );
}
add_action( 'wp_enqueue_scripts', 'snakepit_custom_post_css', 20 );

/*
--------------------------------------------------------------------

	WVC FILTERS

----------------------------------------------------------------------
*/

/**
 * Add custom elements to theme
 *
 * @param array $elements
 * @return  array $elements
 */
function snakepit_add_available_wvc_elements( $elements ) {

	if ( class_exists( 'WooCommerce' ) ) {
		$elements[] = 'wc-searchform';
		$elements[] = 'login-form';
		$elements[] = 'product-presentation';
	}

	$elements[] = 'audio-button';
	$elements[] = 'album-disc';
	$elements[] = 'album-tracklist';
	$elements[] = 'album-tracklist-item';
	$elements[] = 'artist-lineup';
	$elements[] = 'bandsintown-tracking-button';

	if ( class_exists( 'WooCommerce' ) ) {
		$elements[] = 'login-form';
		$elements[] = 'product-presentation';
	}

	return $elements;
}
add_filter( 'wvc_element_list', 'snakepit_add_available_wvc_elements', 44 );

/**
 * Remove some params
 */
function snakepit_remove_vc_params() {

	if ( function_exists( 'vc_remove_param' ) ) {

		// vc_remove_param( 'wvc_product_index', 'product_display' );
		vc_remove_param( 'wvc_product_index', 'product_text_align' );
		// vc_remove_param( 'wvc_product_index', 'product_metro_pattern' );

		vc_remove_param( 'wvc_event_index', 'event_display' );
		vc_remove_param( 'wvc_event_index', 'event_module' );
		vc_remove_param( 'wvc_event_index', 'grid_padding' );
		vc_remove_param( 'wvc_event_index', 'overlay_color' );
		vc_remove_param( 'wvc_event_index', 'overlay_custom_color' );
		vc_remove_param( 'wvc_event_index', 'overlay_text_color' );
		vc_remove_param( 'wvc_event_index', 'overlay_custom_text_color' );
		vc_remove_param( 'wvc_event_index', 'overlay_opacity' );
		vc_remove_param( 'wvc_event_index', 'event_thumbnail_size' );

		vc_remove_param( 'wvc_video_index', 'video_preview' );

		vc_remove_param( 'wvc_work_index', 'caption_text_alignment' );
		vc_remove_param( 'wvc_release_index', 'caption_text_alignment' );

		vc_remove_param( 'wvc_work_index', 'work_category_filter_text_alignment' );
		vc_remove_param( 'wvc_release_index', 'release_category_filter_text_alignment' );
		vc_remove_param( 'wvc_video_index', 'video_category_filter_text_alignment' );

		vc_remove_param( 'wvc_interactive_links', 'align' );
		vc_remove_param( 'wvc_interactive_links', 'v_align' );
		vc_remove_param( 'wvc_interactive_links', 'display' );
		vc_remove_param( 'wvc_interactive_overlays', 'align' );
		vc_remove_param( 'wvc_interactive_overlays', 'display' );

		// vc_remove_param( 'wvc_audio_button', 'color' );
		// vc_remove_param( 'wvc_audio_button', 'custom_color' );
		// vc_remove_param( 'wvc_audio_button', 'shape' );
		// vc_remove_param( 'wvc_audio_button', 'style' );
		// vc_remove_param( 'wvc_audio_button', 'size' );
		// vc_remove_param( 'wvc_audio_button', 'align' );
		// vc_remove_param( 'wvc_audio_button', 'button_block' );
		// vc_remove_param( 'wvc_audio_button', 'hover_effect' );
		// vc_remove_param( 'wvc_audio_button', 'font_weight' );
		// vc_remove_param( 'wvc_audio_button', 'scroll_to_anchor' );

		vc_remove_param( 'wvc_testimonial_slide', 'avatar' );
	}
}
add_action( 'init', 'snakepit_remove_vc_params' );

add_filter(
	'wvc_default_pie_font_weight',
	function() {
		return 400;
	}
);

add_filter(
	'wvc_default_album_disc_rotation_speed',
	function() {
		return 10000;
	}
);

/**
 * Add theme secondary accent color to shared colors
 *
 * @param array $colors
 * @return array $colors
 */
function snakepit_wvc_add_secondary_accent_color_option( $colors ) {

	$colors = array( esc_html__( 'Theme Secondary Accent Color', 'snakepit' ) => 'secondary_accent' ) + $colors;

	return $colors;
}
// add_filter( 'wvc_shared_colors', 'snakepit_wvc_add_secondary_accent_color_option' );

/**
 * Filter WVC shared color hex
 *
 * @param array $colors
 * @return array $colors
 */
function snakepit_add_secondary_accent_color_hex( $colors ) {

	$secondary_accent_color = get_theme_mod( 'secondary_accent_color' );

	if ( $secondary_accent_color ) {
		$colors['secondary_accent'] = $secondary_accent_color;
	}

	return $colors;
}
// add_filter( 'wvc_shared_colors_hex', 'snakepit_add_secondary_accent_color_hex' );


/**
 *  Set default row skin
 *
 * @param string $font_color
 * @return string $font_color
 */
function snakepit_set_default_wvc_row_font_color( $font_color ) {

	// check main skin?
	return 'light';
}
add_filter( 'wvc_default_row_font_color', 'snakepit_set_default_wvc_row_font_color', 40 );

/**
 * Post slider button text markup
 */
add_filter(
	'wvc_last_posts_big_slide_button_text',
	function( $text ) {
		return '<span>' . $text . '</span>';
	}
);

/**
 * Interactive links
 */
add_filter(
	'wvc_interactive_links_align',
	function( $value ) {
		return 'center';
	},
	44
);

add_filter(
	'wvc_interactive_links_display',
	function( $value ) {
		return 'inline-block';
	},
	100
);

/**
 * Default background
 */
add_filter(
	'wvc_default_background_type',
	function( $value ) {
		return 'transparent';
	},
	44
);

/**
 * Filter fullPage Transition
 *
 * @return array
 */
function snakepit_set_fullpage_transition( $transition ) {

	if ( is_page() || is_single() ) {
		if ( get_post_meta( wvc_get_the_ID(), '_post_fullpage', true ) ) {
			$transition = get_post_meta( wvc_get_the_ID(), '_post_fullpage_transition', true );
		}
	}

	return $transition;
}
add_filter( 'wvc_fp_transition_effect', 'snakepit_set_fullpage_transition' );


/**
 * Custom backgorund effect output
 */
function snakepit_output_row_bg_effect( $html ) {

	ob_start();
	?>
	<div class="snakepit-bg-overlay"></div>
	<?php
	$html = ob_get_clean();

	return $html;
}
add_filter( 'wvc_background_effect', 'snakepit_output_row_bg_effect' );

/**
 *  Add background effect
 *
 * @param string $effects
 * @return string $effects
 */
function snakepit_add_wvc_custom_background_effect( $effects ) {

	if ( function_exists( 'vc_add_param' ) ) {
		vc_add_param(
			'vc_row',
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add Film Grain Effect', 'snakepit' ),
				'param_name' => 'add_effect',
				'group'      => esc_html__( 'Style', 'snakepit' ),
			)
		);

		vc_add_param(
			'vc_row_inner',
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add Film Grain Effect', 'snakepit' ),
				'param_name' => 'add_effect',
				'group'      => esc_html__( 'Style', 'snakepit' ),
			)
		);

		vc_add_param(
			'vc_column',
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add Film Grain Effect', 'snakepit' ),
				'param_name' => 'add_effect',
				'group'      => esc_html__( 'Style', 'snakepit' ),
			)
		);

		vc_add_param(
			'vc_column_inner',
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add Film Grain Effect', 'snakepit' ),
				'param_name' => 'add_effect',
				'group'      => esc_html__( 'Style', 'snakepit' ),
			)
		);

		vc_add_param(
			'wvc_interactive_link_item',
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add Film Grain Effect', 'snakepit' ),
				'param_name' => 'add_effect',
				'group'      => esc_html__( 'Background', 'snakepit' ),
			)
		);

		vc_add_param(
			'vc_row',
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Add Preload Animation', 'snakepit' ),
				'param_name' => 'background_img_preloader',
				'group'      => esc_html__( 'Style', 'snakepit' ),
			)
		);

		vc_add_param(
			'rev_slider_vc',
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Preloader Background', 'snakepit' ),
				'param_name' => 'preloader_bg',
			)
		);
	}
}
add_action( 'init', 'snakepit_add_wvc_custom_background_effect' );

/*
--------------------------------------------------------------------

	POST HOOKS

----------------------------------------------------------------------
*/

/**
 * Redefine post standard hook
 */
function snakepit_remove_loop_post_default_hooks() {

	remove_action( 'snakepit_before_post_content_standard_title', 'snakepit_output_post_content_standard_date' );
	remove_action( 'snakepit_after_post_content_standard', 'snakepit_output_post_content_standard_meta' );

	remove_action( 'snakepit_before_post_content_masonry_title', 'snakepit_output_post_content_grid_date' );
	remove_action( 'snakepit_before_post_content_masonry_title', 'snakepit_output_post_content_grid_media' );

	remove_action( 'snakepit_before_post_content_grid_title', 'snakepit_output_post_content_grid_date' );
	remove_action( 'snakepit_before_post_content_grid_title', 'snakepit_output_post_content_grid_media' );

	add_action( 'snakepit_before_post_content_standard_title', 'snakepit_output_post_content_standard_top_meta', 10, 1 );

	add_action( 'snakepit_before_post_content_masonry', 'snakepit_output_post_content_grid_custom_media', 10, 2 );

	add_action( 'snakepit_before_post_content_masonry_title', 'snakepit_output_post_content_grid_open_tag', 10, 1 );

	add_action( 'snakepit_before_post_content_grid', 'snakepit_output_post_content_grid_custom_media', 10, 2 );

	add_action( 'snakepit_before_post_content_grid_title', 'snakepit_output_post_content_grid_open_tag', 10, 1 );
}
add_action( 'init', 'snakepit_remove_loop_post_default_hooks' );

/**
 * Post Media
 */
function snakepit_output_post_content_grid_custom_media( $post_display_elements, $display ) {
	$show_thumbnail = ( in_array( 'show_thumbnail', $post_display_elements ) );
	$show_category  = ( in_array( 'show_category', $post_display_elements ) );
	$show_date      = ( in_array( 'show_date', $post_display_elements ) );
	$post_id        = get_the_ID();
	?>
	<?php if ( $show_thumbnail ) : ?>
		<?php if ( snakepit_has_post_thumbnail() || snakepit_is_instagram_post( $post_id ) ) : ?>
			<div class="entry-image">
				<?php if ( $show_date ) : ?>
					<div class="date-block">
						<?php if ( 'custom' === snakepit_get_theme_mod( 'date_format' ) ) : ?>
							<?php echo snakepit_custom_date(); ?>
						<?php else : ?>
							<?php snakepit_entry_date(); ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php
				if ( is_sticky() && ! is_paged() ) {
					echo '<span class="sticky-post" title="' . esc_attr( __( 'Featured', 'snakepit' ) ) . '"></span>';
				}
				?>
				<?php
				if ( 'masonry' === $display ) {

					echo snakepit_post_thumbnail( 'snakepit-masonry' );

				} else {
					?>
						<div class="entry-cover">
						<?php
							echo snakepit_background_img( array( 'background_img_size' => 'medium' ) );
						?>
						</div><!-- entry-cover -->
						<?php
				}
				?>
			</div><!-- .entry-image -->
		<?php endif; ?>
	<?php endif; ?>
	<?php
}

/**
 * Re-assign post masonry open hook
 */
function snakepit_output_post_content_grid_open_tag( $post_display_elements ) {
	$show_date      = ( in_array( 'show_date', $post_display_elements ) );
	$show_category  = ( in_array( 'show_category', $post_display_elements ) );
	$show_thumbnail = ( in_array( 'show_thumbnail', $post_display_elements ) );
	?>
	<div class="entry-summary">
		<div class="entry-summary-inner">
			<?php if ( ! has_post_thumbnail() || ! $show_thumbnail && $show_date ) : ?>
				<span class="entry-date">
					<?php snakepit_entry_date(); ?>
				</span>
			<?php endif; ?>
			<?php if ( $show_category ) : ?>
				<a class="category-label" href="<?php echo snakepit_get_first_category_url(); ?>"><?php echo snakepit_get_first_category(); ?></a>
			<?php endif; ?>
	<?php
}

/**
 * Redefine single post hook
 */
function snakepit_remove_single_post_default_hooks() {

	/**
	 * Remove default Hooks
	 */
	remove_action( 'snakepit_post_content_start', 'snakepit_add_custom_post_meta' );
	remove_action( 'snakepit_post_content_end', 'snakepit_ouput_single_post_taxonomy' );

	/**
	 * Add new hooks
	 */
	add_action( 'snakepit_post_content_end', 'snakepit_output_single_post_bottom_meta', 10, 1 );

}
add_action( 'init', 'snakepit_remove_single_post_default_hooks' );

/**
 * Output single post meta
 */
function snakepit_output_single_post_bottom_meta() {
	echo '<div class="single-post-meta-container wrap clearfix">';

		echo '<span class="single-post-date single-post-meta entry-date">';
	if ( 'human_diff' === snakepit_get_theme_mod( 'date_format' ) ) {
		printf( esc_html__( 'Posted %s', 'snakepit' ), snakepit_entry_date( false ) );
	} else {
		printf( esc_html__( 'Posted On %s', 'snakepit' ), snakepit_entry_date( false ) );
	}
		echo '</span>';

		echo '<span class="single-post-taxonomy single-post-meta categories single-post-categories">';
			echo apply_filters( 'snakepit_entry_category_list_icon', '<span class="meta-icon category-icon"></span>' );
			the_category( ', ' );
		echo '</span>';

		the_tags( '<span class="single-post-taxonomy single-post-meta tagcloud single-post-tagcloud">', '', '</span>' );

	echo '</div><!-- .single-post-meta -->';
}

/**
 * Add post meta before title
 */
function snakepit_output_post_content_standard_top_meta( $post_display_elements ) {

	echo '<header class="entry-meta">';

	if ( in_array( 'show_date', $post_display_elements ) && '' == get_post_format() || 'video' === get_post_format() || 'gallery' === get_post_format() || 'image' === get_post_format() || 'audio' === get_post_format() ) {
		?>
		<span class="entry-date">
			<?php snakepit_entry_date( true, true ); ?>
		</span>
		<?php
	}

	$show_author     = ( in_array( 'show_author', $post_display_elements ) );
	$show_category   = ( in_array( 'show_category', $post_display_elements ) );
	$show_tags       = ( in_array( 'show_tags', $post_display_elements ) );
	$show_extra_meta = ( in_array( 'show_extra_meta', $post_display_elements ) );
	?>
	<?php if ( ( $show_author || $show_extra_meta || $show_category || snakepit_edit_post_link( false ) ) && ! snakepit_is_short_post_format() ) : ?>

				<?php if ( $show_author ) : ?>
					<?php snakepit_get_author_avatar(); ?>
				<?php endif; ?>
				<?php if ( $show_category ) : ?>
					<span class="entry-category-list">
						<?php echo apply_filters( 'snakepit_entry_category_list_icon', '<span class="meta-icon category-icon"></span>' ); ?>
						<?php echo get_the_term_list( get_the_ID(), 'category', '', esc_html__( ', ', 'snakepit' ), '' ); ?>
					</span>
				<?php endif; ?>
				<?php if ( $show_tags ) : ?>
					<?php snakepit_entry_tags(); ?>
				<?php endif; ?>
				<?php if ( $show_extra_meta ) : ?>
					<?php snakepit_get_extra_meta(); ?>
				<?php endif; ?>
				<?php snakepit_edit_post_link(); ?>
		<?php endif; ?>
	<?php
	echo '</header>';
}

/**
 * Post excerpt read more
 */
function snakepit_output_post_grid_classic_excerpt_read_more() {
	?>
	<p class="post-grid-read-more-container"><a href="<?php the_permalink(); ?>" class="<?php echo esc_attr( apply_filters( 'snakepit_more_link_button_class', 'more-link' ) ); ?>"><span><?php esc_html_e( 'Read more', 'snakepit' ); ?></span></a></p>
	<?php
}
add_action( 'snakepit_post_grid_classic_excerpt', 'snakepit_output_post_grid_classic_excerpt_read_more', 44 );
add_action( 'snakepit_post_masonry_excerpt', 'snakepit_output_post_grid_classic_excerpt_read_more', 44 );
add_action( 'snakepit_post_search_excerpt', 'snakepit_output_post_grid_classic_excerpt_read_more', 44 );

/*
--------------------------------------------------------------------

	WC FILTERS

----------------------------------------------------------------------
*/

/**
 * Quickview product excerpt lenght
 */
add_filter(
	'wwcqv_excerpt_length',
	function() {
		return 28;
	}
);

/**
 * After quickview summary hook
 */
add_action(
	'wwcqv_product_summary',
	function() {
		?>
	<div class="single-add-to-wishlist">
		<span class="single-add-to-wishlist-label"><?php esc_html_e( 'Wishlist', 'snakepit' ); ?></span>
		<?php snakepit_add_to_wishlist(); ?>
	</div><!-- .single-add-to-wishlist -->
		<?php
	},
	20
);



/**
 * Display sale label condition
 *
 * @param bool $bool
 * @return bool
 */
function snakepit_do_show_sale_label( $bool ) {

	if ( get_post_meta( get_the_ID(), '_post_product_label', true ) ) {
		$bool = true;
	}

	return $bool;
}
add_filter( 'snakepit_show_sale_label', 'snakepit_do_show_sale_label' );

/**
 * Sale label text
 *
 * @param string $string
 * @return string
 */
function snakepit_sale_label( $string ) {

	if ( get_post_meta( get_the_ID(), '_post_product_label', true ) ) {

		$style = '';

		$string = '<span' . $style . ' class="onsale">' . esc_attr( get_post_meta( get_the_ID(), '_post_product_label', true ) ) . '</span>';
	}

	return $string;
}
add_filter( 'woocommerce_sale_flash', 'snakepit_sale_label' );

/**
 * Product quickview button
 *
 * @param string $string
 * @return string
 */
function snakepit_output_product_quickview_button() {

	if ( function_exists( 'wolf_quickview_button' ) ) {
		$text = esc_html__( 'Quickview', 'snakepit' );
		?>
		<a
		class="product-quickview-button wwcq-product-quickview-button"
		href="<?php the_permalink(); ?>"
		title="<?php echo esc_attr( $text ); ?>"
		rel="nofollow"
		data-product-title="<?php echo esc_attr( get_the_title() ); ?>"
		data-product-id="<?php the_ID(); ?>"><span class="product-quickview-icon"></span></a>
		<?php
	}
}
add_filter( 'snakepit_product_quickview_button', 'snakepit_output_product_quickview_button' );

/**
 * Product wishlist button
 *
 * @param string $string
 * @return string
 */
function snakepit_output_product_wishlist_button() {

	if ( function_exists( 'wolf_add_to_wishlist' ) ) {
		wolf_add_to_wishlist();
	}
}
add_filter( 'snakepit_add_to_wishlist_button', 'snakepit_output_product_wishlist_button' );

/**
 * Product Add to cart button
 *
 * @param string $string
 * @return string
 */
function snakepit_output_product_add_to_cart_button() {

	global $product;

	if ( $product->is_type( 'variable' ) ) {

		echo '<a class="product-add-to-cart" href="' . esc_url( get_permalink() ) . '"><span>' . esc_attr( __( 'Select option', 'snakepit' ) ) . '</span></a>';

	} elseif ( $product->is_type( 'external' ) || $product->is_type( 'grouped' ) ) {

		echo '<a class="product-add-to-cart" href="' . esc_url( get_permalink() ) . '"><span>' . esc_attr( __( 'View product', 'snakepit' ) ) . '</span></a>';

	} else {

		echo snakepit_add_to_cart(
			get_the_ID(),
			'product-add-to-cart',
			'<span>' . esc_attr( __( 'Add to cart', 'snakepit' ) ) . '</span>'
		);
	}

}
add_filter( 'snakepit_product_add_to_cart_button', 'snakepit_output_product_add_to_cart_button' );

/**
 * Product more button
 *
 * @param string $string
 * @return string
 */
function snakepit_output_product_more_button() {

	?>
	<a class="product-quickview-button product-more-button" href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'More details', 'snakepit' ); ?>"><span class="fa ion-android-more-vertical"></span></a>
	<?php
}
add_filter( 'snakepit_product_more_button', 'snakepit_output_product_more_button' );

/*
--------------------------------------------------------------------

	WC HOOKS

----------------------------------------------------------------------
*/

/**
 * Product Size Chart Image
 */
function snakepit_product_size_chart_img() {

	$hide_sizechart = get_post_meta( get_the_ID(), '_post_wc_product_hide_size_chart_img', true );

	if ( $hide_sizechart || ! is_singular( 'product' ) ) {
		return;
	}

	global $post;
	$sc_img = null;
	$terms  = get_the_terms( $post, 'product_cat' );

	foreach ( $terms as $term ) {

		$sizechart_id = absint( get_term_meta( $term->term_id, 'sizechart_id', true ) );

		if ( $sizechart_id ) {
			$sc_img = $sizechart_id;
		}
	}

	if ( get_post_meta( get_the_ID(), '_post_wc_product_size_chart_img', true ) ) {
		$sc_img = get_post_meta( get_the_ID(), '_post_wc_product_size_chart_img', true );
	}

	if ( is_single() && $sc_img ) {
		$href = snakepit_get_url_from_attachment_id( $sc_img, 'snakepit-XL' );
		?>
		<div class="size-chart-img">
			<a href="<?php echo esc_url( $href ); ?>" class="lightbox"><?php esc_html_e( 'Size Chart', 'snakepit' ); ?></a>
		</div>
		<?php
	}
}
add_action( 'woocommerce_single_product_summary', 'snakepit_product_size_chart_img', 25 );

/**
 * WC gallery image size overwrite
 */
add_filter(
	'woocommerce_gallery_thumbnail_size',
	function( $size ) {
		return array( 100, 100 );
	},
	40
);

/**
 * Single Product Subheading
 */
function snakepit_add_single_product_subheading() {

	$subheading = get_post_meta( get_the_ID(), '_post_subheading', true );

	if ( is_single() && $subheading ) {
		?>
		<div class="product-subheading">
			<?php echo sanitize_text_field( $subheading ); ?>
		</div>
		<?php
	}

}
add_action( 'woocommerce_single_product_summary', 'snakepit_add_single_product_subheading', 6 );

/**
 * Product Subheading
 */
function snakepit_add_product_subheading() {

	$subheading = get_post_meta( get_the_ID(), '_post_subheading', true );

	if ( is_single() && $subheading ) {
		?>
		<div class="product-subheading">
			<?php echo sanitize_text_field( $subheading ); ?>
		</div>
		<?php
	}

}
add_action( 'woocommerce_single_product_summary', 'snakepit_add_product_subheading', 6 );

/**
 * Redefine product hook
 */
function snakepit_remove_loop_item_default_wc_hooks() {

	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open' );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash' );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail' );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title' );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' );
	remove_action( 'woocommerce_after_shop_loop_item', 'www_output_add_to_wishlist_button', 15 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );

	add_action( 'woocommerce_before_shop_loop_item', 'snakepit_wc_loop_thumbnail', 10, 1 );
	add_action( 'woocommerce_after_shop_loop_item', 'snakepit_wc_loop_summary' );
}
add_action( 'woocommerce_init', 'snakepit_remove_loop_item_default_wc_hooks' );

/**
 * WC loop thumbnail
 */
function snakepit_wc_loop_thumbnail( $template_args ) {

	extract(
		wp_parse_args(
			$template_args,
			array(
				'display' => '',
			)
		)
	);

	$product_thumbnail_size = ( 'metro' === $display ) ? 'snakepit-metro' : 'woocommerce_thumbnail';
	$product_thumbnail_size = apply_filters( 'snakepit_' . $display . '_thumbnail_size_name', $product_thumbnail_size );
	$product_thumbnail_size = ( snakepit_is_gif( get_post_thumbnail_id() ) ) ? 'full' : $product_thumbnail_size;
	?>
	<div class="product-thumbnail-container clearfix">
		<div class="product-thumbnail-inner">
			<a class="entry-link-mask" href="<?php the_permalink(); ?>"></a>
			<?php snakepit_minimal_player(); ?>
			<?php woocommerce_show_product_loop_sale_flash(); ?>
			<?php echo woocommerce_get_product_thumbnail( $product_thumbnail_size ); ?>
			<?php snakepit_woocommerce_second_product_thumbnail( $product_thumbnail_size ); ?>
			<div class="product-actions">
				<?php
					/**
					 * Quickview button
					 */
					do_action( 'snakepit_product_quickview_button' );
				?>
				<?php
					/**
					 * Wishlist button
					 */
					do_action( 'snakepit_add_to_wishlist_button' );
				?>
			</div><!-- .product-actions -->
		</div><!-- .product-thumbnail-inner -->
	</div><!-- .product-thumbnail-container -->
	<?php
}

function snakepit_wc_loop_summary() {
	?>
	<div class="product-summary clearfix">
		<div class="product-summary-cell-left">
			<?php woocommerce_template_loop_product_link_open(); ?>
				<?php woocommerce_template_loop_product_title(); ?>
				<?php
					/**
					 * After title
					 */
					do_action( 'snakepit_after_shop_loop_item_title' );
				?>
			<?php woocommerce_template_loop_product_link_close(); ?>
		</div>
		<div class="product-summary-cell-right">
			<?php woocommerce_template_loop_price(); ?>
		</div>
		<div class="clear"></div>
		<?php
			/**
			 * Add to cart button
			 */
			do_action( 'snakepit_product_add_to_cart_button' );
		?>
	</div><!-- .product-summary -->
	<?php
}

/**
 * Product stacked images + sticky details
 */
function snakepit_single_product_sticky_layout() {

	if ( ! snakepit_get_inherit_mod( 'product_sticky' ) || 'no' === snakepit_get_inherit_mod( 'product_sticky' ) ) {
		return;
	}

	/* Remove default images */
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

	global $product;

	$product_id = $product->get_id();

	echo '<div class="images">';

	woocommerce_show_product_sale_flash();
	/**
	 * If gallery
	 */
	$attachment_ids = $product->get_gallery_image_ids();

	if ( is_array( $attachment_ids ) && ! empty( $attachment_ids ) ) {

		echo '<ul>';

		if ( has_post_thumbnail( $product_id ) ) {

			$caption = get_post_field( 'post_excerpt', get_post_thumbnail_id( $post_thumbnail_id ) );
			?>
			<li class="stacked-image">
				<a class="lightbox" data-fancybox="wc-stacked-images-<?php echo absint( $product_id ); ?>" href="<?php echo get_the_post_thumbnail_url( $product_id, 'full' ); ?>" data-caption="<?php echo esc_attr( $caption ); ?>">
					<?php echo snakepit_kses( $product->get_image( 'large' ) ); ?>
				</a>
			</li>
			<?php
		}

		foreach ( $attachment_ids as $attachment_id ) {
			if ( wp_attachment_is_image( $attachment_id ) ) {

				$caption = get_post_field( 'post_excerpt', $attachment_id );
				?>
				<li class="stacked-image">
					<a class="lightbox" data-fancybox="wc-stacked-images-<?php echo absint( $product_id ); ?>" href="<?php echo wp_get_attachment_url( $attachment_id, 'full' ); ?>" data-caption="<?php echo esc_attr( $caption ); ?>">
						<?php echo wp_get_attachment_image( $attachment_id, 'large' ); ?>
					</a>
				</li>
				<?php
			}
		}

		echo '</ul>';

		/**
		 * If featured image only
		 */
	} elseif ( has_post_thumbnail( $product_id ) ) {
		?>
		<span class="stacked-image">
			<a class="lightbox" data-fancybox="wc-stacked-images-<?php echo absint( $product_id ); ?>" href="<?php echo get_the_post_thumbnail_url( $product_id, 'full' ); ?>">
				<?php echo snakepit_kses( $product->get_image( 'large' ) ); ?>
			</a>
		</span>
		<?php
		/**
		 * Placeholder
		 */
	} else {

		$html  = '<span class="woocommerce-product-gallery__image--placeholder">';
		$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'snakepit' ) );
		$html .= '</span>';

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
	}

	echo '</div>';
}
add_action( 'woocommerce_before_single_product_summary', 'snakepit_single_product_sticky_layout' );

add_action(
	'woocommerce_before_quantity_input_field',
	function() {
		echo '<span class="wt-quantity-plus"></span>';
	}
);

add_action(
	'woocommerce_after_quantity_input_field',
	function() {
		echo '<span class="wt-quantity-minus"></span>';
	}
);

/*
--------------------------------------------------------------------

	PLUGIN SETTINGS

----------------------------------------------------------------------
*/

/**
 * Set portfolio template folder
 */
function snakepit_set_portfolio_template_url( $template_url ) {

	return snakepit_get_template_url() . '/portfolio/';
}
add_filter( 'wolf_portfolio_template_url', 'snakepit_set_portfolio_template_url' );

/**
 * Set videos template folder
 */
function snakepit_set_videos_template_url( $template_url ) {

	return snakepit_get_template_url() . '/videos/';
}
add_filter( 'wolf_videos_template_url', 'snakepit_set_videos_template_url' );

/**
 * Set discography template folder
 */
function snakepit_set_discography_template_url( $template_url ) {

	return snakepit_get_template_url() . '/discography/';
}
add_filter( 'wolf_discography_template_url', 'snakepit_set_discography_template_url' );
add_filter( 'wolf_discography_url', 'snakepit_set_discography_template_url' );

/**
 * Set events template folder
 */
function snakepit_set_events_template_url( $template_url ) {

	return snakepit_get_template_url() . '/events/';
}
add_filter( 'wolf_events_template_url', 'snakepit_set_events_template_url' );


/*
--------------------------------------------------------------------

	MODS

----------------------------------------------------------------------
*/

/**
 * Remove unused mods
 *
 * @param array $mods The default mods.
 * @return void
 */
function snakepit_remove_mods( $mods ) {

	// Unset

	unset( $mods['layout']['options']['button_style'] );
	unset( $mods['layout']['options']['site_layout'] );

	unset( $mods['fonts']['options']['body_font_size'] );

	unset( $mods['wolf_videos']['options']['video_display'] );

	unset( $mods['shop']['options']['product_display'] );

	unset( $mods['navigation']['options']['menu_hover_style'] );
	// unset( $mods['navigation']['options']['menu_layout']['choices']['overlay'] );
	unset( $mods['navigation']['options']['menu_layout']['choices']['lateral'] );
	unset( $mods['navigation']['options']['menu_layout']['choices']['offcanvas'] );
	unset( $mods['navigation']['options']['menu_skin'] );

	unset( $mods['header_settings']['options']['hero_scrolldown_arrow'] );

	unset( $mods['navigation']['options']['menu_sticky_type']['choices']['soft'] );

	unset( $mods['navigation']['options']['side_panel_position'] );

	// unset( $mods['blog']['options']['post_display'] );

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_remove_mods', 20 );

/**
 * Add release hover effects
 */
function snakepit_add_hover_effects() {
	if ( function_exists( 'vc_add_params' ) ) {
		vc_add_params(
			'wvc_release_index',
			array(
				array(
					'heading'     => esc_html__( 'Hover Effect', 'snakepit' ),
					'param_name'  => 'release_hover_effect',
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Simple', 'snakepit' ) => 'simple',
						esc_html__( 'Zoom', 'snakepit' ) => 'zoom',
						esc_html__( 'Slide', 'snakepit' ) => 'slide',
						esc_html__( 'Grunge', 'snakepit' ) => 'grunge',
						esc_html__( 'Title Following Cursor', 'snakepit' ) => 'cursor',
					),
					'dependency'  => array(
						'element'            => 'release_display',
						'value_not_equal_to' => array( 'lateral' ),
					),
					'admin_label' => true,
				),
			)
		);

		vc_add_params(
			'wvc_work_index',
			array(
				array(
					'heading'     => esc_html__( 'Hover Effect', 'snakepit' ),
					'param_name'  => 'work_hover_effect',
					'type'        => 'dropdown',
					'value'       => array(
						esc_html__( 'Simple', 'snakepit' ) => 'simple',
						esc_html__( 'Zoom', 'snakepit' ) => 'zoom',
						esc_html__( 'Slide', 'snakepit' ) => 'slide',
						esc_html__( 'Grunge', 'snakepit' ) => 'grunge',
						esc_html__( 'Title Following Cursor', 'snakepit' ) => 'cursor',
					),
					'dependency'  => array(
						'element' => 'work_display',
						'value'   => array( 'grid', 'metro', 'masonry' ),
					),
					'admin_label' => true,
				),
			)
		);
	}
}
add_action( 'init', 'snakepit_add_hover_effects' );

/**
 * Force show loading logo
 *
 * @param bool $bool
 * @return bool
 */
function snakepit_force_display_loading_logo( $bool ) {
	return 'snakepit' === snakepit_get_inherit_mod( 'loading_animation_type' ) && snakepit_get_inherit_mod( 'loading_logo' );
}
add_filter( 'snakepit_display_loading_logo', 'snakepit_force_display_loading_logo' );

/**
 * Add mods
 */
function snakepit_add_mods( $mods ) {

	$color_scheme = snakepit_get_color_scheme();

	// $mods['layout']['options']['custom_cursor'] = array(
	// 'id' => 'custom_cursor',
	// 'label' => esc_html__( 'Custom Cursor', 'snakepit' ),
	// 'type' => 'checkbox',
	// );

	$mods['loading'] = array(

		'id'      => 'loading',
		'title'   => esc_html__( 'Loading', 'snakepit' ),
		'icon'    => 'update',
		'options' => array(

			array(
				'label'   => esc_html__( 'Loading Animation Type', 'snakepit' ),
				'id'      => 'loading_animation_type',
				'type'    => 'select',
				'choices' => array(
					'none'    => esc_html__( 'None', 'snakepit' ),
					'overlay' => esc_html__( 'Overlay', 'snakepit' ),
					// 'snakepit' => esc_html__( 'Overlay with animation', 'snakepit' ),
				),
			),

			/*
			'loading_logo' => array(
				'type' => 'image',
				'label' => esc_html__( 'Loading Logo', 'snakepit' ),
				'id' => 'loading_logo',
				'description' => esc_html__( 'For the overlay with logo loading animation.', 'snakepit' ),
			),*/

			/*
			array(
				'label' => esc_html__( 'Loading Logo Animation', 'snakepit' ),
				'id' => 'loading_logo_animation',
				'type' => 'select',
				'choices' => array(
					'none'	 => esc_html__( 'None', 'snakepit' ),
					 //'spin' => esc_html__( 'Rotate', 'snakepit' ),
					 'pulse' => esc_html__( 'Pulse', 'snakepit' ),
				),
			),*/
		),
	);

	$mods['blog']['options']['date_format'] = array(
		'label'   => esc_html__( 'Date Format', 'snakepit' ),
		'id'      => 'date_format',
		'type'    => 'select',
		'choices' => array(
			''           => esc_html__( 'Default', 'snakepit' ),
			'human_diff' => esc_html__( '"X Time ago"', 'snakepit' ),
			'custom'     => esc_html__( 'Calendar Syle', 'snakepit' ),
		),
	);

	$mods['blog']['options']['post_hero_layout'] = array(
		'label'   => esc_html__( 'Single Post Header Layout', 'snakepit' ),
		'id'      => 'post_hero_layout',
		'type'    => 'select',
		'choices' => array(
			''           => esc_html__( 'Default', 'snakepit' ),
			'standard'   => esc_html__( 'Standard', 'snakepit' ),
			'big'        => esc_html__( 'Big', 'snakepit' ),
			'small'      => esc_html__( 'Small', 'snakepit' ),
			'fullheight' => esc_html__( 'Full Height', 'snakepit' ),
			'none'       => esc_html__( 'No header', 'snakepit' ),
		),
	);

	// $mods['colors']['options']['secondary_accent_color'] = array(
	// 'id' => 'secondary_accent_color',
	// 'label' => esc_html__( 'Secondary Accent Color', 'snakepit' ),
	// 'type' => 'color',
	// 'transport' => 'postMessage',
	// 'default' => $color_scheme[8],
	// );

	// $mods['navigation']['options']['ajax_nav'] = array(
	// 'label' => esc_html__( 'AJAX Navigation', 'snakepit' ),
	// 'id'    => 'ajax_nav',
	// 'type'  => 'checkbox',
	// );

	// $mods['navigation']['options']['nav_bar_bg_img'] = array(
	// 'label' => esc_html__( 'Sticky Navigation Bar Background', 'snakepit' ),
	// 'id'    => 'nav_bar_bg_img',
	// 'type'  => 'image',
	// );

	$mods['navigation']['options']['mega_menu_bg_img'] = array(
		'label' => esc_html__( 'Mega Menu Background', 'snakepit' ),
		'id'    => 'mega_menu_bg_img',
		'type'  => 'image',
	);

	// $mods['navigation']['options']['side_panel_bg_img'] = array(
	// 'label' => esc_html__( 'Side Panel Background', 'snakepit' ),
	// 'id'    => 'side_panel_bg_img',
	// 'type'  => 'image',
	// );

	$mods['navigation']['options']['menu_sticky_type'] = array(
		'label'     => esc_html__( 'Sticky Menu', 'snakepit' ),
		'id'        => 'menu_sticky_type',
		'type'      => 'select',
		'choices'   => array(
			'none' => esc_html__( 'Disabled', 'snakepit' ),
			'hard' => esc_html__( 'Enabled', 'snakepit' ),
		),
		'transport' => 'postMessage',
	);

	$mods['navigation']['options']['side_panel_bg_img'] = array(
		'label' => esc_html__( 'Side Panel Background', 'snakepit' ),
		'id'    => 'side_panel_bg_img',
		'type'  => 'image',
	);

	// $mods['navigation']['options']['overlay_menu_bg_img'] = array(
	// 'label' => esc_html__( 'Overlay Menu Background', 'snakepit' ),
	// 'id'    => 'overlay_menu_bg_img',
	// 'type'  => 'image',
	// );

	// $mods['navigation']['options']['lateral_menu_bg_img'] = array(
	// 'label' => esc_html__( 'Lateral Menu Background', 'snakepit' ),
	// 'id'    => 'lateral_menu_bg_img',
	// 'type'  => 'image',
	// );

	// $mods['navigation']['options']['mobile_menu_bg_img'] = array(
	// 'label' => esc_html__( 'Mobile Menu Background', 'snakepit' ),
	// 'id'    => 'mobile_menu_bg_img',
	// 'type'  => 'image',
	// );

	$mods['navigation']['options']['menu_offset'] = array(
		'id'    => 'menu_offset',
		'label' => esc_html__( 'Menu Offset Top', 'snakepit' ),
		'type'  => 'text',
		// 'placeholder' => 400,
		// 'description' => sprintf( snakepit_kses( __( 'Enter %s to display the navbar at the bottom of the screen', 'snakepit' ) ), '100%' ),
	);

	if ( isset( $mods['wolf_videos'] ) ) {
		$mods['wolf_videos']['options']['video_hero_layout'] = array(
			'label'   => esc_html__( 'Single Video Header Layout', 'snakepit' ),
			'id'      => 'video_hero_layout',
			'type'    => 'select',
			'choices' => array(
				''           => esc_html__( 'Default', 'snakepit' ),
				'standard'   => esc_html__( 'Standard', 'snakepit' ),
				'big'        => esc_html__( 'Big', 'snakepit' ),
				'small'      => esc_html__( 'Small', 'snakepit' ),
				'fullheight' => esc_html__( 'Full Height', 'snakepit' ),
				'none'       => esc_html__( 'No header', 'snakepit' ),
			),
		);

		$mods['wolf_videos']['options']['video_category_filter'] = array(
			'id'    => 'video_category_filter',
			'label' => esc_html__( 'Category filter (not recommended with a lot of videos)', 'snakepit' ),
			'type'  => 'checkbox',
		);

		$mods['wolf_videos']['options']['products_per_page'] = array(
			'label' => esc_html__( 'Videos per Page', 'snakepit' ),
			'id'    => 'videos_per_page',
			'type'  => 'text',
		);

		$mods['wolf_videos']['options']['video_pagination'] = array(
			'id'      => 'video_pagination',
			'label'   => esc_html__( 'Video Archive Pagination', 'snakepit' ),
			'type'    => 'select',
			'choices' => array(
				'standard_pagination' => esc_html__( 'Numeric Pagination', 'snakepit' ),
				'load_more'           => esc_html__( 'Load More Button', 'snakepit' ),
			),
		);

		$mods['wolf_videos']['options']['video_display_elements'] = array(
			'id'          => 'video_display_elements',
			'label'       => esc_html__( 'Post meta to show in single video page', 'snakepit' ),
			'type'        => 'group_checkbox',
			'choices'     => array(
				'show_date'       => esc_html__( 'Date', 'snakepit' ),
				'show_author'     => esc_html__( 'Author', 'snakepit' ),
				'show_category'   => esc_html__( 'Category', 'snakepit' ),
				'show_tags'       => esc_html__( 'Tags', 'snakepit' ),
				'show_extra_meta' => esc_html__( 'Extra Meta', 'snakepit' ),
			),
			'description' => esc_html__( 'Note that some options may be ignored depending on the post display.', 'snakepit' ),
		);

		if ( class_exists( 'Wolf_Custom_Post_Meta' ) ) {

			$mods['wolf_videos']['options'][] = array(
				'label'   => esc_html__( 'Enable Custom Post Meta', 'snakepit' ),
				'id'      => 'video_enable_custom_post_meta',
				'type'    => 'group_checkbox',
				'choices' => array(
					'video_enable_views' => esc_html__( 'Views', 'snakepit' ),
					'video_enable_likes' => esc_html__( 'Likes', 'snakepit' ),
				),
			);
		}
	}

	if ( isset( $mods['wolf_discography'] ) ) {

		$mods['wolf_discography']['options']['release_hero_layout'] = array(
			'label'   => esc_html__( 'Single Release Header Layout', 'snakepit' ),
			'id'      => 'release_hero_layout',
			'type'    => 'select',
			'choices' => array(
				''           => esc_html__( 'Default', 'snakepit' ),
				'standard'   => esc_html__( 'Standard', 'snakepit' ),
				'big'        => esc_html__( 'Big', 'snakepit' ),
				'small'      => esc_html__( 'Small', 'snakepit' ),
				'fullheight' => esc_html__( 'Full Height', 'snakepit' ),
				'none'       => esc_html__( 'No header', 'snakepit' ),
			),
			// 'transport' => 'postMessage',
		);
	}

	if ( isset( $mods['portfolio'] ) ) {
		$mods['portfolio']['options']['work_hero_layout'] = array(
			'label'   => esc_html__( 'Single Work Header Layout', 'snakepit' ),
			'id'      => 'work_hero_layout',
			'type'    => 'select',
			'choices' => array(
				''           => esc_html__( 'Default', 'snakepit' ),
				'standard'   => esc_html__( 'Standard', 'snakepit' ),
				'big'        => esc_html__( 'Big', 'snakepit' ),
				'small'      => esc_html__( 'Small', 'snakepit' ),
				'fullheight' => esc_html__( 'Full Height', 'snakepit' ),
				'none'       => esc_html__( 'No header', 'snakepit' ),
			),
		);
	}

	if ( isset( $mods['wolf_events'] ) ) {

		$mods['wolf_events']['options']['event_hero_layout'] = array(
			'label'   => esc_html__( 'Single Event Header Layout', 'snakepit' ),
			'id'      => 'event_hero_layout',
			'type'    => 'select',
			'choices' => array(
				''           => esc_html__( 'Default', 'snakepit' ),
				'standard'   => esc_html__( 'Standard', 'snakepit' ),
				'big'        => esc_html__( 'Big', 'snakepit' ),
				'small'      => esc_html__( 'Small', 'snakepit' ),
				'fullheight' => esc_html__( 'Full Height', 'snakepit' ),
				'none'       => esc_html__( 'No header', 'snakepit' ),
			),
			// 'transport' => 'postMessage',
		);
	}

	if ( isset( $mods['portfolio'] ) ) {

		$mods['portfolio']['options']['work_hero_layout'] = array(
			'label'   => esc_html__( 'Single Work Header Layout', 'snakepit' ),
			'id'      => 'work_hero_layout',
			'type'    => 'select',
			'choices' => array(
				''           => esc_html__( 'Default', 'snakepit' ),
				'standard'   => esc_html__( 'Standard', 'snakepit' ),
				'big'        => esc_html__( 'Big', 'snakepit' ),
				'small'      => esc_html__( 'Small', 'snakepit' ),
				'fullheight' => esc_html__( 'Full Height', 'snakepit' ),
				'none'       => esc_html__( 'No header', 'snakepit' ),
			),
			// 'transport' => 'postMessage',
		);
	}

	if ( isset( $mods['shop'] ) && class_exists( 'WooCommerce' ) ) {
		$mods['shop']['options']['product_sticky'] = array(
			'label'       => esc_html__( 'Stacked Images with Sticky Product Details', 'snakepit' ),
			'id'          => 'product_sticky',
			'type'        => 'checkbox',
			'description' => esc_html__( 'Not compatible with sidebar layouts.', 'snakepit' ),
		);
	}

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_add_mods', 40 );

/*
--------------------------------------------------------------------

	DEFAULT MODS & SETTINGS

----------------------------------------------------------------------
*/

/**
 * Set team member social
 */
function snakepit_set_team_member_socials( $socials ) {

	return array( 'facebook', 'twitter', 'instagram', 'youtube', 'spotify', 'soundcloud', 'bandsintown', 'vimeo', 'email' );
}
add_filter( 'wvc_team_member_socials', 'snakepit_set_team_member_socials' );

/**
 *  Set default item overlay color
 *
 * @param string $color
 * @return string $color
 */
function snakepit_set_default_item_overlay_color( $color ) {

	return 'accent';
}
add_filter( 'wvc_default_item_overlay_color', 'snakepit_set_default_item_overlay_color', 40 );

/**
 *  Set default item overlay text color
 *
 * @param string $color
 * @return string $color
 */
function snakepit_set_item_overlay_text_color( $color ) {
	return 'white';
}
add_filter( 'wvc_default_item_overlay_text_color', 'snakepit_set_item_overlay_text_color', 40 );

/**
 *  Set default item overlay opacity
 *
 * @param int $color
 * @return int $color
 */
function snakepit_set_item_overlay_opacity( $opacity ) {
	return 100;
}
add_filter( 'wvc_default_item_overlay_opacity', 'snakepit_set_item_overlay_opacity', 40 );

/**
 * Excerpt length hook
 * Set the number of character to display in the excerpt
 *
 * @param int $length
 * @return int
 */
function snakepit_overwrite_excerpt_length( $length ) {

	return 23;
}
add_filter( 'snakepit_excerpt_length', 'snakepit_overwrite_excerpt_length' );

/**
 *  Set menu skin
 *
 * @param string $skin
 * @return string $skin
 */
function snakepit_set_menu_skin( $skin ) {
	return 'dark';
}
add_filter( 'snakepit_mod_menu_skin', 'snakepit_set_menu_skin', 40 );

/**
 * Excerpt length hook
 * Set the number of character to display in the excerpt
 *
 * @param int $length
 * @return int
 */
function snakepit_overwrite_sticky_menu_height( $length ) {

	return 66;
}
add_filter( 'snakepit_sticky_menu_height', 'snakepit_overwrite_sticky_menu_height' );

/**
 * Set menu hover effect
 *
 * @param string $string
 * @return string
 */
function snakepit_set_menu_hover_style( $string ) {
	return 'opacity';
}
add_filter( 'snakepit_mod_menu_hover_style', 'snakepit_set_menu_hover_style' );

/**
 * Standard row width
 */
add_filter(
	'wvc_row_standard_width',
	function( $string ) {
		return '1300px';
	},
	40
);

/**
 * Load more pagination hash change
 */
add_filter(
	'snakepit_loadmore_pagination_hashchange',
	function( $size ) {
		return false;
	},
	40
);

/**
 *  Set embed video title
 *
 * @param string $title
 * @return string $title
 */
function wvc_set_embed_video_title( $title ) {

	return esc_html__( '&mdash; %s', 'snakepit' );
}
add_filter( 'wvc_embed_video_title', 'wvc_set_embed_video_title', 40 );

/**
 *  Set default pie chart line width
 *
 * @param string $width
 * @return string $width
 */
function wvc_set_default_pie_chart_line_width( $width ) {

	return 15;
}
add_filter( 'wvc_default_pie_chart_line_width', 'wvc_set_default_pie_chart_line_width', 40 );

/**
 *  Set default button shape
 *
 * @param string $shape
 * @return string $shape
 */
function snakepit_set_default_wvc_button_shape( $shape ) {
	return 'boxed';
}
add_filter( 'wvc_default_button_shape', 'snakepit_set_default_wvc_button_shape', 40 );

/**
 *  Set default button shape
 *
 * @param string $shape
 * @return string $shape
 */
function snakepit_set_default_theme_button_shape( $shape ) {
	return 'square';
}
add_filter( 'snakepit_mod_button_style', 'snakepit_set_default_theme_button_shape', 40 );

/**
 *  Set default team member title font size
 *
 * @param string $font_size
 * @return string $font_size
 */
function wvc_set_default_team_member_font_size( $font_size ) {
	return 24;
}
add_filter( 'wvc_default_team_member_title_font_size', 'wvc_set_default_team_member_font_size', 40 );
add_filter( 'wvc_default_single_image_title_font_size', 'wvc_set_default_team_member_font_size', 40 );

/**
 *  Set default heading font size
 *
 * @param int $font_size
 * @return int $font_size
 */
function wvc_set_default_custom_heading_font_size( $font_size ) {
	return 32;
}
add_filter( 'wvc_default_custom_heading_font_size', 'wvc_set_default_custom_heading_font_size', 40 );
add_filter( 'wvc_default_advanced_slide_title_font_size', 'wvc_set_default_custom_heading_font_size', 40 );

/**
 *  Set default heading font family
 *
 * @param string $font_family
 * @return string $font_family
 */
function snakepit_set_default_custom_heading_font_family( $font_family ) {
	return 'Staatliches';
}
add_filter( 'wvc_default_advanced_slide_title_font_family', 'snakepit_set_default_custom_heading_font_family', 40 );
add_filter( 'wvc_default_custom_heading_font_family', 'snakepit_set_default_custom_heading_font_family', 40 );
add_filter( 'wvc_default_bigtext_font_family', 'snakepit_set_default_custom_heading_font_family', 40 );
add_filter( 'wvc_default_cta_font_family', 'snakepit_set_default_custom_heading_font_family', 40 );

/**
 *  Set default heading font weight
 *
 * @param string $font_weight
 * @return string $font_weight
 */
function snakepit_set_default_custom_heading_font_weight( $font_weight ) {
	return 400;
}
add_filter( 'wvc_default_advanced_slide_title_font_weight', 'snakepit_set_default_custom_heading_font_weight', 40 );
add_filter( 'wvc_default_custom_heading_font_weight', 'snakepit_set_default_custom_heading_font_weight', 40 );
add_filter( 'wvc_default_bigtext_font_weight', 'snakepit_set_default_custom_heading_font_weight', 40 );
add_filter( 'wvc_default_cta_font_weight', 'snakepit_set_default_custom_heading_font_weight', 40 );

/**
 *  Set default heading font size
 *
 * @param string $font_size
 * @return string $font_size
 */
function wvc_set_default_cta_font_size( $font_size ) {
	return 22;
}
add_filter( 'wvc_default_cta_font_size', 'wvc_set_default_cta_font_size', 40 );

/**
 * Set Pixproof default options
 */
function snakepit_set_pixproof_default_option() {
	$pp_settings = array(
		'settings_saved_once'                        => '',
		'disable_pixproof_style'                     => '',
		'enable_archive_zip_download'                => true,
		'zip_archive_generation'                     => 'automatic',
		'gallery_position_in_content'                => 'before',
		'enable_pixproof_gallery'                    => true,
		'pixproof_single_item_label'                 => 'Client Gallery',
		'pixproof_multiple_items_label'              => 'Client Galleries',
		'pixproof_change_single_item_slug'           => true,
		'pixproof_gallery_new_single_item_slug'      => 'client-gallery',
		'enable_pixproof_gallery_global_style'       => true,
		'gallery_thumbnail_sizes'                    => 'snakepit-masonry',
		'gallery_grid_sizes'                         => 3,
		'hiddens'                                    => '',
		'general'                                    => '',
		'enable_pixproof_gallery_group'              => '',
		'post_types'                                 => '',
		'pixproof_change_single_item_slug_group'     => '',
		'enable_pixproof_gallery_global_style_group' => '',
	);

	update_option( 'pixproof_settings', $pp_settings );
}
add_action( 'snakepit_plugins_default_options_init', 'snakepit_set_pixproof_default_option' );

/**
 * Flush rewrite rules when activating Proofpix
 */
function snakepit_proofpix_activate() {
	if ( ! get_option( '_snakepit_proofpix_rewrite_rules_flag' ) ) {
		add_option( '_snakepit_proofpix_rewrite_rules_flag', true );
	}
}
register_activation_hook( WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'proopix/proofpix.php', 'snakepit_proofpix_activate' );

function snakepit_proofpix_flush_rewrite_rules() {
	if ( get_option( '_snakepit_proofpix_rewrite_rules_flag' ) ) {
		flush_rewrite_rules();
		delete_option( '_snakepit_proofpix_rewrite_rules_flag' );
	}
}
add_action( 'init', 'snakepit_proofpix_flush_rewrite_rules' );

/*
--------------------------------------------------------------------

	BUTTONS

----------------------------------------------------------------------
*/

/**
 * Custom button types
 */
function snakepit_custom_button_types() {
	return array(
		esc_html__( 'Default', 'snakepit' )     => 'default',
		// esc_html__( 'Special', 'snakepit' ) => 'snakepit-button-special-primary',
		// esc_html__( 'Special Outline', 'snakepit' ) => 'snakepit-button-special-outline',
		esc_html__( 'Solid', 'snakepit' )       => 'snakepit-button-primary',
		// esc_html__( 'Primary Alt', 'snakepit' ) => 'snakepit-button-primary-alt',
		esc_html__( 'Outline', 'snakepit' )     => 'snakepit-button-secondary',
		// esc_html__( 'Primary Alt', 'snakepit' ) => 'snakepit-button-outline-alt',
		esc_html__( 'Simple Text', 'snakepit' ) => 'snakepit-button-simple',
		// esc_html__( 'Simple Text Alt', 'snakepit' ) => 'snakepit-button-simple-alt',
	);
}

/**
 * Primary Special buttons class
 *
 * @param string $string
 * @return string
 */
function snakepit_set_primary_special_button_class( $class ) {

	$snakepit_button_class = 'snakepit-button-primary';

	$class = $snakepit_button_class . ' wvc-button wvc-button-size-sm';

	return $class;
}
add_filter( 'wvc_last_posts_big_slide_button_class', 'snakepit_set_primary_special_button_class' );

/**
 * Primary Special buttons class
 *
 * @param string $string
 * @return string
 */
function snakepit_set_primary_special_button_outline( $class ) {

	$snakepit_button_class = 'snakepit-button-primary';

	$class = $snakepit_button_class . ' wvc-button wvc-button-size-sm';

	return $class;
}
add_filter( 'snakepit_loadmore_button_class', 'snakepit_set_primary_special_button_outline' );

/**
 * Primary Outline buttons class
 *
 * @param string $string
 * @return string
 */
function snakepit_set_primary_button_class( $class ) {

	$snakepit_button_class = 'snakepit-button-primary';

	$class = $snakepit_button_class . ' wvc-button wvc-button-size-sm';

	return $class;
}
add_filter( 'snakepit_404_button_class', 'snakepit_set_primary_button_class' );
add_filter( 'snakepit_single_event_buy_ticket_button_class', 'snakepit_set_primary_button_class' );

/**
 * Event ticket button class
 *
 * @param string $string
 * @return string
 */
function snakepit_set_event_ticket_button_class( $class ) {

	$snakepit_button_class = 'snakepit-button-primary';

	$class = $snakepit_button_class . ' wvc-button wvc-button-size-xs ticket-button';

	return $class;
}
add_filter( 'we_ticket_link_class', 'snakepit_set_event_ticket_button_class', 40 );

/**
 * Main buttons class
 *
 * @param string $string
 * @return string
 */
function snakepit_set_alt_button_class( $class ) {

	$snakepit_button_class = 'snakepit-button-primary';

	$class = $snakepit_button_class . ' wvc-button wvc-button-size-xs';

	return $class;
}
add_filter( 'snakepit_release_button_class', 'snakepit_set_alt_button_class' );

/**
 * Text buttons class
 *
 * @param string $string
 * @return string
 */
function snakepit_set_more_link_button_class( $class ) {

	$snakepit_button_class = 'snakepit-button-simple';

	$class = $snakepit_button_class . ' wvc-button wvc-button-size-xs';

	return $class;
}
add_filter( 'snakepit_more_link_button_class', 'snakepit_set_more_link_button_class' );
add_filter( 'wvc_showcase_vertical_carousel_button_class', 'snakepit_set_more_link_button_class' );

/**
 * Author box buttons class
 *
 * @param string $string
 * @return string
 */
function snakepit_set_author_box_button_class( $class ) {

	$class = ' wvc-button wvc-button-size-xs snakepit-button-primary';

	return $class;
}
add_filter( 'snakepit_author_page_link_button_class', 'snakepit_set_author_box_button_class' );

/**
 * Add button dependencies
 */
function snakepit_add_button_dependency_params() {

	if ( ! class_exists( 'WPBMap' ) || ! class_exists( 'Wolf_Visual_Composer' ) || ! defined( 'WVC_OK' ) || ! WVC_OK ) {
		return;
	}

	$param               = WPBMap::getParam( 'vc_button', 'color' );
	$param['dependency'] = array(
		'element' => 'button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'vc_button', $param );

	$param               = WPBMap::getParam( 'vc_button', 'shape' );
	$param['dependency'] = array(
		'element' => 'button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'vc_button', $param );

	$param               = WPBMap::getParam( 'vc_button', 'hover_effect' );
	$param['dependency'] = array(
		'element' => 'button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'vc_button', $param );

	$param               = WPBMap::getParam( 'wvc_audio_button', 'color' );
	$param['dependency'] = array(
		'element' => 'button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'wvc_audio_button', $param );

	$param               = WPBMap::getParam( 'wvc_audio_button', 'shape' );
	$param['dependency'] = array(
		'element' => 'button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'wvc_audio_button', $param );

	$param               = WPBMap::getParam( 'wvc_audio_button', 'hover_effect' );
	$param['dependency'] = array(
		'element' => 'button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'wvc_audio_button', $param );

	$param               = WPBMap::getParam( 'vc_cta', 'btn_color' );
	$param['dependency'] = array(
		'element' => 'btn_button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'vc_cta', $param );

	$param               = WPBMap::getParam( 'vc_cta', 'btn_shape' );
	$param['dependency'] = array(
		'element' => 'btn_button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'vc_cta', $param );

	$param               = WPBMap::getParam( 'vc_cta', 'btn_hover_effect' );
	$param['dependency'] = array(
		'element' => 'btn_button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'vc_cta', $param );

	$param               = WPBMap::getParam( 'wvc_advanced_slide', 'b1_color' );
	$param['dependency'] = array(
		'element' => 'b1_button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'wvc_advanced_slide', $param );

	$param               = WPBMap::getParam( 'wvc_advanced_slide', 'b1_shape' );
	$param['dependency'] = array(
		'element' => 'b1_button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'wvc_advanced_slide', $param );

	$param               = WPBMap::getParam( 'wvc_advanced_slide', 'b1_hover_effect' );
	$param['dependency'] = array(
		'element' => 'b1_button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'wvc_advanced_slide', $param );

	$param               = WPBMap::getParam( 'wvc_advanced_slide', 'b2_color' );
	$param['dependency'] = array(
		'element' => 'b2_button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'wvc_advanced_slide', $param );

	$param               = WPBMap::getParam( 'wvc_advanced_slide', 'b2_shape' );
	$param['dependency'] = array(
		'element' => 'b2_button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'wvc_advanced_slide', $param );

	$param               = WPBMap::getParam( 'wvc_advanced_slide', 'b2_hover_effect' );
	$param['dependency'] = array(
		'element' => 'b2_button_type',
		'value'   => 'default',
	);
	vc_update_shortcode_param( 'wvc_advanced_slide', $param );
}
add_action( 'init', 'snakepit_add_button_dependency_params', 15 );

/**
 * Filter button attribute
 *
 * @param array $atts
 * @return array $atts
 */
function woltheme_filter_button_atts( $atts ) {

	// button
	if ( isset( $atts['button_type'] ) && 'default' !== $atts['button_type'] ) {
		$atts['shape']        = '';
		$atts['color']        = '';
		$atts['hover_effect'] = '';
		$atts['el_class']    .= ' ' . $atts['button_type'];
	}

	return $atts;
}
add_filter( 'wvc_button_atts', 'woltheme_filter_button_atts' );

/**
 * Filter audio button attribute
 *
 * @param array $atts
 * @return array $atts
 */
function woltheme_filter_audio_button_atts( $atts ) {

	// button
	if ( isset( $atts['btn_button_type'] ) && 'default' !== $atts['btn_button_type'] ) {
		$atts['shape']        = '';
		$atts['color']        = '';
		$atts['hover_effect'] = '';
		$atts['el_class']    .= ' ' . $atts['btn_button_type'];
	}

	return $atts;
}
add_filter( 'wvc_audio_button_atts', 'woltheme_filter_audio_button_atts' );

add_filter(
	'wvc_revslider_container_class',
	function( $class, $atts ) {

		if ( isset( $atts['preloader_bg'] ) && 'true' === $atts['preloader_bg'] ) {
			$class .= ' wvc-preloader-bg';
		}

		return $class;

	},
	10,
	2
);

/**
 * Filter CTA button attribute
 *
 * @param array $atts the shortcode atts we get
 * @param array $btn_params the button attribute to filter
 * @return array $btn_params
 */
function woltheme_filter_cta_button_atts( $btn_params, $atts ) {

	// button
	if ( isset( $atts['btn_button_type'] ) && 'default' !== $atts['btn_button_type'] ) {
		$btn_params['shape']        = '';
		$btn_params['color']        = '';
		$btn_params['hover_effect'] = '';
		$btn_params['el_class']    .= ' ' . $atts['btn_button_type'];
	}

	return $btn_params;
}
add_filter( 'wvc_cta_button_atts', 'woltheme_filter_cta_button_atts', 10, 2 );

/**
 * Filter advanced slider button 1 attribute
 *
 * @param array $atts the shortcode atts we get
 * @param array $b1_params the button attribute to filter
 * @return array $b1_params
 */
function woltheme_filter_b1_button_atts( $b1_params, $atts ) {

	// button
	if ( isset( $atts['b1_button_type'] ) && 'default' !== $atts['b1_button_type'] ) {
		$b1_params['shape']        = '';
		$b1_params['color']        = '';
		$b1_params['hover_effect'] = '';
		$b1_params['el_class']    .= ' ' . $atts['b1_button_type'];
	}

	return $b1_params;
}
add_filter( 'wvc_advanced_slider_b1_button_atts', 'woltheme_filter_b1_button_atts', 10, 2 );

/**
 * Filter advanced slider button 1 attribute
 *
 * @param array $atts the shortcode atts we get
 * @param array $b2_params the button attribute to filter
 * @return array $b2_params
 */
function woltheme_filter_b2_button_atts( $b2_params, $atts ) {

	// button
	if ( isset( $atts['b2_button_type'] ) && 'default' !== $atts['b2_button_type'] ) {
		$b2_params['shape']        = '';
		$b2_params['color']        = '';
		$b2_params['hover_effect'] = '';
		$b2_params['el_class']    .= ' ' . $atts['b2_button_type'];
	}

	return $b2_params;
}
add_filter( 'wvc_advanced_slider_b2_button_atts', 'woltheme_filter_b2_button_atts', 10, 2 );

/**
 * Add theme button option to Button element
 */
function snakepit_add_theme_buttons() {

	if ( function_exists( 'vc_add_params' ) ) {
		vc_add_params(
			'vc_button',
			array(
				array(
					'heading'    => esc_html__( 'Button Type', 'snakepit' ),
					'param_name' => 'button_type',
					'type'       => 'dropdown',
					'value'      => snakepit_custom_button_types(),
					'weight'     => 1000,
				),
			)
		);

		vc_add_params(
			'vc_cta',
			array(
				array(
					'heading'    => esc_html__( 'Button Type', 'snakepit' ),
					'param_name' => 'btn_button_type',
					'type'       => 'dropdown',
					'value'      => snakepit_custom_button_types(),
					'weight'     => 10,
					'group'      => esc_html__( 'Button', 'snakepit' ),
				),
			)
		);

		vc_add_params(
			'wvc_audio_button',
			array(
				array(
					'heading'    => esc_html__( 'Button Type', 'snakepit' ),
					'param_name' => 'btn_button_type',
					'type'       => 'dropdown',
					'value'      => snakepit_custom_button_types(),
					'weight'     => 10,
					// 'group' => esc_html__( 'Button', 'snakepit' ),
				),
			)
		);

		vc_add_params(
			'wvc_advanced_slide',
			array(
				array(
					'heading'    => esc_html__( 'Button Type', 'snakepit' ),
					'param_name' => 'b1_button_type',
					'type'       => 'dropdown',
					'value'      => snakepit_custom_button_types(),
					'weight'     => 10,
					'group'      => esc_html__( 'Button 1', 'snakepit' ),
					'dependency' => array(
						'element' => 'add_button_1',
						'value'   => array( 'true' ),
					),
				),
			)
		);

		vc_add_params(
			'wvc_advanced_slide',
			array(
				array(
					'heading'    => esc_html__( 'Button Type', 'snakepit' ),
					'param_name' => 'b2_button_type',
					'type'       => 'dropdown',
					'value'      => snakepit_custom_button_types(),
					'weight'     => 10,
					'group'      => esc_html__( 'Button 2', 'snakepit' ),
					'dependency' => array(
						'element' => 'add_button_2',
						'value'   => array( 'true' ),
					),
				),
			)
		);

		vc_add_params(
			'vc_custom_heading',
			array(
				array(
					'heading'    => esc_html__( 'Style', 'snakepit' ),
					'param_name' => 'style',
					'type'       => 'dropdown',
					'value'      => array(
						esc_html__( 'Default', 'snakepit' ) => '',
						esc_html__( 'Theme Style', 'snakepit' ) => 'snakepit-heading',
					),
					'weight'     => 10,
				),
			)
		);
	}
}
add_action( 'init', 'snakepit_add_theme_buttons' );

/*
--------------------------------------------------------------------

	PLAYERS

----------------------------------------------------------------------
*/
/**
 * Can we display a player?
 *
 * @return bool
 */
function snakepit_sticky_playlist_id() {
	if ( is_page() && get_post_meta( get_the_ID(), '_post_sticky_playlist_id', true ) ) {
		$playlist_id = get_post_meta( get_the_ID(), '_post_sticky_playlist_id', true );

		if ( $playlist_id && 'none' !== $playlist_id ) {
			return $playlist_id;
		}
	}
}

/**
 * Add body classes
 *
 * @param  array $classes
 * @return array
 */
function snakepit_sticky_player_body_class( $classes ) {

	if ( snakepit_sticky_playlist_id() ) {
		$classes[] = 'is-wpm-bar-player';
	}

	return $classes;
}
add_filter( 'body_class', 'snakepit_sticky_player_body_class' );


/**
 * Output bottom bar holder
 *
 * @param  array $classes
 * @return array
 */
function snakepit_output_sticky_playlist_holder() {

	if ( snakepit_sticky_playlist_id() ) {
		echo '<div class="wpm-bar-holder"></div>';
	}
}
add_action( 'wp_footer', 'snakepit_output_sticky_playlist_holder' );

/**
 * Output bottom bar player
 */
function snakepit_output_sticky_playlist() {

	if ( snakepit_sticky_playlist_id() ) {

		$playlist_id = snakepit_sticky_playlist_id();
		$skin        = get_post_meta( get_the_ID(), '_post_sticky_playlist_skin', true );

		$attrs = array(
			'show_tracklist'   => false,
			'is_sticky_player' => true,
		);

		if ( $skin ) {
			$attrs['theme'] = $skin;
		}

		if ( function_exists( 'wpm_playlist' ) ) {
			wpm_playlist( $playlist_id, $attrs );
		}
	}
}
add_action( 'snakepit_body_start', 'snakepit_output_sticky_playlist' );


/*
--------------------------------------------------------------------

	ADMIN

----------------------------------------------------------------------
*/

/**
 * Overwrite post types menu order
 *
 * @param array  $args
 * @param string $post_type
 * @return array $args
 */
function snakepit_overwrite_post_type_menu_order( $args, $post_type ) {

	if ( 'release' === $post_type ) {

		$args['menu_position'] = 5.1;
	}

	if ( 'event' === $post_type ) {

		$args['menu_position'] = 5.2;
	}

	if ( 'video' === $post_type ) {

		$args['menu_position'] = 5.3;
	}

	if ( 'work' === $post_type ) {

		$args['menu_position'] = 5.4;
	}

	if ( 'wpm_playlist' === $post_type ) {

		$args['menu_position'] = 35;
	}

	if ( 'wvc_content_block' === $post_type ) {

		$args['menu_position'] = 40;
	}

	return $args;
}
add_filter( 'register_post_type_args', 'snakepit_overwrite_post_type_menu_order', 99, 2 );

/**
 * Reorder admin menu
 */
function custom_menu_order( $menu_ord ) {
	if ( ! $menu_ord ) {
		return true;
	}

	return $menu_ord;
}

add_filter( 'custom_menu_order', 'custom_menu_order' );
add_filter( 'menu_order', 'custom_menu_order' );

/**
 * Save modal window content after import
 */
function snakepit_set_modal_window_content_after_import() {
	$post = get_page_by_title( 'Modal Window Content', OBJECT, 'wvc_content_block' );

	if ( $post && function_exists( 'wvc_update_option' ) ) {
		wvc_update_option( 'modal_window', 'content_block_id', $post->ID );
	}
}
add_action( 'pt-ocdi/after_import', 'snakepit_set_modal_window_content_after_import' );

/**
 * Category thumbnail fields.
 */
function snakepit_add_category_fields() {
	?>
	<div class="form-field term-thumbnail-wrap">
		<label><?php esc_html_e( 'Size Chart', 'snakepit' ); ?></label>
		<div id="sizechart_img" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" width="60px" height="60px" /></div>
		<div style="line-height: 60px;">
			<input type="hidden" id="product_cat_sizechart_img_id" name="product_cat_sizechart_img_id" />
			<button type="button" id="upload_sizechart_image_button" class="upload_sizechart_image_button button"><?php esc_html_e( 'Upload/Add image', 'snakepit' ); ?></button>
				<button type="button" id="remove_sizechart_image_button" class="remove_sizechart_image_button button" style="display:none;"><?php esc_html_e( 'Remove image', 'snakepit' ); ?></button>
		</div>
		<script type="text/javascript">

			// Only show the "remove image" button when needed
			if ( ! jQuery( '#product_cat_sizechart_img_id' ).val() ) {
				jQuery( '#remove_sizechart_image_button' ).hide();
			}

			// Uploading files
			var sizechart_frame;

			jQuery( document ).on( 'click', '#upload_sizechart_image_button', function( event ) {

				event.preventDefault();

				// If the media frame already exists, reopen it.
				if ( sizechart_frame ) {
					sizechart_frame.open();
					return;
				}

				// Create the media frame.
				sizechart_frame = wp.media.frames.downloadable_file = wp.media({
					title: '<?php esc_html_e( 'Choose an image', 'snakepit' ); ?>',
					button: {
						text: '<?php esc_html_e( 'Use image', 'snakepit' ); ?>'
					},
					multiple: false
				} );

				// When an image is selected, run a callback.
				sizechart_frame.on( 'select', function() {
					var attachment           = sizechart_frame.state().get( 'selection' ).first().toJSON();
					var attachment_thumbnail = attachment.sizes.thumbnail || attachment.sizes.full;

					jQuery( '#product_cat_sizechart_img_id' ).val( attachment.id );
					jQuery( '#sizechart_img' ).find( 'img' ).attr( 'src', attachment_thumbnail.url );
					jQuery( '#remove_sizechart_image_button' ).show();
				} );

				// Finally, open the modal.
				sizechart_frame.open();
			} );

			jQuery( document ).on( 'click', '#remove_sizechart_image_button', function() {
				jQuery( '#sizechart_img' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
				jQuery( '#product_cat_sizechart_img_id' ).val( '' );
				jQuery( '#remove_sizechart_image_button' ).hide();
				return false;
			} );

			jQuery( document ).ajaxComplete( function( event, request, options ) {
				if ( request && 4 === request.readyState && 200 === request.status
					&& options.data && 0 <= options.data.indexOf( 'action=add-tag' ) ) {

					var res = wpAjax.parseAjaxResponse( request.responseXML, 'ajax-response' );
					if ( ! res || res.errors ) {
						return;
					}
					// Clear Thumbnail fields on submit
					jQuery( '#sizechart_img' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
					jQuery( '#product_cat_sizechart_img_id' ).val( '' );
					jQuery( '#remove_sizechart_image_button' ).hide();
					// Clear Display type field on submit
					jQuery( '#display_type' ).val( '' );
					return;
				}
			} );

		</script>
		<div class="clear"></div>
	</div>
	<?php
}
add_action( 'product_cat_add_form_fields', 'snakepit_add_category_fields', 100 );

/**
 * Edit category thumbnail field.
 *
 * @param mixed $term Term (category) being edited
 */
function snakepit_edit_category_fields( $term ) {

	$sizechart_id = absint( get_term_meta( $term->term_id, 'sizechart_id', true ) );

	if ( $sizechart_id ) {
		$image = wp_get_attachment_thumb_url( $sizechart_id );
	} else {
		$image = wc_placeholder_img_src();
	}
	?>
	<tr class="form-field">
		<th scope="row" valign="top"><label><?php esc_html_e( 'Size Chart', 'snakepit' ); ?></label></th>
		<td>
			<div id="sizechart_img" style="float: left; margin-right: 10px;"><img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px" /></div>
			<div style="line-height: 60px;">
				<input type="hidden" id="product_cat_sizechart_img_id" name="product_cat_sizechart_img_id" value="<?php echo absint( $sizechart_id ); ?>" />
				<button type="button" id="upload_sizechart_image_button" class="upload_sizechart_image_button button"><?php esc_html_e( 'Upload/Add image', 'snakepit' ); ?></button>
				<button type="button" id="remove_sizechart_image_button" class="remove_sizechart_image_button button" style="display:none;"><?php esc_html_e( 'Remove image', 'snakepit' ); ?></button>
			</div>
			<script type="text/javascript">

				// Only show the "remove image" button when needed
				if ( jQuery( '#product_cat_sizechart_img_id' ).val() ) {
					jQuery( '#remove_sizechart_image_button' ).show();
				}

				// Uploading files
				var sizechart_frame;

				jQuery( document ).on( 'click', '#upload_sizechart_image_button', function( event ) {

					event.preventDefault();

					// If the media frame already exists, reopen it.
					if ( sizechart_frame ) {
						sizechart_frame.open();
						return;
					}

					// Create the media frame.
					sizechart_frame = wp.media.frames.downloadable_file = wp.media({
						title: '<?php esc_html_e( 'Choose an image', 'snakepit' ); ?>',
						button: {
							text: '<?php esc_html_e( 'Use image', 'snakepit' ); ?>'
						},
						multiple: false
					} );

					// When an image is selected, run a callback.
					sizechart_frame.on( 'select', function() {
						var attachment           = sizechart_frame.state().get( 'selection' ).first().toJSON();
						var attachment_thumbnail = attachment.sizes.thumbnail || attachment.sizes.full;

						jQuery( '#product_cat_sizechart_img_id' ).val( attachment.id );
						jQuery( '#sizechart_img' ).find( 'img' ).attr( 'src', attachment_thumbnail.url );
						jQuery( '#remove_sizechart_image_button' ).show();
					} );

					// Finally, open the modal.
					sizechart_frame.open();
				} );

				jQuery( document ).on( 'click', '#remove_sizechart_image_button', function() {
					jQuery( '#sizechart_img' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
					jQuery( '#product_cat_sizechart_img_id' ).val( '' );
					jQuery( '#remove_sizechart_image_button' ).hide();
					return false;
				} );

			</script>
			<div class="clear"></div>
		</td>
	</tr>
	<?php
}
add_action( 'product_cat_edit_form_fields', 'snakepit_edit_category_fields', 100 );

/**
 * save_category_fields function.
 *
 * @param mixed  $term_id Term ID being saved
 * @param mixed  $tt_id
 * @param string $taxonomy
 */
function snakepit_save_category_fields( $term_id, $tt_id = '', $taxonomy = '' ) {

	if ( isset( $_POST['product_cat_sizechart_img_id'] ) && 'product_cat' === $taxonomy ) {
		update_woocommerce_term_meta( $term_id, 'sizechart_id', absint( $_POST['product_cat_sizechart_img_id'] ) );
	}
}
add_action( 'created_term', 'snakepit_save_category_fields', 10, 3 );
add_action( 'edit_term', 'snakepit_save_category_fields', 10, 3 );

/*
----------------------------------------------------------------------------------

	Player function

--------------------------------------------------------------------------------------
*/
/**
 * Minimal player
 *
 * Displays a play/pause audio player on product grid
 */
function snakepit_minimal_player( $post_id = null ) {
	$post_id    = ( $post_id ) ? $post_id : get_the_ID();
	$audio_meta = get_post_meta( get_the_ID(), '_post_product_mp3', true );
	$rand       = rand( 0, 99999 );

	if ( ! $audio_meta ) {
		return;
	}
	?>
	<a href="#" class="minimal-player-play-button">
	<i class="minimal-player-icon minimal-player-play"></i><i class="minimal-player-icon minimal-player-pause"></i>
	</a>
	<audio class="minimal-player-audio" id="minimal-player-audio-<?php echo absint( $rand ); ?>" src="<?php echo esc_url( $audio_meta ); ?> "></audio>
	<?php
}

/**
 * Add label
 */
function snakepit_add_single_product_page_label() {

	$output = '';
	$label  = get_post_meta( get_the_ID(), '_post_product_mp3_label', true );

	if ( $label ) {
		echo '<span class="single-product-song-label">' . $label . '</span>';
	}

	echo snakepit_kses( $output );
}
add_action( 'woocommerce_single_product_summary', 'snakepit_add_single_product_page_label', 15 );

/**
 * Add MP3 player on single product page
 */
function snakepit_add_audio_player_on_single_product_page() {

	$output      = '';
	$playlist_id = get_post_meta( get_the_ID(), '_post_product_playlist_id', true );
	$hide_audio  = get_post_meta( get_the_ID(), '_post_wc_product_hide_mp3_player', true );
	$audio_meta  = get_post_meta( get_the_ID(), '_post_product_mp3', true );

	if ( $audio_meta && ! $hide_audio && ! $playlist_id ) {
		$audio_attrs = array(
			'src'      => esc_url( $audio_meta ),
			'loop'     => false,
			'autoplay' => false,
			'preload'  => 'auto',
		);

		$output = wp_audio_shortcode( $audio_attrs );
	}

	echo snakepit_kses( $output );
}
add_action( 'woocommerce_single_product_summary', 'snakepit_add_audio_player_on_single_product_page', 15 );

/**
 * Add MP3 player on single product page
 */
function snakepit_add_wpm_playlist_on_single_product_page() {

	$playlist_id = get_post_meta( get_the_ID(), '_post_product_playlist_id', true );
	$skin        = get_post_meta( get_the_ID(), '_post_sticky_playlist_skin', true );

	if ( $playlist_id ) {

		$attrs = array(
			// 'show_tracklist' => false,
			// 'is_sticky_player' => true,
		);

		if ( $skin ) {
			$attrs['theme'] = $skin;
		}

		if ( function_exists( 'wpm_playlist' ) ) {
			wpm_playlist( $playlist_id, $attrs );
		}
	}
}
add_action( 'woocommerce_single_product_summary', 'snakepit_add_wpm_playlist_on_single_product_page', 15 );

/**
 * Custom calendar date format
 */
function snakepit_custom_date( $date = '' ) {

	$date = ( $date ) ? $date : get_the_date( 'Y/m/d' );

	list( $year, $monthnbr, $day ) = explode( '/', $date );
	$search                        = array( '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12' );
	$replace                       = array( esc_html__( 'Jan', 'snakepit' ), esc_html__( 'Feb', 'snakepit' ), esc_html__( 'Mar', 'snakepit' ), esc_html__( 'Apr', 'snakepit' ), esc_html__( 'May', 'snakepit' ), esc_html__( 'Jun', 'snakepit' ), esc_html__( 'Jul', 'snakepit' ), esc_html__( 'Aug', 'snakepit' ), esc_html__( 'Sep', 'snakepit' ), esc_html__( 'Oct', 'snakepit' ), esc_html__( 'Nov', 'snakepit' ), esc_html__( 'Dec', 'snakepit' ) );
	$month                         = str_replace( $search, $replace, $monthnbr );

	$output = '<div class="date-format-custom wvc-bigtext"><span class="custom-date-day">' . $day . '</span><span class="custom-date-month">' . $month . '</span>';

	if ( 1 < absint( date( 'Y' ) ) - $year ) {
		$output .= '<span class="custom-date-year">' . $year . '</span>';
	}

	$output .= '</div>';

	return $output;
}
