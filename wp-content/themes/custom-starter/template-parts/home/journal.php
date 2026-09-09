<?php
/** @package Custom_Starter */
$articles = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3, 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'has_password' => false ) );
?>
<section id="journal" class="journal-section section-wrap"><header class="journal-heading"><div><p class="eyebrow">ΑΡΘΡΑ</p><h2><?php custom_starter_home_text( 'blog_title' ); ?></h2></div>
<?php if ( get_option( 'page_for_posts' ) ) : ?><a class="text-link" href="<?php echo esc_url( get_permalink( (int) get_option( 'page_for_posts' ) ) ); ?>">Όλα τα άρθρα →</a><?php endif; ?></header>
<?php if ( $articles->have_posts() ) : ?><div class="journal-grid">
<?php while ( $articles->have_posts() ) : $articles->the_post(); ?><article>
<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?>
<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
<h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
<a class="text-link" href="<?php the_permalink(); ?>">Διαβάστε περισσότερα →<span class="screen-reader-text"> — <?php echo esc_html( get_the_title() ); ?></span></a>
</article><?php endwhile; ?></div><?php else : ?><p>Σύντομα θα βρείτε εδώ τα πρώτα άρθρα.</p><?php endif; wp_reset_postdata(); ?></section>
