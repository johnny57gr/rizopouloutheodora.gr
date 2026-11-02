<?php
/** FAQ page fields using ACF Free. @package Custom_Starter */
defined( 'ABSPATH' ) || exit;

/** Eight optional question slots, without a Pro repeater dependency. */
function custom_starter_faq_schema() {
	$groups = array(
		'intro' => array( 'Εισαγωγή', array(
			'eyebrow' => array( 'Μικρός τίτλος', 'text', 'ΣΥΧΝΕΣ ΕΡΩΤΗΣΕΙΣ' ),
			'title' => array( 'Τίτλος', 'text', 'Συχνές ερωτήσεις' ),
			'intro' => array( 'Εισαγωγικό κείμενο', 'textarea', 'Εδώ θα βρείτε απαντήσεις σε μερικές συχνές απορίες για τις συνεδρίες. Για οτιδήποτε άλλο, μπορείτε να επικοινωνήσετε μαζί μου.' ),
		) ),
	);
	$questions = array(
		array( '1. Τι είναι η Γνωσιακή Συμπεριφορική Θεραπεία (CBT);', 'Η Γνωσιακή Συμπεριφορική Θεραπεία είναι μια επιστημονικά τεκμηριωμένη μορφή ψυχοθεραπείας που βασίζεται στη σύνδεση ανάμεσα στις σκέψεις, τα συναισθήματα και τις συμπεριφορές μας.

Μέσα από τη θεραπευτική διαδικασία, μαθαίνουμε να αναγνωρίζουμε μοτίβα σκέψης και συμπεριφοράς που μπορεί να μας δυσκολεύουν, να τα κατανοούμε και σταδιακά να αναπτύσσουμε πιο λειτουργικούς τρόπους διαχείρισης των καθημερινών προκλήσεων.' ),
		array( '2. Πότε είναι κατάλληλη στιγμή να ξεκινήσω ψυχοθεραπεία;', 'Δεν χρειάζεται να φτάσεις στα όριά σου για να ζητήσεις βοήθεια. Η ψυχοθεραπεία μπορεί να αποτελέσει έναν χώρο προσωπικής φροντίδας και εξέλιξης, είτε αντιμετωπίζεις κάποια συγκεκριμένη δυσκολία είτε αισθάνεσαι την ανάγκη να κατανοήσεις καλύτερα τον εαυτό σου, τα συναισθήματα και τις σχέσεις σου.' ),
		array( '3. Πώς πραγματοποιείται η πρώτη συνεδρία;', 'Η πρώτη συνεδρία είναι μια ευκαιρία να γνωριστούμε και να συζητήσουμε τι σε οδήγησε στην αναζήτηση ψυχοθεραπευτικής υποστήριξης.

Θα έχεις τον χρόνο να μοιραστείς όσα αισθάνεσαι έτοιμος/η να συζητήσεις, ενώ παράλληλα θα μιλήσουμε για τις προσδοκίες σου και τους στόχους που θα θέλαμε να θέσουμε στη θεραπευτική διαδικασία.

Δεν χρειάζεται να έχεις προετοιμάσει κάτι συγκεκριμένο. Αρκεί να έρθεις όπως είσαι.' ),
		array( '4. Πόσο διαρκεί η ψυχοθεραπεία;', 'Η διάρκεια της θεραπείας διαφέρει από άνθρωπο σε άνθρωπο και εξαρτάται από τις ανάγκες, τις δυσκολίες και τους στόχους του καθενός.

Στη Γνωσιακή Συμπεριφορική Θεραπεία η διαδικασία είναι συνήθως δομημένη και προσανατολισμένη σε συγκεκριμένους στόχους, οι οποίοι επαναξιολογούνται στην πορεία.' ),
		array( '5. Κάθε πότε πραγματοποιούνται οι συνεδρίες;', 'Συνήθως οι συνεδρίες πραγματοποιούνται σε εβδομαδιαία βάση, ώστε να υπάρχει συνέχεια και σταθερότητα στη θεραπευτική διαδικασία.' ),
		array( '6. Είναι όλα όσα συζητάμε στη συνεδρία εμπιστευτικά;', 'Η εμπιστευτικότητα αποτελεί βασικό θεμέλιο της θεραπευτικής σχέσης. Όσα μοιράζεσαι στο πλαίσιο των συνεδριών προστατεύονται από το επαγγελματικό απόρρητο, σύμφωνα με τους ισχύοντες δεοντολογικούς και νομικούς κανόνες και τις προβλεπόμενες εξαιρέσεις.' ),
		array( '7. Μπορώ να κάνω ψυχοθεραπεία διαδικτυακά;', 'Ναι, η ψυχοθεραπεία μπορεί να πραγματοποιηθεί και διαδικτυακά, μέσω ασφαλούς πλατφόρμας βιντεοκλήσης. Οι online συνεδρίες προσφέρουν ευελιξία και τη δυνατότητα να συμμετέχεις από έναν χώρο όπου αισθάνεσαι άνετα.' ),
		array( '8. Πώς μπορώ να κλείσω το πρώτο μου ραντεβού;', 'Μπορείς να επικοινωνήσεις μαζί μου μέσω της φόρμας επικοινωνίας, τηλεφωνικά ή μέσω email, ώστε να προγραμματίσουμε την πρώτη μας συνάντηση και να συζητήσουμε οποιαδήποτε απορία έχεις.' ),
	);
	foreach ( $questions as $index => $question ) {
		$prefix = 'question_' . ( $index + 1 );
		$groups[ $prefix ] = array( 'Ερώτηση ' . ( $index + 1 ), array(
			$prefix . '_title' => array( 'Ερώτηση (κενή για απόκρυψη)', 'text', $question[0] ),
			$prefix . '_answer' => array( 'Απάντηση', 'textarea', $question[1] ),
		) );
	}
	$groups['aside'] = array( 'Πλαίσιο δίπλα στις ερωτήσεις', array(
		'image' => array( 'Φωτογραφία', 'image', '' ),
		'aside_title' => array( 'Τίτλος', 'text', 'Δεν χρειάζεται να έχετε όλες τις απαντήσεις.' ),
		'aside_text' => array( 'Κείμενο', 'textarea', 'Αρκεί να ξεκινήσουμε μια συζήτηση.' ),
		'aside_prompt' => array( 'Προτροπή', 'text', 'Δεν βρήκατε αυτό που ψάχνετε;' ),
		'aside_button' => array( 'Κείμενο συνδέσμου', 'text', 'Ρωτήστε με' ),
	) );
	$groups['cta'] = array( 'Πρόσκληση επικοινωνίας', array(
		'cta_title' => array( 'Τίτλος', 'text', '' ),
		'cta_text' => array( 'Κείμενο', 'textarea', 'Καλέστε με ή στείλτε μου ένα μήνυμα μέσα από τη φόρμα επικοινωνίας.' ),
	) );
	return $groups;
}

/** Isolate approved questions from old saved demonstration copy; retain other settings. */
function custom_starter_faq_field_name( $name ) {
	return ( preg_match( '/^question_[1-8]_(title|answer)$/', $name ) ? 'tr_faq_client_' : 'tr_faq_' ) . $name;
}

/** Register groups solely for the FAQ template. */
function custom_starter_register_faq_fields() {
	$order = 0;
	foreach ( custom_starter_faq_schema() as $section => $definition ) {
		$fields = array();
		foreach ( $definition[1] as $name => $spec ) {
			$field = array(
				'key' => 'field_' . custom_starter_faq_field_name( $name ),
				'name' => custom_starter_faq_field_name( $name ),
				'label' => $spec[0],
				'type' => $spec[1],
				'default_value' => $spec[2],
			);
			if ( 'textarea' === $spec[1] ) {
				$field['rows'] = preg_match( '/^question_[1-8]_answer$/', $name ) ? 6 : 3;
				$field['new_lines'] = '';
			}
			if ( 'image' === $spec[1] ) {
				$field['return_format'] = 'id';
				$field['preview_size'] = 'medium';
				$field['mime_types'] = 'jpg,jpeg,png,webp';
				$field['instructions'] = 'Χωρίς επιλογή εμφανίζεται η ενδεικτική εικόνα του σχεδιασμού.';
			}
			if ( 'url' === $spec[1] ) {
				$field['instructions'] = 'Συμπληρώστε το URL όταν δημιουργηθεί η ξεχωριστή σελίδα. Χωρίς διαθέσιμη σελίδα ο σύνδεσμος οδηγεί στην Επικοινωνία με αντίστοιχο λεκτικό.';
			}
			$fields[] = $field;
		}
		acf_add_local_field_group( array(
			'key' => 'group_tr_faq_' . $section,
			'title' => 'Συχνές ερωτήσεις — ' . $definition[0],
			'fields' => $fields,
			'menu_order' => $order++,
			'description' => 'Οι οκτώ ερωτήσεις και απαντήσεις προέρχονται αυτούσιες από το αρχείο «ΔΙΟΡΘΩΣΕΙΣ 2» της πελάτισσας. Αφήστε κενή την ερώτηση ή την απάντηση για να μην εμφανίζεται.',
			'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/faq.php' ) ) ),
		) );
	}
}
add_action( 'acf/init', 'custom_starter_register_faq_fields' );

/** Read only this page's values; preserve intentional blanks. */
function custom_starter_faq_value( $name ) {
	$id = get_queried_object_id();
	if ( function_exists( 'get_field' ) && metadata_exists( 'post', $id, custom_starter_faq_field_name( $name ) ) ) {
		$value = get_field( custom_starter_faq_field_name( $name ), $id );
		return is_scalar( $value ) ? (string) $value : '';
	}
	foreach ( custom_starter_faq_schema() as $group ) {
		if ( isset( $group[1][ $name ] ) ) {
			return (string) $group[1][ $name ][2];
		}
	}
	return '';
}
