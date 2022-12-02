const hamburger = document.querySelector('.hamburger');
const mainNavigation = document.querySelector('.main-navigation');

hamburger.addEventListener('click', (e) => {
  const visibility = mainNavigation.getAttribute('data-visible');

  if (visibility === 'false') {
    mainNavigation.setAttribute('data-visible', 'true');
    hamburger.setAttribute('aria-expanded', true);
  } else {
    mainNavigation.setAttribute('data-visible', 'false');
    hamburger.setAttribute('aria-expanded', false);
  }
});

hamburger.addEventListener('keyup', (e) => {
  const visibility = mainNavigation.getAttribute('data-visible');

  if (visibility === 'true' && e.code === 'Escape') {
    mainNavigation.setAttribute('data-visible', 'false');
    hamburger.setAttribute('aria-expanded', false);
    hamburger.focus();
  }
});
