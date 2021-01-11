<?php
/**
 * Template part for displaying related posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */
?>
<article <?php snakepit_post_attr(); ?>>
	<?php
		/**
		 * Output related post content
		 */
		do_action( 'snakepit_related_post_content' );
	?>
</article><!-- #post-## -->