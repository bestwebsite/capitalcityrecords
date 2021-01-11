<?php
/**
 * The template for displaying search forms
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

?>

<?php $snakepit_unique_id = uniqid( 'search-form-' ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $snakepit_unique_id ); ?>">
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'snakepit' ); ?></span>
	</label>
	<input type="search" id="<?php echo esc_attr( $snakepit_unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr( apply_filters( 'snakepit_searchform_placeholder', esc_attr_x( 'Type and hit enter&hellip;', 'placeholder', 'snakepit' ) ) ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo esc_attr_x( 'Type and hit enter', 'submit button', 'snakepit' ); ?></span></button>
</form>
