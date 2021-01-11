
<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
* @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */
?>
<article <?php snakepit_post_attr(); ?>>
	<a href="<?php the_permalink(); ?>" class="entry-link-mask"></a>
	<div class="entry-container">
		<div class="entry-box">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-image">
					<?php echo snakepit_post_thumbnail( 'snakepit-masonry' ); ?>
				</div><!-- .entry-image -->
			<?php endif; ?>
			<div class="entry-summary">
				<div class="entry-summary-inner">
					<?php if ( snakepit_get_post_type_name() ) : ?>
						<span class="entry-post-type-name"><?php echo snakepit_get_post_type_name(); ?></span>
					<?php endif; ?>
					<h2 class="entry-title">
						<?php the_title(); ?>
					</h2>
					<div class="entry-excerpt">
						<?php do_action( 'snakepit_post_search_excerpt' ); ?>
					</div><!-- .entry-excerpt -->
				</div><!-- .entry-summary-inner -->
			</div><!-- .entry-summary -->
		</div><!-- .entry-box -->
	</div><!-- .entry-container -->
</article><!-- #post-## -->