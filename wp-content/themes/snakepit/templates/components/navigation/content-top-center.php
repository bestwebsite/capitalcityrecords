<?php
/**
 * Displays top center navigation type
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */
?>
<div class="logo-bar">
	<div class="logo-container">
		<?php
			/**
			 * Logo
			 */
			snakepit_logo();
		?>
	</div><!-- .logo-container -->
</div><!-- .logo-bar -->
<div id="nav-bar" class="nav-bar" data-menu-layout="top-center">
	<div class="flex-wrap">
		<?php
			if ( 'left' === snakepit_get_inherit_mod( 'side_panel_position' ) && snakepit_can_display_sidepanel() ) {
				/**
				 * Output sidepanel hamburger
				 */
				do_action( 'snakepit_sidepanel_hamburger' );
			}
		?>
		<nav class="menu-container" itemscope="itemscope"  itemtype="https://schema.org/SiteNavigationElement">
			<?php
				/**
				 * Menu
				 */
				snakepit_primary_desktop_navigation();
			?>
		</nav><!-- .menu-container -->
		<div class="cta-container">
			<?php
				/**
				 * Secondary menu hook
				 */
				do_action( 'snakepit_secondary_menu', 'desktop' );
			?>
		</div><!-- .cta-container -->
		<?php
			if ( 'right' === snakepit_get_inherit_mod( 'side_panel_position' ) && snakepit_can_display_sidepanel() ) {
				/**
				 * Output sidepanel hamburger
				 */
				do_action( 'snakepit_sidepanel_hamburger' );
			}
		?>
	</div><!-- .flex-wrap -->
</div><!-- #nav-bar -->