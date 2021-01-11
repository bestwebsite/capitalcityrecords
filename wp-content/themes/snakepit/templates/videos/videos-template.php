<?php
/**
 * The videos template file.
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
					'el_id' => 'videos-index',
					'post_type' => 'video',
					'videos_per_page' => snakepit_get_theme_mod( 'videos_per_page', '' ),
					'pagination' => snakepit_get_theme_mod( 'video_pagination', '' ),
					'grid_padding' => snakepit_get_theme_mod( 'video_grid_padding', 'yes' ),
					'item_animation' => snakepit_get_theme_mod( 'video_item_animation' ),
				) );
			?>
		</main><!-- #content -->
	</div><!-- #primary -->
<?php
get_sidebar( 'videos' );
get_footer();
?>