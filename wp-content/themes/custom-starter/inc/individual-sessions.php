<?php
/**
 * Fields used exclusively by the Individual Sessions page template.
 *
 * @package Custom_Starter
 */
defined( 'ABSPATH' ) || exit;

/** Verbatim client copy; only pasted whitespace has been normalized. */
function custom_starter_individual_schema() {
	return array(
		'hero' => array( 'Εισαγωγή', array(
			'title' => array( 'Κεντρικός τίτλος', 'text', '1. Ατομική Ψυχοθεραπεία Ενηλίκων' ),
			'intro' => array( 'Πρώτη παράγραφος', 'textarea', 'Η ψυχοθεραπεία είναι μια επιστημονικά τεκμηριωμένη διαδικασία προσωπικής εξέλιξης και θεραπείας. Δεν πρόκειται για μια απλή φιλική κουβέντα, αλλά για μια συνεργατική σχέση ανάμεσα στον θεραπευόμενο και τον ψυχολόγο.' ),
			'overview_text' => array( 'Δεύτερη παράγραφος', 'textarea', 'Σε ένα ασφαλές, εμπιστευτικό και χωρίς κριτική περιβάλλον, η ψυχοθεραπεία λειτουργεί ως ένας «χάρτης» που σας βοηθά να κατανοήσετε τις βαθύτερες αιτίες των δυσκολιών σας, να αναγνωρίσετε δυσλειτουργικά μοτίβα σκέψης και συμπεριφοράς και να αναπτύξετε νέους, υγιείς τρόπους διαχείρισης των συναισθημάτων σας.' ),
			'image' => array( 'Κεντρική εικόνα', 'image', '' ),
			'button' => array( 'Κείμενο κουμπιού', 'text', 'Επικοινωνήστε μαζί μου' ),
		) ),
		'approach' => array( 'Η Θεραπευτική μας Προσέγγιση', array(
			'approach_title' => array( 'Τίτλος ενότητας', 'text', 'Η Θεραπευτική μας Προσέγγιση' ),
			'approach_intro' => array( 'Εισαγωγή', 'textarea', 'Στις ατομικές συνεδρίες αξιοποιούμε συνδυαστικά δύο σύγχρονες και αποτελεσματικές προσεγγίσεις:' ),
			'cbt_title' => array( 'Τίτλος CBT', 'text', 'Γνωστική Συμπεριφορική Θεραπεία (CBT):' ),
			'cbt_text' => array( 'Κείμενο CBT', 'textarea', 'Εστιάζει στο «εδώ και τώρα». Σας εφοδιάζει με πρακτικές τεχνικές για να εντοπίσετε και να αλλάξετε τις αρνητικές σκέψεις και συμπεριφορές που τροφοδοτούν το άγχος, την κατάθλιψη, τις φοβίες ή τις κρίσεις πανικού. Εστιάζει στη σύνδεση ανάμεσα στις σκέψεις, τα συναισθήματα και τη συμπεριφορά μας. Μαζί εντοπίζουμε δυσλειτουργικά μοτίβα σκέψης και μαθαίνουμε πρακτικές τεχνικές για τη διαχείριση των καθημερινών δυσκολιών.' ),
			'act_title' => array( 'Τίτλος ACT', 'text', 'Θεραπεία Αποδοχής & Δέσμευσης (ACT):' ),
			'act_text' => array( 'Κείμενο ACT', 'textarea', 'Σας εκπαιδεύει να αποδέχεστε τα δυσάρεστα συναισθήματα χωρίς να εγκλωβίζεστε σε αυτά, εστιάζοντας τη δράση σας σε όσα έχουν πραγματική αξία για εσάς, ώστε να χτίσετε μια ουσιαστική ζωή.' ),
		) ),
		'topics' => array( 'Σε ποιους απευθύνεται;', array(
			'topics_title' => array( 'Τίτλος', 'text', 'Σε ποιους απευθύνεται;' ),
			'topics_intro' => array( 'Εισαγωγή λίστας', 'text', 'Η ατομική θεραπεία βοηθά στη διαχείριση:' ),
			'topics' => array( 'Θέματα — ένα ανά γραμμή', 'textarea', "Άγχους, κρίσεων πανικού, φοβιών & ιδεοψυχαναγκασμών (ΙΔΨΔ)\nΚατάθλιψης & διαταραχών διάθεσης\nΔιατροφικών διαταραχών & διαταραχών προσωπικότητας\nΔυσκολιών στις διαπροσωπικές σχέσεις & θέματα διεκδικητικότητας" ),
			'closing' => array( 'Καταληκτική φράση (πλάγια)', 'textarea', 'Η θεραπεία πραγματοποιείται σε περιβάλλον απόλυτης αποδοχής, ασφάλειας και εχέμυθειας, λειτουργώντας μαζί ως «συνοδοιπόροι» προς την αλλαγή.' ),
		) ),
		'links' => array( 'Σύνδεσμοι', array(
			'services_url' => array( 'Σύνδεσμος συγκεντρωτικής σελίδας υπηρεσιών', 'url', '' ),
		) ),
	);
}

/** Separate approved copy from previously saved editorial drafts; retain images/links. */
function custom_starter_individual_field_name( $name ) {
	return ( in_array( $name, array( 'image', 'button', 'services_url' ), true ) ? 'tr_individual_' : 'tr_individual_exact_' ) . $name;
}

/** Register only on this service's specific template, using ACF Free types. */
function custom_starter_register_individual_fields() {
	$order = 0;
	foreach ( custom_starter_individual_schema() as $section => $definition ) {
		$fields = array();
		foreach ( $definition[1] as $name => $spec ) {
			$field = array(
				'key' => 'field_' . custom_starter_individual_field_name( $name ),
				'name' => custom_starter_individual_field_name( $name ),
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
	if ( function_exists( 'get_field' ) && metadata_exists( 'post', $id, custom_starter_individual_field_name( $name ) ) ) {
		$value = get_field( custom_starter_individual_field_name( $name ), $id );
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

