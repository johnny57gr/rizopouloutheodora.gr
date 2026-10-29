<?php
/**
 * Template Name: Θεραπεία Ζεύγους
 * Template Post Type: page
 * @package Custom_Starter
 */
get_header();
?>
<main id="main-content" class="couples-page" tabindex="-1">
	<?php if ( post_password_required() ) : ?>
		<div class="section-wrap"><?php echo get_the_password_form(); ?></div>
	<?php else :
		$services_url = custom_starter_services_page_url();
		$contact_url = custom_starter_contact_page_url();
		$contact_url = $contact_url ? $contact_url : home_url( '/#contact' );
		?>
		<div class="couples-hero-band">
			<div class="section-wrap">
				<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Διαδρομή σελίδας', 'custom-starter' ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Αρχική', 'custom-starter' ); ?></a><span aria-hidden="true">/</span>
					<a href="<?php echo esc_url( $services_url ); ?>"><?php esc_html_e( 'Υπηρεσίες', 'custom-starter' ); ?></a><span aria-hidden="true">/</span>
					<span aria-current="page"><?php echo esc_html( get_the_title() ); ?></span>
				</nav>
				<section class="couples-hero" aria-labelledby="couples-title">
					<header><h1 id="couples-title"><?php custom_starter_couples_text( 'title' ); ?></h1><p><?php custom_starter_couples_text( 'intro' ); ?></p></header>
					<figure class="couples-photo">
						<?php
						$image_id = absint( custom_starter_couples_value( 'image' ) );
						if ( ! $image_id || ! wp_attachment_is_image( $image_id ) ) { $image_id = absint( custom_starter_home_value( 'office_image' ) ); }
						if ( $image_id && wp_attachment_is_image( $image_id ) ) {
							echo wp_get_attachment_image( $image_id, 'large', false, array( 'loading' => 'eager' ) );
						} else {
							?>
							<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/service-couples.png' ) ); ?>" alt="">
							<figcaption><?php esc_html_e( 'Ενδεικτική εικόνα', 'custom-starter' ); ?></figcaption>
							<?php
						}
						?>
					</figure>
				</section>
			</div>
		</div>
		<section class="couples-process section-wrap" aria-labelledby="couples-process-title">
			<h2 id="couples-process-title"><?php custom_starter_couples_text( 'process_title' ); ?></h2>
			<ol class="couples-process-list">
				<?php for ( $number = 1; $number <= 3; $number++ ) : if ( ! custom_starter_couples_value( 'process_' . $number ) ) { continue; } ?>
					<li><p><?php custom_starter_couples_text( 'process_' . $number ); ?></p></li>
				<?php endfor; ?>
			</ol>
		</section>
		<section class="couples-approach" aria-labelledby="couples-approach-title">
			<div class="section-wrap couples-editorial-grid">
				<h2 id="couples-approach-title"><?php custom_starter_couples_text( 'approach_title' ); ?></h2>
				<div><p><?php custom_starter_couples_text( 'approach_text' ); ?></p><p><?php custom_starter_couples_text( 'approach_note' ); ?></p></div>
			</div>
		</section>
		<section class="couples-goals section-wrap" aria-labelledby="couples-goals-title">
			<h2 id="couples-goals-title"><?php custom_starter_couples_text( 'goals_title' ); ?></h2>
			<div class="couples-goal-list">
				<?php for ( $number = 1; $number <= 4; $number++ ) :
					$value = custom_starter_couples_value( 'goal_' . $number );
					if ( ! $value ) { continue; }
					$colon = strpos( $value, ':' );
					?>
					<div class="couples-goal">
						<?php if ( false !== $colon ) : ?>
							<h3><?php echo esc_html( substr( $value, 0, $colon + 1 ) ); ?></h3><p><?php echo esc_html( substr( $value, $colon + 1 ) ); ?></p>
						<?php else : ?><p><?php echo esc_html( $value ); ?></p><?php endif; ?>
					</div>
				<?php endfor; ?>
			</div>
		</section>
		<section class="couples-topics" aria-labelledby="couples-topics-title">
			<div class="section-wrap couples-editorial-grid">
				<header><h2 id="couples-topics-title"><?php custom_starter_couples_text( 'topics_title' ); ?></h2><p><?php custom_starter_couples_text( 'topics_intro' ); ?></p></header>
				<ul><?php foreach ( array_filter( array_map( 'trim', preg_split( '/\R/u', custom_starter_couples_value( 'topics' ) ) ) ) as $topic ) : ?><li><?php echo esc_html( $topic ); ?></li><?php endforeach; ?></ul>
			</div>
		</section>
		<section class="couples-closing contact-invitation">
			<div class="section-wrap">
				<p class="couples-closing-text"><?php custom_starter_couples_text( 'closing' ); ?></p>
				<div class="contact-actions">
					<?php if ( custom_starter_phone_url() ) : ?><a class="button" href="<?php echo esc_url( custom_starter_phone_url() ); ?>"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'phone' ) ); ?><?php esc_html_e( 'Κλείστε ραντεβού', 'custom-starter' ); ?></a><?php endif; ?>
					<a class="button button-outline" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Φόρμα επικοινωνίας', 'custom-starter' ); ?></a>
				</div>
				<a class="couples-back text-link" href="<?php echo esc_url( $services_url ); ?>"><?php esc_html_e( 'Όλες οι υπηρεσίες', 'custom-starter' ); ?></a>
			</div>
		</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
