<?php /** @package Custom_Starter */ ?>
<section id="services" class="services-section section-wrap">
<header class="section-heading"><p class="eyebrow">ΟΙ ΥΠΗΡΕΣΙΕΣ ΜΟΥ</p><h2><?php custom_starter_home_text( 'services_title' ); ?></h2><p><?php custom_starter_home_text( 'services_text' ); ?></p></header>
<div class="services-grid"><?php for ( $i = 1; $i <= 4; $i++ ) : ?>
<article class="service"><div class="service-icon" aria-hidden="true"><?php get_template_part( 'template-parts/components/service-icon', null, array( 'number' => $i ) ); ?></div>
<h3><?php custom_starter_home_text( 'service_' . $i . '_title' ); ?></h3><p><?php custom_starter_home_text( 'service_' . $i . '_text' ); ?></p>
<?php $url = custom_starter_home_value( 'service_' . $i . '_link' ); ?>
<a class="text-link" href="<?php echo esc_url( $url ? $url : '#contact' ); ?>"><?php echo esc_html( $url ? 'Περισσότερα' : 'Επικοινωνία' ); ?> →<span class="screen-reader-text"> — <?php custom_starter_home_text( 'service_' . $i . '_title' ); ?></span></a></article>
<?php endfor; ?></div></section>
