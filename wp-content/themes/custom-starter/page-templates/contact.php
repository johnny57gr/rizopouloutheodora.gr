<?php
/**
 * Template Name: Επικοινωνία
 * Template Post Type: page
 *
 * @package Custom_Starter
 */
get_header();
?>
<main id="main-content" class="contact-page section-wrap" tabindex="-1">
	<?php if ( post_password_required() ) : ?>
		<?php echo get_the_password_form(); ?>
	<?php else : ?>
		<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Διαδρομή σελίδας', 'custom-starter' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Αρχική</a>
			<span aria-hidden="true">/</span>
			<span aria-current="page"><?php echo esc_html( get_the_title() ); ?></span>
		</nav>
		<header class="contact-page-heading">
			<h1><?php echo esc_html( custom_starter_contact_value( 'title' ) ); ?></h1>
			<p><?php echo esc_html( custom_starter_contact_value( 'intro' ) ); ?></p>
		</header>
		<div class="contact-page-grid">
			<section class="contact-details" aria-labelledby="contact-details-title">
				<h2 id="contact-details-title"><?php echo esc_html( custom_starter_contact_value( 'details_title' ) ); ?></h2>
				<?php get_template_part( 'template-parts/contact/details' ); ?>
			</section>
			<section id="contact-form" class="contact-form-panel" aria-labelledby="contact-form-title">
				<h2 id="contact-form-title"><?php echo esc_html( custom_starter_contact_value( 'form_title' ) ); ?></h2>
				<?php
				$form_id = absint( custom_starter_contact_value( 'form_id' ) );
				if ( $form_id && shortcode_exists( 'ninja_form' ) ) {
					// Only a numeric ID enters this trusted, fixed shortcode.
					echo do_shortcode( '[ninja_form id="' . $form_id . '"]' );
				} else {
					?>
					<p>Μπορείτε να επικοινωνήσετε μαζί μου τηλεφωνικά<?php echo is_email( custom_starter_home_value( 'email' ) ) ? ' ή μέσω email' : ''; ?>.</p>
					<?php if ( current_user_can( 'manage_options' ) ) : ?>
						<p class="form-setup-note">Ενεργοποιήστε το Ninja Forms και συμπληρώστε το ID της φόρμας στα πεδία αυτής της σελίδας. Δεν έχει συνδεθεί ακόμη φόρμα.</p>
					<?php endif; ?>
					<?php
				}
				?>
			</section>
		</div>
		<?php
		$map_address = custom_starter_contact_value( 'map_address' );
		$map_address = $map_address ? $map_address : custom_starter_home_value( 'address' );
		if ( $map_address ) :
			?>
			<section class="contact-map" aria-labelledby="contact-map-title">
				<h2 id="contact-map-title"><?php echo esc_html( custom_starter_contact_value( 'map_title' ) ); ?></h2>
				<p><?php echo esc_html( $map_address ); ?></p>
				<iframe
					src="<?php echo esc_url( custom_starter_contact_map_url( $map_address ) ); ?>"
					title="<?php echo esc_attr( 'Google Maps — ' . $map_address ); ?>"
					width="1200" height="360" loading="lazy"
					referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
				<a class="text-link map-directions" href="<?php echo esc_url( 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode( $map_address ) ); ?>" target="_blank" rel="noopener noreferrer">Οδηγίες διαδρομής ↗<span class="screen-reader-text"> (νέα καρτέλα)</span></a>
			</section>
		<?php endif; ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>

