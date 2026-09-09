<?php
/**
 * Frontend assets.
 *
 * @package Custom_Starter
 */

defined( 'ABSPATH' ) || exit;

/** Enqueue the theme styles and native threaded-comment script. */
function custom_starter_enqueue_assets() {
	wp_enqueue_style( 'custom-starter-header', get_theme_file_uri( 'assets/css/header.css' ), array( 'custom-starter-project' ), custom_starter_asset_version( 'assets/css/header.css' ) );
	wp_enqueue_style( 'custom-starter-project', get_theme_file_uri( 'assets/css/project.css' ), array( 'custom-starter-base' ), custom_starter_asset_version( 'assets/css/project.css' ) );
	wp_enqueue_script( 'custom-starter-navigation', get_theme_file_uri( 'assets/js/navigation.js' ), array(), custom_starter_asset_version( 'assets/js/navigation.js' ), true );
	wp_enqueue_style( 'custom-starter', get_stylesheet_uri(), array(), custom_starter_asset_version( 'style.css' ) );
	wp_enqueue_style( 'custom-starter-base', get_theme_file_uri( 'assets/css/base.css' ), array( 'custom-starter' ), custom_starter_asset_version( 'assets/css/base.css' ) );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'custom_starter_enqueue_assets' );
