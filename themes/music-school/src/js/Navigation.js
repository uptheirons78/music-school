class Navigation {
  constructor() {
    this.hamburger = document.querySelector('.hamburger');
    this.mainNavigation = document.querySelector('.main-navigation');
    this.events();
  }

  // Events
  events() {
    this.hamburger.addEventListener('click', this.navigationVisibility.bind(this));
    this.hamburger.addEventListener('keyup', this.navigationVisibilityOnKeyUp.bind(this));
  }
  // Methods
  navigationVisibility(e) {
    const visibility = this.mainNavigation.getAttribute('data-visible');

    if (visibility === 'false') {
      this.mainNavigation.setAttribute('data-visible', 'true');
      this.hamburger.setAttribute('aria-expanded', true);
    } else {
      this.mainNavigation.setAttribute('data-visible', 'false');
      this.hamburger.setAttribute('aria-expanded', false);
    }
  }

  navigationVisibilityOnKeyUp(e) {
    const visibility = this.mainNavigation.getAttribute('data-visible');

    if (visibility === 'true' && e.code === 'Escape') {
      this.mainNavigation.setAttribute('data-visible', 'false');
      this.hamburger.setAttribute('aria-expanded', false);
      this.hamburger.focus();
    }
  }
}

export default Navigation;
