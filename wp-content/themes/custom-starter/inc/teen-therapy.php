<?php
/** Teen psychotherapy: verbatim client copy and ACF Free fields. @package Custom_Starter */
defined( 'ABSPATH' ) || exit;

function custom_starter_teens_schema() {
	return array(
		'intro' => array( 'Εισαγωγή', array(
			'title' => array( 'Τίτλος', 'text', '2. Συμβουλευτική & Ψυχοθεραπεία Εφήβων' ),
			'intro_title' => array( 'Τίτλος εισαγωγής', 'text', 'Τι είναι η Ψυχοθεραπεία Εφήβων & Πώς Λειτουργεί;' ),
			'intro_text' => array( 'Πρώτη παράγραφος', 'textarea', 'Η εφηβεία είναι μια περίοδος αλματώδους σωματικής, συναισθηματικής και γνωστικής ανάπτυξης. Είναι η φάση όπου το άτομο μεταβαίνει από την παιδική ηλικία στην ενηλικίωση, αναζητώντας την ταυτότητά του και την ανεξαρτησία του. Αυτή η διαδικασία, αν και φυσιολογική, συχνά συνοδεύεται από έντονη εσωτερική σύγχυση, συναισθηματική πίεση και συγκρούσεις.' ),
			'intro_support' => array( 'Δεύτερη παράγραφος', 'textarea', 'Η ψυχοθεραπεία εφήβων παρέχει ένα προσωπικό, ασφαλές και ουδέτερο καταφύγιο εκτός του οικογενειακού και σχολικού περιβάλλοντος. Ο θεραπευτής δεν λειτουργεί ως αυστηρή αυθεντία ή κριτής, αλλά ως ένας έμπιστος σύμμαχος και καθοδηγητής, βοηθώντας τον έφηβο να αποκωδικοποιήσει τα συναισθήματά του και να βρει τις δικές του απαντήσεις.' ),
			'image' => array( 'Φωτογραφία', 'image', '' ),
		) ),
		'benefits' => array( 'Στόχοι θεραπείας', array(
			'benefits_title' => array( 'Τίτλος', 'text', 'Τι Επιτυγχάνεται στη Θεραπεία;' ),
			'benefit_1' => array( 'Περιεχόμενο 1', 'textarea', 'Διαχείριση Συναισθημάτων & Άγχους: Εκμάθηση πρακτικών τεχνικών για την αντιμετώπιση του σχολικού άγχους, της πίεσης των εξετάσεων, των κρίσεων πανικού και των συναισθηματικών μεταβολών.' ),
			'benefit_2' => array( 'Περιεχόμενο 2', 'textarea', 'Ενίσχυση Αυτοεκτίμησης & Ταυτότητας: Ενδυνάμωση της αυτοπεποίθησης, αποδοχή της εικόνας του σώματος και καλλιέργεια μιας θετικής εικόνας εαυτού.' ),
			'benefit_3' => array( 'Περιεχόμενο 3', 'textarea', 'Ανάπτυξη Κοινωνικών Δεξιοτήτων: Βελτίωση της επικοινωνίας, διαχείριση της πίεσης από τους συνομηλίκους (peer pressure), ανάπτυξη διεκδικητικότητας και υγιών ορίων στις φιλικές και πρώτες αισθηματικές σχέσεις.' ),
			'benefit_4' => array( 'Περιεχόμενο 4', 'textarea', 'Διαχείριση Συμπεριφοράς & Θυμού: Κατανόηση των αιτιών πίσω από την έντονη αντιδραστικότητα, την απόσυρση ή τις ξεσπάσματα θυμού και αντικατάστασή τους με λειτουργικούς τρόπους έκφρασης.' ),
		) ),
		'parents' => array( 'Γονείς και απόρρητο', array(
			'parents_title' => array( 'Τίτλος', 'text', 'Ο Ρόλος των Γονέων & το Θεραπευτικό Απόρρητο' ),
			'parents_intro' => array( 'Εισαγωγή', 'textarea', 'Η θεραπεία των εφήβων απαιτεί μια λεπτή και προσεκτική ισορροπία:' ),
			'privacy' => array( 'Απόρρητο εφήβου', 'textarea', 'Το Απόρρητο του Εφήβου: Για να λειτουργήσει η θεραπεία, ο έφηβος χρειάζεται να γνωρίζει ότι όσα συζητούνται μένουν απόλυτα εμπιστευτικά μεταξύ του ίδιου και του θεραπευτή (εκτός αν συντρέχει άμεσος κίνδυνος για την ασφάλειά του).' ),
			'parents_support' => array( 'Συνεργασία με γονείς', 'textarea', 'Συνεργασία με τους Γονείς: Παράλληλα, πραγματοποιούνται προγραμματισμένες συμβουλευτικές συναντήσεις με τους γονείς. Στόχος τους είναι η ενημέρωση για τη γενική πορεία της θεραπείας, η παροχή κατευθύνσεων για τη βελτίωση της επικοινωνίας στο σπίτι και η συνολική υποστήριξη της οικογένειας.' ),
		) ),
		'topics' => array( 'Αναζήτηση υποστήριξης', array(
			'topics_title' => array( 'Τίτλος', 'text', 'Πότε να Αναζητήσετε Υποστήριξη;' ),
			'topics_intro' => array( 'Εισαγωγή', 'textarea', 'Η συμβουλευτική εφήβων είναι πολύτιμη όταν παρατηρούνται:' ),
			'topics' => array( 'Σημεία — ένα ανά γραμμή', 'textarea', 'Απότομη αλλαγή στη συμπεριφορά, απόσυρση από την οικογένεια ή τους φίλους
Έντονο άγχος, φοβίες, θλίψη ή παρατεταμένη πεσμένη διάθεση
Πτώση της σχολικής απόδοσης ή άρνηση φοίτησης
Δυσκολίες στη διαχείριση του θυμού και συνεχείς συγκρούσεις
Ζητήματα που αφορούν μαθησιακές δυσκολίες, δυσλεξία ή προσαρμογή σε μεγάλες αλλαγές (π.χ. διαζύγιο γονέων, μετακόμιση)' ),
		) ),
		'closing' => array( 'Κατακλείδα', array(
			'closing' => array( 'Καταληκτική παράγραφος', 'textarea', 'Στόχος είναι ο έφηβος να αποκτήσει τα κατάλληλα εφόδια ώστε να εξελιχθεί σε έναν αυτόνομο, συναισθηματικά ώριμο και ανθεκτικό ενήλικα.' ),
		) ),
	);
}

function custom_starter_register_teens_fields() {
	$order = 0;
	foreach ( custom_starter_teens_schema() as $section => $definition ) {
		$fields = array();
		foreach ( $definition[1] as $name => $spec ) {
			$field = array( 'key' => 'field_tr_teens_' . $name, 'name' => 'tr_teens_' . $name, 'label' => $spec[0], 'type' => $spec[1], 'default_value' => $spec[2] );
			if ( 'textarea' === $spec[1] ) { $field['rows'] = 4; $field['new_lines'] = ''; }
			if ( 'image' === $spec[1] ) {
				$field['return_format'] = 'id';
				$field['preview_size'] = 'medium';
				$field['mime_types'] = 'jpg,jpeg,png,webp';
				$field['instructions'] = 'Επιλέξτε φωτογραφία για τη σελίδα. Χωρίς επιλογή χρησιμοποιείται η πραγματική φωτογραφία του γραφείου από την αρχική ή ενδεικτική εικόνα με λεζάντα.';
			}
			$fields[] = $field;
		}
		acf_add_local_field_group( array(
			'key' => 'group_tr_teens_' . $section,
			'title' => 'Έφηβοι — ' . $definition[0],
			'fields' => $fields,
			'menu_order' => $order++,
			'description' => 'Αυτούσιο κείμενο από το Word της πελάτισσας.',
			'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/teen-therapy.php' ) ) ),
		) );
	}
}
add_action( 'acf/init', 'custom_starter_register_teens_fields' );

function custom_starter_teens_value( $name ) {
	$id = get_queried_object_id();
	if ( function_exists( 'get_field' ) && metadata_exists( 'post', $id, 'tr_teens_' . $name ) ) {
		$value = get_field( 'tr_teens_' . $name, $id );
		return is_scalar( $value ) ? (string) $value : '';
	}
	foreach ( custom_starter_teens_schema() as $group ) {
		if ( isset( $group[1][ $name ] ) ) { return (string) $group[1][ $name ][2]; }
	}
	return '';
}

function custom_starter_teens_text( $name ) { echo esc_html( custom_starter_teens_value( $name ) ); }

/** Split the existing label at the first colon without changing its characters. */
function custom_starter_teens_labelled_text( $name ) {
	$value = custom_starter_teens_value( $name );
	$colon = strpos( $value, ':' );
	if ( false === $colon ) { echo esc_html( $value ); return; }
	echo '<strong>' . esc_html( substr( $value, 0, $colon + 1 ) ) . '</strong>' . esc_html( substr( $value, $colon + 1 ) );
}
