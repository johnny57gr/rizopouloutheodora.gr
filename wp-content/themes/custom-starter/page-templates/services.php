<?php
/**
 * Template Name: Υπηρεσίες
 * Template Post Type: page
 *
 * @package Custom_Starter
 */
get_header();
?>
<main id="main-content" class="services-page" tabindex="-1">
	<?php if ( post_password_required() ) : ?>
		<div class="section-wrap"><?php echo get_the_password_form(); ?></div>
	<?php else :
		$contact_url = custom_starter_contact_page_url();
		$contact_url = $contact_url ? $contact_url : home_url( '/#contact' );
		?>
		<div class="services-page-intro">
			<div class="section-wrap">
				<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Διαδρομή σελίδας', 'custom-starter' ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Αρχική</a>
					<span aria-hidden="true">/</span>
					<span aria-current="page"><?php echo esc_html( get_the_title() ); ?></span>
				</nav>
				<header>
					<p class="eyebrow"><?php echo esc_html( custom_starter_services_value( 'eyebrow' ) ); ?></p>
					<h1><?php echo esc_html( custom_starter_services_value( 'title' ) ); ?></h1>
					<p class="copy"><?php echo esc_html( custom_starter_services_value( 'intro' ) ); ?></p>
				</header>
			</div>
		</div>
		<div class="services-overview section-wrap">
			<?php
			$images = array( 'interior-placeholder.png', 'service-couples.png', 'service-children.png', 'service-online.png' );
			for ( $number = 1; $number <= 4; $number++ ) {
				get_template_part( 'template-parts/services/row', null, array(
					'number' => $number,
					'image' => $images[ $number - 1 ],
					'contact_url' => $contact_url,
				) );
			}
			?>
		</div>
		<section class="contact-section contact-invitation services-page-cta">
			<div class="section-wrap">
				<h2><?php echo esc_html( custom_starter_services_value( 'cta_title' ) ); ?></h2>
				<p class="contact-intro"><?php echo esc_html( custom_starter_services_value( 'cta_text' ) ); ?></p>
				<div class="contact-actions">
					<?php if ( custom_starter_phone_url() ) : ?>
						<a class="button" href="<?php echo esc_url( custom_starter_phone_url() ); ?>"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'phone' ) ); ?>Καλέστε με τώρα</a>
					<?php endif; ?>
					<a class="button button-outline" href="<?php echo esc_url( $contact_url ); ?>"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'email' ) ); ?>Φόρμα επικοινωνίας</a>
				</div>
			</div>
		</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>

