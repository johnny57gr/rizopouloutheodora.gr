<?php
/**
 * Template Name: Συμβουλευτική & Ψυχοθεραπεία Εφήβων
 * Template Post Type: page
 * @package Custom_Starter
 */
get_header();
?>
<main id="main-content" class="teens-page" tabindex="-1">
	<?php if ( post_password_required() ) : ?>
		<div class="section-wrap"><?php echo get_the_password_form(); ?></div>
	<?php else :
		$services_url = custom_starter_services_page_url();
		$contact_url = custom_starter_contact_page_url();
		$contact_url = $contact_url ? $contact_url : home_url( '/#contact' );
		?>
		<div class="teens-heading-band">
			<div class="section-wrap">
				<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Διαδρομή σελίδας', 'custom-starter' ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Αρχική', 'custom-starter' ); ?></a><span aria-hidden="true">/</span>
					<a href="<?php echo esc_url( $services_url ); ?>"><?php esc_html_e( 'Υπηρεσίες', 'custom-starter' ); ?></a><span aria-hidden="true">/</span>
					<span aria-current="page"><?php echo esc_html( get_the_title() ); ?></span>
				</nav>
				<header class="teens-heading"><h1><?php custom_starter_teens_text( 'title' ); ?></h1></header>
			</div>
		</div>
		<section class="teens-intro section-wrap" aria-labelledby="teens-intro-title">
			<figure class="teens-photo">
				<?php
				$image_id = absint( custom_starter_teens_value( 'image' ) );
				if ( ! $image_id || ! wp_attachment_is_image( $image_id ) ) { $image_id = absint( custom_starter_home_value( 'office_image' ) ); }
				if ( $image_id && wp_attachment_is_image( $image_id ) ) {
					echo wp_get_attachment_image( $image_id, 'large', false, array( 'loading' => 'eager' ) );
				} else {
					?>
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/still-life-placeholder.png' ) ); ?>" alt="">
					<figcaption><?php esc_html_e( 'Ενδεικτική εικόνα', 'custom-starter' ); ?></figcaption>
					<?php
				}
				?>
			</figure>
			<div class="teens-intro-copy">
				<h2 id="teens-intro-title"><?php custom_starter_teens_text( 'intro_title' ); ?></h2>
				<p><?php custom_starter_teens_text( 'intro_text' ); ?></p>
				<p><?php custom_starter_teens_text( 'intro_support' ); ?></p>
			</div>
		</section>
		<section class="teens-benefits section-wrap" aria-labelledby="teens-benefits-title">
			<h2 id="teens-benefits-title"><?php custom_starter_teens_text( 'benefits_title' ); ?></h2>
			<div class="teens-benefit-grid">
				<?php for ( $number = 1; $number <= 4; $number++ ) : if ( ! custom_starter_teens_value( 'benefit_' . $number ) ) { continue; } ?>
					<div class="teens-benefit"><span class="teens-step" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $number ) ); ?></span><p><?php custom_starter_teens_labelled_text( 'benefit_' . $number ); ?></p></div>
				<?php endfor; ?>
			</div>
		</section>
		<section class="teens-parents" aria-labelledby="teens-parents-title">
			<div class="section-wrap teens-parents-grid">
				<header><h2 id="teens-parents-title"><?php custom_starter_teens_text( 'parents_title' ); ?></h2><p><?php custom_starter_teens_text( 'parents_intro' ); ?></p></header>
				<div class="teens-parent-notes">
					<?php foreach ( array( 'privacy', 'parents_support' ) as $name ) : ?>
						<p><?php custom_starter_teens_labelled_text( $name ); ?></p>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<section class="teens-topics section-wrap" aria-labelledby="teens-topics-title">
			<header><h2 id="teens-topics-title"><?php custom_starter_teens_text( 'topics_title' ); ?></h2><p><?php custom_starter_teens_text( 'topics_intro' ); ?></p></header>
			<ul><?php foreach ( array_filter( array_map( 'trim', preg_split( '/\R/u', custom_starter_teens_value( 'topics' ) ) ) ) as $topic ) : ?><li><?php echo esc_html( $topic ); ?></li><?php endforeach; ?></ul>
		</section>
		<section class="teens-closing contact-invitation">
			<div class="section-wrap">
				<p class="teens-closing-text"><?php custom_starter_teens_text( 'closing' ); ?></p>
				<div class="contact-actions">
					<?php if ( custom_starter_phone_url() ) : ?><a class="button" href="<?php echo esc_url( custom_starter_phone_url() ); ?>"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'phone' ) ); ?><?php esc_html_e( 'Κλείστε ραντεβού', 'custom-starter' ); ?></a><?php endif; ?>
					<a class="button button-outline" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Φόρμα επικοινωνίας', 'custom-starter' ); ?></a>
				</div>
				<a class="teens-back text-link" href="<?php echo esc_url( $services_url ); ?>"><?php esc_html_e( 'Όλες οι υπηρεσίες', 'custom-starter' ); ?></a>
			</div>
		</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
