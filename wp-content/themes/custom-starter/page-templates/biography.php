<?php
/**
 * Template Name: Βιογραφικό
 * Template Post Type: page
 * @package Custom_Starter
 */
get_header();
?>
<main id="main-content" class="biography-page" tabindex="-1">
	<?php if ( post_password_required() ) : ?>
		<div class="section-wrap"><?php echo get_the_password_form(); ?></div>
	<?php else :
		$contact_url = custom_starter_contact_page_url();
		$contact_url = $contact_url ? $contact_url : home_url( '/#contact' );
		?>
		<div class="section-wrap">
			<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Διαδρομή σελίδας', 'custom-starter' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Αρχική', 'custom-starter' ); ?></a>
				<span aria-hidden="true">/</span><span aria-current="page"><?php echo esc_html( get_the_title() ); ?></span>
			</nav>
			<div class="biography-intro">
				<div class="biography-portrait">
					<?php
					$image_id = absint( custom_starter_biography_value( 'image' ) );
					if ( $image_id && wp_attachment_is_image( $image_id ) ) {
						echo wp_get_attachment_image( $image_id, 'large', false, array( 'loading' => 'eager', 'class' => 'biography-photo' ) );
					} else {
						?>
						<div class="biography-placeholder">
							<svg width="80" height="96" viewBox="0 0 80 96" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" focusable="false"><circle cx="40" cy="30" r="17"/><path d="M10 86v-9c0-16 14-27 30-27s30 11 30 27v9"/></svg>
							<p><?php esc_html_e( 'Η φωτογραφία θα προστεθεί σύντομα', 'custom-starter' ); ?></p>
						</div>
						<?php
					}
					?>
				</div>
				<header class="biography-intro-copy">
					<p class="eyebrow"><?php echo esc_html( custom_starter_biography_value( 'eyebrow' ) ); ?></p>
					<h1><?php echo esc_html( custom_starter_biography_value( 'title' ) ); ?></h1>
					<p class="biography-profession"><?php echo esc_html( custom_starter_biography_value( 'profession' ) ); ?></p>
					<a class="text-link" href="<?php echo esc_url( $contact_url ); ?>"><?php echo esc_html( custom_starter_biography_value( 'intro_button' ) ); ?> <span aria-hidden="true">→</span></a>
				</header>
			</div>
		</div>
		<section class="biography-approach">
			<div class="section-wrap biography-approach-grid">
				<div><h2><?php echo esc_html( custom_starter_biography_value( 'approach_title' ) ); ?></h2></div>
				<div class="biography-approach-copy">
					<?php echo wpautop( esc_html( custom_starter_biography_value( 'approach_text' ) ) ); ?>
					<div class="biography-values"><?php echo wp_kses_post( custom_starter_biography_value( 'values' ) ) ; ?></div>
				</div>
			</div>
		</section>
		<figure class="section-wrap biography-office">
			<?php
			$office_image_id = absint( custom_starter_biography_value( 'office_image' ) );
			if ( $office_image_id && wp_attachment_is_image( $office_image_id ) ) {
				echo wp_get_attachment_image( $office_image_id, 'full', false, array( 'class' => 'biography-office-photo', 'loading' => 'lazy', 'sizes' => '(max-width: 700px) calc(100vw - 32px), 1200px' ) );
			} else {
				?>
				<img class="biography-office-photo" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/interior-placeholder.png' ) ); ?>" alt="" loading="lazy">
				<figcaption><?php esc_html_e( 'Ενδεικτική εικόνα — η φωτογραφία του γραφείου θα προστεθεί σύντομα.', 'custom-starter' ); ?></figcaption>
				<?php
			}
			?>
		</figure>
		<div class="section-wrap biography-background">
			<?php foreach ( array( 'education', 'training', 'experience', 'volunteering' ) as $section ) : ?>
				<section class="biography-detail-row">
					<h2><?php get_template_part( 'template-parts/components/biography-icon', null, array( 'icon' => $section ) ); ?><span><?php echo esc_html( custom_starter_biography_value( $section . '_title' ) ); ?></span></h2>
					<div class="biography-rich-text"><?php echo wp_kses_post( custom_starter_biography_group_content( wpautop( custom_starter_biography_value( $section . '_text' ) ) ) ); ?></div>
				</section>
			<?php endforeach; ?>

		</div>
		<section class="contact-section contact-invitation services-page-cta">
			<div class="section-wrap">
				<div class="contact-actions">
					<?php if ( custom_starter_phone_url() ) : ?>
						<a class="button" href="<?php echo esc_url( custom_starter_phone_url() ); ?>"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'phone' ) ); ?><?php esc_html_e( 'Καλέστε με τώρα', 'custom-starter' ); ?></a>
					<?php endif; ?>
					<a class="button button-outline" href="<?php echo esc_url( $contact_url ); ?>"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'email' ) ); ?><?php esc_html_e( 'Φόρμα επικοινωνίας', 'custom-starter' ); ?></a>
				</div>
			</div>
		</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
