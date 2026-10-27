(() => {
 const button = document.querySelector('.menu-toggle');
 const menu = document.querySelector('#primary-navigation');
 if (!button || !menu) return;
 button.hidden = false;
 document.documentElement.classList.add('navigation-ready');
 const markCurrent = () => {
  menu.querySelectorAll('a').forEach((link) => {
   const url = new URL(link.href, window.location.href);
   const matches = url.origin === window.location.origin && url.pathname === window.location.pathname && url.search === window.location.search && url.hash === window.location.hash;
   if (matches) link.setAttribute('aria-current', url.hash ? 'location' : 'page');
   else link.removeAttribute('aria-current');
  });
 };
 markCurrent();
 window.addEventListener('hashchange', markCurrent);
 const close = () => button.setAttribute('aria-expanded', 'false');
 button.addEventListener('click', () => button.setAttribute('aria-expanded', String(button.getAttribute('aria-expanded') !== 'true')));
 menu.addEventListener('click', (event) => { if (event.target.closest('a')) close(); });
 document.addEventListener('keydown', (event) => { if (event.key === 'Escape' && button.getAttribute('aria-expanded') === 'true') { close(); button.focus(); } });
})();

// Native details work without JavaScript; enhance to keep one answer open.
(() => {
 const items = document.querySelectorAll('.faq-item');
 items.forEach((item) => {
  item.addEventListener('toggle', () => {
   if (!item.open) return;
   items.forEach((other) => { if (other !== item) other.open = false; });
  });
 });
})();

// One gentle entrance per section. No hidden state or scroll listeners.
(() => {
 const preference = window.matchMedia('(prefers-reduced-motion: reduce)');
 if (preference.matches || !('IntersectionObserver' in window)) return;
 const sections = document.querySelectorAll('main > section, .biography-detail-row, .services-overview-row, .contact-map');
 const observer = new IntersectionObserver((entries) => {
  entries.forEach(({ target, isIntersecting }) => {
   if (!isIntersecting) return;
   observer.unobserve(target);
   if (preference.matches || target.contains(document.activeElement)) return;
   target.classList.add('section-arriving');
   target.addEventListener('animationend', () => target.classList.remove('section-arriving'), { once: true });
  });
 }, { threshold: 0, rootMargin: '0px 0px -24px 0px' });
 sections.forEach((section) => {
  // Leave the initial viewport and restored scroll position immediately readable.
  if (section.getBoundingClientRect().top >= window.innerHeight) observer.observe(section);
 });
 preference.addEventListener('change', () => {
  if (!preference.matches) return;
  observer.disconnect();
  sections.forEach((section) => section.classList.remove('section-arriving'));
 });
})();

// Office photos: readable inline without JS, enhanced with a native modal dialog.
(() => {
 const gallery = document.querySelector('[data-office-gallery]');
 const dialog = document.querySelector('[data-office-lightbox]');
 const triggers = document.querySelectorAll('[data-office-gallery-open]');
 if (!gallery || !dialog) return;
 const photos = Array.from(gallery.querySelectorAll('[data-gallery-image]'));
 const fallback = () => { gallery.open = true; };
 if (!photos.length || typeof dialog.showModal !== 'function') {
  triggers.forEach((trigger) => trigger.addEventListener('click', fallback));
  return;
 }
 const image = dialog.querySelector('[data-gallery-current]');
 const caption = dialog.querySelector('[data-gallery-caption]');
 const status = dialog.querySelector('[data-gallery-status]');
 const previous = dialog.querySelector('[data-gallery-prev]');
 const next = dialog.querySelector('[data-gallery-next]');
 let index = 0;
 let opener = null;
 const render = (position) => {
  index = (position + photos.length) % photos.length;
  const photo = photos[index];
  image.alt = photo.querySelector('img').alt || photo.getAttribute('aria-label');
  image.src = photo.href;
  caption.textContent = photo.dataset.caption || '';
  caption.hidden = !caption.textContent;
  status.textContent = `${index + 1} / ${photos.length}`;
 };
 const open = (event) => {
  event.preventDefault();
  opener = event.currentTarget;
  render(0);
  dialog.showModal();
  document.documentElement.classList.add('office-gallery-open');
 };
 previous.hidden = next.hidden = photos.length < 2;
 previous.addEventListener('click', () => render(index - 1));
 next.addEventListener('click', () => render(index + 1));
 dialog.querySelector('[data-gallery-close]').addEventListener('click', () => dialog.close());
 dialog.addEventListener('keydown', (event) => {
  if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
   event.preventDefault();
   render(index + (event.key === 'ArrowLeft' ? -1 : 1));
  }
 });
 // Only a click outside the dialog rectangle dismisses the backdrop.
 dialog.addEventListener('click', (event) => {
  if (event.target !== dialog) return;
  const bounds = dialog.getBoundingClientRect();
  if (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom) dialog.close();
 });
 dialog.addEventListener('close', () => {
  document.documentElement.classList.remove('office-gallery-open');
  if (opener) opener.focus({ preventScroll: true });
 });
 triggers.forEach((trigger) => {
  trigger.setAttribute('aria-haspopup', 'dialog');
  trigger.setAttribute('aria-controls', 'office-lightbox');
  trigger.addEventListener('click', open);
 });
 gallery.hidden = true;
})();
