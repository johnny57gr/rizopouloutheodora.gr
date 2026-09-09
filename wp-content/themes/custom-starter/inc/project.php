<?php
/** Project-specific ACF Free integration. @package Custom_Starter */
defined( 'ABSPATH' ) || exit;
function custom_starter_home_schema() {
	return array(
		'hero' => array( 'Κεντρική ενότητα', array(
			'hero_eyebrow' => array( 'Μικρός τίτλος', 'text', 'ΨΥΧΙΚΗ ΥΓΕΙΑ · ΣΤΗΡΙΞΗ · ΕΞΕΛΙΞΗ' ),
			'hero_title' => array( 'Τίτλος', 'textarea', "Μαζί,\nγια μια πιο\nισορροπημένη ζωή" ),
			'hero_text' => array( 'Κείμενο', 'textarea', 'Ψυχολογική υποστήριξη για να κατανοήσετε τον εαυτό σας, να διαχειριστείτε τις δυσκολίες και να δημιουργήσετε τις συνθήκες για μια ουσιαστική αλλαγή.' ),
			'hero_image' => array( 'Εικόνα', 'image', '' ),
			'hero_button' => array( 'Κουμπί', 'text', 'Επικοινωνήστε μαζί μου' ),
		) ),
		'services' => array( 'Υπηρεσίες', array(
			'services_title' => array( 'Τίτλος', 'text', 'Σε κάθε στάδιο της ζωής σας' ),
			'services_text' => array( 'Εισαγωγή', 'textarea', 'Ψυχολογική υποστήριξη προσαρμοσμένη στις δικές σας ανάγκες.' ),
			'service_1_title' => array( '1 — Τίτλος', 'text', 'Ατομικές συνεδρίες' ),
			'service_1_text' => array( '1 — Κείμενο', 'textarea', 'Ένας χώρος για να εξερευνήσετε τις σκέψεις, τα συναισθήματα και τις προκλήσεις σας, με στόχο την προσωπική σας εξέλιξη.' ),
			'service_1_link' => array( '1 — Σύνδεσμος', 'url', '' ),
			'service_2_title' => array( '2 — Τίτλος', 'text', 'Συμβουλευτική ζεύγους' ),
			'service_2_text' => array( '2 — Κείμενο', 'textarea', 'Στήριξη στη σχέση, καλύτερη επικοινωνία και ουσιαστική κατανόηση, για να χτίσετε ξανά τη σύνδεσή σας.' ),
			'service_2_link' => array( '2 — Σύνδεσμος', 'url', '' ),
			'service_3_title' => array( '3 — Τίτλος', 'text', 'Παιδιά / Έφηβοι' ),
			'service_3_text' => array( '3 — Κείμενο', 'textarea', 'Υποστήριξη για τα παιδιά και τους εφήβους σε θέματα συναισθηματικής, κοινωνικής και σχολικής ζωής.' ),
			'service_3_link' => array( '3 — Σύνδεσμος', 'url', '' ),
			'service_4_title' => array( '4 — Τίτλος', 'text', 'Online συνεδρίες' ),
			'service_4_text' => array( '4 — Κείμενο', 'textarea', 'Η ψυχολογική υποστήριξη είναι προσβάσιμη, όπου κι αν βρίσκεστε.' ),
			'service_4_link' => array( '4 — Σύνδεσμος', 'url', '' ),
		) ),
		'about' => array( 'Σχετικά με εμένα', array(
			'about_title' => array( 'Τίτλος', 'textarea', "Γεια σας, είμαι η\nΘεοδώρα Ριζοπούλου" ),
			'about_text' => array( 'Κείμενο', 'textarea', 'Είμαι ψυχολόγος - ψυχοθεραπεύτρια και πιστεύω στη δύναμη της ανθρώπινης επαφής και στη σημασία της ψυχικής ευεξίας. Στόχος μου είναι να δημιουργήσω έναν ασφαλή, υποστηρικτικό και αποδεκτικό χώρο, όπου μπορείτε να εκφραστείτε ελεύθερα, να κατανοήσετε τον εαυτό σας και να βρείτε νέους τρόπους να αντιμετωπίσετε τις δυσκολίες.' ),
			'about_image' => array( 'Εικόνα', 'image', '' ),
			'about_link' => array( 'Σύνδεσμος βιογραφικού', 'url', '' ),
		) ),
		'quote' => array( 'Προσέγγιση', array(
			'quote_text' => array( 'Φράση', 'textarea', 'Πιστεύω σε έναν άνθρωπο που εξελίσσεται, όχι σε έναν άνθρωπο που «διορθώνεται»' ),
			'quote_note' => array( 'Κείμενο', 'textarea', 'Η ψυχοθεραπεία είναι μια αυθεντική πορεία αυτογνωσίας, αποδοχής και αλλαγής, με σεβασμό στον μοναδικό ρυθμό και τις ανάγκες του καθενός.' ),
		) ),
		'office' => array( 'Ο χώρος μου', array(
			'office_title' => array( 'Τίτλος', 'textarea', "Ένας ήρεμος χώρος\nστη Βέροια" ),
			'office_text' => array( 'Κείμενο', 'textarea', 'Το γραφείο μου βρίσκεται στην οδό Βενιζέλου 27, στη Βέροια.' ),
			'office_image' => array( 'Πραγματική φωτογραφία γραφείου', 'image', '' ),
			'office_link' => array( 'Σύνδεσμος παρουσίασης', 'url', '' ),
		) ),
		'contact' => array( 'Επικοινωνία και στοιχεία ιστοσελίδας', array(
			'contact_title' => array( 'Τίτλος', 'textarea', "Είμαι εδώ για να συζητήσουμε\nό,τι σας απασχολεί." ),
			'contact_text' => array( 'Κείμενο', 'textarea', 'Μπορείτε επίσης να επικοινωνήσετε μαζί μου μέσω email ή στα κοινωνικά μου δίκτυα.' ),
			'phone' => array( 'Τηλέφωνο με κωδικό χώρας', 'text', '' ),
			'email' => array( 'Email', 'email', '' ),
			'address' => array( 'Διεύθυνση', 'text', 'Βενιζέλου 27, Βέροια 59132' ),
			'facebook' => array( 'Facebook URL', 'url', '' ),
			'linkedin' => array( 'LinkedIn URL', 'url', '' ),
			'whatsapp' => array( 'WhatsApp URL', 'url', '' ),
			'blog_title' => array( 'Τίτλος άρθρων', 'text', 'Σκέψεις που μοιραζόμαστε' ),
		) ),
	);
}
function custom_starter_register_home_fields() {
	foreach ( custom_starter_home_schema() as $section => $definition ) {
		$fields = array();
		foreach ( $definition[1] as $name => $spec ) {
			$field = array( 'key' => 'field_tr_' . $name, 'name' => 'tr_' . $name, 'label' => $spec[0], 'type' => $spec[1], 'default_value' => $spec[2] );
			if ( 'textarea' === $spec[1] ) { $field['rows'] = 3; $field['new_lines'] = ''; }
			if ( 'image' === $spec[1] ) { $field['return_format'] = 'id'; $field['preview_size'] = 'medium'; $field['mime_types'] = 'jpg,jpeg,png,webp'; $field['instructions'] = 'Χωρίς επιλογή εμφανίζεται η προσωρινή εικόνα του σχεδιασμού.'; }
			$fields[] = $field;
		}
		acf_add_local_field_group( array( 'key' => 'group_tr_' . $section, 'title' => $definition[0], 'fields' => $fields, 'location' => array( array( array( 'param' => 'page_type', 'operator' => '==', 'value' => 'front_page' ) ) ) ) );
	}
}
add_action( 'acf/init', 'custom_starter_register_home_fields' );
function custom_starter_home_value( $name ) {
	$id = (int) get_option( 'page_on_front' );
	if ( $id && ! post_password_required( $id ) && function_exists( 'get_field' ) && metadata_exists( 'post', $id, 'tr_' . $name ) ) {
		$value = get_field( 'tr_' . $name, $id );
		return is_scalar( $value ) ? (string) $value : '';
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
		printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( '/' ) . ( $anchor ? '#' . $anchor : '' ) ), esc_html( $label ) );
	}
	echo '</ul>';
}

