/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/pulltorefreshjs/dist/index.umd.js":
/*!********************************************************!*\
  !*** ./node_modules/pulltorefreshjs/dist/index.umd.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*!
 * pulltorefreshjs v0.1.18
 * (c) Rafael Soto
 * Released under the MIT License.
 */
(function (global, factory) {
   true ? module.exports = factory() :
  undefined;
}(this, function () { 'use strict';

  var _shared = {
    pullStartY: null,
    pullMoveY: null,
    handlers: [],
    styleEl: null,
    events: null,
    dist: 0,
    state: 'pending',
    timeout: null,
    distResisted: 0,
    supportsPassive: false,
    supportsPointerEvents: !!window.PointerEvent
  };

  try {
    window.addEventListener('test', null, {
      get passive() {
        // eslint-disable-line getter-return
        _shared.supportsPassive = true;
      }

    });
  } catch (e) {// do nothing
  }

  function setupDOM(handler) {
    if (!handler.ptrElement) {
      var ptr = document.createElement('div');

      if (handler.mainElement !== document.body) {
        handler.mainElement.parentNode.insertBefore(ptr, handler.mainElement);
      } else {
        document.body.insertBefore(ptr, document.body.firstChild);
      }

      ptr.classList.add(((handler.classPrefix) + "ptr"));
      ptr.innerHTML = handler.getMarkup().replace(/__PREFIX__/g, handler.classPrefix);
      handler.ptrElement = ptr;

      if (typeof handler.onInit === 'function') {
        handler.onInit(handler);
      } // Add the css styles to the style node, and then
      // insert it into the dom


      if (!_shared.styleEl) {
        _shared.styleEl = document.createElement('style');

        _shared.styleEl.setAttribute('id', 'pull-to-refresh-js-style');

        document.head.appendChild(_shared.styleEl);
      }

      _shared.styleEl.textContent = handler.getStyles().replace(/__PREFIX__/g, handler.classPrefix).replace(/\s+/g, ' ');
    }

    return handler;
  }

  function onReset(handler) {
    handler.ptrElement.classList.remove(((handler.classPrefix) + "refresh"));
    handler.ptrElement.style[handler.cssProp] = '0px';
    setTimeout(function () {
      // remove previous ptr-element from DOM
      if (handler.ptrElement && handler.ptrElement.parentNode) {
        handler.ptrElement.parentNode.removeChild(handler.ptrElement);
        handler.ptrElement = null;
      } // reset state


      _shared.state = 'pending';
    }, handler.refreshTimeout);
  }

  function update(handler) {
    var iconEl = handler.ptrElement.querySelector(("." + (handler.classPrefix) + "icon"));
    var textEl = handler.ptrElement.querySelector(("." + (handler.classPrefix) + "text"));

    if (iconEl) {
      if (_shared.state === 'refreshing') {
        iconEl.innerHTML = handler.iconRefreshing;
      } else {
        iconEl.innerHTML = handler.iconArrow;
      }
    }

    if (textEl) {
      if (_shared.state === 'releasing') {
        textEl.innerHTML = handler.instructionsReleaseToRefresh;
      }

      if (_shared.state === 'pulling' || _shared.state === 'pending') {
        textEl.innerHTML = handler.instructionsPullToRefresh;
      }

      if (_shared.state === 'refreshing') {
        textEl.innerHTML = handler.instructionsRefreshing;
      }
    }
  }

  var _ptr = {
    setupDOM: setupDOM,
    onReset: onReset,
    update: update
  };

  var screenY = function screenY(event) {
    if (_shared.pointerEventsEnabled && _shared.supportsPointerEvents) {
      return event.screenY;
    }

    return event.touches[0].screenY;
  };

  var _setupEvents = (function () {
    var _el;

    function _onTouchStart(e) {
      // here, we must pick a handler first, and then append their html/css on the DOM
      var target = _shared.handlers.filter(function (h) { return h.contains(e.target); })[0];

      _shared.enable = !!target;

      if (target && _shared.state === 'pending') {
        _el = _ptr.setupDOM(target);

        if (target.shouldPullToRefresh()) {
          _shared.pullStartY = screenY(e);
        }

        clearTimeout(_shared.timeout);

        _ptr.update(target);
      }
    }

    function _onTouchMove(e) {
      if (!(_el && _el.ptrElement && _shared.enable)) {
        return;
      }

      if (!_shared.pullStartY) {
        if (_el.shouldPullToRefresh()) {
          _shared.pullStartY = screenY(e);
        }
      } else {
        _shared.pullMoveY = screenY(e);
      }

      if (_shared.state === 'refreshing') {
        if (e.cancelable && _el.shouldPullToRefresh() && _shared.pullStartY < _shared.pullMoveY) {
          e.preventDefault();
        }

        return;
      }

      if (_shared.state === 'pending') {
        _el.ptrElement.classList.add(((_el.classPrefix) + "pull"));

        _shared.state = 'pulling';

        _ptr.update(_el);
      }

      if (_shared.pullStartY && _shared.pullMoveY) {
        _shared.dist = _shared.pullMoveY - _shared.pullStartY;
      }

      _shared.distExtra = _shared.dist - _el.distIgnore;

      if (_shared.distExtra > 0) {
        if (e.cancelable) {
          e.preventDefault();
        }

        _el.ptrElement.style[_el.cssProp] = (_shared.distResisted) + "px";
        _shared.distResisted = _el.resistanceFunction(_shared.distExtra / _el.distThreshold) * Math.min(_el.distMax, _shared.distExtra);

        if (_shared.state === 'pulling' && _shared.distResisted > _el.distThreshold) {
          _el.ptrElement.classList.add(((_el.classPrefix) + "release"));

          _shared.state = 'releasing';

          _ptr.update(_el);
        }

        if (_shared.state === 'releasing' && _shared.distResisted < _el.distThreshold) {
          _el.ptrElement.classList.remove(((_el.classPrefix) + "release"));

          _shared.state = 'pulling';

          _ptr.update(_el);
        }
      }
    }

    function _onTouchEnd() {
      if (!(_el && _el.ptrElement && _shared.enable)) {
        return;
      }

      if (_shared.state === 'releasing' && _shared.distResisted > _el.distThreshold) {
        _shared.state = 'refreshing';
        _el.ptrElement.style[_el.cssProp] = (_el.distReload) + "px";

        _el.ptrElement.classList.add(((_el.classPrefix) + "refresh"));

        _shared.timeout = setTimeout(function () {
          var retval = _el.onRefresh(function () { return _ptr.onReset(_el); });

          if (retval && typeof retval.then === 'function') {
            retval.then(function () { return _ptr.onReset(_el); });
          }

          if (!retval && !_el.onRefresh.length) {
            _ptr.onReset(_el);
          }
        }, _el.refreshTimeout);
      } else {
        if (_shared.state === 'refreshing') {
          return;
        }

        _el.ptrElement.style[_el.cssProp] = '0px';
        _shared.state = 'pending';
      }

      _ptr.update(_el);

      _el.ptrElement.classList.remove(((_el.classPrefix) + "release"));

      _el.ptrElement.classList.remove(((_el.classPrefix) + "pull"));

      _shared.pullStartY = _shared.pullMoveY = null;
      _shared.dist = _shared.distResisted = 0;
    }

    function _onScroll() {
      if (_el) {
        _el.mainElement.classList.toggle(((_el.classPrefix) + "top"), _el.shouldPullToRefresh());
      }
    }

    var _passiveSettings = _shared.supportsPassive ? {
      passive: _shared.passive || false
    } : undefined;

    if (_shared.pointerEventsEnabled && _shared.supportsPointerEvents) {
      window.addEventListener('pointerup', _onTouchEnd);
      window.addEventListener('pointerdown', _onTouchStart);
      window.addEventListener('pointermove', _onTouchMove, _passiveSettings);
    } else {
      window.addEventListener('touchend', _onTouchEnd);
      window.addEventListener('touchstart', _onTouchStart);
      window.addEventListener('touchmove', _onTouchMove, _passiveSettings);
    }

    window.addEventListener('scroll', _onScroll);
    return {
      onTouchEnd: _onTouchEnd,
      onTouchStart: _onTouchStart,
      onTouchMove: _onTouchMove,
      onScroll: _onScroll,

      destroy: function destroy() {
        if (_shared.pointerEventsEnabled && _shared.supportsPointerEvents) {
          window.removeEventListener('pointerdown', _onTouchStart);
          window.removeEventListener('pointerup', _onTouchEnd);
          window.removeEventListener('pointermove', _onTouchMove, _passiveSettings);
        } else {
          window.removeEventListener('touchstart', _onTouchStart);
          window.removeEventListener('touchend', _onTouchEnd);
          window.removeEventListener('touchmove', _onTouchMove, _passiveSettings);
        }

        window.removeEventListener('scroll', _onScroll);
      }

    };
  });

  var _ptrMarkup = "\n<div class=\"__PREFIX__box\">\n  <div class=\"__PREFIX__content\">\n    <div class=\"__PREFIX__icon\"></div>\n    <div class=\"__PREFIX__text\"></div>\n  </div>\n</div>\n";

  var _ptrStyles = "\n.__PREFIX__ptr {\n  box-shadow: inset 0 -3px 5px rgba(0, 0, 0, 0.12);\n  pointer-events: none;\n  font-size: 0.85em;\n  font-weight: bold;\n  top: 0;\n  height: 0;\n  transition: height 0.3s, min-height 0.3s;\n  text-align: center;\n  width: 100%;\n  overflow: hidden;\n  display: flex;\n  align-items: flex-end;\n  align-content: stretch;\n}\n\n.__PREFIX__box {\n  padding: 10px;\n  flex-basis: 100%;\n}\n\n.__PREFIX__pull {\n  transition: none;\n}\n\n.__PREFIX__text {\n  margin-top: .33em;\n  color: rgba(0, 0, 0, 0.3);\n}\n\n.__PREFIX__icon {\n  color: rgba(0, 0, 0, 0.3);\n  transition: transform .3s;\n}\n\n/*\nWhen at the top of the page, disable vertical overscroll so passive touch\nlisteners can take over.\n*/\n.__PREFIX__top {\n  touch-action: pan-x pan-down pinch-zoom;\n}\n\n.__PREFIX__release {\n  .__PREFIX__icon {\n    transform: rotate(180deg);\n  }\n}\n";

  var _defaults = {
    distThreshold: 60,
    distMax: 80,
    distReload: 50,
    distIgnore: 0,
    mainElement: 'body',
    triggerElement: 'body',
    ptrElement: '.ptr',
    classPrefix: 'ptr--',
    cssProp: 'min-height',
    iconArrow: '&#8675;',
    iconRefreshing: '&hellip;',
    instructionsPullToRefresh: 'Pull down to refresh',
    instructionsReleaseToRefresh: 'Release to refresh',
    instructionsRefreshing: 'Refreshing',
    refreshTimeout: 500,
    getMarkup: function () { return _ptrMarkup; },
    getStyles: function () { return _ptrStyles; },
    onInit: function () {},
    onRefresh: function () { return location.reload(); },
    resistanceFunction: function (t) { return Math.min(1, t / 2.5); },

    shouldPullToRefresh: function shouldPullToRefresh() {
      return typeof this.mainElement === 'string' ? !document.querySelector(this.mainElement).scrollTop : this.mainElement && !this.mainElement.scrollTop;
    }

  };

  var _methods = ['mainElement', 'ptrElement', 'triggerElement'];
  var _setupHandler = (function (options) {
    var _handler = {}; // merge options with defaults

    Object.keys(_defaults).forEach(function (key) {
      _handler[key] = options[key] || _defaults[key];
    }); // normalize timeout value, even if it is zero

    _handler.refreshTimeout = typeof options.refreshTimeout === 'number' ? options.refreshTimeout : _defaults.refreshTimeout; // normalize elements

    _methods.forEach(function (method) {
      if (typeof _handler[method] === 'string') {
        _handler[method] = document.querySelector(_handler[method]);
      }
    }); // attach events lazily


    if (!_shared.events) {
      _shared.events = _setupEvents();
    }

    _handler.contains = function (target) {
      return _handler.triggerElement.contains(target);
    };

    _handler.destroy = function () {
      // stop pending any pending callbacks
      clearTimeout(_shared.timeout); // remove handler from shared state

      var offset = _shared.handlers.indexOf(_handler);

      _shared.handlers.splice(offset, 1);
    };

    return _handler;
  });

  var index = {
    setPassiveMode: function setPassiveMode(isPassive) {
      _shared.passive = isPassive;
    },

    setPointerEventsMode: function setPointerEventsMode(isEnabled) {
      _shared.pointerEventsEnabled = isEnabled;
    },

    destroyAll: function destroyAll() {
      if (_shared.events) {
        _shared.events.destroy();

        _shared.events = null;
      }

      _shared.handlers.forEach(function (h) {
        h.destroy();
      });
    },

    init: function init(options) {
      if ( options === void 0 ) options = {};

      var handler = _setupHandler(options);

      _shared.handlers.push(handler);

      return handler;
    },

    // export utils for testing
    _: {
      setupHandler: _setupHandler,
      setupEvents: _setupEvents,
      setupDOM: _ptr.setupDOM,
      onReset: _ptr.onReset,
      update: _ptr.update
    }
  };

  return index;

}));


