<?php
/**
 * Template Name: Συχνές ερωτήσεις
 * Template Post Type: page
 *
 * @package Custom_Starter
 */
get_header();
?>
<main id="main-content" class="faq-page" tabindex="-1">
	<?php if ( post_password_required() ) : ?>
		<div class="section-wrap"><?php echo get_the_password_form(); ?></div>
	<?php else :
		$contact_url = custom_starter_contact_page_url();
		$contact_url = $contact_url ? $contact_url : home_url( '/#contact' );
		?>
		<div class="services-page-intro">
			<div class="section-wrap">
				<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Διαδρομή σελίδας', 'custom-starter' ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Αρχική', 'custom-starter' ); ?></a>
					<span aria-hidden="true">/</span>
					<span aria-current="page"><?php echo esc_html( get_the_title() ); ?></span>
				</nav>
				<header>
					<p class="eyebrow"><?php echo esc_html( custom_starter_faq_value( 'eyebrow' ) ); ?></p>
					<h1><?php echo esc_html( custom_starter_faq_value( 'title' ) ); ?></h1>
					<p class="copy"><?php echo esc_html( custom_starter_faq_value( 'intro' ) ); ?></p>
				</header>
			</div>
		</div>
		<div class="faq-layout section-wrap">
			<div class="faq-questions">
				<?php
				$first = true;
				for ( $number = 1; $number <= 8; $number++ ) :
					$question = custom_starter_faq_value( 'question_' . $number . '_title' );
					$answer = custom_starter_faq_value( 'question_' . $number . '_answer' );
					if ( '' === trim( $question ) || '' === trim( $answer ) ) {
						continue;
					}
					?>
					<details class="faq-item"<?php echo $first ? ' open' : ''; ?>>
						<summary><?php echo esc_html( $question ); ?><span class="faq-toggle" aria-hidden="true"></span></summary>
						<div class="faq-answer"><?php echo wpautop( esc_html( $answer ) ); ?></div>
					</details>
					<?php $first = false; ?>
				<?php endfor; ?>
			</div>
			<aside class="faq-aside">
				<?php
				$image_id = absint( custom_starter_faq_value( 'image' ) );
				if ( $image_id && wp_attachment_is_image( $image_id ) ) {
					echo wp_get_attachment_image( $image_id, 'large', false, array( 'class' => 'faq-photo' ) );
				} else {
					?>
					<img class="faq-photo" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/journal-book.png' ) ); ?>" alt="" loading="lazy">
					<?php
				}
				?>
				<div class="faq-aside-copy">
					<h2><?php echo esc_html( custom_starter_faq_value( 'aside_title' ) ); ?></h2>
					<p><?php echo esc_html( custom_starter_faq_value( 'aside_text' ) ); ?></p>
					<div class="faq-aside-contact">
						<p><?php echo esc_html( custom_starter_faq_value( 'aside_prompt' ) ); ?></p>
						<a class="text-link" href="<?php echo esc_url( $contact_url ); ?>"><?php echo esc_html( custom_starter_faq_value( 'aside_button' ) ); ?> <span aria-hidden="true">→</span></a>
					</div>
				</div>
			</aside>
		</div>
		<section class="contact-section contact-invitation services-page-cta">
			<div class="section-wrap">
				<h2><?php echo esc_html( custom_starter_faq_value( 'cta_title' ) ); ?></h2>
				<p class="contact-intro"><?php echo esc_html( custom_starter_faq_value( 'cta_text' ) ); ?></p>
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
