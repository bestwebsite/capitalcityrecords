<?php
/**
 * Displays top justify navigation type
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */
?>
<div id="nav-bar" class="nav-bar" data-menu-layout="top-justify">
	<div class="flex-wrap">
		<?php
			if ( 'left' === snakepit_get_inherit_mod( 'side_panel_position' ) && snakepit_can_display_sidepanel() ) {
				/**
				 * Output sidepanel hamburger
				 */
				do_action( 'snakepit_sidepanel_hamburger' );
			}
		?>
		<div class="logo-container">
			<?php
				/**
				 * Logo
				 */
				snakepit_logo();
			?>
		</div><!-- .logo-container -->
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
</div><!-- #navbar-container -->