<?php
/** @package Custom_Starter */
?>
<footer class="site-footer">
	<div class="container">
		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Footer Navigation', 'custom-starter' ); ?>">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'menu_class' => 'menu', 'fallback_cb' => false ) ); ?>
			</nav>
		<?php endif; ?>
		<p>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?></p>
	</div>
</footer>
