<?php
/** @package Custom_Starter */
get_header();
?>
<main id="main-content" class="container" tabindex="-1">
	<h1><?php esc_html_e( 'Page not found', 'custom-starter' ); ?></h1>
	<p><?php esc_html_e( 'Try a search or return to the homepage.', 'custom-starter' ); ?></p>
	<?php get_search_form(); ?>
	<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go to homepage', 'custom-starter' ); ?></a></p>
</main>
<?php get_footer(); ?>
