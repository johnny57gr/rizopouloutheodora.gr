<?php
/**
 * Fields used exclusively by the Individual Sessions page template.
 *
 * @package Custom_Starter
 */
defined( 'ABSPATH' ) || exit;

/** Editable service copy adapted from the client-provided text. */
function custom_starter_individual_schema() {
	return array(
		'hero' => array( 'Εισαγωγή', array(
			'eyebrow' => array( 'Μικρός τίτλος', 'text', 'ΑΤΟΜΙΚΗ ΨΥΧΟΘΕΡΑΠΕΙΑ' ),
			'title' => array( 'Κεντρικός τίτλος', 'text', 'Ατομική Ψυχοθεραπεία Ενηλίκων' ),
			'subtitle' => array( 'Υπότιτλος', 'text', 'Ένας χώρος κατανόησης και προσωπικής εξέλιξης' ),
			'intro' => array( 'Εισαγωγικό κείμενο', 'textarea', 'Η ψυχοθεραπεία είναι μια συνεργατική σχέση ανάμεσα στον θεραπευόμενο και τον ψυχολόγο. Ένας χώρος για να κατανοήσετε τις δυσκολίες σας και να αναπτύξετε νέους τρόπους διαχείρισης των συναισθημάτων σας.' ),
			'image' => array( 'Κεντρική εικόνα', 'image', '' ),
			'button' => array( 'Κείμενο κουμπιού', 'text', 'Επικοινωνήστε μαζί μου' ),
		) ),
		'overview' => array( 'Παρουσίαση', array(
			'overview_title' => array( 'Τίτλος', 'textarea', 'Κατανόηση, αποδοχή και αλλαγή' ),
			'overview_text' => array( 'Κείμενο', 'textarea', 'Σε ένα ασφαλές περιβάλλον, χωρίς κριτική, διερευνούμε τις αιτίες των δυσκολιών σας και αναγνωρίζουμε μοτίβα σκέψης και συμπεριφοράς που σας δυσκολεύουν. Η θεραπευτική σχέση αποτελεί τη βάση για να αναπτύξετε νέους τρόπους διαχείρισης και να κινηθείτε προς μια ζωή με νόημα.' ),
		) ),
		'approach' => array( 'Θεραπευτική προσέγγιση', array(
			'approach_title' => array( 'Τίτλος ενότητας', 'text', 'Η θεραπευτική μου προσέγγιση' ),
			'approach_intro' => array( 'Εισαγωγή', 'textarea', 'Στις ατομικές συνεδρίες αξιοποιώ συνδυαστικά τη Γνωστική Συμπεριφορική Θεραπεία και τη Θεραπεία Αποδοχής και Δέσμευσης.' ),
			'cbt_title' => array( 'Τίτλος CBT', 'text', 'Γνωστική Συμπεριφορική Θεραπεία (CBT)' ),
			'cbt_text' => array( 'Κείμενο CBT', 'textarea', 'Εστιάζει στο «εδώ και τώρα» και στη σύνδεση ανάμεσα στις σκέψεις, τα συναισθήματα και τη συμπεριφορά. Μαζί εντοπίζουμε δυσλειτουργικά μοτίβα και αξιοποιούμε πρακτικές τεχνικές για τη διαχείριση των καθημερινών δυσκολιών.' ),
			'act_title' => array( 'Τίτλος ACT', 'text', 'Θεραπεία Αποδοχής & Δέσμευσης (ACT)' ),
			'act_text' => array( 'Κείμενο ACT', 'textarea', 'Εστιάζει στην αποδοχή των δυσάρεστων συναισθημάτων χωρίς να εγκλωβίζεστε σε αυτά. Στόχος είναι να κατευθύνετε τη δράση σας σε όσα έχουν πραγματική αξία για εσάς, χτίζοντας μια ουσιαστική ζωή.' ),
		) ),
		'topics' => array( 'Σε ποιους απευθύνεται', array(
			'topics_title' => array( 'Τίτλος', 'text', 'Σε ποιους απευθύνεται' ),
			'topics' => array( 'Θέματα — ένα ανά γραμμή', 'textarea', "Άγχος, κρίσεις πανικού και φοβίες\nΙδεοψυχαναγκαστική διαταραχή\nΚατάθλιψη και διαταραχές διάθεσης\nΔιατροφικές διαταραχές και διαταραχές προσωπικότητας\nΔυσκολίες στις διαπροσωπικές σχέσεις\nΘέματα διεκδικητικότητας" ),
		) ),
		'meeting' => array( 'Πρώτη συνάντηση', array(
			'meeting_title' => array( 'Τίτλος', 'text', 'Η πρώτη μας συνάντηση' ),
			'meeting_text' => array( 'Κείμενο', 'textarea', 'Μια πρώτη συνάντηση είναι η ευκαιρία να γνωριστούμε, να συζητήσουμε όσα σας απασχολούν και να διερευνήσουμε πώς μπορούμε να συνεργαστούμε.' ),
			'location_title' => array( 'Τίτλος πλαισίου', 'text', 'Στον χώρο μου στη Βέροια' ),
			'location_text' => array( 'Κείμενο πλαισίου', 'textarea', 'Το γραφείο βρίσκεται στη Βενιζέλου 27, στη Βέροια. Επικοινωνήστε μαζί μου για να οργανώσουμε την πρώτη μας συνάντηση.' ),
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
	$order = 0;
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
				'menu_order' => $order++,
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

