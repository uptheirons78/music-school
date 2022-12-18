class Search {
  // Constructor
  constructor() {
    this.resultsContainer = document.querySelector('#search-overlay-results');
    this.openButton = document.querySelector('#search-button');
    this.closeButton = document.querySelector('#search-close-button');
    this.searchOverlay = document.querySelector('#search-overlay');
    this.searchInput = document.querySelector('#search-term');
    this.body = document.querySelector('body');
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.previousValue;
    this.typingTimer;
    this.allInputs = document.querySelectorAll('input, textarea');
    this.events();
  }

  // Events
  events() {
    this.openButton.addEventListener('click', this.openOverlay.bind(this));
    this.closeButton.addEventListener('click', this.closeOverlay.bind(this));
    document.addEventListener('keydown', this.keyPressDispatcher.bind(this));
    this.searchInput.addEventListener('keyup', this.typingLogic.bind(this));
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

  checkFocus = (all) => {
    for (const el of all) {
      if (document.activeElement == el) return false;
    }
    return true;
  };

  keyPressDispatcher(e) {
    // pressing "s" the keyCode is 83
    if (e.keyCode == 83 && !this.isOverlayOpen && this.checkFocus(this.allInputs)) {
      this.openOverlay();
    }
    // pressing "esc" the keyCode is 27
    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }

  typingLogic() {
    if (this.searchInput.value != this.previousValue) {
      clearTimeout(this.typingTimer);

      if (this.searchInput.value) {
        if (!this.isSpinnerVisible) {
          this.resultsContainer.innerHTML = `<div class="spinner-loader"></div>`;
          this.isSpinnerVisible = true;
        }

        this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
      } else {
        this.resultsContainer.innerHTML = '';
        this.isSpinnerVisible = false;
      }
    }

    this.previousValue = this.searchInput.value;
  }

  async getResults() {
    // fetching logic
    const searchValue = this.searchInput.value;
    const url = `${fields_js.root_url}/wp-json/wp/v2/posts?search=${searchValue}`;
    const response = await fetch(url);
    const data = await response.json();
    // output results
    this.resultsContainer.innerHTML = `
      <h2>General Information</h2>
      ${data.length ? '<ul>' : '<p>No results found for your search.</p>'}
      <ul>
        ${data.map((el) => `<li><a href="${el.link}">${el.title.rendered}</a></li>`).join('')}
      ${data.length ? '</ul>' : ''}
    `;

    this.isSpinnerVisible = false;
  }
}

export default Search;
