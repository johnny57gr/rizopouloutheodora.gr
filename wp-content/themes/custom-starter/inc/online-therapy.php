<?php
/** Online therapy: verbatim client email copy and ACF Free fields. @package Custom_Starter */
defined( 'ABSPATH' ) || exit;

function custom_starter_online_schema() {
	return array(
		'intro' => array( 'Εισαγωγή', array(
			'title' => array( 'Τίτλος', 'text', 'Online συνεδρίες ψυχοθεραπείας' ),
			'intro' => array( 'Εισαγωγικό κείμενο', 'textarea', 'Οι online συνεδρίες ψυχοθεραπείας αποτελούν μια σύγχρονη μορφή παροχής υπηρεσιών ψυχικής υγείας, η οποία πραγματοποιείται μέσω ασφαλών διαδικτυακών μέσων επικοινωνίας. Προσφέρουν τη δυνατότητα πρόσβασης σε ψυχολογική υποστήριξη και θεραπευτική παρέμβαση ανεξάρτητα από τη γεωγραφική θέση του ατόμου, διευκολύνοντας την ένταξη της θεραπευτικής διαδικασίας στην καθημερινότητά του.' ),
			'image' => array( 'Οριζόντια φωτογραφία', 'image', '' ),
		) ),
		'relationship' => array( 'Θεραπευτική σχέση', array(
			'relationship' => array( 'Θεμελιώδεις αρχές', 'textarea', 'Η διαδικτυακή ψυχοθεραπεία βασίζεται στις θεμελιώδεις αρχές της θεραπευτικής σχέσης, όπως η εμπιστοσύνη, η αποδοχή, η ενσυναίσθηση και η εμπιστευτικότητα.' ),
			'reflection' => array( 'Θεραπευτικό πλαίσιο', 'textarea', 'Μέσα σε ένα σταθερό και υποστηρικτικό θεραπευτικό πλαίσιο, το άτομο έχει τη δυνατότητα να επεξεργαστεί τις εμπειρίες του, να αναγνωρίσει επαναλαμβανόμενα μοτίβα σκέψης και συμπεριφοράς και να ενισχύσει την αυτογνωσία και τις προσωπικές του δεξιότητες.' ),
		) ),
		'closing' => array( 'Κατακλείδα', array(
			'closing' => array( 'Καταληκτική παράγραφος', 'textarea', 'Η θεραπευτική διαδικασία προσαρμόζεται στις ιδιαίτερες ανάγκες και στους στόχους κάθε ατόμου, με σκοπό την ενίσχυση της ψυχικής ευεξίας και τη βελτίωση της ποιότητας ζωής.' ),
		) ),
	);
}

function custom_starter_register_online_fields() {
	$order = 0;
	foreach ( custom_starter_online_schema() as $section => $definition ) {
		$fields = array();
		foreach ( $definition[1] as $name => $spec ) {
			$field = array( 'key' => 'field_tr_online_' . $name, 'name' => 'tr_online_' . $name, 'label' => $spec[0], 'type' => $spec[1], 'default_value' => $spec[2] );
			if ( 'textarea' === $spec[1] ) { $field['rows'] = 4; $field['new_lines'] = ''; }
			if ( 'image' === $spec[1] ) {
				$field['return_format'] = 'id';
				$field['preview_size'] = 'medium';
				$field['mime_types'] = 'jpg,jpeg,png,webp';
				$field['instructions'] = 'Επιλέξτε οριζόντια φωτογραφία για τη σελίδα. Χωρίς επιλογή εμφανίζεται ενδεικτική εικόνα με λεζάντα.';
			}
			$fields[] = $field;
		}
		acf_add_local_field_group( array(
			'key' => 'group_tr_online_' . $section,
			'title' => 'Online — ' . $definition[0],
			'fields' => $fields,
			'menu_order' => $order++,
			'description' => 'Αυτούσιο κείμενο από το email της πελάτισσας, με διαχωρισμό παραγράφων.',
			'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/online-therapy.php' ) ) ),
		) );
	}
}
add_action( 'acf/init', 'custom_starter_register_online_fields' );

function custom_starter_online_value( $name ) {
	$id = get_queried_object_id();
	if ( function_exists( 'get_field' ) && metadata_exists( 'post', $id, 'tr_online_' . $name ) ) {
		$value = get_field( 'tr_online_' . $name, $id );
		return is_scalar( $value ) ? (string) $value : '';
	}
	foreach ( custom_starter_online_schema() as $group ) {
		if ( isset( $group[1][ $name ] ) ) { return (string) $group[1][ $name ][2]; }
	}
	return '';
}

function custom_starter_online_text( $name ) { echo esc_html( custom_starter_online_value( $name ) ); }

