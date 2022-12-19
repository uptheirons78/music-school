class Search {
  // Constructor
  constructor() {
    // add search overlay markup with javascript
    this.addSearchHTML();

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
    // setTimeout because the html is not already visible when you use JS to build it, as I did
    setTimeout(() => this.searchInput.focus(), 301);
    this.searchInput.value = '';
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

        this.typingTimer = setTimeout(this.getResults.bind(this), 700);
      } else {
        this.resultsContainer.innerHTML = '';
        this.isSpinnerVisible = false;
      }
    }

    this.previousValue = this.searchInput.value;
  }

  async getResults() {
    const searchValue = this.searchInput.value;
    const posts = fetch(`${fields_js.root_url}/wp-json/wp/v2/posts?search=${searchValue}`).then((res) => res.json());
    const pages = fetch(`${fields_js.root_url}/wp-json/wp/v2/pages?search=${searchValue}`).then((res) => res.json());
    const response = await Promise.all([posts, pages]);
    const data = [].concat(...response);
    this.renderResults(data);
  }

  renderResults(data) {
    this.isSpinnerVisible = false;

    this.resultsContainer.innerHTML = `
    <h2>General Information</h2>
      ${data.length ? '<ul>' : '<p>No results found for your search.</p>'}
        ${data
          .map((el) => {
            if (el.type == 'post') {
              return `<li><a href="${el.link}">${el.title.rendered}</a> by ${el.authorUrl}</li>`;
            } else {
              return `<li><a href="${el.link}">${el.title.rendered}</a></li>`;
            }
          })
          .join('')}
      ${data.length ? '</ul>' : ''}
    `;
  }

  addSearchHTML() {
    const overlayMarkup = `
    <div id="search-overlay" class="search-overlay">
      <div class="top">
        <div class="container">
          <input type="text" class="search-term" placeholder="What are you looking for ?" id="search-term" autocomplete="off">
          <button id="search-close-button" class="search-close-button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="container">
          <div id="search-overlay-results">
          </div>
        </div>
      </div>
    </div>
    `;

    document.querySelector('#page').insertAdjacentHTML('afterend', overlayMarkup);
  }
}

export default Search;
