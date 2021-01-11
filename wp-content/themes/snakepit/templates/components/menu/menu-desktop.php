<?php
/**
 * The main navigation for desktop
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

if ( snakepit_do_onepage_menu() ) {

	echo snakepit_one_page_menu();

} else {
	wp_nav_menu( snakepit_get_menu_args() );
}