/***/ }),

/***/ "./resources/assets/js/autocomplete.js":
/*!*********************************************!*\
  !*** ./resources/assets/js/autocomplete.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function render(str) {
  var data = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
  var newhtml = str;
  Object.keys(data).forEach(function (key) {
    var expr = "{%= " + key + " =%}";
    var re = new RegExp(expr, "g");
    newhtml = newhtml.replace(re, data[key]);
  });
  return newhtml;
}

function getJSON(url, callback) {
  var type = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'json';
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.responseType = type;

  xhr.onload = function () {
    var status = xhr.status;

    if (status === 200) {
      callback(null, xhr.response);
    } else {
      callback(status, xhr.response);
    }
  };

  xhr.send();
}

function autocomplete(id) {
  var cb = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
  var el = document.getElementById(id);
  var url = el.dataset.fetch;
  var result = el.dataset.result;
  var resultEl = document.getElementById(result);
  var template = el.dataset.template;
  getJSON(url, function (err, json) {
    if (err) return;
    getJSON(template, function (err, tmpl) {
      if (err) return;

      if (cb && Array.isArray(json)) {
        el.addEventListener("keyup", function (e) {
          if (!el.value || el.value.length < 2) return resultEl.innerHTML = "";
          var $json = json.slice();
          modified = cb.call(undefined, e, el, $json) || $json;
          var res = modified.map(function (item) {
            return render(tmpl, item);
          }).join("");
          resultEl.innerHTML = res;
        });
      }
    }, 'text');
  });
}

window.autocomplete = autocomplete;
window.getJSON = getJSON;
window.render = render;

/***/ }),

