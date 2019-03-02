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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
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
  var fn = new Function("obj", "\n          var p = [];\n          var print = function () {\n              p.push.apply(p, arguments);\n          };\n          with (obj) {\n              p.push('".concat(str.replace(/[\r\t\n]/g, " ").split("<%").join("\t").replace(/((^|%>)[^\t]*)'/g, "$1\r").replace(/\t=(.*?)%>/g, "',$1,'").split("\t").join("');").split("%>").join("p.push('").split("\r").join("\\'"), "');\n          };\n          return p.join('');\n      "));
  return fn(data);
}

function autocomplete(id) {
  var cb = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;

  var getJSON = function getJSON(url, callback) {
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
  };

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


(function () {
  var nav = document.querySelector('nav.fixed');
  var dropnavs = document.querySelectorAll('.dropnav');
  var height = nav.getBoundingClientRect().height;
  var progress = document.getElementById('read-progress');

  var fn = function fn() {
    var height2 = nav.getBoundingClientRect().height;
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var winHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = winScroll / winHeight * 100;

    if (progress) {
      progress.style.width = scrolled + "%";
    }

    console.log(height2, height); // if (height2 != height) {

    document.body.style['margin-top'] = height2 + 'px'; // }

    if (window.pageYOffset > height2) {
      nav.classList.add('bg-white', 'text-dark');
      nav.classList.remove('bg-blue', 'text-white');
      Array.from(dropnavs).forEach(function (dropnav) {
        dropnav.classList.remove('bg-white', 'text-dark');
        dropnav.classList.add('bg-blue', 'text-white');
      });
    } else {
      nav.classList.remove('bg-white', 'text-dark');
      nav.classList.add('bg-blue', 'text-white');
      Array.from(dropnavs).forEach(function (dropnav) {
        dropnav.classList.add('bg-white', 'text-dark');
        dropnav.classList.remove('bg-blue', 'text-white');
      });
    }

    height = height2;
  };

  fn();
  window.addEventListener('scroll', fn);
  window.addEventListener('resize', fn);
})();

(function () {
  if (!window.Waves) return;
  new Waves({
    canvas: 'waves',
    waveCount: 5,
    backgroundColor: '#3EB5F7',
    backgroundBlendMode: 'source-over',
    waveBlendMode: 'screen',
    scale: 0.5
  }, {
    color: 'yellow',
    amplitude: 30
  }, {
    color: 'cyan',
    amplitude: 20
  }, {
    color: '#3EB5F7',
    amplitude: 30
  });
  $('#waves').parent().css('margin-bottom', '6rem');
})();

/***/ }),

/***/ 1:
/*!*******************************************!*\
  !*** multi ./resources/assets/js/main.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! E:\code\v4\resources\assets\js\main.js */"./resources/assets/js/main.js");


/***/ })

/******/ });