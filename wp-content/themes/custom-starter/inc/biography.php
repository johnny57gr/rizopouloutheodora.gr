<?php
/** Biography fields and links. @package Custom_Starter */
defined( 'ABSPATH' ) || exit;

/** Editable sections using only ACF Free field types. */
function custom_starter_biography_schema() {
	return array(
		'intro' => array( 'Εισαγωγή', array(
			'eyebrow' => array( 'Μικρός τίτλος', 'text', 'ΣΧΕΤΙΚΑ ΜΕ ΕΜΕΝΑ' ),
			'title' => array( 'Ονοματεπώνυμο', 'text', 'Θεοδώρα Ριζοπούλου' ),
			'profession' => array( 'Ιδιότητα', 'text', 'Ψυχολόγος – Ψυχοθεραπεύτρια' ),
			'intro' => array( 'Εισαγωγή', 'textarea', "Είμαι απόφοιτη Ψυχολογίας του Αριστοτελείου Πανεπιστημίου Θεσσαλονίκης, με εκπαίδευση στη Γνωστική Συμπεριφορική Θεραπεία και στη Θεραπεία Αποδοχής και Δέσμευσης.\n\nΣτη θεραπευτική σχέση δίνω χώρο στη ζεστασιά, την ειλικρίνεια και τον σεβασμό." ),
			'image' => array( 'Πορτρέτο', 'image', '' ),
			'intro_button' => array( 'Κείμενο συνδέσμου επικοινωνίας', 'text', 'Ας γνωριστούμε' ),
		) ),
		'approach' => array( 'Θεραπευτική προσέγγιση', array(
			'approach_eyebrow' => array( 'Μικρός τίτλος', 'text', 'Η ΠΡΟΣΕΓΓΙΣΗ ΜΟΥ' ),
			'approach_title' => array( 'Τίτλος', 'text', 'Μια σχέση εμπιστοσύνης' ),
			'approach_text' => array( 'Κείμενο', 'textarea', 'Η θεραπεία είναι μια κοινή πορεία κατανόησης και αλλαγής. Ως συνοδοιπόρος, σας υποστηρίζω στην αξιοποίηση των δικών σας δυνατοτήτων και στη διαμόρφωση μιας ζωής με νόημα.' ),
			'values' => array( 'Βασικές αρχές', 'text', 'Ζεστασιά · Αποδοχή · Σεβασμός' ),
		) ),
		'education' => array( 'Σπουδές', array(
			'education_title' => array( 'Τίτλος', 'text', 'Σπουδές & εκπαίδευση' ),
			'education_text' => array( 'Περιεχόμενο', 'wysiwyg', '<h3>Πτυχίο Ψυχολογίας</h3><p>Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης</p><h3>Γνωστική Συμπεριφορική Θεραπεία (CBT)</h3><p>Τετραετής εξειδικευμένη εκπαίδευση στην Ελληνική Εταιρία Έρευνας της Συμπεριφοράς – Παράρτημα Μακεδονίας.</p><h3>Θεραπεία Αποδοχής & Δέσμευσης (ACT)</h3><p>Εκπαίδευση στην Ελληνική Εταιρία Έρευνας της Συμπεριφοράς.</p><p>Συνεχής εποπτεία και επιστημονική επιμόρφωση.</p>' ),
		) ),
		'experience' => array( 'Εμπειρία', array(
			'experience_title' => array( 'Τίτλος', 'text', 'Επαγγελματική εμπειρία' ),
			'experience_text' => array( 'Περιεχόμενο', 'wysiwyg', '<p>Εμπειρία σε δομές ψυχικής υγείας και συμβουλευτικής υποστήριξης.</p><h3>Κινητή Μονάδα Ψυχικής Υγείας Ενηλίκων Ημαθίας</h3><p>Ατομικές συνεδρίες και συνεργασία με διεπιστημονική ομάδα.</p><h3>Ψυχολογικό Κέντρο «Στήριξις»</h3><p>Πρακτική άσκηση στη Θεσσαλονίκη.</p><h3>Κέντρο Ειδικών Θεραπειών</h3><p>Υποστήριξη παιδιών και εφήβων με μαθησιακές δυσκολίες.</p><h3>ΚΑΠΗ Δήμου Βέροιας</h3><p>Ομαδικά προγράμματα και συμβουλευτική.</p>' ),
		) ),
		'additional' => array( 'Έρευνα και εθελοντισμός', array(
			'research_title' => array( 'Τίτλος έρευνας', 'text', 'Έρευνα & επιστημονική παρουσία' ),
			'research_text' => array( 'Έρευνα', 'textarea', 'Παρουσίαση της πτυχιακής έρευνας στο 18ο Πανελλήνιο Συνέδριο Ψυχολογικής Έρευνας.' ),
			'volunteering_title' => array( 'Τίτλος εθελοντισμού', 'text', 'Εθελοντική δράση' ),
			'volunteering_text' => array( 'Εθελοντισμός', 'textarea', 'ΚΕΘΕΑ / ΚΕΘΕΑ ΙΘΑΚΗ και «Πρωτοβουλία για το Παιδί».' ),
		) ),
		'cta' => array( 'Επικοινωνία', array(
			'cta_title' => array( 'Τίτλος', 'text', 'Ας κάνουμε το πρώτο βήμα.' ),
			'cta_text' => array( 'Κείμενο', 'textarea', 'Επικοινωνήστε μαζί μου για να προγραμματίσουμε μια συνάντηση.' ),
		) ),
	);
}

