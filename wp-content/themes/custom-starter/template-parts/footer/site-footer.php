<?php
/** @package Custom_Starter */
?>
<footer class="site-footer">
	<div class="section-wrap footer-grid">
		<div class="brand"><a class="brand-name" href="<?php echo esc_url( home_url( '/' ) ); ?>">Θεοδώρα Ριζοπούλου<small>Ψυχολόγος · Ψυχοθεραπεύτρια</small></a></div>
			<nav aria-label="<?php esc_attr_e( 'Footer Navigation', 'custom-starter' ); ?>">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'menu_class' => 'menu', 'fallback_cb' => 'custom_starter_project_menu' ) ); ?>
			</nav>
		<address><p><?php custom_starter_home_text( 'address' ); ?></p>
		<?php if ( custom_starter_phone_url() ) : ?><p><a href="<?php echo esc_url( custom_starter_phone_url() ); ?>"><?php custom_starter_home_text( 'phone' ); ?></a></p><?php endif; ?>
		<?php if ( is_email( custom_starter_home_value( 'email' ) ) ) : ?><p><a href="<?php echo esc_url( 'mailto:' . custom_starter_home_value( 'email' ) ); ?>"><?php custom_starter_home_text( 'email' ); ?></a></p><?php endif; ?>
		<div class="social-links"><?php foreach ( array( 'facebook' => 'Facebook', 'linkedin' => 'LinkedIn', 'whatsapp' => 'WhatsApp' ) as $key => $label ) : if ( custom_starter_home_value( $key ) ) : ?><a href="<?php echo esc_url( custom_starter_home_value( $key ) ); ?>"><?php echo esc_html( $label ); ?></a><?php endif; endforeach; ?></div>
		</address>
	</div>
	<div class="section-wrap footer-bottom"><span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> Θεοδώρα Ριζοπούλου.</span><a href="https://johnpassthecode.com">Κατασκευή ιστοσελίδας: Johnpassthecode</a></div>
</footer>
