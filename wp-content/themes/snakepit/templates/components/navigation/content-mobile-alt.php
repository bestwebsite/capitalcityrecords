<?php
/**
 * Displays mobile navigation
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */
?>
<div id="mobile-bar" class="nav-bar">
	<div class="flex-mobile-wrap">
		<div class="logo-container">
			<?php
				/**
				 * Logo
				 */
				snakepit_logo();
			?>
		</div><!-- .logo-container -->
		<div class="cta-container">
			<?php
				/**
				 * Secondary menu hook
				 */
				do_action( 'snakepit_secondary_menu', 'mobile' );
			?>
		</div><!-- .cta-container -->
		<div class="hamburger-container">
			<?php
				/**
				 * Menu hamburger icon
				 */
				snakepit_hamburger_icon( 'toggle-mobile-menu' );
			?>
		</div><!-- .hamburger-container -->
	</div><!-- .flex-wrap -->
</div><!-- #navbar-container -->