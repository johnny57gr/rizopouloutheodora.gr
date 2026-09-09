<?php
/** @package Custom_Starter */
if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments-area" aria-label="<?php esc_attr_e( 'Comments', 'custom-starter' ); ?>">
	<?php if ( have_comments() ) : ?>
		<h2><?php esc_html_e( 'Comments', 'custom-starter' ); ?></h2>
		<ol class="comment-list">
			<?php wp_list_comments( array( 'style' => 'ol', 'short_ping' => true ) ); ?>
		</ol>
		<?php the_comments_pagination(); ?>
		<?php if ( ! comments_open() ) : ?>
			<p><?php esc_html_e( 'Comments are closed.', 'custom-starter' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>
	<?php comment_form(); ?>
</section>
