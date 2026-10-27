<?php
/** @package Custom_Starter */
$photos = custom_starter_office_gallery_ids();
$url = custom_starter_home_value( 'office_link' );
?>
<section id="office" class="office-section split-section">
	<div class="section-copy">
		<p class="eyebrow"><?php esc_html_e( 'Ο ΧΩΡΟΣ ΜΟΥ', 'custom-starter' ); ?></p>
		<h2><?php custom_starter_home_text( 'office_title' ); ?></h2>
		<p class="copy"><?php custom_starter_home_text( 'office_text' ); ?></p>
		<?php if ( $photos ) : ?>
			<a class="button" href="#office-gallery" data-office-gallery-open><?php esc_html_e( 'Δείτε τον χώρο', 'custom-starter' ); ?></a>
		<?php else : ?>
			<a class="button" href="<?php echo esc_url( $url ? $url : '#contact' ); ?>"><?php echo esc_html( $url ? __( 'Δείτε περισσότερα', 'custom-starter' ) : __( 'Επικοινωνήστε μαζί μου', 'custom-starter' ) ); ?></a>
		<?php endif; ?>
	</div>
	<figure class="section-photo">
		<?php custom_starter_home_image( 'office_image', 'interior-placeholder.png' ); ?>
		<?php if ( ! custom_starter_home_value( 'office_image' ) ) : ?><figcaption><?php esc_html_e( 'Ενδεικτική εικόνα', 'custom-starter' ); ?></figcaption><?php endif; ?>
	</figure>
</section>
<?php if ( $photos ) : ?>
	<details id="office-gallery" class="section-wrap office-gallery" data-office-gallery>
		<summary><?php esc_html_e( 'Φωτογραφίες γραφείου', 'custom-starter' ); ?></summary>
		<ul class="office-gallery-grid">
			<?php foreach ( $photos as $position => $photo_id ) :
				$source = wp_get_attachment_image_url( $photo_id, 'large' );
				if ( ! $source ) { continue; }
				$caption = wp_get_attachment_caption( $photo_id );
				?>
				<li><a href="<?php echo esc_url( $source ); ?>" data-gallery-image aria-label="<?php echo esc_attr( sprintf( __( 'Φωτογραφία γραφείου %d', 'custom-starter' ), $position + 1 ) ); ?>" data-caption="<?php echo esc_attr( wp_strip_all_tags( (string) $caption ) ); ?>"><?php echo wp_get_attachment_image( $photo_id, 'medium', false, array( 'loading' => 'lazy' ) ); ?></a></li>
			<?php endforeach; ?>
		</ul>
	</details>
	<dialog id="office-lightbox" class="office-lightbox" aria-labelledby="office-lightbox-title" data-office-lightbox>
		<div class="office-lightbox-toolbar">
			<h2 id="office-lightbox-title"><?php esc_html_e( 'Ο χώρος μου', 'custom-starter' ); ?></h2>
			<button type="button" class="office-lightbox-control" data-gallery-close aria-label="<?php esc_attr_e( 'Κλείσιμο συλλογής', 'custom-starter' ); ?>" autofocus><span aria-hidden="true">×</span></button>
		</div>
		<figure class="office-lightbox-figure">
			<img data-gallery-current alt="">
			<figcaption data-gallery-caption></figcaption>
		</figure>
		<div class="office-lightbox-controls">
			<button type="button" class="office-lightbox-control" data-gallery-prev aria-label="<?php esc_attr_e( 'Προηγούμενη φωτογραφία', 'custom-starter' ); ?>"><span aria-hidden="true">←</span></button>
			<p class="office-lightbox-status" data-gallery-status role="status" aria-live="polite" aria-atomic="true"></p>
			<button type="button" class="office-lightbox-control" data-gallery-next aria-label="<?php esc_attr_e( 'Επόμενη φωτογραφία', 'custom-starter' ); ?>"><span aria-hidden="true">→</span></button>
		</div>
	</dialog>
<?php endif; ?>
