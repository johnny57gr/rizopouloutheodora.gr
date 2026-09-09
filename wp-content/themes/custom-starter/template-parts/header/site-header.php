<?php
/** @package Custom_Starter */
?>
<header class="site-header">
	<div class="header-inner">
		<div class="brand"><?php if ( has_custom_logo() ) { the_custom_logo(); } else { ?>
			<a class="brand-name" href="<?php echo esc_url( home_url( '/' ) ); ?>">Θεοδώρα Ριζοπούλου<small>Ψυχολόγος · Ψυχοθεραπεύτρια</small></a>
		<?php } ?></div>
		<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" hidden>Μενού ☰</button>
			<nav id="primary-navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'custom-starter' ); ?>">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'menu', 'fallback_cb' => 'custom_starter_project_menu' ) ); ?>
			</nav>
		<?php if ( custom_starter_phone_url() ) : ?><a class="button header-phone" href="<?php echo esc_url( custom_starter_phone_url() ); ?>"><?php custom_starter_home_text( 'phone' ); ?></a><?php endif; ?>
	</div>
</header>
