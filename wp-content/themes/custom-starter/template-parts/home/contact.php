<?php
/** Centered contact invitation; the form belongs on the contact page. @package Custom_Starter */
$contact_url = custom_starter_contact_page_url();
$contact_url = $contact_url ? $contact_url : '#';
?>
<section id="contact" class="contact-section contact-invitation" aria-label="<?php esc_attr_e( 'Επικοινωνία', 'custom-starter' ); ?>">
	<div class="section-wrap">
		<p class="contact-intro"><?php custom_starter_home_text( 'contact_intro' ); ?></p>
		<div class="contact-actions">
			<?php if ( custom_starter_phone_url() ) : ?>
				<a class="button contact-phone" href="<?php echo esc_url( custom_starter_phone_url() ); ?>">
					<?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'phone' ) ); ?>
					<span><?php esc_html_e( 'Κλείστε ραντεβού', 'custom-starter' ); ?></span>
				</a>
			<?php endif; ?>
				<a class="button button-outline" href="<?php echo esc_url( $contact_url ); ?>">
					<?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'email' ) ); ?>
					<span><?php esc_html_e( 'Συμπληρώστε τη φόρμα επικοινωνίας', 'custom-starter' ); ?></span>
				</a>
		</div>
	</div>
</section>
