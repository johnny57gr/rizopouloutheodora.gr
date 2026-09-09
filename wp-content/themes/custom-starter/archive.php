<?php
/** @package Custom_Starter */
get_header();
?>
<main id="main-content" class="container" tabindex="-1">
	<header>
		<?php the_archive_title( '<h1>', '</h1>' ); ?>
		<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
	</header>
	<?php get_template_part( 'template-parts/content/loop' ); ?>
</main>
<?php get_footer(); ?>
