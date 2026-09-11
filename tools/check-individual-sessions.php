<?php
/** Standalone checks for the service-specific ACF contract. */
define( 'ABSPATH', __DIR__ );
$groups = array();
$saved = array();
function add_action( $hook, $callback ) {}
function get_queried_object_id() { return 30; }
function metadata_exists( $type, $id, $name ) { return array_key_exists( $name, $GLOBALS['saved'] ); }
function get_field( $name, $id ) { return $GLOBALS['saved'][ $name ]; }
function acf_add_local_field_group( $group ) { $GLOBALS['groups'][] = $group; }
require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/inc/individual-sessions.php';
function verify_individual( $condition, $message ) {
	if ( ! $condition ) { throw new RuntimeException( $message ); }
}
custom_starter_register_individual_fields();
$keys = array();
foreach ( $groups as $group ) {
	verify_individual( 'page-templates/individual-sessions.php' === $group['location'][0][0]['value'], 'Fields must belong only to this service template.' );
	foreach ( $group['fields'] as $field ) {
		verify_individual( ! isset( $keys[ $field['key'] ] ), 'Duplicate key.' );
		$keys[ $field['key'] ] = true;
		verify_individual( in_array( $field['type'], array( 'text', 'textarea', 'image', 'url' ), true ), 'Non-Free field type.' );
	}
}
verify_individual( 6 === count( custom_starter_individual_topics() ), 'Expected six preview topics.' );
$saved['tr_individual_title'] = '';
verify_individual( '' === custom_starter_individual_value( 'title' ), 'Saved empty title must stay empty.' );
$saved['tr_individual_topics'] = " Πρώτο θέμα\r\n\r\n Δεύτερο θέμα \n";
verify_individual( array( 'Πρώτο θέμα', 'Δεύτερο θέμα' ) === custom_starter_individual_topics(), 'Trim topics and ignore empty lines.' );
$saved['tr_individual_topics'] = '';
verify_individual( array() === custom_starter_individual_topics(), 'An empty list must remain empty.' );
echo 'PASS: ' . count( $keys ) . " service-specific Free fields and editable topics.\n";
