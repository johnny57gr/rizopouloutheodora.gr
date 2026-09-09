<?php
/**
 * Default listing entry for all post types.
 *
 * @package Custom_Starter
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ? get_the_title() : __( 'Untitled', 'custom-starter' ) ); ?></a></h2>
	</header>
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<?php the_post_thumbnail( 'large' ); ?>
	<?php endif; ?>
	<div class="entry-summary"><?php the_excerpt(); ?></div>
</article>
