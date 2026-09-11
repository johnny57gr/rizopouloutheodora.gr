<?php
/** FAQ page fields using ACF Free. @package Custom_Starter */
defined( 'ABSPATH' ) || exit;

/** Eight optional question slots, without a Pro repeater dependency. */
function custom_starter_faq_schema() {
	$groups = array(
		'intro' => array( 'Εισαγωγή', array(
			'eyebrow' => array( 'Μικρός τίτλος', 'text', 'ΣΥΧΝΕΣ ΕΡΩΤΗΣΕΙΣ' ),
			'title' => array( 'Τίτλος', 'text', 'Μερικές απαντήσεις, πριν το πρώτο βήμα' ),
			'intro' => array( 'Εισαγωγικό κείμενο', 'textarea', 'Εδώ θα βρείτε απαντήσεις σε μερικές συχνές απορίες για τις συνεδρίες. Για οτιδήποτε άλλο, μπορείτε να επικοινωνήσετε μαζί μου.' ),
		) ),
	);
	$questions = array(
		array( 'Πώς μπορώ να κλείσω ένα πρώτο ραντεβού;', 'Μπορείτε να επικοινωνήσετε τηλεφωνικά ή να συμπληρώσετε τη φόρμα στη σελίδα επικοινωνίας, ώστε να συζητήσουμε τη διαθεσιμότητα και να οργανώσουμε το πρώτο μας ραντεβού.' ),
		array( 'Χρειάζεται να έχω προετοιμαστεί για την πρώτη συνάντηση;', 'Δεν χρειάζεται να έχετε οργανώσει όλα όσα θέλετε να πείτε. Μπορείτε να ξεκινήσετε με αυτό που σας απασχολεί και με όσα αισθάνεστε έτοιμοι να μοιραστείτε.' ),
		array( 'Πόσο διαρκεί μια συνεδρία;', 'Επικοινωνήστε μαζί μου για πληροφορίες σχετικά με τη διάρκεια της συνεδρίας που σας ενδιαφέρει.' ),
		array( 'Πόσο συχνά πραγματοποιούνται οι συνεδρίες;', 'Η συχνότητα συζητείται στο πλαίσιο της επικοινωνίας μας, ανάλογα με τις ανάγκες και το αίτημά σας.' ),
		array( 'Μπορώ να κάνω online συνεδρίες;', 'Υπάρχει δυνατότητα online συνεδριών. Επικοινωνήστε μαζί μου για να συζητήσουμε τις πρακτικές λεπτομέρειες.' ),
		array( 'Πού βρίσκεται το γραφείο;', 'Το γραφείο βρίσκεται στη Βενιζέλου 27, στη Βέροια, Τ.Κ. 59132. Στη σελίδα επικοινωνίας θα βρείτε και τον χάρτη.' ),
		array( 'Ποιο είναι το κόστος μιας συνεδρίας;', 'Για πληροφορίες σχετικά με το κόστος, μπορείτε να επικοινωνήσετε μαζί μου πριν κλείσετε το ραντεβού σας.' ),
		array( 'Τι γίνεται αν χρειαστεί να αλλάξω το ραντεβού μου;', 'Επικοινωνήστε μαζί μου μόλις γνωρίζετε ότι χρειάζεται κάποια αλλαγή, ώστε να συζητήσουμε τον επαναπρογραμματισμό.' ),
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
		'cta_title' => array( 'Τίτλος', 'text', 'Είμαι εδώ για να συζητήσουμε ό,τι σας απασχολεί.' ),
		'cta_text' => array( 'Κείμενο', 'textarea', 'Καλέστε με ή στείλτε μου ένα μήνυμα μέσα από τη φόρμα επικοινωνίας.' ),
	) );
	return $groups;
}

/** Register groups solely for the FAQ template. */
function custom_starter_register_faq_fields() {
	$order = 0;
	foreach ( custom_starter_faq_schema() as $section => $definition ) {
		$fields = array();
		foreach ( $definition[1] as $name => $spec ) {
			$field = array(
				'key' => 'field_tr_faq_' . $name,
				'name' => 'tr_faq_' . $name,
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
			'description' => 'Τα αρχικά κείμενα είναι ενδεικτικά. Ελέγξτε τα πριν τη δημοσίευση. Αφήστε κενή την ερώτηση ή την απάντηση για να μην εμφανίζεται.',
			'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/faq.php' ) ) ),
		) );
	}
}
add_action( 'acf/init', 'custom_starter_register_faq_fields' );

/** Read only this page's values; preserve intentional blanks. */
function custom_starter_faq_value( $name ) {
	$id = get_queried_object_id();
	if ( function_exists( 'get_field' ) && metadata_exists( 'post', $id, 'tr_faq_' . $name ) ) {
		$value = get_field( 'tr_faq_' . $name, $id );
		return is_scalar( $value ) ? (string) $value : '';
	}
	foreach ( custom_starter_faq_schema() as $group ) {
		if ( isset( $group[1][ $name ] ) ) {
			return (string) $group[1][ $name ][2];
		}
	}
	return '';
}