/** Register groups solely for the biography template. */
function custom_starter_register_biography_fields() {
	$order = 0;
	foreach ( custom_starter_biography_schema() as $section => $definition ) {
		$fields = array();
		foreach ( $definition[1] as $name => $spec ) {
			$field = array(
				'key' => 'field_tr_biography_' . $name,
				'name' => 'tr_biography_' . $name,
				'label' => $spec[0],
				'type' => $spec[1],
				'default_value' => $spec[2],
			);
			if ( 'textarea' === $spec[1] ) {
				$field['rows'] = 3;
				$field['new_lines'] = '';
			}
			if ( 'image' === $spec[1] ) {
				$field['return_format'] = 'id';
				$field['preview_size'] = 'medium';
				$field['mime_types'] = 'jpg,jpeg,png,webp';
				$field['instructions'] = 'Χωρίς επιλογή εμφανίζεται ουδέτερο πλαίσιο αναμονής φωτογραφίας. Συμπληρώστε το εναλλακτικό κείμενο στη Βιβλιοθήκη Πολυμέσων.';
			}
			if ( 'wysiwyg' === $spec[1] ) {
				$field['toolbar'] = 'full';
				$field['media_upload'] = 0;
				$field['instructions'] = 'Χρησιμοποιήστε Επικεφαλίδα 3 για τίτλους καταχωρίσεων και απλές παραγράφους για τις περιγραφές. Μπορείτε να προσθέσετε ή να αφαιρέσετε καταχωρίσεις.';
			}
			$fields[] = $field;
		}
		acf_add_local_field_group( array(
			'key' => 'group_tr_biography_' . $section,
			'title' => 'Βιογραφικό — ' . $definition[0],
			'fields' => $fields,
			'menu_order' => $order++,
			'description' => 'Τα κείμενα είναι συντομευμένα από το βιογραφικό. Ελέγξτε τα πριν τη δημοσίευση.',
			'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/biography.php' ) ) ),
		) );
	}
}
add_action( 'acf/init', 'custom_starter_register_biography_fields' );

/** Read only this page's values; preserve intentional blanks. */
function custom_starter_biography_value( $name ) {
	$id = get_queried_object_id();
	if ( function_exists( 'get_field' ) && metadata_exists( 'post', $id, 'tr_biography_' . $name ) ) {
		$value = get_field( 'tr_biography_' . $name, $id );
		return is_scalar( $value ) ? (string) $value : '';
	}
	foreach ( custom_starter_biography_schema() as $group ) {
		if ( isset( $group[1][ $name ] ) ) {
			return (string) $group[1][ $name ][2];
		}
	}
	return '';
}

/** Prefer the homepage override, then the published biography template. */
function custom_starter_biography_page_url() {
	$url = custom_starter_home_value( 'about_link' );
	if ( $url && '#' !== $url ) {
		return $url;
	}
	return custom_starter_service_template_url( 'page-templates/biography.php' );
}
