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
verify_individual( 17 === count( $keys ), 'Expected 17 ACF Free fields.' );
verify_individual( '' !== custom_starter_individual_value( 'cbt_text' ) && '' !== custom_starter_individual_value( 'act_text' ), 'Both approach defaults must exist.' );
$saved['tr_individual_cbt_text'] = 'Old shortened text';
verify_individual( 'Old shortened text' !== custom_starter_individual_value( 'cbt_text' ), 'Old draft must not override verbatim copy.' );
verify_individual( 'tr_individual_image' === custom_starter_individual_field_name( 'image' ), 'Retain image field.' );
$saved['tr_individual_exact_cbt_text'] = 'Saved custom copy';
verify_individual( 'Saved custom copy' === custom_starter_individual_value( 'cbt_text' ), 'Keep saved approach copy.' );
verify_individual( 4 === count( custom_starter_individual_topics() ), 'Expected four verbatim topics.' );
$saved['tr_individual_exact_title'] = '';
verify_individual( '' === custom_starter_individual_value( 'title' ), 'Saved empty title must stay empty.' );
$saved['tr_individual_exact_topics'] = " Πρώτο θέμα\r\n\r\n Δεύτερο θέμα \n";
verify_individual( array( 'Πρώτο θέμα', 'Δεύτερο θέμα' ) === custom_starter_individual_topics(), 'Trim topics and ignore empty lines.' );
$saved['tr_individual_exact_topics'] = '';
verify_individual( array() === custom_starter_individual_topics(), 'An empty list must remain empty.' );
echo 'PASS: ' . count( $keys ) . " service-specific Free fields and editable topics.\n";
