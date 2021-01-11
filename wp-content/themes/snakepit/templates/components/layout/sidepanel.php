<?php
/**
 * Displays side panel
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */
$sp_classes = apply_filters( 'snakepit_side_panel_class', '' );
?>
<div class="side-panel <?php echo snakepit_sanitize_html_classes( $sp_classes ) ?>">
	<div class="side-panel-inner">
		<?php
			/* Side Panel start hook */
			do_action( 'snakepit_sidepanel_start' );
		
			get_sidebar( 'side-panel' );
		?>
	</div><!-- .side-panel-inner -->
</div><!-- .side-panel -->