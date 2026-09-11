<?php
/**
 * Contact page configuration, shared links and Ninja Forms integration.
 *
 * @package Custom_Starter
 */
defined( 'ABSPATH' ) || exit;

/** Defaults are shared by the editor and the template. */
function custom_starter_contact_schema() {
	return array(
		'title' => array( 'Κεντρικός τίτλος', 'text', 'Ας μιλήσουμε' ),
		'intro' => array( 'Εισαγωγικό κείμενο', 'textarea', 'Επικοινωνήστε μαζί μου για πληροφορίες ή για να προγραμματίσουμε μια συνάντηση.' ),
		'details_title' => array( 'Τίτλος στοιχείων', 'text', 'Στοιχεία επικοινωνίας' ),
		'form_title' => array( 'Τίτλος φόρμας', 'text', 'Στείλτε μου ένα μήνυμα' ),
		'form_id' => array( 'Ninja Forms — ID φόρμας', 'number', '' ),
		'map_title' => array( 'Τίτλος χάρτη', 'text', 'Πού θα με βρείτε' ),
		'map_address' => array( 'Διεύθυνση αναζήτησης στον χάρτη (προαιρετική)', 'text', '' ),
		'map_embed_url' => array( 'Google Maps embed URL (προαιρετικό)', 'url', '' ),
	);
}

/** Register ACF Free controls for the explicitly selected template. */
function custom_starter_register_contact_fields() {
	$fields = array(
		array(
			'key' => 'field_tr_contact_help',
			'type' => 'message',
			'label' => 'Κοινά στοιχεία επικοινωνίας',
			'message' => 'Τηλέφωνο, email, διεύθυνση, Viber και social αλλάζουν στη σελίδα Αρχική → Επικοινωνία και στοιχεία ιστοσελίδας. Η φόρμα δημιουργείται και ρυθμίζεται στο Ninja Forms.',
		),
	);
	foreach ( custom_starter_contact_schema() as $name => $spec ) {
		$field = array(
			'key' => 'field_tr_contact_page_' . $name,
			'name' => 'tr_contact_page_' . $name,
			'label' => $spec[0],
			'type' => $spec[1],
			'default_value' => $spec[2],
		);
		if ( 'textarea' === $spec[1] ) {
			$field['rows'] = 3;
			$field['new_lines'] = '';
		}
		if ( 'form_id' === $name ) {
			$field['min'] = 1;
			$field['step'] = 1;
			$field['instructions'] = 'Μόνο ο αριθμός από το shortcode, π.χ. 1 από το [ninja_form id="1"]. Ρυθμίστε τα πεδία και τις ειδοποιήσεις μέσα στο Ninja Forms.';
		}
		if ( 'map_embed_url' === $name ) {
			$field['instructions'] = 'Το https://www.google.com/maps/embed?... από το src της ενσωμάτωσης Google Maps, όχι ολόκληρο το iframe. Χωρίς URL εμφανίζεται αναζήτηση βάσει διεύθυνσης.';
		}
		$fields[] = $field;
	}
	acf_add_local_field_group(
		array(
			'key' => 'group_tr_contact_page',
			'title' => 'Σελίδα Επικοινωνίας',
			'fields' => $fields,
			'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/contact.php' ) ) ),
		)
	);
}
add_action( 'acf/init', 'custom_starter_register_contact_fields' );

/** Read template fields, preserving intentionally empty values. */
function custom_starter_contact_value( $name ) {
	$id = get_queried_object_id();
	if ( function_exists( 'get_field' ) && metadata_exists( 'post', $id, 'tr_contact_page_' . $name ) ) {
		$value = get_field( 'tr_contact_page_' . $name, $id );
		return is_scalar( $value ) ? (string) $value : '';
	}
	$schema = custom_starter_contact_schema();
	return isset( $schema[ $name ] ) ? (string) $schema[ $name ][2] : '';
}

/** Find the published contact template, without assuming its URL slug. */
function custom_starter_contact_page_url() {
	$override = custom_starter_home_value( 'contact_page_url' );
	if ( $override && '#' !== $override ) {
		return $override;
	}
	static $page_url = null;
	if ( null === $page_url ) {
		$pages = get_posts(
			array(
				'post_type' => 'page',
				'post_status' => 'publish',
				'posts_per_page' => 1,
				'meta_key' => '_wp_page_template',
				'meta_value' => 'page-templates/contact.php',
				'fields' => 'ids',
				'orderby' => 'ID',
				'order' => 'ASC',
			)
		);
		$page_url = $pages ? get_permalink( $pages[0] ) : '';
	}
	return $page_url;
}

/** Accept only HTTPS Google Maps embeds; reject arbitrary iframe hosts. */
function custom_starter_valid_map_embed( $url ) {
	$parts = wp_parse_url( $url );
	return is_array( $parts )
		&& isset( $parts['scheme'], $parts['host'], $parts['path'] )
		&& 'https' === strtolower( $parts['scheme'] )
		&& in_array( strtolower( $parts['host'] ), array( 'www.google.com', 'maps.google.com', 'www.google.gr' ), true )
		&& ! isset( $parts['user'] )
		&& ! isset( $parts['port'] )
		&& ( '/maps/embed' === $parts['path'] || 0 === strpos( $parts['path'], '/maps/embed/' ) );
}

/** Build a map from the configured address unless a precise embed is supplied. */
function custom_starter_contact_map_url( $address ) {
	$embed = custom_starter_contact_value( 'map_embed_url' );
	if ( custom_starter_valid_map_embed( $embed ) ) {
		return $embed;
	}
	return 'https://maps.google.com/maps?q=' . rawurlencode( $address ) . '&output=embed';
}

