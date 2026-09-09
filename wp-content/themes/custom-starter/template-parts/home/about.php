<?php /** @package Custom_Starter */ ?>
<section id="about" class="about-section split-section"><div class="section-photo"><?php custom_starter_home_image( 'about_image', 'still-life-placeholder.png' ); ?></div>
<div class="section-copy"><p class="eyebrow">ΣΧΕΤΙΚΑ ΜΕ ΕΜΕΝΑ</p><h2><?php custom_starter_home_text( 'about_title' ); ?></h2><p class="copy"><?php custom_starter_home_text( 'about_text' ); ?></p>
<?php $url = custom_starter_home_value( 'about_link' ); if ( $url ) : ?><a class="button" href="<?php echo esc_url( $url ); ?>">Περισσότερα για εμένα →</a><?php endif; ?></div></section>
