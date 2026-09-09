<?php
/** @package Custom_Starter */
?>
<header class="site-header">
	<div class="header-inner">
		<div class="brand">
			<a class="header-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
				$logo_id = (int) get_theme_mod( 'custom_logo' );
				if ( $logo_id ) {
					echo wp_get_attachment_image( $logo_id, 'full', false, array( 'class' => 'header-logo', 'alt' => '' ) );
				} else {
					?>
					<img class="header-logo" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-brown.png' ) ); ?>" width="1595" height="986" alt="">
					<?php
				}
				?>
				<span class="brand-name">Θεοδώρα Ριζοπούλου<small>Ψυχολόγος · Ψυχοθεραπεύτρια</small></span>
			</a>
		</div>
		<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" hidden>Μενού ☰</button>
			<nav id="primary-navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'custom-starter' ); ?>">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'menu', 'fallback_cb' => 'custom_starter_project_menu' ) ); ?>
			</nav>
		<?php if ( custom_starter_phone_url() ) : ?>
			<a class="button header-phone" href="<?php echo esc_url( custom_starter_phone_url() ); ?>">
				<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false"><path d="M6.6 10.8a15.7 15.7 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.24c1.12.37 2.33.57 3.6.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.6 21 3 13.4 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.27.2 2.48.57 3.6a1 1 0 0 1-.24 1z"/></svg>
				<span><?php custom_starter_home_text( 'phone' ); ?></span>
			</a>
		<?php else : ?>
			<a class="button header-phone" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Επικοινωνία <span aria-hidden="true">→</span></a>
		<?php endif; ?>
	</div>
</header>
