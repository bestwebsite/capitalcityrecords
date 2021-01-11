<?php
/**
 * The main navigation for mobile
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

if ( snakepit_do_onepage_menu() ) {

	echo snakepit_one_page_menu( 'mobile' );

} else {

	if ( has_nav_menu( 'mobile' ) ) {

		wp_nav_menu( snakepit_get_menu_args( 'mobile', 'mobile' ) );

	} else {
		wp_nav_menu( snakepit_get_menu_args( 'primary', 'mobile' ) );
	}
}