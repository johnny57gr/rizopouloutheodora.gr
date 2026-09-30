<?php
/** Biography fields and links. @package Custom_Starter */
defined( 'ABSPATH' ) || exit;

/** Verbatim paragraphs extracted from the supplied Word biography. */
function custom_starter_biography_schema() {
	return array(
		'intro' => array( 'Εισαγωγή', array(
			'eyebrow' => array( 'Μικρός τίτλος', 'text', 'ΣΧΕΤΙΚΑ ΜΕ ΕΜΕΝΑ' ),
			'title' => array( 'Ονοματεπώνυμο', 'text', 'Θεοδώρα Ριζοπούλου' ),
			'profession' => array( 'Ιδιότητα', 'text', 'Ψυχολόγος – Ψυχοθεραπεύτρια' ),
			'image' => array( 'Πορτρέτο', 'image', '' ),
			'intro_button' => array( 'Σύνδεσμος επικοινωνίας', 'text', 'Ας γνωριστούμε' ),
		) ),
		'approach' => array( 'Θεραπευτική Φιλοσοφία & Αρχές', array(
			'approach_title' => array( 'Τίτλος', 'text', 'Θεραπευτική Φιλοσοφία & Αρχές' ),
			'approach_text' => array( 'Κείμενο', 'textarea', 'Κεντρικός πυλώνας της θεραπευτικής της προσέγγισης είναι η δημιουργία μιας ισχυρής θεραπευτικής συμμαχίας με τον θεραπευόμενο. Ο θεραπευτής λειτουργεί ως «συνοδοιπόρος» στην από κοινού διαχείριση των δυσκολιών, με στόχο την ανάληψη δράσης για μια ζωή με νόημα.' ),
			'values' => array( 'Βασικές αρχές', 'wysiwyg', '<p>Βασικές αρχές εργασίας:</p><ul><li>Ζεστασιά, ειλικρίνεια και σεβασμός</li><li>Αίσθημα ασφάλειας και πλήρους αποδοχής</li><li>Ενεργός κινητοποίηση και ανάδειξη των θετικών σημείων και πόρων του θεραπευόμενου</li></ul>' ),
		) ),
		'office' => array( 'Φωτογραφία χώρου', array(
			'office_image' => array( 'Οριζόντια φωτογραφία γραφείου', 'image', '' ),
		) ),
		'education' => array( 'Ακαδημαϊκή Εκπαίδευση & Ερευνητικό Έργο', array(
			'education_title' => array( 'Τίτλος', 'text', 'Ακαδημαϊκή Εκπαίδευση & Ερευνητικό Έργο' ),
			'education_text' => array( 'Περιεχόμενο', 'wysiwyg', '<p>Πτυχίο Ψυχολογίας | Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης (ΑΠΘ)</p><p>Εισαγωγή το 2016 κατόπιν αριστείας στις Πανελλαδικές εξετάσεις.</p><p>Πτυχιακή Εργασία: «Οι πεποιθήσεις των νοσηλευτών για τις ψυχιατρικές διαταραχές» (Διερεύνηση γνώσεων και στάσεων του ελληνικού νοσηλευτικού προσωπικού για τις ψυχικές δυσκολίες).</p><p>Επιστημονική Δημοσίευση / Συνέδρια: Προφορική ανακοίνωση της πτυχιακής έρευνας στο 18ο Πανελλήνιο Συνέδριο Ψυχολογικής Έρευνας της Ελληνικής Ψυχολογικής Εταιρίας.</p>' ),
		) ),
		'training' => array( 'Ψυχοθεραπευτική Εξειδίκευση & Κατάρτιση', array(
			'training_title' => array( 'Τίτλος', 'text', 'Ψυχοθεραπευτική Εξειδίκευση & Κατάρτιση' ),
			'training_text' => array( 'Περιεχόμενο', 'wysiwyg', '<p>Γνωστική Συμπεριφορική Ψυχοθεραπεία (CBT): Τετραετής εξειδικευμένη εκπαίδευση στην Ελληνική Εταιρία Έρευνας της Συμπεριφοράς - Παράρτημα Μακεδονίας (πιστοποιημένη από την EABCT - European Association for Behavioural and Cognitive Therapies). Περιλαμβάνει εκατοντάδες ώρες θεωρητικής κατάρτισης, πρακτικής άσκησης, εποπτείας και διαχείρισης κλινικών περιστατικών.</p><p>Θεραπεία Αποδοχής και Δέσμευσης (ACT): Εκπαίδευση στην Ελληνική Εταιρία Έρευνας της Συμπεριφοράς.</p><p>Συνεχής Επαγγελματική Ανάπτυξη &amp; Δια Βίου Μάθηση:</p><p>Συνεχής εποπτική υποστήριξη σε CBT, ACT και Θεραπεία Σχημάτων.</p><p>Προσωπική θεραπεία και αδιάλειπτη παρακολούθηση επιστημονικών συνεδρίων και εξελίξεων στον τομέα της Ψυχολογίας.</p>' ),
		) ),
		'experience' => array( 'Κλινική & Επαγγελματική Εμπειρία', array(
			'experience_title' => array( 'Τίτλος', 'text', 'Κλινική & Επαγγελματική Εμπειρία' ),
			'experience_text' => array( 'Περιεχόμενο', 'wysiwyg', '<p>Κινητή Μονάδα Ψυχικής Υγείας Ενηλίκων Ημαθίας:</p><p>Ατομικές ψυχοθεραπευτικές συνεδρίες με ενήλικες.</p><p>Στενή συνεργασία εντός πολυκλαδικής/διεπιστημονικής ομάδας (ψυχίατροι, ψυχολόγοι, κοινωνικοί λειτουργοί).</p><p>Ευαισθητοποίηση και ενημέρωση της τοπικής κοινότητας μέσω ομιλιών σε σχολεία, κοινωνικές υπηρεσίες και συγγραφής άρθρων στην ιστοσελίδα της δομής.</p><p>Ψυχολογικό Κέντρο «Στήριξις» (Θεσσαλονίκη): Παροχή ψυχολογικών υπηρεσιών στο πλαίσιο της πρακτικής άσκησης.</p><p>Κέντρο Ειδικών Θεραπειών: Ατομικές συνεδρίες και συμβουλευτική υποστήριξη σε παιδιά και εφήβους με δυσλεξία και μαθησιακές δυσκολίες.</p><p>ΚΑΠΗ Δήμου Βέροιας: Συντονισμός ομαδικών ψυχοθεραπευτικών προγραμμάτων και συμβουλευτικής σε άτομα τρίτης ηλικίας.</p>' ),
		) ),
		'volunteering' => array( 'Εθελοντική Δράση', array(
			'volunteering_title' => array( 'Τίτλος', 'text', 'Εθελοντική Δράση' ),
			'volunteering_text' => array( 'Περιεχόμενο', 'wysiwyg', '<p>ΚΕΘΕΑ / ΚΕΘΕΑ ΙΘΑΚΗ: Παροχή εθελοντικών υπηρεσιών σε συμβουλευτικό ρόλο για θέματα εξαρτήσεων (ουσίες, αλκοόλ, διαδίκτυο).</p><p>«Πρωτοβουλία για το Παιδί»: Προσφορά δεκάδων ωρών εθελοντικής εργασίας με την ιδιότητα του φροντιστή.</p>' ),
		) ),
	);
}

