<?php
/** Standalone checks for the homepage field contract; no WordPress installation needed. */
define( 'ABSPATH', __DIR__ );
$saved = array();
$groups = array();
function add_action( $hook, $callback ) {}
function get_option( $name ) { return 12; }
function post_password_required( $id ) { return false; }
function metadata_exists( $type, $id, $name ) { return array_key_exists( $name, $GLOBALS['saved'] ); }
function get_field( $name, $id ) { return $GLOBALS['saved'][ $name ]; }
function acf_add_local_field_group( $group ) { $GLOBALS['groups'][] = $group; }
require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/inc/project.php';
function check( $condition, $message ) {
	if ( ! $condition ) { throw new RuntimeException( $message ); }
}
custom_starter_register_home_fields();
$keys = array();
foreach ( $groups as $group ) {
	check( 'front_page' === $group['location'][0][0]['value'], 'Fields must target the homepage.' );
	foreach ( $group['fields'] as $field ) {
		check( ! isset( $keys[ $field['key'] ] ), 'Duplicate ACF key.' );
		$keys[ $field['key'] ] = true;
		check( in_array( $field['type'], array( 'text', 'textarea', 'image', 'url', 'email' ), true ), 'Unsupported field type.' );
	}
}
check( '' !== custom_starter_home_value( 'hero_title' ), 'Missing design fallback.' );
$saved['tr_hero_title'] = '';
check( '' === custom_starter_home_value( 'hero_title' ), 'An intentionally empty field must stay empty.' );
$saved['tr_hero_title'] = 'Saved title';
check( 'Saved title' === custom_starter_home_value( 'hero_title' ), 'Saved data must override fallback.' );
check( 'tel:+306970000000' === custom_starter_phone_url(), 'Requested design phone fallback.' );
$saved['tr_phone'] = '';
check( 'tel:+306970000000' === custom_starter_phone_url(), 'Previously saved empty phones use the design fallback.' );
$saved['tr_phone'] = '+30 23310 12345';
check( 'tel:+302331012345' === custom_starter_phone_url(), 'Normalize phone formatting.' );
$saved['tr_phone'] = 'not a phone';
check( '' === custom_starter_phone_url(), 'Reject invalid phone.' );
echo 'PASS: ' . count( $keys ) . " unique ACF Free fields, saved values and phone links.\n";
