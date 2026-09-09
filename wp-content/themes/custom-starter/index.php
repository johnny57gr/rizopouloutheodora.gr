<?php
/**
 * Default listing fallback.
 *
 * @package Custom_Starter
 */
get_header();
?>
<main id="main-content" class="container" tabindex="-1">
	<?php get_template_part( 'template-parts/content/loop' ); ?>
</main>
<?php get_footer(); ?>