/** Keep uploaded images and identity; isolate the original copy from old drafts. */
function custom_starter_biography_field_name( $name ) {
	return ( in_array( $name, array( 'image', 'office_image', 'eyebrow', 'title', 'profession', 'intro_button' ), true ) ? 'tr_biography_' : 'tr_biography_exact_' ) . $name;
}

/** Register groups solely for the biography template. */
function custom_starter_register_biography_fields() {
	$order = 0;
	foreach ( custom_starter_biography_schema() as $section => $definition ) {
		$fields = array();
		foreach ( $definition[1] as $name => $spec ) {
			$field = array(
				'key' => 'field_' . custom_starter_biography_field_name( $name ),
				'name' => custom_starter_biography_field_name( $name ),
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
			if ( 'office_image' === $name ) {
				$field['instructions'] = 'Επιλέξτε οριζόντια φωτογραφία του χώρου. Χωρίς επιλογή εμφανίζεται ενδεικτική εικόνα με σχετική λεζάντα. Συμπληρώστε το εναλλακτικό κείμενο στα Πολυμέσα.';
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
			'description' => 'Αυτούσιο κείμενο από το Word της πελάτισσας. Η μορφοποίηση δεν αλλάζει τη διατύπωση.',
			'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/biography.php' ) ) ),
		) );
	}
}
add_action( 'acf/init', 'custom_starter_register_biography_fields' );

/** Read only this page's values; preserve intentional blanks. */
function custom_starter_biography_value( $name ) {
	$id = get_queried_object_id();
	if ( function_exists( 'get_field' ) && metadata_exists( 'post', $id, custom_starter_biography_field_name( $name ) ) ) {
		$value = get_field( custom_starter_biography_field_name( $name ), $id );
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
