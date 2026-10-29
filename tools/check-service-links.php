<?php
/** Verify real service links supersede old # placeholders without overriding custom destinations. */
define( 'ABSPATH', __DIR__ );
function add_action( $hook, $callback ) {}
function add_filter( $hook, $callback, $priority, $args ) {}
function home_url( $path ) { return 'https://example.test' . $path; }
function get_posts( $args ) { return 'page-templates/couples-therapy.php' === $args['meta_value'] ? array( 20 ) : array(); }
function get_permalink( $id ) { return 'https://example.test/couples/'; }
require dirname( __DIR__ ) . '/wp-content/themes/custom-starter/inc/services.php';
foreach ( array( '', '#', '/', '/#', 'https://example.test', 'https://example.test/', 'https://example.test/#', 'https://example.test#' ) as $placeholder ) {
 if ( 'https://example.test/couples/' !== custom_starter_service_target_url( 2, $placeholder ) ) { throw new RuntimeException( 'Placeholder blocks published detail page.' ); }
}
foreach ( array( 'https://example.test/custom-service/', '/custom-service/', '#contact', 'https://example.test/#office' ) as $custom ) {
 if ( $custom !== custom_starter_service_target_url( 2, $custom ) ) { throw new RuntimeException( 'Keep explicit non-placeholder links.' ); }
}
if ( '' !== custom_starter_service_target_url( 4, '#' ) ) { throw new RuntimeException( 'Do not invent missing pages.' ); }
echo "PASS: service placeholder recovery, custom URLs and missing-page handling.\n";
