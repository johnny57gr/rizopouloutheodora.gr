<?php
/** Project-specific ACF Free integration. @package Custom_Starter */
defined( 'ABSPATH' ) || exit;
function custom_starter_home_schema() {
	return array(
		'hero' => array( 'Κεντρική ενότητα', array(
			'hero_eyebrow' => array( 'Μικρός τίτλος', 'text', 'ΑΣΦΑΛΕΙΑ · ΑΠΟΔΟΧΗ · ΣΕΒΑΣΜΟΣ' ),
			'hero_title' => array( 'Τίτλος', 'textarea', 'Μαζί, προς μια ζωή με νόημα' ),
			'hero_text' => array( 'Κείμενο', 'textarea', 'Σε ένα ασφαλές περιβάλλον αποδοχής, κατανοούμε τις δυσκολίες σας και αναζητούμε νέους τρόπους διαχείρισης των σκέψεων και των συναισθημάτων σας.' ),
			'hero_image' => array( 'Εικόνα', 'image', '' ),
			'hero_button' => array( 'Κουμπί', 'text', 'Επικοινωνήστε μαζί μου' ),
		) ),
		'services' => array( 'Υπηρεσίες', array(
			'services_title' => array( 'Τίτλος', 'text', 'Υποστήριξη με επίκεντρο τις ανάγκες σας' ),
			'services_text' => array( 'Εισαγωγή', 'textarea', 'Ατομική ψυχοθεραπεία ενηλίκων, υποστήριξη εφήβων και θεραπεία ζεύγους.' ),
			'service_1_title' => array( '1 — Τίτλος', 'text', 'Ατομική Ψυχοθεραπεία Ενηλίκων' ),
			'service_1_text' => array( '1 — Κείμενο', 'textarea', 'Κατανόηση των δυσκολιών και των μοτίβων σκέψης και συμπεριφοράς, με εργαλεία από τη Γνωστική Συμπεριφορική Θεραπεία (CBT) και τη Θεραπεία Αποδοχής και Δέσμευσης (ACT).' ),
			'service_1_link' => array( '1 — Σύνδεσμος', 'url', '' ),
			'service_2_title' => array( '2 — Τίτλος', 'text', 'Θεραπεία Ζεύγους' ),
			'service_2_text' => array( '2 — Κείμενο', 'textarea', 'Ένας ασφαλής χώρος όπου ακούγονται και οι δύο σύντροφοι, με στόχο την καλύτερη επικοινωνία, την ενσυναίσθηση και τη συναισθηματική σύνδεση.' ),
			'service_2_link' => array( '2 — Σύνδεσμος', 'url', '' ),
			'service_3_title' => array( '3 — Τίτλος', 'text', 'Έφηβοι' ),
			'service_3_text' => array( '3 — Κείμενο', 'textarea', 'Υποστήριξη στη διαχείριση του άγχους και των συναισθημάτων, στην ενίσχυση της αυτοεκτίμησης και στις σχέσεις με τους άλλους, με σεβασμό στο απόρρητο του εφήβου.' ),
			'service_3_link' => array( '3 — Σύνδεσμος', 'url', '' ),
			'service_4_title' => array( '4 — Τίτλος', 'text', 'Online συνεδρίες' ),
			'service_4_text' => array( '4 — Κείμενο', 'textarea', 'Δυνατότητα online συνεδριών. Επικοινωνήστε μαζί μου για πληροφορίες και προγραμματισμό συνάντησης.' ),
			'service_4_link' => array( '4 — Σύνδεσμος', 'url', '' ),
		) ),
		'about' => array( 'Σχετικά με εμένα', array(
			'about_title' => array( 'Τίτλος', 'textarea', "Γεια σας, είμαι η\nΘεοδώρα Ριζοπούλου" ),
			'about_text' => array( 'Κείμενο', 'textarea', 'Είμαι απόφοιτη Ψυχολογίας του Αριστοτελείου Πανεπιστημίου Θεσσαλονίκης, με εκπαίδευση στη Γνωστική Συμπεριφορική Ψυχοθεραπεία (CBT) και στη Θεραπεία Αποδοχής και Δέσμευσης (ACT). Στη δουλειά μου δίνω έμφαση στη θεραπευτική συνεργασία, τη ζεστασιά, την ειλικρίνεια και τον σεβασμό.' ),
			'about_image' => array( 'Εικόνα', 'image', '' ),
			'about_link' => array( 'Σύνδεσμος βιογραφικού', 'url', '' ),
		) ),
		'quote' => array( 'Προσέγγιση', array(
			'quote_text' => array( 'Φράση', 'textarea', 'Ζεστασιά, ειλικρίνεια και σεβασμός' ),
			'quote_note' => array( 'Κείμενο', 'textarea', 'Η θεραπεία πραγματοποιείται σε περιβάλλον απόλυτης αποδοχής, ασφάλειας και εχέμυθειας, λειτουργώντας μαζί ως «συνοδοιπόροι» προς την αλλαγή.' ),
		) ),
		'office' => array( 'Ο χώρος μου', array(
			'office_title' => array( 'Τίτλος', 'textarea', 'Ο χώρος των συνεδριών στη Βέροια' ),
			'office_text' => array( 'Κείμενο', 'textarea', 'Το γραφείο μου βρίσκεται στην οδό Βενιζέλου 27, στη Βέροια.' ),
			'office_image' => array( 'Πραγματική φωτογραφία γραφείου', 'image', '' ),
			'office_link' => array( 'Σύνδεσμος παρουσίασης', 'url', '' ),
		) ),
		'contact' => array( 'Επικοινωνία και στοιχεία ιστοσελίδας', array(
			'contact_title' => array( 'Τίτλος', 'textarea', "Είμαι εδώ για να συζητήσουμε\nό,τι σας απασχολεί." ),
			'contact_intro' => array( 'Κείμενο πρόσκλησης επικοινωνίας', 'textarea', 'Για πληροφορίες ή για να προγραμματίσουμε μια συνάντηση, μπορείτε να με καλέσετε ή να μου στείλετε ένα μήνυμα μέσω της φόρμας επικοινωνίας.' ),
			'contact_page_url' => array( 'Σύνδεσμος σελίδας Επικοινωνία', 'url', '' ),
			'phone' => array( 'Τηλέφωνο με κωδικό χώρας', 'text', '+30 698 456 5423' ),
			'email' => array( 'Email', 'email', 'rizopouloutheodora@gmail.com' ),
			'address' => array( 'Διεύθυνση', 'text', 'Βενιζέλου 27, Βέροια 59132' ),
			'facebook' => array( 'Facebook URL', 'url', 'https://www.facebook.com/p/%CE%A1%CE%B9%CE%B6%CE%BF%CF%80%CE%BF%CF%8D%CE%BB%CE%BF%CF%85-%CE%98%CE%B5%CE%BF%CE%B4%CF%8E%CF%81%CE%B1-%CE%A8%CF%85%CF%87%CE%BF%CE%BB%CF%8C%CE%B3%CE%BF%CF%82-%CE%A8%CF%85%CF%87%CE%BF%CE%B8%CE%B5%CF%81%CE%B1%CF%80%CE%B5%CF%8D%CF%84%CF%81%CE%B9%CE%B1-61582944533827/' ),
			'viber' => array( 'Viber κινητό με κωδικό χώρας', 'text', '' ),
			'linkedin' => array( 'LinkedIn URL', 'url', 'https://www.linkedin.com/in/%CF%81%CE%B9%CE%B6%CE%BF%CF%80%CE%BF%CF%8D%CE%BB%CE%BF%CF%85-%CE%B8%CE%B5%CE%BF%CE%B4%CF%8E%CF%81%CE%B1-%CF%88%CF%85%CF%87%CE%BF%CE%BB%CF%8C%CE%B3%CE%BF%CF%82-%CF%88%CF%85%CF%87%CE%BF%CE%B8%CE%B5%CF%81%CE%B1%CF%80%CE%B5%CF%8D%CF%84%CF%81%CE%B9%CE%B1-3b9a80221/?locale=el' ),
			'whatsapp' => array( 'WhatsApp URL', 'url', '' ),
			'blog_title' => array( 'Τίτλος άρθρων', 'text', 'Σκέψεις που μοιραζόμαστε' ),
		) ),
	);
}
/** Use confirmed contact fields so saved mockup details cannot override them. */
function custom_starter_home_field_name( $name ) {
	return ( in_array( $name, array( 'phone', 'email', 'facebook', 'linkedin' ), true ) ? 'tr_contact_confirmed_' : 'tr_' ) . $name;
}
function custom_starter_register_home_fields() {
	foreach ( custom_starter_home_schema() as $section => $definition ) {
		$fields = array();
		foreach ( $definition[1] as $name => $spec ) {
			$field = array( 'key' => 'field_' . custom_starter_home_field_name( $name ), 'name' => custom_starter_home_field_name( $name ), 'label' => $spec[0], 'type' => $spec[1], 'default_value' => $spec[2] );
			if ( preg_match( '/^service_[1-4]_link$/', $name ) ) { $field['instructions'] = 'Σύνδεσμος της αντίστοιχης αναλυτικής υπηρεσίας. Αν μείνει κενό, η πρώτη υπηρεσία εντοπίζει αυτόματα τη σελίδα Ατομικής Ψυχοθεραπείας· στις υπόλοιπες δεν εμφανίζεται βελάκι μέχρι να οριστεί σύνδεσμος.'; }
			if ( 'phone' === $name ) { $field['instructions'] = 'Αριθμός με κωδικό χώρας. Χρησιμοποιείται σε όλα τα κουμπιά κλήσης της ιστοσελίδας.'; }
			if ( 'contact_page_url' === $name ) { $field['instructions'] = 'Προαιρετική αντικατάσταση. Αν μείνει κενό, εντοπίζεται αυτόματα η δημοσιευμένη σελίδα με πρότυπο Επικοινωνία.'; }
			if ( 'viber' === $name ) { $field['instructions'] = 'Πλήρης αριθμός με κωδικό χώρας, π.χ. +30. Αφήστε κενό για να χρησιμοποιείται το τηλέφωνο επικοινωνίας.'; }
			if ( 'textarea' === $spec[1] ) { $field['rows'] = 3; $field['new_lines'] = ''; }
			if ( 'image' === $spec[1] ) { $field['return_format'] = 'id'; $field['preview_size'] = 'medium'; $field['mime_types'] = 'jpg,jpeg,png,webp'; $field['instructions'] = 'Χωρίς επιλογή εμφανίζεται η προσωρινή εικόνα του σχεδιασμού.'; }
			$fields[] = $field;
		}
		acf_add_local_field_group( array( 'key' => 'group_tr_' . $section, 'title' => $definition[0], 'fields' => $fields, 'location' => array( array( array( 'param' => 'page_type', 'operator' => '==', 'value' => 'front_page' ) ) ) ) );
	}
}
add_action( 'acf/init', 'custom_starter_register_home_fields' );
/** Replace only unchanged mockup copy; preserve custom edits and intentional blanks. */
function custom_starter_home_refresh_copy( $value, $post_id, $field ) {
	if ( (int) $post_id !== (int) get_option( 'page_on_front' ) ) {
		return $value;
	}
	$previous = array(
		'tr_hero_eyebrow' => 'ΨΥΧΙΚΗ ΥΓΕΙΑ · ΣΤΗΡΙΞΗ · ΕΞΕΛΙΞΗ',
		'tr_hero_title' => "Μαζί,\nγια μια πιο\nισορροπημένη ζωή",
		'tr_hero_text' => 'Ψυχολογική υποστήριξη για να κατανοήσετε τον εαυτό σας, να διαχειριστείτε τις δυσκολίες και να δημιουργήσετε τις συνθήκες για μια ουσιαστική αλλαγή.',
		'tr_services_title' => 'Σε κάθε στάδιο της ζωής σας',
		'tr_services_text' => 'Ψυχολογική υποστήριξη προσαρμοσμένη στις δικές σας ανάγκες.',
		'tr_service_1_title' => 'Ατομικές συνεδρίες',
		'tr_service_1_text' => 'Ένας χώρος για να εξερευνήσετε τις σκέψεις, τα συναισθήματα και τις προκλήσεις σας, με στόχο την προσωπική σας εξέλιξη.',
		'tr_service_2_title' => 'Συμβουλευτική ζεύγους',
		'tr_service_2_text' => 'Στήριξη στη σχέση, καλύτερη επικοινωνία και ουσιαστική κατανόηση, για να χτίσετε ξανά τη σύνδεσή σας.',
		'tr_service_3_title' => 'Παιδιά / Έφηβοι',
		'tr_service_3_text' => 'Υποστήριξη για τα παιδιά και τους εφήβους σε θέματα συναισθηματικής, κοινωνικής και σχολικής ζωής.',
		'tr_service_4_text' => 'Η ψυχολογική υποστήριξη είναι προσβάσιμη, όπου κι αν βρίσκεστε.',
		'tr_about_text' => 'Είμαι ψυχολόγος - ψυχοθεραπεύτρια και πιστεύω στη δύναμη της ανθρώπινης επαφής και στη σημασία της ψυχικής ευεξίας. Στόχος μου είναι να δημιουργήσω έναν ασφαλή, υποστηρικτικό και αποδεκτικό χώρο, όπου μπορείτε να εκφραστείτε ελεύθερα, να κατανοήσετε τον εαυτό σας και να βρείτε νέους τρόπους να αντιμετωπίσετε τις δυσκολίες.',
		'tr_quote_text' => 'Πιστεύω σε έναν άνθρωπο που εξελίσσεται, όχι σε έναν άνθρωπο που «διορθώνεται»',
		'tr_quote_note' => 'Η ψυχοθεραπεία είναι μια αυθεντική πορεία αυτογνωσίας, αποδοχής και αλλαγής, με σεβασμό στον μοναδικό ρυθμό και τις ανάγκες του καθενός.',
		'tr_office_title' => "Ένας ήρεμος χώρος\nστη Βέροια",
	);
	$name = $field['name'];
	if ( ! isset( $previous[ $name ] ) || $previous[ $name ] !== $value ) {
		return $value;
	}
	foreach ( custom_starter_home_schema() as $section ) {
		$key = substr( $name, 3 );
		if ( isset( $section[1][ $key ] ) ) {
			return $section[1][ $key ][2];
		}
	}
	return $value;
}
add_filter( 'acf/load_value', 'custom_starter_home_refresh_copy', 10, 3 );

