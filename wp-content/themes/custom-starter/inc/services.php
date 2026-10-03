<?php
/**
 * Services overview: independent ACF Free fields and page discovery.
 *
 * @package Custom_Starter
 */
defined( 'ABSPATH' ) || exit;

/** Fixed four-service overview; each detail page keeps its own layout. */
function custom_starter_services_schema() {
	$groups = array(
		'intro' => array( 'Εισαγωγή', array(
			'eyebrow' => array( 'Μικρός τίτλος', 'text', 'ΟΙ ΥΠΗΡΕΣΙΕΣ ΜΟΥ' ),
			'title' => array( 'Τίτλος', 'text', 'Ένας χώρος για όσα σας απασχολούν' ),
			'intro' => array( 'Εισαγωγικό κείμενο', 'textarea', 'Με ασφάλεια, αποδοχή και σεβασμό, αναζητούμε μαζί τρόπους να διαχειριστείτε τις δυσκολίες και να προχωρήσετε προς μια ζωή με νόημα.' ),
		) ),
	);
	$services = array(
		array( 'Ατομική Ψυχοθεραπεία Ενηλίκων', 'Μια συνεργατική θεραπευτική σχέση για να κατανοήσετε τις δυσκολίες σας και να αναγνωρίσετε μοτίβα σκέψης και συμπεριφοράς. Με εργαλεία από τη Γνωστική Συμπεριφορική Θεραπεία (CBT) και τη Θεραπεία Αποδοχής και Δέσμευσης (ACT), αναπτύσσετε νέους τρόπους διαχείρισης των συναισθημάτων και των καθημερινών προκλήσεων.' ),
		array( 'Θεραπεία Ζεύγους', 'Ένας ασφαλής και ουδέτερος χώρος όπου ακούγονται και οι δύο σύντροφοι με ισοτιμία και σεβασμό. Μαζί αναγνωρίζουμε τα μοτίβα που δυσκολεύουν την επικοινωνία και αναζητούμε νέους τρόπους έκφρασης των αναγκών, με στόχο την ενσυναίσθηση, τη συναισθηματική σύνδεση και την από κοινού διαχείριση των δυσκολιών.' ),
		array( 'Συμβουλευτική & Ψυχοθεραπεία Εφήβων', 'Ένας προσωπικός, ασφαλής χώρος όπου ο έφηβος μπορεί να κατανοήσει τα συναισθήματά του και να βρει τις δικές του απαντήσεις. Η υποστήριξη εστιάζει στη διαχείριση του άγχους, στην αυτοεκτίμηση και στις σχέσεις, με σεβασμό στο απόρρητό του και παράλληλες συμβουλευτικές συναντήσεις με τους γονείς.' ),
		array( 'Online συνεδρίες', 'Υπάρχει δυνατότητα online συνεδριών. Επικοινωνήστε μαζί μου για πληροφορίες σχετικά με τη διαδικασία και τον προγραμματισμό μιας συνάντησης.' ),
	);
	foreach ( $services as $index => $service ) {
		$prefix = 'service_' . ( $index + 1 );
		$groups[ $prefix ] = array(
			$service[0],
			array(
				$prefix . '_title' => array( 'Τίτλος', 'text', $service[0] ),
				$prefix . '_text' => array( 'Σύντομη περιγραφή', 'textarea', $service[1] ),
				$prefix . '_image' => array( 'Εικόνα', 'image', '' ),
				$prefix . '_url' => array( 'Σύνδεσμος ξεχωριστής σελίδας', 'url', '' ),
				$prefix . '_button' => array( 'Κείμενο συνδέσμου', 'text', 'Περισσότερα' ),
			),
		);
	}
	$groups['cta'] = array( 'Πρόσκληση επικοινωνίας', array(
		'cta_title' => array( 'Τίτλος', 'text', 'Ας βρούμε μαζί το επόμενο βήμα.' ),
		'cta_text' => array( 'Κείμενο', 'textarea', 'Επικοινωνήστε μαζί μου για πληροφορίες σχετικά με τις συνεδρίες.' ),
	) );
	return $groups;
}

/** Register groups solely for the overview template. */
function custom_starter_register_services_fields() {
	$order = 0;
	foreach ( custom_starter_services_schema() as $section => $definition ) {
		$fields = array();
		foreach ( $definition[1] as $name => $spec ) {
			$field = array(
				'key' => 'field_tr_services_' . $name,
				'name' => 'tr_services_' . $name,
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
			'key' => 'group_tr_services_' . $section,
			'title' => 'Υπηρεσίες — ' . $definition[0],
			'fields' => $fields,
			'menu_order' => $order++,
			'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/services.php' ) ) ),
		) );
	}
}
add_action( 'acf/init', 'custom_starter_register_services_fields' );

