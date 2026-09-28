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
