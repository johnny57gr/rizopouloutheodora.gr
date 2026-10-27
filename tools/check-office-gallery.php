<?php
/** Check ACF Free registration and attachment selection. */
define( 'ABSPATH', __DIR__ );
$values = array();
$groups = array();
function add_action( $hook, $callback ) {}
function __( $text, $domain ) { return $text; }
function acf_add_local_field_group( $group ) { $GLOBALS['groups'][] = $group; }
function custom_starter_home_value( $name ) { return $GLOBALS['values'][ $name ] ?? ''; }
function absint( $value ) { return abs( (int) $value ); }
function wp_attachment_is_image( $id ) { return in_array( $id, array( 10, 20, 30 ), true ); }
require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/inc/office-gallery.php';
function check_gallery( $condition, $message ) { if ( ! $condition ) { throw new RuntimeException( $message ); } }
custom_starter_register_office_gallery_fields();
check_gallery( 6 === count( $groups[0]['fields'] ), 'Six optional ACF Free image fields.' );
check_gallery( 'front_page' === $groups[0]['location'][0][0]['value'], 'Only on the homepage.' );
foreach ( $groups[0]['fields'] as $field ) { check_gallery( 'image' === $field['type'] && 'id' === $field['return_format'], 'No Pro fields.' ); }
check_gallery( array() === custom_starter_office_gallery_ids(), 'No fake photos when empty.' );
$values = array( 'office_image' => 10 );
check_gallery( array( 10 ) === custom_starter_office_gallery_ids(), 'Use main uploaded office photo.' );
$values += array( 'office_gallery_1' => 20, 'office_gallery_2' => 20, 'office_gallery_3' => 999, 'office_gallery_6' => 30 );
check_gallery( array( 20, 30 ) === custom_starter_office_gallery_ids(), 'Keep order; skip duplicates, gaps and invalid files.' );
$values = array( 'office_image' => 999, 'office_gallery_1' => 999 );
check_gallery( array() === custom_starter_office_gallery_ids(), 'Reject non-image main photo too.' );
echo "PASS: ACF Free fields, ordered image selection, duplicates and safe fallback.\n";
