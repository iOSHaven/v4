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
// import u from 'umbrellajs';
 // import PullToRefresh from 'pulltorefreshjs';
// import { disablePageScroll, enablePageScroll, getScrollState } from 'scroll-lock';

var breakpoint = 768;

if (window.innerWidth < breakpoint) {
  document.body.style.marginTop = document.querySelector("#nav-top-phone").offsetHeight + "px";
} else {
  document.body.style.marginTop = document.querySelector("#nav-top-desktop").offsetHeight + "px";
} // const ptr = PullToRefresh.init({
//    mainElement: 'body',
//    onRefresh() {
//       window.location.reload(true);
//    }
// })
// u(".scroll-toggler").on('click', function () {
//    console.log("toggle scroll")
//    if (getScrollState()) {
//       disablePageScroll()
//    } else {
//       enablePageScroll()
//    }
// })
// setTimeout(() => {
// u('#status-bar-style').attr('content', 'black')
// var mode = u("#status-bar-style").attr('content');
// alert(`You're in *${mode}**** mode`);
// }, 1000)


function insertHTML(id, html) {
  var elm = document.getElementById(id);
  elm.innerHTML += html;
  var scripts = elm.getElementsByTagName("script"); // If we don't clone the results then "scripts"
  // will actually update live as we insert the new
  // tags, and we'll get caught in an endless loop

  var scriptsClone = [];

  for (var i = 0; i < scripts.length; i++) {
    scriptsClone.push(scripts[i]);
  }

  for (var i = 0; i < scriptsClone.length; i++) {
    var currentScript = scriptsClone[i];
    var s = document.createElement("script"); // Copy all the attributes from the original script

    for (var j = 0; j < currentScript.attributes.length; j++) {
      var a = currentScript.attributes[j];
      s.setAttribute(a.name, a.value);
    }

    s.appendChild(document.createTextNode(currentScript.innerHTML));
    currentScript.parentNode.replaceChild(s, currentScript);
  }
}

window.loadMoreApps = function (el) {
  var id = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "apps";
  var meta = document.head.querySelector('meta[name=page][content]');
  var currentPage = parseInt(meta.content);
  var nextPage = currentPage + 1;

  if (window.location.href.includes('?')) {
    var url = window.location.href + "&html=true&page=" + nextPage;
  } else {
    var url = window.location.href + "?html=true&page=" + nextPage;
  }

  getJSON(url, function (err, doc) {
    if (err || typeof doc.body == "undefined") {
      el.innerHTML = "No more " + id + ". Try again?";
    } else {
      insertHTML(id, doc.body.innerHTML); // var apps = document.getElementById(id)
      // apps.innerHTML += doc.body.innerHTML

      meta.setAttribute('content', nextPage.toString());
    }
  }, "document");
}; // setInterval(function () {
//    try {
//       (adsbygoogle = window.adsbygoogle || []).push({})
//    } catch (err) {
//       //
//    }
// }, 500)


window.onSearchInput = function (el) {
  window.searchinput = el.value.toLowerCase();
};

window.initInfiniteScroll = function (id, current, last) {
  var $container = $('#' + id).infiniteScroll({
    path: function path() {
      if (current != last) {
        if (this.loadCount + current < last) {
          var params = new URLSearchParams(window.location.search.slice(1));
          params.set('html', true);
          params.set('page', this.pageIndex + 1);
          return window.location.origin + window.location.pathname + '?' + params.toString();
        }
      }

      return '';
    },
    append: false,
    history: 'push',
    responseType: 'document',
    checkLastPage: true
  });
  $container.on('load.infiniteScroll', function (event, response) {
    insertHTML(id, response.body.innerHTML);
  });
};

/***/ }),

/***/ "./resources/assets/postCss/redesign.css":
/*!***********************************************!*\
  !*** ./resources/assets/postCss/redesign.css ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/sass/f7.scss":
/*!***************************************!*\
  !*** ./resources/assets/sass/f7.scss ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/sass/markdown.scss":
/*!*********************************************!*\
  !*** ./resources/assets/sass/markdown.scss ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*********************************************************************************************************************************************************!*\
  !*** multi ./resources/assets/js/main.js ./resources/assets/sass/markdown.scss ./resources/assets/sass/f7.scss ./resources/assets/postCss/redesign.css ***!
  \*********************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/zeb/code/v4/resources/assets/js/main.js */"./resources/assets/js/main.js");
__webpack_require__(/*! /Users/zeb/code/v4/resources/assets/sass/markdown.scss */"./resources/assets/sass/markdown.scss");
__webpack_require__(/*! /Users/zeb/code/v4/resources/assets/sass/f7.scss */"./resources/assets/sass/f7.scss");
module.exports = __webpack_require__(/*! /Users/zeb/code/v4/resources/assets/postCss/redesign.css */"./resources/assets/postCss/redesign.css");


/***/ })

/******/ });