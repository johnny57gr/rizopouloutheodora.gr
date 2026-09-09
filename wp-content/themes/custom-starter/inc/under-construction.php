<?php
/**
 * Optional public-facing construction screen.
 *
 * @package Custom_Starter
 */

defined( 'ABSPATH' ) || exit;

/** Register controls using the native Customizer and theme modifications. */
function custom_starter_construction_customize( $wp_customize ) {
	$wp_customize->add_section(
		'custom_starter_construction',
		array(
			'title'       => __( 'Υπό κατασκευή', 'custom-starter' ),
			'description' => __( 'Όταν είναι ενεργό, οι επισκέπτες βλέπουν το παρακάτω μήνυμα. Οι συνδεδεμένοι διαχειριστές βλέπουν κανονικά το site.', 'custom-starter' ),
			'capability'  => 'manage_options',
		)
	);
	$wp_customize->add_setting(
		'custom_starter_construction_enabled',
		array(
			'default'           => false,
			'capability'        => 'manage_options',
			'sanitize_callback' => 'custom_starter_construction_sanitize_enabled',
		)
	);
	$wp_customize->add_control(
		'custom_starter_construction_enabled',
		array(
			'section' => 'custom_starter_construction',
			'type'    => 'checkbox',
			'label'   => __( 'Ενεργοποίηση (ON / OFF)', 'custom-starter' ),
		)
	);
	$wp_customize->add_setting(
		'custom_starter_construction_message',
		array(
			'default'           => __( 'Ετοιμάζουμε τη νέα μας ιστοσελίδα. Θα είμαστε σύντομα κοντά σας!', 'custom-starter' ),
			'capability'        => 'manage_options',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'custom_starter_construction_message',
		array(
			'section'     => 'custom_starter_construction',
			'type'        => 'textarea',
			'label'       => __( 'Μήνυμα επισκεπτών', 'custom-starter' ),
			'description' => __( 'Απλό κείμενο με δυνατότητα αλλαγής γραμμής.', 'custom-starter' ),
		)
	);
}
add_action( 'customize_register', 'custom_starter_construction_customize' );

/**
 * Validate checkbox input.
 *
 * @param mixed $value Submitted value.
 * @return bool
 */
function custom_starter_construction_sanitize_enabled( $value ) {
	return in_array( $value, array( true, 1, '1' ), true );
}

/** Replace public frontend responses while allowing administrators to work. */
function custom_starter_construction_redirect() {
	if ( ! get_theme_mod( 'custom_starter_construction_enabled', false ) || current_user_can( 'manage_options' ) || is_admin() || wp_doing_ajax() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return;
	}

	status_header( 503 );
	nocache_headers();
	header( 'Retry-After: 3600' );
	header( 'X-Robots-Tag: noindex, nofollow', true );
	header( 'Content-Type: text/html; charset=' . get_bloginfo( 'charset' ) );
	add_filter( 'pre_get_document_title', 'custom_starter_construction_title' );
	get_template_part( 'template-parts/content/under-construction' );
	exit;
}
add_action( 'template_redirect', 'custom_starter_construction_redirect', 0 );

/**
 * Give every construction response an appropriate document title.
 *
 * @return string
 */
function custom_starter_construction_title() {
	return __( 'Υπό κατασκευή', 'custom-starter' ) . ' — ' . get_bloginfo( 'name' );
}
