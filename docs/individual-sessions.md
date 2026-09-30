## 1.8.0 — Εγκεκριμένο mockup χωρίς icons CBT/ACT

Εφαρμόστηκε η διάταξη individual-sessions-v3: οι δύο εισαγωγικές παράγραφοι δίπλα στην κεντρική φωτογραφία, δύο πλαίσια προσέγγισης χωρίς εικονίδια, οριζόντια φωτογραφία χώρου, τέσσερις κάρτες δυσκολιών με διακοσμητικά SVG και τελική φράση στην περιοχή επικοινωνίας. Δεν άλλαξε κανένα υπάρχον κείμενο ή όνομα πεδίου.

Νέο πεδίο ACF: **Φωτογραφία χώρου → Οριζόντια φωτογραφία γραφείου**. Η βασική εικόνα παραμένει στο **Εισαγωγή → Κεντρική εικόνα**. Χωρίς επιλογή χρησιμοποιούνται οι υπάρχουσες ενδεικτικές εικόνες με σχετική λεζάντα. Τα πραγματικά uploads χρησιμοποιούν το alt text των Πολυμέσων. Σύνολο 17 πεδία ACF Free.

Στο κινητό οι στήλες γίνονται μονή στήλη. CSS στο style.css με τα υπάρχοντα media queries, χωρίς νέο JS. Η υλοποίηση χρησιμοποιεί κανονικό κείμενο και ανεξάρτητες φωτογραφίες, όχι την εικόνα του mockup ως περιεχόμενο. Απομένει τελική οπτική επιβεβαίωση στο live.

## 1.7.2 — Αυτούσιο εγκεκριμένο κείμενο

Αντικαθιστά την επιμέλεια της 1.7.0. Οι δύο παράγραφοι, η προσέγγιση CBT/ACT, οι τέσσερις κουκκίδες και η τελική φράση προέρχονται αυτούσια από το μήνυμα του Γιάννη. Κανονικοποιούνται μόνο τα περιττά κενά/tab και η κενή κουκκίδα της επικόλλησης. Η τελική φράση αποδίδεται με πλάγια. Αφαιρέθηκαν ο πρόσθετος υπότιτλος, οι επινοημένοι περιγραφικοί τίτλοι και η ενότητα πρώτης συνάντησης.

Για να μην υπερισχύουν αποθηκευμένα παλιά κείμενα, τα πεδία του κυρίως κειμένου έχουν νέο namespace tr_individual_exact_. Εμφανίζονται αμέσως οι νέες προεπιλογές μετά το deploy και παραμένουν επεξεργάσιμες με ACF Free. Τα παλιά δεδομένα δεν διαγράφονται αλλά δεν χρησιμοποιούνται. Εικόνα, κουμπί και σύνδεσμος υπηρεσιών κρατούν τα αρχικά πεδία τους. Σύνολο 16 πεδία. Δεν αλλάζει το επιλεγμένο template.

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
