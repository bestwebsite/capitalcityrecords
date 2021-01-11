<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing divs of the main content and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

?>
						</div><!-- .content-wrapper -->
					</div><!-- .content-inner -->
					<?php
						/**
						 * Hook to add content block
						 * snakepit_after_content
						 */
						do_action( 'snakepit_before_footer_block' );
					?>
				</div><!-- .site-content -->
			</div><!-- #main -->
		</div><!-- #page-content -->
		<div class="clear"></div>
		<?php
			/**
			 * Before footer hook
			 */
			do_action( 'snakepit_footer_before' );

		if ( 'hidden' !== snakepit_get_inherit_mod( 'footer_type' ) && is_active_sidebar( 'sidebar-footer' ) ) :
			?>
			<footer id="colophon" class="<?php echo apply_filters( 'snakepit_site_footer_class', '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped,Generic.Files.EndFileNewline.NotFound ?> site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
				<div class="footer-inner clearfix">
					<?php get_sidebar( 'footer' ); ?>
				</div><!-- .footer-inner -->
			</footer><!-- footer#colophon .site-footer -->
		<?php endif; ?>
		<?php

			/**
			 * Fires the Snakepit bottom bar
			 */
			do_action( 'snakepit_bottom_bar' );
		?>
	</div><!-- #page .hfeed .site -->
</div><!-- .site-container -->
<?php
	/**
	 * Fires the Snakepit bottom bar
	 */
	do_action( 'snakepit_body_end' );
?>
<?php wp_footer(); ?>
</body>
</html>
