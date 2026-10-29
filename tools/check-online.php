<?php
/** ACF Free, exact client email copy, discovery, rendering and password checks. */
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
 return 'page-templates/online-therapy.php' === $args['meta_value'] ? array( 80 ) : array();
}
function get_permalink( $id ) { return 'https://example.test/online/'; }
function home_url( $path ) { return 'https://example.test' . $path; }
function get_header() {}
function get_footer() {}
function post_password_required() { return $GLOBALS['protected']; }
function get_the_password_form() { return '<form>Protected</form>'; }
function get_the_title() { return 'Online'; }
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
require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/inc/online-therapy.php';
require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/inc/services.php';
function check_online( $condition, $message ) { if ( ! $condition ) { throw new RuntimeException( $message ); } }
custom_starter_register_online_fields();
$source = array(); $keys = array();
foreach ( custom_starter_online_schema() as $group ) {
 foreach ( $group[1] as $name => $spec ) {
  if ( 'image' !== $spec[1] ) { $source[] = str_replace( "\r\n", "\n", $spec[2] ); }
 }
}
check_online( 'bfb894c76aa178317abb9455cf695871cca17e8842a012f31f6f692819f73f33' === hash( 'sha256', implode( ' ', $source ) ), 'Every source paragraph and punctuation must match client email.' );
foreach ( $groups as $group ) {
 check_online( 'page-templates/online-therapy.php' === $group['location'][0][0]['value'], 'Wrong template scope.' );
 foreach ( $group['fields'] as $field ) {
  check_online( ! isset( $keys[$field['key']] ), 'Duplicate key.' );
  $keys[$field['key']] = true;
  check_online( in_array( $field['type'], array( 'image', 'text', 'textarea' ), true ), 'Non-Free field.' );
 }
}
check_online( 6 === count( $keys ), 'Expected 6 fields.' );
check_online( 'https://example.test/online/' === custom_starter_service_detail_url( 4 ), 'Discover published online page.' );
check_online( '' === custom_starter_service_detail_url( 99 ), 'Do not invent unknown service page.' );
ob_start(); require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/page-templates/online-therapy.php'; $html = ob_get_clean();
$plain = html_entity_decode( strip_tags( $html ), ENT_QUOTES, 'UTF-8' );
$plain = preg_replace( '/\s+/u', ' ', $plain );
foreach ( $source as $paragraph ) {
 foreach ( explode( "\n", $paragraph ) as $line ) { check_online( false !== strpos( $plain, $line ), 'Missing visible source text.' ); }
}
check_online( false !== strpos( $html, 'tel:+306984565423' ), 'Appointment calls shared mobile.' );
$saved['tr_online_intro'] = '';
check_online( '' === custom_starter_online_value( 'intro' ), 'Preserve deliberate blank.' );
$saved['tr_online_intro'] = array( 'unexpected' );
check_online( '' === custom_starter_online_value( 'intro' ), 'Reject non-scalar values.' );
$saved['tr_online_relationship'] = '<script>alert(1)</script>: unsafe';
ob_start(); require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/page-templates/online-therapy.php'; $escaped = ob_get_clean();
check_online( false === strpos( $escaped, '<script>' ), 'Escape labelled output.' );
$protected = true;
ob_start(); require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/page-templates/online-therapy.php'; $html = ob_get_clean();
check_online( false !== strpos( $html, 'Protected' ) && false === strpos( $html, 'online-intro' ), 'Honor password protection.' );
echo "PASS: 6 ACF Free fields, exact client email copy, complete rendered content, discovery, escaping and password gate.\n";
