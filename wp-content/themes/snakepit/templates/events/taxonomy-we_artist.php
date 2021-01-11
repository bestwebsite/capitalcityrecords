<?php
/**
 * The "artist" taxonomy template file.
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
					'event_index' => true,
					'el_id' => 'events-index',
					'post_type' => 'event',
					'grid_padding' => snakepit_get_theme_mod( 'event_grid_padding', 'yes' ),
					'item_animation' => snakepit_get_theme_mod( 'event_item_animation' ),
				) );
			?>
		</main><!-- #content -->
	</div><!-- #primary -->
<?php
get_sidebar( 'events' );
get_footer();