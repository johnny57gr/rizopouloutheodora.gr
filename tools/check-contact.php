<?php
/** Standalone checks for contact fields and map URL validation. */
define( 'ABSPATH', __DIR__ );
$groups = array();
$saved = array();
function add_action( $hook, $callback ) {}
function get_queried_object_id() { return 24; }
function metadata_exists( $type, $id, $name ) { return array_key_exists( $name, $GLOBALS['saved'] ); }
function get_field( $name, $id ) { return $GLOBALS['saved'][ $name ]; }
function wp_parse_url( $url ) { return parse_url( $url ); }
function acf_add_local_field_group( $group ) { $GLOBALS['groups'][] = $group; }
require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/inc/contact.php';
function verify_contact( $condition, $message ) {
	if ( ! $condition ) { throw new RuntimeException( $message ); }
}
custom_starter_register_contact_fields();
verify_contact( 'page-templates/contact.php' === $groups[0]['location'][0][0]['value'], 'Wrong template rule.' );
$keys = array();
foreach ( $groups[0]['fields'] as $field ) {
	verify_contact( ! isset( $keys[ $field['key'] ] ), 'Duplicate field key.' );
	$keys[ $field['key'] ] = true;
	verify_contact( in_array( $field['type'], array( 'message', 'text', 'textarea', 'number', 'url' ), true ), 'Non-free field type.' );
}
verify_contact( 'Ας μιλήσουμε' === custom_starter_contact_value( 'title' ), 'Missing default.' );
$saved['tr_contact_page_title'] = '';
verify_contact( '' === custom_starter_contact_value( 'title' ), 'Saved empty value was overwritten.' );
foreach ( array( 'https://www.google.com/maps/embed?pb=example', 'https://www.google.com/maps/embed/v1/place?q=Veria' ) as $url ) {
	verify_contact( custom_starter_valid_map_embed( $url ), 'Valid Google embed rejected.' );
}
foreach ( array( 'javascript:alert(1)', 'https://evil.test/maps/embed', 'https://www.google.com.evil.test/maps/embed', 'http://www.google.com/maps/embed', 'https://user@www.google.com/maps/embed', 'https://www.google.com:444/maps/embed', 'https://www.google.com/maps/embedevil' ) as $url ) {
	verify_contact( ! custom_starter_valid_map_embed( $url ), 'Unsafe embed accepted.' );
}
$map = custom_starter_contact_map_url( 'Βενιζέλου 27, Βέροια' );
verify_contact( false !== strpos( $map, rawurlencode( 'Βενιζέλου 27, Βέροια' ) ), 'Map address is not encoded.' );
echo "PASS: contact fields, saved values, trusted map embeds and address fallback.\n";
