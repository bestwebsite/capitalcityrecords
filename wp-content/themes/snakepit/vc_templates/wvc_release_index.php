<?php
/**
 * Release index WPBakery Page Builder Template
 *
 * The arguments are passed to the snakepit_posts hook so we can do whatever we want with it
 *
 * @author WolfThemes
 * @category Core
 * @package Snakepit/Templates
 * @version 1.2.7
 */

defined( 'ABSPATH' ) || exit;

/* retrieve shortcode attributes */
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$atts['post_type'] = 'release';

/* hook passing VC arguments */
do_action( 'snakepit_posts', $atts );
