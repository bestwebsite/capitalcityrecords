<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
				 * Wolftheme_search_content_before hook
				 *
				 * @see inc/fontend/hooks.php
				 */
				do_action( 'snakepit_index_content_before' );

				/**
				 * Output post loop through hook so we can do the magic however we want
				 *
				 * @see inc/frontend/post.php
				 */
				do_action(
					'snakepit_posts',
					apply_filters(
						'snakepit_post_args', array(
							'post_index' => true,
							'el_id' => 'blog-index',
							'pagination' => snakepit_get_theme_mod( 'post_pagination', 'infinitescroll_trigger' ),
							'post_excerpt_type' => snakepit_get_theme_mod( 'post_excerpt_type', 'auto' ),
						)
					)
				);
				?>
		</main><!-- #content -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
