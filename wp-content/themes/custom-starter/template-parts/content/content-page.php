<?php
/** @package Custom_Starter */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header><h1><?php echo esc_html( get_the_title() ); ?></h1></header>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Content pages', 'custom-starter' ) . '">', 'after' => '</nav>' ) ); ?>
	</div>
</article>