/***/ "./resources/assets/js/main.js":
/*!*************************************!*\
  !*** ./resources/assets/js/main.js ***!
  \*************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _autocomplete__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./autocomplete */ "./resources/assets/js/autocomplete.js");
/* harmony import */ var _autocomplete__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_autocomplete__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var pulltorefreshjs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! pulltorefreshjs */ "./node_modules/pulltorefreshjs/dist/index.umd.js");
/* harmony import */ var pulltorefreshjs__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(pulltorefreshjs__WEBPACK_IMPORTED_MODULE_1__);


var ptr = pulltorefreshjs__WEBPACK_IMPORTED_MODULE_1___default.a.init({
  mainElement: '#ptr-target',
  onRefresh: function onRefresh() {
    window.location.reload();
  }
});

function setvh() {
  setTimeout(function () {
    var vh = window.innerHeight;
    console.log(vh + 'px');
    document.documentElement.style.setProperty('--vh', "".concat(vh, "px"));
  }, 100);
}

if (typeof window.onorientationchange !== "undefined") {
  window.addEventListener('orientationchange', setvh);
} else {
  window.addEventListener('resize', setvh);
}

window.addEventListener('DOMContentLoaded', setvh); // window.addEventListener('resize', () => {let vh = window.innerHeight * 0.01;document.documentElement.style.setProperty('--vh', `${vh}px`);});
// (function () {
//     var nav = document.querySelector('nav.fixed')
//     var dropnavs = document.querySelectorAll('.dropnav')
//     var height = nav.getBoundingClientRect().height
//     var progress = document.getElementById('read-progress')
//     var fn = () => {
//       var height2 = nav.getBoundingClientRect().height
//       var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
//       var winHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
//       var scrolled = (winScroll / winHeight) * 100;
//       if (progress) {
//          progress.style.width = scrolled + "%";
//       }
//       // console.log(height2, height)
//       // if (height2 != height) {
//          document.body.style['margin-top'] = height2 + 'px'
//       // }
//       if (window.pageYOffset > height2) {
//           nav.classList.add('bg-white', 'text-dark')
//           nav.classList.remove('bg-blue', 'text-white')
//           Array.from(dropnavs).forEach(dropnav => {
//             dropnav.classList.remove('bg-white', 'text-dark')
//             dropnav.classList.add('bg-blue', 'text-white')
//           })
//       } else {
//           nav.classList.remove('bg-white', 'text-dark')
//           nav.classList.add('bg-blue', 'text-white')
//           Array.from(dropnavs).forEach(dropnav => {
//             dropnav.classList.add('bg-white', 'text-dark')
//             dropnav.classList.remove('bg-blue', 'text-white')
//           })
//       }
//       height = height2
//     }
//     fn()
//     window.addEventListener('scroll', fn)
//     window.addEventListener('resize', fn)
// })();
// (function () {
//    if (!window.Waves) return;
//    new Waves({
//       canvas: 'waves',
//       waveCount: 5,
//       backgroundColor: '#3EB5F7',
//       backgroundBlendMode: 'source-over',
//       waveBlendMode: 'screen',
//       scale: 0.5,
//    }, {
//       color: 'yellow',
//       amplitude: 30,
//    }, {
//       color: 'cyan',
//       amplitude: 20,
//    }, {
//       color: '#3EB5F7',
//       amplitude: 30,
//    })
//    $('#waves').parent().css('margin-bottom', '6rem')
// })();

