<?php
/** @package Custom_Starter */
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content/content', get_post_type() . '-excerpt' );
	}
	the_posts_pagination();
} else {
	get_template_part( 'template-parts/content/none' );
}
