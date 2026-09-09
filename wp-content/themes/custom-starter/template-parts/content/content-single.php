<?php
/** @package Custom_Starter */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h1><?php echo esc_html( get_the_title() ); ?></h1>
		<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
	</header>
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<?php the_post_thumbnail( 'large' ); ?>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Content pages', 'custom-starter' ) . '">', 'after' => '</nav>' ) ); ?>
	</div>
</article>
