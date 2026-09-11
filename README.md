# rizopouloutheodora.gr

Custom WordPress project for Θεοδώρα Ριζοπούλου.

## Project structure

- `wp-content/themes/custom-starter/`: Custom Theme Johnpassthecode by Yiannis Passas. See its README for installation and theme details.
- Future site-specific plugins can be added explicitly when implemented.

This repository contains custom code. WordPress core, third-party plugins, credentials, database content and uploads are managed separately. Hosting backups must cover the database and uploads.

## Deployment

The flow is local development → public GitHub repository → cPanel pull and deployment. Never commit secrets or client-private material. Pushing to GitHub alone does not update the live site.

The cPanel repository is `/home/ri680427/repositories/rizopouloutheodora-site`, using branch `master`. In Git Version Control → Manage → Pull or Deploy, click **Update from Remote**, wait for completion, then **Deploy HEAD Commit**.

`.cpanel.yml` copies only `wp-content/themes/custom-starter/` into the existing active theme directory `/home/ri680427/public_html/wp-content/themes/rizopouloutheodora.gr/`. The different folder names are intentional: keeping the server directory preserves the active theme and its theme modifications. Deployment checks for the destination's existing `style.css` before copying. It overwrites matching theme files but does not delete additional files, modify WordPress core, plugins, uploads or the database. If source files are removed in future, handle their server cleanup explicitly. Deployment is a direct copy, not an atomic release; use hosting backups for recovery.

## Homepage editing (version 1.1.0)

Version 1.1.2 brings the menu underline close to its label, adds the call-to-action telephone icon and footer logo/contact icons. Empty phone fields now explicitly fall back to the user-requested mockup number +30 697 000 0000; replace it before launch. Email and Viber remain plain labels until configured. Instagram and a Viber phone field are available in the homepage ACF contact group. Footer social icons are ordered Facebook, Instagram, LinkedIn; without URLs they are noninteractive placeholders. When the posts query is empty, three labeled illustrative article cards render without creating database posts or dead read-more links.

Version 1.1.1 refines the header with a brown recoloring of the supplied brain/heart logo, the name and profession alongside it, centered desktop navigation and the phone button. The bundled logo has a white background. A logo selected in the Customizer still takes precedence; select the brown asset there if an older logo is set. The phone reads the homepage ACF field; until a valid number is saved the button leads to Contact. Assign native WordPress menus to include additional published pages such as FAQ. Compact navigation begins at 1200px, and the contact/phone button stays available on mobile.

Install and activate ACF Free. Create a published page called Αρχική, then choose it under Settings → Reading → A static page → Homepage. Edit that page to see the Greek field groups for the hero, four services, biography, approach, office and contact details. Save changes with Update. Fields are registered in PHP and are not edited in ACF's Field Groups list.

The custom homepage also renders draft design defaults before a static homepage is selected. Saved empty text fields stay empty; empty image fields use bundled illustrative placeholders. Replace the office placeholder with a real photo before launch. The generated images are illustrative, not photographs of the client's actual office. Logo remains configurable through Appearance → Customize → Site Identity.

Create an Άρθρα page and assign it as the Posts page in Reading settings to enable the all-articles link. The homepage shows real published posts, not imported demo articles. Empty service links lead to the contact section; biography and office links can be filled when their detail pages are ready. Telephone, email and social links only appear after configuration. No contact form or separate FAQ page is implemented in this homepage slice.

Project-specific presentation is in `inc/project.php`, `template-parts/home/`, `assets/css/project.css` and `assets/js/navigation.js`. The original generic starter is preserved in Git commit `24836d4`. The project now renders its custom homepage regardless of Reading mode; use a static page to edit its fields.

Checks: PHP syntax validation and `php tools/check-home-fields.php`. Verify live after deployment: homepage at desktop/mobile sizes, mobile menu keyboard/escape, ACF edits and image selection, blank fields, actual posts, and administrator/visitor construction mode. Local checks do not replace WordPress runtime testing.
