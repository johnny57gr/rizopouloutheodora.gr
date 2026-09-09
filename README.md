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

Install ACF Free separately when the project integration is implemented. Field definitions will live in version control; client-entered field values live in the WordPress database.
