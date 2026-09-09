<?php
/**
 * Respect both static-page and latest-posts homepage settings.
 * Add project sections through template parts here when needed.
 *
 * @package Custom_Starter
 */
get_header();
?>
<main id="main-content" class="project-home" tabindex="-1">
	<?php
	if ( is_page() && post_password_required() ) {
		echo get_the_password_form();
	} else {
		foreach ( array( 'hero', 'services', 'about', 'quote', 'office', 'journal', 'contact' ) as $section ) {
			get_template_part( 'template-parts/home/' . $section );
		}
	}
	?>
</main>
<?php get_footer(); ?>
