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
		</div>
			<nav aria-label="<?php esc_attr_e( 'Footer Navigation', 'custom-starter' ); ?>">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'menu_class' => 'menu', 'fallback_cb' => 'custom_starter_project_menu' ) ); ?>
			</nav>
		<address class="footer-contact">
			<p class="footer-contact-row"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'address' ) ); ?><span><?php custom_starter_home_text( 'address' ); ?></span></p>
			<?php if ( custom_starter_phone_url() ) : ?>
			<p><a class="footer-contact-row" href="<?php echo esc_url( custom_starter_phone_url() ); ?>"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'phone' ) ); ?><span><?php custom_starter_home_text( 'phone' ); ?></span></a></p>
			<?php endif; ?>
			<p class="footer-contact-row"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'email' ) ); ?>
			<?php if ( is_email( custom_starter_home_value( 'email' ) ) ) : ?><a href="<?php echo esc_url( 'mailto:' . custom_starter_home_value( 'email' ) ); ?>"><?php custom_starter_home_text( 'email' ); ?></a><?php else : ?><span>Email</span><?php endif; ?></p>
			<?php
			$viber_number = preg_replace( '/[^0-9]/', '', custom_starter_home_value( 'viber' ) );
			$viber_url = preg_match( '/^[0-9]{6,15}$/', $viber_number ) ? 'viber://chat?number=%2B' . $viber_number : '';
			?>
			<p class="footer-contact-row"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'viber' ) ); ?>
			<?php if ( $viber_url ) : ?><a href="<?php echo esc_url( $viber_url, array( 'viber' ) ); ?>">Viber</a><?php else : ?><span>Viber</span><?php endif; ?></p>
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
