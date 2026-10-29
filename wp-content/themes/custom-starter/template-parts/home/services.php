<?php /** @package Custom_Starter */ ?>
<section id="services" class="services-section section-wrap">
<header class="section-heading"><h2><?php esc_html_e( 'Οι υπηρεσίες μου', 'custom-starter' ); ?></h2></header>
<div class="services-grid"><?php for ( $i = 1; $i <= 4; $i++ ) : ?>
<article class="service"><div class="service-icon" aria-hidden="true"><?php get_template_part( 'template-parts/components/service-icon', null, array( 'number' => $i ) ); ?></div>
<h3><?php custom_starter_home_text( 'service_' . $i . '_title' ); ?></h3>
<?php
$url = custom_starter_service_target_url( $i, custom_starter_home_value( 'service_' . $i . '_link' ) );
if ( $url && '#' !== $url ) : ?>
<a class="button service-button" href="<?php echo esc_url( $url ); ?>"><?php esc_html_e( 'Διάβασε περισσότερα', 'custom-starter' ); ?><span class="screen-reader-text"> — <?php custom_starter_home_text( 'service_' . $i . '_title' ); ?></span></a>
<?php endif; ?></article>
<?php endfor; ?></div></section>