function custom_starter_home_value( $name ) {
	$id = (int) get_option( 'page_on_front' );
	if ( $id && ! post_password_required( $id ) && function_exists( 'get_field' ) && metadata_exists( 'post', $id, custom_starter_home_field_name( $name ) ) ) {
		$value = get_field( custom_starter_home_field_name( $name ), $id );
		$value = is_scalar( $value ) ? (string) $value : '';
		return $value;
	}
	foreach ( custom_starter_home_schema() as $section ) { if ( isset( $section[1][ $name ] ) ) { return (string) $section[1][ $name ][2]; } }
	return '';
}
function custom_starter_home_text( $name ) { echo esc_html( custom_starter_home_value( $name ) ); }
function custom_starter_home_image( $name, $fallback, $eager = false ) {
	$id = absint( custom_starter_home_value( $name ) );
	if ( $id && wp_attachment_is_image( $id ) ) { echo wp_get_attachment_image( $id, 'full', false, array( 'loading' => $eager ? 'eager' : 'lazy' ) ); return; }
	printf( '<img src="%s" alt="" loading="%s">', esc_url( get_theme_file_uri( 'assets/images/' . $fallback ) ), $eager ? 'eager' : 'lazy' );
}
function custom_starter_phone_url() {
	$number = preg_replace( '/[^0-9+]/', '', custom_starter_home_value( 'phone' ) );
	return preg_match( '/^\+?[0-9]{6,15}$/', $number ) ? 'tel:' . $number : '';
}
function custom_starter_project_menu() {
	echo '<ul class="menu">';
	foreach ( array( '' => 'Αρχική', 'services' => 'Υπηρεσίες', 'about' => 'Σχετικά με εμένα', 'journal' => 'Άρθρα', 'contact' => 'Επικοινωνία' ) as $anchor => $label ) {
		$url = home_url( '/' ) . ( $anchor ? '#' . $anchor : '' );
		if ( 'about' === $anchor && custom_starter_biography_page_url() ) { $url = custom_starter_biography_page_url(); }
		if ( 'services' === $anchor ) { $url = custom_starter_services_page_url(); }
		if ( 'contact' === $anchor && custom_starter_contact_page_url() ) { $url = custom_starter_contact_page_url(); }
		printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
}
	echo '</ul>';
}

/** Use the shared mobile when no separate Viber number is supplied. */
function custom_starter_viber_url() {
	$number = trim( custom_starter_home_value( 'viber' ) );
	$number = preg_replace( '/[^0-9]/', '', $number ? $number : custom_starter_home_value( 'phone' ) );
	if ( 0 === strpos( $number, '00' ) ) { $number = substr( $number, 2 ); }
	if ( preg_match( '/^69[0-9]{8}$/', $number ) ) { $number = '30' . $number; }
	return preg_match( '/^[0-9]{6,15}$/', $number ) ? 'viber://chat?number=%2B' . $number : '';
}
