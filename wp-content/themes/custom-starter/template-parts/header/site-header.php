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
		<?php
		$contact_url = custom_starter_contact_page_url();
		$contact_url = $contact_url ? $contact_url : home_url( '/#contact' );
		?>
		<a class="button header-phone" href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Κλείστε ραντεβού', 'custom-starter' ); ?></a>
	</div>
</header>
