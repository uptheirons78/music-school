!function(){var t={777:function(){const t=document.querySelector(".hamburger"),e=document.querySelector(".main-navigation");t.addEventListener("click",(r=>{"false"===e.getAttribute("data-visible")?(e.setAttribute("data-visible","true"),t.setAttribute("aria-expanded",!0)):(e.setAttribute("data-visible","false"),t.setAttribute("aria-expanded",!1))})),t.addEventListener("keyup",(r=>{"true"===e.getAttribute("data-visible")&&"Escape"===r.code&&(e.setAttribute("data-visible","false"),t.setAttribute("aria-expanded",!1),t.focus())}))}},e={};function r(n){var i=e[n];if(void 0!==i)return i.exports;var a=e[n]={exports:{}};return t[n](a,a.exports,r),a.exports}r.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return r.d(e,{a:e}),e},r.d=function(t,e){for(var n in e)r.o(e,n)&&!r.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:e[n]})},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},function(){"use strict";r(777)}()}();