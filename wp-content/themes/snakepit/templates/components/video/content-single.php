<?php
/**
 * Template part for displaying single video content
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
		 * The post content
		 */
		the_content();

		/**
		 * Video Meta
		 */
		do_action( 'snakepit_video_meta' );

		/**
		 * Share icon meta
		 */
		do_action( 'snakepit_share' );
	?>
</article><!-- #post-## -->