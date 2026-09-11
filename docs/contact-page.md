# Contact page setup — version 1.2.0

1. Deploy the latest commit with cPanel **Update from Remote → Deploy HEAD Commit**.
2. Create a WordPress page named **Επικοινωνία**. Select the page template **Επικοινωνία**, publish and reopen the editor if ACF groups have not appeared yet.
3. Edit its title, introduction, form heading and map settings in **Σελίδα Επικοινωνίας**. Shared phone/email/address/Viber/Facebook/LinkedIn values remain on the **Αρχική** page, so they agree with the header and footer.
4. Install/activate Ninja Forms Free. Create a form with these fields in order: Ονοματεπώνυμο (required text), Email (required email), Τηλέφωνο (optional phone), Μήνυμα (required textarea), a short HTML privacy notice, and a submit button **Αποστολή μηνύματος →**.
5. In Ninja Forms display settings, hide the form title because the page already has a heading. The theme places the first two fields side by side on wider screens using CSS; no paid layout extension is needed.
6. Configure the form's email notification recipient to the client's real inbox, its sender to an address on the site's domain, and Reply-To to the submitted email. Set a clear success message. Confirm real email delivery with a test submission. The theme does not configure the plugin's notification actions or email transport.
7. Copy only the numeric ID from the Ninja Forms shortcode into the page's **Ninja Forms — ID φόρμας** field. Until this is set, the panel offers telephone/email contact and shows administrators a setup note.
8. The map searches the shared address by default. Verify its location before launch. For an exact pin, use Google Maps → Share → Embed a map, and paste only the iframe src URL into the embed URL field. Only HTTPS Google Maps embed URLs are accepted.
9. The homepage form button and fallback navigation automatically find the published contact template. If you have assigned native WordPress menus, add the new page to them manually. A manually entered homepage Contact URL takes precedence over discovery.

## Frontend assets

All theme CSS is in **style.css**. Base rules come first, followed by shared components and page rules. Each media condition has exactly one block at the end: large-screen adjustments, descending max-width breakpoints, then reduced-motion preferences. Add responsive rules to the corresponding existing block.

All theme JavaScript is in **assets/js/main.js**. WordPress comment-reply and Ninja Forms plugin assets remain owned by those systems. Do not copy plugin code into the theme.

Deployment removes exactly the four retired theme assets (base.css, project.css, header.css and navigation.js) after successfully copying the current files. Other extra server files are untouched.

## Checks

Run PHP syntax checks, `php tools/check-home-fields.php`, `php tools/check-contact.php` and `node --check wp-content/themes/custom-starter/assets/js/main.js`.

After deployment, verify: the existing homepage and navigation at desktop/mobile sizes; the footer's two-column menu; contact template selection and saved ACF edits; Ninja Forms required/email validation, successful submission and email receipt; map location and directions; contact links from the homepage; password-protected pages. These live checks require the WordPress installation and configured plugin.
