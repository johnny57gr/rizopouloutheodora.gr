<?php
/** @package Custom_Starter */
get_header();
?>
<main id="main-content" class="container" tabindex="-1">
	<?php
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content/content', 'page' );
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
	?>
</main>
<?php get_footer(); ?>
