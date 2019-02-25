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

/***/ "./resources/assets/js/main.js":
/*!*************************************!*\
  !*** ./resources/assets/js/main.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function () {
  var nav = document.querySelector('nav.fixed');
  var dropnav = document.querySelector('.dropnav');
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

    if (height2 != height) {
      document.body.style['margin-top'] = height2 + 'px';
    }

    if (window.pageYOffset > height2) {
      nav.classList.add('bg-white', 'text-dark');
      nav.classList.remove('bg-blue', 'text-white');
      dropnav.classList.remove('bg-white', 'text-dark');
      dropnav.classList.add('bg-blue', 'text-white');
    } else {
      nav.classList.remove('bg-white', 'text-dark');
      nav.classList.add('bg-blue', 'text-white');
      dropnav.classList.add('bg-white', 'text-dark');
      dropnav.classList.remove('bg-blue', 'text-white');
    }

    height = height2;
  };

  window.addEventListener('scroll', fn);
  window.addEventListener('resize', fn);
  $('');
})();

(function () {
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

module.exports = __webpack_require__(/*! /Volumes/Storage/Code/v4/resources/assets/js/main.js */"./resources/assets/js/main.js");


/***/ })

/******/ });