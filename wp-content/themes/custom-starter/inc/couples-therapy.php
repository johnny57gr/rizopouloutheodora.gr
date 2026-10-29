<?php
/** Couples therapy: verbatim Word copy and ACF Free fields. @package Custom_Starter */
defined( 'ABSPATH' ) || exit;

function custom_starter_couples_schema() {
	return array(
		'hero' => array( 'Εισαγωγή', array(
			'title' => array( 'Τίτλος', 'text', '3. Θεραπεία Ζεύγους' ),
			'intro' => array( 'Εισαγωγή', 'textarea', 'Κάθε σχέση περνά από στάδια αλλαγής, προκλήσεων και κρίσεων. Η θεραπεία ζεύγους απευθύνεται σε συντρόφους που αντιμετωπίζουν επαναλαμβανόμενες συγκρούσεις, συναισθηματική απομάκρυνση, προβλήματα επικοινωνίας, δυσκολία στη διαχείριση αλλαγών στη ζωή τους (π.χ. γονεϊκότητα, απώλεια) ή κρίσεις εμπιστοσύνης.' ),
			'image' => array( 'Φωτογραφία', 'image', '' ),
		) ),
		'process' => array( 'Στη θεραπεία ζεύγους', array(
			'process_title' => array( 'Τίτλος', 'text', 'Στη θεραπεία ζεύγους:' ),
			'process_1' => array( 'Σημείο 1', 'textarea', 'Ο θεραπευτής λειτουργεί ως ουδέτερος συντονιστής, παρέχοντας ένα ασφαλές έδαφος ώστε να ακουστούν και οι δύο πλευρές με ισοτιμία και σεβασμό.' ),
			'process_2' => array( 'Σημείο 2', 'textarea', 'Εντοπίζουμε τα δυσλειτουργικά μοτίβα επικοινωνίας (όπως η αποστασιοποίηση, οι κατηγορίες ή η άμυνα) και εκπαιδευόμαστε σε νέους τρόπους έκφρασης των αναγκών και των συναισθημάτων.' ),
			'process_3' => array( 'Σημείο 3', 'textarea', 'Στοχεύουμε στην αποκατάσταση της συναισθηματικής σύνδεσης, την ενίσχυση της ενσυναίσθησης και την από κοινού επίλυση των προβλημάτων.' ),
		) ),
		'approach' => array( 'Πώς λειτουργεί', array(
			'approach_title' => array( 'Τίτλος', 'text', 'Τι είναι η Θεραπεία Ζεύγους & Πώς Λειτουργεί;' ),
			'approach_text' => array( 'Πρώτη παράγραφος', 'textarea', 'Η θεραπεία ζεύγους (συμβουλευτική γάμου/σχέσης) είναι μια μορφή ψυχοθεραπείας στην οποία και οι δύο σύντροφοι εργάζονται μαζί με τον ψυχολόγο για να βελτιώσουν τη σχέση τους, να ξεπεράσουν κρίσεις και να αναπτύξουν πιο υγιείς τρόπους συνύπαρξης.' ),
			'approach_note' => array( 'Δεύτερη παράγραφος', 'textarea', 'Δεν πρόκειται για έναν χώρο όπου ο θεραπευτής «αποφασίζει ποιος έχει δίκιο ή άδικο» ή παίζει τον ρόλο του δικαστή. Αντίθετα, η θεραπεία λειτουργεί ως ένας ουδέτερος, ασφαλής και αμερόληπτος χώρος στον οποίο το επίκεντρο της προσοχής δεν είναι το κάθε άτομο ξεχωριστά, αλλά η ίδια η σχέση.' ),
		) ),
		'goals' => array( 'Στόχοι θεραπείας', array(
			'goals_title' => array( 'Τίτλος', 'text', 'Τι Επιτυγχάνεται στη Θεραπεία;' ),
			'goal_1' => array( 'Στόχος 1', 'textarea', 'Σπάσιμο των αρνητικών μοτίβων: Αναγνωρίζουμε τους «φαύλους κύκλους» συγκρούσεων (π.χ. επίθεση-άμυνα, φωνές-αποστασιοποίηση) και μαθαίνουμε να τους διακόπτουμε πριν κλιμακωθούν.' ),
			'goal_2' => array( 'Στόχος 2', 'textarea', 'Βελτίωση της επικοινωνίας: Εκπαιδευόμαστε στην ενεργητική ακρόαση και στη διεκδικητική έκφραση των αναγκών και των συναισθημάτων χωρίς κατηγορίες.' ),
			'goal_3' => array( 'Στόχος 3', 'textarea', 'Ενίσχυση της ενσυναίσθησης: Μαθαίνουμε να κατανοούμε την οπτική γωνία και τα τραύματα του συντρόφου μας, χτίζοντας ξανά την εμπιστοσύνη και τη συναισθηματική εγγύτητα.' ),
			'goal_4' => array( 'Στόχος 4', 'textarea', 'Διαχείριση μεταβάσεων & κρίσεων: Αποκτούμε εργαλεία για την αντιμετώπιση μεγάλων αλλαγών (όπως η γονεϊκότητα, οι οικονομικές πιέσεις ή μια απώλεια) καθώς και για την επούλωση από κρίσεις εμπιστοσύνης.' ),
		) ),
		'topics' => array( 'Πότε να ξεκινήσετε', array(
			'topics_title' => array( 'Τίτλος', 'text', 'Πότε είναι η κατάλληλη στιγμή να ξεκινήσετε;' ),
			'topics_intro' => array( 'Εισαγωγή', 'textarea', 'Η θεραπεία ζεύγους απευθύνεται σε συντρόφους που αντιμετωπίζουν:' ),
			'topics' => array( 'Σημεία — ένα ανά γραμμή', 'textarea', 'Συνεχείς, αναποτελεσματικούς καβγάδες ή απόλυτη σιωπή και αποξένωση
Δυσκολία στην επικοινωνία και αίσθημα ότι «δεν εισακούγονται»
Απώλεια της συναισθηματικής ή σωματικής οικειότητας
Σημαντικές αλλαγές στη ζωή τους που διαταράσσουν τις ισορροπίες της σχέσης
Επιθυμία να αποφασίσουν συνειδητά για το μέλλον της σχέσης τους' ),
		) ),
		'closing' => array( 'Κατακλείδα', array(
			'closing' => array( 'Καταληκτική παράγραφος', 'textarea', 'Ο στόχος είναι να ξαναβρείτε την επικοινωνία, τον σεβασμό και τη σύνδεση, διαμορφώνοντας μαζί μια σχέση που στηρίζει και τους δύο.' ),
		) ),
	);
}

function custom_starter_register_couples_fields() {
	$order = 0;
	foreach ( custom_starter_couples_schema() as $section => $definition ) {
		$fields = array();
		foreach ( $definition[1] as $name => $spec ) {
			$field = array( 'key' => 'field_tr_couples_' . $name, 'name' => 'tr_couples_' . $name, 'label' => $spec[0], 'type' => $spec[1], 'default_value' => $spec[2] );
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
			'key' => 'group_tr_couples_' . $section,
			'title' => 'Ζεύγους — ' . $definition[0],
			'fields' => $fields,
			'menu_order' => $order++,
			'description' => 'Αυτούσιο κείμενο από το Word της πελάτισσας.',
			'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/couples-therapy.php' ) ) ),
		) );
	}
}
add_action( 'acf/init', 'custom_starter_register_couples_fields' );

function custom_starter_couples_value( $name ) {
	$id = get_queried_object_id();
	if ( function_exists( 'get_field' ) && metadata_exists( 'post', $id, 'tr_couples_' . $name ) ) {
		$value = get_field( 'tr_couples_' . $name, $id );
		return is_scalar( $value ) ? (string) $value : '';
	}
	foreach ( custom_starter_couples_schema() as $group ) {
		if ( isset( $group[1][ $name ] ) ) { return (string) $group[1][ $name ][2]; }
	}
	return '';
}

function custom_starter_couples_text( $name ) { echo esc_html( custom_starter_couples_value( $name ) ); }

