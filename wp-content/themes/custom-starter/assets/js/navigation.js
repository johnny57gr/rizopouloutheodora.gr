(() => {
 const button = document.querySelector('.menu-toggle');
 const menu = document.querySelector('#primary-navigation');
 if (!button || !menu) return;
 button.hidden = false;
 document.documentElement.classList.add('navigation-ready');
 const close = () => button.setAttribute('aria-expanded', 'false');
 button.addEventListener('click', () => button.setAttribute('aria-expanded', String(button.getAttribute('aria-expanded') !== 'true')));
 menu.addEventListener('click', (event) => { if (event.target.closest('a')) close(); });
 document.addEventListener('keydown', (event) => { if (event.key === 'Escape' && button.getAttribute('aria-expanded') === 'true') { close(); button.focus(); } });
})();
