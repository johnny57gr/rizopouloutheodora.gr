<?php
/** Decorative audience icons. @package Custom_Starter */
defined( 'ABSPATH' ) || exit;
$number = isset( $args['number'] ) ? (int) $args['number'] : -1;
?>
<svg width="32" height="32" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
<?php if ( 0 === $number ) : ?>
<path d="M10 28v-6H6v-6l-3-1 3-5C9-1 27 1 27 13c0 5-3 7-3 10v5"/><path d="M15 8c-4-2-6 5-2 6-2 4 4 6 5 2 4 2 7-4 3-6 1-4-5-5-6-2Z M16 8v9"/>
<?php elseif ( 1 === $number ) : ?>
<path d="M8 18a5 5 0 0 1-1-10 8 8 0 0 1 15-1 6 6 0 0 1 2 11Z M9 23l-2 3 M17 23l-2 3 M25 23l-2 3"/>
<?php elseif ( 2 === $number ) : ?>
<path d="M16 11c-10-7-15 3-10 12 3 7 6 6 10 4 4 2 7 3 10-4 5-9 0-19-10-12Z M16 11V6 M16 6c0-4 4-5 8-4-1 4-4 5-8 4Z M16 7c-4 0-6-2-7-5 4 0 7 1 7 5"/>
<?php elseif ( 3 === $number ) : ?>
<circle cx="16" cy="9" r="4"/><circle cx="6" cy="12" r="3"/><circle cx="26" cy="12" r="3"/><path d="M9 28v-5a7 7 0 0 1 14 0v5 M2 25v-4a4 4 0 0 1 5-4 M30 25v-4a4 4 0 0 0-5-4"/>
<?php else : ?><path d="m8 16 5 5 11-11"/><?php endif; ?>
</svg>
