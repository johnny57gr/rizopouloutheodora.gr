<?php
/** Office photographs using image fields available in ACF Free. @package Custom_Starter */
defined( 'ABSPATH' ) || exit;

function custom_starter_register_office_gallery_fields() {
	$fields = array();
	for ( $number = 1; $number <= 6; $number++ ) {
		$name = 'tr_office_gallery_' . $number;
		$fields[] = array(
			'key' => 'field_' . $name,
			'name' => $name,
			'label' => sprintf( __( 'Φωτογραφία %d', 'custom-starter' ), $number ),
			'type' => 'image',
			'return_format' => 'id',
			'preview_size' => 'medium',
			'mime_types' => 'jpg,jpeg,png,webp',
			'instructions' => __( 'Επιλέξτε πραγματική φωτογραφία γραφείου. Τα κενά πεδία παραλείπονται. Συμπληρώστε εναλλακτικό κείμενο και προαιρετική λεζάντα στα Πολυμέσα.', 'custom-starter' ),
		);
	}
	acf_add_local_field_group( array(
		'key' => 'group_tr_office_gallery',
		'title' => __( 'Ο χώρος μου — Συλλογή φωτογραφιών', 'custom-starter' ),
		'fields' => $fields,
		'description' => __( 'Έως έξι φωτογραφίες με τη σειρά που θέλετε να εμφανίζονται. Αν μείνουν όλες κενές, χρησιμοποιείται η κύρια πραγματική φωτογραφία της ενότητας «Ο χώρος μου».', 'custom-starter' ),
		'location' => array( array( array( 'param' => 'page_type', 'operator' => '==', 'value' => 'front_page' ) ) ),
	) );
}
add_action( 'acf/init', 'custom_starter_register_office_gallery_fields' );

/** Ignore empty, duplicate or non-image attachments; never use generated placeholders. */
function custom_starter_office_gallery_ids() {
	$ids = array();
	for ( $number = 1; $number <= 6; $number++ ) {
		$id = absint( custom_starter_home_value( 'office_gallery_' . $number ) );
		if ( $id && wp_attachment_is_image( $id ) ) { $ids[] = $id; }
	}
	if ( ! $ids ) {
		$id = absint( custom_starter_home_value( 'office_image' ) );
		if ( $id && wp_attachment_is_image( $id ) ) { $ids[] = $id; }
	}
	return array_values( array_unique( $ids ) );
}
