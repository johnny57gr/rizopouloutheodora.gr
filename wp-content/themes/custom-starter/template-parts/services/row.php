<?php
/** A row unique to the overview, not a shared detail-page layout. @package Custom_Starter */
$number = (int) $args['number'];
$prefix = 'service_' . $number;
$title = custom_starter_services_value( $prefix . '_title' );
$url = custom_starter_services_value( $prefix . '_url' );
if ( ! $url && 1 === $number ) {
	$url = custom_starter_service_template_url( 'page-templates/individual-sessions.php' );
}
$label = $url ? custom_starter_services_value( $prefix . '_button' ) : __( 'Επικοινωνία για την υπηρεσία', 'custom-starter' );
$url = $url ? $url : $args['contact_url'];
$image_id = absint( custom_starter_services_value( $prefix . '_image' ) );
?>
<section class="services-overview-row" aria-labelledby="overview-service-<?php echo esc_attr( $number ); ?>">
	<figure class="services-overview-photo">
		<?php
		if ( $image_id && wp_attachment_is_image( $image_id ) ) {
			echo wp_get_attachment_image( $image_id, 'large', false, array( 'loading' => 1 === $number ? 'eager' : 'lazy' ) );
		} else {
			?>
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $args['image'] ) ); ?>" alt="" loading="<?php echo 1 === $number ? 'eager' : 'lazy'; ?>">
			<?php
		}
		?>
	</figure>
	<div class="services-overview-copy">
		<span class="service-number" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $number ) ); ?></span>
		<h2 id="overview-service-<?php echo esc_attr( $number ); ?>"><?php echo esc_html( $title ); ?></h2>
		<p class="copy"><?php echo esc_html( custom_starter_services_value( $prefix . '_text' ) ); ?></p>
		<a class="text-link" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?> <span aria-hidden="true">→</span><span class="screen-reader-text"> — <?php echo esc_html( $title ); ?></span></a>
	</div>
</section>

