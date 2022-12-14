/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/leaflet.js":
/*!***************************!*\
  !*** ./src/js/leaflet.js ***!
  \***************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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

/***/ "./src/js/navigation.js":
/*!******************************!*\
  !*** ./src/js/navigation.js ***!
  \******************************/
/***/ (function() {

const hamburger = document.querySelector('.hamburger');
const mainNavigation = document.querySelector('.main-navigation');
hamburger.addEventListener('click', e => {
  const visibility = mainNavigation.getAttribute('data-visible');
  if (visibility === 'false') {
    mainNavigation.setAttribute('data-visible', 'true');
    hamburger.setAttribute('aria-expanded', true);
  } else {
    mainNavigation.setAttribute('data-visible', 'false');
    hamburger.setAttribute('aria-expanded', false);
  }
});
hamburger.addEventListener('keyup', e => {
  const visibility = mainNavigation.getAttribute('data-visible');
  if (visibility === 'true' && e.code === 'Escape') {
    mainNavigation.setAttribute('data-visible', 'false');
    hamburger.setAttribute('aria-expanded', false);
    hamburger.focus();
  }
});

/***/ }),

/***/ "./src/css/base.css":
/*!**************************!*\
  !*** ./src/css/base.css ***!
  \**************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/css/header.css":
/*!****************************!*\
  !*** ./src/css/header.css ***!
  \****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/css/map.css":
/*!*************************!*\
  !*** ./src/css/map.css ***!
  \*************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/css/reset.css":
/*!***************************!*\
  !*** ./src/css/reset.css ***!
  \***************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/css/single-page.css":
/*!*********************************!*\
  !*** ./src/css/single-page.css ***!
  \*********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/css/variables.css":
/*!*******************************!*\
  !*** ./src/css/variables.css ***!
  \*******************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
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
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
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
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
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
/* harmony import */ var _js_navigation_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./js/navigation.js */ "./src/js/navigation.js");
/* harmony import */ var _js_navigation_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_js_navigation_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _js_leaflet__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./js/leaflet */ "./src/js/leaflet.js");
// CSS







// Navigation


// LeafletMap

const leafletMap = new _js_leaflet__WEBPACK_IMPORTED_MODULE_7__["default"]();
}();
/******/ })()
;
//# sourceMappingURL=index.js.map