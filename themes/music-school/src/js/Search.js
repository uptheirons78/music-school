/**
 * This Search version is using a custom Rest API.
 * Check inc/routes/search-route.php to see how to create one
 */
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
    const results = await fetch(`${fields_js.root_url}/wp-json/music-school/v1/search?term=${searchValue}`);
    const data = await results.json();
    this.renderResults(data);
    console.log(data);
  }

  renderResults(data) {
    this.resultsContainer.innerHTML = `
    <div class="row">
      <div class="col-one-third py-1">
        <h2>General Information</h2>
        ${data.generalInfo.length ? '<ul>' : '<p>No results for this search.</p>'}
        ${data.generalInfo
          .map((item) =>
            item.type === 'post'
              ? `<li><a href="${item.permalink}">${item.title}</a> by ${item.author}</li>`
              : `<li><a href="${item.permalink}">${item.title}</a></li>`
          )
          .join('')}
        ${data.generalInfo.length ? '</ul>' : ''}
      </div>
      <div class="col-one-third py-1">
        <h2>Programs</h2>
        ${data.programs.length ? '<ul>' : '<p>No results for this search.</p>'}
        ${data.programs.map((item) => `<li><a href="${item.permalink}">${item.title}</a></li>`).join('')}
        ${data.programs.length ? '</ul>' : ''}
        <h2>Professors</h2>
        ${data.professors.length ? '<ul>' : '<p>No results for this search.</p>'}
        ${data.professors.map((item) => `<li><a href="${item.permalink}">${item.title}</a></li>`).join('')}
        ${data.professors.length ? '</ul>' : ''}
      </div>
      <div class="col-one-third py-1">
        <h2>Campuses</h2>
        ${data.campuses.length ? '<ul>' : '<p>No results for this search.</p>'}
        ${data.campuses.map((item) => `<li><a href="${item.permalink}">${item.title}</a></li>`).join('')}
        ${data.campuses.length ? '</ul>' : ''}
        <h2>Events</h2>
        ${data.events.length ? '<ul>' : '<p>No results for this search.</p>'}
        ${data.events.map((item) => `<li><a href="${item.permalink}">${item.title}</a></li>`).join('')}
        ${data.events.length ? '</ul>' : ''}
      </div>
    </div>
    `;

    this.isSpinnerVisible = false;
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
