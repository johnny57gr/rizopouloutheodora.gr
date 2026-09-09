<?php /** @package Custom_Starter */ ?>
<section id="contact" class="contact-section"><div class="section-wrap contact-grid"><div><h2><?php custom_starter_home_text( 'contact_title' ); ?></h2>
<?php if ( custom_starter_phone_url() ) : ?><a class="button" href="<?php echo esc_url( custom_starter_phone_url() ); ?>">Καλέστε με: <?php custom_starter_home_text( 'phone' ); ?></a><?php endif; ?></div>
<div><p><?php custom_starter_home_text( 'contact_text' ); ?></p><?php if ( is_email( custom_starter_home_value( 'email' ) ) ) : ?><a href="<?php echo esc_url( 'mailto:' . custom_starter_home_value( 'email' ) ); ?>"><?php custom_starter_home_text( 'email' ); ?></a><?php endif; ?></div></div></section>
