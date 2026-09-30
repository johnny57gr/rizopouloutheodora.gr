<?php
/**
 * Template Name: Ατομική Ψυχοθεραπεία Ενηλίκων
 * Template Post Type: page
 *
 * @package Custom_Starter
 */
get_header();
?>
<main id="main-content" class="individual-page" tabindex="-1">
	<?php if ( post_password_required() ) : ?>
		<div class="section-wrap"><?php echo get_the_password_form(); ?></div>
	<?php else :
		$contact_url = custom_starter_contact_page_url();
		$contact_url = $contact_url ? $contact_url : home_url( '/#contact' );
		$services_url = custom_starter_individual_value( 'services_url' );
		$services_url = $services_url ? $services_url : custom_starter_services_page_url();
		?>
		<div class="individual-hero-band">
			<div class="section-wrap">
				<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Διαδρομή σελίδας', 'custom-starter' ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Αρχική</a><span aria-hidden="true">/</span>
					<a href="<?php echo esc_url( $services_url ); ?>">Υπηρεσίες</a><span aria-hidden="true">/</span>
					<span aria-current="page"><?php echo esc_html( get_the_title() ); ?></span>
				</nav>
				<section class="individual-hero">
					<div>
						<h1><?php custom_starter_individual_text( 'title' ); ?></h1>
						<p class="copy"><?php custom_starter_individual_text( 'intro' ); ?></p>
						<a class="button" href="<?php echo esc_url( $contact_url ); ?>"><?php custom_starter_individual_text( 'button' ); ?> <span aria-hidden="true">→</span></a>
					</div>
					<figure class="individual-photo">
						<?php
						$image_id = absint( custom_starter_individual_value( 'image' ) );
						if ( $image_id && wp_attachment_is_image( $image_id ) ) {
							echo wp_get_attachment_image( $image_id, 'full', false, array( 'loading' => 'eager' ) );
						} else {
							?>
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/interior-placeholder.png' ) ); ?>" alt="" width="1122" height="1402" fetchpriority="high">
							<figcaption><?php esc_html_e( 'Ενδεικτική εικόνα', 'custom-starter' ); ?></figcaption>
							<?php
						}
						?>
					</figure>
				</section>
			</div>
		</div>
		<div class="individual-verbatim-intro section-wrap">
			<p class="copy"><?php custom_starter_individual_text( 'overview_text' ); ?></p>
		</div>
		<section class="individual-approach section-wrap">
			<header><h2><?php custom_starter_individual_text( 'approach_title' ); ?></h2><p class="copy"><?php custom_starter_individual_text( 'approach_intro' ); ?></p></header>
			<div class="individual-approach-grid">
				<?php foreach ( array( 'cbt', 'act' ) as $approach ) : ?>
					<section class="individual-approach-card">
						<h3><?php custom_starter_individual_text( $approach . '_title' ); ?></h3>
						<p class="copy"><?php custom_starter_individual_text( $approach . '_text' ); ?></p>
					</section>
				<?php endforeach; ?>
			</div>
		</section>
		<?php $topics = custom_starter_individual_topics(); if ( $topics ) : ?>
			<section class="individual-topics">
				<div class="section-wrap">
					<h2><?php custom_starter_individual_text( 'topics_title' ); ?></h2>
					<p class="individual-topics-intro"><?php custom_starter_individual_text( 'topics_intro' ); ?></p>
					<ul><?php foreach ( $topics as $topic ) : ?><li><?php echo esc_html( $topic ); ?></li><?php endforeach; ?></ul>
				</div>
			</section>
		<?php endif; ?>
		<div class="section-wrap individual-closing"><p><em><?php custom_starter_individual_text( 'closing' ); ?></em></p></div>
		<section class="contact-section contact-invitation individual-cta">
			<div class="section-wrap">
				<div class="contact-actions">
					<?php if ( custom_starter_phone_url() ) : ?>
						<a class="button" href="<?php echo esc_url( custom_starter_phone_url() ); ?>"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'phone' ) ); ?>Καλέστε με τώρα</a>
					<?php endif; ?>
					<a class="button button-outline" href="<?php echo esc_url( $contact_url ); ?>"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'email' ) ); ?>Φόρμα επικοινωνίας</a>
				</div>
				<a class="individual-back text-link" href="<?php echo esc_url( $services_url ); ?>">← Όλες οι υπηρεσίες</a>
			</div>
		</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
