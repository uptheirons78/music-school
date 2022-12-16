class Search {
  constructor() {
    this.openButton = document.querySelector('#search-button');
    this.closeButton = document.querySelector('#search-close-button');
    this.searchOverlay = document.querySelector('#search-overlay');
    this.body = document.querySelector('body');
    this.isOverlayOpen = false;
    this.events();
  }

  // Events
  events() {
    this.openButton.addEventListener('click', this.openOverlay.bind(this));
    this.closeButton.addEventListener('click', this.closeOverlay.bind(this));
    document.addEventListener('keydown', this.keyPressDispatcher.bind(this));
  }

  // Methods
  openOverlay() {
    this.searchOverlay.classList.add('search-overlay--active');
    this.body.classList.add('body-no-scroll');
    this.isOverlayOpen = true;
  }

  closeOverlay() {
    this.searchOverlay.classList.remove('search-overlay--active');
    this.body.classList.remove('body-no-scroll');
    this.isOverlayOpen = false;
  }

  keyPressDispatcher(e) {
    // pressing "s" the keyCode is 83
    if (e.keyCode == 83 && !this.isOverlayOpen) {
      this.openOverlay();
    }
    // pressing "esc" the keyCode is 27
    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }
}

export default Search;
