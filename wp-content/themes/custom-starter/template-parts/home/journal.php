<?php
/** @package Custom_Starter */
$articles = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 3, 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'has_password' => false ) );
$displayed = 0;
?>
<section id="journal" class="journal-section section-wrap"><header class="journal-heading"><div><p class="eyebrow">ΑΡΘΡΑ</p><h2><?php custom_starter_home_text( 'blog_title' ); ?></h2></div>
<?php if ( get_option( 'page_for_posts' ) ) : ?><a class="text-link" href="<?php echo esc_url( get_permalink( (int) get_option( 'page_for_posts' ) ) ); ?>">Όλα τα άρθρα →</a><?php endif; ?></header>
<div class="journal-grid">
<?php while ( $articles->have_posts() ) : $articles->the_post(); ++$displayed; ?><article>
<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } else { ?>
<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/still-life-placeholder.png' ) ); ?>" alt="" loading="lazy">
<?php } ?>
<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
<h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
<a class="text-link" href="<?php the_permalink(); ?>">Διαβάστε περισσότερα →<span class="screen-reader-text"> — <?php echo esc_html( get_the_title() ); ?></span></a>
</article><?php endwhile; wp_reset_postdata(); ?>
<?php
$examples = array(
	array( 'still-life-placeholder.png', 'Πώς να διαχειριστώ το άγχος στην καθημερινότητα;' ),
	array( 'journal-stones.png', 'Η σημασία της αυτοφροντίδας' ),
	array( 'journal-book.png', 'Επικοινωνία στη σχέση: μικρές αλλαγές, μεγάλη διαφορά' ),
);
foreach ( array_slice( $examples, 0, max( 0, 3 - $displayed ) ) as $example ) :
?>
<article>
	<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $example[0] ) ); ?>" alt="" loading="lazy">
	<span class="article-preview-label">Ενδεικτικό άρθρο</span>
	<h3><?php echo esc_html( $example[1] ); ?></h3>
	<span class="text-link">Σύντομα κοντά σας <span aria-hidden="true">→</span></span>
</article>
<?php endforeach; ?>
</div>
</section>
