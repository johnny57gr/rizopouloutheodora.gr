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
	return 'page-templates/biography.php' === $args['meta_value'] ? array( 50 ) : array();
}
function get_permalink( $id ) { return 'https://example.test/services/'; }
function home_url( $path ) { return 'https://example.test' . $path; }
require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/inc/biography.php';
function check_services( $condition, $message ) {
	if ( ! $condition ) { throw new RuntimeException( $message ); }
}
custom_starter_register_biography_fields();
$keys = array();
foreach ( $groups as $group ) {
	check_services( 'page-templates/biography.php' === $group['location'][0][0]['value'], 'Wrong template scope.' );
	foreach ( $group['fields'] as $field ) {
		check_services( ! isset( $keys[ $field['key'] ] ), 'Duplicate field key.' );
		$keys[ $field['key'] ] = true;
		check_services( in_array( $field['type'], array( 'text', 'textarea', 'image', 'url', 'wysiwyg' ), true ), 'Non-Free field.' );
	}
}
check_services( 17 === count( $keys ), 'Expected 17 biography fields.' );
$saved['tr_biography_exact_approach_text'] = '';
check_services( '' === custom_starter_biography_value( 'approach_text' ), 'Keep intentionally hidden questions.' );
$saved['tr_biography_exact_education_text'] = array( 'unexpected' );
check_services( '' === custom_starter_biography_value( 'education_text' ), 'Reject non-scalar data.' );
check_services( '' !== custom_starter_biography_value( 'title' ), 'Defaults without saved metadata.' );
$GLOBALS['override'] = '';
function custom_starter_home_value( $name ) { return $GLOBALS['override']; }
require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/inc/services.php';
check_services( 'https://example.test/services/' === custom_starter_biography_page_url(), 'Find published biography.' );
$GLOBALS['override'] = 'https://example.test/custom-bio/';
check_services( $GLOBALS['override'] === custom_starter_biography_page_url(), 'Keep explicit homepage link.' );
echo "PASS: biography fields, template scope, saved blanks, scalar values and page discovery.\n";

function wp_strip_all_tags( $value ) { return strip_tags( $value ); }
$schema = custom_starter_biography_schema();
foreach ( array( 'education' => 3, 'training' => 2, 'experience' => 4, 'volunteering' => 2 ) as $section => $count ) {
	$raw = $schema[ $section ][1][ $section . '_text' ][2];
	$formatted = custom_starter_biography_group_content( $raw );
	check_services( strip_tags( $raw ) === strip_tags( $formatted ), 'Grouping must preserve every character.' );
	check_services( $count === substr_count( $formatted, 'class="biography-entry"' ), 'Wrong entry grouping: ' . $section );
	check_services( substr_count( $formatted, '<div' ) === substr_count( $formatted, '</div>' ), 'Unbalanced groups.' );
}
echo "PASS: entry grouping and verbatim text preservation.\n";
