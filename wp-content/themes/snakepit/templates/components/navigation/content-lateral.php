<?php
/**
 * Displays lateral navigation type
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */
?>
<div class="lateral-menu-panel" data-menu-layout="lateral">
	<?php
		/**
		 * lateral_menu_panel_start hook
		 */
		do_action( 'snakepit_lateral_menu_panel_start' );
	?>
	<div class="lateral-menu-panel-inner">
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
				snakepit_primary_vertical_navigation();
			?>
		</nav>
		<?php if ( snakepit_is_wvc_activated() )  : ?>
			<div class="lateral-menu-socials">
				<?php echo wvc_socials( array(
					'alignment' => 'left',
					//'size' => 'fa-1x',
					'services' => snakepit_get_inherit_mod( 'menu_socials', 'facebook,twitter,instagram' ), ) ); ?>
			</div><!-- .lateral-menu-socials -->
		<?php endif; ?>
	</div><!-- .lateral-menu-panel-inner -->
</div><!-- .lateral-menu-panel -->