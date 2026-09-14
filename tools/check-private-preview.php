<?php
/** Standalone revocation and validation checks, without WordPress credentials. */
define( 'ABSPATH', __DIR__ );
function add_action( $hook, $callback, $priority = 10 ) {}
function get_option( $key, $default ) { return $GLOBALS['invitation']; }
function wp_salt( $scheme ) { return 'test-installation-secret'; }
require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/inc/private-preview.php';
function expect_preview( $condition, $message ) {
	if ( ! $condition ) { throw new RuntimeException( $message ); }
}
$invitation = array( 'token' => str_repeat( 'a', 64 ), 'expires' => time() + 3600 );
$cookie = custom_starter_preview_signature( $invitation );
expect_preview( custom_starter_preview_cookie_valid( $cookie ), 'Valid invitation must pass.' );
expect_preview( ! custom_starter_preview_cookie_valid( $invitation['token'] ), 'Link token is not a cookie.' );
expect_preview( ! custom_starter_preview_cookie_valid( array( $cookie ) ), 'Array must fail.' );
expect_preview( ! custom_starter_preview_cookie_valid( $cookie . 'x' ), 'Tampering must fail.' );
$invitation['token'] = str_repeat( 'b', 64 );
expect_preview( ! custom_starter_preview_cookie_valid( $cookie ), 'Rotation must revoke existing browsers.' );
$invitation['expires'] = time() - 1;
expect_preview( ! custom_starter_preview_cookie_valid( custom_starter_preview_signature( $invitation ) ), 'Expired signature must fail.' );
$invitation = array();
expect_preview( ! custom_starter_preview_cookie_valid( $cookie ), 'Disabling must revoke access.' );
foreach ( array( false, 'bad', array( 'token' => array( 'x' ) ), array( 'token' => str_repeat( 'a', 64 ), 'expires' => array( 1 ) ) ) as $invalid ) {
	$invitation = $invalid;
	expect_preview( array() === custom_starter_preview_invitation(), 'Malformed stored data must fail closed.' );
}
echo "PASS: signed cookies, tampering, expiry, rotation, disable and malformed input.\n";
