<?php
/** Shared contact data, presented as the approved contact-page list. @package Custom_Starter */
$phone = custom_starter_phone_url();
$email = custom_starter_home_value( 'email' );
$viber = preg_replace( '/[^0-9]/', '', custom_starter_home_value( 'viber' ) );
?>
<address class="contact-details-list">
	<?php if ( $phone ) : ?>
	<a class="contact-detail" href="<?php echo esc_url( $phone ); ?>">
		<span class="contact-detail-icon"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'phone' ) ); ?></span>
		<span><?php custom_starter_home_text( 'phone' ); ?><small>Τηλέφωνο</small></span>
	</a>
	<?php endif; ?>
	<div class="contact-detail">
		<span class="contact-detail-icon"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'email' ) ); ?></span>
		<?php if ( is_email( $email ) ) : ?><a href="<?php echo esc_url( 'mailto:' . $email ); ?>"><?php echo esc_html( $email ); ?></a><?php else : ?><span>Το email θα προστεθεί σύντομα</span><?php endif; ?>
	</div>
	<div class="contact-detail">
		<span class="contact-detail-icon"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'address' ) ); ?></span>
		<span><?php custom_starter_home_text( 'address' ); ?></span>
	</div>
	<div class="contact-detail">
		<span class="contact-detail-icon"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => 'viber' ) ); ?></span>
		<?php if ( preg_match( '/^[0-9]{6,15}$/', $viber ) ) : ?><a href="<?php echo esc_url( 'viber://chat?number=%2B' . $viber, array( 'viber' ) ); ?>">Επικοινωνία μέσω Viber</a><?php else : ?><span>Επικοινωνία μέσω Viber</span><?php endif; ?>
	</div>
	<div class="contact-detail-socials">
		<?php foreach ( array( 'facebook' => 'Facebook', 'linkedin' => 'LinkedIn' ) as $key => $label ) :
			$url = custom_starter_home_value( $key );
			?>
			<div class="contact-detail">
				<span class="contact-detail-icon"><?php get_template_part( 'template-parts/components/contact-icon', null, array( 'icon' => $key ) ); ?></span>
				<?php if ( $url ) : ?><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a><?php else : ?><span><?php echo esc_html( $label ); ?></span><?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
</address>

