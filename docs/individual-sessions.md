## Ενημέρωση 1.7.0 — κείμενα πελάτισσας

Το πρότυπο ονομάζεται πλέον Ατομική Ψυχοθεραπεία Ενηλίκων (ίδιο αρχείο, διατηρείται η επιλογή υπάρχουσας σελίδας). Η παρουσίαση και τα θέματα προσαρμόστηκαν στο Word, με ήπια επιμέλεια και ενιαίο πρώτο πρόσωπο. Προστέθηκε νέα ομάδα Θεραπευτική προσέγγιση με 6 πεδία για CBT / ACT (σύνολο 23). Δεν δηλώνεται συγκεκριμένη υπηρεσία online πριν διευκρινιστεί η διαθεσιμότητά της.

**Υπάρχουσες σελίδες:** το deploy δεν αντικαθιστά αποθηκευμένες τιμές ACF. Ενημερώστε τα παλιά πεδία από τον editor. Τα νέα πεδία προσέγγισης έχουν έτοιμες προεπιλογές. Σε νέα σελίδα χωρίς αποθηκευμένα πεδία εμφανίζονται όλα τα νέα αρχικά κείμενα. Οι προεπιλογές βρίσκονται στο inc/individual-sessions.php. Μετονομάστε και τον τίτλο της σελίδας / το μενού εφόσον χρειάζεται.

Η ενότητα πρώτης συνάντησης και η πρόσκληση επικοινωνίας παραμένουν σύντομα εισαγωγικά κείμενα του σχεδιασμού προς τελική έγκριση. Δεν έχουν προστεθεί διάρκεια ή χρεώσεις. Ακολουθεί οπτικός έλεγχος στο live.

# Ατομικές Συνεδρίες — template setup

After deployment, create and publish a page called **Ατομικές Συνεδρίες** and select the template **Ατομικές Συνεδρίες**. Reopen its editor if the ACF groups have not appeared yet.

Five field groups cover the introduction/image, presentation, discussion topics, first meeting and contact invitation. Text is provisional copy from the approved mockup and should be reviewed by the psychologist. Enter topics one per line; empty lines are ignored. Clearing the topics field hides that section. Upload an image to replace the illustrative interior photo.

The telephone is shared with the homepage. Contact links resolve to the published Contact template, or the homepage contact section until that page exists. Set the optional all-services URL when the services overview page is ready; until then it points to the homepage services section.

To connect the homepage service card, copy this published page's URL into **Αρχική → Υπηρεσίες → 1 — Σύνδεσμος**. Add it to any assigned WordPress navigation menu as desired.

This is a dedicated layout, not the default template for every service. Other services can receive distinct templates. Its ACF definitions live in inc/individual-sessions.php, layout in page-templates/individual-sessions.php, styles in style.css. No extra JavaScript is needed.

Checks: PHP syntax and tools/check-individual-sessions.php. After deployment check desktop/mobile layout, ACF editing, image replacement, contact links, empty topics and password protection in WordPress.
