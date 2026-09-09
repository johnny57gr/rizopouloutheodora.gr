<?php
/**
 * Shared presentation helpers.
 *
 * @package Custom_Starter
 */

defined( 'ABSPATH' ) || exit;

/**
 * Use modification times during development, theme version otherwise.
 *
 * @param string $relative_path Theme-relative asset path.
 * @return string
 */
function custom_starter_asset_version( $relative_path ) {
	$path = get_theme_file_path( $relative_path );
	if ( defined( 'WP_DEBUG' ) && WP_DEBUG && is_file( $path ) ) {
		return (string) filemtime( $path );
	}
	return (string) wp_get_theme()->get( 'Version' );
}
