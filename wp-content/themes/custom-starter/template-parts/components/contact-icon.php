<?php
/** Decorative inline icons; accessible names belong to the enclosing link. @package Custom_Starter */
$icon = isset( $args['icon'] ) ? $args['icon'] : '';
?>
<svg class="contact-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
<?php switch ( $icon ) :
case 'address': ?>
<path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/>
<?php break; case 'email': ?>
<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 6 9 7 9-7"/>
<?php break; case 'facebook': ?>
<path d="M14 22v-9h3l.5-4H14V7c0-1 .3-2 2-2h2V1.5A24 24 0 0 0 15 1c-3 0-5 2-5 5v3H7v4h3v9" fill="currentColor" stroke="none"/>
<?php break; case 'linkedin': ?>
<rect x="3" y="9" width="4" height="12" fill="currentColor" stroke="none"/><circle cx="5" cy="4.5" r="2" fill="currentColor" stroke="none"/><path d="M11 21V9h4v2c2-3 6-2 6 2v8h-4v-7c0-2-2-2-2 0v7Z" fill="currentColor" stroke="none"/>
<?php break; case 'viber': ?>
<path d="M20 15c2-4 1-10-3-12-3-1-9-1-12 1-3 3-3 9-1 12l1 1v5l4-4c4 1 8 0 11-3Z"/><path d="M8 7c0 5 3 8 7 8l1-2-3-1-1 1-2-3 1-1-1-2ZM14 6c2 0 4 2 4 4"/>
<?php break; default: ?>
<path d="m7 3 3 5-2 2c1 3 3 5 6 6l2-2 5 3-1 4C10 22 2 14 3 4Z"/>
<?php endswitch; ?>
</svg>
