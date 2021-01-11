<?php
/**
 * Template part for displaying posts with the "grid" display
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

extract( wp_parse_args( $template_args, array(
	'display' => 'grid',
	'post_excerpt_length' => 'shorten',
	'post_display_elements' => 'show_thumbnail,show_date,show_text,show_author,show_category',
) ) );

$post_display_elements = snakepit_list_to_array( $post_display_elements );
?>
<article <?php snakepit_post_attr(); ?>>
	<a href="<?php the_permalink(); ?>" class="entry-link-mask"></a>
	<div class="entry-box">
		<div class="entry-container">
			<?php
				/**
				 * Hook: snakepit_before_post_content_grid.
				 *
				 * @hooked snakepit_output_post_content_grid_sticky_label - 10
				 */
				do_action( 'snakepit_before_post_content_grid', $post_display_elements, $display );

				/**
				 * Hook: snakepit_before_post_content_grid_title.
				 *
				 * @hooked snakepit_output_post_content_grid_media - 10
				 * @hooked snakepit_output_post_content_grid_date - 10
				 */
				do_action( 'snakepit_before_post_content_grid_title', $post_display_elements );

				/**
				 * Hook: snakepit_post_content_grid_title.
				 *
				 * @hooked snakepit_output_post_grid_title - 10
				 */
				do_action( 'snakepit_post_content_grid_title', $post_display_elements, $display );

				/**
				 * Hook: snakepit_after_post_content_grid_title.
				 *
				 * @hooked snakepit_output_post_content_grid_excerpt - 10
				 */
				do_action( 'snakepit_after_post_content_grid_title', $post_display_elements, $post_excerpt_type );

				/**
				 * Hook: snakepit_after_post_content_grid.
				 *
				 * @hooked snakepit_output_post_content_grid_meta - 10
				 */
				do_action( 'snakepit_after_post_content_grid', $post_display_elements );
			?>
		</div><!-- .entry-container -->
	</div><!-- .entry-box -->
</article><!-- #post-## -->