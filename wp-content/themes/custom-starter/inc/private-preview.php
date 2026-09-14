<?php
/** Revocable frontend preview; never creates a WordPress user session. @package Custom_Starter */
defined( 'ABSPATH' ) || exit;

/** Read a valid, unexpired invitation. */
function custom_starter_preview_invitation() {
	$data = get_option( 'custom_starter_private_preview', array() );
	if ( ! is_array( $data ) || empty( $data['token'] ) || ! is_string( $data['token'] ) || ! preg_match( '/^[a-f0-9]{64}$/D', $data['token'] ) || empty( $data['expires'] ) || ! is_numeric( $data['expires'] ) || (int) $data['expires'] <= time() ) {
		return array();
	}
	return $data;
}

/** Tie the cookie to this invitation and the installation's secret salt. */
function custom_starter_preview_signature( $data ) {
	return hash_hmac( 'sha256', $data['token'] . '|' . $data['expires'], wp_salt( 'auth' ) );
}

/** Constant-time validation; arrays and malformed input never grant access. */
function custom_starter_preview_cookie_valid( $cookie ) {
	$data = custom_starter_preview_invitation();
	return $data && is_string( $cookie ) && hash_equals( custom_starter_preview_signature( $data ), $cookie );
}

/** Keep all construction responses out of caches that run after theme loading. */
function custom_starter_preview_cache_policy() {
	if ( get_theme_mod( 'custom_starter_construction_enabled', false ) ) {
		if ( ! defined( 'DONOTCACHEPAGE' ) ) {
			define( 'DONOTCACHEPAGE', true );
		}
	}
}
add_action( 'after_setup_theme', 'custom_starter_preview_cache_policy', 0 );

/** Exchange the link for an HttpOnly cookie, then remove the secret from the URL. */
function custom_starter_preview_exchange() {
	if ( ! get_theme_mod( 'custom_starter_construction_enabled', false ) ) {
		return;
	}
	nocache_headers();
	header( 'Cache-Control: private, no-store, no-cache, must-revalidate, max-age=0', true );
	header( 'X-Robots-Tag: noindex, nofollow, noarchive', true );
	header( 'Referrer-Policy: no-referrer', true );
	// This is a bearer invitation, not a state-changing form submission.
	if ( ! isset( $_GET['site_preview'] ) ) {
		return;
	}
	$token = is_string( $_GET['site_preview'] ) ? wp_unslash( $_GET['site_preview'] ) : '';
	$data  = custom_starter_preview_invitation();
	if ( $data && hash_equals( $data['token'], $token ) ) {
		$path = wp_parse_url( home_url( '/' ), PHP_URL_PATH );
		setcookie( 'custom_starter_preview', custom_starter_preview_signature( $data ), array(
			'expires'  => (int) $data['expires'],
			'path'     => $path ? $path : '/',
			'secure'   => is_ssl(),
			'httponly' => true,
			'samesite' => 'Lax',
		) );
	}
	wp_safe_redirect( home_url( '/' ) );
	exit;
}
add_action( 'template_redirect', 'custom_starter_preview_exchange', -10 );

/** A dedicated native settings page keeps the invitation out of public markup. */
function custom_starter_preview_menu() {
	add_theme_page( __( 'Ιδιωτική προεπισκόπηση', 'custom-starter' ), __( 'Ιδιωτική προεπισκόπηση', 'custom-starter' ), 'manage_options', 'custom-starter-preview', 'custom_starter_preview_page' );
}
add_action( 'admin_menu', 'custom_starter_preview_menu' );

/** Create, rotate or revoke only through an administrator's nonce-protected POST. */
function custom_starter_preview_save() {
	if ( ! current_user_can( 'manage_options' ) || 'POST' !== $_SERVER['REQUEST_METHOD'] ) {
		wp_die( esc_html__( 'Δεν επιτρέπεται αυτή η ενέργεια.', 'custom-starter' ), '', array( 'response' => 403 ) );
	}
	check_admin_referer( 'custom_starter_preview_save' );
	$operation = isset( $_POST['preview_operation'] ) && is_string( $_POST['preview_operation'] ) ? sanitize_key( wp_unslash( $_POST['preview_operation'] ) ) : '';
	if ( 'rotate' === $operation ) {
		update_option( 'custom_starter_private_preview', array( 'token' => bin2hex( random_bytes( 32 ) ), 'expires' => time() + 7 * DAY_IN_SECONDS ), false );
	} elseif ( 'disable' === $operation ) {
		delete_option( 'custom_starter_private_preview' );
	}
	wp_safe_redirect( admin_url( 'themes.php?page=custom-starter-preview' ) );
	exit;
}
add_action( 'admin_post_custom_starter_preview_save', 'custom_starter_preview_save' );

/** Render administrator-only controls using native WordPress styling. */
function custom_starter_preview_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$data = custom_starter_preview_invitation();
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Ιδιωτική προεπισκόπηση', 'custom-starter' ); ?></h1>
		<p><?php esc_html_e( 'Ο σύνδεσμος επιτρέπει προβολή του site για 7 ημέρες χωρίς λογαριασμό WordPress. Όποιος τον έχει μπορεί να δει τις σελίδες. Η ανανέωση ή απενεργοποίηση ακυρώνει και την πρόσβαση στους browsers που τον έχουν ήδη ανοίξει.', 'custom-starter' ); ?></p>
		<p><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=custom_starter_construction' ) ); ?>"><?php esc_html_e( 'Ρυθμίσεις Υπό κατασκευή', 'custom-starter' ); ?></a></p>
		<?php if ( ! get_theme_mod( 'custom_starter_construction_enabled', false ) ) : ?>
			<div class="notice notice-warning inline"><p><?php esc_html_e( 'Το Υπό κατασκευή είναι ανενεργό: το site είναι ορατό σε όλους. Ενεργοποιήστε το από τις παραπάνω ρυθμίσεις πριν στείλετε τον σύνδεσμο.', 'custom-starter' ); ?></p></div>
		<?php endif; ?>
		<?php if ( $data ) : ?>
			<p><label for="private-preview-link"><?php esc_html_e( 'Ιδιωτικός σύνδεσμος — επιλέξτε και αντιγράψτε:', 'custom-starter' ); ?></label></p>
			<input id="private-preview-link" class="large-text code" type="text" readonly value="<?php echo esc_attr( add_query_arg( 'site_preview', $data['token'], home_url( '/' ) ) ); ?>">
			<p><?php echo esc_html( sprintf( __( 'Λήγει: %s', 'custom-starter' ), wp_date( 'd/m/Y H:i', (int) $data['expires'] ) ) ); ?></p>
		<?php else : ?>
			<p><?php esc_html_e( 'Δεν υπάρχει ενεργός σύνδεσμος.', 'custom-starter' ); ?></p>
		<?php endif; ?>
		<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
			<input type="hidden" name="action" value="custom_starter_preview_save">
			<?php wp_nonce_field( 'custom_starter_preview_save' ); ?>
			<p><button class="button button-primary" name="preview_operation" value="rotate"><?php echo esc_html( $data ? __( 'Ανανέωση συνδέσμου', 'custom-starter' ) : __( 'Ενεργοποίηση / Δημιουργία συνδέσμου', 'custom-starter' ) ); ?></button>
			<?php if ( $data ) : ?><button class="button" name="preview_operation" value="disable"><?php esc_html_e( 'Απενεργοποίηση', 'custom-starter' ); ?></button><?php endif; ?></p>
		</form>
	</div>
	<?php
}
