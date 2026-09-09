<?php
/** @package Custom_Starter */
get_header();
?>
<main id="main-content" class="container" tabindex="-1">
	<h1><?php
	/* translators: %s: Search query. */
	printf( esc_html__( 'Search results for: %s', 'custom-starter' ), esc_html( get_search_query( false ) ) );
	?></h1>
	<?php get_search_form(); ?>
	<?php get_template_part( 'template-parts/content/loop' ); ?>
</main>
<?php get_footer(); ?>
