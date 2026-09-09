<?php
/**
 * Theme configuration.
 *
 * @package Custom_Starter
 */

defined( 'ABSPATH' ) || exit;

/** Register theme features and navigation locations. */
function custom_starter_setup() {
	load_theme_textdomain( 'custom-starter', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array( 'flex-width' => true, 'flex-height' => true ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'custom-starter' ),
			'footer'  => __( 'Footer Navigation', 'custom-starter' ),
		)
	);
}
add_action( 'after_setup_theme', 'custom_starter_setup' );
