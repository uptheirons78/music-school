/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/Leaflet.js":
/*!***************************!*\
  !*** ./src/js/Leaflet.js ***!
  \***************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
class LeafletMap {
  constructor() {
    document.querySelectorAll('.acf-map').forEach(el => {
      this.new_map(el);
    });
  }
  new_map($el) {
    const $markers = $el.querySelectorAll('.marker');
    const map = L.map($el).setView([0, 0], 18);
    const apiToken = fields_js.api;
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: apiToken
    }).addTo(map);
    map.markers = [];
    const that = this;

    // add markers
    $markers.forEach(function (x) {
      that.add_marker(x, map);
    });

    // center map
    this.center_map(map);
  } // end new_map

  add_marker($marker, map) {
    const marker = L.marker([$marker.getAttribute('data-lat'), $marker.getAttribute('data-lng')]).addTo(map);
    map.markers.push(marker);

    // if marker contains HTML, add it to an infoWindow
    if ($marker.innerHTML) {
      // create info window
      marker.bindPopup($marker.innerHTML);
    }
  } // end add_marker

  center_map(map) {
    const bounds = new L.LatLngBounds();

    // loop through all markers and create bounds
    map.markers.forEach(function (marker) {
      const latlng = new L.LatLng(marker._latlng.lat, marker._latlng.lng);
      bounds.extend(latlng);
    });
    map.fitBounds(bounds);
  } // end center_map
}

/* harmony default export */ __webpack_exports__["default"] = (LeafletMap);

/***/ }),

/***/ "./src/js/Navigation.js":
/*!******************************!*\
  !*** ./src/js/Navigation.js ***!
  \******************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
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
/* harmony default export */ __webpack_exports__["default"] = (Navigation);

/***/ }),

/***/ "./src/js/Search.js":
/*!**************************!*\
  !*** ./src/js/Search.js ***!
  \**************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
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
  checkFocus = all => {
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
  getResults() {
    this.resultsContainer.innerHTML = `<p>this will be our searched content...</p>`;
    this.isSpinnerVisible = false;
  }
}
/* harmony default export */ __webpack_exports__["default"] = (Search);

/***/ }),

/***/ "./src/css/base.css":
/*!**************************!*\
  !*** ./src/css/base.css ***!
  \**************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/css/header.css":
/*!****************************!*\
  !*** ./src/css/header.css ***!
  \****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/css/map.css":
/*!*************************!*\
  !*** ./src/css/map.css ***!
  \*************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/css/reset.css":
/*!***************************!*\
  !*** ./src/css/reset.css ***!
  \***************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/css/single-page.css":
/*!*********************************!*\
  !*** ./src/css/single-page.css ***!
  \*********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/css/variables.css":
/*!*******************************!*\
  !*** ./src/css/variables.css ***!
  \*******************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _css_variables_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./css/variables.css */ "./src/css/variables.css");
/* harmony import */ var _css_reset_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./css/reset.css */ "./src/css/reset.css");
/* harmony import */ var _css_base_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./css/base.css */ "./src/css/base.css");
/* harmony import */ var _css_header_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./css/header.css */ "./src/css/header.css");
/* harmony import */ var _css_single_page_css__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./css/single-page.css */ "./src/css/single-page.css");
/* harmony import */ var _css_map_css__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./css/map.css */ "./src/css/map.css");
/* harmony import */ var _js_Navigation__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./js/Navigation */ "./src/js/Navigation.js");
/* harmony import */ var _js_Leaflet__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./js/Leaflet */ "./src/js/Leaflet.js");
/* harmony import */ var _js_Search__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./js/Search */ "./src/js/Search.js");
// CSS







// Navigation Functionalities

const navigation = new _js_Navigation__WEBPACK_IMPORTED_MODULE_6__["default"]();

// LeafletMap

const leafletMap = new _js_Leaflet__WEBPACK_IMPORTED_MODULE_7__["default"]();

// Search Functionalities

const search = new _js_Search__WEBPACK_IMPORTED_MODULE_8__["default"]();
}();
/******/ })()
;
//# sourceMappingURL=index.js.map