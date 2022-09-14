/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

// require('./bootstrap');
(function (window) {
  var myModal = new HystModal({
    linkAttributeName: "data-hystmodal"
  });
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 28,
    navigation: {
      nextEl: "#sw1r",
      prevEl: "#sw1l"
    },
    pagination: {
      el: "#sw1p",
      clickable: true
    },
    breakpoints: {
      1200: {
        slidesPerView: 3
      },
      768: {
        slidesPerView: 2
      }
    }
  });
  var swiper2 = new Swiper(".mySwiper2", {
    slidesPerView: 1,
    spaceBetween: 28,
    navigation: {
      nextEl: "#sw2r",
      prevEl: "#sw2l"
    },
    pagination: {
      el: "#sw2p",
      clickable: true
    },
    breakpoints: {
      1200: {
        slidesPerView: 3
      },
      768: {
        slidesPerView: 2
      }
    }
  });

  function init_accordion(option) {
    var block = document.querySelectorAll('[data-accordion="block"]');

    if (block.length > 0) {
      block.forEach(function (itemBlock) {
        var btn = itemBlock.querySelector('[data-accordion="head"]');
        var el = itemBlock.querySelector('[data-accordion="body"]');
        smoothView(btn, el);
        btn.addEventListener('click', function () {
          itemBlock.classList.toggle('active');
        });
      });
      if (option == 'first_active') block[0].querySelector('[data-accordion="head"]').click();
    }
  }

  function smoothView(btn, el) {
    var startHeight = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 0;
    if (!btn && !el) return;
    var heightEl = el.offsetHeight;
    el.classList.add('not-active');
    el.style.height = startHeight + 'px';

    if (startHeight > 0) {
      if (heightEl < startHeight) {
        el.classList.remove('not-active');
        el.style.height = heightEl + 'px';
      }
    }

    var update = function update() {
      el.style.height = 'auto';
      setTimeout(function () {
        heightEl = el.offsetHeight;
        el.style.height = heightEl + 'px';
      }, 100);
    };

    btn.addEventListener('click', function () {
      if (el.classList.contains('not-active')) {
        el.classList.remove('not-active');
        el.style.height = heightEl + 'px';
        btn.classList.add('active');
      } else {
        el.classList.add('not-active');
        el.style.height = startHeight + 'px';
        btn.classList.remove('active');
      }
    });
    var observer = new MutationObserver(function (mutationRecords) {
      update();
    });
    observer.observe(el, {
      childList: true,
      subtree: true,
      characterDataOldValue: true
    });
  }

  function init_tabs() {
    var sectionTabs = document.querySelector('[data-product-card-page="section-tabs"]');

    if (sectionTabs) {
      var btnTab = sectionTabs.querySelectorAll('[data-product-card-page="btn-tab"]');
      var itemTab = sectionTabs.querySelectorAll('[data-product-card-page="item-tab"]');

      var removeActive = function removeActive() {
        btnTab.forEach(function (itemBtnTab, index) {
          itemBtnTab.classList.remove('active');
          itemTab[index].classList.remove('active');
        });
      };

      btnTab.forEach(function (itemBtnTab, index) {
        itemBtnTab.addEventListener('click', function () {
          if (!itemBtnTab.classList.contains('active')) {
            removeActive();
            itemBtnTab.classList.add('active');
            itemTab[index].classList.add('active');
          }
        });
      });
    }
  }

  function init_spoilers() {
    var screenWidth = window.screen.width;

    if (screenWidth > 576) {
      var buttons = document.querySelectorAll('[data-spoiler="button"]');
      buttons.forEach(function (button, index) {
        button.style.display = 'none';
      });
      return;
    }

    var spoilers = document.querySelectorAll('[data-spoiler="block"]');
    spoilers.forEach(function (spoiler, index) {
      var button = spoiler.querySelector('[data-spoiler="button"]');
      var hide = spoiler.querySelectorAll('[data-spoiler="hide"]');
      hide.forEach(function (el, index) {
        el.style.overflow = 'hidden';
        el.style.transition = 'height 0.3s';
        smoothView(button, el);
      });
    });
  }

  function toggleMenu() {
    var menu = document.querySelector('[js-toggle-menu="menu"]');
    if (!menu) return;
    var btnMenu = document.querySelector('[js-toggle-menu="toggler"]');
    var body = document.body;
    btnMenu.addEventListener('click', function (e) {
      btnMenu.classList.toggle('active');
      menu.classList.toggle('active');
      body.classList.toggle('scroll-lock');
    });
  }

  init_accordion('first_active');
  init_tabs();
  init_spoilers();
  toggleMenu();
})(window);

/***/ }),

/***/ "./resources/css/app.scss":
/*!********************************!*\
  !*** ./resources/css/app.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/admin/admin.scss":
/*!****************************************!*\
  !*** ./resources/css/admin/admin.scss ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/admin": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/admin","css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/admin","css/app"], () => (__webpack_require__("./resources/css/app.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/admin","css/app"], () => (__webpack_require__("./resources/css/admin/admin.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;