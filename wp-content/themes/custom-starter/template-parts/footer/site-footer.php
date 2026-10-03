<?php
/** @package Custom_Starter */
?>
<footer class="site-footer">
	<div class="section-wrap footer-grid">
		<div class="brand footer-brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-brand-link">
				<?php
				$logo_id = (int) get_theme_mod( 'custom_logo' );
				if ( $logo_id ) {
					echo wp_get_attachment_image( $logo_id, 'full', false, array( 'class' => 'footer-logo', 'alt' => '', 'loading' => 'lazy' ) );
				} else {
					?>
					<img class="footer-logo" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-brown.png' ) ); ?>" width="1595" height="986" alt="" loading="lazy">
					<?php
				}
				?>
				<span class="brand-name">Θεοδώρα Ριζοπούλου<small>Ψυχολόγος · Ψυχοθεραπεύτρια</small></span>
			</a>
			<p class="footer-brand-note">Ζεστασιά, ειλικρίνεια και σεβασμός.</p>
		</div>
		<nav class="footer-services" aria-label="Υπηρεσίες">
			<p class="footer-menu-title">Υπηρεσίες</p>
			<ul class="footer-service-list">
				<?php for ( $number = 1; $number <= 4; $number++ ) :
					$url = custom_starter_home_value( 'service_' . $number . '_link' );
					if ( ! $url && 1 === $number ) { $url = custom_starter_service_template_url( 'page-templates/individual-sessions.php' ); }
					if ( ! $url ) {
						$overview = custom_starter_service_template_url( 'page-templates/services.php' );
						$url = $overview ? $overview . '#overview-service-' . $number : home_url( '/#services' );
					}
					?>
					<li><a href="<?php echo esc_url( $url ); ?>"><?php custom_starter_home_text( 'service_' . $number . '_title' ); ?></a></li>
				<?php endfor; ?>
			</ul>
		</nav>
		<address class="footer-contact">
			<p class="footer-menu-title">Επικοινωνία</p>
			<p class="footer-contact-row"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'address' ) ); ?><span><?php custom_starter_home_text( 'address' ); ?></span></p>
			<?php if ( custom_starter_phone_url() ) : ?>
			<p><a class="footer-contact-row" href="<?php echo esc_url( custom_starter_phone_url() ); ?>"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'phone' ) ); ?><span><?php custom_starter_home_text( 'phone' ); ?></span></a></p>
			<?php endif; ?>
			<p class="footer-contact-row"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'email' ) ); ?>
			<?php if ( is_email( custom_starter_home_value( 'email' ) ) ) : ?><a href="<?php echo esc_url( 'mailto:' . custom_starter_home_value( 'email' ) ); ?>"><?php custom_starter_home_text( 'email' ); ?></a><?php else : ?><span>Email</span><?php endif; ?></p>
			<?php $viber_url = custom_starter_viber_url(); if ( $viber_url ) : ?>
			<p><a class="footer-contact-row" href="<?php echo esc_url( $viber_url, array( 'viber' ) ); ?>"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'viber' ) ); ?><span>Επικοινωνία μέσω Viber</span></a></p>
			<?php endif; ?>
			<div class="social-links footer-socials">
			<?php foreach ( array( 'facebook' => 'Facebook', 'linkedin' => 'LinkedIn' ) as $key => $label ) :
				$url = custom_starter_home_value( $key );
				if ( $url ) : ?>
				<a href="<?php echo esc_url( $url ); ?>" aria-label="<?php echo esc_attr( $label ); ?>"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => $key ) ); ?></a>
				<?php else : ?>
				<span class="social-placeholder" role="img" aria-label="<?php echo esc_attr( $label . ' — σύνδεσμος σύντομα' ); ?>"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => $key ) ); ?></span>
				<?php endif; endforeach; ?>
			</div>
		</address>
	</div>
	<div class="section-wrap footer-bottom"><span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> Θεοδώρα Ριζοπούλου.</span><a href="https://johnpassthecode.com">Κατασκευή ιστοσελίδας: Johnpassthecode</a></div>
</footer>
