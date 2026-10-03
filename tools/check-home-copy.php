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
