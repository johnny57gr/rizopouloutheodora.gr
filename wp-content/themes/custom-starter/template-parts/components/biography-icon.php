<?php
/** Decorative biography section marks. @package Custom_Starter */
defined( 'ABSPATH' ) || exit;
$icon = isset( $args['icon'] ) ? $args['icon'] : '';
?>
<span class="biography-icon" aria-hidden="true">
	<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" focusable="false">
		<?php if ( 'education' === $icon || 'training' === $icon ) : ?>
			<path d="m2 8 10-5 10 5-10 5-10-5Z M6 10v6c4 3 8 3 12 0v-6 M22 8v8"/>
		<?php elseif ( 'experience' === $icon ) : ?>
			<rect x="3" y="7" width="18" height="14" rx="2"/><path d="M8 7V4h8v3 M3 12c5 3 13 3 18 0 M12 12v4"/>
		<?php elseif ( 'research' === $icon ) : ?>
			<path d="M12 5C8 2 4 3 2 4v15c3-1 7-1 10 1 3-2 7-2 10-1V4c-2-1-6-2-10 1Z M12 5v15 M5 8h4 M5 11h4 M15 8h4 M15 11h4"/>
		<?php else : ?>
			<path d="M20 5c-3-3-6-1-8 1-2-2-5-4-8-1-4 4 1 10 8 15 7-5 12-11 8-15Z"/>
		<?php endif; ?>
	</svg>
</span>
