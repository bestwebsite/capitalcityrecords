<?php
/**
 * The sidebar containing the videos widget areas.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

if ( ! snakepit_display_sidebar() ) { // see inc/frontend/conditional-functions.php.
	return;
}
?>
<div id="secondary" class="sidebar-container sidebar-videos" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<div class="sidebar-inner">
		<div class="widget-area">
			<?php dynamic_sidebar( 'sidebar-videos' ); ?>
		</div><!-- .widget-area -->
	</div><!-- .sidebar-inner -->
</div><!-- #secondary .sidebar-container -->
