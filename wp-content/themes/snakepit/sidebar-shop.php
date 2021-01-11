<?php
/**
 * The sidebar containing the shop widget areas.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

if ( is_active_sidebar( 'sidebar-shop' ) ) : ?>
	<div id="secondary" class="sidebar-container sidebar-shop" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<div class="sidebar-inner">
			<div class="widget-area">
				<?php get_template_part( snakepit_get_template_url() . '/components/layout/sidebar', 'content' ); ?>
			</div><!-- .widget-area -->
		</div><!-- .sidebar-inner -->
	</div><!-- #secondary .sidebar-container -->
<?php endif; ?>