window.loadMoreApps = function (el) {
  var meta = document.head.querySelector('meta[name=page][content]');
  var currentPage = parseInt(meta.content);
  var nextPage = currentPage + 1;

  if (window.location.href.includes('?')) {
    var url = window.location.href + "&json=true&page=" + nextPage;
  } else {
    var url = window.location.origin + "/apps?json=true&page=" + nextPage;
  }

  getJSON(url, function (err, json) {
    if (err) {
      el.innerHTML = "No more apps. Try again?";
      el.className = "btn btn-red";
    } else {
      getJSON(el.dataset.template, function (err, template) {
        if (err) {
          el.innerHTML = "Template Error. Try again?";
          el.className = "btn btn-red";
        }

        var apps = document.getElementById('apps');
        apps.innerHTML += json.apps.data.map(function (app) {
          return render(template, app);
        }).join("");
        meta.setAttribute('content', nextPage.toString());
      }, 'text');
    }
  });
};

(function () {// var i = setInterval(function () {
  //   console.clear()
  //   console.log("%cHello!", "color: #3EB5F7; text-shadow: 0px 2px black; -webkit-text-stroke: 1px black; font-size: 60px;font-weight:bold;");
  //   console.log("%cDo you want to help develop this website?", "font-size: 20px;")
  //   console.log("%cIf you do, then contact @wizardzeb on Twitter.", "font-size: 20px;")
  // }, 1000)
  // setTimeout(function () {
  //   clearInterval(i)
  // }, 10000)
})();

/***/ }),

/***/ "./resources/assets/postCss/redesign.css":
/*!***********************************************!*\
  !*** ./resources/assets/postCss/redesign.css ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***********************************************************************************!*\
  !*** multi ./resources/assets/js/main.js ./resources/assets/postCss/redesign.css ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/zeb/code/v4/resources/assets/js/main.js */"./resources/assets/js/main.js");
module.exports = __webpack_require__(/*! /Users/zeb/code/v4/resources/assets/postCss/redesign.css */"./resources/assets/postCss/redesign.css");


/***/ })

/******/ });