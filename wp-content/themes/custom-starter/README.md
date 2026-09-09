# Custom Theme Johnpassthecode

Minimal classic WordPress theme. Requires WordPress 6.3+ and PHP 7.4+.

Author: Yiannis Passas — https://johnpassthecode.com

## Installation

Copy this directory into `wp-content/themes/custom-starter` (exclude `.git`), then activate **Custom Theme Johnpassthecode** in Appearance → Themes. Assign menus under Appearance → Menus. Set the homepage under Settings → Reading. No plugins, build step or demo import are required.

## Structure

- `style.css`: WordPress theme metadata. Increase its version when releasing changed assets.
- `functions.php`: loads the three small modules in `inc/`.
- `inc/setup.php`: theme supports, translations and primary/footer menu locations.
- `inc/enqueue.php`: CSS enqueue and conditional native comment-reply JavaScript. No custom JavaScript is needed initially; add scripts here with `wp_enqueue_script()` when a project needs them.
- `inc/helpers.php`: asset versions use file modification times with `WP_DEBUG`, theme version otherwise.
- `header.php` / `footer.php`: document shell and WordPress lifecycle hooks.
- `front-page.php`: static homepage content; delegates to `home.php` when latest posts are selected.
- `home.php` / `index.php`: posts index and fallback listing.
- `page.php` / `single.php`: individual pages/posts, paginated content and optional comments.
- `archive.php` / `search.php` / `404.php`: archives, search results and missing pages.
- `comments.php`: native comments, pagination and comment form.
- `template-parts/header/` / `footer/`: shared semantic site regions.
- `template-parts/content/`: reusable entries, listing loop and empty state. The loop allows future `content-{post-type}-excerpt.php` variants with a `content.php` fallback.
- `template-parts/components/`: reserved for project components.
- `assets/css/base.css`: responsive foundations, visible keyboard focus and WordPress alignment classes. Wide content uses the site container; full alignment fills that container.
- `assets/js/` / `assets/images/`: reserved for project assets; no placeholder scripts loaded.
- `languages/`: translation catalogs using the `custom-starter` text domain.

## Under construction

Use Appearance → Customize → Υπό κατασκευή to enable the visitor screen and edit its plain-text message, then publish the changes. Disabled by default. Administrators with `manage_options` continue to see the normal site (including the Customizer preview); check the visitor screen in a private browser window while logged out.

`inc/under-construction.php` registers native Customizer settings and serves a 503 response with no-cache, Retry-After and noindex headers. `template-parts/content/under-construction.php` renders the standalone screen. Login and administration remain accessible. This is a presentation switch, not access control: REST endpoints and directly accessible uploads remain available. Purge hosting/CDN page caches when switching modes, and exclude the site from full-page caching while construction mode is enabled.

## Extend per project

Rename the folder, theme name, text domain and `custom_starter_` function prefix consistently when creating a new project. Add homepage section template parts as needed; keep password-protected content protected if adding custom fields or sections. Register additional presentation modules explicitly from `functions.php`.

ACF is optional: place any integration in a separate module and guard its calls with availability checks. For WooCommerce, add `inc/woocommerce.php` and register the necessary support only when that project integrates it. Neither integration is included in this starter.

CPTs and business logic belong in a site-specific plugin. No demo content, dependencies, custom settings or user-input handlers are included. Core content-rendering functions intentionally preserve WordPress HTML; custom text, attributes and URLs must be escaped for their output context. Sanitize and validate inputs if adding settings or forms later.

Create `screenshot.png` when the project design is ready. The navigation wraps and exposes nested links without requiring JavaScript; implement an accessible toggle only if the future design calls for one.

## Verification

Run PHP syntax checks, then validate in a WordPress installation: latest-posts and static homepages, assigned/unassigned menus, nested navigation with keyboard, page/post content and pagination, archives/search/empty results/404, password protection, comments and threaded replies, mobile layout and wide blocks. A PHP syntax check alone does not validate WordPress runtime behavior.
