<?php
/**
 * Snakepit shop
 *
 * @package WordPress
 * @subpackage Snakepit
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/**
 * Shop mods
 *
 * @param array $mods Array of mods.
 * @return array
 */
function snakepit_set_product_mods( $mods ) {

	if ( class_exists( 'WooCommerce' ) ) {
		$mods['shop'] = [
			'id' => 'shop',
			'title' => esc_html__( 'Shop', 'snakepit' ),
			'icon' => 'cart',
			'options' => [

				'product_layout' => [
					'id' => 'product_layout',
					'label' => esc_html__( 'Products Layout', 'snakepit' ),
					'type' => 'select',
					'choices' => [
						'standard' => esc_html__( 'Standard', 'snakepit' ),
						'sidebar-right' => esc_html__( 'Sidebar at right', 'snakepit' ),
						'sidebar-left' => esc_html__( 'Sidebar at left', 'snakepit' ),
						'fullwidth' => esc_html__( 'Full width', 'snakepit' ),
					],
					'transport' => 'postMessage',
				],

				'product_display' => [
					'id' =>'product_display',
					'label' => esc_html__( 'Products Archive Display', 'snakepit' ),
					'type' => 'select',
					'choices' => apply_filters( 'snakepit_product_display_options', [
						'grid_classic' => esc_html__( 'Grid', 'snakepit' ),
					] ),
				],
				'product_single_layout' => [
					'id' => 'product_single_layout',
					'label' => esc_html__( 'Single Product Layout', 'snakepit' ),
					'type' => 'select',
					'choices' => [
						'standard' => esc_html__( 'Standard', 'snakepit' ),
						'sidebar-right' => esc_html__( 'Sidebar at right', 'snakepit' ),
						'sidebar-left' => esc_html__( 'Sidebar at left', 'snakepit' ),
						'fullwidth' => esc_html__( 'Full Width', 'snakepit' ),
					],
					'transport' => 'postMessage',
				],

				'product_columns' => [
					'id' => 'product_columns',
					'label' => esc_html__( 'Columns', 'snakepit' ),
					'type' => 'select',
					'choices' => [
						'default' => esc_html__( 'Auto', 'snakepit' ),
						3 => 3,
						2 => 2,
						4 => 4,
						6 => 6,
					],
				],

				'product_item_animation' => [
					'label' => esc_html__( 'Shop Archive Item Animation', 'snakepit' ),
					'id' => 'product_item_animation',
					'type' => 'select',
					'choices' => snakepit_get_animations(),
				],

				'product_zoom' => [
					'label' => esc_html__( 'Single Product Zoom', 'snakepit' ),
					'id' => 'product_zoom',
					'type' => 'checkbox',
				],

				'related_products_carousel' => [
					'label' => esc_html__( 'Related Products Carousel', 'snakepit' ),
					'id' => 'related_products_carousel',
					'type' => 'checkbox',
				],

				'cart_menu_item' => [
					'label' => esc_html__( 'Add a "Cart" Menu Item', 'snakepit' ),
					'id' => 'cart_menu_item',
					'type' => 'checkbox',
				],

				'account_menu_item' => [
					'label' => esc_html__( 'Add a "Account" Menu Item', 'snakepit' ),
					'id' => 'account_menu_item',
					'type' => 'checkbox',
				],

				'shop_search_menu_item' => [
					'label' => esc_html__( 'Search Menu Item', 'snakepit' ),
					'id' => 'shop_search_menu_item',
					'type' => 'checkbox',
				],

				'products_per_page' => [
					'label' => esc_html__( 'Products per Page', 'snakepit' ),
					'id' => 'products_per_page',
					'type' => 'text',
					'placeholder' => 12,
				],
			],
		];
	}

	if ( class_exists( 'Wolf_WooCommerce_Wishlist' ) && class_exists( 'WooCommerce' ) ) {
		$mods['shop']['options']['wishlist_menu_item'] = [
				'label' => esc_html__( 'Wishlist Menu Item', 'snakepit' ),
				'id' => 'wishlist_menu_item',
				'type' => 'checkbox',
		];
	}

	return $mods;
}
add_filter( 'snakepit_customizer_mods', 'snakepit_set_product_mods' );
