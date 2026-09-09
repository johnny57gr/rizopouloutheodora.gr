<?php
/**
 * Standalone screen without the site's navigation or content.
 *
 * @package Custom_Starter
 */
defined( 'ABSPATH' ) || exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'under-construction' ); ?>>
<?php wp_body_open(); ?>
<main id="main-content" class="construction-screen">
	<p class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p>
	<h1><?php esc_html_e( 'Υπό κατασκευή', 'custom-starter' ); ?></h1>
	<div class="construction-message"><?php echo esc_html( get_theme_mod( 'custom_starter_construction_message', __( 'Ετοιμάζουμε τη νέα μας ιστοσελίδα. Θα είμαστε σύντομα κοντά σας!', 'custom-starter' ) ) ); ?></div>
</main>
<?php wp_footer(); ?>
</body>
</html>
