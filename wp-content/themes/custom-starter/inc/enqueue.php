<?php
/**
 * Frontend assets.
 *
 * @package Custom_Starter
 */

defined( 'ABSPATH' ) || exit;

/** Enqueue the theme styles and native threaded-comment script. */
function custom_starter_enqueue_assets() {
	wp_enqueue_script( 'custom-starter-main', get_theme_file_uri( 'assets/js/main.js' ), array(), custom_starter_asset_version( 'assets/js/main.js' ), true );
	wp_enqueue_style( 'custom-starter', get_stylesheet_uri(), array(), custom_starter_asset_version( 'style.css' ) );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'custom_starter_enqueue_assets' );
