<?php
/**
 * Fields used exclusively by the Individual Sessions page template.
 *
 * @package Custom_Starter
 */
defined( 'ABSPATH' ) || exit;

/** Editable copy from the approved mockup, pending the client's final content. */
function custom_starter_individual_schema() {
	return array(
		'hero' => array( 'Εισαγωγή', array(
			'eyebrow' => array( 'Μικρός τίτλος', 'text', 'ΑΤΟΜΙΚΗ ΨΥΧΟΘΕΡΑΠΕΙΑ' ),
			'title' => array( 'Κεντρικός τίτλος', 'text', 'Ένας χώρος για εσάς' ),
			'subtitle' => array( 'Υπότιτλος', 'text', 'Ατομικές Συνεδρίες' ),
			'intro' => array( 'Εισαγωγικό κείμενο', 'textarea', 'Χρόνος και χώρος για να μιλήσετε για όσα σας απασχολούν, να κατανοήσετε τον εαυτό σας και να διερευνήσετε νέους τρόπους αντιμετώπισης των δυσκολιών.' ),
			'image' => array( 'Κεντρική εικόνα', 'image', '' ),
			'button' => array( 'Κείμενο κουμπιού', 'text', 'Επικοινωνήστε μαζί μου' ),
		) ),
		'overview' => array( 'Παρουσίαση', array(
			'overview_title' => array( 'Τίτλος', 'textarea', "Όταν χρειάζεστε\nέναν χώρο να ακουστείτε" ),
			'overview_text' => array( 'Κείμενο', 'textarea', "Οι ατομικές συνεδρίες προσφέρουν τη δυνατότητα να συζητήσετε προσωπικές δυσκολίες, σκέψεις και συναισθήματα μέσα σε μια σχέση σεβασμού και εμπιστοσύνης.\n\nΤο περιεχόμενο και ο ρυθμός της συζήτησης διαμορφώνονται με βάση τις δικές σας ανάγκες." ),
		) ),
		'topics' => array( 'Θέματα συζήτησης', array(
			'topics_title' => array( 'Τίτλος', 'text', 'Τι μπορεί να σας απασχολεί' ),
			'topics' => array( 'Θέματα — ένα ανά γραμμή', 'textarea', "Άγχος και καθημερινή πίεση\nΣχέσεις και επικοινωνία\nΑυτοεκτίμηση και προσωπικά όρια\nΑλλαγές και μεταβάσεις ζωής\nΔύσκολα συναισθήματα\nΑυτογνωσία και προσωπική εξέλιξη" ),
		) ),
		'meeting' => array( 'Πρώτη συνάντηση', array(
			'meeting_title' => array( 'Τίτλος', 'text', 'Η πρώτη μας συνάντηση' ),
			'meeting_text' => array( 'Κείμενο', 'textarea', 'Μια πρώτη συνάντηση είναι η ευκαιρία να γνωριστούμε, να συζητήσουμε όσα σας απασχολούν και να διερευνήσουμε πώς μπορούμε να συνεργαστούμε.' ),
			'location_title' => array( 'Τίτλος πλαισίου', 'text', 'Στη Βέροια ή online' ),
			'location_text' => array( 'Κείμενο πλαισίου', 'textarea', 'Επικοινωνήστε για πληροφορίες σχετικά με τις διαθέσιμες συνεδρίες.' ),
		) ),
		'cta' => array( 'Επικοινωνία και σύνδεσμοι', array(
			'cta_title' => array( 'Τίτλος', 'textarea', 'Είμαι εδώ για να συζητήσουμε ό,τι σας απασχολεί.' ),
			'cta_text' => array( 'Κείμενο', 'textarea', 'Επικοινωνήστε τηλεφωνικά ή στείλτε ένα μήνυμα μέσω της φόρμας επικοινωνίας.' ),
			'services_url' => array( 'Σύνδεσμος συγκεντρωτικής σελίδας υπηρεσιών', 'url', '' ),
		) ),
	);
}

/** Register only on this service's specific template, using ACF Free types. */
function custom_starter_register_individual_fields() {
	foreach ( custom_starter_individual_schema() as $section => $definition ) {
		$fields = array();
		foreach ( $definition[1] as $name => $spec ) {
			$field = array(
				'key' => 'field_tr_individual_' . $name,
				'name' => 'tr_individual_' . $name,
				'label' => $spec[0],
				'type' => $spec[1],
				'default_value' => $spec[2],
			);
			if ( 'textarea' === $spec[1] ) {
				$field['rows'] = 'topics' === $name ? 6 : 4;
				$field['new_lines'] = '';
			}
			if ( 'image' === $spec[1] ) {
				$field['return_format'] = 'id';
				$field['preview_size'] = 'medium';
				$field['mime_types'] = 'jpg,jpeg,png,webp';
				$field['instructions'] = 'Χωρίς επιλογή χρησιμοποιείται η ενδεικτική εικόνα του σχεδιασμού.';
			}
			if ( 'services_url' === $name ) {
				$field['instructions'] = 'Προαιρετικό. Μέχρι να δημιουργηθεί η σελίδα όλων των υπηρεσιών, οδηγεί στην ενότητα Υπηρεσίες της αρχικής.';
			}
			$fields[] = $field;
		}
		acf_add_local_field_group(
			array(
				'key' => 'group_tr_individual_' . $section,
				'title' => 'Ατομικές Συνεδρίες — ' . $definition[0],
				'fields' => $fields,
				'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/individual-sessions.php' ) ) ),
			)
		);
	}
}
add_action( 'acf/init', 'custom_starter_register_individual_fields' );

/** Preserve deliberately cleared fields; defaults are used only before saving. */
function custom_starter_individual_value( $name ) {
	$id = get_queried_object_id();
	if ( function_exists( 'get_field' ) && metadata_exists( 'post', $id, 'tr_individual_' . $name ) ) {
		$value = get_field( 'tr_individual_' . $name, $id );
		return is_scalar( $value ) ? (string) $value : '';
	}
	foreach ( custom_starter_individual_schema() as $section ) {
		if ( isset( $section[1][ $name ] ) ) {
			return (string) $section[1][ $name ][2];
		}
	}
	return '';
}

/** Escape plain editable content at its output boundary. */
function custom_starter_individual_text( $name ) {
	echo esc_html( custom_starter_individual_value( $name ) );
}

/** Split the Free textarea into list items without accepting HTML. */
function custom_starter_individual_topics() {
	return array_values( array_filter( array_map( 'trim', preg_split( '/\R/u', custom_starter_individual_value( 'topics' ) ) ) ) );
}

