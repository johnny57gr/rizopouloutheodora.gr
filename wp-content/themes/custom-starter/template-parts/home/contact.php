<?php
/** Centered contact invitation; the form belongs on the contact page. @package Custom_Starter */
$contact_url = custom_starter_home_value( 'contact_page_url' );
$contact_url = $contact_url ? $contact_url : '#';
?>
<section id="contact" class="contact-section contact-invitation" aria-labelledby="contact-invitation-title">
	<div class="section-wrap">
		<p class="eyebrow"><?php esc_html_e( 'ΑΣ ΜΙΛΗΣΟΥΜΕ', 'custom-starter' ); ?></p>
		<h2 id="contact-invitation-title"><?php custom_starter_home_text( 'contact_title' ); ?></h2>
		<p class="contact-intro"><?php custom_starter_home_text( 'contact_intro' ); ?></p>
		<div class="contact-actions">
			<?php if ( custom_starter_phone_url() ) : ?>
				<a class="button contact-phone" href="<?php echo esc_url( custom_starter_phone_url() ); ?>">
					<?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'phone' ) ); ?>
					<span>Καλέστε με τώρα: <?php custom_starter_home_text( 'phone' ); ?></span>
				</a>
			<?php endif; ?>
				<a class="button button-outline" href="<?php echo esc_url( $contact_url ); ?>">
					<?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'email' ) ); ?>
					<span><?php esc_html_e( 'Συμπληρώστε τη φόρμα επικοινωνίας', 'custom-starter' ); ?></span>
				</a>
		</div>
	</div>
</section>
