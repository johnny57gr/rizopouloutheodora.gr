<?php
/** ACF Free, exact Word copy, discovery, rendering and password checks. */
define( 'ABSPATH', __DIR__ );
$groups = array(); $saved = array(); $protected = false; $calls = array();
function add_action( $hook, $callback ) {}
function add_filter( $hook, $callback, $priority, $args ) {}
function get_queried_object_id() { return 80; }
function metadata_exists( $type, $id, $name ) { return array_key_exists( $name, $GLOBALS['saved'] ); }
function get_field( $name, $id ) { return $GLOBALS['saved'][ $name ]; }
function acf_add_local_field_group( $group ) { $GLOBALS['groups'][] = $group; }
function get_posts( $args ) {
 if ( 'publish' !== $args['post_status'] ) { throw new RuntimeException( 'Only published pages.' ); }
 return 'page-templates/couples-therapy.php' === $args['meta_value'] ? array( 80 ) : array();
}
function get_permalink( $id ) { return 'https://example.test/couples/'; }
function home_url( $path ) { return 'https://example.test' . $path; }
function get_header() {}
function get_footer() {}
function post_password_required() { return $GLOBALS['protected']; }
function get_the_password_form() { return '<form>Protected</form>'; }
function get_the_title() { return 'Ζεύγους'; }
function custom_starter_contact_page_url() { return 'https://example.test/contact/'; }
function custom_starter_phone_url() { return 'tel:+306984565423'; }
function custom_starter_home_value( $name ) { return ''; }
function absint( $value ) { return abs( (int) $value ); }
function wp_attachment_is_image( $id ) { return false; }
function get_theme_file_uri( $path ) { return 'https://example.test/' . $path; }
function get_template_part( $name, $slug = null, $args = array() ) {}
function esc_html( $value ) { return htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' ); }
function esc_attr( $value ) { return esc_html( $value ); }
function esc_url( $value ) { return esc_html( $value ); }
function esc_html_e( $value, $domain ) { echo esc_html( $value ); }
function esc_attr_e( $value, $domain ) { echo esc_attr( $value ); }
require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/inc/couples-therapy.php';
require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/inc/services.php';
function check_couples( $condition, $message ) { if ( ! $condition ) { throw new RuntimeException( $message ); } }
custom_starter_register_couples_fields();
$source = array(); $keys = array();
foreach ( custom_starter_couples_schema() as $group ) {
 foreach ( $group[1] as $name => $spec ) {
  if ( 'image' !== $spec[1] ) { $source[] = str_replace( "\r\n", "\n", $spec[2] ); }
 }
}
check_couples( 'd4f9fc2ca784d54a98b6cfc8d5457f3d8724227bb4815301265cbc829c9ae24f' === hash( 'sha256', implode( "\n", $source ) ), 'Every source paragraph and punctuation must match Word.' );
foreach ( $groups as $group ) {
 check_couples( 'page-templates/couples-therapy.php' === $group['location'][0][0]['value'], 'Wrong template scope.' );
 foreach ( $group['fields'] as $field ) {
  check_couples( ! isset( $keys[$field['key']] ), 'Duplicate key.' );
  $keys[$field['key']] = true;
  check_couples( in_array( $field['type'], array( 'image', 'text', 'textarea' ), true ), 'Non-Free field.' );
 }
}
check_couples( 19 === count( $keys ), 'Expected 19 fields.' );
check_couples( 'https://example.test/couples/' === custom_starter_service_detail_url( 2 ), 'Discover published couples page.' );
check_couples( '' === custom_starter_service_detail_url( 4 ), 'Do not invent online page.' );
ob_start(); require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/page-templates/couples-therapy.php'; $html = ob_get_clean();
$plain = html_entity_decode( strip_tags( $html ), ENT_QUOTES, 'UTF-8' );
$plain = preg_replace( '/\s+/u', ' ', $plain );
foreach ( $source as $paragraph ) {
 foreach ( explode( "\n", $paragraph ) as $line ) { check_couples( false !== strpos( $plain, $line ), 'Missing visible source text.' ); }
}
check_couples( false !== strpos( $html, 'tel:+306984565423' ), 'Appointment calls shared mobile.' );
$saved['tr_couples_intro'] = '';
check_couples( '' === custom_starter_couples_value( 'intro' ), 'Preserve deliberate blank.' );
$saved['tr_couples_intro'] = array( 'unexpected' );
check_couples( '' === custom_starter_couples_value( 'intro' ), 'Reject non-scalar values.' );
$saved['tr_couples_goal_1'] = '<script>alert(1)</script>: unsafe';
ob_start(); require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/page-templates/couples-therapy.php'; $escaped = ob_get_clean();
check_couples( false === strpos( $escaped, '<script>' ), 'Escape labelled output.' );
$protected = true;
ob_start(); require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/page-templates/couples-therapy.php'; $html = ob_get_clean();
check_couples( false !== strpos( $html, 'Protected' ) && false === strpos( $html, 'couples-hero' ), 'Honor password protection.' );
echo "PASS: 19 ACF Free fields, exact Word copy, complete rendered content, discovery, escaping and password gate.\n";
