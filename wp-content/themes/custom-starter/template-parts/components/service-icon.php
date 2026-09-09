<?php /** @package Custom_Starter */ ?>
<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" focusable="false">
<?php if ( 4 === $args['number'] ) : ?><rect x="12" y="12" width="40" height="30" rx="2"/><path d="M7 49h50l-5-7H12zM26 45h12"/>
<?php elseif ( 2 === $args['number'] ) : ?><circle cx="25" cy="21" r="7"/><path d="M11 50v-7a14 14 0 0 1 28 0v7zM40 15a7 7 0 0 1 0 14M44 35c8 0 11 7 11 15H44"/>
<?php elseif ( 3 === $args['number'] ) : ?><circle cx="32" cy="16" r="7"/><path d="M19 52V38a13 13 0 0 1 26 0v14M25 52V42h14v10"/>
<?php else : ?><circle cx="32" cy="19" r="9"/><path d="M14 53a18 18 0 0 1 36 0"/><?php endif; ?></svg>
