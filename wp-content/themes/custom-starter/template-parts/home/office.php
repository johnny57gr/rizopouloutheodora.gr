<?php /** @package Custom_Starter */ ?>
<section id="office" class="office-section split-section"><div class="section-copy"><p class="eyebrow">Ο ΧΩΡΟΣ ΜΟΥ</p><h2><?php custom_starter_home_text( 'office_title' ); ?></h2><p class="copy"><?php custom_starter_home_text( 'office_text' ); ?></p>
<?php $url = custom_starter_home_value( 'office_link' ); ?><a class="button" href="<?php echo esc_url( $url ? $url : '#contact' ); ?>"><?php echo esc_html( $url ? 'Δείτε περισσότερα' : 'Επικοινωνήστε μαζί μου' ); ?> →</a></div>
<figure class="section-photo"><?php custom_starter_home_image( 'office_image', 'interior-placeholder.png' ); ?><?php if ( ! custom_starter_home_value( 'office_image' ) ) : ?><figcaption>Ενδεικτική εικόνα</figcaption><?php endif; ?></figure></section>
