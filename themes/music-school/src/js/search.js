class Search {
  constructor() {
    this.openButton = document.querySelector('#search-button');
    this.closeButton = document.querySelector('#search-close-button');
    this.searchOverlay = document.querySelector('#search-overlay');
    this.events();
  }

  // Events
  events() {
    this.openButton.addEventListener('click', this.openOverlay.bind(this));
    this.closeButton.addEventListener('click', this.closeOverlay.bind(this));
  }
  // Methods
  openOverlay() {
    this.searchOverlay.classList.add('search-overlay--active');
  }

  closeOverlay() {
    this.searchOverlay.classList.remove('search-overlay--active');
  }
}

export default Search;
