<?php
/** FAQ field contract, approved client copy and rendered-page checks. */
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
$saved['tr_faq_client_question_1_title'] = '';
check_services( '' === custom_starter_faq_value( 'question_1_title' ), 'Keep intentionally hidden questions.' );
$saved['tr_faq_client_question_2_answer'] = array( 'unexpected' );
check_services( '' === custom_starter_faq_value( 'question_2_answer' ), 'Reject non-scalar data.' );
check_services( '' !== custom_starter_faq_value( 'title' ), 'Defaults without saved metadata.' );
echo "PASS: FAQ fields, template scope, saved blanks and scalar values.\n";

// A fingerprint of all 20 nonempty source paragraphs, including the eight questions.
$paragraphs = array();
$schema = custom_starter_faq_schema();
for ( $number = 1; $number <= 8; $number++ ) {
 $prefix = 'question_' . $number;
 $paragraphs[] = $schema[$prefix][1][$prefix . '_title'][2];
 foreach ( preg_split( '/\R\s*\R/u', $schema[$prefix][1][$prefix . '_answer'][2] ) as $paragraph ) { $paragraphs[] = $paragraph; }
}
check_services( 'f3abc4fe2dee2dd3bc13b2f5cff5f606594d8bb865c600e81bd073a770ba33b5' === hash( 'sha256', implode( "\n", $paragraphs ) ), 'Approved Word text must match exactly.' );
$saved = array( 'tr_faq_question_1_title' => 'Old demonstration question', 'tr_faq_image' => 42 );
check_services( $schema['question_1'][1]['question_1_title'][2] === custom_starter_faq_value( 'question_1_title' ), 'Old demo copy must not override approved copy.' );
check_services( '42' === custom_starter_faq_value( 'image' ), 'Keep selected photo.' );
$protected = false;
function get_header() {}
function get_footer() {}
function post_password_required() { return $GLOBALS['protected']; }
function get_the_password_form() { return '<form>Protected</form>'; }
function get_the_title() { return 'Συχνές ερωτήσεις'; }
function custom_starter_contact_page_url() { return 'https://example.test/contact/'; }
function custom_starter_phone_url() { return 'tel:+306984565423'; }
function esc_html( $value ) { return htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' ); }
function esc_attr( $value ) { return esc_html( $value ); }
function esc_url( $value ) { return esc_html( $value ); }
function esc_html_e( $value, $domain ) { echo esc_html( $value ); }
function esc_attr_e( $value, $domain ) { echo esc_attr( $value ); }
function wpautop( $value ) { return '<p>' . preg_replace( '/\R\s*\R/u', '</p><p>', $value ) . '</p>'; }
function absint( $value ) { return abs( (int) $value ); }
function wp_attachment_is_image( $id ) { return false; }
function get_theme_file_uri( $path ) { return 'https://example.test/' . $path; }
function get_template_part( $name, $slug = null, $args = array() ) {}
ob_start(); require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/page-templates/faq.php'; $html = ob_get_clean();
check_services( 8 === substr_count( $html, '<details class="faq-item"' ), 'Render all eight FAQs.' );
check_services( 1 === substr_count( $html, '<details class="faq-item" open' ), 'Only first answer initially open.' );
$plain = preg_replace( '/\s+/u', ' ', html_entity_decode( strip_tags( str_replace( '</p>', '</p> ', $html ) ), ENT_QUOTES, 'UTF-8' ) );
foreach ( $paragraphs as $paragraph ) { check_services( false !== strpos( $plain, $paragraph ), 'Missing Word paragraph in rendered page.' ); }
$saved['tr_faq_client_question_1_title'] = '';
$saved['tr_faq_client_question_2_answer'] = '<script>alert(1)</script>';
ob_start(); require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/page-templates/faq.php'; $html = ob_get_clean();
check_services( 7 === substr_count( $html, '<details class="faq-item"' ), 'Hidden questions stay hidden.' );
check_services( false === strpos( $html, '<script>' ) && false !== strpos( $html, '&lt;script&gt;' ), 'Escape answer markup.' );
$protected = true;
ob_start(); require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/page-templates/faq.php'; $html = ob_get_clean();
check_services( false !== strpos( $html, 'Protected' ) && false === strpos( $html, 'faq-questions' ), 'Honor page password gate.' );
echo "PASS: exact Word copy, eight rendered answers, paragraph breaks, draft isolation, escaping and password gate.\n";
