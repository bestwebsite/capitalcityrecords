<?php
/**
 * Displays sidebar content
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

if ( snakepit_is_woocommerce_page() ) {

	dynamic_sidebar( 'sidebar-shop' );

} else {

	if ( function_exists( 'wolf_sidebar' ) ) {

		wolf_sidebar();

	} else {

		dynamic_sidebar( 'sidebar-page' );
	}
}