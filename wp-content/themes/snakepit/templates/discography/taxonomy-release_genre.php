<?php
/**
 * The "genre" taxonomy template file.
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */
get_header();
?>
	<div id="primary" class="content-area">
		<main id="content" class="clearfix">
			<?php
				/**
				 * Output post loop through hook so we can do the magic however we want
				 */
				do_action( 'snakepit_posts', array(
					'release_index' => true,
					'el_id' => 'discography-index',
					'post_type' => 'release',
					'pagination' => snakepit_get_theme_mod( 'release_pagination', '' ),
					'releases_per_page' => snakepit_get_theme_mod( 'releases_per_page', '' ),
					'grid_padding' => snakepit_get_theme_mod( 'release_grid_padding', 'yes' ),
					'item_animation' => snakepit_get_theme_mod( 'release_item_animation' ),
				) );
			?>
		</main><!-- #content -->
	</div><!-- #primary -->
<?php
get_sidebar( 'discography' );
get_footer();