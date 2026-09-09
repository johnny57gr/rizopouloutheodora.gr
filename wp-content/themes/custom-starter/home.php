<?php
/**
 * Posts index.
 *
 * @package Custom_Starter
 */
get_header();
?>
<main id="main-content" class="container" tabindex="-1">
	<h1><?php echo esc_html( get_option( 'page_for_posts' ) ? get_the_title( (int) get_option( 'page_for_posts' ) ) : __( 'Posts', 'custom-starter' ) ); ?></h1>
	<?php get_template_part( 'template-parts/content/loop' ); ?>
</main>
<?php get_footer(); ?>
