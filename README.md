# rizopouloutheodora.gr

Custom WordPress project for Θεοδώρα Ριζοπούλου.

## Project structure

- `wp-content/themes/custom-starter/`: Custom Theme Johnpassthecode by Yiannis Passas. See its README for installation and theme details.
- Future site-specific plugins can be added explicitly when implemented.

This repository contains custom code. WordPress core, third-party plugins, credentials, database content and uploads are managed separately. Hosting backups must cover the database and uploads.

## Deployment

The intended flow is local development → private GitHub repository → cPanel pull and deployment. Deployment configuration is pending verification of the active theme's absolute server path. Pushing to GitHub alone does not update the live site.

Install ACF Free separately when the project integration is implemented. Field definitions will live in version control; client-entered field values live in the WordPress database.
