<?php
/**
 * Template Name: Online συνεδρίες
 * Template Post Type: page
 * @package Custom_Starter
 */
get_header();
?>
<main id="main-content" class="online-page" tabindex="-1">
	<?php if ( post_password_required() ) : ?>
		<div class="section-wrap"><?php echo get_the_password_form(); ?></div>
	<?php else :
		$services_url = custom_starter_services_page_url();
		$contact_url = custom_starter_contact_page_url();
		$contact_url = $contact_url ? $contact_url : home_url( '/#contact' );
		?>
		<div class="online-intro-band">
			<div class="section-wrap">
				<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Διαδρομή σελίδας', 'custom-starter' ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Αρχική', 'custom-starter' ); ?></a><span aria-hidden="true">/</span>
					<a href="<?php echo esc_url( $services_url ); ?>"><?php esc_html_e( 'Υπηρεσίες', 'custom-starter' ); ?></a><span aria-hidden="true">/</span>
					<span aria-current="page"><?php echo esc_html( get_the_title() ); ?></span>
				</nav>
				<header class="online-intro"><h1><?php custom_starter_online_text( 'title' ); ?></h1><p><?php custom_starter_online_text( 'intro' ); ?></p></header>
			</div>
		</div>
		<div class="online-visual section-wrap">
			<figure class="online-photo">
				<?php
				$image_id = absint( custom_starter_online_value( 'image' ) );
				if ( $image_id && wp_attachment_is_image( $image_id ) ) {
					echo wp_get_attachment_image( $image_id, 'full', false, array( 'loading' => 'eager', 'sizes' => '(max-width: 700px) calc(100vw - 32px), 1200px' ) );
				} else {
					?>
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/service-online.png' ) ); ?>" alt="">
					<figcaption><?php esc_html_e( 'Ενδεικτική εικόνα', 'custom-starter' ); ?></figcaption>
					<?php
				}
				?>
			</figure>
			<div class="online-relationship"><p><?php custom_starter_online_text( 'relationship' ); ?></p></div>
		</div>
		<div class="online-reflection section-wrap"><p><?php custom_starter_online_text( 'reflection' ); ?></p></div>
		<section class="online-closing contact-invitation">
			<div class="section-wrap">
				<p class="online-closing-text"><?php custom_starter_online_text( 'closing' ); ?></p>
				<div class="contact-actions">
					<?php if ( custom_starter_phone_url() ) : ?><a class="button" href="<?php echo esc_url( custom_starter_phone_url() ); ?>"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'phone' ) ); ?><?php esc_html_e( 'Κλείστε ραντεβού', 'custom-starter' ); ?></a><?php endif; ?>
					<a class="button button-outline" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Φόρμα επικοινωνίας', 'custom-starter' ); ?></a>
				</div>
				<a class="online-back text-link" href="<?php echo esc_url( $services_url ); ?>"><?php esc_html_e( 'Όλες οι υπηρεσίες', 'custom-starter' ); ?></a>
			</div>
		</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
