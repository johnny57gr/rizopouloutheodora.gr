<?php
/** @package Custom_Starter */
?>
<header class="site-header">
	<div class="container">
		<?php the_custom_logo(); ?>
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></p>
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Primary Navigation', 'custom-starter' ); ?>">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'menu', 'fallback_cb' => false ) ); ?>
			</nav>
		<?php endif; ?>
	</div>
</header>
