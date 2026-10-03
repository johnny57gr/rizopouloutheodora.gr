<?php
/** Check draft replacement without overwriting client edits. */
define( 'ABSPATH', __DIR__ );
function add_action( $hook, $callback ) {}
function add_filter( $hook, $callback, $priority, $args ) {}
function get_option( $name ) { return 12; }
require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/inc/project.php';
$cases = array(
 array( 'Παιδιά / Έφηβοι', 12, 'tr_service_3_title', 'Έφηβοι' ),
 array( 'Δική μου διατύπωση', 12, 'tr_service_3_title', 'Δική μου διατύπωση' ),
 array( '', 12, 'tr_service_3_title', '' ),
 array( 'Παιδιά / Έφηβοι', 20, 'tr_service_3_title', 'Παιδιά / Έφηβοι' ),
 array( 99, 12, 'tr_about_image', 99 ),
 array( 'https://example.test/service/', 12, 'tr_service_3_link', 'https://example.test/service/' ),
);
foreach ( $cases as $case ) {
 if ( $case[3] !== custom_starter_home_refresh_copy( $case[0], $case[1], array( 'name' => $case[2] ) ) ) {
  throw new RuntimeException( 'Homepage draft replacement failed.' );
 }
}
echo "Homepage copy checks passed.\n";

function post_password_required( $id ) { return false; }
function metadata_exists( $type, $id, $name ) { return array_key_exists( $name, $GLOBALS['contact_saved'] ); }
function get_field( $name, $id ) { return $GLOBALS['contact_saved'][ $name ]; }
$GLOBALS['contact_saved'] = array( 'tr_phone' => '+30 697 000 0000', 'tr_email' => 'old@example.test' );
if ( 'tel:+306984565423' !== custom_starter_phone_url() || 'rizopouloutheodora@gmail.com' !== custom_starter_home_value( 'email' ) ) {
 throw new RuntimeException( 'Confirmed contacts must replace saved mockup details.' );
}
$GLOBALS['contact_saved']['tr_contact_confirmed_email'] = 'updated@example.test';
if ( 'updated@example.test' !== custom_starter_home_value( 'email' ) ) {
 throw new RuntimeException( 'Future contact edits must remain editable.' );
}
echo "Confirmed contact checks passed.\n";

foreach ( array( '', '6984565423', '+30 698 456 5423', '00306984565423' ) as $number ) {
 $GLOBALS['contact_saved']['tr_viber'] = $number;
 if ( 'viber://chat?number=%2B306984565423' !== custom_starter_viber_url() ) {
  throw new RuntimeException( 'Viber fallback or normalization failed.' );
 }
}
$GLOBALS['contact_saved']['tr_viber'] = 'invalid';
if ( '' !== custom_starter_viber_url() ) { throw new RuntimeException( 'Reject invalid Viber numbers.' ); }
echo "Viber link checks passed.\n";

// Confirm supplied social profiles override old saved placeholders and remain editable.
$GLOBALS['contact_saved']['tr_facebook'] = 'https://example.test/old';
if ( 'https://www.facebook.com/p/%CE%A1%CE%B9%CE%B6%CE%BF%CF%80%CE%BF%CF%8D%CE%BB%CE%BF%CF%85-%CE%98%CE%B5%CE%BF%CE%B4%CF%8E%CF%81%CE%B1-%CE%A8%CF%85%CF%87%CE%BF%CE%BB%CF%8C%CE%B3%CE%BF%CF%82-%CE%A8%CF%85%CF%87%CE%BF%CE%B8%CE%B5%CF%81%CE%B1%CF%80%CE%B5%CF%8D%CF%84%CF%81%CE%B9%CE%B1-61582944533827/' !== custom_starter_home_value( 'facebook' ) ) { throw new RuntimeException( 'Incorrect confirmed social URL.' ); }
$GLOBALS['contact_saved']['tr_contact_confirmed_facebook'] = 'https://example.test/new';
if ( 'https://example.test/new' !== custom_starter_home_value( 'facebook' ) ) { throw new RuntimeException( 'Social URL must stay editable.' ); }
$GLOBALS['contact_saved']['tr_linkedin'] = 'https://example.test/old';
if ( 'https://www.linkedin.com/in/%CF%81%CE%B9%CE%B6%CE%BF%CF%80%CE%BF%CF%8D%CE%BB%CE%BF%CF%85-%CE%B8%CE%B5%CE%BF%CE%B4%CF%8E%CF%81%CE%B1-%CF%88%CF%85%CF%87%CE%BF%CE%BB%CF%8C%CE%B3%CE%BF%CF%82-%CF%88%CF%85%CF%87%CE%BF%CE%B8%CE%B5%CF%81%CE%B1%CF%80%CE%B5%CF%8D%CF%84%CF%81%CE%B9%CE%B1-3b9a80221/?locale=el' !== custom_starter_home_value( 'linkedin' ) ) { throw new RuntimeException( 'Incorrect confirmed social URL.' ); }
$GLOBALS['contact_saved']['tr_contact_confirmed_linkedin'] = 'https://example.test/new';
if ( 'https://example.test/new' !== custom_starter_home_value( 'linkedin' ) ) { throw new RuntimeException( 'Social URL must stay editable.' ); }
