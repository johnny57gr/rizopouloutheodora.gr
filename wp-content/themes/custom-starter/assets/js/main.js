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
