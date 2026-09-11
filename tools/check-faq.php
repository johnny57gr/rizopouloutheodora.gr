<?php
/** Standalone overview field and page-discovery checks. */
define( 'ABSPATH', __DIR__ );
$groups = array();
$saved = array();
function add_action( $hook, $callback ) {}
function get_queried_object_id() { return 40; }
function metadata_exists( $type, $id, $name ) { return array_key_exists( $name, $GLOBALS['saved'] ); }
function get_field( $name, $id ) { return $GLOBALS['saved'][ $name ]; }
function acf_add_local_field_group( $group ) { $GLOBALS['groups'][] = $group; }
function get_posts( $args ) {
	if ( 'publish' !== $args['post_status'] ) { throw new RuntimeException( 'Must query published pages only.' ); }
	return 'page-templates/faq.php' === $args['meta_value'] ? array( 50 ) : array();
}
function get_permalink( $id ) { return 'https://example.test/services/'; }
function home_url( $path ) { return 'https://example.test' . $path; }
require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/inc/faq.php';
function check_services( $condition, $message ) {
	if ( ! $condition ) { throw new RuntimeException( $message ); }
}
custom_starter_register_faq_fields();
$keys = array();
foreach ( $groups as $group ) {
	check_services( 'page-templates/faq.php' === $group['location'][0][0]['value'], 'Wrong template scope.' );
	foreach ( $group['fields'] as $field ) {
		check_services( ! isset( $keys[ $field['key'] ] ), 'Duplicate field key.' );
		$keys[ $field['key'] ] = true;
		check_services( in_array( $field['type'], array( 'text', 'textarea', 'image', 'url' ), true ), 'Non-Free field.' );
	}
}
check_services( 26 === count( $keys ), 'Expected 26 FAQ fields.' );
$saved['tr_faq_question_1_title'] = '';
check_services( '' === custom_starter_faq_value( 'question_1_title' ), 'Keep intentionally hidden questions.' );
$saved['tr_faq_question_2_answer'] = array( 'unexpected' );
check_services( '' === custom_starter_faq_value( 'question_2_answer' ), 'Reject non-scalar data.' );
check_services( '' !== custom_starter_faq_value( 'title' ), 'Defaults without saved metadata.' );
echo "PASS: FAQ fields, template scope, saved blanks and scalar values.\n";