/** Refresh unchanged mockup text in both the editor and frontend. */
function custom_starter_services_refresh_copy( $value, $post_id, $field ) {
	if ( 0 !== strpos( $field['name'], 'tr_services_' ) || ! is_string( $value ) ) {
		return $value;
	}
	$drafts = array(
		'Υποστήριξη σε κάθε στάδιο της ζωής' => 'Ένας χώρος για όσα σας απασχολούν',
		'Ένας χώρος ακρόασης και επικοινωνίας, με σεβασμό στις δικές σας ανάγκες.' => 'Με ασφάλεια, αποδοχή και σεβασμό, αναζητούμε μαζί τρόπους να διαχειριστείτε τις δυσκολίες και να προχωρήσετε προς μια ζωή με νόημα.',
		'Ατομικές συνεδρίες' => 'Ατομική Ψυχοθεραπεία Ενηλίκων',
		'Χρόνος και χώρος για να μιλήσετε για όσα σας απασχολούν, να κατανοήσετε τον εαυτό σας και να εξερευνήσετε προσωπικές δυσκολίες.' => 'Μια συνεργατική θεραπευτική σχέση για να κατανοήσετε τις δυσκολίες σας και να αναγνωρίσετε μοτίβα σκέψης και συμπεριφοράς. Με εργαλεία από τη Γνωστική Συμπεριφορική Θεραπεία (CBT) και τη Θεραπεία Αποδοχής και Δέσμευσης (ACT), αναπτύσσετε νέους τρόπους διαχείρισης των συναισθημάτων και των καθημερινών προκλήσεων.',
		'Συμβουλευτική ζεύγους' => 'Θεραπεία Ζεύγους',
		'Ένας κοινός χώρος συζήτησης για τη σχέση, την επικοινωνία και τις ανάγκες του καθενός, με στόχο την καλύτερη κατανόηση.' => 'Ένας ασφαλής και ουδέτερος χώρος όπου ακούγονται και οι δύο σύντροφοι με ισοτιμία και σεβασμό. Μαζί αναγνωρίζουμε τα μοτίβα που δυσκολεύουν την επικοινωνία και αναζητούμε νέους τρόπους έκφρασης των αναγκών, με στόχο την ενσυναίσθηση, τη συναισθηματική σύνδεση και την από κοινού διαχείριση των δυσκολιών.',
		'Παιδιά / Έφηβοι' => 'Συμβουλευτική & Ψυχοθεραπεία Εφήβων',
		'Υποστήριξη για τις συναισθηματικές και κοινωνικές δυσκολίες που μπορεί να εμφανίζονται κατά την παιδική και εφηβική ηλικία.' => 'Ένας προσωπικός, ασφαλής χώρος όπου ο έφηβος μπορεί να κατανοήσει τα συναισθήματά του και να βρει τις δικές του απαντήσεις. Η υποστήριξη εστιάζει στη διαχείριση του άγχους, στην αυτοεκτίμηση και στις σχέσεις, με σεβασμό στο απόρρητό του και παράλληλες συμβουλευτικές συναντήσεις με τους γονείς.',
		'Η δυνατότητα να επικοινωνήσουμε διαδικτυακά, από τον δικό σας χώρο. Συζητάμε μαζί αν αυτός ο τρόπος συνεδρίας ταιριάζει στις ανάγκες σας.' => 'Υπάρχει δυνατότητα online συνεδριών. Επικοινωνήστε μαζί μου για πληροφορίες σχετικά με τη διαδικασία και τον προγραμματισμό μιας συνάντησης.',
	);
	return isset( $drafts[ $value ] ) ? $drafts[ $value ] : $value;
}
add_filter( 'acf/load_value', 'custom_starter_services_refresh_copy', 10, 3 );

/** Read only this page's values; preserve intentional blanks. */
function custom_starter_services_value( $name ) {
	$id = get_queried_object_id();
	if ( function_exists( 'get_field' ) && metadata_exists( 'post', $id, 'tr_services_' . $name ) ) {
		$value = get_field( 'tr_services_' . $name, $id );
		return is_scalar( $value ) ? (string) $value : '';
	}
	foreach ( custom_starter_services_schema() as $group ) {
		if ( isset( $group[1][ $name ] ) ) {
			return (string) $group[1][ $name ][2];
		}
	}
	return '';
}

/** Find published template pages without assuming a slug. */
function custom_starter_service_template_url( $template ) {
	static $urls = array();
	if ( ! array_key_exists( $template, $urls ) ) {
		$pages = get_posts( array(
			'post_type' => 'page',
			'post_status' => 'publish',
			'posts_per_page' => 1,
			'meta_key' => '_wp_page_template',
			'meta_value' => $template,
			'fields' => 'ids',
			'orderby' => 'ID',
			'order' => 'ASC',
		) );
		$urls[ $template ] = $pages ? get_permalink( $pages[0] ) : '';
	}
	return $urls[ $template ];
}

/** Prefer the new overview; until publication, retain the homepage anchor. */
function custom_starter_services_page_url() {
	$url = custom_starter_service_template_url( 'page-templates/services.php' );
	return $url ? $url : home_url( '/#services' );
}

